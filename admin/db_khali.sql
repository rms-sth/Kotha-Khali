-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 04:34 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_khali`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bhadedar`
--

CREATE TABLE `tbl_bhadedar` (
  `reg_id` int(11) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `middle_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  `sex` enum('male','female','others') NOT NULL,
  `profile_picture` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `reg_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  `sex` enum('male','female','others') NOT NULL,
  `profie_picture` varchar(200) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `question` enum('gharbeti','bhadedar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`reg_id`, `username`, `password`, `email`, `phone`, `location`, `sex`, `profie_picture`, `first_name`, `middle_name`, `last_name`, `question`) VALUES
(1, 'ramesrest', 'ramesh', 'ramesrest@gmail.com', '9860298534', 'Lalitpur, Patan', 'male', 'profie_ramesh.jpg', 'Ramesh', NULL, 'Pradhan', 'gharbeti'),
(2, 'bpandeya', 'bhuwan', 'bpandeya70@gmai.com', '9848769516', 'nakkhu,lalitpur', 'male', 'b.jpg', 'bhuwan', 'raj', 'pandeya', 'gharbeti'),
(3, 'bijesh', 'bijesh', 'bijesh@gmail.com', '9858736748', 'hattiban', 'male', 'bj.jpg', 'bijesh', 'jung', 'basnet', 'gharbeti');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `room_id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `policy` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `price` double NOT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `description` text NOT NULL,
  `expiry_date` date NOT NULL,
  `images` varchar(200) NOT NULL,
  `reg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `location`, `policy`, `status`, `price`, `no_of_rooms`, `created_date`, `description`, `expiry_date`, `images`, `reg_id`) VALUES
(1, 'dell inspiron 57 i3 2gb', 'Every one should follow our rules.\r\nThey should do what we want.\r\nThey should clean toilets  and bathrroom of their own.', 1, 60000, 5, '2018-03-14', 'Every one should follow our rules.\r\nThey should do what we want.\r\nThey should clean toilets  and bathrroom of their own.', '2018-09-21', '1.jpg', 1),
(2, 'bluetooth speaker lenovo', 'This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.', 1, 30000, 4, '2018-03-12', 'This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.', '2018-10-19', '2.jpg', 1),
(3, 'bluetooth headohones hp', 'This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.', 0, 5000, 3, '2018-03-04', 'This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.This is the random policy of my room.', '2018-03-29', '3.jpg', 1),
(4, 'Electrical Suzuki Motor', ' My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.', 1, 650, 1, '2018-03-06', 'My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.My policy is my policy.', '2018-10-10', '4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `middlename` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(55) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `firstname`, `middlename`, `lastname`, `email`, `username`, `password`, `status`) VALUES
(16, 'Bhuwan', 'raj', 'Pandeya', 'bpandeya70@gmail.com', 'bhuwan', 'bhuwan', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bhadedar`
--
ALTER TABLE `tbl_bhadedar`
  ADD PRIMARY KEY (`reg_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`reg_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bhadedar`
--
ALTER TABLE `tbl_bhadedar`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD CONSTRAINT `tbl_room_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `tbl_register` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
