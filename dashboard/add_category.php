<section class="add-category" id="add-category">
    <div class="add-category-form__wrapper">
        <button class="add-category-form__close" id="close-button-2">
            <img src="../assets/images/close-icon.svg" alt="close-icon">
        </button>

        <h2 class="add-category-form__title">Add category</h2>

        <form action="../backend/add_category.php" method="post" class="add-category-form">
            <div class="add-category-form__field">
                <label for="category_name" class="add-category-form__label">Category name</label>
                <input type="text" name="category_name" id="category_name" class="add-category-form__input" required autocomplete="off">
            </div>

            <button type="submit" name="save" class="btn btn--save">Save</button>
        </form>
    </div>
</section>