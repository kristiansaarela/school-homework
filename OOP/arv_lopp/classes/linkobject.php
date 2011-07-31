<?php
//classes/linkobject.php
#require_once('httpp.php');

class LinkObject extends Httpp
{//klassi algus
	
	var $baseUrl = false;
	var $delim = '&amp;'; //&
	var $eq = '='; //=
	var $protocol = 'http://';

	//tuleb veel sessiooniga seotud asjad lisada
	var $aie = array('sid'=>'sid');


	//konstruktor
	function LinkObject()
	{
		//võtame Httpp klassi asjad kaasa
		parent::Httpp();

		//koostame url-i
		$this->baseUrl = $this->protocol.$this->server['HTTP_HOST'].$this->server['SCRIPT_NAME'];

		//väljastame url-i testimiseks
		//echo $this->baseUrl;
	}//konstruktor

	function addToLink(&$link, $name, $val)
	{
		if($link != '')
		{
			$link .= $this->delim;
		}
		$link .= $name.$this->eq.$val;
	}//addToLink

	function getLink($add = array(), $aie = array(), $not = array())
	{
		$link = '';

		//kui on olemas mida lisada url-ile
		foreach($add as $name=>$val)
		{
			$this->addToLink($link, $name, $val);
		}

		//juhul, kui mingi väärtus juba ette eksisteerib
		foreach($aie as $name)
		{
			$val = $this->get($name);
			if($val != false)
			{
				$this->addToLink($link, $name, $val);
			}
		}
		//juhul, kui sessiooni andmed on ettedefineeritud linki sees, siis tuleb siis lisada nende andmete kontrolli ka
		//juhul, kui massiivis juba olemas see asi
		foreach($this->aie as $name)
		{
			$val = $this->get($name);
			if($val !== false and !in_array($name, $not))
			{
				$this->addToLink($link, $name, $val);
			}
		}

		//juhul, kui link ülse puudub, siis koostame linki nii, et ta on baseUrl?mingi_link

		if($link != '')
		{
			$link = $this->baseUrl.'?'.$link;
		}
		//muidu paneme baseUrl kirja
		else
		{
			$link = $this->baseUrl;
		}
		//echo $link;
	return $link;
	}//getLink
}//klassi lõpp

//testime
//$http = new LinkObject();
?>