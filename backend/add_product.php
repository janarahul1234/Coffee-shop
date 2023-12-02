<?php

include "./config.php";

if(isset($_FILES["upload_image"])){
    $errors = array();

    $image_name = $_FILES["upload_image"]["name"];
    $image_size = $_FILES["upload_image"]["size"];
    $file_tmp = $_FILES["upload_image"]["tmp_name"];
    $file_type = $_FILES["upload_image"]["type"];

    $file_ext = strtolower(end(explode(".", $image_name)));
    $extensions = array("jpeg", "jpg", "png");

    if(!in_array($file_ext, $extensions)){
        $errors[] = "This file is not allowed, Please choose a JPG or PNG file";
    }

    // 5MB image size
    if($image_size > 1024 * 1024 * 5 ){
        $errors[] = "Image size must be 5MB or lower";
    }

    if(empty($errors)){
        move_uploaded_file($file_tmp, "./upload/$image_name");
    }
    else{
        print_r($errors);
        die();
    }
}

$product_name = mysqli_real_escape_string($conn, $_POST["product_name"]);
$offer_price = mysqli_real_escape_string($conn, $_POST["offer_price"]);
$original_price = mysqli_real_escape_string($conn, $_POST["original_price"]);
$category_id = mysqli_real_escape_string($conn, $_POST["category"]);

$sql = "INSERT INTO products(product_name, original_price, offer_price, category, product_img)
        VALUES ('$product_name', '$original_price', '$offer_price', '$category_id', '$image_name');";

if(mysqli_query($conn, $sql)){
    header("Location: ../dashboard/");
}
else{
    echo "Query failed!";
}