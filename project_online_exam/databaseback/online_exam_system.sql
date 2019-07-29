-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 04:59 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `aId` int(11) NOT NULL,
  `admin_privilege` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`aId`, `admin_privilege`, `email`, `password`) VALUES
(1, '', 'raju311286@gmail.com', '1234556');

-- --------------------------------------------------------

--
-- Table structure for table `course_info`
--

CREATE TABLE `course_info` (
  `id` int(10) NOT NULL,
  `cName` varchar(60) NOT NULL,
  `cDetails` varchar(300) NOT NULL,
  `cMarks` int(10) NOT NULL,
  `totalExam` int(10) NOT NULL,
  `cDuration` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_info`
--

INSERT INTO `course_info` (`id`, `cName`, `cDetails`, `cMarks`, `totalExam`, `cDuration`, `status`) VALUES
(1, 'php', 'testing course', 200, 10, 6, 1),
(2, 'java', 'testion', 100, 6, 10, 0),
(4, 'test', 't', 23, 2, 0, 0),
(5, 'asp.net', 'testing', 300, 20, 6, 0),
(8, 'javascript', 'test', 2, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `createtopic`
--

CREATE TABLE `createtopic` (
  `id` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `ctName` varchar(30) NOT NULL,
  `ctDetails` varchar(300) NOT NULL,
  `marks` int(10) NOT NULL,
  `numberQuestion` int(10) NOT NULL,
  `examDuration` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `createtopic`
--

INSERT INTO `createtopic` (`id`, `cid`, `ctName`, `ctDetails`, `marks`, `numberQuestion`, `examDuration`, `status`) VALUES
(7, 5, 'asp.net basic', 'testing', 50, 30, 60, 0),
(8, 1, 'html', 'te', 180, 20, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eamil_send_info`
--

CREATE TABLE `eamil_send_info` (
  `id` int(11) NOT NULL,
  `emailtype` int(11) NOT NULL,
  `emailId` varchar(100) NOT NULL,
  `emailpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eamil_send_info`
--

INSERT INTO `eamil_send_info` (`id`, `emailtype`, `emailId`, `emailpassword`) VALUES
(1, 1, 'raju311286@gmail.com', '1234353');

-- --------------------------------------------------------

--
-- Table structure for table `exam_infor`
--

CREATE TABLE `exam_infor` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `number_question` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `exam_code` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_infor`
--

INSERT INTO `exam_infor` (`id`, `sid`, `topic_id`, `number_question`, `duration`, `exam_code`, `status`, `date`) VALUES
(29, 23, 8, 20, 6, 'qM23tNrczW', 0, '2018-02-15'),
(31, 23, 8, 20, 6, '38sFQ0d08q', 0, '2018-02-20'),
(32, 23, 8, 20, 6, 'wVSi2R1m0W', 0, '2018-02-20'),
(33, 23, 8, 20, 6, 'IVGDEVequa', 0, '2018-02-21'),
(34, 23, 8, 20, 6, 'HJ4FwE1T68', 0, '2018-02-13'),
(35, 23, 8, 20, 6, 'lqz83HkoHp', 0, '2018-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `file_info`
--

CREATE TABLE `file_info` (
  `id` int(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `folder_name` varchar(100) NOT NULL,
  `meta_keyword` varchar(150) NOT NULL,
  `meta_description` varchar(200) NOT NULL,
  `meta_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_info`
--

INSERT INTO `file_info` (`id`, `file_name`, `folder_name`, `meta_keyword`, `meta_description`, `meta_title`) VALUES
(1, 'home', 'root', 'test', 'test', 'Demo online exam system'),
(2, 'login', 'root', 'Student login', 'Student login', 'Student login'),
(3, 'registration', 'root', 'Registration', 'Description', 'STUDENT REGISTRATION'),
(4, 'teacherLogin', 'root', '', '', 'TEACHER LOGIN'),
(5, 'teregistration', 'root', '', '', 'Teacher Regisrtation'),
(6, 'homeContent', 'admin', 'thanks', 'thanks', 'Admin panel'),
(7, 'courseRegistration', 'admin', 'course Registration', 'course Registration', 'course Registration'),
(8, 'homeTopic', 'admin', 'home Topic', 'home Topic ', 'home Topic'),
(9, 'createTopic', 'admin', 'create Topic', 'create Topic', 'create Topic'),
(10, 'check_email', 'root', 'verify Email', 'verify Email', 'verify Email'),
(11, 'addfile', 'admin', 'add file information', 'add file information', 'Add file information'),
(12, 'file_home', 'admin', 'File information ', 'File information ', 'File information '),
(13, 'upload_home', 'admin', 'Upload home', 'Upload home', 'Upload home'),
(14, 'add_upload', 'admin', 'add upload', 'add upload', 'add upload'),
(15, 'slider_details', 'admin', 'slider_details', 'slider_details', 'slider_details'),
(16, 'test', 'admin', '', '', ''),
(17, 'course_home', 'student', 'course_home', 'course_home', 'course_home'),
(18, 'couse_details', 'student', 'couse_details', 'couse_details', 'couse_details');

-- --------------------------------------------------------

--
-- Stand-in structure for view `name`
--
CREATE TABLE `name` (
`sname` varchar(35)
,`email` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `question_info`
--

CREATE TABLE `question_info` (
  `qId` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `qTypeId` int(11) NOT NULL,
  `tId` int(11) NOT NULL,
  `qChOne` varchar(100) NOT NULL,
  `qChTwo` varchar(100) NOT NULL,
  `qChThree` varchar(100) NOT NULL,
  `qChAns` varchar(100) NOT NULL,
  `qHints` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `selectcourse_infom`
--

CREATE TABLE `selectcourse_infom` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selectcourse_infom`
--

INSERT INTO `selectcourse_infom` (`id`, `sid`, `courseid`, `course_name`) VALUES
(1, 23, 1, ''),
(2, 23, 2, ''),
(4, 23, 8, ''),
(5, 23, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `slide_in`
--

CREATE TABLE `slide_in` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `slide_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide_in`
--

INSERT INTO `slide_in` (`id`, `file_id`, `slide_id`) VALUES
(1, 1, 2),
(2, 4, 2),
(3, 5, 2),
(4, 1, 5),
(5, 1, 6),
(8, 3, 7),
(9, 1, 7),
(10, 1, 9),
(11, 2, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `studentname`
--
CREATE TABLE `studentname` (
`gender` varchar(6)
,`sName` varchar(35)
);

-- --------------------------------------------------------

--
-- Table structure for table `student_backup`
--

CREATE TABLE `student_backup` (
  `sId` int(6) UNSIGNED NOT NULL,
  `sName` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `mobile` varchar(18) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `lastEdu` varchar(50) DEFAULT NULL,
  `lastEduResult` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_backup`
--

INSERT INTO `student_backup` (`sId`, `sName`, `gender`, `mobile`, `email`, `lastEdu`, `lastEduResult`) VALUES
(3, 'jasim uddin', 'Male', '01831353304', 'raju311286@gmail.com', 'B.Sc', '3.00'),
(4, 'lict3', 'Male', '01234567', 'ru@gmail.com', 'SSC', '3.00'),
(5, 'jsim', 'Male', '2332', 'er@gmail.com', 'SSC', '3.00'),
(7, 'testing', 'Male', '012345678', 'tu@gmail.com', 'SSC', '3.00'),
(9, 'jasim uddin', 'Male', '32423', 'raju311286@gmail.com ', 'SSC', '4'),
(10, 'jasim uddin', 'Male', '01831353304', 'raju311286@gmail.com', 'SSC', '3.00'),
(11, 'jasim uddin', 'Male', '01831353304', 'raju311286@gmail.com', 'SSC', '3.00'),
(12, 'jasim uddin', 'Male', '01831353304', 'raju311286@gmail.com', 'SSC', '3.00'),
(13, 'jasim uddin', 'Male', '123213', 'raju311286@gmail.com', 'SSC', '3.00'),
(14, 'jasim uddin', 'Male', '01831353304', 'raju311286@gmail.com', 'SSC', '3.00'),
(15, 'jasim uddin', 'Male', '01831353304', 'raju311286@gmail.com', 'SSC', '3.00'),
(16, 'jasim uddin', 'Male', '01831353304', 'raju311286@gmail.com', 'SSC', '3.00'),
(17, 'jasim uddin', 'Male', '01831353304', 'raju311286@gmail.com', 'SSC', '3.00'),
(18, 'jasim uddin', 'Male', '01831353304', 'raju311286@gmail.com', 'SSC', '3.00'),
(20, 'jasim uddin', 'Male', '01831353304', 'raju311286@gmail.com', 'B.Sc', '3.00'),
(22, 'jasim uddin', 'Male', '01831353304', 'raju311286@gmail.com', 'B.Sc', '2');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `sId` int(11) NOT NULL,
  `sName` varchar(35) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(18) NOT NULL,
  `lastEdu` varchar(50) NOT NULL,
  `lastEduResult` varchar(100) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `password` varchar(64) NOT NULL,
  `simage` varchar(100) NOT NULL,
  `code` varchar(6) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`sId`, `sName`, `gender`, `email`, `mobile`, `lastEdu`, `lastEduResult`, `dateOfBirth`, `password`, `simage`, `code`, `status`) VALUES
(6, 'testing', 'Female', 'ty@gmail.com', '2345677', 'SSC', '3.00', '0000-00-00', 'aecd7b14f7674d7e8741596159f6f7868bb4fada', '', '', 0),
(8, 'jasim uddin', 'Male', 'raju3112@gmail.com', '01831353304', 'SSC', 'thanks', '0000-00-00', 'aecd7b14f7674d7e8741596159f6f7868bb4fada', '', '', 0),
(19, 'kamrul Hassan', 'Male', 'kamrulhasan3174007@gmail.com', '2345678', 'B.Sc', '3.50', '0000-00-00', '10470c3b4b1fed12c3baac014be15fac67c6e815', '', '5nTNLD', 0),
(21, 'Tamanna', 'Female', 'tamannafarabi@yahoo.com', '123232434', 'B.Sc', '4', '0000-00-00', '7f06c04d59bd83605193621e8d0d693bd30cdc9e', '', 'v126CB', 0),
(23, 'jasim uddin', 'Male', 'raju311286@gmail.com', '01831353304', 'B.Sc', '3.00', '0000-00-00', 'aecd7b14f7674d7e8741596159f6f7868bb4fada', '', 'bmbv9d', 1);

--
-- Triggers `student_info`
--
DELIMITER $$
CREATE TRIGGER `student_backup` BEFORE DELETE ON `student_info` FOR EACH ROW INSERT INTO student_backup(sId,sName, gender, mobile, email, lastEdu, lastEduResult)
VALUES(OLD.sId, OLD.sName, OLD.gender, OLD.mobile, OLD.email, OLD.lastEdu, OLD.lastEduResult)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `tId` int(11) NOT NULL,
  `tName` varchar(35) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(18) DEFAULT NULL,
  `lastEdu` varchar(50) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`tId`, `tName`, `gender`, `email`, `mobile`, `lastEdu`, `experience`, `dateOfBirth`, `password`, `status`) VALUES
(1, 'jasim uddin', 'Male', 'raju311286@gmail.com', '01831353304', 'B.Sc', '4', NULL, 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uploader_info`
--

CREATE TABLE `uploader_info` (
  `id` int(11) NOT NULL,
  `Filename` varchar(200) NOT NULL,
  `companyname` varchar(50) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `filetype` varchar(4) NOT NULL,
  `paidstatus` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploader_info`
--

INSERT INTO `uploader_info` (`id`, `Filename`, `companyname`, `type`, `filetype`, `paidstatus`) VALUES
(2, 'slider-a376033f151815545556748633711105229.jpg', '', 0, 'img', 0),
(4, 'ad-99064ba6151815571176771481311066648.html', 'test', 1, 'html', 1),
(5, 'slider-60b2149f151820239726732485610452089.jpg', '', 0, 'img', 0),
(6, 'slider-852c296d151820258079537985110162440.png', '', 0, 'img', 0),
(7, 'slider-448d5eda151823438346748457110714158.jpg', '', 0, 'img', 0),
(8, 'ad-b75bd27b151823741192942238310842062.html', 'test', 1, 'html', 0),
(9, 'slider-074177d3151825413582423762110054739.jpg', '', 0, 'img', 0);

-- --------------------------------------------------------

--
-- Structure for view `name`
--
DROP TABLE IF EXISTS `name`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `name`  AS  select `student_info`.`sName` AS `sname`,`student_info`.`email` AS `email` from `student_info` ;

-- --------------------------------------------------------

--
-- Structure for view `studentname`
--
DROP TABLE IF EXISTS `studentname`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `studentname`  AS  select `student_info`.`gender` AS `gender`,`student_info`.`sName` AS `sName` from `student_info` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`aId`);

--
-- Indexes for table `course_info`
--
ALTER TABLE `course_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `createtopic`
--
ALTER TABLE `createtopic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `eamil_send_info`
--
ALTER TABLE `eamil_send_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_infor`
--
ALTER TABLE `exam_infor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_info`
--
ALTER TABLE `file_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_info`
--
ALTER TABLE `question_info`
  ADD PRIMARY KEY (`qId`);

--
-- Indexes for table `selectcourse_infom`
--
ALTER TABLE `selectcourse_infom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide_in`
--
ALTER TABLE `slide_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_backup`
--
ALTER TABLE `student_backup`
  ADD PRIMARY KEY (`sId`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`sId`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`tId`);

--
-- Indexes for table `uploader_info`
--
ALTER TABLE `uploader_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `aId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course_info`
--
ALTER TABLE `course_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `createtopic`
--
ALTER TABLE `createtopic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `eamil_send_info`
--
ALTER TABLE `eamil_send_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `exam_infor`
--
ALTER TABLE `exam_infor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `file_info`
--
ALTER TABLE `file_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `question_info`
--
ALTER TABLE `question_info`
  MODIFY `qId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `selectcourse_infom`
--
ALTER TABLE `selectcourse_infom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `slide_in`
--
ALTER TABLE `slide_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `student_backup`
--
ALTER TABLE `student_backup`
  MODIFY `sId` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `sId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `teacher_info`
--
ALTER TABLE `teacher_info`
  MODIFY `tId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `uploader_info`
--
ALTER TABLE `uploader_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `createtopic`
--
ALTER TABLE `createtopic`
  ADD CONSTRAINT `createtopic_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course_info` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
