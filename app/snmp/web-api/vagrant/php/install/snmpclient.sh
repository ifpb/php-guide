#!/bin/bash

echo "Updating apt"
sudo apt-get -y update > /dev/null

echo "Installing snmp"
apt-get install -y snmpd
sudo mv /etc/snmp/snmpd.conf /etc/snmp/snmpd.conf.backup
cat <<EOF > /etc/snmp/snmpd.conf
agentaddress :161
rocommunity ifpb default .1
sysLocation "IFPB LAB"
sysContact "Administrador 1"
EOF
service snmpd restart
ifconfig | awk '/inet addr/{print substr($2,6)}'

echo "Vagrant finish"