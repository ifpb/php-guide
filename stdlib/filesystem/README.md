# [Filesystem](http://php.net/manual/en/book.filesystem.php)

- [Change config file](#change-config-file)
  - [Change log](#change-log)
  - [Creating log](#creating-log)

## Change config file

---

### Change log

> [codes/change-log.php](codes/change-log.php):

```php
// sed - stream editor
{% include_relative codes/change-log.php %}
```

> [http://localhost:8080/filesystem/codes/change-log.php](http://localhost:8080/filesystem/codes/change-log.php):

```
$ curl -i http://localhost:8080/filesystem/codes/change-log.php
HTTP/1.1 200 OK
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/7.3.12
Vary: Accept-Encoding
Content-Length: 1144
Content-Type: text/html; charset=UTF-8


>>>Tue, 03 Dec 2019 11:46:09 +0000
PING 8.8.8.8 (8.8.8.8) 56(84) bytes of data.
64 bytes from 8.8.8.8: icmp_sequence=1 ttl=37 time=65.8 ms

--- 8.8.8.8 ping statistics ---
1 packets transmitted, 1 received, 0% packet loss, time 0ms
rtt min/avg/max/mdev = 65.838/65.838/65.838/0.000 ms

>>>Tue, 03 Dec 2019 13:23:26 +0000
PING 8.8.8.8 (8.8.8.8) 56(84) bytes of data.
64 bytes from 8.8.8.8: icmp_sequence=1 ttl=37 time=66.7 ms

--- 8.8.8.8 ping statistics ---
1 packets transmitted, 1 received, 0% packet loss, time 0ms
rtt min/avg/max/mdev = 66.715/66.715/66.715/0.000 ms
```

### Creating log

> [codes/ping-log.php](codes/ping-log.php):

```php
{% include_relative codes/ping-log.php %}
```

> [http://localhost:8080/filesystem/codes/ping-log.php?host=8.8.8.8](http://localhost:8080/filesystem/codes/ping-log.php?host=8.8.8.8)

```
$ curl -i http://localhost:8080/filesystem/codes/ping-log.php?host=8.8.8.8
HTTP/1.1 200 OK
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/7.3.12
Vary: Accept-Encoding
Content-Length: 1136
Content-Type: text/html; charset=UTF-8

<pre>

>>>Tue, 03 Dec 2019 11:46:09 +0000
PING 8.8.8.8 (8.8.8.8) 56(84) bytes of data.
64 bytes from 8.8.8.8: icmp_seq=1 ttl=37 time=65.8 ms

--- 8.8.8.8 ping statistics ---
1 packets transmitted, 1 received, 0% packet loss, time 0ms
rtt min/avg/max/mdev = 65.838/65.838/65.838/0.000 ms

>>>Tue, 03 Dec 2019 13:23:26 +0000
PING 8.8.8.8 (8.8.8.8) 56(84) bytes of data.
64 bytes from 8.8.8.8: icmp_seq=1 ttl=37 time=66.7 ms

--- 8.8.8.8 ping statistics ---
1 packets transmitted, 1 received, 0% packet loss, time 0ms
rtt min/avg/max/mdev = 66.715/66.715/66.715/0.000 ms
</pre>
```

**Reference**

- [Date and Time Related Extensions - Date/Time](http://php.net/manual/en/book.datetime.php): `date()`
- [File System Related Extensions - Filesystem](http://php.net/manual/en/ref.filesystem.php): `file_get_content()`, `file_put_content()`
- Text Util (Terminal): [sed](https://www.gnu.org/software/sed/manual/sed.html), [cut](https://www.gnu.org/software/coreutils/manual/html_node/cut-invocation.html), [awk](https://www.gnu.org/software/gawk/manual/gawk.html)
