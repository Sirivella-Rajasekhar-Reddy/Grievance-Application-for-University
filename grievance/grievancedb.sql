-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 12:14 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grievancedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `dept` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pwd`, `dept`) VALUES
('dap', 'jntua_dap', 'Academics & planning'),
('daa', 'jntua_daa', 'Academic Audit'),
('da', 'jntua_da', 'Admissions'),
('de', 'jntua_de', 'Examination Branch'),
('drd', 'jntua_drd', 'Research & Development'),
('dirp', 'jntua_dirp', 'Industrial Relations & Placements(IRP)'),
('dics', 'jntua_dics', 'Industrial Consultancy Services(ICS)'),
('dfaam', 'jntua_dfaam', 'Foreign Affairs & Alumni Matters'),
('dfd', 'jntua_dfd', 'Faculty Development'),
('diqac', 'jntua_diqac', 'Internal Quality Assurance Cell (IQAC)'),
('dsr', 'jntua_dsr', 'Sponsored Research'),
('dwec', 'jntua_dwec', 'Women Empowerment Cell (WEC)'),
('dotpri', 'jntua_dotpri', 'Oil technology & Pharmaceutical  Research institution (OTPRI)'),
('vc', 'jntua_vc', ''),
('rector', 'jntua_rector', ''),
('registrar', 'jntua_registrar', '');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `username` varchar(100) NOT NULL,
  `gender` varchar(44) NOT NULL,
  `dept` varchar(200) NOT NULL,
  `complaint` varchar(500) NOT NULL,
  `raisedon` varchar(50) NOT NULL,
  `lastmodified` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `complaintid` varchar(50) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `slno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`username`, `gender`, `dept`, `complaint`, `raisedon`, `lastmodified`, `status`, `complaintid`, `remarks`, `month`, `year`, `slno`) VALUES
('test', 'male', 'Industrial Consultancy Services(ICS)', 'This is a test', '26-10-2022 09:24:31', '2022-10-26 07:24:31', 'new', 'grievance00007', 'complaint remarks', 10, 2022, 7),
('test', 'male', 'Academics & planning', 'This is a test 2', '26-10-2022 13:29:38', '2022-10-26 11:29:38', 'processing', 'grievance00008', 'complaint remarks 2', 10, 2022, 8),
('test', 'male', 'Academic Audit', 'test', '29-10-2022 11:46:28', '2022-10-29 09:46:28', 'rejected', 'grievance00009', 'test', 10, 2022, 9),
('test', 'male', 'Admissions', 'test', '29-10-2022 11:46:33', '2022-10-29 09:46:33', 'new', 'grievance00010', '', 10, 2022, 10),
('test', 'male', 'Examination Branch', 'test', '29-10-2022 11:46:38', '2022-10-29 09:46:38', 'new', 'grievance00011', '', 10, 2022, 11),
('test', 'male', 'Research & Development', 'test', '29-10-2022 11:46:44', '2022-10-29 09:46:44', 'new', 'grievance00012', '', 10, 2022, 12),
('test', 'male', 'Industrial Relations & Placements(IRP)', 'test', '29-10-2022 11:46:52', '2022-10-29 09:46:52', 'new', 'grievance00013', '', 10, 2022, 13),
('test', 'male', 'Foreign Affairs & Alumni Matters', 'test', '29-10-2022 11:46:57', '2022-10-29 09:46:57', 'new', 'grievance00014', '', 10, 2022, 14),
('test', 'male', 'Foreign Affairs & Alumni Matters', 'test', '29-10-2022 11:47:08', '2022-10-29 09:47:08', 'new', 'grievance00015', '', 10, 2022, 15),
('test', 'male', 'Faculty Development', 'test', '29-10-2022 11:47:15', '2022-10-29 09:47:15', 'new', 'grievance00016', '', 10, 2022, 16),
('test', 'male', 'Internal Quality Assurance Cell (IQAC)', 'test', '29-10-2022 11:47:21', '2022-10-29 09:47:21', 'new', 'grievance00017', '', 10, 2022, 17),
('test', 'male', 'Sponsored Research', 'test', '29-10-2022 11:47:26', '2022-10-29 09:47:26', 'new', 'grievance00018', '', 10, 2022, 18),
('test', 'male', 'Women Empowerment Cell (WEC)', 'test', '29-10-2022 11:47:31', '2022-10-29 09:47:31', 'new', 'grievance00019', '', 10, 2022, 19),
('test', 'male', 'Oil technology & Pharmaceutical  Research institution (OTPRI)', 'test', '29-10-2022 11:47:38', '2022-10-29 09:47:38', 'new', 'grievance00020', '', 10, 2022, 20);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `username` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `college` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phnum` varchar(15) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`username`, `role`, `gender`, `college`, `email`, `phnum`, `pwd`) VALUES
('raju', 'student', 'male', 'Sri Chaitanya Institute of Engineering and Technology', 'sirivellarajasekhar570@gmail.com', '1234567891', 'RAJU'),
('test', 'parent', 'female', 'Balaji College of Pharmacy', 'imitiaz@gmail.com', '1234512345', 'test'),
('test1', 'student', 'male', '0-JNTUA College Of Engineering(Autonomous)-JNTUACEA  Ananthapuramu District  Pincode:515 002', 'test@tes.comn', '131313414', 'rrrr'),
('vc', 'staff', 'male', '2K-Bheema Institute of Technology & Science -Alur Road  Adoni (M)  Kurnool District  Pincode:518 301', 'sirivellarajasekhar570@gmail.com', '2345694545', 'tezs'),
('test', 'student', 'male', '2F-Akshaya Bharathi Institute of Technology -R S Nagar, Siddavatam (P&M)  Kadapa  Y S R District  Pincode:516 237', 'sirivellarajasekhar570@gmail.com', '234567890', 'qwerty'),
('19001A0070', 'student', 'male', '0-JNTUA College Of Engineering(Autonomous)-JNTUACEA  Ananthapuramu District  Pincode:515 002', 'gopal@gmail.com', '7894561237', '12345678a'),
('17002205', 'student', 'male', '9-Rajeev Gandhi Memorial College of Engineering -NH - 18  Nandyal  Ananthapuramu District  Pincode:518 501', 'acer@gmail.com', '456456789', '5678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
