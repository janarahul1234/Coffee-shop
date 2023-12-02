<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$database = "coffeeshop-db";

$conn = mysqli_connect($hostname, $username, $password, $database) or 
        die("Connection failed: " . mysqli_connect_error());