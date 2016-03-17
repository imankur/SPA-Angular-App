<?php
/**
 * profile form
 *
 * @author naveen.jaiswal
 *
 */
class Form_ProfileForm extends Zend_Form{
	public function __construct($options = null){
		parent::__construct($options);

		$this->setName('profileForm')->setAction('');
		$userId = new Zend_Form_Element_Hidden('userId');
		$firstName = new Zend_Form_Element_Text('firstName',
			array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('messages'=>'First Name can not be empty')))));

		$lastName = new Zend_Form_Element_Text('lastName',
			array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('messages'=>'Last Name can not be empty')))));

		$email = new Zend_Form_Element_Text('email',
			array('required'=>true,
				'validators'=>array(array('NotEmpty', false, array('messages'=>'Email address can not be empty')))));

		$empId = new Zend_Form_Element_Text('empId',
			array('required'=>true,
				'validators'=>array(array('NotEmpty', false, array('messages'=>'Employee ID can not be empty')),
					array('Digits', false, array('messages'=>'Can not contain spaces or characters/special characters')))));

		$tel = new Zend_Form_Element_Text('tel',
			array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('all','messages'=>'Enter your phone number')),
			array('Digits', false, array('messages'=>'Can not contain spaces or characters')),
				array('stringLength',false, array('min'=>10, 'messages'=>'Should be at least 10 digits contact no')))));

		$totalMonths = new Zend_Form_Element_Select('totalMonths');
		$totalMonths->setRequired(true);
		$totalMonths->addValidator('Digits',false, array('messages'=>'Please select experience in months.'));
		$totalMonths->setRegisterInArrayValidator(false);

		$totalYears = new Zend_Form_Element_Select('totalYears');
		$totalYears->setRequired(true);
		$totalYears->addValidator('Digits',false, array('messages'=>'Please select experience in years.'));
		$totalYears->setRegisterInArrayValidator(false);

		$position = new Zend_Form_Element_Select('position');
		$position->setRequired(true);
	    $position->addFilter('Int');
	    $position->addValidator('NotEmpty',true, array('integer', 'messages'=>'Please select your designation'));
		$position->setRegisterInArrayValidator(false);

		$mainTechnology= new Zend_Form_Element_Select('mainTechnology');
		$mainTechnology->setRequired(true);
		$mainTechnology->addFilter('Int');
		$mainTechnology->addValidator('NotEmpty',true, array('integer', 'messages'=>'Please select your Main Technology'));
		$mainTechnology->setRegisterInArrayValidator(false);

		$careerStarted = new Zend_Form_Element_Text('careerStarted',
			array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('messages'=>'Career Started can not be empty')))));

		$birthday = new Zend_Form_Element_Text('birthday',
			array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('messages'=>'Birthday can not be empty')))));
		$careerSynergy = new Zend_Form_Element_Text('careerSynergy',
			array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('messages'=>'Career at Synergy can not be empty')))));

		$presentaddress = new Zend_Form_Element_Textarea('presentaddress',array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('messages'=>'address can not be empty')))));
		$presentaddress->setAttrib('cols', 60);
      	$presentaddress->setAttrib('rows', 4);
		$presentcity = new Zend_Form_Element_Text('presentcity',array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('messages'=>'city can not be empty')))));
		$presentpincode = new Zend_Form_Element_Text('presentpincode');
		$presentpincode->addValidator(new Zend_Validate_Digits(), false);
		$presentstate= new Zend_Form_Element_Select('presentstate');
		$presentstate->setRequired(true);
		$presentstate->addFilter('Int');
		$presentstate->addValidator('NotEmpty',true, array('integer', 'messages'=>'Please select state'));
		$presentstate->setRegisterInArrayValidator(false);

		$permanentaddress = new Zend_Form_Element_Textarea('permanentaddress',array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('messages'=>'address can not be empty')))));
		$permanentaddress->setAttrib('cols', 60);
		$permanentaddress->setAttrib('rows', 4);
		$permanentcity = new Zend_Form_Element_Text('permanentcity',array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('messages'=>'city can not be empty')))));
		$permanentpincode = new Zend_Form_Element_Text('permanentpincode');
		$permanentpincode->addValidator(new Zend_Validate_Digits(), false);
		$permanentstate= new Zend_Form_Element_Select('permanentstate');
		$permanentstate->setRequired(true);
		$permanentstate->addFilter('Int');
		$permanentstate->addValidator('NotEmpty',true, array('integer', 'messages'=>'Please select state'));
		$permanentstate->setRegisterInArrayValidator(false);


		$submit = new Zend_Form_Element_Submit('submit');

		$this->addElements(array($userId,$firstName, $lastName, $email, $empId,$tel,
			$totalMonths,$totalYears,$position,$mainTechnology,$careerStarted,$birthday,$careerSynergy,$presentaddress,$presentcity,$presentstate,$presentpincode,$permanentaddress,$permanentcity,$permanentpincode,$permanentstate,$submit));
	}
}
?>