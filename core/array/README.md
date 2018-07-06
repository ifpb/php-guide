# Array

- [Create an Array](#create-an-array)
- [Accessing Array Elements](#accessing-array-elements)
- [String Index](#string-index)
- [Automatic Index](#automatic-index)
- [Nth Dimentions](#nth-dimentions)
- [Array Functions](#array-functions)
  

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
$variable = array(1, 2, 3);
var_dump($variable[0]); //=> int(1)
var_dump($variable[1]); //=> int(2)
var_dump($variable[2]); //=> int(3)
var_dump($variable[3]); //=> PHP Notice:  Undefined offset: 3
```

## String Index
---

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

## Automatic Index
---

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

## [Array Functions](http://php.net/manual/en/book.array.php)
---

### sizeof()

```php
$fruits = array("lemon", "orange", "banana", "apple");
var_dump(sizeof($fruits)); //=> int(4)
```

### sort()

```php
$fruits = array("lemon", "orange", "banana", "apple");
sort($fruits);
var_dump($fruits);
//=>
// array(4) {
//   [0]=> string(5) "apple"
//   [1]=> string(6) "banana"
//   [2]=> string(5) "lemon"
//   [3]=> string(6) "orange"
// }
```

<!-- TODO https://medium.com/@brenodouglas/conhecendo-um-pouco-das-fun%C3%A7%C3%B5es-de-array-filter-map-e-reduce-com-php-cd02f6d51857#.ea71a973t
// array_filter(), array_map(), array_reduce(), array_walk(), foreach
function selectAddress($address){
  return $address["address"];
}
print_r(array_map("selectAddress", $arrayAddress)); 
-->