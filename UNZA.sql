-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2023 at 07:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `UNZA`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `docket_id` int(10) NOT NULL,
  `case_id` int(10) NOT NULL,
  `time_reported` varchar(50) NOT NULL,
  `investigator` varchar(50) NOT NULL,
  `offence` varchar(40) NOT NULL,
  `locations` varchar(50) NOT NULL,
  `value_stolen` varchar(50) NOT NULL,
  `value_recovered` varchar(50) NOT NULL,
  `date_arrest` varchar(50) NOT NULL,
  `accused_id` int(10) NOT NULL,
  `victim_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`docket_id`, `case_id`, `time_reported`, `investigator`, `offence`, `locations`, `value_stolen`, `value_recovered`, `date_arrest`, `accused_id`, `victim_id`) VALUES
(1, 10, 'asd', 'asd', 'asa', 'sss', 'sddd', 'myine', 'gall', 0, 0),
(2, 0, 'come', 'come', 'come', 'come', 'come', 'monday', 'philip', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `complainant`
--

CREATE TABLE `complainant` (
  `case_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `nrc` varchar(15) NOT NULL,
  `computer_number` int(11) DEFAULT NULL,
  `campus` varchar(50) NOT NULL,
  `location` varchar(60) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `crime` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `number_of_accused` int(10) DEFAULT NULL,
  `number_of_witnesses` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complainant`
--

INSERT INTO `complainant` (`case_id`, `name`, `phone`, `occupation`, `nrc`, `computer_number`, `campus`, `location`, `age`, `gender`, `crime`, `date_added`, `number_of_accused`, `number_of_witnesses`) VALUES
(4, 'lamda', '1234556678', 'Male', '123456789', 0, 'Main', 'International', 12, 'Male', 'Robbing', '2023-10-24 10:18:43', NULL, NULL),
(7, 'him', '123123123', 'Civilian', '1231231231', 0, 'Ridgeway', 'Soweto', 11, 'Female', 'Robbing', '2023-11-15 03:10:32', NULL, NULL),
(8, 'wo know', '122342342', 'Male', '12412412', 0, 'Ridgeway', 'Soweto', 33, 'Male', 'Theft Case', '2023-11-15 03:14:36', NULL, NULL),
(9, 'fcds', '234234234', 'Male', '234234232', 0, 'Main', 'International', 61, 'Male', 'vandalism', '2023-11-15 03:15:57', NULL, NULL),
(10, 'hallo', '1231231231', 'Lecturer', '1231231231', 0, 'Ridgeway', 'Kalingalinga', 22, 'Male', 'Defilement', '2023-11-15 10:38:56', NULL, NULL),
(11, 'hallom', '0987654357', 'Male', '222257/11/1', 0, 'Main', 'International', 17, 'Male', 'Murder Case', '2023-11-15 12:35:23', NULL, NULL),
(12, 'falser', '0977556677', 'Male', '657890/09/1', 0, 'Main', 'International', 27, 'Female', 'Robbing', '2023-11-15 12:38:01', NULL, NULL),
(13, 'girls', '0967453344', 'Male', '567348/23/1', 0, 'Main', 'International', 7, 'Male', 'Assault', '2023-11-15 12:44:23', NULL, NULL),
(14, 'hims', '0978998877', 'Male', '768901/12/1', 0, 'Main', 'International', 22, 'Male', 'Assault', '2023-11-15 12:53:37', NULL, NULL),
(15, 'thdhdhd', '0967956644', 'Male', '222257/11/5', NULL, 'Main', 'hostel-Africa', 44, 'Male', 'assault', '2023-11-16 17:51:12', NULL, NULL),
(16, 'hhhh', '0967453379', 'Male', '222257/11/9', NULL, 'Main', 'school-Agriculture', 33, 'Male', 'theft', '2023-11-16 18:29:49', NULL, NULL),
(17, 'mull', '0967456644', 'Male', '222257/11/1', NULL, 'Main', 'Confucious-school', 22, 'Male', 'murder', '2023-11-16 19:11:34', NULL, NULL),
(18, 'mull', '0967456644', 'Male', '222257/11/1', NULL, 'Main', 'Confucious-school', 22, 'Male', 'murder', '2023-11-16 19:11:48', NULL, NULL),
(19, 'mull', '0967456644', 'Male', '222257/11/1', NULL, 'Main', 'Confucious-school', 22, 'Male', 'murder', '2023-11-16 19:12:29', NULL, NULL),
(20, 'mull', '0967456644', 'Male', '222257/11/1', NULL, 'Main', 'Confucious-school', 22, 'Male', 'murder', '2023-11-16 19:13:18', NULL, NULL),
(21, 'mull', '0967456644', 'Male', '222257/11/1', NULL, 'Main', 'Confucious-school', 22, 'Male', 'murder', '2023-11-16 19:14:15', NULL, NULL),
(22, 'hhhhhh', '0967956647', 'Lecturer', '222267/11/9', NULL, 'Main', 'school', 33, 'Male', 'theft', '2023-11-16 19:34:15', NULL, NULL),
(23, 'shadrick', '0967453344', 'Male', '222257/11/9', NULL, 'Ridgeway', 'school', 43, 'Male', 'murder', '2023-11-16 19:35:44', NULL, NULL),
(24, 'hhghg', '0967956644', 'Male', '222257/11/1', NULL, 'Main', 'Biology-school', 23, 'Male', 'assault', '2023-11-16 19:44:04', NULL, NULL),
(25, 'sjdfjhdghscgj', '0967456644', 'Male', '222257/11/5', NULL, 'Ridgeway', 'Vet-school', 12, 'Male', 'domestic-violence', '2023-11-16 19:44:52', NULL, NULL),
(26, 'tytdshgdh', '0987654321', 'Male', '222257/11/5', NULL, 'Main', 'Goma Lakes', 15, 'Male', 'murder', '2023-11-16 19:46:58', NULL, NULL),
(27, 'ajssgjagskjda', '0967453344', 'Male', '222257/11/9', NULL, 'Main', 'Goma Fields', 22, 'Male', 'murder', '2023-11-16 19:48:23', NULL, NULL),
(28, 'hajajksgdas', '0987654321', 'Male', '222257/11/5', NULL, 'Main', 'Soweto-hostel', 13, 'Male', 'murder', '2023-11-16 19:54:39', NULL, NULL),
(29, 'chims', '0967453344', 'Lecturer', '222257/11/1', NULL, 'Ridgeway', 'President-hostel', 44, 'Male', 'domestic-violence', '2023-11-16 20:24:45', NULL, NULL),
(30, 'Reuben Banks', '0976832324', 'Student', '674589/98/1', NULL, 'Main', 'Goma Fields', 24, 'Male', 'theft', '2023-11-19 18:31:33', 1, 2),
(31, 'Reuben Banks', '0976832324', 'Student', '674589/98/1', NULL, 'Main', 'Goma Fields', 24, 'Male', 'theft', '2023-11-19 18:41:31', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `crime_type`
--

CREATE TABLE `crime_type` (
  `id` int(11) NOT NULL,
  `des` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crime_type`
--

INSERT INTO `crime_type` (`id`, `des`) VALUES
(1, 'Domestic Violence'),
(2, 'Murder Case'),
(3, 'Assault'),
(4, 'Theft Case'),
(5, 'Defilement'),
(6, 'Robbing'),
(9, 'vandalism');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hostel_id` int(2) NOT NULL,
  `hostel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`hostel_id`, `hostel`) VALUES
(1, 'International'),
(2, 'President'),
(3, 'Kwacha'),
(4, 'Africa'),
(5, 'Soweto'),
(6, 'Kalingalinga'),
(7, 'Tiyende Pamodzi'),
(8, 'Zambezi'),
(9, 'October'),
(10, 'Mwanawasa');

-- --------------------------------------------------------

--
-- Table structure for table `investigation`
--

CREATE TABLE `investigation` (
  `case_id` int(11) NOT NULL,
  `investigator` varchar(100) NOT NULL,
  `statement` longtext NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `investigation`
--

INSERT INTO `investigation` (`case_id`, `investigator`, `statement`, `date_added`) VALUES
(4, 'Gloria Chiesa', 'hallo my friend', '2023-11-22 20:05:39'),
(4, 'Gloria Chiesa', 'gasfajs ajsg ajsgja sgaj ', '2023-11-22 20:07:01'),
(4, 'Gloria Chiesa', 'ttuiutyv uqywuqwyq qwyqiw', '2023-11-22 20:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `case_id` int(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `nam` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `res_address` varchar(40) NOT NULL,
  `bus_address` varchar(40) NOT NULL,
  `identity_num` varchar(10) NOT NULL,
  `occupation` varchar(40) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `village` varchar(50) NOT NULL,
  `chief` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `statement` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`case_id`, `role`, `nam`, `gender`, `res_address`, `bus_address`, `identity_num`, `occupation`, `nationality`, `phone`, `village`, `chief`, `district`, `statement`) VALUES
(1, 'vic', 'phil', 'male', 'wewer', 'werwer', 'wwerwe', 'werwe', 'wewe', 'wewer', 'werewr', 'werwer', 'werwer', 'this is philip'),
(1, 'acc', 'gloria', 'asdas', 'asdasdasda', 'asdasd', 'asdas', 'asdasd', 'asdasdasdas', 'asdasd', 'asdasd', 'asdasd', 'asdas', 'this is for gloria'),
(10, 'vic', 'asd', 'male', 'hh', 'asd', '78687687', 'student', 'nana', '099886876', 'asdasd', 'asdasd', 'asdasd', 'for victime'),
(10, 'acc', 'sdfsdf', 'sdfsdf', 'sdfsdf', 'sdfsdf', '2323', 'sdfsdf', 'sdfsdf', '234234', 'sdfsdf', 'sdfsdf', 'sdfsdf', 'tjis is for suspect');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `role` varchar(30) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `role`, `email`, `password`, `phone`) VALUES
(15, 'Philip', 'Mumbi', 'admin', 'Admin@email.com', 'fRoT/xGEBHdlZ6EZXZ0cLlc0ZFhwSnZMbmVCeDQ3UHlieTh0TWc9PQ==', '0987654321'),
(16, 'Reuben', 'Tems', 'admin', 'Admin1@email.com', 'goE5UdmSxjQJ2gQysUjh1GVqVlIvUmRHSlZnbStDUm1qWFk1V0E9PQ==', '0987654321'),
(17, 'Gloria', 'Chiesa', 'investigator', 'Invest@email.com', 'mCIhKF7M1bESkCGAhpDx3WtxUTQ4VklnS3pNNWZaT2NBb3Y4anc9PQ==', '0987654321'),
(19, 'phil', 'mumbi', 'officer', 'Officer@email.com', 'o5hcrU8UAr6h8KvP9j1mFUFndmhLSHQ0TE9qcDZJZmVOdW5HWFE9PQ==', '0967828070');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`docket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
