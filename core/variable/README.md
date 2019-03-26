# [Variable](http://php.net/manual/en/language.variables.php)

- [Definition](#definition)
- [Pattern](#pattern)
- [Dinamic Type](#dinamic-type)
- [Case Sensitive](#case-sensitive)
- [Constante](#constante)
- [Variable Variables](#variable-variables)
- [Variable from array](#variable-from-array)
- [Predefined Variables](#predefined-variables)
- [Magic constants](#magic-constants)

## Definition

---

```php
$variable;
$variable = 10;
```

## Output

---

### Scalar Types

```php
$variable = 10;

var_dump($variable); //=> int(10)
print($variable);    //=> 10
echo($variable);     //=> 10
echo $variable;      //=> 10
```

### Compound Types

```php
$variable = [1, 2, 3];

var_dump($variable);
print_r($variable);
//=>
// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
// )

print($variable); //=> Notice: Array to string conversion in php
echo($variable);  //=> Notice: Array to string conversion in php
```

## Pattern

---

`[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*`

```php
$variable;
$Variable;
$_variable;
$1variable;  //=> Parse error: syntax error, unexpected '1' (T_LNUMBER), expecting variable (T_VARIABLE)
$%variable;  //=> Parse error: syntax error, unexpected '%', expecting variable (T_VARIABLE)
$function;
$class;
```

## Dinamic Type

---

```php
$variable = 10;
echo $variable; //=> 10

$variable = 'fulano';
echo $variable; //=> fulano
```

## Case Sensitive

---

```php
$variable = 10;
$Variable = 'fulano';

echo $variable; //=> 10
echo $Variable; //=> fulano
```

## Constant

---

```php
define('VARIABLE', 10);
echo VARIABLE; //=> 10
```

```php
const VARIABLE = 10;
echo VARIABLE; //=> 10
```

## Variable variables

---

```php
$param = 'name';
$$param = 'fulano';

echo $param;  //=> name
echo $$param; //=> fulano
echo $name;   //=> fulano
```

## Variable from array

---

```php
$params = ['name' => 'fulano', 'email' => 'fulano@email'];
print_r($params);
//=>
// Array
// (
//     [name] => fulano
//     [email] => fulano@email
// )

echo $params['name'];  //=> fulano
echo $params['email']; //=> fulano@email
```

### Valid extract

```php
$params = ['name' => 'fulano', 'email' => 'fulano@email'];
extract($params);
print_r(get_defined_vars());
//=>
// Array
// (
//   ...
//   [name] => fulano
//   [email] => fulano@email
//   ...
// )
echo $name;  //=> fulano
echo $email; //=> fulano@email
```

### Invalid extract

```php
$params = ['10' => 'fulano', '20' => 'fulano@email'];
extract($params);
print_r(get_defined_vars());
//=>
// Array
// (
//   ...
// )
echo $10; //=> PHP Parse error:  syntax error, unexpected '10' (T_LNUMBER), expecting variable (T_VARIABLE) or '{' or '$' in php
```

## [Predefined Variables](http://php.net/manual/en/reserved.variables.php)

---

```php
print_r($GLOBALS);
//=>
// Array
// (
//     [_GET] => Array
//         (
//         )
//     [_POST] => Array
//         (
//         )
//     [_COOKIE] => Array
//         (
//         )
//     [_FILES] => Array
//         (
//         )
//     [argv] => Array
//         (
//             [0] => -
//         )
//     [argc] => 1
//     [_SERVER] => Array
//         (
//             ...
//             [PHP_SELF] => -
//             [SCRIPT_NAME] => -
//             [SCRIPT_FILENAME] =>
//             [PATH_TRANSLATED] =>
//             [DOCUMENT_ROOT] =>
//             [REQUEST_TIME_FLOAT] => 1516707393.7673
//             [REQUEST_TIME] => 1516707393
//             [argv] => Array
//                 (
//                     [0] => -
//                 )
//
//             [argc] => 1
//         )
//     [GLOBALS] => Array
//  *RECURSION*
// )

$x = 10;
print_r($GLOBALS);
//=>
// Array
// (
//     [_GET] => Array
//     ...
//     [GLOBALS] => Array
//  *RECURSION*
//     [x] => 10
// )
```

## [Magic constants](http://php.net/manual/en/language.constants.predefined.php)

---

<!-- http://i.imgur.com/YsbKHg1.gif-->

```php
print_r(__DIR__); //=> /current_folder
```
