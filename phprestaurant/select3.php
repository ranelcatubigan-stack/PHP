<?php
require 'config.php';

$stmt = $restaurant -> query("SELECT * FROM menuitems");
$menuitems = $stmt ->fetchAll(PDO:: FETCH_ASSOC);