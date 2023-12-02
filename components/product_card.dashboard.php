<?php

echo "
    <!-- ======== STYLE ======== -->
    <link rel='stylesheet' href='../assets/css/product_card.style.css'>
";

function product_card($name, $price, $discount, $productId, $productImage){
    echo "
        <div class='product-card card--dashboard flex align-center'>
            <div class='product-card__img'>
                <img src='../backend/upload/{$productImage}' alt='{$productImage}'>
            </div>

            <h2 class='product-card__name'>{$name}</h2>
            <div class='product-card__price flex'>
                <p class='product-card__price-discount'>
                    ₹<span class='text-bold'>{$discount}</span>
                </p>
                <p class='product-card__price-main'>{$price}</p>
            </div>

            <div class='product-card__button-wrapper flex'>
                <div class='product-card__button flex align-center'>
                    <!-- ======== EDIT BUTTON ======== -->
                    <a href='../dashboard/edit_product.php?pid={$productId}' class='btn btn--edit flex justify-center'>
                        <img src='../assets/images/edit-icon.svg' alt='edit-icon'> Edit
                    </a>

                    <div class='divide'></div>

                    <!-- ======== REMOVE BUTTON ======== -->
                    <a href='../backend/remove_product.php?pid={$productId}' class='btn btn--remove flex justify-center'>
                        <img src='../assets/images/trash-icon.svg' alt='trash-icon'> Remove
                    </a>
                </div>
            </div>
        </div>
    ";
}