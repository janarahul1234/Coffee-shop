<?php 

// Check customer
session_start();
!isset($_SESSION["customer"]) ? header("Location: ./") : "";

$customer_id = $_SESSION["customer_id"];
$old_password = md5($_POST["old_password"]);
$new_password = md5($_POST["new_password"]);

// Database configuration
include "./config.php";

$sql = "
    SELECT username FROM customers 
    WHERE customer_id = '{$customer_id}' AND password = '{$old_password}'
";
$result = mysqli_query($conn, $sql) or die("Query failed!");

if(mysqli_num_rows($result) > 0){
    $sql = "
        UPDATE customers SET password = '$new_password' 
        WHERE customer_id = '{$customer_id}' AND password = '{$old_password}'
    ";

    if($result = mysqli_query($conn, $sql)){
        header("Location: ../");  // Home page
    }
}
else{
    echo "Wrong password!";
}

mysqli_close($conn);