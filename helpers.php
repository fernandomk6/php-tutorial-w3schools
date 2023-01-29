<?php 

function print_l ($value) {
  if (is_object($value)) {
    echo "<br>";
    echo "object";
    return;
  }

  if (is_null($value)) {
    echo "<br>";
    echo "null";
    return;
  }

  if ($value === "") {
    echo "<br>";
    echo "String vazia";
    return;
  }

  if (is_bool($value)) {
    echo "<br>";
    echo $value ? "boolean true" : "boolean false";
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
  print_r($value);
}
