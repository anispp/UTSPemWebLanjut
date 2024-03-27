<?php
require_once 'Order.php';

if(isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $order = new Order();
    $result = $order->deleteOrder($order_id);
    if ($result) {
        echo "<p>Pesanan berhasil dihapus.</p>";
    } else {
        echo "<p>Gagal menghapus pesanan.</p>";
    }
}
?>
