# [Statements](http://php.net/manual/en/language.control-structures.php)

- [Control flow](#control-flow)
  - [if, else, elseif/else if](#if-else-elseifelse-if)
  - [switch](#switch)
- [Iterations](#iterations)
  - [for](#for)
  - [foreach](#foreach)
  - [while](#while)
  - [do...while](#do...while)
- [Alternative syntax](#alternative-syntax)
- [require, include, require_once, include_once](#require-include-require_once-include_once)

## Control flow
---

### if, else, elseif/else if
```php
$number = 10;

if ($number > 0){
  print 'greater than zero';
} elseif ($number < 0) {
  print 'less than zero';
} else {
  print 'equal to zero';
}
//=> greater than zero
```

### switch
```php
$number1 = 10;
$number2 = 10;
$operator = '+'; // (+, -, *, /)
$result = 0;

switch ($operator) {
  case 'add':
  case '+':
    $result = $number1 + $number2;
    break;
  case '-':
    $result = $number1 - $number2;
    break;
  case '*':
    $result = $number1 * $number2;
    break;
  case '/':
    $result = $number1 / $number2;
    break;
  default:
    $result = 0;
}

var_dump($result); //=> int(20)
```

## Iterations
---

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
```

#### Reference (&)

```php
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

### while

```php
$result = '';

while (strlen($result) < 4) {
  $result .= 'x';
  print "$result\n";
}
//=>
// x
// xx
// xxx
// xxxx
```

### do...while

```php
$result = '';

do {
  $result .= 'x';
  print "$result\n";
} while(strlen($result) < 4);
//=>
// x
// xx
// xxx
// xxxx
```

## Alternative syntax
---

`endif;`, `endwhile;`, `endfor;`, `endforeach;`, or `endswitch;`:
```php
$number = 10;

if ($number > 0):
  print 'greater than zero';
elseif ($number < 0):
  print 'less than zero';
else:
  print 'equal to zero';
endif;
//=> greater than zero
```

## require, include, require_once, include_once
---