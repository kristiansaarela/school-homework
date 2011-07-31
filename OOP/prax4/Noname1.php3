<?php

$arv = 1;
do {
	if($arv == 10) {
		echo $arv;
	}else {
		echo $arv . ' = ';
	}
	$arv++;
}
while($arv<=10);

echo '<hr>';

/*
while(tingius) {
	tegevus
}
*/

while($arv >= 1) {
	if($arv == 1) {
			echo $arv;
		}else {
			echo $arv . ' = ';
		}
		$arv--;
}

echo '<hr>';

for($i=99999999999999999;$i<=99999999999999999;$i++) {
	if($i == 1) {
		echo $i . ' on algarv<br>';
	}else {
		$jagaja = 2;
		while($i%$jagaja != 0) {
			$jagaja++;
		}
		if($i == $jagaja) {
			echo $i . ' on algarv<br>';
		}else {
			echo $i . ' ei ole<br>';
		}
	}
}


?>