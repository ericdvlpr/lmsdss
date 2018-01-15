-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2018 at 01:55 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `author` varchar(250) NOT NULL,
  `book_copies` int(11) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `copyright_year` int(11) NOT NULL,
  `date_receive` date NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` text NOT NULL,
  `location` longtext NOT NULL,
  `department` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_no`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `isbn`, `copyright_year`, `date_receive`, `date_added`, `img`, `location`, `department`, `status`) VALUES
(1, '9789719331704', 'Master English Grammar in 28 Days', 3, 'Romeo Flauta', 1, 'Priority Book ', '971-93317-04', 2011, '2018-01-07', '2018-01-07 15:27:14', 'img/books/93870524.jpg', 'Fil. 657 V173p 2010', '1', '1'),
(2, '4549660094272', 'Movie Making', 801, 'Naomi De Jesus', 1, 'Ibook', '978-971-0054-12-6', 2011, '2018-01-07', '2018-01-07 20:49:07', 'img/books/1321397098.jpg', 'Fil. 220 G646 1992', '1', '3');

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
  `user_id` int(11) NOT NULL,
  `seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_request`
--

INSERT INTO `book_request` (`request_id`, `request_no`, `book_title`, `author`, `copies`, `date_requested`, `status`, `user_id`, `seen`) VALUES
(1, 10682734, 'test', 'test', 3, '2017-12-09', '0', 6, 0),
(2, 90813276, 'try', 'tested', 1, '2017-12-09', '0', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_book`
--

CREATE TABLE `borrow_book` (
  `id` int(11) NOT NULL,
  `borrow_no` varchar(50) NOT NULL,
  `book_no` varchar(150) NOT NULL,
  `book_title` text NOT NULL,
  `copies` int(11) NOT NULL,
  `on_date` date DEFAULT NULL,
  `due_date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow_book`
--

INSERT INTO `borrow_book` (`id`, `borrow_no`, `book_no`, `book_title`, `copies`, `on_date`, `due_date`) VALUES
(1, '30924685', 'eqweqe', 'weq', 2, '2017-12-31', '2018-12-06'),
(2, '06423157', 'Q3265TAO20171111', 'test', 2, '2017-12-31', '2018-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_detail`
--

CREATE TABLE `borrow_detail` (
  `id` int(11) NOT NULL,
  `borrow_no` varchar(50) NOT NULL,
  `student_id` int(50) DEFAULT NULL,
  `contact_number` varchar(11) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow_detail`
--

INSERT INTO `borrow_detail` (`id`, `borrow_no`, `student_id`, `contact_number`, `status`) VALUES
(1, '30924685', 213423412, '03030', 0),
(2, '06423157', 213423412, '03030', 0);

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
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_no`, `faculty_name`, `dept`, `active`) VALUES
(1, '12312123', 'tere', 4, 0),
(2, '1241526', 'ter', 2, 0),
(3, '123456', 'Theresa', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `body` text NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `subject`, `body`, `student_id`, `date_posted`) VALUES
(1, 'Test', 'test', 7392, '2018-01-08 22:17:58'),
(2, 'Try', 'try', 7392, '2018-01-08 22:18:42'),
(3, 'Testing', 'Testing', 7392, '2018-01-08 22:19:39'),
(4, 'Testing', 'Testing', 7392, '2018-01-08 22:22:27');

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
(2, 1, 'request', 'Requested for Book', 'try', 0, 6),
(3, 2, 'feedback', 'Feedback from Student', '', 0, 7392),
(4, 2, 'feedback', 'Feedback from Student', 'Test', 0, 7392),
(5, 2, 'feedback', 'Feedback from Student', 'Test', 0, 7392),
(6, 2, 'feedback', 'Feedback from Student', 'Try', 0, 7392),
(7, 2, 'feedback', 'Feedback from Student', 'Testing', 0, 7392),
(8, 2, 'feedback', 'Feedback from Student', 'Testing', 0, 7392);

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
  `active` int(11) NOT NULL DEFAULT '1',
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `student_name`, `gender`, `address`, `contact`, `year_level`, `type`, `passcode`, `dept`, `course`, `active`, `image`) VALUES
(1, 7392, 'Mark Cruz', 'Male', '', '09156112', '', '1', 7392, 1, 1, 1, 'img/student_images/1021942190.jpg'),
(2, 73923, 'Joseph Dela Cruz', 'Male', '', '0917246756', '', '0', 75, 4, 23, 1, 'img/student_images/1431045741.jpg'),
(3, 739212, 'Dianna Lopez', 'Female', '', '0915612135', '', '1', 0, 1, 1, 1, 'img/student_images/1539155088.jpg');

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
  `image` varchar(250) NOT NULL,
  `access` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `department` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `image`, `access`, `active`, `department`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 0, 1, 'admin'),
(2, 'Librarian', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1, '1'),
(3, '7392', '7a1d9028a78f418cb8f01909a348d9b2', '', 5, 1, '');

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
-- Indexes for table `borrow_book`
--
ALTER TABLE `borrow_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowid` (`id`);

--
-- Indexes for table `borrow_detail`
--
ALTER TABLE `borrow_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowerid` (`student_id`),
  ADD KEY `borrowid` (`id`);

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`issue_book_id`);

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `borrow_book`
--
ALTER TABLE `borrow_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `borrow_detail`
--
ALTER TABLE `borrow_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `issue_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
