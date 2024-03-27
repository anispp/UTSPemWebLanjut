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

<!-- Form untuk menambahkan pesanan baru -->
<form action="" method="post">
    <h2>Tambah Pesanan Baru</h2>
    <input type="text" name="nama_produk" placeholder="Nama Produk" required>
    <input type="number" name="jumlah" placeholder="Jumlah" required>
    <input type="number" name="total_harga" placeholder="Total Harga" required>
    <input type="submit" name="submit_order" value="Tambah Pesanan" class="button">
</form>

<?php
require_once 'Order.php';

// Menampilkan daftar pesanan
$order = new Order();
$orders = $order->getOrders();
if ($orders->num_rows > 0) {
    echo "<h2>Daftar Pesanan</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nama Produk</th><th>Jumlah</th><th>Total Harga</th><th>Aksi</th></tr>";
    while($row = $orders->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["order_id"] . "</td>";
        echo "<td>" . $row["nama_produk"] . "</td>";
        echo "<td>" . $row["jumlah"] . "</td>";
        echo "<td>" . $row["total_harga"] . "</td>";
        echo "<td><a href='edit_order.php?id=" . $row["order_id"] . "'>Edit</a> | <a href='delete_order.php?id=" . $row["order_id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada pesanan.</p>";
}
?>

</body>
</html>
