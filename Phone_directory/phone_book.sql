-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2018 at 10:40 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `name` varchar(20) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`name`, `number`, `Email`, `id`, `contact_id`) VALUES
('talha', 0, '3245600484', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `password1` varchar(40) DEFAULT NULL,
  `phoneno` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `password1`, `phoneno`) VALUES
(10, 'talha', 'ASDZXC00', 3245600484),
(11, '123asda', 'AAAAAAAAAAAAAAAAAAA', 2222),
(12, '123asda', 'ASDZXC0000000000000', 2222),
(13, '123asda', 'ASDZXC0000000000000', 2222),
(14, '123asda', 'ASDZXC0000000000000', 2222),
(15, '123asda', 'ASDZXC0000000000000', 2222),
(16, '123asda', 'ASDZXC0000000000000', 2222),
(17, '123asda', 'ASDZXC0000000000000', 2222),
(18, '123asda', 'ASDZXC0000000000000', 2222),
(19, '123asda', 'ASDZXC0000000000000', 2222),
(20, '123asda', 'ASDZXC0000000000000', 2222),
(21, '123asda', 'ASDZXC0000000000000', 2222),
(22, '123asda', 'ASDZXC0000000000000', 2222),
(23, '123asda', 'ASDZXC0000000000000', 2222),
(24, '123asda', 'ASDZXC0000000000000', 2222),
(25, '123asda', 'ASDZXC0000000000000', 2222),
(26, '123asda', 'ASDZXC0000000000000', 2222),
(27, '123asda', 'ASDZXC0000000000000', 2222),
(28, '123asda', 'ASDZXC0000000000000', 2222),
(29, 'talha', 'talhafayyaz225@gmail.com', 3245600484);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_data` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
