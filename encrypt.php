<?php
$cipher='AES-128-CTR';
$key='encry.com_7722';
$option=0;
$iv=openssl_cipher_iv_length($cipher);
$iv_encrypted='1234512345123456';
$encrypt=openssl_encrypt($data,$cipher,$key,$option,$iv_encrypted);
?>