# Host Database App

- [Code](#code)
- [Install](#install)
- [Back-end side](#back-end-side)
- [Front-end side](#front-end-side)

## Code

---

```
host-simple-db
├── api
│   └── v1
│       └── index.php
├── database
│   ├── config.php
│   ├── database.php
│   ├── schema.mwb
│   └── schema.sql
├── install
│   └── index.php
├── model
│   └── host.php
└── public
    ├── css
    │   └── master.css
    ├── index.html
    └── js
        └── main.js
```

## Install

---

> [http://localhost:8080/install/](http://localhost:8080/install/):

```php
{% include_relative install/index.php %}
```

[database/config.php](database/config.php):

```php
{% include_relative database/config.php %}
```

## Back-end side

---

> [Code](../../web-api-db/php/)

```
host-simple-db
├── api
│   └── v1
│       └── index.php
├── database
│   ├── config.php
│   ├── database.php
│   └── schema.sql
├── install
│   └── index.php
└── model
    └── host.php
```

## Front-end side

---

```
host-simple-db
└── public
    ├── css
    │   └── master.css
    ├── index.html
    └── js
        └── main.js
```

> [public/index.html](public/index.html):

```html
{% include_relative public/index.html %}
```

> [public/css/master.css](public/css/master.css):

```css
{% include_relative public/css/master.css %}
```

> [public/js/main.js](public/js/main.js):

```js
{% include_relative public/js/main.js %}
```
