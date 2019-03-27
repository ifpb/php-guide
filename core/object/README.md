# [Object](http://php.net/manual/en/language.oop5.php)

- [Property](#property)
- [Methods](#methods)
- [Visibility](#visibility)
- [Static keyword](#static-keyword)
- [Object Inheritance](#object-inheritance)
- [Abstract Class](#abstract-class)
- [Interface](#interface)
- [Traits](#traits)
- [Object Array Interaction](#object-array-interaction)

## [Property](http://php.net/manual/en/language.oop5.properties.php)

---

<img src="assets/object-post.svg" alt="Point Object" width="120">

```php
{% include_relative code/properties/Post.php %}
```

## [Methods](http://php.net/manual/en/language.oop5.basic.php#language.oop5.basic.properties-methods)

---

<img src="assets/object-post-tohtml.svg" alt="Point Object" width="300">

```php
{% include_relative code/methods/Post.php %}
```

## [Visibility](http://php.net/manual/en/language.oop5.visibility.php)

---

<!-- https://www.uml-diagrams.org/visibility.html -->

Visibility: `public (+)`, `protected (#)`, `private (-)`

<img src="assets/object-post-visibility.svg" alt="Point Object" width="300">

```php
{% include_relative code/visibility/Post.php %}
```

## [Static keyword](http://php.net/manual/en/language.oop5.static.php)

---

<img src="assets/object-point-static.svg" alt="Point Object" width="350">

Scope Resolution Operator (::) - a token that allows access to static, constant, and overridden properties or methods of a class.

```php
{% include_relative code/static/Point.php %}
```

## [Object Inheritance](http://php.net/manual/en/language.oop5.inheritance.php)

---

<img src="assets/object-person-student.svg" alt="Point Object" width="300">

```php
{% include_relative code/inheritance/Student.php %}
```

## [Abstract Class](https://www.php.net/manual/en/language.oop5.abstract.php)

---

<img src="assets/object-shape.svg" alt="Point Object" width="600">

```php
{% include_relative code/prototype/Shape.php %}
```

## [Interface](https://www.php.net/manual/en/language.oop5.interfaces.php)

---

<img src="assets/object-coffee.svg" alt="Coffee Object" width="600">

```php
{% include_relative code/decorator/Coffee.php %}
```

### [Traits](http://php.net/manual/en/language.oop5.traits.php)

---

<img src="assets/object-util-randomize-calculator.svg" alt="Util Object" width="800">

```php
{% include_relative code/traits/Util.php %}
```

## Object Array Interaction

---

<img src="assets/object-ip.svg" alt="IP Object" width="300">

```php
{% include_relative code/interaction/Address.php %}
```
