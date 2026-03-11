<?php
require 'config.php';

if(isset($_POST['update_order'])){
    $customer_id = $_POST['customer'];
    $item_id = $_POST['menu_item'];
    $quantity = $_POST['quantity'];
    $order_id = $_POST['order_id'];
    
    $stmt = $restaurant -> prepare("UPDATE orders SET customer_id = ?, item_id = ?, quantity = ? WHERE order_id = ?");
    $stmt -> execute([$customer_id, $item_id, $quantity, $order_id]);

    header("Location: landing2.php");
    exit();

}
?>