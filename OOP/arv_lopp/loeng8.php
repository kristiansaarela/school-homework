<?php
//OOP

//lihtne n�ide
class Tekst
{//klassi algus
	
	//klassi p�is
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
	}//l�pp

	//teksti v�ljastamine
	function showTekst()
	{
		echo $this->str.'<br />';
	}

}//klassi l�pp

//laiendusklass
class VTekst extends Tekst
{//klassi algus
	
	//v�rvi muutuja
	var $color = false;
	
	//v�rvi defineerimine
	function setColor($c)
	{//algus
		$this->color = $c;
		//echo $this->color;
	}//l�pp

	//v�rviline v�ljastamine
	function showTekst()
	{
		//juhul kui v�rv puudub
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

}//klassi l�pp

//testimine
$t = new Tekst('mingi tekst');
$t->showTekst();

$t1 = new VTekst('teine tekst');
$t1->setColor('#66FF00');
$t1->showTekst();
?>