# TOP API

- [TOP Process](#top-process)

## TOP Process

```
/api/v1/
```

**Example**

[http://localhost:8080/api/v1/](http://localhost:8080/api/v1/):

```json
[
  {
    "pid": "1",
    "user": "root",
    "pr": "20",
    "ni": "0",
    "virt": "33632",
    "res": "2940",
    "shr": "1468",
    "s": "S",
    "cpu": "0.0",
    "mem": "0.6",
    "time": "0:01.87",
    "command": "init"
  },
  ...
  {
    "pid": "20591",
    "user": "www-data",
    "pr": "20",
    "ni": "0",
    "virt": "21984",
    "res": "1316",
    "shr": "972",
    "s": "R",
    "cpu": "0.0",
    "mem": "0.3",
    "time": "0:00.00",
    "command": "top"
  }
];
```

**Command**

```sh
$ top -n1 -b
top - 03:27:45 up  6:00,  1 user,  load average: 0.01, 0.08, 0.08
Tasks:  85 total,   1 running,  84 sleeping,   0 stopped,   0 zombie
%Cpu(s):  0.3 us,  0.2 sy,  0.0 ni, 99.4 id,  0.0 wa,  0.0 hi,  0.0 si,  0.0 st
KiB Mem:    501692 total,   464744 used,    36948 free,    16452 buffers
KiB Swap:        0 total,        0 used,        0 free.   263388 cached Mem

  PID USER      PR  NI    VIRT    RES    SHR S %CPU %MEM     TIME+ COMMAND
    1 root      20   0   33632   2940   1468 S  0.0  0.6   0:01.87 init
...
20278 vagrant   20   0   23528   1404   1048 R  0.0  0.3   0:00.00 top
```
