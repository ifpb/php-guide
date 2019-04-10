# Values & Types

- [Type hierarchy](#type-hierarchy)
- [Literal Types](#literal-types)
- [Type Casting](#type-casting)
- [PHP type comparison tables](#php-type-comparison-tables)

## Type hierarchy

---

![PHP’s type hierarchy](data-types.svg)

<!-- TODO http://exploringjs.com/impatient-js/ch_values.html#javascripts-type-hierarchy -->

## Literal Types

---

| Category | Types                                                                                      | Values                                                                                        |
| -------- | ------------------------------------------------------------------------------------------ | --------------------------------------------------------------------------------------------- |
| Special  | [Null](../null/) ([doc](http://php.net/manual/en/language.types.null.php))                 | `null`                                                                                        |
| Scalar   | [Boolean](../boolean/) ([doc](http://php.net/manual/en/language.types.boolean.php))        | `true`<br>`false`, `False`, `FALSE`                                                           |
| Scalar   | [Integer](../number/#integer) ([doc](http://php.net/manual/en/language.types.integer.php)) | `-15`<br>`15`, `0b1111`, `0o17`, `0xf`                                                        |
| Scalar   | [Float](../number/#float) ([doc](http://php.net/manual/en/language.types.float.php))       | `-1234.5`<br>`1234.5`, `1.2345e3`<br>`0.0012`, `1.2E-3`                                       |
| Scalar   | [String](../string/) ([doc](http://php.net/manual/en/language.types.string.php))           | `'Hello'`<br>`"Hello"`                                                                        |
| Compound | [Array](../array/) ([doc](http://php.net/manual/en/language.types.array.php))              | `[]`<br>`[1, 2, 3]`<br>`[1, '2', true]`<br>`['name' => 'Alice', 'email' => 'alice@ifpb.edu']` |
| Compound | [Object](../object/) ([doc](http://php.net/manual/en/language.types.object.php))           | `stdObject`<br>`PDO`                                                                          |

> Pseudo-types: mixed, number, callback, void

## Type Casting

---

- (int), (integer) - cast to integer
- (bool), (boolean) - cast to boolean
- (float), (double), (real) - cast to float
- (string) - cast to string
- (array) - cast to array
- (object) - cast to object
- (unset) - cast to NULL

```php
echo (int) 1.5;  //=> 1
echo (int) "";   //=> 0
echo (int) true; //=> 1
```

## [PHP type comparison tables](https://www.php.net/manual/en/types.comparisons.php)

---

| Expression              | gettype() | empty() | is_null() | isset() | boolean : if(\$x) |
| ----------------------- | --------- | ------- | --------- | ------- | ----------------- |
| `$x = "";`              | string    | TRUE    | FALSE     | TRUE    | FALSE             |
| `$x = null;`            | NULL      | TRUE    | TRUE      | FALSE   | FALSE             |
| `var $x;`               | NULL      | TRUE    | TRUE      | FALSE   | FALSE             |
| `$x is undefined`       | NULL      | TRUE    | TRUE      | FALSE   | FALSE             |
| `$x = array();`         | array     | TRUE    | FALSE     | TRUE    | FALSE             |
| `$x = array('a', 'b');` | array     | FALSE   | FALSE     | TRUE    | TRUE              |
| `$x = false;`           | boolean   | TRUE    | FALSE     | TRUE    | FALSE             |
| `$x = true;`            | boolean   | FALSE   | FALSE     | TRUE    | TRUE              |
| `$x = 1;`               | integer   | FALSE   | FALSE     | TRUE    | TRUE              |
| `$x = 42;`              | integer   | FALSE   | FALSE     | TRUE    | TRUE              |
| `$x = 0;`               | integer   | TRUE    | FALSE     | TRUE    | FALSE             |
| `$x = -1;`              | integer   | FALSE   | FALSE     | TRUE    | TRUE              |
| `$x = "1";`             | string    | FALSE   | FALSE     | TRUE    | TRUE              |
| `$x = "0";`             | string    | TRUE    | FALSE     | TRUE    | FALSE             |
| `$x = "-1";`            | string    | FALSE   | FALSE     | TRUE    | TRUE              |
| `$x = "php";`           | string    | FALSE   | FALSE     | TRUE    | TRUE              |
| `$x = "true";`          | string    | FALSE   | FALSE     | TRUE    | TRUE              |
| `$x = "false";`         | string    | FALSE   | FALSE     | TRUE    | TRUE              |
