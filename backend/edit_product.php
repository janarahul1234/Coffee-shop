<?php 

include "./config.php";

if(empty($_FILES["new_image"]["name"])){
    $image_name = isset($_POST["old_image"]) ? $_POST["old_image"] : "";
}
else
{
    $errors = array();

    $image_name = $_FILES["new_image"]["name"];
    $image_size = $_FILES["new_image"]["size"];
    $file_tmp = $_FILES["new_image"]["tmp_name"];
    $file_type = $_FILES["new_image"]["type"];

    $file_ext = explode(".", $image_name);
    $file_ext = strtolower(end($file_ext));
    $extensions = array("jpeg", "jpg", "png");

    if(!in_array($file_ext, $extensions)){
        $errors[] = "This file is not allowed, Please choose a JPG or PNG file";
    }

    // 5MB image size
    if($image_size > 1024 * 1024 * 5 ){
        $errors[] = "Image size must be 2MB or lower";
    }

    if(empty($errors)){
        move_uploaded_file($file_tmp, "upload/$image_name");
    }
    else{
        print_r($errors);
        die();
    }
}

$product_id = mysqli_real_escape_string($conn, $_POST["product_id"]);
$product_name = mysqli_real_escape_string($conn, $_POST["product_name"]);
$offer_price = mysqli_real_escape_string($conn, $_POST["offer_price"]);
$original_price = mysqli_real_escape_string($conn, $_POST["original_price"]);
$category = mysqli_real_escape_string($conn, $_POST["category"]);

$sql = "
    UPDATE products SET 
    product_name = '{$product_name}', 
    original_price = '{$original_price}', 
    offer_price = '{$offer_price}', 
    category = '{$category}', 
    product_img = '{$image_name}' 
    WHERE product_id = '{$product_id}'
";

if(mysqli_query($conn, $sql)){
    header("Location: ../dashboard/");
}
else {
    die("Query failed!");
}