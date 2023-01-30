# Orientação a objetos em PHP

## Modificadores de Acesso

Propriedades e métodos podem ter modificadores de acesso que controlam onde podem ser acessados.

Existem três modificadores de acesso:

- public - a propriedade ou método pode ser acessado de qualquer lugar. 
Isso é padrão.
- protected - a propriedade ou método pode ser acessado dentro da classe e 
por classes derivadas dessa classe.
- private - a propriedade ou método SÓ pode ser acessado dentro da classe.

## Herança 

Exemplo: 

```php
class Fruit {
  public $name;
  public $color;
  public function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }
  public function intro() {
    echo "The fruit is {$this->name} and the color is {$this->color}.";
  }
}

// Strawberry is inherited from Fruit
class Strawberry extends Fruit {
  public function message() {
    echo "Am I a fruit or a berry? ";
  }
}
$strawberry = new Strawberry("Strawberry", "red");
$strawberry->message();
$strawberry->intro();
```

## Constantes em classes

Podemos acessar uma constante de fora da classe usando o nome da classe seguido do operador 
de resolução de escopo (::) seguido do nome da constante, como aqui:

```php
class Goodbye {
  const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";
}

echo Goodbye::LEAVING_MESSAGE;
```

Ou podemos acessar uma constante de dentro da classe usando a palavra-chave `self` seguida do 
operador de resolução de escopo (::) seguido do nome da constante, como aqui:

```php
class Goodbye {
  const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";
  public function byebye() {
    echo self::LEAVING_MESSAGE;
  }
}

$goodbye = new Goodbye();
$goodbye->byebye();
```

## Classes e métodos abstratos

Uma classe abstrata é uma classe que contém pelo menos um método abstrato. Um método 
abstrato é um método declarado, mas não implementado no código.

Classe abstratas não podem ser instanciadas, apenas herdadas, servem
como um modelo para implementação.

```php
abstract class ParentClass {
  abstract public function someMethod1();
  abstract public function someMethod2($name, $color);
  abstract public function someMethod3() : string;
}
```

- O método da classe filha deve ser definido com o mesmo nome e redeclara o método 
abstrato pai
- O método da classe filha deve ser definido com o mesmo ou um modificador de acesso 
menos restrito
- O número de argumentos necessários deve ser o mesmo. No entanto, a classe filha 
pode ter argumentos opcionais além

Exemplo:

```php
// Parent class
abstract class Car {
  public $name;
  public function __construct($name) {
    $this->name = $name;
  }
  abstract public function intro() : string;
}

// Child classes
class Audi extends Car {
  public function intro() : string {
    return "Choose German quality! I'm an $this->name!";
  }
}

class Volvo extends Car {
  public function intro() : string {
    return "Proud to be Swedish! I'm a $this->name!";
  }
}

class Citroen extends Car {
  public function intro() : string {
    return "French extravagance! I'm a $this->name!";
  }
}

// Create objects from the child classes
$audi = new audi("Audi");
echo $audi->intro();
echo "<br>";

$volvo = new volvo("Volvo");
echo $volvo->intro();
echo "<br>";

$citroen = new citroen("Citroen");
echo $citroen->intro();
```

## Traits

Exemplo:

```php
trait message1 {
  public function msg1() {
    echo "OOP is fun! ";
  }
}

class Welcome {
  use message1;
}

$obj = new Welcome();
$obj->msg1();
```

Exemplo usando multiplas traits:

```php
trait message1 {
  public function msg1() {
    echo "OOP is fun! ";
  }
}

trait message2 {
  public function msg2() {
    echo "OOP reduces code duplication!";
  }
}

class Welcome {
  use message1;
}

class Welcome2 {
  use message1, message2;
}

$obj = new Welcome();
$obj->msg1();
echo "<br>";

$obj2 = new Welcome2();
$obj2->msg1();
$obj2->msg2();
```

## interfaces

Interfaces VS abstract class

- Interfaces não podem ter propriedades, enquanto classes abstratas podem;
- Todos os métodos de interface devem ser públicos, enquanto os métodos de classe abstrata 
são públicos ou protegidos;
- Todos os métodos em uma interface são abstratos, portanto não podem ser implementados no 
código e a palavra-chave abstract não é necessária;
- Classes podem implementar uma interface enquanto herdam de outra classe ao mesmo tempo;

```php
interface InterfaceName {
  public function someMethod1();
  public function someMethod2($name, $color);
  public function someMethod3() : string;
}
```

Exemplo mais complexo:

```php
interface Animal {
  public function makeSound();
}

// Class definitions
class Cat implements Animal {
  public function makeSound() {
    echo " Meow ";
  }
}

class Dog implements Animal {
  public function makeSound() {
    echo " Bark ";
  }
}

class Mouse implements Animal {
  public function makeSound() {
    echo " Squeak ";
  }
}

// Create a list of animals
$cat = new Cat();
$dog = new Dog();
$mouse = new Mouse();
$animals = array($cat, $dog, $mouse);

// Tell the animals to make a sound
foreach($animals as $animal) {
  $animal->makeSound();
}
```

## Métodos e propriedades estáticos

Os métodos estáaticos podem ser chamados diretamente da classe,
sem a necessidade de instanciar um objeto.

```php
class ClassName {
  public static function staticMethod() {
    echo "Hello World!";
  }
}
```

Use a seguinte sintaxe para chamar um método estático:

```php
ClassName::staticMethod();
```

Métodos estáticos podem ser chamados dentro da propria classe usando a 
palavra chave `self` e os dois pontos `::`.

```php
class greeting {
  public static function welcome() {
    echo "Hello World!";
  }

  public function __construct() {
    self::welcome();
  }
}

new greeting();
```