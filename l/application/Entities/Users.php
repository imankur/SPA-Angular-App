<?php

namespace Entities;
use Doctrine\Mapping as ORM;

/**
 * Users
 *
 * @Table(name="users")
 * @Entity
 */
class Users {

	public function __construct(){
		$this->userskilldetail = new \Doctrine\Common\Collections\ArrayCollection();
		$this->userrole = new \Doctrine\Common\Collections\ArrayCollection();
	}
	/**
	 * @OneToOne(targetEntity="UserDetail", mappedBy="user")
	 */
	private $userdetail;
	/**
	 * @OneToMany(targetEntity="UserSkillsDetail", mappedBy="user")
	 */
	private $userskilldetail;
	/**
	 * @OneToMany(targetEntity="UserRole", mappedBy="user")
	 */
	private $userrole;

	/**
	 * @OneToMany(targetEntity="EmployeeActivity", mappedBy="user")
	 */
	private $employeeactivity;
	/**
	 * @var integer $userId
	 *
	 * @Column(name="user_id", type="integer", nullable=false)
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 */
	private $userId;

	/**
	 * @var string $firstname
	 *
	 * @Column(name="firstname", type="string", length=45, nullable=true)
	 */
	private $firstname;

	/**
	 * @var string $lastname
	 *
	 * @Column(name="lastname", type="string", length=45, nullable=true)
	 */
	private $lastname;

	/**
	 * @var string $email
	 *
	 * @Column(name="email", type="string", length=250, nullable=true)
	 */
	private $email;

	/**
	 * @var string $password
	 *
	 * @Column(name="password", type="string", length=250, nullable=true)
	 */
	private $password;

	/**
	 * @var integer $empId
	 *
	 * @Column(name="emp_id", type="integer", nullable=true)
	 */
	private $empId;

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
	 * @var integer $isAdmin
	 *
	 * @Column(name="is_admin", type="bigint", nullable=true)
	 */
	private $isAdmin;

	/**
	 * @var integer $isActive
	 *
	 * @Column(name="is_active", type="bigint", nullable=true)
	 */
	private $isActive;

	/**
	 * @var string $phoneNumber
	 *
	 * @Column(name="phone_number", type="string", length=250, nullable=true)
	 */
	private $phoneNumber;

	/**
	 * @var string $username
	 *
	 * @Column(name="username", type="string", length=100, nullable=true)
	 */
	private $username;

	/**
	 * Get userId
	 *
	 * @return integer
	 */
	public function getUserId(){
		return $this->userId;
	}

	/**
	 * Set firstname
	 *
	 * @param string $firstname
	 * @return Users
	 */
	public function setFirstname($firstname){
		$this->firstname = $firstname;
		return $this;
	}

	/**
	 * Get firstname
	 *
	 * @return string
	 */
	public function getFirstname(){
		return $this->firstname;
	}

	/**
	 * Set lastname
	 *
	 * @param string $lastname
	 * @return Users
	 */
	public function setLastname($lastname){
		$this->lastname = $lastname;
		return $this;
	}

	/**
	 * Get lastname
	 *
	 * @return string
	 */
	public function getLastname(){
		return $this->lastname;
	}

	/**
	 * Set email
	 *
	 * @param string $email
	 * @return Users
	 */
	public function setEmail($email){
		$this->email = $email;
		return $this;
	}

	/**
	 * Get email
	 *
	 * @return string
	 */
	public function getEmail(){
		return $this->email;
	}

	/**
	 * Set password
	 *
	 * @param string $password
	 * @return Users
	 */
	public function setPassword($password){
		$this->password = $password;
		return $this;
	}

	/**
	 * Get password
	 *
	 * @return string
	 */
	public function getPassword(){
		return $this->password;
	}

	/**
	 * Set empId
	 *
	 * @param integer $empId
	 * @return Users
	 */
	public function setEmpId($empId){
		$this->empId = $empId;
		return $this;
	}

	/**
	 * Get empId
	 *
	 * @return integer
	 */
	public function getEmpId(){
		return $this->empId;
	}

	/**
	 * Set dateCreated
	 *
	 * @param \DateTime $dateCreated
	 * @return Users
	 */
	public function setDateCreated($dateCreated){
		$this->dateCreated = $dateCreated;
		return $this;
	}

	/**
	 * Get dateCreated
	 *
	 * @return \DateTime
	 */
	public function getDateCreated(){
		return $this->dateCreated;
	}

	/**
	 * Set dateUpdated
	 *
	 * @param \DateTime $dateUpdated
	 * @return Users
	 */
	public function setDateUpdated($dateUpdated){
		$this->dateUpdated = $dateUpdated;
		return $this;
	}

	/**
	 * Get dateUpdated
	 *
	 * @return \DateTime
	 */
	public function getDateUpdated(){
		return $this->dateUpdated;
	}

	/**
	 * Set isAdmin
	 *
	 * @param integer $isAdmin
	 * @return Users
	 */
	public function setIsAdmin($isAdmin){
		$this->isAdmin = $isAdmin;
		return $this;
	}

	/**
	 * Get isAdmin
	 *
	 * @return integer
	 */
	public function getIsAdmin(){
		return $this->isAdmin;
	}

	/**
	 * Set isActive
	 *
	 * @param integer $isActive
	 * @return Users
	 */
	public function setIsActive($isActive){
		$this->isActive = $isActive;
		return $this;
	}

	/**
	 * Get isActive
	 *
	 * @return integer
	 */
	public function getIsActive(){
		return $this->isActive;
	}

	/**
	 * Set phoneNumber
	 *
	 * @param string $phoneNumber
	 * @return Users
	 */
	public function setPhoneNumber($phoneNumber){
		$this->phoneNumber = $phoneNumber;
		return $this;
	}

	/**
	 * Get phoneNumber
	 *
	 * @return string
	 */
	public function getPhoneNumber(){
		return $this->phoneNumber;
	}

	/**
	 * Set username
	 *
	 * @param string $username
	 * @return Users
	 */
	public function setUsername($username){
		$this->username = $username;
		return $this;
	}

	/**
	 * Get username
	 *
	 * @return string
	 */
	public function getUsername(){
		return $this->username;
	}

	/**
	 * Get userdetail
	 *
	 * @return UserDetail $userdetail
	 */
	public function getUserDetail(){
		return $this->userdetail;
	}

	/**
	 * Set userdetail
	 *
	 * @param UserDetail $userdetail
	 */
	public function setUserDetail($userdetail){
		$this->userdetail = $userdetail;
	}

	/**
	 * Get userskilldetail
	 *
	 * @return array $userskilldetail
	 */
	public function getUserSkillDetail(){
		return $this->userskilldetail;
	}

	/**
	 * Set userskilldetail
	 *
	 * @param array $userskilldetail
	 */
	public function setUserSkillDetail($userskilldetail){
		$this->userskilldetail = $userskilldetail;
	}

	/**
	 * Get employeeactivity
	 *
	 * @return array $employeeactivity
	 */
	public function getEmployeeActivity(){
		return $this->employeeactivity;
	}

	/**
	 * Set employeeactivity
	 *
	 * @param array $employeeactivity
	 */
	public function setEmployeeActivity($employeeactivity){
		$this->employeeactivity = $employeeactivity;
	}

	/**
	 * Get userrole
	 *
	 * @return array $userrole
	 */
	public function getUserRole(){
		return $this->userrole;
	}

	/**
	 * Set userrole
	 *
	 * @param array $userrole
	 */
	public function setUserRole($userrole){
		$this->userrole = $userrole;
	}
}
