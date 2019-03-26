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
- [Includes](#includes)
  - [require](#require)
  - [include](#include)
  - [require_once](#require_once)
  - [include_once](#include_once)

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
$names = ['Alice', 'Bob', 'Charlie'];

for($index = 0; $index < sizeof($names); $index++){
  print($names[$index]."\n");
}
//=>
// Alice
// Bob
// Charlie
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
  0 => 'Alice',
  'admin' => 'Bob',
  'client' => 'Charlie'
];

foreach($names as $name){
  print($name."\n");
}
//=>
// Alice
// Bob
// Charlie

foreach($names as $key=>$name){
  print("$key => $name\n");
}
//=>
// 0 => Alice
// admin => Bob
// client => Charlie
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

## Includes

---

### [require()](http://php.net/manual/en/function.require.php)

#### Example 1

```
require
├── test.php
└── util.php
```

[codes/require/util.php](codes/require/util.php):

```php
{% include_relative codes/require/util.php %}
```

[codes/require/test.php](codes/require/test.php):

```php
{% include_relative codes/require/test.php %}
```

#### Example 2

```
require-path-child
├── lib
│   └── util.php
└── test.php
```

[codes/require-path-child/lib/util.php](codes/require-path-child/lib/util.php):

```php
{% include_relative codes/require-path-child/lib/util.php %}
```

[codes/require-path-child/test.php](codes/require-path-child/test.php):

```php
{% include_relative codes/require-path-child/test.php %}
```

#### Example 3

```
require-path-parent
├── lib
│   └── util.php
└── src
    └── test.php
```

[codes/require-path-parent/lib/util.php](codes/require-path-parent/lib/util.php):

```php
{% include_relative codes/require-path-parent/lib/util.php %}
```

[codes/require-path-parent/src/test.php](codes/require-path-parent/src/test.php):

```php
{% include_relative codes/require-path-parent/src/test.php %}
```

### [include()](http://php.net/manual/en/function.include.php)

```
include
├── test.php
└── util.php
```

[codes/include/test.php](codes/include/test.php):

```php
{% include_relative codes/include/test.php %}
```

[codes/include/util.php](codes/include/util.php):

```php
{% include_relative codes/include/util.php %}
```

### [require_once()](http://php.net/manual/en/function.require_once.php)

#### Error

```
require-error
├── lib
│   ├── math.php
│   └── util.php
└── test.php
```

[codes/require-error/lib/math.php](codes/require-error/lib/math.php):

```php
{% include_relative codes/require-error/lib/math.php %}
```

[codes/require-error/lib/util.php](codes/require-error/lib/util.php):

```php
{% include_relative codes/require-error/lib/util.php %}
```

[codes/require-error/test.php](codes/require-error/test.php):

```php
{% include_relative codes/require-error/test.php %}
```

#### Valid

```
require_once
├── lib
│   ├── math.php
│   └── util.php
└── test.php
```

[codes/require_once/lib/math.php](codes/require_once/lib/math.php):

```php
{% include_relative codes/require_once/lib/math.php %}
```

[codes/require_once/lib/util.php](codes/require_once/lib/util.php):

```php
{% include_relative codes/require_once/lib/util.php %}
```

[codes/require_once/test.php](codes/require_once/test.php):

```php
{% include_relative codes/require_once/test.php %}
```

### [include_once()](http://php.net/manual/en/function.include_once.php)

```
include_once
├── lib
│   ├── math.php
│   └── util.php
└── test.php
```

[codes/include_once/lib/math.php](codes/include_once/lib/math.php):

```php
{% include_relative codes/include_once/lib/math.php %}
```

[codes/include_once/lib/util.php](codes/include_once/lib/util.php):

```php
{% include_relative codes/include_once/lib/util.php %}
```

[codes/include_once/test.php](codes/include_once/test.php):

```php
{% include_relative codes/include_once/test.php %}
```
