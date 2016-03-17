<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Readers
 *
 * @Table(name="Readers")
 * @Entity
 */
class Readers
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
     * @var integer $serial
     *
     * @Column(name="Serial", type="integer", nullable=true)
     */
    private $serial;

    /**
     * @var string $name
     *
     * @Column(name="Name", type="string", length=30, nullable=true)
     */
    private $name;

    /**
     * @var integer $door
     *
     * @Column(name="Door", type="integer", nullable=true)
     */
    private $door;

    /**
     * @var integer $fatz
     *
     * @Column(name="FATZ", type="integer", nullable=true)
     */
    private $fatz;

    /**
     * @var boolean $bypassapb
     *
     * @Column(name="BypassAPB", type="boolean", nullable=true)
     */
    private $bypassapb;

    /**
     * @var integer $wtype
     *
     * @Column(name="WType", type="integer", nullable=true)
     */
    private $wtype;

    /**
     * @var integer $type
     *
     * @Column(name="Type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var integer $areaenter
     *
     * @Column(name="AreaEnter", type="integer", nullable=true)
     */
    private $areaenter;

    /**
     * @var integer $areaexit
     *
     * @Column(name="AreaExit", type="integer", nullable=true)
     */
    private $areaexit;

    /**
     * @var integer $buzzerlevel
     *
     * @Column(name="BuzzerLevel", type="integer", nullable=true)
     */
    private $buzzerlevel;

    /**
     * @var boolean $sendwrongfinger
     *
     * @Column(name="SendWrongFinger", type="boolean", nullable=true)
     */
    private $sendwrongfinger;

    /**
     * @var string $wrongfingerid
     *
     * @Column(name="WrongFingerID", type="string", length=10, nullable=true)
     */
    private $wrongfingerid;

    /**
     * @var boolean $sendwrongkeycode
     *
     * @Column(name="SendWrongKeycode", type="boolean", nullable=true)
     */
    private $sendwrongkeycode;

    /**
     * @var string $wrongkeycodeid
     *
     * @Column(name="WrongKeycodeID", type="string", length=10, nullable=true)
     */
    private $wrongkeycodeid;

    /**
     * @var boolean $asendwiegand
     *
     * @Column(name="ASendWiegand", type="boolean", nullable=true)
     */
    private $asendwiegand;

    /**
     * @var boolean $bsendwiegand
     *
     * @Column(name="BSendWiegand", type="boolean", nullable=true)
     */
    private $bsendwiegand;

    /**
     * @var string $aid
     *
     * @Column(name="AID", type="string", length=10, nullable=true)
     */
    private $aid;

    /**
     * @var string $bid
     *
     * @Column(name="BID", type="string", length=10, nullable=true)
     */
    private $bid;

    /**
     * @var integer $entrymode
     *
     * @Column(name="EntryMode", type="integer", nullable=true)
     */
    private $entrymode;

    /**
     * @var integer $controller
     *
     * @Column(name="Controller", type="integer", nullable=true)
     */
    private $controller;

    /**
     * @var integer $reader
     *
     * @Column(name="Reader", type="integer", nullable=true)
     */
    private $reader;

    /**
     * @var integer $securitylevel
     *
     * @Column(name="SecurityLevel", type="integer", nullable=true)
     */
    private $securitylevel;

    /**
     * @var \DateTime $apbresettime
     *
     * @Column(name="APBResetTime", type="datetime", nullable=true)
     */
    private $apbresettime;

    /**
     * @var boolean $accessbytz
     *
     * @Column(name="AccessByTZ", type="boolean", nullable=true)
     */
    private $accessbytz;

    /**
     * @var integer $accessdeniedallowed
     *
     * @Column(name="AccessDeniedAllowed", type="integer", nullable=true)
     */
    private $accessdeniedallowed;

    /**
     * @var integer $deniedblocktime
     *
     * @Column(name="DeniedBlockTime", type="integer", nullable=true)
     */
    private $deniedblocktime;

    /**
     * @var boolean $fabytz
     *
     * @Column(name="FAByTZ", type="boolean", nullable=true)
     */
    private $fabytz;

    /**
     * @var integer $sensitivity
     *
     * @Column(name="Sensitivity", type="integer", nullable=true)
     */
    private $sensitivity;

    /**
     * @var integer $backlight
     *
     * @Column(name="BackLight", type="integer", nullable=true)
     */
    private $backlight;

    /**
     * @var integer $usersrequired
     *
     * @Column(name="UsersRequired", type="integer", nullable=true)
     */
    private $usersrequired;


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
     * Set serial
     *
     * @param integer $serial
     * @return Readers
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;
        return $this;
    }

    /**
     * Get serial
     *
     * @return integer
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Readers
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
     * Set door
     *
     * @param integer $door
     * @return Readers
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
     * Set fatz
     *
     * @param integer $fatz
     * @return Readers
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
     * Set bypassapb
     *
     * @param boolean $bypassapb
     * @return Readers
     */
    public function setBypassapb($bypassapb)
    {
        $this->bypassapb = $bypassapb;
        return $this;
    }

    /**
     * Get bypassapb
     *
     * @return boolean
     */
    public function getBypassapb()
    {
        return $this->bypassapb;
    }

    /**
     * Set wtype
     *
     * @param integer $wtype
     * @return Readers
     */
    public function setWtype($wtype)
    {
        $this->wtype = $wtype;
        return $this;
    }

    /**
     * Get wtype
     *
     * @return integer
     */
    public function getWtype()
    {
        return $this->wtype;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Readers
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
     * Set areaenter
     *
     * @param integer $areaenter
     * @return Readers
     */
    public function setAreaenter($areaenter)
    {
        $this->areaenter = $areaenter;
        return $this;
    }

    /**
     * Get areaenter
     *
     * @return integer
     */
    public function getAreaenter()
    {
        return $this->areaenter;
    }

    /**
     * Set areaexit
     *
     * @param integer $areaexit
     * @return Readers
     */
    public function setAreaexit($areaexit)
    {
        $this->areaexit = $areaexit;
        return $this;
    }

    /**
     * Get areaexit
     *
     * @return integer
     */
    public function getAreaexit()
    {
        return $this->areaexit;
    }

    /**
     * Set buzzerlevel
     *
     * @param integer $buzzerlevel
     * @return Readers
     */
    public function setBuzzerlevel($buzzerlevel)
    {
        $this->buzzerlevel = $buzzerlevel;
        return $this;
    }

    /**
     * Get buzzerlevel
     *
     * @return integer
     */
    public function getBuzzerlevel()
    {
        return $this->buzzerlevel;
    }

    /**
     * Set sendwrongfinger
     *
     * @param boolean $sendwrongfinger
     * @return Readers
     */
    public function setSendwrongfinger($sendwrongfinger)
    {
        $this->sendwrongfinger = $sendwrongfinger;
        return $this;
    }

    /**
     * Get sendwrongfinger
     *
     * @return boolean
     */
    public function getSendwrongfinger()
    {
        return $this->sendwrongfinger;
    }

    /**
     * Set wrongfingerid
     *
     * @param string $wrongfingerid
     * @return Readers
     */
    public function setWrongfingerid($wrongfingerid)
    {
        $this->wrongfingerid = $wrongfingerid;
        return $this;
    }

    /**
     * Get wrongfingerid
     *
     * @return string
     */
    public function getWrongfingerid()
    {
        return $this->wrongfingerid;
    }

    /**
     * Set sendwrongkeycode
     *
     * @param boolean $sendwrongkeycode
     * @return Readers
     */
    public function setSendwrongkeycode($sendwrongkeycode)
    {
        $this->sendwrongkeycode = $sendwrongkeycode;
        return $this;
    }

    /**
     * Get sendwrongkeycode
     *
     * @return boolean
     */
    public function getSendwrongkeycode()
    {
        return $this->sendwrongkeycode;
    }

    /**
     * Set wrongkeycodeid
     *
     * @param string $wrongkeycodeid
     * @return Readers
     */
    public function setWrongkeycodeid($wrongkeycodeid)
    {
        $this->wrongkeycodeid = $wrongkeycodeid;
        return $this;
    }

    /**
     * Get wrongkeycodeid
     *
     * @return string
     */
    public function getWrongkeycodeid()
    {
        return $this->wrongkeycodeid;
    }

    /**
     * Set asendwiegand
     *
     * @param boolean $asendwiegand
     * @return Readers
     */
    public function setAsendwiegand($asendwiegand)
    {
        $this->asendwiegand = $asendwiegand;
        return $this;
    }

    /**
     * Get asendwiegand
     *
     * @return boolean
     */
    public function getAsendwiegand()
    {
        return $this->asendwiegand;
    }

    /**
     * Set bsendwiegand
     *
     * @param boolean $bsendwiegand
     * @return Readers
     */
    public function setBsendwiegand($bsendwiegand)
    {
        $this->bsendwiegand = $bsendwiegand;
        return $this;
    }

    /**
     * Get bsendwiegand
     *
     * @return boolean
     */
    public function getBsendwiegand()
    {
        return $this->bsendwiegand;
    }

    /**
     * Set aid
     *
     * @param string $aid
     * @return Readers
     */
    public function setAid($aid)
    {
        $this->aid = $aid;
        return $this;
    }

    /**
     * Get aid
     *
     * @return string
     */
    public function getAid()
    {
        return $this->aid;
    }

    /**
     * Set bid
     *
     * @param string $bid
     * @return Readers
     */
    public function setBid($bid)
    {
        $this->bid = $bid;
        return $this;
    }

    /**
     * Get bid
     *
     * @return string
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * Set entrymode
     *
     * @param integer $entrymode
     * @return Readers
     */
    public function setEntrymode($entrymode)
    {
        $this->entrymode = $entrymode;
        return $this;
    }

    /**
     * Get entrymode
     *
     * @return integer
     */
    public function getEntrymode()
    {
        return $this->entrymode;
    }

    /**
     * Set controller
     *
     * @param integer $controller
     * @return Readers
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
     * Set reader
     *
     * @param integer $reader
     * @return Readers
     */
    public function setReader($reader)
    {
        $this->reader = $reader;
        return $this;
    }

    /**
     * Get reader
     *
     * @return integer
     */
    public function getReader()
    {
        return $this->reader;
    }

    /**
     * Set securitylevel
     *
     * @param integer $securitylevel
     * @return Readers
     */
    public function setSecuritylevel($securitylevel)
    {
        $this->securitylevel = $securitylevel;
        return $this;
    }

    /**
     * Get securitylevel
     *
     * @return integer
     */
    public function getSecuritylevel()
    {
        return $this->securitylevel;
    }

    /**
     * Set apbresettime
     *
     * @param \DateTime $apbresettime
     * @return Readers
     */
    public function setApbresettime($apbresettime)
    {
        $this->apbresettime = $apbresettime;
        return $this;
    }

    /**
     * Get apbresettime
     *
     * @return \DateTime
     */
    public function getApbresettime()
    {
        return $this->apbresettime;
    }

    /**
     * Set accessbytz
     *
     * @param boolean $accessbytz
     * @return Readers
     */
    public function setAccessbytz($accessbytz)
    {
        $this->accessbytz = $accessbytz;
        return $this;
    }

    /**
     * Get accessbytz
     *
     * @return boolean
     */
    public function getAccessbytz()
    {
        return $this->accessbytz;
    }

    /**
     * Set accessdeniedallowed
     *
     * @param integer $accessdeniedallowed
     * @return Readers
     */
    public function setAccessdeniedallowed($accessdeniedallowed)
    {
        $this->accessdeniedallowed = $accessdeniedallowed;
        return $this;
    }

    /**
     * Get accessdeniedallowed
     *
     * @return integer
     */
    public function getAccessdeniedallowed()
    {
        return $this->accessdeniedallowed;
    }

    /**
     * Set deniedblocktime
     *
     * @param integer $deniedblocktime
     * @return Readers
     */
    public function setDeniedblocktime($deniedblocktime)
    {
        $this->deniedblocktime = $deniedblocktime;
        return $this;
    }

    /**
     * Get deniedblocktime
     *
     * @return integer
     */
    public function getDeniedblocktime()
    {
        return $this->deniedblocktime;
    }

    /**
     * Set fabytz
     *
     * @param boolean $fabytz
     * @return Readers
     */
    public function setFabytz($fabytz)
    {
        $this->fabytz = $fabytz;
        return $this;
    }

    /**
     * Get fabytz
     *
     * @return boolean
     */
    public function getFabytz()
    {
        return $this->fabytz;
    }

    /**
     * Set sensitivity
     *
     * @param integer $sensitivity
     * @return Readers
     */
    public function setSensitivity($sensitivity)
    {
        $this->sensitivity = $sensitivity;
        return $this;
    }

    /**
     * Get sensitivity
     *
     * @return integer
     */
    public function getSensitivity()
    {
        return $this->sensitivity;
    }

    /**
     * Set backlight
     *
     * @param integer $backlight
     * @return Readers
     */
    public function setBacklight($backlight)
    {
        $this->backlight = $backlight;
        return $this;
    }

    /**
     * Get backlight
     *
     * @return integer
     */
    public function getBacklight()
    {
        return $this->backlight;
    }

    /**
     * Set usersrequired
     *
     * @param integer $usersrequired
     * @return Readers
     */
    public function setUsersrequired($usersrequired)
    {
        $this->usersrequired = $usersrequired;
        return $this;
    }

    /**
     * Get usersrequired
     *
     * @return integer
     */
    public function getUsersrequired()
    {
        return $this->usersrequired;
    }
}
