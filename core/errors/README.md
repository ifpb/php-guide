# [Errors in PHP](https://www.php.net/manual/en/language.errors.basics.php)

- [Error hierarchy](#error-hierarchy)
- [Throwing an error](#throwing-an-error)
- [Handling errors](#handling-errors)
- [Custom Error Types](#custom-error-types)

## Error hierarchy

---

- [Throwable](https://www.php.net/manual/en/class.throwable.php)
  - [Error](https://www.php.net/manual/en/class.error.php)
    - [ArithmeticError](https://www.php.net/manual/en/class.arithmeticerror.php)
      - [DivisionByZeroError](https://www.php.net/manual/en/class.divisionbyzeroerror.php)
    - [AssertionError](https://www.php.net/manual/en/class.assertionerror.php)
    - [CompileError](https://www.php.net/manual/en/class.compileerror.php)
      - [ParseError](https://www.php.net/manual/en/class.parseerror.php)
    - [TypeError](https://www.php.net/manual/en/class.typeerror.php)
      - [ArgumentCountError](https://www.php.net/manual/en/class.argumentcounterror.php)
  - [Exception](https://www.php.net/manual/en/class.exception.php)
    - [ErrorException](https://www.php.net/manual/en/class.errorexception.php)

## Throwing an error

---

```php
function summation(...$numbers) {
  return array_reduce($numbers, function($sum, $number) {
    if (is_numeric($number)) {
      return $sum + $number;
    } else {
      throw new Exception("Not as Number");
    }
  });
}

var_dump(summation(1, 2, 3)); //=> int(6)
var_dump(summation(1, 2, "a")); //=> Fatal error: Uncaught Exception: Not as Number
```

## Handling errors

---

```php
function summation(...$numbers) {
  return array_reduce($numbers, function($sum, $number) {
    if (is_numeric($number)) {
      return $sum + $number;
    } else {
      throw new Exception("Not as Number");
    }
  });
}

try {
  var_dump(summation(1, 2, 3)); //=> int(6)
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
  echo 'Finally'; //=> Finally
}

try {
  var_dump(summation(1, 2, 3)); //=> int(6)
  var_dump(summation(1, 2, "a"));
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n"; //=> Fatal error: Uncaught Exception: Not as Number
} finally {
  echo 'Finally'; //=> Finally
}
```

## Custom Error Types

---

```php
class NaNException extends Exception {
  public function __construct()
  {
    parent::__construct('Not as Number', 0, null);
  }
}

function summation(...$numbers) {
  return array_reduce($numbers, function($sum, $number) {
    if (is_numeric($number)) {
      return $sum + $number;
    } else {
      throw new NaNException();
    }
  });
}

try {
  var_dump(summation(1, 2, 3)); //=> int(6)
  var_dump(summation(1, 2, "a"));
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n"; //=> Fatal error: Uncaught Exception: Not as Number
} finally {
  echo 'Finally'; //=> Finally
}
```

## References

---

- [Basics](https://www.php.net/manual/en/language.errors.basics.php)
- [Error Handling - Predefined constants](https://www.php.net/manual/en/errorfunc.constants.php)
  - [Errors in PHP 7](https://www.php.net/manual/en/language.errors.php7.php)
- [Exceptions](https://www.php.net/manual/en/language.exceptions.php)
  - [Extending Exceptions](https://www.php.net/manual/en/language.exceptions.extending.php)
  - [Predefined Exceptions](https://www.php.net/manual/en/reserved.exceptions.php)
  - [SPL Exceptions](https://www.php.net/manual/en/spl.exceptions.php)
- [PHP Error Handling](https://www.w3schools.com/php/php_error.asp)
- [PHP Exception Handling](https://www.w3schools.com/php/php_exception.asp)
