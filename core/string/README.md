# [String](http://php.net/manual/en/language.types.string.php)

- [Single Quoted](#single-quoted)
- [Double Quoted](#double-quoted)
- [Heredoc Syntax](#heredoc-syntax)
- [Nowdoc Syntax](#nowdoc-syntax)

## Single Quoted

---

### Literal

```php
var_dump('l');           //=> string(1) "l"
var_dump('lorem ipsum'); //=> string(11) "lorem ipsum"
```

### String Multiline

```php
var_dump('lorem
ipsum');
//=>
// string(11) "lorem
// ipsum"
```

### Escape Sequences

```php
$variable = 'lorem\' ipsum';
var_dump($variable); //=> string(12) "lorem' ipsum"
```

```php
$variable = 'lorem \\\' ipsum';
var_dump($variable); //=> string(14) "lorem \' ipsum"
```

```php
$variable = 'lorem \n ipsum';
var_dump($variable); //=> string(14) "lorem \n ipsum"
echo $variable;      //=> lorem \n ipsum
```

## Double Quoted

---

### Literal

```php
var_dump("lorem ipsum"); //=> string(11) "lorem ipsum"
```

### Escape Sequences

```php
var_dump("lorem\nipsum");
//=>
// string(13) "lorem
// ipsum"
```

### Variable parsing

```php
$name = 'Alice';
var_dump('Hello $name'); //=> string(11) "Hello $name"
```

```php
$name = 'Alice';
var_dump("Hello $name"); //=> string(11) "Hello Alice"
```

```php
$name = 'Alice';
var_dump("Hello {$name}!"); //=> string(12) "Hello Alice!"
```

```php
$name = ['name' => 'Alice'];
var_dump("Hello {$name['name']}"); //=> string(11) "Hello Alice"
```

```php
$number = 10;
var_dump("result: {$number+1}"); //=> Parse error: syntax error, unexpected '+', expecting :: (T_PAAMAYIM_NEKUDOTAYIM)
```

## Heredoc Syntax

---

### Literal

```php
$variable = <<<EOD
lorem
ipsum
EOD;

var_dump($variable);
//=>
// string(11) "lorem
// ipsum"
```

### Escape Sequences

```php
$variable = "lorem
\tipsum";

var_dump($variable);
//=>
// string(12) "lorem
// 	ipsum"
```

```php
$name = 'Alice';

$variable = <<<EOD
Hello $name
EOD;
//=> PHP Parse error:  syntax error, unexpected '<<' (T_SL) in php
```

## Nowdoc Syntax

---

### Literal

```php

$variable = <<<'EOD'
Hello world!
EOD;

var_dump($variable); //=> string(12) "Hello world!"
```

### Escape Sequences

```php
$name = 'Alice';

$variable = <<<'EOD'
Hello $name
EOD;
//=> Parse error: syntax error, unexpected '<<' (T_SL) in php
```
