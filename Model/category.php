<?php
require_once 'config.php';

class CategoryModel {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Metode untuk menambahkan kategori baru
    public function addCategory($nama, $keterangan) {
        $query = "INSERT INTO tb_kategori (kat_nama, kat_keterangan) VALUES ('$nama', '$keterangan')";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Metode untuk mengambil daftar kategori
    public function getCategories() {
        $query = "SELECT * FROM tb_kategori";
        $result = mysqli_query($this->db->connection, $query);
        return $result;
    }

    // Metode untuk mengedit kategori
    public function editCategory($kat_id, $nama, $keterangan) {
        $query = "UPDATE tb_kategori SET kat_nama='$nama', kat_keterangan='$keterangan' WHERE kat_id=$kat_id";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Metode untuk menghapus kategori
    public function deleteCategory($kat_id) {
        $query = "DELETE FROM tb_kategori WHERE kat_id=$kat_id";
        $result = mysqli_query($this->db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>
