-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2017 at 05:38 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(40) NOT NULL,
  `customer_id` int(40) DEFAULT NULL,
  `room_type` varchar(20) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_id`, `room_type`, `check_in`, `check_out`, `status`) VALUES
(1, 4, 'Premium Class', '2017-08-01', '2017-08-01', 'Success'),
(2, 4, 'Business Class', '2017-08-09', '2017-08-09', 'Success'),
(4, 1, 'Business Class', '2017-08-09', '2017-08-09', 'Confirm'),
(13, 2, 'Business Class', '2014-12-10', '2014-12-10', 'Confirm'),
(17, 3, 'Business Class', '2014-10-10', '2014-10-10', 'Success'),
(18, 3, 'General Class', '2013-10-10', '2014-10-10', 'Success'),
(20, 3, 'General Class', '2004-12-01', '2005-12-10', 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(40) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `password`, `user_type`) VALUES
(1, '123456', 'admin'),
(2, '123456', 'operator'),
(3, '123456', 'customer'),
(4, '123456', 'customer'),
(26, '123432', 'customer'),
(27, '1234567', 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(40) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `expense` int(11) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `customer_id`, `room_id`, `expense`, `check_in`, `check_out`) VALUES
(1, 4, 401, 10000, '2017-08-01', '2017-08-01'),
(2, 3, 301, 4000, '2017-08-09', '2017-08-22'),
(3, 4, 201, 4000, '2017-08-09', '2017-08-09'),
(4, 3, 201, 4000, '2014-10-10', '2014-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE `revenue` (
  `id` int(40) NOT NULL,
  `customer_id` int(40) DEFAULT NULL,
  `expense` int(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(40) NOT NULL,
  `room_type` varchar(40) DEFAULT NULL,
  `room_rent` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type`, `room_rent`) VALUES
(101, 'General Class', 2000),
(102, 'General Class', 2000),
(103, 'General Class', 2000),
(104, 'General Class', 2000),
(105, 'General Class', 2000),
(106, 'General Class', 2000),
(201, 'Business Class', 4000),
(202, 'Business Class', 4000),
(203, 'Business Class', 4000),
(204, 'Business Class', 4000),
(205, 'Business Class', 4000),
(301, 'Premium Class', 10000),
(302, 'Premium Class', 10000),
(303, 'Premium Class', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(40) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `type` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `gender`, `password`, `type`) VALUES
(1, 'Atik Fahad', 'fahadatik@gmail.com', '01683669535', 'male', '123456', 'admin'),
(2, 'Mahfuz', 'mahfuz@gmail.com', '01918324708', 'male', '123456', 'operator'),
(3, 'Shuvo', 'shuvo@yahoo.com', '01819234697', 'male', '123456', 'customer'),
(4, 'Rahat', 'rahat@gmail.com', '016543256', 'male', '123456', 'customer'),
(26, 'Akash', 'akash@gmail.com', '0123456789', 'male', '123432', 'customer'),
(27, 'Rimi', 'rimirashid@gmail.com', '01629411388', 'female', '1234567', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `revenue`
--
ALTER TABLE `revenue`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
