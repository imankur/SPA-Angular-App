<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Masterdetails
 *
 * @Table(name="MasterDetails")
 * @Entity
 */
class Masterdetails
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
     * @var integer $korisnik
     *
     * @Column(name="Korisnik", type="integer", nullable=true)
     */
    private $korisnik;

    /**
     * @var \DateTime $datum
     *
     * @Column(name="Datum", type="date", nullable=true)
     */
    private $datum;

    /**
     * @var \DateTime $smenastart
     *
     * @Column(name="SmenaStart", type="datetime", nullable=true)
     */
    private $smenastart;

    /**
     * @var \DateTime $smenastop
     *
     * @Column(name="SmenaStop", type="datetime", nullable=true)
     */
    private $smenastop;

    /**
     * @var \DateTime $intime
     *
     * @Column(name="InTime", type="datetime", nullable=true)
     */
    private $intime;

    /**
     * @var \DateTime $outtime
     *
     * @Column(name="OutTime", type="datetime", nullable=true)
     */
    private $outtime;

    /**
     * @var integer $latemark
     *
     * @Column(name="LateMark", type="smallint", nullable=true)
     */
    private $latemark;

    /**
     * @var integer $halfday
     *
     * @Column(name="HalfDay", type="smallint", nullable=true)
     */
    private $halfday;

    /**
     * @var integer $weeklyoff
     *
     * @Column(name="WeeklyOff", type="smallint", nullable=true)
     */
    private $weeklyoff;

    /**
     * @var integer $absent
     *
     * @Column(name="Absent", type="smallint", nullable=true)
     */
    private $absent;

    /**
     * @var integer $lateworking
     *
     * @Column(name="LateWorking", type="smallint", nullable=true)
     */
    private $lateworking;

    /**
     * @var integer $totalwork
     *
     * @Column(name="TotalWork", type="smallint", nullable=true)
     */
    private $totalwork;

    /**
     * @var boolean $earlyarrival
     *
     * @Column(name="EarlyArrival", type="boolean", nullable=true)
     */
    private $earlyarrival;

    /**
     * @var boolean $latearrival
     *
     * @Column(name="LateArrival", type="boolean", nullable=true)
     */
    private $latearrival;

    /**
     * @var boolean $earlydeparture
     *
     * @Column(name="EarlyDeparture", type="boolean", nullable=true)
     */
    private $earlydeparture;

    /**
     * @var boolean $latedeparture
     *
     * @Column(name="LateDeparture", type="boolean", nullable=true)
     */
    private $latedeparture;

    /**
     * @var boolean $halfdaymark
     *
     * @Column(name="HalfDayMark", type="boolean", nullable=true)
     */
    private $halfdaymark;


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
     * Set korisnik
     *
     * @param integer $korisnik
     * @return Masterdetails
     */
    public function setKorisnik($korisnik)
    {
        $this->korisnik = $korisnik;
        return $this;
    }

    /**
     * Get korisnik
     *
     * @return integer
     */
    public function getKorisnik()
    {
        return $this->korisnik;
    }

    /**
     * Set datum
     *
     * @param \DateTime $datum
     * @return Masterdetails
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
        return $this;
    }

    /**
     * Get datum
     *
     * @return \DateTime
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set smenastart
     *
     * @param \DateTime $smenastart
     * @return Masterdetails
     */
    public function setSmenastart($smenastart)
    {
        $this->smenastart = $smenastart;
        return $this;
    }

    /**
     * Get smenastart
     *
     * @return \DateTime
     */
    public function getSmenastart()
    {
        return $this->smenastart;
    }

    /**
     * Set smenastop
     *
     * @param \DateTime $smenastop
     * @return Masterdetails
     */
    public function setSmenastop($smenastop)
    {
        $this->smenastop = $smenastop;
        return $this;
    }

    /**
     * Get smenastop
     *
     * @return \DateTime
     */
    public function getSmenastop()
    {
        return $this->smenastop;
    }

    /**
     * Set intime
     *
     * @param \DateTime $intime
     * @return Masterdetails
     */
    public function setIntime($intime)
    {
        $this->intime = $intime;
        return $this;
    }

    /**
     * Get intime
     *
     * @return \DateTime
     */
    public function getIntime()
    {
        return $this->intime;
    }

    /**
     * Set outtime
     *
     * @param \DateTime $outtime
     * @return Masterdetails
     */
    public function setOuttime($outtime)
    {
        $this->outtime = $outtime;
        return $this;
    }

    /**
     * Get outtime
     *
     * @return \DateTime
     */
    public function getOuttime()
    {
        return $this->outtime;
    }

    /**
     * Set latemark
     *
     * @param integer $latemark
     * @return Masterdetails
     */
    public function setLatemark($latemark)
    {
        $this->latemark = $latemark;
        return $this;
    }

    /**
     * Get latemark
     *
     * @return integer
     */
    public function getLatemark()
    {
        return $this->latemark;
    }

    /**
     * Set halfday
     *
     * @param integer $halfday
     * @return Masterdetails
     */
    public function setHalfday($halfday)
    {
        $this->halfday = $halfday;
        return $this;
    }

    /**
     * Get halfday
     *
     * @return integer
     */
    public function getHalfday()
    {
        return $this->halfday;
    }

    /**
     * Set weeklyoff
     *
     * @param integer $weeklyoff
     * @return Masterdetails
     */
    public function setWeeklyoff($weeklyoff)
    {
        $this->weeklyoff = $weeklyoff;
        return $this;
    }

    /**
     * Get weeklyoff
     *
     * @return integer
     */
    public function getWeeklyoff()
    {
        return $this->weeklyoff;
    }

    /**
     * Set absent
     *
     * @param integer $absent
     * @return Masterdetails
     */
    public function setAbsent($absent)
    {
        $this->absent = $absent;
        return $this;
    }

    /**
     * Get absent
     *
     * @return integer
     */
    public function getAbsent()
    {
        return $this->absent;
    }

    /**
     * Set lateworking
     *
     * @param integer $lateworking
     * @return Masterdetails
     */
    public function setLateworking($lateworking)
    {
        $this->lateworking = $lateworking;
        return $this;
    }

    /**
     * Get lateworking
     *
     * @return integer
     */
    public function getLateworking()
    {
        return $this->lateworking;
    }

    /**
     * Set totalwork
     *
     * @param integer $totalwork
     * @return Masterdetails
     */
    public function setTotalwork($totalwork)
    {
        $this->totalwork = $totalwork;
        return $this;
    }

    /**
     * Get totalwork
     *
     * @return integer
     */
    public function getTotalwork()
    {
        return $this->totalwork;
    }

    /**
     * Set earlyarrival
     *
     * @param boolean $earlyarrival
     * @return Masterdetails
     */
    public function setEarlyarrival($earlyarrival)
    {
        $this->earlyarrival = $earlyarrival;
        return $this;
    }

    /**
     * Get earlyarrival
     *
     * @return boolean
     */
    public function getEarlyarrival()
    {
        return $this->earlyarrival;
    }

    /**
     * Set latearrival
     *
     * @param boolean $latearrival
     * @return Masterdetails
     */
    public function setLatearrival($latearrival)
    {
        $this->latearrival = $latearrival;
        return $this;
    }

    /**
     * Get latearrival
     *
     * @return boolean
     */
    public function getLatearrival()
    {
        return $this->latearrival;
    }

    /**
     * Set earlydeparture
     *
     * @param boolean $earlydeparture
     * @return Masterdetails
     */
    public function setEarlydeparture($earlydeparture)
    {
        $this->earlydeparture = $earlydeparture;
        return $this;
    }

    /**
     * Get earlydeparture
     *
     * @return boolean
     */
    public function getEarlydeparture()
    {
        return $this->earlydeparture;
    }

    /**
     * Set latedeparture
     *
     * @param boolean $latedeparture
     * @return Masterdetails
     */
    public function setLatedeparture($latedeparture)
    {
        $this->latedeparture = $latedeparture;
        return $this;
    }

    /**
     * Get latedeparture
     *
     * @return boolean
     */
    public function getLatedeparture()
    {
        return $this->latedeparture;
    }

    /**
     * Set halfdaymark
     *
     * @param boolean $halfdaymark
     * @return Masterdetails
     */
    public function setHalfdaymark($halfdaymark)
    {
        $this->halfdaymark = $halfdaymark;
        return $this;
    }

    /**
     * Get halfdaymark
     *
     * @return boolean
     */
    public function getHalfdaymark()
    {
        return $this->halfdaymark;
    }
}
