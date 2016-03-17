<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * TeamleadUsers
 *
 * @Table(name="teamlead_users")
 * @Entity
 */
class TeamleadUsers
{
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @var Users
     *
     * @ManyToOne(targetEntity="Users")
     * @JoinColumns({
     *   @JoinColumn(name="teamlead_id", referencedColumnName="user_id")
     * })
     */
    private $teamlead;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param Users $user
     * @return TeamleadUsers
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
     * Set teamlead
     *
     * @param Users $teamlead
     * @return TeamleadUsers
     */
    public function setTeamlead(Users $teamlead = null)
    {
        $this->teamlead = $teamlead;
        return $this;
    }

    /**
     * Get teamlead
     *
     * @return Users
     */
    public function getTeamlead()
    {
        return $this->teamlead;
    }
}
