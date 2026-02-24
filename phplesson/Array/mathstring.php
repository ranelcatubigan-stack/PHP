<?php
echo "<h2>Math Functions</h2>";

$number = -10;
echo "abs($number) = " . abs($number) . "<br>";

$number = 4.6;
echo "round($number) = " . round($number) . "<br>";

$number = 4.2;
echo "ceil($number) = " . ceil($number) . "<br>";

$number = 4.8;
echo "floor($number) = " . floor($number) . "<br>";

$base = 2;
$exp = 3;
echo "pow($base, $exp) = " . pow($base, $exp) . "<br>";

$number = 16;
echo "sqrt($number) = " . sqrt($number) . "<br>";

echo "max(1, 5, 3) = " . max(1, 5, 3) . "<br>";
echo "min(1, 5, 3) = " . min(1, 5, 3) . "<br>";

echo "rand(1, 100) = " . rand(1, 100) . "<br>";

echo "<h2>Strong Functions</h2>";

$str = "Hello World";
echo "strlen($str) = " . strtolower($str) . "<br>";

$str3 = "apple,banana,orange";
$Fruits = explode(",", $str3);
echo "explode(',',' $str3') = ";
print_r($Fruits);
echo "<br>";

$joined = implode(" - ", $Fruits);
echo "implode(' - ', fruits) = $joined<br>";

echo "strrev('$str') = " . strrev($str) . "<br>";
?>