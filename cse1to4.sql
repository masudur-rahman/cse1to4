-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2018 at 04:03 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse1to4`
--

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `course_id` int(255) NOT NULL,
  `course_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Items_Tags`
--

CREATE TABLE `Items_Tags` (
  `item_tag_id` int(255) NOT NULL,
  `material_id` int(255) NOT NULL,
  `tag_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Items_Tags`
--

INSERT INTO `Items_Tags` (`item_tag_id`, `material_id`, `tag_id`) VALUES
(1, 1, 2),
(2, 1, 6),
(3, 2, 3),
(4, 2, 6),
(5, 2, 10),
(6, 3, 6),
(7, 3, 8),
(8, 4, 2),
(9, 4, 5),
(10, 5, 4),
(11, 6, 4),
(12, 6, 9),
(13, 6, 6),
(14, 7, 10),
(15, 8, 7),
(16, 8, 6),
(17, 8, 4),
(18, 9, 3),
(19, 10, 1),
(20, 10, 7),
(21, 11, 1),
(22, 11, 8),
(23, 12, 5),
(24, 13, 9),
(25, 13, 5),
(26, 13, 8),
(27, 14, 2),
(28, 14, 9),
(29, 15, 7),
(30, 15, 8),
(31, 15, 8),
(32, 16, 2),
(33, 16, 9),
(34, 16, 1),
(35, 17, 5),
(36, 17, 9),
(37, 18, 9),
(38, 18, 7),
(39, 18, 2),
(40, 19, 4),
(41, 20, 5),
(42, 20, 1),
(43, 21, 3),
(44, 22, 8),
(45, 22, 10),
(46, 23, 8),
(47, 24, 8),
(48, 25, 7),
(49, 25, 9),
(50, 25, 8),
(51, 26, 6),
(52, 27, 4),
(53, 27, 9),
(54, 28, 3),
(55, 29, 2),
(56, 29, 2),
(57, 29, 9),
(58, 30, 6),
(59, 31, 10),
(60, 31, 4),
(61, 32, 1),
(62, 32, 9),
(63, 32, 4),
(64, 33, 5),
(65, 34, 6),
(66, 34, 4),
(67, 34, 10),
(68, 35, 9),
(69, 35, 5),
(70, 35, 8),
(71, 36, 1),
(72, 37, 2),
(73, 37, 9),
(74, 37, 2),
(75, 38, 4),
(76, 38, 7),
(77, 39, 1),
(78, 40, 9),
(79, 40, 7),
(80, 40, 6),
(81, 41, 10),
(82, 41, 4),
(83, 42, 1),
(84, 42, 4),
(85, 43, 9),
(86, 43, 3),
(87, 44, 2),
(88, 45, 5),
(89, 46, 6),
(90, 46, 3),
(91, 47, 5),
(92, 48, 10),
(93, 49, 1),
(94, 49, 7),
(95, 49, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Materials`
--

CREATE TABLE `Materials` (
  `material_id` int(255) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date_and_time` datetime(6) NOT NULL,
  `type` varchar(20) NOT NULL,
  `format` varchar(10) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Materials`
--

INSERT INTO `Materials` (`material_id`, `user_id`, `title`, `date_and_time`, `type`, `format`, `url`) VALUES
(1, 's4k1b', 'Test material ppt 1', '2018-05-18 08:36:57.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file1.ppt'),
(2, 's4k1b', 'Test material ppt 2', '2018-05-18 08:36:57.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file2.ppt'),
(3, 's4k1b', 'Test material ppt 3', '2018-05-18 08:36:57.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file3.ppt'),
(4, 's4k1b', 'Test material ppt 4', '2018-05-18 08:36:57.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file4.ppt'),
(5, 's4k1b', 'Test material ppt 5', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file5.ppt'),
(6, 's4k1b', 'Test material ppt 6', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file6.ppt'),
(7, 's4k1b', 'Test material ppt 7', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file7.ppt'),
(8, 's4k1b', 'Test material ppt 8', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file8.ppt'),
(9, 's4k1b', 'Test material ppt 9', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file9.ppt'),
(10, 's4k1b', 'Test material ppt 10', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file10.ppt'),
(11, 's4k1b', 'Test material ppt 11', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file11.ppt'),
(12, 's4k1b', 'Test material ppt 12', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file12.ppt'),
(13, 's4k1b', 'Test material ppt 13', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file13.ppt'),
(14, 's4k1b', 'Test material ppt 14', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file14.ppt'),
(15, 's4k1b', 'Test material ppt 15', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file15.ppt'),
(16, 's4k1b', 'Test material ppt 16', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file16.ppt'),
(17, 's4k1b', 'Test material ppt 17', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file17.ppt'),
(18, 's4k1b', 'Test material ppt 18', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file18.ppt'),
(19, 's4k1b', 'Test material ppt 19', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file19.ppt'),
(20, 's4k1b', 'Test material ppt 20', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file20.ppt'),
(21, 's4k1b', 'Test material ppt 21', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file21.ppt'),
(22, 's4k1b', 'Test material ppt 22', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file22.ppt'),
(23, 's4k1b', 'Test material ppt 23', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file23.ppt'),
(24, 's4k1b', 'Test material ppt 24', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file24.ppt'),
(25, 's4k1b', 'Test material ppt 25', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file25.ppt'),
(26, 's4k1b', 'Test material ppt 26', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file26.ppt'),
(27, 's4k1b', 'Test material ppt 27', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file27.ppt'),
(28, 's4k1b', 'Test material ppt 28', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file28.ppt'),
(29, 's4k1b', 'Test material ppt 29', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file29.ppt'),
(30, 's4k1b', 'Test material ppt 30', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file30.ppt'),
(31, 's4k1b', 'Test material ppt 31', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file31.ppt'),
(32, 's4k1b', 'Test material ppt 32', '2018-05-18 08:36:58.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file32.ppt'),
(33, 's4k1b', 'Test material ppt 33', '2018-05-18 08:36:59.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file33.ppt'),
(34, 's4k1b', 'Test material ppt 34', '2018-05-18 08:36:59.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file34.ppt'),
(35, 's4k1b', 'Test material ppt 35', '2018-05-18 08:36:59.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file35.ppt'),
(36, 's4k1b', 'Test material ppt 36', '2018-05-18 08:36:59.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file36.ppt'),
(37, 's4k1b', 'Test material ppt 37', '2018-05-18 08:36:59.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file37.ppt'),
(38, 's4k1b', 'Test material ppt 38', '2018-05-18 08:36:59.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file38.ppt'),
(39, 's4k1b', 'Test material ppt 39', '2018-05-18 08:36:59.000000', 'lecture_slide', 'ppt', '../Uploaded_Content/ppt/file39.ppt'),
(40, 's4k1b', 'Software Engineering A Practitioner\'s Approach eighth edition-(www.downloadnema.com)', '2018-05-18 03:11:31.436382', 'book', 'pdf', '../Uploaded_Content/pdf/book1.pdf'),
(41, 's4k1b', 'Shoshi Software chotha 41', '2018-05-18 10:06:58.000000', 'note', 'pdf', '../Uploaded_Content/pdf/file41.pdf'),
(42, 's4k1b', 'Shoshi Software chotha 42', '2018-05-18 10:06:58.000000', 'note', 'pdf', '../Uploaded_Content/pdf/file42.pdf'),
(43, 's4k1b', 'Shoshi Software chotha 43', '2018-05-18 10:06:58.000000', 'note', 'pdf', '../Uploaded_Content/pdf/file43.pdf'),
(44, 's4k1b', 'Shoshi Software chotha 44', '2018-05-18 10:06:59.000000', 'note', 'pdf', '../Uploaded_Content/pdf/file44.pdf'),
(45, 's4k1b', 'Shoshi Software chotha 45', '2018-05-18 10:06:59.000000', 'note', 'pdf', '../Uploaded_Content/pdf/file45.pdf'),
(46, 's4k1b', 'Shoshi Software chotha 46', '2018-05-18 10:06:59.000000', 'note', 'pdf', '../Uploaded_Content/pdf/file46.pdf'),
(47, 's4k1b', 'Shoshi Software chotha 47', '2018-05-18 10:06:59.000000', 'note', 'pdf', '../Uploaded_Content/pdf/file47.pdf'),
(48, 's4k1b', 'Shoshi Software chotha 48', '2018-05-18 10:06:59.000000', 'note', 'pdf', '../Uploaded_Content/pdf/file48.pdf'),
(49, 'moksud', 'DSD Question Bank', '2018-05-18 22:54:55.834826', 'question', 'pdf', './Uploaded_Content/pdf/question49.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE `Rating` (
  `rating_id` int(255) NOT NULL,
  `material_id` int(255) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` (`rating_id`, `material_id`, `user_id`, `rating`) VALUES
(1, 1, 's4k1b', 1),
(2, 2, 's4k1b', 1),
(3, 3, 's4k1b', 2),
(4, 4, 's4k1b', 2),
(5, 5, 's4k1b', 1),
(6, 6, 's4k1b', 4),
(7, 7, 's4k1b', 3),
(8, 8, 's4k1b', 1),
(9, 9, 's4k1b', 4),
(10, 10, 's4k1b', 4),
(11, 11, 's4k1b', 2),
(12, 12, 's4k1b', 5),
(13, 13, 's4k1b', 2),
(14, 14, 's4k1b', 5),
(15, 15, 's4k1b', 2),
(16, 16, 's4k1b', 5),
(17, 17, 's4k1b', 1),
(18, 18, 's4k1b', 1),
(19, 19, 's4k1b', 5),
(20, 20, 's4k1b', 2),
(21, 21, 's4k1b', 3),
(22, 22, 's4k1b', 4),
(23, 23, 's4k1b', 4),
(24, 24, 's4k1b', 1),
(25, 25, 's4k1b', 4),
(26, 26, 's4k1b', 4),
(27, 27, 's4k1b', 2),
(28, 28, 's4k1b', 2),
(29, 29, 's4k1b', 2),
(30, 30, 's4k1b', 4),
(31, 31, 's4k1b', 5),
(32, 32, 's4k1b', 2),
(33, 33, 's4k1b', 1),
(34, 34, 's4k1b', 4),
(35, 35, 's4k1b', 4),
(36, 36, 's4k1b', 3),
(37, 37, 's4k1b', 4),
(38, 38, 's4k1b', 1),
(39, 39, 's4k1b', 5),
(40, 40, 's4k1b', 2),
(41, 41, 's4k1b', 1),
(42, 42, 's4k1b', 4),
(43, 43, 's4k1b', 5),
(44, 44, 's4k1b', 4),
(45, 45, 's4k1b', 4),
(46, 46, 's4k1b', 1),
(47, 47, 's4k1b', 2),
(48, 48, 's4k1b', 3),
(49, 49, 's4k1b', 2),
(50, 1, 'sharif', 3),
(51, 2, 'sharif', 1),
(52, 3, 'sharif', 3),
(53, 4, 'sharif', 2),
(54, 5, 'sharif', 2),
(55, 6, 'sharif', 5),
(56, 7, 'sharif', 1),
(57, 8, 'sharif', 5),
(58, 9, 'sharif', 1),
(59, 10, 'sharif', 5),
(60, 11, 'sharif', 4),
(61, 12, 'sharif', 3),
(62, 13, 'sharif', 4),
(63, 14, 'sharif', 4),
(64, 15, 'sharif', 2),
(65, 16, 'sharif', 1),
(66, 17, 'sharif', 5),
(67, 18, 'sharif', 1),
(68, 19, 'sharif', 2),
(69, 20, 'sharif', 3),
(70, 21, 'sharif', 4),
(71, 22, 'sharif', 5),
(72, 23, 'sharif', 3),
(73, 24, 'sharif', 2),
(74, 25, 'sharif', 5),
(75, 26, 'sharif', 4),
(76, 27, 'sharif', 4),
(77, 28, 'sharif', 1),
(78, 29, 'sharif', 2),
(79, 30, 'sharif', 4),
(80, 31, 'sharif', 5),
(81, 32, 'sharif', 3),
(82, 33, 'sharif', 5),
(83, 34, 'sharif', 4),
(84, 35, 'sharif', 5),
(85, 36, 'sharif', 2),
(86, 37, 'sharif', 2),
(87, 38, 'sharif', 4),
(88, 39, 'sharif', 1),
(89, 40, 'sharif', 3),
(90, 41, 'sharif', 4),
(91, 42, 'sharif', 4),
(92, 43, 'sharif', 5),
(93, 44, 'sharif', 3),
(94, 45, 'sharif', 1),
(95, 46, 'sharif', 2),
(96, 47, 'sharif', 2),
(97, 48, 'sharif', 1),
(98, 49, 'sharif', 1),
(99, 1, 'masud', 3),
(100, 2, 'masud', 4),
(101, 3, 'masud', 4),
(102, 4, 'masud', 3),
(103, 5, 'masud', 4),
(104, 6, 'masud', 1),
(105, 7, 'masud', 1),
(106, 8, 'masud', 4),
(107, 9, 'masud', 3),
(108, 10, 'masud', 1),
(109, 11, 'masud', 3),
(110, 12, 'masud', 5),
(111, 13, 'masud', 3),
(112, 14, 'masud', 3),
(113, 15, 'masud', 2),
(114, 16, 'masud', 1),
(115, 17, 'masud', 4),
(116, 18, 'masud', 3),
(117, 19, 'masud', 2),
(118, 20, 'masud', 2),
(119, 21, 'masud', 1),
(120, 22, 'masud', 4),
(121, 23, 'masud', 5),
(122, 24, 'masud', 1),
(123, 25, 'masud', 1),
(124, 26, 'masud', 5),
(125, 27, 'masud', 3),
(126, 28, 'masud', 1),
(127, 29, 'masud', 3),
(128, 30, 'masud', 1),
(129, 31, 'masud', 3),
(130, 32, 'masud', 2),
(131, 33, 'masud', 1),
(132, 34, 'masud', 5),
(133, 35, 'masud', 5),
(134, 36, 'masud', 4),
(135, 37, 'masud', 3),
(136, 38, 'masud', 5),
(137, 39, 'masud', 3),
(138, 40, 'masud', 3),
(139, 41, 'masud', 5),
(140, 42, 'masud', 1),
(141, 43, 'masud', 1),
(142, 44, 'masud', 4),
(143, 45, 'masud', 1),
(144, 46, 'masud', 2),
(145, 47, 'masud', 4),
(146, 48, 'masud', 2),
(147, 49, 'masud', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Tags`
--

CREATE TABLE `Tags` (
  `tag_id` int(255) NOT NULL,
  `tag_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tags`
--

INSERT INTO `Tags` (`tag_id`, `tag_title`) VALUES
(1, 'nlp'),
(2, 'machine_learning'),
(3, 'dip'),
(4, 'se'),
(5, 'matlab'),
(6, 'cpi'),
(7, 'lol'),
(8, 'toc'),
(9, 'db'),
(10, 'security');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `Items_Tags`
--
ALTER TABLE `Items_Tags`
  ADD PRIMARY KEY (`item_tag_id`);

--
-- Indexes for table `Materials`
--
ALTER TABLE `Materials`
  ADD PRIMARY KEY (`material_id`);
ALTER TABLE `Materials` ADD FULLTEXT KEY `title` (`title`,`user_id`,`type`);
ALTER TABLE `Materials` ADD FULLTEXT KEY `title_2` (`title`,`user_id`,`type`);
ALTER TABLE `Materials` ADD FULLTEXT KEY `title_3` (`title`,`user_id`,`type`);
ALTER TABLE `Materials` ADD FULLTEXT KEY `title_4` (`title`,`user_id`,`type`);
ALTER TABLE `Materials` ADD FULLTEXT KEY `title_5` (`title`,`user_id`,`type`);
ALTER TABLE `Materials` ADD FULLTEXT KEY `title_6` (`title`,`user_id`,`type`);
ALTER TABLE `Materials` ADD FULLTEXT KEY `title_7` (`title`,`user_id`,`type`);

--
-- Indexes for table `Rating`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `Tags`
--
ALTER TABLE `Tags`
  ADD PRIMARY KEY (`tag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
