FROM php:7.3-apache

RUN apt -y update \
  && apt install -y \
  libssh2-1-dev \
  libssh2-1 \
  mariadb-client \
  iputils-ping \
  cron \
  git \
  vim

## ssh server
RUN apt -y install openssh-server
RUN echo 'root:root' | chpasswd
RUN sed -i 's/\#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

## ssh2 package
RUN cd /tmp && git clone https://git.php.net/repository/pecl/networking/ssh2.git && cd /tmp/ssh2 \
  && phpize && ./configure && make && make install \
  && docker-php-ext-enable ssh2

## pdo_mysql package
RUN docker-php-ext-install pdo_mysql

## samba server
RUN apt -y install samba
COPY ./samba-server/smb.conf /etc/samba/smb.conf

## supervisord
RUN apt -y install supervisor
COPY ./samba-server/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
CMD ["/usr/bin/supervisord"]
