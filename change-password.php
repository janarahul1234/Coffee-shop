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
    <title>Coffee shop | Change password</title>
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
    
            <div class="chanpass-form">
                <h2 class="chanpass-form__title">Change your password</h2>
    
                <form action="./backend/change_password.php" method="post" class="chanpass-form__form flex">
                    <div class="chanpass-form__field">
                        <label for="old_password" class="chanpass-form__label">Old password</label>
                        <input type="password" name="old_password" id="old_password" class="chanpass-form__input" required>
                    </div>

                    <div class="chanpass-form__field">
                        <label for="new_password" class="chanpass-form__label">New password</label>
                        <input type="password" name="new_password" id="new_password" class="chanpass-form__input" required>
                    </div>
                    
                    <!-- SUBMIT BUTTON -->
                    <button type="submit" name="signup" value="signup" class="btn btn--submit flex">
                        <img src="./assets/images/key-icon.svg" alt="key-icon"> Save Changes
                    </button>
                </form>
            </div>
        </div>
    </main>

    <!-- ======== FOOTER ======== -->
    <?php footer("INVERNO") ?>
</body>
</html>