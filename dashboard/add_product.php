<?php 

// Show categories
$sql1 = "SELECT category_id, category_name FROM categories";
$result1 = mysqli_query($conn, $sql1) or die("Query failed!");

?>

<section class="add-product" id="add-product">
    <div class="add-product-form__wrapper">
        <button class="add-product-form__close" id="close-button-1">
            <img src="../assets/images/close-icon.svg" alt="close-icon">
        </button>

        <h2 class="add-product-form__title">Add product</h2>

        <form action="../backend/add_product.php" method="post" enctype="multipart/form-data" class="add-product-form flex justify-between">
            <div>
                <div class="add-product-form__field">
                    <label for="product_name" class="add-product-form__label">Product name</label>
                    <input type="text" name="product_name" id="product_name" class="add-product-form__input" required autocomplete="off">
                </div>

                <div class="add-product-form__field-price flex justify-between">
                    <div class="add-product-form__field">
                        <label for="offer_price" class="add-product-form__label">Offer price</label>
                        <input type="text" name="offer_price" id="offer_price" class="add-product-form__input" required autocomplete="off">
                    </div>
                    <div class="add-product-form__field">
                        <label for="original_price" class="add-product-form__label">Original price</label>
                        <input type="text" name="original_price" id="original_price" class="add-product-form__input" required autocomplete="off">
                    </div>
                </div>

                <div class="add-product-category">
                    <label for="original_price" class="add-product-form__label">Category</label>

                    <?php if(mysqli_num_rows($result1) > 0){ ?>
                    <select id="category" name="category" class="add-product-form__input" required>
                        <option selected disabled>Select</option>
                    <?php 
                    while($row = mysqli_fetch_assoc($result1)){
                        echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                    } 
                    ?>
                    </select>
                    <?php } ?>
                </div>

                <button type="submit" name="save" class="btn btn--save">Save</button>
            </div>

            <label for="input-file" id="drop-area" class="add-product-form__image-upload">
                <input type="file" accept="image/*" name="upload_image" id="input-file" hidden required>
                <div id="view-area" class="add-product-form__image-view">
                    <img src="../assets/images/cloud-upload-icon.svg" alt="cloud-upload-icon">
                    <p>Drag and drop or click here<br/>to upload image</p>
                </div>
            </label>
        </form>
    </div>
</section>