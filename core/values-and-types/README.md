# Values & Types

## Type hierarchy
---

![PHP’s type hierarchy](data-types.svg)

<!-- TODO http://exploringjs.com/impatient-js/ch_values.html#javascripts-type-hierarchy -->

## Literal Types
---

| Category | Types | Values |
|-|-|-|
| Special | [Null](http://php.net/manual/en/language.types.null.php) | `null` |
| Scalar | [Boolean](http://php.net/manual/en/language.types.boolean.php) | `true`<br>`false`, `False`, `FALSE` |
| Scalar | [Integer](http://php.net/manual/en/language.types.integer.php) | `-15`<br>`15`, `0b1111`, `0o17`, `0xf` |
| Scalar | [Float](http://php.net/manual/en/language.types.float.php) | `-1234.5`<br>`1234.5`, `1.2345e3`<br>`0.0012`, `1.2E-3` |
| Scalar | [String](http://php.net/manual/en/language.types.string.php) | `'Hello'`<br>`"Hello"` |
| Compound | [Array](http://php.net/manual/en/language.types.array.php) | `[]`<br>`[1, 2, 3]`<br>`[1, '2', true]`<br>`[name => Alice, email => alice@ifpb.edu]` |
| Compound | [Object](http://php.net/manual/en/language.types.object.php) | `stdObject`<br>`PDO` |


> Pseudo-types: mixed, number, callback, void

## Type Casting
---

* (int), (integer) - cast to integer
* (bool), (boolean) - cast to boolean
* (float), (double), (real) - cast to float
* (string) - cast to string
* (array) - cast to array
* (object) - cast to object
* (unset) - cast to NULL

```php
echo (int) 1.5;  //=> 1
echo (int) "";   //=> 0
echo (int) true; //=> 1
```