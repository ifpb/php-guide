# [Secure Shell2](http://php.net/manual/en/book.ssh2.php)

- [ssh2_exec()](#ssh2_exec)
  - [Run command as the system administrator (root)](#run-command-as-the-system-administrator-root)
    - [cat /etc/shadow by ssh](#cat-etcshadow-by-ssh)
    - [service --status-all](#service---status-all)
  - [Change config file](#change-config-file)
    - [Display Error - php.ini](#display-error---phpini)
    - [Creating log](#creating-log)

## ssh2_exec()
---

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
[codes/shell-exec-shadow.php](codes/shell-exec-shadow.php):
```php
{% include_relative codes/shell-exec-shadow.php %}
```

```
$ curl -I codes/shell-exec-shadow.php
```

[codes/cat-shadow.php](codes/cat-shadow.php):
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

#### service \-\-status-all
[codes/service-status-all.php](codes/service-status-all.php):
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
