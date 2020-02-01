-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 06:39 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midass`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `highsale`
-- (See below for the actual view)
--
CREATE TABLE `highsale` (
`id` bigint(19)
,`amount` int(12)
,`time` time
,`date` date
);

-- --------------------------------------------------------

--
-- Table structure for table `purchaselineitem`
--

CREATE TABLE `purchaselineitem` (
  `id` int(22) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_quantity` int(12) NOT NULL,
  `pro_price` int(22) NOT NULL,
  `purchase_id` bigint(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaselineitem`
--

INSERT INTO `purchaselineitem` (`id`, `pro_id`, `pro_quantity`, `pro_price`, `purchase_id`) VALUES
(1, 48, 20, 1880, 1),
(2, 137, 10, 1275, 2),
(3, 136, 28, 1240, 2),
(4, 139, 2, 2200, 2),
(5, 140, 1, 2600, 2),
(6, 141, 2, 2150, 2),
(7, 207, 62, 255, 3),
(8, 208, 15, 255, 3),
(9, 209, 25, 255, 3),
(10, 210, 100, 120, 3),
(11, 230, 24, 475, 4),
(12, 224, 8, 1300, 4),
(13, 74, 12, 1600, 5),
(14, 75, 1, 1600, 5),
(15, 80, 1, 1500, 5),
(16, 6, 1, 1397, 5),
(17, 1, 5, 1500, 6),
(18, 2, 5, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `subshopexpense`
--

CREATE TABLE `subshopexpense` (
  `id` bigint(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `expenseamount` int(22) NOT NULL,
  `recivedcash` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subshopexpense`
--

INSERT INTO `subshopexpense` (`id`, `date`, `time`, `expenseamount`, `recivedcash`) VALUES
(1, '2018-08-07', '15:16:29', 0, 5000),
(2, '2018-08-09', '21:22:07', 50, 3250),
(3, '2018-08-12', '21:33:20', 100, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `sup_installments`
--

CREATE TABLE `sup_installments` (
  `ID` bigint(33) NOT NULL,
  `sup_id` int(22) NOT NULL,
  `price` int(15) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sup_installments`
--

INSERT INTO `sup_installments` (`ID`, `sup_id`, `price`, `Date`, `Time`) VALUES
(1, 56, 15000, '2018-08-08', '19:54:48'),
(2, 72, 15000, '2018-08-08', '19:55:26'),
(3, 62, 5000, '2018-08-08', '20:46:24'),
(4, 60, 35000, '2018-08-08', '20:46:45'),
(5, 58, 25000, '2018-08-09', '17:02:31'),
(6, 53, 2000, '2018-08-09', '19:24:45'),
(7, 55, 5000, '2018-08-10', '11:47:41'),
(8, 69, 40000, '2018-08-12', '10:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl-supplier`
--

CREATE TABLE `tbl-supplier` (
  `sup_id` int(15) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_address` text NOT NULL,
  `sup_email` varchar(60) NOT NULL,
  `sup_AC` int(22) NOT NULL,
  `sup_payment` int(15) NOT NULL,
  `sup_contact` varchar(12) NOT NULL,
  `sup_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coustmer`
--

CREATE TABLE `tbl_coustmer` (
  `cou_id` int(22) NOT NULL,
  `cou_name` varchar(100) NOT NULL,
  `cou_address` text,
  `cou_email` varchar(40) DEFAULT NULL,
  `cou_AC` int(22) DEFAULT NULL,
  `cou_payment` int(15) NOT NULL DEFAULT '0',
  `cou_contact` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_coustmer`
--

INSERT INTO `tbl_coustmer` (`cou_id`, `cou_name`, `cou_address`, `cou_email`, `cou_AC`, `cou_payment`, `cou_contact`) VALUES
(1, 'geelani restaurant ', 'peeran ghaib road multan', '', 0, 600, '3003288800'),
(2, 'faiz chowk munda', '', '', 0, 0, '3007360466'),
(3, 'Mudassar Faheem Bhatti', 'Gujrawala Punjab Pakistan', 'xyz@gmail.com', 555555, 12200, '3161403162');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE `tbl_expense` (
  `id` int(22) NOT NULL,
  `expense_name` varchar(22) NOT NULL,
  `price` int(22) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` int(22) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_quantity` int(12) NOT NULL,
  `pro_dateofarrival` date DEFAULT NULL,
  `pro_supplierid` int(22) NOT NULL,
  `pro_peritemprice` int(22) NOT NULL,
  `pro_producttype` varchar(100) NOT NULL,
  `pro_subquantity` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `pro_name`, `pro_quantity`, `pro_dateofarrival`, `pro_supplierid`, `pro_peritemprice`, `pro_producttype`, `pro_subquantity`) VALUES
(1, 'starco-101', 0, '2019-06-29', 56, 1500, 'GasAppliances', 0),
(2, 'starco 121', 8, '2019-06-29', 56, 2, 'GasAppliances', 0),
(3, 'starco-131', 6, '2018-08-07', 56, 2080, 'GasAppliances', 0),
(4, 'starco-141', 2, '2018-08-07', 56, 2280, 'GasAppliances', 0),
(5, 'starco-202', 5, '2018-08-07', 56, 1960, 'GasAppliances', 0),
(6, 'starco-232', 3, '2018-08-19', 56, 1397, 'GasAppliances', 1),
(7, 'starco-303', 3, '2018-08-07', 56, 2120, 'GasAppliances', 1),
(8, 'starco-313', 4, '2018-08-07', 56, 2360, 'GasAppliances', 0),
(9, 'starco-404', 4, '2018-08-07', 56, 2200, 'GasAppliances', 0),
(10, 'starco-414', 3, '2018-08-07', 56, 2480, 'GasAppliances', 1),
(11, 'starco-11', 4, '2018-08-07', 56, 1120, 'GasAppliances', 0),
(12, 'starco-22', 3, '2018-08-07', 56, 1200, 'GasAppliances', 0),
(13, 'starco-33', 7, '2018-08-07', 56, 1400, 'GasAppliances', 0),
(14, 'starco-111', 8, '2018-08-07', 56, 1360, 'GasAppliances', 0),
(15, 'starco-20', 1, '2018-08-07', 56, 2080, 'GasAppliances', 0),
(16, 'starco-40', 8, '2018-08-07', 56, 2120, 'GasAppliances', 0),
(17, 'starco-444', 5, '2018-08-07', 56, 1760, 'GasAppliances', 2),
(18, 'starco-312', 2, '2018-08-07', 56, 1280, 'GasAppliances', 2),
(19, 'sstarco-310', 1, '2018-08-07', 56, 1120, 'GasAppliances', 0),
(20, 'starco-886', 2, '2018-08-07', 56, 2800, 'GasAppliances', 0),
(21, 'starco-555', 1, '2018-08-07', 56, 1800, 'GasAppliances', 0),
(22, 'starco geyser 35 gallon', 1, '2018-08-07', 56, 13200, 'GasAppliances', 0),
(23, 'starco gayser 25 gallon', 1, '2018-08-07', 56, 12400, 'GasAppliances', 0),
(24, 'starco-327', 1, '2018-08-07', 56, 11600, 'GasAppliances', 0),
(25, 'starco-534', 1, '2018-08-07', 56, 14800, 'GasAppliances', 0),
(26, 'starco-534g', 0, '2018-08-07', 56, 16500, 'GasAppliances', 0),
(27, 'starco-334', 0, '2018-08-07', 56, 1120, 'GasAppliances', 1),
(28, 'parco-gl z 45', 3, '2018-08-07', 57, 6500, '', 0),
(31, 'parco GL 3500', 0, '2018-08-07', 57, 6300, 'GasAppliances', 0),
(32, 'parco gl 3400', 2, '2018-08-07', 57, 6500, 'GasAppliances', 0),
(33, 'parco st 004 ', 7, '2018-08-07', 57, 5900, 'GasAppliances', 0),
(35, 'parco  gl 035', 2, '2018-08-07', 57, 6000, 'GasAppliances', 0),
(36, 'parco gl 034', 2, '2018-08-07', 57, 6000, 'GasAppliances', 0),
(37, 'parco GL ze 30', 3, '2018-08-07', 57, 6500, 'GasAppliances', 0),
(38, 'parrco gl ze 25', 1, '2018-08-07', 57, 6500, 'GasAppliances', 0),
(39, 'parco gl 013 a2', 4, '2018-08-07', 57, 4900, 'GasAppliances', 0),
(40, 'parco st 8232', 3, '2018-08-07', 57, 5900, 'GasAppliances', 0),
(41, 'parco st 7319', 2, '2018-08-07', 57, 7000, 'GasAppliances', 0),
(42, 'parco st 007', 2, '2018-08-07', 57, 5900, 'GasAppliances', 0),
(43, 'parco st 012 A2', 3, '2018-08-07', 57, 4900, 'GasAppliances', 0),
(44, 'parco st 008', 1, '2018-08-07', 57, 5900, 'GasAppliances', 0),
(45, 'parco st  005', 2, '2018-08-07', 57, 5900, 'GasAppliances', 0),
(46, 'parco  s 404', 5, '2018-08-07', 57, 1920, 'GasAppliances', 0),
(47, 'parco 202 S', 17, '2018-08-07', 57, 1000, 'GasAppliances', 0),
(48, 'parco 303 T/C', 15, '2018-08-07', 57, 1880, 'GasAppliances', 0),
(49, 'parco 303 S', 17, '2018-08-07', 57, 2360, 'GasAppliances', 1),
(50, 'parco hood 777', 2, '2018-08-07', 57, 13000, 'GasAppliances', 0),
(51, 'parco hood 220', 2, '2018-08-07', 57, 10500, 'GasAppliances', 0),
(52, 'parco 202 T/C ', 12, '2018-08-07', 57, 880, 'GasAppliances', 0),
(53, 'parco 606 S', 2, '2018-08-07', 57, 1720, 'GasAppliances', 0),
(54, 'parco  505 toaster', 3, '2018-08-07', 57, 1480, 'GasAppliances', 0),
(55, 'parco 505 S', 1, '2018-08-07', 57, 1320, 'GasAppliances', 0),
(56, 'parco 404 T/C', 1, '2018-08-07', 57, 1680, 'GasAppliances', 0),
(57, 'parco 100 T/C', 1, '2018-08-07', 57, 2160, 'GasAppliances', 0),
(58, 'parco  st 001 ', 1, '2018-08-07', 57, 8500, 'GasAppliances', 0),
(59, 'parco  908 double', 1, '2018-08-07', 57, 2880, 'GasAppliances', 0),
(60, 'parco 910', 1, '2018-08-07', 57, 3600, 'GasAppliances', 0),
(61, 'parco 907', 1, '2018-08-07', 57, 5280, 'GasAppliances', 0),
(62, 'parco 666 ', 2, '2018-08-07', 57, 5000, 'GasAppliances', 0),
(63, 'parco 110 HOOD', 7, '2018-08-07', 57, 10000, 'GasAppliances', 0),
(64, 'parco gl 55', 1, '2018-08-07', 57, 6300, 'GasAppliances', 0),
(65, 'parco 210 a china', 2, '2018-08-07', 57, 2700, 'GasAppliances', 0),
(66, 'parco 210 n', 3, '2018-08-07', 57, 2800, 'GasAppliances', 0),
(67, 'parco s3 01', 9, '2018-08-07', 57, 3800, 'GasAppliances', 0),
(68, 'parco 30003 ', 2, '2018-08-07', 57, 9500, 'GasAppliances', 0),
(69, 'parco HM 58020', 1, '2018-08-07', 57, 13500, 'GasAppliances', 0),
(70, 'parco 666 HOOD', 1, '2018-08-07', 57, 11500, 'GasAppliances', 0),
(71, 'parco GL 777', 1, '2018-08-07', 57, 4500, 'GasAppliances', 0),
(72, 'parco 999', 1, '2018-08-07', 57, 5000, 'GasAppliances', 0),
(73, 'parco royal class', 1, '2018-08-07', 57, 1650, 'GasAppliances', 0),
(74, 'nas gas DG-06L crystal glass', 15, '2018-08-19', 71, 1600, 'GasAppliances', 0),
(75, 'nas gas DG-08L Crystal Glass', 4, '2018-08-19', 71, 1600, 'GasAppliances', 0),
(76, 'nas gas DG-10L Crystal Glass', 0, '2018-08-07', 71, 10000, 'GasAppliances', 0),
(77, 'nas gas DG-07L Gold', 0, '2018-08-07', 71, 7400, 'GasAppliances', 0),
(78, 'nas gas DG-444 REG                                                                                  ', 0, '2018-08-07', 71, 8375, 'GasAppliances', 0),
(79, 'nas gas   DG-GN2', 1, '2018-08-07', 71, 6600, 'GasAppliances', 0),
(80, 'nas gas DG-111 REG', 0, '2018-08-19', 71, 1500, 'GasAppliances', 0),
(81, 'nas gas DG-333 REG', 1, '2018-08-07', 71, 7575, 'GasAppliances', 0),
(82, 'nas gas DG-590 4B', 1, '2018-08-07', 71, 8600, 'GasAppliances', 0),
(83, 'nas gas KHD-280  ', 1, '2018-08-07', 71, 14750, 'GasAppliances', 0),
(84, 'nas gas DG-1077 Single', 13, '2018-08-07', 71, 550, 'GasAppliances', 0),
(85, 'nas gas DG-112S', 1, '2018-08-07', 71, 3000, 'GasAppliances', 0),
(86, 'nas gas DG-109D Paint', 4, '2018-08-07', 71, 2125, 'GasAppliances', 0),
(87, 'nas gas DG-109 T/C ', 2, '2018-08-07', 71, 2325, 'GasAppliances', 0),
(88, 'nas gas SH 666', 3, '2018-08-07', 71, 11500, 'GasAppliances', 0),
(89, 'nas gas  SH 777', 3, '2018-08-07', 71, 12500, 'GasAppliances', 0),
(90, 'nas gas SG-534 EXM', 1, '2018-08-07', 71, 28300, 'GasAppliances', 0),
(91, 'nas gas DG-226S', 2, '2018-08-08', 71, 9500, 'GasAppliances', 0),
(92, 'nas gas DG-07L Super', 1, '2018-08-08', 71, 7500, 'GasAppliances', 0),
(93, 'nas gas DG-08L Super', 1, '2018-08-08', 71, 9500, 'GasAppliances', 0),
(94, 'nas gs DG-GN5', 1, '2018-08-08', 71, 10950, 'GasAppliances', 0),
(95, 'shabaz 101S', 10, '2018-08-08', 66, 1250, 'GasAppliances', 2),
(96, 'shabaz 303S', 9, '2018-08-08', 66, 1600, 'GasAppliances', 1),
(97, 'shabaz 606S', 13, '2018-08-08', 66, 1500, 'GasAppliances', 1),
(98, 'shabaz 606 T/C', 12, '2018-08-08', 66, 1400, 'GasAppliances', 6),
(99, 'shabaz 1111S', 8, '2018-08-08', 66, 2150, 'GasAppliances', 0),
(100, 'shabaz 999 H', 9, '2018-08-08', 66, 1300, 'GasAppliances', 1),
(101, 'shabaz 888 H', 15, '2018-08-08', 66, 1350, 'GasAppliances', 1),
(102, 'shabaz 666 H', 7, '2018-08-08', 66, 1100, 'GasAppliances', 0),
(103, 'shabaz 777 H', 5, '2018-08-08', 66, 1350, 'GasAppliances', 1),
(104, 'shabaz tandoor 6', 23, '2018-08-08', 66, 2850, 'GasAppliances', 0),
(105, 'shabaz tandoor 4 P', 26, '2018-08-08', 66, 2250, '', 0),
(108, 'shabaz tandoor  4 S', 1, '2018-08-08', 66, 2500, 'GasAppliances', 0),
(109, 'shabaz tandoor 6 S', 16, '2018-08-08', 66, 3200, 'GasAppliances', 0),
(110, 'shabaz  1111 S single', 5, '2018-08-08', 66, 1150, 'GasAppliances', 0),
(111, 'shabaz 1111S single auto ', 1, '2018-08-08', 66, 1400, 'GasAppliances', 0),
(112, 'shabaz 1111  T/C Single', 5, '2018-08-08', 66, 1050, 'GasAppliances', 0),
(113, 'shabaz 1111 T/C single auto', 2, '2018-08-08', 66, 1400, 'GasAppliances', 0),
(114, 'shabaz 555 S', 8, '2018-08-08', 66, 1450, 'GasAppliances', 1),
(115, 'shabz 101 S Tooster', 9, '2018-08-08', 66, 1400, 'GasAppliances', 2),
(116, 'shabaz 404 auto ', 1, '2018-08-08', 66, 2700, 'GasAppliances', 0),
(117, 'shabaz  sanyo single', 2, '2018-08-08', 66, 580, 'GasAppliances', 0),
(118, 'shabaz  sanyo single auto ', 1, '2018-08-08', 66, 900, 'GasAppliances', 0),
(119, 'shabaz lahori bara T/C', 4, '2018-08-08', 66, 2400, 'GasAppliances', 0),
(120, 'shabaz gojra T/C', 0, '2018-08-08', 66, 1700, 'GasAppliances', 1),
(121, 'shabaz dabbi jali T/C', 19, '2018-08-08', 66, 1200, 'GasAppliances', 2),
(122, 'shabaz tapper T/C', 1, '2018-08-08', 66, 950, 'GasAppliances', 1),
(123, 'shabaz tapper tooster T/C', 6, '2018-08-08', 66, 1120, 'GasAppliances', 2),
(124, 'shabaz 1111 T/C', 2, '2018-08-08', 66, 2000, 'GasAppliances', 0),
(125, 'shabaz st three burnner hobb', 4, '2018-08-08', 66, 6500, 'GasAppliances', 0),
(126, 'shabaz GL three burnner hobb', 6, '2018-08-08', 66, 6500, 'GasAppliances', 0),
(127, 'shabaz 100 auto', 25, '2018-08-08', 66, 2000, 'GasAppliances', 2),
(128, 'shabaz 200 auto ', 12, '2018-08-08', 66, 2100, 'GasAppliances', 3),
(129, 'shabaz 300 auro', 3, '2018-08-08', 66, 2750, 'GasAppliances', 0),
(130, 'shabz 400 auto ', 5, '2018-08-08', 66, 2800, 'GasAppliances', 0),
(131, 'shabaz 500 auto ', 4, '2018-08-08', 66, 2850, 'GasAppliances', 0),
(132, 'shabaz  single auto china', 9, '2018-08-08', 66, 1150, 'GasAppliances', 0),
(133, 'shabaz single auto fancy china', 7, '2018-08-08', 66, 1250, 'GasAppliances', 0),
(134, 'shabaz gojra s ', 7, '2018-08-08', 66, 1650, 'GasAppliances', 2),
(135, 'shabaz dabbi jali s', 2, '2018-08-08', 66, 1400, 'GasAppliances', 0),
(136, 'gentry  1100 T?C', 29, '2018-08-08', 73, 1240, 'GasAppliances', 0),
(137, 'gentry 1200 s ', 10, '2018-08-08', 73, 1275, 'GasAppliances', 0),
(138, 'gentry 100 light T/C', 7, '2018-08-08', 73, 600, 'GasAppliances', 1),
(139, 'gentry 786 T/C', 2, '2018-08-08', 73, 2200, 'GasAppliances', 0),
(140, 'gentry 1300 s', 1, '2018-08-08', 73, 2600, 'GasAppliances', 0),
(141, 'gentry two in one s', 2, '2018-08-08', 73, 2150, 'GasAppliances', 0),
(142, 'spinal single heavey p', 7, '2018-08-08', 75, 850, 'GasAppliances', 0),
(143, 'spinal single heavey s', 8, '2018-08-08', 75, 950, 'GasAppliances', 0),
(144, 'spinal single snyo s', 25, '2018-08-08', 75, 580, 'GasAppliances', 0),
(145, 'onex x 52 ', 2, '2018-08-08', 72, 3000, 'GasAppliances', 0),
(146, 'onex s 60', 4, '2018-08-08', 72, 3000, 'GasAppliances', 0),
(147, 'onex s 303', 1, '2018-08-08', 72, 3500, 'GasAppliances', 1),
(148, 'onex gl 444 hobb', 1, '2018-08-08', 72, 6000, 'GasAppliances', 0),
(149, 'onex st 333 hobb', 1, '2018-08-08', 72, 5800, 'GasAppliances', 0),
(150, 'geo star   single sanyo ', 20, '2018-08-08', 63, 460, 'GasAppliances', 0),
(151, 'geo star single tapper T/C', 15, '2018-08-08', 63, 530, 'GasAppliances', 0),
(152, 'geo star double tapper T/C', 20, '2018-08-08', 63, 1250, 'GasAppliances', 0),
(153, 'geo star double tapper s', 10, '2018-08-08', 63, 1250, 'GasAppliances', 0),
(154, 'geo star 595 hobb', 4, '2018-08-08', 63, 3500, 'GasAppliances', 0),
(155, 'geo star 588 hobb', 3, '2018-08-08', 63, 2700, 'GasAppliances', 1),
(156, 'geo star 587 hobb', 5, '2018-08-08', 63, 2700, 'GasAppliances', 1),
(157, 'geo star 595 5 burnner', 1, '2018-08-08', 63, 5500, 'GasAppliances', 0),
(158, 'geo star 586 hobb', 1, '2018-08-08', 63, 2700, 'GasAppliances', 0),
(159, 'geo star 586 degi jalli', 2, '2018-08-08', 63, 2800, 'GasAppliances', 0),
(160, 'abid 10 kg 18 G', 33, '2018-08-09', 76, 780, 'GasAppliances', 1),
(161, 'gm tandoor 6', 10, '2018-08-09', 67, 2700, 'GasAppliances', 0),
(162, 'gm tandoor 6 jali ', 4, '2018-08-09', 67, 2000, 'GasAppliances', 0),
(163, 'gm tandoor 8 jali', 2, '2018-08-09', 67, 2500, 'GasAppliances', 0),
(164, 'gm tandoor 10 s', 2, '2018-08-09', 67, 5500, 'GasAppliances', 0),
(165, 'gm tandoor 12 s', 1, '2018-08-09', 67, 6500, 'GasAppliances', 0),
(166, 'gm tanddor 6 ball volve', 0, '2018-08-09', 67, 3500, 'GasAppliances', 0),
(167, 'gm double burnner GL', 1, '2018-08-09', 67, 3500, 'GasAppliances', 0),
(168, 'gm double burnner national', 1, '2018-08-09', 67, 3000, 'GasAppliances', 0),
(169, 'cylinder 4 Kg 16 G  zain star ', 23, '2018-08-09', 77, 950, 'GasAppliances', 0),
(170, 'cylinder 2 kg 16 G ', 1, '2018-08-09', 77, 620, 'GasAppliances', 0),
(171, 'cyllinder 8 Kg 16 G', 1, '2018-08-09', 77, 820, 'GasAppliances', 0),
(172, 'wider cylinder 4 Kg 14 G', 1, '2018-08-09', 77, 1250, 'GasAppliances', 0),
(173, 'wider cylinder 8 Kg 14 G', 1, '2018-08-09', 77, 1650, 'GasAppliances', 0),
(174, 'puma 4Kg 14 G', 1, '2018-08-09', 78, 1350, 'GasAppliances', 0),
(175, 'A1star 4 kg 16G', 7, '2018-08-09', 60, 720, 'GasAppliances', 11),
(176, 'A1star 4 kg 14G', 3, '2018-08-09', 60, 1050, 'GasAppliances', 2),
(177, 'A1star 6 kg 14G', 2, '2018-08-09', 60, 1200, 'GasAppliances', 3),
(178, 'A1star 2 kg 16G', 1, '2018-08-09', 60, 620, 'GasAppliances', 0),
(179, 'A1star 2 kg 14G', 1, '2018-08-09', 60, 900, 'GasAppliances', 0),
(180, 'A1star 10 kg 16G', 3, '2018-08-09', 60, 1050, 'GasAppliances', 0),
(181, 'A1star 6 kg 16G', 1, '2018-08-09', 60, 820, 'GasAppliances', 0),
(182, 'domestic lub', 1, '2018-08-09', 60, 2350, 'GasAppliances', 0),
(183, 'domestic fon', 0, '2018-08-09', 60, 2350, 'GasAppliances', 0),
(184, 'super star 4kg', 10, '2018-08-09', 64, 1250, 'GasAppliances', 2),
(185, 'super star 6kg', 4, '2018-08-09', 64, 1450, 'GasAppliances', 1),
(188, 'abid 4 kg 16 G', 23, '2018-08-09', 76, 720, 'GasAppliances', 0),
(189, 'abid 8 kg 18 G', 29, '2018-08-09', 76, 730, 'GasAppliances', 0),
(190, 'abid 6 Kg 18 G', 2, '2018-08-09', 76, 680, 'GasAppliances', 0),
(191, 'abid 8 Kg 16 G', 1, '2018-08-09', 76, 900, 'GasAppliances', 0),
(192, 'abid 2 Kg 16 G  ', 9, '2018-08-09', 76, 620, 'GasAppliances', 0),
(193, 'power 2 Kg 16 G', 16, '2018-08-09', 54, 620, 'GasAppliances', 0),
(194, 'power 4 kg 14 G', 18, '2018-08-09', 54, 1350, 'GasAppliances', 0),
(195, 'power 8 Kg 14 G', 2, '2018-08-09', 54, 1700, 'GasAppliances', 0),
(196, 'power 2 Kg 14 G', 2, '2018-08-09', 54, 1150, 'GasAppliances', 0),
(197, 'one star 2 Kg 18 G', 70, '2018-08-09', 54, 440, 'GasAppliances', 0),
(198, 'one star 4 Kg 18 G', 26, '2018-08-09', 54, 540, 'GasAppliances', 0),
(199, 'one star 8 Kg 18G', 4, '2018-08-09', 54, 780, 'GasAppliances', 0),
(200, 'super star 4kg picnic', 4, '2018-08-10', 64, 1450, 'GasAppliances', 0),
(201, 'super star 6kg picnic', 0, '2018-08-10', 53, 1600, 'GasAppliances', 0),
(202, 'super star 8 kg picnic', 8, '2018-08-10', 53, 1700, 'GasAppliances', 0),
(203, 'super star 10 kg picnic', 9, '2018-08-10', 53, 1850, 'GasAppliances', 0),
(204, 'power 10 kg 16 G', 5, '2018-08-10', 53, 920, 'GasAppliances', 0),
(205, 'power 8 Kg 16 G', 2, '2018-08-10', 53, 820, 'GasAppliances', 0),
(206, 'asif 4 kg 16 G tablighi', 1, '2018-08-10', 53, 750, 'GasAppliances', 0),
(207, 'top star regulator full bross 20', 61, '2018-08-11', 53, 255, 'GasAppliances', 0),
(208, 'top star regulator full bross 21', 30, '2018-08-11', 53, 255, 'GasAppliances', 0),
(209, 'top star regulator full bross 22', 25, '2018-08-11', 53, 255, 'GasAppliances', 0),
(210, 'top star regulator minni', 100, '2018-08-11', 53, 120, 'GasAppliances', 0),
(211, '4\"angiyhy  nm', 0, '2018-08-11', 69, 230, '', 0),
(212, 'style single heavy 2 in 1 t/c', 4, '2018-08-11', 65, 1350, 'GasAppliances', 1),
(213, 'style single heavy s', 1, '2018-08-11', 65, 1050, 'GasAppliances', 2),
(214, 'style single heavy 2 in 1 s', 1, '2018-08-11', 65, 1450, 'GasAppliances', 0),
(215, 'style single heavy t/c', 2, '2018-08-11', 65, 950, 'GasAppliances', 0),
(216, 'style 503 s', 5, '2018-08-11', 65, 2200, 'GasAppliances', 0),
(217, 'style 503 2 in 1 s', 4, '2018-08-11', 65, 2500, 'GasAppliances', 0),
(218, 'geo star 599 non magnet', 1, '2018-08-11', 63, 4500, 'GasAppliances', 0),
(219, 'angethi  4 ', 97, '2018-08-11', 59, 240, 'GasAppliances', 5),
(220, 'angethi 6 nm ', 40, '2018-08-11', 69, 330, 'GasAppliances', 4),
(221, 'angethi 9 nm', 23, '2018-08-11', 69, 500, 'GasAppliances', 6),
(222, 'angethi 10 nm', 25, '2018-08-11', 69, 575, 'GasAppliances', 5),
(223, 'angethi 12 full heavey nm', 15, '2018-08-11', 69, 1650, 'GasAppliances', 2),
(224, 'angethi 12 nm', 6, '2018-08-11', 69, 1300, 'GasAppliances', 0),
(225, 'angethi 12 ', 18, '2018-08-11', 59, 1300, 'GasAppliances', 1),
(226, 'angethi 15 ', 5, '2018-08-11', 60, 2350, 'GasAppliances', 1),
(227, 'relex single full heavey T/C', 9, '2018-08-11', 69, 1100, 'GasAppliances', 0),
(228, 'relex   double burnner full heavey ', 9, '2018-08-11', 69, 2400, 'GasAppliances', 0),
(229, 'relex single light T/C', 8, '2018-08-11', 69, 460, 'GasAppliances', 1),
(230, 'relex single light paint ', 24, '2018-08-11', 69, 475, 'GasAppliances', 1),
(231, 'style toaster T/C heavey', 2, '2018-08-11', 65, 2300, 'GasAppliances', 0),
(232, 'style 503 2 in 1 T/C', 0, '2018-08-11', 65, 2300, 'GasAppliances', 1),
(233, 'style 333 ', 2, '2018-08-11', 65, 1600, 'GasAppliances', 0),
(234, 'style cabinet 3 burnner', 4, '2018-08-11', 65, 6800, 'GasAppliances', 0),
(235, 'style cabinet 5 burner', 2, '2018-08-11', 65, 8500, 'GasAppliances', 0),
(236, 'a star double gojra T/C', 4, '2018-08-11', 80, 1350, 'GasAppliances', 1),
(237, ' modern  double gol jali s', 7, '2018-08-11', 80, 1500, 'GasAppliances', 1),
(238, 'a star double burnner dabbi jali  s', 29, '2018-08-11', 80, 1150, 'GasAppliances', 2),
(239, 'modern T/C one piece', 1, '2018-08-11', 80, 1350, 'GasAppliances', 0),
(240, 'a star gojra s', 0, '2018-08-11', 80, 1250, 'GasAppliances', 1),
(241, 'super star 10 kg ', 4, '2018-08-12', 64, 1550, 'GasAppliances', 1),
(242, 'super star 8 kg ', 8, '2018-08-12', 64, 1450, 'GasAppliances', 0),
(243, '20 LP regulator super star', 20, '2018-08-12', 64, 180, 'GasAppliances', 0),
(244, '21 LP regulator super star', 4, '2018-08-12', 64, 180, 'GasAppliances', 0),
(245, '22LP regulator super star', 11, '2018-08-12', 64, 180, 'GasAppliances', 0),
(246, 'minni regulator super star', 57, '2018-08-12', 64, 180, 'GasAppliances', 2),
(248, '20 LP regulator golden star', 7, '2018-08-12', 81, 155, 'GasAppliances', 7),
(249, '21 LP regulator golden star', 4, '2018-08-12', 81, 155, 'GasAppliances', 1),
(250, '22LP regulatorgolden star', 7, '2018-08-12', 81, 155, 'GasAppliances', 2),
(251, 'minni regulator boss', 77, '2018-08-12', 81, 88, 'GasAppliances', 5),
(252, '20 HP regulator boss', 7, '2018-08-12', 81, 140, 'GasAppliances', 0),
(253, '21 HP regulator boss', 5, '2018-08-12', 81, 140, 'GasAppliances', 0),
(254, '22 HP regulator boss', 9, '2018-08-12', 81, 140, 'GasAppliances', 0),
(255, '20 HP regulator big star', 2, '2018-08-12', 81, 150, 'GasAppliances', 5),
(256, '21 HP regulator big star ', 14, '2018-08-12', 81, 150, 'GasAppliances', 3),
(257, '22 HP regulator big star', 7, '2018-08-12', 81, 150, 'GasAppliances', 0),
(258, '20 HP regulator super star', 1, '2018-08-12', 64, 180, 'GasAppliances', 0),
(259, '21 HP regulator super star', 1, '2018-08-12', 81, 180, 'GasAppliances', 0),
(260, '22 HP regulator 555', 2, '2018-08-12', 81, 150, 'GasAppliances', 0),
(261, '20 HP regulator full brass Al-ikhwan', 1, '2018-08-12', 81, 255, 'GasAppliances', 0),
(262, '21 HP regulator full brass AL-ikhwan', 5, '2018-08-12', 81, 255, 'GasAppliances', 1),
(263, '20 HP regulator full brass 5 star', 17, '2018-08-12', 82, 260, 'GasAppliances', 5),
(264, '21 HP regulator full brass 5 star', 8, '2018-08-12', 82, 260, 'GasAppliances', 0),
(265, '22 HP regulator full brass 5 star ', 17, '2018-08-12', 82, 260, 'GasAppliances', 0),
(266, 'fazool', 0, '2018-08-12', 53, 100, 'GasAppliances', 0),
(267, '6 kg 16G gull', 0, '2018-08-13', 83, 750, 'GasAppliances', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchases`
--

CREATE TABLE `tbl_purchases` (
  `purchase_id` bigint(19) NOT NULL,
  `sup_id` int(22) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `userid` int(22) NOT NULL,
  `paymenttype` varchar(22) NOT NULL,
  `total` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchases`
--

INSERT INTO `tbl_purchases` (`purchase_id`, `sup_id`, `date`, `time`, `view`, `userid`, `paymenttype`, `total`) VALUES
(1, 57, '2018-08-07', '20:51:57', 0, 1, 'on Credit', 37600),
(2, 73, '2018-08-08', '18:46:47', 0, 1, 'on Credit', 58770),
(3, 79, '2018-08-11', '11:30:13', 0, 1, 'on Credit', 38010),
(4, 69, '2018-08-11', '19:00:13', 0, 1, 'on Credit', 21800),
(5, 71, '2018-08-19', '18:22:04', 0, 1, 'on Cash', 23697),
(6, 54, '2019-06-29', '12:29:41', 0, 1, 'on Credit', 7510);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_returnproduct`
--

CREATE TABLE `tbl_returnproduct` (
  `id` int(15) NOT NULL,
  `pro_id` int(22) NOT NULL,
  `amount` int(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salelineitem`
--

CREATE TABLE `tbl_salelineitem` (
  `id` int(11) NOT NULL,
  `pro_id` int(22) NOT NULL,
  `pro_quantity` int(12) NOT NULL,
  `pro_price` int(22) NOT NULL,
  `pro_transactionId` bigint(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_salelineitem`
--

INSERT INTO `tbl_salelineitem` (`id`, `pro_id`, `pro_quantity`, `pro_price`, `pro_transactionId`) VALUES
(1, 44, 1, 9000, 1),
(2, 43, 1, 6500, 2),
(3, 145, 1, 4000, 3),
(4, 13, 1, 1500, 4),
(5, 98, 1, 1600, 5),
(6, 1, 1, 2500, 5),
(7, 4, 1, 3500, 6),
(8, 26, 1, 21000, 7),
(9, 183, 1, 2500, 8),
(10, 48, 1, 2450, 8),
(11, 97, 0, 1800, 9),
(12, 49, 1, 3000, 10),
(13, 122, 1, 1000, 10),
(14, 224, 1, 1500, 11),
(15, 132, 1, 1800, 12),
(16, 241, 1, 1800, 12),
(17, 99, 1, 3000, 13),
(18, 112, 0, 1300, 14),
(19, 160, 0, 1250, 15),
(20, 251, 0, 150, 15),
(21, 248, 0, 220, 16),
(22, 13, 0, 1700, 17),
(23, 175, 0, 1200, 18),
(24, 192, 0, 550, 19),
(25, 188, 5, 650, 19),
(26, 267, 4, 750, 19),
(27, 144, 6, 650, 19),
(28, 251, 6, 95, 19),
(29, 248, 0, 250, 20),
(30, 63, 0, 1300, 21),
(31, 1, 1, 1200, 22),
(32, 1, 1, 1200, 23),
(33, 1, 1, 1200, 24),
(34, 1, 1, 200, 25),
(35, 2, 1, 1200, 26),
(36, 3, 2, 1200, 26),
(37, 4, 1, 1300, 26),
(38, 74, 1, 100, 27),
(39, 77, 1, 1200, 27),
(40, 1, 1, 1500, 27),
(41, 77, 1, 1600, 28),
(42, 76, 1, 1600, 28),
(43, 1, 2, 1600, 28),
(44, 76, 1, 1500, 28),
(45, 79, 1, 1500, 28),
(46, 78, 1, 1000, 28),
(47, 5, 1, 1600, 29),
(48, 6, 2, 1600, 29),
(49, 31, 1, 1500, 29),
(50, 201, 1, 1600, 29),
(51, 220, 1, 1600, 29),
(52, 223, 1, 1500, 29),
(53, 224, 1, 1800, 29),
(54, 223, 1, 1500, 29),
(55, 223, 1, 1500, 29),
(56, 224, 1, 1800, 29),
(57, 225, 1, 1800, 29),
(58, 80, 1, 1900, 29),
(59, 219, 1, 1800, 30),
(60, 219, 1, 1522, 30),
(61, 219, 1, 1, 30),
(62, 160, 1, 1600, 30),
(63, 31, 1, 122, 30),
(64, 31, 1, 1, 30),
(65, 120, 1, 120, 30),
(66, 207, 1, 1, 30),
(67, 206, 1, 1, 30),
(68, 79, 1, 1800, 30),
(69, 5, 1, 1522, 30),
(70, 74, 1, 1600, 30),
(71, 104, 1, 10, 30),
(72, 74, 1, 200, 30),
(73, 4, 1, 1600, 30),
(74, 80, 1, 1600, 30),
(75, 184, 1, 1200, 30),
(76, 200, 1, 1500, 30),
(77, 184, 1, 1200, 30),
(78, 79, 1, 10000, 31),
(79, 5, 2, 1200, 32),
(80, 74, 1, 1200, 33),
(81, 2, 1, 1222, 34),
(82, 166, 1, 1222, 34),
(83, 1, 5, 1500, 35),
(84, 4, 1, 1600, 35),
(85, 48, 1, 25000, 36),
(86, 48, 5, 1000, 36),
(87, 33, 1, 2500, 36),
(88, 48, 5, 12, 36);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sublineitem`
--

CREATE TABLE `tbl_sublineitem` (
  `id` int(11) NOT NULL,
  `pro_id` int(22) NOT NULL,
  `pro_quantity` int(12) NOT NULL,
  `pro_price` int(22) NOT NULL,
  `pro_transactionId` bigint(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sublineitem`
--

INSERT INTO `tbl_sublineitem` (`id`, `pro_id`, `pro_quantity`, `pro_price`, `pro_transactionId`) VALUES
(1, 6, 1, 5000, 1),
(2, 137, 1, 1600, 2),
(3, 97, 1, 1700, 2),
(4, 16, 1, 4000, 3),
(5, 182, 1, 2500, 4),
(6, 97, 1, 1800, 4),
(7, 239, 1, 2000, 5),
(8, 219, 1, 300, 5),
(9, 221, 1, 600, 5),
(10, 220, 1, 400, 5),
(11, 49, 1, 2700, 5),
(12, 122, 1, 900, 5),
(13, 246, 1, 200, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subshopcash`
--

CREATE TABLE `tbl_subshopcash` (
  `ID` int(22) NOT NULL,
  `Amount` int(22) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subshopcash`
--

INSERT INTO `tbl_subshopcash` (`ID`, `Amount`, `Date`, `Time`) VALUES
(1, 0, '2018-08-09', '21:21:51'),
(2, 0, '2018-08-12', '21:32:59'),
(3, 0, '2018-08-12', '21:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subtransaction`
--

CREATE TABLE `tbl_subtransaction` (
  `id` bigint(19) NOT NULL,
  `amount` int(12) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subtransaction`
--

INSERT INTO `tbl_subtransaction` (`id`, `amount`, `time`, `date`) VALUES
(1, 5000, '15:15:47', '2018-08-07'),
(2, 3300, '21:21:06', '2018-08-09'),
(3, 4000, '10:59:38', '2018-08-12'),
(4, 4300, '11:02:07', '2018-08-12'),
(5, 7100, '21:32:10', '2018-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `sup_id` int(22) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_address` text,
  `sup_email` varchar(40) DEFAULT NULL,
  `sup_AC` int(22) DEFAULT NULL,
  `sup_payment` int(15) NOT NULL DEFAULT '0',
  `sup_contact` varchar(16) NOT NULL,
  `sup_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`sup_id`, `sup_name`, `sup_address`, `sup_email`, `sup_AC`, `sup_payment`, `sup_contact`, `sup_status`) VALUES
(53, 'Anwar Pipe Store Multan', 'Chowk Shahida Multan', '', 0, 41275, '3006305375', 1),
(54, 'Al Hafiz Gas', 'Gujranwala Punjab Pakistan', '', 0, 78266, '3000202720', 1),
(55, 'Al Hafiz Electronics', 'hussain aea Gahi Multan', '', 0, 302434, '3007192212', 1),
(56, 'starco gas', 'Gujranwala Punjab Pakistan', '', 0, 150274, '3008645526', 1),
(57, 'parco gas ', 'Gujranwala Punjab Pakistan', '', 0, 316072, '3009642915', 1),
(58, 'Ejaz Istry', 'Lahore Punjab Pakistan', '', 0, 28000, '3214141561', 1),
(59, 'Al Madina Foundries', 'Gujranwala Punjab Pakistan', '', 0, 112150, '3217401142', 1),
(60, 'Muhammad Ikram and Brothers', 'Gujranwala Punjab Pakistan', '', 0, 608005, '3009642245', 1),
(61, 'Muhammad Yameen', 'Gujranwala Punjab Pakistan', '', 0, 7580, '3156682063', 1),
(62, 'Al-Qaim PVC', 'Industrial State Multan', '', 0, 35465, '3008639575', 1),
(63, 'Geo Star Gas', 'Gujranwala Punjab Pakistan', '', 0, 110215, '3016622870', 1),
(64, 'Super Star ', 'Gujranwala Punjab Pakistan', '', 0, 82275, '3009641005', 1),
(65, 'Style Gas ', 'Gujranwala Punjab Pakistan', '', 0, 15605, '3008653528', 1),
(66, 'Shabaz Gas', 'Gujranwala Punjab Pakistan', '', 0, 511145, '3009644461', 1),
(67, 'GM Gas', 'Peshawar KPK Pakistan', '', 0, 40000, '3339139075', 1),
(68, 'Nasir Qayyum', 'Gujranwala Punjab Pakistan', '', 0, 22000, '3226448559', 1),
(69, 'Naeem Angethi', 'Gujranwala Punjab Pakistan', '', 0, 57825, '3006434851', 1),
(70, 'Shafi Ullah Gas Tandoor', 'Peshawar KPK Pakistan', '', 0, 43000, '3009763403', 1),
(71, 'Nas Gas ', 'Gujranwala Punjab Pakistan', '', 0, 299081, '3218271226', 1),
(72, 'Onex', 'Gujranwala Punjab Pakistan', '', 0, 87650, '3036124435', 1),
(73, 'Gentery Gas', 'Gujranwala Punjab Pakistan', '', 0, 70920, '3077276893', 1),
(74, 'Sun Shine', 'Gujranwala Punjab Pakistan', '', 0, 36850, '3216495853', 1),
(75, 'spinal gas', 'Gujranwala Punjab Pakistan', '', 0, 0, '3007497646', 1),
(76, 'Local Cylinder ', 'Multan Punjab Pakistan', '', 0, 0, '3006323548', 1),
(77, 'Asif Cylinder', 'Gujranwala Punjab Pakistan', '', 0, 0, '3007157344', 1),
(78, 'Puma Gas', 'Gujranwala Punjab Pakistan', '', 0, 0, '3338108018', 1),
(79, 'top star regulators', 'Gujranwala Punjab Pakistan', '', 0, 38010, '3006470579', 1),
(80, 'Super Modern  Gas', 'Gujranwala Punjab Pakistan', '', 0, 0, '3006401917', 1),
(81, 'rehmat hard ware ', 'Gujranwala Punjab Pakistan', '', 0, 0, '3007425575', 1),
(82, 'bhutta regulator', 'chowk shah abbas multan', '', 0, 0, '3067437673', 1),
(83, 'gull gas centre', 'gull road multan pakistan', '', 0, 0, '3004963424', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` bigint(19) NOT NULL,
  `amount` int(12) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `amount`, `time`, `date`) VALUES
(1, 900, '16:18:40', '2018-08-08'),
(2, 6500, '16:59:40', '2018-08-09'),
(3, 4000, '18:03:39', '2018-08-09'),
(4, 1500, '18:05:44', '2018-08-09'),
(5, 4100, '11:46:22', '2018-08-10'),
(6, 3500, '11:51:40', '2018-08-11'),
(7, 21000, '18:34:29', '2018-08-11'),
(8, 4950, '18:37:16', '2018-08-11'),
(9, 0, '19:39:10', '2018-08-11'),
(10, 4000, '12:37:25', '2018-08-12'),
(11, 1500, '12:47:27', '2018-08-12'),
(12, 3600, '13:41:15', '2018-08-12'),
(13, 3000, '13:43:23', '2018-08-12'),
(14, 0, '18:15:01', '2018-08-12'),
(15, 0, '19:55:44', '2018-08-12'),
(16, 0, '11:49:07', '2018-08-13'),
(17, 0, '12:48:34', '2018-08-13'),
(18, 0, '13:35:48', '2018-08-13'),
(19, 10720, '17:44:56', '2018-08-13'),
(20, 0, '18:12:10', '2018-08-13'),
(21, -1300, '18:43:17', '2018-08-13'),
(22, 1200, '19:58:47', '2018-08-18'),
(23, 1200, '19:59:05', '2018-08-18'),
(24, 1200, '19:59:46', '2018-08-18'),
(25, 200, '20:06:07', '2018-08-18'),
(26, 4900, '21:25:22', '2018-08-18'),
(27, 2800, '21:47:08', '2018-08-18'),
(28, 10400, '18:16:29', '2018-08-19'),
(29, 21300, '18:24:28', '2018-08-19'),
(30, 17400, '18:56:17', '2018-08-19'),
(31, 10000, '11:47:05', '2018-08-25'),
(32, 2400, '13:23:51', '2018-08-25'),
(33, 1200, '14:37:14', '2018-08-25'),
(34, 2444, '16:59:17', '2018-11-27'),
(35, 9100, '14:55:41', '2019-07-14'),
(36, 32560, '14:43:20', '2019-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ColUserID` int(100) NOT NULL,
  `colUserName` varchar(100) NOT NULL,
  `colUserPassword` varchar(10) NOT NULL,
  `colUserRole` varchar(7) NOT NULL DEFAULT 'Cashier',
  `colUserStatus` int(1) NOT NULL DEFAULT '1',
  `contact` varchar(16) NOT NULL,
  `addpurchases` int(2) NOT NULL DEFAULT '0',
  `subshoprecord` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ColUserID`, `colUserName`, `colUserPassword`, `colUserRole`, `colUserStatus`, `contact`, `addpurchases`, `subshoprecord`) VALUES
(1, 'Waseem Bhatti', 'think', 'Owner', 1, '', 0, 0),
(2, 'Mudassar', '123', 'Cashier', 1, '3161403162', 0, 0);

-- --------------------------------------------------------

--
-- Structure for view `highsale`
--
DROP TABLE IF EXISTS `highsale`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `highsale`  AS  select `tbl_transaction`.`id` AS `id`,`tbl_transaction`.`amount` AS `amount`,`tbl_transaction`.`time` AS `time`,`tbl_transaction`.`date` AS `date` from `tbl_transaction` where (`tbl_transaction`.`amount` > 1000) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchaselineitem`
--
ALTER TABLE `purchaselineitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase` (`pro_id`),
  ADD KEY `purchaseid` (`purchase_id`);

--
-- Indexes for table `subshopexpense`
--
ALTER TABLE `subshopexpense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sup_installments`
--
ALTER TABLE `sup_installments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl-supplier`
--
ALTER TABLE `tbl-supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `tbl_coustmer`
--
ALTER TABLE `tbl_coustmer`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`),
  ADD UNIQUE KEY `pro_name` (`pro_name`),
  ADD KEY `pro_supplierid` (`pro_supplierid`),
  ADD KEY `pro_quantityi` (`pro_quantity`);

--
-- Indexes for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `foreginkey` (`sup_id`);

--
-- Indexes for table `tbl_returnproduct`
--
ALTER TABLE `tbl_returnproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `tbl_salelineitem`
--
ALTER TABLE `tbl_salelineitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `pro_transactionId` (`pro_transactionId`);

--
-- Indexes for table `tbl_sublineitem`
--
ALTER TABLE `tbl_sublineitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_i` (`pro_id`),
  ADD KEY `pro_is` (`pro_transactionId`);

--
-- Indexes for table `tbl_subshopcash`
--
ALTER TABLE `tbl_subshopcash`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_subtransaction`
--
ALTER TABLE `tbl_subtransaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ColUserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchaselineitem`
--
ALTER TABLE `purchaselineitem`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `subshopexpense`
--
ALTER TABLE `subshopexpense`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sup_installments`
--
ALTER TABLE `sup_installments`
  MODIFY `ID` bigint(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl-supplier`
--
ALTER TABLE `tbl-supplier`
  MODIFY `sup_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_coustmer`
--
ALTER TABLE `tbl_coustmer`
  MODIFY `cou_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pro_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;
--
-- AUTO_INCREMENT for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  MODIFY `purchase_id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_returnproduct`
--
ALTER TABLE `tbl_returnproduct`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_salelineitem`
--
ALTER TABLE `tbl_salelineitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `tbl_sublineitem`
--
ALTER TABLE `tbl_sublineitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_subshopcash`
--
ALTER TABLE `tbl_subshopcash`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_subtransaction`
--
ALTER TABLE `tbl_subtransaction`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `sup_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ColUserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchaselineitem`
--
ALTER TABLE `purchaselineitem`
  ADD CONSTRAINT `purchase` FOREIGN KEY (`pro_id`) REFERENCES `tbl_product` (`pro_id`),
  ADD CONSTRAINT `purchaseid` FOREIGN KEY (`purchase_id`) REFERENCES `tbl_purchases` (`purchase_id`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `productysupplierfk` FOREIGN KEY (`pro_supplierid`) REFERENCES `tbl_supplier` (`sup_id`);

--
-- Constraints for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  ADD CONSTRAINT `foreginkey` FOREIGN KEY (`sup_id`) REFERENCES `tbl_supplier` (`sup_id`);

--
-- Constraints for table `tbl_returnproduct`
--
ALTER TABLE `tbl_returnproduct`
  ADD CONSTRAINT `tbl_returnproduct_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `tbl_product` (`pro_id`);

--
-- Constraints for table `tbl_salelineitem`
--
ALTER TABLE `tbl_salelineitem`
  ADD CONSTRAINT `tbl_salelineitem_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `tbl_product` (`pro_id`),
  ADD CONSTRAINT `tbl_salelineitem_ibfk_2` FOREIGN KEY (`pro_transactionId`) REFERENCES `tbl_transaction` (`id`);

--
-- Constraints for table `tbl_sublineitem`
--
ALTER TABLE `tbl_sublineitem`
  ADD CONSTRAINT `pro_i` FOREIGN KEY (`pro_id`) REFERENCES `tbl_product` (`pro_id`),
  ADD CONSTRAINT `pro_is` FOREIGN KEY (`pro_transactionId`) REFERENCES `tbl_subtransaction` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
