# PHP Session

- [Cookie](#cookie)
  - [\$\_COOKIE](#_cookie)
- [Session](#session)
  - [\$\_SESSION](#_session)
  - [Auth](#auth)

## Cookie

---

### \$\_COOKIE

> [codes/cookie-counter/index.php](codes/cookie-counter/index.php):

```php
{% include_relative codes/cookie-counter/index.php %}
```

> [http://localhost:8080/php/web/session/codes/cookie-counter/index.php](http://localhost:8080/php/web/session/codes/cookie-counter/index.php)

**References:**

- [Cookie](http://php.net/manual/en/features.cookies.php): name, value, expire, path, domain, secure, httponly
- [\$\_COOKIE](http://php.net/manual/en/reserved.variables.cookies.php)
- [setcookie()](http://php.net/manual/en/function.setcookie.php)

## Session

---

### \$\_SESSION

> [codes/session-counter/index.php](codes/session-counter/index.php):

```php
{% include_relative codes/session-counter/index.php %}
```

> [http://localhost:8080/php/web/session/codes/session-counter/index.php](http://localhost:8080/php/web/session/codes/session-counter/index.php)

**References:**

- [\$\_SESSION](http://php.net/manual/en/reserved.variables.session.php)

### Auth

```
auth
├── auth.php
├── home.php
├── login.html
└── logout.php
```

> [codes/auth/login.html](codes/auth/login.html):

```html
{% include_relative codes/auth/login.html %}
```

> [codes/auth/auth.php](codes/auth/auth.php):

```php
{% include_relative codes/auth/auth.php %}
```

> [codes/auth/home.php](codes/auth/home.php):

```php
{% include_relative codes/auth/home.php %}
```

> [codes/auth/logout.php](codes/auth/logout.php):

```php
{% include_relative codes/auth/logout.php %}
```

> [http://localhost:8080/php/web/session/codes/auth/login.html](http://localhost:8080/php/web/session/codes/auth/login.html)
