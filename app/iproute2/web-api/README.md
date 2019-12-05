# IPRoute2 API

- [Get links](#get-links)
- [Get link](#get-link)

## Get links

---

```
/api/v1/?a=links
```

**Examples**

> - [http://localhost:8080/api/v1/](http://localhost:8080/api/v1/):
> - [http://localhost:8080/api/v1/index.php](http://localhost:8080/api/v1/index.php):
> - [http://localhost:8080/api/v1/?a=links](http://localhost:8080/api/v1/?a=links):
> - [http://localhost:8080/api/v1/index.php?a=links](http://localhost:8080/api/v1/index.php?a=links):

```json
[
  {
    "id": "1",
    "name": "lo",
    "mtu": "65536",
    "state": "UNKNOWN",
    "link": "loopback",
    "mac": "00:00:00:00:00:00",
    "macbrd": "00:00:00:00:00:00",
    "ip": "127.0.0.1",
    "ipmask": "8"
  },
  {
    "id": "2",
    "name": "tunl0@NONE",
    "mtu": "1480",
    "state": "DOWN",
    "link": "ipip",
    "mac": "0.0.0.0",
    "macbrd": "0.0.0.0"
  },
  {
    "id": "3",
    "name": "ip6tnl0@NONE",
    "mtu": "1452",
    "state": "DOWN",
    "link": "tunnel6",
    "mac": "::",
    "macbrd": "::"
  },
  {
    "id": "19",
    "name": "eth0@if20",
    "mtu": "1500",
    "state": "UP",
    "link": "ether",
    "mac": "02:42:ac:14:00:02",
    "macbrd": "ff:ff:ff:ff:ff:ff",
    "ip": "172.20.0.2",
    "ipmask": "16",
    "ipbrd": "172.20.255.255"
  }
];
```

**Command**

```sh
$ ip addr show
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00
    inet 127.0.0.1/8 scope host lo
       valid_lft forever preferred_lft forever
2: tunl0@NONE: <NOARP> mtu 1480 qdisc noop state DOWN group default qlen 1
    link/ipip 0.0.0.0 brd 0.0.0.0
3: ip6tnl0@NONE: <NOARP> mtu 1452 qdisc noop state DOWN group default qlen 1
    link/tunnel6 :: brd ::
22: eth0@if23: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default
    link/ether 02:42:ac:15:00:02 brd ff:ff:ff:ff:ff:ff link-netnsid 0
    inet 172.21.0.2/16 brd 172.21.255.255 scope global eth0
       valid_lft forever preferred_lft forever
```

## Get link

---

```
/api/v1/?a=link&link=:link
```

**Params**

| Name  | Type   | Description       |
| ----- | ------ | ----------------- |
| :link | String | Name of Interface |

**Examples**

> [http://localhost:8080/api/v1/?a=link&link=eth0](http://localhost:8080/api/v1/?a=link&link=eth0):

```json
{
  "name": "eth0",
  "stats": {
    "rx": {
      "bytes": "120900",
      "packets": "779",
      "errors": "0",
      "dropped": "0",
      "overrun": "0",
      "mcast": "0"
    },
    "tx": {
      "bytes": "147590",
      "packets": "578",
      "errors": "0",
      "dropped": "0",
      "carrier": "0",
      "collsns": "0"
    }
  }
}
```

**Command**

```sh
$ ip -s link show eth0
19: eth0@if20: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP mode DEFAULT group default
    link/ether 02:42:ac:14:00:02 brd ff:ff:ff:ff:ff:ff link-netnsid 0
    RX: bytes  packets  errors  dropped overrun mcast
    130071     818      0       0       0       0
    TX: bytes  packets  errors  dropped carrier collsns
    161297     611      0       0       0       0
```
