# Funções

## Passando argumentos por referencias

Use `&$variable` como parametro, para que seja recebuido uma referência
do argumento e não uma cópia do valor.

```php
$name = "fernando";

function myFunction (&$x) {
  $x = "fefelas";
}

print_l($name); // fernando
myFunction($name); // altera o valor pois foi passado por referência
print_l($name); // fefelas
```