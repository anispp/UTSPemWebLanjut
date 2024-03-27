<?php
require_once 'config.php';

class Order {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Metode untuk menambahkan pesanan baru
    public function addOrder($nama_produk, $jumlah, $total_harga) {
        $query = "INSERT INTO tb_order (nama_produk, jumlah, total_harga) VALUES ('$nama_produk', $jumlah, $total_harga)";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Metode untuk mengambil daftar pesanan
    public function getOrders() {
        $query = "SELECT * FROM tb_order";
        $result = mysqli_query($this->db->connection, $query);
        return $result;
    }

    // Metode untuk mengambil data pesanan berdasarkan ID
    public function getOrderById($order_id) {
        $query = "SELECT * FROM tb_order WHERE order_id=$order_id";
        $result = mysqli_query($this->db->connection, $query);
        return $result;
    }

    // Metode untuk mengedit pesanan
    public function editOrder($order_id, $nama_produk, $jumlah, $total_harga) {
        $query = "UPDATE tb_order SET nama_produk='$nama_produk', jumlah=$jumlah, total_harga=$total_harga WHERE order_id=$order_id";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Metode untuk menghapus pesanan
    public function deleteOrder($order_id) {
        $query = "DELETE FROM tb_order WHERE order_id=$order_id";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>
