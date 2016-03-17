<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Shifts
 *
 * @Table(name="Shifts")
 * @Entity
 */
class Shifts
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
     * @var integer $workgroup
     *
     * @Column(name="Workgroup", type="integer", nullable=true)
     */
    private $workgroup;

    /**
     * @var string $name
     *
     * @Column(name="Name", type="string", length=30, nullable=true)
     */
    private $name;

    /**
     * @var integer $wd
     *
     * @Column(name="WD", type="integer", nullable=true)
     */
    private $wd;

    /**
     * @var \DateTime $overtimeafter
     *
     * @Column(name="OvertimeAfter", type="datetime", nullable=true)
     */
    private $overtimeafter;

    /**
     * @var \DateTime $acceptfrom
     *
     * @Column(name="AcceptFrom", type="datetime", nullable=true)
     */
    private $acceptfrom;

    /**
     * @var \DateTime $start
     *
     * @Column(name="Start", type="datetime", nullable=true)
     */
    private $start;

    /**
     * @var \DateTime $allowedlate
     *
     * @Column(name="AllowedLate", type="datetime", nullable=true)
     */
    private $allowedlate;

    /**
     * @var \DateTime $refusedafter
     *
     * @Column(name="RefusedAfter", type="datetime", nullable=true)
     */
    private $refusedafter;

    /**
     * @var \DateTime $breakstart
     *
     * @Column(name="BreakStart", type="datetime", nullable=true)
     */
    private $breakstart;

    /**
     * @var \DateTime $breaktime
     *
     * @Column(name="BreakTime", type="datetime", nullable=true)
     */
    private $breaktime;

    /**
     * @var \DateTime $breakstop
     *
     * @Column(name="BreakStop", type="datetime", nullable=true)
     */
    private $breakstop;

    /**
     * @var \DateTime $earlyleave
     *
     * @Column(name="EarlyLeave", type="datetime", nullable=true)
     */
    private $earlyleave;

    /**
     * @var \DateTime $stop
     *
     * @Column(name="Stop", type="datetime", nullable=true)
     */
    private $stop;

    /**
     * @var boolean $slide
     *
     * @Column(name="Slide", type="boolean", nullable=true)
     */
    private $slide;

    /**
     * @var \DateTime $overtimemax
     *
     * @Column(name="OvertimeMax", type="datetime", nullable=true)
     */
    private $overtimemax;

    /**
     * @var boolean $missinmiss
     *
     * @Column(name="MissInMiss", type="boolean", nullable=true)
     */
    private $missinmiss;

    /**
     * @var boolean $missoutmiss
     *
     * @Column(name="MissOutMiss", type="boolean", nullable=true)
     */
    private $missoutmiss;

    /**
     * @var boolean $addbreaktoworked
     *
     * @Column(name="AddBreakToWorked", type="boolean", nullable=true)
     */
    private $addbreaktoworked;

    /**
     * @var boolean $addunusedbreaktoovertime
     *
     * @Column(name="AddUnusedBreakToOvertime", type="boolean", nullable=true)
     */
    private $addunusedbreaktoovertime;

    /**
     * @var \DateTime $absentlimit
     *
     * @Column(name="AbsentLimit", type="datetime", nullable=true)
     */
    private $absentlimit;

    /**
     * @var \DateTime $halfdaylimit
     *
     * @Column(name="HalfDayLimit", type="datetime", nullable=true)
     */
    private $halfdaylimit;


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
     * Set workgroup
     *
     * @param integer $workgroup
     * @return Shifts
     */
    public function setWorkgroup($workgroup)
    {
        $this->workgroup = $workgroup;
        return $this;
    }

    /**
     * Get workgroup
     *
     * @return integer
     */
    public function getWorkgroup()
    {
        return $this->workgroup;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Shifts
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
     * Set wd
     *
     * @param integer $wd
     * @return Shifts
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

    /**
     * Set overtimeafter
     *
     * @param \DateTime $overtimeafter
     * @return Shifts
     */
    public function setOvertimeafter($overtimeafter)
    {
        $this->overtimeafter = $overtimeafter;
        return $this;
    }

    /**
     * Get overtimeafter
     *
     * @return \DateTime
     */
    public function getOvertimeafter()
    {
        return $this->overtimeafter;
    }

    /**
     * Set acceptfrom
     *
     * @param \DateTime $acceptfrom
     * @return Shifts
     */
    public function setAcceptfrom($acceptfrom)
    {
        $this->acceptfrom = $acceptfrom;
        return $this;
    }

    /**
     * Get acceptfrom
     *
     * @return \DateTime
     */
    public function getAcceptfrom()
    {
        return $this->acceptfrom;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     * @return Shifts
     */
    public function setStart($start)
    {
        $this->start = $start;
        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set allowedlate
     *
     * @param \DateTime $allowedlate
     * @return Shifts
     */
    public function setAllowedlate($allowedlate)
    {
        $this->allowedlate = $allowedlate;
        return $this;
    }

    /**
     * Get allowedlate
     *
     * @return \DateTime
     */
    public function getAllowedlate()
    {
        return $this->allowedlate;
    }

    /**
     * Set refusedafter
     *
     * @param \DateTime $refusedafter
     * @return Shifts
     */
    public function setRefusedafter($refusedafter)
    {
        $this->refusedafter = $refusedafter;
        return $this;
    }

    /**
     * Get refusedafter
     *
     * @return \DateTime
     */
    public function getRefusedafter()
    {
        return $this->refusedafter;
    }

    /**
     * Set breakstart
     *
     * @param \DateTime $breakstart
     * @return Shifts
     */
    public function setBreakstart($breakstart)
    {
        $this->breakstart = $breakstart;
        return $this;
    }

    /**
     * Get breakstart
     *
     * @return \DateTime
     */
    public function getBreakstart()
    {
        return $this->breakstart;
    }

    /**
     * Set breaktime
     *
     * @param \DateTime $breaktime
     * @return Shifts
     */
    public function setBreaktime($breaktime)
    {
        $this->breaktime = $breaktime;
        return $this;
    }

    /**
     * Get breaktime
     *
     * @return \DateTime
     */
    public function getBreaktime()
    {
        return $this->breaktime;
    }

    /**
     * Set breakstop
     *
     * @param \DateTime $breakstop
     * @return Shifts
     */
    public function setBreakstop($breakstop)
    {
        $this->breakstop = $breakstop;
        return $this;
    }

    /**
     * Get breakstop
     *
     * @return \DateTime
     */
    public function getBreakstop()
    {
        return $this->breakstop;
    }

    /**
     * Set earlyleave
     *
     * @param \DateTime $earlyleave
     * @return Shifts
     */
    public function setEarlyleave($earlyleave)
    {
        $this->earlyleave = $earlyleave;
        return $this;
    }

    /**
     * Get earlyleave
     *
     * @return \DateTime
     */
    public function getEarlyleave()
    {
        return $this->earlyleave;
    }

    /**
     * Set stop
     *
     * @param \DateTime $stop
     * @return Shifts
     */
    public function setStop($stop)
    {
        $this->stop = $stop;
        return $this;
    }

    /**
     * Get stop
     *
     * @return \DateTime
     */
    public function getStop()
    {
        return $this->stop;
    }

    /**
     * Set slide
     *
     * @param boolean $slide
     * @return Shifts
     */
    public function setSlide($slide)
    {
        $this->slide = $slide;
        return $this;
    }

    /**
     * Get slide
     *
     * @return boolean
     */
    public function getSlide()
    {
        return $this->slide;
    }

    /**
     * Set overtimemax
     *
     * @param \DateTime $overtimemax
     * @return Shifts
     */
    public function setOvertimemax($overtimemax)
    {
        $this->overtimemax = $overtimemax;
        return $this;
    }

    /**
     * Get overtimemax
     *
     * @return \DateTime
     */
    public function getOvertimemax()
    {
        return $this->overtimemax;
    }

    /**
     * Set missinmiss
     *
     * @param boolean $missinmiss
     * @return Shifts
     */
    public function setMissinmiss($missinmiss)
    {
        $this->missinmiss = $missinmiss;
        return $this;
    }

    /**
     * Get missinmiss
     *
     * @return boolean
     */
    public function getMissinmiss()
    {
        return $this->missinmiss;
    }

    /**
     * Set missoutmiss
     *
     * @param boolean $missoutmiss
     * @return Shifts
     */
    public function setMissoutmiss($missoutmiss)
    {
        $this->missoutmiss = $missoutmiss;
        return $this;
    }

    /**
     * Get missoutmiss
     *
     * @return boolean
     */
    public function getMissoutmiss()
    {
        return $this->missoutmiss;
    }

    /**
     * Set addbreaktoworked
     *
     * @param boolean $addbreaktoworked
     * @return Shifts
     */
    public function setAddbreaktoworked($addbreaktoworked)
    {
        $this->addbreaktoworked = $addbreaktoworked;
        return $this;
    }

    /**
     * Get addbreaktoworked
     *
     * @return boolean
     */
    public function getAddbreaktoworked()
    {
        return $this->addbreaktoworked;
    }

    /**
     * Set addunusedbreaktoovertime
     *
     * @param boolean $addunusedbreaktoovertime
     * @return Shifts
     */
    public function setAddunusedbreaktoovertime($addunusedbreaktoovertime)
    {
        $this->addunusedbreaktoovertime = $addunusedbreaktoovertime;
        return $this;
    }

    /**
     * Get addunusedbreaktoovertime
     *
     * @return boolean
     */
    public function getAddunusedbreaktoovertime()
    {
        return $this->addunusedbreaktoovertime;
    }

    /**
     * Set absentlimit
     *
     * @param \DateTime $absentlimit
     * @return Shifts
     */
    public function setAbsentlimit($absentlimit)
    {
        $this->absentlimit = $absentlimit;
        return $this;
    }

    /**
     * Get absentlimit
     *
     * @return \DateTime
     */
    public function getAbsentlimit()
    {
        return $this->absentlimit;
    }

    /**
     * Set halfdaylimit
     *
     * @param \DateTime $halfdaylimit
     * @return Shifts
     */
    public function setHalfdaylimit($halfdaylimit)
    {
        $this->halfdaylimit = $halfdaylimit;
        return $this;
    }

    /**
     * Get halfdaylimit
     *
     * @return \DateTime
     */
    public function getHalfdaylimit()
    {
        return $this->halfdaylimit;
    }
}
