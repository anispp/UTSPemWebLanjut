<?php
require_once 'config.php';

class Product {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Metode untuk menambahkan produk baru
    public function addProduct($kode, $nama, $keterangan, $kategori, $harga, $stock, $photo) {
        // Periksa apakah kategori yang dimasukkan ada dalam tabel tb_kategori
        $check_query = "SELECT * FROM tb_kategori WHERE kat_id = $kategori";
        $check_result = mysqli_query($this->db->connection, $check_query);

        if ($check_result->num_rows > 0) {
            $query = "INSERT INTO tb_produk (produk_kode, produk_nama, produk_keterangan, produk_id_kat, produk_hrg, produk_stock, produk_photo) VALUES ('$kode', '$nama', '$keterangan', $kategori, $harga, $stock, '$photo')";
            $result = mysqli_query($this->db->connection, $query);

            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            // Jika kategori tidak valid, kembalikan false
            return false;
        }
    }

    // Metode untuk mendapatkan item-item dalam keranjang
    public function getCartItems() {
        $query = "SELECT * FROM tb_keranjang";
        $result = mysqli_query($this->db->connection, $query);
        return $result;
    }

    // Metode untuk mengambil daftar produk
    public function getProducts() {
        $query = "SELECT * FROM tb_produk";
        $result = mysqli_query($this->db->connection, $query);
        return $result;
    }

    // Metode untuk mengambil data produk berdasarkan ID
    public function getProductById($product_id) {
        $query = "SELECT * FROM tb_produk WHERE produk_id=$product_id";
        $result = mysqli_query($this->db->connection, $query);
        return $result;
    }

    // Metode untuk mengedit produk
    public function editProduct($product_id, $kode, $nama, $keterangan, $kategori, $harga, $stock, $photo) {
        $query = "UPDATE tb_produk SET produk_kode='$kode', produk_nama='$nama', produk_keterangan='$keterangan', produk_id_kat=$kategori, produk_hrg=$harga, produk_stock=$stock, produk_photo='$photo' WHERE produk_id=$product_id";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Metode untuk menghapus produk
    public function deleteProduct($product_id) {
        $query = "DELETE FROM tb_produk WHERE produk_id=$product_id";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>
