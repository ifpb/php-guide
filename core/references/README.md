# [References](http://php.net/manual/en/language.references.php)

- [Assignment - passing by value or passing by reference](#assignment-passing-by-value-or-passing-by-reference)
- [Statement - foreach](#statement---foreach)
- [Function - passing by reference](#function---passing-by-reference)

## Assignment - passing by value or passing by reference

---

### Scalar Types

```php
$name1 = "test";

// Passing by value
$name2 = $name1;
$name2 = "new test";

// Passing by reference
$name3 = &$name2;
$name3 = "final test";

print ("name1: $name1, name2: $name2, name3: $name3");
//=> name1: test, name2: final test, name3: final test
```

### Compound Types (Array)

```php
$person = ['name' => 'fulano', 'email' => 'fulano@email'];

// Passing by value
$person2 = $person;
$person2['name'] = 'sicrano';
echo $person['name']; //=> fulano

// Passing by reference
$person3 = &$person;
$person3['name'] = 'sicrano';
print_r($person);
echo $person['name']; //=> sicrano
```

### Compound Types (Object)

#### Passing by reference

```php
$myCar = new stdClass;
$myCar->engine = 'Nice Engine';
$myCar->numberOfDoors = 4;
$myCar->howFast = 150;
print_r($myCar);
//=>
// stdClass Object
// (
//  [engine] => Nice Engine
//  [numberOfDoors] => 4
//  [howFast] => 150
// )

$myCar2 = $myCar;
$myCar2->power = 110;
print_r($myCar);
//=>
// stdClass Object
// (
//  [engine] => Nice Engine
//  [numberOfDoors] => 4
//  [howFast] => 150
//  [power] => 110
// )
```

#### Passing by value (clone)

```php
class Car {
  public $engine;
  public $numberOfDoors;
  public $howFast;
}

$myCar = new Car();
$myCar->engine = 'Nice Engine';
print_r($myCar);
//=>
// Car Object
// (
//   [engine] => Nice Engine
//   [numberOfDoors] =>
//   [howFast] =>
// )

$myCar->numberOfDoors = 4;
$myCar->howFast = 150;
$myCar->power = 200;
print_r($myCar);
//=>
// Car Object
// (
//   [engine] => Nice Engine
//   [numberOfDoors] => 4
//   [howFast] => 150
//   [power] => 200
// )

$myCar2 = $myCar;
$myCar2->howFast = 300;
print_r($myCar);
//=>
// Car Object
// (
//   [engine] => Nice Engine
//   [numberOfDoors] => 4
//   [howFast] => 300
//   [power] => 200
// )

$myCar3 = clone $myCar;
$myCar3->howFast = 400;
print_r($myCar);
//=>
// Car Object
// (
//   [engine] => Nice Engine
//   [numberOfDoors] => 4
//   [howFast] => 300
//   [power] => 200
// )
```

## Statement - foreach

---

```php
foreach($names as $key=>$name){
  $name .= 'sufix';
}
print_r($names);
//=>
// Array
// (
//   [0] => fulano
//   [admin] => sicrano
//   [client] => beltrano
// )

foreach($names as $key=>&$name){
  $name .= 'sufix';
}
print_r($names);
//=>
// Array
// (
//   [0] => fulanosufix
//   [admin] => sicranosufix
//   [client] => beltranosufix
// )
```

## Function - passing by reference

---

```php
$num = 10;
function add($a) {
  return ++$a;
}
var_dump($num);         //=> int(10)
var_dump(add($num));    //=> int(11)
var_dump($num);         //=> int(10)
```

```php
$num = 10;
function addref(&$a) {
  return ++$a;
}
var_dump($num);         //=> int(10)
var_dump(addref($num)); //=> int(11)
var_dump($num);         //=> int(11)
```
