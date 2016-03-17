<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Fo
 *
 * @Table(name="FO")
 * @Entity
 */
class Fo
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
     * @var integer $vreme
     *
     * @Column(name="Vreme", type="integer", nullable=true)
     */
    private $vreme;

    /**
     * @var integer $fatz
     *
     * @Column(name="FATZ", type="integer", nullable=true)
     */
    private $fatz;

    /**
     * @var boolean $enable
     *
     * @Column(name="Enable", type="boolean", nullable=true)
     */
    private $enable;

    /**
     * @var integer $followds
     *
     * @Column(name="FollowDS", type="integer", nullable=true)
     */
    private $followds;

    /**
     * @var integer $controller
     *
     * @Column(name="Controller", type="integer", nullable=true)
     */
    private $controller;

    /**
     * @var integer $fo
     *
     * @Column(name="FO", type="integer", nullable=true)
     */
    private $fo;

    /**
     * @var integer $followdr
     *
     * @Column(name="FollowDR", type="integer", nullable=true)
     */
    private $followdr;


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
     * @return Fo
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
     * Set vreme
     *
     * @param integer $vreme
     * @return Fo
     */
    public function setVreme($vreme)
    {
        $this->vreme = $vreme;
        return $this;
    }

    /**
     * Get vreme
     *
     * @return integer
     */
    public function getVreme()
    {
        return $this->vreme;
    }

    /**
     * Set fatz
     *
     * @param integer $fatz
     * @return Fo
     */
    public function setFatz($fatz)
    {
        $this->fatz = $fatz;
        return $this;
    }

    /**
     * Get fatz
     *
     * @return integer
     */
    public function getFatz()
    {
        return $this->fatz;
    }

    /**
     * Set enable
     *
     * @param boolean $enable
     * @return Fo
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
        return $this;
    }

    /**
     * Get enable
     *
     * @return boolean
     */
    public function getEnable()
    {
        return $this->enable;
    }

    /**
     * Set followds
     *
     * @param integer $followds
     * @return Fo
     */
    public function setFollowds($followds)
    {
        $this->followds = $followds;
        return $this;
    }

    /**
     * Get followds
     *
     * @return integer
     */
    public function getFollowds()
    {
        return $this->followds;
    }

    /**
     * Set controller
     *
     * @param integer $controller
     * @return Fo
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    /**
     * Get controller
     *
     * @return integer
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set fo
     *
     * @param integer $fo
     * @return Fo
     */
    public function setFo($fo)
    {
        $this->fo = $fo;
        return $this;
    }

    /**
     * Get fo
     *
     * @return integer
     */
    public function getFo()
    {
        return $this->fo;
    }

    /**
     * Set followdr
     *
     * @param integer $followdr
     * @return Fo
     */
    public function setFollowdr($followdr)
    {
        $this->followdr = $followdr;
        return $this;
    }

    /**
     * Get followdr
     *
     * @return integer
     */
    public function getFollowdr()
    {
        return $this->followdr;
    }
}
