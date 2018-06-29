# LAMP Server

## Arquiteture
---

* Linux
* Apache
* MySQL
* PHP

## Vagrant Image
---

* Provider: [Virtual Box](https://www.virtualbox.org)
* [Vagrant](https://www.vagrantup.com) ([Vagrant Cloud](https://app.vagrantup.com/boxes/search))

### Vagrantfile

```rb
Vagrant.configure(2) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.network "forwarded_port", guest: 3306, host: 3306
  config.vm.synced_folder ".", "/var/www/html/php"
  config.vm.provider "virtualbox" do |vb|
    vb.name = "LAMP VM"
  end
  config.vm.provision "shell", path: "script/lamp-install.sh"
end
```

### Provision

[../script/lamp-install.sh](../script/lamp-install.sh)

## Install
---

```sh
$ wget https://github.com/ifpb/php-guide/blob/master/lamp/lamp.zip?raw=true
$ unzip lamp.zip
$ cd lamp
$ vagrant up
$ vagrant ssh
$ exit
$ vagrant suspend
$ curl -i http://localhost:8080/php/phpinfo/
```