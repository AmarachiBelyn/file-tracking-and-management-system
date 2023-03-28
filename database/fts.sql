-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 18, 2023 at 05:44 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fts`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `deptid` int NOT NULL AUTO_INCREMENT,
  `deptName` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`deptid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`deptid`, `deptName`, `creationDate`) VALUES
(4, 'FINANCE', '2023-03-10 10:37:26'),
(11, 'ICT', '2023-03-13 09:23:27'),
(12, 'REGISTRY', '2023-03-13 09:23:40'),
(13, 'Human resource', '2023-03-18 16:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `fileNo` int DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `fileUrl` varchar(255) NOT NULL,
  `insertedBy` varchar(255) NOT NULL,
  `timeInserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `fileNo`, `description`, `department`, `fileUrl`, `insertedBy`, `timeInserted`) VALUES
(5, 'Test002', 384337515, 'Test002', 'ICT', '../uploadReport belinda.docx', '', '2023-03-14 10:11:52'),
(7, 'DOC', 292338317, 'files', 'Finance', 'upload/TEMPLATE.docx', '', '2023-03-14 10:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `user_status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullName`, `userEmail`, `password`, `regDate`, `updationDate`, `role`, `department`, `user_status`) VALUES
(4, 'Test', 'test@gmail.com', '0192023a7bbd73250516f069df18b500', '2023-03-09 11:56:44', NULL, 'super admin', NULL, 1),
(8, 'Test Account', 'account@gmail.com', 'c93ccd78b2076528346216b3b2f701e6', '2023-03-10 10:07:28', NULL, 'admin', NULL, 1),
(9, 'User Account', 'user@gmail.com', '0192023a7bbd73250516f069df18b500', '2023-03-10 10:07:58', NULL, 'user', NULL, 1),
(11, 'Belinda Nacsimiyu', 'belinda@gmail.com', 'admin123', '2023-03-16 21:00:00', '2023-03-17 21:00:00', 'admin', 'ICT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

DROP TABLE IF EXISTS `userlog`;
CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `logindate` varchar(100) DEFAULT NULL,
  `logintime` varchar(100) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ip` varbinary(16) DEFAULT NULL,
  `mac` varbinary(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `logindate`, `logintime`, `user_id`, `username`, `email`, `ip`, `mac`) VALUES
(24, '2023/03/14', '10:35:47am', 0, '', '', 0x3a3a31, 0x33362d36462d32342d31422d43372d35),
(25, '2023/03/14', '10:37:24am', 0, '', '', 0x3a3a31, 0x33362d36462d32342d31422d43372d35),
(26, '2023/03/14', '10:38:56am', 0, '', '', 0x3a3a31, 0x33362d36462d32342d31422d43372d35),
(27, '2023/03/14', '10:41:45am', 0, '', '', 0x3a3a31, 0x33362d36462d32342d31422d43372d35),
(28, '2023/03/14', '10:45:08am', 0, '', '', 0x3a3a31, 0x33362d36462d32342d31422d43372d35),
(29, '2023/03/14', '10:47:00am', 0, '', '', 0x3a3a31, 0x33362d36462d32342d31422d43372d35),
(30, '2023/03/14', '10:53:28am', 0, '', '', 0x3a3a31, 0x33362d36462d32342d31422d43372d35),
(31, '2023/03/14', '10:53:49am', 0, '', '', 0x3a3a31, 0x33362d36462d32342d31422d43372d35),
(32, '2023/03/14', '10:57:23am', 0, '', '', 0x3a3a31, 0x33362d36462d32342d31422d43372d35),
(33, '2023/03/14', '10:58:47am', 0, '', '', 0x3a3a31, 0x33362d36462d32342d31422d43372d35),
(34, '2023/03/14', '11:07:19am', 0, '', '', 0x3a3a31, 0x33362d36462d32342d31422d43372d35),
(35, '2023/03/14', '11:07:45am', 0, '', '', 0x3a3a31, 0x33362d36462d32342d31422d43372d35),
(36, '2023/03/14', '01:25:08pm', 0, '', '', 0x3a3a31, 0x33362d36462d32342d31422d43372d35),
(37, '2023/03/18', '07:20:21pm', 0, '', '', 0x3a3a31, 0x37302d43442d30442d46372d46312d41);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
