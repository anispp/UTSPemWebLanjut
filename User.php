<?php
require_once 'config.php';

class User {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Metode untuk menambahkan pengguna baru
    // Metode untuk menambahkan pengguna baru
public function addUser($email, $password, $nama, $alamat, $hp, $pos, $role = 0, $aktif = 1) {
    // Periksa apakah alamat email sudah ada di database
    $check_query = "SELECT * FROM tb_users WHERE user_email='$email'";
    $check_result = mysqli_query($this->db->connection, $check_query);
    if(mysqli_num_rows($check_result) > 0) {
        // Jika alamat email sudah ada, berikan pesan kesalahan atau tindakan lain yang sesuai
        echo "Alamat email sudah digunakan. Silakan gunakan alamat email lain.";
        return false;
    } else {
        // Jika alamat email belum ada, lanjutkan proses penambahan pengguna baru
        $query = "INSERT INTO tb_users (user_email, user_password, user_nama, user_alamat, user_hp, user_pos, user_role, user_aktif) VALUES ('$email', '$password', '$nama', '$alamat', '$hp', '$pos', $role, $aktif)";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}


    // Metode untuk mengambil daftar pengguna
    public function getUsers() {
        $query = "SELECT * FROM tb_users";
        $result = mysqli_query($this->db->connection, $query);
        return $result;
    }

    // Metode untuk mengambil data pengguna berdasarkan ID
    public function getUserById($user_id) {
        $query = "SELECT * FROM tb_users WHERE user_id=$user_id";
        $result = mysqli_query($this->db->connection, $query);
        return $result;
    }

    // Metode untuk mengedit pengguna
    public function editUser($user_id, $email, $password, $nama, $alamat, $hp, $pos, $role = 0, $aktif = 1) {
        $query = "UPDATE tb_users SET user_email='$email', user_password='$password', user_nama='$nama', user_alamat='$alamat', user_hp='$hp', user_pos='$pos', user_role=$role, user_aktif=$aktif WHERE user_id=$user_id";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Metode untuk menghapus pengguna
    public function deleteUser($user_id) {
        $query = "DELETE FROM tb_users WHERE user_id=$user_id";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>