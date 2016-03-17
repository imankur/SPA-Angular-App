<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Odsastva
 *
 * @Table(name="Odsastva")
 * @Entity
 */
class Odsastva
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
     * @var integer $korisnik
     *
     * @Column(name="Korisnik", type="integer", nullable=false)
     */
    private $korisnik;

    /**
     * @var integer $godina
     *
     * @Column(name="Godina", type="smallint", nullable=true)
     */
    private $godina;

    /**
     * @var integer $mesec
     *
     * @Column(name="Mesec", type="integer", nullable=true)
     */
    private $mesec;

    /**
     * @var integer $d1
     *
     * @Column(name="D1", type="smallint", nullable=true)
     */
    private $d1;

    /**
     * @var integer $d2
     *
     * @Column(name="D2", type="smallint", nullable=true)
     */
    private $d2;

    /**
     * @var integer $d3
     *
     * @Column(name="D3", type="smallint", nullable=true)
     */
    private $d3;

    /**
     * @var integer $d4
     *
     * @Column(name="D4", type="smallint", nullable=true)
     */
    private $d4;

    /**
     * @var integer $d5
     *
     * @Column(name="D5", type="smallint", nullable=true)
     */
    private $d5;

    /**
     * @var integer $d6
     *
     * @Column(name="D6", type="smallint", nullable=true)
     */
    private $d6;

    /**
     * @var integer $d7
     *
     * @Column(name="D7", type="smallint", nullable=true)
     */
    private $d7;

    /**
     * @var integer $d8
     *
     * @Column(name="D8", type="smallint", nullable=true)
     */
    private $d8;

    /**
     * @var integer $d9
     *
     * @Column(name="D9", type="smallint", nullable=true)
     */
    private $d9;

    /**
     * @var integer $d10
     *
     * @Column(name="D10", type="smallint", nullable=true)
     */
    private $d10;

    /**
     * @var integer $d11
     *
     * @Column(name="D11", type="smallint", nullable=true)
     */
    private $d11;

    /**
     * @var integer $d12
     *
     * @Column(name="D12", type="smallint", nullable=true)
     */
    private $d12;

    /**
     * @var integer $d13
     *
     * @Column(name="D13", type="smallint", nullable=true)
     */
    private $d13;

    /**
     * @var integer $d14
     *
     * @Column(name="D14", type="smallint", nullable=true)
     */
    private $d14;

    /**
     * @var integer $d15
     *
     * @Column(name="D15", type="smallint", nullable=true)
     */
    private $d15;

    /**
     * @var integer $d16
     *
     * @Column(name="D16", type="smallint", nullable=true)
     */
    private $d16;

    /**
     * @var integer $d17
     *
     * @Column(name="D17", type="smallint", nullable=true)
     */
    private $d17;

    /**
     * @var integer $d18
     *
     * @Column(name="D18", type="smallint", nullable=true)
     */
    private $d18;

    /**
     * @var integer $d19
     *
     * @Column(name="D19", type="smallint", nullable=true)
     */
    private $d19;

    /**
     * @var integer $d20
     *
     * @Column(name="D20", type="smallint", nullable=true)
     */
    private $d20;

    /**
     * @var integer $d21
     *
     * @Column(name="D21", type="smallint", nullable=true)
     */
    private $d21;

    /**
     * @var integer $d22
     *
     * @Column(name="D22", type="smallint", nullable=true)
     */
    private $d22;

    /**
     * @var integer $d23
     *
     * @Column(name="D23", type="smallint", nullable=true)
     */
    private $d23;

    /**
     * @var integer $d24
     *
     * @Column(name="D24", type="smallint", nullable=true)
     */
    private $d24;

    /**
     * @var integer $d25
     *
     * @Column(name="D25", type="smallint", nullable=true)
     */
    private $d25;

    /**
     * @var integer $d26
     *
     * @Column(name="D26", type="smallint", nullable=true)
     */
    private $d26;

    /**
     * @var integer $d27
     *
     * @Column(name="D27", type="smallint", nullable=true)
     */
    private $d27;

    /**
     * @var integer $d28
     *
     * @Column(name="D28", type="smallint", nullable=true)
     */
    private $d28;

    /**
     * @var integer $d29
     *
     * @Column(name="D29", type="smallint", nullable=true)
     */
    private $d29;

    /**
     * @var integer $d30
     *
     * @Column(name="D30", type="smallint", nullable=true)
     */
    private $d30;

    /**
     * @var integer $d31
     *
     * @Column(name="D31", type="smallint", nullable=true)
     */
    private $d31;


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
     * Set korisnik
     *
     * @param integer $korisnik
     * @return Odsastva
     */
    public function setKorisnik($korisnik)
    {
        $this->korisnik = $korisnik;
        return $this;
    }

    /**
     * Get korisnik
     *
     * @return integer
     */
    public function getKorisnik()
    {
        return $this->korisnik;
    }

    /**
     * Set godina
     *
     * @param integer $godina
     * @return Odsastva
     */
    public function setGodina($godina)
    {
        $this->godina = $godina;
        return $this;
    }

    /**
     * Get godina
     *
     * @return integer
     */
    public function getGodina()
    {
        return $this->godina;
    }

    /**
     * Set mesec
     *
     * @param integer $mesec
     * @return Odsastva
     */
    public function setMesec($mesec)
    {
        $this->mesec = $mesec;
        return $this;
    }

    /**
     * Get mesec
     *
     * @return integer
     */
    public function getMesec()
    {
        return $this->mesec;
    }

    /**
     * Set d1
     *
     * @param integer $d1
     * @return Odsastva
     */
    public function setD1($d1)
    {
        $this->d1 = $d1;
        return $this;
    }

    /**
     * Get d1
     *
     * @return integer
     */
    public function getD1()
    {
        return $this->d1;
    }

    /**
     * Set d2
     *
     * @param integer $d2
     * @return Odsastva
     */
    public function setD2($d2)
    {
        $this->d2 = $d2;
        return $this;
    }

    /**
     * Get d2
     *
     * @return integer
     */
    public function getD2()
    {
        return $this->d2;
    }

    /**
     * Set d3
     *
     * @param integer $d3
     * @return Odsastva
     */
    public function setD3($d3)
    {
        $this->d3 = $d3;
        return $this;
    }

    /**
     * Get d3
     *
     * @return integer
     */
    public function getD3()
    {
        return $this->d3;
    }

    /**
     * Set d4
     *
     * @param integer $d4
     * @return Odsastva
     */
    public function setD4($d4)
    {
        $this->d4 = $d4;
        return $this;
    }

    /**
     * Get d4
     *
     * @return integer
     */
    public function getD4()
    {
        return $this->d4;
    }

    /**
     * Set d5
     *
     * @param integer $d5
     * @return Odsastva
     */
    public function setD5($d5)
    {
        $this->d5 = $d5;
        return $this;
    }

    /**
     * Get d5
     *
     * @return integer
     */
    public function getD5()
    {
        return $this->d5;
    }

    /**
     * Set d6
     *
     * @param integer $d6
     * @return Odsastva
     */
    public function setD6($d6)
    {
        $this->d6 = $d6;
        return $this;
    }

    /**
     * Get d6
     *
     * @return integer
     */
    public function getD6()
    {
        return $this->d6;
    }

    /**
     * Set d7
     *
     * @param integer $d7
     * @return Odsastva
     */
    public function setD7($d7)
    {
        $this->d7 = $d7;
        return $this;
    }

    /**
     * Get d7
     *
     * @return integer
     */
    public function getD7()
    {
        return $this->d7;
    }

    /**
     * Set d8
     *
     * @param integer $d8
     * @return Odsastva
     */
    public function setD8($d8)
    {
        $this->d8 = $d8;
        return $this;
    }

    /**
     * Get d8
     *
     * @return integer
     */
    public function getD8()
    {
        return $this->d8;
    }

    /**
     * Set d9
     *
     * @param integer $d9
     * @return Odsastva
     */
    public function setD9($d9)
    {
        $this->d9 = $d9;
        return $this;
    }

    /**
     * Get d9
     *
     * @return integer
     */
    public function getD9()
    {
        return $this->d9;
    }

    /**
     * Set d10
     *
     * @param integer $d10
     * @return Odsastva
     */
    public function setD10($d10)
    {
        $this->d10 = $d10;
        return $this;
    }

    /**
     * Get d10
     *
     * @return integer
     */
    public function getD10()
    {
        return $this->d10;
    }

    /**
     * Set d11
     *
     * @param integer $d11
     * @return Odsastva
     */
    public function setD11($d11)
    {
        $this->d11 = $d11;
        return $this;
    }

    /**
     * Get d11
     *
     * @return integer
     */
    public function getD11()
    {
        return $this->d11;
    }

    /**
     * Set d12
     *
     * @param integer $d12
     * @return Odsastva
     */
    public function setD12($d12)
    {
        $this->d12 = $d12;
        return $this;
    }

    /**
     * Get d12
     *
     * @return integer
     */
    public function getD12()
    {
        return $this->d12;
    }

    /**
     * Set d13
     *
     * @param integer $d13
     * @return Odsastva
     */
    public function setD13($d13)
    {
        $this->d13 = $d13;
        return $this;
    }

    /**
     * Get d13
     *
     * @return integer
     */
    public function getD13()
    {
        return $this->d13;
    }

    /**
     * Set d14
     *
     * @param integer $d14
     * @return Odsastva
     */
    public function setD14($d14)
    {
        $this->d14 = $d14;
        return $this;
    }

    /**
     * Get d14
     *
     * @return integer
     */
    public function getD14()
    {
        return $this->d14;
    }

    /**
     * Set d15
     *
     * @param integer $d15
     * @return Odsastva
     */
    public function setD15($d15)
    {
        $this->d15 = $d15;
        return $this;
    }

    /**
     * Get d15
     *
     * @return integer
     */
    public function getD15()
    {
        return $this->d15;
    }

    /**
     * Set d16
     *
     * @param integer $d16
     * @return Odsastva
     */
    public function setD16($d16)
    {
        $this->d16 = $d16;
        return $this;
    }

    /**
     * Get d16
     *
     * @return integer
     */
    public function getD16()
    {
        return $this->d16;
    }

    /**
     * Set d17
     *
     * @param integer $d17
     * @return Odsastva
     */
    public function setD17($d17)
    {
        $this->d17 = $d17;
        return $this;
    }

    /**
     * Get d17
     *
     * @return integer
     */
    public function getD17()
    {
        return $this->d17;
    }

    /**
     * Set d18
     *
     * @param integer $d18
     * @return Odsastva
     */
    public function setD18($d18)
    {
        $this->d18 = $d18;
        return $this;
    }

    /**
     * Get d18
     *
     * @return integer
     */
    public function getD18()
    {
        return $this->d18;
    }

    /**
     * Set d19
     *
     * @param integer $d19
     * @return Odsastva
     */
    public function setD19($d19)
    {
        $this->d19 = $d19;
        return $this;
    }

    /**
     * Get d19
     *
     * @return integer
     */
    public function getD19()
    {
        return $this->d19;
    }

    /**
     * Set d20
     *
     * @param integer $d20
     * @return Odsastva
     */
    public function setD20($d20)
    {
        $this->d20 = $d20;
        return $this;
    }

    /**
     * Get d20
     *
     * @return integer
     */
    public function getD20()
    {
        return $this->d20;
    }

    /**
     * Set d21
     *
     * @param integer $d21
     * @return Odsastva
     */
    public function setD21($d21)
    {
        $this->d21 = $d21;
        return $this;
    }

    /**
     * Get d21
     *
     * @return integer
     */
    public function getD21()
    {
        return $this->d21;
    }

    /**
     * Set d22
     *
     * @param integer $d22
     * @return Odsastva
     */
    public function setD22($d22)
    {
        $this->d22 = $d22;
        return $this;
    }

    /**
     * Get d22
     *
     * @return integer
     */
    public function getD22()
    {
        return $this->d22;
    }

    /**
     * Set d23
     *
     * @param integer $d23
     * @return Odsastva
     */
    public function setD23($d23)
    {
        $this->d23 = $d23;
        return $this;
    }

    /**
     * Get d23
     *
     * @return integer
     */
    public function getD23()
    {
        return $this->d23;
    }

    /**
     * Set d24
     *
     * @param integer $d24
     * @return Odsastva
     */
    public function setD24($d24)
    {
        $this->d24 = $d24;
        return $this;
    }

    /**
     * Get d24
     *
     * @return integer
     */
    public function getD24()
    {
        return $this->d24;
    }

    /**
     * Set d25
     *
     * @param integer $d25
     * @return Odsastva
     */
    public function setD25($d25)
    {
        $this->d25 = $d25;
        return $this;
    }

    /**
     * Get d25
     *
     * @return integer
     */
    public function getD25()
    {
        return $this->d25;
    }

    /**
     * Set d26
     *
     * @param integer $d26
     * @return Odsastva
     */
    public function setD26($d26)
    {
        $this->d26 = $d26;
        return $this;
    }

    /**
     * Get d26
     *
     * @return integer
     */
    public function getD26()
    {
        return $this->d26;
    }

    /**
     * Set d27
     *
     * @param integer $d27
     * @return Odsastva
     */
    public function setD27($d27)
    {
        $this->d27 = $d27;
        return $this;
    }

    /**
     * Get d27
     *
     * @return integer
     */
    public function getD27()
    {
        return $this->d27;
    }

    /**
     * Set d28
     *
     * @param integer $d28
     * @return Odsastva
     */
    public function setD28($d28)
    {
        $this->d28 = $d28;
        return $this;
    }

    /**
     * Get d28
     *
     * @return integer
     */
    public function getD28()
    {
        return $this->d28;
    }

    /**
     * Set d29
     *
     * @param integer $d29
     * @return Odsastva
     */
    public function setD29($d29)
    {
        $this->d29 = $d29;
        return $this;
    }

    /**
     * Get d29
     *
     * @return integer
     */
    public function getD29()
    {
        return $this->d29;
    }

    /**
     * Set d30
     *
     * @param integer $d30
     * @return Odsastva
     */
    public function setD30($d30)
    {
        $this->d30 = $d30;
        return $this;
    }

    /**
     * Get d30
     *
     * @return integer
     */
    public function getD30()
    {
        return $this->d30;
    }

    /**
     * Set d31
     *
     * @param integer $d31
     * @return Odsastva
     */
    public function setD31($d31)
    {
        $this->d31 = $d31;
        return $this;
    }

    /**
     * Get d31
     *
     * @return integer
     */
    public function getD31()
    {
        return $this->d31;
    }
}
