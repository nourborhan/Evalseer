-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 07:21 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evalseer`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `AssignmentID` int(11) NOT NULL,
  `EducatorID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `GradingcriteriaID` int(11) DEFAULT NULL,
  `Assignmentname` varchar(255) NOT NULL,
  `Assignmentdesc.` mediumtext DEFAULT NULL,
  `Startdate` text NOT NULL,
  `Cutoffdate` text NOT NULL,
  `Grade` int(11) NOT NULL,
  `Numberofsubmissions` int(11) NOT NULL,
  `Timecreated` date DEFAULT NULL,
  `timemodified` date DEFAULT NULL,
  `Gradingtype` set('Automatic','Hybrid','Manual') NOT NULL,
  `Suspended` tinyint(1) NOT NULL,
  `Hidden` set('True','False') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`AssignmentID`, `EducatorID`, `CourseID`, `GradingcriteriaID`, `Assignmentname`, `Assignmentdesc.`, `Startdate`, `Cutoffdate`, `Grade`, `Numberofsubmissions`, `Timecreated`, `timemodified`, `Gradingtype`, `Suspended`, `Hidden`) VALUES
(1, 4, 1, 1, 'Prime Numbers', 'A prime number is a whole number greater than 1 whose only factors are 1 and itself.\r\nWrite a program in C++ to check whether a number is prime or not. \r\n\r\nSample Output:\r\nInput a number to check prime or not: 13\r\nThe entered number is a prime number.\r\n------------------------\r\nInput a number to check prime or not: 9\r\nThe entered number is not a prime number.', '2020-12-29', '2021-01-01', 10, 2, NULL, NULL, 'Automatic', 0, 'False');

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `BadgesID` int(11) NOT NULL,
  `CreatorID` int(11) NOT NULL,
  `Badgename` varchar(255) NOT NULL,
  `Badgedescription` mediumtext NOT NULL,
  `Imagepath` text NOT NULL,
  `Suspended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `capabilities`
--

CREATE TABLE `capabilities` (
  `CapabilitiesID` int(11) NOT NULL,
  `Viewcourses` tinyint(1) NOT NULL DEFAULT 0,
  `Enrollcourses` tinyint(1) NOT NULL DEFAULT 0,
  `Createcourses` tinyint(1) NOT NULL DEFAULT 0,
  `Updatecourses` tinyint(1) NOT NULL DEFAULT 0,
  `Activeornotcourses` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Flag to give power to activate or suspend courses',
  `Viewassignments` tinyint(1) NOT NULL DEFAULT 0,
  `Createassignments` tinyint(1) NOT NULL DEFAULT 0,
  `Reviewassignments` tinyint(1) NOT NULL DEFAULT 0,
  `UpdateAssignments` tinyint(1) NOT NULL DEFAULT 0,
  `CreateBadges` tinyint(1) NOT NULL DEFAULT 0,
  `UpdateBadges` tinyint(1) NOT NULL DEFAULT 0,
  `Assignbadges` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capabilities`
--

INSERT INTO `capabilities` (`CapabilitiesID`, `Viewcourses`, `Enrollcourses`, `Createcourses`, `Updatecourses`, `Activeornotcourses`, `Viewassignments`, `Createassignments`, `Reviewassignments`, `UpdateAssignments`, `CreateBadges`, `UpdateBadges`, `Assignbadges`) VALUES
(1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(2, 1, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 1),
(3, 1, 0, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `check_testcase`
--

CREATE TABLE `check_testcase` (
  `StudentID` int(11) NOT NULL,
  `TestcaseID` int(11) NOT NULL,
  `passed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Coursecode` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Grade` int(11) NOT NULL,
  `Gradetopass` int(11) NOT NULL,
  `Startdate` text DEFAULT NULL,
  `Enddate` text DEFAULT NULL,
  `Active` tinyint(1) NOT NULL,
  `Timeceated` date DEFAULT NULL,
  `Timemodified` date DEFAULT NULL,
  `Suspended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `UserID`, `Coursecode`, `Name`, `Description`, `Grade`, `Gradetopass`, `Startdate`, `Enddate`, `Active`, `Timeceated`, `Timemodified`, `Suspended`) VALUES
(1, 3, 'csc105', 'Computer Science 105', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non felis eu velit sollicitudin auctor ac non justo. Pellentesque arcu purus, consequat maximus urna sed, gravida congue nisi. Nunc congue laoreet consectetur. Fusce at massa id massa rutrum luctus. Aliquam ac diam congue, consequat libero quis, facilisis libero. Fusce non facilisis nisi. Vivamus rutrum varius dui, ac ornare tortor gravida varius. Phasellus pulvinar rutrum ullamcorper. Donec eu nunc magna. Sed rhoncus quam in odio consectetur, eu ullamcorper arcu rutrum. Cras quis diam maximus, ultricies dui quis, tristique orci. Ut auctor felis nec ipsum lacinia aliquam. Vivamus eget pretium erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed porttitor, ipsum non tincidunt consectetur, odio eros dignissim augue, id congue dolor urna sed enim. Nulla malesuada aliquet pretium.\r\n\r\nSed dictum vehicula ultrices. Pellentesque placerat sed felis sit amet porta. Aenean tristique, arcu ac malesuada sollicitudin, nulla metus varius tortor, et tristique quam odio ac tellus. Donec pellentesque blandit nunc sed lobortis. Nam id elit facilisis mauris tempor varius. Curabitur pellentesque volutpat mauris, vitae posuere sem luctus a. Aliquam posuere metus maximus ipsum vestibulum interdum. Donec congue vel augue sed placerat. Proin eu nibh eu ex pulvinar euismod. ', 100, 50, '2020-10-04', '2020-10-31', 1, '2020-09-01', '2020-10-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courseedducator`
--

CREATE TABLE `courseedducator` (
  `CourseID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL COMMENT 'Doctors id ',
  `Primaryeducatorflag` tinyint(1) NOT NULL,
  `Assistantflag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseedducator`
--

INSERT INTO `courseedducator` (`CourseID`, `UserID`, `Primaryeducatorflag`, `Assistantflag`) VALUES
(1, 2, 1, 0),
(1, 4, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gradingcriteria`
--

CREATE TABLE `gradingcriteria` (
  `FeaturesID` int(11) NOT NULL,
  `Compiling` tinyint(1) NOT NULL,
  `Compiling_weight` int(11) NOT NULL,
  `Sytling` tinyint(1) NOT NULL,
  `Styling_weight` int(11) NOT NULL,
  `Syntax` tinyint(1) NOT NULL,
  `Syntax_weight` int(11) NOT NULL,
  `Logic` tinyint(1) NOT NULL,
  `Logic_weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gradingcriteria`
--

INSERT INTO `gradingcriteria` (`FeaturesID`, `Compiling`, `Compiling_weight`, `Sytling`, `Styling_weight`, `Syntax`, `Syntax_weight`, `Logic`, `Logic_weight`) VALUES
(1, 1, 30, 1, 0, 1, 0, 1, 70);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `CapabilitiiesID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `CapabilitiiesID`, `Name`) VALUES
(1, 1, 'student'),
(2, 2, 'instructor'),
(3, 3, 'admin'),
(4, 2, 'TA');

-- --------------------------------------------------------

--
-- Table structure for table `studentsenrolled`
--

CREATE TABLE `studentsenrolled` (
  `StudentID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `StduentGrade` int(11) NOT NULL,
  `Rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsenrolled`
--

INSERT INTO `studentsenrolled` (`StudentID`, `CourseID`, `StduentGrade`, `Rank`) VALUES
(1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `UserID` int(11) NOT NULL COMMENT 'Students ID',
  `CourseID` int(11) NOT NULL,
  `AssignmentID` int(11) NOT NULL,
  `BaadgeID` int(11) DEFAULT NULL,
  `Grade` int(11) DEFAULT NULL,
  `Submissiondate` date DEFAULT NULL,
  `Modificationdate` date DEFAULT NULL,
  `Code_submitted` longtext DEFAULT NULL,
  `compile_feedback` longtext DEFAULT NULL,
  `style_feedback` longtext DEFAULT NULL,
  `Badgereceivedflag` tinyint(1) DEFAULT NULL,
  `Submittedflag` tinyint(4) NOT NULL DEFAULT 0,
  `Compiling_Grade` int(11) DEFAULT NULL,
  `Syntax_Grade` int(11) DEFAULT NULL,
  `Logic_Grade` int(11) DEFAULT NULL,
  `Style_Grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`SubmissionID`, `UserID`, `CourseID`, `AssignmentID`, `BaadgeID`, `Grade`, `Submissiondate`, `Modificationdate`, `Code_submitted`, `compile_feedback`, `style_feedback`, `Badgereceivedflag`, `Submittedflag`, `Compiling_Grade`, `Syntax_Grade`, `Logic_Grade`, `Style_Grade`, `logic_feedback`, `syntax_feedback`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_case`
--

CREATE TABLE `test_case` (
  `TcasesID` int(11) NOT NULL,
  `AssignmentsID` int(11) NOT NULL,
  `Input_variable` text NOT NULL,
  `Expected_output` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_case`
--

INSERT INTO `test_case` (`TcasesID`, `AssignmentsID`, `Input_variable`, `Expected_output`) VALUES
(1, 1, '7', 'The entered number is a prime number'),
(2, 1, '11', 'The entered number is a prime number'),
(3, 1, '9', 'The entered number is not a prime number'),
(4, 1, '6', 'The entered number is not a prime number');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `Mobile` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Rank` varchar(100) NOT NULL,
  `Bio` text NOT NULL,
  `Suspended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `RoleID`, `Username`, `Password`, `Email`, `Name`, `Age`, `Mobile`, `Title`, `Rank`, `Bio`, `Suspended`) VALUES
(1, 1, 'test', 'test', 'test@test.com', 'Marlon Brando', 20, 1017377002, 'student', '', '', 0),
(2, 2, 'instructor', 'test', 'testing@testing.com', 'Dr. Hannibal', 30, 129932002, 'instructor', '', '', 0),
(3, 3, 'admin', 'admin', 'admin@admin.com', 'Don Corleone', 40, 231299332, 'admin', '', '', 0),
(4, 4, 'ta', 'ta', 'mail@mail', 'Tom Hagen', 20, 1010203, 'Teaching Assistant', '', '', 0),
(5, 4, 'ta2', 'ta2', 'test@ta@test.com', 'Sonny Corleone', 30, 120, '', '', 'Test Bio', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`AssignmentID`),
  ADD KEY `UserID` (`EducatorID`),
  ADD KEY `FeaturelistID` (`GradingcriteriaID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`BadgesID`),
  ADD KEY `UserID` (`CreatorID`);

--
-- Indexes for table `capabilities`
--
ALTER TABLE `capabilities`
  ADD PRIMARY KEY (`CapabilitiesID`);

--
-- Indexes for table `check_testcase`
--
ALTER TABLE `check_testcase`
  ADD KEY `TestcaseID` (`TestcaseID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `courseedducator`
--
ALTER TABLE `courseedducator`
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `gradingcriteria`
--
ALTER TABLE `gradingcriteria`
  ADD PRIMARY KEY (`FeaturesID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`),
  ADD KEY `CapabilitiiesID` (`CapabilitiiesID`);

--
-- Indexes for table `studentsenrolled`
--
ALTER TABLE `studentsenrolled`
  ADD KEY `UserID` (`StudentID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `AssignmentID` (`AssignmentID`),
  ADD KEY `BaadgeID` (`BaadgeID`);

--
-- Indexes for table `test_case`
--
ALTER TABLE `test_case`
  ADD PRIMARY KEY (`TcasesID`),
  ADD KEY `AssignmentsID` (`AssignmentsID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `AssignmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `BadgesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `capabilities`
--
ALTER TABLE `capabilities`
  MODIFY `CapabilitiesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gradingcriteria`
--
ALTER TABLE `gradingcriteria`
  MODIFY `FeaturesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_case`
--
ALTER TABLE `test_case`
  MODIFY `TcasesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`GradingcriteriaID`) REFERENCES `gradingcriteria` (`FeaturesID`),
  ADD CONSTRAINT `assignments_ibfk_3` FOREIGN KEY (`EducatorID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `check_testcase`
--
ALTER TABLE `check_testcase`
  ADD CONSTRAINT `check_testcase_ibfk_1` FOREIGN KEY (`TestcaseID`) REFERENCES `test_case` (`TcasesID`),
  ADD CONSTRAINT `check_testcase_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `courseedducator`
--
ALTER TABLE `courseedducator`
  ADD CONSTRAINT `courseedducator_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`),
  ADD CONSTRAINT `courseedducator_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`CapabilitiiesID`) REFERENCES `capabilities` (`CapabilitiesID`);

--
-- Constraints for table `studentsenrolled`
--
ALTER TABLE `studentsenrolled`
  ADD CONSTRAINT `studentsenrolled_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`),
  ADD CONSTRAINT `studentsenrolled_ibfk_3` FOREIGN KEY (`StudentID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `submissions_ibfk_2` FOREIGN KEY (`AssignmentID`) REFERENCES `assignments` (`AssignmentID`),
  ADD CONSTRAINT `submissions_ibfk_3` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`),
  ADD CONSTRAINT `submissions_ibfk_4` FOREIGN KEY (`BaadgeID`) REFERENCES `badges` (`BadgesID`);

--
-- Constraints for table `test_case`
--
ALTER TABLE `test_case`
  ADD CONSTRAINT `test_case_ibfk_2` FOREIGN KEY (`AssignmentsID`) REFERENCES `assignments` (`AssignmentID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
