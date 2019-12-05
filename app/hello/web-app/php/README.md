# Hello App

- [Code](#code)
- [Back-end side](#back-end-side)
- [Front-end side](#front-end-side)

## Code

---

```
├── api
│   └── v1
│       └── index.php
├── docker-compose.yml
└── public
    ├── index.html
    └── js
        └── main.js
```

> [docker-compose.yml](docker-compose.yml):

```
{% include_relative docker-compose.yml %}
```

## Back-end side

---

> [Hello API](../../web-api/php/)

```
api
└── v1
    └── index.php
```

## Front-end side

---

```
└── public
    ├── index.html
    └── js
        └── main.js
```

> [public/index.html](public/index.html):

```html
{% include_relative public/index.html %}
```

> [public/js/main.js](public/js/main.js):

```js
{% include_relative public/js/main.js %}
```
