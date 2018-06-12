# PHP

- [Variable](#variable)
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
- [Boolean](#boolean)
- [Number](#number)
  - [Integer](#integer)
  - [Float](#float)
  - [NaN](#nan)
  - [INF](#inf)
- [String](#string)
  - [Single Quoted](#single-quoted)
  - [Double Quoted](#double-quoted)
  - [Heredoc Syntax](#heredoc-syntax)
  - [Nowdoc Syntax](#nowdoc-syntax)
- [Array](#array)
  - [json_decode()](#json_decode)
  - [json_encode()](#json_encode)
  - [explode(), implode()](#explode-implode)
- [Operator](#operator)
  - [Arithmetic](#arithmetic)
  - [Comparison ](#comparison )
  - [concat](#concat)
  - [Execution Operators](#execution-operators)
- [Statement](#statement)
  - [if, else, elseif/else if](#if, else, elseif/else if)
  - [for](#for)
  - [foreach](#foreach)
  - [require, include, require_once, include_once](#require-include-require_once-include_once)
- [Function](#function)
  - [Scope](#scope)
  - [Override](#override)
  - [Default argument values](#default-argument-values)
  - [Passing by reference](#passing-by-reference)
  - [Scalar type declarations & typed param](#scalar-type-declarations--typed param)
  - [Callback](#callback)

## References
---
- [Manual do php.net](http://php.net/manual/en/)
  - [Language Reference](http://php.net/manual/en/langref.php)

## Variable
---
[Reference](http://php.net/manual/en/language.variables.php)

### Definition
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

### Pattern
`[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*`
```php
$Variable = 10;
echo $Variable;

$_variable = 10;
echo $_variable;

$1variable = 10; //=> PHP Parse error
```

### Dinamic Type
```php
$variable = 10;
echo $variable; //=> 10

$variable = 'fulano';
echo $variable; //=> fulano
```

### Case Sensitive
```php
$variable = 10;
$Variable = 'fulano';
echo $variable; //=> 10
echo $Variable; //=> fulano
```

### Constante
```php
define('VARIABLE', 10);
echo VARIABLE; //=> 10
```

### Variable Variables
```php
$param = 'name';
$$param = 'fulano';

echo $param;  //=> name
echo $$param; //=> fulano
echo $name;   //=> fulano
```

### Variable from array
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

### Passing value by value or reference
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

### Predefined Variables

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

## Boolean
---
```php
$variable = true;
var_dump($variable); //=> bool(true)

$variable = True;
var_dump($variable); //=> bool(true)

$variable = TRUE;
var_dump($variable); //=> bool(true)
```

```php
$variable = false;
var_dump($variable); //=> bool(false)
```

## Number
---

### Integer {..., -2, -1, 0, 1, 2, ...}
```php
// decimal number
$number = 255;
var_dump($number); //=> int(255)

// negative number
$number = -255; 
var_dump($number); //=> int(-255)

// octal number
$number = 0377; 
var_dump($number); //=> int(255)

// hexadecimal number
$number = 0xff; 
var_dump($number); //=> int(255)

// binary number
$number = 0b11111111; 
var_dump($number); //=> int(255)
```

```php
var_dump(pow(2,62)); //=> int(4611686018427387904)
var_dump(pow(2,63)); //=> float(9.2233720368548E+18)
```

### Float
```php
$number = 1.234;
var_dump($number); //=> float(1.234)

$number = 1.2e3;
var_dump($number); //=> float(1200)

$number = 1.21233312432534523e1;
var_dump($number); //=> float(12.123331243253)

$number = 7E-10;
var_dump($number); //=> float(7.0E-10)
```

```php
var_dump((float)3); //=> float(3)
```

```php
var_dump(0.3-0.2); //=> float(0.1)

$x = 8 - 6.4;
var_dump($x); //=> float(1.6)

$y = 1.6;
var_dump($y); //=> float(1.6)

var_dump($x == $y); //=> bool(false)
```

### NaN
```php
$nan = acos(8);
var_dump($nan);         //=> float(NAN)
var_dump(is_nan($nan)); //=> bool(true)
```

### INF
```php
var_dump(10/0);
//=>
// PHP Warning:  Division by zero in php
// float(INF)
```

## String
---

### Single Quoted
```php
$variable = 'lorem ipsum';
var_dump($variable);
```

```php
$variable = 'lorem
ipsum';
var_dump($variable);
//=>
// string(11) "lorem
// ipsum"
```

```php
$variable = 'lorem\' ipsum';
var_dump($variable); //=> string(12) "lorem' ipsum"
```

```php
$variable = 'lorem \\\' ipsum';
var_dump($variable); //=> string(14) "lorem \' ipsum"
```

```php
$variable = 'lorem \n ipsum';
var_dump($variable); //=> string(14) "lorem \n ipsum"
echo $variable;      //=> lorem \n ipsum
```

### Double Quoted
```php
$variable = "lorem ipsum";
var_dump($variable); //=> string(11) "lorem ipsum"
```

```php
$variable = "lorem \n ipsum";
var_dump($variable);
//=>
// string(13) "lorem 
//  ipsum"
echo $variable;
//=>
// lorem 
//  ipsum
```

```php
$name = 'fulano';
$hello = 'Hello $name';
var_dump($hello); //=> string(11) "Hello $name"

$hello = "Hello $name";
var_dump($hello); //=> string(12) "Hello fulano"

$hello = "Hello {$name}";
var_dump($hello); //=> string(12) "Hello fulano"

$name = ['name' => 'fulano'];
$hello = "Hello {$name['name']}";
var_dump($hello); //=> string(12) "Hello fulano"

$name = 'name';
var_dump("2 {$name}s"); //=> string(7) "2 names"
```

### Heredoc Syntax
```php
$variable = <<<EOD
lorem
ipsum
EOD;

var_dump($variable);
//=>
// string(11) "lorem
// ipsum"
```

```php
$variable = "lorem
\tipsum";

var_dump($variable);
//=>
// string(12) "lorem
// 	ipsum"
```

```php
$name = 'fulano';

$variable = <<<EOD 
Hello $name
EOD;
//=> PHP Parse error:  syntax error, unexpected '<<' (T_SL) in php
````

### Nowdoc Syntax
```php

$variable = <<<'EOD'
Hello world!
EOD;

var_dump($variable); //=> string(12) "Hello world!"
```

```php
$name = 'fulano';

$variable = <<<'EOD' 
Hello $name
EOD;
//=> Parse error: syntax error, unexpected '<<' (T_SL) in php
```

## Array
---
```php
$variable = array(1, 2, 3);
print_r($variable);
//=>
// Array
// (
//   [0] => 1
//   [1] => 2
//   [2] => 3
// )

var_dump($variable[0]); //=> int(1)
var_dump($variable[1]); //=> int(2)
var_dump($variable[2]); //=> int(3)
```

```php
// php 5.4
$variable = [1, 2, 3]; 
print_r($variable);
//=>
// Array
// (
//   [0] => 1
//   [1] => 2
//   [2] => 3
// )
```

```php
$variable = [1, 'number' => 2, 3];
print_r($variable);
//=>
// Array
// (
//   [0] => 1
//   [number] => 2
//   [1] => 3
// )
var_dump($variable[0]);        //=> int(1)
var_dump($variable['number']); //=> int(2)
var_dump($variable[1]);        //=> int(3)
```

```php
$variable = [1, 'number' => 2, 3, 4 => 4, 5];
print_r($variable);
//=>
// Array
// (
//   [0] => 1
//   [number] => 2
//   [1] => 3
//   [4] => 4
//   [5] => 5
// )

var_dump($variable[0]);        //=> int(1)
var_dump($variable['number']); //=> int(2)
var_dump($variable[1]);        //=> int(3)
var_dump($variable[4]);        //=> int(4)
var_dump($variable[5]);        //=> int(5)
var_dump($variable[3]);        
//=> 
// PHP Notice:  Undefined offset: 3 in php
// NULL
```

```php
$variable = [
  [1, 2, 3],
  [4, 5, 6]
];
var_dump($variable[1][2]); //=> int(6)

### json_decode()
```php
$variable = json_decode('{
  "address": "192.168.0.1",
  "mask": "255.255.255.0"
}');
var_dump($variable);
//=>
// object(stdClass)#2 (2) {
//   ["address"]=>
//   string(11) "192.168.0.1"
//   ["mask"]=>
//   string(13) "255.255.255.0"
// }

var_dump($variable->address); //=> string(11) "192.168.0.1"

$variable = json_decode('{
  "address": "192.168.0.1",
  "mask": "255.255.255.0"
}', true);

var_dump($variable);
//=>
// array(2) {
//   ["address"]=>
//   string(11) "192.168.0.1"
//   ["mask"]=>
//   string(13) "255.255.255.0"
// }

var_dump($variable['address']); //=> string(11) "192.168.0.1"
```

```php
$variable = '[
  {"address":"192.168.0.1","mask":"255.255.255.0"},
  {"address":"192.168.0.2","mask":"255.255.255.0"}
]';

$ips1 = json_decode($variable);
var_dump($ips1);
//=>
// array(2) {
//   [0]=>
//   object(stdClass)#2 (2) {
//     ["address"]=>
//     string(11) "192.168.0.1"
//     ["mask"]=>
//     string(13) "255.255.255.0"
//   }
//   [1]=>
//   object(stdClass)#3 (2) {
//     ["address"]=>
//     string(11) "192.168.0.2"
//     ["mask"]=>
//     string(13) "255.255.255.0"
//   }
// }

var_dump($ips1[0]->address); //=> string(11) "192.168.0.1"

$ips2 = json_decode($variable, true);
var_dump($ips2);
//=>
// array(2) {
//   [0]=>
//   array(2) {
//     ["address"]=>
//     string(11) "192.168.0.1"
//     ["mask"]=>
//     string(13) "255.255.255.0"
//   }
//   [1]=>
//   array(2) {
//     ["address"]=>
//     string(11) "192.168.0.2"
//     ["mask"]=>
//     string(13) "255.255.255.0"
//   }
// }

var_dump($ips2[0]['address']); //=> string(11) "192.168.0.1"
```

### json_encode()
```php
$variable = json_encode([
  "address" => "192.168.0.1",
  "mask" => "255.255.255.0"
]);

var_dump($variable); //=> string(48) "{"address":"192.168.0.1","mask":"255.255.255.0"}"
```

```php
$arrayAddress = [
  [
    "address" => "192.168.0.1",
    "mask" => "255.255.255.0"
  ],
  [
    "address" => "192.168.0.2",
    "mask" => "255.255.255.0"
  ]
];

$variable = json_encode($arrayAddress);
var_dump($variable);
//=> string(99) "[{"address":"192.168.0.1","mask":"255.255.255.0"},{"address":"192.168.0.2","mask":"255.255.255.0"}]"
```

### explode(), implode()
```php
$names = ['fulano', 'sicrano'];
var_dump(implode(', ', $names)); //=> string(15) "fulano, sicrano"

var_dump(explode(", ", "fulano, sicrano"));
//=>
// array(2) {
//   [0]=>
//   string(6) "fulano"
//   [1]=>
//   string(7) "sicrano"
// }
```

<!-- TODO https://medium.com/@brenodouglas/conhecendo-um-pouco-das-fun%C3%A7%C3%B5es-de-array-filter-map-e-reduce-com-php-cd02f6d51857#.ea71a973t
// array_filter(), array_map(), array_reduce(), array_walk(), foreach
function selectAddress($address){
  return $address["address"];
}
print_r(array_map("selectAddress", $arrayAddress)); -->

## Operator
---
[Reference](http://php.net/manual/en/language.operators.php)

### Arithmetic
```php
var_dump("1"+1);        //=> int(2)
var_dump(25/7);         //=> float(3.5714285714286)
var_dump((int) (25/7)); //=> int(3)
var_dump(round(25/7));  //=> float(4)
var_dump(2 ** 3);       //=> int(8)
```

### Comparison 
[Reference](http://php.net/manual/en/types.comparisons.php)
```php
var_dump("1 programador"+"1 computador" == "2 passos para o paraíso"); //=> bool(true)
var_dump("1 programador"+"1 computador" === (int)"2 passos paraíso"); //=> bool(true)
var_dump(1 <=> 0); //=> int(1)
var_dump(1 <=> 1); //=> int(0)
var_dump(0 <=> 1); //=> int(-1)
var_dump('fulano' <=> 'sicrano'); //=> int(-1)
var_dump('fulano' <=> 'Sicrano'); //=> int(1)

$a = (object) ["a" => "b"];
$b = (object) ["a" => "b"];
var_dump($a <=> $b); //=> int(0)
```

### concat
```php
var_dump("hello"." world"); //=> string(11) "hello world"
```

### Execution Operators
```php
var_dump(`pwd`);             //=> string(12) "/pasta_atual"
var_dump(shell_exec('pwd')); //=> string(12) "/pasta_atual"
var_dump(shell_exec('ping -c1 8.8.8.8'));
//=>
// string(249) "PING 8.8.8.8 (8.8.8.8): 56 data bytes
// 64 bytes from 8.8.8.8: icmp_seq=0 ttl=50 time=72.338 ms
// 
// --- 8.8.8.8 ping statistics ---
// 1 packets transmitted, 1 packets received, 0.0% packet loss
// round-trip min/avg/max/stddev = 72.338/72.338/72.338/0.000 ms
// "
```

## Statement
---
[Reference](http://php.net/manual/en/language.control-structures.php)

### if, else, elseif/else if

```php
$number = 10;

if($number == 10){
    print 'é 10';
} elseif($number == 20) {
  print 'é 20';
} else {
  print 'não é 10 nem 20';
}
//=> é 10

if($number == 10):
    print "é 10\n";
elseif($number == 20):
  print "é 20\n";
else:
  print "não é 10 nem 20\n";
endif;
//=> é 10
```

### for
```php
$names = ['Fulano', 'Sicrano', 'Betrano'];
for($index = 0; $index < sizeof($names); $index++){
  print($names[$index]."\n");
}
//=>
// Fulano
// Sicrano
// Betrano
```

### foreach

```php
foreach (range(0, 9) as $number) {
  echo $number;
}
//=> 0123456789
```

```php
$names = [
  0 => 'fulano',
  'admin' => 'sicrano',
  'client' => 'beltrano'
];

foreach($names as $name){
  print($name."\n");
}
//=>
// fulano
// sicrano
// beltrano

foreach($names as $key=>$name){
  print("$key => $name\n");
}
//=>
// 0 => fulano
// admin => sicrano
// client => beltrano

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

### require, include, require_once, include_once

## Function
---
```php
function soma($a, $b) {
  return $a+$b;
}

var_dump(soma(1, 2)); //=> int(3)
var_dump(Soma(1, 2)); //=> int(3)
var_dump(SOMA(1, 2)); //=> int(3)
```

### Scope
```php
$name = 'fulano';

function hello() {
  global $name;
  return "Hello $name";
}

var_dump(hello()); //=> string(12) "Hello fulano"
```

### Override
```php
function soma($a, $b) {
  return $a+$b;
}

function soma($a, $b, $c) {
  return $a+$b;
}
//=> PHP Fatal error:  Cannot redeclare soma()

var_dump(soma(1, 2, 3)); //=> int(3)
```

### Default argument values
```php
function soma($a, $b, $c=0) {
  return $a + $b + $c;
}

var_dump(soma(1, 2));    //=> int(3)
var_dump(soma(1, 2, 3)); //=> int(6)
```

### Passing by reference
```php
$num = 10;
function add($a) {
  return ++$a;
}
var_dump($num);         //=> int(10)
var_dump(add($num));    //=> int(11)
var_dump($num);         //=> int(10)

function addref(&$a) {
  return ++$a;
}
var_dump($num);         //=> int(10)
var_dump(addref($num)); //=> int(11)
var_dump($num);         //=> int(10)
```

### Scalar type declarations & typed param
```php
function somation(int ...$values):int {
  return array_sum($values);
}

var_dump(somation(1, 2));       //=> int(3)
var_dump(somation(1, 2, 3, 4)); //=> int(10)
var_dump(somation(1, 'a'));     
//=> PHP Warning:  Uncaught TypeError: Argument 2 passed to somation() must be of the type integer, string given, called in php
```

### Callback
```php
$helloWorld = function($name){
  return "Hello $name";
};

var_dump($helloWorld('fulano'));  //=> string(12) "Hello fulano"
```

<!-- 
TODO

## Object
---
Namespaces
Errors
Exceptions
phpunit

-->