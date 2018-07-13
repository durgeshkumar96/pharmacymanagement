-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2017 at 05:47 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` tinyint(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `time`) VALUES
(1, 'admin', 'admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cashier_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` int(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`cashier_id`, `first_name`, `last_name`, `staff_id`, `username`, `password`) VALUES
(127, 'Deepak', 'P', 3, 'deepak', 'pandey');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `first_name`, `last_name`, `staff_id`, `username`, `password`) VALUES
(2, 'durgesh', 'durgesh', 4, 'durgesh', 'durgesh'),
(5, 'anurag', 'a', 102, 'anurag', 'anurag'),
(127, 'Rohit ', 'anand', 2, 'rohit', 'anand');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `pharmacist_id` tinyint(11) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`pharmacist_id`, `first_name`, `last_name`, `staff_id`, `username`, `password`) VALUES
(101, 'Bhuvnesh', 'T', 1, 'bhuvnesh', 'tenguria');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(10) NOT NULL,
  `age` int(2) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `postal_address` varchar(25) NOT NULL,
  `phone` int(12) NOT NULL,
  `med_name` varchar(20) NOT NULL,
  `dosage` int(5) NOT NULL,
  `time1` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `customer_id`, `customer_name`, `age`, `sex`, `postal_address`, `phone`, `med_name`, `dosage`, `time1`) VALUES
(15, 1, 'nitish', 20, 'male', 'halli', 1234567890, 'disprin', 5, '101'),
(16, 1, 'nitish', 20, 'male', 'halli', 1234567890, 'nflux', 20, '10'),
(17, 2, 'Paras Agar', 20, 'male', 'halli', 2147483647, 'eno', 5, '101'),
(18, 2, 'Paras Agar', 20, 'male', 'halli', 2147483647, 'crocin', 5, '101'),
(19, 2, 'Paras Agar', 20, 'male', 'halli', 2147483647, 'combiflam', 20, '1'),
(20, 2, 'Paras Agar', 20, 'male', 'halli', 2147483647, 'nflux', 2, '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cashier_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bhuvnesh` (`med_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `pharmacist_id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `bhuvnesh` FOREIGN KEY (`med_name`) REFERENCES `add_stock` (`medname`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
