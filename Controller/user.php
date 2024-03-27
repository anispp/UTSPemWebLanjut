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
