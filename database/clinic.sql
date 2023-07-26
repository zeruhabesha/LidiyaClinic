-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 02:30 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`) VALUES
(1, 'Welcome to Lidiya Clinic', 'clinic, an organized medical service offering diagnostic, therapeutic, or preventive outpatient services. Often, the term covers an entire medical teaching centre, including the hospital and the outpatient facilities. The medical care offered by a clinic may or may not be connected with a hospital.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'fds', 'safdsa@fasd', '4363636747', 'gfdsgdf');

-- --------------------------------------------------------

--
-- Table structure for table `excelfiles`
--

CREATE TABLE `excelfiles` (
  `id` int(11) NOT NULL,
  `ids` varchar(30) NOT NULL,
  `PaymentP` varchar(30) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `Size` decimal(10,0) NOT NULL,
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `excelfiles`
--

INSERT INTO `excelfiles` (`id`, `ids`, `PaymentP`, `name`, `type`, `Size`, `content`) VALUES
(1, '1', 'Administrator.php', 'drugs.csv', 'application/vnd.ms-excel', '76', ''),
(2, '2', 'Administrator.php', 'patients.csv', 'application/vnd.ms-excel', '76', ''),
(3, '3', 'Administrator.php', 'clinicuserguide.pdf', 'application/pdf', '678', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drugs`
--

CREATE TABLE `tbl_drugs` (
  `id` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `DOE` varchar(300) NOT NULL,
  `Quantity` varchar(300) NOT NULL,
  `Drugsremain` varchar(300) NOT NULL,
  `PurchasedPrice` varchar(300) NOT NULL,
  `RetailPrice` varchar(300) NOT NULL,
  `Strength` varchar(300) NOT NULL,
  `Medstype` varchar(300) NOT NULL,
  `Marker` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_drugs`
--

INSERT INTO `tbl_drugs` (`id`, `Name`, `DOE`, `Quantity`, `Drugsremain`, `PurchasedPrice`, `RetailPrice`, `Strength`, `Medstype`, `Marker`) VALUES
(1, 'Paracetamol', '2019-03-29', '4', '4131', '1000', '7', '500mg', 'Tablet', '1.5'),
(2, 'Magnesium', '2020-03-11', '2000', '1643', '1000', '3', '250mg', 'Tablet', '1.5'),
(3, 'Parapain', '2015-01-07', '3000', '2785', '1000', '4.5', '100mg', 'Capsules', '1.5'),
(4, 'La', '2017-02-01', '9724', '9724', '2000', '10', '500mg', 'Tablet', '1.5'),
(5, 'Buffen', '2020-03-19', '6000', '5738', '3000', '3', '250mg', 'Tablet', '1.5'),
(6, 'CIPRO', '2021-01-07', '100', '100', '8100', '129.6', '500mg', 'Tablet', '1.6'),
(7, 'Quenin', '2019-04-04', '5000', '4900', '28800', '8.64', '250mg', 'Tablet', '1.5'),
(8, 'Penecilin', '2022-10-01', '400', '400', '7000', '26.25', '200mg', 'Tablet', '1.5'),
(9, 'Bactrim', '19/04/19', '600', '600', '2000', '5', '200mg', 'Capsoles', '1.5'),
(13, 'kuku7', '2022-09-10', '', '', '7000', '54', '', '', ''),
(14, 'tgre', '2022-07-31', '54', '', 'trew', '54', '', 'Tablet', ''),
(15, 'juhg', '2022-09-03', '74', '74', '74', '1.4', 'jhg', 'Tablet', '1.4'),
(16, 'mdd', '2022-10-28', '150', '150', '70', '2.3333333333333', 'mddd', 'Tablet', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_icd10`
--

CREATE TABLE `tbl_icd10` (
  `id` int(11) NOT NULL,
  `Diagnosisname` varchar(3000) NOT NULL,
  `Diagnosiscode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_icd10`
--

INSERT INTO `tbl_icd10` (`id`, `Diagnosisname`, `Diagnosiscode`) VALUES
(1, 'Malaria', '4242'),
(2, 'Bacteria Infection', '773573'),
(3, 'Cancer', 'CAE'),
(4, 'Celiac', 'YUW'),
(5, 'Diabetes', 'DIA'),
(6, 'jardia', '5555');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laboratory`
--

CREATE TABLE `tbl_laboratory` (
  `id` int(11) NOT NULL,
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
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(18, '14', 'Malaria', '', '', '', '', 'MRDT', 'FBC', '', '', 'My head hurts and i got fever', 'It started yesterday and it has been severe since then', 'Test her blood for Malaria', 'according to my findings the patient blood test positive to malaria', 'Mr Patrick Mvuma', '19-07-30', 'Closed'),
(19, '15', 'Malaria', 'RBS', 'FBS', '', 'UCT', '', '', '', '', 'dfhgfh', 'hgfdhfh', 'fgsdjfsaf', 'iuyti', 'Mr Patrick Mvuma', '22-08-12', ''),
(20, '16', 'Bacteria Infection', 'RBS', '', 'PBS', '', '', 'FBC', 'TFT', '', 'tewrtrew', 'terwrtre', 'terwtewterwtr', 'hhhhfgfd', 'Mr Patrick Mvuma', '22-08-12', ''),
(21, '26', 'Cancer', 'RBS', 'FBS', '', '', '', '', '', '', 'yryrt', 'ytr', 'ytr', '', 'Mr Patrick Mvuma', '22-08-12', ''),
(22, '10', '', '', 'FBS', 'PBS', 'UCT', 'MRDT', '', '', '', 'ifgiu', 'hjg', 'jgf', 'jgf', 'Mr Patrick Mvuma', '22-08-13', ''),
(23, '1', 'jardia', 'RBS', '', '', 'UCT', 'MRDT', 'FBC', 'TFT', '', 'gfd', 'gsdf', 'gdsf', 'jhfg', 'Mr Patrick Mvuma', '22-08-13', ''),
(24, '28', 'Celiac', '', '', 'PBS', '', '', '', 'TFT', '', 'fdsd', 'sdf', '', 'lkjh', 'Mr Patrick Mvuma', '22-08-15', 'Closed'),
(25, '29', 'Celiac', '', '', '', '', 'MRDT', '', '', '', '', '', '', 'gdfxs', 'Mr Patrick Mvuma', '22-08-15', ''),
(26, '6', '', '', '', '', '', '', 'FBC', 'TFT', '', '', '', '', 'gh', 'Mr Patrick Mvuma', '22-08-15', ''),
(27, '5', '', '', '', '', '', '', '', 'TFT', '', '', '', '', '', 'Mr Patrick Mvuma', '22-08-15', ''),
(28, '3', 'Bacteria Infection', 'RBS', 'FBS', 'PBS', 'UCT', '', '', '', '', 'tgrse', 'trew', 'tewrte', 'hgfhgf', 'Mr Patrick Mvuma', '22-08-15', ''),
(29, '27', 'Celiac', '', '', '', 'UCT', 'MRDT', 'FBC', 'TFT', '', '', '', '', 'iuy', 'Mr Patrick Mvuma', '22-08-15', ''),
(30, '30', '', '', '', '', '', 'MRDT', '', '', '', '', '', '', 'uyt', 'Mr Zerihun Kibret', '22-08-17', ''),
(31, '33', '', '', '', '', '', 'MRDT', '', '', '', 'uyrt', 'urt', '', 'utr', 'Mr Zerihun Kibret', '22-08-17', ''),
(32, '6', '', '', '', '', '', '', 'FBC', '', '', '', '', '', '', 'Mr Zerihun Kibret', '22-08-17', ''),
(33, '34', '', 'RBS', '', '', 'UCT', '', '', '', '', 'gfdsg', 'gfdsg', 'dsaf', 'rewqrw', 'Mr Zerihun Kibret', '22-08-18', 'Closed'),
(34, '35', '', '', '', '', '', '', 'FBC', '', '', '', '', '', '', 'Mr Zerihun Kibret', '22-08-18', 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_labresults`
--

CREATE TABLE `tbl_labresults` (
  `id` int(11) NOT NULL,
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
  `Date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(17, '14', '', 'Closed', '', '', '', '', '', '', '', '', 'm_IMG_0091.jpg', 'This test was positive', 'm_IMG_0087.jpg', 'This test was positive', '', '', '', '', 'Mr Patrick Mvuma', '19-07-30'),
(18, '15', '19', '', '', 'iuy', '', 'uyt', '', 'yui', '', '', '', '', '', '', '', '', '', '', 'Mr Patrick Mvuma', '22-08-12'),
(19, '16', '', '', '', '', '', 'khf', '', '', '', 'jkjhg', '', '', '', 'jh', '', 'gkjhg', '', '', 'Mr Patrick Mvuma', '22-08-12'),
(20, '10', '22', '', '', 'jhg', '', '', '', 'jfg', '', 'gh', '', 'ghj', '', '', '', '', '', '', 'Mr Patrick Mvuma', '22-08-13'),
(21, '1', '', '', '', '', '3800.PNG', 'jhg', '3800.PNG', 'jhg', '', '', 'Capture.PNG', 'jhg', 'Capture.PNG', 'jhg', '3800.PNG', 'jhgf', '', '', 'Mr Patrick Mvuma', '22-08-13'),
(22, '26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Mr Patrick Mvuma', '22-08-15'),
(23, '28', '24', 'Closed', '', '', '', '', '', '', '3800.PNG', 'lkjh', '', '', '', '', '3800.PNG', 'lkjh', '', '', 'Mr Patrick Mvuma', '22-08-15'),
(24, '29', '25', '', '', '', '', '', '', '', '', '', 'Capture.PNG', 'gfds', '', '', '', '', '', '', 'Mr Patrick Mvuma', '22-08-15'),
(25, '6', '26', '', '', '', '', '', '', '', '', '', '', '', 'Capture.PNG', 'hfd', '3800.PNG', 'gh', '', '', 'Mr Patrick Mvuma', '22-08-15'),
(26, '5', '27', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Capturee.PNG', 'ghfh', '', '', 'Mr Patrick Mvuma', '22-08-15'),
(27, '3', '28', '', '3800.PNG', 'hg', '3800.PNG', 'hgfdf', '3800.PNG', 'bhhg', '3800.PNG', 'hgf', '', '', '', '', '', '', '', '', 'Mr Patrick Mvuma', '22-08-15'),
(28, '27', 'Treated', '', '', '', '', '', '3800.PNG', '', '', '', 'Capture.PNG', '', '', '', '', '', '', '', 'Mr Patrick Mvuma', '22-08-15'),
(29, '30', '30', '', '', '', '', '', '', '', '', '', '03.png', 'uytr', '', '', '', '', '', '', 'Mr Zerihun Kibret', '22-08-17'),
(30, '33', '31', '', '', '', '', '', '', '', '', '', 'boots-shoe-22081314.jpg', 'uyt', '', '', '', '', '', '', 'Mr Zerihun Kibret', '22-08-17'),
(31, '6', '32', '', '', '', '', '', '', '', '', '', '', '', 'boots-shoe-22081314.jpg', '', '', '', '', '', 'Mr Zerihun Kibret', '22-08-17'),
(32, '34', '33', 'Closed', '', '', 'Capture.PNG', 'dwaerwqe', 'photo_2022-06-16_01-33-02.jpg', 'rweqr', '', '', '', '', '', '', '', '', '', '', 'Mr Zerihun Kibret', '22-08-18'),
(33, '35', '34', 'Closed', '', '', '', '', '', '', '', '', '', '', 'ii.PNG', '', '', '', '', '', 'Mr Zerihun Kibret', '22-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_managementplan`
--

CREATE TABLE `tbl_managementplan` (
  `id` int(11) NOT NULL,
  `Resultsid` varchar(3000) NOT NULL,
  `Patientid` varchar(30) NOT NULL,
  `Management_plan` varchar(3000) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `Status` varchar(3000) NOT NULL,
  `Plan` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(23, '18', '14', 'Come for check up after 1 week', '19-07-30', 'Pay', ''),
(24, '24', '28', '', '22-08-15', 'Pay', ''),
(25, 'No Lab test', '26', '', '22-08-15', 'Pay', ''),
(26, 'No Lab test', '10', '', '22-08-15', 'Pay', ''),
(27, 'No Lab test', '4', '', '22-08-15', 'Pay', ''),
(28, 'No Lab test', '1', '', '22-08-15', 'Pay', ''),
(29, '25', '29', 'hfg', '22-08-15', 'Pay', ''),
(30, '26', '6', '', '22-08-15', 'Pay', ''),
(31, '27', '5', '', '22-08-15', 'Pay', ''),
(32, '28', '3', 'ssssssssssssssssssssssssss', '22-08-15', 'Pay', ''),
(33, '29', '27', '', '22-08-15', 'Pay', ''),
(34, '30', '30', '', '22-08-17', 'Pay', ''),
(35, '31', '33', '', '22-08-17', 'Pay', ''),
(36, '33', '34', 'fghfj', '22-08-18', 'Pay', ''),
(37, '34', '35', '', '22-08-18', 'Pay', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petients`
--

CREATE TABLE `tbl_petients` (
  `id` int(11) NOT NULL,
  `ID_Number` varchar(100) NOT NULL,
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
  `Payment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_petients`
--

INSERT INTO `tbl_petients` (`id`, `ID_Number`, `Mtitle`, `Firstname`, `Middlename`, `Sirname`, `Gender`, `Phone`, `NextKphone`, `DOB`, `Location`, `Relation`, `Guardian`, `Status`, `Status2`, `Date`, `Payment`) VALUES
(1, '', 'Mr', 'Eugene', 'Judza', 'Dzanjalimodzi', 'Male', '26588810635', '26589927365', '1994-09-15', 'Area 47 ', 'Sister', 'Sangwani Dzanja', 'Pharmacy', '', '04-04-19', 'CASH'),
(2, '', 'Miss', 'Wendy', 'Wee', 'Mvuma', 'Female', '26599273553', '265999107524', '2007-05-24', 'Area 49', 'Mother', 'Mwandida Mvuma', 'Admission', 'Admission', '04-04-19', 'CASH'),
(3, '', 'Mr', 'James', 'Jay', 'Mtemwende', 'Male', '26357449976', '253674486645', '2006-02-02', 'Area 25', 'Brother', 'Patrick Mtemwende', 'Pharmacy', 'Treated', '04-04-19', 'CASH'),
(4, '', 'Mr', 'Damison', 'Dam', 'Kathyola', 'Male', '2650886353', '26582353462', '1995-04-13', 'Area 6', 'Wife', 'Mary Kathyola', 'Pharmacy', '', '04-04-19', 'SCHEME'),
(5, '', 'Mr', 'Joe', 'J', 'Kajombo', 'Male', '123764873787', '35737367', '1972-04-06', 'Kanjedza', 'Brother', 'Ted Kajombo', 'Pharmacy', 'Treated', '05-04-19', 'CASH'),
(6, '', 'Mr', 'Maxmos', 'Maxy', 'Maposa', 'Male', '26588826374', '26587366472', '1983-03-10', 'Kanjedza', 'Father', 'George Maposa', 'Pharmacy', '', '05-04-19', 'CASH'),
(7, '', 'Mr', 'Dziko', 'Honcho', 'Ntaba', 'Male', '265888234567', '265999105687', '1997-05-15', 'Area 49', 'Sister', 'Mercy Ntaba', 'Pharmacy', 'Treated', '09-04-19', 'CASH'),
(8, '', 'Miss', 'Monica', 'Mandy', 'Mand', 'Female', '2653845353', '2343366', '2014-04-04', 'Area 43', 'Sister', 'Maria', 'Pharmacy', 'Admission', '09-04-19', 'SCHEME'),
(10, '', 'Mr', 'Maxwell', 'Peter', 'Banda', 'Male', '23464644', '24644474', '2013-03-14', 'Area 23', 'Sister', 'Mercy Gondwe', 'Pharmacy', 'Treated', '09-04-19', 'SCHEME'),
(11, '', 'Miss', 'Glory', 'Gl', 'Bandawe', 'Female', '26588810635', '26588128363', '2012-03-15', 'Area 49', 'Sister', 'Petience Banda', 'Pharmacy', 'Treated', '13-04-19', 'CASH'),
(26, 'L-0001', 'Eg', 'hgfd', 'hgfdh', 'hgf', 'Male', '0935964964', '675', '2022-08-23', 'hgfd', 'Mother', 'hgfd', 'Pharmacy', '', '12-08-22', 'CASH'),
(27, 'L-0002', 'Mr', 'jhfg', 'jhg', 'jfg', 'Male', '0935964964', '8765', '2022-08-07', 'jgf', 'Mother', 'jhfg', 'Pharmacy', 'Treated', '12-08-22', 'CASH'),
(28, 'L-0003', '', 'iuyti', 'iu', 'iuy', 'Male', '0935964964', '8765', '2022-08-03', 'iyt', 'Mother', 'iuyt', 'Treated', 'Treated', '12-08-22', 'CASH'),
(29, 'L-0004', '', 'yrt', 'ytr', 'ytr', 'Male', '0935964964', '643', '2021-02-05', 'ytr', 'Mother', 'yrt', 'Pharmacy', '', '12-08-22', 'CASH'),
(30, 'L-0005', 'Mr', 'aa', 'aa', 'aa', 'Female', '0935964964', '654', '2003-12-28', 'aa', 'Father', 'aa', 'Pharmacy', '', '15-08-22', 'CASH'),
(31, 'L-0006', '', 'trew', '', '', 'Male', '', '', '', '', 'Mother', '', '', '', '17-08-22', 'CASH'),
(32, 'L-0007', '', 'hgf', 'hfd', 'hgfd', 'Female', '0935964964', '75467', '2022-07-31', 'hgf', 'Father', 'hfg', '', '', '17-08-22', 'CASH'),
(33, 'L-0008', 'Mr', 'yyy', 'yyy', 'yyy', 'Male', '0935964964', '654365', '2012-12-31', 'yyy', 'Mother', 'yyy', 'Pharmacy', '', '17-08-22', 'CASH'),
(34, 'L-0009', 'Mrs', 'abebe', 'sdfa', 'fds', 'Male', '0935964964', '5433425', '2007-12-31', 'fsadf', 'Father', 'fdsa', 'Treated', 'Treated', '18-08-22', 'CASH'),
(35, 'L-0010', 'Dr', 'henock', 'tiugpoad', 'tret', 'Female', '0935964964', '654634', '2008-12-28', 'ytrw', 'Aunt', 'ytrety', 'Treated', 'Treated', '18-08-22', 'CASH'),
(36, 'L-0011', '', 'tre', 'tre', 'trew', 'Male', '093596496454', '565', '2022-07-31', 'trew', 'Auncle', 'trew', '', '', '18-08-22', 'CASH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_readings`
--

CREATE TABLE `tbl_readings` (
  `id` int(11) NOT NULL,
  `Patientid` varchar(30) NOT NULL,
  `Date` varchar(300) NOT NULL,
  `Time` varchar(300) NOT NULL,
  `BodyT` varchar(3000) NOT NULL,
  `PulseRate` varchar(3000) NOT NULL,
  `RespirationRate` varchar(3000) NOT NULL,
  `SystolicBP` varchar(3000) NOT NULL,
  `DiastolicBP` varchar(3000) NOT NULL,
  `Oxygensaturation` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_transactions` (
  `id` int(11) NOT NULL,
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
  `Time` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(36, '14', 'Buffen', '196', '2', '7', '3', '600', '1500', '500', 'CASH', '', '19-07-30', '11:26:52 AM'),
(37, '11', 'Quenin', '20', '2', '5', '8.64', '200', '1500', '0', 'CASH', '', '22-08-12', '01:18:06 PM'),
(38, '28', 'Paracetamol', '0', '', '1', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '02:10:39 PM'),
(39, '28', 'Paracetamol', '2', '1', '2', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '02:10:39 PM'),
(40, '28', 'Paracetamol', '1', '1', '1', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '02:10:39 PM'),
(41, '11', 'Quenin', '20', '2', '5', '8.64', '200', '1500', '0', 'CASH', '', '22-08-15', '02:18:34 PM'),
(42, '26', 'Paracetamol', '260', '1', '4', '7.5', '2000', '1500', '500', 'CASH', '', '22-08-15', '02:18:38 PM'),
(43, '10', 'Quenin', '20', '2', '5', '8.64', '200', '1500', '500', 'CASH', '', '22-08-15', '02:19:25 PM'),
(44, '10', 'Paracetamol', '1', '1', '1', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '02:19:25 PM'),
(45, '10', 'Paracetamol', '1', '1', '1', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '02:19:25 PM'),
(46, '4', 'Paracetamol', '1', '1', '1', '7.5', '50', '1500', '0', 'CASH', '', '22-08-15', '02:20:10 PM'),
(47, '4', 'Paracetamol', '1', '1', '1', '7.5', '50', '1500', '0', 'CASH', '', '22-08-15', '02:20:10 PM'),
(48, '4', 'Paracetamol', '1', '1', '1', '7.5', '50', '1500', '0', 'CASH', '', '22-08-15', '02:20:10 PM'),
(49, '1', 'Paracetamol', '1', '1', '1', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '02:21:22 PM'),
(50, '1', 'Paracetamol', '1', '1', '1', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '02:21:22 PM'),
(51, '29', 'Paracetamol', '1', '1', '1', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '02:27:14 PM'),
(52, '3', 'Magnesium', '4', '', '', '3', '50', '1500', '500', 'CASH', '', '22-08-15', '02:27:29 PM'),
(53, '3', 'Paracetamol', '1', '1', '1', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '02:27:30 PM'),
(54, '3', 'Paracetamol', '4', '2', '2', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '02:27:30 PM'),
(55, '3', 'Paracetamol', '4', '2', '2', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '02:27:30 PM'),
(56, '3', 'Paracetamol', '24', '4', '3', '7.5', '200', '1500', '500', 'CASH', '', '22-08-15', '02:27:30 PM'),
(57, '3', 'Paracetamol', '28', '4', '1', '7.5', '250', '1500', '500', 'CASH', '', '22-08-15', '02:27:30 PM'),
(58, '5', 'Paracetamol', '0', '1', '', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '02:27:51 PM'),
(59, '6', 'Paracetamol', '1', '1', '1', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '02:28:00 PM'),
(60, '27', 'Paracetamol', '1', '1', '1', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '04:27:19 PM'),
(61, '27', 'Paracetamol', '2', '1', '2', '7.5', '50', '1500', '500', 'CASH', '', '22-08-15', '04:27:19 PM'),
(62, '33', 'Paracetamol', '1', '1', '1', '7', '50', '1500', '500', 'CASH', '', '22-08-17', '02:44:49 PM'),
(63, '30', 'Paracetamol', '1', '1', '1', '7', '50', '1500', '500', 'CASH', '', '22-08-17', '04:19:55 PM'),
(64, '6', 'Paracetamol', '1', '1', '1', '7', '50', '1500', '500', 'CASH', '', '22-08-17', '04:20:33 PM'),
(65, '6', 'Paracetamol', '2', '1', '2', '7', '50', '1500', '500', 'CASH', '', '22-08-17', '04:20:34 PM'),
(66, '6', 'Paracetamol', '1', '1', '1', '7', '50', '1500', '500', 'CASH', '', '22-08-17', '04:20:34 PM'),
(67, '34', 'Paracetamol', '2', '2', '1', '7', '50', '1500', '500', 'CASH', '', '22-08-18', '07:51:55 AM'),
(68, '34', 'Paracetamol', '8', '2', '2', '7', '100', '1500', '500', 'CASH', '', '22-08-18', '07:51:55 AM'),
(69, '35', 'Paracetamol', '1', '1', '1', '7', '50', '1500', '500', 'CASH', '', '22-08-18', '02:16:20 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treatment`
--

CREATE TABLE `tbl_treatment` (
  `id` int(11) NOT NULL,
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
  `Progress` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(31, '16', '10', 'Quenin', '20', '2', 'BD', '5', 'Drink alot of water', '19-04-13', 'Mr Patrick Mvuma', 'Paid', '', 'Notpaid'),
(32, '17', '13', 'Paracetamol', '10', '1', 'OD', '5', 'take more fluids', '19-07-29', 'Mr Patrick Mvuma', '', '', 'Notpaid'),
(33, '17', '13', 'Paracetamol', '84', '2', 'BD', '7', 'take more fluids', '19-07-29', 'Mr Patrick Mvuma', '', '', 'Notpaid'),
(34, '18', '14', 'La', '49', '1', 'OD', '7', 'Drink more fluids', '19-07-30', 'Mr Patrick Mvuma', 'Paid', '', ''),
(35, '18', '14', 'Buffen', '196', '2', 'BD', '7', 'Drink more fluids', '19-07-30', 'Mr Patrick Mvuma', 'Paid', '', ''),
(36, '24', '28', 'Paracetamol', '0', '', 'TDS', '1', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(37, '24', '28', 'Paracetamol', '2', '1', 'OD', '2', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(38, '24', '28', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(39, 'No Lab test', '26', 'Paracetamol', '260', '1', 'OD', '4', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(40, 'No Lab test', '10', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(41, 'No Lab test', '10', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(42, 'No Lab test', '4', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(43, 'No Lab test', '4', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(44, 'No Lab test', '4', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(45, 'No Lab test', '1', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(46, 'No Lab test', '1', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(47, '25', '29', 'Paracetamol', '1', '1', 'OD', '1', 'hgh', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(48, '26', '6', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(49, '27', '5', 'Paracetamol', '0', '1', 'OD', '', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(50, '28', '3', 'Paracetamol', '1', '1', 'STAT', '1', 'aaaaaaaaaaaaaaaaaaaaaa', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(51, '28', '3', 'Paracetamol', '4', '2', 'BD', '2', 'aaaaaaaaaaaaaaaaaaaaaa', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(52, '28', '3', 'Paracetamol', '4', '2', 'TDS', '2', 'aaaaaaaaaaaaaaaaaaaaaa', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(53, '28', '3', 'Paracetamol', '24', '4', 'QDS', '3', 'aaaaaaaaaaaaaaaaaaaaaa', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(54, '28', '3', 'Paracetamol', '28', '4', 'OTHER', '1', 'aaaaaaaaaaaaaaaaaaaaaa', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(55, '29', '27', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(56, '29', '27', 'Paracetamol', '2', '1', 'OD', '2', '', '22-08-15', 'Mr Patrick Mvuma', 'Paid', '', ''),
(57, '30', '30', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-17', 'Mr Zerihun Kibret', 'Paid', '', ''),
(58, '31', '33', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-17', 'Mr Zerihun Kibret', 'Paid', '', ''),
(59, '32', '6', 'Paracetamol', '2', '1', 'OD', '2', '', '22-08-17', 'Mr Zerihun Kibret', 'Paid', '', ''),
(60, '32', '6', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-17', 'Mr Zerihun Kibret', 'Paid', '', ''),
(61, '33', '34', 'Paracetamol', '2', '2', 'BD', '1', 'tgfhf', '22-08-18', 'Mr Zerihun Kibret', 'Paid', '', ''),
(62, '33', '34', 'Paracetamol', '8', '2', 'TDS', '2', 'tgfhf', '22-08-18', 'Mr Zerihun Kibret', 'Paid', '', ''),
(63, '34', '35', 'Paracetamol', '1', '1', 'OD', '1', '', '22-08-18', 'Mr Zerihun Kibret', 'Paid', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlogs`
--

CREATE TABLE `tbl_userlogs` (
  `id` int(11) NOT NULL,
  `Userid` varchar(300) NOT NULL,
  `Machineip` varchar(300) NOT NULL,
  `Login` varchar(300) NOT NULL,
  `Logout` varchar(300) NOT NULL,
  `Activities` varchar(3000) NOT NULL,
  `Count` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userlogs`
--

INSERT INTO `tbl_userlogs` (`id`, `Userid`, `Machineip`, `Login`, `Logout`, `Activities`, `Count`) VALUES
(1, '6', '56-4B-F5-31-2E-9F', '30-07-2019 10:35:56 AM', '30-07-2019 12:43:57 PM', '', '0'),
(2, '6', 'S0-A6-G4-I0-P3-K5', '12-08-2022 12:47:40 PM', '12-08-2022 01:14:40 PM', 'Registered new patient Pro aaa ter \nPatient aaa ter sent to consultation\nPatient aaa ter sent to lab\nPatient aaa ter lab lab results produced\nPatient aaa ter sent to accounts\nRegistered new patient Miss yared wube \nPatient yared wube sent to consultation\nPatient yared wube sent to lab\nPatient yared wube lab lab results produced\nPatient yared wube sent to accounts\nPatient Wendy Mvuma given medicine', '11'),
(3, '8', 'K5-T9-F7-G9-M0-V1', '12-08-2022 01:15:07 PM', '12-08-2022 01:45:26 PM', 'Patient Glory Bandawe sent to accounts\nPatient Glory Bandawe sent to pharmacy', '2'),
(4, '6', 'A8-T8-F9-M8-L4-J1', '12-08-2022 01:46:02 PM', '', 'Registered new patient  qq ee \nRegistered new patient    \nRegistered new patient fsda  fdsa \nRegistered new patient hgfdh  hgf \nRegistered new patient oiu  oiuy \nRegistered new patient uytr  uyt \nRegistered new patient hgdh Eg hgf \nRegistered new patient nbvc  bvn \nRegistered new patient yre  ytr \nRegistered new patient hgfd Eg hgf \nRegistered new patient jhfg Mr jfg \nRegistered new patient iuyti  iuy \nRegistered new patient yrt  ytr \nPatient hgfd hgf sent to consultation\nPatient Maxwell Banda sent to consultation\nPatient jhfg jfg sent to consultation\nPatient Eugene Dzanjalimodzi sent to consultation\nPatient hgfd hgf sent to lab\nPatient jhfg jfg sent to accounts', '19'),
(6, '8', 'K3-A5-A6-T7-E2-E7', '13-08-2022 10:51:40 AM', '13-08-2022 10:52:24 AM', '', '0'),
(7, '6', 'R8-N4-W4-J2-W4-D9', '13-08-2022 10:52:37 AM', '', '', '0'),
(8, '8', 'V7-L9-J7-Y6-F4-P2', '13-08-2022 10:53:58 AM', '13-08-2022 10:55:11 AM', '', '0'),
(9, '6', 'V9-G9-T2-V7-R6-Z2', '15-08-2022 11:48:48 AM', '', 'Registered new patient Mr aa aa \nPatient iuyti iuy sent to consultation\nPatient iuyti iuy sent to lab\nPatient hgfd hgf lab lab results produced\nPatient iuyti iuy lab lab results produced\nPatient iuyti iuy sent to accounts', '6'),
(11, '6', 'M5-T4-H6-D9-Z6-N8', '15-08-2022 04:19:12 PM', '', 'Patient jhfg jfg sent to consultation\nPatient jhfg jfg sent to lab\nPatient jhfg jfg lab lab results produced\nPatient jhfg jfg sent to accounts\nPatient jhfg jfg sent to pharmacy\nPatient jhfg jfg sent to Pharmacy\nPatient   given medicine', '7'),
(12, '6', 'K9-R6-A9-L8-I7-K5', '16-08-2022 12:43:40 PM', '', '', '0'),
(13, '6', 'N1-W8-B5-C9-U3-H6', '17-08-2022 10:18:28 AM', '17-08-2022 01:29:27 PM', 'Patient Maxmos Maposa sent to consultation\nPatient   sent to consultation\nPatient   sent to consultation\nPatient   sent to consultation\nPatient   sent to consultation\nPatient   sent to consultation\nPatient   sent to consultation\nPatient   sent to consultation\nPatient   sent to consultation\nPatient   sent to consultation\nPatient   sent to consultation\nPatient   sent to consultation\nPatient   sent to consultation', '13'),
(15, '6', 'V8-U0-D6-W5-V9-D5', '17-08-2022 01:30:12 PM', '', '', '0'),
(16, '6', 'U2-J9-D6-R6-F0-C3', '17-08-2022 01:44:35 PM', '', '', '0'),
(17, '6', 'T9-Z7-S0-Y1-H7-E0', '17-08-2022 02:23:02 PM', '17-08-2022 03:21:32 PM', 'Patient aa aa sent to consultation\nPatient aa aa sent to lab\nPatient aa aa lab lab results produced\nPatient aa aa sent to accounts\nRegistered new patient  trew  \nPatient Dziko Ntaba sent to consultation\nRegistered new patient  hgf hgfd \nRegistered new patient Mr yyy yyy \nPatient yyy yyy sent to consultation\nPatient yyy yyy sent to lab\nPatient yyy yyy lab lab results produced\nPatient yyy yyy sent to accounts\nPatient yyy yyy sent to pharmacy\nPatient Dziko Ntaba sent to accounts\nPatient Maxmos Maposa sent to lab\nPatient Maxmos Maposa lab lab results produced\nPatient Maxmos Maposa sent to accounts', '17'),
(18, '6', 'I4-Q4-V9-T3-P9-S1', '17-08-2022 03:08:41 PM', '', '', '0'),
(19, '6', 'R7-B6-I8-C2-Z0-X4', '17-08-2022 03:21:45 PM', '17-08-2022 03:25:46 PM', '', '0'),
(20, '6', 'H5-K2-T5-G7-P8-V3', '17-08-2022 03:26:32 PM', '', 'Patient aa aa sent to pharmacy\nPatient yyy yyy sent to Pharmacy\nPatient Dziko Ntaba sent to Pharmacy\nPatient aa aa sent to Pharmacy\nPatient Maxmos Maposa sent to pharmacy\nPatient Maxmos Maposa sent to Pharmacy\nStaff Zerihun Kibret logs deleted from the system', '7'),
(21, '6', 'X0-K1-G7-B2-M8-F4', '18-08-2022 07:48:07 AM', '18-08-2022 07:55:27 AM', 'Registered new patient Mrs abebe fds \nPatient abebe fds sent to consultation\nPatient abebe fds sent to lab\nPatient abebe fds lab lab results produced\nPatient abebe fds sent to accounts\nPatient abebe fds sent to pharmacy\nPatient abebe fds sent to Pharmacy\nPatient abebe fds given medicine\nStaff Zerihun Kibret logs deleted from the system', '9'),
(22, '6', 'L1-Y1-C7-U0-R8-J1', '18-08-2022 12:37:00 PM', '', '', '0'),
(23, '6', 'F8-O9-D4-V8-T4-R0', '18-08-2022 01:41:17 PM', '', '', '0'),
(24, '6', 'D2-P9-N9-H7-U9-D6', '18-08-2022 02:12:20 PM', '', 'Registered new patient Dr henock tret \nPatient henock tret sent to consultation\nPatient henock tret sent to lab\nPatient henock tret lab lab results produced\nPatient henock tret sent to accounts\nPatient henock tret sent to pharmacy\nPatient henock tret sent to Pharmacy\nPatient henock tret given medicine\nRegistered new patient  tre trew ', '9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userprivilages`
--

CREATE TABLE `tbl_userprivilages` (
  `id` int(11) NOT NULL,
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
  `Monthlyreport` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userprivilages`
--

INSERT INTO `tbl_userprivilages` (`id`, `Userid`, `Adduser`, `Manageuser`, `Logactivities`, `Addpatient`, `Editpatient`, `Managepatient`, `Consultation`, `Labaccess`, `Accountaccess`, `Givedrugs`, `Adddrugs`, `Managedrugs`, `Todayssales`, `Todaystreat`, `Monthlyreport`) VALUES
(1, '6', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(2, '8', 'No', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
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
  `Time` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `Firstname`, `Sirname`, `Mtitle`, `Pic_name`, `Phone`, `Email`, `Password`, `Role`, `State`, `Online`, `Time`) VALUES
(6, 'Zerihun', 'Kibret', 'Mr', 'IMG_9624===1122.jpg', '2659992865', 'test@clinic.com', '1234554321', 'Medical Doctor', 'Super', 'Online', 1660824741),
(8, 'Anderson', 'Banda', 'Mr', '', '2659999107725', 'anderson@gmail.com', '90000', 'Medical Doctor', '', 'Offline', 1660380838);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendors`
--

CREATE TABLE `tbl_vendors` (
  `id` int(11) NOT NULL,
  `Fullname` varchar(300) NOT NULL,
  `Location` varchar(300) NOT NULL,
  `Phone` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `DOP` varchar(300) NOT NULL,
  `Drugid` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vendors`
--

INSERT INTO `tbl_vendors` (`id`, `Fullname`, `Location`, `Phone`, `Email`, `DOP`, `Drugid`) VALUES
(3, 'Medical Stores', 'Lilongw', '265888876600', 'medicalstore@gmail.com', '2019-03-22', '1'),
(4, 'James Kamanga', 'Lilongwe', '265888192726', 'james@yahoo.com', '2019-03-06', '2'),
(5, 'Chikondi Mandala', 'Nyambadwe', '26582736355', 'chiko@yahoo.com', '2019-03-05', '3'),
(6, 'Chikondi Nkhama', 'Lilongwe', '265182753536', 'chikondi@yahoo.com', '2018-01-01', '4'),
(7, 'Grant Manda', 'Bangwe', '26543338163', 'grant@gmail.com', '2018-03-08', '5'),
(8, 'Intermed', 'Lilongwe', '017500035', 'info@intermedmw.com', '2018-01-07', '6'),
(9, 'Intermed', 'Lilongwe', '26543338163', 'medicalstore@gmail.com', '2019-04-24', '7'),
(10, 'Medicines', 'Chilambula', '253533', 'mvumaparick@yahoo.com', '2022-08-26', '8'),
(11, 'Medicines', 'Kanjedza', '2535342233', 'mvumaparick@yahoo.com', '19/05/24', '9'),
(12, '', '', '', '', '', '10'),
(13, '', '', '', '', '', '11'),
(14, '', '', '', '', '', '12'),
(15, 'Medicines', 'Chilambula', '1324', 'mvumaparick@yahoo.com', '2022-08-01', '13'),
(16, 'tre', 'trew', '16543', 'tewr', '2020-12-27', '14'),
(17, 'uy', 'uyrt', 'uyrt', 'tewr@trew', '2022-08-04', '15'),
(18, 'tret', 'trew', '76', 'tewr@trew', '2015-12-27', '16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excelfiles`
--
ALTER TABLE `excelfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_drugs`
--
ALTER TABLE `tbl_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_icd10`
--
ALTER TABLE `tbl_icd10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_laboratory`
--
ALTER TABLE `tbl_laboratory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_labresults`
--
ALTER TABLE `tbl_labresults`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_managementplan`
--
ALTER TABLE `tbl_managementplan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_petients`
--
ALTER TABLE `tbl_petients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID Number` (`ID_Number`);

--
-- Indexes for table `tbl_readings`
--
ALTER TABLE `tbl_readings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_userlogs`
--
ALTER TABLE `tbl_userlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_userprivilages`
--
ALTER TABLE `tbl_userprivilages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vendors`
--
ALTER TABLE `tbl_vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `excelfiles`
--
ALTER TABLE `excelfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_drugs`
--
ALTER TABLE `tbl_drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_icd10`
--
ALTER TABLE `tbl_icd10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_laboratory`
--
ALTER TABLE `tbl_laboratory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_labresults`
--
ALTER TABLE `tbl_labresults`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_managementplan`
--
ALTER TABLE `tbl_managementplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_petients`
--
ALTER TABLE `tbl_petients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_readings`
--
ALTER TABLE `tbl_readings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_userlogs`
--
ALTER TABLE `tbl_userlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_userprivilages`
--
ALTER TABLE `tbl_userprivilages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_vendors`
--
ALTER TABLE `tbl_vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
