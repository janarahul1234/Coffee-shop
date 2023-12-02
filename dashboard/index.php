<?php 

session_start();

// Check admin
!isset($_SESSION["admin"]) ? header("Location: ../") : "";

include "../components/navbar.dashboard.php";
include "../components/product_card.dashboard.php";
include "../components/footer.php";

// Database configuration
include "../backend/config.php";

// Show categories
$sql = "SELECT category_id, category_name FROM categories";
$result = mysqli_query($conn, $sql) or die("Query failed!");

// Show product details
if(isset($_POST["select"])){
    $category = $_POST["category"];
    $category == "all" ? header("Location: ./") : null;

    $sq2 = "SELECT * FROM products WHERE category = {$category}";
}
else {
    $sq2 = "SELECT * FROM products";
}
$result2 = mysqli_query($conn, $sq2) or die("Query failed!");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ======== STYLE ======== -->
    <link rel="stylesheet" href="../assets/css//main.style.css">

    <!-- ======== TITLE ======== -->
    <title>Coffee shop | Dashboard</title>
</head>
<body>
    <!-- ======== HEADER ======== -->
    <header class="header" id="header">
        <?php navbar() ?>
    </header>

    <!-- ======== MAIN ======== -->
    <main class="main">
        <!-- ======== PRODUCT ======== -->
        <section class="product">
            <div class="product__container container">
                <div class="product__topbar flex justify-between">
                    <?php if(mysqli_num_rows($result) > 0){ ?>
                    <form class="category flex align-center" method="post">
                        <lable class="category__title">Category</lable>
                        
                        <div class="category__box flex align-center">
                            <div class="category__option">
                                <select name="category" id="category">
                                    <option value="all" selected>All</option>
                                
                                <?php 
                                while($row = mysqli_fetch_assoc($result)){
                                    $selected = $row["category_id"] == $category ? "selected" : "";
                                    echo "<option value='{$row['category_id']}' {$selected}>{$row['category_name']}</option>";
                                } 
                                ?>
                                </select>
                            </div>

                            <div class="divide"></div>

                            <!-- ======== SELECT BUTTON ======== -->
                            <button type="submit" name="select" class="btn btn--select btn-dashboard">Select</button>
                        </div>
                    </form>
                    <?php } ?>
    
                    <div class="action__button flex align-center">
                        <button class="btn btn-add_product flex" id="add-product-button">
                            <img src="../assets/images/add-icon-black.svg" alt="add-icon-black"> Add product
                        </button>

                        <div class="divide"></div>
                        
                        <button class="btn btn-add_category flex" id="add-category-button">
                            <img src="../assets/images/add-icon-black.svg" alt="add-icon-black"> Add category
                        </button>
                    </div>
                </div>
    
                <div class="product__cards">
                    <?php 
                    if(mysqli_num_rows($result2) > 0){
                        while($row2 = mysqli_fetch_assoc($result2)){
                            product_card(
                                $row2["product_name"], 
                                $row2["original_price"], 
                                $row2["offer_price"], 
                                $row2["product_id"], 
                                $row2["product_img"]
                            );
                        }
                    }
                    else{ echo "No products found!"; }
                    ?>
                </div>
            </div>
        </section>

        <?php 
        include "add_product.php";
        include "add_category.php";
        ?>
    </main>

    <!-- ======== FOOTER ======== -->
    <?php footer("INVERNO") ?>

    <!-- ======== SCRIPT ======== -->
    <script src="../assets/js/popup_box.js"></script>
    <script src="../assets/js/image_uploader.js"></script>
</body>
</html>