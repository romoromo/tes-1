<?php 

$jss_api = "https://jss.jogjakota.go.id/api/kuki/getKuki?ip=192.168.10.174";
$cookie = !empty($_COOKIE['jss_session']) ? $_COOKIE['jss_session'] : '';
$ch = curl_init();
curl_setopt($ch, CURLOPT_COOKIE, 'jss_session='.rawurlencode($cookie));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$jss_api);
curl_setopt($ch, CURLOPT_HTTPGET, 1);
$jss_data=curl_exec($ch);
curl_close($ch);
echo $jss_data;


?>
