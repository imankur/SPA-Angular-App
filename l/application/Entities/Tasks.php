<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Tasks
 *
 * @Table(name="tasks")
 * @Entity
 */
class Tasks
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
     * @var string $title
     *
     * @Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string $description
     *
     * @Column(name="description", type="string", length=2048, nullable=true)
     */
    private $description;

    /**
     * @var integer $noOfHours
     *
     * @Column(name="no_of_hours", type="integer", nullable=true)
     */
    private $noOfHours;

    /**
     * @var integer $noOfMinute
     *
     * @Column(name="no_of_minute", type="integer", nullable=true)
     */
    private $noOfMinute;

    /**
     * @var \DateTime $taskDate
     *
     * @Column(name="task_date", type="date", nullable=true)
     */
    private $taskDate;

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
     * @var Users
     *
     * @ManyToOne(targetEntity="Users")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     * @var Projects
     *
     * @ManyToOne(targetEntity="Projects")
     * @JoinColumns({
     *   @JoinColumn(name="project_id", referencedColumnName="project_id")
     * })
     */
    private $project;

    /**
     * @var Status
     *
     * @ManyToOne(targetEntity="Status")
     * @JoinColumns({
     *   @JoinColumn(name="status_id", referencedColumnName="id")
     * })
     */
    private $status;


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
     * Set title
     *
     * @param string $title
     * @return Tasks
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Tasks
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set noOfHours
     *
     * @param integer $noOfHours
     * @return Tasks
     */
    public function setNoOfHours($noOfHours)
    {
        $this->noOfHours = $noOfHours;
        return $this;
    }

    /**
     * Get noOfHours
     *
     * @return integer
     */
    public function getNoOfHours()
    {
        return $this->noOfHours;
    }

    /**
     * Set noOfMinute
     *
     * @param integer $noOfMinute
     * @return Tasks
     */
    public function setNoOfMinute($noOfMinute)
    {
        $this->noOfMinute = $noOfMinute;
        return $this;
    }

    /**
     * Get noOfMinute
     *
     * @return integer
     */
    public function getNoOfMinute()
    {
        return $this->noOfMinute;
    }

    /**
     * Set taskDate
     *
     * @param \DateTime $taskDate
     * @return Tasks
     */
    public function setTaskDate($taskDate)
    {
        $this->taskDate = $taskDate;
        return $this;
    }

    /**
     * Get taskDate
     *
     * @return \DateTime
     */
    public function getTaskDate()
    {
        return $this->taskDate;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Tasks
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
     * @return Tasks
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
     * Set user
     *
     * @param Users $user
     * @return Tasks
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
     * Set project
     *
     * @param Projects $project
     * @return Tasks
     */
    public function setProject(Projects $project = null)
    {
        $this->project = $project;
        return $this;
    }

    /**
     * Get project
     *
     * @return Projects
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set status
     *
     * @param Status $status
     * @return Tasks
     */
    public function setStatus(Status $status = null)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }
}
