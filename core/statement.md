# [Statement](http://php.net/manual/en/language.control-structures.php)

- [if, else, elseif/else if](#if, else, elseif/else if)
- [for](#for)
- [foreach](#foreach)
- [require, include, require_once, include_once](#require-include-require_once-include_once)

## if, else, elseif/else if
---

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

## for
---

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

## foreach
---

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

## require, include, require_once, include_once
---