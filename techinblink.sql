-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2013 at 05:53 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.6-1ubuntu1.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `techinblink`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `to` tinyint(2) unsigned NOT NULL,
  `from` tinyint(2) unsigned NOT NULL,
  `note` varchar(140) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `readtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `to`, `from`, `note`, `time`, `readtime`) VALUES
(1, 3, 3, 'sfddfsdfsdfdsf', '2013-10-15 13:56:54', '0000-00-00 00:00:00'),
(2, 3, 3, 'dfsdfsdfdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 0, '', '2013-10-16 14:06:41', '0000-00-00 00:00:00'),
(4, 3, 3, '444444', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 3, 3, '42323232', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 3, 3, '--------', '2013-10-16 14:08:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(70) NOT NULL,
  `url` varchar(100) NOT NULL,
  `text` tinytext NOT NULL,
  `image` varchar(22) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `user_id` tinyint(2) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `draft` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `url`, `text`, `image`, `link`, `user_id`, `time`, `publish`, `draft`) VALUES
(1, '', '', 'azmayesh', NULL, '', 3, '2013-10-11 06:06:46', 0, 0),
(2, '', '', 'saladfdfdf dfdfm', NULL, '', 3, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'User',
  `password` char(40) NOT NULL,
  `deactivate` tinyint(1) NOT NULL DEFAULT '0',
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(6) NOT NULL DEFAULT 'df.png',
  `mobile` varchar(13) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `gplus` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `role`, `password`, `deactivate`, `modified`, `created`, `avatar`, `mobile`, `facebook`, `twitter`, `gplus`, `location`) VALUES
(3, 'cyletech@gmail.com', 'Alireza Eskandarpour Shoferi', 'Supervisor', 'bf3f818a0cd62cb0a2d39862ffd90214d9c8ac11', 0, '2013-10-15 13:34:30', '2013-09-23 20:49:00', '3.png', '34333', 'http://www.google.com', '', '', 'Alborz, Iran');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
