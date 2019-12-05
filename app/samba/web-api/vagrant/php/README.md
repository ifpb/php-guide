# Vagrant VirtualBox

![](assets/architecture.svg)

[Vagrantfile](Vagrantfile):

```ruby
{% include_relative Vagrantfile %}
```

[install/smbserver.sh](install/smbserver.sh):

```sh
{% include_relative install/smbserver.sh %}
```

[install/smbclient.sh](install/smbclient.sh):

```sh
{% include_relative install/smbclient.sh %}
```

[install/smb.conf](install/smb.conf):

```
{% include_relative install/smb.conf %}
```

```
[vagrant]
  comment = public folder of vagrant
  path = /home/vagrant/shared
  valid users = vagrant
  writeable = yes
  browseable = yes
```
