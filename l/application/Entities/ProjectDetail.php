<?php
namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectDetail
 *
 * @Table(name="project_detail")
 * @Entity
 */
class ProjectDetail
{
    /**
     * @var integer $projectDetailId
     *
     * @Column(name="project_detail_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $projectDetailId;

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
     * @var UserSkillsDetail
     *
     * @ManyToOne(targetEntity="UserSkillsDetail")
     * @JoinColumns({
     *   @JoinColumn(name="user_skill_detail_id", referencedColumnName="user_skills_detail_id")
     * })
     */
    private $userSkillDetail;


    /**
     * Get projectDetailId
     *
     * @return integer 
     */
    public function getProjectDetailId()
    {
        return $this->projectDetailId;
    }

    /**
     * Set project
     *
     * @param Projects $project
     * @return ProjectDetail
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
     * Set userSkillDetail
     *
     * @param UserSkillsDetail $userSkillDetail
     * @return ProjectDetail
     */
    public function setUserSkillDetail(UserSkillsDetail $userSkillDetail = null)
    {
        $this->userSkillDetail = $userSkillDetail;
        return $this;
    }

    /**
     * Get userSkillDetail
     *
     * @return UserSkillsDetail 
     */
    public function getUserSkillDetail()
    {
        return $this->userSkillDetail;
    }
}
