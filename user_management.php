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

<!-- Form untuk menambahkan pengguna baru -->
<form action="" method="post">
    <h2>Tambah Pengguna Baru</h2>
    <input type="text" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="alamat" placeholder="Alamat" required>
    <input type="text" name="hp" placeholder="Nomor HP" required>
    <input type="text" name="pos" placeholder="Kode Pos" required>
    <input type="submit" name="submit_user" value="Tambah Pengguna" class="button">
</form>

<?php
require_once 'User.php';
require_once 'Product.php';
require_once 'Category.php';
require_once 'Order.php';

// Proses tambah pengguna baru
if(isset($_POST['submit_user'])){
    $user = new User();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $pos = $_POST['pos'];
    $result = $user->addUser($email, $password, $nama, $alamat, $hp, $pos);
    if($result){
        echo "<p>Pengguna berhasil ditambahkan.</p>";
    } else {
        echo "<p>Gagal menambahkan pengguna.</p>";
    }
}

// Menampilkan daftar pengguna
$user = new User();
$users = $user->getUsers();
if ($users->num_rows > 0) {
    echo "<h2>Daftar Pengguna</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Email</th><th>Nama</th><th>Alamat</th><th>No. HP</th><th>Kode Pos</th><th>Aksi</th></tr>";
    while($row = $users->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["user_email"] . "</td>";
        echo "<td>" . $row["user_nama"] . "</td>";
        echo "<td>" . $row["user_alamat"] . "</td>";
        echo "<td>" . $row["user_hp"] . "</td>";
        echo "<td>" . $row["user_pos"] . "</td>";
        echo "<td><a href='edit_user.php?id=" . $row["user_id"] . "'>Edit</a> | <a href='delete_user.php?id=" . $row["user_id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada pengguna.</p>";
}
?>

</body>
</html>