-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 03:20 PM
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
  `author_id` int(11) NOT NULL,
  `author_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `author_id`, `author_name`) VALUES
(1, 0, 'Robin Kerrod'),
(2, 0, 'Grolier'),
(3, 0, 'Carolyn Bradshaw'),
(4, 0, 'Michael Seals'),
(5, 0, '..'),
(6, 0, 'Brian Knapp'),
(7, 0, 'Greg Glowka'),
(8, 0, 'Lexicon'),
(9, 0, 'Clarke Donald'),
(10, 0, 'Dartford Mark'),
(11, 0, 'Merde C. Tan'),
(12, 0, 'Glencoe McGraw Hill'),
(13, 0, 'Lorenza P. Avera'),
(14, 0, 'Virginia Bermudez Ed. O. et al'),
(15, 0, 'Ricardo T. Jose Ph . D.'),
(16, 0, 'Glencoe McGraw Hill'),
(17, 0, 'Toni Morrison'),
(18, 0, 'Judy Brim'),
(19, 0, 'Douglas K. Ramsey'),
(20, 0, 'Cristine Redoblo');

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
  `copyright_year` int(11) NOT NULL,
  `date_receive` date NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_no`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `isbn`, `copyright_year`, `date_receive`, `date_added`, `status`) VALUES
(1, '  G6035FBE20171111  ', 'Sample', 2, 'Grolier', 3, 'Connecticut', 'AGDFW12313131', 2017, '2017-11-12', '2017-11-12 11:10:15', '2'),
(2, '  Q3265TAO20171111  ', 'test', 2, '1', 1, '2', 'sdgsdfsdf13', 2017, '2017-11-12', '2017-11-12 11:16:02', '1'),
(3, '  N8752TZY20171111  ', 'Sample1', 1, '2', 5, '2', '1241515-12131-515', 2017, '0000-00-00', '2017-11-12 11:17:40', '2'),
(4, '  B9720JGO20171111  ', 'Try', 3, '3', 2, '5', '2312312323-34534534-55675', 2017, '2017-11-12', '2017-11-12 11:20:10', '3'),
(5, '  Y5219ZPQ20171111  ', 'Try', 7, '3', 2, '4', 'sdgsdfsdf13', 2017, '2017-11-04', '2017-11-12 11:23:21', '5');

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
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL,
  `borrow_no` int(11) NOT NULL,
  `student_id` bigint(50) NOT NULL,
  `date_borrow` varchar(100) NOT NULL,
  `due_date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `borrow_no`, `student_id`, `date_borrow`, `due_date`) VALUES
(1, 484, 55, '2014-03-20 23:50:27', '21/03/2014'),
(2, 483, 55, '2014-03-20 23:49:34', '21/03/2014'),
(3, 482, 52, '2014-03-20 23:38:22', '03/01/2014');

-- --------------------------------------------------------

--
-- Table structure for table `borrowdetails`
--

CREATE TABLE `borrowdetails` (
  `borrow_details_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_id` int(11) NOT NULL,
  `borrow_status` varchar(50) NOT NULL,
  `date_return` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowdetails`
--

INSERT INTO `borrowdetails` (`borrow_details_id`, `book_id`, `borrow_id`, `borrow_status`, `date_return`) VALUES
(164, 16, 1, 'pending', ''),
(162, 15, 2, 'pending', ''),
(163, 15, 3, 'returned', '2014-03-21 00:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `categoryname` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `categoryname`) VALUES
(1, 'Periodical'),
(2, 'English'),
(3, 'Math'),
(4, 'Science'),
(5, 'Encyclopedia'),
(6, 'Filipiniana'),
(7, 'Newspaper'),
(8, 'General'),
(9, 'References');

-- --------------------------------------------------------

--
-- Table structure for table `lost_book`
--

CREATE TABLE `lost_book` (
  `Book_ID` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `Member_No` varchar(50) NOT NULL,
  `Date Lost` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `student_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middle_name` varchar(250) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `firstname`, `middle_name`, `lastname`, `gender`, `address`, `contact`, `type`, `year_level`, `status`) VALUES
(52, 'Mark', '', 'Sanchez', 'Male', 'Talisay', '212010', '4', 'Faculty', 'Active'),
(53, 'April Joy', '', 'Aguilar', 'Female', 'E.B. Magalona', '00', '5', 'Second Year', 'Banned'),
(54, 'Alfonso', '', 'Pancho', 'Male', 'E.B. Magalona', '009', '5', 'First Year', 'Active'),
(55, 'Jonathan ', '', 'Antanilla', 'Male', 'E.B. Magalona', '0032', '5', 'Fourth Year', 'Active'),
(56, 'Renzo Bryan', '', 'Pedroso', 'Male', 'Silay City', '03030', '5', 'Third Year', 'Active'),
(57, 'Eleazar', '', 'Duterte', 'Male', 'E.B. Magalona', '90902', '5', 'Second Year', 'Active'),
(58, 'Ellen Mae', '', 'Espino', 'Female', 'E.B. Magalona', '123', '5', 'First Year', 'Active'),
(59, 'Ruth', '', 'Magbanua', 'Female', 'E.B. Magalona', '9340', '5', 'Second Year', 'Active'),
(60, 'Shaina Marie', '', 'Gabino', 'Female', 'Silay City', '132134', '5', 'Second Year', 'Active'),
(62, 'Chairty Joy', '', 'Punzalan', 'Female', 'E.B. Magalona', '12423', '4', 'Faculty', 'Active'),
(63, 'Kristine May', '', 'Dela Rosa', 'Female', 'Silay City', '1321', '5', 'Second Year', 'Active'),
(64, 'Chinie marie', '', 'Laborosa', 'Female', 'E.B. Magalona', '902101', '5', 'Second Year', 'Active'),
(65, 'Ruby', '', 'Morante', 'Female', 'E.B. Magalona', '', '4', 'Faculty', 'Active');

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
  `access_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `image`, `access_level`) VALUES
(2, 'admin', 'admin', 'john', 'smith', '', 0);

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
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `borrowerid` (`student_id`),
  ADD KEY `borrowid` (`borrow_id`);

--
-- Indexes for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD PRIMARY KEY (`borrow_details_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id` (`category_id`),
  ADD KEY `classid` (`category_id`);

--
-- Indexes for table `lost_book`
--
ALTER TABLE `lost_book`
  ADD PRIMARY KEY (`Book_ID`);

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
  ADD PRIMARY KEY (`student_id`);

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `booknumber`
--
ALTER TABLE `booknumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=485;
--
-- AUTO_INCREMENT for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  MODIFY `borrow_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=801;
--
-- AUTO_INCREMENT for table `lost_book`
--
ALTER TABLE `lost_book`
  MODIFY `Book_ID` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
