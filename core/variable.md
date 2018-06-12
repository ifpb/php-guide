# [Variable](http://php.net/manual/en/language.variables.php)

- [Definition](#definition)
- [Pattern](#pattern)
- [Dinamic Type](#dinamic-type)
- [Case Sensitive](#case-sensitive)
- [Constante](#constante)
- [Variable Variables](#variable-variables)
- [Variable from array](#variable-from-array)
- [Passing value by value or reference](#passing-value-by-value-or-reference)
- [Predefined Variables](#predefined-variables)
- [Magic constants](#magic-constants)

## Definition
---

```php
$variable;
$variable = 10;
var_dump($variable); //=> int(10)
print($variable);    //=> 10
echo($variable);     //=> 10
echo $variable;      //=> 10
```

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
echo $Variable;

$_variable = 10;
echo $_variable;

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

## Constante
---

```php
define('VARIABLE', 10);
echo VARIABLE; //=> 10
```

## Variable Variables
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

## Passing value by value or reference
---

```php
$var1 = "test";

$var2 = $var1;
$var2 = "new test";

$var3 = &$var2;
$var3 = "final test";

print ("var1: $var1, var2: $var2, var3: $var3"); 
//=> var1: test, var2: final test, var3: final test
````

```php
 //=>
//Array
//(
//  [name] => fulano
//  [email] => fulano@email
//)

$params2 = $params;
$params2['name'] = 'sicrano';
print_r($params);
//=>
//Array
//(
//  [name] => fulano
//  [email] => fulano@email
//)

$params3 = &$params;
$params3['name'] = 'sicrano';
print_r($params);
//=>
//Array
//(
//  [name] => sicrano
//  [email] => fulano@email
//)
```

```php
$myCar = new stdClass;
print_r($myCar);
//=>
// stdClass Object
// (
// )

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

## Predefined Variables
---

[Reference](http://php.net/manual/en/reserved.variables.php)

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

### Magic constants

[Reference](http://php.net/manual/en/language.constants.predefined.php) <!-- http://i.imgur.com/YsbKHg1.gif-->
```php
print_r(__DIR__); //=> /pasta_que_vc_esta
```