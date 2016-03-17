<?php

class Form_SearchForm extends Zend_Form{
	public function __construct($options = null){
		parent::__construct($options);
		$this->setName('searchForm')->setAction('');
		$totalMonths = new Zend_Form_Element_Select('totalMonths');
		$totalMonths->setRequired(true);
		$totalMonths->addValidator('Digits',false, array('messages'=>'Please select experience in months.'));
		$totalMonths->setRegisterInArrayValidator(false);

		$totalYears = new Zend_Form_Element_Select('totalYears');
		$totalYears->setRequired(true);
		$totalYears->addValidator('Digits',false, array('messages'=>'Please select experience in years.'));
		$totalYears->setRegisterInArrayValidator(false);

		$mainTechnology = new Zend_Form_Element_Select('mainTechnology');
		$mainTechnology->setRegisterInArrayValidator(false);

		$this->addElements(array($totalMonths,$totalYears,$mainTechnology));
	}
}