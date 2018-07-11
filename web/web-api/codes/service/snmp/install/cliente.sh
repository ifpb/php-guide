#!/bin/bash

apt-get update
apt-get install -y snmpd
sudo mv /etc/snmp/snmpd.conf /etc/snmp/snmpd.conf.orig
cat <<EOF > /etc/snmp/snmpd.conf
agentaddress :161
rocommunity ifpb default .1
sysLocation "IFPB LAB"
sysContact "Administrador 1"
EOF
service snmpd restart
ifconfig | awk '/inet addr/{print substr($2,6)}'
