# [Boolean](http://php.net/manual/en/language.types.boolean.php)

## true

---

```php
$variable = true;
var_dump($variable); //=> bool(true)

$variable = True;
var_dump($variable); //=> bool(true)

$variable = TRUE;
var_dump($variable); //=> bool(true)
```

## false

---

```php
$variable = false;
var_dump($variable); //=> bool(false)
```

> false = boolean(false), int(0), float(0.0), string(''), string('0'), array([]), NULL

```php
var_dump((bool)false);
var_dump((bool)0);
var_dump((bool)0.0);
var_dump((bool)'');
var_dump((bool)'0');
var_dump((bool)[]);
var_dump((bool)NULL);
```
