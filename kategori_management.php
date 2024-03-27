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

<!-- Form untuk menambahkan kategori baru -->
<form action="" method="post">
    <h2>Tambah Kategori Baru</h2>
    <input type="text" name="nama" placeholder="Nama Kategori" required>
    <textarea name="keterangan" placeholder="Keterangan Kategori" required></textarea>
    <input type="submit" name="submit_category" value="Tambah Kategori" class="button">
</form>

<?php
require_once 'Category.php';

// Proses tambah kategori baru
if(isset($_POST['submit_category'])){
    $category = new Category();
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    $result = $category->addCategory($nama, $keterangan);
    if($result){
        echo "<p>Kategori berhasil ditambahkan.</p>";
    } else {
        echo "<p>Gagal menambahkan kategori.</p>";
    }
}

// Menampilkan daftar kategori
$category = new Category();
$categories = $category->getCategories();
if ($categories->num_rows > 0) {
    echo "<h2>Daftar Kategori</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nama</th><th>Keterangan</th><th>Aksi</th></tr>";
    while($row = $categories->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["kat_id"] . "</td>";
        echo "<td>" . $row["kat_nama"] . "</td>";
        echo "<td>" . $row["kat_keterangan"] . "</td>";
        echo "<td><a href='edit_category.php?id=" . $row["kat_id"] . "'>Edit</a> | <a href='delete_category.php?id=" . $row["kat_id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada kategori.</p>";
}
?>

</body>
</html>