-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2018 at 05:19 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 5.6.35-1+ubuntu16.04.1+deb.sury.org+1

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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(1, 'SQL'),
(2, 'PHP'),
(3, 'DOTNET'),
(4, 'JAVA'),
(5, 'Python'),
(6, 'IOS'),
(7, 'Android');

-- --------------------------------------------------------

--
-- Table structure for table `examount`
--

CREATE TABLE `examount` (
  `id` int(11) NOT NULL,
  `excategory_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examount`
--

INSERT INTO `examount` (`id`, `excategory_id`, `amount`, `created`, `modified`) VALUES
(1, 1, 1000, '2018-04-03 08:37:00', '2018-05-09 13:32:07'),
(2, 3, 4000, '2018-05-03 08:37:29', '2018-05-04 17:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `excategories`
--

CREATE TABLE `excategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `excategories`
--

INSERT INTO `excategories` (`id`, `name`) VALUES
(1, 'Electricity'),
(2, 'Stationary'),
(3, 'Rent');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `by_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `by_id`, `to_id`, `message`, `status`) VALUES
(10, 3, 1, '<p>first text message</p>\r\n', 1),
(11, 3, 1, '<p><em><strong>second text message</strong></em></p>\r\n', 1),
(12, 1, 3, '<p>reply for test message</p>\r\n', 1),
(21, 3, 1, '<p>Nice Course</p>\r\n', 1),
(22, 3, 1, '<p>Thanks for this</p>\r\n', 1),
(23, 1, 3, '<ol>\r\n	<li><strong>Thanks</strong></li>\r\n</ol>\r\n', 1),
(24, 12, 1, '<p>Hi</p>\r\n\r\n<p>Its Sahil This side.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Youyr courses are very Effective and Interesting.</p>\r\n', 1),
(25, 12, 1, '<p><em>Please add following courses also</em></p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td><em><strong>Course Name</strong></em></td>\r\n			<td><em><strong>Duration&nbsp;</strong></em></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Oracle</td>\r\n			<td>6 months</td>\r\n		</tr>\r\n		<tr>\r\n			<td>C++</td>\r\n			<td>2 months</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Compilers Study</td>\r\n			<td>5 Months</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1),
(26, 1, 12, '<p>Thanks.</p>\r\n\r\n<p>We will definetely try to add these Course in following months</p>\r\n', 1),
(27, 1, 12, '<p>hello, Please check the link given to you in email</p>\r\n', 1),
(28, 12, 1, '<p><strong>hello</strong></p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>1</td>\r\n			<td>2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3</td>\r\n			<td>4</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1),
(29, 1, 12, '<p>Please check</p>\r\n', 1),
(30, 12, 1, '<p>Please mail me the link to e courses for <strong>Python</strong>.</p>\r\n\r\n<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;"><em>Thanks.</em></div>\r\n', 1),
(31, 1, 12, '<p>check your mail&nbsp;</p>\r\n', 1),
(32, 1, 12, '<p>sent you the link</p>\r\n', 1),
(33, 1, 12, '<p><em><strong>great</strong></em></p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `Institutename` varchar(255) NOT NULL,
  `adminemailId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `Institutename`, `adminemailId`) VALUES
(1, 'ABCs Institute', 'admin_abc_institute@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `totalFee` int(11) NOT NULL,
  `feePaid` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `user_id`, `roll`, `address`, `course_id`, `duration`, `totalFee`, `feePaid`, `image`, `status`) VALUES
(1, 3, 1234, 'ghfh', 2, 1, 5000, 5000, '1525180394_Shiv.jpeg', 1),
(10, 12, 123, 'sdhjs', 1, 11, 2000, 2000, '1525180389_sahil.jpeg', 1),
(12, 16, 124, 'csdfsdf', 1, 234, 5000, 3000, '1525180377_anu.jpeg', 0),
(13, 26, 565, 'asdweqw', 4, 56, 656, 100, '1525180350_sunny.jpeg', 1),
(14, 27, 1542, 'asdweqw', 2, 5, 5000, 0, '1525671263_karan.jpeg', 1),
(15, 28, 6254, 'asdweqw', 2, 8, 8000, 0, '1525671409_satvik.jpeg', 1),
(27, 40, 23, 'asdweqw', 7, 12, 12000, 0, '1525682206_Shivani.jpeg', 1),
(36, 49, 65, 'asdweqw', 7, 9, 9000, 0, '1525685068_nupurg.jpeg', 1),
(37, 50, 33, 'asdweqw', 4, 7, 10000, 0, '1525685206_Nupurs.jpeg', 1),
(38, 51, 3243, 'Trantor, Chandigarh', 7, 7, 10000, 0, '1525685467_Vikrant.jpeg', 1),
(42, 57, 45, 'hjfdjh', 4, 3453, 545467, 0, '1525691504_nupur123.jpeg', 1),
(46, 61, 1523, 'asdweqw', 1, 545, 54545, 0, '1525784116_akash.jpeg', 1),
(47, 62, 534, 'asdweqw', 1, 454, 4545, 0, '1525784173_aks.jpeg', 1);

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
(29, 3, 5000, '2018-04-26 06:54:35', '2018-05-03 04:56:06'),
(30, 12, 2000, '2018-05-26 07:12:40', '2018-04-26 08:00:27'),
(32, 16, 2000, '2018-04-26 08:40:31', '2018-04-26 08:40:31'),
(33, 26, 100, '2018-05-07 05:02:46', '2018-05-07 05:02:46'),
(34, 16, 1000, '2018-05-07 05:04:45', '2018-05-07 05:04:45');

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
(3, 'Shiv', 'sonam@gmail.com', '$2y$10$L0zSHhMZIYzMNrGZFHfSL.rjjCCQM23Wy8YNvbERFZl.Clnny5POi', 1, '2018-04-06 06:15:47', '2018-05-01 13:13:14'),
(12, 'sahil', 'sahil123@gmail.com', '$2y$10$/0FvO7KzJYoV0G3pnYa4AOz7TMoof8lLZWfaJmghklbG0LO8GfMCK', 1, '2018-05-25 10:17:47', '2018-05-01 13:13:09'),
(16, 'anu', 'anu@gmail.com', '$2y$10$86cPMqZCJLUl/BsWAIhn9OrOXgRMdiypqhwlu1Z7HXiWki6S6vQnO', 1, '2018-04-26 06:57:11', '2018-05-01 13:12:57'),
(26, 'sunny', 'sunny@gmail.com', '$2y$10$oi3RpNf7gxc9MFrU1cKEMebNu2nrNTd9nCb9.z0aGS2w/Rlphrh7e', 1, '2018-05-01 13:12:30', '2018-05-01 13:12:30'),
(27, 'karan', 'karan@gmail.com', '$2y$10$U5rhiqMi0mayzBU91fZ18uqETGfIgoxX1cLKTGt/FNCu05aNn8.NW', 1, '2018-05-07 05:34:23', '2018-05-07 05:34:23'),
(28, 'satvik', 'satvik@gmail.com', '$2y$10$qSuOw4c6vqRt7HAuRhVNWeXpoHseyaUfbvX2hRKDFwPipdVTuUnrK', 1, '2018-05-07 05:36:49', '2018-05-07 09:33:51'),
(40, 'Shivani', 'shivani@gmail.com', '$2y$10$x5buzQaboXmXduYlL1bwXOP3SIx5/Omqp.XfsA3zjZsfJxGJAeEi6', 1, '2018-05-07 08:36:46', '2018-05-07 08:36:46'),
(49, 'nupurg', 'nupur.sethi@chd.trantorinc.com', '$2y$10$UDerOxgZyc3/aiNyzO1VSOT5bhWYapxEq9Lz6YLvczQgBbbUtSTEy', 1, '2018-05-07 09:24:28', '2018-05-07 09:24:28'),
(50, 'Nupurs', 'nupursethi15071@gmail.com', '$2y$10$2ty2sTpYBbZ9Qb5OVH8/xOo0ZAcm8xi8wcNKyw65wFeAC7D1HP6km', 1, '2018-05-07 09:26:46', '2018-05-07 09:34:40'),
(51, 'Vikrant', 'vikrant.bhalla@trantorinc.com', '$2y$10$HYSXc9ZihAYjBkbi2jO49e3VS4YeIxMzDMarmDoeLE2OXk0wsH8i2', 1, '2018-05-07 09:31:07', '2018-05-07 11:59:28'),
(57, 'nupur123', 'nupursethi1507@gmail.com', '$2y$10$63E58f0KoLxxLHvNui3NQ.TvhDd1UOTAToD7R6Dm0dYICofCurrvC', 1, '2018-05-07 11:11:44', '2018-05-07 11:11:44'),
(61, 'akash', 'akash@gmail.com', '$2y$10$5/G9QvozweLTwVg9CqJToOnGR9sCmafA4hidTF4er6u2sR7BhB96m', 1, '2018-05-08 12:55:16', '2018-05-08 12:55:16'),
(62, 'aks', 'nupursethi1507@gmail.com', '$2y$10$q1WQ3MmvisRy8gFVgd12pu2jM4o1JL4bKD7HUeIt3A1CeQhKBJGNe', 1, '2018-05-08 12:56:13', '2018-05-08 12:56:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examount`
--
ALTER TABLE `examount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excategories`
--
ALTER TABLE `excategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `examount`
--
ALTER TABLE `examount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `excategories`
--
ALTER TABLE `excategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `userfees`
--
ALTER TABLE `userfees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
