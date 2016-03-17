<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roles
 *
 * @Table(name="roles")
 * @Entity
 */
class Roles
{
	
	public function __construct(){
		$this->rolepermission = new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	/**
	 * @OneToMany(targetEntity="RolePermissions", mappedBy="role")
	 */
	private $rolepermission;
	
    /**
     * @var integer $roleId
     *
     * @Column(name="role_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $roleId;

    /**
     * @var string $roleName
     *
     * @Column(name="role_name", type="string", length=250, nullable=true)
     */
    private $roleName;


    /**
     * Get roleId
     *
     * @return integer 
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set roleName
     *
     * @param string $roleName
     * @return Roles
     */
    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;
        return $this;
    }

    /**
     * Get roleName
     *
     * @return string 
     */
    public function getRoleName()
    {
        return $this->roleName;
    }
    
    /**
     * Get rolepermission
     *
     * @return array rolepermission
     */
    public function getRolePermission(){
    	return $this->rolepermission;
    }
    
    /**
     * Set rolepermission
     *
     * @param array $rolepermission
     */
    public function setRolePermission($rolepermission){
    	$this->rolepermission = $rolepermission;
    }
}