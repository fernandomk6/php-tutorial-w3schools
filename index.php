<?php 
require_once "./helpers.php";

$a = [1,2,3];
$b = $a;

print_r($a); echo "<br>";
print_r($b); echo "<br>";

$a[] = 55;

print_r($a); echo "<br>";
print_r($b); echo "<br>";