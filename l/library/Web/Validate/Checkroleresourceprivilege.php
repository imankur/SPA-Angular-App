<?php
class Web_Validate_Checkroleresourceprivilege extends Zend_Validate_Abstract{

	public function isValid($params){
	}

	public function srmIsValid($params){
		$userSessionData = new Zend_Session_Namespace('resourceManagement');
		$userId = isset($userSessionData->userId) ? $userSessionData->userId : '';
		$em = Zend_Registry::get("em");
		$user = $em->find('Entities\\Users', $userId);

		$qb = $em->createQueryBuilder();
		$qb->select('ur')->from('Entities\\UserRole', 'ur')->andWhere('ur.user = ?1')->setParameter(1, $user);
		$query = $qb->getQuery();
		$roleObj = $query->getResult();

		$roleArr = array();
		$userMenuArr = array();
		$arrMenu = array();
		$sortByPriorityArr = array();
		foreach($roleObj as $role){
			$roleArr[] = $role->getRole()->getRoleId();
			$rolePermissions = $role->getRole()->getRolePermission();
			if(isset($rolePermissions)){
				foreach ($rolePermissions as $rolePermission){
					$displayName = $rolePermission->getPermission()->getDisplayName();
					if(!in_array($rolePermission->getPermission()->getPrivilage(), $arrMenu)){
						$arrMenu[] = $rolePermission->getPermission()->getPrivilage();
						$userMenuArr[$rolePermission->getRolePermissionId()]['privilage'] = $rolePermission->getPermission()->getPrivilage();
						$userMenuArr[$rolePermission->getRolePermissionId()]['resource'] = $rolePermission->getPermission()->getResource();
						$userMenuArr[$rolePermission->getRolePermissionId()]['displayName'] = $rolePermission->getPermission()->getDisplayName();
						$userMenuArr[$rolePermission->getRolePermissionId()]['priority'] = $rolePermission->getPermission()->getPriority();
						$sortByPriorityArr[$rolePermission->getRolePermissionId()] =  $rolePermission->getPermission()->getPriority();
					}

				}
			}
		}
		array_multisort($sortByPriorityArr, SORT_ASC, $userMenuArr);
		$_SESSION['userMenu'] = $userMenuArr;
		$resource = isset($params['resource']) ? $params['resource'] : "";
		$privilege = isset($params['privilege']) ? $params['privilege'] : "";

		try{
			$acl = Zend_Registry::get("SRMAcl");
		}catch(Zend_Exception $e){
			$acl = new Web_Acl_SRMAcl();
		}
		return $acl->isAllowedForRoles($roleArr, $resource, $privilege);
	}
}
?>