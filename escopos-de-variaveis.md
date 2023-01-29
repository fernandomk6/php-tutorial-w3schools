# Escopos de variáveis

PHP possúi 3 escopos para variáveis 

- Local
- Global
- Estático

## Local e Global

Todas as funções declaradas dentro de uma função, possuem escopo, local,
ou seja, só são acessíveis dentro da função.

Todas as variáveis declaradas fora de uma função, possuem um escopo global.
Ou seja, nenhuma função tem acesso direto a variavel.

Uma função só tem acesso as variáveis declaradas dentro dela e seus parametros.

### A palavra chave Global

Você posse fazer com que uma função, use uma variável de seu escopo léxico,
por, usar a palavra chave global, antes do nome da variável. Fazendo isso
o php irá procurar procurar por uma variavel com aquele nome em toda
a árvore de escopos de seu script.

```php
$externalX = 'External X';

function showX () {
  // Declare quais variáveis do escopo léxico irá usar.
  // Escopo léxico é sinonimo de escopo "Global".
  global $externalX; // Pode usar mais de uma separando por vírgula EX: global $x, $y, $z...
  
  echo $externalX;
}

showX(); // External X
```

Também é possível acessar uma variável global por meio do array `$GLOBALS[variable_name_as_string]`.
O array Globals armazena todas as variáveis globais e pode ser usado dentro de qualquer função,
para acessar variáveis globais.

```php
$externalX = 'External X';

function showX () {
  echo $GLOBALS['externalX'];
}

showX();
```

## Estáticos

Quando uma função é concluída, por padrão todas as suas variáveis, tem seus valores
excluidos da mémoria, ou seja, todas as variaveis locais da função, tem seus valores,
apagados. Porém, você pode evitar que o valor de uma variável local de uma função, tenha
seu valor excluído, por usar a palavra chave `static` antes do nome da variável ao declara-la.

Isso fará com que, cada vez que a função seja chamada, o valor dessa variável seja o mesmo,
da ultima execução da função. Em outras palavras, essa variável se lembrará de seu valor
anterior.

```php
function increment () {
  static $number = 0;
  $number++;

  return $number;
}

print_l(increment()); // 1
print_l(increment()); // 2
print_l(increment()); // 3
print_l(increment()); // 4
```