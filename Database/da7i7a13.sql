-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2017 at 04:04 AM
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
-- Table structure for table `active_users`
--

CREATE TABLE `active_users` (
  `t_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `active_users`
--

INSERT INTO `active_users` (`t_id`, `user_id`) VALUES
(3, 2);

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
(4, 'PL3'),
(5, 'MIS'),
(6, 'kkkk'),
(7, 'network'),
(9, 'pl3'),
(10, 'mis');

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
(16, 'Mechanical and Electrical Engineering');

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

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `reply`, `deascribtion`, `feed_name`, `date`, `std_id`) VALUES
(1, 'Ok We will Correct It , Thanks ', 'There Are One Question Wrong', 'Wrong Competetion Question', '2017-04-25', 1);

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
(1, 'AdminPannel', 'http://localhost/Backup8/SW1Project/Design/html/Admin/AdminPannel.php'),
(2, 'Email_Config', 'http://localhost/Backup15/SW1Project/Design/html/Student/WinnerPics.php'),
(3, 'SendMail', 'http://localhost/Backup8/SW1Project/Design/html/Admin/AdminPannel.php?Option=2'),
(4, 'Delete', 'http://localhost/Backup8/SW1Project/Design/html/Admin/AdminPannel.php?Option=5'),
(7, 'Listdbtable', 'http://localhost/Backup8/SW1Project/Design/html/Admin/Listdbtable.php'),
(8, 'AddCompetetionQuestion', 'http://localhost/Backup8/SW1Project/Design/html/Admin/AddCompetetionQuestion.php'),
(9, 'EditeCompQuestion', 'http://localhost/Backup8/SW1Project/Design/html/Admin/EditeCompQuestion.php'),
(10, 'ProfessorRequest', 'http://localhost/Backup8/SW1Project/Design/html/Admin/ProfessorRequest.php'),
(11, 'addQuestion', 'http://localhost/Backup8/SW1Project/Design/html/Professor/addQuestion.php'),
(12, 'ask_reply', 'http://localhost/Backup8/SW1Project/Design/html/Professor/ask_reply.php'),
(13, 'editQuestion', 'http://localhost/Backup8/SW1Project/Design/html/Professor/editQuestion.php'),
(14, 'deleteQuestion', 'http://localhost/Backup8/SW1Project/Design/html/Professor/deleteQuestion.php'),
(15, 'proPage', 'http://localhost/Backup8/SW1Project/Design/html/Professor/proPage.php'),
(16, 'uploadMaterial_professor', 'http://localhost/Backup8/SW1Project/Design/html/Professor/uploadMaterial_professor.php'),
(17, 'askquestion', 'http://localhost/Backup8/SW1Project/Design/html/Student/askquestion.php'),
(18, 'competS', 'http://localhost/Backup8/SW1Project/Design/html/Student/competS.php'),
(19, 'createteam', 'http://localhost/Backup8/SW1Project/Design/html/Student/createteam.php'),
(20, 'question', 'http://localhost/Backup8/SW1Project/Design/html/Student/question.php'),
(21, 'student_profile', 'http://localhost/Backup8/SW1Project/Design/html/Student/student_profile.php'),
(22, 'team_1', 'http://localhost/Backup8/SW1Project/Design/html/Student/team_1.php'),
(25, 'yourInfo', 'http://localhost/Backup8/SW1Project/Design/html/Student/yourInfo.php'),
(26, 'yourteams', 'http://localhost/Backup8/SW1Project/Design/html/Student/yourteams.php'),
(27, 'login', 'http://localhost/Backup8/SW1Project/Design/html/Start/login.php'),
(28, 'profile', 'http://localhost/Backup8/SW1Project/Design/html/Start/profile.php'),
(29, 'profile_admin', 'http://localhost/Backup8/SW1Project/Design/html/Start/profile_admin.php'),
(30, 'register', 'http://localhost/Backup8/SW1Project/Design/html/Start/register.php'),
(32, 'waiting', 'http://localhost/Backup8/SW1Project/Design/html/Start/register.php'),
(33, 'ADD', 'http://localhost/Backup9/SW1Project/Design/html/Admin/AdminPannel.php?Option=6'),
(34, 'ADDCourse', 'http://localhost/Backup9/SW1Project/Design/html/Admin/ADDCourse.php'),
(35, 'addAdmin', 'http://localhost/Backup9/SW1Project/Design/html/Admin/addAdmin.php'),
(36, 'DeleteHome', 'http://localhost/Backup9/SW1Project/Design/html/Admin/DeleteHome.php'),
(37, 'competition', 'http://localhost/Backup9/SW1Project/Design/html/Professor/competition.php'),
(38, 'WinnerPics', 'http://localhost/SW1Project/Design/html/Student/WinnerPics.php'),
(39, 'new_password', 'http://localhost/Backup15/SW1Project/Design/html/Start/new_password.php'),
(40, 'active_users', 'http://localhost/Backup15/SW1Project/Design/html/Admin/active_users.php'),
(41, 'UserTable', 'http://localhost/Backup15/SW1Project/Design/html/Admin/UserTable.php'),
(42, 'WinnerPics', 'http://localhost/Backup15/SW1Project/Design/html/Student/WinnerPics.php'),
(43, 'material', 'http://localhost/Backup15/SW1Project/Design/html/Student/material.php'),
(44, 'registercourses', 'http://localhost/Backup15/SW1Project/Design/html/Student/registercourses.php'),
(45, 'updateregisteredcourses', 'http://localhost/Backup15/SW1Project/Design/html/Student/updateregisteredcourses.php'),
(46, 'uploadmaterial_student', 'http://localhost/Backup15/SW1Project/Design/html/Student/uploadmaterial_student.php');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `question_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `question`, `user_id`, `course_id`, `question_type`) VALUES
(2, 'What Is Mechanisim Of Queue ?', 2, 1, 2),
(3, 'What Is Inheritance in OOP ?', 3, 1, 1),
(4, 'Are you fine ?', 1, 1, 2),
(5, ' What is the default value of long variable in java?', 1, 2, 2),
(6, 'which operator is considered to be with highest precedence?', 1, 3, 2),
(7, 'what is samir first name ?', 2, 1, 2),
(9, 'what is hala last name ?', 2, 1, 2),
(10, 'how many consructors can defined in java ?', 2, 1, 1),
(11, 'How Many Actors In Our System ?', 2, 1, 2),
(13, 'Can I Make Multible Inheritance In C++?', 1, 1, 1),
(14, 'How Can I Print Statement In php ?', 1, 2, 1),
(15, 'Can I Use html tag In Php ?', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `qt_id` int(11) NOT NULL,
  `qt_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`qt_id`, `qt_name`) VALUES
(1, 'question_have_reply'),
(2, 'question_have_choice');

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
  `q_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `q_choices`
--

INSERT INTO `q_choices` (`t_id`, `ch1`, `ch2`, `ch3`, `ch4`, `answer`, `q_id`) VALUES
(2, 'FIFO', 'LIFO', 'FLFL', 'LFLF', 'FIFO', 2),
(3, '0', '0.0', 'null', 'none of above ', '0.0', 5),
(4, 'yes', 'no', 'may be', 'none of above', 'yes', 4),
(5, '()', '[]', '*', '+', '()', 6),
(6, 'Ahmed', 'Ali', 'Mohsen', 'Wael', 'Ahmed', 7),
(7, 'Masoud', 'Hosney', 'Boraay', 'Fathy', 'Masoud', 9),
(8, '1', '2', '3', '4', '3', 11);

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

--
-- Dumping data for table `q_reply`
--

INSERT INTO `q_reply` (`t_id`, `reply`, `q_id`, `user_id`) VALUES
(1, 'Childeren Classes Have All Attribuites And Actions That Parent Has', 3, 1),
(2, 'Many Constructors ', 10, 1),
(3, 'Yes You Can But You Can''t Do This In Java ', 13, 1),
(4, 'Just Use "echo " Function As Example \r\necho "Hello World ";', 14, 1),
(5, 'Yes You Can Use As ex \r\necho "<h1>Hello World </h1>";', 15, 1);

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
(9, 'Students Number', '2017-04-25', 'Number is: 6 ');

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
  `point` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `point`, `user_id`, `level`) VALUES
(1, 20, 1, 2),
(3, 10, 3, 2),
(4, 15, 21, 2),
(5, 14, 27, 1),
(6, 19, 25, 4);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `t_details` text NOT NULL,
  `leader_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `max_num` int(11) NOT NULL,
  `actual_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `t_details`, `leader_id`, `course_id`, `max_num`, `actual_num`) VALUES
(1, 'sw1 team', 3, 3, 5, 4),
(5, 'ds teaam', 2, 1, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `t_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`t_id`, `team_id`, `std_id`) VALUES
(1, 1, 1),
(3, 1, 3);

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
  `f_name` varchar(150) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`f_id`, `f_name`, `course_id`, `user_id`, `upload_date`) VALUES
(1, 'Stack.h', 1, 1, '2017-04-24 20:00:00'),
(2, '22665_edited_1461575254169.jpg', 1, 1, '2017-05-07 17:58:46'),
(3, '22958_edited_received_1010900422328278.jpg', 1, 3, '2017-05-07 18:02:18'),
(4, '62283_edited_received_1010900422328278.jpg', 1, 3, '2017-05-07 18:15:39'),
(5, '26166_FB_IMG_1454019788230.jpg', 1, 1, '2017-05-07 18:31:23'),
(6, '67868_FB_IMG_1457383556771.jpg', 1, 1, '2017-05-07 18:32:04'),
(7, '24353_edited_received_1010900425661611.jpg', 1, 1, '2017-05-07 18:34:19'),
(8, '73404_edited_received_1010900422328278.jpg', 2, 1, '2017-05-07 18:36:12');

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
  `profile_picture` varchar(200) NOT NULL,
  `usertypeid` int(11) NOT NULL,
  `rand_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `userfname`, `userlname`, `gender_id`, `email`, `password`, `profile_picture`, `usertypeid`, `rand_pass`) VALUES
(1, 'Ahmed', 'Samir', 1, 'ahmedsamir.as848@gmail.com', '123456', 'IMG_20160110_232212.jpg', 2, 2795),
(2, 'hessin', 'ali', 1, '1@gmail.com', '1', 'IMG_20160110_232212.jpg', 1, 0),
(3, 'ahmed', 'khaled', 1, 'ahmedkhaledabdalla97@gmail.com', '123456', 'IMG_20160110_232212.jpg', 2, 0),
(5, 'Samir', 'Mohamed', 1, 'ahmedsamir.as848@outlook.com', '01112918965', 'IMG_20160110_232212.jpg', 1, 0),
(6, 'Ghada', 'khoriba', 2, 'ghada.khoriba@gmail.com', '55555', 'IMG_20160110_232212.jpg', 3, 0),
(20, 'Khaled', 'abo', 1, 'asmy@yahoo.com', '45', 'IMG_20160110_232212.jpg', 3, 0),
(21, 'asd', 'zxc', 1, 'asd@yahoo', '1', 'IMG_20160110_232212.jpg', 2, 0),
(22, 'as', 'acv', 0, 'asd@yahoo.com', 'asd', 'IMG_20160110_232212.jpg', 2, 0),
(23, 'Ahmed', 'midoooooooo', 0, 'mido@gmail.com', '123456', 'xiOrl0r.jpg', 2, 0),
(24, 'qw', 'wq', 0, 'qw@t', '1', '0xiOrl0r.jpg', 2, 0),
(25, 'sh3bola', 'sh3sh3', 0, '43bolty@yahoo.com', '4343', 'IMG_20160110_232212.jpg', 3, 0),
(26, 'sh3bolaStudent', 'sh3sh3', 0, '43bolty52@yahoo.com', '12', 'FB_IMG_1469033803867.jpg', 1, 0),
(27, 'Hala', 'lola', 0, 'lola@yahoo.com', 'lola', '0FB_IMG_1458950955374.jpg', 2, 0),
(29, 'sherif', 'abdalalah', 0, 'sari3@gmail.com', '6554545', '2FB_IMG_1449093398632.jpg', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

CREATE TABLE `user_course` (
  `t_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_course`
--

INSERT INTO `user_course` (`t_id`, `course_id`, `user_id`) VALUES
(2, 1, 2),
(3, 1, 3),
(23, 1, 1),
(24, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_faculty`
--

CREATE TABLE `user_faculty` (
  `t_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_faculty`
--

INSERT INTO `user_faculty` (`t_id`, `faculty_id`, `user_id`) VALUES
(4, 1, 23),
(5, 1, 24),
(6, 2, 25),
(7, 2, 26),
(8, 6, 27),
(10, 7, 29);

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
(79, 1, 1),
(80, 2, 1),
(81, 3, 1),
(82, 4, 1),
(83, 7, 1),
(84, 7, 3),
(85, 8, 1),
(86, 8, 3),
(87, 9, 1),
(88, 9, 3),
(89, 10, 1),
(90, 11, 1),
(91, 11, 1),
(92, 11, 2),
(93, 11, 3),
(94, 12, 1),
(95, 12, 2),
(96, 12, 3),
(97, 13, 1),
(98, 13, 2),
(99, 13, 3),
(100, 14, 1),
(101, 14, 2),
(102, 14, 3),
(103, 15, 3),
(104, 16, 3),
(105, 17, 1),
(106, 17, 2),
(107, 17, 3),
(108, 18, 2),
(109, 19, 2),
(110, 20, 1),
(111, 20, 2),
(112, 20, 3),
(113, 21, 2),
(114, 22, 2),
(115, 25, 2),
(116, 26, 2),
(117, 27, 1),
(118, 27, 2),
(119, 27, 3),
(120, 28, 1),
(121, 28, 2),
(122, 28, 3),
(123, 29, 1),
(127, 33, 1),
(128, 34, 1),
(129, 35, 1),
(130, 36, 1),
(131, 37, 2),
(133, 38, 1),
(134, 38, 2),
(135, 38, 3),
(136, 41, 1),
(137, 40, 1),
(138, 42, 2),
(139, 44, 2),
(140, 44, 3),
(141, 45, 2),
(142, 45, 3),
(143, 46, 2);

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
-- Dumping data for table `user_university`
--

INSERT INTO `user_university` (`t_id`, `univ_id`, `user_id`) VALUES
(4, 1, 23),
(5, 1, 24),
(6, 4, 25),
(7, 4, 26),
(8, 24, 27),
(10, 17, 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_users`
--
ALTER TABLE `active_users`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_type` (`question_type`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`qt_id`);

--
-- Indexes for table `q_choices`
--
ALTER TABLE `q_choices`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `question_id` (`q_id`);

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
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `active_users`
--
ALTER TABLE `active_users`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `competetion`
--
ALTER TABLE `competetion`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `qt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `q_choices`
--
ALTER TABLE `q_choices`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `q_reply`
--
ALTER TABLE `q_reply`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `univ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user_course`
--
ALTER TABLE `user_course`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user_faculty`
--
ALTER TABLE `user_faculty`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_pages`
--
ALTER TABLE `user_pages`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `ut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_university`
--
ALTER TABLE `user_university`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_ibfk_3` FOREIGN KEY (`question_type`) REFERENCES `question_type` (`qt_id`) ON UPDATE CASCADE;

--
-- Constraints for table `q_choices`
--
ALTER TABLE `q_choices`
  ADD CONSTRAINT `q_choices_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `question` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
