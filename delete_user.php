<?php
require_once 'User.php';

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
    
    // Proses hapus pengguna
    $user = new User();
    $result = $user->deleteUser($user_id);

    if($result) {
        echo "<script>alert('Pengguna berhasil dihapus.');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus pengguna.');</script>";
    }
} else {
    echo "ID pengguna tidak diberikan.";
    exit();
}
?>