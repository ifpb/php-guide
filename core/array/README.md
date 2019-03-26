# Array

- [Create an Array](#create-an-array)
- [Accessing Array Elements](#accessing-array-elements)
- [Changing Array](#changing-array)
- [Multiple Types](#multiple-types)
- [Automatic Index](#automatic-index)
- [String Index](#string-index)
- [Nth Dimentions](#nth-dimentions)
- [Interaction](#interaction)

## Create an Array

---

```php
$variable = array(1, 2, 3);
$variable = [1, 2, 3]; // php 5.4
print_r($variable);
//=>
// Array
// (
//   [0] => 1
//   [1] => 2
//   [2] => 3
// )
```

## Accessing Array Elements

---

```php
$variable = [1, 2, 3];
var_dump($variable[0]); //=> int(1)
var_dump($variable[1]); //=> int(2)
var_dump($variable[2]); //=> int(3)
var_dump($variable[3]); //=> PHP Notice:  Undefined offset: 3
```

## Changing Array

---

```php
$numbers = [1, 2, 4, 7];

// changing value
$numbers[2] = 5;

// loading element
$numbers[4] = 10;
var_dump($numbers);
//=>
// array(5) {
//   [0]=>int(1)
//   [1]=>int(2)
//   [2]=>int(5)
//   [3]=>int(7)
//   [4]=>int(10)
// }

// deleting element
unset($numbers[4]);
var_dump($numbers);
// array(5) {
//   [0]=>int(1)
//   [1]=>int(2)
//   [2]=>int(5)
//   [3]=>int(7)
// }
```

## Multiple Types

---

```php
$values = [1, 'Alice', true, NULL, [1, 2]];

var_dump($values[1]);    //=> string(5) "Alice"
var_dump($values[4]);    //=> array(2) {[0]=>int(1) [1]=>int(2) }
var_dump($values[4][1]); //=> int(2)
```

## Automatic Index

---

```php
var_dump([1, 2, 4 => 3, 4, 5]);
//=>
// array(5) {
//   [0] => 1
//   [1] => 2
//   [4] => 3
//   [5] => 4
//   [6] => 5
// }
```

## String Index

---

```php
$variable = [1, 'number' => 2, 3];
var_dump($variable);
//=>
// array(3) {
//   [0] => 1
//   [number] => 2
//   [1] => 3
// }

var_dump($variable[0]);        //=> int(1)
var_dump($variable['number']); //=> int(2)
var_dump($variable[1]);        //=> int(3)
```

## Nth Dimentions

---

```php
$variable = [
  [1, 2, 3],
  [4, 5, 6]
];
echo $variable[1][2]; //=> 6
```

```php
$addresses = [
  [
    "address" => "192.168.0.1",
    "mask" => "255.255.255.0"
  ],
  [
    "address" => "192.168.0.2",
    "mask" => "255.255.255.0"
  ]
];
echo $addresses[0]["address"]; //=> 192.168.0.1
```

## Interaction

---

```php
// for
$numbers = [1, 2, 4, 7];
$result = '';

for($flag = 0; $flag < sizeof($numbers); $flag++) {
  $result .= $numbers[$flag].' ';
}

var_dump($result);  //=> string(8) "1 2 4 7 "
```

```php
// foreach
$numbers = [1, 2, 4, 7];
$result = '';

foreach($numbers as $number) {
  $result .= $number.' ';
}

var_dump($result);  //=> string(8) "1 2 4 7 "
```

```php
// foreach
$numbers = [1, 2, 4, 7];
$result = '';

foreach($numbers as $index => $number) {
  $result .= "$index => $number\n";
}

var_dump($result);
//=>
// string(28) "0 => 1
// 1 => 2
// 2 => 4
// 3 => 7
// "
```
