# [Autoloading Classes](https://www.php.net/manual/en/language.oop5.autoload.php)

- [Autoload](#autoload)
- [SPL Autoload](#spl-autoload)
- [Autoload File](#autoload-file)
- [Composer](#composer)
  - [PSR-4](#psr-4)
  - [PSR-0](#psr-0)
  - [Classmap](#classmap)

## Autoload

```
tree .
.
├── ArrayUtil
│   └── ArrayUtil.php
├── Hello.php
└── index.php

1 directory, 3 files
```

[ArrayUtil/ArrayUtil.php](code/autoload/ArrayUtil/ArrayUtil.php)

```php
{% include_relative code/autoload/ArrayUtil/ArrayUtil.php %}
```

[Hello.php](code/autoload/Hello.php)

```php
{% include_relative code/autoload/Hello.php %}
```

[index.php](code/autoload/index.php)

```php
{% include_relative code/autoload/index.php %}
```

Tips:

- PHP can load class files automatically on demand (No explicit require statements are needed);
- The file name must match the case of the terminating class name (each class in a separate file);
- The directory name must match the case of the namespace names;
- `__autoload()` has been DEPRECATED as of PHP 7.2.0. Relying on this feature is highly discouraged.

REFERENCES

- [autoload](https://www.php.net/manual/en/function.autoload.php)

## SPL Autoload

```
tree .
.
├── ArrayUtil
│   └── ArrayUtil.php
├── Hello.php
└── index.php

1 directory, 3 files
```

[ArrayUtil/ArrayUtil.php](code/spl-autoload-hello/ArrayUtil/ArrayUtil.php)

```php
{% include_relative code/spl-autoload-hello/ArrayUtil/ArrayUtil.php %}
```

[Hello.php](code/spl-autoload-hello/Hello.php)

```php
{% include_relative code/spl-autoload-hello/Hello.php %}
```

[index.php](code/spl-autoload-hello/index.php)

```php
{% include_relative code/spl-autoload-hello/index.php %}
```

REFERENCES

- [SPL Functions](https://www.php.net/manual/en/ref.spl.php)
  - [spl_autoload_register](https://www.php.net/manual/en/function.spl-autoload-register.php)
  - [spl_autoload_extensions](https://www.php.net/manual/en/function.spl-autoload-extensions.php)
- [Fazendo autoload de classes no PHP](https://medium.com/weyes/fazendo-autoload-de-classes-no-php-c802623adeaf)

## Autoload File

```
tree . -I assets
.
├── ArrayUtil
│   ├── Arithmetic
│   │   └── Arithmetic.php
│   ├── ArrayUtil.php
│   └── Stats
│       └── Stats.php
├── autoload.php
└── index.php

3 directories, 5 files
```

<img src="code/spl-autoload-arrayutil/assets/ArrayUtil.svg" alt="ArrayUtil Object" width="450px">

[ArrayUtil/ArrayUtil.php](code/spl-autoload-arrayutil/ArrayUtil/ArrayUtil.php)

```php
{% include_relative code/spl-autoload-arrayutil/ArrayUtil/ArrayUtil.php %}
```

[autoload.php](code/spl-autoload-arrayutil/autoload.php)

```php
{% include_relative code/spl-autoload-arrayutil/autoload.php %}
```

[index.php](code/spl-autoload-arrayutil/index.php)

```php
{% include_relative code/spl-autoload-arrayutil/index.php %}
```

## Composer

### PSR-4

```
$ composer init
$ composer install
```

```
$ tree . -I 'vendor|assets'
.
├── ArrayUtil
│   ├── Arithmetic
│   │   └── Arithmetic.php
│   ├── ArrayUtil.php
│   └── Stats
│       └── Stats.php
├── composer.json
└── index.php

3 directories, 5 files
```

[composer.json](code/composer-psr-4/composer.json)

```php
{% include_relative code/composer-psr-4/composer.json %}
```

<img src="code/composer-psr-4/assets/ArrayUtil.svg" alt="ArrayUtil Object" width="450px">

[index.php](code/composer-psr-4/index.php)

```php
{% include_relative code/composer-psr-4/index.php %}
```

```
$ composer dump-autoload -o
```

REFERENCES

- [PSR4 Autoloading Your PHP Files Using Composer](https://thewebtier.com/php/psr4-autoloading-php-files-using-composer/)
- [Composer autoloading](https://getcomposer.org/doc/01-basic-usage.md#autoloading)
- [composer.json (autoload)](https://getcomposer.org/doc/04-schema.md#autoload)
- [PHP Composer: The Autoloader](https://medium.com/tech-tajawal/php-composer-the-autoloader-d676a2f103aa)

### PSR-0

```
$ tree . -I 'vendor|assets'
.
├── ArrayUtil
│   ├── Arithmetic
│   │   └── Arithmetic.php
│   ├── ArrayUtil.php
│   └── Stats
│       └── Stats.php
├── composer.json
└── index.php

3 directories, 5 files
```

[composer.json](code/composer-psr-0/composer.json)

```php
{% include_relative code/composer-psr-0/composer.json %}
```

### Classmap

```
$ tree . -I 'vendor|assets'
.
├── ArrayUtil
│   ├── Arithmetic
│   │   └── Arithmetic.php
│   ├── ArrayUtil.php
│   └── Stats
│       └── Stats.php
├── composer.json
└── index.php

3 directories, 5 files
```

[composer.json](code/composer-classmap/composer.json)

```php
{% include_relative code/composer-classmap/composer.json %}
```

## References

- [Autoloading Classes](https://www.php.net/manual/en/language.oop5.autoload.php)
- [PHP Standards Recommendations](https://www.php-fig.org/psr/)
  - [PSR-0: Autoloading Standard](https://www.php-fig.org/psr/psr-0/)
  - [PSR-4: Autoloader](https://www.php-fig.org/psr/psr-4/)
- [Usando namespace e autoload no PHP](https://www.youtube.com/watch?v=UeCVTTtRmGE)

<!-- TODO
[Simple PHP Class Autoloading Function and Tutorial](https://www.shayanderson.com/php/simple-php-class-autoloading-function-and-tutorial.htm)
[Autoloading in PHP and the PSR-0 Standard](https://www.sitepoint.com/autoloading-and-the-psr-0-standard/)
[Battle of the Autoloaders: PSR-0 vs. PSR-4](https://www.sitepoint.com/battle-autoloaders-psr-0-vs-psr-4/)
[Batalha dos Autoloaders: PSR-0 x PSR-4](https://rogerioadris.wordpress.com/2014/07/29/batalha-dos-autoloaders-psr-0-x-psr-4/)
[Difference between PSR-0 and PSR-4](https://medium.com/@udhavsarvaiya/difference-between-psr-0-and-psr-4-5cec7b0eb8d8)
[PHP-FIG e as PSR: Parte 4](https://davidlima.com.br/post/php-fig-e-as-psr-parte-4/)


[PHP Autoload PSR-4/PSR-0 com composer](http://www.douglaspasqua.com/2015/01/26/php-autoload-psr-4psr-0-com-composer/)
[Composer - Autoload e PSR-0 vs PSR-4](https://pt.stackoverflow.com/questions/19200/composer-autoload-e-psr-0-vs-psr-4)
-->
