<?php

echo "
    <!-- ======== STYLE ======== -->
    <link rel='stylesheet' href='./assets/css/product_card.style.css'>
";

function product_card($name, $price, $discount, $productId, $productImage){
    echo "
        <div class='product-card flex align-center'>
            <div class='product-card__img'>
                <img src='./backend/upload/{$productImage}' alt='{$productImage}'>
            </div>

            <h2 class='product-card__name'>{$name}</h2>
            <div class='product-card__price flex'>
                <p class='product-card__price-discount'>
                    ₹<span class='text-bold'>{$discount}</span>
                </p>
                <p class='product-card__price-main'>{$price}</p>
            </div>

            <div class='product-card__buttons-wrapper flex'>
                <!-- ======== ADD BUTTON ======== -->
                <a href='./backend/add_order.php?pid={$productId}' class='btn btn--add flex'>
                    <img src='./assets/images/add-icon-white.svg' alt='add-icon'> Add
                </a>

                <!-- ======== ORDER-NOW BUTTON ======== -->
                <a href='./backend/order_now.php?pid={$productId}' class='btn btn--order-now flex'>
                    <img src='./assets/images/coffee-icon.svg' alt='coffee-icon'> Order now
                </a>
            </div>
        </div>
    ";
}