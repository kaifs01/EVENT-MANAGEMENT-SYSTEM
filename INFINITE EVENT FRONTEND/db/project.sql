-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 09:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `pass`) VALUES
('1002', '1234'),
('1003', '1234'),
('1004', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `depart` varchar(50) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `name`, `depart`, `desc`, `img`) VALUES
(54, 'Dr Vishal Chhabra', 'Psychiatric', 'Dr Vishal Chhabra is the senior consultant of the Psychiatric department at Fortis Hospital and Fortis Flt. Lt. Rajan Dhall Hospital in New Delhi.', 'Dr Vishal Chhabra.jpeg'),
(55, 'Dr Samir Parikh', 'Behavioral Sciences', 'Dr Samir Parikh is the Director of the Mental Health & Behavioral Sciences Department at Fortis Hospital, Shalimar Bagh, New Delhi. He is amongst the best psychiatrist in India.', 'Dr Samir Parikh.jpeg'),
(60, 'Dr Sameer Malhotra', 'Psychiatric', 'Dr Samir Parikh is the Director of the Mental Health & Behavioral Sciences Department at Fortis Hospital, Shalimar Bagh, New Delhi. He is amongst the best psychiatrist in India.', 'team-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `name`, `email`, `sub`, `msg`) VALUES
(75, 'kaif', 'kazikaif660@gmail.co', 'that is a very nice website.', 'kakakaka kakakaka kakakaka kakakaka makakka kakakk kakaka kakaa ');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL,
  `age` int(50) NOT NULL,
  `city` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `gender`, `age`, `city`) VALUES
(120109, 'lalu pal', 'lalu123@gmail.com', 'lalu123', 'male', 23, 'alibaag'),
(120110, 'lala lalu', 'lala123@gmail.com', 'lala123', 'male', 25, 'surat'),
(120111, 'deep', 'deep123@gmail.com', 'deep123', 'male', 25, 'mumbai'),
(120112, 'kaif', 'kazikaif660@gmail.com', 'kaif13', 'male', 25, 'vapi'),
(120113, 'mushahid', 'kazikaif660@gmail.com', 'kaif123', 'male', 20, 'surat');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `therapy` varchar(50) NOT NULL,
  `dr_name` varchar(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `therapy`, `dr_name`, `patient_name`, `email`, `date`, `time`) VALUES
(78, 'Behavioral Sciences', 'Dr Sameer Malhotra', 'harsh Rajput', 'harsh123@gmail.com', '2023-10-13', '11:14:00.000000'),
(79, 'Cognitive Behavioral', 'Dr Samir Parikh', 'harsh Rajput', 'harsh123@gmail.com', '2023-10-17', '22:02:00.000000'),
(80, 'Behavioral Sciences', 'Dr Sameer Malhotra', 'patel sumit', 'sumit123@gmail.com', '2023-10-05', '21:03:00.000000'),
(81, 'Psychiatric', 'Dr Vishal Chhabra', 'yadav ritesh', 'ritesh123@gmail.com', '2023-10-10', '23:03:00.000000'),
(82, 'Cognitive Behavioral', 'Dr Samir Parikh', 'harsh Rajput', 'harsh123@gmail.com', '2023-10-27', '22:37:00.000000'),
(83, 'Cognitive Behavioral', 'Dr Samir Parikh', 'mushu', 'mushu123@gmail.com', '2023-10-09', '10:17:00.000000'),
(84, 'Choose Department', 'Select Doctor', '', '', '0000-00-00', '00:00:00.000000'),
(85, 'Choose Department', 'Select Doctor', '', '', '0000-00-00', '00:00:00.000000'),
(86, 'Dr Samir Parikh', 'Cognitive Behavioral', 'harsh', '', '2023-08-23', '12:57:00.000000'),
(87, 'Dr Samir Parikh', 'Cognitive Behavioral', 'harsh Rajput', 'kazikaif660@gmail.com', '2023-09-13', '18:09:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120114;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
