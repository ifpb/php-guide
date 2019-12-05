# [Program execution](http://php.net/manual/en/book.exec.php)

- [Basic command](#basic-command)
  - [uname](#uname)
  - [crontab list](#crontab-list)
  - [crontab add](#crontab-add)
  - [ping times](#ping-times)
  - [ping output](#ping-output)

## Running basic command

---

### uname

> [codes/uname.php](codes/uname.php):

```php
{% include_relative codes/uname.php %}
```

> [http://localhost:8080/program-execution/codes/uname.php](http://localhost:8080/program-execution/codes/uname.php):

```
$ curl -i http://localhost:8080/program-execution/codes/uname.php
HTTP/1.1 200 OK
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/7.3.12
Vary: Accept-Encoding
Content-Length: 88
Content-Type: text/html; charset=UTF-8

Linux 1bebf23dc289 4.9.184-linuxkit #1 SMP Tue Jul 2 22:58:16 UTC 2019 x86_64 GNU/Linux
```

### crontab list

> [codes/crontab-list-tasks.php](codes/crontab-list-tasks.php):

```php
{% include_relative codes/crontab-list-tasks.php %}
```

> [http://localhost:8080/program-execution/codes/crontab-list-tasks.php](http://localhost:8080/program-execution/codes/crontab-list-tasks.php):

```
$ curl -i http://localhost:8080/program-execution/codes/crontab-list-tasks.php
HTTP/1.1 200 OK
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/7.3.12
Content-Length: 6
Content-Type: text/html; charset=UTF-8

<pre>
```

### crontab add

> [codes/crontab-add-task.php](codes/crontab-add-task.php):

```php
{% include_relative codes/crontab-add-task.php %}
```

> [http://localhost/program-execution/codes/crontab-add-task.php](http://localhost/program-execution/codes/crontab-add-task.php):

```
$ curl -i http://localhost/program-execution/codes/crontab-add-task.php
HTTP/1.1 200 OK
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/7.3.12
Content-Length: 58
Content-Type: text/html; charset=UTF-8

<pre>

00 09 * * 1-3 echo hello
```

### ping times

> [codes/ping-times.php](codes/ping-times.php):

```php
{% include_relative codes/ping-times.php %}
```

> [http://localhost:8080/program-execution/codes/ping-times.php](http://localhost:8080/program-execution/codes/ping-times.php):

```
$ curl -i http://localhost:8080/program-execution/codes/ping-times.php
HTTP/1.1 200 OK
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/7.3.12
Content-Length: 15
Content-Type: text/html; charset=UTF-8

68.8,67.5,68.10
```

### ping output

> [codes/ping.php](codes/ping.php):

```php
{% include_relative codes/ping.php %}
```

> [http://localhost:8080/program-execution/codes/ping.php?host=8.8.8.8](http://localhost:8080/program-execution/codes/ping.php?host=8.8.8.8):

```
$ curl -i http://localhost:8080/program-execution/codes/ping.php?host=8.8.8.8
HTTP/1.1 200 OK
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/7.3.12
Vary: Accept-Encoding
Content-Length: 251
Content-Type: text/html; charset=UTF-8

<pre>
PING 8.8.8.8 (8.8.8.8) 56(84) bytes of data.
64 bytes from 8.8.8.8: icmp_seq=1 ttl=37 time=68.7 ms

--- 8.8.8.8 ping statistics ---
1 packets transmitted, 1 received, 0% packet loss, time 0ms
rtt min/avg/max/mdev = 68.650/68.650/68.650/0.000 ms
```

**References**

- [Process Control Extensions - Program execution](https://www.php.net/manual/en/ref.exec.php): `shell_exec()`
- [Other Services - Network](http://php.net/manual/en/ref.network.php): `header()`
- [Other Basic Extensions - JSON](http://php.net/manual/en/ref.json.php): `json_encode()`, `json_decode()`
