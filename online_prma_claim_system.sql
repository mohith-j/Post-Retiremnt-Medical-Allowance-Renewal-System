-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 07:48 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online prma claim system`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_master`
--

CREATE TABLE `employee_master` (
  `cpfno` int(11) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `emp_code` char(2) NOT NULL,
  `exit_year` int(11) NOT NULL,
  `executive` char(1) NOT NULL,
  `department` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_master`
--

INSERT INTO `employee_master` (`cpfno`, `emp_name`, `email_id`, `phone_no`, `address`, `emp_code`, `exit_year`, `executive`, `department`, `password`) VALUES
(50001, 'divij kulshrestha', 'iamdivijk@nlcil.com', 2147483647, '#101,Ram aparmants,vadapalani,Chennai', 'EX', 2015, 'Y', 'MINE-1', 'pass'),
(50002, 'anand gangadharan', 'iamanandg@nlcil.com', 2147483647, '#9, Horse Avenue, Anna Nagar,Chennai', 'EX', 2005, 'N', 'MINE-2', 'pass'),
(50003, 'mohith j', 'iammohithj@nlcil.com', 2147483647, '#13, black avenue, Gowchiboli, Hyderabad', 'EX', 2006, 'Y', 'THERMAL-1', 'pass'),
(50004, 'nayan manoj', 'iamnayanm@nlcil.com', 2147483647, '#17, sacred street, Sector-18, Neyveli-1', 'P', 2025, 'N', 'THERMAL-2', 'pass'),
(50005, 'guru chandran', 'iamguruc@nlcil.com', 2147483647, '#3F, QWERTY villa, Banjara Hills, Hyderabad', 'EX', 2004, 'Y', 'MINE-1', 'pass'),
(50006, 'akash mu', 'iamakashm@nlcil.com', 2147483647, '#9, imposs road, Ghaziabad, Delhi', 'EX', 2012, 'N', 'MINE-2', 'pass'),
(50007, 'joel johnson', 'iamjoelj@nlcil.com', 2147483647, '#12,arcot road, Sector-1, Neyveli-3', 'P', 2022, 'Y', 'THERMAL-1', 'pass'),
(50008, 'ifham ali', 'iamifhama@nlcil.com', 2147483647, '#3000, hamburger road, Saidapet, Chennai', 'EX', 2018, 'N', 'THERMAL-2', 'pass'),
(50009, 'kishore t', 'iamkishoret@nlcil.com', 2147483647, '#5, Sri Road, Sector 12, Neyveli-3', 'P', 2021, 'Y', 'MINE-1', 'pass'),
(50010, 'abhishek nemani', 'iamabhishekn@nlcil.com', 2147483647, '#103, Mama Avenue, Panjagutta, Hyderabad', 'EX', 2006, 'N', 'MINE-2', 'pass'),
(50011, 'gopika anand', 'iamgopikaa@nlcil.com', 2147483647, '#94, fafa Avenue, Sector-4, Neyveli', 'P', 2029, 'Y', 'HR', 'pass'),
(50012, 'aadharshini', 'iamaadharshini@nlcil.com', 2147483647, '#31, chair road, Sector-19, Neyveli', 'P', 2023, 'N', 'HR', 'pass'),
(50013, 'haritha', 'iamharitha@nlcil.com', 2147483647, '#75, icecream street, Sector-18, Neyveli', 'P', 2020, 'N', 'HR', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `renewal`
--

CREATE TABLE `renewal` (
  `cpfno` int(5) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `prena_amount` int(11) NOT NULL,
  `prma_amount` int(11) NOT NULL,
  `renewal_year` int(4) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `otp` int(6) NOT NULL,
  `executive` char(1) NOT NULL,
  `status` char(2) NOT NULL,
  `application_name` varchar(50) NOT NULL,
  `remarks` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renewal`
--

INSERT INTO `renewal` (`cpfno`, `emp_name`, `prena_amount`, `prma_amount`, `renewal_year`, `time_stamp`, `otp`, `executive`, `status`, `application_name`, `remarks`) VALUES
(50001, 'divij kulshrestha', 0, 80000, 2015, '2019-06-24 10:27:32', 4034, 'Y', 'R', '5d0dc7589d4637.19050416.pdf', 'reject'),
(50002, 'anand gangadharan', 5000, 40000, 2005, '2019-06-28 05:19:20', 5381, 'N', 'U', '5d15a3586f9f57.95688976.pdf', ''),
(50005, 'guru chandran', 5000, 20000, 2004, '2019-06-28 05:22:50', 9348, 'Y', 'A', '5d107039acaf04.93363864.pdf', ''),
(50008, 'ifham ali', 0, 45000, 2018, '2019-06-24 10:27:24', 6990, 'N', 'U', '5d1070b56a3c25.74225948.pdf', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_master`
--
ALTER TABLE `employee_master`
  ADD PRIMARY KEY (`cpfno`);

--
-- Indexes for table `renewal`
--
ALTER TABLE `renewal`
  ADD PRIMARY KEY (`cpfno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
