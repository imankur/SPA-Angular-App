<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Controllers
 *
 * @Table(name="Controllers")
 * @Entity
 */
class Controllers
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
     * @var integer $portal
     *
     * @Column(name="Portal", type="integer", nullable=true)
     */
    private $portal;

    /**
     * @var boolean $pool
     *
     * @Column(name="Pool", type="boolean", nullable=true)
     */
    private $pool;

    /**
     * @var integer $type
     *
     * @Column(name="Type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var integer $ratio
     *
     * @Column(name="Ratio", type="integer", nullable=true)
     */
    private $ratio;

    /**
     * @var string $timezone
     *
     * @Column(name="TimeZone", type="string", length=32, nullable=true)
     */
    private $timezone;

    /**
     * @var boolean $recycle
     *
     * @Column(name="Recycle", type="boolean", nullable=true)
     */
    private $recycle;

    /**
     * @var string $logevents
     *
     * @Column(name="LogEvents", type="text", nullable=true)
     */
    private $logevents;

    /**
     * @var integer $site
     *
     * @Column(name="Site", type="integer", nullable=true)
     */
    private $site;

    /**
     * @var integer $mantrap
     *
     * @Column(name="Mantrap", type="integer", nullable=true)
     */
    private $mantrap;

    /**
     * @var integer $apb1timeout
     *
     * @Column(name="APB1Timeout", type="integer", nullable=true)
     */
    private $apb1timeout;

    /**
     * @var integer $apb1readers
     *
     * @Column(name="APB1Readers", type="integer", nullable=true)
     */
    private $apb1readers;

    /**
     * @var integer $apb1entrytype
     *
     * @Column(name="APB1EntryType", type="integer", nullable=true)
     */
    private $apb1entrytype;

    /**
     * @var boolean $apb1enablereset
     *
     * @Column(name="APB1EnableReset", type="boolean", nullable=true)
     */
    private $apb1enablereset;

    /**
     * @var \DateTime $apb1resettime
     *
     * @Column(name="APB1ResetTime", type="datetime", nullable=true)
     */
    private $apb1resettime;

    /**
     * @var integer $apb2timeout
     *
     * @Column(name="APB2Timeout", type="integer", nullable=true)
     */
    private $apb2timeout;

    /**
     * @var integer $apb2readers
     *
     * @Column(name="APB2Readers", type="integer", nullable=true)
     */
    private $apb2readers;

    /**
     * @var integer $apb2entrytype
     *
     * @Column(name="APB2EntryType", type="integer", nullable=true)
     */
    private $apb2entrytype;

    /**
     * @var boolean $apb2enablereset
     *
     * @Column(name="APB2EnableReset", type="boolean", nullable=true)
     */
    private $apb2enablereset;

    /**
     * @var \DateTime $apb2resettime
     *
     * @Column(name="APB2ResetTime", type="datetime", nullable=true)
     */
    private $apb2resettime;

    /**
     * @var string $tz
     *
     * @Column(name="TZ", type="text", nullable=true)
     */
    private $tz;

    /**
     * @var string $holidays
     *
     * @Column(name="Holidays", type="text", nullable=true)
     */
    private $holidays;

    /**
     * @var integer $apb1resetfi
     *
     * @Column(name="APB1ResetFI", type="integer", nullable=true)
     */
    private $apb1resetfi;

    /**
     * @var integer $apb2resetfi
     *
     * @Column(name="APB2ResetFI", type="integer", nullable=true)
     */
    private $apb2resetfi;

    /**
     * @var integer $apbpowerreset
     *
     * @Column(name="APBPowerReset", type="integer", nullable=true)
     */
    private $apbpowerreset;


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
     * @return Controllers
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
     * @return Controllers
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
     * Set portal
     *
     * @param integer $portal
     * @return Controllers
     */
    public function setPortal($portal)
    {
        $this->portal = $portal;
        return $this;
    }

    /**
     * Get portal
     *
     * @return integer
     */
    public function getPortal()
    {
        return $this->portal;
    }

    /**
     * Set pool
     *
     * @param boolean $pool
     * @return Controllers
     */
    public function setPool($pool)
    {
        $this->pool = $pool;
        return $this;
    }

    /**
     * Get pool
     *
     * @return boolean
     */
    public function getPool()
    {
        return $this->pool;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Controllers
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
     * Set ratio
     *
     * @param integer $ratio
     * @return Controllers
     */
    public function setRatio($ratio)
    {
        $this->ratio = $ratio;
        return $this;
    }

    /**
     * Get ratio
     *
     * @return integer
     */
    public function getRatio()
    {
        return $this->ratio;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     * @return Controllers
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * Get timezone
     *
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set recycle
     *
     * @param boolean $recycle
     * @return Controllers
     */
    public function setRecycle($recycle)
    {
        $this->recycle = $recycle;
        return $this;
    }

    /**
     * Get recycle
     *
     * @return boolean
     */
    public function getRecycle()
    {
        return $this->recycle;
    }

    /**
     * Set logevents
     *
     * @param string $logevents
     * @return Controllers
     */
    public function setLogevents($logevents)
    {
        $this->logevents = $logevents;
        return $this;
    }

    /**
     * Get logevents
     *
     * @return string
     */
    public function getLogevents()
    {
        return $this->logevents;
    }

    /**
     * Set site
     *
     * @param integer $site
     * @return Controllers
     */
    public function setSite($site)
    {
        $this->site = $site;
        return $this;
    }

    /**
     * Get site
     *
     * @return integer
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set mantrap
     *
     * @param integer $mantrap
     * @return Controllers
     */
    public function setMantrap($mantrap)
    {
        $this->mantrap = $mantrap;
        return $this;
    }

    /**
     * Get mantrap
     *
     * @return integer
     */
    public function getMantrap()
    {
        return $this->mantrap;
    }

    /**
     * Set apb1timeout
     *
     * @param integer $apb1timeout
     * @return Controllers
     */
    public function setApb1timeout($apb1timeout)
    {
        $this->apb1timeout = $apb1timeout;
        return $this;
    }

    /**
     * Get apb1timeout
     *
     * @return integer
     */
    public function getApb1timeout()
    {
        return $this->apb1timeout;
    }

    /**
     * Set apb1readers
     *
     * @param integer $apb1readers
     * @return Controllers
     */
    public function setApb1readers($apb1readers)
    {
        $this->apb1readers = $apb1readers;
        return $this;
    }

    /**
     * Get apb1readers
     *
     * @return integer
     */
    public function getApb1readers()
    {
        return $this->apb1readers;
    }

    /**
     * Set apb1entrytype
     *
     * @param integer $apb1entrytype
     * @return Controllers
     */
    public function setApb1entrytype($apb1entrytype)
    {
        $this->apb1entrytype = $apb1entrytype;
        return $this;
    }

    /**
     * Get apb1entrytype
     *
     * @return integer
     */
    public function getApb1entrytype()
    {
        return $this->apb1entrytype;
    }

    /**
     * Set apb1enablereset
     *
     * @param boolean $apb1enablereset
     * @return Controllers
     */
    public function setApb1enablereset($apb1enablereset)
    {
        $this->apb1enablereset = $apb1enablereset;
        return $this;
    }

    /**
     * Get apb1enablereset
     *
     * @return boolean
     */
    public function getApb1enablereset()
    {
        return $this->apb1enablereset;
    }

    /**
     * Set apb1resettime
     *
     * @param \DateTime $apb1resettime
     * @return Controllers
     */
    public function setApb1resettime($apb1resettime)
    {
        $this->apb1resettime = $apb1resettime;
        return $this;
    }

    /**
     * Get apb1resettime
     *
     * @return \DateTime
     */
    public function getApb1resettime()
    {
        return $this->apb1resettime;
    }

    /**
     * Set apb2timeout
     *
     * @param integer $apb2timeout
     * @return Controllers
     */
    public function setApb2timeout($apb2timeout)
    {
        $this->apb2timeout = $apb2timeout;
        return $this;
    }

    /**
     * Get apb2timeout
     *
     * @return integer
     */
    public function getApb2timeout()
    {
        return $this->apb2timeout;
    }

    /**
     * Set apb2readers
     *
     * @param integer $apb2readers
     * @return Controllers
     */
    public function setApb2readers($apb2readers)
    {
        $this->apb2readers = $apb2readers;
        return $this;
    }

    /**
     * Get apb2readers
     *
     * @return integer
     */
    public function getApb2readers()
    {
        return $this->apb2readers;
    }

    /**
     * Set apb2entrytype
     *
     * @param integer $apb2entrytype
     * @return Controllers
     */
    public function setApb2entrytype($apb2entrytype)
    {
        $this->apb2entrytype = $apb2entrytype;
        return $this;
    }

    /**
     * Get apb2entrytype
     *
     * @return integer
     */
    public function getApb2entrytype()
    {
        return $this->apb2entrytype;
    }

    /**
     * Set apb2enablereset
     *
     * @param boolean $apb2enablereset
     * @return Controllers
     */
    public function setApb2enablereset($apb2enablereset)
    {
        $this->apb2enablereset = $apb2enablereset;
        return $this;
    }

    /**
     * Get apb2enablereset
     *
     * @return boolean
     */
    public function getApb2enablereset()
    {
        return $this->apb2enablereset;
    }

    /**
     * Set apb2resettime
     *
     * @param \DateTime $apb2resettime
     * @return Controllers
     */
    public function setApb2resettime($apb2resettime)
    {
        $this->apb2resettime = $apb2resettime;
        return $this;
    }

    /**
     * Get apb2resettime
     *
     * @return \DateTime
     */
    public function getApb2resettime()
    {
        return $this->apb2resettime;
    }

    /**
     * Set tz
     *
     * @param string $tz
     * @return Controllers
     */
    public function setTz($tz)
    {
        $this->tz = $tz;
        return $this;
    }

    /**
     * Get tz
     *
     * @return string
     */
    public function getTz()
    {
        return $this->tz;
    }

    /**
     * Set holidays
     *
     * @param string $holidays
     * @return Controllers
     */
    public function setHolidays($holidays)
    {
        $this->holidays = $holidays;
        return $this;
    }

    /**
     * Get holidays
     *
     * @return string
     */
    public function getHolidays()
    {
        return $this->holidays;
    }

    /**
     * Set apb1resetfi
     *
     * @param integer $apb1resetfi
     * @return Controllers
     */
    public function setApb1resetfi($apb1resetfi)
    {
        $this->apb1resetfi = $apb1resetfi;
        return $this;
    }

    /**
     * Get apb1resetfi
     *
     * @return integer
     */
    public function getApb1resetfi()
    {
        return $this->apb1resetfi;
    }

    /**
     * Set apb2resetfi
     *
     * @param integer $apb2resetfi
     * @return Controllers
     */
    public function setApb2resetfi($apb2resetfi)
    {
        $this->apb2resetfi = $apb2resetfi;
        return $this;
    }

    /**
     * Get apb2resetfi
     *
     * @return integer
     */
    public function getApb2resetfi()
    {
        return $this->apb2resetfi;
    }

    /**
     * Set apbpowerreset
     *
     * @param integer $apbpowerreset
     * @return Controllers
     */
    public function setApbpowerreset($apbpowerreset)
    {
        $this->apbpowerreset = $apbpowerreset;
        return $this;
    }

    /**
     * Get apbpowerreset
     *
     * @return integer
     */
    public function getApbpowerreset()
    {
        return $this->apbpowerreset;
    }
}
