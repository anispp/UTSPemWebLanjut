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
<form action="controller.php" method="post">
    <h2>Tambah Produk ke Keranjang</h2>
    <input type="text" name="nama_produk" placeholder="Nama Produk" required>
    <input type="number" name="harga" placeholder="Harga Produk" required>
    <input type="number" name="jumlah" placeholder="Jumlah Produk" required>
    <input type="submit" name="submit_cart" value="Tambah ke Keranjang" class="button">
</form>

<?php
require_once 'controller.php';
?>

</body>
</html>
