<?php

namespace Entities;

use Doctrine\Mapping as ORM;

/**
 * Nastani
 *
 * @Table(name="Nastani")
 * @Entity
 */
class Nastani{
	/**
	 *
	 * @var integer $redbr
	 *
	 *      @Column(name="RedBr", type="integer", nullable=false)
	 *      @Id
	 *      @GeneratedValue(strategy="IDENTITY")
	 */
	private $redbr;

	/**
	 *
	 * @var \DateTime $vreme
	 *
	 *      @Column(name="Vreme", type="datetime", nullable=true)
	 */
	private $vreme;

	/**
	 *
	 * @var integer $nastan
	 *
	 *      @Column(name="Nastan", type="integer", nullable=true)
	 */
	private $nastan;

	/**
	 *
	 * @var integer $controller
	 *
	 *      @Column(name="Controller", type="integer", nullable=true)
	 */
	private $controller;

	/**
	 *
	 * @var integer $korisnik
	 *
	 *      @Column(name="Korisnik", type="integer", nullable=true)
	 */
	private $korisnik;

	/**
	 *
	 * @var integer $id
	 *
	 *      @Column(name="ID", type="bigint", nullable=true)
	 */
	private $id;

	/**
	 *
	 * @var integer $vrata
	 *
	 *      @Column(name="Vrata", type="integer", nullable=true)
	 */
	private $vrata;

	/**
	 *
	 * @var integer $citac
	 *
	 *      @Column(name="Citac", type="integer", nullable=true)
	 */
	private $citac;

	/**
	 *
	 * @var integer $fi
	 *
	 *      @Column(name="FI", type="integer", nullable=true)
	 */
	private $fi;

	/**
	 *
	 * @var integer $fo
	 *
	 *      @Column(name="FO", type="integer", nullable=true)
	 */
	private $fo;

	/**
	 *
	 * @var integer $taevent
	 *
	 *      @Column(name="TAEvent", type="smallint", nullable=true)
	 */
	private $taevent;

	/**
	 * Get redbr
	 *
	 * @return integer
	 */
	public function getRedbr(){
		return $this->redbr;
	}

	/**
	 * Set vreme
	 *
	 * @param $vreme \DateTime
	 * @return Nastani
	 */
	public function setVreme($vreme){
		$this->vreme = $vreme;
		return $this;
	}

	/**
	 * Get vreme
	 *
	 * @return \DateTime
	 */
	public function getVreme(){
		return $this->vreme;
	}

	/**
	 * Set nastan
	 *
	 * @param $nastan integer
	 * @return Nastani
	 */
	public function setNastan($nastan){
		$this->nastan = $nastan;
		return $this;
	}

	/**
	 * Get nastan
	 *
	 * @return integer
	 */
	public function getNastan(){
		return $this->nastan;
	}

	/**
	 * Set controller
	 *
	 * @param $controller integer
	 * @return Nastani
	 */
	public function setController($controller){
		$this->controller = $controller;
		return $this;
	}

	/**
	 * Get controller
	 *
	 * @return integer
	 */
	public function getController(){
		return $this->controller;
	}

	/**
	 * Set korisnik
	 *
	 * @param $korisnik integer
	 * @return Nastani
	 */
	public function setKorisnik($korisnik){
		$this->korisnik = $korisnik;
		return $this;
	}

	/**
	 * Get korisnik
	 *
	 * @return integer
	 */
	public function getKorisnik(){
		return $this->korisnik;
	}

	/**
	 * Set id
	 *
	 * @param $id integer
	 * @return Nastani
	 */
	public function setId($id){
		$this->id = $id;
		return $this;
	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId(){
		return $this->id;
	}

	/**
	 * Set vrata
	 *
	 * @param $vrata integer
	 * @return Nastani
	 */
	public function setVrata($vrata){
		$this->vrata = $vrata;
		return $this;
	}

	/**
	 * Get vrata
	 *
	 * @return integer
	 */
	public function getVrata(){
		return $this->vrata;
	}

	/**
	 * Set citac
	 *
	 * @param $citac integer
	 * @return Nastani
	 */
	public function setCitac($citac){
		$this->citac = $citac;
		return $this;
	}

	/**
	 * Get citac
	 *
	 * @return integer
	 */
	public function getCitac(){
		return $this->citac;
	}

	/**
	 * Set fi
	 *
	 * @param $fi integer
	 * @return Nastani
	 */
	public function setFi($fi){
		$this->fi = $fi;
		return $this;
	}

	/**
	 * Get fi
	 *
	 * @return integer
	 */
	public function getFi(){
		return $this->fi;
	}

	/**
	 * Set fo
	 *
	 * @param $fo integer
	 * @return Nastani
	 */
	public function setFo($fo){
		$this->fo = $fo;
		return $this;
	}

	/**
	 * Get fo
	 *
	 * @return integer
	 */
	public function getFo(){
		return $this->fo;
	}

	/**
	 * Set taevent
	 *
	 * @param $taevent integer
	 * @return Nastani
	 */
	public function setTaevent($taevent){
		$this->taevent = $taevent;
		return $this;
	}

	/**
	 * Get taevent
	 *
	 * @return integer
	 */
	public function getTaevent(){
		return $this->taevent;
	}
}
