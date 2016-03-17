<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Holidaysta
 *
 * @Table(name="HolidaysTA")
 * @Entity
 */
class Holidaysta
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
     * @var string $workgroups
     *
     * @Column(name="Workgroups", type="text", nullable=true)
     */
    private $workgroups;

    /**
     * @var integer $den
     *
     * @Column(name="Den", type="integer", nullable=true)
     */
    private $den;

    /**
     * @var integer $mesec
     *
     * @Column(name="Mesec", type="integer", nullable=true)
     */
    private $mesec;


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
     * @return Holidaysta
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
     * Set workgroups
     *
     * @param string $workgroups
     * @return Holidaysta
     */
    public function setWorkgroups($workgroups)
    {
        $this->workgroups = $workgroups;
        return $this;
    }

    /**
     * Get workgroups
     *
     * @return string
     */
    public function getWorkgroups()
    {
        return $this->workgroups;
    }

    /**
     * Set den
     *
     * @param integer $den
     * @return Holidaysta
     */
    public function setDen($den)
    {
        $this->den = $den;
        return $this;
    }

    /**
     * Get den
     *
     * @return integer
     */
    public function getDen()
    {
        return $this->den;
    }

    /**
     * Set mesec
     *
     * @param integer $mesec
     * @return Holidaysta
     */
    public function setMesec($mesec)
    {
        $this->mesec = $mesec;
        return $this;
    }

    /**
     * Get mesec
     *
     * @return integer
     */
    public function getMesec()
    {
        return $this->mesec;
    }
}
