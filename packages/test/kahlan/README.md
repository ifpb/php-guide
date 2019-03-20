# Kahlan

## Install dependencies

```
$ mkdir project
$ cd project
$ composer require kahlan/kahlan --dev
```

### Project

```
$ tree . -I vendor
.
├── composer.json
├── composer.lock
├── spec
│   └── sum.spec.php
└── src
    └── sum.php

2 directories, 4 files
```

[project/spec/sum.spec.php](project/spec/sum.spec.php):

```php
{% include_relative project/spec/sum.spec.php %}
```

### Running kahlan (fail)

[project/src/sum.php](project/src/sum.php):

```php
<?php

function sum($a, $b)
{
  return $a + $b;
}

```

Running Tests and Viewing Results (test fail):

```
$ php vendor/bin/kahlan --spec=spec/
            _     _
  /\ /\__ _| |__ | | __ _ _ __
 / //_/ _` | '_ \| |/ _` | '_ \
/ __ \ (_| | | | | | (_| | | | |
\/  \/\__,_|_| |_|_|\__,_|_| |_|

The PHP Test Framework for Freedom, Truth and Justice.

src directory  : /home/user/project/src
spec directory : /home/user/project/spec

FX                                                                  1 / 1 (100%)


  Excluded specification: 1
  ./spec/sum.spec.php, line 12

Number Tools
  ✖ it adding 1 + 2
    expect->toBe() failed in `./spec/sum.spec.php` line 7

    It expect actual to be identical to expected (===).

    actual:
      (NULL) null
    expected:
      (integer) 3


Expectations   : 1 Executed
Specifications : 0 Pending, 1 Excluded, 0 Skipped

Passed 0 of 1 FAIL (FAILURE: 1) in 0.018 seconds (using 1MB)

```

### Running kahlan (pass)

[project/src/sum.php](project/src/sum.php):

```php
{% include_relative project/src/sum.php %}
```

Running Tests and Viewing Results (test pass):

```
$ php vendor/bin/kahlan --spec=spec/
            _     _
  /\ /\__ _| |__ | | __ _ _ __
 / //_/ _` | '_ \| |/ _` | '_ \
/ __ \ (_| | | | | | (_| | | | |
\/  \/\__,_|_| |_|_|\__,_|_| |_|

The PHP Test Framework for Freedom, Truth and Justice.

src directory  : /home/user/project/src
spec directory : /home/user/project/spec

..                                                                  2 / 2 (100%)



Expectations   : 2 Executed
Specifications : 0 Pending, 0 Excluded, 0 Skipped

Passed 2 of 2 PASS in 0.016 seconds (using 1MB)

```

### Running kahlan (coverage)

Running Tests and Viewing Results [(Coverage Report)](https://kahlan.github.io/docs/pro-tips.html#use):

```
$ php vendor/bin/kahlan --spec=spec/ --coverage
            _     _
  /\ /\__ _| |__ | | __ _ _ __
 / //_/ _` | '_ \| |/ _` | '_ \
/ __ \ (_| | | | | | (_| | | | |
\/  \/\__,_|_| |_|_|\__,_|_| |_|

The PHP Test Framework for Freedom, Truth and Justice.

src directory  : /app/src
spec directory : /app/spec

..                                                                  2 / 2 (100%)



Expectations   : 2 Executed
Specifications : 0 Pending, 0 Excluded, 0 Skipped

Passed 2 of 2 PASS in 0.432 seconds (using 2MB)

Coverage Summary
----------------

Total: 100.00% (1/1)

Coverage collected in 0.149 seconds
```

<!--
--istanbul=<file>
$ npm install -g istanbul
$ php vendor/bin/kahlan --spec=spec/ --istanbul="coverage.json"
$ istanbul report
-->

<!--
--lcov=<file>
$ sudo apt-get install lcov
$ mkdir lcov
$ ./bin/kahlan --lcov="lcov/coverage.info"
$ cd lcov
$ genhtml coverage.info
-->
