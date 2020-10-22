-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2020 at 11:12 PM
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
-- Table structure for table `assignedtestcases`
--

CREATE TABLE `assignedtestcases` (
  `TcasesID` int(11) NOT NULL,
  `AssignmentsID` int(11) NOT NULL,
  `Checked` tinyint(1) NOT NULL,
  `successful` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignmentdetails`
--

CREATE TABLE `assignmentdetails` (
  `UserID` int(11) NOT NULL COMMENT 'Students ID',
  `CourseID` int(11) NOT NULL,
  `AssignmentID` int(11) NOT NULL,
  `BaadgeID` int(11) NOT NULL,
  `Grade` int(11) NOT NULL,
  `Submissiondate` date NOT NULL,
  `Modificationdate` date NOT NULL,
  `Filepath` varchar(3000) NOT NULL,
  `Feredback` text NOT NULL,
  `Badgereceivedflag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `AssignmentiD` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FeaturelistID` int(11) NOT NULL,
  `Assignmentname` varchar(255) NOT NULL,
  `Assignmentdesc.` mediumtext NOT NULL,
  `Startdate` date NOT NULL,
  `Cutoffdate` date NOT NULL,
  `Grade` int(11) NOT NULL,
  `NBofsubmissions` int(11) NOT NULL,
  `Timecreated` date NOT NULL,
  `timemodified` date NOT NULL,
  `Gradingtype` set('Automatic','Hybrid','Manual') NOT NULL,
  `Suspended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`AssignmentiD`, `UserID`, `FeaturelistID`, `Assignmentname`, `Assignmentdesc.`, `Startdate`, `Cutoffdate`, `Grade`, `NBofsubmissions`, `Timecreated`, `timemodified`, `Gradingtype`, `Suspended`) VALUES
(1, 2, 1, 'first assignment', 'use for loops', '2020-10-14', '2020-10-16', 5, 2, '2020-10-06', '2020-10-14', 'Automatic', 0);

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `BadgesID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BadgeName` varchar(255) NOT NULL,
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
  `Startdate` date NOT NULL,
  `Enddate` date NOT NULL,
  `Active` tinyint(1) NOT NULL,
  `Timeceated` date NOT NULL,
  `Timemodified` date NOT NULL,
  `Suspended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `UserID`, `Coursecode`, `Name`, `Description`, `Grade`, `Gradetopass`, `Startdate`, `Enddate`, `Active`, `Timeceated`, `Timemodified`, `Suspended`) VALUES
(1, 3, 'csc105', 'computer science 105', 'test', 100, 50, '2020-10-04', '2020-10-31', 1, '2020-09-01', '2020-10-14', 0);

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
(1, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `FeaturesID` int(11) NOT NULL,
  `Compiling` tinyint(1) NOT NULL,
  `Sytling` tinyint(1) NOT NULL,
  `Comments` tinyint(1) NOT NULL,
  `Indentations` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`FeaturesID`, `Compiling`, `Sytling`, `Comments`, `Indentations`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `featurescategory`
--

CREATE TABLE `featurescategory` (
  `FeaturescategoryID` int(11) NOT NULL,
  `featuresID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `suspended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `featurescategory`
--

INSERT INTO `featurescategory` (`FeaturescategoryID`, `featuresID`, `Name`, `Description`, `suspended`) VALUES
(1, 1, 'compiling', 'used for loop', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `CapabilitiiesID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `CapabilitiiesID`, `Name`, `Bio`) VALUES
(1, 1, 'student', 'student'),
(2, 2, 'instructor', 'instructor'),
(3, 3, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `studentsenrolled`
--

CREATE TABLE `studentsenrolled` (
  `UserID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `StduentGrade` int(11) NOT NULL,
  `Rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsenrolled`
--

INSERT INTO `studentsenrolled` (`UserID`, `CourseID`, `StduentGrade`, `Rank`) VALUES
(1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `testcases`
--

CREATE TABLE `testcases` (
  `TcasesID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Filepath` varchar(255) NOT NULL,
  `Suspended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Suspended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `RoleID`, `Username`, `Password`, `Email`, `Name`, `Age`, `Mobile`, `Title`, `Suspended`) VALUES
(1, 1, 'test', 'test', 'test@test.com', 'test', 20, 1017377002, 'student', 0),
(2, 2, 'instructor', 'test', 'testing@testing.com', 'instructor', 30, 129932002, 'instructor', 0),
(3, 3, 'admin', 'admin', 'admin@admin.com', 'admin', 40, 231299332, 'admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignedtestcases`
--
ALTER TABLE `assignedtestcases`
  ADD KEY `TcasesID` (`TcasesID`),
  ADD KEY `AssignmentsID` (`AssignmentsID`);

--
-- Indexes for table `assignmentdetails`
--
ALTER TABLE `assignmentdetails`
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `AssignmentID` (`AssignmentID`),
  ADD KEY `BaadgeID` (`BaadgeID`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`AssignmentiD`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `FeaturelistID` (`FeaturelistID`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`BadgesID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `capabilities`
--
ALTER TABLE `capabilities`
  ADD PRIMARY KEY (`CapabilitiesID`);

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
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`FeaturesID`);

--
-- Indexes for table `featurescategory`
--
ALTER TABLE `featurescategory`
  ADD PRIMARY KEY (`FeaturescategoryID`),
  ADD KEY `featuresID` (`featuresID`);

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
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `testcases`
--
ALTER TABLE `testcases`
  ADD PRIMARY KEY (`TcasesID`);

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
  MODIFY `AssignmentiD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `FeaturesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `featurescategory`
--
ALTER TABLE `featurescategory`
  MODIFY `FeaturescategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testcases`
--
ALTER TABLE `testcases`
  MODIFY `TcasesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignedtestcases`
--
ALTER TABLE `assignedtestcases`
  ADD CONSTRAINT `assignedtestcases_ibfk_1` FOREIGN KEY (`TcasesID`) REFERENCES `testcases` (`TcasesID`),
  ADD CONSTRAINT `assignedtestcases_ibfk_2` FOREIGN KEY (`AssignmentsID`) REFERENCES `assignments` (`AssignmentiD`);

--
-- Constraints for table `assignmentdetails`
--
ALTER TABLE `assignmentdetails`
  ADD CONSTRAINT `assignmentdetails_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `assignmentdetails_ibfk_2` FOREIGN KEY (`AssignmentID`) REFERENCES `assignments` (`AssignmentiD`),
  ADD CONSTRAINT `assignmentdetails_ibfk_3` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`),
  ADD CONSTRAINT `assignmentdetails_ibfk_4` FOREIGN KEY (`BaadgeID`) REFERENCES `badges` (`BadgesID`);

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`FeaturelistID`) REFERENCES `featurescategory` (`FeaturescategoryID`);

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
-- Constraints for table `featurescategory`
--
ALTER TABLE `featurescategory`
  ADD CONSTRAINT `featurescategory_ibfk_1` FOREIGN KEY (`featuresID`) REFERENCES `features` (`FeaturesID`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`CapabilitiiesID`) REFERENCES `capabilities` (`CapabilitiesID`);

--
-- Constraints for table `studentsenrolled`
--
ALTER TABLE `studentsenrolled`
  ADD CONSTRAINT `studentsenrolled_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `studentsenrolled_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
