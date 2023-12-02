<?php 

// Check customer
session_start();
!isset($_SESSION["customer"]) ? header("Location: ../login.php") : "";

$product = $_GET["pid"];
$customer = $_SESSION["customer_id"];

include "./config.php";

$sql = "INSERT INTO orders(customer, product) VALUES ($customer, $product)";

if($result = mysqli_query($conn, $sql)){
    header("Location: ../");  // Home page
}
else{
    die("Query failed!");
}