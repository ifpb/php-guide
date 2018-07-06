# Function

- [Definition](#definition)
- [Scope](#scope)
- [Override](#override)
- [Default argument values](#default-argument-values)
- [Passing by reference](#passing-by-reference)
- [Variable-length argument lists](#variable-length-argument-lists)
- [Scalar type declarations & typed param](#scalar-type-declarations--typed param)
- [Callback](#callback)

## Definition
---
```php
function soma($a, $b) {
  return $a+$b;
}

var_dump(soma(1, 2)); //=> int(3)
var_dump(Soma(1, 2)); //=> int(3)
var_dump(SOMA(1, 2)); //=> int(3)
```

## Scope
---

```php
$name = 'fulano';

function hello() {
  global $name;
  return "Hello $name";
}

var_dump(hello()); //=> string(12) "Hello fulano"
```

## Override
---

```php
function soma($a, $b) {
  return $a + $b;
}

function soma($a, $b, $c) {
  return $a + $b;
}
//=> PHP Fatal error:  Cannot redeclare soma()
```

## Default argument values
---

```php
function soma($a, $b, $c=0) {
  return $a + $b + $c;
}

var_dump(soma(1, 2));    //=> int(3)
var_dump(soma(1, 2, 3)); //=> int(6)
```

## Passing by reference
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

## Variable-length argument lists
---

```php
function somation(...$values) {
  return array_sum($values);
}

var_dump(somation(1, 2));       //=> int(3)
var_dump(somation(1, 2, 3, 4)); //=> int(10)
```

## Scalar type declarations & typed param
---

```php
function somation(int ...$values):int {
  return array_sum($values);
}

var_dump(somation(1, 2));       //=> int(3)
var_dump(somation(1, 2, 3, 4)); //=> int(10)
var_dump(somation(1, 'a'));     
//=> PHP Warning:  Uncaught TypeError: Argument 2 passed to somation() must be of the type integer, string given, called in php
```

## Callback
---

```php
$helloWorld = function($name){
  return "Hello $name";
};

var_dump($helloWorld('fulano'));  //=> string(12) "Hello fulano"
```