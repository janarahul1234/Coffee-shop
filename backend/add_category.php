<?php 

include "./config.php";

$category_name = mysqli_real_escape_string($conn, $_POST["category_name"]);

$sql = "SELECT category_name FROM categories WHERE category_name = '$category_name'";
$result = mysqli_query($conn, $sql) or die("Query failed!");

if(mysqli_num_rows($result) > 0){
    echo "Category alrady exists!";
}
else{
    $sql = "INSERT INTO categories(category_name) VALUES ('$category_name')";
    
    if(mysqli_query($conn, $sql)){
        header("Location: ../dashboard/");
    }
    else{
        echo "Query failed!";
    }
}

mysqli_close($conn);