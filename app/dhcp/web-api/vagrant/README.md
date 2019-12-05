# DHCP

## Architecture

---

![](assets/architecture.svg)

> [Vagrantfile](php/Vagrantfile):

```ruby
{% include_relative php/Vagrantfile %}
```

> [install/dhcpserver.sh](php/install/dhcpserver.sh):

```sh
{% include_relative php/install/dhcpserver.sh %}
```

> [install/dhcpd.conf](php/install/dhcpd.conf):

```
{% include_relative php/install/dhcpd.conf %}
```

Set Up DHCP Reservations (`deny unknown-clients`):

```
host DISP001 {hardware ethernet 08:00:27:8B:80:A3; fixed-address 192.168.1.10;} # alice (primary)
host DISP002 {hardware ethernet 08:00:27:8B:80:A4; fixed-address 192.168.1.11;} # bob (primary)
host DISP003 {hardware ethernet 08:00:27:8B:80:A5; fixed-address 192.168.1.12;} # charlie (secondary)
```

**References:**

- [Ubuntu isc-dhcp-server](https://help.ubuntu.com/community/isc-dhcp-server)
