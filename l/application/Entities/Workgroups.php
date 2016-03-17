<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Workgroups
 *
 * @Table(name="Workgroups")
 * @Entity
 */
class Workgroups
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
     * @var string $readersin
     *
     * @Column(name="ReadersIn", type="text", nullable=true)
     */
    private $readersin;

    /**
     * @var string $readersout
     *
     * @Column(name="ReadersOut", type="text", nullable=true)
     */
    private $readersout;


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
     * @return Workgroups
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
     * Set readersin
     *
     * @param string $readersin
     * @return Workgroups
     */
    public function setReadersin($readersin)
    {
        $this->readersin = $readersin;
        return $this;
    }

    /**
     * Get readersin
     *
     * @return string
     */
    public function getReadersin()
    {
        return $this->readersin;
    }

    /**
     * Set readersout
     *
     * @param string $readersout
     * @return Workgroups
     */
    public function setReadersout($readersout)
    {
        $this->readersout = $readersout;
        return $this;
    }

    /**
     * Get readersout
     *
     * @return string
     */
    public function getReadersout()
    {
        return $this->readersout;
    }
}
