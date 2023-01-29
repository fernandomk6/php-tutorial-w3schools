# Funções de string

- strlen(): retorna o length (tamalho) da string;
- str_word_count(): retorna o número de palavras na string;
- strrev(): retorna uma nova string revertida, não altera a string original;
- strpos(): procura por uma substring dentro de uma string principal, e retorna
o indice da primeira ocorrencia da substring. Caso não encontre correspondencia,
retorna um boolean false;
- str_replace(): substitui o texto dentro de uma string;

```php
$name = "fernando henrique";

echo str_replace("henrique", "chevchenko", $name); 
// fernando chevchenko
```