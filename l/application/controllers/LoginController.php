<?php
/**
 * Login Controller
 *
 * @author naveen.jaiswal
 *
 */
class LoginController extends Zend_Controller_Action{

	public function loginAction(){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		if(isset($userSessionData->userName)){
			$controller = 'user';
			if($userSessionData->isAdmin)
				$controller = 'admin';

			$routeArgs = array ('controller' => $controller, 'action' => 'index');
			$this->_helper->redirector->gotoRoute ( $routeArgs );
		}
		$config = Zend_Registry::get("config");

		$options = $config->ldap->toArray();
		$form = new Form_LoginForm();
		$em = Zend_Registry::get("em");
		if ($this->getRequest()->isPost())
		{
			$authData = $this->_request->getPost();
			if ($form->isValid($authData)){
				$result = $this->loginwithldap($authData, $options);
				if($result->getCode()==1){
					//$authData['username']='nidhi.singh';
					$controller = 'user';
					$em = Zend_Registry::get("em");
					$qb= $em->createQueryBuilder();
					$qb->select("u")->from("Entities\\Users","u")->andWhere("u.username = ?1")->setParameter(1,$authData['username']);
					$query = $qb->getQuery();
					$user = $query->getResult();
					$detail = explode('.', $authData['username']);
					$isAdmin = false;
					if( in_array($authData['username'].'@synergytechservices.com', $config->admin->toArray())){
						$controller = 'admin';
						$isAdmin = true;
					}

					if(!isset($user[0])){
						$user[0] = new \Entities\Users();
						$user[0]->setUserName($authData['username']);
						/* $user[0]->setProfileurl($user_profile->profileURL);
						$user[0]->setPhotourl(isset($user_profile->photoURL)? $user_profile->photoURL : ""); */
						$user[0]->setEmail($authData['username'].'@synergytechservices.com');
						$user[0]->setFirstname(ucfirst($detail[0]));
						$user[0]->setLastname(ucfirst($detail[1]));
						$user[0]->setDateCreated(new DateTime());
						if($isAdmin){
							$user[0]->setIsAdmin(1);
						}else{
							$user[0]->setIsAdmin(0);
						}
						$employeeActivity = new \Entities\EmployeeActivity();
						$employeeActivity->setActivityType('registration');
						$employeeActivity->setIsOpened(0);
						$employeeActivity->setUser($user[0]);
						$employeeActivity->setDateCreated(new DateTime());
						$em->persist($employeeActivity);
						$em = Zend_Registry::get("em");
						$role = $em->find('Entities\\Roles', 6);//By default user would have role=employee
						$userRole = new \Entities\UserRole();
						$userRole->setRole($role);//By default user would have role=employee
						$userRole->setUser($user[0]);
						$em->persist($userRole);

						$em->persist($user[0]);
						$em->flush();
					}

					if (isset($authData['remember'])) {
						setcookie("username", $authData['username'], time()+3600*24);
						setcookie ('password', $authData['password'], time()+3600*24);
					}
					$userSessionData->userName = $user[0]->getUserName();
					$userSessionData->firstName = $user[0]->getFirstName();
					$userSessionData->lastName = $user[0]->getLastName();
					$userSessionData->isAdmin = $user[0]->getIsAdmin();
					$userSessionData->userId = $user[0]->getUserId();
					if($controller=='user')
						$routeArgs = array ('controller' => 'admin', 'action' => 'myprofile');
					else
						$routeArgs = array ('controller' => $controller, 'action' => 'index');
					$this->_helper->redirector->gotoRoute ( $routeArgs );
				}else{
					$form->setErrorMessages(array("Invalid Login" => "Invalid login"));
				}
			}else{
				/* if(isset($_SERVER["HTTP_REFERER"])){
					$this->_helper->layout->disableLayout();
				} */
			}
		}
		$this->view->translate = Zend_Registry::get("Zend_Translate");
		$this->view->form = $form;
	}

	public function logoutAction(){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$userSessionData->unsetAll();
		unset($_SESSION);
		$auth = Zend_Auth::getInstance();
		$auth->clearIdentity();

		$routeArgs = array ('controller' => 'login', 'action' => 'login');
		$this->_helper->redirector->gotoRoute ( $routeArgs );
	}

	public function loginwithgoogleAction(){
		$config = Zend_Registry::get("config");
		$auth = Zend_Auth::getInstance();
		/* $config = array("base_url"=>$configObj->google->base_url,//The url of HybridAuth Endpoint.
      					"providers"=>array($configObj->provider->name =>array("enabled"=>$configObj->google->enabled,
      					"keys"=>array("id"=>$configObj->google->id, "secret"=>$configObj->google->secret),//Keys generated at the time of registering with google.
      					"access_type"=>$configObj->google->access_type, // optional
      					"approval_prompt"=>$configObj->google->approval_prompt)// optional
  		)); */

		$gAuth = new HybridAuth_GoogleAuth($config);
		$user_profile = '';
		$user_profile = $gAuth->connectGoogle();
		if(!empty($user_profile)){
			if($gAuth->isConnected()){
				$em = Zend_Registry::get("em");
				$qb= $em->createQueryBuilder();
				$qb->select("u")->from("Entities\\Users","u")->andWhere("u.email = ?1")->setParameter(1,$user_profile->email);
				$query = $qb->getQuery();
				$user = $query->getResult();
				if(!isset($user[0])){
					$user[0] = new \Entities\Users();
					$user[0]->setUid($user_profile->identifier);
					$user[0]->setProfileurl($user_profile->profileURL);
					$user[0]->setPhotourl(isset($user_profile->photoURL)? $user_profile->photoURL : "");
					$user[0]->setEmail($user_profile->email);
					$user[0]->setFirstname($user_profile->firstName);
					$user[0]->setLastname($user_profile->lastName);
					$user[0]->setIsAdmin(0);
					$user[0]->setDateCreated(new DateTime());
				}
				$userSessionData = new Zend_Session_Namespace('resourceManagement');
				$userSessionData->firstName = $user_profile->firstName;
				$userSessionData->lastName = $user_profile->lastName;
				$userSessionData->isAdmin = 0;
				$controller = 'user';
				if($configObj->admin->email==$user_profile->email){
					$controller = 'admin';
					$userSessionData->isAdmin = 1;
					$user[0]->setIsAdmin(1);
				}
				$em->persist($user[0]);
				$em->flush();

				$userSessionData->userId = $user[0]->getUserId();
				$routeArgs = array ('controller' => $controller, 'action' => 'profile');
				$this->_helper->redirector->gotoRoute ( $routeArgs );
			}else{
				$routeArgs = array ('controller' => 'index', 'action' => 'index');
				$this->_helper->redirector->gotoRoute ( $routeArgs );
			}
		}
	}

	public function loginwithldap($authData, $options = array()){
		$config = Zend_Registry::get("config");
		$auth = Zend_Auth::getInstance();

		$username = $config->ldap->server1->accountDomainNameShort.'\\'.$authData['username'];
		$password = $authData['password'];
		$adapter = new Zend_Auth_Adapter_Ldap($options, $username, $password);
		return $auth->authenticate($adapter);
	}

	public function disconnectgoogleAction(){
		$configObj = Zend_Registry::get("config");
		$config = array("base_url"=>$configObj->google->base_url,//The url of HybridAuth Endpoint.
			"providers"=>array($configObj->provider->name =>array("enabled"=>$configObj->google->enabled,
				"keys"=>array("id"=>$configObj->google->id, "secret"=>$configObj->google->secret)//Keys generated at the time of registering with google.
				)// optional
			));
		$gAuth = new HybridAuth_GoogleAuth($config);
		$gAuth->disconnectGoogle();
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$userSessionData->unsetAll();
		$routeArgs = array ('controller' => 'index', 'action' => '');
		$this->_helper->redirector->gotoRoute ( $routeArgs );
	}

	public function logintestAction(){
		$i=1;
		for($i=1;$i<=428;$i++){
			echo "888002530608";
			echo "<br>";
		}
		$this->_helper->layout->disableLayout();
		$config = Zend_Registry::get("config");
		$options = $config->ldap->toArray();
		$em = Zend_Registry::get("em");
		if ($this->getRequest()->isPost())
		{
			$authData = $this->_request->getPost();
				$result = $this->loginwithldap($authData, $options);
				var_dump($result);
				exit();
				if($result->getCode()==1){
					$controller = 'user';
					$em = Zend_Registry::get("em");
					$qb= $em->createQueryBuilder();
					$qb->select("u")->from("Entities\\Users","u")->andWhere("u.username = ?1")->setParameter(1,$authData['username']);
					$query = $qb->getQuery();
					$user = $query->getResult();
					$detail = explode('.', $authData['username']);

					if(!isset($user[0])){
						$user[0] = new \Entities\Users();
						$user[0]->setUserName($authData['username']);
						/* $user[0]->setProfileurl($user_profile->profileURL);
						 $user[0]->setPhotourl(isset($user_profile->photoURL)? $user_profile->photoURL : ""); */
						$user[0]->setEmail($authData['username'].'@synergytechservices.com');
						$user[0]->setFirstname(ucfirst($detail[0]));
						$user[0]->setLastname(ucfirst($detail[1]));
						$user[0]->setDateCreated(new DateTime());
						if($isAdmin){
							$user[0]->setIsAdmin(1);
						}else{
							$user[0]->setIsAdmin(0);
						}
						$employeeActivity = new \Entities\EmployeeActivity();
						$employeeActivity->setActivityType('registration');
						$employeeActivity->setIsOpened(0);
						$employeeActivity->setUser($user[0]);
						$employeeActivity->setDateCreated(new DateTime());
						$em->persist($employeeActivity);
						$em = Zend_Registry::get("em");
						$role = $em->find('Entities\\Roles', 6);//By default user would have role=employee
						$userRole = new \Entities\UserRole();
						$userRole->setRole($role);//By default user would have role=employee
						$userRole->setUser($user[0]);
						$em->persist($userRole);

						$em->persist($user[0]);
						$em->flush();
					}

					if (isset($authData['remember'])) {
						setcookie("username", $authData['username'], time()+3600*24);
						setcookie ('password', $authData['password'], time()+3600*24);
					}
					$userSessionData->userName = $user[0]->getUserName();
					$userSessionData->firstName = $user[0]->getFirstName();
					$userSessionData->lastName = $user[0]->getLastName();
					$userSessionData->isAdmin = $user[0]->getIsAdmin();
					$userSessionData->userId = $user[0]->getUserId();
					if($controller=='user')
						$routeArgs = array ('controller' => 'admin', 'action' => 'myprofile');
					else
						$routeArgs = array ('controller' => $controller, 'action' => 'index');
					$this->_helper->redirector->gotoRoute ( $routeArgs );
				}else{
					$form->setErrorMessages(array("Invalid Login" => "Invalid login"));
				}

		}
		$this->view->translate = Zend_Registry::get("Zend_Translate");
		$this->view->form = $form;

	}
}