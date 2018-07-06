# Program execution

- [shell_exec()](#shell_exec)
  - [Basic command](#basic-command)
    - [uname](#uname)
    - [contrab list](#contrab-list)
    - [contrab add](#contrab-add)
    - [ping](#ping)
  - [Run command as the system administrator (root)](#run-command-as-the-system-administrator-root)
    - [cat /etc/shadow by ssh](#cat-etcshadow-by-ssh)
    - [service --status-all](#service---status-all)
  - [Change config file](#change-config-file)
    - [Display Error - php.ini](#display-error---phpini)
    - [Creating log](#creating-log)

## [shell_exec()](http://php.net/manual/en/book.exec.php)
---

### Running basic command

#### uname

[codes/uname.php](codes/uname.php)
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
[codes/contrab-list-tasks.php](codes/contrab-list-tasks.php)
```php
{% include_relative codes/contrab-list-tasks.php %}
```

```
$ curl -I codes/contrab-list-tasks.php
```

#### contrab add
[codes/contrab-add-tasks.php](codes/contrab-add-tasks.php)
```php
{% include_relative codes/contrab-add-tasks.php %}
```

```
$ curl -I codes/contrab-add-tasks.php
```

#### ping

[codes/ping.php](codes/ping.php)
```php
{% include_relative codes/ping.php %}
```

```
$ curl -I codes/ping.php?host=8.8.8.8
```

**Reference**
- [Other Services - Network - Network Functions](http://php.net/manual/en/ref.network.php): `header()`
- [Other Basic Extensions - JSON - JSON Functions](http://php.net/manual/en/ref.json.php): `json_encode()`, `json_decode()`

### Running command as the system administrator (root)

<!-- 
TODO
# 1
https://stackoverflow.com/questions/2889995/how-to-make-php-lists-all-linux-users
/etc/sudoers
www-data    ALL=(ALL) NOPASSWD: ALL

# 2
chmod a+rw command/file
 -->

#### cat /etc/shadow by ssh
[codes/shell-exec-shadow.php](codes/shell-exec-shadow.php)
```php
{% include_relative codes/shell-exec-shadow.php %}
```

```
$ curl -I codes/shell-exec-shadow.php
```

[codes/cat-shadow.php](codes/cat-shadow.php)
```php
{% include_relative codes/cat-shadow.php %}
```

```
$ curl -I codes/cat-shadow.php
```

**SSH ROOT**
```
# sed -i 's/PermitRootLogin yes/PermitRootLogin no/g' /etc/ssh/sshd_config
# service ssh reload
```

**Reference**
- [Other Services - SSH2](http://php.net/manual/en/book.ssh2.php): `ssh2_connect()`, `ssh2_auth_password()`, `ssh2_exec()`, `ssh2_fetch_stream()`

#### service --status-all
[codes/service-status-all.php](codes/service-status-all.php)
```php
{% include_relative codes/service-status-all.php %}
```

```
$ curl -I codes/service-status-all.php
```

```js
{
  "acpid": "up",
  "apache2": "up",
  "apparmor": "up",
  "atd": "up",
  "chef-client": "up",
  "cron": "up",
  "dbus": "down",
  "friendly-recovery": "up",
  "grub-common": "down",
  "landscape-client": "down",
  "procps": "down",
  "puppet": "up",
  "resolvconf": "up",
  "rpcbind": "up",
  "rsync": "down",
  "rsyslog": "up",
  "ssh": "up",
  "sudo": "down",
  "udev": "up",
  "unattended-upgrades": "down",
  "urandom": "down",
  "virtualbox-guest-utils": "down",
  "x11-common": "down"
}
```

**Reference**
- [Other Services - SSH2](http://php.net/manual/en/book.ssh2.php): `ssh2_connect()`, `ssh2_auth_password()`, `ssh2_exec()`, `ssh2_fetch_stream()`
- [Text Processing - PCRE - PCRE Functions](http://php.net/manual/en/ref.pcre.php): `preg_match_all()`

### Change config file

#### Display Error - php.ini
[codes/display_error.php](codes/display_error.php)
```php
// sed - stream editor
{% include_relative codes/display_error.php %}
```

```
$ curl -I codes/display_error.php
```

#### Creating log
[codes/ping-log.php](codes/ping-log.php)
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

<!-- 
TODO
sed, cut, awk
-->