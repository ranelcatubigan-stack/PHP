<?php
require 'config.php';

$stmt = $restaurant->query("SELECT * FROM customers");
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>