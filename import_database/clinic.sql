-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2019 at 10:48 AM
-- Server version: 5.6.12
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clinic`
--
CREATE DATABASE IF NOT EXISTS `clinic` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clinic`;

-- --------------------------------------------------------

--
-- Table structure for table `excelfiles`
--

CREATE TABLE IF NOT EXISTS `excelfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ids` varchar(30) NOT NULL,
  `PaymentP` varchar(30) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `Size` decimal(10,0) NOT NULL,
  `content` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `excelfiles`
--

INSERT INTO `excelfiles` (`id`, `ids`, `PaymentP`, `name`, `type`, `Size`, `content`) VALUES
(1, '1', 'Administrator.php', 'drugs.csv', 'application/vnd.ms-excel', '76', ''),
(2, '2', 'Administrator.php', 'patients.csv', 'application/vnd.ms-excel', '76', '');
INSERT INTO `excelfiles` (`id`, `ids`, `PaymentP`, `name`, `type`, `Size`, `content`) VALUES
(3, '3', 'Administrator.php', 'clinicuserguide.pdf', 'application/pdf', '678','');
-- --------------------------------------------------------

--
-- Table structure for table `tbl_drugs`
--

CREATE TABLE IF NOT EXISTS `tbl_drugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(300) NOT NULL,
  `DOE` varchar(300) NOT NULL,
  `Quantity` varchar(300) NOT NULL,
  `Drugsremain` varchar(300) NOT NULL,
  `PurchasedPrice` varchar(300) NOT NULL,
  `RetailPrice` varchar(300) NOT NULL,
  `Strength` varchar(300) NOT NULL,
  `Medstype` varchar(300) NOT NULL,
  `Marker` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_drugs`
--

INSERT INTO `tbl_drugs` (`id`, `Name`, `DOE`, `Quantity`, `Drugsremain`, `PurchasedPrice`, `RetailPrice`, `Strength`, `Medstype`, `Marker`) VALUES
(1, 'Paracetamol', '2019-03-29', '5000', '4484', '1000', '7.5', '500mg', 'Tablet', '1.5'),
(2, 'Magnesium', '2020-03-11', '2000', '1647', '1000', '3', '250mg', 'Tablet', '1.5'),
(3, 'Parapain', '2015-01-07', '3000', '2785', '1000', '4.5', '100mg', 'Capsules', '1.5'),
(4, 'La', '2017-02-01', '10000', '9724', '2000', '7.5', '500mg', 'Tablet', '1.5'),
(5, 'Buffen', '2020-03-19', '6000', '5738', '3000', '3', '250mg', 'Tablet', '1.5'),
(6, 'CIPRO', '2021-01-07', '100', '100', '8100', '129.6', '500mg', 'Tablet', '1.6'),
(7, 'Quenin', '2019-04-04', '5000', '4960', '28800', '8.64', '250mg', 'Tablet', '1.5'),
(8, 'Penecilin', '19/04/18', '400', '400', '7000', '26.25', '200mg', 'Tablet', '1.5'),
(9, 'Bactrim', '19/04/19', '600', '600', '2000', '5', '200mg', 'Capsoles', '1.5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_icd10`
--

CREATE TABLE IF NOT EXISTS `tbl_icd10` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Diagnosisname` varchar(3000) NOT NULL,
  `Diagnosiscode` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_icd10`
--

INSERT INTO `tbl_icd10` (`id`, `Diagnosisname`, `Diagnosiscode`) VALUES
(1, 'Malaria', '4242'),
(2, 'Bacteria Infection', '773573'),
(3, 'Cancer', 'CAE'),
(4, 'Celiac', 'YUW'),
(5, 'Diabetes', 'DIA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laboratory`
--

CREATE TABLE IF NOT EXISTS `tbl_laboratory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patientid` varchar(30) NOT NULL,
  `Diseased` varchar(3000) NOT NULL,
  `Test_RBS` varchar(3000) NOT NULL,
  `Test_FBS` varchar(3000) NOT NULL,
  `Test_PBS` varchar(3000) NOT NULL,
  `Test_UCT` varchar(3000) NOT NULL,
  `Test_MRDT` varchar(3000) NOT NULL,
  `Test_FBC` varchar(3000) NOT NULL,
  `Test_TFT` varchar(3000) NOT NULL,
  `Test_LFT` varchar(3000) NOT NULL,
  `Patient_Complaint` varchar(3000) NOT NULL,
  `Patient_Story` varchar(3000) NOT NULL,
  `Test_comment` varchar(3000) NOT NULL,
  `Results` varchar(3000) NOT NULL,
  `Officer` varchar(300) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `Status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_laboratory`
--

INSERT INTO `tbl_laboratory` (`id`, `Patientid`, `Diseased`, `Test_RBS`, `Test_FBS`, `Test_PBS`, `Test_UCT`, `Test_MRDT`, `Test_FBC`, `Test_TFT`, `Test_LFT`, `Patient_Complaint`, `Patient_Story`, `Test_comment`, `Results`, `Officer`, `Date`, `Status`) VALUES
(1, '1', 'Malaria', '', '', '', '', '', 'FBC', '', '', 'Fever', 'Vomiting and severe headache', 'Can you please check malaria', 'Normal', 'Mr Patrick Mvuma', '19-04-03', 'Closed'),
(2, '1', 'Malaria plus 2', '', '', '', '', '', '', 'TFT', '', 'Coughing blood', 'Stomache pains and bowels', 'Check for ulcers or Malaria', 'I have found plus two malaria', 'Mr Patrick Mvuma', '19-04-04', 'Closed'),
(3, '2', 'Malaria plus 1', '', '', '', '', 'MRDT', '', '', '', 'Headache', 'Started yesterday with some side pains', 'Check white bllod cells', 'Tests is positive of few white blood cells', 'Mr Patrick Mvuma', '19-04-04', 'Closed'),
(4, '3', 'Bacteria infection', '', '', 'PBS', '', '', '', '', '', 'Coughing blood', 'it hurts in the stomach wen i cough', 'Check peripheral blood smear', 'Nrgative tests', 'Mr Patrick Mvuma', '19-04-04', 'Closed'),
(5, '4', 'Malaria', '', '', '', '', 'MRDT', '', '', '', 'Fever', 'The whole body hurts ver bad', 'Check for malaria', 'They are positive', 'Mr Patrick Mvuma', '19-04-04', 'Closed'),
(6, '5', 'Thyloid Damage', '', '', '', '', '', '', 'TFT', '', 'Swolen legs', 'The legs started swolen yessterday and i can walk am having pains ', 'Check for blood levels', 'it seems the thyloid is damaged', 'Mr Patrick Mvuma', '19-04-05', 'Closed'),
(7, '6', 'Liver Failuire', '', '', '', '', '', '', '', 'LFT', 'Bleeding', 'Kunyela magazi', 'Check for liver status', 'Liver failure', 'Mr Patrick Mvuma', '19-04-05', 'Closed'),
(8, '7', 'Malaria', '', '', '', '', 'MRDT', '', '', '', 'Stomacheache', 'Vomitting started and dizzness', 'Check for malaria', 'The tests are positive for malaria', 'Mr Patrick Mvuma', '19-04-09', 'Closed'),
(9, '8', 'Malaria', '', '', '', '', '', 'FBC', '', '', 'Fever', 'Coughing severe', 'Chek for maaria in the blood', 'tested posiive to everything', 'Mr Patrick Mvuma', '19-04-09', 'Closed'),
(15, '11', 'Malaria', '', '', '', '', '', 'FBC', '', '', 'Headache', 'Fever', 'hsghghsg', 'tests positive', 'Mr Patrick Mvuma', '19-04-13', 'Closed'),
(16, '10', 'Bacteria Infection', '', '', '', '', '', 'FBC', '', '', 'Vomiting', 'Severe headache', 'Check blood', 'the test was positive', 'Mr Patrick Mvuma', '19-04-13', 'Closed'),
(17, '13', 'Bacteria Infection', '', '', '', '', '', 'FBC', 'TFT', 'LFT', 'malaria', 'the patient a', 'try the following', 'the patient has been fount with malaria', 'Mr Patrick Mvuma', '19-07-29', 'Closed'),
(18, '14', 'Malaria', '', '', '', '', 'MRDT', 'FBC', '', '', 'My head hurts and i got fever', 'It started yesterday and it has been severe since then', 'Test her blood for Malaria', 'according to my findings the patient blood test positive to malaria', 'Mr Patrick Mvuma', '19-07-30', 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_labresults`
--

CREATE TABLE IF NOT EXISTS `tbl_labresults` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patientid` varchar(30) NOT NULL,
  `Testid` varchar(30) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Test_FBS` varchar(3000) NOT NULL,
  `FBS_Comment` varchar(3000) NOT NULL,
  `Test_RBS` varchar(3000) NOT NULL,
  `RBS_Comment` varchar(3000) NOT NULL,
  `Test_UCT` varchar(3000) NOT NULL,
  `UCT_Comment` varchar(3000) NOT NULL,
  `Test_PBS` varchar(3000) NOT NULL,
  `PBS_Comment` varchar(3000) NOT NULL,
  `Test_MRDT` varchar(3000) NOT NULL,
  `MRDT_Comment` varchar(3000) NOT NULL,
  `Test_FBC` varchar(3000) NOT NULL,
  `FBC_Comment` varchar(3000) NOT NULL,
  `Test_TFT` varchar(3000) NOT NULL,
  `TFT_Comment` varchar(3000) NOT NULL,
  `Test_LFT` varchar(3000) NOT NULL,
  `LFT_Comment` varchar(3000) NOT NULL,
  `Officer` varchar(300) NOT NULL,
  `Date` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_labresults`
--

INSERT INTO `tbl_labresults` (`id`, `Patientid`, `Testid`, `Status`, `Test_FBS`, `FBS_Comment`, `Test_RBS`, `RBS_Comment`, `Test_UCT`, `UCT_Comment`, `Test_PBS`, `PBS_Comment`, `Test_MRDT`, `MRDT_Comment`, `Test_FBC`, `FBC_Comment`, `Test_TFT`, `TFT_Comment`, `Test_LFT`, `LFT_Comment`, `Officer`, `Date`) VALUES
(1, '1', '', 'Closed', '', '', '', '', '', '', '', '', '', '', '10.jpg', 'Blood  level normal', '', '', '', '', 'Mr Patrick Mvuma', '19-04-03'),
(2, '1', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '2.jpg', 'Malaria positive', '', '', 'Mr Patrick Mvuma', '19-04-04'),
(3, '2', '3', 'Closed', '', '', '', '', '', '', '', '', '11.jpg', 'Few white bllod cells', '', '', '', '', '', '', 'Mr Patrick Mvuma', '19-04-04'),
(4, '3', '4', 'Closed', '', '', '', '', '', '', '3.jpg', 'Negative', '', '', '', '', '', '', '', '', 'Mr Patrick Mvuma', '19-04-04'),
(5, '4', '5', '', '', '', '', '', '', '', '', '', '4.jpg', 'Malaria positive', '', '', '', '', '', '', 'Mr Patrick Mvuma', '19-04-04'),
(6, '5', '6', 'Closed', '', '', '', '', '', '', '', '', '', '', '', '', '10.jpg', 'Bad thyroid function', '', '', 'Mr Patrick Mvuma', '19-04-05'),
(7, '6', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '7.jpg', 'Positive', 'Mr Patrick Mvuma', '19-04-05'),
(8, '7', '8', 'Closed', '', '', '', '', '', '', '', '', 'imagesB.jpg', 'Positive', '', '', '', '', '', '', 'Mr Patrick Mvuma', '19-04-09'),
(9, '8', '9', 'Closed', '', '', '', '', '', '', '', '', '', '', 'imagesN.png', 'Positive', '', '', '', '', 'Mr Patrick Mvuma', '19-04-09'),
(14, '11', '15', 'Closed', '', '', '', '', '', '', '', '', '', '', 'g.jpg', 'Positive', '', '', '', '', 'Mr Patrick Mvuma', '19-04-13'),
(15, '10', '16', 'Closed', '', '', '', '', '', '', '', '', '', '', 'imagesN.png', 'tetsts positivell', '', '', '', '', 'Mr Patrick Mvuma', '19-04-13'),
(16, '13', '17', 'Closed', '', '', '', '', '', '', '', '', '', '', 'm_FJXQ8950.jpg', 'The test was negative', 'm_ICWR8290.jpg', 'the test was positive', 'm_IMG_1354.jpg', 'trhe test was negative', 'Mr Patrick Mvuma', '19-07-29'),
(17, '14', '', 'Closed', '', '', '', '', '', '', '', '', 'm_IMG_0091.jpg', 'This test was positive', 'm_IMG_0087.jpg', 'This test was positive', '', '', '', '', 'Mr Patrick Mvuma', '19-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_managementplan`
--

CREATE TABLE IF NOT EXISTS `tbl_managementplan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Resultsid` varchar(3000) NOT NULL,
  `Patientid` varchar(30) NOT NULL,
  `Management_plan` varchar(3000) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `Status` varchar(3000) NOT NULL,
  `Plan` varchar(3000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_managementplan`
--

INSERT INTO `tbl_managementplan` (`id`, `Resultsid`, `Patientid`, `Management_plan`, `Date`, `Status`, `Plan`) VALUES
(1, '1', '1', 'Come for check up after 48hours', '19-04-03', 'Closed', ''),
(2, '2', '1', 'give medication as prescribe and monitor urine', '19-04-04', 'Closed', ''),
(3, '2', '1', 'This will help with stomache pains', '19-04-04', 'Closed', ''),
(4, '3', '2', 'Come for check up after 3 days', '19-04-04', 'Closed', ''),
(5, '4', '3', 'Come for check up mr aftr 24 hours', '19-04-04', 'Closed', ''),
(6, '5', '4', 'Come for check up after 25 hours', '19-04-04', 'Closed', ''),
(7, '5', '4', 'This will help calm stomache pains', '19-04-04', 'Closed', ''),
(8, '5', '4', 'These meds should be taken every four hours', '19-04-04', 'Closed', ''),
(9, '6', '5', 'Come for check up after 6 days', '19-04-05', 'Pay', ''),
(10, '7', '6', 'Give this patient buffen after 12 hours', '19-04-05', 'Closed', ''),
(11, '7', '6', 'Check for urine after 2 hours', '19-04-05', 'Closed', ''),
(12, '8', '7', 'Come for check up after 2days', '19-04-09', 'Pay', ''),
(13, '9', '8', 'You should go buy gg meds at your nearlest pharmacy', '19-04-09', 'Pay', ''),
(17, '9', '8', 'hsghgsg', '19-04-09', 'Pay', ''),
(20, '15', '11', 'Come for check up after fuids', '19-04-13', 'Pay', ''),
(21, '16', '10', 'Go for further tests', '19-04-13', 'Pay', ''),
(22, '17', '13', 'visit us after 10 days', '19-07-29', 'Pay', ''),
(23, '18', '14', 'Come for check up after 1 week', '19-07-30', 'Pay', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petients`
--

CREATE TABLE IF NOT EXISTS `tbl_petients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Mtitle` varchar(30) NOT NULL,
  `Firstname` varchar(300) NOT NULL,
  `Middlename` varchar(300) NOT NULL,
  `Sirname` varchar(300) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `NextKphone` varchar(300) NOT NULL,
  `DOB` varchar(300) NOT NULL,
  `Location` varchar(300) NOT NULL,
  `Relation` varchar(300) NOT NULL,
  `Guardian` varchar(300) NOT NULL,
  `Status` varchar(300) NOT NULL,
  `Status2` varchar(30) NOT NULL,
  `Date` varchar(300) NOT NULL,
  `Payment` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_petients`
--

INSERT INTO `tbl_petients` (`id`, `Mtitle`, `Firstname`, `Middlename`, `Sirname`, `Gender`, `Phone`, `NextKphone`, `DOB`, `Location`, `Relation`, `Guardian`, `Status`, `Status2`, `Date`, `Payment`) VALUES
(1, 'Mr', 'Eugene', 'Judza', 'Dzanjalimodzi', 'Male', '26588810635', '26589927365', '1994-09-15', 'Area 47 ', 'Sister', 'Sangwani Dzanja', 'Treated', '', '04-04-19', 'CASH'),
(2, 'Miss', 'Wendy', 'Wee', 'Mvuma', 'Female', '26599273553', '265999107524', '2007-05-24', 'Area 49', 'Mother', 'Mwandida Mvuma', 'Pharmacy', 'Admission', '04-04-19', 'CASH'),
(3, 'Mr', 'James', 'Jay', 'Mtemwende', 'Male', '26357449976', '253674486645', '2006-02-02', 'Area 25', 'Brother', 'Patrick Mtemwende', 'Treated', 'Treated', '04-04-19', 'CASH'),
(4, 'Mr', 'Damison', 'Dam', 'Kathyola', 'Male', '2650886353', '26582353462', '1995-04-13', 'Area 6', 'Wife', 'Mary Kathyola', 'Treated', '', '04-04-19', 'SCHEME'),
(5, 'Mr', 'Joe', 'J', 'Kajombo', 'Male', '123764873787', '35737367', '1972-04-06', 'Kanjedza', 'Brother', 'Ted Kajombo', 'Treated', 'Treated', '05-04-19', 'CASH'),
(6, 'Mr', 'Maxmos', 'Maxy', 'Maposa', 'Male', '26588826374', '26587366472', '1983-03-10', 'Kanjedza', 'Father', 'George Maposa', 'Treated', '', '05-04-19', 'CASH'),
(7, 'Mr', 'Dziko', 'Honcho', 'Ntaba', 'Male', '265888234567', '265999105687', '1997-05-15', 'Area 49', 'Sister', 'Mercy Ntaba', 'Treated', 'Treated', '09-04-19', 'CASH'),
(8, 'Miss', 'Monica', 'Mandy', 'Mand', 'Female', '2653845353', '2343366', '2014-04-04', 'Area 43', 'Sister', 'Maria', 'Pharmacy', 'Admission', '09-04-19', 'SCHEME'),
(10, 'Mr', 'Maxwell', 'Peter', 'Banda', 'Male', '23464644', '24644474', '2013-03-14', 'Area 23', 'Sister', 'Mercy Gondwe', 'Treated', 'Treated', '09-04-19', 'SCHEME'),
(11, 'Miss', 'Glory', 'Gl', 'Bandawe', 'Female', '26588810635', '26588128363', '2012-03-15', 'Area 49', 'Sister', 'Petience Banda', 'Consultation', 'Treated', '13-04-19', 'CASH'),
(12, 'Mrs', 'Chimango', 'Chims', 'Banda', 'Female', '2334554', '3655363', '2018-04-05', 'Area 23', 'Sister', 'Grace banda', '', '', '13-04-19', 'CASH'),
(13, 'Mr', 'James', 'Jamie', 'Kapondera', 'Male', '26599946', '2659990000', '2016-07-13', 'Bwandilo', 'Auncle', 'Mary Mphande', 'Treated', 'Treated', '29-07-19', 'CASH'),
(14, 'Miss', 'Chrity', 'Cha', 'Joloza', 'Female', '26599910728', '26588882526', '1992-06-10', 'Balaka', 'Sister', 'Janet Joloza', 'Treated', 'Treated', '30-07-19', 'CASH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_readings`
--

CREATE TABLE IF NOT EXISTS `tbl_readings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patientid` varchar(30) NOT NULL,
  `Date` varchar(300) NOT NULL,
  `Time` varchar(300) NOT NULL,
  `BodyT` varchar(3000) NOT NULL,
  `PulseRate` varchar(3000) NOT NULL,
  `RespirationRate` varchar(3000) NOT NULL,
  `SystolicBP` varchar(3000) NOT NULL,
  `DiastolicBP` varchar(3000) NOT NULL,
  `Oxygensaturation` varchar(3000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_readings`
--

INSERT INTO `tbl_readings` (`id`, `Patientid`, `Date`, `Time`, `BodyT`, `PulseRate`, `RespirationRate`, `SystolicBP`, `DiastolicBP`, `Oxygensaturation`) VALUES
(1, '6', '2019-04-05', '07:44:18 AM', '50', '34', '40', '120', '7', '45'),
(2, '6', '2019-04-05', '07:44:59 AM', '45', '30', '35', '120', '80', '40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE IF NOT EXISTS `tbl_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patientid` varchar(30) NOT NULL,
  `Drugname` varchar(3000) NOT NULL,
  `Quantity` varchar(3000) NOT NULL,
  `Amount` varchar(30) NOT NULL,
  `Days` varchar(30) NOT NULL,
  `Unitprice` varchar(3000) NOT NULL,
  `Totalcost` varchar(3000) NOT NULL,
  `Consultation_fee` varchar(3000) NOT NULL,
  `Lab_fee` varchar(3000) NOT NULL,
  `Payment` varchar(300) NOT NULL,
  `Scheme_id` varchar(300) NOT NULL,
  `Date` varchar(300) NOT NULL,
  `Time` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`id`, `Patientid`, `Drugname`, `Quantity`, `Amount`, `Days`, `Unitprice`, `Totalcost`, `Consultation_fee`, `Lab_fee`, `Payment`, `Scheme_id`, `Date`, `Time`) VALUES
(1, '1', 'La', '12', '', '', '7.5', '90', '1500', '500', 'CASH', '', '19-04-03', '04:05:50 PM'),
(2, '1', 'Parapain', '30', '', '', '4.5', '135', '1500', '500', 'CASH', '', '19-04-03', '04:05:50 PM'),
(8, '1', 'Paracetamol', '35', '', '', '7.5', '262.5', '1500', '0', 'CASH', '', '19-04-04', '09:09:13 PM'),
(9, '1', 'La', '12', '', '', '7.5', '90', '1500', '0', 'CASH', '', '19-04-04', '09:09:13 PM'),
(10, '1', 'Buffen', '6', '', '', '3', '18', '1500', '0', 'CASH', '', '19-04-04', '09:09:13 PM'),
(11, '1', 'La', '4', '', '', '7.5', '30', '1500', '0', 'CASH', '', '19-04-04', '09:09:13 PM'),
(12, '1', 'Magnesium', '10', '', '', '3', '30', '1500', '0', 'CASH', '', '19-04-04', '09:09:14 PM'),
(13, '2', 'Buffen', '24', '', '', '3', '72', '1500', '500', 'CASH', '', '19-04-04', '09:42:41 PM'),
(14, '2', 'La', '6', '', '', '7.5', '45', '1500', '500', 'CASH', '', '19-04-04', '09:42:41 PM'),
(15, '3', 'Magnesium', '', '', '', '3', '0', '1500', '500', 'CASH', '', '19-04-04', '09:58:14 PM'),
(16, '4', 'Paracetamol', '30', '', '', '7.5', '225', '1500', '500', 'CASH', '', '19-04-04', '10:25:49 PM'),
(17, '4', 'La', '6', '', '', '7.5', '45', '1500', '500', 'CASH', '', '19-04-04', '10:25:49 PM'),
(18, '4', 'Magnesium', '12', '', '', '3', '36', '1500', '500', 'CASH', '', '19-04-04', '10:25:50 PM'),
(19, '4', 'Buffen', '30', '', '', '3', '90', '1500', '500', 'CASH', '', '19-04-04', '10:25:50 PM'),
(20, '4', 'La', '12', '', '', '7.5', '90', '1500', '500', 'CASH', '', '19-04-04', '10:25:50 PM'),
(22, '6', 'Magnesium', '13', '', '', '4.28', '55.64', '1500', '500', 'Liberty Health Care', 'MM4353662', '19-04-05', '08:39:33 AM'),
(23, '6', 'Magnesium', '12', '', '', '4.25', '51', '1500', '500', 'Liberty Health Care', 'MM4353662', '19-04-05', '08:39:34 AM'),
(24, '7', 'Paracetamol', '5', '', '', '7.5', '37.5', '1500', '500', 'CASH', '', '19-04-09', '08:45:38 AM'),
(25, '7', 'La', '7', '', '', '7.5', '52.5', '1500', '500', 'CASH', '', '19-04-09', '08:45:38 AM'),
(26, '8', 'Paracetamol', '5', '', '', '11.47', '57.35', '1500', '500', 'MASM', 'MSM2451883', '19-04-09', '08:54:10 AM'),
(27, '8', 'La', '7', '', '', '12.23', '85.61', '1500', '500', 'MASM', 'MSM2451883', '19-04-09', '08:54:10 AM'),
(31, '11', 'Quenin', '20', '2', '5', '8.64', '200', '1500', '500', 'CASH', '', '19-04-13', '09:20:17 AM'),
(32, '10', 'Quenin', '20', '2', '5', '14.46', '300', '1500', '500', 'MASM', 'MDFSERR', '19-04-13', '09:23:45 AM'),
(33, '13', 'Paracetamol', '10', '1', '5', '0.55', '50', '1500', '500', 'Blue Health Care', '675', '19-07-29', '10:25:55 PM'),
(34, '13', 'Paracetamol', '84', '2', '7', '0.55', '50', '1500', '500', 'Blue Health Care', '675', '19-07-29', '10:25:55 PM'),
(35, '14', 'La', '49', '1', '7', '7.5', '400', '1500', '500', 'CASH', '', '19-07-30', '11:26:52 AM'),
(36, '14', 'Buffen', '196', '2', '7', '3', '600', '1500', '500', 'CASH', '', '19-07-30', '11:26:52 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treatment`
--

CREATE TABLE IF NOT EXISTS `tbl_treatment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Resultsid` varchar(3000) NOT NULL,
  `Patientid` varchar(30) NOT NULL,
  `Drugid` varchar(3000) NOT NULL,
  `Quantity` varchar(3000) NOT NULL,
  `Amount` varchar(30) NOT NULL,
  `Timesperday` varchar(3000) NOT NULL,
  `Days` varchar(30) NOT NULL,
  `Prescribe_Comment` varchar(300) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `Officer` varchar(3000) NOT NULL,
  `Status` varchar(3000) NOT NULL,
  `Plan` varchar(3000) NOT NULL,
  `Progress` varchar(3000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_treatment`
--

INSERT INTO `tbl_treatment` (`id`, `Resultsid`, `Patientid`, `Drugid`, `Quantity`, `Amount`, `Timesperday`, `Days`, `Prescribe_Comment`, `Date`, `Officer`, `Status`, `Plan`, `Progress`) VALUES
(1, '1', '1', 'La', '12', '', 'OD', '', 'Drink every six hours', '19-04-03', 'Mr Patrick Mvuma', 'Closed', '', ''),
(2, '1', '1', 'Parapain', '30', '', 'OD', '', 'Drink every six hours', '19-04-03', 'Mr Patrick Mvuma', 'Closed', '', ''),
(3, '2', '1', 'Paracetamol', '35', '', 'OD', '', 'Drink more water and eat ', '19-04-04', 'Mr Patrick Mvuma', 'Closed', '', ''),
(4, '2', '1', 'La', '12', '', 'OD', '', 'Drink more water and eat ', '19-04-04', 'Mr Patrick Mvuma', 'Closed', '', ''),
(5, '2', '1', 'Buffen', '6', '', 'OD', '', 'Dont forget to be drining more sobo', '19-04-04', 'Mr Patrick Mvuma', 'Closed', '', ''),
(6, '2', '1', 'La', '4', '', 'OD', '', 'Water evry six hours', '19-04-04', 'Mr Patrick Mvuma', 'Closed', '', ''),
(7, '2', '1', 'Magnesium', '10', '', 'OD', '', 'This will help with stomache pains', '19-04-04', 'Mr Patrick Mvuma', 'Closed', '', ''),
(8, '3', '2', 'Buffen', '24', '', 'OD', '', 'Drink the meds after eating', '19-04-04', 'Mr Patrick Mvuma', 'Paid', '', ''),
(9, '3', '2', 'La', '6', '', 'OD', '', 'Drink the meds after eating', '19-04-04', 'Mr Patrick Mvuma', 'Paid', '', ''),
(10, '4', '3', 'Magnesium', '4', '', 'OD', '', 'Drink more water frequently', '19-04-04', 'Mr Patrick Mvuma', 'Paid', '', ''),
(11, '5', '4', 'Paracetamol', '30', '', 'BD', '', 'Drink every 8 hours', '19-04-04', 'Mr Patrick Mvuma', 'Closed', '', ''),
(12, '5', '4', 'La', '6', '', 'BD', '', 'Drink every 8 hours', '19-04-04', 'Mr Patrick Mvuma', 'Closed', '', ''),
(13, '5', '4', 'Magnesium', '12', '', 'OD', '', 'This will help calm stomache pains', '19-04-04', 'Mr Patrick Mvuma', 'Closed', '', ''),
(14, '5', '4', 'Buffen', '30', '', 'OD', '', 'These meds should be taken every four hours', '19-04-04', 'Mr Patrick Mvuma', 'Closed', '', ''),
(15, '5', '4', 'La', '12', '', 'OD', '', 'These meds should be taken every four hours', '19-04-04', 'Mr Patrick Mvuma', 'Closed', '', ''),
(16, '6', '5', 'Paracetamol', '10', '', 'OD', '', 'Dink this every 6 hours', '19-04-05', 'Mr Patrick Mvuma', 'Closed', '', 'Notpaid'),
(17, '7', '6', 'Magnesium', '13', '', 'BD', '', 'Take these meds every 4 hours', '19-04-05', 'Mr Patrick Mvuma', 'Closed', '', 'Notpaid'),
(18, '7', '6', 'Magnesium', '12', '', 'BD', '', 'Check for urine after 2 hours', '19-04-05', 'Mr Patrick Mvuma', 'Closed', '', 'Notpaid'),
(19, '8', '7', 'Paracetamol', '5', '', 'BD', '', 'The first meds should be taken after 8 hours', '19-04-09', 'Mr Patrick Mvuma', 'Paid', '', ''),
(20, '8', '7', 'La', '7', '', 'BD', '', 'The first meds should be taken after 8 hours', '19-04-09', 'Mr Patrick Mvuma', 'Paid', '', ''),
(27, '9', '8', 'Paracetamol', '7', '', 'BD', '', 'sfshsg', '19-04-09', 'Mr Patrick Mvuma', 'Pay', '', ''),
(30, '15', '11', 'Quenin', '20', '2', 'BD', '5', 'Drink fluids', '19-04-13', 'Mr Patrick Mvuma', 'Paid', '', ''),
(31, '16', '10', 'Quenin', '20', '2', 'BD', '5', 'Drink alot of water', '19-04-13', 'Mr Patrick Mvuma', '', '', 'Notpaid'),
(32, '17', '13', 'Paracetamol', '10', '1', 'OD', '5', 'take more fluids', '19-07-29', 'Mr Patrick Mvuma', '', '', 'Notpaid'),
(33, '17', '13', 'Paracetamol', '84', '2', 'BD', '7', 'take more fluids', '19-07-29', 'Mr Patrick Mvuma', '', '', 'Notpaid'),
(34, '18', '14', 'La', '49', '1', 'OD', '7', 'Drink more fluids', '19-07-30', 'Mr Patrick Mvuma', 'Paid', '', ''),
(35, '18', '14', 'Buffen', '196', '2', 'BD', '7', 'Drink more fluids', '19-07-30', 'Mr Patrick Mvuma', 'Paid', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlogs`
--

CREATE TABLE IF NOT EXISTS `tbl_userlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Userid` varchar(300) NOT NULL,
  `Machineip` varchar(300) NOT NULL,
  `Login` varchar(300) NOT NULL,
  `Logout` varchar(300) NOT NULL,
  `Activities` varchar(3000) NOT NULL,
  `Count` varchar(3000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_userlogs`
--

INSERT INTO `tbl_userlogs` (`id`, `Userid`, `Machineip`, `Login`, `Logout`, `Activities`, `Count`) VALUES
(1, '6', '56-4B-F5-31-2E-9F', '30-07-2019 10:35:56 AM', '30-07-2019 12:43:57 PM', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userprivilages`
--

CREATE TABLE IF NOT EXISTS `tbl_userprivilages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Userid` varchar(30) NOT NULL,
  `Adduser` varchar(3000) NOT NULL,
  `Manageuser` varchar(3000) NOT NULL,
  `Logactivities` varchar(3000) NOT NULL,
  `Addpatient` varchar(3000) NOT NULL,
  `Editpatient` varchar(3000) NOT NULL,
  `Managepatient` varchar(3000) NOT NULL,
  `Consultation` varchar(3000) NOT NULL,
  `Labaccess` varchar(3000) NOT NULL,
  `Accountaccess` varchar(3000) NOT NULL,
  `Givedrugs` varchar(3000) NOT NULL,
  `Adddrugs` varchar(300) NOT NULL,
  `Managedrugs` varchar(30) NOT NULL,
  `Todayssales` varchar(3000) NOT NULL,
  `Todaystreat` varchar(300) NOT NULL,
  `Monthlyreport` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_userprivilages`
--

INSERT INTO `tbl_userprivilages` (`id`, `Userid`, `Adduser`, `Manageuser`, `Logactivities`, `Addpatient`, `Editpatient`, `Managepatient`, `Consultation`, `Labaccess`, `Accountaccess`, `Givedrugs`, `Adddrugs`, `Managedrugs`, `Todayssales`, `Todaystreat`, `Monthlyreport`) VALUES
(1, '6', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(2, '8', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(300) NOT NULL,
  `Sirname` varchar(300) NOT NULL,
  `Mtitle` varchar(30) NOT NULL,
  `Pic_name` varchar(30) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Role` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Online` varchar(300) NOT NULL,
  `Time` bigint(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `Firstname`, `Sirname`, `Mtitle`, `Pic_name`, `Phone`, `Email`, `Password`, `Role`, `State`, `Online`, `Time`) VALUES
(6, 'Patrick', 'Mvuma', 'Mr', '', '2659992865', 'test@clinic.com', '1234554321', 'System Developer', 'Super', 'Offline', 1564482956),
(8, 'Anderson', 'Banda', 'Mr', '', '2659999107725', 'anderson@gmail.com', '90000', 'Medical Doctor', '', 'Offline', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendors`
--

CREATE TABLE IF NOT EXISTS `tbl_vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fullname` varchar(300) NOT NULL,
  `Location` varchar(300) NOT NULL,
  `Phone` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `DOP` varchar(300) NOT NULL,
  `Drugid` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_vendors`
--

INSERT INTO `tbl_vendors` (`id`, `Fullname`, `Location`, `Phone`, `Email`, `DOP`, `Drugid`) VALUES
(3, 'Medical Stores', 'Lilongwe', '265888876600', 'medicalstore@gmail.com', '2019-03-22', '1'),
(4, 'James Kamanga', 'Lilongwe', '265888192726', 'james@yahoo.com', '2019-03-06', '2'),
(5, 'Chikondi Mandala', 'Nyambadwe', '26582736355', 'chiko@yahoo.com', '2019-03-05', '3'),
(6, 'Chikondi Nkhama', 'Lilongwe', '265182753536', 'chikondi@yahoo.com', '2019-03-13', '4'),
(7, 'Grant Manda', 'Bangwe', '26543338163', 'grant@gmail.com', '2018-03-08', '5'),
(8, 'Intermed', 'Lilongwe', '017500035', 'info@intermedmw.com', '2018-01-07', '6'),
(9, 'Intermed', 'Lilongwe', '26543338163', 'medicalstore@gmail.com', '2019-04-24', '7'),
(10, 'Medicines', 'Chilambula', '253533', 'mvumaparick@yahoo.com', '19/04/23', '8'),
(11, 'Medicines', 'Kanjedza', '2535342233', 'mvumaparick@yahoo.com', '19/05/24', '9'),
(12, '', '', '', '', '', '10'),
(13, '', '', '', '', '', '11'),
(14, '', '', '', '', '', '12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
