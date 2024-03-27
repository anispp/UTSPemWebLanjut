<?php
require_once 'Product.php';

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Mengambil data produk berdasarkan ID
    $product = new Product();
    $result = $product->getProductById($product_id);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $kode = $row["produk_kode"];
        $nama = $row["produk_nama"];
        $keterangan = $row["produk_keterangan"];
        $kategori = $row["produk_id_kat"];
        $harga = $row["produk_hrg"];
        $stock = $row["produk_stock"];
        $photo = $row["produk_photo"];
    } else {
        echo "Produk tidak ditemukan.";
        exit();
    }
} else {
    echo "ID produk tidak diberikan.";
    exit();
}

// Proses update produk
if(isset($_POST['submit_edit'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];
    $photo = $_POST['photo'];

    $result = $product->editProduct($product_id, $kode, $nama, $keterangan, $kategori, $harga, $stock, $photo);

    if($result) {
        echo "<script>alert('Produk berhasil diperbarui.');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui produk.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>

<h2>Edit Produk</h2>
<form action="" method="post">
    <input type="text" name="kode" value="<?php echo $kode; ?>" placeholder="Kode Produk" required><br><br>
    <input type="text" name="nama" value="<?php echo $nama; ?>" placeholder="Nama Produk" required><br><br>
    <textarea name="keterangan" placeholder="Keterangan Produk" required><?php echo $keterangan; ?></textarea><br><br>
    <input type="number" name="kategori" value="<?php echo $kategori; ?>" placeholder="ID Kategori" required><br><br>
    <input type="number" name="harga" value="<?php echo $harga; ?>" placeholder="Harga Produk" required><br><br>
    <input type="number" name="stock" value="<?php echo $stock; ?>" placeholder="Stok Produk" required><br><br>
    <input type="text" name="photo" value="<?php echo $photo; ?>" placeholder="Nama Foto Produk" required><br><br>
    <input type="submit" name="submit_edit" value="Simpan Perubahan">
</form>

</body>
</html>