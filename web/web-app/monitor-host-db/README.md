# Host Monitor DB

```
monitor-host-db
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
│       └── ping.php
└── public
    ├── css
    │   └── master.css
    ├── img
    │   └── spinner.gif
    ├── index.html
    └── js
        └── main.js
```

![](assets/layout.png)

## Back-end side
---

```
monitor-host-simple
└── api
    ├── database
    │   ├── config.php
    │   ├── database.php
    │   ├── schema.mwb
    │   └── schema.sql
    ├── install
    │   └── index.php
    ├── model
    │   ├── host.php
    │   ├── icmp.php
    │   └── packet.php
    ├── util
    │   └── Ping.php
    └── v1
        └── ping.php
```

### API

[Ping API](../../web-api/codes/command/ping-api/)

### Database

[http://localhost:8080/php/web/web-app/monitor-host-db/api/install/](http://localhost:8080/php/web/web-app/monitor-host-db/api/install/)

![](assets/schema.png)

[Ping Model](../../../stdlib/pdo/codes/ping/)

## Front-end side
---

```
monitor-host-simple
└── public
    ├── css
    │   └── master.css
    ├── img
    │   └── spinner.gif
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
