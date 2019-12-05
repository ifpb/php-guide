# SNMP API

## Architecture

---

### Configuation

![](assets/architecture.svg)

[Vagrantfile](Vagrantfile):

```ruby
{% include_relative Vagrantfile %}
```

[install/snmpserver.sh](install/snmpserver.sh):

```sh
{% include_relative install/snmpserver.sh %}
```

[install/snmpclient.sh](install/snmpclient.sh):

```sh
{% include_relative install/snmpclient.sh %}
```
