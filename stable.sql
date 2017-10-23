-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `horses`;
CREATE TABLE `horses` (
  `horse_id` int(127) NOT NULL AUTO_INCREMENT,
  `horse_name` text NOT NULL,
  `horse_picture` varchar(127) NOT NULL,
  PRIMARY KEY (`horse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `horses` (`horse_id`, `horse_name`, `horse_picture`) VALUES
(1,	'Mummi',	'img/mummi.jpg');

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `user_id` int(127) NOT NULL,
  `slot_id` int(127) NOT NULL,
  `trainer_id` int(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `slots`;
CREATE TABLE `slots` (
  `slot_id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime_start` datetime NOT NULL,
  `datetime_finish` datetime NOT NULL,
  PRIMARY KEY (`slot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `slots` (`slot_id`, `datetime_start`, `datetime_finish`) VALUES
(1,	'2017-11-01 08:00:00',	'2017-11-01 08:59:00');

DROP TABLE IF EXISTS `trainers`;
CREATE TABLE `trainers` (
  `trainer_id` int(11) NOT NULL AUTO_INCREMENT,
  `trainer_name` text NOT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(127) NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `user_phone` varchar(127) NOT NULL,
  `user_level` int(9) NOT NULL,
  `user_address` varchar(127) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`user_id`, `user_name`, `user_phone`, `user_level`, `user_address`) VALUES
(1,	'Pekka Mintu',	'+35812341234',	1,	'Finish Street 123');

-- 2017-10-23 11:55:20