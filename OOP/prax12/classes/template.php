<?php
//template.php
class Template
{//klassi algus
	
	var $file = '';//templati fail
	var $content = false;//faili sisu
	var $vars = array();

	//konstruktor
	function Template($fn)
	{
		//määrame template nime
		$this->file = $fn;
		//laadime antud faili ülesse
		$this->loadFile();
	}//konstruktor
	
	//funktsioon, mis otsib vastava faili ja laeb ülesse
	function loadFile()
	{
		//teem lühike nime faili muutujast
		$f = $this->file;

		//vigade kontroll
		if(file_exists($f) and is_file($f) and is_readable($f))
		{
			$this->readFile($f);
		}

		//teeme lühike nime faili muutujast html jaoks
		$f = $this->file.'html';

		//vigade kontroll
		if(file_exists($f) and is_file($f) and is_readable($f))
		{
			$this->readFile($f);
		}

		//teeme lühike nime faili muutujast htm jaoks
		$f = $this->file.'htm';

		//vigade kontroll
		if(file_exists($f) and is_file($f) and is_readable($f))
		{
			$this->readFile($f);
		}

		//kataloogide jaoks
		//vajadusel lisame hiljem

		//lugemise probleemi korral
		if($this->content == false)
		{
			echo 'Probleem template '.$this->file.' lugemisega<br />';
			exit;
		}

	}//loadFile

	//faili sisu lugemine
	function readFile($fn)
	{
		/*
		//1.variant
		$fp = fopen($fn, 'rb');
		$this->content = fread($fp, filesize($fn));
		fclose($fp);
		*/
		//2.variant
		$this->content = file_get_contents($fn);
	}//readFile

	//paneme templatele sisu
	function set($name, $val)
	{
		$this->vars[$name] = $val;
	}//set

	//lisame sisu templati sisse
	function add($name, $val)
	{
		//juhul, kui ei ole antud koha massiivis
		if(!isset($this->vars[$name]))
		{
			$this->set($name, $val);
		}
		//kui kõik on korras
		else
		{
			$this->vars[$name] .= $val;
		}
	}//add

	//paneme täidetud sisu template sisse
	function parse()
	{
		$str = $this->content;
		foreach($this->vars as $name=>$val)
		{
			$str = str_replace('{'.$name.'}', $val, $str);
		}
		return $str;
	}//parse

}//klassi lõpp

//testimine
/*
$tmpl = new Template('../test.html');
//vaatame ta ära
echo $tmpl->content;
//täidame sisuga
$tmpl->set('pealkiri', 'Proov');
$tmpl->set('yks', 'Esimene');
$tmpl->set('kaks', 'Teine');

echo $tmpl->parse();
*/
?>