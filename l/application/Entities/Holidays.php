<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Holidays
 *
 * @Table(name="Holidays")
 * @Entity
 */
class Holidays
{
    /**
     * @var integer $redbr
     *
     * @Column(name="RedBr", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $redbr;

    /**
     * @var string $name
     *
     * @Column(name="Name", type="string", length=30, nullable=true)
     */
    private $name;

    /**
     * @var \DateTime $den
     *
     * @Column(name="Den", type="datetime", nullable=true)
     */
    private $den;

    /**
     * @var boolean $repeat
     *
     * @Column(name="Repeat", type="boolean", nullable=true)
     */
    private $repeat;


    /**
     * Get redbr
     *
     * @return integer
     */
    public function getRedbr()
    {
        return $this->redbr;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Holidays
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set den
     *
     * @param \DateTime $den
     * @return Holidays
     */
    public function setDen($den)
    {
        $this->den = $den;
        return $this;
    }

    /**
     * Get den
     *
     * @return \DateTime
     */
    public function getDen()
    {
        return $this->den;
    }

    /**
     * Set repeat
     *
     * @param boolean $repeat
     * @return Holidays
     */
    public function setRepeat($repeat)
    {
        $this->repeat = $repeat;
        return $this;
    }

    /**
     * Get repeat
     *
     * @return boolean
     */
    public function getRepeat()
    {
        return $this->repeat;
    }
}
