<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Emp *
 * @Table(name="Users")
 * @Entity
 */
class Emp
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
     * @Column(name="Name", type="string", length=40, nullable=true)
     */
    private $name;

    /**
     * @var integer $accesslevel
     *
     * @Column(name="AccessLevel", type="integer", nullable=true)
     */
    private $accesslevel;

    /**
     * @var \DateTime $start
     *
     * @Column(name="Start", type="datetime", nullable=true)
     */
    private $start;

    /**
     * @var \DateTime $stop
     *
     * @Column(name="Stop", type="datetime", nullable=true)
     */
    private $stop;

    /**
     * @var boolean $apb
     *
     * @Column(name="APB", type="boolean", nullable=true)
     */
    private $apb;

    /**
     * @var string $foto
     *
     * @Column(name="Foto", type="text", nullable=true)
     */
    private $foto;

    /**
     * @var string $fo
     *
     * @Column(name="FO", type="text", nullable=true)
     */
    private $fo;

    /**
     * @var integer $department
     *
     * @Column(name="Department", type="integer", nullable=true)
     */
    private $department;

    /**
     * @var integer $workgroup
     *
     * @Column(name="Workgroup", type="integer", nullable=true)
     */
    private $workgroup;

    /**
     * @var integer $fcard
     *
     * @Column(name="FCard", type="integer", nullable=true)
     */
    private $fcard;

    /**
     * @var integer $lastarea
     *
     * @Column(name="LastArea", type="integer", nullable=true)
     */
    private $lastarea;

    /**
     * @var \DateTime $eventtime
     *
     * @Column(name="EventTime", type="datetime", nullable=true)
     */
    private $eventtime;

    /**
     * @var integer $id
     *
     * @Column(name="ID", type="bigint", nullable=true)
     */
    private $id;

    /**
     * @var integer $keyCode
     *
     * @Column(name="Key_Code", type="integer", nullable=true)
     */
    private $keyCode;

    /**
     * @var string $f1
     *
     * @Column(name="F1", type="text", nullable=true)
     */
    private $f1;

    /**
     * @var string $f2
     *
     * @Column(name="F2", type="text", nullable=true)
     */
    private $f2;

    /**
     * @var string $f3
     *
     * @Column(name="F3", type="text", nullable=true)
     */
    private $f3;

    /**
     * @var string $f4
     *
     * @Column(name="F4", type="text", nullable=true)
     */
    private $f4;

    /**
     * @var string $f5
     *
     * @Column(name="F5", type="text", nullable=true)
     */
    private $f5;

    /**
     * @var string $f6
     *
     * @Column(name="F6", type="text", nullable=true)
     */
    private $f6;

    /**
     * @var string $f7
     *
     * @Column(name="F7", type="text", nullable=true)
     */
    private $f7;

    /**
     * @var string $f8
     *
     * @Column(name="F8", type="text", nullable=true)
     */
    private $f8;

    /**
     * @var string $f9
     *
     * @Column(name="F9", type="text", nullable=true)
     */
    private $f9;

    /**
     * @var string $f0
     *
     * @Column(name="F0", type="text", nullable=true)
     */
    private $f0;

    /**
     * @var integer $q1
     *
     * @Column(name="Q1", type="integer", nullable=true)
     */
    private $q1;

    /**
     * @var integer $q2
     *
     * @Column(name="Q2", type="integer", nullable=true)
     */
    private $q2;

    /**
     * @var integer $q3
     *
     * @Column(name="Q3", type="integer", nullable=true)
     */
    private $q3;

    /**
     * @var integer $q4
     *
     * @Column(name="Q4", type="integer", nullable=true)
     */
    private $q4;

    /**
     * @var integer $q5
     *
     * @Column(name="Q5", type="integer", nullable=true)
     */
    private $q5;

    /**
     * @var integer $q6
     *
     * @Column(name="Q6", type="integer", nullable=true)
     */
    private $q6;

    /**
     * @var integer $q7
     *
     * @Column(name="Q7", type="integer", nullable=true)
     */
    private $q7;

    /**
     * @var integer $q8
     *
     * @Column(name="Q8", type="integer", nullable=true)
     */
    private $q8;

    /**
     * @var integer $q9
     *
     * @Column(name="Q9", type="integer", nullable=true)
     */
    private $q9;

    /**
     * @var integer $q0
     *
     * @Column(name="Q0", type="integer", nullable=true)
     */
    private $q0;

    /**
     * @var string $detail1
     *
     * @Column(name="Detail1", type="string", length=30, nullable=true)
     */
    private $detail1;

    /**
     * @var string $detail2
     *
     * @Column(name="Detail2", type="string", length=30, nullable=true)
     */
    private $detail2;

    /**
     * @var string $detail3
     *
     * @Column(name="Detail3", type="string", length=50, nullable=true)
     */
    private $detail3;

    /**
     * @var string $detail4
     *
     * @Column(name="Detail4", type="string", length=30, nullable=true)
     */
    private $detail4;

    /**
     * @var string $detail5
     *
     * @Column(name="Detail5", type="string", length=30, nullable=true)
     */
    private $detail5;

    /**
     * @var string $detail6
     *
     * @Column(name="Detail6", type="string", length=30, nullable=true)
     */
    private $detail6;

    /**
     * @var string $detail7
     *
     * @Column(name="Detail7", type="string", length=250, nullable=true)
     */
    private $detail7;

    /**
     * @var string $detail8
     *
     * @Column(name="Detail8", type="string", length=10, nullable=true)
     */
    private $detail8;

    /**
     * @var string $detail9
     *
     * @Column(name="Detail9", type="string", length=50, nullable=true)
     */
    private $detail9;

    /**
     * @var string $detail10
     *
     * @Column(name="Detail10", type="string", length=30, nullable=true)
     */
    private $detail10;

    /**
     * @var string $detail11
     *
     * @Column(name="Detail11", type="string", length=30, nullable=true)
     */
    private $detail11;

    /**
     * @var string $detail12
     *
     * @Column(name="Detail12", type="string", length=250, nullable=true)
     */
    private $detail12;

    /**
     * @var string $detail13
     *
     * @Column(name="Detail13", type="string", length=50, nullable=true)
     */
    private $detail13;

    /**
     * @var string $detail14
     *
     * @Column(name="Detail14", type="string", length=50, nullable=true)
     */
    private $detail14;

    /**
     * @var string $detail15
     *
     * @Column(name="Detail15", type="string", length=50, nullable=true)
     */
    private $detail15;

    /**
     * @var string $detail16
     *
     * @Column(name="Detail16", type="string", length=50, nullable=true)
     */
    private $detail16;

    /**
     * @var string $detail17
     *
     * @Column(name="Detail17", type="string", length=50, nullable=true)
     */
    private $detail17;

    /**
     * @var string $detail18
     *
     * @Column(name="Detail18", type="string", length=30, nullable=true)
     */
    private $detail18;


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
     * @return Emp
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
     * Set accesslevel
     *
     * @param integer $accesslevel
     * @return Emp
     */
    public function setAccesslevel($accesslevel)
    {
        $this->accesslevel = $accesslevel;
        return $this;
    }

    /**
     * Get accesslevel
     *
     * @return integer
     */
    public function getAccesslevel()
    {
        return $this->accesslevel;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     * @return Emp
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
     * Set stop
     *
     * @param \DateTime $stop
     * @return Emp
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
     * Set apb
     *
     * @param boolean $apb
     * @return Emp
     */
    public function setApb($apb)
    {
        $this->apb = $apb;
        return $this;
    }

    /**
     * Get apb
     *
     * @return boolean
     */
    public function getApb()
    {
        return $this->apb;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Emp
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set fo
     *
     * @param string $fo
     * @return Emp
     */
    public function setFo($fo)
    {
        $this->fo = $fo;
        return $this;
    }

    /**
     * Get fo
     *
     * @return string
     */
    public function getFo()
    {
        return $this->fo;
    }

    /**
     * Set department
     *
     * @param integer $department
     * @return Emp
     */
    public function setDepartment($department)
    {
        $this->department = $department;
        return $this;
    }

    /**
     * Get department
     *
     * @return integer
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set workgroup
     *
     * @param integer $workgroup
     * @return Emp
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
     * Set fcard
     *
     * @param integer $fcard
     * @return Emp
     */
    public function setFcard($fcard)
    {
        $this->fcard = $fcard;
        return $this;
    }

    /**
     * Get fcard
     *
     * @return integer
     */
    public function getFcard()
    {
        return $this->fcard;
    }

    /**
     * Set lastarea
     *
     * @param integer $lastarea
     * @return Emp
     */
    public function setLastarea($lastarea)
    {
        $this->lastarea = $lastarea;
        return $this;
    }

    /**
     * Get lastarea
     *
     * @return integer
     */
    public function getLastarea()
    {
        return $this->lastarea;
    }

    /**
     * Set eventtime
     *
     * @param \DateTime $eventtime
     * @return Emp
     */
    public function setEventtime($eventtime)
    {
        $this->eventtime = $eventtime;
        return $this;
    }

    /**
     * Get eventtime
     *
     * @return \DateTime
     */
    public function getEventtime()
    {
        return $this->eventtime;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Emp
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set keyCode
     *
     * @param integer $keyCode
     * @return Emp
     */
    public function setKeyCode($keyCode)
    {
        $this->keyCode = $keyCode;
        return $this;
    }

    /**
     * Get keyCode
     *
     * @return integer
     */
    public function getKeyCode()
    {
        return $this->keyCode;
    }

    /**
     * Set f1
     *
     * @param string $f1
     * @return Emp
     */
    public function setF1($f1)
    {
        $this->f1 = $f1;
        return $this;
    }

    /**
     * Get f1
     *
     * @return string
     */
    public function getF1()
    {
        return $this->f1;
    }

    /**
     * Set f2
     *
     * @param string $f2
     * @return Emp
     */
    public function setF2($f2)
    {
        $this->f2 = $f2;
        return $this;
    }

    /**
     * Get f2
     *
     * @return string
     */
    public function getF2()
    {
        return $this->f2;
    }

    /**
     * Set f3
     *
     * @param string $f3
     * @return Emp
     */
    public function setF3($f3)
    {
        $this->f3 = $f3;
        return $this;
    }

    /**
     * Get f3
     *
     * @return string
     */
    public function getF3()
    {
        return $this->f3;
    }

    /**
     * Set f4
     *
     * @param string $f4
     * @return Emp
     */
    public function setF4($f4)
    {
        $this->f4 = $f4;
        return $this;
    }

    /**
     * Get f4
     *
     * @return string
     */
    public function getF4()
    {
        return $this->f4;
    }

    /**
     * Set f5
     *
     * @param string $f5
     * @return Emp
     */
    public function setF5($f5)
    {
        $this->f5 = $f5;
        return $this;
    }

    /**
     * Get f5
     *
     * @return string
     */
    public function getF5()
    {
        return $this->f5;
    }

    /**
     * Set f6
     *
     * @param string $f6
     * @return Emp
     */
    public function setF6($f6)
    {
        $this->f6 = $f6;
        return $this;
    }

    /**
     * Get f6
     *
     * @return string
     */
    public function getF6()
    {
        return $this->f6;
    }

    /**
     * Set f7
     *
     * @param string $f7
     * @return Emp
     */
    public function setF7($f7)
    {
        $this->f7 = $f7;
        return $this;
    }

    /**
     * Get f7
     *
     * @return string
     */
    public function getF7()
    {
        return $this->f7;
    }

    /**
     * Set f8
     *
     * @param string $f8
     * @return Emp
     */
    public function setF8($f8)
    {
        $this->f8 = $f8;
        return $this;
    }

    /**
     * Get f8
     *
     * @return string
     */
    public function getF8()
    {
        return $this->f8;
    }

    /**
     * Set f9
     *
     * @param string $f9
     * @return Emp
     */
    public function setF9($f9)
    {
        $this->f9 = $f9;
        return $this;
    }

    /**
     * Get f9
     *
     * @return string
     */
    public function getF9()
    {
        return $this->f9;
    }

    /**
     * Set f0
     *
     * @param string $f0
     * @return Emp
     */
    public function setF0($f0)
    {
        $this->f0 = $f0;
        return $this;
    }

    /**
     * Get f0
     *
     * @return string
     */
    public function getF0()
    {
        return $this->f0;
    }

    /**
     * Set q1
     *
     * @param integer $q1
     * @return Emp
     */
    public function setQ1($q1)
    {
        $this->q1 = $q1;
        return $this;
    }

    /**
     * Get q1
     *
     * @return integer
     */
    public function getQ1()
    {
        return $this->q1;
    }

    /**
     * Set q2
     *
     * @param integer $q2
     * @return Emp
     */
    public function setQ2($q2)
    {
        $this->q2 = $q2;
        return $this;
    }

    /**
     * Get q2
     *
     * @return integer
     */
    public function getQ2()
    {
        return $this->q2;
    }

    /**
     * Set q3
     *
     * @param integer $q3
     * @return Emp
     */
    public function setQ3($q3)
    {
        $this->q3 = $q3;
        return $this;
    }

    /**
     * Get q3
     *
     * @return integer
     */
    public function getQ3()
    {
        return $this->q3;
    }

    /**
     * Set q4
     *
     * @param integer $q4
     * @return Emp
     */
    public function setQ4($q4)
    {
        $this->q4 = $q4;
        return $this;
    }

    /**
     * Get q4
     *
     * @return integer
     */
    public function getQ4()
    {
        return $this->q4;
    }

    /**
     * Set q5
     *
     * @param integer $q5
     * @return Emp
     */
    public function setQ5($q5)
    {
        $this->q5 = $q5;
        return $this;
    }

    /**
     * Get q5
     *
     * @return integer
     */
    public function getQ5()
    {
        return $this->q5;
    }

    /**
     * Set q6
     *
     * @param integer $q6
     * @return Emp
     */
    public function setQ6($q6)
    {
        $this->q6 = $q6;
        return $this;
    }

    /**
     * Get q6
     *
     * @return integer
     */
    public function getQ6()
    {
        return $this->q6;
    }

    /**
     * Set q7
     *
     * @param integer $q7
     * @return Emp
     */
    public function setQ7($q7)
    {
        $this->q7 = $q7;
        return $this;
    }

    /**
     * Get q7
     *
     * @return integer
     */
    public function getQ7()
    {
        return $this->q7;
    }

    /**
     * Set q8
     *
     * @param integer $q8
     * @return Emp
     */
    public function setQ8($q8)
    {
        $this->q8 = $q8;
        return $this;
    }

    /**
     * Get q8
     *
     * @return integer
     */
    public function getQ8()
    {
        return $this->q8;
    }

    /**
     * Set q9
     *
     * @param integer $q9
     * @return Emp
     */
    public function setQ9($q9)
    {
        $this->q9 = $q9;
        return $this;
    }

    /**
     * Get q9
     *
     * @return integer
     */
    public function getQ9()
    {
        return $this->q9;
    }

    /**
     * Set q0
     *
     * @param integer $q0
     * @return Emp
     */
    public function setQ0($q0)
    {
        $this->q0 = $q0;
        return $this;
    }

    /**
     * Get q0
     *
     * @return integer
     */
    public function getQ0()
    {
        return $this->q0;
    }

    /**
     * Set detail1
     *
     * @param string $detail1
     * @return Emp
     */
    public function setDetail1($detail1)
    {
        $this->detail1 = $detail1;
        return $this;
    }

    /**
     * Get detail1
     *
     * @return string
     */
    public function getDetail1()
    {
        return $this->detail1;
    }

    /**
     * Set detail2
     *
     * @param string $detail2
     * @return Emp
     */
    public function setDetail2($detail2)
    {
        $this->detail2 = $detail2;
        return $this;
    }

    /**
     * Get detail2
     *
     * @return string
     */
    public function getDetail2()
    {
        return $this->detail2;
    }

    /**
     * Set detail3
     *
     * @param string $detail3
     * @return Emp
     */
    public function setDetail3($detail3)
    {
        $this->detail3 = $detail3;
        return $this;
    }

    /**
     * Get detail3
     *
     * @return string
     */
    public function getDetail3()
    {
        return $this->detail3;
    }

    /**
     * Set detail4
     *
     * @param string $detail4
     * @return Emp
     */
    public function setDetail4($detail4)
    {
        $this->detail4 = $detail4;
        return $this;
    }

    /**
     * Get detail4
     *
     * @return string
     */
    public function getDetail4()
    {
        return $this->detail4;
    }

    /**
     * Set detail5
     *
     * @param string $detail5
     * @return Emp
     */
    public function setDetail5($detail5)
    {
        $this->detail5 = $detail5;
        return $this;
    }

    /**
     * Get detail5
     *
     * @return string
     */
    public function getDetail5()
    {
        return $this->detail5;
    }

    /**
     * Set detail6
     *
     * @param string $detail6
     * @return Emp
     */
    public function setDetail6($detail6)
    {
        $this->detail6 = $detail6;
        return $this;
    }

    /**
     * Get detail6
     *
     * @return string
     */
    public function getDetail6()
    {
        return $this->detail6;
    }

    /**
     * Set detail7
     *
     * @param string $detail7
     * @return Emp
     */
    public function setDetail7($detail7)
    {
        $this->detail7 = $detail7;
        return $this;
    }

    /**
     * Get detail7
     *
     * @return string
     */
    public function getDetail7()
    {
        return $this->detail7;
    }

    /**
     * Set detail8
     *
     * @param string $detail8
     * @return Emp
     */
    public function setDetail8($detail8)
    {
        $this->detail8 = $detail8;
        return $this;
    }

    /**
     * Get detail8
     *
     * @return string
     */
    public function getDetail8()
    {
        return $this->detail8;
    }

    /**
     * Set detail9
     *
     * @param string $detail9
     * @return Emp
     */
    public function setDetail9($detail9)
    {
        $this->detail9 = $detail9;
        return $this;
    }

    /**
     * Get detail9
     *
     * @return string
     */
    public function getDetail9()
    {
        return $this->detail9;
    }

    /**
     * Set detail10
     *
     * @param string $detail10
     * @return Emp
     */
    public function setDetail10($detail10)
    {
        $this->detail10 = $detail10;
        return $this;
    }

    /**
     * Get detail10
     *
     * @return string
     */
    public function getDetail10()
    {
        return $this->detail10;
    }

    /**
     * Set detail11
     *
     * @param string $detail11
     * @return Emp
     */
    public function setDetail11($detail11)
    {
        $this->detail11 = $detail11;
        return $this;
    }

    /**
     * Get detail11
     *
     * @return string
     */
    public function getDetail11()
    {
        return $this->detail11;
    }

    /**
     * Set detail12
     *
     * @param string $detail12
     * @return Emp
     */
    public function setDetail12($detail12)
    {
        $this->detail12 = $detail12;
        return $this;
    }

    /**
     * Get detail12
     *
     * @return string
     */
    public function getDetail12()
    {
        return $this->detail12;
    }

    /**
     * Set detail13
     *
     * @param string $detail13
     * @return Emp
     */
    public function setDetail13($detail13)
    {
        $this->detail13 = $detail13;
        return $this;
    }

    /**
     * Get detail13
     *
     * @return string
     */
    public function getDetail13()
    {
        return $this->detail13;
    }

    /**
     * Set detail14
     *
     * @param string $detail14
     * @return Emp
     */
    public function setDetail14($detail14)
    {
        $this->detail14 = $detail14;
        return $this;
    }

    /**
     * Get detail14
     *
     * @return string
     */
    public function getDetail14()
    {
        return $this->detail14;
    }

    /**
     * Set detail15
     *
     * @param string $detail15
     * @return Emp
     */
    public function setDetail15($detail15)
    {
        $this->detail15 = $detail15;
        return $this;
    }

    /**
     * Get detail15
     *
     * @return string
     */
    public function getDetail15()
    {
        return $this->detail15;
    }

    /**
     * Set detail16
     *
     * @param string $detail16
     * @return Emp
     */
    public function setDetail16($detail16)
    {
        $this->detail16 = $detail16;
        return $this;
    }

    /**
     * Get detail16
     *
     * @return string
     */
    public function getDetail16()
    {
        return $this->detail16;
    }

    /**
     * Set detail17
     *
     * @param string $detail17
     * @return Emp
     */
    public function setDetail17($detail17)
    {
        $this->detail17 = $detail17;
        return $this;
    }

    /**
     * Get detail17
     *
     * @return string
     */
    public function getDetail17()
    {
        return $this->detail17;
    }

    /**
     * Set detail18
     *
     * @param string $detail18
     * @return Emp
     */
    public function setDetail18($detail18)
    {
        $this->detail18 = $detail18;
        return $this;
    }

    /**
     * Get detail18
     *
     * @return string
     */
    public function getDetail18()
    {
        return $this->detail18;
    }
}
