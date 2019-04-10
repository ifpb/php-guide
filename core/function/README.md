# Function

- [Definition](#definition)
- [Case insensitive](#case-insensitive)
- [Scope](#scope)
- [Override](#override)
- [Recursion](#recursion)
- [Default argument values](#default-argument-values)
- [Variable-length argument lists](#variable-length-argument-lists)
- [Scalar type declarations & typed param](#scalar-type-declarations--typed param)
- [Callback](#callback)

## Definition

---

```php
function soma($a, $b) {
  return $a+$b;
}

var_dump(soma(1));       //=> Fatal error: Uncaught ArgumentCountError: Too few arguments to function soma(), 1 passed
var_dump(soma(1, 2));    //=> int(3)
var_dump(soma(1, 2, 3)); //=> int(3)
```

## Case insensitive

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
  return "Hello $name"; //=> Notice: Undefined variable: name
}

var_dump(hello());      //=> string(6) "Hello "
```

### Global

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

## Recursion

---

```php
function factorial($n) {
  return $n == 0 ? 1 : $n * factorial($n - 1);
}

var_dump(factorial(4)); //=> int(24)
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

## References

- [List of Function Aliases](https://www.php.net/manual/en/aliases.php)
- [Function and Method listing](https://www.php.net/manual/en/indexes.functions.php)
- [Function References](https://www.php.net/manual/en/funcref.php)
