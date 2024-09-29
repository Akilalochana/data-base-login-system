<?php
$serverName = "localhost";
$dbUsername = "lochanasandakelum";
$dbPassword = "W5m-Nc30YmT-0FVw";
$dbName = "my_first_project";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed : " .mysqli_connect_error());
}
