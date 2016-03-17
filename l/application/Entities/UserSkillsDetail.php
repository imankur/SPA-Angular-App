<?php
namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * UserSkillsDetail
 *
 * @Table(name="user_skills_detail")
 * @Entity
 */
class UserSkillsDetail
{
	public function __construct() {
		$this->projectdetail = new  \Doctrine\Common\Collections\ArrayCollection();
	}
	/**
	 * @OneToMany(targetEntity="ProjectDetail", mappedBy="userSkillDetail")
	 */
	private $projectdetail;
    /**
     * @var integer $userSkillsDetailId
     *
     * @Column(name="user_skills_detail_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $userSkillsDetailId;

    /**
     * @var string $expMonths
     *
     * @Column(name="exp_months", type="string", nullable=true)
     */
    private $expMonths;

    /**
     * @var integer $lastUsedYear
     *
     * @Column(name="last_used_year", type="integer", nullable=true)
     */
    private $lastUsedYear;

    /**
     * @var string $lastUsedMonth
     *
     * @Column(name="last_used_month", type="string", nullable=true)
     */
    private $lastUsedMonth;

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
     * @var Level
     *
     * @ManyToOne(targetEntity="Level")
     * @JoinColumns({
     *   @JoinColumn(name="level_id", referencedColumnName="level_id")
     * })
     */
    private $level;

    /**
     * @var Skills
     *
     * @ManyToOne(targetEntity="Skills")
     * @JoinColumns({
     *   @JoinColumn(name="skill_id", referencedColumnName="skill_id")
     * })
     */
    private $skill;
    
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
     * @var integer $isVerified
     *
     * @Column(name="is_verified", type="bigint", nullable=true)
     */
    private $isVerified;

    /**
     * Get userSkillsDetailId
     *
     * @return integer 
     */
    public function getUserSkillsDetailId()
    {
        return $this->userSkillsDetailId;
    }

    /**
     * Set expMonths
     *
     * @param string $expMonths
     * @return UserSkillsDetail
     */
    public function setExpMonths($expMonths)
    {
        $this->expMonths = $expMonths;
        return $this;
    }

    /**
     * Get expMonths
     *
     * @return string 
     */
    public function getExpMonths()
    {
        return $this->expMonths;
    }

    /**
     * Set lastUsedYear
     *
     * @param integer $lastUsedYear
     * @return UserSkillsDetail
     */
    public function setLastUsedYear($lastUsedYear)
    {
        $this->lastUsedYear = $lastUsedYear;
        return $this;
    }

    /**
     * Get lastUsedYear
     *
     * @return integer 
     */
    public function getLastUsedYear()
    {
        return $this->lastUsedYear;
    }

    /**
     * Set lastUsedMonth
     *
     * @param string $lastUsedMonth
     * @return UserSkillsDetail
     */
    public function setLastUsedMonth($lastUsedMonth)
    {
        $this->lastUsedMonth = $lastUsedMonth;
        return $this;
    }

    /**
     * Get lastUsedMonth
     *
     * @return string 
     */
    public function getLastUsedMonth()
    {
        return $this->lastUsedMonth;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return UserSkillsDetail
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
     * @return UserSkillsDetail
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
     * Set level
     *
     * @param Level $level
     * @return UserSkillsDetail
     */
    public function setLevel(Level $level = null)
    {
        $this->level = $level;
        return $this;
    }

    /**
     * Get level
     *
     * @return Level 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set skill
     *
     * @param Skills $skill
     * @return UserSkillsDetail
     */
    public function setSkill(Skills $skill = null)
    {
        $this->skill = $skill;
        return $this;
    }

    /**
     * Get skill
     *
     * @return Skills 
     */
    public function getSkill()
    {
        return $this->skill;
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
     * Get projectdetail
     *
     * @return array $projectdetail
     */
    public function getProjectDetail()
    {
    	return $this->projectdetail;
    }
    /**
     * Set projectdetail
     *
     * @param array $projectdetail
     */
    public function setProjectDetail($projectdetail)
    {
    	$this->projectdetail = $projectdetail;
    }
    
    /**
     * Set isVerified
     *
     * @param integer $isVerified
     * @return UserSkillsDetail
     */
    public function setIsVerified($isVerified){
    	$this->isVerified = $isVerified;
    	return $this;
    }
    
    /**
     * Get isVerified
     *
     * @return integer
     */
    public function getIsVerified(){
    	return $this->isVerified;
    }
    
}
