<?php
/**
 * filter form
 * 
 * @author naveen.jaiswal
 *
 */
class Form_FilterForm extends Zend_Form{
	
	public function __construct($options = null){
		parent::__construct($options);
	
		$this->setName('search')->setAction('');
	
		$skill = new Zend_Form_Element_Select('skill');
		$skill->setRegisterInArrayValidator(false);
		
		$level = new Zend_Form_Element_Select('level');
		$level->setRegisterInArrayValidator(false);
		
		$project = new Zend_Form_Element_Select('project');
		$project->setRegisterInArrayValidator(false);
	
		$submit = new Zend_Form_Element_Submit('submit');
		$this->addElements(array($skill, $level, $project, $submit));
	}
}
?>