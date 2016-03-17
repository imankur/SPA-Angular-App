<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmployeeActivity
 *
 * @Table(name="employee_activity")
 * @Entity
 */
class EmployeeActivity
{
    /**
     * @var integer $activityId
     *
     * @Column(name="activity_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $activityId;

    /**
     * @var integer $userId
     *
     * @Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var string $activityType
     *
     * @Column(name="activity_type", type="string", length=250, nullable=true)
     */
    private $activityType;

    /**
     * @var string $field
     *
     * @Column(name="field", type="string", length=250, nullable=true)
     */
    private $field;

    /**
     * @var string $value
     *
     * @Column(name="value", type="string", length=15000, nullable=true)
     */
    private $value;

    /**
     * @var integer $isOpened
     *
     * @Column(name="is_opened", type="bigint", nullable=true)
     */
    private $isOpened;

    /**
     * @var \DateTime $dateCreated
     *
     * @Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var \DateTime $dateUpdated
     *
     * @Column(name="date_updated", type="datetime", nullable=true)
     */
    private $dateUpdated;


    /**
     * Get activityId
     *
     * @return integer 
     */
    public function getActivityId()
    {
        return $this->activityId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return EmployeeActivity
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set activityType
     *
     * @param string $activityType
     * @return EmployeeActivity
     */
    public function setActivityType($activityType)
    {
        $this->activityType = $activityType;
        return $this;
    }

    /**
     * Get activityType
     *
     * @return string 
     */
    public function getActivityType()
    {
        return $this->activityType;
    }

    /**
     * Set field
     *
     * @param string $field
     * @return EmployeeActivity
     */
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }

    /**
     * Get field
     *
     * @return string 
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return EmployeeActivity
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set isOpened
     *
     * @param integer $isOpened
     * @return EmployeeActivity
     */
    public function setIsOpened($isOpened)
    {
        $this->isOpened = $isOpened;
        return $this;
    }

    /**
     * Get isOpened
     *
     * @return integer 
     */
    public function getIsOpened()
    {
        return $this->isOpened;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return EmployeeActivity
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     * @return EmployeeActivity
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime 
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }
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
     * Set user
     *
     * @param Users $user
     * @return EmployeeActivity
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
}