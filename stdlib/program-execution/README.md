# [Program execution](http://php.net/manual/en/book.exec.php)

- [shell_exec()](#shell_exec)
  - [Basic command](#basic-command)
    - [uname](#uname)
    - [contrab list](#contrab-list)
    - [contrab add](#contrab-add)
    - [ping](#ping)

## shell_exec()
---

### Running basic command

#### uname

[codes/uname.php](codes/uname.php):
```php
{% include_relative codes/uname.php %}
```

```
$ php -S localhost:8000 -t .
$ php -S localhost:8000 uname.php
# service apache2 start
$ curl -I http://localhost:8000/uname.php
```

```
Linux vagrant-ubuntu-trusty-64 3.13.0-108-generic #155-Ubuntu SMP Wed Jan 11 16:58:52 UTC 2017 x86_64 x86_64 x86_64 GNU/Linux
```

#### contrab list
[codes/contrab-list-tasks.php](codes/contrab-list-tasks.php):
```php
{% include_relative codes/contrab-list-tasks.php %}
```

```
$ curl -I codes/contrab-list-tasks.php
```

#### contrab add
[codes/contrab-add-task.php](codes/contrab-add-task.php):
```php
{% include_relative codes/contrab-add-task.php %}
```

```
$ curl -I codes/contrab-add-tasks.php
```

#### ping times

[codes/ping-times.php](codes/ping-times.php):
```php
{% include_relative codes/ping-times.php %}
```

```
$ curl -I codes/ping-times.php
```

#### ping output

[codes/ping.php](codes/ping.php):
```php
{% include_relative codes/ping.php %}
```

```
$ curl -I codes/ping.php?host=8.8.8.8
```



**Reference**
- [Other Services - Network - Network Functions](http://php.net/manual/en/ref.network.php): `header()`
- [Other Basic Extensions - JSON - JSON Functions](http://php.net/manual/en/ref.json.php): `json_encode()`, `json_decode()`
