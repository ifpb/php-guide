# Ping App

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
    ├── css
    │   └── master.css
    ├── img
    │   └── spinner.gif
    ├── index.html
    └── js
        └── main.js
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

> [Ping API](../../web-api/php/)

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
    ├── css
    │   └── master.css
    ├── img
    │   └── spinner.gif
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

> [public/js/master.css](public/css/master.css):

```css
{% include_relative public/css/master.css %}
```

> [public/img/spinner.gif](public/img/spinner.gif):

![](public/img/spinner.gif)
