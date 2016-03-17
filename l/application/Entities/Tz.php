<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Tz
 *
 * @Table(name="TZ")
 * @Entity
 */
class Tz
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
     * @var \DateTime $pocetok
     *
     * @Column(name="Pocetok", type="datetime", nullable=true)
     */
    private $pocetok;

    /**
     * @var \DateTime $kraj
     *
     * @Column(name="Kraj", type="datetime", nullable=true)
     */
    private $kraj;

    /**
     * @var integer $wd
     *
     * @Column(name="WD", type="integer", nullable=true)
     */
    private $wd;


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
     * @return Tz
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
     * Set pocetok
     *
     * @param \DateTime $pocetok
     * @return Tz
     */
    public function setPocetok($pocetok)
    {
        $this->pocetok = $pocetok;
        return $this;
    }

    /**
     * Get pocetok
     *
     * @return \DateTime
     */
    public function getPocetok()
    {
        return $this->pocetok;
    }

    /**
     * Set kraj
     *
     * @param \DateTime $kraj
     * @return Tz
     */
    public function setKraj($kraj)
    {
        $this->kraj = $kraj;
        return $this;
    }

    /**
     * Get kraj
     *
     * @return \DateTime
     */
    public function getKraj()
    {
        return $this->kraj;
    }

    /**
     * Set wd
     *
     * @param integer $wd
     * @return Tz
     */
    public function setWd($wd)
    {
        $this->wd = $wd;
        return $this;
    }

    /**
     * Get wd
     *
     * @return integer
     */
    public function getWd()
    {
        return $this->wd;
    }
}
