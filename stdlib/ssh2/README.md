# [Secure Shell2](http://php.net/manual/en/book.ssh2.php)

- [Run command as the system administrator (root)](#run-command-as-the-system-administrator-root)
  - [cat /etc/shadow](#cat-etcshadow)
  - [cat /etc/shadow by ssh](#cat-etcshadow-by-ssh)
  - [service --status-all](#service---status-all)
- [Change config file](#change-config-file)
  - [Display Error - php.ini](#display-error---phpini)

## Running command as the system administrator (root)

---

### cat /etc/shadow

> [codes/shell-exec-shadow.php](codes/shell-exec-shadow.php):

```php
{% include_relative codes/shell-exec-shadow.php %}
```

> [http://localhost:8080/ssh2/codes/shell-exec-shadow.php](http://localhost:8080/ssh2/codes/shell-exec-shadow.php):

```
$ curl -i http://localhost:8080/ssh2/codes/shell-exec-shadow.php
HTTP/1.1 200 OK
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/7.3.12
Content-Length: 0
Content-Type: text/html; charset=UTF-8
```

> Change Permission:

```
chmod a+r /etc/shadow
```

> [http://localhost:8080/ssh2/codes/shell-exec-shadow.php](http://localhost:8080/ssh2/codes/shell-exec-shadow.php):

```
$ curl -i http://localhost:8080/ssh2/codes/shell-exec-shadow.php
HTTP/1.1 200 OK
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/7.3.12
Content-Length: 0
Content-Type: text/html; charset=UTF-8


<pre>
root:*:18218:0:99999:7:::
daemon:*:18218:0:99999:7:::
bin:*:18218:0:99999:7:::
sys:*:18218:0:99999:7:::
sync:*:18218:0:99999:7:::
games:*:18218:0:99999:7:::
man:*:18218:0:99999:7:::
lp:*:18218:0:99999:7:::
mail:*:18218:0:99999:7:::
news:*:18218:0:99999:7:::
uucp:*:18218:0:99999:7:::
proxy:*:18218:0:99999:7:::
www-data:*:18218:0:99999:7:::
backup:*:18218:0:99999:7:::
list:*:18218:0:99999:7:::
irc:*:18218:0:99999:7:::
gnats:*:18218:0:99999:7:::
nobody:*:18218:0:99999:7:::
_apt:*:18218:0:99999:7:::
Debian-exim:!:18233:0:99999:7:::
```

> Change Permission (sudoers):

```
/etc/sudoers
www-data    ALL=(ALL) NOPASSWD: ALL
www-data    ALL=(ALL) NOPASSWD: /path/to/program
```

### cat /etc/shadow by ssh

> [codes/cat-shadow.php](codes/cat-shadow.php):

```php
{% include_relative codes/cat-shadow.php %}
```

> [http://localhost:8080/ssh2/codes/cat-shadow.php](http://localhost:8080/ssh2/codes/cat-shadow.php):

```
$ curl -i http://localhost:8080/ssh2/codes/cat-shadow.php
HTTP/1.1 200 OK
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/7.3.12
Vary: Accept-Encoding
Content-Length: 820
Content-Type: text/html; charset=UTF-8

<pre>root:$6$b2Kb36.bTQsluuuG$MDwIuvXJW3zK/2KSR6z4WdBSTEMvKvRiSWq94LPvhrOZh3YV.hAgQa7kdjC3hLlAQ3L7EP3n4slYzXxa1ZUR0.:18233:0:99999:7:::
daemon:*:18218:0:99999:7:::
bin:*:18218:0:99999:7:::
sys:*:18218:0:99999:7:::
sync:*:18218:0:99999:7:::
games:*:18218:0:99999:7:::
man:*:18218:0:99999:7:::
lp:*:18218:0:99999:7:::
mail:*:18218:0:99999:7:::
news:*:18218:0:99999:7:::
uucp:*:18218:0:99999:7:::
proxy:*:18218:0:99999:7:::
www-data:*:18218:0:99999:7:::
backup:*:18218:0:99999:7:::
list:*:18218:0:99999:7:::
irc:*:18218:0:99999:7:::
gnats:*:18218:0:99999:7:::
nobody:*:18218:0:99999:7:::
_apt:*:18218:0:99999:7:::
systemd-timesync:*:18233:0:99999:7:::
systemd-network:*:18233:0:99999:7:::
systemd-resolve:*:18233:0:99999:7:::
messagebus:*:18233:0:99999:7:::
Debian-exim:!:18233:0:99999:7:::
sshd:*:18233:0:99999:7:::
</pre>
```

> Active root ssh:

```
# sed -i 's/\#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
# service ssh restart
```

**Reference**

- [Other Services - SSH2](http://php.net/manual/en/book.ssh2.php): `ssh2_connect()`, `ssh2_auth_password()`, `ssh2_exec()`, `ssh2_fetch_stream()`

### service \-\-status-all

> [codes/service-status-all.php](codes/service-status-all.php):

```php
{% include_relative codes/service-status-all.php %}
```

> [http://localhost:8080/ssh2/codes/service-status-all.php](http://localhost:8080/ssh2/codes/service-status-all.php):

```
$ curl -i http://localhost:8080/ssh2/codes/service-status-all.php
HTTP/1.1 200 OK
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/7.3.12
Access-Control-Allow-Origin: *
Content-Length: 115
Content-Type: application/json; charset=UTF-8

{"apache-htcacheclean":"down","apache2":"up","cron":"down","dbus":"down","exim4":"down","procps":"down","ssh":"up"}
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

## Change config file

> [codes/active-root-ssh.php](codes/active-root-ssh.php):

```php
{% include_relative codes/active-root-ssh.php %}
```

> [http://localhost:8080/ssh2/codes/active-root-ssh.php](http://localhost:8080/ssh2/codes/active-root-ssh.php):

```
$ curl -i http://localhost:8080/ssh2/codes/active-root-ssh.php
HTTP/1.1 200 OK
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/7.3.12
Content-Length: 11
Content-Type: text/html; charset=UTF-8

ssh restart
```

**Reference**

- [Other Services - SSH2](http://php.net/manual/en/book.ssh2.php): `ssh2_connect()`, `ssh2_auth_password()`, `ssh2_exec()`, `ssh2_fetch_stream()`
- [Text Processing - PCRE](http://php.net/manual/en/ref.pcre.php): `preg_match_all()`
- [phpseclib/phpseclib](https://github.com/phpseclib/phpseclib)
