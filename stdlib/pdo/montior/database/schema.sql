DROP DATABASE IF EXISTS monitor;
CREATE DATABASE monitor;
USE monitor;

DROP TABLE IF EXISTS host;
CREATE TABLE host (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
  address varchar(100) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO host
  (name, address)
VALUES
  ('www.google.com', '216.58.222.100');

DROP TABLE IF EXISTS icmp;
CREATE TABLE icmp(
  id int NOT NULL AUTO_INCREMENT,
  transmitted int NOT NULL,
  received int NOT NULL,
  created_at datetime NOT NULL,
  host_id int NOT NULL,
  PRIMARY KEY (id),
  KEY host_id (host_id),
  CONSTRAINT fk_host_id FOREIGN KEY (host_id) REFERENCES host (id)
);

INSERT INTO icmp
  (transmitted, received, created_at, host_id)
VALUES
  (2, 2, NOW(), 1);

DROP TABLE IF EXISTS packet;
CREATE TABLE packet(
  id int NOT NULL AUTO_INCREMENT,
  seq int NOT NULL,
  ttl int NOT NULL,
  time float NOT NULL,
  icmp_id int NOT NULL,
  PRIMARY KEY (id),
  KEY icmp_id (icmp_id),
  CONSTRAINT fk_icmp_id FOREIGN KEY (icmp_id) REFERENCES icmp(id)
);

INSERT INTO packet
  (seq, ttl, time, icmp_id)
VALUES
  (0, 53, 83.023, 1),
  (1, 53, 104.898, 1);
