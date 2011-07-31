<?php
//OOP

//lihtne näide
class Tekst
{//klassi algus
	
	//klassi päis
	//klassi muutuja
	var $str = '';

	//konstruktor
	function Tekst($st = '')
	{
		$this->setTekst($st);
	}

	//teksti defineerimine
	function setTekst($s = '')
	{//algus
		$this->str = $s;
	}//lõpp

	//teksti väljastamine
	function showTekst()
	{
		echo $this->str.'<br />';
	}

}//klassi lõpp

//laiendusklass
class VTekst extends Tekst
{//klassi algus
	
	//värvi muutuja
	var $color = false;
	
	//värvi defineerimine
	function setColor($c)
	{//algus
		$this->color = $c;
		//echo $this->color;
	}//lõpp

	//värviline väljastamine
	function showTekst()
	{
		//juhul kui värv puudub
		if($this->color == false)
		{
			parent::showTekst();
		}
		else
		{
			//echo $this->color;
			echo '<font color="'.$this->color.'">'.$this->str.'</font><br />';
		}
	}

}//klassi lõpp

//testimine
$t = new Tekst('mingi tekst');
$t->showTekst();

$t1 = new VTekst('teine tekst');
$t1->setColor('#66FF00');
$t1->showTekst();
?>