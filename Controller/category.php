<?php
require_once 'Category.php';

// Proses tambah kategori baru
if(isset($_POST['submit_category'])){
    $category = new CategoryModel();
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    $result = $category->addCategory($nama, $keterangan);
    if($result){
        echo "<p>Kategori berhasil ditambahkan.</p>";
    } else {
        echo "<p>Gagal menambahkan kategori.</p>";
    }
}
?>
