# Host Simple App (DB)

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

![](assets/layout.png)

## Back-end side
---

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

### [Host Simple API (DB)](../../web-api/codes/db/host/)

![](assets/schema.png)

[database/schema.sql](database/schema.sql):
```sql
{% include_relative database/schema.sql %}
```

### Install

[http://localhost:8080/php/web/web-api/codes/db/host/install/](http://localhost:8080/php/web/web-api/codes/db/host/install/):
```php
{% include_relative install/index.php %}
```

[database/config.php](database/config.php):
```php
{% include_relative database/config.php %}
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

[public/index.html](public/index.html):
```html
{% include_relative public/index.html %}
```

[public/css/master.css](public/css/master.css):
```css
{% include_relative public/css/master.css %}
```

[public/js/main.js](public/js/main.js):
```js
{% include_relative public/js/main.js %}
```
