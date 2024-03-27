<?php
require_once 'Cart.php';

// Proses tambah produk ke keranjang
if(isset($_POST['submit_cart'])){
    $cart = new Cart();
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $result = $cart->addToCart($id_user, $id_produk, $harga, $jml);
    if($result){
        echo "<p>Produk berhasil ditambahkan ke keranjang.</p>";
    } else {
        echo "<p>Gagal menambahkan produk ke keranjang.</p>";
    }
}

// Menampilkan daftar produk dalam keranjang
$cart = new Cart();
$cart_items = $cart->getCartItems($id_user); // perlu menyediakan $id_user
if ($cart_items->num_rows > 0) {
    echo "<h2>Daftar Produk dalam Keranjang</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nama Produk</th><th>Harga</th><th>Jumlah</th><th>Aksi</th></tr>";
    while($row = $cart_items->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nama_produk"] . "</td>";
        echo "<td>" . $row["harga"] . "</td>";
        echo "<td>" . $row["jumlah"] . "</td>";
        echo "<td><a href='edit_cart_item.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_cart_item.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Keranjang masih kosong.</p>";
}
?>
