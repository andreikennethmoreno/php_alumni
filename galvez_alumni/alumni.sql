-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 08:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni_list`
--

CREATE TABLE `alumni_list` (
  `studentnumber` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `batch` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `contactnumber` int(50) NOT NULL,
  `employmentstatus` varchar(50) NOT NULL,
  `id` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni_list`
--

INSERT INTO `alumni_list` (`studentnumber`, `lastname`, `firstname`, `middlename`, `gender`, `birthdate`, `batch`, `course`, `contactnumber`, `employmentstatus`, `id`) VALUES
(2023454545, 'moreno', 'kenneth', 'acuno', 'male', '2024-01-12', '2024', 'computer-science', 928882828, 'employed', 17),
(2147483647, 'Mendoza', 'Zachery', 'utin', 'male', '2024-01-05', '2025', 'information-technology', 656565656, 'employed', 25),
(2147483647, 'Ciano', 'Lester', 'Jsasa', 'male', '2024-01-04', '2023', 'information-technology', 384983943, 'unemployed', 26);

-- --------------------------------------------------------

--
-- Table structure for table `login_db`
--

CREATE TABLE `login_db` (
  `ID` int(11) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_db`
--

INSERT INTO `login_db` (`ID`, `emailaddress`, `password`) VALUES
(1, 'admin@gmail.com', 'admin'),
(2, 'hello@gmail.com', 'hello'),
(3, '', ''),
(4, 'galvez@gmail.com', '123'),
(5, '', ''),
(6, '', ''),
(7, 'dioren@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni_list`
--
ALTER TABLE `alumni_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_db`
--
ALTER TABLE `login_db`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni_list`
--
ALTER TABLE `alumni_list`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `login_db`
--
ALTER TABLE `login_db`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
