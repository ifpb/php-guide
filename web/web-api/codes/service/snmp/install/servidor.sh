#!/bin/bash

apt-get update
apt-get install -y snmp snmp-mibs-downloader
sudo mv /etc/snmp/snmp.conf /etc/snmp/snmp.conf.original
echo "#mibs:" > /etc/snmp/snmp.conf
ifconfig | awk '/inet addr/{print substr($2,6)}'
