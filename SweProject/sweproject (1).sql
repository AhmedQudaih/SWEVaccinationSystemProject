-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2019 at 07:58 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sweproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `VaccinationId` int(11) NOT NULL,
  `PatientSSN` int(11) NOT NULL,
  `AppDate` date DEFAULT NULL,
  PRIMARY KEY (`VaccinationId`,`PatientSSN`),
  KEY `VaccinationId` (`VaccinationId`),
  KEY `PatientSSN-PatientSSN` (`PatientSSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`VaccinationId`, `PatientSSN`, `AppDate`) VALUES
(1, 1212, '2019-12-12'),
(1, 123456, '2019-12-19'),
(2, 789789, '2020-01-11'),
(3, 112233, '2020-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `doses`
--

DROP TABLE IF EXISTS `doses`;
CREATE TABLE IF NOT EXISTS `doses` (
  `VaccinationId` int(11) NOT NULL,
  `Vaccination type` varchar(70) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`VaccinationId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doses`
--

INSERT INTO `doses` (`VaccinationId`, `Vaccination type`, `Price`) VALUES
(1, 'Hep B 2nd dose', 100),
(2, 'DTP-Polio (Diphtheria, Tetanus, Pertussis-Polio) 1st dose', 150),
(3, 'DTP-Polio 2nd dose', 200),
(4, 'DTP-Polio 3rd dose', 250),
(5, 'Hep B 3rd dose', 300),
(6, 'MMR (Measles, Mumps, Rubella) 1st dose', 350),
(7, 'DTP-Polio 1st booster', 400);

-- --------------------------------------------------------

--
-- Table structure for table `finishedcases`
--

DROP TABLE IF EXISTS `finishedcases`;
CREATE TABLE IF NOT EXISTS `finishedcases` (
  `VaccinationId` int(11) NOT NULL,
  `PatientSSN` int(11) NOT NULL,
  PRIMARY KEY (`VaccinationId`,`PatientSSN`),
  KEY `PatientSSN-Finished` (`PatientSSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finishedcases`
--

INSERT INTO `finishedcases` (`VaccinationId`, `PatientSSN`) VALUES
(1, 112233),
(2, 112233),
(1, 789789);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `LinkId` int(11) NOT NULL,
  `LinkName` varchar(50) NOT NULL,
  `URL` varchar(50) NOT NULL,
  PRIMARY KEY (`LinkId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`LinkId`, `LinkName`, `URL`) VALUES
(0, 'Home', 'Home.php'),
(1, 'Invoice', 'Invoice.php'),
(2, 'Today Appointments', 'NurseAppointment.php'),
(3, 'My Appointments', 'PatientAppointment.php'),
(4, 'ReInvoice', 'ReInvoice.php'),
(5, 'Registration', 'Registration.php'),
(6, 'Edit Question', 'commonQues.php'),
(7, 'Financial Report', 'financialReport.php'),
(8, 'Finished Cases Report', 'finneshedcasesreport.php'),
(9, 'Login', 'login.php'),
(10, 'LogOut', 'LogOut.php');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `PatientSSN` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `E-mail` varchar(50) NOT NULL,
  `BabyName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  PRIMARY KEY (`PatientSSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PatientSSN`, `Name`, `E-mail`, `BabyName`, `Password`, `BirthDate`) VALUES
(1212, 'testdad', 'test@t', 'test1', '1212', '2019-10-11'),
(112233, 'ali', 'ali@gmail.com', 'mazen', '112233', '2019-10-11'),
(123456, 'ahmed', 'ayman@gm', 'ahmed', '123456', '2019-11-20'),
(789789, 'youssef', 'youssef@gmail.com', 'ramii', '789789', '2019-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `QuestionsId` int(11) NOT NULL AUTO_INCREMENT,
  `CommonQuestions` varchar(200) NOT NULL,
  PRIMARY KEY (`QuestionsId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `StaffId` int(11) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Salary` double NOT NULL,
  `Name` varchar(50) NOT NULL,
  `E-mail` varchar(50) NOT NULL,
  PRIMARY KEY (`StaffId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffId`, `Password`, `Salary`, `Name`, `E-mail`) VALUES
(101, '123', 1000, 'Ali', 'Ali@gmail.com'),
(102, '456', 1500, 'Sami', 'Sami@gmail.com'),
(103, '789', 800, 'Marya', 'Marya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `typelinks`
--

DROP TABLE IF EXISTS `typelinks`;
CREATE TABLE IF NOT EXISTS `typelinks` (
  `TypeLinkId` int(11) NOT NULL AUTO_INCREMENT,
  `LinkId` int(11) NOT NULL,
  `TypeId` int(11) NOT NULL,
  PRIMARY KEY (`TypeLinkId`),
  KEY `LinkId` (`LinkId`),
  KEY `TypeId` (`TypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typelinks`
--

INSERT INTO `typelinks` (`TypeLinkId`, `LinkId`, `TypeId`) VALUES
(8, 0, 1),
(9, 0, 2),
(10, 0, 3),
(11, 0, 0),
(12, 1, 3),
(13, 2, 2),
(14, 3, 0),
(15, 4, 3),
(17, 5, 2),
(18, 6, 1),
(19, 7, 1),
(20, 7, 3),
(21, 8, 2),
(22, 8, 1),
(23, 10, 0),
(24, 10, 1),
(25, 10, 2),
(26, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL,
  `TypeID` int(11) NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `TypeID` (`TypeID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `TypeID`) VALUES
(101, 1),
(103, 2),
(102, 3);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `TypeId` int(11) NOT NULL,
  `TypeName` varchar(50) NOT NULL,
  KEY `UserId` (`TypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`TypeId`, `TypeName`) VALUES
(0, 'Patient'),
(1, 'Doctor'),
(2, 'Nurse'),
(3, 'Finantial Employee');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `PatientSSN-PatientSSN` FOREIGN KEY (`PatientSSN`) REFERENCES `patient` (`PatientSSN`),
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`VaccinationId`) REFERENCES `doses` (`VaccinationId`);

--
-- Constraints for table `finishedcases`
--
ALTER TABLE `finishedcases`
  ADD CONSTRAINT `PatientSSN-Finished` FOREIGN KEY (`PatientSSN`) REFERENCES `patient` (`PatientSSN`);

--
-- Constraints for table `typelinks`
--
ALTER TABLE `typelinks`
  ADD CONSTRAINT `user_typelinke1` FOREIGN KEY (`LinkId`) REFERENCES `links` (`LinkId`),
  ADD CONSTRAINT `user_typelinke2` FOREIGN KEY (`TypeId`) REFERENCES `usertype` (`TypeId`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `staff` (`StaffId`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`TypeID`) REFERENCES `usertype` (`TypeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
