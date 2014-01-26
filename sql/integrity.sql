-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2014 at 10:09 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `integrity`
--

-- --------------------------------------------------------

--
-- Table structure for table `ethics`
--

CREATE TABLE IF NOT EXISTS `ethics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ethic` varchar(50) NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `ethics`
--

INSERT INTO `ethics` (`id`, `ethic`, `type`) VALUES
(1, 'Abuse of Authority', 0),
(2, 'Abuse of Public Assets', 0),
(3, 'Abusive Behaviour', 0),
(4, 'Administrative Corruption', 0),
(5, 'Behavior or language unbecoming of a public office', 0),
(6, 'Conflict of Interest', 0),
(7, 'Corruption', 0),
(8, 'Crony-ism (favoritism for colleagues/friends)', 0),
(9, 'Double invoicing / dipping', 0),
(10, 'Embezzlement', 0),
(11, 'Extortion', 0),
(12, 'Facilitation Payment', 0),
(13, 'Failure to apply proper due process', 0),
(14, 'Failure to protect a whistle blower', 0),
(15, 'Failure to provide information', 0),
(16, 'Failure to report (a violation)', 0),
(17, 'Favoritism', 0),
(18, 'Fiduciary failure', 0),
(19, 'Financial Fraud', 0),
(20, 'Fraudulent Record-Keeping', 0),
(21, 'Fraudulent Reporting', 0),
(22, 'Ghost Worker', 0),
(23, 'Inadequate Oversight', 0),
(24, 'Interest Peddling', 0),
(25, 'Jumping the queue', 0),
(26, 'Kickbacks', 0),
(27, 'Lack of professionalism', 0),
(28, 'Living beyond ones means', 0),
(29, 'Nepotism', 0),
(30, 'Patronage', 0),
(31, 'Political Corruption', 0),
(32, 'Rigged Bit', 0),
(33, 'Shooting the Messenger', 0),
(34, 'Time Stealing', 0),
(35, 'Trading Influence', 0),
(36, 'Violation of Rule', 0),
(37, 'Vote Buying', 0),
(38, 'Access to Information', 1),
(39, 'Accountability', 1),
(40, 'Courtesy or Helpfulness', 1),
(41, 'Due Process', 1),
(42, 'Going beyond the call of duty', 1),
(43, 'Good Record-Keeping', 1),
(44, 'Merit based Selection/Promotion', 1),
(45, 'Openness / Transparency', 1),
(46, 'Professionalism', 1),
(47, 'Professional Integrity', 1),
(48, 'Questioning Authority', 1),
(49, 'Reporting a Violation', 1),
(50, 'Whistle-blowing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `ethic_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `video_id`, `time`, `ethic_id`, `points`) VALUES
(1, 1, 42, 13, 10),
(2, 1, 58, 49, 5);

-- --------------------------------------------------------

--
-- Table structure for table `scorecard`
--

CREATE TABLE IF NOT EXISTS `scorecard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test_record`
--

CREATE TABLE IF NOT EXISTS `test_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `integrity_type` tinyint(1) NOT NULL,
  `ethic_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `profession` varchar(20) NOT NULL,
  `organization` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `gender`, `age`, `city`, `country`, `qualification`, `profession`, `organization`) VALUES
(1, 'Ayush Maharjan', 'ius.maharjan@gmail.com', 'ayush123', 'male', 20, 'Kathmandu', 'Nepal', 'BE', 'Student', 'KEC');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
