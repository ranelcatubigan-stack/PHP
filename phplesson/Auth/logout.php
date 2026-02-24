<?php
session_start();

$_SESSION = [];

session_destroy();

setcookie("PHPSESSID", "", time() - 3600, "/");

header("LocationL login.php");
exit();

?>