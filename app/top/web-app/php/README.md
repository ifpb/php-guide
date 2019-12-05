# TOP App

- [Code](#code)
- [Back-end side](#back-end-side)
- [Front-end side](#front-end-side)

## Code

---

```
ps
├── api
│   └── v1
│       ├── index.php
│       └── util.php
├── docker-compose.yml
└── public
    ├── css
    │   ├── master.css
    │   └── theme.blue.min.css
    ├── index.html
    └── js
        ├── jquery.min.js
        ├── jquery.tablesorter.min.js
        └── main.js
```

> [docker-compose.yml](docker-compose.yml):

```
{% include_relative docker-compose.yml %}
```

## Back-end side

---

> [TOP API](../../web-api/php/)

```
api
└── v1
    ├── index.php
    └── util.php
```

## Front-end side

---

```
└── public
    ├── css
    │   ├── master.css
    │   └── theme.blue.min.css
    ├── index.html
    └── js
        ├── jquery.min.js
        ├── jquery.tablesorter.min.js
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

**Library JS**

- [jquery](https://jquery.com)
  - [cdnjs](https://cdnjs.com/libraries/jquery)
- [tablesorter](https://mottie.github.io/tablesorter/docs/)
  - [DEMO: Initializing tablesorter on an empty table](https://mottie.github.io/tablesorter/docs/example-empty-table.html)
  - [cdnjs](https://cdnjs.com/libraries/jquery.tablesorter/)
