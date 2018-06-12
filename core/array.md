# Array

- [Definition](#definition)
- [json_decode()](#json_decode)
- [json_encode()](#json_encode)
- [explode(), implode()](#explode-implode)

## Definition
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

## json_decode()
---

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

## json_encode()
---

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

## explode(), implode()
---

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