<?php
$cipher='AES-128-CTR';
$key='encry.com_7722';
$option=0;
$iv=openssl_cipher_iv_length($cipher);
$iv_decrypted='1234512345123456';
$decrypt=openssl_decrypt($data,$cipher,$key,$option,$iv_decrypted);
?>