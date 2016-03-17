<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * UserDetail
 *
 * @Table(name="user_detail")
 * @Entity
 */
class UserDetail
{
    /**
     * @var integer $userDetailId
     *
     * @Column(name="user_detail_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $userDetailId;

    /**
     * @var integer $expYears
     *
     * @Column(name="exp_years", type="integer", nullable=true)
     */
    private $expYears;

    /**
     * @var integer $expMonths
     *
     * @Column(name="exp_months", type="integer", nullable=true)
     */
    private $expMonths;

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
     * @var \DateTime $careerStarted
     *
     * @Column(name="career_started", type="date", nullable=true)
     */
    private $careerStarted;

    /**
     * @var \DateTime $careerSynergy
     *
     * @Column(name="career_synergy", type="date", nullable=true)
     */
    private $careerSynergy;

    /**
     * @var string $presentAddress
     *
     * @Column(name="present_address", type="string", length=50, nullable=true)
     */
    private $presentAddress;

    /**
     * @var string $presentCity
     *
     * @Column(name="present_city", type="string", length=20, nullable=true)
     */
    private $presentCity;

    /**
     * @var string $presentPincode
     *
     * @Column(name="present_pincode", type="string", length=10, nullable=true)
     */
    private $presentPincode;

    /**
     * @var string $permanentAddress
     *
     * @Column(name="permanent_address", type="string", length=50, nullable=true)
     */
    private $permanentAddress;

    /**
     * @var string $permanentCity
     *
     * @Column(name="permanent_city", type="string", length=20, nullable=true)
     */
    private $permanentCity;

    /**
     * @var string $permanentPincode
     *
     * @Column(name="permanent_pincode", type="string", length=10, nullable=true)
     */
    private $permanentPincode;

    /**
     * @var State
     *
     * @ManyToOne(targetEntity="State")
     * @JoinColumns({
     *   @JoinColumn(name="present_state_id", referencedColumnName="id")
     * })
     */
    private $presentState;

    /**
     * @var Technology
     *
     * @ManyToOne(targetEntity="Technology")
     * @JoinColumns({
     *   @JoinColumn(name="main_technology_id", referencedColumnName="id")
     * })
     */
    private $mainTechnology;

    /**
     * @var State
     *
     * @ManyToOne(targetEntity="State")
     * @JoinColumns({
     *   @JoinColumn(name="permanent_state_id", referencedColumnName="id")
     * })
     */
    private $permanentState;

    /**
     * @var Position
     *
     * @ManyToOne(targetEntity="Position")
     * @JoinColumns({
     *   @JoinColumn(name="position_id", referencedColumnName="position_id")
     * })
     */
    private $position;

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
     * @var \DateTime $birthday
     *
     * @Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;


    /**
     * Get userDetailId
     *
     * @return integer
     */
    public function getUserDetailId()
    {
        return $this->userDetailId;
    }

    /**
     * Set expYears
     *
     * @param integer $expYears
     * @return UserDetail
     */
    public function setExpYears($expYears)
    {
        $this->expYears = $expYears;
        return $this;
    }

    /**
     * Get expYears
     *
     * @return integer
     */
    public function getExpYears()
    {
        return $this->expYears;
    }

    /**
     * Set expMonths
     *
     * @param integer $expMonths
     * @return UserDetail
     */
    public function setExpMonths($expMonths)
    {
        $this->expMonths = $expMonths;
        return $this;
    }

    /**
     * Get expMonths
     *
     * @return integer
     */
    public function getExpMonths()
    {
        return $this->expMonths;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return UserDetail
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
     * @return UserDetail
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
     * Set careerStarted
     *
     * @param \DateTime $careerStarted
     * @return UserDetail
     */
    public function setCareerStarted($careerStarted)
    {
        $this->careerStarted = $careerStarted;
        return $this;
    }

    /**
     * Get careerStarted
     *
     * @return \DateTime
     */
    public function getCareerStarted()
    {
        return $this->careerStarted;
    }

    /**
     * Set careerSynergy
     *
     * @param \DateTime $careerSynergy
     * @return UserDetail
     */
    public function setCareerSynergy($careerSynergy)
    {
        $this->careerSynergy = $careerSynergy;
        return $this;
    }

    /**
     * Get careerSynergy
     *
     * @return \DateTime
     */
    public function getCareerSynergy()
    {
        return $this->careerSynergy;
    }

    /**
     * Set presentAddress
     *
     * @param string $presentAddress
     * @return UserDetail
     */
    public function setPresentAddress($presentAddress)
    {
        $this->presentAddress = $presentAddress;
        return $this;
    }

    /**
     * Get presentAddress
     *
     * @return string
     */
    public function getPresentAddress()
    {
        return $this->presentAddress;
    }

    /**
     * Set presentCity
     *
     * @param string $presentCity
     * @return UserDetail
     */
    public function setPresentCity($presentCity)
    {
        $this->presentCity = $presentCity;
        return $this;
    }

    /**
     * Get presentCity
     *
     * @return string
     */
    public function getPresentCity()
    {
        return $this->presentCity;
    }

    /**
     * Set presentPincode
     *
     * @param string $presentPincode
     * @return UserDetail
     */
    public function setPresentPincode($presentPincode)
    {
        $this->presentPincode = $presentPincode;
        return $this;
    }

    /**
     * Get presentPincode
     *
     * @return string
     */
    public function getPresentPincode()
    {
        return $this->presentPincode;
    }

    /**
     * Set permanentAddress
     *
     * @param string $permanentAddress
     * @return UserDetail
     */
    public function setPermanentAddress($permanentAddress)
    {
        $this->permanentAddress = $permanentAddress;
        return $this;
    }

    /**
     * Get permanentAddress
     *
     * @return string
     */
    public function getPermanentAddress()
    {
        return $this->permanentAddress;
    }

    /**
     * Set permanentCity
     *
     * @param string $permanentCity
     * @return UserDetail
     */
    public function setPermanentCity($permanentCity)
    {
        $this->permanentCity = $permanentCity;
        return $this;
    }

    /**
     * Get permanentCity
     *
     * @return string
     */
    public function getPermanentCity()
    {
        return $this->permanentCity;
    }

    /**
     * Set permanentPincode
     *
     * @param string $permanentPincode
     * @return UserDetail
     */
    public function setPermanentPincode($permanentPincode)
    {
        $this->permanentPincode = $permanentPincode;
        return $this;
    }

    /**
     * Get permanentPincode
     *
     * @return string
     */
    public function getPermanentPincode()
    {
        return $this->permanentPincode;
    }

    /**
     * Set presentState
     *
     * @param State $presentState
     * @return UserDetail
     */
    public function setPresentState(State $presentState = null)
    {
        $this->presentState = $presentState;
        return $this;
    }

    /**
     * Get presentState
     *
     * @return State
     */
    public function getPresentState()
    {
        return $this->presentState;
    }

    /**
     * Set mainTechnology
     *
     * @param Technology $mainTechnology
     * @return UserDetail
     */
    public function setMainTechnology(Technology $mainTechnology = null)
    {
        $this->mainTechnology = $mainTechnology;
        return $this;
    }

    /**
     * Get mainTechnology
     *
     * @return Technology
     */
    public function getMainTechnology()
    {
        return $this->mainTechnology;
    }

    /**
     * Set permanentState
     *
     * @param State $permanentState
     * @return UserDetail
     */
    public function setPermanentState(State $permanentState = null)
    {
        $this->permanentState = $permanentState;
        return $this;
    }

    /**
     * Get permanentState
     *
     * @return State
     */
    public function getPermanentState()
    {
        return $this->permanentState;
    }

    /**
     * Set position
     *
     * @param Position $position
     * @return UserDetail
     */
    public function setPosition(Position $position = null)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * Get position
     *
     * @return Position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set user
     *
     * @param Users $user
     * @return UserDetail
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
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Users
     */
    public function setBirthday($birthday)
    {
    	$this->birthday = $birthday;
    	return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
    	return $this->birthday;
    }
}
