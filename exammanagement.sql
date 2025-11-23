-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 03:43 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.29

CREATE DATABASE exammanagement;
USE exammanagement;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exammanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceid` int NOT NULL,
  `examid` int NOT NULL,
  `roomid` varchar(200) NOT NULL,
  `seat` int NOT NULL,
  `seatval` int NOT NULL
) ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendanceid`, `examid`, `roomid`, `seat`, `seatval`) VALUES
(19, 40, 's-112', 0, 2),
(20, 41, 's-112', 4, 3),
(21, 40, 'l-10', 0, 1),
(22, 41, 's-112', 2, 1),
(23, 41, 's-112', 3, 2),
(24, 42, 's-112', 5, 1),
(25, 42, 's-112', 6, 2),
(26, 42, 's-112', 7, 3),
(27, 45, 's-20', 0, 3),
(28, 45, 's-20', 1, 20),
(29, 45, 's-15', 1, 2),
(30, 40, 's-112', 1, 3),
(31, 47, 's-19', 0, 1),
(32, 47, 's-19', 2, 3),
(33, 47, 's-19', 3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `avaiableseat`
--

CREATE TABLE `avaiableseat` (
  `avaiableseatid` int NOT NULL,
  `room` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `used` int NOT NULL DEFAULT '0'
) ;

--
-- Dumping data for table `avaiableseat`
--

INSERT INTO `avaiableseat` (`avaiableseatid`, `room`, `date`, `used`) VALUES
(29, 'l-10', '2023-04-01', 1),
(30, 's-112', '2023-04-01', 12),
(31, 's-15', '2023-04-01', 2),
(32, 's-15', '2023-04-02', 2),
(33, 's-20', '2023-04-02', 2),
(34, 's-19', '2023-04-01', 4),
(35, 's-19', '2023-04-13', 4);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` varchar(500) NOT NULL,
  `name` text NOT NULL
) ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `name`) VALUES
('cse101', 'Data Structure'),
('cse102', 'Object oriented'),
('cse104', 'algorithm');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `enrollid` int NOT NULL,
  `courseid` varchar(500) NOT NULL,
  `studentid` int NOT NULL
) ;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`enrollid`, `courseid`, `studentid`) VALUES
(11, 'cse102', 1),
(12, 'cse104', 1),
(13, 'cse101', 2),
(14, 'cse102', 2),
(15, 'cse102', 3),
(16, 'cse104', 3),
(17, 'cse101', 20),
(18, 'cse102', 20),
(19, 'cse104', 20);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `examid` int NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `course` varchar(200) NOT NULL,
  `rooms` json NOT NULL
) ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`examid`, `date`, `time`, `course`, `rooms`) VALUES
(40, '2023-04-01', '11:25:00', 'cse102', '{\"l-10\": {\"0\": 1, \"name\": \"seat\"}, \"name\": \"room\", \"s-112\": {\"0\": 2, \"1\": 3, \"2\": -1, \"3\": -1, \"4\": -1, \"5\": -1, \"6\": -1, \"7\": -1, \"8\": -1, \"9\": -1, \"10\": -1, \"11\": -1, \"12\": -1, \"13\": -1, \"14\": -1, \"15\": -1, \"16\": -1, \"17\": -1, \"18\": -1, \"19\": -1, \"name\": \"seat\"}}'),
(41, '2023-04-01', '11:27:00', 'cse102', '{\"name\": \"room\", \"s-112\": {\"0\": -1, \"1\": -1, \"2\": 1, \"3\": 2, \"4\": 3, \"5\": -1, \"6\": -1, \"7\": -1, \"8\": -1, \"9\": -1, \"10\": -1, \"11\": -1, \"12\": -1, \"13\": -1, \"14\": -1, \"15\": -1, \"16\": -1, \"17\": -1, \"18\": -1, \"19\": -1, \"name\": \"seat\"}}'),
(42, '2023-04-01', '11:56:00', 'cse102', '{\"l-10\": {\"0\": -1, \"name\": \"seat\"}, \"name\": \"room\", \"s-112\": {\"0\": -1, \"1\": -1, \"2\": -1, \"3\": -1, \"4\": -1, \"5\": 1, \"6\": 2, \"7\": 3, \"8\": -1, \"9\": -1, \"10\": -1, \"11\": -1, \"12\": -1, \"13\": -1, \"14\": -1, \"15\": -1, \"16\": -1, \"17\": -1, \"18\": -1, \"19\": -1, \"name\": \"seat\"}}'),
(45, '2023-04-02', '13:58:00', 'cse102', '{\"name\": \"room\", \"s-15\": {\"0\": 1, \"1\": 2, \"name\": \"seat\"}, \"s-20\": {\"0\": 3, \"1\": 20, \"2\": -1, \"3\": -1, \"4\": -1, \"5\": -1, \"6\": -1, \"7\": -1, \"8\": -1, \"9\": -1, \"10\": -1, \"11\": -1, \"12\": -1, \"13\": -1, \"14\": -1, \"15\": -1, \"16\": -1, \"17\": -1, \"18\": -1, \"19\": -1, \"20\": -1, \"21\": -1, \"22\": -1, \"23\": -1, \"name\": \"seat\"}}'),
(46, '2023-04-01', '19:00:00', 'cse102', '{\"name\": \"room\", \"s-19\": {\"0\": 1, \"1\": 2, \"2\": 3, \"3\": 20, \"4\": -1, \"5\": -1, \"6\": -1, \"7\": -1, \"8\": -1, \"9\": -1, \"10\": -1, \"11\": -1, \"12\": -1, \"13\": -1, \"14\": -1, \"15\": -1, \"16\": -1, \"17\": -1, \"18\": -1, \"19\": -1, \"20\": -1, \"21\": -1, \"22\": -1, \"23\": -1, \"24\": -1, \"25\": -1, \"26\": -1, \"27\": -1, \"28\": -1, \"29\": -1, \"30\": -1, \"31\": -1, \"32\": -1, \"33\": -1, \"34\": -1, \"35\": -1, \"36\": -1, \"37\": -1, \"38\": -1, \"39\": -1, \"40\": -1, \"41\": -1, \"42\": -1, \"43\": -1, \"44\": -1, \"45\": -1, \"46\": -1, \"47\": -1, \"48\": -1, \"49\": -1, \"50\": -1, \"51\": -1, \"52\": -1, \"53\": -1, \"54\": -1, \"55\": -1, \"56\": -1, \"57\": -1, \"58\": -1, \"59\": -1, \"60\": -1, \"61\": -1, \"62\": -1, \"63\": -1, \"64\": -1, \"65\": -1, \"66\": -1, \"67\": -1, \"68\": -1, \"69\": -1, \"70\": -1, \"71\": -1, \"72\": -1, \"73\": -1, \"74\": -1, \"75\": -1, \"76\": -1, \"77\": -1, \"78\": -1, \"79\": -1, \"80\": -1, \"81\": -1, \"82\": -1, \"83\": -1, \"84\": -1, \"85\": -1, \"86\": -1, \"87\": -1, \"88\": -1, \"89\": -1, \"90\": -1, \"91\": -1, \"92\": -1, \"93\": -1, \"94\": -1, \"95\": -1, \"96\": -1, \"97\": -1, \"98\": -1, \"99\": -1, \"100\": -1, \"101\": -1, \"102\": -1, \"103\": -1, \"104\": -1, \"105\": -1, \"106\": -1, \"107\": -1, \"108\": -1, \"109\": -1, \"110\": -1, \"111\": -1, \"112\": -1, \"113\": -1, \"114\": -1, \"115\": -1, \"116\": -1, \"117\": -1, \"118\": -1, \"119\": -1, \"120\": -1, \"121\": -1, \"122\": -1, \"123\": -1, \"124\": -1, \"125\": -1, \"126\": -1, \"127\": -1, \"128\": -1, \"129\": -1, \"130\": -1, \"131\": -1, \"132\": -1, \"133\": -1, \"134\": -1, \"135\": -1, \"136\": -1, \"137\": -1, \"138\": -1, \"139\": -1, \"140\": -1, \"141\": -1, \"142\": -1, \"143\": -1, \"144\": -1, \"145\": -1, \"146\": -1, \"147\": -1, \"148\": -1, \"149\": -1, \"150\": -1, \"151\": -1, \"152\": -1, \"153\": -1, \"154\": -1, \"155\": -1, \"156\": -1, \"157\": -1, \"158\": -1, \"159\": -1, \"160\": -1, \"161\": -1, \"162\": -1, \"163\": -1, \"164\": -1, \"165\": -1, \"166\": -1, \"167\": -1, \"168\": -1, \"169\": -1, \"170\": -1, \"171\": -1, \"172\": -1, \"173\": -1, \"174\": -1, \"175\": -1, \"176\": -1, \"177\": -1, \"178\": -1, \"179\": -1, \"180\": -1, \"181\": -1, \"182\": -1, \"183\": -1, \"184\": -1, \"185\": -1, \"186\": -1, \"187\": -1, \"188\": -1, \"189\": -1, \"190\": -1, \"191\": -1, \"192\": -1, \"193\": -1, \"194\": -1, \"195\": -1, \"196\": -1, \"197\": -1, \"198\": -1, \"199\": -1, \"name\": \"seat\"}}'),
(47, '2023-04-13', '18:18:00', 'cse102', '{\"name\": \"room\", \"s-19\": {\"0\": 1, \"1\": 2, \"2\": 3, \"3\": 20, \"4\": -1, \"5\": -1, \"6\": -1, \"7\": -1, \"8\": -1, \"9\": -1, \"10\": -1, \"11\": -1, \"12\": -1, \"13\": -1, \"14\": -1, \"15\": -1, \"16\": -1, \"17\": -1, \"18\": -1, \"19\": -1, \"20\": -1, \"21\": -1, \"22\": -1, \"23\": -1, \"24\": -1, \"25\": -1, \"26\": -1, \"27\": -1, \"28\": -1, \"29\": -1, \"30\": -1, \"31\": -1, \"32\": -1, \"33\": -1, \"34\": -1, \"35\": -1, \"36\": -1, \"37\": -1, \"38\": -1, \"39\": -1, \"40\": -1, \"41\": -1, \"42\": -1, \"43\": -1, \"44\": -1, \"45\": -1, \"46\": -1, \"47\": -1, \"48\": -1, \"49\": -1, \"50\": -1, \"51\": -1, \"52\": -1, \"53\": -1, \"54\": -1, \"55\": -1, \"56\": -1, \"57\": -1, \"58\": -1, \"59\": -1, \"60\": -1, \"61\": -1, \"62\": -1, \"63\": -1, \"64\": -1, \"65\": -1, \"66\": -1, \"67\": -1, \"68\": -1, \"69\": -1, \"70\": -1, \"71\": -1, \"72\": -1, \"73\": -1, \"74\": -1, \"75\": -1, \"76\": -1, \"77\": -1, \"78\": -1, \"79\": -1, \"80\": -1, \"81\": -1, \"82\": -1, \"83\": -1, \"84\": -1, \"85\": -1, \"86\": -1, \"87\": -1, \"88\": -1, \"89\": -1, \"90\": -1, \"91\": -1, \"92\": -1, \"93\": -1, \"94\": -1, \"95\": -1, \"96\": -1, \"97\": -1, \"98\": -1, \"99\": -1, \"100\": -1, \"101\": -1, \"102\": -1, \"103\": -1, \"104\": -1, \"105\": -1, \"106\": -1, \"107\": -1, \"108\": -1, \"109\": -1, \"110\": -1, \"111\": -1, \"112\": -1, \"113\": -1, \"114\": -1, \"115\": -1, \"116\": -1, \"117\": -1, \"118\": -1, \"119\": -1, \"120\": -1, \"121\": -1, \"122\": -1, \"123\": -1, \"124\": -1, \"125\": -1, \"126\": -1, \"127\": -1, \"128\": -1, \"129\": -1, \"130\": -1, \"131\": -1, \"132\": -1, \"133\": -1, \"134\": -1, \"135\": -1, \"136\": -1, \"137\": -1, \"138\": -1, \"139\": -1, \"140\": -1, \"141\": -1, \"142\": -1, \"143\": -1, \"144\": -1, \"145\": -1, \"146\": -1, \"147\": -1, \"148\": -1, \"149\": -1, \"150\": -1, \"151\": -1, \"152\": -1, \"153\": -1, \"154\": -1, \"155\": -1, \"156\": -1, \"157\": -1, \"158\": -1, \"159\": -1, \"160\": -1, \"161\": -1, \"162\": -1, \"163\": -1, \"164\": -1, \"165\": -1, \"166\": -1, \"167\": -1, \"168\": -1, \"169\": -1, \"170\": -1, \"171\": -1, \"172\": -1, \"173\": -1, \"174\": -1, \"175\": -1, \"176\": -1, \"177\": -1, \"178\": -1, \"179\": -1, \"180\": -1, \"181\": -1, \"182\": -1, \"183\": -1, \"184\": -1, \"185\": -1, \"186\": -1, \"187\": -1, \"188\": -1, \"189\": -1, \"190\": -1, \"191\": -1, \"192\": -1, \"193\": -1, \"194\": -1, \"195\": -1, \"196\": -1, \"197\": -1, \"198\": -1, \"199\": -1, \"name\": \"seat\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomid` varchar(500) NOT NULL,
  `columncount` int NOT NULL,
  `capacity` int NOT NULL
) ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomid`, `columncount`, `capacity`) VALUES
('l-10', 1, 1),
('s-112', 5, 20),
('s-15', 2, 2),
('s-19', 10, 200),
('s-20', 4, 24);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL
) ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `name`, `password`) VALUES
(1, 'zahid', 's1'),
(2, 'hasan', 's2'),
(3, 'sahin', 's3'),
(5, 'sdf', 'r'),
(20, 'zahid hasan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherid` int NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL
) ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherid`, `name`, `password`) VALUES
(1, 'teacher', 't');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceid`),
  ADD KEY `examid` (`examid`),
  ADD KEY `roomid` (`roomid`);

--
-- Indexes for table `avaiableseat`
--
ALTER TABLE `avaiableseat`
  ADD PRIMARY KEY (`avaiableseatid`),
  ADD KEY `room` (`room`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`enrollid`),
  ADD KEY `courseid` (`courseid`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`examid`),
  ADD KEY `course` (`course`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendanceid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `avaiableseat`
--
ALTER TABLE `avaiableseat`
  MODIFY `avaiableseatid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enrollid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `examid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`examid`) REFERENCES `exam` (`examid`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`roomid`) REFERENCES `room` (`roomid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `avaiableseat`
--
ALTER TABLE `avaiableseat`
  ADD CONSTRAINT `avaiableseat_ibfk_1` FOREIGN KEY (`room`) REFERENCES `room` (`roomid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`course`) REFERENCES `course` (`courseid`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
