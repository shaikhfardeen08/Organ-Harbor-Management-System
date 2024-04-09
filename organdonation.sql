-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 06:04 AM
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
-- Database: `organdonation`
--

-- --------------------------------------------------------

--
-- Table structure for table `donated_patients`
--

CREATE TABLE `donated_patients` (
  `id` int(255) NOT NULL,
  `PatientName` text NOT NULL,
  `PatientAge` int(11) NOT NULL,
  `PatientGender` enum('Male','Female') NOT NULL,
  `PatientAddress` varchar(250) NOT NULL,
  `PatientEmail` varchar(100) NOT NULL,
  `PatientNumber` bigint(15) NOT NULL,
  `Datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NeededOrgan` enum('Kidney','Liver','Eyes','Intestine','Pancreas','Heart') NOT NULL,
  `PatientBloodGrp` enum('O','A','B','AB') NOT NULL,
  `ReceivedTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donorreg`
--

CREATE TABLE `donorreg` (
  `id` int(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contactNumber` bigint(15) NOT NULL,
  `bloodGroup` enum('O','A','B','AB') NOT NULL,
  `donorStatus` enum('Alive','Deceased') NOT NULL,
  `organToDonate` enum('Kidney','Liver','Intestine','Pancreas','Lungs','Heart','Eyes') NOT NULL,
  `causeOfDeath` enum('Normal','Accident','Other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notdonated_patient`
--

CREATE TABLE `notdonated_patient` (
  `id` int(11) NOT NULL,
  `PatientName` varchar(50) NOT NULL,
  `PatientAge` int(15) NOT NULL,
  `PatientGender` enum('Male','Female') NOT NULL,
  `PatientAddress` varchar(255) NOT NULL,
  `PatientEmail` varchar(100) NOT NULL,
  `PatientNumber` bigint(15) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `NeededOrgan` enum('Kidney','Intestine','Pancreas','Heart','Eyes','Liver') NOT NULL,
  `PatientBloodGrp` enum('O','A','B','AB') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orgdonateprocess`
--

CREATE TABLE `orgdonateprocess` (
  `id` int(255) NOT NULL,
  `donor_id` int(255) NOT NULL,
  `donor_name` varchar(20) NOT NULL,
  `patient_id` int(255) NOT NULL,
  `patient_name` varchar(25) NOT NULL,
  `donated_organ` enum('Kidney','Liver','Intestine','Pancreas','Lungs','Heart','Eyes') NOT NULL,
  `match_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patientreg`
--

CREATE TABLE `patientreg` (
  `id` int(255) NOT NULL,
  `PatientName` varchar(20) NOT NULL,
  `PatientAge` int(200) NOT NULL,
  `PatientGender` enum('Male','Female','','') NOT NULL,
  `PatientAddress` varchar(200) NOT NULL,
  `PatientEmail` varchar(60) NOT NULL,
  `PatientNumber` bigint(15) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NeededOrgan` enum('Kidney','Intestine','Pancreas','Heart','Eyes','Liver') NOT NULL,
  `PatientBloodGrp` enum('O','A','B','AB') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transplanted_pairs`
--

CREATE TABLE `transplanted_pairs` (
  `Donor_Id` int(11) NOT NULL,
  `Donor_Name` varchar(80) NOT NULL,
  `Patient_Id` int(11) NOT NULL,
  `Patient_Name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donated_patients`
--
ALTER TABLE `donated_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donorreg`
--
ALTER TABLE `donorreg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `notdonated_patient`
--
ALTER TABLE `notdonated_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orgdonateprocess`
--
ALTER TABLE `orgdonateprocess`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donor_id` (`donor_id`,`donor_name`,`patient_id`,`patient_name`,`donated_organ`),
  ADD KEY `donor_name` (`donor_name`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `patient_name` (`patient_name`),
  ADD KEY `donated_organ` (`donated_organ`);

--
-- Indexes for table `patientreg`
--
ALTER TABLE `patientreg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PatientName` (`PatientName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donated_patients`
--
ALTER TABLE `donated_patients`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donorreg`
--
ALTER TABLE `donorreg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notdonated_patient`
--
ALTER TABLE `notdonated_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orgdonateprocess`
--
ALTER TABLE `orgdonateprocess`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patientreg`
--
ALTER TABLE `patientreg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orgdonateprocess`
--
ALTER TABLE `orgdonateprocess`
  ADD CONSTRAINT `orgdonateprocess_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donorreg` (`id`),
  ADD CONSTRAINT `orgdonateprocess_ibfk_2` FOREIGN KEY (`donor_name`) REFERENCES `donorreg` (`name`),
  ADD CONSTRAINT `orgdonateprocess_ibfk_4` FOREIGN KEY (`patient_id`) REFERENCES `patientreg` (`id`),
  ADD CONSTRAINT `orgdonateprocess_ibfk_5` FOREIGN KEY (`patient_name`) REFERENCES `patientreg` (`PatientName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
