<?php
require 'config.php';

if(isset($_GET['delete'])){
    $customer_id = $_GET['delete'];

    $stmt = $restaurant ->prepare("DELETE FROM customers WHERE customer_id = ?");
    $stmt -> execute([$customer_id]);
}
?>