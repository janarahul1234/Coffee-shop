// Add product section
const addProduct = document.getElementById('add-product');
const addProductButton = document.getElementById('add-product-button');
const closeButton1 = document.getElementById('close-button-1');

addProductButton.addEventListener("click", function(){
    addProduct.style.display = "block"; // Show page
});

closeButton1.addEventListener("click", function(){
    addProduct.style.display = "none"; // Hide page
});

// Add category section
const addCategory = document.getElementById('add-category');
const addCategoryButton = document.getElementById('add-category-button');
const closeButton2 = document.getElementById('close-button-2');

addCategoryButton.addEventListener("click", function(){
    addCategory.style.display = "block"; // Show page
});

closeButton2.addEventListener("click", function(){
    addCategory.style.display = "none"; // Hide page
});