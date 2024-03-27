<?php
require_once 'Order.php';

if(isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $order = new Order();
    $result = $order->getOrderById($order_id);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Tampilkan formulir untuk mengedit pesanan
        echo "<h2>Edit Pesanan</h2>";
        echo "<form action='edit_order_process.php' method='post'>";
        echo "<input type='hidden' name='order_id' value='" . $row['order_id'] . "'>";
        echo "<input type='text' name='nama_produk' placeholder='Nama Produk' value='" . $row['nama_produk'] . "' required>";
        echo "<input type='number' name='jumlah' placeholder='Jumlah' value='" . $row['jumlah'] . "' required>";
        echo "<input type='number' name='total_harga' placeholder='Total Harga' value='" . $row['total_harga'] . "' required>";
        echo "<input type='submit' name='submit_edit_order' value='Simpan Perubahan' class='button'>";
        echo "</form>";
    } else {
        echo "Pesanan tidak ditemukan.";
    }
}
?>
