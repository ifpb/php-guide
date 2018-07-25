DROP DATABASE IF EXISTS `computer`;
CREATE DATABASE `computer`;
USE `computer`;

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) NOT NULL,
  `mask` varchar(100) NOT NULL,
  `mac` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `ip_uniq` (`ip`)
);

INSERT INTO `address`
  (`ip`, `mask`, `mac`)
VALUES
  ('216.58.222.100', '255.255.255.0', '08:00:27:8B:80:A3');

DROP TABLE IF EXISTS `host`;
CREATE TABLE `host` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address_id` int NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `address_id` (`address_id`),
  CONSTRAINT `address_id_fk` 
    FOREIGN KEY (`address_id`) 
    REFERENCES `address` (`id`)
    ON DELETE CASCADE
);

INSERT INTO `host`
  (`name`, `address_id`)
VALUES
  ('www.google.com', 1);
