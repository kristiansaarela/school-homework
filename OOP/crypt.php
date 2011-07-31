<?php
$source = "mihhail";
echo "Source: $source";
$fp=fopen("./a.txt","r");
$pub_key=fread($fp,8192);
fclose($fp);
$pub_key=openssl_get_publickey($pub_key);

openssl_public_encrypt($source,$crypttext,$pub_key);
echo "String crypted: $crypttext";

$fp=fopen("./b.txt","r");
$priv_key=fread($fp,8192);
fclose($fp);
// $passphrase is required if your key is encoded (suggested)
$res = openssl_get_privatekey($priv_key,"rasdf");

openssl_private_decrypt($crypttext,$newsource,$res);
echo "String decrypt : $newsource";
?>