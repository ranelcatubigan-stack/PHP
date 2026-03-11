<?php
require 'config.php';

if(isset($_POST['update'])){
    $item_id = $_POST['item_id'];
    $dish_name = $_POST['dish_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $stmt = $restaurant -> prepare("UPDATE menuitems SET dish_name = ?, price = ?, category = ? WHERE item_id = ?");
    $stmt -> execute([$dish_name, $price, $category, $item_id]);

    header("Location: landing2.php");
    exit();


}
?>