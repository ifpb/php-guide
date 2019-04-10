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

| Variable                                                                                          | Description                                                                 |
| ------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------- |
| [Superglobals](https://www.php.net/manual/en/language.variables.superglobals.php)                 | Superglobals are built-in variables that are always available in all scopes |
| [\$GLOBALS](https://www.php.net/manual/en/reserved.variables.globals.php)                         | References all variables available in global scope                          |
| [\$\_SERVER](https://www.php.net/manual/en/reserved.variables.server.php)                         | Server and execution environment information                                |
| [\$\_GET](https://www.php.net/manual/en/reserved.variables.get.php)                               | HTTP GET variables                                                          |
| [\$\_POST](https://www.php.net/manual/en/reserved.variables.post.php)                             | HTTP POST variables                                                         |
| [\$\_FILES](https://www.php.net/manual/en/reserved.variables.files.php)                           | HTTP File Upload variables                                                  |
| [\$\_REQUEST](https://www.php.net/manual/en/reserved.variables.request.php)                       | HTTP Request variables                                                      |
| [\$\_SESSION](https://www.php.net/manual/en/reserved.variables.session.php)                       | Session variables                                                           |
| [\$\_ENV](https://www.php.net/manual/en/reserved.variables.environment.php)                       | Environment variables                                                       |
| [\$\_COOKIE](https://www.php.net/manual/en/reserved.variables.cookies.php)                        | HTTP Cookies                                                                |
| [\$php_errormsg](https://www.php.net/manual/en/reserved.variables.phperrormsg.php)                | The previous error message                                                  |
| [\$HTTP_RAW_POST_DATA](https://www.php.net/manual/en/reserved.variables.httprawpostdata.php)      | Raw POST data                                                               |
| [\$http_response_header](https://www.php.net/manual/en/reserved.variables.httpresponseheader.php) | HTTP response headers                                                       |
| [\$argc](https://www.php.net/manual/en/reserved.variables.argc.php)                               | The number of arguments passed to script                                    |
| [\$argv](https://www.php.net/manual/en/reserved.variables.argv.php)                               | Array of arguments passed to script                                         |

<br>
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

// ...
// )

$x = 10;
print_r($GLOBALS);
//=>
// Array
// (
// [_GET] => Array
// ...
// [GLOBALS] => Array
// _RECURSION_
// [x] => 10
// )

````

## [Magic constants](http://php.net/manual/en/language.constants.predefined.php)

---

<!-- |              |                  |               |                   |                  |
| ------------ | ---------------- | ------------- | ----------------- | ---------------- |
| \_\_LINE\_\_ | \_\_DIR\_\_      | \_\_CLASS\_\_ | \_\_METHOD\_\_    | ClassName::class |
| \_\_FILE\_\_ | \_\_FUNCTION\_\_ | \_\_TRAIT\_\_ | \_\_NAMESPACE\_\_ |                  | -->

<table>
  <tbody>
    <tr>
      <td>__LINE__</td>
      <td>__DIR__</td>
      <td>__CLASS__</td>
      <td>__METHOD__</td>
      <td>ClassName::class</td>
    </tr>
    <tr>
      <td>__FILE__</td>
      <td>__FUNCTION__</td>
      <td>__TRAIT__</td>
      <td>__NAMESPACE__</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

<!-- http://i.imgur.com/YsbKHg1.gif -->
<br>
```php
print_r(__DIR__); //=> /current_folder
````

## [Predefined Constants](https://www.php.net/manual/en/reserved.constants.php)

---

<!-- |                     |                   |                      |                          |                     |
| ------------------- | ----------------- | -------------------- | ------------------------ | ------------------- |
| PHP_VERSION         | PHP_OS_FAMILY     | DEFAULT_INCLUDE_PATH | PHP_SYSCONFDIR           | E_CORE_WARNING      |
| PHP_MAJOR_VERSION   | PHP_SAPI          | PEAR_INSTALL_DIR     | PHP_LOCALSTATEDIR        | E_COMPILE_ERROR     |
| PHP_MINOR_VERSION   | PHP_EOL           | PEAR_EXTENSION_DIR   | PHP_CONFIG_FILE_PATH     | E_COMPILE_WARNING   |
| PHP_RELEASE_VERSION | PHP_INT_MAX       | PHP_EXTENSION_DIR    | PHP_CONFIG_FILE_SCAN_DIR | E_USER_ERROR        |
| PHP_VERSION_ID      | PHP_INT_MIN       | PHP_PREFIX           | PHP_SHLIB_SUFFIX         | E_USER_WARNING      |
| PHP_EXTRA_VERSION   | PHP_INT_SIZE      | PHP_BINDIR           | E_ERROR                  | E_USER_NOTICE       |
| PHP_ZTS             | PHP_FLOAT_DIG     | PHP_BINARY           | E_WARNING                | E_RECOVERABLE_ERROR |
| PHP_DEBUG           | PHP_FLOAT_EPSILON | PHP_MANDIR           | E_PARSE                  | E_DEPRECATED        |
| PHP_MAXPATHLEN      | PHP_FLOAT_MIN     | PHP_LIBDIR           | E_NOTICE                 | E_USER_DEPRECATED   |
| PHP_OS              | PHP_FLOAT_MAX     | PHP_DATADIR          | E_CORE_ERROR             | E_ALL               | -->

<table>
  <tbody>
    <tr>
      <td>PHP_VERSION</td>
      <td>PHP_OS_FAMILY</td>
      <td>DEFAULT_INCLUDE_PATH</td>
      <td>PHP_SYSCONFDIR</td>
      <td>E_CORE_WARNING</td>
    </tr>
    <tr>
      <td>PHP_MAJOR_VERSION</td>
      <td>PHP_SAPI</td>
      <td>PEAR_INSTALL_DIR</td>
      <td>PHP_LOCALSTATEDIR</td>
      <td>E_COMPILE_ERROR</td>
    </tr>
    <tr>
      <td>PHP_MINOR_VERSION</td>
      <td>PHP_EOL</td>
      <td>PEAR_EXTENSION_DIR</td>
      <td>PHP_CONFIG_FILE_PATH</td>
      <td>E_COMPILE_WARNING</td>
    </tr>
    <tr>
      <td>PHP_RELEASE_VERSION</td>
      <td>PHP_INT_MAX</td>
      <td>PHP_EXTENSION_DIR</td>
      <td>PHP_CONFIG_FILE_SCAN_DIR</td>
      <td>E_USER_ERROR</td>
    </tr>
    <tr>
      <td>PHP_VERSION_ID</td>
      <td>PHP_INT_MIN</td>
      <td>PHP_PREFIX</td>
      <td>PHP_SHLIB_SUFFIX</td>
      <td>E_USER_WARNING</td>
    </tr>
    <tr>
      <td>PHP_EXTRA_VERSION</td>
      <td>PHP_INT_SIZE</td>
      <td>PHP_BINDIR</td>
      <td>E_ERROR</td>
      <td>E_USER_NOTICE</td>
    </tr>
    <tr>
      <td>PHP_ZTS</td>
      <td>PHP_FLOAT_DIG</td>
      <td>PHP_BINARY</td>
      <td>E_WARNING</td>
      <td>E_RECOVERABLE_ERROR</td>
    </tr>
    <tr>
      <td>PHP_DEBUG</td>
      <td>PHP_FLOAT_EPSILON</td>
      <td>PHP_MANDIR</td>
      <td>E_PARSE</td>
      <td>E_DEPRECATED</td>
    </tr>
    <tr>
      <td>PHP_MAXPATHLEN</td>
      <td>PHP_FLOAT_MIN</td>
      <td>PHP_LIBDIR</td>
      <td>E_NOTICE</td>
      <td>E_USER_DEPRECATED</td>
    </tr>
    <tr>
      <td>PHP_OS</td>
      <td>PHP_FLOAT_MAX</td>
      <td>PHP_DATADIR</td>
      <td>E_CORE_ERROR</td>
      <td>E_ALL</td>
    </tr>
  </tbody>
</table>
