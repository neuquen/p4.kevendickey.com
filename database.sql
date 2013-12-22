-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2013 at 03:14 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kevendic_p4_kevendickey_com`
--
CREATE DATABASE IF NOT EXISTS `kevendic_p4_kevendickey_com` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `kevendic_p4_kevendickey_com`;

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE IF NOT EXISTS `budgets` (
  `budget_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `income` decimal(18,2) NOT NULL,
  `expenses` decimal(18,2) NOT NULL,
  `housing` decimal(18,2) NOT NULL,
  `utilities` decimal(18,2) NOT NULL,
  `food` decimal(18,2) NOT NULL,
  `automobile` decimal(18,2) NOT NULL,
  `debt` decimal(18,2) NOT NULL,
  `medical` decimal(18,2) NOT NULL,
  `insurance` decimal(18,2) NOT NULL,
  `personal` decimal(18,2) NOT NULL,
  `entertainment` decimal(18,2) NOT NULL,
  `other` decimal(18,2) NOT NULL,
  PRIMARY KEY (`budget_id`),
  UNIQUE KEY `user_id_2` (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=556 ;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`budget_id`, `created`, `modified`, `user_id`, `income`, `expenses`, `housing`, `utilities`, `food`, `automobile`, `debt`, `medical`, `insurance`, `personal`, `entertainment`, `other`) VALUES
(250, 1387645751, 1387645751, 1, '100.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`) VALUES
(1, 1386036622, 0, '4841465b798db96dc890e18edab9b10a658bb470', '0e7e63a04adf3b10927092c0d456436ed81f37be', 0, '', 'Keven', 'D', 'k@d.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budgets`
--
ALTER TABLE `budgets`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
