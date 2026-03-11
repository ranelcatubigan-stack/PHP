<?php
require 'config.php';

if(isset($_POST['add_order'])){
   
    if(isset($_POST['customer']) && isset($_POST['quantity']) && isset($_POST['menu_item'])){
        $customer_id = $_POST['customer'];
        $order_date = date('Y-m-d H:i:s');  
        $quantity = $_POST['quantity'];
        $item_id = $_POST['menu_item'];

        $stmt = $restaurant -> prepare("INSERT INTO orders (customer_id, item_id, order_date, quantity) VALUES (?, ?, ?, ?)");
        $stmt -> execute([$customer_id, $item_id, $order_date, $quantity]);

        echo "Order added successfully!";
    }
}
?>