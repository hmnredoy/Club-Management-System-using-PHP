-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 08:56 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `club`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`id`, `username`, `name`, `gender`, `password`, `avatar`) VALUES
(1, '0000-000-0', 'Admin', 'Male', '123456', 'admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `clubinfo`
--

CREATE TABLE `clubinfo` (
  `club_ID` int(11) NOT NULL,
  `club_Name` varchar(100) NOT NULL,
  `moderator` varchar(100) NOT NULL DEFAULT 'None',
  `moderator_ID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clubinfo`
--

INSERT INTO `clubinfo` (`club_ID`, `club_Name`, `moderator`, `moderator_ID`) VALUES
(1, 'APAC', 'None', NULL),
(2, 'Shomoy Club', 'Habib', '1111-111-2'),
(3, 'Computer Club', 'Redoy', '1111-111-1'),
(4, 'Film Club', 'None', NULL),
(5, 'Drama Club', 'None', NULL),
(6, 'Photography Club', 'None', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `club_relation`
--

CREATE TABLE `club_relation` (
  `id` int(11) NOT NULL,
  `club_ID` varchar(20) NOT NULL,
  `club_Name` varchar(100) NOT NULL,
  `user_ID` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `club_relation`
--

INSERT INTO `club_relation` (`id`, `club_ID`, `club_Name`, `user_ID`, `status`) VALUES
(94, '3', 'Computer Club', '15-28743-1', 'Y'),
(96, '5', 'Drama Club', '15-28743-1', 'Y'),
(98, '5', 'Drama Club', '15-28743-2', 'Y'),
(99, '1', 'APAC', '15-28743-3', 'N'),
(100, '4', 'Film Club', '15-28743-4', 'N'),
(102, '3', 'Computer Club', '15-28743-6', 'Y'),
(108, '4', 'Film Club', '15-28743-1', 'Y'),
(109, '2', 'Shomoy Club', '15-28743-1', 'Y'),
(110, '3', 'Computer Club', '15-28743-2', 'Y'),
(111, '4', 'Film Club', '15-28743-2', 'Y'),
(113, '4', 'Film Club', '15-28743-6', 'Y'),
(116, '1', 'APAC', '15-28743-1', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `event_join`
--

CREATE TABLE `event_join` (
  `id` int(11) NOT NULL,
  `event_ID` int(11) NOT NULL,
  `club_ID` int(11) NOT NULL,
  `joined_Member_ID` varchar(50) NOT NULL,
  `show_Event` varchar(5) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_table`
--

CREATE TABLE `event_table` (
  `id` int(11) NOT NULL,
  `event_head` varchar(200) NOT NULL,
  `event_detail` varchar(500) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `event_img` varchar(1000) NOT NULL,
  `club_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_table`
--

INSERT INTO `event_table` (`id`, `event_head`, `event_detail`, `venue`, `capacity`, `date`, `time`, `event_img`, `club_ID`) VALUES
(1, 'Pohela Falgun Utshob', 'Pohela Falgun Utshob at AIUB premises.', 'Kuratoli Campus', '1000', '23-03-2018', '3:45', '151801070523511089_1504663656290228_8465058697236924802_o.jpg', '3'),
(2, 'lorem ipsum', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 'Gulshan Math', '544', '15-05-2018', '16:00', '1519134834IMG_20171114_215630_289.jpg', '2'),
(3, '21st February Event', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 'AIUB Permanent campus', '122', '18-10-2019', '15:00', '1519144424IMG_20171114_213746_517.jpg', '3'),
(4, 'Event', 'event detail', 'banani', '120', '16-10-2018', '15:00', '151966221123511089_1504663656290228_8465058697236924802_o.jpg', '3');

-- --------------------------------------------------------

--
-- Table structure for table `group_chat`
--

CREATE TABLE `group_chat` (
  `id` int(11) NOT NULL,
  `groupName` varchar(20) NOT NULL,
  `receiverID` varchar(20) NOT NULL,
  `senderID` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `time` varchar(10) NOT NULL,
  `senderName` varchar(20) NOT NULL,
  `showMessage` varchar(10) NOT NULL DEFAULT 'Y',
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_chat`
--

INSERT INTO `group_chat` (`id`, `groupName`, `receiverID`, `senderID`, `message`, `time`, `senderName`, `showMessage`, `date_time`) VALUES
(36, 'Reminder_For_Event', '1111-111-1', '0000-000-0', 'Hello, its Admin. I would like to remind all of you to be prepared for the coming event.', '1519064709', 'Admin', 'Y', '2018-02-26 19:44:14'),
(37, 'Reminder_For_Event', '1111-111-2', '0000-000-0', 'Hello, its Admin. I would like to remind all of you to be prepared for the coming event.', '1519064709', 'Admin', 'Y', '2018-02-26 19:44:20'),
(38, 'Reminder_For_Event', '1111-111-1', '1111-111-1', 'Hi. I\'ts Redoy. Thank you for your message.', '1519065164', 'Redoy', 'Y', '2018-02-26 19:44:22'),
(39, 'Reminder_For_Event', '1111-111-2', '1111-111-2', 'Hey guys. We are gonna do as we are told.', '1519065224', 'Habib', 'Y', '2018-02-26 19:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `recieverID` varchar(20) NOT NULL,
  `senderID` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `time` varchar(10) NOT NULL,
  `senderName` varchar(50) DEFAULT NULL,
  `senderType` varchar(20) NOT NULL,
  `showMessage` varchar(5) NOT NULL DEFAULT 'Y',
  `seen_unseen` varchar(10) NOT NULL DEFAULT 'unseen',
  `deleted_by_member` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `recieverID`, `senderID`, `message`, `time`, `senderName`, `senderType`, `showMessage`, `seen_unseen`, `deleted_by_member`) VALUES
(286, '15-28743-2', '0000-000-0', 'test', '1519063246', 'Admin', 'admin', 'Y', 'seen', ''),
(287, '15-28743-6', '0000-000-0', 'test', '1519063249', 'Admin', 'admin', 'Y', 'seen', ''),
(288, '1111-111-1', '0000-000-0', 'test', '1519063256', 'Admin', 'admin', 'Y', 'unseen', ''),
(290, '11-11111-1', '0000-000-0', 'test', '1519063261', 'Admin', 'admin', 'Y', 'seen', '0000-000-0'),
(291, '0000-000-0', '11-11111-1', 'yess', '1519063313', 'ssss sss', '', 'Y', 'seen', '0000-000-0'),
(293, '0000-000-0', '15-28743-6', 'yes', '1519063344', 'Nishat Mohona', '', 'Y', 'seen', ''),
(294, '0000-000-0', '1111-111-1', 'yes', '1519063356', 'Redoy', 'moderator', 'Y', 'unseen', ''),
(299, '15-28743-2', '0000-000-0', 'hiiiiii', '1519108063', 'Admin', 'admin', 'Y', 'seen', '');

-- --------------------------------------------------------

--
-- Table structure for table `moderatorinfo`
--

CREATE TABLE `moderatorinfo` (
  `id` int(11) NOT NULL,
  `user_ID` varchar(30) NOT NULL,
  `Name` varchar(100) NOT NULL DEFAULT 'none',
  `Club_ID` varchar(20) NOT NULL,
  `Club_Name` varchar(100) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Date_Time` varchar(50) NOT NULL,
  `Avatar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moderatorinfo`
--

INSERT INTO `moderatorinfo` (`id`, `user_ID`, `Name`, `Club_ID`, `Club_Name`, `Gender`, `Email`, `Password`, `Date_Time`, `Avatar`) VALUES
(1, '1111-111-1', 'Redoy', '3', 'Computer Club', 'male', 'fghrh@sfd.ryt', '123456', '2018-01-02 19:48:29', 'moderator.png'),
(4, '1111-111-2', 'Habib', '2', 'Shomoy Club', 'male', 'ewrwe@da.cm', '123456', '2018-01-18 01:06:31', 'moderator.png'),
(5, '1111-111-3', 'test', 'None', 'None', 'male', 'ww@sswds.cm', '123456', '2018-02-22 18:23:55', 'moderator.png');

-- --------------------------------------------------------

--
-- Table structure for table `notice_table`
--

CREATE TABLE `notice_table` (
  `id` int(11) NOT NULL,
  `notice` varchar(10000) DEFAULT NULL,
  `time_date` varchar(100) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `club_ID` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `eventID` varchar(20) NOT NULL,
  `club_ID` varchar(20) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date_time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notif_seen`
--

CREATE TABLE `notif_seen` (
  `id` int(11) NOT NULL,
  `notifID` varchar(20) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `seen_unseen` varchar(10) NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(11) NOT NULL,
  `clubname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `admissionyear` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(10000) NOT NULL,
  `is_active` varchar(1) DEFAULT 'N',
  `dateTime` varchar(100) DEFAULT NULL,
  `clubID` varchar(20) DEFAULT NULL,
  `show_Event` varchar(10) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `clubname`, `name`, `username`, `dept`, `semester`, `gender`, `dob`, `admissionyear`, `phone`, `email`, `password`, `avatar`, `is_active`, `dateTime`, `clubID`, `show_Event`) VALUES
(80, 'Computer Club', 'N Zaman Redoy', '15-28743-1', 'Engineering', 'Spring', 'Female', '3/Mar/1997', '2015', '01742072430', 'abc@ddd.nn', '123456', '1518101539FB_IMG_1487270137432.jpg', 'Y', '2018-02-08 20:52:20', '3', 'Y'),
(81, 'Drama Club', 'Fahim Jawad', '15-28743-2', 'FSIT', 'Spring', 'male', '1/Feb/1994', '2015', '01712345610', 'abc@gmail.com', '123456', '1518104144FB_IMG_1487270051383.jpg', 'Y', '2018-02-08 21:35:44', '5', 'Y'),
(82, 'APAC', 'Nahid Kaiser', '15-28743-3', 'Engineering', 'Fall', 'male', '4/Oct/1993', '2013', '01712345613', 'abcd@gmail.com', '123456', '1518104191FB_IMG_1487270044522.jpg', 'N', '2018-02-08 21:36:31', '1', 'Y'),
(83, 'Film Club', 'Rakib Zaman', '15-28743-4', 'FBA', 'Summer', 'male', '5/May/1996', '2016', '01712345615', 'abcde@gmail.com', '123456', '1518104311-128771194.jpg', 'N', '2018-02-08 21:38:31', '4', 'Y'),
(84, 'Computer Club', 'Habib Zaman', '15-28743-5', 'Engineering', 'Fall', 'male', '5/Jul/1992', '2012', '01712347617', 'heeeeee@gmail.com', '123456', '1518104378bangladesh_4s.jpg', 'N', '2018-02-08 21:39:38', '3', 'Y'),
(85, 'Computer Club', 'Nishat Mohona', '15-28743-6', 'FAS', 'Summer', 'female', '25/Jun/1999', '2017', '01712347618', 'mn@abc.com', '123456', '1518104455background-funny-iphone-lockscreen-Favim.com-1760980.jpg', 'Y', '2018-02-08 21:40:55', '3', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubinfo`
--
ALTER TABLE `clubinfo`
  ADD UNIQUE KEY `UNIQUE` (`club_ID`);

--
-- Indexes for table `club_relation`
--
ALTER TABLE `club_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_join`
--
ALTER TABLE `event_join`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_table`
--
ALTER TABLE `event_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_chat`
--
ALTER TABLE `group_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderatorinfo`
--
ALTER TABLE `moderatorinfo`
  ADD PRIMARY KEY (`id`,`user_ID`);

--
-- Indexes for table `notice_table`
--
ALTER TABLE `notice_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif_seen`
--
ALTER TABLE `notif_seen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admininfo`
--
ALTER TABLE `admininfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `club_relation`
--
ALTER TABLE `club_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `event_join`
--
ALTER TABLE `event_join`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `event_table`
--
ALTER TABLE `event_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `group_chat`
--
ALTER TABLE `group_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;
--
-- AUTO_INCREMENT for table `moderatorinfo`
--
ALTER TABLE `moderatorinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notice_table`
--
ALTER TABLE `notice_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notif_seen`
--
ALTER TABLE `notif_seen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
