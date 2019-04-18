-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2017 at 12:36 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `da7i7a`
--

-- --------------------------------------------------------

--
-- Table structure for table `competetion`
--

CREATE TABLE `competetion` (
  `comp_id` int(11) NOT NULL,
  `std1_id` int(11) NOT NULL,
  `std2_id` int(11) NOT NULL,
  `score1` int(11) NOT NULL,
  `score2` int(11) NOT NULL,
  `winner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`) VALUES
(1, 'DS'),
(2, 'PL1'),
(3, 'PL2'),
(5, 'SE1');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fac_id` int(11) NOT NULL,
  `fac_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_id`, `fac_name`) VALUES
(1, 'FCI'),
(2, 'Enginering'),
(3, 'Science'),
(4, 'Commerce'),
(5, 'Arts'),
(6, 'Economics'),
(7, 'law'),
(8, 'Education'),
(9, 'Islamic Jurisprudence'),
(10, 'pharmacy'),
(11, 'Medicine'),
(12, 'Dentistry'),
(13, 'Fine Art'),
(14, 'Architecture'),
(15, 'Civil Engineering'),
(17, 'Political Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `deascribtion` text NOT NULL,
  `feed_name` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `std_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `g_id` int(11) NOT NULL,
  `g_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`g_id`, `g_name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`p_id`, `p_name`, `p_url`) VALUES
(1, 'Admin Pannel', 'http://localhost/Da7i7a-Project/Admin/Html/AdminPannel.php'),
(2, 'Competetion Questions', 'http://localhost/Da7i7a-Project/Admin/Html/Adminpannel.php?Option=1'),
(3, 'Send Mail', 'http://localhost/Da7i7a-Project/Admin/Html/Adminpannel.php?Option=2'),
(4, 'Delete User', 'http://localhost/Da7i7a-Project/Admin/Html/Adminpannel.php?Option=3'),
(5, 'Manage Professor Requests', 'http://localhost/Da7i7a-Project/Admin/Html/Adminpannel.php?Option=4');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `q_choices`
--

CREATE TABLE `q_choices` (
  `t_id` int(11) NOT NULL,
  `ch1` varchar(100) NOT NULL,
  `ch2` varchar(100) NOT NULL,
  `ch3` varchar(100) NOT NULL,
  `ch4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `q_reply`
--

CREATE TABLE `q_reply` (
  `t_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `q_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `rep_id` int(11) NOT NULL,
  `rep_name` varchar(50) NOT NULL,
  `rep_date` date NOT NULL,
  `describtion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`rep_id`, `rep_name`, `rep_date`, `describtion`) VALUES
(1, 'Number Of Students in System', '2017-04-25', '4'),
(2, 'Students Number', '2017-04-25', 'Number is: '),
(3, 'Students Number', '2017-04-25', 'Number is: '),
(4, 'Students Number', '2017-04-25', 'Number is: Array '),
(5, 'Students Number', '2017-04-25', 'Number is: Array '),
(6, 'Students Number', '2017-04-25', 'Number is: Array '),
(7, 'Students Number', '2017-04-25', 'Number is: 6 '),
(8, 'Students Number', '2017-04-25', ' ('' SELECT COUNT(*) FROM user '') '),
(9, 'Students Number', '2017-04-25', 'Number is: 6 '),
(10, 'Students Number', '2017-04-25', 'Number is: 6 '),
(11, 'Students Number', '2017-04-25', 'Number is: 6 '),
(12, 'Students Number', '2017-04-25', 'Number is: 6 '),
(13, 'Students Number', '2017-04-25', 'Number is: 6 ');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `r_id` int(11) NOT NULL,
  `fromuserid` int(11) NOT NULL,
  `touserid` int(11) NOT NULL,
  `r_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `request_type`
--

CREATE TABLE `request_type` (
  `rtype_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_type`
--

INSERT INTO `request_type` (`rtype_id`, `type_name`) VALUES
(1, 'competetion_request'),
(2, 'Professorjoinrequest');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(11) NOT NULL,
  `supper_score` int(11) NOT NULL DEFAULT '0',
  `sub_score` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `supper_score`, `sub_score`, `user_id`, `level`) VALUES
(1, 0, 0, 1, 2),
(2, 0, 0, 2, 2),
(3, 0, 0, 3, 2),
(4, 0, 0, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `max_num` int(11) NOT NULL,
  `actual_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `t_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `univ_id` int(11) NOT NULL,
  `univ_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`univ_id`, `univ_name`) VALUES
(1, 'Ain Shams'),
(2, 'Al-Azhar'),
(3, 'Alexandria'),
(4, 'Assiut'),
(5, 'Aswan'),
(6, 'Banha'),
(7, 'Beni-Suef'),
(8, 'Cairo'),
(9, 'Damanhour'),
(10, 'Damietta'),
(11, 'Fayoum'),
(12, 'Helwan'),
(13, 'Kafrelsheikh'),
(14, 'Mansoura'),
(15, 'Minia'),
(16, 'Minufiya'),
(17, 'Port Said'),
(18, 'Sohag'),
(19, 'Suez Canal'),
(20, 'Suez'),
(21, 'Tanta'),
(23, 'Nile'),
(24, 'October 6 '),
(25, 'Sinai'),
(26, 'Ain Shams');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `userfname` varchar(50) NOT NULL,
  `userlname` varchar(50) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `usertypeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `userfname`, `userlname`, `gender_id`, `email`, `password`, `usertypeid`) VALUES
(1, 'Ahmed', 'Samir', 1, 'ahmedsamir.as848@gmail.com', '123456', 2),
(2, 'hessin', 'ali', 1, 'ahmedkhaledaballa97@gmail.com', '6666', 2),
(3, 'ahmed', 'khaled', 1, 'ahmedkhaledabdalla97@gmail.com', '123456', 2),
(4, 'ahmed', 'sherief', 1, 'thantos555@hotmail.con\r\n', '123456789', 2),
(5, 'Samir', 'Mohamed', 1, 'ahmedsamir.as848@outlook.com', '01112918965', 1),
(6, 'Ghada', 'Ghoribba', 2, 'ghada.khoriba@gmail.com', '55555', 3),
(7, 'hossam', 'shamardan', 1, 'hossam@fcih@gmail.com', '6666', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

CREATE TABLE `user_course` (
  `t_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_faculty`
--

CREATE TABLE `user_faculty` (
  `t_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_pages`
--

CREATE TABLE `user_pages` (
  `t_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `usertype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_pages`
--

INSERT INTO `user_pages` (`t_id`, `p_id`, `usertype_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `ut_id` int(11) NOT NULL,
  `ut_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`ut_id`, `ut_name`) VALUES
(1, 'Admin'),
(2, 'student'),
(3, 'professor');

-- --------------------------------------------------------

--
-- Table structure for table `user_university`
--

CREATE TABLE `user_university` (
  `t_id` int(11) NOT NULL,
  `univ_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competetion`
--
ALTER TABLE `competetion`
  ADD PRIMARY KEY (`comp_id`),
  ADD KEY `competetion_ibfk_1` (`std1_id`),
  ADD KEY `competetion_ibfk_2` (`std2_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `question_ibfk_1` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `q_choices`
--
ALTER TABLE `q_choices`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `q_reply`
--
ALTER TABLE `q_reply`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `q_id` (`q_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`rep_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `fromuserid` (`fromuserid`),
  ADD KEY `touserid` (`touserid`),
  ADD KEY `r_type` (`r_type`);

--
-- Indexes for table `request_type`
--
ALTER TABLE `request_type`
  ADD PRIMARY KEY (`rtype_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `leader_id` (`leader_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`univ_id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `usertypeid` (`usertypeid`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `user_course`
--
ALTER TABLE `user_course`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `std_id` (`user_id`);

--
-- Indexes for table `user_faculty`
--
ALTER TABLE `user_faculty`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `user_pages`
--
ALTER TABLE `user_pages`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `user_id` (`usertype_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`ut_id`);

--
-- Indexes for table `user_university`
--
ALTER TABLE `user_university`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `univ_id` (`univ_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competetion`
--
ALTER TABLE `competetion`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `q_choices`
--
ALTER TABLE `q_choices`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `q_reply`
--
ALTER TABLE `q_reply`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request_type`
--
ALTER TABLE `request_type`
  MODIFY `rtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `univ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_course`
--
ALTER TABLE `user_course`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_faculty`
--
ALTER TABLE `user_faculty`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_pages`
--
ALTER TABLE `user_pages`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `ut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_university`
--
ALTER TABLE `user_university`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `competetion`
--
ALTER TABLE `competetion`
  ADD CONSTRAINT `competetion_ibfk_1` FOREIGN KEY (`std1_id`) REFERENCES `student` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `competetion_ibfk_2` FOREIGN KEY (`std2_id`) REFERENCES `student` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `q_choices`
--
ALTER TABLE `q_choices`
  ADD CONSTRAINT `q_choices_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `q_reply`
--
ALTER TABLE `q_reply`
  ADD CONSTRAINT `q_reply_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `question` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `q_reply_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`fromuserid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`touserid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`r_type`) REFERENCES `request_type` (`rtype_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team_member`
--
ALTER TABLE `team_member`
  ADD CONSTRAINT `team_member_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `team_member_ibfk_2` FOREIGN KEY (`std_id`) REFERENCES `student` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD CONSTRAINT `uploaded_files_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uploaded_files_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`usertypeid`) REFERENCES `user_type` (`ut_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_course`
--
ALTER TABLE `user_course`
  ADD CONSTRAINT `user_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_course_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_faculty`
--
ALTER TABLE `user_faculty`
  ADD CONSTRAINT `user_faculty_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_faculty_ibfk_3` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`fac_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_pages`
--
ALTER TABLE `user_pages`
  ADD CONSTRAINT `user_pages_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `page` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_pages_ibfk_2` FOREIGN KEY (`usertype_id`) REFERENCES `user_type` (`ut_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_university`
--
ALTER TABLE `user_university`
  ADD CONSTRAINT `user_university_ibfk_1` FOREIGN KEY (`univ_id`) REFERENCES `university` (`univ_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_university_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
