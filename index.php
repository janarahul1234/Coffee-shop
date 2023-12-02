<?php

include "./components/navbar.php";
include "./components/product_card.php";
include "./components/footer.php";

// Check customer
isset($_SESSION["admin"]) ? header("Location: ./dashboard") : null;

// Database configuration
include "./backend/config.php";

// Show categories
$sql = "SELECT category_id, category_name FROM categories";
$result = mysqli_query($conn, $sql) or die("Query failed!");

// Show product details
if(isset($_POST["select"])){
    $category = $_POST["category"];
    $category == "all" ? header("Location: ./") : null; // home page

    $sql1 = "SELECT * FROM products WHERE category = {$category}"; // select products
}
else {
    $sql1 = "SELECT * FROM products"; // all products
}
$result1 = mysqli_query($conn, $sql1) or die("Query failed!");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ======== STYLE ======== -->
    <link rel="stylesheet" href="./assets/css/main.style.css">

    <!-- ======== TITLE ======== -->
    <title>Coffee shop</title>
</head>
<body>
    <!-- ======== HEADER ======== -->
    <header class="header" id="header">
        <!-- ======== NAVIGATION BAR ======== -->
        <?php navbar() ?>
    </header>

    <!-- ======== MAIN ======== -->
    <main id="main">
        <!-- ======== HERO ======== -->
        <section class="home" id="home">
            <div class="home__containet container flex">
                <img src="./assets/images/hero-image-1.png" alt="hero-image-1" class="home__image">

                <div class="home__data">
                    <h1 class="home__title">
                        <img src="./assets/images/hot-icon.svg" alt="hot-icon" class="home__icon">
                        A Hot Cup <br> of Happiness
                    </h1>
                    <p class="home__description">
                        What on earth could be more luxurious than a sofa,<br>a book, and a cup of coffee?
                    </p>
                </div>
            </div>
        </section>

        <!-- ======== MENU ======== -->
        <section class="menu" id="menu">
            <div class="menu__container container">
                <div class="menu-category flex align-center justify-between">
                    <?php if(mysqli_num_rows($result) > 0){ ?>
                    <form class="menu-category__from" method="post">
                        <label for="category" class="menu-category__from-title">Select you category</label>

                        <div class="menu-category__selecter flex">
                            <div class="menu-category__option">
                                <select id="category" name="category">
                                    <option disabled>-------------- Category --------------</option>
                                    <option value="all" selected>All</option>
                                    <?php 
                                    while($row = mysqli_fetch_assoc($result)){
                                        $selected = $row["category_id"] == $category ? "selected" : "";
                                        echo "<option value='{$row['category_id']}' {$selected}>{$row['category_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- ======== SEARCH BUTTON ======== -->
                            <button type="submit" name="select" class="btn btn--select">Select</button>
                        </div>
                    </form>
                    <?php } ?>
                </div>

                <div class="menu__cards-wrapper">
                    <?php 
                    if(mysqli_num_rows($result1) > 0){
                        while($row1 = mysqli_fetch_assoc($result1)){
                            product_card(
                                $row1["product_name"], 
                                $row1["original_price"], 
                                $row1["offer_price"], 
                                $row1["product_id"], 
                                $row1["product_img"]
                            );
                        }
                    } else { echo "<p class='menu__cards-text'>No products found!</p>"; }
                    ?>
                </div>
            </div>
        </section>
    </main>

    <!-- ======== FOOTER ======== -->
    <?php footer("INVERNO") ?>
</body>
</html>