<?php

class XMLParser {
	
	private $_niceFormatting = true;
	private $_encoding = 'utf-8';
	private $_contentType = 'text/xml';
	private $_additionalParams = array();
	
	public function render($data){
		if($contentType = $this->getContentType())
			header('content-type: '.$contentType);
			
		echo $data;
	}
	
	private function setContentType($value){
		$this->_contentType = (string)$value;
	}

	public function setAdditionalParam($name, $params){
		
		$this->_additionalParams[$name] = $params;
	}
	
	private function getAdditionalParams(){
		
		foreach($this->_additionalParams as $name => $params){
			
			$returnString .= "<$name ";
			foreach($params as $key => $val)
				$returnString .= "$key=\"$val\" ";

			$returnString .= ">\n";
		}

		return $returnString;
	}

	private function getContentType(){
		return $this->_contentType;
	}
	
	private function _addFormatting(){
		return ($this->getNiceFormatting() ? "\n" : '');
	}
	
	public function arrayToXML($array, $encapsulate = 'Document'){
		if(!is_array($array))
			throw new CException('Not passing an object of type array to XMLParser', 500);
			
		$data = $this->_iterateArray($array);
		$data = $this->getNiceFormatting() ? "\n".$data : $data;
		
		return '<?xml version="1.0" encoding="'.$this->getEncoding().'"?>'.$this->getAdditionalParams().$this->_keyValueStringToXML($encapsulate, $data, false);
	}
	
	private function _iterateArray($array){
		foreach($array as $key => $val){
			if(is_array($val))
				$data .= "<$key>".$this->_addFormatting(). $this->_iterateArray($val)."</$key>".$this->_addFormatting();
			elseif(is_bool($val))
				$data .= $this->_keyValueBoolToXML($key, $val);
			elseif(is_int($val) || is_float($val))
				$data .= $this->_keyValueIntToXML($key, $val);
			elseif(is_string($val))
				$data .= $this->_keyValueStringToXML($key, $val);
			elseif($val === null)
				$data .= $this->_keyValueStringToXML($key, '', false);
			else
				throw new CException('Unsupported object type passed to XMLParser', 500);
		}
		
		return $data;
	}

	private function _keyValueStringToXML($key, $val, $capsulateData = true){
		$val = $capsulateData ? "<![CDATA[$val]]>" : $val;
		return "<$key>$val</$key>".$this->_addFormatting();
	}
	
	private function _keyValueBoolToXML($key, $val){
		return $this->_keyValueStringToXML($key, ($val ? 'true' : 'false'), false);
	}
	
	private function _keyValueIntToXML($key, $val){
		return $this->_keyValueStringToXML($key, $val, false);
	}
	
	public function setNiceFormatting($value){
		$this->_niceFormatting = (bool)$value;
	}
	
	public function getNiceFormatting(){
		return $this->_niceFormatting;
	}
	
	public function setEncoding($value){
		$this->_encoding = (string)$value;
	}
	
	public function getEncoding(){
		return $this->_encoding;
	}
}