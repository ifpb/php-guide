DROP DATABASE IF EXISTS computer;
CREATE DATABASE computer;
USE computer;

DROP TABLE IF EXISTS `host`;
CREATE TABLE `host` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `host`
  (`name`, `address`)
VALUES
  ('www.google.com', '216.58.222.100');
