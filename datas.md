# datas

A função `date()` formata uma data (timestamp) em uma formato mais
legível.

Sintaxe `date(format, timestamp)`.

| Parameter |	Description |
| --- | --- |
| format:	Required. | Specifies the format of the timestamp |
| timestamp:	Optional. | Specifies a timestamp. Default is the current date and time |

Exemplos:

```php
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");

echo "Hoje é " . date('d/M/Y') . " " . date('l'); // Hoje é 30/Jan/2023 Monday
```

Também é possível obter o tempo através da função date.

- H - formato de 24 horas de uma hora (00 a 23)
- h - formato de 12 horas de uma hora com zeros à esquerda (01 a 12)
- i - Minutos com zeros à esquerda (00 a 59)
- s - Segundos com zeros à esquerda (00 a 59)
- a - Minúsculas Ante Meridiem e Post Meridiem (am ou pm)

```php
echo "The time is " . date("H:i:s a"); // The time is 01:44:22 am
```

## Definindo fuso horário

Caso você tenha obtido um horário diferente do esperado, provavelmente seu
servidor está em outro país ou configurado com outro fuso horário. 
Para setar o fuso horário correto use o seguinte código: `date_default_timezone_set()`

```php
date_default_timezone_set("America/New_York");
echo "The time is " . date("h:i:sa");
```

## Função mktime para gerar um timestamp de uma data especifica

Use a função `mktime()` para gerar um timestamp, apartir da data especificada,
como argumento.

Sintaxe: `mktime(hour, minute, second, month, day, year)`.

```php
$d = mktime(11, 14, 54, 8, 12, 2014);
echo "Created date is " . date("Y-m-d h:i:sa", $d);
```

```php
$timestampMyBirthday = mktime(0, 0, 0, 8, 21, 1998);

echo "Minha data de nascimento " . date("d/m/Y H:i:s a", $timestampMyBirthday);
// Minha data de nascimento 21/08/1998 00:00:00 am
```

## função strtotime para converter uma string humana em um timestamp

Sintaxe: `strtotime(time, now)`;

Exemplos:

```php
$d = strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d = strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d = strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";
```