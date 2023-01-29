# Funções e mais coisas sobre números

Em PHP os números são divididos em dois tipos: inteiros e floats.

## Contantes para inteiros

PHP_INT_MAX - O maior inteiro suportado;
PHP_INT_MIN - O menor inteiro suportado;

PHP_FLOAT_MAX - O maior número de ponto flutuante representável;
PHP_FLOAT_MIN - O menor número de ponto flutuante positivo representável;


## verificando dado de numbero

use is_integer() para verificar se um valor é inteiro;

use is_float() para verificar se um valor é float;

## sub-tipos numéricos

### Inifity

Um valor maior que PHP_FLOAT_MAX e PHP_INT_MAX é considerado infinito (infinity).

Use a função `is_finite()` para verificar se um número é finito.

### NaN

NaN é um sub-tipo, númerico, que representa o resultado de uma operação matemática
impossível.

É possível usar `is_nan()` para verificar se um valor é um NaN.

## Verificando se o valor pode ser convertido para um número.

A função `is_numeric()` retorna true se o valor passado for
um número (integer ou float) ou se for uma string númerica.

## Outras formas de converter tipos

Podemos usar a sintaxe `(string) $value, (number) $value, (float) $value` para forçar o $value
a ser convertido para o tipo passado entre parentesis.

