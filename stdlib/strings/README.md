# [Strings](http://php.net/manual/en/book.strings.php)

- [explode()](#explode)
- [implode()](#implode)
- [strlen()](#strlen)

## explode()
---

```php
$name = "Alice, Bob";
$names = explode(", ", $names);
var_dump($names);
//=>
// array(2) {
//   [0]=>string(5) "Alice"
//   [1]=>string(3) "Bob"
// }
```

## implode()
---

```php
$names = ['Alice', 'Bob'];
$names = implode(', ', $names);
var_dump($names); //=> string(10) "Alice, Bob"
```

## strlen()
---

```php
var_dump(strlen('lorem')); //=> int(5)
```