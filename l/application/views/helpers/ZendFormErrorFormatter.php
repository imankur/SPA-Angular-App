<?php
/**
 * ZendFormErrorFormatter View Helper
 *
 *Error formatter to format validation error messages to show on view
 *
 * @category Resource Management
 * @package View
 * @subpackage Helper
 * @author naveen.jaiswal
 */
class Zend_View_Helper_ZendFormErrorFormatter extends Zend_View_Helper_Abstract
{
	/**
	 * Binds error messages to respective field, one at a time
	 *
	 *@param array $errMessages
	 *@return array
	 *@author njaiswal
	 */
	public function zendFormErrorFormatter($errMessages = null){
		$errors = array();
		$errMsgs =  $errMessages;
		foreach ($errMsgs as $key => $val){
			$errors[$key] = current($val);
		}
		return $errors;
	}
}