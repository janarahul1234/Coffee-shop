<?php 

include "./components/navbar.php";
include "./components/footer.php";

// Check customer
!isset($_SESSION["customer"]) ? header("Location: ./") : "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ======== STYLE ======== -->
    <link rel="stylesheet" href="./assets/css/main.style.css">

    <!-- ======== TITLE ======== -->
    <title>Coffee shop | Order</title>
</head>
<body>
    <!-- ======== HEADER ======== -->
    <header class="header" id="header">
        <?php navbar() ?>
    </header>

    <!-- ======== MAIN ======== -->
    <main class="main">
        <div class="order-placed__container container flex align-center">
            <h1 class="order-placed__title">Order has been placed</h1>

            <img src="./assets/images/hero-image-2.png" alt="hero-image-2" class="order-placed__image">

            <a href="./"  class="btn btn--continue flex">
                <img src="./assets/images/arrow-icon-black.svg" alt="arrow-icon-black"> Continue
            </a>
        </div>
    </main>

    <!-- ======== FOOTER ======== -->
    <?php footer("INVERNO") ?>
</body>
</html>