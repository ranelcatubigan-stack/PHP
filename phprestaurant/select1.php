<?php
require 'config.php';

// main order list for table
$stmt = $restaurant->query("SELECT 
    customers.first_name,
    menuitems.dish_name,
    menuitems.price,
    orders.quantity,
    (menuitems.price * orders.quantity) AS total_price,
    orders.order_date,
    orders.order_id
FROM orders
INNER JOIN customers ON orders.customer_id = customers.customer_id
INNER JOIN menuitems ON orders.item_id = menuitems.item_id");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// customers dropdown
$stmt = $restaurant->query("SELECT * FROM customers");
$orders_name = $stmt->fetchAll(PDO::FETCH_ASSOC);

// menu items dropdown
$stmt = $restaurant->query("SELECT * FROM menuitems");
$menu_item_name = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>