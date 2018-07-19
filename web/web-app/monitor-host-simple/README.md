# Ping App

```
monitor-host-simple
├── api
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

## Back-end side
---

```
monitor-host-simple
└── api
    └── v1
        └── ping.php
```

[PS API](../..//web-api/codes/command/ping-api/)

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
