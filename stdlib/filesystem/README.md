# [Filesystem](http://php.net/manual/en/book.filesystem.php)

- [file_get_contents()](#file_get_contents)
  - [Change config file](Change config file)
    - [Display Error - php.ini](display-error---php.ini)
    - [Creating log](creating-log)

## file_get_contents()
---

<!-- 
TODO
sed, cut, awk
-->

### Change config file

#### Display Error - php.ini
[codes/display_error.php](codes/display_error.php):
```php
// sed - stream editor
{% include_relative codes/display_error.php %}
```

```
$ curl -I codes/display_error.php
```

#### Creating log
[codes/ping-log.php](codes/ping-log.php):
```php
{% include_relative codes/ping-log.php %}
```

```
$ curl -I codes/ping-log.php?host=8.8.8.8
```

```
# chmod o+x ping.log
```

**Reference**
- [Other Services - SSH2](http://php.net/manual/en/book.ssh2.php): `ssh2_connect()`, `ssh2_auth_password()`, `ssh2_exec()`
- [Date and Time Related Extensions - Date/Time - Date/Time Functions](http://php.net/manual/en/book.datetime.php): `date()`
- [File System Related Extensions - Filesystem - Filesystem Functions](http://php.net/manual/en/ref.filesystem.php): `file_get_content()`, `file_put_content()`