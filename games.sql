-- Adminer 4.2.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `uuid` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `od_version` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `creator` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `port` int(11) NOT NULL,
  `label` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `descr` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY `uuid` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- 2015-06-01 11:48:00
