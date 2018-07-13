# Ping API

## Services
---

### ICMP Echo Request

```
/ping.php?host=:host&count=:count
```

**Params**

| Name | Type | Description |
|-|-|-|
| :host | String | hostname or ip address |
| :count | Integer | number of packets |

**Examples**

[http://localhost:8080/php/web/web-api/codes/ping-api/v1/ping.php](http://localhost:8080/php/web/web-api/codes/ping-api/v1/ping.php):
```js
{
  "error": "Unknown host"
}
```

[http://localhost:8080/php/web/web-api/codes/ping-api/v1/ping.php?host=test](http://localhost:8080/php/web/web-api/codes/ping-api/v1/ping.php?host=test):
```js
{
  "error": "Unknown host"
}
```

[http://localhost:8080/php/web/web-api/codes/ping-api/v1/ping.php?host=8.8.8.8](http://localhost:8080/php/web/web-api/codes/ping-api/v1/ping.php?host=8.8.8.8):
```js
{
  "host":"8.8.8.8",
  "ip":"8.8.8.8",
  "packets":[
    {
      "seq":1,
      "ttl":63,
      "time":594
    }
  ],
  "statistics":{
    "transmitted":1,
    "received":1,
    "losted":0,
    "min":0,
    "avg":594.27,
    "max":594.27,
    "stddev":594.27
  }
}
```

[http://localhost:8080/php/web/web-api/codes/ping-api/v1/ping.php?host=8.8.8.8&count=2](http://localhost:8080/php/web/web-api/codes/ping-api/v1/ping.php?host=8.8.8.8&count=2):
```js
{
  "host":"8.8.8.8",
  "ip":"8.8.8.8",
  "packets":[
    {
      "seq":1,
      "ttl":63,
      "time":159
    },
    {
      "seq":2,
      "ttl":63,
      "time":151
    }
  ],
  "statistics":{
    "transmitted":2,
    "received":2,
    "losted":0,
    "min":0,
    "avg":151.807,
    "max":155.466,
    "stddev":159.126
  }
}
```

**Command**

```sh
$ ping -c2 8.8.8.8
PING 8.8.8.8 (8.8.8.8): 56 data bytes
64 bytes from 8.8.8.8: icmp_seq=0 ttl=49 time=145.129 ms
64 bytes from 8.8.8.8: icmp_seq=1 ttl=49 time=140.530 ms

--- 8.8.8.8 ping statistics ---
2 packets transmitted, 2 packets received, 0.0% packet loss
round-trip min/avg/max/stddev = 140.530/142.829/145.129/2.299 ms
```
