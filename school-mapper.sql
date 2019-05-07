-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2019 at 12:44 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.2.11-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school-mapper`
--
CREATE DATABASE IF NOT EXISTS `school-mapper` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `school-mapper`;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `digitalAddress` varchar(255) NOT NULL,
  `schoolName` varchar(255) NOT NULL,
  `lat` varchar(400) NOT NULL,
  `lng` varchar(420) NOT NULL,
  `region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `digitalAddress`, `schoolName`, `lat`, `lng`, `region`) VALUES
(1, 'GM-073-0936', 'West Africa Senior High', '5.707259', '-0.174751', 'Greater Accra'),
(2, 'GM-035-7649', 'Presbyterian Boys Senior High School', '5.662879', '-0.171747', 'Greater Accra'),
(3, 'GM-018-0993', 'Preset Pacesetters Senior High', '5.669373', '-0.174733', 'Greater Accra'),
(4, 'GA-271-4920', 'St. Mary\'s Senior High School', '5.535644', '-0.222377', 'Greater Accra'),
(5, 'GL-028-4157', 'St. Thomas Aquinas', '5.573308', '-0.177804', 'Greater Accra'),
(6, 'GA-296-6879', 'Achimota Senior High School', '5.628260', '-0.212523', 'Greater Accra'),
(7, 'GA-359-7117', 'Accra Academy Senior High', '5.571523', '-0.243817', 'Greater Accra'),
(8, 'GA-039-0383', 'Accra Girls Senior High School', '5.596983', '-0.192968', 'Greater Accra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
