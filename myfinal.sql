-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 06:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NOT NULL',
  `specialist` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NOT NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialist`) VALUES
(1, 'Milan', 'kardiolog'),
(2, 'Zoran', 'neurolog'),
(3, 'Zorica', 'urolog');

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `id` int(11) NOT NULL,
  `name_of_exam` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_type_details`
--

CREATE TABLE `exam_type_details` (
  `id` int(11) NOT NULL,
  `value` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_exam`
--

CREATE TABLE `lab_exam` (
  `id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `patient_Id` int(11) DEFAULT NULL,
  `tip_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_results`
--

CREATE TABLE `lab_results` (
  `id` int(11) NOT NULL,
  `exam_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_results_details`
--

CREATE TABLE `lab_results_details` (
  `id` int(11) NOT NULL,
  `results_Id` int(11) NOT NULL,
  `exam_type_detail_Id` int(11) NOT NULL,
  `result` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NOT NULL',
  `jmbg` int(50) NOT NULL,
  `no_medic` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NOT NULL',
  `doctor_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `jmbg`, `no_medic`, `doctor_Id`) VALUES
(1, 'Darko', 1111111, 'aaa111', 1),
(2, 'Dragan', 22222, 'bbb222', 2),
(3, 'Dragojla', 333333, 'ccc333', 3),
(25, 'Zvonko', 258523, 'asd258', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_type_details`
--
ALTER TABLE `exam_type_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_Id` (`type_Id`);

--
-- Indexes for table `lab_exam`
--
ALTER TABLE `lab_exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_Id` (`patient_Id`),
  ADD KEY `tip_Id` (`tip_Id`);

--
-- Indexes for table `lab_results`
--
ALTER TABLE `lab_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_Id` (`exam_Id`);

--
-- Indexes for table `lab_results_details`
--
ALTER TABLE `lab_results_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_Id` (`results_Id`),
  ADD KEY `exam_type_detail_Id` (`exam_type_detail_Id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_Id` (`doctor_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_type_details`
--
ALTER TABLE `exam_type_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_exam`
--
ALTER TABLE `lab_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_results`
--
ALTER TABLE `lab_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_results_details`
--
ALTER TABLE `lab_results_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_type_details`
--
ALTER TABLE `exam_type_details`
  ADD CONSTRAINT `exam_type_details_ibfk_1` FOREIGN KEY (`type_Id`) REFERENCES `exam_type` (`id`);

--
-- Constraints for table `lab_exam`
--
ALTER TABLE `lab_exam`
  ADD CONSTRAINT `lab_exam_ibfk_1` FOREIGN KEY (`patient_Id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `lab_exam_ibfk_2` FOREIGN KEY (`tip_Id`) REFERENCES `exam_type` (`id`);

--
-- Constraints for table `lab_results`
--
ALTER TABLE `lab_results`
  ADD CONSTRAINT `lab_results_ibfk_1` FOREIGN KEY (`exam_Id`) REFERENCES `lab_exam` (`id`);

--
-- Constraints for table `lab_results_details`
--
ALTER TABLE `lab_results_details`
  ADD CONSTRAINT `lab_results_details_ibfk_1` FOREIGN KEY (`results_Id`) REFERENCES `lab_results` (`id`),
  ADD CONSTRAINT `lab_results_details_ibfk_2` FOREIGN KEY (`exam_type_detail_Id`) REFERENCES `exam_type` (`id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`doctor_Id`) REFERENCES `doctors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
