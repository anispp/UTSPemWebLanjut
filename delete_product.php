<?php
require_once 'Product.php';

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Proses hapus produk
    $product = new Product();
    $result = $product->deleteProduct($product_id);

    if($result) {
        echo "<script>alert('Produk berhasil dihapus.');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus produk.');</script>";
    }
} else {
    echo "ID produk tidak diberikan.";
    exit();
}
?>