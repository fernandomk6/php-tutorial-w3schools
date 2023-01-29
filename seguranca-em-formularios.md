# Segurança em formulários

Uma forma segura de validar dados de input do usuário é usar a função
`htmlspecialchars()`. Essa função transforma as tags html em strings, texto.
Ou seja a tag `<br>` se torna `"<br>"`.

## Validando form

- Sempre use a função `htmlspecialchars()` para validar dados que podem ser alterados pelo
usuário, como URL e inputs.
- Use a função `trim()` para remover caracteres de espaços e tabulações.
- Remova as barra invertidas com a função `stripslashes()`, para evitar que seja passado um
caminho de arquivo.
- Faça uma função custom para validar o dado do seu input conforme sua necessidade. Vamos
ver um exemplo:

```php
$name = $email = $gender = $comment = $website = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
```

- Vamos agora verificar os campos que são requeridos. Adicionamos algumas
linhas de código nesse novo exemplo.

```php
$nameErr = $emailErr = $genderErr = $websiteErr = null;
$name = $email = $gender = $comment = $website = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
```

Exibindo as mensagens de erro para o usuário com PHP.

```php
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

Name: <input type="text" name="name">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
E-mail:
<input type="text" name="email">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
Website:
<input type="text" name="website">
<span class="error"><?php echo $websiteErr;?></span>
<br><br>
Comment: <textarea name="comment" rows="5" cols="40"></textarea>
<br><br>
Gender:
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="other">Other
<span class="error">* <?php echo $genderErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit">

</form>
```

- Agora falta validar quais caracteres foram digitados pelo usuário

A melhor forma de validar um email, nome, telefone ou cnpj, é usando
uma expressão regular. A forma mais acertiva de se fazer isso é pesquisar
um expressão regular na internet de uma funte confiavel, e testa-la.
Vejamos agora um exemplo de validação com expressões regulares.

```php
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
```

*if (filter_var($email, FILTER_VALIDATE_EMAIL))*

É muito útil usar a função filter_var para validar dados com base em filtros.
