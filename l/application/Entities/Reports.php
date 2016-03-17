<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Reports
 *
 * @Table(name="Reports")
 * @Entity
 */
class Reports
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
     * @var integer $tip
     *
     * @Column(name="Tip", type="integer", nullable=true)
     */
    private $tip;

    /**
     * @var string $podatoci
     *
     * @Column(name="Podatoci", type="text", nullable=true)
     */
    private $podatoci;


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
     * @return Reports
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
     * Set tip
     *
     * @param integer $tip
     * @return Reports
     */
    public function setTip($tip)
    {
        $this->tip = $tip;
        return $this;
    }

    /**
     * Get tip
     *
     * @return integer
     */
    public function getTip()
    {
        return $this->tip;
    }

    /**
     * Set podatoci
     *
     * @param string $podatoci
     * @return Reports
     */
    public function setPodatoci($podatoci)
    {
        $this->podatoci = $podatoci;
        return $this;
    }

    /**
     * Get podatoci
     *
     * @return string
     */
    public function getPodatoci()
    {
        return $this->podatoci;
    }
}
