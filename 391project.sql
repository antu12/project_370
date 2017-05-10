-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2015 at 08:40 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `391project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admitted_patient`
--

CREATE TABLE IF NOT EXISTS `admitted_patient` (
  `idAdmitted_Patient` varchar(10) NOT NULL,
  `Ad_Date` date DEFAULT NULL,
  `Rel_Date` date DEFAULT NULL,
  `Word_No` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admitted_patient`
--

INSERT INTO `admitted_patient` (`idAdmitted_Patient`, `Ad_Date`, `Rel_Date`, `Word_No`) VALUES
('PID-001', '2015-01-01', NULL, 'UB400'),
('PID-002', '2015-02-10', NULL, 'UB500'),
('PID-003', '2015-01-01', NULL, 'UB400'),
('PID-004', '2015-01-01', NULL, 'UB600'),
('PID-005', '2015-08-05', NULL, 'UB500'),
('PID-007', '2015-08-07', NULL, 'UB300');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `year` year(4) NOT NULL,
  `Doctors` int(11) DEFAULT NULL,
  `Medicine` int(11) DEFAULT NULL,
  `Diagonosis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`year`, `Doctors`, `Medicine`, `Diagonosis`) VALUES
(2014, 3500000, 2000000, 1000000),
(2015, 3000000, 2500000, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE IF NOT EXISTS `cost` (
  `year` year(4) NOT NULL,
  `Salary` int(11) DEFAULT NULL,
  `Utility` int(11) DEFAULT NULL,
  `Equipment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=big5 COLLATE=big5_bin;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`year`, `Salary`, `Utility`, `Equipment`) VALUES
(2014, 3000000, 2500000, 10000000),
(2015, 3500000, 2000000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `DID` int(11) NOT NULL,
  `Dept_Name` varchar(45) NOT NULL,
  `Floor` varchar(45) NOT NULL,
  `Cost` varchar(45) DEFAULT NULL,
  `Budget` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DID`, `Dept_Name`, `Floor`, `Cost`, `Budget`) VALUES
(100, 'Admin', 'F-06', '1900000', '200000'),
(101, 'Psycology', 'F-02', '200000', '250000'),
(102, 'Nurology', 'F-03', '400000', '440000'),
(103, 'Cardiology', 'F-05', '300000', '350000'),
(104, 'Gynocology', 'F-04', '150000', '180000');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `idDoctor` varchar(10) NOT NULL,
  `RoomNum` varchar(45) NOT NULL,
  `Specialization` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`idDoctor`, `RoomNum`, `Specialization`) VALUES
('DOC-001', 'UB50302', 101),
('DOC-002', 'UB50303', 102),
('DOC-003', 'UB50301', 103),
('DOC-004', 'UB50304', 104),
('DOC-011', 'UB50306', 101);

-- --------------------------------------------------------

--
-- Table structure for table `emadmin`
--

CREATE TABLE IF NOT EXISTS `emadmin` (
  `EmAdminId` varchar(10) NOT NULL,
  `Position` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emadmin`
--

INSERT INTO `emadmin` (`EmAdminId`, `Position`) VALUES
('ADM-005', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `EID` varchar(10) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Degree` varchar(45) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PhoneNo` varchar(45) DEFAULT NULL,
  `Salary` varchar(45) DEFAULT '0',
  `Gender` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EID`, `Name`, `Password`, `Degree`, `Address`, `PhoneNo`, `Salary`, `Gender`) VALUES
('ADM-005', 'Koushik', 'koushik', 'BSC', 'Motijheel, Dhaka', '01521204418', '600000', 'M'),
('DOC-001', 'Arshad Hossain', 'arshad', 'FRCS', 'Dhanmondi, Dhaka', '01521207556', '80000', 'M'),
('DOC-002', 'Tasnia Ashrafi Heya', 'heya', 'FRCS', 'Bannani, Dhaka', '01675388857', '70000', 'F'),
('DOC-003', 'Akifa Tasneem', 'tarmi', 'FRCS', 'Mirpur, Dhaka', '01926837255', '75000', 'F'),
('DOC-004', 'Saif Reza Oni', 'reza', 'FRCS', 'Mirpur, Dhaka', '01521202340', '60000', 'M'),
('DOC-011', 'Md. Nahid Hasan Himel', 'hime', 'FRCS', 'Gazipur, Dhaka', '01942961808l', '50000', 'M'),
('NUR-007', 'Biprojit Roy', 'kola', 'FRCS', 'Badda, Dhaka', '01676128942', '700000', 'M'),
('NUR-008', 'Geetanjali Oishe', 'oishe', 'FRCS', 'Uttara, Dhaka', '015210244087', '900000', 'F'),
('OTH-006', 'Rafid Ahmed', 'rafid', 'FRCS', 'Banoshree, Dhaka', '01521204418', '500000', 'M'),
('OTH-012', 'Mashrur Utsas', 'utsas', 'FRCS', 'Mohakhali, Dhaka', '018429618097', '890000', 'M'),
('REP-009', 'Erfan Arefin', 'erfan', 'FRCS', 'Mohammudpur, Dhaka', '01768954098', '800000', 'M'),
('REP-010', 'Tuni', 'tuni', 'FRCS', 'Gulshan, Dhaka', '01364028392', '850000', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `medical_dept`
--

CREATE TABLE IF NOT EXISTS `medical_dept` (
  `idMedical_Dept` int(11) NOT NULL,
  `Income` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_dept`
--

INSERT INTO `medical_dept` (`idMedical_Dept`, `Income`) VALUES
(101, '5000000'),
(102, '6000000'),
(103, '7000000'),
(104, '3000000');

-- --------------------------------------------------------

--
-- Table structure for table `non_admitted`
--

CREATE TABLE IF NOT EXISTS `non_admitted` (
  `idNon_Admitted` varchar(10) NOT NULL,
  `visit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `non_admitted`
--

INSERT INTO `non_admitted` (`idNon_Admitted`, `visit_date`) VALUES
('PID-004', '2015-06-01'),
('PID-006', '2015-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE IF NOT EXISTS `nurse` (
  `idNurse` varchar(10) NOT NULL,
  `Floor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`idNurse`, `Floor`) VALUES
('NUR-007', 'F-02'),
('NUR-008', 'F-05');

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE IF NOT EXISTS `others` (
  `idOthers` varchar(10) NOT NULL,
  `Job_Catagory` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`idOthers`, `Job_Catagory`) VALUES
('OTH-006', 'Cleaner'),
('OTH-012', 'Cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `pageinfo`
--

CREATE TABLE IF NOT EXISTS `pageinfo` (
  `type` varchar(20) DEFAULT NULL,
  `pageLocation` varchar(255) DEFAULT NULL,
  `pageInfocol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pageinfo`
--

INSERT INTO `pageinfo` (`type`, `pageLocation`, `pageInfocol`) VALUES
('ADM', 'admin/index.php', 1),
('DOC', 'doc/index.php', 2),
('REP', 'receip/index.php', 3),
('NUR', 'nurse/index.php', 4);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `PID` varchar(10) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Sex` varchar(45) DEFAULT NULL,
  `Disease` varchar(45) DEFAULT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  `idServedRecep` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PID`, `Name`, `Sex`, `Disease`, `Phone`, `idServedRecep`) VALUES
('PID-001', 'Rivu', 'M', 'Dengue', '01676128942', 'REP-010'),
('PID-002', 'Tasnia', 'F', 'Fever', '01676128942', 'REP-009'),
('PID-003', 'Ashrafi', 'F', 'Dicentry', '01676128942', 'REP-009'),
('PID-004', 'Antu', 'M', 'Dicentry', '01676128942', 'REP-010'),
('PID-005', 'Abdul', 'M', 'Head Injury', '0152125952', 'REP-010'),
('PID-006', 'Asif', 'M', 'Back Pain', '22257359', 'REP-010'),
('PID-007', 'Orin', 'F', 'Insomnia', '012355786', 'REP-009');

-- --------------------------------------------------------

--
-- Table structure for table `reciptionist`
--

CREATE TABLE IF NOT EXISTS `reciptionist` (
  `idReciptionist` varchar(10) NOT NULL,
  `Computer_Skills` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reciptionist`
--

INSERT INTO `reciptionist` (`idReciptionist`, `Computer_Skills`) VALUES
('REP-009', 1),
('REP-010', 1);

-- --------------------------------------------------------

--
-- Table structure for table `serves`
--

CREATE TABLE IF NOT EXISTS `serves` (
  `idServes` int(11) NOT NULL DEFAULT '0',
  `Serves_P` varchar(10) NOT NULL,
  `Serves_N` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serves`
--

INSERT INTO `serves` (`idServes`, `Serves_P`, `Serves_N`) VALUES
(1, 'PID-001', 'NUR-007'),
(2, 'PID-002', 'NUR-007'),
(3, 'PID-003', 'NUR-008'),
(4, 'PID-004', 'NUR-008'),
(5, 'PID-005', 'NUR-008'),
(6, 'PID-007', 'NUR-007');

-- --------------------------------------------------------

--
-- Table structure for table `sharefiles`
--

CREATE TABLE IF NOT EXISTS `sharefiles` (
  `file` int(11) NOT NULL,
  `location` varchar(45) DEFAULT NULL,
  `doc` varchar(45) DEFAULT NULL,
  `nur` varchar(45) DEFAULT NULL,
  `pat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sharefiles`
--

INSERT INTO `sharefiles` (`file`, `location`, `doc`, `nur`, `pat`) VALUES
(10, '../upload/236021prescription.jpg', 'DOC-001', 'NUR-008', 'PID-005');

-- --------------------------------------------------------

--
-- Table structure for table `treats`
--

CREATE TABLE IF NOT EXISTS `treats` (
  `idTreats` int(11) NOT NULL,
  `T_DOCID` varchar(10) NOT NULL,
  `T_Patient` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treats`
--

INSERT INTO `treats` (`idTreats`, `T_DOCID`, `T_Patient`) VALUES
(1, 'DOC-001', 'PID-001'),
(2, 'DOC-002', 'PID-002'),
(3, 'DOC-003', 'PID-003'),
(4, 'DOC-004', 'PID-004'),
(5, 'DOC-001', 'PID-005'),
(6, 'DOC-004', 'PID-007'),
(7, 'DOC-001', 'PID-006');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `First_Name` varchar(45) NOT NULL,
  `Last_Name` varchar(45) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gender` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `Password`, `First_Name`, `Last_Name`, `Email`, `Gender`) VALUES
(1, 'infamous2', 'Arshad', 'Hossain', 'arshad12@outlook.com', 1),
(2, 'cartoon1', 'Akifa', 'Tasneem', 'Akifa@gmail.com', 0),
(3, 'nopass01', 'Kousjik', 'Jay', 'kala@kj.com', 1),
(4, 'rezaoni12', 'Saif', 'Reza', 'reza@vai.com', 1),
(5, 'tasnia002', 'Tasnia', 'Heya', 'Heya@tasnia.com', 0),
(6, 'geetanjali', 'geetanjali', 'oishe', 'gitt@gmail.com', 0),
(7, 'kolakola', 'bipro', 'roy', 'bipro@roy.com', 1),
(8, 'nopassword01', 'kala', 'pagla', 'dhola@kala.com', 1),
(11, 'infamous3', 'Arshad', 'Hossain', 'arshad@outlook.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admitted_patient`
--
ALTER TABLE `admitted_patient`
  ADD PRIMARY KEY (`idAdmitted_Patient`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`year`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`year`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`idDoctor`), ADD KEY `dDept_idx` (`Specialization`);

--
-- Indexes for table `emadmin`
--
ALTER TABLE `emadmin`
  ADD PRIMARY KEY (`EmAdminId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EID`);

--
-- Indexes for table `medical_dept`
--
ALTER TABLE `medical_dept`
  ADD PRIMARY KEY (`idMedical_Dept`);

--
-- Indexes for table `non_admitted`
--
ALTER TABLE `non_admitted`
  ADD PRIMARY KEY (`idNon_Admitted`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`idNurse`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`idOthers`);

--
-- Indexes for table `pageinfo`
--
ALTER TABLE `pageinfo`
  ADD PRIMARY KEY (`pageInfocol`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PID`), ADD KEY `idServedReceptionist_idx` (`idServedRecep`);

--
-- Indexes for table `reciptionist`
--
ALTER TABLE `reciptionist`
  ADD PRIMARY KEY (`idReciptionist`);

--
-- Indexes for table `serves`
--
ALTER TABLE `serves`
  ADD PRIMARY KEY (`idServes`), ADD KEY `id_p_F_idx` (`Serves_P`), ADD KEY `id_N_F_idx` (`Serves_N`);

--
-- Indexes for table `sharefiles`
--
ALTER TABLE `sharefiles`
  ADD PRIMARY KEY (`file`), ADD UNIQUE KEY `file_UNIQUE` (`file`), ADD KEY `doc_idx` (`doc`), ADD KEY `nur_idx` (`nur`), ADD KEY `pat_idx` (`pat`);

--
-- Indexes for table `treats`
--
ALTER TABLE `treats`
  ADD PRIMARY KEY (`idTreats`), ADD KEY `Treat_IDD_idx` (`T_DOCID`), ADD KEY `Treat_IDP_idx` (`T_Patient`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`), ADD UNIQUE KEY `Email_UNIQUE` (`Email`), ADD UNIQUE KEY `users_UNIQUE` (`idusers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sharefiles`
--
ALTER TABLE `sharefiles`
  MODIFY `file` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `treats`
--
ALTER TABLE `treats`
  MODIFY `idTreats` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admitted_patient`
--
ALTER TABLE `admitted_patient`
ADD CONSTRAINT `idAdmitted_Patient` FOREIGN KEY (`idAdmitted_Patient`) REFERENCES `patient` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
ADD CONSTRAINT `dDept` FOREIGN KEY (`Specialization`) REFERENCES `department` (`DID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `idDoctor` FOREIGN KEY (`idDoctor`) REFERENCES `employee` (`EID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emadmin`
--
ALTER TABLE `emadmin`
ADD CONSTRAINT `EmAdmin` FOREIGN KEY (`EmAdminId`) REFERENCES `employee` (`EID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medical_dept`
--
ALTER TABLE `medical_dept`
ADD CONSTRAINT `idMedical_Dept` FOREIGN KEY (`idMedical_Dept`) REFERENCES `department` (`DID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `non_admitted`
--
ALTER TABLE `non_admitted`
ADD CONSTRAINT `idNon_Admitted` FOREIGN KEY (`idNon_Admitted`) REFERENCES `patient` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
ADD CONSTRAINT `idNurse` FOREIGN KEY (`idNurse`) REFERENCES `employee` (`EID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `others`
--
ALTER TABLE `others`
ADD CONSTRAINT `idOthers` FOREIGN KEY (`idOthers`) REFERENCES `employee` (`EID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
ADD CONSTRAINT `idServedReceptionist` FOREIGN KEY (`idServedRecep`) REFERENCES `reciptionist` (`idReciptionist`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reciptionist`
--
ALTER TABLE `reciptionist`
ADD CONSTRAINT `idReceptionist` FOREIGN KEY (`idReciptionist`) REFERENCES `employee` (`EID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `serves`
--
ALTER TABLE `serves`
ADD CONSTRAINT `id_N_F` FOREIGN KEY (`Serves_N`) REFERENCES `nurse` (`idNurse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `id_P_F` FOREIGN KEY (`Serves_P`) REFERENCES `patient` (`PID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sharefiles`
--
ALTER TABLE `sharefiles`
ADD CONSTRAINT `doc` FOREIGN KEY (`doc`) REFERENCES `doctor` (`idDoctor`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nur` FOREIGN KEY (`nur`) REFERENCES `nurse` (`idNurse`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pat` FOREIGN KEY (`pat`) REFERENCES `patient` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treats`
--
ALTER TABLE `treats`
ADD CONSTRAINT `Treat_IDD` FOREIGN KEY (`T_DOCID`) REFERENCES `doctor` (`idDoctor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `Treat_IDP` FOREIGN KEY (`T_Patient`) REFERENCES `patient` (`PID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
