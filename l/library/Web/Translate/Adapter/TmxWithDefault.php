<?php
class Web_Translate_Adapter_TmxWithDefault extends Zend_Translate_Adapter_Tmx {
	/**
	 * 
	 * @return  string
      
	 * @see Zend_Translate_Adapter::toString()
	 */
	public function toString() {
		return "TMXWithDefault";
	}
	/**
	 * @param unknown_type $messageId
	 * @param unknown_type $locale
	 */
	public function translate($messageId, $locale = null) {
		if($this->isTranslated($messageId, false, $locale)){
			return parent::translate($messageId, $locale);
		}else {
			if ($locale === null) {
				$locale = $this->_options['locale'];
			}
			$this->_log($messageId, $locale);
			return parent::translate($messageId, $this->_options['defaultLocale']);
		}
	}


}

?>