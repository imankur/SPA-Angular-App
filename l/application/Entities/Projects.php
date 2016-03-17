<?php
namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * Projects
 *
 * @Table(name="projects")
 * @Entity
 */
class Projects
{
    /**
     * @var integer $proectId
     *
     * @Column(name="project_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $projectId;

    /**
     * @var string $projectName
     *
     * @Column(name="project_name", type="string", length=45, nullable=false)
     */
    private $projectName;


    /**
     * Get projectId
     *
     * @return integer 
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set projectName
     *
     * @param string $projectName
     * @return Projects
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;
        return $this;
    }

    /**
     * Get projectName
     *
     * @return string 
     */
    public function getProjectName()
    {
        return $this->projectName;
    }
}
