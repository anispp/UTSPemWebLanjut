<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Toko</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<h1>Sistem Manajemen Toko - Manajemen Keranjang</h1>

<!-- Form untuk menambahkan produk baru ke keranjang -->
<form action="" method="post">
    <h2>Tambah Produk ke Keranjang</h2>
    <input type="text" name="nama_produk" placeholder="Nama Produk" required>
    <input type="number" name="harga" placeholder="Harga Produk" required>
    <input type="number" name="jumlah" placeholder="Jumlah Produk" required>
    <input type="submit" name="submit_cart" value="Tambah ke Keranjang" class="button">
</form>

<?php
require_once 'Product.php';

// Proses tambah produk ke keranjang
if(isset($_POST['submit_cart'])){
    $product = new Product();
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $result = $product->addToCart($nama_produk, $harga, $jumlah);
    if($result){
        echo "<p>Produk berhasil ditambahkan ke keranjang.</p>";
    } else {
        echo "<p>Gagal menambahkan produk ke keranjang.</p>";
    }
}

// Menampilkan daftar produk dalam keranjang
$product = new Product();
$cart_items = $product->getCartItems();
if ($cart_items->num_rows > 0) {
    echo "<h2>Daftar Produk dalam Keranjang</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nama Produk</th><th>Harga</th><th>Jumlah</th><th>Aksi</th></tr>";
    while($row = $cart_items->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nama_produk"] . "</td>";
        echo "<td>" . $row["harga"] . "</td>";
        echo "<td>" . $row["jumlah"] . "</td>";
        echo "<td><a href='edit_cart_item.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_cart_item.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Keranjang masih kosong.</p>";
}
?>

</body>
</html>