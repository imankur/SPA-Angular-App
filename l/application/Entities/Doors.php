<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Doors
 *
 * @Table(name="Doors")
 * @Entity
 */
class Doors
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
     * @var integer $type
     *
     * @Column(name="Type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var integer $locktime
     *
     * @Column(name="LockTime", type="integer", nullable=true)
     */
    private $locktime;

    /**
     * @var integer $freeout
     *
     * @Column(name="FreeOut", type="integer", nullable=true)
     */
    private $freeout;

    /**
     * @var integer $ajarfo
     *
     * @Column(name="AjarFO", type="integer", nullable=true)
     */
    private $ajarfo;

    /**
     * @var integer $alarmfo
     *
     * @Column(name="AlarmFO", type="integer", nullable=true)
     */
    private $alarmfo;

    /**
     * @var integer $ajartime
     *
     * @Column(name="AjarTime", type="integer", nullable=true)
     */
    private $ajartime;

    /**
     * @var integer $alarmtime
     *
     * @Column(name="AlarmTime", type="integer", nullable=true)
     */
    private $alarmtime;

    /**
     * @var boolean $sensornc
     *
     * @Column(name="SensorNC", type="boolean", nullable=true)
     */
    private $sensornc;

    /**
     * @var integer $forcedfo
     *
     * @Column(name="ForcedFO", type="integer", nullable=true)
     */
    private $forcedfo;

    /**
     * @var boolean $enablesensor
     *
     * @Column(name="EnableSensor", type="boolean", nullable=true)
     */
    private $enablesensor;

    /**
     * @var boolean $enable
     *
     * @Column(name="Enable", type="boolean", nullable=true)
     */
    private $enable;

    /**
     * @var integer $fatz
     *
     * @Column(name="FATZ", type="integer", nullable=true)
     */
    private $fatz;

    /**
     * @var integer $enabletz
     *
     * @Column(name="EnableTZ", type="integer", nullable=true)
     */
    private $enabletz;

    /**
     * @var integer $disablebyfi
     *
     * @Column(name="DisableByFI", type="integer", nullable=true)
     */
    private $disablebyfi;

    /**
     * @var boolean $pbnc
     *
     * @Column(name="PBNC", type="boolean", nullable=true)
     */
    private $pbnc;

    /**
     * @var integer $pbfo
     *
     * @Column(name="PBFO", type="integer", nullable=true)
     */
    private $pbfo;

    /**
     * @var integer $pbenablebytz
     *
     * @Column(name="PBEnableByTZ", type="integer", nullable=true)
     */
    private $pbenablebytz;

    /**
     * @var boolean $pbenable
     *
     * @Column(name="PBEnable", type="boolean", nullable=true)
     */
    private $pbenable;

    /**
     * @var integer $controller
     *
     * @Column(name="Controller", type="integer", nullable=true)
     */
    private $controller;

    /**
     * @var integer $door
     *
     * @Column(name="Door", type="integer", nullable=true)
     */
    private $door;

    /**
     * @var boolean $pbenabledbytz
     *
     * @Column(name="PBEnabledByTZ", type="boolean", nullable=true)
     */
    private $pbenabledbytz;

    /**
     * @var boolean $drenabledbytz
     *
     * @Column(name="DREnabledByTZ", type="boolean", nullable=true)
     */
    private $drenabledbytz;

    /**
     * @var boolean $resetalarmoutbyds
     *
     * @Column(name="ResetAlarmOutByDS", type="boolean", nullable=true)
     */
    private $resetalarmoutbyds;


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
     * @return Doors
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
     * Set type
     *
     * @param integer $type
     * @return Doors
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set locktime
     *
     * @param integer $locktime
     * @return Doors
     */
    public function setLocktime($locktime)
    {
        $this->locktime = $locktime;
        return $this;
    }

    /**
     * Get locktime
     *
     * @return integer
     */
    public function getLocktime()
    {
        return $this->locktime;
    }

    /**
     * Set freeout
     *
     * @param integer $freeout
     * @return Doors
     */
    public function setFreeout($freeout)
    {
        $this->freeout = $freeout;
        return $this;
    }

    /**
     * Get freeout
     *
     * @return integer
     */
    public function getFreeout()
    {
        return $this->freeout;
    }

    /**
     * Set ajarfo
     *
     * @param integer $ajarfo
     * @return Doors
     */
    public function setAjarfo($ajarfo)
    {
        $this->ajarfo = $ajarfo;
        return $this;
    }

    /**
     * Get ajarfo
     *
     * @return integer
     */
    public function getAjarfo()
    {
        return $this->ajarfo;
    }

    /**
     * Set alarmfo
     *
     * @param integer $alarmfo
     * @return Doors
     */
    public function setAlarmfo($alarmfo)
    {
        $this->alarmfo = $alarmfo;
        return $this;
    }

    /**
     * Get alarmfo
     *
     * @return integer
     */
    public function getAlarmfo()
    {
        return $this->alarmfo;
    }

    /**
     * Set ajartime
     *
     * @param integer $ajartime
     * @return Doors
     */
    public function setAjartime($ajartime)
    {
        $this->ajartime = $ajartime;
        return $this;
    }

    /**
     * Get ajartime
     *
     * @return integer
     */
    public function getAjartime()
    {
        return $this->ajartime;
    }

    /**
     * Set alarmtime
     *
     * @param integer $alarmtime
     * @return Doors
     */
    public function setAlarmtime($alarmtime)
    {
        $this->alarmtime = $alarmtime;
        return $this;
    }

    /**
     * Get alarmtime
     *
     * @return integer
     */
    public function getAlarmtime()
    {
        return $this->alarmtime;
    }

    /**
     * Set sensornc
     *
     * @param boolean $sensornc
     * @return Doors
     */
    public function setSensornc($sensornc)
    {
        $this->sensornc = $sensornc;
        return $this;
    }

    /**
     * Get sensornc
     *
     * @return boolean
     */
    public function getSensornc()
    {
        return $this->sensornc;
    }

    /**
     * Set forcedfo
     *
     * @param integer $forcedfo
     * @return Doors
     */
    public function setForcedfo($forcedfo)
    {
        $this->forcedfo = $forcedfo;
        return $this;
    }

    /**
     * Get forcedfo
     *
     * @return integer
     */
    public function getForcedfo()
    {
        return $this->forcedfo;
    }

    /**
     * Set enablesensor
     *
     * @param boolean $enablesensor
     * @return Doors
     */
    public function setEnablesensor($enablesensor)
    {
        $this->enablesensor = $enablesensor;
        return $this;
    }

    /**
     * Get enablesensor
     *
     * @return boolean
     */
    public function getEnablesensor()
    {
        return $this->enablesensor;
    }

    /**
     * Set enable
     *
     * @param boolean $enable
     * @return Doors
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
     * Set fatz
     *
     * @param integer $fatz
     * @return Doors
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
     * Set enabletz
     *
     * @param integer $enabletz
     * @return Doors
     */
    public function setEnabletz($enabletz)
    {
        $this->enabletz = $enabletz;
        return $this;
    }

    /**
     * Get enabletz
     *
     * @return integer
     */
    public function getEnabletz()
    {
        return $this->enabletz;
    }

    /**
     * Set disablebyfi
     *
     * @param integer $disablebyfi
     * @return Doors
     */
    public function setDisablebyfi($disablebyfi)
    {
        $this->disablebyfi = $disablebyfi;
        return $this;
    }

    /**
     * Get disablebyfi
     *
     * @return integer
     */
    public function getDisablebyfi()
    {
        return $this->disablebyfi;
    }

    /**
     * Set pbnc
     *
     * @param boolean $pbnc
     * @return Doors
     */
    public function setPbnc($pbnc)
    {
        $this->pbnc = $pbnc;
        return $this;
    }

    /**
     * Get pbnc
     *
     * @return boolean
     */
    public function getPbnc()
    {
        return $this->pbnc;
    }

    /**
     * Set pbfo
     *
     * @param integer $pbfo
     * @return Doors
     */
    public function setPbfo($pbfo)
    {
        $this->pbfo = $pbfo;
        return $this;
    }

    /**
     * Get pbfo
     *
     * @return integer
     */
    public function getPbfo()
    {
        return $this->pbfo;
    }

    /**
     * Set pbenablebytz
     *
     * @param integer $pbenablebytz
     * @return Doors
     */
    public function setPbenablebytz($pbenablebytz)
    {
        $this->pbenablebytz = $pbenablebytz;
        return $this;
    }

    /**
     * Get pbenablebytz
     *
     * @return integer
     */
    public function getPbenablebytz()
    {
        return $this->pbenablebytz;
    }

    /**
     * Set pbenable
     *
     * @param boolean $pbenable
     * @return Doors
     */
    public function setPbenable($pbenable)
    {
        $this->pbenable = $pbenable;
        return $this;
    }

    /**
     * Get pbenable
     *
     * @return boolean
     */
    public function getPbenable()
    {
        return $this->pbenable;
    }

    /**
     * Set controller
     *
     * @param integer $controller
     * @return Doors
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
     * Set door
     *
     * @param integer $door
     * @return Doors
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
     * Set pbenabledbytz
     *
     * @param boolean $pbenabledbytz
     * @return Doors
     */
    public function setPbenabledbytz($pbenabledbytz)
    {
        $this->pbenabledbytz = $pbenabledbytz;
        return $this;
    }

    /**
     * Get pbenabledbytz
     *
     * @return boolean
     */
    public function getPbenabledbytz()
    {
        return $this->pbenabledbytz;
    }

    /**
     * Set drenabledbytz
     *
     * @param boolean $drenabledbytz
     * @return Doors
     */
    public function setDrenabledbytz($drenabledbytz)
    {
        $this->drenabledbytz = $drenabledbytz;
        return $this;
    }

    /**
     * Get drenabledbytz
     *
     * @return boolean
     */
    public function getDrenabledbytz()
    {
        return $this->drenabledbytz;
    }

    /**
     * Set resetalarmoutbyds
     *
     * @param boolean $resetalarmoutbyds
     * @return Doors
     */
    public function setResetalarmoutbyds($resetalarmoutbyds)
    {
        $this->resetalarmoutbyds = $resetalarmoutbyds;
        return $this;
    }

    /**
     * Get resetalarmoutbyds
     *
     * @return boolean
     */
    public function getResetalarmoutbyds()
    {
        return $this->resetalarmoutbyds;
    }
}
