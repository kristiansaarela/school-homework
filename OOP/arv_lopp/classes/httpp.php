<?php
//classes/httpp.php

class Httpp 
{//klass algab
	var $vars = array(); //muutujad edastatud kasutaja poolt p�ringu jooksul
	var $server = array(); //serveri poolt t�idetud muutujad ja konstandid

	//konstruktor
	function Httpp()
	{
		$this->initConst();
		$this->init();
	}

	//funktsioonid

	function initConst()
	{
		$vars = array('REMOTE_ADDR', 'PHP_SELF');

		foreach($vars as $var)
		{
			if(!defined($var) and isset($this->server[$var]))
			{
				define($var, $this->server[$var]);
			}
		}
	}//initConst

	function init()
	{
		//$_GET, $_POST, $_FILES, $_SERVER
		//$HTTP_GET_VARS, $HTTP_POST_VARS, $HTTP_FILES_VARS, $HTTP_SERVER_VARS

		//mitte s�ltuda PHP versioonist
		if(!isset($_GET))
		{
			global $HTTP_GET_VARS;
			$_GET = $HTTP_GET_VARS;
			
			global $HTTP_POST_VARS;
			$_POST = $HTTP_POST_VARS;

			global $HTTP_FILES_VARS;
			$_FILES = $HTTP_FILES_VARS;

			global $HTTP_SERVER_VARS;
			$_SERVER = $HTTP_SERVER_VARS;
		}

		//paneme k�ik massiivi
		$this->vars = array_merge($_GET, $_POST, $_FILES);
		$this->server = $_SERVER;
	}//init

	//kontrollime eksisteerivad muutujate nimed ja v�tame neid kasutusele
	function get($name)
	{
		if(isset($this->vars[$name]))
		{
			return $this->vars[$name];
		}
		return false;
	}//get

	//kasutaja poolt sisestatud v��rtused
	function set($name, $val)
	{
		$this->vars[$name] = $val;
	}//set

	//kasutaja sisendi kustutamine
	function del($name)
	{
		if(isset($this->vars[$name]))
		{
			unset($this->vars[$name]);
		}
	}//del

	//kasutaja �mbersuunamine
	function redirect($url = false)
	{
		if($url == false)
		{
			//kasutaja l�heb vaikimisi m��ratud lehele
			$url = $this->getLink();
		}
		//kontrollime url
		//suuname kasutajat sinna
		$url = str_replace('&amp;', '&', $url);
		header('Location: '.$url);
		exit;
	}//redirect

}//klass l�ppeb

//testimine
/*
$http = new Httpp;
echo '<pre>';
print_r($_SERVER);
echo '</pre>';

echo REMOTE_ADDR;
*/
?>