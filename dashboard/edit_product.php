<?php

session_start();

// Check admin
!isset($_SESSION["admin"]) ? header("Location: ../") : "";

include "../components/navbar.dashboard.php";

$product_id = $_GET["pid"];

// Database configuration
include "../backend/config.php";

// Show product details
$sql = "SELECT product_id, product_name, original_price, offer_price, category FROM products WHERE product_id = {$product_id}";
$result = mysqli_query($conn, $sql) or die("Query failed!");

// Get product image
$sql2 = "SELECT product_img FROM products WHERE product_id = {$product_id}";
$result2 = mysqli_query($conn, $sql2) or die("Query failed!");

if(mysqli_num_rows($result2) == 1){ $prodoct_img = mysqli_fetch_assoc($result2)['product_img']; }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ======== STYLE ======== -->
    <link rel="stylesheet" href="../assets/css//main.style.css">

    <!-- ======== TITLE ======== -->
    <title>Coffee shop | Edit product</title>

    <style>
        #view-area {
            background-image: url('../backend/upload/<?php echo $prodoct_img ?>');
        }
    </style>
</head>
<body>
    <!-- ======== HEADER ======== -->
    <header class="header" id="header">
        <?php navbar() ?>
    </header>

    <!-- ======== MAIN ======== -->
    <main class="main">
        <!-- ======== EDIT-PRODUCT ======== -->
        <section class="edit-product" id="edit-product">
            <div class="edit-product-form__wrapper">
                <a href="../dashboard/" class="edit-product-form__close">
                    <img src="../assets/images/close-icon.svg" alt="close-icon">
                </a>

                <h2 class="edit-product-form__title">Edit product</h2>

                <?php if(mysqli_num_rows($result) == 1){ ?>
                <form action="../backend/edit_product.php" method="post" enctype="multipart/form-data" class="edit-product-form flex justify-between">
                    <div>
                        <?php while($row = mysqli_fetch_assoc($result)){ ?>
                        <input type="hidden" name="product_id" value="<?php echo $row["product_id"] ?>">
                        
                        <div class="edit-product-form__field">
                            <label for="product_name" class="edit-product-form__label">Product name</label>
                            <input type="text" name="product_name" id="product_name" class="edit-product-form__input" value="<?php echo $row['product_name'] ?>" required autocomplete="off">
                        </div>

                        <div class="edit-product-form__field-price flex justify-between">
                            <div class="edit-product-form__field">
                                <label for="offer_price" class="edit-product-form__label">Offer price</label>
                                <input type="text" name="offer_price" id="offer_price" class="edit-product-form__input" value="<?php echo $row['offer_price'] ?>" required autocomplete="off">
                            </div>
                            <div class="edit-product-form__field">
                                <label for="original_price" class="edit-product-form__label">Original price</label>
                                <input type="text" name="original_price" id="original_price" class="edit-product-form__input" value="<?php echo $row['original_price'] ?>" required autocomplete="off">
                            </div>
                        </div>

                        <div class="edit-product-category">
                            <label for="original_price" class="edit-product-form__label">Category</label>

                            <?php 
                            $category = $row['category'];
                            $sql1 = "SELECT * FROM categories";
                            $result1 = mysqli_query($conn, $sql1) or die("Query failed!");
                            
                            if(mysqli_num_rows($result1) > 0){ 
                            ?>
                            <select id="category" name="category" class="edit-product-form__input">
                            <?php 
                            while($row1 = mysqli_fetch_assoc($result1)){
                                $selected = $row1["category_id"] == $category ? "selected" : "";
                                echo "<option value='{$row1['category_id']}' {$selected}>{$row1['category_name']}</option>";
                            } 
                            ?>
                            </select>
                            <?php } ?>
                        </div>

                        <button type="submit" name="save" class="btn btn--save">Save</button>
                    </div>

                    <label for="input-file" id="drop-area" class="edit-product-form__image-upload">
                        <input type="file" accept="image/*" name="new_image" id="input-file" hidden>
                        <input type="hidden" name="old_image" value="<?php echo $prodoct_img ?>">
                        <div id="view-area" class="edit-product-form__image-view"></div>
                    </label>
                    <?php } ?>
                </form>
                <?php } ?>
            </div>
        </section>
    </main>
    
    <!-- ======== SCRIPT ======== -->
    <script src="../assets/js/image_uploader.js"></script>
</body>
</html>