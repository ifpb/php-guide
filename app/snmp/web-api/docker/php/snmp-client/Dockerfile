FROM php:7.3-apache

RUN apt -y update \
  && apt install -y \
  snmpd

RUN cp /etc/snmp/snmpd.conf /etc/snmp/snmpd.conf.original
COPY ./snmp-client/snmpd.conf /etc/snmp/snmpd.conf

# service snmpd restart
# ifconfig | awk '/inet addr/{print substr($2,6)}'