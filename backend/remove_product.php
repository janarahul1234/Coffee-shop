<?php 

$product_id = $_GET['pid'];

include "./config.php";

$sql1 = "SELECT product_img FROM products WHERE product_id = $product_id";
$result = mysqli_query($conn, $sql1) or die("Query failed!");

$row = mysqli_fetch_assoc($result);
unlink("upload/{$row['product_img']}");

$sql = "DELETE FROM products WHERE product_id = $product_id;";

if(mysqli_query($conn, $sql)){
    header("Location: ../dashboard/");
}
else {
    die("Query failed!");
}

mysqli_close($conn);