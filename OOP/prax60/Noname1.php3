<FORM action="Noname1.php3" method="post">
    <P>
    <LABEL for="firstname">sünniaasta</LABEL>
              <INPUT type="text" id="aasta" name="aasta"><BR>
    <LABEL for="lastname">sünnikuu</LABEL>
              <INPUT type="text" id="kuu" name="kuu"><BR>
    <LABEL for="email">sünnipäev</LABEL>
              <INPUT type="text" id="paev" name="paev"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
 </FORM>
<?php

$aasta = $_POST['aasta'];
$kuu = $_POST['kuu'];
$paev = $_POST['paev'];

echo "sünnikuupäev: $aasta $kuu $paev<br>";
$date_array = getdate(); //täna
print "täna on: $date_array[year] $date_array[mon] $date_array[mday] <br>";
$year = $date_array[year]+1;
$ts = mktime($date_array[hours],$date_array[minutes],$date_array[seconds],$date_array[mday],$date_array[mon],$date_array[year]);
print $ts . "<br>"  ;

?>