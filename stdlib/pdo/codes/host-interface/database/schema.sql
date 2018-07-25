DROP DATABASE IF EXISTS `computer`;
CREATE DATABASE `computer`;
USE `computer`;

DROP TABLE IF EXISTS `host`;
CREATE TABLE `host` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `host`
  (`name`)
VALUES
  ('pc01');

DROP TABLE IF EXISTS `interface`;
CREATE TABLE `interface` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `mask` varchar(100) NOT NULL,
  `mac` varchar(100) NOT NULL,
  `host_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `ip_uniq` (`ip`),
  INDEX `host_id` (`host_id`),
  CONSTRAINT `host_id_fk` 
    FOREIGN KEY (`host_id`) 
    REFERENCES `host` (`id`)
);

INSERT INTO `interface`
  (`name`, `ip`, `mask`, `mac`, `host_id`)
VALUES
  ('eth0', '216.58.222.100', '255.255.255.0', '08:00:27:8B:80:A3', 1),
  ('eth2', '10.0.1.10', '255.255.255.0', '08:00:27:8B:80:A4', 1);
