<?php 

function order_item($name, $price, $discount, $orderId, $productImage){
    echo "
        <div class='order__item flex'>
            <img src='./backend/upload/{$productImage}' alt='{$productImage}' class='order__item-image'>

            <div class='order__item-data flex justify-center'>
                <h3 class='order__item-title'>{$name}</h3>
                <div class='order__price flex'>
                    <p class='order__price-discount'>
                        ₹<span class='text-bold'>{$discount}</span>
                    </p>
                    <p class='order__price-main'>{$price}</p>
                </div>
            </div>

            <!-- ======== ORDER REMOVE BUTTON ======== -->
            <a href='./backend/remove_order.php?oid={$orderId}' class='btn btn--remove'>
                Remove
            </a>
        </div>
    ";
}