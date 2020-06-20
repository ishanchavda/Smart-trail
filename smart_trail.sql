-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2018 at 07:36 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_trail`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `users_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `users_id`, `users_name`) VALUES
(1, 'event 1', '', '2018-03-05 00:00:00', '2018-03-06 00:00:00', 1, 'admin'),
(2, 'event 2', '#ff851b', '2018-03-07 00:00:00', '2018-03-08 00:00:00', 1, 'admin'),
(3, 'event 3', '#00a659', '2018-03-14 00:00:00', '2018-03-18 00:00:00', 1, 'admin'),
(4, 'event 5', '#0073b7', '2018-03-06 00:00:00', '2018-03-07 00:00:00', 102, 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `date` datetime NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `date`, `admin_id`, `admin_username`) VALUES
(1, 'D Mart Parking', 'D-Mart, Near SRP, GIDC Industrial Area, Manjalpur, Vadodara, Gujarat 390009', 22.261267, 73.200043, '2018-03-01 11:45:30', 1, 'admin'),
(2, 'Railway Station Paid Parking', 'New Bail Baug Shopping Center, G-23, Aurobindo Ghosh Rd, Sayajiganj, Vadodara, G', 22.315874, 73.179695, '2018-03-01 12:45:30', 1, 'admin'),
(3, 'Jay Mataji Pay & Parking', 'Indubhai Patel Marg, Faramaji Compound, Opp. Platform No. 6, Alkapuri, Vadodara,', 22.312038, 73.179321, '2018-03-03 12:55:20', 1, 'admin'),
(4, 'Baroda Shree Shyam Telar Parking', 'Vadodara, Gujarat 390022', 22.360344, 73.205894, '2018-03-03 14:45:30', 1, 'admin'),
(5, 'Spencer''s Parking', 'Alkapuri, Vadodara, Gujarat 390023', 22.313295, 73.176590, '2018-03-03 14:05:30', 1, 'admin'),
(6, 'Parking Area', 'Vadodara, Gujarat 391760', 22.293194, 73.347290, '2018-03-04 13:45:30', 1, 'admin'),
(7, 'Shyamal Park', 'Opp. Shreem Shrushti, Near Shyamal Enclave, Sun-Pharma Atladra Road, Vadodara', 22.276257, 73.138641, '2018-03-05 11:35:30', 1, 'admin'),
(8, 'The Park', 'Akshar Chowk, Old Padra Rd, Vadodara, Gujarat 390020', 22.281748, 73.165543, '2018-03-06 17:45:30', 1, 'admin'),
(9, 'Anand Junction', 'Pedestrian Overpass, Bhavna Colony, Anand, Gujarat 388001', 22.562380, 72.965797, '2018-03-07 17:17:17', 1, 'admin'),
(10, 'Shashtri Garden', 'Nandanvan Society, Popati Nagar, Anand, Gujarat 388001', 22.552868, 72.966515, '2018-03-08 12:45:30', 1, 'admin'),
(11, 'Ahmedabad Municipal Corporation', ' Kankaria Char Rasta, Kankaria, Ahmedabad, Gujarat ', 23.009031, 72.598648, '2018-03-09 21:45:30', 1, 'admin'),
(12, 'Private Bus Operators Parking - Vishala', 'Shantabag Society, Rehnuma Society, Vishala, Ahmedabad, Gujarat 380007', 22.992029, 72.537117, '2018-03-09 21:48:16', 1, 'admin'),
(13, 'Multi Store Car Parking', '1, Relief Rd, Gheekanta, Bhadra Gheekanta, Bhadra , Ahmedabad, Gujarat 388001', 23.026525, 72.584427, '2018-03-09 21:51:58', 1, 'admin'),
(14, 'Raipur Sports Complex', 'Khadia, Khadia, Ahmedabad, Gujarat 388001', 23.020777, 72.592026, '2018-03-09 21:59:11', 1, 'admin'),
(15, 'AMC Free Parking', 'Near Kankariya BRTS Stop, Lala Lajpat Rai Marg, Kankaria, Ahmedabad, Gujarat 388', 23.002296, 72.600555, '2018-03-09 22:02:54', 1, 'admin'),
(16, 'Kankariya Public Parking - Pay and Park', 'Maninagar Rd, Amar Society, Vatva, Ahmedabad, Gujarat 380008', 23.006540, 72.606369, '2018-03-09 22:06:28', 1, 'admin'),
(17, 'Jamnagar Estate Private Limited Parking', 'Near Rajbai Timber Market, Opposite Mahalaxmi Mill, Narol Isanpur Road, Maheccha', 22.973698, 72.593155, '2018-03-09 22:08:47', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `smart_admin`
--

CREATE TABLE `smart_admin` (
  `sa_id` int(11) NOT NULL,
  `sa_email` varchar(20) NOT NULL,
  `sa_username` varchar(20) NOT NULL,
  `sa_password` varchar(50) NOT NULL,
  `sa_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smart_admin`
--

INSERT INTO `smart_admin` (`sa_id`, `sa_email`, `sa_username`, `sa_password`, `sa_name`) VALUES
(1, 'admin@smart.com', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `smart_admin_visitor`
--

CREATE TABLE `smart_admin_visitor` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `ip` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smart_admin_visitor`
--

INSERT INTO `smart_admin_visitor` (`id`, `date`, `ip`, `admin_id`, `admin_username`) VALUES
(1, '2018-03-13 09:59:42', '::1', 1, 'admin'),
(2, '2018-03-13 10:01:23', '::1', 1, 'admin'),
(3, '2018-03-13 10:26:47', '::1', 1, 'admin'),
(4, '2018-03-13 11:00:41', '::1', 1, 'admin'),
(5, '2018-03-13 12:05:32', '::1', 1, 'admin'),
(6, '2018-03-13 12:16:59', '::1', 1, 'admin'),
(7, '2018-03-13 19:24:23', '::1', 1, 'admin'),
(8, '2018-03-14 12:08:51', '::1', 1, 'admin'),
(9, '2018-03-15 08:05:41', '::1', 1, 'admin'),
(10, '2018-03-15 08:07:01', '::1', 1, 'admin'),
(11, '2018-03-15 08:07:20', '::1', 1, 'admin'),
(12, '2018-03-15 08:08:24', '::1', 1, 'admin'),
(13, '2018-03-15 08:11:27', '::1', 1, 'admin'),
(14, '2018-03-15 08:17:35', '::1', 1, 'admin'),
(15, '2018-03-15 08:20:46', '::1', 1, 'admin'),
(16, '2018-03-15 08:21:00', '::1', 1, 'admin'),
(17, '2018-03-15 08:22:04', '::1', 1, 'admin'),
(18, '2018-03-15 08:26:41', '::1', 1, 'admin'),
(19, '2018-03-15 08:27:07', '::1', 1, 'admin'),
(20, '2018-03-15 08:27:28', '::1', 1, 'admin'),
(21, '2018-03-15 12:20:07', '::1', 1, 'admin'),
(22, '2018-03-15 12:50:10', '::1', 1, 'admin'),
(23, '2018-03-15 12:50:55', '::1', 1, 'admin'),
(24, '2018-03-15 12:53:03', '::1', 1, 'admin'),
(25, '2018-03-15 12:54:22', '::1', 1, 'admin'),
(26, '2018-03-15 12:56:10', '::1', 1, 'admin'),
(27, '2018-03-15 12:57:48', '::1', 1, 'admin'),
(28, '2018-03-15 13:10:01', '::1', 1, 'admin'),
(29, '2018-03-15 13:10:19', '::1', 1, 'admin'),
(30, '2018-03-15 13:10:42', '::1', 1, 'admin'),
(31, '2018-03-15 13:12:19', '::1', 1, 'admin'),
(32, '2018-03-15 13:12:37', '::1', 1, 'admin'),
(33, '2018-03-15 13:14:04', '::1', 1, 'admin'),
(34, '2018-03-15 13:24:58', '::1', 1, 'admin'),
(35, '2018-03-15 13:25:13', '::1', 1, 'admin'),
(36, '2018-03-15 13:27:24', '::1', 1, 'admin'),
(37, '2018-03-15 16:58:23', '::1', 1, 'admin'),
(38, '2018-03-16 11:28:42', '::1', 1, 'admin'),
(39, '2018-03-16 11:37:03', '::1', 1, 'admin'),
(40, '2018-03-16 13:00:12', '::1', 1, 'admin'),
(41, '2018-03-16 13:34:25', '::1', 3, 'ishan@gmail.com'),
(42, '2018-03-16 13:42:56', '::1', 1, 'admin'),
(43, '2018-03-18 11:01:34', '::1', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `smart_penalty`
--

CREATE TABLE `smart_penalty` (
  `pe_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `vehicle_no` varchar(10) NOT NULL,
  `penalty` int(4) NOT NULL,
  `paid_status` varchar(4) NOT NULL,
  `date` date NOT NULL,
  `city` varchar(10) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smart_penalty`
--

INSERT INTO `smart_penalty` (`pe_id`, `name`, `vehicle_no`, `penalty`, `paid_status`, `date`, `city`, `emp_id`) VALUES
(1, 'Chavda Ishan Manishaben', 'GJ23AB1234', 100, 'Yes', '2018-02-01', 'Anand', 201),
(2, 'Chavda Ishan Manishaben', 'GJ23AB1234', 100, 'Yes', '2018-02-01', 'Anand', 202),
(3, 'Chavda Ishan Manishaben', 'GJ23AB1234', 100, 'Yes', '2018-02-01', 'Vadodara', 203),
(4, 'Patel Jayesh Manilal', 'GJ16BB1234', 400, 'Yes', '2018-02-01', 'Anand', 202),
(5, 'Patel Jayesh Manilal', 'GJ16BB1234', 400, 'Yes', '2018-02-23', 'Vadodara', 201),
(6, 'Chavda Ishan Manishaben', 'GJ23AB1234', 100, 'No', '2018-03-16', 'Amreli', 201),
(7, 'Chavda Ishan Manishaben', 'GJ23AB1234', 100, 'No', '2018-03-17', 'Ahmedabad', 201),
(8, 'Patel Jayesh Manilal', 'GJ16BB1234', 400, 'No', '2018-03-17', 'Anand', 201),
(9, 'Patel Jayesh Manilal', 'GJ16BB1234', 400, 'No', '2018-03-17', 'Anand', 201);

-- --------------------------------------------------------

--
-- Table structure for table `smart_rto_admin`
--

CREATE TABLE `smart_rto_admin` (
  `ra_id` int(5) NOT NULL,
  `ra_email` varchar(50) NOT NULL,
  `ra_username` varchar(20) NOT NULL,
  `ra_password` varchar(20) NOT NULL,
  `ra_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smart_rto_admin`
--

INSERT INTO `smart_rto_admin` (`ra_id`, `ra_email`, `ra_username`, `ra_password`, `ra_name`) VALUES
(101, 'admin1@smart.com', 'admin1', 'admin123', 'admin1'),
(102, 'admin2@smart.com', 'admin2', 'admin2', 'admin2'),
(103, 'admin3@smart.com', 'admin3', 'admin3', 'admin3'),
(104, 'admin4@smart.com', 'admin4', 'admin4', 'admin4');

-- --------------------------------------------------------

--
-- Table structure for table `smart_rto_admin_visitor`
--

CREATE TABLE `smart_rto_admin_visitor` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `ip` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smart_rto_admin_visitor`
--

INSERT INTO `smart_rto_admin_visitor` (`id`, `date`, `ip`, `admin_id`, `admin_username`) VALUES
(1, '2018-03-13 10:14:22', '::1', 101, 'admin1'),
(2, '2018-03-13 10:14:36', '::1', 102, 'admin2'),
(3, '2018-03-13 10:21:32', '::1', 103, 'admin3'),
(4, '2018-03-13 10:21:42', '::1', 101, 'admin1'),
(5, '2018-03-13 10:21:54', '::1', 103, 'admin3'),
(6, '2018-03-13 10:22:06', '::1', 101, 'admin1'),
(7, '2018-03-13 10:38:10', '::1', 101, 'admin1'),
(8, '2018-03-13 10:56:38', '::1', 101, 'admin1'),
(9, '2018-03-16 11:34:39', '::1', 102, 'admin2'),
(10, '2018-03-16 11:45:56', '::1', 102, 'admin2'),
(11, '2018-03-16 13:50:54', '::1', 102, 'admin2'),
(12, '2018-03-17 09:15:59', '::1', 102, 'admin2'),
(13, '2018-03-17 09:46:50', '::1', 102, 'admin2'),
(14, '2018-03-18 09:50:18', '::1', 104, 'admin4'),
(15, '2018-03-18 11:59:24', '::1', 102, 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `smart_rto_employee`
--

CREATE TABLE `smart_rto_employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `pincode` int(7) NOT NULL,
  `aadharno` bigint(12) NOT NULL,
  `driving_licence_no` varchar(15) NOT NULL,
  `username` varchar(105) NOT NULL,
  `password` varchar(15) NOT NULL,
  `mobileno` bigint(12) DEFAULT NULL,
  `alternative_no` bigint(12) DEFAULT NULL,
  `adminid` int(11) NOT NULL,
  `adminusername` varchar(20) NOT NULL,
  `register_date` datetime NOT NULL,
  `email` varchar(50) NOT NULL,
  `al_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smart_rto_employee`
--

INSERT INTO `smart_rto_employee` (`id`, `name`, `gender`, `dob`, `address`, `pincode`, `aadharno`, `driving_licence_no`, `username`, `password`, `mobileno`, `alternative_no`, `adminid`, `adminusername`, `register_date`, `email`, `al_email`) VALUES
(201, 'Kishan Patel', 'Male', '1995-07-01', 'Surat, Gujarat', 388120, 123456789012, 'GJ2320189245', 'kishan2017', 'kishan', 9429071280, 0, 101, 'admin1', '2018-03-11 19:22:56', 'emp1@smart.com', ''),
(202, 'ishan Patel', 'Male', '1995-07-27', 'Surat, Gujarat', 388120, 123456789012, 'GJ2320189245', 'ishan2017', 'ishan', 9429071200, 0, 101, 'admin1', '2018-03-11 19:25:56', 'emp2@smart.com', ''),
(203, 'Jayesh Patel', 'Male', '1995-04-18', 'Ankleshwar, Gujarat', 380120, 123456789912, 'GJ1820189245', 'Jayesh210', 'jayesh', 9429071288, 0, 102, 'admin2', '2018-03-16 11:51:31', '', ''),
(204, 'Palak Depani', 'Female', '1996-07-09', 'Rajkot, Gujarat', 380001, 123456689012, 'GJ0320189245', 'Palak', 'palk', 9875625500, 0, 102, 'admin2', '2018-03-16 11:54:33', 'palak@smart.com', ''),
(205, 'Bhargav Chavda', 'Male', '1997-07-04', 'anand, Gujarat', 388120, 123456789012, 'MH4320120014306', 'bhargva1234', 'bhargva1234', 9429071280, 0, 102, 'admin2', '2018-03-17 10:00:03', 'ishanchavda55@gmail.com', ''),
(207, 'Ravi Mevada', 'Male', '2018-03-11', 'Baroda, Gujarat', 380000, 123456789012, 'MH4320120014309', 'Ravi1997', 'Ravi1997', 9429071200, 0, 104, 'admin4', '2018-03-18 10:43:43', 'ravi@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `smart_rto_employee_visitor`
--

CREATE TABLE `smart_rto_employee_visitor` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `ip` text NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smart_rto_employee_visitor`
--

INSERT INTO `smart_rto_employee_visitor` (`id`, `date`, `ip`, `emp_id`, `emp_name`) VALUES
(1, '2018-03-16 15:06:53', '::1', 201, 'kishan2017'),
(2, '2018-03-16 15:08:03', '::1', 201, 'kishan2017'),
(3, '2018-03-16 15:22:26', '::1', 201, 'kishan2017'),
(4, '2018-03-16 15:25:39', '::1', 201, 'kishan2017'),
(5, '2018-03-16 21:58:03', '::1', 201, 'kishan2017'),
(6, '2018-03-17 18:08:10', '::1', 201, 'kishan2017'),
(7, '2018-03-17 18:26:48', '::1', 201, 'kishan2017'),
(8, '2018-03-18 09:08:44', '::1', 201, 'kishan2017'),
(9, '2018-03-18 11:59:47', '::1', 201, 'kishan2017');

-- --------------------------------------------------------

--
-- Table structure for table `smart_site_visitor`
--

CREATE TABLE `smart_site_visitor` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ip` text NOT NULL,
  `views` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smart_site_visitor`
--

INSERT INTO `smart_site_visitor` (`id`, `date`, `ip`, `views`) VALUES
(30, '2018-03-13', '::1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `smart_user_mail`
--

CREATE TABLE `smart_user_mail` (
  `mail_id` int(11) NOT NULL,
  `rec_id` varchar(10) NOT NULL,
  `send_id` varchar(10) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `attchment` text NOT NULL,
  `rec_date` date NOT NULL,
  `send_name` varchar(20) NOT NULL,
  `rec_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smart_user_mail`
--

INSERT INTO `smart_user_mail` (`mail_id`, `rec_id`, `send_id`, `subject`, `message`, `attchment`, `rec_date`, `send_name`, `rec_name`) VALUES
(1, '101', '1', 'admin1', '<p>admin1admin1admin1admin1admin1admin1<br></p>', '', '2018-03-15', 'admin', 'admin1'),
(2, '202', '1', 'test', '<p>Testing..<br></p>', '', '2018-03-15', 'admin', 'ishan2017'),
(3, '1', '1', 'test', '<p>ananaannaannanaan<br></p>', '', '2018-03-15', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `smart_vehicle`
--

CREATE TABLE `smart_vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_no` varchar(10) NOT NULL,
  `vehicle_owner` varchar(50) NOT NULL,
  `vehicle_model` varchar(50) NOT NULL,
  `vehicle_ Manufacturer` varchar(50) NOT NULL,
  `vehicle_wheels` int(3) NOT NULL,
  `vehicle_engin_no` varchar(20) NOT NULL,
  `vehicle_regi_date` date NOT NULL,
  `owner_add` text NOT NULL,
  `owner_con_no` bigint(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smart_vehicle`
--

INSERT INTO `smart_vehicle` (`vehicle_id`, `vehicle_no`, `vehicle_owner`, `vehicle_model`, `vehicle_ Manufacturer`, `vehicle_wheels`, `vehicle_engin_no`, `vehicle_regi_date`, `owner_add`, `owner_con_no`, `email`) VALUES
(20180001, 'GJ23AB1234', 'Chavda Ishan Manishaben', 'TVS Apache', 'TVS', 2, '1ZVFT84N355187537', '2005-02-15', 'Anand', 9429071280, 'ishanchavda5@gmail.com'),
(20180002, 'GJ16BB1234', 'Patel Jayesh Manilal', 'Jazz', 'Honda', 4, 'K10BN7112345', '2012-06-12', 'Ankleshwar', 7405173676, ''),
(20180003, 'GJ05BG1818', 'Patel Kishan', 'Honda Spendar', 'Honda', 2, '05A15E35197', '2006-11-18', 'Surat', 9714801192, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_admin`
--
ALTER TABLE `smart_admin`
  ADD PRIMARY KEY (`sa_id`);

--
-- Indexes for table `smart_admin_visitor`
--
ALTER TABLE `smart_admin_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_penalty`
--
ALTER TABLE `smart_penalty`
  ADD PRIMARY KEY (`pe_id`);

--
-- Indexes for table `smart_rto_admin`
--
ALTER TABLE `smart_rto_admin`
  ADD PRIMARY KEY (`ra_id`);

--
-- Indexes for table `smart_rto_admin_visitor`
--
ALTER TABLE `smart_rto_admin_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_rto_employee`
--
ALTER TABLE `smart_rto_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_rto_employee_visitor`
--
ALTER TABLE `smart_rto_employee_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_site_visitor`
--
ALTER TABLE `smart_site_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_user_mail`
--
ALTER TABLE `smart_user_mail`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `smart_vehicle`
--
ALTER TABLE `smart_vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `smart_admin`
--
ALTER TABLE `smart_admin`
  MODIFY `sa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `smart_admin_visitor`
--
ALTER TABLE `smart_admin_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `smart_penalty`
--
ALTER TABLE `smart_penalty`
  MODIFY `pe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `smart_rto_admin`
--
ALTER TABLE `smart_rto_admin`
  MODIFY `ra_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `smart_rto_admin_visitor`
--
ALTER TABLE `smart_rto_admin_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `smart_rto_employee`
--
ALTER TABLE `smart_rto_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
--
-- AUTO_INCREMENT for table `smart_rto_employee_visitor`
--
ALTER TABLE `smart_rto_employee_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `smart_site_visitor`
--
ALTER TABLE `smart_site_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `smart_user_mail`
--
ALTER TABLE `smart_user_mail`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `smart_vehicle`
--
ALTER TABLE `smart_vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20180004;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
