# Dynamic pages

- [Server-side rendering](#server-side-rendering)
  - [Layout](#layout)
  - [Hello Compact](#hello-compact)
- [Client-side rendering](#client-side-rendering)
  - [Hello GET](#hello-get)
  - [Hello POST](#hello-post)

## Server-side rendering
---

### Heroes page

[codes/heroes/heroes.json](codes/heroes/heroes.json):
```json
{% include_relative codes/heroes/heroes.json %}
```

[codes/heroes/index.php](codes/heroes/index.php):
```php
{% include_relative codes/heroes/index.php %}
```

### Hello Compact

[codes/post-hello-compact/index.php](codes/post-hello-compact/index.php):
```php
{% include_relative codes/post-hello-compact/index.php %}
```

> [http://localhost:8080/php/web/dynamic-pages/codes/post-hello-compact/](http://localhost:8080/php/web/dynamic-pages/codes/post-hello-compact/)

### Layout

```
layout
├── index.php
├── page1.php
└── page2.php
```

[codes/layout/index.php](codes/layout/index.php)
```php
{% include_relative codes/layout/index.php %}
```

[codes/layout/page1.php](codes/layout/page1.php)
```php
{% include_relative codes/layout/page1.php %}
```

[codes/layout/page2.php](codes/layout/page2.php)
```php
{% include_relative codes/layout/page2.php %}
```

## Client-side rendering
---

### Hello GET

[codes/get-hello-fetch/public/index.html](codes/get-hello-fetch/public/index.html):
```html
{% include_relative codes/get-hello-fetch/public/index.html %}
```

[codes/get-hello-fetch/public/js/main.js](codes/get-hello-fetch/public/js/main.js):
```js
{% include_relative codes/get-hello-fetch/public/js/main.js %}
```

[codes/get-hello-fetch/api/hello.php](codes/get-hello-fetch/api/hello.php):
```php
{% include_relative codes/get-hello-fetch/api/hello.php %}
```

> [http://localhost:8080/php/web/dynamic-pages/codes/get-hello-fetch/public/](http://localhost:8080/php/web/dynamic-pages/codes/get-hello-fetch/public/)

### Hello POST

[codes/post-hello-fetch/public/index.html](codes/post-hello-fetch/public/index.html):
```html
{% include_relative codes/post-hello-fetch/public/index.html %}
```

[codes/post-hello-fetch/public/js/main.js](codes/post-hello-fetch/public/js/main.js):
```js
{% include_relative codes/post-hello-fetch/public/js/main.js %}
```

[codes/post-hello-fetch/api/hello.php](codes/post-hello-fetch/api/hello.php):
```php
{% include_relative codes/post-hello-fetch/api/hello.php %}
```

> [http://localhost:8080/php/web/dynamic-pages/codes/post-hello-fetch/public/](http://localhost:8080/php/web/dynamic-pages/codes/post-hello-fetch/public/)
