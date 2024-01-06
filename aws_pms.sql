-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 07:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aws_pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectid` int(255) NOT NULL,
  `projectname` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectid`, `projectname`, `timestamp`) VALUES
(1, 'Wordpress', '2024-01-06 06:10:35'),
(3, 'React Js', '2024-01-06 06:10:35'),
(4, 'PHP', '2024-01-06 06:10:35'),
(9, 'laravel', '2024-01-06 06:10:35'),
(14, 'Meru Accounting', '2024-01-06 06:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `reagister`
--

CREATE TABLE `reagister` (
  `id` int(255) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reagister`
--

INSERT INTO `reagister` (`id`, `First_name`, `Last_name`, `Username`, `Password`, `Role`, `timestamp`) VALUES
(52, 'Nitin', 'Talsaniya', 'nitintalsaniya', 'Admin', '1', '2024-01-06 06:11:14'),
(53, 'Hemu', 'Talsaniya', 'hemutalsaniya', 'Normal', '0', '2024-01-06 06:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(255) NOT NULL,
  `task_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `project` varchar(255) NOT NULL,
  `employe` varchar(255) NOT NULL,
  `dt` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_title`, `description`, `project`, `employe`, `dt`, `status`, `timestamp`) VALUES
(5, 'Application', 'logo', '1', '1', '0', '1', '2024-01-06 06:11:44'),
(6, 'Login forn', 'Create a login form with name and password and email addresss.', '4', '53', '0', '0', '2024-01-06 06:11:44'),
(16, 'dhgfd', 'gdfdgs', '3', '2', '0', '0', '2024-01-06 06:11:44'),
(18, 'wdsacz', 'wesadZX', '4', '2', '0', '0', '2024-01-06 06:11:44'),
(31, ',esrhkldfxc', 'eradshxkj', '4', '52', '29 Mar 2023 03:43:20pm', '0', '2024-01-06 06:11:44'),
(32, 'Responsive issue', 'enovn', '14', '53', '06 Jan 2024 07:06:16am', '2', '2024-01-06 06:11:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectid`);

--
-- Indexes for table `reagister`
--
ALTER TABLE `reagister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reagister`
--
ALTER TABLE `reagister`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
