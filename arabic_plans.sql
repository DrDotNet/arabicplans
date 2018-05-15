-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 07:13 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arabic_plans`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `main_sector_id` int(11) NOT NULL,
  `sub_sector_id` int(11) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `activity_description` text,
  PRIMARY KEY (`activity_id`),
  KEY `main_sector_id` (`main_sector_id`),
  KEY `sub_sector_id` (`sub_sector_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `main_sector_id`, `sub_sector_id`, `activity_name`, `activity_description`) VALUES
(1, 1, 1, 'مشتقات البان ومخللات', 'مشتقات البان ومخللات مشتقات البان ومخللات مشتقات البان ومخللات مشتقات البان ومخللات مشتقات البان ومخللات');

-- --------------------------------------------------------

--
-- Table structure for table `main_sectors`
--

CREATE TABLE IF NOT EXISTS `main_sectors` (
  `main_sector_id` int(11) NOT NULL AUTO_INCREMENT,
  `main_sector_name` varchar(255) NOT NULL,
  `main_sector_description` text,
  PRIMARY KEY (`main_sector_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `main_sectors`
--

INSERT INTO `main_sectors` (`main_sector_id`, `main_sector_name`, `main_sector_description`) VALUES
(1, 'الصناعة التحويلية', 'الصناعة التحويلية الصناعة التحويلية الصناعة التحويلية الصناعة التحويلية');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
  `plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `project_date` date NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `main_sector_id` int(11) NOT NULL,
  `sub_sector_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `project_type` varchar(50) NOT NULL DEFAULT 'Fund',
  `are_products_manufactured` varchar(12) NOT NULL DEFAULT 'Yes',
  `project_status` varchar(12) NOT NULL DEFAULT 'New',
  `project_target` varchar(255) NOT NULL,
  `is_profit` varchar(12) NOT NULL DEFAULT 'Yes',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`plan_id`),
  KEY `main_sector_id` (`main_sector_id`),
  KEY `sub_sector_id` (`sub_sector_id`),
  KEY `activity_id` (`activity_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`plan_id`, `project_name`, `person_name`, `country`, `city`, `project_date`, `website`, `email`, `phone`, `main_sector_id`, `sub_sector_id`, `activity_id`, `project_type`, `are_products_manufactured`, `project_status`, `project_target`, `is_profit`, `user_id`) VALUES
(1, 'مشروع جديد', 'مهند زعتري', 'فلسطين', 'القدس', '2018-05-12', 'www.example.com', 'info@example.com', '12345678', 1, 1, 1, 'Fund', 'Yes', 'New', '', 'Yes', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sectors`
--

CREATE TABLE IF NOT EXISTS `sub_sectors` (
  `sub_sector_id` int(11) NOT NULL AUTO_INCREMENT,
  `main_sector_id` int(11) NOT NULL,
  `sub_sector_name` varchar(255) NOT NULL,
  `sub_sector_description` text,
  PRIMARY KEY (`sub_sector_id`),
  KEY `main_sector_id` (`main_sector_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sub_sectors`
--

INSERT INTO `sub_sectors` (`sub_sector_id`, `main_sector_id`, `sub_sector_name`, `sub_sector_description`) VALUES
(1, 1, 'صُنع المنتجات الغذائية', 'صُنع المنتجات الغذائية صُنع المنتجات الغذائية صُنع المنتجات الغذائية صُنع المنتجات الغذائية');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(12) NOT NULL DEFAULT 'End User',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `status`, `password`, `type`) VALUES
(3, 'مهند زعتري', 'muhannadk1989@gmail.com', 'Active', '1bac94daa67484b99ba7f03018fa2c5a80502d7d', 'Admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `fk1_activities` FOREIGN KEY (`main_sector_id`) REFERENCES `main_sectors` (`main_sector_id`),
  ADD CONSTRAINT `fk2_activities` FOREIGN KEY (`sub_sector_id`) REFERENCES `sub_sectors` (`sub_sector_id`);

--
-- Constraints for table `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `fk1_plans` FOREIGN KEY (`main_sector_id`) REFERENCES `main_sectors` (`main_sector_id`),
  ADD CONSTRAINT `fk2_plans` FOREIGN KEY (`sub_sector_id`) REFERENCES `sub_sectors` (`sub_sector_id`),
  ADD CONSTRAINT `fk3_plans` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`activity_id`),
  ADD CONSTRAINT `fk4_plans` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sub_sectors`
--
ALTER TABLE `sub_sectors`
  ADD CONSTRAINT `fk1_sub_sectors` FOREIGN KEY (`main_sector_id`) REFERENCES `main_sectors` (`main_sector_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
