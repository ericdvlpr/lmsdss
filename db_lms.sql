-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2018 at 08:22 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `author_id` varchar(250) NOT NULL,
  `author_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `author_id`, `author_name`) VALUES
(1, 'I7518PND1511637420  ', 'Robin Kerrod'),
(2, 'E1035ZUW1511637420  ', 'Grolier'),
(3, 'J1834SYX1511637420  ', 'Carolyn Bradshaw'),
(4, 'J0938VTF1511637420  ', 'Michael Seals'),
(5, 'L4951QPV1511637420', 'Makarov'),
(6, 'E2170ZPL1511637420  ', 'Brian Knapp'),
(7, 'C1425UDE1511637420  ', 'Greg Glowka'),
(8, 'Q7385PCW1511637420  ', 'Lexicon'),
(9, 'U1782CXE1511637420', 'Clarke Donald'),
(10, 'E2837KPF1511637420  ', 'Dartford Mark'),
(11, 'S3752BWR1511637420  ', 'Merde C. Tan'),
(12, 'E9416QWG1511637420', 'Glencoe McGraw Hill'),
(13, 'Z2479RSY1511637420', 'Lorenza P. Avera'),
(14, 'S4768OAY1511637420', 'Virginia Bermudez Ed. O. et al'),
(15, 'F8903KRT1511637420', 'Ricardo T. Jose Ph . D.'),
(16, 'W4623YMN1511637420', 'Glencoe McGraw Hill'),
(17, 'Y7109IQG1511637420', 'Toni Morrison'),
(18, 'O2861UTL1511637420', 'Judy Brim'),
(19, 'R1049ZAF1511637420', 'Douglas K. Ramsey'),
(20, 'E1957IDN1511637420', 'Cristine Redoblo');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_no` varchar(250) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `category_id` int(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `book_copies` int(11) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `location` longtext,
  `department` varchar(50) DEFAULT NULL,
  `copyright_year` int(11) NOT NULL,
  `date_receive` date NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_no`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `isbn`, `location`, `department`, `copyright_year`, `date_receive`, `date_added`, `status`) VALUES
(2, 'Q3265TAO20171111', 'test', 2, '1', 6, '2', 'sdgsdfsdf13', '	Fil. 657 V173p 2010', 'College', 2017, '2017-11-12', '2017-11-12 11:16:02', '1'),
(3, 'N8752TZY20171111', 'Sample1', 1, '2', 5, '2', '1241515-12131-515', NULL, NULL, 2017, '0000-00-00', '2017-11-12 11:17:40', '2'),
(4, 'B9720JGO20171111', 'Try', 3, '3', 2, '5', '2312312323-34534534-55675', NULL, NULL, 2017, '2017-11-12', '2017-11-12 11:20:10', '3'),
(5, 'Y5219ZPQ20171111', 'Try', 7, '3', 2, '4', 'sdgsdfsdf13', NULL, NULL, 2017, '2017-11-04', '2017-11-12 11:23:21', '5'),
(6, 'R4592NYT20171111', 'trial', 1, '1', 2, '1', 'wqrthjd1313', NULL, NULL, 2018, '2017-11-25', '2017-11-25 11:06:03', '2'),
(7, 'A3859BDX20171111', 'Tested', 2, '6', 4, '1', 'Asdasd-12313', NULL, NULL, 2017, '2017-11-25', '2017-11-25 11:53:52', '1'),
(10, 'A3694YFD20171111', 'Try', 1, '3', 3, '14', '123135678', NULL, NULL, 2018, '2017-12-01', '2017-12-01 14:19:28', '1');

-- --------------------------------------------------------

--
-- Table structure for table `booknumber`
--

CREATE TABLE `booknumber` (
  `id` int(11) NOT NULL,
  `bookNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booknumber`
--

INSERT INTO `booknumber` (`id`, `bookNum`) VALUES
(1, 20171111);

-- --------------------------------------------------------

--
-- Table structure for table `book_request`
--

CREATE TABLE `book_request` (
  `request_id` int(11) NOT NULL,
  `request_no` int(11) NOT NULL,
  `book_title` text NOT NULL,
  `author` text NOT NULL,
  `copies` int(11) NOT NULL,
  `date_requested` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_request`
--

INSERT INTO `book_request` (`request_id`, `request_no`, `book_title`, `author`, `copies`, `date_requested`, `status`, `user_id`) VALUES
(1, 10682734, 'test', 'test', 3, '2017-12-09', 'pending', 6),
(2, 90813276, 'try', 'tested', 1, '2017-12-09', 'pending', 6);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL,
  `member_id` bigint(50) DEFAULT NULL,
  `book_no` varchar(50) DEFAULT NULL,
  `on_date` varchar(100) DEFAULT NULL,
  `due_date` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `member_id`, `book_no`, `on_date`, `due_date`, `status`) VALUES
(484, 55312412, 'Q3265TAO20171111', '2014-03-20 23:50:27', '21/03/2014', 'pending'),
(483, 55, NULL, '2014-03-20 23:49:34', '21/03/2014', 'pending'),
(482, 12342324, 'Q3265TAO20171111', '2014-03-20 23:38:22', '03/01/2014', 'borrow'),
(487, 190377, 'Q3265TAO20171111', '2017-12-15', '2017-12-18', 'reserve'),
(488, 3523526, 'N8752TZY20171111', '2017-12-27', '2017-12-30', 'reserve'),
(489, 3523526, 'R4592NYT20171111', '2017-12-27', '2017-12-30', 'reserve'),
(490, 3523526, 'N8752TZY20171111', '2018-01-01', '2018-01-04', 'reserve'),
(491, 3523526, 'B9720JGO20171111', '2018-01-01', '2018-01-04', 'reserve');

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `catalogue_id` int(11) NOT NULL,
  `catalogue_no` varchar(250) NOT NULL,
  `cataloguename` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`catalogue_id`, `catalogue_no`, `cataloguename`) VALUES
(1, '', 'Periodical'),
(2, '', 'English'),
(3, '', 'Math'),
(4, '', 'Science'),
(5, '', 'Encyclopedia'),
(6, '', 'Filipiniana'),
(7, '', 'Newspaper'),
(8, '', 'General'),
(9, '', 'References'),
(801, '  L8347DLF1511723820  ', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(250) NOT NULL,
  `department_code` int(11) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `numYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `department_code`, `course_name`, `numYear`) VALUES
(1, 'BSA', 1, 'Bachelor of Science in Accountancy', 5),
(2, 'BSMA', 1, 'Bachelor of Science in Management & Accountancy', 4),
(3, 'BSEntrep', 1, 'Bachelor of Science in Entrepreneurship', 4),
(4, 'BSBAMM', 1, 'Bachelor of Science in Business Administration Marketing Management', 4),
(5, 'BSBAOM', 1, 'Bachelor of Science in Business Administration Operations Management', 4),
(6, 'BSBAHRM', 1, 'Bachelor of Science in Business Administration Human Resource Management', 4),
(7, 'BSBAFM', 1, 'Bachelor of Science in Business Administration Financial Management', 4),
(8, 'BSOA', 1, 'Bachelor of Science in Office Administration', 4),
(9, 'BSCE', 2, 'Bachelor of Science in Civil Engineering', 5),
(10, 'BSEE', 2, 'Bachelor of Science in Electrical Engineering', 5),
(11, 'BSIT', 2, 'Bachelor of Science in Information Technology', 4),
(12, 'BSCS', 2, 'Bachelor of Science in Computer Science', 4),
(13, 'ACT', 2, 'Associate in Computer Technology', 2),
(14, 'ABEcon', 3, 'Bachelor of Arts in Economics', 4),
(15, 'ABEnglang', 3, 'Bachelor of Arts in English Language', 4),
(16, 'ABPolSci', 3, 'Bachelor of Arts in Political Science', 4),
(17, 'BSLIS', 3, 'Bachelor of Library & Information Science', 4),
(18, 'BSBio', 3, 'Bachelor of Science in Biology', 4),
(19, 'BSMath', 3, 'Bachelor of Science in Mathematics', 4),
(20, 'BSPsych', 3, 'Bachelor of Science in Psychology', 4),
(21, 'BSEEng', 4, 'Bachelor of Science in Education ENGLISH', 4),
(22, 'BSEFil', 4, 'Bachelor of Science in Education FILIPINO', 4),
(23, 'BSEMAPEH', 4, 'Bachelor of Science in Education MAPEH', 4),
(24, 'BSEMATH', 4, 'Bachelor of Science in Education MATHEMATICS', 4),
(25, 'BSESocStud', 4, 'Bachelor of Science in Education SOCIAL STUDIES', 4),
(26, 'BSEBIO', 4, 'Bachelor of Science in Education BIOLOGY', 4),
(27, 'BSEGen', 4, 'Bachelor of Science in Elementary Education GENERALIST', 4),
(28, 'BSESpe', 4, 'Bachelor of Science in Elementary Education SPECIAL', 4),
(29, 'BSEPreSch', 4, 'Bachelor of Science in Elementary Education PRE-SCHOOL', 4),
(30, 'BSN', 5, 'Bachelor of Science in Nursing', 4),
(31, 'Midwifey', 5, 'Midwifery Course', 2),
(32, 'BSHM', 6, 'Bachelor of Science in Hospitality Management', 4),
(33, 'SHSABM', 7, 'Academic Business & Management', 0),
(34, 'SHSSTEM', 7, 'Science Technology Engineering & Mathematics', 0),
(35, 'SHSGAS', 7, ' General Academic Strand', 0),
(36, 'SHTechVocHeBPP', 8, 'Home Economics Bread & Pastry Production', 0),
(37, 'SHTechVocHeCk', 8, 'Home Economics Cookery', 0),
(38, 'SHTechVocHeHK', 8, 'Home Economics Housekeeping', 0),
(39, 'SHTechVocHeFB', 8, 'Home Economics Food and Beverages', 0),
(40, 'JHS', 9, 'Junior High School', 0),
(41, 'GS', 10, 'Grade School', 0),
(42, 'NonDegTeach', 11, 'CERT. IN TEACHING', 0),
(43, 'NonDegSPED', 11, 'CERT. IN SPED', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `department_code` varchar(250) NOT NULL,
  `department_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `department_code`, `department_name`) VALUES
(1, 'SBMA', 'School of Business Education'),
(2, 'SOECS', 'School of Engineering and Computer Studies'),
(3, 'SAS', 'School of Arts and Sciences '),
(4, 'SOED', ' School of Education'),
(5, 'SON', ' School of Nursing'),
(6, 'SOHM', ' School of Hospitality Management'),
(7, 'SHSAcad', 'Senior High School Academic Track'),
(8, 'SHSTechVoc', 'Senior High School Technical Vocational Track'),
(9, 'JHS', ' Junior High School'),
(10, 'GS', ' Grade School'),
(11, 'NonDeg', 'Non Degree Courses');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `faculty_no` varchar(250) NOT NULL,
  `faculty_name` varchar(250) NOT NULL,
  `dept` int(11) NOT NULL,
  `passcode` int(20) NOT NULL DEFAULT '0',
  `active` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_no`, `faculty_name`, `dept`, `passcode`, `active`) VALUES
(1, '12312123', 'tere', 4, 0, 1),
(2, '312321412', 'ter', 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `issue_book_id` int(11) NOT NULL,
  `book_no` text NOT NULL,
  `book_title` text NOT NULL,
  `student_name` text NOT NULL,
  `copies` int(11) NOT NULL,
  `date_issued` date NOT NULL,
  `date_returned` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`issue_book_id`, `book_no`, `book_title`, `student_name`, `copies`, `date_issued`, `date_returned`, `status`) VALUES
(1, 'Q3265TAO20171111', 'Test', 'test', 1, '2017-12-02', '2017-12-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(50) NOT NULL,
  `student_no` int(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `Date_time` datetime(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `student_no`, `description`, `Date_time`) VALUES
(3, 43634633, 'Just Login', '2017-12-25 14:32:04.000000'),
(4, 43634633, 'Just Logout', '2017-12-25 14:53:24.000000'),
(5, 43634633, 'Just Login', '2017-12-25 14:56:36.000000'),
(6, 213423412, 'Just Login', '2017-12-25 14:57:15.000000'),
(7, 213423412, 'Just Logout', '2017-12-25 14:57:19.000000');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notif_id` int(11) NOT NULL,
  `notif_id_type` int(11) NOT NULL,
  `notif_type` varchar(250) NOT NULL,
  `notif_subject` text NOT NULL,
  `notif_text` text NOT NULL,
  `notif_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notif_id`, `notif_id_type`, `notif_type`, `notif_subject`, `notif_text`, `notif_status`, `user_id`) VALUES
(1, 1, 'request', 'Test Subject', 'Test Content', 0, 6),
(2, 1, 'request', 'Requested for Book', 'try', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `publisherNo` int(11) NOT NULL,
  `book_publisher` varchar(250) NOT NULL,
  `publisher_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `publisherNo`, `book_publisher`, `publisher_name`) VALUES
(1, 0, 'Marshall Cavendish Corporation', 'Marshall'),
(2, 0, 'Connecticut', 'Grolier Incorporation'),
(3, 0, 'Pearson Education.Inc', 'Prentice Hall New Jersey Pasay City'),
(4, 0, 'Regency Publishing Group', 'Prentice Hall.Inc'),
(5, 0, 'Regency Publishing Group', 'Prentice Hall.Inc'),
(6, 0, 'Lexicon Publication', 'Pulication IncLexicon'),
(7, 0, 'H.S. Stuttman inc. Publishing', ' Publisher Westport Connecticut'),
(8, 0, 'Vibal Publishing House Inc.', '12536. Araneta Avenue Corner Ma. Clara St. Quezon City'),
(9, 0, 'The McGrawHill Companies Inc.', 'McGrawhill'),
(10, 0, 'JGM & S Corporation', 'JGM & S Corporation'),
(11, 0, 'SD Publications Inc.', 'Gregorio Araneta Avenue. Quezon City'),
(12, 0, 'Vibal Publishing House Inc.', 'Araneta Avenue . Cor. Maria Clara St.Quezon City'),
(13, 0, '..', 'the McGrawHill Companies Inc'),
(14, 0, '..', 'Alfred A. Knoff Inc'),
(15, 0, 'Silver Burdett Company', 'Silver'),
(16, 0, 'Houghton Miffin Company', '..'),
(17, 0, 'CHMSC', 'Brian INC');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_name`) VALUES
(1, 'New'),
(2, 'Archive'),
(3, 'Damage'),
(4, 'Lost'),
(5, 'Old');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` int(250) NOT NULL,
  `student_name` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `passcode` int(250) NOT NULL DEFAULT '0',
  `dept` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `student_name`, `gender`, `address`, `contact`, `year_level`, `type`, `passcode`, `dept`, `course`, `active`) VALUES
(52, 190377, 'Mark', 'Male', 'Talisay', '212010', 'Second Year', '2', 0, 1, 3, 1),
(53, 3523526, 'April Joy', 'Female', 'E.B. Magalona', '00', 'Second Year', '0', 0, 1, 1, 1),
(54, 312412, 'Alfonso', 'Male', 'E.B. Magalona', '009', 'First Year', '0', 0, 1, 3, 1),
(55, 134412345, 'Jonathan ', 'Male', 'E.B. Magalona', '0032', 'Fourth Year', '0', 0, 3, 4, 1),
(56, 213423412, 'Renzo Bryan', 'Male', 'Silay City', '03030', 'Third Year', '0', 0, 5, 6, 1),
(57, 12342324, 'Eleazar', 'Male', 'E.B. Magalona', '90902', 'Second Year', '0', 0, 2, 6, 1),
(58, 5236574, 'Ellen Mae', 'Female', 'E.B. Magalona', '123', 'First Year', '0', 0, 5, 2, 1),
(59, 5654754, 'Ruth', 'Female', 'E.B. Magalona', '9340', 'Second Year', '0', 0, 4, 3, 1),
(60, 43634633, 'Shaina Marie', 'Female', 'Silay City', '132134', 'Second Year', '0', 0, 5, 2, 1),
(62, 4356452, 'Chairty Joy', 'Female', 'E.B. Magalona', '12423', 'Second Year', '0', 0, 1, 5, 1),
(63, 24564434, 'Kristine May', 'Female', 'Silay City', '1321', 'Second Year', '0', 0, 3, 4, 1),
(64, 2124134, 'Chinie marie', 'Female', 'E.B. Magalona', '902101', 'Second Year', '0', 0, 4, 1, 1),
(65, 1234645, 'Ruby', 'Female', 'E.B. Magalona', '', 'Second Year', '0', 0, 1, 1, 1),
(66, 123124, 'test', 'Male', '', '1235345', '', 'regStud', 0, 2, 11, 1),
(67, 0, '1231', 'Male', '', '1231', '', 'visDis', 0, 2, 11, 1),
(68, 1241526, 'Joel', 'Male', '', '134124534', '', 'visDis', 0, 2, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `borrowertype` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `borrowertype`) VALUES
(2, 'Teacher'),
(20, 'Employee'),
(21, 'Non-Teaching'),
(22, 'Student'),
(32, 'Contruction');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `image`, `access`) VALUES
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'john', 'smith', '', 0),
(3, 'ChfLib', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', 1),
(4, '123124', '', '', '', '', 5),
(5, 'try', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '', '', 5),
(6, '1241526', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', 4),
(7, '312321412', 'f0befe55f7e2730fc9f2a6dc1c2db903', '', '', '', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `booknumber`
--
ALTER TABLE `booknumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_request`
--
ALTER TABLE `book_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `borrowerid` (`member_id`),
  ADD KEY `borrowid` (`borrow_id`);

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`catalogue_id`),
  ADD UNIQUE KEY `category_id` (`catalogue_id`),
  ADD KEY `classid` (`catalogue_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`issue_book_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowertype` (`borrowertype`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `booknumber`
--
ALTER TABLE `booknumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book_request`
--
ALTER TABLE `book_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;
--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `catalogue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=802;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `issue_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
