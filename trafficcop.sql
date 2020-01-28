-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2020 at 06:59 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trafficcop`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `accidentsofusers`
-- (See below for the actual view)
--
CREATE TABLE `accidentsofusers` (
`id` int(20)
,`lat` varchar(20)
,`lng` varchar(20)
,`description` varchar(50)
,`location_status` tinyint(1)
,`image` varchar(100)
,`user` varchar(20)
,`flag` varchar(20)
,`vehicleNo` varchar(20)
,`vehicleType` varchar(20)
,`insuaranceNo` varchar(20)
,`insuaranceCompany` varchar(20)
,`fname` varchar(20)
,`lname` varchar(20)
,`email` varchar(30)
,`username` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(20) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `lat` varchar(20) NOT NULL,
  `lng` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `location_status` tinyint(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  `user` varchar(20) NOT NULL,
  `flag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `dateTime`, `lat`, `lng`, `description`, `location_status`, `image`, `user`, `flag`) VALUES
(2, '2020-01-09 04:45:33', '6.944310925890721', '79.93999257202154', 'Accident 1', 1, 'uploads/1578473064391.png', 'Kasun', 'red'),
(3, '2020-01-09 04:45:33', '6.904614047238084', '79.90974426269531', 'accident 2', 1, 'uploads/1578493577770.png', 'Anushka', 'red'),
(4, '2020-01-09 04:45:33', '6.937869684800671', '79.89106907958984', 'Accident', 1, 'uploads/1578525179908.png', 'Kasun', 'red'),
(5, '2020-01-09 04:47:11', '6.919329315620036', '79.88008275146484', '123', 0, 'uploads/1578525431020.png', 'Kasun', 'null'),
(6, '2020-01-09 10:26:21', '6.904614047238084', '79.90974426269531', 'Bus eke happuna', 1, 'uploads/1578545781066.png', 'Hasith', 'red'),
(7, '2020-01-09 10:41:17', '6.848143659407499', '80.02152637949372', 'bike accident', 1, 'uploads/1578546677344.png', 'Nipun', 'yellow'),
(8, '2020-01-14 00:23:37', '6.9272704082881695', '79.93346943969726', 'Car accident', 1, 'uploads/1578941617685.png', 'Senali', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `vehicleNo` varchar(20) NOT NULL,
  `vehicleType` varchar(20) NOT NULL,
  `insuaranceNo` varchar(20) NOT NULL,
  `insuaranceCompany` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `username`, `password`, `type`, `vehicleNo`, `vehicleType`, `insuaranceNo`, `insuaranceCompany`) VALUES
(1, 'Kasun', 'Rukmaldeniya', 'kasun@gmail.com', 'kasun', 'kasun123', 'user', '1234', 'van', '12345', 'ceylinco'),
(2, 'Ransara', 'Wijayasundara', 'ransarajey@gmail.com', 'ransara', 'ransara123', 'police', '', '', '', ''),
(4, 'Anushka', 'Dilshan', 'anushka@gmail.com', 'anushka', 'anushka123', 'user', '1234', 'car', '31312', 'fairfirst'),
(8, 'Ceylinco', 'Insurance', 'ceylinco@gmail.com', 'ceylinco', 'ceylinco123', 'insurance', '', '', '', ''),
(9, 'Fairfirst', 'Insurance', 'fairfirst@gmail.com', 'fairfirst', 'fairfirst123', 'insurance', '', '', '', ''),
(10, 'Hasith', 'Gunathilake', 'hasithg@gmail.com', 'hasithg', 'HasithG', 'user', 'Wp1234', 'car', '43231', 'fairfirst'),
(11, 'Nipun', 'Imbuldeniya', 'nipun@gmail.com', 'nipun', 'nipun123', 'user', 'CPABB-6123', 'bike', '124133', 'fairfirst'),
(12, 'Janashakthi', 'Insurance', 'janashakthi@gmail.com', 'janashakthi', 'janashakthi123', '', '', '', '', ''),
(13, 'RDA', 'RDA', 'rda@gmail.com', 'rda', 'rda123', 'rda', '', '', '', ''),
(14, 'Senali', 'Siriwardana', 'senu123@gmail.com', 'senali', 'senali123', 'user', '5672', 'bike', '7654', 'fairfirst');

-- --------------------------------------------------------

--
-- Structure for view `accidentsofusers`
--
DROP TABLE IF EXISTS `accidentsofusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `accidentsofusers`  AS  select `b`.`id` AS `id`,`b`.`lat` AS `lat`,`b`.`lng` AS `lng`,`b`.`description` AS `description`,`b`.`location_status` AS `location_status`,`b`.`image` AS `image`,`b`.`user` AS `user`,`b`.`flag` AS `flag`,`a`.`vehicleNo` AS `vehicleNo`,`a`.`vehicleType` AS `vehicleType`,`a`.`insuaranceNo` AS `insuaranceNo`,`a`.`insuaranceCompany` AS `insuaranceCompany`,`a`.`fname` AS `fname`,`a`.`lname` AS `lname`,`a`.`email` AS `email`,`a`.`username` AS `username` from (`users` `a` join `locations` `b` on(`a`.`username` = `b`.`user`)) where `b`.`location_status` = '1' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
