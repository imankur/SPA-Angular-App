<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Accesslevels
 *
 * @Table(name="AccessLevels")
 * @Entity
 */
class Accesslevels
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
     * @Column(name="Name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string $tabela
     *
     * @Column(name="Tabela", type="text", nullable=true)
     */
    private $tabela;


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
     * @return Accesslevels
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
     * Set tabela
     *
     * @param string $tabela
     * @return Accesslevels
     */
    public function setTabela($tabela)
    {
        $this->tabela = $tabela;
        return $this;
    }

    /**
     * Get tabela
     *
     * @return string
     */
    public function getTabela()
    {
        return $this->tabela;
    }
}
