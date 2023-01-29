<?php 

function print_l ($value) {
  if (is_object($value)) {
    return;
  }

  if (is_array($value)) {
    echo "<br>";
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    return;
  }

  echo "<br>";
  print_r($value === "" ? 'String vazia' : $value);
}
