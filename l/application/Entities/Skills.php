<?php
namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * Skills
 *
 * @Table(name="skills")
 * @Entity
 */
class Skills
{
    /**
     * @var integer $skillId
     *
     * @Column(name="skill_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $skillId;

    /**
     * @var string $skillName
     *
     * @Column(name="skill_name", type="string", length=45, nullable=false)
     */
    private $skillName;


    /**
     * Get skillId
     *
     * @return integer 
     */
    public function getSkillId()
    {
        return $this->skillId;
    }

    /**
     * Set skillName
     *
     * @param string $skillName
     * @return Skills
     */
    public function setSkillName($skillName)
    {
        $this->skillName = $skillName;
        return $this;
    }

    /**
     * Get skillName
     *
     * @return string 
     */
    public function getSkillName()
    {
        return $this->skillName;
    }
}
