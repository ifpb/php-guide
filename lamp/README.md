# LAMP Server

## Stack
---

* Linux
* Apache
* MySQL
* PHP

## Vagrant
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

[../script/lamp-install.sh](https://github.com/ifpb/php-guide/blob/master/script/lamp-install.sh)

## How to use LAMP VM
---

### Downloading Lamp Vagrantfile

[https://github.com/ifpb/php-guide/blob/master/lamp/lamp.zip?raw=true](https://github.com/ifpb/php-guide/blob/master/lamp/lamp.zip?raw=true):
```sh
$ wget https://github.com/ifpb/php-guide/blob/master/lamp/lamp.zip?raw=true
$ curl https://github.com/ifpb/php-guide/blob/master/lamp/lamp.zip?raw=true --output lamp.zip
```

### Extracting files
```sh
$ unzip lamp.zip
$ cd lamp
```

### Creating VM
```sh
$ vagrant up
```

### Outputing status of the VM
```sh
$ vagrant status
```

### Connecting to VM via SSH
```sh
$ vagrant ssh
$ uname -a
$ exit
```

### Checking PHP and Apache Configuration

```sh
$ vagrant ssh
$ php -i
$ php -m
$ ls /var/www/html/php/phpinfo/
```

[http://localhost:8080/php/phpinfo/](http://localhost:8080/php/phpinfo/) ([phpinfo()](http://php.net/manual/en/function.phpinfo.php)):
```sh
$ curl -i http://localhost:8080/php/phpinfo/
```

```sh
$ cd /var/www/html/php/phpinfo/
$ php -S localhost:8090 -t .
```

[http://localhost:8090/](http://localhost:8090/) ([phpinfo()](http://php.net/manual/en/function.phpinfo.php)):
```sh
$ curl -i http://localhost:8090/
```

### Connecting to VM via SSH and running PHP code (Interactive shell)
```
$ vagrant ssh
$ php -a
Interactive shell

php > $x = 10;
php > echo $x;
10
php > exit
```

### Connecting to VM via SSH and running PHP code (File)
```
$ vagrant ssh
$ echo '<?php echo 'Hello world!'; ?>' > hello.php
$ php -f hello.php
Hello world!
```

### Display errors
```
$ vagrant ssh
$ sudo sed -i -r -e 's/display_errors = Off/display_errors = On/g' /etc/php/7.1/apache2/php.ini
$ sudo service apache2 start
```
<!-- 
sed -i -r -e 's/error_reporting = E_ALL & ~E_DEPRECATED/error_reporting = E_ALL | E_STRICT/g' /etc/php5/fpm/php.ini 
-->

### Suspending the VM
```sh
$ vagrant suspend
```
