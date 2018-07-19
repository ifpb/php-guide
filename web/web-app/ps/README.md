# PS App

```
ps
├── api
│   └── v1
│       └── ps.php
└── public
    ├── css
    │   └── master.css
    ├── index.html
    └── js
        └── main.js
```

## Back-end side
---

```
api
└── v1
    └── ps.php
```

[PS API](../..//web-api/codes/command/ps-api/)

## Front-end side
---

```
public
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