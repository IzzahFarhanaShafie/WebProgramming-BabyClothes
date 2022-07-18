<?php
 
$servername = "lrgs.ftsm.ukm.my";
$username = "a167688";
$password = "largeblacksnake";
$dbname = "a167688";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
?>