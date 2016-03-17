<?php
class Web_Controller_Plugin_ResourceManagementOauth extends Zend_Controller_Plugin_Abstract{

	protected $_urllist = array();
	public function __construct(){
		$this->_urllist = array('admin/validaterolename','error','error/permissiondenied','index/index','login/login','login/logout',
			'signup/register','user/validateemail','login/loginwithgoogle','hybridauth/index.php','login/loginwithldap','login/logintest',
			'user/validateempid');
	}

	/**
	 * @param Zend_Controller_Request_Abstract $request
	 * This plugin checks the valid authentication
	 */
	public function preDispatch(Zend_Controller_Request_Abstract $request){
		$controller = strtolower($request->getControllerName());
		$action = strtolower($request->getActionName());
		$route = $controller . '/' . $action;
		if(!in_array($route, $this->_urllist)){
			$userSessionData = new Zend_Session_Namespace('resourceManagement');
			if(!isset($userSessionData->userName)){
				$request->setControllerName('index');
				$request->setActionName('index');
			}else{
				// Use Zend ACL to validate user privilages
				$srmAcl = new Web_Acl_SRMAcl();
				Zend_Registry::set("SRMAcl", $srmAcl);
				$acl_validation = new Web_Validate_Checkroleresourceprivilege();

				//Validate if user is authorized to access this resource i.e $controller and $action
				if(!$acl_validation->srmIsValid(array("resource"=>$controller, "privilege"=>$action))){
					/* If permission is denied and denied for admin dashboard then redirect it to user dashboard else
					 * redirect to the error page
					*/
					if($controller=='admin' && $action == 'index'){
						$this->getResponse()->setRedirect("/admin/myprofile")->sendResponse();
						exit();
					}
					$this->getResponse()->setRedirect("/error")->sendResponse();//send to build custom route(specified in bootstrap)
					exit();
				}
			}
		}

		$translate = new Zend_Translate("Web_Translate_Adapter_TmxWithDefault", APPLICATION_PATH . "/language", 'fr',
			array('defaultLocale'=>'en'));
		Zend_Registry::set("Zend_Translate", $translate);
	}
}