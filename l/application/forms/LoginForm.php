<?php
/**
 * login form
 * 
 * @author naveen.jaiswal
 *
 */
class Form_LoginForm extends Zend_Form{

	public function __construct($options = null){
		parent::__construct($options);
		
		$this->setName('Login')->setAction('');
		
		$userName = new Zend_Form_Element_Text('username', 
			array('required'=>true, 
				'validators'=>array(array('NotEmpty', false, array('messages'=>'Enter your user name')))));
		
		$password = new Zend_Form_Element_Password('password', 
			array('required'=>true, 
				'validators'=>array(array('NotEmpty', false, array('messages'=>'Provide a password')))));
		
		$login = new Zend_Form_Element_Submit('login');
		
		$this->addElements(array($userName, $password, $login));
	}
}
?>