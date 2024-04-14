-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 02:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `competitorsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `u_name` varchar(80) NOT NULL,
  `u_email` varchar(80) NOT NULL,
  `u_password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `u_name`, `u_email`, `u_password`) VALUES
(1, 'Manzi', 'm.david@alustudent.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `competitorinfo`
--

CREATE TABLE `competitorinfo` (
  `id` int(11) NOT NULL,
  `u_companyname` varchar(80) NOT NULL,
  `u_marketvalue` varchar(80) NOT NULL,
  `u_marketprice` varchar(80) NOT NULL,
  `u_streetaddress` varchar(80) NOT NULL,
  `u_city` varchar(80) NOT NULL,
  `u_province` varchar(80) NOT NULL,
  `u_district` varchar(80) NOT NULL,
  `u_cell` varchar(80) NOT NULL,
  `u_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `competitorinfo`
--

INSERT INTO `competitorinfo` (`id`, `u_companyname`, `u_marketvalue`, `u_marketprice`, `u_streetaddress`, `u_city`, `u_province`, `u_district`, `u_cell`, `u_date`) VALUES
(7, 'Amazon ', '40000000', '40000', '33 street', 'Kigali', 'Kigali', 'Gasabo', 'Taba', '2024-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `customerinfo`
--

CREATE TABLE `customerinfo` (
  `id` int(11) NOT NULL,
  `u_productname` varchar(80) NOT NULL COMMENT 'beans',
  `u_currentprice` int(80) NOT NULL,
  `u_sector` varchar(80) NOT NULL,
  `u_type` varchar(80) NOT NULL,
  `u_geography` varchar(80) NOT NULL,
  `u_worth` int(80) NOT NULL,
  `u_revenue` int(80) NOT NULL,
  `u_socialmedia` varchar(80) NOT NULL,
  `u_priceaverage` varchar(80) NOT NULL,
  `u_marketshare` varchar(80) NOT NULL,
  `u_averageratings` varchar(80) NOT NULL,
  `u_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`id`, `u_productname`, `u_currentprice`, `u_sector`, `u_type`, `u_geography`, `u_worth`, `u_revenue`, `u_socialmedia`, `u_priceaverage`, `u_marketshare`, `u_averageratings`, `u_date`) VALUES
(9, '1', 1, '1', '1', '1', 1, 1, 'FACEBOOK', '1', '1', '1', '2024-03-26'),
(10, 'Beans', 300, 'Agriculture', 'Very Good', 'Kigali', 400, 500, 'INSTAGRAM', '10000', '12', '10', '2024-03-28'),
(11, 'beans', 12, 'wjndj', '12', '<ul><a href=\"../admindashboard.php\" class=\"a\">HOME</a></ul>', 12, 1212, 'TWITTER', '12', '12', '12', '2024-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `inputdata`
--

CREATE TABLE `inputdata` (
  `id` int(11) NOT NULL,
  `u_productname` varchar(80) NOT NULL,
  `u_currentprice` varchar(80) NOT NULL,
  `u_type` varchar(80) NOT NULL,
  `u_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inputdata`
--

INSERT INTO `inputdata` (`id`, `u_productname`, `u_currentprice`, `u_type`, `u_date`) VALUES
(5, 'Beanshbuhj', '12000', 'Very Good', '2024-03-25'),
(6, 'Beans', '900000', '12', '2024-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `u_name` varchar(80) NOT NULL,
  `u_email` varchar(80) NOT NULL,
  `u_password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `u_name`, `u_email`, `u_password`) VALUES
(1, 'Hakim', 'hakim111@gmail.com', 'Chrispaul_120');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competitorinfo`
--
ALTER TABLE `competitorinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerinfo`
--
ALTER TABLE `customerinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inputdata`
--
ALTER TABLE `inputdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `competitorinfo`
--
ALTER TABLE `competitorinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customerinfo`
--
ALTER TABLE `customerinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inputdata`
--
ALTER TABLE `inputdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
