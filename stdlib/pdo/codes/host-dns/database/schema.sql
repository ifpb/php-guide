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
  ('pc01'),
  ('pc02');

DROP TABLE IF EXISTS `dns`;
CREATE TABLE `dns` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `dns`
  (`ip`)
VALUES
  ('8.8.8.8'),
  ('8.8.4.4');

DROP TABLE IF EXISTS `host_dns`;
CREATE TABLE `host_dns` (
  `id` int NOT NULL AUTO_INCREMENT,
  `host_id` int NOT NULL,
  `dns_id` int NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `host_id` (`host_id`),
  INDEX `dns_id` (`dns_id`),
  CONSTRAINT `host_id_fk` 
    FOREIGN KEY (`host_id`) 
    REFERENCES `host` (`id`),
  CONSTRAINT `dns_id_fk` 
    FOREIGN KEY (`dns_id`) 
    REFERENCES `dns` (`id`)
);

INSERT INTO `host_dns`
  (`host_id`, `dns_id`)
VALUES
  (1, 1),
  (1, 2),
  (2, 1);
