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
{% include_relative ../Vagrantfile %}
```

### Provision

```sh
{% include_relative ../script/lamp-install.sh %}
```

## Install
---

```sh
$ wget https://github.com/ifpb/php-guide/blob/master/lamp/lamp.zip?raw=true
$ unzip lamp.zip
$ cd lamp
$ vagrant up
$ vagrant suspend
```