-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 05:05 PM
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
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ID` int(11) NOT NULL,
  `Title` varchar(32) NOT NULL,
  `Event` longtext NOT NULL,
  `Male` int(11) NOT NULL,
  `Female` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `location` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ID`, `Title`, `Event`, `Male`, `Female`, `start`, `end`, `location`) VALUES
(1, '23423', '32342', 5, 5, '2024-02-14', '2024-02-14', 'sfdfsdf'),
(2, 'fefsdfq', 'efsdfsdf', 5, 5, '2024-02-14', '2024-02-14', 'dfsdsdf'),
(3, 'sdfsdf', 'fdvdfv', 3, 4, '2027-01-03', '2028-03-03', 'fdsfdsd'),
(4, 'sdfsdf', 'fdvdfv', 3, 4, '2027-01-03', '2028-03-03', '651651'),
(5, 'dssfdfsddddddddddd', 'ddddddddddddddddd', 10, 10, '2024-02-18', '2024-02-25', 'جامعة طيبة، Janadah Bin Umayyah ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `md5_pass` varchar(32) NOT NULL,
  `gender` enum('male','female','','') NOT NULL,
  `birthday` varchar(11) NOT NULL,
  `conpassword` varchar(25) DEFAULT NULL,
  `con_pass_md5_pass` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `md5_pass`, `gender`, `birthday`, `conpassword`, `con_pass_md5_pass`) VALUES
(7, 'Jehad919@mail.com', 'Jehad919@mail.com', 'Jehad919@mail.com', 'db479536b3d8a8e390c5580f6709b51d', 'male', '2-2-2003', 'Jehad919@mail.com', 'db479536b3d8a8e390c5580f6709b51d'),
(8, '123123@gmail.com', '123123@gmail.com', '123123@gmail.com', 'f208034c35f9df6250fe7acb40892bd4', 'male', '3-2-2003', '123123@gmail.com', 'f208034c35f9df6250fe7acb40892bd4'),
(9, 'Jehadfvfv919@mail.co', 'bgbgJehad919@mail.com', 'Jehad919@mail.com', 'db479536b3d8a8e390c5580f6709b51d', 'female', '2-2-2004', 'Jehad919@mail.com', 'db479536b3d8a8e390c5580f6709b51d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
