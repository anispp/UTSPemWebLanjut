<?php
require_once 'Product.php';

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Mengambil data produk berdasarkan ID
    $product = new Product();
    $result = $product->getProductById($product_id);

    if ($result->num_rows > 0) {
        // Fetch data and set variables
    } else {
        echo "Produk tidak ditemukan.";
        exit();
    }
} else {
    echo "ID produk tidak diberikan.";
    exit();
}

// Proses update produk
if(isset($_POST['submit_edit'])) {
    // Process form submission and update product
}
?>
