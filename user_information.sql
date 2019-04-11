-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 05:26 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `user_name` varchar(30) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `student_id` int(7) DEFAULT NULL,
  `batch` int(2) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `organization` varchar(20) DEFAULT NULL,
  `profile_pcture` text,
  `birth_date` date DEFAULT NULL,
  `password` text NOT NULL,
  `encryptedpassword` text,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`user_name`, `first_name`, `last_name`, `department`, `student_id`, `batch`, `email`, `phone_number`, `address`, `organization`, `profile_pcture`, `birth_date`, `password`, `encryptedpassword`, `reg_date`) VALUES
('aaaaaa', NULL, NULL, NULL, NULL, NULL, 'aaaa@gmail.com', NULL, NULL, NULL, NULL, NULL, '123456', 'é Î%i—]}WH2ßQÞ¯9', '2018-07-03 10:30:27'),
('masudur_rahman', NULL, NULL, NULL, NULL, NULL, 'masudjuly02@gmail.com', NULL, NULL, NULL, NULL, NULL, '123456', 'zZµ1/Ñ(ëé¤', '2018-07-03 10:26:31'),
('omare', NULL, NULL, NULL, NULL, NULL, 'asd@gmail.com', NULL, NULL, NULL, NULL, NULL, '12345', '³''O×«OZ#îÕƒG9í·', '2018-06-30 09:58:50'),
('omar_shari', NULL, NULL, NULL, NULL, NULL, 'as@ag.com', NULL, NULL, NULL, NULL, NULL, '12345', 'äÛ#»0˜Ÿ¡µ…>x', '2018-06-30 09:59:49'),
('omar_sharif', 'om', 'sharif', NULL, 1304003, 13, 'omar.sharif1303@gmail.com', '122', '12333', NULL, NULL, '1995-08-19', '111111', 'Ä™Meñ=5bµNEö¡Ã;', '2018-06-30 09:10:41'),
('s4k1b', NULL, NULL, NULL, NULL, NULL, 's4k1b13@gmail.com', NULL, NULL, NULL, NULL, NULL, '123456', 'Ð éÒûð‘É‡éú Õºø', '2018-07-03 10:24:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`user_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
