FROM php:7.3-apache

RUN apt -y update \
  && apt install -y \
  snmp
# snmp-mibs-downloader

RUN cp /etc/snmp/snmp.conf /etc/snmp/snmp.conf.original
COPY ./snmp-server/snmp.conf /etc/snmp/snmp.conf

# ifconfig | awk '/inet addr/{print substr($2,6)}'
