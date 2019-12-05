# IPRoute2 App

- [Code](#code)
- [Back-end side](#back-end-side)
- [Front-end side](#front-end-side)

## Code

---

```
├── Dockerfile
├── api
│   └── v1
│       ├── index.php
│       └── util.php
├── docker-compose.yml
└── public
    ├── index.html
    ├── js
    │   ├── index.js
    │   └── link.js
    └── link.html
```

> [docker-compose.yml](docker-compose.yml):

```
{% include_relative docker-compose.yml %}
```

> [Dockerfile](Dockerfile):

```
{% include_relative Dockerfile %}
```

## Back-end side

---

> [IPRoute2 API](../../web-api/php/)

```
└── api
    └── v1
        ├── index.php
        └── util.php
```

## Front-end side

---

```
└── public
    ├── index.html
    ├── js
    │   ├── index.js
    │   └── link.js
    └── link.html
```

> [public/index.html](public/index.html):

```html
{% include_relative public/index.html %}
```

> [public/js/index.js](public/js/index.js):

```js
{% include_relative public/js/index.js %}
```

> [public/link.html](public/link.html):

```html
{% include_relative public/link.html %}
```

> [public/js/link.js](public/js/link.js):

```js
{% include_relative public/js/link.js %}
```
