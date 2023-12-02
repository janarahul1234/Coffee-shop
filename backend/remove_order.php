<?php 

// Check customer
session_start();
isset($_SESSION["customer"]) ? header("Location: ../") : null;

$order_id = $_GET["oid"];

// Database configuration
include "./config.php";

$sql = "DELETE FROM orders WHERE order_id = {$order_id}";

if(mysqli_query($conn, $sql)){
    header("Location: ../order.php");
}
else {
    die("Query failed!");
}

mysqli_close($conn);