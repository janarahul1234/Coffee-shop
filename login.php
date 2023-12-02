<?php 

include "./components/navbar.php";
include "./components/footer.php";

// Check admin
isset($_SESSION["admin"]) ? header("Location: ./dashboard/") : "";

// Check customer
isset($_SESSION["customer"]) ? header("Location: ./") : "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ======== STYLE ======== -->
    <link rel="stylesheet" href="./assets/css/main.style.css">

    <!-- ======== TITLE ======== -->
    <title>Coffee shop | Login</title>
</head>
<body>
    <!-- ======== HEADER ======== -->
    <header class="header" id="header">
        <?php navbar($brand = true) ?>
    </header>

    <!-- ======== MAIN ======== -->
    <main class="main">
        <div class="main__container container flex align-center">
            <img src="./assets/images/hero-image-2.png" alt="hero-image-2" class="main__image">
    
            <div class="login-form">
                <h2 class="login-form__title">Login to your account</h2>
    
                <form action="./backend/login.php" method="post" class="login-form__form flex">
                    <div class="login-form__field">
                        <label for="username" class="login-form__label">User name</label>
                        <input type="text" name="username" id="username" class="login-form__input" required autocomplete="off">
                    </div>
    
                    <div class="login-form__field">
                        <label for="password" class="login-form__label">Password</label>
                        <input type="password" name="password" id="password" class="login-form__input" required>
                    </div>
                    
                    <!-- SUBMIT BUTTON -->
                    <button type="submit" name="login" value="login" class="btn btn--submit flex">
                        <img src="./assets/images/key-icon.svg" alt="key-icon"> Login
                    </button>
                </form>

                <p class="main__text">
                    Do not have account? 
                    <a href="signup.php" class="text-bold">Sign Up</a>
                </p>
            </div>
        </div>
    </main>

    <!-- ======== FOOTER ======== -->
    <?php footer("INVERNO") ?>
</body>
</html>