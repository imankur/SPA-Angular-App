<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Fi
 *
 * @Table(name="FI")
 * @Entity
 */
class Fi
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
     * @var boolean $nc
     *
     * @Column(name="NC", type="boolean", nullable=true)
     */
    private $nc;

    /**
     * @var integer $fo
     *
     * @Column(name="FO", type="integer", nullable=true)
     */
    private $fo;

    /**
     * @var integer $enabledbytz
     *
     * @Column(name="EnabledByTZ", type="integer", nullable=true)
     */
    private $enabledbytz;

    /**
     * @var boolean $enable
     *
     * @Column(name="Enable", type="boolean", nullable=true)
     */
    private $enable;

    /**
     * @var integer $door
     *
     * @Column(name="Door", type="integer", nullable=true)
     */
    private $door;

    /**
     * @var boolean $fire
     *
     * @Column(name="Fire", type="boolean", nullable=true)
     */
    private $fire;

    /**
     * @var integer $controller
     *
     * @Column(name="Controller", type="integer", nullable=true)
     */
    private $controller;

    /**
     * @var integer $fi
     *
     * @Column(name="FI", type="integer", nullable=true)
     */
    private $fi;

    /**
     * @var boolean $enabledbytzyn
     *
     * @Column(name="EnabledByTZYN", type="boolean", nullable=true)
     */
    private $enabledbytzyn;

    /**
     * @var integer $delay
     *
     * @Column(name="Delay", type="smallint", nullable=true)
     */
    private $delay;


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
     * @return Fi
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
     * Set nc
     *
     * @param boolean $nc
     * @return Fi
     */
    public function setNc($nc)
    {
        $this->nc = $nc;
        return $this;
    }

    /**
     * Get nc
     *
     * @return boolean
     */
    public function getNc()
    {
        return $this->nc;
    }

    /**
     * Set fo
     *
     * @param integer $fo
     * @return Fi
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
     * Set enabledbytz
     *
     * @param integer $enabledbytz
     * @return Fi
     */
    public function setEnabledbytz($enabledbytz)
    {
        $this->enabledbytz = $enabledbytz;
        return $this;
    }

    /**
     * Get enabledbytz
     *
     * @return integer
     */
    public function getEnabledbytz()
    {
        return $this->enabledbytz;
    }

    /**
     * Set enable
     *
     * @param boolean $enable
     * @return Fi
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
     * Set door
     *
     * @param integer $door
     * @return Fi
     */
    public function setDoor($door)
    {
        $this->door = $door;
        return $this;
    }

    /**
     * Get door
     *
     * @return integer
     */
    public function getDoor()
    {
        return $this->door;
    }

    /**
     * Set fire
     *
     * @param boolean $fire
     * @return Fi
     */
    public function setFire($fire)
    {
        $this->fire = $fire;
        return $this;
    }

    /**
     * Get fire
     *
     * @return boolean
     */
    public function getFire()
    {
        return $this->fire;
    }

    /**
     * Set controller
     *
     * @param integer $controller
     * @return Fi
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
     * Set fi
     *
     * @param integer $fi
     * @return Fi
     */
    public function setFi($fi)
    {
        $this->fi = $fi;
        return $this;
    }

    /**
     * Get fi
     *
     * @return integer
     */
    public function getFi()
    {
        return $this->fi;
    }

    /**
     * Set enabledbytzyn
     *
     * @param boolean $enabledbytzyn
     * @return Fi
     */
    public function setEnabledbytzyn($enabledbytzyn)
    {
        $this->enabledbytzyn = $enabledbytzyn;
        return $this;
    }

    /**
     * Get enabledbytzyn
     *
     * @return boolean
     */
    public function getEnabledbytzyn()
    {
        return $this->enabledbytzyn;
    }

    /**
     * Set delay
     *
     * @param integer $delay
     * @return Fi
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;
        return $this;
    }

    /**
     * Get delay
     *
     * @return integer
     */
    public function getDelay()
    {
        return $this->delay;
    }
}
