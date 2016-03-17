<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Sistem
 *
 * @Table(name="Sistem")
 * @Entity
 */
class Sistem
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
     * @var string $parameter
     *
     * @Column(name="Parameter", type="string", length=20, nullable=false)
     */
    private $parameter;

    /**
     * @var string $value1
     *
     * @Column(name="Value1", type="text", nullable=true)
     */
    private $value1;


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
     * Set parameter
     *
     * @param string $parameter
     * @return Sistem
     */
    public function setParameter($parameter)
    {
        $this->parameter = $parameter;
        return $this;
    }

    /**
     * Get parameter
     *
     * @return string
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * Set value1
     *
     * @param string $value1
     * @return Sistem
     */
    public function setValue1($value1)
    {
        $this->value1 = $value1;
        return $this;
    }

    /**
     * Get value1
     *
     * @return string
     */
    public function getValue1()
    {
        return $this->value1;
    }
}
