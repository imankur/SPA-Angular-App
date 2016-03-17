<?php
namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * Level
 *
 * @Table(name="level")
 * @Entity
 */
class Level
{
    /**
     * @var integer $levelId
     *
     * @Column(name="level_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $levelId;

    /**
     * @var string $levelName
     *
     * @Column(name="level_name", type="string", length=45, nullable=false)
     */
    private $levelName;


    /**
     * Get levelId
     *
     * @return integer 
     */
    public function getLevelId()
    {
        return $this->levelId;
    }

    /**
     * Set levelName
     *
     * @param string $levelName
     * @return Level
     */
    public function setLevelName($levelName)
    {
        $this->levelName = $levelName;
        return $this;
    }

    /**
     * Get levelName
     *
     * @return string 
     */
    public function getLevelName()
    {
        return $this->levelName;
    }
}
