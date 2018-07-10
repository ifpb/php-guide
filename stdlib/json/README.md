# [JSON](http://php.net/manual/en/book.json.php)

- [json_decode()](#json_decode)
- [json_encode()](#json_encode)

## json_encode()
---

```php
$address = json_encode([
  "address" => "192.168.0.1",
  "mask" => "255.255.255.0"
]);

var_dump($address); 
//=> string(48) "{"address":"192.168.0.1","mask":"255.255.255.0"}"
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

$json = json_encode($addresses);
var_dump($json);
//=> string(99) "[{"address":"192.168.0.1","mask":"255.255.255.0"},{"address":"192.168.0.2","mask":"255.255.255.0"}]"
```

## json_decode()
---

### Decoding to Object
```php
$ip = json_decode('{
  "address": "192.168.0.1",
  "mask": "255.255.255.0"
}');

var_dump($ip);
//=>
// object(stdClass)#2 (2) {
//   ["address"]=> string(11) "192.168.0.1"
//   ["mask"]=>    string(13) "255.255.255.0"
// }

var_dump($ip->address); //=> string(11) "192.168.0.1"
```

```php
$ips = '[
  {"address":"192.168.0.1","mask":"255.255.255.0"},
  {"address":"192.168.0.2","mask":"255.255.255.0"}
]';

$ips = json_decode($ips);
var_dump($ips);
//=>
// array(2) {
//   [0]=> object(stdClass)#2 (2) {
//     ["address"]=> string(11) "192.168.0.1"
//     ["mask"]=>    string(13) "255.255.255.0"
//   }
//   [1]=> object(stdClass)#3 (2) {
//     ["address"]=> string(11) "192.168.0.2"
//     ["mask"]=>    string(13) "255.255.255.0"
//   }
// }

var_dump($ips[0]->address); //=> string(11) "192.168.0.1"
```

### Decoding to Array
```php
$ip = json_decode('{
  "address": "192.168.0.1",
  "mask": "255.255.255.0"
}', true);

var_dump($ip);
//=>
// array(2) {
//   ["address"]=> string(11) "192.168.0.1"
//   ["mask"]=>    string(13) "255.255.255.0"
// }

var_dump($ip['address']); //=> string(11) "192.168.0.1"
```

```php
$ips = '[
  {"address":"192.168.0.1","mask":"255.255.255.0"},
  {"address":"192.168.0.2","mask":"255.255.255.0"}
]';

$ips = json_decode($ips, true);
var_dump($ips);
//=>
// array(2) {
//   [0]=> array(2) {
//     ["address"]=> string(11) "192.168.0.1"
//     ["mask"]=>    string(13) "255.255.255.0"
//   }
//   [1]=> array(2) {
//     ["address"]=> string(11) "192.168.0.2"
//     ["mask"]=>    string(13) "255.255.255.0"
//   }
// }

var_dump($ips[0]['address']); //=> string(11) "192.168.0.1"
```