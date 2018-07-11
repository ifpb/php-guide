# [PCRE — Regular Expressions (Perl-Compatible)](http://php.net/manual/en/book.pcre.php)

- [PCRE Patterns](#pcre-patterns)
  - [Character classes](#character-classes)
  - [Repetition](#repetition)
  - [Capturing group](#capturing-group)
  - [Alternation](#alternation)
- [preg_match()](#preg_match)
- [preg_match_all()](#preg_match_all)

## [PCRE Patterns](http://php.net/manual/en/pcre.pattern.php)
---

```sh
$ top -n1 -b | head -n 1
top - 11:41:04 up 21 min,  1 user,  load average: 0.00, 0.01, 0.07
```

### Character classes

```php
$message = "top - 11:41:04 up 21 min,  1 user,  load average: 0.00, 0.01, 0.07";
$pattern = "/\d\d:\d\d:\d\d/";
preg_match($pattern, $message, $matches);
var_dump($matches); //=> array(1) { [0]=>string(8) "11:41:04" }
```

### Repetition

```php
$message = "top - 11:41:04 up 21 min,  1 user,  load average: 0.00, 0.01, 0.07";
$pattern = "/\d{2}:\d{2}:\d{2}/";
preg_match($pattern, $message, $matches);
var_dump($matches); //=> array(1) { [0]=>string(8) "11:41:04" }
```

### Capturing group

```php
$message = "top - 11:41:04 up 21 min,  1 user,  load average: 0.00, 0.01, 0.07";
$pattern = "/load average: (.+), (.+), (.+)/";
preg_match($pattern, $message, $matches);
var_dump($matches);
//=>
// array(4) {
//   [0]=>string(30) "load average: 0.00, 0.01, 0.07"
//   [1]=>string(4) "0.00"
//   [2]=>string(4) "0.01"
//   [3]=>string(4) "0.07"
// }
```

### Alternation

Mac OS:
```sh
$ top -l3 -n1 | head -n 4 | tail -n 1
CPU usage: 14.79% user, 20.91% sys, 64.28% idle
```

Linux:
```sh
top -n1 -b | head -n 3 | tail -n 1
%Cpu(s):  1.2 us,  0.6 sy,  0.1 ni, 98.0 id,  0.1 wa,  0.0 hi,  0.1 si,  0.0 st
```

CPU User:
```php
$message = "%Cpu(s):  1.2 us,  0.6 sy,  0.1 ni, 98.0 id,  0.1 wa,  0.0 hi,  0.1 si,  0.0 st";
$pattern = "/Cpu\(s\):  (.+) us|CPU usage: (.+)% user/";
preg_match($pattern, $message, $matches);
var_dump($matches); 
//=> 
// array(2) {
//  [0]=>string(15) "Cpu(s):  1.2 us"
//  [1]=>string(3) "1.2"
// }
```

References: 
* [PHP Patterns](patterns.md)
* [JS Syntax](https://ifpb.github.io/javascript-guide/ecma/regexp/syntax.html)
* [JS Patterns](https://ifpb.github.io/javascript-guide/ecma/regexp/pattern.html)

## preg_match()
---

### Top

```sh
$ top -n1 -b
top - 11:41:04 up 21 min,  1 user,  load average: 0.00, 0.01, 0.07
Tasks:  86 total,   1 running,  85 sleeping,   0 stopped,   0 zombie
%Cpu(s):  4.7 us,  2.2 sy,  0.5 ni, 92.0 id,  0.3 wa,  0.0 hi,  0.3 si,
KiB Mem:    501692 total,   475348 used,    26344 free,    13032 buffers
KiB Swap:        0 total,        0 used,        0 free.   281204 cached

  PID USER      PR  NI    VIRT    RES    SHR S %CPU %MEM     TIME+
    1 root      20   0   33632   2940   1468 S  0.0  0.6   0:01.87
    2 root      20   0       0      0      0 S  0.0  0.0   0:00.01
...
17836 www-data  20   0  287448   6708   2424 S  0.0  1.3   0:00.02
17914 vagrant   20   0   23528   1396   1048 R  0.0  0.3   0:00.00
```

[Regular Expression](https://regex101.com/r/g3xxdN/1):
```
/Tasks:  (\d+) total,   (\d+) running,  (\d+) sleeping,   (\d+) stopped,   (\d+) zombie/
```

[codes/top.php](codes/top.php):
```php
{% include_relative codes/top.php %}
```

```
array(6) {
  [0]=>string(68) "Tasks:  86 total,   1 running,  85 sleeping,   0 stopped,   0 zombie"
  [1]=>string(2) "86"
  [2]=>string(1) "1"
  [3]=>string(2) "85"
  [4]=>string(1) "0"
  [5]=>string(1) "0"
}
```

### Crontab

[codes/crontab.txt](codes/crontab.txt):
```
{% include_relative codes/crontab.txt %}
```

[Regular Expression](https://regex101.com/r/I4VKwF/1):
```
(@yearly|@monthly|@daily|@reboot) (.+)|([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) (.+)
```

[codes/crontab.php](codes/crontab.php):
```php
{% include_relative codes/crontab.php %}
```

```js
[
  {
    "minute":"",
    "hour":"",
    "day":"30",
    "month":"08",
    "weekDay":"10",
    "task":"06"
  },
  {
    "minute":"",
    "hour":"",
    "day":"00",
    "month":"11,16",
    "weekDay":"*",
    "task":"*"
  },
  {
    "minute":"",
    "hour":"",
    "day":"00",
    "month":"09-18",
    "weekDay":"*",
    "task":"*"
  },
  {
    "minute":"",
    "hour":"",
    "day":"00",
    "month":"09-18",
    "weekDay":"*",
    "task":"*"
  },
  {
    "minute":"",
    "hour":"",
    "day":"*/10",
    "month":"*",
    "weekDay":"*",
    "task":"*"
  },
  {
    "keyword":"@yearly",
    "task":"/scripts/annual-maintenance"
  },
  {
    "keyword":"@monthly",
    "task":"/scripts/tape-backup"
  },
  {
    "keyword":"@daily",
    "task":"/scripts/cleanup-logs"
  },
  {
    "keyword":"@reboot",
    "task":"/script/start-service-x"
  }
]
```

## preg_match_all()
---

### Ping API

```
$ ping -c2 8.8.8.8
PING 8.8.8.8 (8.8.8.8) 56(84) bytes of data.
64 bytes from 8.8.8.8: icmp_seq=1 ttl=63 time=148 ms
64 bytes from 8.8.8.8: icmp_seq=2 ttl=63 time=144 ms

--- 8.8.8.8 ping statistics ---
2 packets transmitted, 2 received, 0% packet loss, time 1024ms
rtt min/avg/max/mdev = 144.691/146.669/148.648/2.015 ms
```

#### Shell script mode

[codes/ping.sh](codes/ping.sh):
```php
{% include_relative codes/ping.sh %}
```

[codes/ping-sh.php](codes/ping-sh.php):
```php
{% include_relative codes/ping-sh.php %}
```

> [http://localhost:8080/php/stdlib/pcre/codes/ping-sh.php?host=8.8.8.8](http://localhost:8080/php/stdlib/pcre/codes/ping-sh.php?host=8.8.8.8)

#### PCRE mode

```
/\(([\d\.]+)\)/

/icmp_seq=(\d+) ttl=(\d+) time=([\d\.]+)/

/(\d+) packets transmitted, (\d+) (packets received|received)/

/min\/avg\/max\/(stddev|mdev) = ([\d\.]+)\/([\d\.]+)\/([\d\.]+)\/([\d\.]+)/
```

[codes/ping.php](codes/ping.php):
```php
{% include_relative codes/ping.php %}
```

[http://localhost:8090/ping.php](http://localhost:8090/ping.php):
```
$ curl -I http://localhost:8090/ping.php
HTTP/1.1 500 Internal Server Error
Host: localhost:8090
Connection: close
X-Powered-By: PHP/7.0.6
Content-type: application/json; charset=UTF-8
Access-Control-Allow-Origin: *

{
  "error":"Unknown host"
}
```

[http://localhost:8090/ping.php?host=test](http://localhost:8090/ping.php?host=test):
```
$ curl -I http://localhost:8090/ping.php?host=test
HTTP/1.1 500 Internal Server Error
Host: localhost:8090
Connection: close
X-Powered-By: PHP/7.0.6
Content-type: application/json; charset=UTF-8
Access-Control-Allow-Origin: *

{
  "error":"Unknown host"
}
```

[http://localhost:8090/ping.php?host=8.8.8.8](http://localhost:8090/ping.php?host=8.8.8.8):
```
$ curl -I http://localhost:8090/ping.php?host=8.8.8.8
HTTP/1.1 200 OK
Host: localhost:8090
Connection: close
X-Powered-By: PHP/7.0.6
Content-type: application/json; charset=UTF-8
Access-Control-Allow-Origin: *

{
  "host":"8.8.8.8",
  "ip":"8.8.8.8",
  "packets":[
    {
      "seq":0,
      "ttl":49,
      "time":143.257
    }
  ],
  "statistics":{
    "transmitted":1,
    "received":1,
    "losted":0,
    "min":0,
    "avg":143.257,
    "max":143.257,
    "stddev":143.257
  },
}
```

[http://localhost:8090/ping.php?host=8.8.8.8&count=2](http://localhost:8090/ping.php?host=8.8.8.8&count=2):
```
$ curl -I http://localhost:8090/ping.php?host=8.8.8.8&count=2
HTTP/1.1 200 OK
Host: localhost:8090
Connection: close
X-Powered-By: PHP/7.0.6
Content-type: application/json; charset=UTF-8
Access-Control-Allow-Origin: *

{
  "host":"8.8.8.8",
  "ip":"8.8.8.8",
  "packets":[
    {
      "seq":0,
      "ttl":49,
      "time":142.184
    },
    {
      "seq":1,
      "ttl":49,
      "time":141.717
    }
  ],
  "statistics":{
    "transmitted":2,
    "received":2,
    "losted":0,
    "min":0,
    "avg":141.717,
    "max":141.951,
    "stddev":142.184
  }
}
```
