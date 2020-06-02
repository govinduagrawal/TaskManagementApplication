-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 10:39 AM
-- Server version: 5.6.32-log
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pilot_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_fname` varchar(50) NOT NULL,
  `admin_lname` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `salary` int(10) NOT NULL,
  `admin_status` int(10) NOT NULL,
  `admin_gender` varchar(10) NOT NULL,
  `admin_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_email`, `admin_password`, `salary`, `admin_status`, `admin_gender`, `admin_image`) VALUES
(1, 'govind', 'agrawal', 'govind@gmail.com', '123', 500000, 1, 'male', '../images/Profile_Images/download.png'),
(2, 'Parth', 'Bajaj', 'pbajaj1234@gmail.com', '123', 400000, 1, 'male', '../images/Profile_Images/download.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_by` int(10) NOT NULL,
  `comment_to` int(10) NOT NULL,
  `comment_task_id` int(10) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `comment_display` int(5) NOT NULL DEFAULT '1',
  `commenter_name` varchar(50) NOT NULL,
  `commenter_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cto`
--

CREATE TABLE `cto` (
  `cto_id` int(10) NOT NULL,
  `cto_fname` varchar(50) NOT NULL,
  `cto_email` varchar(50) NOT NULL,
  `cto_password` varchar(50) NOT NULL,
  `cto_status` int(10) NOT NULL,
  `cto_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cto`
--

INSERT INTO `cto` (`cto_id`, `cto_fname`, `cto_email`, `cto_password`, `cto_status`, `cto_image`) VALUES
(1, 'Sanjay', 'sanjay@gmail.com', '123', 1, '../images/Profile_Images/download.png');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(10) NOT NULL,
  `department_title` varchar(50) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `department_details` varchar(50) NOT NULL,
  `dead_line` datetime NOT NULL,
  `department_receiver` int(10) NOT NULL,
  `department_sender` int(10) NOT NULL,
  `department_sender_name` varchar(50) NOT NULL,
  `department_sender_image` text NOT NULL,
  `department_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_title`, `department_name`, `department_details`, `dead_line`, `department_receiver`, `department_sender`, `department_sender_name`, `department_sender_image`, `department_status`) VALUES
(1, '', 'front end', '', '0000-00-00 00:00:00', 0, 0, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(10) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_description` text NOT NULL,
  `project_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_description`, `project_status`) VALUES
(1, 'front end', '<p>front end for resturant</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(10) NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `task_issuedate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `dead_line` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `task_details` text NOT NULL,
  `task_project` int(10) NOT NULL,
  `task_receiver` int(10) NOT NULL,
  `task_sender` int(10) NOT NULL,
  `task_sender_name` varchar(50) NOT NULL,
  `task_sender_image` text NOT NULL,
  `task_display` int(10) NOT NULL DEFAULT '1',
  `task_status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_issuedate`, `dead_line`, `task_details`, `task_project`, `task_receiver`, `task_sender`, `task_sender_name`, `task_sender_image`, `task_display`, `task_status`) VALUES
(1, 'front end project ', '2020-06-01 09:09:49', '2020-06-13 20:44:00', '<p>project sholud be complate within 2 weeks</p>', 1, 3, 1, 'govind', '../images/Profile_Images/download.png', 1, 'pending'),
(2, 'front end for resturant', '2020-06-01 09:10:04', '2020-06-02 20:59:00', '<p>project should be complate for index page&nbsp;</p>', 1, 2, 3, 'Ram', '../images/Profile_Images/download.png', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `salary` int(10) NOT NULL,
  `user_status` int(10) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`, `salary`, `user_status`, `user_gender`, `user_image`) VALUES
(1, 'Anas', 'Khan               ', 'anas@gmail.com', '123', 500000, 1, 'male', '../images/Profile_Images/download.png'),
(2, 'Shubham   ', 'Jha   ', 'shubham@gmail.com', '1234', 400000, 1, 'male', '../images/Profile_Images/download.png'),
(3, 'Ram', 'Verma', 'ram@gmail.com', '123', 450000, 1, 'male', '../images/Profile_Images/download.png'),
(5, 'Riya', 'Wadhwa', 'riya@gmail.com', '123', 500000, 1, 'female', '../images/Profile_Images/download.png'),
(10, 'Pooja  ', 'Laddha  ', 'pooja@gmail.com', 'pooja123', 420000, 1, 'female', '../images/Profile_Images/download.png'),
(11, 'Priyanka', 'Sharma', 'priyanka@gmail.com', '123', 440000, 1, 'female', '../images/Profile_Images/download.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `cto`
--
ALTER TABLE `cto`
  ADD PRIMARY KEY (`cto_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cto`
--
ALTER TABLE `cto`
  MODIFY `cto_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
