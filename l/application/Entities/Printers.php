<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Printers
 *
 * @Table(name="Printers")
 * @Entity
 */
class Printers
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
     * @var string $printer
     *
     * @Column(name="Printer", type="string", length=255, nullable=true)
     */
    private $printer;

    /**
     * @var boolean $fire
     *
     * @Column(name="Fire", type="boolean", nullable=true)
     */
    private $fire;


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
     * Set printer
     *
     * @param string $printer
     * @return Printers
     */
    public function setPrinter($printer)
    {
        $this->printer = $printer;
        return $this;
    }

    /**
     * Get printer
     *
     * @return string
     */
    public function getPrinter()
    {
        return $this->printer;
    }

    /**
     * Set fire
     *
     * @param boolean $fire
     * @return Printers
     */
    public function setFire($fire)
    {
        $this->fire = $fire;
        return $this;
    }

    /**
     * Get fire
     *
     * @return boolean
     */
    public function getFire()
    {
        return $this->fire;
    }
}
