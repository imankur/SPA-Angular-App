<?php
class SignupController extends Zend_Controller_Action{

	public function init(){
		/*
		 * Initialize action controller here
		 */
	}

	public function indexAction(){
		// action body
	}

	public function registerAction(){
		// action body
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		if(isset($userSessionData->firstName)){
			$this->_helper->redirector('profile', 'user');
		}
		$registerForm = new Form_RegisterForm();
	try{
		$em = Zend_Registry::get("em");
		if($this->getRequest()->isPost()){
			$postData = $this->_request->getPost();
			if(!empty($postData['email']))
				$postData['email'] = $postData['email'].'@synergytechservices.com';
			
			if($registerForm->isValid($postData)){
				$password = md5($postData['password']);
				$user = new \Entities\Users();
				$user->setFirstname($postData['firstName']);
				$user->setLastname($postData['lastName']);
				$user->setEmail($postData['email']);
				$user->setEmpId($postData['empId']);
				$user->setPhoneNumber($postData['tel']);
				$user->setPassword($password);
				$user->setIsAdmin(0);
				$user->setIsActive(1);

				$user->setDateCreated(new DateTime());
				
				$em->persist($user);
				
				
				$employeeActivity =  new \Entities\EmployeeActivity();
				$employeeActivity->setIsOpened(0);
				$employeeActivity->setActivityType('registration');
				$employeeActivity->setDateCreated(new DateTime());
				$employeeActivity->setUser($user);
				
				$em->persist($employeeActivity);
				$em->flush();
				$userSessionData->firstName = $postData['firstName'];
				$userSessionData->lastName = $postData['lastName'];
				$userSessionData->isAdmin = false;
				$userSessionData->userId = $user->getUserId(); 
				$this->_helper->redirector('profile', 'user');
			}
		}else{
			if(isset($_SERVER["HTTP_REFERER"]))
				$this->_helper->layout->disableLayout();
		}
	}catch(Exception $ex){
		echo "<pre>";print_r($ex);exit;
	}
		$this->view->registerForm = $registerForm;
	}
}
?>