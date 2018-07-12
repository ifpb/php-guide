# Samba API

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

**References:**
- [Ubuntu - What is Samba?](https://help.ubuntu.com/community/Samba)
- [Ubuntu Samba](https://help.ubuntu.com/lts/serverguide/samba.html.en)
  - [File Server](https://help.ubuntu.com/lts/serverguide/samba-fileserver.html.en)
- [Install and configure Samba](https://tutorials.ubuntu.com/tutorial/install-and-configure-samba#0)
- [Accessing an SMB Share With Linux Machines](https://www.tldp.org/HOWTO/SMB-HOWTO-8.html)
- [man smbclient](https://www.samba.org/samba/docs/current/man-html/smbclient.1.html)
- [Client Access - Browsing SMB shares](https://help.ubuntu.com/community/Samba/SambaClientGuide)
- [How to Create a Network Share Via Samba Via CLI](https://help.ubuntu.com/community/How%20to%20Create%20a%20Network%20Share%20Via%20Samba%20Via%20CLI%20%28Command-line%20interface/Linux%20Terminal%29%20-%20Uncomplicated,%20Simple%20and%20Brief%20Way!)

## Services
---

### List reservation

```
/v1/?action=list-ips
```

**Example**

[http://localhost:8080/v1/?action=list-shares](http://localhost:8080/v1/?action=list-shares):

```js
{
  "global": {
    "workgroup": "GROUP",
    "security": "user"
  }
}
```

**Command**

vagrant@smbclient:
```
$ cat /etc/samba/smb.conf
[global]
  workgroup = GROUP
  security = user
```

### Add reservation

```
/v1/?action=add-share&section=:section&user=:user&path=:path&validUsers=:validUsers&comment=:comment
```

**Params**

| Name | Type | Description |
|-|-|-|
| :section | String | section |
| :user | String | user |
| :path | String | path |
| :validUsers | String | validUsers |
| :comment | String | comment |

**Example**

[http://localhost:8080/v1/?action=add-share&section=vagrant&user=vagrant&path=/home/vagrant/shared&validUsers=vagrant&comment=public+folder+of+vagrant](http://localhost:8080/v1/?action=add-share&section=vagrant&user=vagrant&path=/home/vagrant/shared&validUsers=vagrant&comment=public+folder+of+vagrant):

```js
{
  "status": "add shared successfully"
}
```

**Command**

vagrant@smbserver:
```
$ mkdir /home/vagrant/shared

$ sudo smbpasswd -a vagrant
New SMB password:
Retype new SMB password:
Added user vagrant.

$ cat << EOF | sudo tee --append /etc/samba/smb.conf
[vagrant]
  comment = public folder of vagrant
  writeable = yes
  path = /home/vagrant/shared
  browseable = yes
  valid users = vagrant
EOF

# sudo service smbd restart
# sudo service nmbd restart

$ testparm
Load smb config files from /etc/samba/smb.conf
rlimit_max: increasing rlimit_max (1024) to minimum Windows limit (16384)
Processing section "[vagrant]"
Loaded services file OK.
Server role: ROLE_STANDALONE

Press enter to see a dump of your service definitions

# Global parameters
[global]
        workgroup = GROUP
        security = USER
        idmap config * : backend = tdb


[vagrant]
        comment = public folder of vagrant
        path = /home/vagrant/shared
        valid users = vagrant
        read only = No

$ cat /etc/samba/smb.conf
[global]
  workgroup = GROUP
  security = user
[vagrant]
  comment = public folder of vagrant
  path = /home/vagrant/shared
  valid users = vagrant
  writeable = yes
  browseable = yes
```

vagrant@smbclient:
```
$ smbclient //192.168.1.2/vagrant -U vagrant%vagrant
WARNING: The "syslog" option is deprecated
Domain=[GROUP] OS=[Windows 6.1] Server=[Samba 4.3.11-Ubuntu]
smb: \> pwd
Current directory is \\192.168.1.2\vagrant\
smb: \> ls
  .                                   D        0  Thu Jul 12 03:00:54 2018
  ..                                  D        0  Thu Jul 12 03:00:54 2018

                41251136 blocks of size 1024. 37763796 blocks available
smb: \> mkdir test
smb: \> ls
  .                                   D        0  Thu Jul 12 03:10:32 2018
  ..                                  D        0  Thu Jul 12 03:00:54 2018
  test                                D        0  Thu Jul 12 03:10:32 2018

                41251136 blocks of size 1024. 37763792 blocks available
```

<!-- 
TODO
Connect to Server > 192.168.1.2
smb://192.168.1.2/vagrant
$ nautilus smb:///
$ nautilus smb://192.168.1.2/vagrant
$ smbclient -L 192.168.1.2
$ smbclient //192.168.1.2/vagrant -U vagrant%vagrant
smb: \> help
?              allinfo        altname        archive        backup
blocksize      cancel         case_sensitive cd             chmod
chown          close          del            dir            du
echo           exit           get            getfacl        geteas
hardlink       help           history        iosize         lcd
link           lock           lowercase      ls             l
mask           md             mget           mkdir          more
mput           newer          notify         open           posix
posix_encrypt  posix_open     posix_mkdir    posix_rmdir    posix_unlink
print          prompt         put            pwd            q
queue          quit           readlink       rd             recurse
reget          rename         reput          rm             rmdir
showacls       setea          setmode        scopy          stat
symlink        tar            tarmode        timeout        translate
unlock         volume         vuid           wdel           logon
listconnect    showconnect    tcon           tdis           tid
logoff         ..             !
$ smbclient //192.168.1.2/vagrant -U vagrant%vagrant -c "ls"
$ smbclient //192.168.1.2/vagrant -U vagrant -N -c "ls"
$ smbclient //192.168.1.2/vagrant -U vagrant -A ~/.smbclient -c "ls"
$ smbtree
$ mount -t cifs -o <username>,<password> //<servername>/<sharename> /mnt/point/
-->

### Remove reservation

```
/v1/?action=add-share&section=:section
```

**Params**

| Name | Type | Description |
|-|-|-|
| :section | String | section name |

**Example**

[http://localhost:8080/v1/?action=rm-share&section=vagrant](http://localhost:8080/v1/?action=rm-share&section=vagrant):

```js
{
  "status": "remove shared successfully"
}
```

**Command**

vagrant@smbserver:
```
$ mkdir /home/vagrant/shared

$ ?? delete

# sudo service smbd restart
# sudo service nmbd restart

$ cat /etc/samba/smb.conf
[global]
  workgroup = GROUP
  security = user
```

vagrant@smbclient:
```
$ smbclient -L 192.168.1.2
??
```