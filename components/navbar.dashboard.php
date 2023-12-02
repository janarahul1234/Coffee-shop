<?php

echo "
    <!-- ======== STYLE ======== -->
    <link rel='stylesheet' href='../assets/css/navbar.style.css'>
";

function navbar(){
    echo "
        <nav class='nav nav--dark header--fixed'>
            <div class='nav__container container flex align-center justify-between'>
                <a href='../' class='nav__logo'>
                    <img src='../assets/images/logo-white.svg' alt='logo-white'>
                </a>

                <div class='nav__menu flex align-center'>
                    <ul class='nav__list flex'>
                        <li class='nav__item'>
                            <a href='./' class='nav__link active-link'>Dashboard</a>
                        </li>
                    </ul>

                    <!-- ======== PROFILE ======== -->
                    <div class='nav__profile flex'>
                        <img src='../assets/images/user-icon-white.svg' alt='user-icon-white' class='nav__icon-user'>
                        <img src='../assets/images/arrow-icon-white.svg' alt='arrow-icon-white'  class='nav__icon-arrow'>
                        
                        <div class='profile'>
                            <div class='profile__data'>
                                Admin<br><span class='profile__name'>{$_SESSION["first_name"]} {$_SESSION["last_name"]}</span>
                            </div>
                            
                            <a href='../backend/logout.php' class='btn btn--logout flex justify-center'>
                                <img src='../assets/images/arrow-icon-red.svg' alt='arrow-icon-red'> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    ";
}