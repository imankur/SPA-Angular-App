<?php
namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Holiday
 *
 * @Table(name="holiday")
 * @Entity
 */
class Holiday
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
     * @var \DateTime $holidayDate
     *
     * @Column(name="holiday_date", type="date", nullable=false)
     */
    private $holidayDate;

    /**
     * @var string $description
     *
     * @Column(name="description", type="text", nullable=true)
     */
    private $description;


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
     * Set holidayDate
     *
     * @param \DateTime $holidayDate
     * @return Holiday
     */
    public function setHolidayDate($holidayDate)
    {
        $this->holidayDate = $holidayDate;
        return $this;
    }

    /**
     * Get holidayDate
     *
     * @return \DateTime
     */
    public function getHolidayDate()
    {
        return $this->holidayDate;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Holiday
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
