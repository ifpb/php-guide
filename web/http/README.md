# HTTP Methods

- [$_GET](#_get)
  - [Hello - Server-side rendering](#hello---server-side-rendering)
  - [Hello - Client-side rendering](#hello---client-side-rendering)
- [$_POST](#_post)
  - [Hello Unshortened - Server-side rendering](#hello-unshortened)
  - [Hello Shortened - Server-side rendering](#hello-shortened)
  - [Hello - Client-side rendering](#hello---client-side-rendering2)
  
## $_GET
---

### Hello - Server-side rendering

[codes/get-hello/index.html](codes/get-hello/index.html):
```html
{% include_relative codes/get-hello/index.html %}
```

[codes/get-hello/hello.php](codes/get-hello/hello.php):
```php
{% include_relative codes/get-hello/hello.php %}
```

> [http://localhost:8080/php/web/http/codes/get-hello/](http://localhost:8080/php/web/http/codes/get-hello/)

### Hello - Client-side rendering

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

> [http://localhost:8080/php/web/http/codes/get-hello-fetch/public/](http://localhost:8080/php/web/http/codes/get-hello-fetch/public/)

**References:**
* [$_GET](http://php.net/manual/en/reserved.variables.get.php)
* [Predefined Variables](http://php.net/manual/en/reserved.variables.php)

## $_POST
---

### Hello Unshortened - Server-side rendering

[codes/post-hello/index.html](codes/post-hello/index.html):
```html
{% include_relative codes/post-hello/index.html %}
```

[codes/post-hello/hello.php](codes/post-hello/hello.php):
```php
{% include_relative codes/post-hello/hello.php %}
```

> [http://localhost:8080/php/web/http/codes/post-hello/](http://localhost:8080/php/web/http/codes/post-hello/)

### Hello Shortened - Server-side rendering

[codes/post-hello-compact/index.php](codes/post-hello-compact/index.php):
```php
{% include_relative codes/post-hello-compact/index.php %}
```

[http://localhost:8080/php/web/http/codes/post-hello-compact/](http://localhost:8080/php/web/http/codes/post-hello-compact/)

### Hello - Client-side rendering

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

> [http://localhost:8080/php/web/http/codes/post-hello-fetch/public/](http://localhost:8080/php/web/http/codes/post-hello-fetch/public/)

**References:** 
- [$_POST](http://php.net/manual/en/reserved.variables.post.php)
- [Predefined Variables](http://php.net/manual/en/reserved.variables.php)

<!-- 
TODO
## $_FILES 
---

### Upload file
-->

## References
---

- [Manual do php.net](http://php.net/manual/en/)
  - [Features](http://php.net/manual/en/features.php)
- [Using Fetch](https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch)