<?php
namespace Entities;


use Doctrine\Mapping as ORM;

/**
 * Position
 *
 * @Table(name="position")
 * @Entity
 */
class Position
{
    /**
     * @var integer $positionId
     *
     * @Column(name="position_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $positionId;

    /**
     * @var string $position
     *
     * @Column(name="position", type="string", length=45, nullable=false)
     */
    private $position;


    /**
     * Get positionId
     *
     * @return integer 
     */
    public function getPositionId()
    {
        return $this->positionId;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return Position
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }
}
