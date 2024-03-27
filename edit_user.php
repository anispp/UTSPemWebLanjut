<?php
require_once 'User.php';

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
    
    // Mengambil data pengguna berdasarkan ID
    $user = new User();
    $result = $user->getUserById($user_id);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row["user_email"];
        $nama = $row["user_nama"];
        $alamat = $row["user_alamat"];
        $hp = $row["user_hp"];
        $pos = $row["user_pos"];
    } else {
        echo "Pengguna tidak ditemukan.";
        exit();
    }
} else {
    echo "ID pengguna tidak diberikan.";
    exit();
}

// Proses update pengguna
if(isset($_POST['submit_edit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $pos = $_POST['pos'];

    $result = $user->editUser($user_id, $email, $password, $nama, $alamat, $hp, $pos);

    if($result) {
        echo "<script>alert('Pengguna berhasil diperbarui.');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui pengguna.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
</head>
<body>

<h2>Edit Pengguna</h2>
<form action="" method="post">
    <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="text" name="nama" value="<?php echo $nama; ?>" placeholder="Nama" required><br><br>
    <input type="text" name="alamat" value="<?php echo $alamat; ?>" placeholder="Alamat" required><br><br>
    <input type="text" name="hp" value="<?php echo $hp; ?>" placeholder="Nomor HP" required><br><br>
    <input type="text" name="pos" value="<?php echo $pos; ?>" placeholder="Kode Pos" required><br><br>
    <input type="submit" name="submit_edit" value="Simpan Perubahan">
</form>

</body>
</html>