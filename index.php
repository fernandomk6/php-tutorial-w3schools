<?php 
require_once "./helpers.php";

$name = "fernando";

function myFunction (&$x) {
  $x = "fefelas";
}

print_l($name); // fernando
myFunction($name); // altera o valor pois foi passado por referência
print_l($name); // fefelas
