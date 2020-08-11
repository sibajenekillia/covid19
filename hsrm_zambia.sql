-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 11:59 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




--
-- Database: `hsrm_zambia`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_province`
--

CREATE TABLE `assign_province` (
  `assign_id` int(15) NOT NULL,
  `p_idd` int(15) NOT NULL,
  `d_idd` int(15) NOT NULL,
  `t_idd` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_province`
--

INSERT INTO `assign_province` (`assign_id`, `p_idd`, `d_idd`, `t_idd`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `d_id` int(15) NOT NULL,
  `d_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`d_id`, `d_name`) VALUES
(3, 'Livingstone');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `p_id` int(15) NOT NULL,
  `p_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`p_id`, `p_name`) VALUES
(1, 'Southern'),
(2, 'Lusaka');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `response_id` int(15) NOT NULL,
  `citizen_name` varchar(150) NOT NULL,
  `citizen_phone` varchar(150) NOT NULL,
  `citizen_address` tinytext NOT NULL,
  `p_idd` int(15) NOT NULL,
  `d_idd` int(15) NOT NULL,
  `t_idd` int(15) NOT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`response_id`, `citizen_name`, `citizen_phone`, `citizen_address`, `p_idd`, `d_idd`, `t_idd`, `date_time`) VALUES
(1, 'Luke Thomas', '09800000', '77 kachacha', 1, 1, 1, '2020-06-10 00:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `t_id` int(15) NOT NULL,
  `t_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`t_id`, `t_name`) VALUES
(1, 'Livingstone'),
(2, 'Lusaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_province`
--
ALTER TABLE `assign_province`
  ADD PRIMARY KEY (`assign_id`),
  ADD KEY `p_idd` (`p_idd`),
  ADD KEY `d_idd` (`d_idd`),
  ADD KEY `t_idd` (`t_idd`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`response_id`),
  ADD KEY `p_idd` (`p_idd`,`d_idd`,`t_idd`),
  ADD KEY `d_idd` (`d_idd`),
  ADD KEY `t_idd` (`t_idd`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_province`
--
ALTER TABLE `assign_province`
  MODIFY `assign_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `d_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `province`
  MODIFY `p_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `response_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `t_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`p_idd`) REFERENCES `assign_province` (`p_idd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `response_ibfk_2` FOREIGN KEY (`d_idd`) REFERENCES `assign_province` (`d_idd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `response_ibfk_3` FOREIGN KEY (`t_idd`) REFERENCES `assign_province` (`t_idd`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

