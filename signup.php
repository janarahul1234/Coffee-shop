<?php 

include "./components/navbar.php";
include "./components/footer.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ======== STYLE ======== -->
    <link rel="stylesheet" href="./assets/css/main.style.css">

    <!-- ======== TITLE ======== -->
    <title>Coffee shop | Sign Up</title>
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
    
            <div class="signup-form">
                <h2 class="signup-form__title">Create your account</h2>
    
                <form action="./backend/add_customer.php" method="post" class="signup-form__form flex">
                    <div class="signup-form__field">
                        <label for="username" class="signup-form__label">User name</label>
                        <input type="text" name="username" id="username" class="signup-form__input" required autocomplete="off">
                    </div>

                    <div class="signup-form__field">
                        <label for="email" class="signup-form__label">Email</label>
                        <input type="email" name="email" id="email" class="signup-form__input" required autocomplete="off">
                    </div>

                    <div class="signup-form__field">
                        <label for="password" class="signup-form__label">Password</label>
                        <input type="password" name="password" id="password" class="signup-form__input" required>
                    </div>
                    
                    <!-- SUBMIT BUTTON -->
                    <button type="submit" name="signup" value="signup" class="btn btn--submit flex">
                        <img src="./assets/images/user-icon-black.svg" alt="user-icon-black"> Sign Up
                    </button>
                </form>

                <p class="main__text">
                    Already have an account? 
                    <a href="./login.php" class="text-bold">Login</a>
                </p>
            </div>
        </div>
    </main>

    <!-- ======== FOOTER ======== -->
    <?php footer("INVERNO") ?>
</body>
</html>