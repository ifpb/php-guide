create database ping_api;
use ping_api;

create table request_icmp(
  id int not null auto_increment,
  address varchar(68) not null,
  ip varchar(68) not null,
  transmitted int not null,
  received int not null,
  created_at datetime not null,
  primary key (id)
);

create table packet(
  id int not null auto_increment,
  seq int not null,
  ttl int not null,
  time float not null,
  request_icmp_id int not null,
  primary key (id),
  foreign key (request_icmp_id) references request_icmp(id)
);
