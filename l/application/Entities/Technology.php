<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Technology
 *
 * @Table(name="technology")
 * @Entity
 */
class Technology
{
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $technology
     *
     * @Column(name="Technology", type="string", length=30, nullable=true)
     */
    private $technology;


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
     * Set technology
     *
     * @param string $technology
     * @return Technology
     */
    public function setTechnology($technology)
    {
        $this->technology = $technology;
        return $this;
    }

    /**
     * Get technology
     *
     * @return string
     */
    public function getTechnology()
    {
        return $this->technology;
    }
}
