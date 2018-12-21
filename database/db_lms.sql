-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2018 at 11:08 AM
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
  `img` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `posted_by` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audio_visual`
--

CREATE TABLE `audio_visual` (
  `av_id` int(11) NOT NULL,
  `av_num` varchar(250) NOT NULL,
  `author` varchar(250) NOT NULL,
  `av_title` varchar(250) NOT NULL,
  `copies` int(11) NOT NULL,
  `category_id` int(50) NOT NULL,
  `publisher` varchar(250) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `copyright` varchar(250) NOT NULL,
  `date_recieve` date DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `img` text NOT NULL,
  `location` varchar(250) NOT NULL,
  `department` varchar(50) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `runningtime` time NOT NULL,
  `types` int(3) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audio_visual`
--

INSERT INTO `audio_visual` (`av_id`, `av_num`, `author`, `av_title`, `copies`, `category_id`, `publisher`, `isbn`, `copyright`, `date_recieve`, `date_added`, `img`, `location`, `department`, `status`, `runningtime`, `types`) VALUES
(1, '001', 'TLRC', 'Alimango', 2, 1, 'Columbia Pictures', '', '2000', NULL, NULL, 'images/books/586451932.png', 'FIL # 102', '', '1', '02:00:00', 2),
(2, '002', 'TLRC', 'Bangus', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(3, '003', 'TLRC', 'Basic Financial Bus. Mgt.', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(4, '004', 'TLRC', 'Bio-Intensive Gardening', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(5, '005', 'TLRC', 'Commercial Banking', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(6, '006', 'TLRC', 'Cooperative (part 1)', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(7, '007', 'TLRC', 'Direct selling and marketing', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(8, '008', 'TLRC', 'Dried flowers', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(9, '009', 'TLRC', 'Fabric toys', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(10, '010', 'TLRC', 'Fashion jewelries and accessories', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(11, '011', 'TLRC', 'Flower arrangements', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(12, '012', 'TLRC', 'Food retailing', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(13, '013', 'TLRC', 'High-value vegetables', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(14, '014', 'TLRC', 'Hito', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(15, '015', 'TLRC', 'Homebakeshop I (tinapay atbp.)', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(16, '016', 'TLRC', 'Homebakeshop II (cakes and pastries)', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(17, '017', 'TLRC', 'Home decors', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(18, '018', 'TLRC', 'Honeybee culture', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(19, '019', 'TLRC', 'ISDA (fish and other seafoods products)', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2),
(20, '020', 'TLRC', 'Kandila at potpourri', 2, 1, '', '', '', NULL, NULL, '', '', '', '1', '00:00:00', 2);

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
  `date_receive` date NOT NULL,
  `location` longtext NOT NULL,
  `author` varchar(250) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `copyright_year` varchar(250) NOT NULL,
  `category_id` int(50) NOT NULL,
  `book_copies` int(11) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` text NOT NULL,
  `department` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `types` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_no`, `date_receive`, `location`, `author`, `book_title`, `book_pub`, `copyright_year`, `category_id`, `book_copies`, `isbn`, `date_added`, `img`, `department`, `status`, `types`) VALUES
(1, '13880', '0000-00-00', 'Circ.651 G861 1968', 'Fries Albert C.', 'Office practice fundamentals', 'McGraw-Hill Book Co.', 'c1968.', 8, 2, '', '2018-03-16 22:48:42', '', '1', '1', 1),
(2, '19861', '0000-00-00', 'Circ.651 F263 1969', 'Fasnacht Harold D.', 'How to use business machines', 'McGraw-Hill', 'c1969.', 8, 4, '', '2018-03-16 22:48:42', '', '1', '1', 1),
(3, '20191', '0000-00-00', 'Fil.651 An43', 'Angeles Conrado P. ', 'Handbook on office management', 'R.M. Garcia pub. house', ' c1980.', 8, 5, '', '2018-03-16 22:48:42', '', '1', '1', 1),
(4, '19880', '0000-00-00', 'Fil.651 An53', 'Angeles Conrado P. ', 'Handbook on office management', 'R.M. Garcia pub. house', ' c1980.', 8, 5, '', '2018-03-16 22:48:43', '', '1', '1', 1),
(5, '20909', '0000-00-00', 'Circ.651 G861 1968', 'Fries Albert C.', 'Office practice fundamentals', 'McGraw-Hill Book Co.', 'c1968.', 8, 5, '', '2018-03-16 22:48:43', '', '1', '1', 1),
(6, '16176', '0000-00-00', 'Circ.651 K125 1970', 'Kallaus Norman F.', 'College business machines', 'McGraw-Hill book Co.', 'c1970.', 8, 5, '', '2018-03-16 22:48:43', '', '1', '1', 1),
(7, '7779', '0000-00-00', 'Circ.651 T279 1962 7779', '  ', 'Office management and control : The action of administrative management', 'Richard D. Irwin inc.', 'c1962.', 8, 5, '', '2018-03-16 22:48:43', '', '1', '1', 1),
(8, '20197', '0000-00-00', 'Fil.651 An43', 'Angele Conrado P. ', 'Handbook on office management', 'R.M. Garcia pub. house', ' c1980.', 8, 5, '', '2018-03-16 22:48:43', '', '1', '1', 1),
(9, '14825', '0000-00-00', 'Circ.651 T279 1975', 'Terry George R.', 'Office management and control: the administrative managing of information', 'Richard D. Irwin inc.', 'c1975.', 8, 5, '', '2018-03-16 22:48:43', '', '1', '1', 1),
(10, '651', '0000-00-00', 'AV651 D285 1997', ' ', 'Dear God : many people write to God. somebody is answering [video recording]', 'California Pictures', 'c1997.', 8, 5, '', '2018-03-16 22:48:43', '', '1', '1', 1),
(11, '22791', '0000-00-00', 'Circ.651 G861 1968', 'Fries Albert C.', 'Office practice fundamentals', 'McGraw-Hill Book Co.', 'c1968.', 8, 5, '', '2018-03-16 22:48:43', '', '1', '1', 1),
(12, '27013', '0000-00-00', 'Circ.651 J445 1978', 'Jenning Lucy Mae ', 'Secretarial and administrative procedures', 'National book store', 'c1978.', 8, 5, '', '2018-03-16 22:48:43', '', '1', '1', 1),
(13, '20196', '0000-00-00', 'Fil.651 An43', 'Angeles Conrado P. ', 'Handbook on office management', 'R.M. Garcia pub. house', ' c1980.', 8, 5, '', '2018-03-16 22:48:43', '', '1', '1', 1),
(14, '16352', '0000-00-00', 'Fil.651 An53 1976', 'Angeles Conrado P. ', 'Handbook on office management', 'University of the East', 'c1976.', 8, 5, '', '2018-03-16 22:48:43', '', '1', '1', 1),
(15, '22789', '0000-00-00', 'Circ.651 G861 1968', 'Fries Albert C.', 'Office practice fundamentals', 'McGraw-Hill Book Co.', 'c1968.', 8, 5, '', '2018-03-16 22:48:43', '', '1', '1', 1),
(16, '16175', '0000-00-00', 'Circ.651 F263 1969', 'Fasnacht Harold D.', 'How to use business machines', 'McGraw-Hill', 'c1969.', 8, 5, '', '2018-03-16 22:48:44', '', '1', '1', 1),
(17, '19883', '0000-00-00', 'Fil.651 An43', 'Angeles Conrado P. ', 'Handbook on office management', 'R.M. Garcia pub. house', ' c1980.', 8, 5, '', '2018-03-16 22:48:44', '', '1', '1', 1),
(18, '26213', '0000-00-00', 'Fil.651 F91', 'Frias Solita A.', 'CPA reviewer in auditing theory (1984 edition)', 'GIC enterprises & co. inc.', ' c1984.', 8, 5, '', '2018-03-16 22:48:44', '', '1', '1', 1),
(19, '20192', '0000-00-00', 'Fil.651 An53', 'Angeles Conrado P. ', 'Handbook on office management', 'R.M. Garcia pub. house', ' c1980.', 8, 5, '', '2018-03-16 22:48:44', '', '1', '1', 1),
(38, '', '0000-00-00', '06/06/2017', 'Fil. 510 Or74g 2016', 'General mathematics', 'Rex Book Store', 'c2016.', 8, 5, '', '2018-03-16 23:37:24', '', '', '', 0),
(41, '350', '0000-00-00', 'GR 500 N532 2000', '', 'The new book of popular science', 'Grolier', 'c2000.', 8, 5, '', '2018-03-16 23:42:58', '', '2', '1', 1),
(42, '353', '0000-00-00', 'GR 500 N532 2000', '', 'The new book of popular science', 'Grolier', 'c2000.', 8, 5, '', '2018-03-16 23:42:58', '', '2', '1', 1),
(43, '348', '0000-00-00', 'GR 500 N532 2000', '', 'The new book of popular science', 'Grolier', 'c2000.', 8, 5, '', '2018-03-16 23:42:58', '', '2', '1', 1),
(44, '351', '0000-00-00', 'GR 500 N532 2000', '', 'The new book of popular science', 'Grolier', 'c2000.', 8, 5, '', '2018-03-16 23:42:58', '', '2', '1', 1),
(45, '349', '0000-00-00', 'GR 500 N532 2000', '', 'The new book of popular science', 'Grolier', 'c2000.', 8, 5, '', '2018-03-16 23:42:58', '', '2', '1', 1),
(46, '352', '0000-00-00', 'GR 500 N532 2000', '', 'The new book of popular science', 'Grolier', 'c2000.', 8, 5, '', '2018-03-16 23:42:59', '', '2', '1', 1),
(47, '082', '0000-00-00', 'Fil. 500.2 P984p 2016', '', 'Science in today\'s world : physical science', 'Sibs Publishing House', 'c2016.', 8, 5, '', '2018-03-16 23:42:59', '', '2', '1', 1),
(48, '697', '0000-00-00', 'Fil. 500.2 B983c 2016', '', 'Conceptual science and beyond : physical science (a worktext for Senior High School)', 'Brilliant Creations Publishing', 'c2016.', 8, 5, '', '2018-03-16 23:42:59', '', '2', '1', 1),
(49, '608', '0000-00-00', 'Circ. 500.2 W749i 2016', '', 'An introduction to physical science', 'Rex Book Store', 'c2016.', 8, 5, '', '2018-03-16 23:42:59', '', '2', '1', 1),
(50, '083', '0000-00-00', 'Fil. 500.2 P984p 2016', '', 'Science in today\'s world : physical science', 'Sibs Publishing House', 'c2016.', 8, 5, '', '2018-03-16 23:42:59', '', '2', '1', 1),
(51, '395', '0000-00-00', 'Fil. 500.2 C124p 2015', '', 'Physical science : a modular approach', 'Mindshapers Co.', 'c2015.', 8, 5, '', '2018-03-16 23:42:59', '', '2', '1', 1),
(52, '698', '0000-00-00', 'Fil. 500.2 B983c 2016', '', 'Conceptual science and beyond : physical science (a worktext for Senior High School)', 'Brilliant Creations Publishing', 'c2016.', 8, 5, '', '2018-03-16 23:42:59', '', '2', '1', 1),
(53, '696', '0000-00-00', 'Fil. 500.2 B983c 2016', '', 'Conceptual science and beyond : physical science (a worktext for Senior High School)', 'Brilliant Creations Publishing', 'c2016.', 8, 5, '', '2018-03-16 23:42:59', '', '2', '1', 1),
(54, '084', '0000-00-00', 'Fil. 500.2 P984p 2016', '', 'Science in today\'s world : physical science', 'Sibs Publishing House', 'c2016.', 8, 5, '', '2018-03-16 23:42:59', '', '2', '1', 1),
(55, '055', '2018-03-18', 'Fil. 510 G326 2016', 'Jose Rizal', 'General mathematics : soaring 21st century mathematics : Grade 11 Senior High School (K to 12)', 'Phoenix Publishing House', 'c2016.', 8, 3, '#124157', '2018-03-16 23:43:00', 'images/books/327151733.jpg', '2', '1', 1),
(56, '449', '0000-00-00', 'Fil. 510 Or74g 2016', '', 'General mathematics', 'Rex Book Store', 'c2016.', 8, 5, '', '2018-03-16 23:43:00', '', '2', '1', 1),
(57, '447', '0000-00-00', 'Fil. 510 Or74g 2016', '', 'General mathematics', 'Rex Book Store', 'c2016.', 8, 5, '', '2018-03-16 23:43:00', '', '2', '1', 1),
(58, '056', '0000-00-00', 'Fil. 510 G326 2016', '', 'General mathematics : soaring 21st century mathematics : Grade 11 Senior High School (K to 12)', 'Phoenix Publishing House', 'c2016.', 8, 5, '', '2018-03-16 23:43:00', '', '2', '1', 1),
(59, '448', '0000-00-00', 'Fil. 510 Or74g 2016', '', 'General mathematics', 'Rex Book Store', 'c2016.', 8, 5, '', '2018-03-16 23:43:00', '', '2', '1', 1),
(60, '057', '2001-12-02', 'Fil. 510 G326 2016', 'Test', 'General mathematics : soaring 21st century mathematics : Grade 11 Senior High School (K to 12)', 'Phoenix Publishing House', 'c2016.', 8, 5, '1231212312312', '2018-03-16 23:43:00', 'images/books/1309114220.jpg', '2', '1', 1),
(61, '411', '0000-00-00', 'Fil. 510 S621g 2016', '', 'General mathematics for Senior High School : a comprehensive approach', 'Mindshapers Co.', 'c2016.', 8, 5, '', '2018-03-16 23:43:00', '', '2', '1', 1),
(62, '15684', '0000-00-00', 'Prof. 025.002 B928 2009', '', 'The digital library and other issues in library and information science.', 'Great Books Publishing 2008.', 'c2009.', 8, 5, '', '2018-03-17 00:09:56', '', '3', '1', 1),
(63, '17575', '0000-00-00', 'Fil. 025.04 D111 2014', '', 'D whiz in database management', 'Rex Book Store', 'c2014.', 8, 5, '', '2018-03-17 00:09:56', '', '3', '1', 1),
(64, '12063', '0000-00-00', 'Circ. 025.04 C888i 2001', 'Crumlish Christian ', 'The internet for busy people : the book to use when there\'s no time to lose!', 'McGraw-hill', 'c2001.', 8, 5, '', '2018-03-17 00:09:57', '', '3', '1', 1),
(65, '9324', '0000-00-00', 'Res.', '025.2 1989', '', 'Statistics for managing library acquisition', 'c.', 8, 5, '', '2018-03-17 00:09:57', '', '3', '1', 1),
(66, '16961', '0000-00-00', 'Fil. 025.24 B272d 2011', '', 'Database concepts / Gladys Barrer [and three others]', 'TechFactors', 'c2011.', 8, 5, '', '2018-03-17 00:09:57', '', '3', '1', 1),
(67, '16964', '0000-00-00', 'Fil. 025.24 B272d 2011', '', 'Database concepts / Gladys Barrer [and three others]', 'TechFactors', 'c2011.', 8, 5, '', '2018-03-17 00:09:57', '', '3', '1', 1),
(68, '16962', '0000-00-00', 'Fil. 025.24 B272d 2011', '', 'Database concepts / Gladys Barrer [and three others]', 'TechFactors', 'c2011.', 8, 5, '', '2018-03-17 00:09:58', '', '3', '1', 1),
(69, '16965', '0000-00-00', 'Fil. 025.24 B272d 2011', '', 'Database concepts / Gladys Barrer [and three others]', 'TechFactors', 'c2011.', 8, 5, '', '2018-03-17 00:09:58', '', '3', '1', 1),
(70, '16172', '0000-00-00', 'Res. 025.24 B272d 2011', '', 'Database concepts', 'Techfactors Inc.', 'c2011.', 8, 5, '', '2018-03-17 00:14:01', '', '3', '1', 1),
(71, '16963', '0000-00-00', 'Fil. 025.24 B272d 2011', '', 'Database concepts / Gladys Barrer [and three others]', 'TechFactors', 'c2011.', 8, 5, '', '2018-03-17 00:14:01', '', '3', '1', 1),
(72, '16172', '0000-00-00', 'Fil. 025.24 B272d 2011', '', 'Database concepts / Gladys Barrer [and three others]', 'TechFactors', 'c2011.', 8, 5, '', '2018-03-17 00:14:01', '', '3', '1', 1),
(73, '11391', '0000-00-00', 'Res. 025.27 F477 2002', '', 'Filipiniana', 'Philippines', 'c2002.', 8, 5, '', '2018-03-17 00:14:01', '', '3', '1', 1),
(74, '10979', '0000-00-00', 'Prof. 025.3 W521 1977', 'Westby Barbara M.', 'Sear\'s list of subject headings', 'H.W. Wilson', 'c1977.', 8, 5, '', '2018-03-17 00:14:01', '', '3', '1', 1),
(75, '12358', '0000-00-00', 'Res. 025.3 B928a 2002', 'Buenrostro Juan Jr. C.', 'Abstracting and indexing made easy', 'Great Books Publishing ', 'c2002.', 8, 5, '', '2018-03-17 00:14:01', '', '3', '1', 1),
(76, '10726', '0000-00-00', 'Res. 025.3076 1998', '', 'Learn descriptive cataloguing', '', 'c.', 8, 5, '', '2018-03-17 00:15:41', '', '3', '1', 1),
(77, '11590', '0000-00-00', 'Res. 025.32 An589 2003', '', 'Anglo-American cataloguing rules', 'American Library Association', 'c2003.', 8, 5, '', '2018-03-17 00:15:42', '', '3', '1', 1),
(78, '11784', '0000-00-00', 'Res. 025.4 D519 1996', '', 'Dewey decimal classification and relative index volume 2-3', 'Forest Press', 'c1996.', 8, 5, '', '2018-03-17 00:17:35', '', '3', '1', 1),
(79, '17412', '0000-00-00', 'Fil. 025.4 B272d  2005', '', 'Database concepts ', 'Trademark of Techfactors', 'c2005.', 8, 5, '', '2018-03-17 00:17:35', '', '3', '1', 1),
(80, '11782', '0000-00-00', 'Res. 025.4 D519 1996', '', 'Dewey decimal classification and relative index volume 2-3', 'Forest Press', 'c1996.', 8, 5, '', '2018-03-17 00:17:35', '', '3', '1', 1),
(81, '11785', '0000-00-00', 'Res. 025.4 D519 1996', '', 'Dewey decimal classification and relative index volume 2-3', 'Forest Press', 'c1996.', 8, 5, '', '2018-03-17 00:17:35', '', '3', '1', 1),
(82, '11783', '0000-00-00', 'Res. 025.4 D519 1996', '', 'Dewey decimal classification and relative index volume 2-3', 'Forest Press', 'c1996.', 8, 5, '', '2018-03-17 00:17:35', '', '3', '1', 1),
(83, '20337', '0000-00-00', 'F W339 2009', '', 'The 39 clues 6 : in too deep', 'Scholastic Inc.', 'c2009.', 8, 5, '', '2018-03-17 00:40:14', '', '4', '1', 1),
(84, '18440', '0000-00-00', 'F D754a 2005', '', 'The adventures of Sherlock Holmes', 'Sterling Press Private Limited', 'c2005.', 8, 5, '', '2018-03-17 00:40:14', '', '4', '1', 1),
(85, '18393', '0000-00-00', 'F S532s 1979', '', 'Sunflower', 'Pan Books', 'c1979.', 8, 5, '', '2018-03-17 00:40:14', '', '4', '1', 1),
(86, '22554', '0000-00-00', 'F S856b 2015', '', 'Back in time: the second journey through time', 'Scholastic Inc.', 'c2015.', 8, 5, '', '2018-03-17 00:40:15', '', '4', '1', 1),
(87, '7837', '0000-00-00', 'Circ.', '', 'I Wonder Why : stars twinkle and other questions about space', 'Kingfisher Publications Plc', ' c199310091', 8, 5, '', '2018-03-17 00:42:31', '', '4', '1', 1),
(88, '20262', '0000-00-00', 'F K26n 1989', 'Keene Carolyn ', 'Nancy Drew mystery stories 38: the mystery of the fire dragon', 'Grosset & Dunlsp', 'c1989.', 8, 5, '', '2018-03-17 00:44:07', '', '4', '1', 1),
(89, '20346', '0000-00-00', 'F T969g 2010', 'Twain Mark ', 'Great illustrated classics: the adventures of Hucleberry Finn', 'Cengage Learning', 'c2010.', 8, 5, '', '2018-03-17 00:44:07', '', '4', '1', 1),
(90, '7232', '0000-00-00', 'SC', '', ' Ksaysayan: the story of the Filipino people vol. 4 Life in the colony', 'Asia Publishing Company Limited', ' c1998.', 8, 5, '', '2018-03-17 00:44:40', '', '4', '1', 1),
(91, '21786', '0000-00-00', 'F S854g 2013', '', 'Get into the gear Stilton!', 'Scholastic Inc.', 'c2013.', 8, 5, '', '2018-03-17 00:45:21', '', '4', '1', 1),
(92, '7531', '0000-00-00', 'F P994y 1998', '', 'The young collector\'s illustrated classics: The adventures of Robin Hood', 'Masterwork Books', 'c1998.', 8, 5, '', '2018-03-17 00:46:47', '', '4', '1', 1),
(93, '21230', '0000-00-00', 'F R585n 2011', '', 'The son of neptune', 'Disney.', 'c2011.', 8, 5, '', '2018-03-17 00:46:47', '', '4', '1', 1),
(94, '13200', '0000-00-00', 'TB(Ref)', '', 'Across Borders', 'VIBAL Publishing House', ' Inc.', 8, 5, '', '2018-03-17 00:46:47', '', '4', '1', 1),
(95, '20587', '0000-00-00', 'F C953 2010', '', 'Green princess saves the day', 'Scholastic Inc. ', 'c2010.', 8, 5, '', '2018-03-17 00:46:48', '', '4', '1', 1),
(96, '9891', '0000-00-00', 'F L585m 1983', '', 'The magician\'s nephew', 'Harper Trophy', 'c1983.', 8, 5, '', '2018-03-17 00:47:34', '', '4', '1', 1),
(97, '22537', '0000-00-00', 'F S856c 2014', '', 'Cavemice: the great mouse race', 'Scholastic Inc.', 'c2014.', 8, 5, '', '2018-03-17 00:48:27', '', '4', '1', 1),
(98, '20262', '0000-00-00', 'F K26n 1977', 'Keene Carolyn ', 'Nancy Drew mystery stories 54: the strange message in the parchment', 'Grosset & Dunlap', 'c1977.', 8, 5, '', '2018-03-17 00:48:27', '', '4', '1', 1),
(99, '8180', '0000-00-00', 'F M498m 1996', 'Melville Herman ', 'Moby Dick', 'Rohan Book Company', 'c1996.', 8, 5, '', '2018-03-17 00:48:27', '', '4', '1', 1),
(100, '7240', '0000-00-00', 'Prof.', 'Levin Richard I.', 'Quantitative approaches to management', 'Mcgraw Hill International Book Company', ' c.', 8, 5, '', '2018-03-17 00:53:12', '', '4', '1', 1),
(101, '21791', '0000-00-00', 'F S854m 2013', '', 'The mouse hoax: mini mystery 3', 'Scholastic inc.', 'c2013.', 8, 5, '', '2018-03-17 00:53:12', '', '4', '1', 1),
(102, '20928', '0000-00-00', 'F P 976 2006', '', 'The Puffin book of classic school stories', 'Penguin Group', 'c2006.', 8, 5, '', '2018-03-17 00:53:14', '', '4', '1', 1),
(103, '6521', '0000-00-00', 'F H6c 1978', '', 'Continental drift', 'McGHraw-Hill Book Company', 'c1978.', 8, 5, '', '2018-03-17 00:53:14', '', '4', '1', 1),
(104, '21220', '0000-00-00', 'F S856c 2010', '', 'Creepella von cacklefur: ghost pirate treasure', 'Scholastic Inc.', 'c2010.', 8, 5, '', '2018-03-17 00:53:14', '', '4', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booknumber`
--

CREATE TABLE `booknumber` (
  `id` int(11) NOT NULL,
  `bookNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `catalogue_id` int(11) NOT NULL,
  `cataloguename` varchar(50) DEFAULT NULL,
  `catalogue_image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`catalogue_id`, `cataloguename`, `catalogue_image`) VALUES
(1, 'Audio Visual', 'images/map/1.png'),
(2, 'Reserve', 'images/map/2.png'),
(6, 'Filipiniana', 'images/map/6.png'),
(7, 'Circulation', 'images/map/7.png'),
(8, 'General Referrence', 'images/map/8.png'),
(9, 'Periodical', 'images/map/9.png');

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
(2, 'Junior HighSchool Library'),
(3, 'ELementary Library'),
(4, 'Senior HighSchool Library');

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
(1, 'admin', 'Login', '2018-12-20 20:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `maintenace`
--

CREATE TABLE `maintenace` (
  `pri_id` int(20) NOT NULL,
  `men_1` int(20) NOT NULL,
  `men_2` int(20) NOT NULL,
  `men_3` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_board`
--

CREATE TABLE `message_board` (
  `pre_id` int(2) NOT NULL,
  `doc_id` varchar(20) NOT NULL,
  `header` longtext NOT NULL,
  `footer` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `periodical`
--

CREATE TABLE `periodical` (
  `periodical_id` int(11) NOT NULL,
  `per_num` varchar(250) NOT NULL,
  `per_article` varchar(250) NOT NULL,
  `issue_num` varchar(250) NOT NULL,
  `location` text NOT NULL,
  `copies` int(11) NOT NULL,
  `title_periodical` varchar(250) NOT NULL,
  `category_id` int(50) NOT NULL,
  `author` varchar(250) NOT NULL,
  `publisher` varchar(250) NOT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `copyright_year` int(11) NOT NULL,
  `date_receive` date DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` text NOT NULL,
  `department` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `total_pages` int(11) NOT NULL,
  `volumn_num` int(11) NOT NULL,
  `types` int(3) DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periodical`
--

INSERT INTO `periodical` (`periodical_id`, `per_num`, `per_article`, `issue_num`, `location`, `copies`, `title_periodical`, `category_id`, `author`, `publisher`, `isbn`, `copyright_year`, `date_receive`, `date_added`, `img`, `department`, `status`, `total_pages`, `volumn_num`, `types`) VALUES
(1, '1', 'ACCOUNTANCY', '1', 'FIL #', 0, 'Editorial', 9, 'Jose Rizal', 'Rex', NULL, 0, NULL, '2018-03-17 09:09:48', 'images/books/1769637977.jpg', 0, 1, 10, 1, 3),
(2, '2', 'ADVANCE FOR NURSE PRACTITIONERS', 'MAY - OCT. 2007', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:49', '', 0, 1, 0, 0, 3),
(3, '3', 'ADVANCE FOR NURSES', 'OCT. - DEC. 2006 JAN. 2007', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:49', '', 0, 1, 0, 0, 3),
(4, '4', 'ADVANCE FOR NURSES', 'JAN. - SEPT. 2006', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:49', '', 0, 1, 0, 0, 3),
(5, '5', 'ADVANCE FOR NURSES', 'JAN. - JUNE 2007', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:49', '', 0, 1, 0, 0, 3),
(6, '6', 'ADVANCE FOR NURSES', 'JULY - DEC. 2007', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:49', '', 0, 1, 0, 0, 3),
(7, '7', 'ADVANCE IN POST-ACUTE CARE', 'JUNE - DEC. 2006 JAN. 2007', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:49', '', 0, 1, 0, 0, 3),
(8, '9', 'ALL RECIPES FOOD CONNECTING FOODIES', 'JAN. - OCT. 2008', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:49', '', 0, 1, 0, 0, 3),
(9, '10', 'AMERICAN JOURNAL OF NURSING', 'FEB. - JULY  2006', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:50', '', 0, 1, 0, 0, 3),
(10, '11', 'AMERICAN JOURNAL OF NURSING', 'JAN. - OCT. 2007', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:50', '', 0, 1, 0, 0, 3),
(11, '12', 'AMERICAN JOURNAL OF NURSING', 'APRIL - OCT. 2007', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:50', '', 0, 1, 0, 0, 3),
(12, '13', 'ASIAWEEK', 'JAN. - MARCH 2000', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:50', '', 0, 1, 0, 0, 3),
(13, '14', 'ASIAWEEK', 'JULY - DEC. 2000', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:50', '', 0, 1, 0, 0, 3),
(14, '15', 'ASIAWEEK', 'MAY - JULY 2001', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:50', '', 0, 1, 0, 0, 3),
(15, '16', 'ASIAWEEK', 'JAN. - APRIL 2000', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:50', '', 0, 1, 0, 0, 3),
(16, '17', 'ASIAWEEK', 'AUG. - OCT. 2001', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:50', '', 0, 1, 0, 0, 3),
(17, '18', 'ASIAWEEK', 'APRIL - JUNE 2000', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:50', '', 0, 1, 0, 0, 3),
(18, '19', 'ASIAWEEK', 'SEPT. - DEC. 2000', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:50', '', 0, 1, 0, 0, 3),
(19, '20', 'ASIAWEEK', 'JAN. - MARCH 1989', '', 0, '', 9, '', '', NULL, 0, NULL, '2018-03-17 09:09:51', '', 0, 1, 0, 0, 3);

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

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `borrowertype` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1, '1'),
(2, 'lib', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1, '1'),
(3, 'student1', 'e10adc3949ba59abbe56e057f20f883e', '', 2, 1, '1'),
(4, 'faculty1', '775bfca1e73df62e1fcf0cd050d1f102', '', 4, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audio_visual`
--
ALTER TABLE `audio_visual`
  ADD PRIMARY KEY (`av_id`);

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
-- Indexes for table `maintenace`
--
ALTER TABLE `maintenace`
  ADD PRIMARY KEY (`pri_id`);

--
-- Indexes for table `message_board`
--
ALTER TABLE `message_board`
  ADD PRIMARY KEY (`pre_id`);

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
-- Indexes for table `periodical`
--
ALTER TABLE `periodical`
  ADD PRIMARY KEY (`periodical_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `audio_visual`
--
ALTER TABLE `audio_visual`
  MODIFY `av_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `booknumber`
--
ALTER TABLE `booknumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `book_request`
--
ALTER TABLE `book_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `borrow_book`
--
ALTER TABLE `borrow_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `borrow_details`
--
ALTER TABLE `borrow_details`
  MODIFY `brdt_id` int(20) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `issue_book_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `message_board`
--
ALTER TABLE `message_board`
  MODIFY `pre_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `over_due`
--
ALTER TABLE `over_due`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `periodical`
--
ALTER TABLE `periodical`
  MODIFY `periodical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
