<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Operators
 *
 * @Table(name="Operators")
 * @Entity
 */
class Operators
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
     * @Column(name="Name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var string $lozinka
     *
     * @Column(name="Lozinka", type="string", length=8, nullable=true)
     */
    private $lozinka;

    /**
     * @var string $dozvoli
     *
     * @Column(name="Dozvoli", type="string", length=250, nullable=true)
     */
    private $dozvoli;

    /**
     * @var string $style
     *
     * @Column(name="Style", type="string", length=250, nullable=true)
     */
    private $style;

    /**
     * @var integer $shadow
     *
     * @Column(name="Shadow", type="integer", nullable=true)
     */
    private $shadow;


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
     * @return Operators
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
     * Set lozinka
     *
     * @param string $lozinka
     * @return Operators
     */
    public function setLozinka($lozinka)
    {
        $this->lozinka = $lozinka;
        return $this;
    }

    /**
     * Get lozinka
     *
     * @return string
     */
    public function getLozinka()
    {
        return $this->lozinka;
    }

    /**
     * Set dozvoli
     *
     * @param string $dozvoli
     * @return Operators
     */
    public function setDozvoli($dozvoli)
    {
        $this->dozvoli = $dozvoli;
        return $this;
    }

    /**
     * Get dozvoli
     *
     * @return string
     */
    public function getDozvoli()
    {
        return $this->dozvoli;
    }

    /**
     * Set style
     *
     * @param string $style
     * @return Operators
     */
    public function setStyle($style)
    {
        $this->style = $style;
        return $this;
    }

    /**
     * Get style
     *
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set shadow
     *
     * @param integer $shadow
     * @return Operators
     */
    public function setShadow($shadow)
    {
        $this->shadow = $shadow;
        return $this;
    }

    /**
     * Get shadow
     *
     * @return integer
     */
    public function getShadow()
    {
        return $this->shadow;
    }
}
