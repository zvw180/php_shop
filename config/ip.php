<?php
include('config/config.php');
//$ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'] . "\n\n";
//$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
//$ip_u = $details->ip;
//
//$ip_h = $details->hostname;
//
//$ip_c = $details->city;
//
//$ip_r = $details->region;
//
//$ip_co = $details->country;
//
//$ip_l = $details->loc;
//
//$ip_o = $details->org;
//
//$ip_p = $details->postal;
//
//$ip_t = $details->timezone;
//
$ip_user="nam";
//
//$stmt = $conn->prepare("INSERT INTO iplocation (users,trinhduyet,ip,hostname,city,region,country,loc,org,postal,timezone)VALUES(?,?,?,?,?,?,?,?,?,?,?)");
//$stmt->bind_param("sssssssssss", $ip_user,$browser,$ip_u,$ip_h,$ip_c,$ip_r,$ip_co,$ip_l,$ip_o,$ip_p,$ip_t);
//$stmt->execute();


$stmt = $conn->prepare("INSERT INTO iplocation (users,trinhduyet)VALUES(?,?)");
$stmt->bind_param("ss", $ip_user,$browser);
$stmt->execute();
