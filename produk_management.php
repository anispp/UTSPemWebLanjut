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

<h1>Sistem Manajemen Toko</h1>

<!-- Form untuk menambahkan produk baru -->
<form action="" method="post">
    <h2>Tambah Produk Baru</h2>
    <input type="text" name="kode" placeholder="Kode Produk" required>
    <input type="text" name="nama" placeholder="Nama Produk" required>
    <textarea name="keterangan" placeholder="Keterangan Produk" required></textarea>
    <input type="number" name="kategori" placeholder="ID Kategori" required>
    <input type="number" name="harga" placeholder="Harga Produk" required>
    <input type="number" name="stock" placeholder="Stok Produk" required>
    <input type="text" name="photo" placeholder="Nama Foto Produk" required>
    <input type="submit" name="submit_product" value="Tambah Produk" class="button">
</form>

<?php
require_once 'User.php';
require_once 'Product.php';
require_once 'Category.php';
require_once 'Order.php';

// Proses tambah produk baru
if(isset($_POST['submit_product'])){
    $product = new Product();
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];
    $photo = $_POST['photo'];
    $result = $product->addProduct($kode, $nama, $keterangan, $kategori, $harga, $stock, $photo);
    if($result){
        echo "<p>Produk berhasil ditambahkan.</p>";
    } else {
        echo "<p>Gagal menambahkan produk.</p>";
    }
}

// Menampilkan daftar produk
$product = new Product();
$products = $product->getProducts();
if ($products->num_rows > 0) {
    echo "<h2>Daftar Produk</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Kode</th><th>Nama</th><th>Keterangan</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Foto</th><th>Aksi</th></tr>";
    while($row = $products->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["produk_id"] . "</td>";
        echo "<td>" . $row["produk_kode"] . "</td>";
        echo "<td>" . $row["produk_nama"] . "</td>";
        echo "<td>" . $row["produk_keterangan"] . "</td>";
        echo "<td>" . $row["produk_id_kat"] . "</td>";
        echo "<td>" . $row["produk_hrg"] . "</td>";
        echo "<td>" . $row["produk_stock"] . "</td>";
        echo "<td>" . $row["produk_photo"] . "</td>";
        echo "<td><a href='edit_product.php?id=" . $row["produk_id"] . "'>Edit</a> | <a href='delete_product.php?id=" . $row["produk_id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada produk.</p>";
}
?>

</body>
</html>