<?php 

session_start();

echo "
    <!-- ======== STYLE ======== -->
    <link rel='stylesheet' href='./assets/css/navbar.style.css'>
";

function navbar($brand = false){
    if ($brand) {
        echo "
            <nav class='nav container flex align-center justify-center'>
                <a href='./' class='nav__logo'>
                    <img src='./assets/images/logo-black.svg' alt='logo-black'>
                </a>
            </nav>
        ";
    }
    else {
        echo "
        <nav class='nav container flex align-center justify-between'>
            <a href='./' class='nav__logo'>
                <img src='./assets/images/logo-black.svg' alt='logo-black'>
            </a>

            <div class='nav__menu flex align-center'>
                <ul class='nav__list flex'>
                    <li class='nav__item'>
                        <a href='./' class='nav__link active-link'>Home</a>
                    </li>

                    <li class='nav__item'>
                        <a href='./#menu' class='nav__link'>Menu</a>
                    </li>

                    <li class='nav__item'>
                        <a href='./#about-us' class='nav__link'>About Us</a>
                    </li>
                </ul>
                
                <div class='nav__action flex'>
        ";
        if (!isset($_SESSION["customer"])) {
            echo "
                <!-- ======== LOGIN BUTTON ======== -->
                <a href='./login.php' class='btn btn--login'>Login</a>
            ";
        }
        else {
            echo "
                <!-- ======== PROFILE ======== -->
                <div class='nav__profile flex'>
                    <img src='./assets/images/user-icon-black.svg' alt='user-icon' class='nav__icon-user'>
                    <img src='./assets/images/arrow-icon-black.svg' alt='arrow-icon' class='nav__icon-arrow'>
                    
                    <div class='profile'>
                        <div class='profile__data'>
                            Welcome<br><span class='profile__name'>{$_SESSION['customer']}</span>
                        </div>
                        
                        <a href='./backend/logout.php' class='btn btn--logout flex justify-center'>
                            <img src='./assets/images/arrow-icon-red.svg' alt='arrow-icon-red'> Logout
                        </a>

                        <a href='./change-password.php' class='btn btn--chanpass'>Change password</a>
                    </div>
                </div>
            ";
        }

        if(!isset($_SESSION['customer_id'])){
            echo "
                        <!-- ======== ORDER BUTTON ======== -->
                        <a href='./order.php' class='btn btn--order flex'>
                            <img src='./assets/images/coffee-icon.svg' alt='coffee-icon'> Order
                        </a>
                    </div>
                </div>
            ";
        }
        else{
            // Database configuration
            include "./backend/config.php";

            // Number of orders
            $sql3 = "SELECT product FROM orders WHERE customer = {$_SESSION['customer_id']}";
            $result3 = mysqli_query($conn, $sql3);

            echo "
                        <!-- ======== ORDER BUTTON ======== -->
                        <a href='./order.php' class='btn btn--order flex'>
                            <img src='./assets/images/coffee-icon.svg' alt='coffee-icon'> Order
            ";
            if(mysqli_num_rows($result3) > 0){
                echo "<span class='nav__order-number'>". mysqli_num_rows($result3) ."</span>";
            }
            echo "
                        </a>
                    </div>
                </div>
            ";
        }
    }
    echo "</nav>";
}