<?php
require 'config.php';

if(isset($_GET['delete'])){
    $item_id = $_GET['delete'];

    $stmt = $restaurant ->prepare("DELETE FROM menuitems WHERE item_id = ?");
    $stmt -> execute([$item_id]);
    header("Location: landing1.php");
    exit();
}
?>