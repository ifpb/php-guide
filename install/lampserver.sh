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
sudo cp /var/www/html/php/install/ssh2.so /usr/lib/php/20160303/ssh2.so
echo 'extension=ssh2.so' | sudo tee --append /etc/php/7.1/mods-available/ssh2.ini
sudo ln -s /etc/php/7.1/mods-available/ssh2.ini /etc/php/7.1/cli/conf.d/20-ssh2.ini
sudo sed -i -r -e 's/display_errors = Off/display_errors = On/g' /etc/php/7.1/apache2/php.ini
echo -e "\n\n[ssh2]\nextension=ssh2.so" | sudo tee --append /etc/php/7.1/apache2/php.ini
sudo service apache2 restart > /dev/null
sudo rm /var/www/html/index.html > /dev/null

echo "Installing MySQL"
DBPASSWD=abc123
echo "mysql-server mysql-server/root_password password $DBPASSWD" | sudo debconf-set-selections  > /dev/null
echo "mysql-server mysql-server/root_password_again password $DBPASSWD" | sudo debconf-set-selections  > /dev/null
  sudo apt-get -y install mysql-server  > /dev/null
# https://support.plesk.com/hc/en-us/articles/213904365-How-to-enable-remote-access-to-MySQL-database-server
sudo sed -i -r -e 's/127.0.0.1/0.0.0.0/g' /etc/mysql/my.cnf
sudo service mysql restart > /dev/null
mysql -uroot -p"$DBPASSWD" -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '$DBPASSWD' REQUIRE NONE WITH GRANT OPTION; FLUSH PRIVILEGES;"

echo "Vagrant finish"