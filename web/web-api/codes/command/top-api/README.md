# PS API

## Services
---

### PS Process

```
/ps.php
```

**Examples**

[http://localhost:8080/php/web/web-api/codes/command/ps-api/v1/ps.php](http://localhost:8080/php/web/web-api/codes/command/ps-api/v1/ps.php):
```js
[
  {  
    "user":"root",
    "pid":"1",
    "cpu":"0.0",
    "mem":"0.5",
    "vsz":"33632",
    "rss":"2940",
    "tty":"?",
    "stat":"Ss",
    "start":"Jul10",
    "time":"0:01",
    "command":"\/sbin\/init"
  },
  ...
  {  
    "user":"www-data",
    "pid":"20662",
    "cpu":"0.0",
    "mem":"0.2",
    "vsz":"15560",
    "rss":"1132",
    "tty":"?",
    "stat":"R",
    "start":"04:27",
    "time":"0:00",
    "command":"ps aux"
  }
]
```

**Commands**

```sh
$ ps aux
USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
root         1  0.0  0.5  33632  2940 ?        Ss   Jul10   0:01 /sbin/init
...
vagrant  20648  0.0  0.2  17160  1288 pts/0    R+   04:13   0:00 ps aux
```