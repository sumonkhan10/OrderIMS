-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2014 at 09:54 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orderims_dev`
--
CREATE DATABASE IF NOT EXISTS `orderims_dev` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `orderims_dev`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--
-- Creation: Mar 15, 2014 at 05:25 AM
--

DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `issue_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_issue` (`issue_id`),
  KEY `FK_comment_author` (`create_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- RELATIONS FOR TABLE `tbl_comment`:
--   `issue_id`
--       `tbl_issue` -> `id`
--   `create_user_id`
--       `tbl_user` -> `id`
--

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `content`, `issue_id`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 'Hang tag don''t approve, have to resubmit', 1, '2014-02-26 08:54:01', 3, '2014-02-27 07:18:17', 1),
(2, 'Woven & Size label approved', 1, '2014-03-01 10:23:09', 4, '2014-03-01 10:23:09', 4),
(3, 'পলির কাজ কে দ্যাখে ', 1, '2014-03-07 22:54:55', 1, '2014-03-08 00:25:24', 1),
(4, 'রনি দ্যাখে', 1, '2014-03-14 06:10:56', 2, '2014-03-14 06:10:56', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issue`
--
-- Creation: Mar 15, 2014 at 05:25 AM
--

DROP TABLE IF EXISTS `tbl_issue`;
CREATE TABLE IF NOT EXISTS `tbl_issue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `project_name` varchar(256) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `requester_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_issue_project` (`project_name`(255)),
  KEY `FK_issue_owner` (`owner_id`),
  KEY `FK_issue_requester` (`requester_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- RELATIONS FOR TABLE `tbl_issue`:
--   `owner_id`
--       `tbl_user` -> `id`
--   `requester_id`
--       `tbl_user` -> `id`
--

--
-- Dumping data for table `tbl_issue`
--

INSERT INTO `tbl_issue` (`id`, `name`, `description`, `project_name`, `type_id`, `status_id`, `owner_id`, `requester_id`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 'Sample approved from buying houses', 'We submit kitaro 135 colletion samples for approval. Pls request all marketing exequitive to leave  a comment about there approval', 'Square Fashion Accessories ', 2, 1, 2, 1, '2014-02-05 07:30:11', 1, '2014-03-02 06:13:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--
-- Creation: Mar 15, 2014 at 05:25 AM
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `image`, `username`, `password`, `last_login_time`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 'sumonkhan10@gmail.com', '5655-Khan.JPG', 'sumonkhan10', 'e10adc3949ba59abbe56e057f20f883e', '2014-03-14 06:06:07', '2014-02-02 08:30:33', 1, '2014-02-16 16:35:27', 1),
(2, 'joyee10@gmail.com', '323-Joyee.jpg', 'joyee10', 'e10adc3949ba59abbe56e057f20f883e', '2014-03-14 06:10:41', '2014-02-03 07:55:59', 1, '2014-02-16 18:54:47', 1),
(3, 'nanidnegarsiumi@yahoo.com', '1944-sumi.jpg', 'nahid10', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2014-02-16 18:33:38', 1, '2014-02-20 08:10:46', 1),
(4, 'myjulislamkhoka@gmail.com', '7379-Khoka.jpg', 'khoka', 'e10adc3949ba59abbe56e057f20f883e', '2014-03-01 10:20:25', '2014-02-27 07:30:27', 1, '2014-02-27 07:30:27', 1),
(5, 'hasanimranrony@gmail.com', '5280-Rony.jpg', 'rony', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2014-02-27 07:31:50', 1, '2014-02-27 07:31:50', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_1` FOREIGN KEY (`issue_id`) REFERENCES `tbl_issue` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_comment_ibfk_2` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_issue`
--
ALTER TABLE `tbl_issue`
  ADD CONSTRAINT `tbl_issue_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_issue_ibfk_2` FOREIGN KEY (`requester_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
