-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2018 at 10:31 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 5.6.34-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `totalFee` int(11) NOT NULL,
  `feePaid` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `user_id`, `roll`, `address`, `course`, `duration`, `totalFee`, `feePaid`, `image`) VALUES
(1, 3, 1234, 'ghfh', 'hfd', 54645, 5000, 1000, 'h'),
(10, 12, 123, 'sdhjs', 'dhf', 11, 2000, 2000, 'h'),
(12, 16, 124, 'csdfsdf', 'ddfh', 234, 2000, 2000, 'h');

-- --------------------------------------------------------

--
-- Table structure for table `userfees`
--

CREATE TABLE `userfees` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feePaid` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userfees`
--

INSERT INTO `userfees` (`id`, `user_id`, `feePaid`, `created`, `modified`) VALUES
(29, 3, 1000, '2018-04-26 06:54:35', '2018-04-26 06:54:35'),
(30, 12, 2000, '2018-04-26 07:12:40', '2018-04-26 08:00:27'),
(31, 12, 1000, '2018-04-26 07:14:15', '2018-04-26 07:14:15'),
(32, 16, 2000, '2018-04-26 08:40:31', '2018-04-26 08:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1' COMMENT '0=>Admin, 1=>Student',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `emailId`, `password`, `role`, `created`, `modified`) VALUES
(1, 'nupur', 'nupur@gmail.com', '$2y$10$d2zD7Te7SbZvtf.NR21fQusWB4HaRr.4yEa86HR6/1ucyM6EK/RQ6', 0, '2018-04-25 04:56:27', '2018-04-25 04:56:27'),
(3, 'Shiv', 'sonam@gmail.com', '$2y$10$L0zSHhMZIYzMNrGZFHfSL.rjjCCQM23Wy8YNvbERFZl.Clnny5POi', 1, '2018-04-25 06:15:47', '2018-04-25 09:57:41'),
(12, 'sahil', 'sahil123@gmail.com', '$2y$10$/0FvO7KzJYoV0G3pnYa4AOz7TMoof8lLZWfaJmghklbG0LO8GfMCK', 1, '2018-04-25 10:17:47', '2018-04-25 10:18:01'),
(16, 'anu', 'anu@gmail.com', '$2y$10$86cPMqZCJLUl/BsWAIhn9OrOXgRMdiypqhwlu1Z7HXiWki6S6vQnO', 1, '2018-04-26 06:57:11', '2018-04-26 06:57:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userfees`
--
ALTER TABLE `userfees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `userfees`
--
ALTER TABLE `userfees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
