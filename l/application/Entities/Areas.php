<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Areas
 *
 * @Table(name="Areas")
 * @Entity
 */
class Areas
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
     * @var integer $site
     *
     * @Column(name="Site", type="integer", nullable=true)
     */
    private $site;

    /**
     * @var string $name
     *
     * @Column(name="Name", type="string", length=30, nullable=true)
     */
    private $name;

    /**
     * @var boolean $apb
     *
     * @Column(name="APB", type="boolean", nullable=true)
     */
    private $apb;

    /**
     * @var boolean $apbresetenable
     *
     * @Column(name="APBResetEnable", type="boolean", nullable=true)
     */
    private $apbresetenable;

    /**
     * @var \DateTime $apbresettime
     *
     * @Column(name="APBResetTime", type="datetime", nullable=true)
     */
    private $apbresettime;


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
     * Set site
     *
     * @param integer $site
     * @return Areas
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
     * Set name
     *
     * @param string $name
     * @return Areas
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
     * Set apb
     *
     * @param boolean $apb
     * @return Areas
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
     * Set apbresetenable
     *
     * @param boolean $apbresetenable
     * @return Areas
     */
    public function setApbresetenable($apbresetenable)
    {
        $this->apbresetenable = $apbresetenable;
        return $this;
    }

    /**
     * Get apbresetenable
     *
     * @return boolean
     */
    public function getApbresetenable()
    {
        return $this->apbresetenable;
    }

    /**
     * Set apbresettime
     *
     * @param \DateTime $apbresettime
     * @return Areas
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
}
