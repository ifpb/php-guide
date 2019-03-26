# Number

- [Integer](#integer)
- [Float](#float)
- [NaN](#nan)
- [INF](#inf)

## Integer

---

```php
// positive decimal number
$number = 255;
var_dump($number); //=> int(255)

// negative decimal number
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

The size of an integer:

```php
// 64-bit platforms usually have a maximum value of about 9E18
var_dump(PHP_INT_MAX);   //=> int(9223372036854775807): 2**63
var_dump(PHP_INT_MIN);   //=> int(-9223372036854775808)
```

Integer overflow:

```php
var_dump(PHP_INT_MAX);   //=> int(9223372036854775807)
var_dump(PHP_INT_MAX+1); //=> float(9.2233720368548E+18)
```

## Float

---

```php
$number = 1.234;
var_dump($number); //=> float(1.234)

$number = -1.2e3;
var_dump($number); //=> float(-1200)

$number = 1.21233312432534523e1;
var_dump($number); //=> float(12.123331243253)

$number = 7E-10;
var_dump($number); //=> float(7.0E-10)
```

### Converting to float

```php
var_dump((float)3); //=> float(3)
```

### IEEE 754 double precision format

```php
var_dump(0.3-0.2); //=> float(0.1)
```

```php
$x = 8 - 6.4;
var_dump($x); //=> float(1.6)

$y = 1.6;
var_dump($y); //=> float(1.6)

var_dump($x == $y); //=> bool(false)
```

## NaN

---

```php
$nan = acos(8);
var_dump($nan);         //=> float(NAN)
var_dump(is_nan($nan)); //=> bool(true)
```

## INF

---

```php
var_dump(10/0);
//=>
// PHP Warning:  Division by zero in php
// float(INF)
```
