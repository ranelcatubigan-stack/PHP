<?php
require 'config.php';

if(isset($_POST['add'])){

    $dish_name = $_POST['dish_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $stmt = $restaurant -> prepare("INSERT INTO menuitems (dish_name, price, category) VALUES (?, ?, ?)");
    $stmt -> execute([$dish_name, $price, $category]);

    $item_id = $restaurant -> lastInsertId();

    echo "Menu item added successfully!";
}
?>