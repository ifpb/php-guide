# LAMP Server (Vagrant)

- [References](#references)
- [Files](#files)
- [Vagrantfile](#vagrantfile)
- [Provision](#provision)
- [Creating LAMP](#creating-lamp)
- [Checking PHP](#checking-php)
- [Connecting to VM via SSH and running PHP code (Interactive shell)](#connecting-to-vm-via-ssh-and-running-php-code-interactive-shell)
- [Connecting to VM via SSH and running PHP code (File)](#connecting-to-vm-via-ssh-and-running-php-code-file)
- [Vagrant commands](#vagrant-commands)

## References

---

- [Vagrant](https://www.vagrantup.com)
- [Vagrant Cloud](https://app.vagrantup.com/boxes/search))
- Provider: [Virtual Box](https://www.virtualbox.org)

## Files

---

```bash
$ tree vagrant/
vagrant/
├── Vagrantfile
├── install
│   └── lamp.sh
└── src
    └── index.php

2 directories, 3 files
```

## Vagrantfile

---

**Vagrantfile:**

```rb
{% include_relative Vagrantfile %}
```

## Provision

---

**install/lamp.sh:**

```rb
{% include_relative install/lamp.sh %}
```

## Creating LAMP

---

```bash
$ cd vagrant

$ vagrant up

$ vagrant status

$ curl -i http://localhost:8080/

$ vagrant suspend
```

## Checking PHP

---

```sh
$ vagrant ssh

$ php -i

$ php -m
```

## Connecting to VM via SSH and running PHP code (Interactive shell)

---

```
$ vagrant ssh
$ php -a
Interactive shell

php > $x = 10;
php > echo $x;
10
php > exit
```

## Connecting to VM via SSH and running PHP code (File)

---

```
$ vagrant ssh
$ echo '<?php echo 'Hello world!'; ?>' > hello.php
$ php -f hello.php
Hello world!
```

## Vagrant commands

---

- `vagrant box add <image>`
- `vagrant box list`
- `vagrant destroy`
- `vagrant ssh`
- `vagrant status`
- `vagrant suspend`
- `vagrant up`

<!--
sed -i -r -e 's/error_reporting = E_ALL & ~E_DEPRECATED/error_reporting = E_ALL | E_STRICT/g' /etc/php5/fpm/php.ini
-->
