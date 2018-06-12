# Function Reference

- [Commands](#commands)
  - [Comandos Básicos](#comandos-Básicos)
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

## References
---
- [Manual do php.net](http://php.net/manual/en/)
  - [Language Reference](http://php.net/manual/en/langref.php)
  - [Function Reference](http://php.net/manual/en/funcref.php)

## Commands
---

### Comandos Básicos

#### uname

[commands/uname.php](commands/uname.php)
```php
echo shell_exec('uname -a'); 
```

```
$ php -S localhost:8000 -t .
$ php -S localhost:8000 uname.php
# service apache2 start
```

```
$ curl -I http://localhost:8000/uname.php
```

```
Linux vagrant-ubuntu-trusty-64 3.13.0-108-generic #155-Ubuntu SMP Wed Jan 11 16:58:52 UTC 2017 x86_64 x86_64 x86_64 GNU/Linux
```

```
# sed -i -r -e 's/display_errors = Off/display_errors = On/g' /etc/php/7.1/apache2/php.ini
# service apache2 start
```
<!-- 
sed -i -r -e 's/error_reporting = E_ALL & ~E_DEPRECATED/error_reporting = E_ALL | E_STRICT/g' /etc/php5/fpm/php.ini 
-->

**Reference**
- [Process Control Extensions - Program execution](http://php.net/manual/en/book.exec.php): `shell_exe()`

#### contrab list
[commands/contrab-list-tasks.php](commands/contrab-list-tasks.php)
```php
echo shell_exec("crontab -l");
```

```
$ curl -I /contrab-list-tasks.php
```

#### contrab add
[commands/contrab-add-tasks.php](commands/contrab-add-tasks.php)
```php
$crontab = shell_exec("crontab -l");
$command = "00 09 * * 1-3 echo hello";

shell_exec("crontab <<EOF
${crontab}
${command}
EOF");
```

```
$ curl -I /contrab-add-tasks.php
```

#### ping

[commands/ping.php](commands/ping.php)
```php
// get host
$host = $_GET['host'] ?? null;

// create json
$json = '';
if($host){
  $command = "ping -c1 {$host}";
  $result = shell_exec($command);
  $json = json_encode(['result' => $result]);
} else {
  $json = json_encode(['error' => 'host not found']);
}

// echo json
header('Content-type: application/json; charset=UTF-8');
echo $json;
```

```
$ curl -I /ping.php?host=8.8.8.8
```

**Reference**
- [Process Control Extensions - Program execution](http://php.net/manual/en/book.exec.php): `shell_exe()`
- [Other Services - Network - Network Functions](http://php.net/manual/en/ref.network.php): `header()`
- [Other Basic Extensions - JSON - JSON Functions](http://php.net/manual/en/ref.json.php): `json_encode()`, `json_decode()`

### Run command as the system administrator (root)

<!-- 
# 1
https://stackoverflow.com/questions/2889995/how-to-make-php-lists-all-linux-users
/etc/sudoers
www-data    ALL=(ALL) NOPASSWD: ALL

# 2
chmod a+rw command/file
 -->

#### cat /etc/shadow by ssh
[commands/shell-exec-shadow.php](commands/shell-exec-shadow.php)
```php
echo shell_exec('sudo cat /etc/shadow');
```

```
$ curl -I /shell-exec-shadow.php
```

[commands/cat-shadow.php](commands/cat-shadow.php)
```php
$connection = ssh2_connect('localhost', 22);
ssh2_auth_password($connection, 'vagrant', 'vagrant');

$stream = ssh2_exec($connection, 'sudo cat /etc/shadow');
stream_set_blocking($stream, true);
$stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
$output = stream_get_contents($stream_out);

echo "<pre>{$output}</pre>";
```

```
$ curl -I /shell-exec-shadow.php
```

**SSH ROOT**
```
# sed -i 's/PermitRootLogin yes/PermitRootLogin no/g' /etc/ssh/sshd_config
# service ssh reload
```

#### service --status-all
[commands/service-status-all.php](commands/service-status-all.php)
```php
$connection = ssh2_connect('localhost', 22);
ssh2_auth_password($connection, 'vagrant', 'vagrant');

$stream = ssh2_exec($connection, 'sudo service --status-all');
stream_set_blocking($stream, true);
$stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
$output = stream_get_contents($stream_out);

preg_match_all("/\[ ([\+-]) \]\s+(.+)/", $output, $matches);

$status = [];

foreach($matches[2] as $index=>$service) {
 $status[$service] = $matches[1][$index] == '+' ? 'up' : 'down';
}

$json = json_encode($status);

header('Content-type: application/json; charset=UTF-8');
echo $json;
```

```
$ curl -I /service-status-all.php
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
- [Process Control Extensions - Program execution](http://php.net/manual/en/book.exec.php): `shell_exe()`
- [Other Services - SSH2](http://php.net/manual/en/book.ssh2.php): `ssh2_connect()`, `ssh2_auth_password()`, `ssh2_exec()`, `ssh2_fetch_stream()`
- [Text Processing - PCRE - PCRE Functions](http://php.net/manual/en/ref.pcre.php): `preg_match_all()`

### Change config file

#### Display Error - php.ini
[commands/display_error.php](commands/display_error.php)
```php
// sed - stream editor
$display_error = "sed -i -r -e 's/display_errors = Off/display_errors = On/g' /etc/php/7.1/apache2/php.ini";

$connection = ssh2_connect('localhost', 22);
ssh2_auth_password($connection, 'vagrant', 'vagrant');

ssh2_exec($connection, $display_error);
ssh2_exec($connection, 'service apache2 restart');
```

<!-- 
sed, cut, awk
-->

```
$ curl -I /display_error.php
```

#### Creating log
[commands/ping-log.php](commands/ping-log.php)
```php
// get host
$host = $_GET['host'] ?? null;

// shell_exec -> string
$command = "ping -c1 {$host}";
$ping = shell_exec($command);

$log = file_get_contents('ping.log');

// store ping
$time = date('r');
file_put_contents('ping.log', "${log}\n>>>${time}\n${ping}");

echo file_get_contents('ping.log');
```

```
$ curl -I /ping-log.php?host=8.8.8.8
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

## PDO
---

-->