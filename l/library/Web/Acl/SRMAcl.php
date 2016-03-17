<?php
class Web_Acl_SRMAcl extends Zend_Acl{
	
	public function __construct(){
		$em = Zend_Registry::get("em");
		$qb = $em->createQueryBuilder();
		$query = $em->createQuery('select distinct p.resource from Entities\\Permissions p');
		$resourceObj = $query->getResult();
		if(count($resourceObj)){
			foreach($resourceObj as $k => $resource){
				$this->add(new Zend_Acl_Resource($resource['resource']));
			}
		}	
		
		$qb->select('r')->from('Entities\\Roles', 'r');
		$query = $qb->getQuery();
		$roles = $query->getResult();
		if(count($roles)){
			foreach($roles as $k => $role){
				$this->addRole(new Zend_Acl_Role($role->getRoleId()));
			}
		}
		
		$this->addRole(new Zend_Acl_Role(0));
		$qb->select('rp')->from('Entities\\RolePermissions', 'rp');
		$query = $qb->getQuery();
		$rolepermissions = $query->getResult();		
		if($rolepermissions!==false){
			foreach($rolepermissions as $k => $rolepermission){
				if($rolepermission->getAllow() == "Y"){
					$this->allow($rolepermission->getRole()->getRoleId(), $rolepermission->getPermission()->getResource(), $rolepermission->getPermission()->getPrivilage());
				}else{
					$this->deny($rolepermission->getRole()->getRoleId(), $rolepermission->getPermission()->getResource(), $rolepermission->getPermission()->getPrivilage());
				
				}
			}
		}
	}
	
	/**
	 * The method traverses over all given roles and returns true if at least one role has access to the given resource & privilege.
	 *
	 *
	 * @param  array     $roles
	 * @param  Zend_Acl_Resource_Interface|string $resource
	 * @param  string                             $privilege
	 * @uses   Zend_Acl::isAllowed()
	 * @return boolean
	 */
	public function isAllowedForRoles(array $roles, $resource = null, $privilege = null){
		if(count($roles)){
			foreach($roles as $role){
				if($this->has($resource) && $this->isAllowed($role, $resource, $privilege)){
					return true;
				}
			}
		}
		return false;
	}
}