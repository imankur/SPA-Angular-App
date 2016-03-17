<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserRole
 *
 * @Table(name="user_role")
 * @Entity
 */
class UserRole
{
    /**
     * @var integer $userRoleId
     *
     * @Column(name="user_role_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $userRoleId;

   /**
     * @var Users
     *
     * @ManyToOne(targetEntity="Users")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

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
     * Get userRoleId
     *
     * @return integer 
     */
    public function getUserRoleId()
    {
        return $this->userRoleId;
    }

    /**
     * Set user
     *
     * @param Users $user
     * @return UserSkillsDetail
     */
    public function setUser(Users $user = null)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return Users 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set role
     *
     * @param Roles $role
     * @return UserRole
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
}