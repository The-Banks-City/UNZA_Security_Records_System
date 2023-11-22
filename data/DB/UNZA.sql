-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2023 at 01:50 PM
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
-- Table structure for table `complainant`
--

CREATE TABLE `complainant` (
  `case_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `nrc` varchar(15) NOT NULL,
  `campus` varchar(50) NOT NULL,
  `hostel` varchar(60) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `crime` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complainant`
--

INSERT INTO `complainant` (`case_id`, `name`, `phone`, `occupation`, `nrc`, `campus`, `hostel`, `age`, `gender`, `crime`, `date_added`) VALUES
(1, 'philip', '1234567890', 'Male', '123456789', 'Main', 'International', 11, 'Male', 'Domestic Violence', '0000-00-00 00:00:00'),
(3, 'hi', '1234567890', 'Male', '1234567890', 'Main', 'International', 32, 'Male', 'Murder Case', '2023-10-24 00:33:41'),
(4, 'lamda', '1234556678', 'Male', '123456789', 'Main', 'International', 12, 'Male', 'Robbing', '2023-10-24 10:18:43'),
(5, 'mull', '53653763', 'Male', '4324225344', 'Main', 'Africa', 0, 'Male', 'Assault', '2023-10-24 12:02:03');

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
(6, 'Robbing');

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
  `investigator` varchar(100) NOT NULL,
  `statement` longtext NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `assigned_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `investigation`
--

INSERT INTO `investigation` (`investigator`, `statement`, `case_id`, `assigned_date`) VALUES
('yamikani', 'fkjhjfhfjhfhjfhfh', 1, '2023-10-23 02:46:02'),
('gloria chibbs', 'asgjagsjdga shdgahsdghasgdhasg dajsdgajsdgahs dajsdgahsgdasd', 1, '2023-10-23 02:46:20'),
('gloria chibbs', 'fjgdafsdfajdh asdasfjdhafsjda sdjafsdhfajdfas dajsdfahsfdjas dajsdhafsjdahfsda', 3, '2023-10-24 01:10:03'),
('gloria chibbs', 'this is the fourth statement i have made so far and this is the investigator entering the case details into the statement', 4, '2023-10-24 10:21:26'),
('gloria chibbs', 'i am now trying out many aspects of the investigate feature to determin if the investigatr name is being recorded y the app', 4, '2023-10-24 10:30:04'),
('gloria chibbs', 'i have added the session as the source of the investigator name', 4, '2023-10-24 10:33:10');

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
(1, 'philip', 'mumbi', 'admin', 'philip@email.com', '1234', '0963163425'),
(5, 'yami', 'kani', 'officer', 'yami@email.com', '1234', '0987654321'),
(8, 'gloria', 'chibbs', 'investigator', 'gloria@email.com', '1234', '0976123456'),
(13, 'shadrick', 'Mum', 'investigator', 'shad@email.com', '1234', '1233576787'),
(14, 'eee', 'qqqq', 'admin', 'www@email.com', 't85ZaFc2PsOY5tmafQct1mFHbzNHbFd1aVlsRHdZblhTVCs1VUE9PQ==', '1234567890'),
(15, 'Philip', 'Mumbi', 'admin', 'Admin@email.com', 'fRoT/xGEBHdlZ6EZXZ0cLlc0ZFhwSnZMbmVCeDQ3UHlieTh0TWc9PQ==', '0987654321'),
(16, 'Reuben', 'Tems', 'admin', 'Admin1@email.com', 'goE5UdmSxjQJ2gQysUjh1GVqVlIvUmRHSlZnbStDUm1qWFk1V0E9PQ==', '0987654321'),
(17, 'Gloria', 'Chiesa', 'investigator', 'Invest@email.com', 'mCIhKF7M1bESkCGAhpDx3WtxUTQ4VklnS3pNNWZaT2NBb3Y4anc9PQ==', '0987654321'),
(18, 'Yamikani', 'mbewe', 'officer', 'officer@email.com', 'PEjSwE87obcMvxvDReQAKy9Sd0JqZVF2Z1Z6Zm02QytRUnNpN2c9PQ==', '0987654321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complainant`
--
ALTER TABLE `complainant`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `crime_type`
--
ALTER TABLE `crime_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hostel_id`);

--
-- Indexes for table `investigation`
--
ALTER TABLE `investigation`
  ADD KEY `case_id` (`case_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complainant`
--
ALTER TABLE `complainant`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `crime_type`
--
ALTER TABLE `crime_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `hostel_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `investigation`
--
ALTER TABLE `investigation`
  ADD CONSTRAINT `investigation_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `complainant` (`case_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
