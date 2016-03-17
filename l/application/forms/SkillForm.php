<?php
/**
 * skill form
 *
 * @author naveen.jaiswal
 *
 */
class Form_SkillForm extends Zend_Form{
	public function __construct($options = null){
		parent::__construct($options);
		$this->setName('skillForm')->setAction('');
		$userId = new Zend_Form_Element_Hidden('userId');
		
		$skills = new Zend_Form_Element_Select('skills');
		$skills->setRegisterInArrayValidator(false);
		
		$experience = new Zend_Form_Element_Select('experience');
		$experience->setRegisterInArrayValidator(false);
		
		$month = new Zend_Form_Element_Select('month');
		$month->setRegisterInArrayValidator(false);
		
		$year = new Zend_Form_Element_Select('year');
		$year->setRegisterInArrayValidator(false);
		
		$level = new Zend_Form_Element_Select('level');
		$level->setRegisterInArrayValidator(false);
		
		$project = new Zend_Form_Element_Select('project');
		$project->setRegisterInArrayValidator(false);
		
		$addSkill = new Zend_Form_Element_Button('addSkill');
		
		$removeSkill = new Zend_Form_Element_Button('removeSkill');
		
		$submit = new Zend_Form_Element_Submit('submit');
		
		$this->addElements(array($userId,$skills,$experience,$month,$year,$level,$project,$addSkill,$removeSkill,$submit));
	}
}