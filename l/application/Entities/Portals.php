<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Portals
 *
 * @Table(name="Portals")
 * @Entity
 */
class Portals
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
     * @var boolean $network
     *
     * @Column(name="Network", type="boolean", nullable=true)
     */
    private $network;

    /**
     * @var string $com
     *
     * @Column(name="Com", type="string", length=5, nullable=true)
     */
    private $com;

    /**
     * @var string $ip
     *
     * @Column(name="IP", type="string", length=40, nullable=true)
     */
    private $ip;

    /**
     * @var integer $port
     *
     * @Column(name="Port", type="integer", nullable=true)
     */
    private $port;


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
     * @return Portals
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
     * Set network
     *
     * @param boolean $network
     * @return Portals
     */
    public function setNetwork($network)
    {
        $this->network = $network;
        return $this;
    }

    /**
     * Get network
     *
     * @return boolean
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * Set com
     *
     * @param string $com
     * @return Portals
     */
    public function setCom($com)
    {
        $this->com = $com;
        return $this;
    }

    /**
     * Get com
     *
     * @return string
     */
    public function getCom()
    {
        return $this->com;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Portals
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set port
     *
     * @param integer $port
     * @return Portals
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * Get port
     *
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }
}
