<?php 

include "./components/navbar.php";
include "./components/order_item.php";
include "./components/footer.php";

// Check customer
!isset($_SESSION["customer"]) ? header("Location: ./login.php") : "";

// Database configuration
include "./backend/config.php";

// Remove all order items
if(isset($_POST["place_order"])){
    $sql = "DELETE FROM orders WHERE customer = {$_SESSION["customer_id"]}";

    if(mysqli_query($conn, $sql)){
        header("Location: ./order-placed.php");
    }
    else {
        die("Query failed!");
    }
}

// Get all order items
$sql = "
    SELECT 
    orders.order_id, 
    products.product_name, 
    products.original_price, 
    products.offer_price, 
    products.product_img
    FROM orders 
    LEFT JOIN customers ON customers.customer_id = orders.customer 
    LEFT JOIN products ON products.product_id = orders.product 
    WHERE orders.customer = {$_SESSION["customer_id"]} 
    ORDER BY orders.order_id DESC
";
$result = mysqli_query($conn, $sql) or die("Query failed!");

$total_price = 0;

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
        <section class="order">
            <div class="oreder__container container">
                <div class="order__heading">Your order items</div>

                <?php if(mysqli_num_rows($result) > 0){ ?>
                <div class="flex justify-between">
                    <div class="order__list-wrapper">
                        <?php 
                        while($row = mysqli_fetch_assoc($result)){ 
                            $total_price += $row["offer_price"];
                            order_item(
                                $row["product_name"], 
                                $row["original_price"], 
                                $row["offer_price"], 
                                $row["order_id"], 
                                $row["product_img"]
                            );
                        } 
                        ?>
                    </div>

                    <div class="checkout">
                        <div class="checkout__data flex align-center justify-between">
                            <p class="checkout__text">Total price :</p>
                            <p class="checkout__price">
                                ₹<span class='text-bold'><?php echo $total_price ?></span>
                            </p>
                        </div>

                        <div class="checkout__form">
                            <form method="post">
                                <label for="payment-method" class="checkout__form-title">Payment method</label>

                                <div class="checkout__form-input flex">
                                    <div class="checkout__form-radio flex align-center">
                                        <input type="radio" id="credit_or_debit_card" name="payment" required>
                                        <label for="credit_or_debit_card">Credit or Debit card</label>
                                    </div>

                                    <div class="checkout__form-radio flex align-center">
                                        <input type="radio" id="net_banking" name="payment" required>
                                        <label for="net_banking">Net Banking</label>
                                    </div>

                                    <div class="checkout__form-radio flex align-center">
                                        <input type="radio" id="upi" name="payment" required>
                                        <label for="upi">UPI</label>
                                    </div>

                                    <div class="checkout__form-radio flex align-center">
                                        <input type="radio" id="pay_on_delivery" name="payment" required>
                                        <label for="pay_on_delivery">Pay on Delivery</label>
                                    </div>
                                </div>

                                <!-- ======== SUBMIT BUTTON ======== -->
                                <button type="submit" name="place_order" class="btn btn--submit btn--place-order flex justify-center">
                                    <img src="./assets/images/wallet-icon.svg" alt="wallet-icon"> 
                                    Place order
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <?php } else { echo "No order found!"; } ?>
            </div>
        </section>
    </main>

    <!-- ======== FOOTER ======== -->
    <?php footer("INVERNO") ?>
</body>
</html>