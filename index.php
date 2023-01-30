<?php 
require_once "./helpers.php";

class Animal {
  const NAME = "Animal Base";

  public static function secret () {
    echo "Animal base here";
  }

  public function get_secret () {
    self::secret();
  }
}

$animal = new Animal();

echo $animal->get_secret(); echo "<br>";
echo Animal::secret();
