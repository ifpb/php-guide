# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure(2) do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://atlas.hashicorp.com/search.
  # $ vagrant box list
  config.vm.box = "ubuntu/trusty64"

  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.
  # config.vm.box_check_update = false

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.network "forwarded_port", guest: 3306, host: 3306

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  # config.vm.network "private_network", ip: "192.168.33.10"

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network "public_network"

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  # config.vm.synced_folder "../data", "/vagrant_data"
  config.vm.synced_folder ".", "/var/www/html/php"

  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:
  #
  # config.vm.provider "virtualbox" do |vb|
  #   # Display the VirtualBox GUI when booting the machine
  #   vb.gui = true
  #
  #   # Customize the amount of memory on the VM:
  #   vb.memory = "1024"
  # end
  #
  # View the documentation for the provider you are using for more
  # information on available options.
  config.vm.provider "virtualbox" do |vb|
    vb.name = "LAMP VM"
  end

  # Define a Vagrant Push strategy for pushing to Atlas. Other push strategies
  # such as FTP and Heroku are also available. See the documentation at
  # https://docs.vagrantup.com/v2/push/atlas.html for more information.
  # config.push.define "atlas" do |push|
  #   push.app = "YOUR_ATLAS_USERNAME/YOUR_APPLICATION_NAME"
  # end

  # Enable provisioning with a shell script. Additional provisioners such as
  # Puppet, Chef, Ansible, Salt, and Docker are also available. Please see the
  # documentation for more information about their specific syntax and use.
  # config.vm.provision "shell", inline: <<-SHELL
  #   sudo apt-get update
  #   sudo apt-get install -y apache2
  # SHELL
  config.vm.provision "shell", inline: <<-SHELL

    echo "Changing password"
    # passwd -d -u ubuntu
    # chage -d0 ubuntu
    # echo "ubuntu:ubuntu" | sudo chpasswd

    echo "Updating apt"
    sudo apt-get -y update > /dev/null

    echo "Installing Apache"
    sudo apt-get -y install apache2 > /dev/null

    echo "Installing PHP"
    sudo LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php > /dev/null
    sudo apt-get -y update > /dev/null
    sudo LC_ALL=C.UTF-8 apt-get -y install php7.1 php7.1-mysql > /dev/null
    sudo service apache2 restart > /dev/null

    echo "Configurating PHP SSH2"
    # https://gist.github.com/magnetikonline/48ce1d1dca53b44666ba9332bc41c698
    sudo apt-get -y install autoconf libssh2-1-dev > /dev/null
    sudo cp /var/www/html/php/ssh2.so /usr/lib/php/20160303/ssh2.so
    echo 'extension=ssh2.so' | sudo tee --append /etc/php/7.1/mods-available/ssh2.ini
    sudo ln -s /etc/php/7.1/mods-available/ssh2.ini /etc/php/7.1/cli/conf.d/20-ssh2.ini
    sudo sed -i -r -e 's/display_errors = Off/display_errors = On/g' /etc/php/7.1/apache2/php.ini
    echo "\n\n[ssh2]\nextension=ssh2.so" | sudo tee --append /etc/php/7.1/apache2/php.ini
    sudo service apache2 restart > /dev/null

    echo "Installing MySQL"
    DBPASSWD=abc123
    echo "mysql-server mysql-server/root_password password $DBPASSWD" | sudo debconf-set-selections  > /dev/null
    echo "mysql-server mysql-server/root_password_again password $DBPASSWD" | sudo debconf-set-selections  > /dev/null
      sudo apt-get -y install mysql-server  > /dev/null
    # https://support.plesk.com/hc/en-us/articles/213904365-How-to-enable-remote-access-to-MySQL-database-server
    sudo sed -i -r -e 's/127.0.0.1/0.0.0.0/g' /etc/mysql/my.cnf
    sudo service mysql restart > /dev/null
    mysql -uroot -p"$DBPASSWD" -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '$DBPASSWD' REQUIRE NONE WITH GRANT OPTION; FLUSH PRIVILEGES;"

    echo "Vagrant finish installing"
  SHELL
end
