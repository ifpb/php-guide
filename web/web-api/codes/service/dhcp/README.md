# DHCP API

- [Architecture](#architecture)
- [Services](#services)
  - [List reservation](#list-reservation)
  - [Add reservation](#add-reservation)
  - [Remove reservation](#remove-reservation)

## Architecture
---

![](assets/architecture.svg)

[Vagrantfile](Vagrantfile):
```ruby
{% include_relative Vagrantfile %}
```

[install/dhcpserver.sh](install/dhcpserver.sh):
```sh
{% include_relative install/dhcpserver.sh %}
```

[install/dhcpd.conf](install/dhcpd.conf):
```
{% include_relative install/dhcpd.conf %}
```

Set Up DHCP Reservations (`deny unknown-clients`):
```
host DISP001 {hardware ethernet 08:00:27:8B:80:A3; fixed-address 192.168.1.10;} # alice (primary)
host DISP002 {hardware ethernet 08:00:27:8B:80:A4; fixed-address 192.168.1.11;} # bob (primary)
host DISP003 {hardware ethernet 08:00:27:8B:80:A5; fixed-address 192.168.1.12;} # charlie (secondary)
```

**References:**
- [Ubuntu isc-dhcp-server](https://help.ubuntu.com/community/isc-dhcp-server)

## Services
---

### List reservation

```
/v1/index.php?action=list-ips
```

**Example**

[http://localhost:8080/v1/index.php?action=list-ips](http://localhost:8080/v1/index.php?action=list-ips):

```js
[
  {
    "host":"DISP001",
    "ip":"08:00:27:8B:80:A3",
    "mac":"192.168.1.10",
    "comment":"alice",
    "sector":"primary",
    "type":"static"
  }
]
```

**Command**

```sh
$ cat /etc/dhcp/dhcpd.conf
```

<!-- 
$ cat /var/lib/dhcp/dhcpd.leases 
-->

### Add reservation

```
/v1/index.php?action=add-ip&comment=:comment&mac=:mac&host=:host&ip=:ip&sector=:sector
```

**Params**

| Name | Type | Description |
|-|-|-|
| :host | String | Hostname |
| :mac | String | MAC Address |
| :ip | String | IP Address |
| :sector | String | Sector |
| :comment | String | Comment |

**Example**

[http://localhost:8080/v1/index.php?action=add-ip&comment=alice&mac=08:00:27:8B:80:A3&host=DISP001&ip=192.168.1.10&sector=primary](http://localhost:8080/v1/index.php?action=add-ip&comment=alice&mac=08:00:27:8B:80:A3&host=DISP001&ip=192.168.1.10&sector=primary):

```js
{
  "status":"host added successfully"
}
```

**Command**

```
# echo "host DISP001 {hardware ethernet 08:00:27:8B:80:A3; fixed-address 192.168.1.10;} # alice (primary)" | sudo tee --append /etc/dhcp/dhcpd.conf
# sudo service isc-dhcp-server restart
```

```
$ cat /etc/dhcp/dhcpd.conf
```

### Remove reservation

```
/v1/index.php?action=rm-ip&ip=:ip
```

**Params**

| Name | Type | Description |
|-|-|-|
| :ip | String | IP Address |

**Example**

[http://localhost:8080/v1/index.php?action=rm-ip&ip=192.168.1.10](http://localhost:8080/v1/index.php?action=rm-ip&ip=192.168.1.10):

```js
{
  "status":"host removed successfully"
}
```

**Command**

```
# sed '/192.168.1.10/d' /etc/dhcp/dhcpd.conf
# sudo service isc-dhcp-server restart
```

```
$ cat /etc/dhcp/dhcpd.conf
```
