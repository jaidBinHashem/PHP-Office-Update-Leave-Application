-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2017 at 10:49 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaverequest`
--

CREATE TABLE `leaverequest` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fromdate` varchar(50) NOT NULL,
  `todate` varchar(50) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaverequest`
--

INSERT INTO `leaverequest` (`id`, `username`, `fromdate`, `todate`, `reason`, `status`) VALUES
(1, 'name', '15-15-16', '15-16-15', 'sickness is the reason', 'Accepted'),
(2, 'jaid_user', '2016-08-02', '2016-08-02', 'sjdhkjsagbjks sajgakjfvjnfnv aslkdnvlanflnfmv salfnvfdnf', 'Acceoted'),
(4, 'user', '15-15-15', '05-09-16', 'For Eid Vacation', 'Accepted'),
(5, 'user', '15-15-15', '05-09-16', 'For Eid Vacation', 'Rejected'),
(6, 'jaid_user', '2016-08-24', '2016-08-31', 'Going to home town for some personal reasons.', 'Accepted'),
(7, 'jaid_user', '2016-09-01', '2016-08-30', 'excuse', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `time`, `subject`, `text`) VALUES
(1, 'jaid_user', '2016-08-31', 'Nothing', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the fir'),
(2, 'jaid_user', '2016-08-31', 'Nothing', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the fir'),
(3, 'jaid_user', '2016-08-31', 'Nothing', 'sdfkksjhgjkfdvkfd'),
(5, 'jaid_bin', '2016-08-31', 'Something', 'Some thing is some thing.'),
(6, 'jaid_bin', '2016-08-31', 'Something', 'Some thing is some thing.'),
(7, 'jaid_user', '2016-08-31', 'User', 'user is gud,very gud.'),
(8, 'jaid_user', '2016-09-01', 'Something', 'web tech submission');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pnumber` varchar(20) NOT NULL,
  `eid` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `fname`, `lname`, `email`, `pnumber`, `eid`, `username`, `password`) VALUES
(34, 'Md. Siam', 'Jaid', 'jaid@gmail.com', '1621370573', '456', 'jaid_user', '12345'),
(35, 'Md. Jaid Bin', 'Hashem', 'mdjaidbinhashem34@gmail.com', '01621370573', '1010', 'jaid_bin', '12345'),
(46, 'fname', 'lname', 'fname@gmail.com', '456789', '456', 'user', '12345'),
(47, '', 'Khilgaon', '', '', '', '', ''),
(48, '', '', '', '', '', '', ''),
(49, '', '', '', '', '', '', ''),
(50, '', '', '', '', '', '', ''),
(51, '', '', '', '', '', '', ''),
(52, '', '', '', '', '', '', ''),
(53, '', '', '', '', '', '', ''),
(54, '', '', '', '', '', '', ''),
(55, '', '', '', '', '', '', ''),
(56, '', '', '', '', '', '', ''),
(57, 'Md. Rahman', 'Chowdhuri', 'rahman@gmail.com', '01842370573', '123', 'rahman', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `templeaverequest`
--

CREATE TABLE `templeaverequest` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fromdate` varchar(50) NOT NULL,
  `todate` varchar(50) NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templeaverequest`
--

INSERT INTO `templeaverequest` (`id`, `username`, `fromdate`, `todate`, `reason`) VALUES
(1, 'jaid', '31-31-16', '15-15-16', 'ami osusto tai ami parbona');

-- --------------------------------------------------------

--
-- Table structure for table `tempprofile`
--

CREATE TABLE `tempprofile` (
  `id` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pnumber` varchar(20) NOT NULL,
  `eid` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempprofile`
--

INSERT INTO `tempprofile` (`id`, `fname`, `lname`, `email`, `pnumber`, `eid`, `username`, `password`) VALUES
(1, 'Temp', 'Profile', 'temp@gmail.com', '01621370573', '456', 'temp', '12345'),
(11, 'fname', 'lname', 'fname@gmail.com', '456789', '456', 'user', '12345'),
(14, 'sdax', 'adac', 'ascaas@mail.com', '1621370573', '1312', 'siam', '12345'),
(16, 'sdax', 'adac', 'ascaas@mail.com', '1621370573', '1312', 'siam', '12345'),
(20, 'Md. Shifat', 'Zaman', 'zaman@gmail.com', '01842370573', '1234', 'zaman@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`) VALUES
(1, 'jaid_bin', '12345', 'admin'),
(13, 'jaid_user', '12345', 'user'),
(14, '', '', 'user'),
(15, '', '', 'user'),
(16, '', '', 'user'),
(17, '', '', 'user'),
(18, '', '', 'user'),
(19, '', '', 'user'),
(20, '', '', 'user'),
(21, '', '', 'user'),
(22, '', '', 'user'),
(23, '', '', 'user'),
(24, 'rahman', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaverequest`
--
ALTER TABLE `leaverequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templeaverequest`
--
ALTER TABLE `templeaverequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempprofile`
--
ALTER TABLE `tempprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leaverequest`
--
ALTER TABLE `leaverequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `templeaverequest`
--
ALTER TABLE `templeaverequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tempprofile`
--
ALTER TABLE `tempprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
