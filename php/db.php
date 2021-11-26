<?php

$serverName ="localhost:3307";
$dbUsername ="root";
$dbPassword="";
$dbName ="shopping";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword,$dbName);

if(!$conn){
    die("connection fail:". mysqli_connect_error());
}
?>