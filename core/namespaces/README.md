# [Namespaces](https://www.php.net/manual/en/language.namespaces.php)

- [Defining namespaces](#defining-namespaces)
- [External namespace](#external-namespace)
- [Sub-namespaces](#sub-namespaces)
- [Multiple Namespaces](#multiple-namespaces)
- [Aliasing/Importing](#aliasingimporting)

## [Defining namespaces](https://www.php.net/manual/en/language.namespaces.rationale.php)

---

[arrayutil.php](code/basic-one-file/arrayutil.php)

```php
{% include_relative code/basic-one-file/arrayutil.php %}
```

Tips:

- Namespace must be the first statement in the script

## [External namespace](https://www.php.net/manual/en/language.namespaces.rules.php)

---

```
tree .
.
├── arrayutil.php
└── main.php

0 directories, 2 files
```

[arrayutil.php](code/basic-two-files/arrayutil.php):

```php
{% include_relative code/basic-two-files/arrayutil.php %}
```

[main.php](code/basic-two-files/main.php):

```php
{% include_relative code/basic-two-files/main.php %}
```

## [Sub-namespaces](https://www.php.net/manual/en/language.namespaces.nested.php)

---

```
$ tree arrayutil
arrayutil
├── arithmetic
│   └── arithmetic.php
├── main.php
└── stats
    └── stats.php

2 directories, 3 files
```

[arrayutil/arithmetic/arithmetic.php](code/sub-namespaces/arrayutil/arithmetic/arithmetic.php):

```php
{% include_relative code/sub-namespaces/arrayutil/arithmetic/arithmetic.php %}
```

[arrayutil/stats/stats.php](code/sub-namespaces/arrayutil/stats/stats.php):

```php
{% include_relative code/sub-namespaces/arrayutil/stats/stats.php %}
```

[arrayutil/main.php](code/sub-namespaces/arrayutil/main.php):

```php
{% include_relative code/sub-namespaces/arrayutil/main.php %}
```

## [Multiple Namespaces](https://www.php.net/manual/en/language.namespaces.definitionmultiple.php)

---

[arrayutil/main.php](code/sub-namespaces/arrayutil/main.php):

```php
{% include_relative code/sub-namespaces/arrayutil/main.php %}
```

## [Aliasing/Importing](https://www.php.net/manual/en/language.namespaces.importing.php)

---

[ArrayUtil.php](code/sub-namespaces/ArrayUtil.php):

```php
{% include_relative code/use/ArrayUtil.php %}
```

## References

- [Namespaces](https://www.php.net/manual/en/language.namespaces.php)
  - [Name resolution rules](https://www.php.net/manual/en/language.namespaces.rules.php)
  - [Using namespaces: Aliasing/Importing ](https://www.php.net/manual/en/language.namespaces.importing.php)
- [PHP The Right Way: Namescpaces](https://phptherightway.com/#namespaces)
