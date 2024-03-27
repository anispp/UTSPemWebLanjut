<?php
require_once 'config.php';

class Cart {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Metode untuk menambahkan item ke keranjang
    public function addToCart($id_user, $id_produk, $harga, $jml) {
        $query = "INSERT INTO tb_keranjang (ker_id_user, ker_id_produk, ker_harga, ker_jml) VALUES ($id_user, $id_produk, $harga, $jml)";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Metode untuk mengambil daftar item di keranjang
    public function getCartItems($id_user) {
        $query = "SELECT * FROM tb_keranjang WHERE ker_id_user=$id_user";
        $result = mysqli_query($this->db->connection, $query);
        return $result;
    }

    // Metode untuk menghapus item dari keranjang
    public function removeFromCart($ker_id) {
        $query = "DELETE FROM tb_keranjang WHERE ker_id=$ker_id";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>