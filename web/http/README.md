# HTTP Methods

- [HTTP GET (\$\_GET)](#http-get-_get)
  - [Back-end](#back-end)
  - [Front-end](#front-end)
- [HTTP POST (\$\_POST)](#http-post-_post)
  - [Back-end](#back-end2)
  - [Front-end](#front-end2)
- [Simple Form](#simple-form)

## HTTP GET (\$\_GET)

---

### Back-end

[codes/get-hello/hello.php](codes/get-hello/hello.php):

```php
{% include_relative codes/get-hello/hello.php %}
```

```
$ curl 'http://localhost:8080/php/web/http/codes/get-hello/hello.php?name=Alice' \
  -H 'Connection: keep-alive' \
  -H 'Pragma: no-cache' \
  -H 'Cache-Control: no-cache' \
  -H 'Upgrade-Insecure-Requests: 1' \
  -H 'User-Agent: Mozilla/5.0 ... Chrome/67.0.3396.99 Safari/537.36' \
  -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8' \
  -H 'Accept-Encoding: gzip, deflate, br' \
  -H 'Accept-Language: en-US,en;q=0.9' \
  --compressed
```

```
┌───────────────────────────────────────────────────────────────────────────────────────────────┐
│ GET /php/web/http/codes/get-hello/hello.php?name=Alice HTTP/1.1                               │
│ Host: localhost:8080                                                                          │
│ Connection: keep-alive                                                                        │
│ Pragma: no-cache                                                                              │
│ Cache-Control: no-cache                                                                       │
│ Upgrade-Insecure-Requests: 1                                                                  │
│ User-Agent: Mozilla/5.0 ... Chrome/67.0.3396.99 Safari/537.36                                 │
│ Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8 │
│ Accept-Encoding: gzip, deflate, br                                                            │
│ Accept-Language: en-US,en;q=0.9                                                               │
├───────────────────────────────────────────────────────────────────────────────────────────────┤
└───────────────────────────────────────────────────────────────────────────────────────────────┘
```

### Front-end

> [http://localhost:8080/php/web/http/codes/get-hello/](http://localhost:8080/php/web/http/codes/get-hello/)

[codes/get-hello/index.html](codes/get-hello/index.html):

```html
{% include_relative codes/get-hello/index.html %}
```

### References

- [\$\_GET](http://php.net/manual/en/reserved.variables.get.php)
- [Predefined Variables](http://php.net/manual/en/reserved.variables.php)

## HTTP POST (\$\_POST)

---

### Back-end

[codes/post-hello/hello.php](codes/post-hello/hello.php):

```php
{% include_relative codes/post-hello/hello.php %}
```

```
$ curl 'http://localhost:8080/php/web/http/codes/post-hello/hello.php' \
  -H 'Connection: keep-alive' \
  -H 'Pragma: no-cache' \
  -H 'Cache-Control: no-cache' \
  -H 'Origin: http://localhost:8080' \
  -H 'Upgrade-Insecure-Requests: 1' \
  -H 'Content-Type: application/x-www-form-urlencoded' \
  -H 'User-Agent: Mozilla/5.0 ... Chrome/67.0.3396.99 Safari/537.36' \
  -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8' \
  -H 'Referer: http://localhost:8080/php/web/http/codes/post-hello/' \
  -H 'Accept-Encoding: gzip, deflate, br' \
  -H 'Accept-Language: en-US,en;q=0.9' \
  --data 'name=Alice' \
  --compressed
```

```
┌───────────────────────────────────────────────────────────────────────────────────────────────┐
│ POST /php/web/http/codes/post-hello/hello.php HTTP/1.1                                        │
│ Host: localhost:8080                                                                          │
│ Connection: keep-alive                                                                        │
│ Content-Length: 10                                                                            │
│ Pragma: no-cache                                                                              │
│ Cache-Control: no-cache                                                                       │
│ Origin: http://localhost:8080                                                                 │
│ Upgrade-Insecure-Requests: 1                                                                  │
│ Content-Type: application/x-www-form-urlencoded                                               │
│ User-Agent: Mozilla/5.0 ... Chrome/67.0.3396.99 Safari/537.36                                 │
│ Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8 │
│ Referer: http://localhost:8080/php/web/http/codes/post-hello/                                 │
│ Accept-Encoding: gzip, deflate, br                                                            │
│ Accept-Language: en-US,en;q=0.9                                                               │
├───────────────────────────────────────────────────────────────────────────────────────────────┤
│ name=Alice                                                                                    │
└───────────────────────────────────────────────────────────────────────────────────────────────┘
```

### Front-end

> [http://localhost:8080/php/web/http/codes/post-hello/](http://localhost:8080/php/web/http/codes/post-hello/)

[codes/post-hello/index.html](codes/post-hello/index.html):

```html
{% include_relative codes/post-hello/index.html %}
```

### References

- [\$\_POST](http://php.net/manual/en/reserved.variables.post.php)
- [Predefined Variables](http://php.net/manual/en/reserved.variables.php)

## Simple Form

---

[codes/simple-form/index.php](codes/simple-form/index.php):

```html
{% include_relative codes/simple-form/index.php %}
```

[codes/simple-form/review.php](codes/simple-form/review.php):

```html
{% include_relative codes/simple-form/review.php %}
```

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
