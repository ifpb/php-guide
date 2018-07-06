# [Variable](http://php.net/manual/en/language.variables.php)

- [Definition](#definition)
- [Pattern](#pattern)
- [Dinamic Type](#dinamic-type)
- [Case Sensitive](#case-sensitive)
- [Constante](#constante)
- [Variable Variables](#variable-variables)
- [Variable from array](#variable-from-array)
- [Passing by value or Passing by reference](#passing-by-value-or-passing-by-reference)
- [Predefined Variables](#predefined-variables)
- [Magic constants](#magic-constants)

## Definition
---

### Scalar Types

```php
$variable;
$variable = 10;
var_dump($variable); //=> int(10)
print($variable);    //=> 10
echo($variable);     //=> 10
echo $variable;      //=> 10
```

### Compound Types

```php
$variable = [1, 2, 3];
var_dump($variable);
print_r($variable);
//=>
// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
// )

print($variable); //=> Notice: Array to string conversion in php
echo($variable);  //=> Notice: Array to string conversion in php
```

## Pattern
---

`[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*`
```php
$Variable = 10;
$_variable = 10;
$1variable = 10; //=> PHP Parse error
```

## Dinamic Type
---

```php
$variable = 10;
echo $variable; //=> 10

$variable = 'fulano';
echo $variable; //=> fulano
```

## Case Sensitive
---

```php
$variable = 10;
$Variable = 'fulano';

echo $variable; //=> 10
echo $Variable; //=> fulano
```

## Constant
---

```php
define('VARIABLE', 10);
echo VARIABLE; //=> 10
```

```php
const VARIABLE = 10;
echo VARIABLE; //=> 10
```

## Variable variables
---

```php
$param = 'name';
$$param = 'fulano';

echo $param;  //=> name
echo $$param; //=> fulano
echo $name;   //=> fulano
```

## Variable from array
---

```php
$params = ['name' => 'fulano', 'email' => 'fulano@email'];
print_r($params);
//=> 
// Array
// (
//     [name] => fulano
//     [email] => fulano@email
// )

$name = $params['name'];
$email = $params['email'];
echo $name;  //=> fulano  
echo $email; //=> fulano@email
```

### Valid extract

```php
$params = ['name' => 'fulano', 'email' => 'fulano@email'];
extract($params);
print_r(get_defined_vars());
//=>
// Array
// (
//   ...
//   [name] => fulano
//   [email] => fulano@email
//   ...
// )
echo $name;  //=> fulano  
echo $email; //=> fulano@email
```

### Invalid extract

```php
$params = ['10' => 'fulano', '20' => 'fulano@email'];
extract($params);
print_r(get_defined_vars());
//=>
// Array
// (
//   ...
// )
echo $10; //=> PHP Parse error:  syntax error, unexpected '10' (T_LNUMBER), expecting variable (T_VARIABLE) or '{' or '$' in php
```

## Passing by value or Passing by reference
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

## [Predefined Variables](http://php.net/manual/en/reserved.variables.php)
---

```php
print_r($GLOBALS);
//=>
// Array
// (
//     [_GET] => Array
//         (
//         )
//     [_POST] => Array
//         (
//         )
//     [_COOKIE] => Array
//         (
//         )
//     [_FILES] => Array
//         (
//         )
//     [argv] => Array
//         (
//             [0] => -
//         )
//     [argc] => 1
//     [_SERVER] => Array
//         (
//             ...
//             [PHP_SELF] => -
//             [SCRIPT_NAME] => -
//             [SCRIPT_FILENAME] => 
//             [PATH_TRANSLATED] => 
//             [DOCUMENT_ROOT] => 
//             [REQUEST_TIME_FLOAT] => 1516707393.7673
//             [REQUEST_TIME] => 1516707393
//             [argv] => Array
//                 (
//                     [0] => -
//                 )
// 
//             [argc] => 1
//         )
//     [GLOBALS] => Array
//  *RECURSION*
// )

$x = 10;
print_r($GLOBALS);
//=>
// Array
// (
//     [_GET] => Array
//     ...
//     [GLOBALS] => Array
//  *RECURSION*
//     [x] => 10
// )
````

## [Magic constants](http://php.net/manual/en/language.constants.predefined.php)
---

<!-- http://i.imgur.com/YsbKHg1.gif-->
```php
print_r(__DIR__); //=> /pasta_que_vc_esta
```