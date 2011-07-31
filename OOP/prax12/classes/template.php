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
		//m��rame template nime
		$this->file = $fn;
		//laadime antud faili �lesse
		$this->loadFile();
	}//konstruktor
	
	//funktsioon, mis otsib vastava faili ja laeb �lesse
	function loadFile()
	{
		//teem l�hike nime faili muutujast
		$f = $this->file;

		//vigade kontroll
		if(file_exists($f) and is_file($f) and is_readable($f))
		{
			$this->readFile($f);
		}

		//teeme l�hike nime faili muutujast html jaoks
		$f = $this->file.'html';

		//vigade kontroll
		if(file_exists($f) and is_file($f) and is_readable($f))
		{
			$this->readFile($f);
		}

		//teeme l�hike nime faili muutujast htm jaoks
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
		//kui k�ik on korras
		else
		{
			$this->vars[$name] .= $val;
		}
	}//add

	//paneme t�idetud sisu template sisse
	function parse()
	{
		$str = $this->content;
		foreach($this->vars as $name=>$val)
		{
			$str = str_replace('{'.$name.'}', $val, $str);
		}
		return $str;
	}//parse

}//klassi l�pp

//testimine
/*
$tmpl = new Template('../test.html');
//vaatame ta �ra
echo $tmpl->content;
//t�idame sisuga
$tmpl->set('pealkiri', 'Proov');
$tmpl->set('yks', 'Esimene');
$tmpl->set('kaks', 'Teine');

echo $tmpl->parse();
*/
?>