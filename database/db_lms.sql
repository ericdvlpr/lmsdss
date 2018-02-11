-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 01:01 PM
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
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `posted_by` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `date`, `posted_by`, `status`) VALUES
(1, 'First Annoucement', 'This is a a Announcements', '2018-01-14 09:34:31', '1', 1);

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
(7, 'C1425UDE1511637420  ', 'Greg Glowkaa'),
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
(1, '9789719331704', 'Master English Grammar in 28 Days', 3, 'Romeo Flauta', 0, 'Priority Book ', '971-93317-04', 2011, '2018-01-07', '2018-01-07 15:27:14', 'img/books/93870524.jpg', 'Fil. 657 V173p 2010', '1', '1'),
(2, '4549660094272', 'Movie Making', 801, 'Naomi De Jesus', 8, 'Ibook', '978-971-0054-12-6', 2011, '2018-01-07', '2018-01-07 20:49:07', 'img/books/1321397098.jpg', 'Fil. 220 G646 1992', '1', '3');

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
  `faculty_id` int(11) NOT NULL,
  `seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_request`
--

INSERT INTO `book_request` (`request_id`, `request_no`, `book_title`, `author`, `copies`, `date_requested`, `status`, `faculty_id`, `seen`) VALUES
(1, 10682734, 'test', 'test', 3, '2017-12-09', ' 1', 12312123, 0),
(2, 90813276, 'try', 'tested', 1, '2017-12-09', '0', 12312123, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_book`
--

CREATE TABLE `borrow_book` (
  `id` int(11) NOT NULL,
  `borrow_no` varchar(50) NOT NULL,
  `book_no` varchar(150) NOT NULL,
  `copies` int(11) NOT NULL DEFAULT '1',
  `on_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `ret` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow_book`
--

INSERT INTO `borrow_book` (`id`, `borrow_no`, `book_no`, `copies`, `on_date`, `due_date`, `ret`) VALUES
(4, '85372619', '9789719331704', 1, '2018-01-23', '2018-01-29', 0),
(5, '85372619', '4549660094272', 1, '2018-01-23', '2018-01-29', 0),
(6, '43576129', '9789719331704', 1, '2018-01-20', '2018-01-26', 0),
(7, '43576129', '4549660094272', 1, '2018-01-20', '2018-01-26', 0),
(10, '91256783', '9789719331704', 1, '2018-01-13', '2018-01-19', 0),
(11, '91256783', '4549660094272', 1, '2018-01-13', '2018-01-19', 0),
(14, '12085496  ', '9789719331704', 1, '2018-01-22', '2018-01-28', 0),
(15, '23475160  ', '9789719331704', 1, '2018-01-22', '2018-01-28', 0),
(16, '53906427  ', '9789719331704', 1, '2018-01-23', '2018-01-29', 0),
(17, '39065247  ', '4549660094272', 4, '2018-01-23', '2018-01-29', 0),
(18, '29168705  ', '9789719331704', 1, '2018-01-23', '2018-01-29', 0),
(19, '34290187  ', '4549660094272', 1, '2018-01-23', '2018-01-29', 0),
(20, '16248593  ', '4549660094272', 1, '2018-01-23', '2018-01-29', 0),
(21, '89473052', '9789719331704', 1, '2018-01-23', '2018-01-29', 0),
(22, '80629475  ', '9789719331704', 1, '2018-01-30', '2018-02-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_details`
--

CREATE TABLE `borrow_details` (
  `brdt_id` int(20) NOT NULL,
  `borrow_no` varchar(30) DEFAULT NULL,
  `member_id` varchar(50) DEFAULT NULL,
  `activity` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_details`
--

INSERT INTO `borrow_details` (`brdt_id`, `borrow_no`, `member_id`, `activity`) VALUES
(2, '85372619', '73923', 'overdue'),
(3, '43576129', '739212', 'overdue'),
(5, '91256783', '7392', 'overdue'),
(11, '12085496  ', '7392', 'overdue'),
(12, '23475160  ', '7392', 'overdue'),
(13, '53906427  ', '7392', 'overdue'),
(14, '39065247  ', '7392', 'overdue'),
(15, '29168705  ', '7392', 'overdue'),
(16, '34290187  ', '7392', 'overdue'),
(17, '16248593  ', '7392', 'overdue'),
(18, '89473052', '739212', 'overdue'),
(19, '80629475  ', '7392', 'borrowed');

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
(31, 'Midwifey', 6, 'Midwifery Course', 2),
(32, 'BSHM', 6, 'Bachelor of Science in Hospitality Management', 4),
(33, 'SHSABM', 7, 'Academic Business & Management', 2),
(34, 'SHSSTEM', 7, 'Science Technology Engineering & Mathematics', 2),
(35, 'SHSGAS', 7, ' General Academic Strand', 2),
(36, 'SHTechVocHeBPP', 8, 'Home Economics Bread & Pastry Production', 2),
(37, 'SHTechVocHeCk', 8, 'Home Economics Cookery', 2),
(38, 'SHTechVocHeHK', 8, 'Home Economics Housekeeping', 2),
(39, 'SHTechVocHeFB', 8, 'Home Economics Food and Beverages', 2),
(40, 'JHS', 9, 'Junior High School', 7),
(41, 'GS', 10, 'Grade School', 6),
(42, 'NonDegTeach', 11, 'CERT. IN TEACHING', 2),
(43, 'NonDegSPED', 11, 'CERT. IN SPED', 2);

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
  `passcode` varchar(150) NOT NULL,
  `contacs` varchar(12) NOT NULL DEFAULT '09000000000',
  `dept` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_no`, `faculty_name`, `passcode`, `contacs`, `dept`, `active`) VALUES
(1, '12312123', 'tere', '827ccb0eea8a706c4c34a16891f84e7b', '09000000000', 4, 1),
(2, '1241526', 'ter', 'cfcd208495d565ef66e7dff9f98764da', '09000000000', 2, 1),
(3, '123456', 'Theresa', 'cfcd208495d565ef66e7dff9f98764da', '09000000000', 6, 1);

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
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` int(11) NOT NULL,
  `library_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `library_name`) VALUES
(1, 'College Library'),
(2, 'HighSchool Library');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `student_no` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `student_no`, `description`, `date_time`) VALUES
(1, 'admin', 'Login', '2018-01-20 15:02:32'),
(2, 'Librarian', 'Login', '2018-01-20 15:24:49'),
(3, 'Librarian', 'Login', '2018-01-20 15:24:51'),
(4, '12312123', 'Login', '2018-01-20 15:37:03'),
(5, '12312123', 'Login', '2018-01-20 15:37:13'),
(6, '12312123', 'Login', '2018-01-20 16:11:16'),
(7, '12312123', 'Login', '2018-01-20 16:11:32'),
(8, '12312123', 'Login', '2018-01-20 16:11:33'),
(9, '12312123', 'Login', '2018-01-20 16:11:34'),
(10, '12312123', 'Login', '2018-01-20 16:11:34'),
(11, 'admin', 'Login', '2018-01-20 16:23:55'),
(12, 'admin', 'Login', '2018-01-20 16:25:09'),
(13, '739212', 'Login', '2018-01-20 18:09:57'),
(14, '739212', 'Login', '2018-01-20 18:21:43'),
(15, '73923', 'Login', '2018-01-20 18:26:24'),
(16, '7392', 'Login', '2018-01-20 18:28:32'),
(17, '7392', 'Login', '2018-01-20 18:30:14'),
(18, '7392', 'Login', '2018-01-20 18:32:38'),
(19, '739212', 'Login', '2018-01-20 18:37:21'),
(20, 'Librarian', 'Login', '2018-01-20 18:38:35'),
(21, '12312123', 'Login', '2018-01-21 10:31:29'),
(22, '12312123', 'Login', '2018-01-21 10:37:42'),
(23, 'admin', 'Login', '2018-01-21 12:09:14'),
(24, 'admin', 'Login', '2018-01-21 12:09:17'),
(25, '7392', 'Login', '2018-01-21 15:49:18'),
(26, '12312123', 'Login', '2018-01-21 18:42:10'),
(27, '7392', 'Login', '2018-01-21 18:43:59'),
(28, 'admin', 'Login', '2018-01-21 18:44:37'),
(29, 'admin', 'Login', '2018-01-21 18:45:36'),
(30, 'admin', 'Login', '2018-01-21 18:45:48'),
(31, 'admin', 'Login', '2018-01-21 18:45:56'),
(32, '7392', 'Login', '2018-01-23 19:01:50'),
(33, '73923', 'Login', '2018-01-23 19:03:58'),
(34, '73923', 'Login', '2018-01-23 19:04:00'),
(35, '739212', 'Login', '2018-01-23 19:04:11'),
(36, 'Librarian', 'Login', '2018-01-23 19:53:28'),
(37, 'Librarian', 'Login', '2018-01-23 19:53:31'),
(38, 'Librarian', 'Login', '2018-01-23 21:18:21'),
(39, '7392', 'Login', '2018-01-23 21:28:59'),
(40, '739212', 'Login', '2018-01-23 21:31:49'),
(41, 'Librarian', 'Login', '2018-01-23 21:34:17'),
(42, '12312123', 'Login', '2018-01-23 21:42:00'),
(43, 'Librarian', 'Login', '2018-01-23 21:57:18'),
(44, 'Librarian', 'Login', '2018-01-23 21:57:26'),
(45, '7392', 'Login', '2018-01-23 22:26:04'),
(46, 'Librarian', 'Login', '2018-01-23 22:26:59'),
(47, '7392', 'Login', '2018-01-23 22:31:16'),
(48, 'admin', 'Login', '2018-01-28 07:50:03'),
(49, 'admin', 'Login', '2018-01-28 07:52:58'),
(50, 'admin', 'Login', '2018-01-28 11:55:03'),
(51, 'admin', 'Login', '2018-01-28 11:55:06'),
(52, 'admin', 'Login', '2018-01-29 20:36:13');

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
(1, 1, 'request', 'Test Subject', 'Test Content', 1, 12312123),
(2, 1, 'request', 'Requested for Book', 'try', 1, 12312123),
(3, 2, 'feedback', 'Feedback from Student', '', 1, 7392),
(4, 2, 'feedback', 'Feedback from Student', 'Test', 1, 7392),
(5, 2, 'feedback', 'Feedback from Student', 'Test', 1, 7392),
(6, 2, 'feedback', 'Feedback from Student', 'Try', 1, 7392),
(7, 2, 'feedback', 'Feedback from Student', 'Testing', 1, 7392),
(8, 2, 'feedback', 'Feedback from Student', 'Testing', 1, 7392);

-- --------------------------------------------------------

--
-- Table structure for table `over_due`
--

CREATE TABLE `over_due` (
  `id` int(20) NOT NULL,
  `issue_id` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `prev_send` date NOT NULL,
  `next_send` date NOT NULL,
  `member_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sent` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `over_due`
--

INSERT INTO `over_due` (`id`, `issue_id`, `prev_send`, `next_send`, `member_id`, `sent`) VALUES
(20, '91256783', '2018-01-23', '2018-01-26', '7392', 0),
(21, '43576129', '2018-01-28', '2018-01-31', '739212', 0),
(22, '12085496  ', '2018-01-29', '2018-02-01', '7392', 0),
(23, '23475160  ', '2018-01-29', '2018-02-01', '7392', 0),
(24, '53906427  ', '2018-01-30', '2018-02-02', '7392', 0),
(25, '39065247  ', '2018-01-30', '2018-02-02', '7392', 0),
(26, '29168705  ', '2018-01-30', '2018-02-02', '7392', 0),
(27, '34290187  ', '2018-01-30', '2018-02-02', '7392', 0),
(28, '16248593  ', '2018-01-30', '2018-02-02', '7392', 0),
(29, '85372619', '2018-01-30', '2018-02-02', '73923', 0),
(30, '89473052', '2018-01-30', '2018-02-02', '739212', 0);

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
  `year_level` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `passcode` varchar(150) NOT NULL,
  `dept` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `student_name`, `gender`, `address`, `contact`, `year_level`, `type`, `passcode`, `dept`, `course`, `active`, `image`) VALUES
(1, 7392, 'Mark Cruz', 'Male', '', '09291953693', 1, '0', '7a1d9028a78f418cb8f01909a348d9b2', 1, 1, 1, 'img/student_images/1021942190.jpg'),
(2, 73923, 'Joseph Dela Cruz', 'Male', '', '09291953693', 2, '1', 'd09bf41544a3365a46c9077ebb5e35c3', 4, 23, 1, 'img/student_images/1431045741.jpg'),
(3, 739212, 'Dianna Lopez', 'Female', '', '09291953693', 3, '2', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, 1, 'img/student_images/1539155088.jpg');

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 1, 1, '1'),
(2, 'Librarian', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1, '1'),
(3, 'Assit', 'd6ef5f7fa914c19931a55bb262ec879c', '', 2, 1, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `borrow_details`
--
ALTER TABLE `borrow_details`
  ADD PRIMARY KEY (`brdt_id`);

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
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `over_due`
--
ALTER TABLE `over_due`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `borrow_details`
--
ALTER TABLE `borrow_details`
  MODIFY `brdt_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
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
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `over_due`
--
ALTER TABLE `over_due`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
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
