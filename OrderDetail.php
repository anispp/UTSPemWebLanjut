<?php
require_once 'config.php';

class OrderDetail {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Metode untuk menambahkan detail pesanan baru
    public function addOrderDetail($id_order, $id_produk, $harga, $jml) {
        $query = "INSERT INTO tb_order_detail (detail_id_order, detail_id_produk, detail_harga, detail_jml) VALUES ($id_order, $id_produk, $harga, $jml)";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Metode untuk mengambil detail pesanan
    public function getOrderDetails($id_order) {
        $query = "SELECT * FROM tb_order_detail WHERE detail_id_order=$id_order";
        $result = mysqli_query($this->db->connection, $query);
        return $result;
    }

    // Metode untuk menghapus detail pesanan
    public function deleteOrderDetail($detail_id) {
        $query = "DELETE FROM tb_order_detail WHERE detail_id=$detail_id";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>