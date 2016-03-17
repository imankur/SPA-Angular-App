<?php

class Form_RegisterForm extends Zend_Form{

	public function __construct($options = null){
		parent::__construct($options);

		$this->setName('Register')->setAction('');

		$firstName = new Zend_Form_Element_Text('firstName',
			array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('messages'=>'Enter your Firstname')))));

		$lastName = new Zend_Form_Element_Text('lastName',
			array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('messages'=>'Enter your Lastname')))));

		$email = new Zend_Form_Element_Text('email',
			array('required'=>true,
				'validators'=>array(array('NotEmpty', false, array('messages'=>'Enter a email address')))));

		$empId = new Zend_Form_Element_Text('empId',
			array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('messages'=>'Enter your Employee Id')))));
		
		$tel = new Zend_Form_Element_Text('tel',
			array('required'=>true, 'validators'=>array(array('NotEmpty', false, array('messages'=>'Enter your Phone Number')))));

		$password = new Zend_Form_Element_Password('password',
			array('required'=>true,
				'validators'=>array(array('NotEmpty', false, array('messages'=>'Provide a password')),
					array('stringLength', false, array(5, 'messages'=>'Enter at least 5 characters')))));

		$passwordConfirm = new Zend_Form_Element_Password('passwordConfirm',
			array('required'=>true,
				'validators'=>array(array('NotEmpty', false, array('messages'=>'Repeat your password')),
					array('identical', false, array('password', 'messages'=>'Enter the same password as above')),
					array('stringLength', false, array(5, 'messages'=>'Enter at least 5 characters')))));

		$register = new Zend_Form_Element_Submit('register');

		$this->addElements(array($firstName, $lastName, $email, $empId, $tel, $password, $passwordConfirm, $register));
	}
}
?>