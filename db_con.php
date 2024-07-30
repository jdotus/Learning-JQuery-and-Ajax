<?php


$serverName = "localhost";
$password = "";
$userName = "root";
$dbName = "ajax";

$conn = mysqli_connect($serverName, $userName, $password, $dbName) or die("Connection Failed:" . mysqli_connect_error());
