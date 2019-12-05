# Ping App DB

- [Code](#code)
- [Back-end side](#back-end-side)
- [Front-end side](#front-end-side)

## Code

---

```
php
├── .env
├── Dockerfile
├── api
│   ├── database
│   │   ├── config.php
│   │   ├── database.php
│   │   ├── schema.mwb
│   │   └── schema.sql
│   ├── install
│   │   └── index.php
│   ├── model
│   │   ├── host.php
│   │   ├── icmp.php
│   │   └── packet.php
│   ├── util
│   │   └── Ping.php
│   └── v1
│       └── index.php
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

> [.env](.env):

```
{% include_relative .env %}
```

## Back-end side

---

> [Ping API DB](../../web-api-db/php/)

```
php
├── Dockerfile
├── database
│   ├── config.php
│   ├── database.php
│   ├── schema.mwb
│   └── schema.sql
├── docker-compose.yml
├── install
│   └── index.php
├── model
│   ├── host.php
│   ├── icmp.php
│   └── packet.php
├── util
│   └── Ping.php
└── v1
    └── index.php
```

## Front-end side

---

```
public
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
