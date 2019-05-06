echo "update & upgrade"
sudo apt update -y > /dev/null
sudo apt upgrade -y > /dev/null

echo "install apache2"
sudo apt install apache2 -y > /dev/null
sudo rm /var/www/html/index.html > /dev/null

echo "install php7.2"
sudo apt install php7.2 php7.2-mysql php7.2-mbstring libssh2-1 php-ssh2 -y > /dev/null
sudo sed -i -r -e 's/display_errors = Off/display_errors = On/g' /etc/php/7.2/apache2/php.ini
sudo systemctl restart apache2 > /dev/null

echo "Installing MySQL"
DBPASSWD=abc123
echo "mysql-server mysql-server/root_password password $DBPASSWD" | sudo debconf-set-selections  > /dev/null
echo "mysql-server mysql-server/root_password_again password $DBPASSWD" | sudo debconf-set-selections  > /dev/null
sudo apt-get -y install mysql-server  > /dev/null
sudo sed -i -r -e 's/127.0.0.1/0.0.0.0/g' /etc/mysql/mysql.conf.d/mysqld.cnf
sudo systemctl restart mysql > /dev/null
mysql -uroot -p"$DBPASSWD" -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '$DBPASSWD' REQUIRE NONE WITH GRANT OPTION; FLUSH PRIVILEGES;"

echo "Vagrant finish"
