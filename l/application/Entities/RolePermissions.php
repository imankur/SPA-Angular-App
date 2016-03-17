<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * RolePermissions
 *
 * @Table(name="role_permissions")
 * @Entity
 */
class RolePermissions
{
    /**
     * @var integer $rolePermissionId
     *
     * @Column(name="role_permission_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $rolePermissionId;
    
    /**
     * @var string $allow
     *
     * @Column(name="allow", type="string", nullable=false)
     */
    private $allow;

    /**
     * @var Permissions
     *
     * @ManyToOne(targetEntity="Permissions")
     * @JoinColumns({
     *   @JoinColumn(name="permission_id", referencedColumnName="permission_id")
     * })
     */
    private $permission;

    /**
     * @var Roles
     *
     * @ManyToOne(targetEntity="Roles")
     * @JoinColumns({
     *   @JoinColumn(name="role_id", referencedColumnName="role_id")
     * })
     */
    private $role;


    /**
     * Get rolePermissionId
     *
     * @return integer 
     */
    public function getRolePermissionId()
    {
        return $this->rolePermissionId;
    }

    /**
     * Set permission
     *
     * @param Permissions $permission
     * @return RolePermissions
     */
    public function setPermission(Permissions $permission = null)
    {
        $this->permission = $permission;
        return $this;
    }

    /**
     * Get permission
     *
     * @return Permissions 
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * Set role
     *
     * @param Roles $role
     * @return RolePermissions
     */
    public function setRole(Roles $role = null)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * Get role
     *
     * @return Roles 
     */
    public function getRole()
    {
        return $this->role;
    }
    
    /**
     * Set allow
     *
     * @param string allow
     * @return RolePermissions
     */
    public function setAllow($allow)
    {
    	$this->allow = $allow;
    	return $this;
    }
    
    /**
     * Get allow
     *
     * @return string
     */
    public function getAllow()
    {
    	return $this->allow;
    }
}