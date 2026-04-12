-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2023 at 07:10 AM
-- Server version: 5.6.51
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abrartravels`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `agrement` enum('no','yes') NOT NULL,
  `isDeleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agent_hotel`
--

DROP TABLE IF EXISTS `agent_hotel`;
CREATE TABLE IF NOT EXISTS `agent_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4559 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_hotel`
--

INSERT INTO `agent_hotel` (`id`, `hotel_id`, `agent_id`, `price`) VALUES
(110, 103, 54, 0),
(111, 139, 54, 0),
(249, 139, 65, 0),
(250, 142, 65, 0),
(251, 167, 65, 0),
(559, 103, 53, 15),
(560, 111, 53, 26),
(561, 115, 53, 31),
(562, 122, 53, 37),
(563, 139, 53, 10),
(564, 146, 53, 23),
(565, 167, 53, 23),
(566, 180, 53, 14),
(567, 188, 53, 25),
(612, 103, 55, 12),
(613, 104, 55, 15),
(614, 118, 55, 140),
(615, 141, 55, 20),
(616, 153, 55, 130),
(617, 161, 55, 20),
(618, 186, 55, 0),
(619, 187, 55, 0),
(620, 189, 55, 15),
(621, 190, 55, 11),
(704, 103, 50, 14),
(705, 142, 50, 13),
(1028, 186, 71, 0),
(1029, 187, 71, 0),
(1030, 195, 70, 0),
(1031, 196, 70, 0),
(1036, 186, 69, 0),
(1037, 187, 69, 0),
(1095, 186, 73, 0),
(1096, 187, 73, 0),
(1097, 139, 60, 0),
(1098, 175, 60, 0),
(1099, 195, 60, 0),
(1129, 106, 47, 0),
(1130, 115, 47, 23),
(1131, 141, 47, 0),
(1132, 146, 47, 20),
(1232, 99, 45, 14),
(1233, 100, 45, 16),
(1234, 101, 45, 23),
(1235, 102, 45, 33),
(1236, 103, 45, 18),
(1237, 104, 45, 22),
(1238, 105, 45, 28),
(1239, 106, 45, 40),
(1240, 107, 45, 27),
(1241, 108, 45, 30),
(1242, 109, 45, 40),
(1243, 110, 45, 60),
(1244, 111, 45, 33),
(1245, 112, 45, 35),
(1246, 113, 45, 46),
(1247, 114, 45, 68),
(1248, 115, 45, 23),
(1249, 116, 45, 45),
(1250, 117, 45, 55),
(1251, 118, 45, 75),
(1252, 119, 45, 55),
(1253, 120, 45, 73),
(1254, 121, 45, 110),
(1255, 122, 45, 42),
(1256, 123, 45, 45),
(1257, 124, 45, 60),
(1258, 125, 45, 90),
(1259, 126, 45, 51),
(1260, 128, 45, 55),
(1261, 129, 45, 72),
(1262, 130, 45, 105),
(1263, 131, 45, 62),
(1264, 132, 45, 78),
(1265, 133, 45, 110),
(1266, 134, 45, 160),
(1267, 135, 45, 60),
(1268, 136, 45, 75),
(1269, 137, 45, 105),
(1270, 138, 45, 150),
(1271, 139, 45, 10),
(1272, 140, 45, 15),
(1273, 141, 45, 32),
(1274, 142, 45, 16),
(1275, 143, 45, 18),
(1276, 144, 45, 24),
(1277, 145, 45, 40),
(1278, 146, 45, 27),
(1279, 147, 45, 30),
(1280, 148, 45, 40),
(1281, 149, 45, 60),
(1282, 151, 45, 47),
(1283, 152, 45, 60),
(1284, 153, 45, 90),
(1285, 154, 45, 45),
(1286, 156, 45, 60),
(1287, 157, 45, 92),
(1288, 159, 45, 48),
(1289, 160, 45, 43),
(1290, 161, 45, 21),
(1291, 167, 45, 20),
(1292, 176, 45, 13),
(1293, 184, 45, 18),
(1294, 186, 45, 0),
(1295, 187, 45, 0),
(1296, 195, 45, 14),
(1354, 157, 74, 0),
(1355, 186, 74, 0),
(1356, 187, 74, 0),
(1357, 195, 74, 17),
(1358, 196, 74, 9),
(1359, 198, 74, 95),
(1360, 199, 74, 68),
(1361, 200, 74, 95),
(1390, 172, 62, 27),
(1391, 173, 62, 34),
(1392, 174, 62, 34),
(1393, 178, 62, 0),
(1394, 186, 62, 0),
(1395, 187, 62, 0),
(1396, 210, 62, 0),
(1397, 103, 48, 0),
(1398, 139, 48, 0),
(1399, 142, 48, 0),
(1400, 167, 48, 0),
(1401, 195, 48, 0),
(1427, 111, 75, 20),
(1428, 176, 75, 12),
(1429, 195, 75, 13),
(1430, 196, 75, 12),
(1444, 186, 76, 0),
(1445, 187, 76, 0),
(1446, 204, 76, 18),
(1457, 186, 68, 0),
(1458, 187, 68, 0),
(1459, 207, 68, 31),
(1460, 208, 68, 36),
(1461, 99, 63, 10),
(1462, 103, 63, 10),
(1463, 139, 63, 8),
(1464, 167, 63, 20),
(1465, 195, 63, 13),
(1466, 196, 63, 12),
(1545, 107, 57, 27),
(1546, 115, 57, 28),
(1547, 142, 57, 13),
(1548, 146, 57, 20),
(1549, 152, 57, 47),
(1550, 167, 57, 27),
(1551, 176, 57, 13),
(1552, 186, 57, 0),
(1553, 195, 57, 14),
(1554, 204, 57, 23),
(1555, 213, 57, 70),
(1614, 103, 52, 12),
(1615, 139, 52, 9),
(1616, 142, 52, 12),
(1617, 146, 52, 17),
(1618, 147, 52, 22),
(1619, 148, 52, 29),
(1620, 167, 52, 18),
(1621, 175, 52, 14),
(1622, 185, 52, 20),
(1623, 195, 52, 13),
(1624, 197, 52, 25),
(1658, 219, 80, 0),
(1846, 186, 83, 0),
(1847, 187, 83, 0),
(1848, 186, 82, 0),
(1849, 187, 82, 0),
(1950, 259, 86, 0),
(1951, 260, 86, 0),
(2136, 99, 66, 0),
(2137, 139, 66, 0),
(2138, 228, 66, 0),
(2139, 268, 66, 0),
(2140, 186, 87, 0),
(2141, 187, 87, 0),
(2187, 186, 89, 0),
(2188, 187, 89, 0),
(2189, 270, 89, 0),
(2561, 186, 85, 0),
(2562, 187, 85, 0),
(2563, 252, 85, 0),
(2564, 253, 85, 0),
(2974, 245, 93, 120),
(2975, 275, 93, 120),
(2976, 289, 93, 0),
(2977, 299, 93, 0),
(2978, 300, 93, 0),
(2979, 305, 93, 0),
(3552, 186, 78, 0),
(3553, 187, 78, 0),
(3554, 256, 78, 0),
(3555, 257, 78, 0),
(3556, 259, 78, 0),
(3557, 277, 78, 0),
(3558, 278, 78, 0),
(3559, 289, 78, 0),
(3560, 291, 78, 0),
(3561, 293, 78, 0),
(3562, 312, 78, 0),
(3664, 186, 84, 0),
(3665, 187, 84, 0),
(3666, 252, 84, 0),
(3667, 253, 84, 0),
(3668, 258, 84, 0),
(3669, 259, 84, 0),
(3670, 275, 84, 0),
(3671, 279, 84, 0),
(3672, 281, 84, 0),
(3673, 286, 84, 0),
(3674, 287, 84, 0),
(3675, 292, 84, 0),
(3676, 293, 84, 0),
(3677, 295, 84, 0),
(3678, 302, 84, 0),
(3679, 312, 84, 0),
(3690, 259, 88, 0),
(3691, 279, 88, 0),
(3692, 280, 88, 0),
(3693, 281, 88, 0),
(3694, 282, 88, 0),
(3695, 286, 88, 0),
(3696, 289, 88, 0),
(3697, 301, 88, 0),
(3698, 302, 88, 0),
(3699, 312, 88, 0),
(3700, 139, 61, 0),
(3701, 167, 61, 0),
(3702, 289, 61, 0),
(3703, 312, 61, 0),
(3704, 315, 61, 0),
(3705, 316, 61, 0),
(4190, 186, 90, 0),
(4191, 187, 90, 0),
(4192, 248, 90, 0),
(4193, 259, 90, 0),
(4194, 289, 90, 0),
(4195, 301, 90, 0),
(4196, 302, 90, 0),
(4197, 311, 90, 0),
(4198, 327, 90, 0),
(4199, 328, 90, 0),
(4284, 186, 56, 0),
(4285, 187, 56, 0),
(4286, 216, 56, 0),
(4287, 259, 56, 0),
(4288, 279, 56, 0),
(4289, 289, 56, 0),
(4290, 290, 56, 0),
(4461, 186, 91, 0),
(4462, 187, 91, 0),
(4463, 196, 91, 0),
(4464, 305, 91, 0),
(4465, 308, 91, 0),
(4466, 319, 91, 0),
(4467, 186, 46, 0),
(4468, 187, 46, 0),
(4469, 196, 46, 0),
(4470, 219, 46, 0),
(4471, 227, 46, 0),
(4472, 228, 46, 0),
(4473, 229, 46, 0),
(4474, 230, 46, 0),
(4475, 231, 46, 0),
(4476, 232, 46, 0),
(4477, 233, 46, 0),
(4478, 234, 46, 0),
(4479, 235, 46, 0),
(4480, 236, 46, 0),
(4481, 237, 46, 0),
(4482, 238, 46, 0),
(4483, 239, 46, 0),
(4484, 240, 46, 0),
(4485, 241, 46, 0),
(4486, 242, 46, 0),
(4487, 243, 46, 0),
(4488, 244, 46, 0),
(4489, 245, 46, 0),
(4490, 246, 46, 0),
(4491, 247, 46, 0),
(4492, 248, 46, 0),
(4493, 249, 46, 0),
(4494, 250, 46, 0),
(4495, 251, 46, 0),
(4496, 254, 46, 0),
(4497, 255, 46, 0),
(4498, 258, 46, 0),
(4499, 259, 46, 0),
(4500, 260, 46, 0),
(4501, 261, 46, 0),
(4502, 262, 46, 0),
(4503, 263, 46, 0),
(4504, 264, 46, 0),
(4505, 265, 46, 0),
(4506, 266, 46, 0),
(4507, 269, 46, 0),
(4508, 271, 46, 0),
(4509, 272, 46, 0),
(4510, 273, 46, 0),
(4511, 274, 46, 0),
(4512, 275, 46, 0),
(4513, 276, 46, 0),
(4514, 278, 46, 0),
(4515, 279, 46, 0),
(4516, 283, 46, 0),
(4517, 284, 46, 0),
(4518, 285, 46, 0),
(4519, 286, 46, 0),
(4520, 288, 46, 0),
(4521, 289, 46, 0),
(4522, 290, 46, 0),
(4523, 291, 46, 0),
(4524, 293, 46, 0),
(4525, 294, 46, 0),
(4526, 296, 46, 0),
(4527, 297, 46, 0),
(4528, 301, 46, 0),
(4529, 302, 46, 0),
(4530, 303, 46, 0),
(4531, 304, 46, 0),
(4532, 305, 46, 0),
(4533, 306, 46, 0),
(4534, 307, 46, 0),
(4535, 309, 46, 0),
(4536, 310, 46, 0),
(4537, 311, 46, 0),
(4538, 312, 46, 0),
(4539, 313, 46, 0),
(4540, 314, 46, 0),
(4541, 317, 46, 0),
(4542, 318, 46, 0),
(4543, 320, 46, 0),
(4544, 321, 46, 0),
(4545, 322, 46, 0),
(4546, 323, 46, 0),
(4547, 324, 46, 0),
(4548, 325, 46, 0),
(4549, 326, 46, 0),
(4550, 330, 46, 0),
(4551, 331, 46, 0),
(4552, 332, 46, 0),
(4553, 332, 94, 20),
(4554, 333, 94, 22),
(4555, 99, 97, 10),
(4556, 139, 97, 10),
(4557, 332, 97, 10),
(4558, 333, 97, 10);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `isDeleted`) VALUES
(1, 'MEZAN ABT', 1),
(2, 'MEZAN', 0),
(3, 'MCB', 0),
(4, 'BOP', 0),
(5, 'UBL', 0),
(6, 'HBL', 0),
(7, 'AL FLAHA', 0),
(8, 'AL HABIB', 0),
(9, 'SONERI', 0),
(10, 'FAYSAL BANK', 0),
(11, 'JS BANK', 0),
(12, 'FAYSAL BANK ZAKWAN', 0),
(13, 'UBL ASMA SADIA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bank_transection`
--

DROP TABLE IF EXISTS `bank_transection`;
CREATE TABLE IF NOT EXISTS `bank_transection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` enum('cr','dr') NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `detail` varchar(100) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `ft_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `passport_issue_date` date DEFAULT NULL,
  `passport_exp_date` date DEFAULT NULL,
  `dob` date NOT NULL,
  `ppno` varchar(100) NOT NULL,
  `age_group` varchar(100) NOT NULL,
  `visa_id` int(11) DEFAULT NULL,
  `agent_id` int(11) NOT NULL,
  `account_pkg` varchar(100) DEFAULT NULL,
  `iata` varchar(100) DEFAULT NULL,
  `voucher_issue` enum('no','yes') DEFAULT 'no',
  `isDeleted` int(11) DEFAULT '0',
  `group_code` varchar(100) DEFAULT NULL,
  `group_name` varchar(100) DEFAULT NULL,
  `visa_company_id` int(11) NOT NULL,
  `visa_no` varchar(100) DEFAULT NULL,
  `visa_date` date DEFAULT NULL,
  `child_wo_bed` varchar(10) DEFAULT NULL,
  `cnic` varchar(100) DEFAULT NULL,
  `ziarat` enum('no','yes') NOT NULL DEFAULT 'no',
  `visa_approve` enum('no','yes') DEFAULT 'no',
  `document` enum('no','yes') NOT NULL DEFAULT 'no',
  `sr_name` enum('Mr','Miss','Mrs') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `configration`
--

DROP TABLE IF EXISTS `configration`;
CREATE TABLE IF NOT EXISTS `configration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `phone2` varchar(250) NOT NULL,
  `per_page` int(11) NOT NULL,
  `visa_rate` int(11) NOT NULL,
  `adult_rate` int(11) NOT NULL,
  `child_rate` int(11) NOT NULL,
  `infant_rate` int(11) NOT NULL,
  `sr_rate` float NOT NULL,
  `mad_name` varchar(100) NOT NULL,
  `mad_cont` varchar(100) NOT NULL,
  `mad_name1` varchar(100) NOT NULL,
  `mad_cont1` varchar(100) NOT NULL,
  `mak_name` varchar(100) NOT NULL,
  `mak_cont` varchar(100) NOT NULL,
  `mak_name1` varchar(100) NOT NULL,
  `mak_cont1` varchar(100) NOT NULL,
  `no_vo_visa_rate` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rate_one` int(11) NOT NULL,
  `rate_two` int(11) NOT NULL,
  `rate_three` int(11) NOT NULL,
  `packeg1` varchar(100) NOT NULL,
  `packeg2` varchar(100) NOT NULL,
  `member_one` varchar(100) NOT NULL,
  `dis_one` varchar(1000) NOT NULL,
  `member_two` varchar(100) NOT NULL,
  `dis_two` varchar(1000) NOT NULL,
  `ticket_sms_format` varchar(500) NOT NULL,
  `permotion_sms` varchar(500) NOT NULL,
  `mobile_for_sms` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configration`
--

INSERT INTO `configration` (`id`, `name`, `address`, `phone`, `phone2`, `per_page`, `visa_rate`, `adult_rate`, `child_rate`, `infant_rate`, `sr_rate`, `mad_name`, `mad_cont`, `mad_name1`, `mad_cont1`, `mak_name`, `mak_cont`, `mak_name1`, `mak_cont1`, `no_vo_visa_rate`, `email`, `rate_one`, `rate_two`, `rate_three`, `packeg1`, `packeg2`, `member_one`, `dis_one`, `member_two`, `dis_two`, `ticket_sms_format`, `permotion_sms`, `mobile_for_sms`) VALUES
(1, 'test company', 'Park Road, Near Telephone Exchange Eid Gah Road Bahawalnagar', '063-2277751-50', '03006844693,03352277751', 300, 0, 720, 720, 720, 47, 'MUHAMMAD JUNAID ', '00966544276949', 'SAJID MAHMOOD TRASPORT BOOKING MAK TO MED TO MAK AND AIRPORT', '00923006844693', 'MUHAMMAD BILAL', '00966591974678', '', '', 810, 'alabrar123@gmail.com,alabrartours725@gmail.com', 50000, 70000, 90000, 'php5cHOTEL LIST 1440.png', 'AL ABRAR.png', 'Sheikh Sajid Mehmood', 'Al Abrar operates under the firm belief that we should focus as much on sustainability and social responsibility as on pure bus', 'Sheikh Sajid Mehmood', 'Al Abrar operates under the firm belief that we should focus as much on sustainability and social responsibility as on pure bus', '                                            Dear Customer thank you for choosing Al Abrar travels. Your payment of amount Rs. {amount}/- is received                                        ', '                                            Dear {name} Al Abrar Travels providing no cheep rates on PIA Tickets                                        ', '923467547186');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
CREATE TABLE IF NOT EXISTS `flights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  `bsp` enum('no','yes') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `name`, `isDeleted`, `bsp`) VALUES
(1, 'PK', 0, 'yes'),
(2, 'PA', 0, 'no'),
(3, 'SV', 0, 'yes'),
(4, 'FZ I', 0, 'no'),
(5, 'G9', 0, 'no'),
(6, 'OV', 0, 'no'),
(7, 'WY', 0, 'yes'),
(8, 'GF', 0, 'yes'),
(9, 'Other', 0, 'no'),
(10, 'VOUCHER PAYMENT', 0, 'no'),
(11, 'EK', 0, 'yes'),
(12, 'TG', 0, 'yes'),
(13, '6S', 0, 'yes'),
(14, 'XY', 0, 'no'),
(15, 'FZ', 0, 'yes'),
(16, 'TK', 0, 'yes'),
(17, 'HR', 0, 'yes'),
(18, 'ER', 0, 'no'),
(19, 'EY', 0, 'no'),
(20, 'QR', 0, 'yes'),
(21, 'XY', 0, 'no'),
(22, 'UL', 0, 'yes'),
(23, 'PF', 0, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `flight_transection`
--

DROP TABLE IF EXISTS `flight_transection`;
CREATE TABLE IF NOT EXISTS `flight_transection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flight_id` int(11) DEFAULT NULL,
  `ts_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` enum('cr','dr') NOT NULL,
  `isDeleted` int(11) DEFAULT '0',
  `date` date NOT NULL,
  `detail` varchar(100) NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `address` varchar(100) DEFAULT NULL,
  `room_type` enum('sharing','single_bed','double_bed','triple_bed','quad_bed','five_bed','six_bed') NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT '0',
  `pkg_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=334 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `address`, `room_type`, `city_name`, `isDeleted`, `pkg_type`) VALUES
(1, 'FUNDAQ RUFQA 2/SIMILER', NULL, 'sharing', 'Makkah', 1, 1),
(2, 'FUNDAQ RUFQA 2/SIMILER', NULL, 'double_bed', 'Makkah', 1, 1),
(3, 'FUNDAQ RUFQA 2/SIMILER', NULL, 'triple_bed', 'Makkah', 1, 1),
(4, 'FUNDAQ RUFQA 2/SIMILER', NULL, 'quad_bed', 'Makkah', 1, 1),
(5, 'FUNDAQ MUSTARA 2/HASSAN BITTAR/SIMILER', NULL, 'sharing', 'Makkah', 1, 1),
(6, 'FUNDAQ MUSTARA 2/HASSAN BITTAR/SIMILER', NULL, 'double_bed', 'Makkah', 1, 1),
(7, 'FUNDAQ MUSTARA 2/HASSAN BITTAR/SIMILER', NULL, 'triple_bed', 'Makkah', 1, 1),
(8, 'FUNDAQ MUSTARA 2/HASSAN BITTAR/SIMILER', NULL, 'quad_bed', 'Makkah', 1, 1),
(9, 'LOLO TABIA/FOZIA AL FAZEELA/SIMILER', NULL, 'sharing', 'Makkah', 1, 1),
(10, 'LOLO TABIA/FOZIA AL FAZEELA/SIMILER', NULL, 'double_bed', 'Makkah', 1, 1),
(11, 'LOLO TABIA/FOZIA AL FAZEELA/SIMILER', NULL, 'triple_bed', 'Makkah', 1, 1),
(12, 'LOLO TABIA/FOZIA AL FAZEELA/SIMILER', NULL, 'quad_bed', 'Makkah', 1, 1),
(13, 'DAR AL HAMAD/DAR ARKAN/SIMILER', NULL, 'sharing', 'Makkah', 1, 1),
(14, 'DAR AL HAMAD/DAR ARKAN/SIMILER', NULL, 'double_bed', 'Makkah', 1, 1),
(15, 'DAR AL HAMAD/DAR ARKAN/SIMILER', NULL, 'triple_bed', 'Makkah', 1, 1),
(16, 'DAR AL HAMAD/DAR ARKAN/SIMILER', NULL, 'quad_bed', 'Makkah', 1, 1),
(17, 'FUNDAQ JOOD AL TAJ/SUBANA ZAHABI/SIMILER', NULL, 'sharing', 'Makkah', 1, 1),
(18, 'FUNDAQ JOOD AL TAJ/SUBANA ZAHABI/SIMILER', NULL, 'double_bed', 'Makkah', 1, 1),
(19, 'FUNDAQ JOOD AL TAJ/SUBANA ZAHABI/SIMILER', NULL, 'triple_bed', 'Makkah', 1, 1),
(20, 'FUNDAQ JOOD AL TAJ/SUBANA ZAHABI/SIMILER', NULL, 'quad_bed', 'Makkah', 1, 1),
(21, 'FUNDAD HIBBA AL HIJRAH/SIMILER STAR', NULL, 'sharing', 'Makkah', 1, 1),
(22, 'FUNDAD HIBBA AL HIJRAH/SIMILER STAR', NULL, 'double_bed', 'Makkah', 1, 1),
(23, 'FUNDAD HIBBA AL HIJRAH/SIMILER STAR', NULL, 'triple_bed', 'Makkah', 1, 1),
(24, 'FUNDAD HIBBA AL HIJRAH/SIMILER STAR', NULL, 'quad_bed', 'Makkah', 1, 1),
(25, 'FUNDAQ HAYAT AL TAQWA/NAJMA AL KHALEEJ/SIMILER', NULL, 'sharing', 'Makkah', 1, 1),
(26, 'FUNDAQ HAYAT AL TAQWA/NAJMA AL KHALEEJ/SIMILER', NULL, 'double_bed', 'Makkah', 1, 1),
(27, 'FUNDAQ HAYAT AL TAQWA/NAJMA AL KHALEEJ/SIMILER', NULL, 'triple_bed', 'Makkah', 1, 1),
(28, 'FUNDAQ HAYAT AL TAQWA/NAJMA AL KHALEEJ/SIMILER', NULL, 'quad_bed', 'Makkah', 1, 1),
(29, 'FUNDAQ SULMAN SANDI/SIMILER STAR', NULL, 'sharing', 'Makkah', 1, 1),
(30, 'FUNDAQ SULMAN SANDI/SIMILER STAR', NULL, 'double_bed', 'Makkah', 1, 1),
(31, 'FUNDAQ SULMAN SANDI/SIMILER STAR', NULL, 'triple_bed', 'Makkah', 1, 1),
(32, 'FUNDAQ SULMAN SANDI/SIMILER STAR', NULL, 'quad_bed', 'Makkah', 1, 1),
(33, 'FUNDAQ AREEJ AL WAFA/ABDULLAH GHAMMAS/SIMILER STAR (ROOM)', NULL, 'sharing', 'Makkah', 1, 1),
(34, 'FUNDAQ AREEJ AL WAFA/ABDULLAH GHAMMAS/SIMILER STAR (ROOM)', NULL, 'double_bed', 'Makkah', 1, 1),
(35, 'FUNDAQ AREEJ AL WAFA/ABDULLAH GHAMMAS/SIMILER STAR (ROOM)', NULL, 'triple_bed', 'Makkah', 1, 1),
(36, 'FUNDAQ AREEJ AL WAFA/ABDULLAH GHAMMAS/SIMILER STAR (ROOM)', NULL, 'quad_bed', 'Makkah', 1, 1),
(37, 'FUNDAQ DAR MISFALAH/FOZIA AL KARIM/SIMILER', NULL, 'sharing', 'Makkah', 1, 1),
(38, 'FUNDAQ DAR MISFALAH/FOZIA AL KARIM/SIMILER', NULL, 'double_bed', 'Makkah', 1, 1),
(39, 'FUNDAQ DAR MISFALAH/FOZIA AL KARIM/SIMILER', NULL, 'triple_bed', 'Makkah', 1, 1),
(40, 'FUNDAQ DAR MISFALAH/FOZIA AL KARIM/SIMILER', NULL, 'quad_bed', 'Makkah', 1, 1),
(41, 'FUNDAQ NOOH/SIMILER', NULL, 'sharing', 'Makkah', 1, 1),
(42, 'FUNDAQ NOOH/SIMILER', NULL, 'double_bed', 'Makkah', 1, 1),
(43, 'FUNDAQ NOOH/SIMILER', NULL, 'triple_bed', 'Makkah', 1, 1),
(44, 'FUNDAQ NOOH/SIMILER', NULL, 'quad_bed', 'Makkah', 1, 1),
(45, 'FUNDAQ NAZAL AL SAFA/QEEM AL BARAKA/SIMILER', NULL, 'sharing', 'Madina', 1, 1),
(46, 'FUNDAQ NAZAL AL SAFA/QEEM AL BARAKA/SIMILER', NULL, 'double_bed', 'Madina', 1, 1),
(47, 'FUNDAQ NAZAL AL SAFA/QEEM AL BARAKA/SIMILER', NULL, 'triple_bed', 'Makkah', 1, 1),
(48, 'FUNDAQ NAZAL AL SAFA/QEEM AL BARAKA/SIMILER', NULL, 'quad_bed', 'Madina', 1, 1),
(49, 'FUNDAQ MOHIBBAH AL KHALEEJ/AMAL SADA/SIMILER', NULL, 'sharing', 'Madina', 1, 1),
(50, 'FUNDAQ MOHIBBAH AL KHALEEJ/AMAL SADA/SIMILER', NULL, 'double_bed', 'Madina', 1, 1),
(51, 'FUNDAQ MOHIBBAH AL KHALEEJ/AMAL SADA/SIMILER', NULL, 'triple_bed', 'Madina', 1, 1),
(52, 'FUNDAQ MOHIBBAH AL KHALEEJ/AMAL SADA/SIMILER', NULL, 'quad_bed', 'Madina', 1, 1),
(53, 'FUNDAQ ABRAJ AL HAKIM/AL BISTAN/SIMILER G 6', NULL, 'sharing', 'Madina', 1, 1),
(54, 'FUNDAQ ABRAJ AL HAKIM/AL BISTAN/SIMILER G 6', NULL, 'double_bed', 'Madina', 1, 1),
(55, 'FUNDAQ ABRAJ AL HAKIM/AL BISTAN/SIMILER G 6', NULL, 'triple_bed', 'Madina', 1, 1),
(56, 'FUNDAQ ABRAJ AL HAKIM/AL BISTAN/SIMILER G 6', NULL, 'quad_bed', 'Madina', 1, 1),
(57, 'FUNDAQ RIAZ AL ANAS/HAMOODA AL SAKNI/SIMILER G 21,22', NULL, 'sharing', 'Madina', 1, 1),
(58, 'FUNDAQ RIAZ AL ANAS/HAMOODA AL SAKNI/SIMILER G 21,22', NULL, 'double_bed', 'Madina', 1, 1),
(59, 'FUNDAQ RIAZ AL ANAS/HAMOODA AL SAKNI/SIMILER G 21,22', NULL, 'triple_bed', 'Madina', 1, 1),
(60, 'FUNDAQ RIAZ AL ANAS/HAMOODA AL SAKNI/SIMILER G 21,22', NULL, 'quad_bed', 'Madina', 1, 1),
(61, 'FUNDAQ JOHRA AL SAFA G 21,22/BURJ MUKHTARA SALAM G 6/SIMLER', NULL, 'sharing', 'Madina', 1, 1),
(62, 'FUNDAQ JOHRA AL SAFA G 21,22/BURJ MUKHTARA SALAM G 6/SIMLER', NULL, 'double_bed', 'Madina', 1, 1),
(63, 'FUNDAQ JOHRA AL SAFA G 21,22/BURJ MUKHTARA SALAM G 6/SIMLER', NULL, 'triple_bed', 'Madina', 1, 1),
(64, 'FUNDAQ JOHRA AL SAFA G 21,22/BURJ MUKHTARA SALAM G 6/SIMLER', NULL, 'quad_bed', 'Madina', 1, 1),
(65, 'FUNDAQ ROZA AL SALAM/AL JAZEERA/SIMILER', NULL, 'sharing', 'Madina', 1, 1),
(66, 'FUNDAQ ROZA AL SALAM/AL JAZEERA/SIMILER', NULL, 'double_bed', 'Madina', 1, 1),
(67, 'FUNDAQ ROZA AL SALAM/AL JAZEERA/SIMILER', NULL, 'triple_bed', 'Madina', 1, 1),
(68, 'FUNDAQ ROZA AL SALAM/AL JAZEERA/SIMILER', NULL, 'quad_bed', 'Madina', 1, 1),
(69, 'FUNDAQ AREES AL MADINAH/DIYAR AL MADINAH/SIMILER', NULL, 'sharing', 'Madina', 1, 1),
(70, 'FUNDAQ AREES AL MADINAH/DIYAR AL MADINAH/SIMILER', NULL, 'double_bed', 'Madina', 1, 1),
(71, 'FUNDAQ AREES AL MADINAH/DIYAR AL MADINAH/SIMILER', NULL, 'triple_bed', 'Madina', 1, 1),
(72, 'FUNDAQ AREES AL MADINAH/DIYAR AL MADINAH/SIMILER', NULL, 'quad_bed', 'Madina', 1, 1),
(73, 'FUNDAQ AREES AL MADINAH/DIYAR AL MADINAH/SIMILER', NULL, 'quad_bed', 'Madina', 1, 1),
(74, 'FUNDAQ DAR AL SALAM ANDALUS/DIYIR AL TABA/SIMILER', NULL, 'sharing', 'Madina', 1, 1),
(75, 'FUNDAQ DAR AL SALAM ANDALUS/DIYIR AL TABA/SIMILER', NULL, 'double_bed', 'Madina', 1, 1),
(76, 'FUNDAQ DAR AL SALAM ANDALUS/DIYIR AL TABA/SIMILER', NULL, 'triple_bed', 'Madina', 1, 1),
(77, 'FUNDAQ DAR AL SALAM ANDALUS/DIYIR AL TABA/SIMILER', NULL, 'quad_bed', 'Madina', 1, 1),
(78, 'FUNDAQ AL SHAHIR/FUNDAQ DAR AL EIMAN JAZEERA', NULL, 'sharing', 'Makkah', 1, 1),
(79, 'FUNDAQ JAWHARAT AL-MUNSHIYA ', NULL, 'sharing', 'Makkah', 1, 1),
(80, 'FUNDAQ JOHRA AL SAFA /FUNDAQ AREES AL MADINAH', NULL, 'sharing', 'Madina', 1, 1),
(81, 'FUNDAQ JAWHARAT AL-MUNSHIYA/NAJMA AL KHALEEJ/SIMILER', NULL, 'sharing', 'Makkah', 1, 1),
(82, 'QIMMAT AL WAED HOTEL', NULL, 'sharing', 'Makkah', 1, 1),
(83, 'ABRAJ AL MADINA/MAHBA AL ANSAR GOLDEN /SIMILER', NULL, 'sharing', 'Madina', 1, 1),
(84, 'FUNDAQ SHAHIR/ADWA NAEEM/SIMILER', NULL, 'sharing', 'Makkah', 1, 1),
(85, 'FUNDAQ SHAHIR/ADWA NAEEM/SIMILER', NULL, 'quad_bed', 'Makkah', 1, 1),
(86, 'FUNDAQ SHAHIR/ADWA NAEEM/SIMILER', NULL, 'triple_bed', 'Makkah', 1, 1),
(87, 'FUNDAQ SHAHIR/ADWA NAEEM/SIMILER', NULL, 'double_bed', 'Makkah', 1, 1),
(88, 'FUNDAQ JOOD AL TAJ/SHAMOO/SADANA', NULL, 'sharing', 'Makkah', 1, 1),
(89, 'FUNDAQ JOOD AL TAJ/SHAMOO/SADANA', NULL, 'quad_bed', 'Makkah', 1, 1),
(90, 'FUNDAQ JOOD AL TAJ/SHAMOO/SADANA', NULL, 'triple_bed', 'Makkah', 1, 1),
(91, 'FUNDAQ JOOD AL TAJ/SHAMOO/SADANA', NULL, 'double_bed', 'Makkah', 1, 1),
(92, 'OLAYAN AL KHALEEJ/DARE AL EMAN GRAND/SIMILER ', NULL, 'quad_bed', 'Makkah', 1, 1),
(93, 'OLAYAN AL KHALEEJ/DARE AL EMAN GRAND/SIMILER 3STAR', NULL, 'triple_bed', 'Makkah', 1, 1),
(94, 'OLAYAN AL KHALEEJ/DARE AL EMAN GRAND/SIMILER 3STAR', NULL, 'double_bed', 'Makkah', 1, 1),
(95, 'FUNDAQ BALOORA TAJ/ASALA MAKKAH/REHAB UL NOOR&KHAIR/SIMILER', NULL, 'sharing', 'Makkah', 1, 1),
(96, 'FUNDAQ BALOORA TAJ/ASALA MAKKAH/REHAB UL NOOR&KHAIR/SIMILER', NULL, 'quad_bed', 'Makkah', 1, 1),
(97, 'FUNDAQ BALOORA TAJ/ASALA MAKKAH/REHAB UL NOOR&KHAIR/SIMILER', NULL, 'triple_bed', 'Makkah', 1, 1),
(98, 'FUNDAQ BALOORA TAJ/ASALA MAKKAH/REHAB UL NOOR&KHAIR/SIMILER', NULL, 'double_bed', 'Makkah', 1, 1),
(99, 'FUNDAQ RUFQA 2/DAR DOSHI/ SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(100, 'FUNDAQ RUFQA 2/DAR DOSHI/ SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(101, 'FUNDAQ RUFQA 2/DAR DOSHI/ SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(102, 'FUNDAQ RUFQA 2/DAR DOSHI/ SIMILER', NULL, 'double_bed', 'Makkah', 0, 1),
(103, 'FUNDUQ ABDULLAH MUTTIUL REHMAN/DAR DOSHI/MUSTORA BUSHRA/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(104, 'FUNDUQ ABDULLAH MUTTIUL REHMAN/MUSTORA BUSHRA/SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(105, 'FUNDAQ MANASIK RAHAB/MUSTORA BUSHRA/SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(106, 'FUNDUQ ABDULLAH MUTTIUL REHMAN/MUSTORA BUSHRA/SIMILER', NULL, 'double_bed', 'Makkah', 0, 1),
(107, 'FUNDAQ SHAHIR/ADWA NAEEM/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(108, 'FUNDAQ SHAHIR/ADWA NAEEM/SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(109, 'FUNDAQ SHAHIR/ADWA NAEEM/SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(110, 'FUNDAQ SHAHIR/ADWA NAEEM/SIMILER', NULL, 'double_bed', 'Makkah', 0, 1),
(111, 'FUNDAQ JOOD AL TAJ/ZAINAT AL HARAM /SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(112, 'FUNDAQ JOOD AL TAJ/SADANA ZADI /SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(113, 'FUNDAQ JOOD AL TAJ/SADANA ZADI /SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(114, 'FUNDAQ JOOD AL TAJ/SADANA ZADI /SIMILER', NULL, 'double_bed', 'Makkah', 0, 1),
(115, 'FUNDAQ HAYAT AL TAQWA/NAJMA AL KHALEEJ/MATTAR AL GEWAR/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(116, 'FUNDAQ HAYAT AL TAQWA/NAJMA AL KHALEEJ/MATTAR AL GEWAR/SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(117, 'FUNDAQ HAYAT AL TAQWA/NAJMA AL KHALEEJ/MATTAR AL GEWAR/SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(118, 'FUNDAQ HAYAT AL TAQWA/NAJMA AL KHALEEJ/MATTAR AL GEWAR/SIMILER', NULL, 'double_bed', 'Makkah', 0, 1),
(119, 'OLAYAN AL KHALEEJ/DARE AL EMAN GRAND/SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(120, 'OLAYAN AL KHALEEJ/DARE AL EMAN GRAND/SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(121, 'OLAYAN AL KHALEEJ/DARE AL EMAN GRAND/SIMILER', NULL, 'double_bed', 'Makkah', 0, 1),
(122, 'FUNDAQ LAMAR/SULMAN SANDI/SIMILER STAR', NULL, 'sharing', 'Makkah', 0, 1),
(123, 'FUNDAQ LAMAR/SULMAN SANDI/SIMILER STAR', NULL, 'quad_bed', 'Makkah', 0, 1),
(124, 'FUNDAQ LAMAR/SULMAN SANDI/SIMILER STAR', NULL, 'triple_bed', 'Makkah', 0, 1),
(125, 'FUNDAQ LAMAR/SULMAN SANDI/SIMILER STAR', NULL, 'double_bed', 'Makkah', 0, 1),
(126, 'FUNDAQ BALOORA TAJ/ASALA MAKKAH/REHAB UL NOOR&KHAIR/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(127, 'FUNDAQ BALOORA TAJ/ASALA MAKKAH/REHAB UL NOOR&KHAIR/SIMILER', NULL, 'single_bed', 'Makkah', 1, 1),
(128, 'FUNDAQ BALOORA TAJ/ASALA MAKKAH/REHAB UL NOOR&KHAIR/SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(129, 'FUNDAQ BALOORA TAJ/ASALA MAKKAH/REHAB UL NOOR&KHAIR/SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(130, 'FUNDAQ BALOORA TAJ/ASALA MAKKAH/REHAB UL NOOR&KHAIR/SIMILER', NULL, 'double_bed', 'Makkah', 0, 1),
(131, 'AREEJ AL WAFA /ABDULLAH GAHMAS/ SARWAT ANDLUSA/SIMILER 3STAR', NULL, 'sharing', 'Makkah', 0, 1),
(132, 'AREEJ AL WAFA /ABDULLAH GAHMAS/ SARWAT ANDLUSA/SIMILER 3STAR', NULL, 'quad_bed', 'Makkah', 0, 1),
(133, 'AREEJ AL WAFA /ABDULLAH GAHMAS/ SARWAT ANDLUSA/SIMILER 3STAR', NULL, 'triple_bed', 'Makkah', 0, 1),
(134, 'AREEJ AL WAFA /ABDULLAH GAHMAS/ SARWAT ANDLUSA/SIMILER 3STAR', NULL, 'double_bed', 'Makkah', 0, 1),
(135, 'FUNDAQ SUFRA AL JAZIRA/DAR MISFALAH/SIMILER ', NULL, 'sharing', 'Makkah', 0, 1),
(136, 'FUNDAQ SUFRA AL JAZIRA/DAR MISFALAH/SIMILER ', NULL, 'quad_bed', 'Makkah', 0, 1),
(137, 'FUNDAQ SUFRA AL JAZIRA/DAR MISFALAH/SIMILER ', NULL, 'triple_bed', 'Makkah', 0, 1),
(138, 'FUNDAQ SUFRA AL JAZIRA/DAR MISFALAH/SIMILER ', NULL, 'double_bed', 'Makkah', 0, 1),
(139, 'FUNDAQ LOLO SAWAAF/ QEEM AL BARAKA/ZIYAFA BASHAIR/SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(140, 'FUNDAQ LOLO SAWAAF/ QEEM AL BARAKA/ZIYAFA BASHAIR/SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(141, 'FUNDAQ LOLO SAWAAF/ QEEM AL BARAKA/ZIYAFA BASHAIR/SIMILER', NULL, 'double_bed', 'Madina', 0, 1),
(142, 'FUNDAQ GHADDAF AL FIZI/ANWAR AL MADAIN/AMAL SADA /SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(143, 'FUNDAQ GHADDAF AL FIZI/ANWAR AL MADAIN /SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(144, 'FUNDAQ GHADDAF AL FIZI/ANWAR AL MADAIN /SIMILER', NULL, 'triple_bed', 'Madina', 0, 1),
(145, 'FUNDAQ MOHIBBAH AL ANSAR/AMAL SADA/ANWAR AL MADAIN /SIMILER', NULL, 'double_bed', 'Madina', 0, 1),
(146, 'FUNDAQ BURJ MUKHTARA SALAM/DAR SALEEM/SIMLER', NULL, 'sharing', 'Madina', 0, 1),
(147, 'FUNDAQ JOHRA AL SAFA )/BURJ MUKHTARA SALAM/DAR SALEEM/SIMLER', NULL, 'quad_bed', 'Madina', 0, 1),
(148, 'FUNDAQ JOHRA AL SAFA )/BURJ MUKHTARA SALAM/DAR SALEEM/SIMLER', NULL, 'triple_bed', 'Madina', 0, 1),
(149, 'FUNDAQ JOHRA AL SAFA )/BURJ MUKHTARA SALAM/DAR SALEEM/SIMLER', NULL, 'double_bed', 'Madina', 0, 1),
(150, 'FUNDAQ AREES AL MADINAH/DIYAR AL MADINAH/AL JAZEERA/SIMILER', NULL, 'sharing', 'Makkah', 1, 1),
(151, 'FUNDAQ AREES AL MADINAH/DIYAR AL MADINAH/AL JAZEERA/SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(152, 'FUNDAQ AREES AL MADINAH/DIYAR AL MADINAH/AL JAZEERA/SIMILER', NULL, 'triple_bed', 'Madina', 0, 1),
(153, 'FUNDAQ AREES AL MADINAH/DIYAR AL MADINAH/AL JAZEERA/SIMILER', NULL, 'double_bed', 'Madina', 0, 1),
(154, 'FUNDAQ DAR AL SALAM ANDALUS/DIYIR AL TABA/SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(155, 'FUNDAQ DAR AL SALAM ANDALUS/DIYIR AL TABA/SIMILER', NULL, 'quad_bed', 'Makkah', 1, 1),
(156, 'FUNDAQ DAR AL SALAM ANDALUS/DIYIR AL TABA/SIMILER', NULL, 'triple_bed', 'Madina', 0, 1),
(157, 'FUNDAQ DAR AL SALAM ANDALUS/DIYIR AL TABA/SIMILER', NULL, 'double_bed', 'Madina', 0, 1),
(158, 'FUNDAQ DAR AL SALAM ANDALUS/DIYIR AL TABA/SIMILER', NULL, 'triple_bed', 'Madina', 1, 1),
(159, 'FUNDAQ DAR AL SALAM ANDALUS/DIYIR AL TABA/SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(160, 'FUNDAQ AREES AL MADINAH/DIYAR AL MADINAH/AL JAZEERA/SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(161, 'FUNDAQ QEEM AL BARAKA/SAEEDA UBEEDA /SIMILER', NULL, 'triple_bed', 'Madina', 0, 1),
(162, 'FUNDAQ ZAIYFA BASHAIR /FUNDAQ SAWAF/QEEM AL BARAKA/SIMILER', NULL, 'triple_bed', 'Madina', 1, 1),
(163, 'FUNDAQ JAWHARAT AL-MUNSHIYA/NAJMA AL KHALEEJ/SIMIL', NULL, 'sharing', 'Makkah', 0, 1),
(164, 'FUNDAQ JAWHARAT AL-MUNSHIYA/NAJMA AL KHALEEJ/SIMIL', NULL, 'quad_bed', 'Makkah', 0, 1),
(165, 'FUNDAQ JAWHARAT AL-MUNSHIYA/NAJMA AL KHALEEJ/SIMIL', NULL, 'triple_bed', 'Makkah', 0, 1),
(166, 'FUNDAQ JAWHARAT AL-MUNSHIYA/NAJMA AL KHALEEJ/SIMIL', NULL, 'double_bed', 'Makkah', 0, 1),
(167, 'FUNDAQ AREEN AL MODHAD/UBAIDE/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(168, 'FUNDAQ NOOH/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(169, 'FUNDAQ NOOH/SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(170, 'FUNDAQ NOOH/SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(171, 'FUNDAQ NOOH/SIMILER', NULL, 'double_bed', 'Makkah', 0, 1),
(172, 'FUNDAQ JOHRA AL SAFA/FUNDAQ AREES AL MADINAH', NULL, 'sharing', 'Madina', 0, 1),
(173, 'FUNDAQ AL-MUNSHIYA/DAR MISFALAH/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(174, 'HIBBAH AL HIJRAH', NULL, 'sharing', 'Makkah', 0, 1),
(175, 'QIMMAT AL WAED HOTEL', NULL, 'sharing', 'Makkah', 0, 1),
(176, 'FUNDAQ MOHIBBAH AL KHALEEJ/AMAL SADA/ANWAR AL MADAIN /SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(177, 'FUNDAQ MOHIBBAH AL KHALEEJ/AMAL SADA/ANWAR AL MADAIN /SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(178, 'FUNDAQ MOHIBBAH AL KHALEEJ/AMAL SADA/ANWAR AL MADAIN /SIMILER', NULL, 'triple_bed', 'Madina', 0, 1),
(179, 'FUNDAQ MOHIBBAH AL KHALEEJ/AMAL SADA/ANWAR AL MADAIN /SIMILER', NULL, 'double_bed', 'Madina', 0, 1),
(180, 'FUNDAQ MOHIBBAH AL ANSAR/ANWAR AL MADAIN /SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(181, 'FUNDAQ MOHIBBAH AL ANSAR/ANWAR AL MADAIN /SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(182, 'FUNDAQ MOHIBBAH AL ANSAR/ANWAR AL MADAIN /SIMILER', NULL, 'triple_bed', 'Madina', 0, 1),
(183, 'FUNDAQ MOHIBBAH AL ANSAR/ANWAR AL MADAIN /SIMILER', NULL, 'double_bed', 'Madina', 0, 1),
(184, 'FUNDAQ AHMAD HUSSAIN ZAFRANI/SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(185, 'FUNDAQ ZAINAT AL HARAM/AL WAZINANY/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(186, 'SELF ACCOMODATION MAKKAH', NULL, 'sharing', 'Makkah', 0, 1),
(187, 'SELF ACCOMODATION MADINAH', NULL, 'sharing', 'Madina', 0, 1),
(188, 'FUNDAQ SHAHIR/ADWA NAEEM/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(189, 'FUNDAQ LOLO SAWAAF/QEEM AL BARAKA/SAEEDA UBEEDA /SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(190, 'FUNDAQ LOLO SAWAAF/QEEM AL BARAKA/SAEEDA UBEEDA /SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(191, 'MAKKAH TOWER HOTEL', NULL, 'quad_bed', 'Makkah', 0, 1),
(192, 'FUNDAQ  AL MUKARAM ', NULL, 'sharing', 'Madina', 0, 1),
(193, 'MAKKAH TOWER HOTEL', NULL, 'sharing', 'Makkah', 0, 1),
(194, 'FUNDAQ ROYAL GALI/DAR AL MISFALA', NULL, 'quad_bed', 'Makkah', 0, 1),
(195, 'FUNDAQ DAR AL ARAB/YAHYA BADRI/SIMILAR', NULL, 'sharing', 'Makkah', 0, 1),
(196, 'AMAL SADA/ANWAR AL MADAIN /SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(197, 'FUNDAQ ZAINAT AL HARAM/AL WAZINANY/SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(198, 'FOZIA ABDUL KARIM/SIMILER', NULL, 'double_bed', 'Makkah', 0, 1),
(199, 'ANDALUS  DAR AL SALAM / AREES AL MADINAH/SIMILER', NULL, 'double_bed', 'Madina', 0, 1),
(200, 'FUNDAQ DIYIR AL TABA', NULL, 'double_bed', 'Madina', 0, 2),
(201, 'FUNDAQ QASRE RAID/NAJMA KHALIJ/SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(202, 'FUNDAQ QASER E GADEER /QASAR E ZUBEER/HAMDHA SAKNI/SIMILER', NULL, 'triple_bed', 'Madina', 1, 1),
(203, 'FUNDAQ QASER E GADEER /QASAR E ZUBEER/HAMUDA SAKNI/SIMILER ', NULL, 'triple_bed', 'Madina', 0, 1),
(204, 'FUNDUQ HAYAT AL TAQWA/ GANDURA  /NAJMA AL KHALEEJ/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(205, 'FUNDAQ QASRE RAID/NAJMA KHALIJ/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(206, 'FUNDAQ QASER E GADEER /QASAR E ZUBEER/HAMUDA SAKNI/SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(207, 'FUNDAR YAJID / SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(208, 'FUNDAQ DURRAT TABA / SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(209, 'FUNDAQ DAR MUHAMMAD', NULL, 'triple_bed', 'Makkah', 0, 1),
(210, 'FUNDAQ DAR MUHAMMAD / SIMILAR', NULL, 'triple_bed', 'Makkah', 0, 1),
(211, 'FUNDAQ ROYAL GALI', NULL, 'double_bed', 'Makkah', 0, 1),
(212, 'FUNDAQ AHMAD HUSSAIN ZAFRANI/SIMILER ', NULL, 'double_bed', 'Madina', 0, 1),
(213, 'FUNDAQ NOOH (ROYAL GALI) SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(214, 'FUNDAQ BURJ MUKHTARA SALAM/ZAFRANI/SIMLER', NULL, 'sharing', 'Madina', 0, 1),
(215, 'FUNDAQ GANDURA/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(216, 'AL KHOR TOWAR', NULL, 'sharing', 'Makkah', 0, 1),
(217, 'KARAM SILVER / HAYA ALWAHA', NULL, 'double_bed', 'Makkah', 0, 2),
(218, 'BADR AL MASA/ FAJAR AL BADIE', NULL, 'double_bed', 'Madina', 0, 2),
(219, 'BAISAN GOLDEN HOTEL/SIMILER', NULL, 'sharing', 'Makkah', 0, 2),
(220, 'MASARAT HOTEL', NULL, 'sharing', 'Makkah', 1, 2),
(221, 'ASWEER TAJ HOTEL', NULL, 'sharing', 'Makkah', 1, 2),
(222, 'ASWEER TAJ HOTEL', NULL, 'quad_bed', 'Makkah', 1, 2),
(223, 'ASWEER TAJ HOTEL', NULL, 'triple_bed', 'Makkah', 1, 2),
(224, 'HAMODA SAKNI HOTEL ', NULL, 'sharing', 'Madina', 1, 2),
(225, 'HAMODA SAKNI HOTEL ', NULL, 'quad_bed', 'Madina', 1, 2),
(226, 'HAMODA SAKNI HOTEL ', NULL, 'triple_bed', 'Madina', 1, 2),
(227, 'MASARAT HOTEL / SIMILER', NULL, 'sharing', 'Makkah', 0, 2),
(228, 'ASWEER TAJ HOTEL /JORAH MASFALA  / SIMILER', NULL, 'sharing', 'Makkah', 0, 2),
(229, 'ASWEER TAJ HOTEL / SIMILER', NULL, 'quad_bed', 'Makkah', 0, 2),
(230, 'ASWEER TAJ HOTEL / SIMILER', NULL, 'triple_bed', 'Makkah', 0, 2),
(231, 'MARKAZ ZAYA / HAMODA SAKNI HOTEL / SIMILER', NULL, 'sharing', 'Madina', 0, 2),
(232, 'HAMODA SAKNI HOTEL/SAFA TOWAR / SIMILER', NULL, 'quad_bed', 'Madina', 0, 2),
(233, 'HAMODA SAKNI HOTEL / SIMILER', NULL, 'triple_bed', 'Madina', 0, 2),
(234, 'TAJ WARDA / AREES AL MEDHINA /MIRA MAR / SIMILER', NULL, 'triple_bed', 'Madina', 0, 2),
(235, 'TAJ WARDA / AREES AL MEDHINA / SIMILER', NULL, 'quad_bed', 'Madina', 0, 2),
(236, 'HUD HUD HOTEL / SIMILER', NULL, 'triple_bed', 'Makkah', 0, 2),
(237, 'HUD HUD HOTEL / SIMILER', NULL, 'quad_bed', 'Makkah', 0, 2),
(238, 'KARAML AL KHAIR/ KARMAL AL ASHRAQ / SIMILER', NULL, 'triple_bed', 'Madina', 0, 2),
(239, 'KARAML AL KHAIR/ KARMAL AL ASHRAQ / SIMILER', NULL, 'quad_bed', 'Madina', 0, 2),
(240, 'JORAH MASFALA / FUNDAQ ASEL / SIMILER', NULL, 'sharing', 'Makkah', 0, 2),
(241, 'ASWEER TAJ HOTEL /JORAH MASFALA / SIMILER', NULL, 'quad_bed', 'Makkah', 0, 2),
(242, 'HOTEL QSRE GADEER AND HAMODA SKNI / SIMILER', NULL, 'triple_bed', 'Madina', 0, 1),
(243, 'RASHID UL KHALI / SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(244, 'AL MANSI / SIMILER', NULL, 'sharing', 'Makkah', 0, 2),
(245, 'MEHAD AL MADINA / SIMILER', NULL, 'sharing', 'Madina', 0, 2),
(246, 'BORJ MUKHTARA GOLDEN / AREES AL MEDHINA  / SIMILER', NULL, 'quad_bed', 'Madina', 0, 2),
(247, 'FUNDAQ JHORA  MUSFALA / SIMILER', NULL, 'quad_bed', 'Makkah', 0, 2),
(248, 'ZAHAR KHLEL /SIMILER', NULL, 'double_bed', 'Makkah', 0, 2),
(249, 'HAMDA SAKNI / SAF AL SAKNI / SIMILER', NULL, 'double_bed', 'Madina', 0, 2),
(250, ' ANDALUS  AL MEDHINA ', NULL, 'double_bed', 'Madina', 0, 2),
(251, 'ANDALUS AL MEDHINA', NULL, 'double_bed', 'Madina', 0, 1),
(252, 'MARKAZ ZAYA / FUNDAQ JUMA/ SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(253, 'FUNDAQ NAJMA KHALIG/JOHAR MASFALA/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(254, 'FUNDAQ  NAWARAT AL SHAMS 1 / SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(255, 'FUNDAQ  HAYA PLAZA / SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(256, 'FUNDAQ HAYA PLAZA/HAYA GOLDEN / SIMILER', NULL, 'double_bed', 'Madina', 0, 1),
(257, 'FUNDAQ BADAR AL MASA/SIMILER', NULL, 'double_bed', 'Makkah', 0, 1),
(258, 'FUNDAQ MASRAT /DAR SARYA / / SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(259, 'MEHAD AL MADHINA/JHORA QURBAN/ ASHRAQ AL MADIAN/SIMIL', NULL, 'sharing', 'Madina', 0, 1),
(260, 'FUNDAQ DAR AL WAHEED / SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(261, 'RAHAIB AL BHOESTAN / SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(262, 'MOVE & PICK HAJER TOWAR', NULL, 'triple_bed', 'Makkah', 0, 1),
(263, 'MYSK TOUCH HOTEL', NULL, 'triple_bed', 'Madina', 0, 1),
(264, 'AREEJ AL HIJRAH /SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(265, 'HAMDA SAKNI / SAF AL SAKNI / SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(266, 'GRAND ZOWAR/MARKAZI/ SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(267, 'J MUKHTARA SALAM/ HAMODA SAKNI  / SIMILER', NULL, 'sharing', 'Madina', 1, 1),
(268, 'MUKHTARA SALAM/ HAMODA SAKNI / SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(269, 'DAR E  AHTSHAM / SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(270, 'DAR E WAHEED/ SIMILER', NULL, 'double_bed', 'Makkah', 0, 1),
(271, 'MUBIRK PLAZA / SIMILER', NULL, 'double_bed', 'Makkah', 0, 1),
(272, 'BILAL MASHAD / SIMILER', NULL, 'double_bed', 'Makkah', 0, 1),
(273, 'BILAL MASHAD / SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(274, 'FUNDAQ MARSA BRONZE/HAMUDA SAKNI/SIMILER', NULL, 'double_bed', 'Madina', 0, 1),
(275, 'FUNDAQ MARSA BRONZE/HAMUDA SAKNI/SIMILER', NULL, 'triple_bed', 'Madina', 0, 1),
(276, 'DIAFAH MUKHTRA/SIMILER', NULL, 'double_bed', 'Madina', 0, 1),
(277, 'GRAND ZOWAR/MARKAZI/ SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(278, 'FUNDAQ JOHRA NAVEER /JOHAR MASFALA / SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(279, 'HIBBA DAR ZAYNAB/QAHIRA SAHARIAA /SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(280, 'TAHIRA SAHARIAA /SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(281, 'FUNDAQ MARSA BRONZE/HAMUDA SAKNI/SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(282, 'FUNDAQ MARSA BRONZE/HAMUDA SAKNI/SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(283, 'MATAR AL JAWAR/ SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(284, 'FUNDAQ JOHAR MASFALA/SIMILER ', NULL, 'quad_bed', 'Makkah', 0, 1),
(285, 'DIYAFATAL MOKHTARA HOTEL / SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(286, 'FUNDAQ  ADNAN / SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(287, 'FUNDAQ LOLO AL SAYES / SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(288, 'FANDAQ HAYAH WAHA /SIMLER', NULL, 'triple_bed', 'Madina', 0, 1),
(289, 'FUNDAQ ADNAN / AL RAYYAN / AL FALAH / SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(290, 'FUNDAQ ZAYABA / HAMUDA SAKNI/SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(291, 'MARKAZ ZAYAB / FUNDAQ JUMA/ SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(292, ' FUNDAQ JUMA/HAMUDA SAKNI/SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(293, 'FUNDAQ ADNAN / AL RAYYAN / AL FALAH / SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(294, 'FUNDAQ SAFA AL SAKNI/HAMUDA SAKNI/SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(295, 'DIAFAH MUKHTRA/MARKAZI/ SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(296, 'FUNDAQ ARIYAN AL-HIJRA HOTEL/ SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(297, 'FUNDAQ SAFA AL SAKNI/HAMUDA SAKNI/SIMILER', NULL, 'double_bed', 'Madina', 0, 1),
(298, 'FUNDAQ SAFA AL SAKNI/HAMUDA SAKNI/SIMILER', NULL, 'triple_bed', 'Madina', 0, 2),
(299, 'SAFA AL SAKNI[/ HAMODA SAKNI / SMILER', NULL, 'triple_bed', 'Madina', 0, 1),
(300, 'EMARAH HUSAINI/ SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(301, 'SYEDA UBAIDA HOTEL /SIMILER ', NULL, 'sharing', 'Madina', 0, 1),
(302, 'IBRAJ HIJRA HOTEL/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(303, 'DAR AMMAR / SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(304, 'FUNDAQ RAYAN ALFLAH / SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(305, 'ABU TURKI HOTEL / SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(306, 'MOVE & PICK HAJER TOWAR', NULL, 'quad_bed', 'Makkah', 0, 1),
(307, 'SAJAL AL MADINA / SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(308, 'ODST AL MADINA', NULL, 'single_bed', 'Madina', 0, 2),
(309, 'HUBA HIJRA/AREEJ AL HJIRA /SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(310, 'AL RITZ AL MADINA HOTEL/SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(311, 'SYEDA UBAIDA HOTEL /SIMILER', NULL, 'double_bed', 'Madina', 0, 1),
(312, 'SYEDA UBAIDA /JHORA QURBAN/ ASHRAQ AL MADIAN/SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(313, 'LAND PREMIUM/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(314, 'HIBBA DAR ZAYNAB/SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(315, 'DAR E AHTSHAM / SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(316, 'JHORA QURBAN/ ASHRAQ AL MADIAN/SIMILER', NULL, 'quad_bed', 'Madina', 0, 1),
(317, 'M MILLENNIUM HOTEL/ SIMILER', NULL, 'quad_bed', 'Makkah', 0, 2),
(318, 'DAR NAEEM / ARTAL AL MADINA / ODST AL MADINA / SIMILER', NULL, 'sharing', 'Madina', 0, 2),
(319, 'BANGALI MARKET', NULL, 'sharing', 'Madina', 0, 1),
(320, 'FUNDAQ JOHRA NAVEER /JOHAR MASFALA / SIMILER ', NULL, 'quad_bed', 'Makkah', 0, 2),
(321, 'ANWAR AL TAQWA /DAR SALEEM/SIMLER', NULL, 'quad_bed', 'Madina', 0, 2),
(322, 'DAR NIDA HOTEL BANGALI MARKITE/ SIMILER ', NULL, 'quad_bed', 'Madina', 0, 2),
(323, 'DAR NIDA HOTEL BANGALI MARKITE/ SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(324, 'MILLENNIUM DAN HOTEL/ SIMILER', NULL, 'quad_bed', 'Makkah', 0, 1),
(325, 'WAFA SALVER / DAR NIDA HOTEL/ SIMILER', NULL, 'sharing', 'Madina', 0, 1),
(326, 'DAR AMAR/FUNDAQ ADNAN / AL RAYYAN /  SIMILER', NULL, 'sharing', 'Makkah', 0, 1),
(327, 'WAFQ BIN USMAN HOTEL', NULL, 'quad_bed', 'Madina', 0, 1),
(328, 'ZAHAR KHLEL KHASARA MASI  /SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(329, 'ANWAR AL TAQWA /DAR SALEEM/SIMLER', NULL, 'triple_bed', 'Makkah', 1, 1),
(330, 'ANWAR AL TAQWA /DAR SALEEM/SIMLER', NULL, 'triple_bed', 'Madina', 0, 1),
(331, 'HUBA HIJRA/AREEJ AL HJIRA /SIMILER', NULL, 'triple_bed', 'Makkah', 0, 1),
(332, 'ANWAR AL TAQWA /DAR SALEEM/SIMLER', NULL, 'sharing', 'Madina', 0, 1),
(333, 'test hotel', NULL, 'five_bed', 'Makkah', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `packeg`
--

DROP TABLE IF EXISTS `packeg`;
CREATE TABLE IF NOT EXISTS `packeg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packeg`
--

INSERT INTO `packeg` (`id`, `name`, `isDeleted`) VALUES
(1, 'Economy', 0),
(2, 'Economy Plus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permotion_number`
--

DROP TABLE IF EXISTS `permotion_number`;
CREATE TABLE IF NOT EXISTS `permotion_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `isDeleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

DROP TABLE IF EXISTS `rights`;
CREATE TABLE IF NOT EXISTS `rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`id`, `name`) VALUES
(2, 'hotel_other'),
(3, 'user_agents'),
(4, 'clients'),
(5, 'ticket_sale'),
(6, 'flight_transection'),
(7, 'bank_transection'),
(8, 'agent_balance'),
(9, 'add_transection'),
(10, 'voucher'),
(11, 'reports'),
(12, 'edit_voucher'),
(13, 'approve_not_approve');

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

DROP TABLE IF EXISTS `sector`;
CREATE TABLE IF NOT EXISTS `sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`id`, `name`, `isDeleted`) VALUES
(1, 'JED', 1),
(2, 'LHR', 1),
(3, 'KCH', 1),
(4, 'ISL', 1),
(5, 'MUL', 1),
(6, 'FSD', 1),
(7, 'LHE', 0),
(8, 'KHI', 0),
(9, 'LYP', 0),
(10, 'ISB', 0),
(11, 'MUX', 0),
(12, 'BHV', 0),
(13, 'DXB', 0),
(14, 'MCT', 0),
(15, 'BAH', 0),
(16, 'RUH', 0),
(17, 'SKT', 0),
(18, 'DMM', 0),
(19, 'KWI', 0),
(20, 'AUH', 0),
(21, 'SHJ', 0),
(22, 'RUH', 1),
(23, 'PEW', 0),
(24, 'JED', 0),
(25, 'DOH', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

DROP TABLE IF EXISTS `tbl_items`;
CREATE TABLE IF NOT EXISTS `tbl_items` (
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  `itemHeader` varchar(512) NOT NULL COMMENT 'Heading',
  `itemSub` varchar(1021) NOT NULL COMMENT 'sub heading',
  `itemDesc` text COMMENT 'content or description',
  `itemImage` varchar(80) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`itemId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`itemId`, `itemHeader`, `itemSub`, `itemDesc`, `itemImage`, `isDeleted`, `createdBy`, `createdDtm`, `updatedDtm`, `updatedBy`) VALUES
(1, 'jquery.validation.js', 'Contribution towards jquery.validation.js', 'jquery.validation.js is the client side javascript validation library authored by Jörn Zaefferer hosted on github for us and we are trying to contribute to it. Working on localization now', 'validation.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL),
(2, 'CodeIgniter User Management', 'Demo for user management system', 'This the demo of User Management System (Admin Panel) using CodeIgniter PHP MVC Framework and AdminLTE bootstrap theme. You can download the code from the repository or forked it to contribute. Usage and installation instructions are provided in ReadMe.MD', 'cias.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

DROP TABLE IF EXISTS `tbl_reset_password`;
CREATE TABLE IF NOT EXISTS `tbl_reset_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reset_password`
--

INSERT INTO `tbl_reset_password` (`id`, `email`, `activation_id`, `agent`, `client_ip`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(22, 'mnadeemijaz@gmail.com', 'OirW6ea4uEjnhok', 'Firefox 58.0', '::1', 0, 1, '2018-03-30 11:23:14', NULL, NULL),
(23, 'mnadeemijaz@gmail.com', '5SWmeNU9MzVbCj6', 'Firefox 60.0', '39.55.158.64', 0, 1, '2018-08-02 11:47:30', NULL, NULL),
(24, 'mnadeemijaz@gmail.com', 'Vk35GuFpneq71oY', 'Firefox 60.0', '39.46.72.137', 0, 1, '2018-08-27 05:57:08', NULL, NULL),
(25, 'mnadeemijaz@gmail.com', 'BNm7tO6VCo2YI80', 'Firefox 60.0', '39.46.72.137', 0, 1, '2018-08-27 05:59:50', NULL, NULL),
(26, 'mnadeemijaz@gmail.com', 'APKZru6bFJQgT5I', 'Firefox 60.0', '39.46.72.137', 0, 1, '2018-08-27 06:04:09', NULL, NULL),
(27, 'mnadeemijaz@gmail.com', '7Y8hACoRn9DLcOv', 'Firefox 60.0', '39.46.72.137', 0, 1, '2018-08-27 06:04:40', NULL, NULL),
(28, 'mnadeemijaz@gmail.com', 'shnxPjFp6zWJULN', 'Firefox 60.0', '39.46.72.137', 0, 1, '2018-08-27 06:08:15', NULL, NULL),
(29, 'mnadeemijaz@gmail.com', 'pt5slv1ImU0xLdP', 'Firefox 60.0', '39.46.72.137', 0, 1, '2018-08-27 06:11:02', NULL, NULL),
(30, 'mnadeemijaz@gmail.com', 'KqodbQHsYjJtDf4', 'Firefox 60.0', '39.46.72.137', 0, 1, '2018-08-27 06:11:33', NULL, NULL),
(31, 'mnadeemijaz@gmail.com', 'bgTsdPfLAOSMtB8', 'Firefox 60.0', '39.46.72.137', 0, 1, '2018-08-27 06:24:22', NULL, NULL),
(32, 'mnadeemijaz@gmail.com', 'vhJdsU3NVl8By17', 'Firefox 60.0', '39.46.72.137', 0, 1, '2018-08-27 06:24:53', NULL, NULL),
(33, 'mnadeemijaz@gmail.com', 'NJlnqT7XIYHBECG', 'Firefox 60.0', '39.46.72.137', 0, 1, '2018-08-27 06:25:06', NULL, NULL),
(34, 'mnadeemijaz@gmail.com', 'rAVICm2E8xoZM96', 'Firefox 60.0', '39.46.72.137', 0, 1, '2018-08-27 07:06:09', NULL, NULL),
(35, 'mnadeemijaz@gmail.com', 'QgcEBvpxPDj7uNf', 'Firefox 60.0', '39.46.72.137', 0, 1, '2018-08-27 07:17:42', NULL, NULL),
(36, 'ALABRARTOURS725@GMAIL.COM', 'T2OxiSAXtj1KUH3', 'Chrome 68.0.3440.106', '39.46.173.62', 0, 1, '2018-08-27 08:02:49', NULL, NULL),
(37, 'ALABRARTOURS725@GMAIL.COM', 'z7al3FDcABo6GpT', 'Chrome 68.0.3440.106', '39.46.173.62', 0, 1, '2018-08-27 08:14:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text',
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'User'),
(3, 'Agent');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `c_name` varchar(150) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `adult_rate` int(11) DEFAULT NULL,
  `child_rate` int(11) DEFAULT NULL,
  `infant_rate` int(11) DEFAULT NULL,
  `document_fee` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`, `c_name`, `address`, `logo`, `adult_rate`, `child_rate`, `infant_rate`, `document_fee`) VALUES
(1, 'admin@admin.com', '$2y$10$w0W9v.AG26D6jw/tqFzC0e4JF/.Cizo6lpH2g2Esr86pOBeCCUXSa', 'Al Abrar', '12345678', 1, 0, 0, '2015-07-01 18:56:49', 1, '2022-06-06 09:23:56', 'Al Abrar Travels & Tours', 'New Building 1200 meter Makka', '89ALABRAR.png', NULL, NULL, NULL, NULL),
(67, 'A@T.COM', '$2y$10$KJvqHDUdZR3iIe7uWVefb.LTiPEzLztDPYMpSiMyHUs0hKKDdsZQO', 'Arham Travel', '03072290143', 3, 0, 1, '2019-10-29 08:51:33', NULL, NULL, 'ARHAM TRAVEL AND TOURS', 'HAROON ABAD', NULL, 750, 750, 650, NULL),
(66, 'JOHAR@RIAZ.COM', '$2y$10$iB/m9IEsRnxU.nNNGk.gGe3mIdtH3WeBmGUq9BewiB2URGmRUrEuy', 'Johar Riaz', '03026784579', 3, 0, 1, '2019-10-24 06:54:00', 1, '2022-09-19 12:48:20', 'JOHAR RIAZ TRAVELS', 'KAHROR PACCA', NULL, 0, 0, 0, '0'),
(65, 'A@Y.COM', '$2y$10$xUqAhcKAKBh3GRwUYvyfXeC37PwIkBbGAcy7JL1xG.KfBInQ2I91.', 'Lala Pak', '0444772569', 3, 0, 1, '2019-10-15 10:15:22', 1, '2019-10-19 09:22:01', 'NEW LALA PAK TRAVELS', 'BASIR PUR', NULL, 0, 0, 0, '0'),
(62, 'IJAZ@IJAZ.COM', '$2y$10$PVHRirLms0K1Skt.3btF9edo2Ax6pvAubZYLnqcd5U8oiUtGLu.2G', 'Ijaz Ahmad Karachi', '03000000000', 3, 0, 1, '2019-10-05 07:15:20', 1, '2019-12-23 09:41:17', 'IJAZ AHMAD KHI', 'KARACHI', NULL, 560, 560, 460, '0'),
(63, 'ASLAM@LASHRI.COM', '$2y$10$Afnu/DeJBXznoO9BWAp7Aee/YdyGsbyxxt3I7Ezy1kXtdcd3wEcuy', 'Aslam Lashri', '03006951229', 3, 0, 1, '2019-10-05 11:54:37', 1, '2020-02-20 07:44:29', 'LASHARI TRAVEL & TOURS', 'CHISHTIAN', NULL, 700, 700, 620, '0'),
(61, 'ABC@ABC.COM', '$2y$10$pJJYngZd4Rjp5B4q3CACxutpXSs7nh1I2WUNQSVZb/J4tgi3wEKQO', 'Al Karmanwala Travel & Tours', '03005369449', 3, 0, 1, '2019-10-02 12:41:41', NULL, NULL, 'AL KARMANWALA TRAVEL', 'MANDI SADIQ GUNJ', NULL, 270, 270, 270, NULL),
(60, 'ASIF@ASIF.COM', '$2y$10$DEZ6dqFNq3mKv.9ZlnpNeeT9L3neakgOtkOMg6AprSrGw4HquwaBm', 'Asif Muneer', '03067685078', 3, 0, 58, '2019-10-01 13:37:12', 1, '2019-12-26 09:09:16', 'ASIF TRAVEL & TOURS', 'BAHAWALNAGAR', NULL, 0, 0, 0, '0'),
(59, 'A@L.COM', '$2y$10$zfCpWm.j37EliBXU/n/UNesuOHrlc8q9o9xesHmlwJFgd5nOt3LWy', 'Ghaznafar', '0632277751', 2, 0, 58, '2019-09-27 07:33:26', 1, '2019-10-08 07:22:47', 'AL ABRAR TOURS', 'PARK ROED BAHAWALNAGAR', NULL, 0, 0, 0, NULL),
(58, 'NOMAN@GMAIL.COM', '$2y$10$5IzyALd2Pe3ivalaMqtoZeGf6Qm2tBt1r5f/OWud5pD7bTtSmg4ji', 'Noman', '03327033000', 2, 0, 1, '2019-09-27 07:29:56', NULL, NULL, 'AL ABRAR TOURS', 'BWN', NULL, NULL, NULL, NULL, NULL),
(57, 'ARSHAD@ARSHAD.COM', '$2y$10$s6XofaRwZTAsB6TVbD5qeO9OnWGIanivud2R7sbrKuWPHemTZpHQy', 'Arshad Rahi', '0632508843', 3, 0, 1, '2019-09-26 14:02:44', 1, '2020-02-20 08:25:16', 'ARSHAD RAHI TRAVEL AND TOURS', 'CHISHTIAN', NULL, 720, 720, 620, '0'),
(56, 'A@Z.COM', '$2y$10$edoAUOGq7Kch.YtGaUIG2.D43/YW5tJrTnU8BfceU9xDuR1QZFgb.', 'Azreesha', '03060421942', 3, 0, 1, '2019-09-26 10:42:56', 1, '2022-05-02 12:19:33', 'AZREESHA TRAVEL & TOURS CHISHTIAN', 'CHISHTIAN', 'phpVEPHOTO-2019-10-03-13-18-47.jpg', 0, 0, 0, '0'),
(55, 'M@I.COM', '$2y$10$ySI18tzflemsc/jZIgRrWuzXcEu6C84PHZGYM2v2Jy1S8MunbJPlG', 'Bait Ullah Travel', '03068686008', 3, 0, 1, '2019-09-25 12:21:26', 1, '2019-11-04 06:23:02', 'Bait Ullah Travel & Tours', '17/A, Aziz Bhatti Shaheed Road Model Town A, Bahawalpur', NULL, 700, 700, 620, '0'),
(54, 'SAFDAR@SAFDAR.COM', '$2y$10$fHYpILWSGYqfecWcND3eBuYIOeKuGudFuEevM1FPrZqb8PCScfR8K', 'Dr. Safdar Anjum', '03347034934', 3, 0, 1, '2019-09-11 14:18:14', 1, '2019-10-10 06:30:53', 'SAFDAR ANJUM TRAVEL AND TOURS', 'PUL FORDWA ARIF WALA ROAD BAHAWALNAGAR', NULL, 750, 750, 750, '0'),
(53, 'd@m.com', '$2y$10$PEzMu0XRhUJSl7b7XEhvEO510gH9KjWx7dOFhUTzQx4zwqHlMKUjS', 'Dar E Mustafa', '03339776775', 3, 0, 1, '2019-09-11 11:56:01', 1, '2019-10-18 06:54:41', 'DAR E MUSTAFA TRAVEL & TOURS ', 'HAVELI LAKHA', NULL, 740, 740, 600, '0'),
(52, 'R@T.COM', '$2y$10$aNkWq4c2k/UR.N41Itsyme7zp996gnKxakTipOdaoPvnvu31SlWyC', 'Rafi Tarvel', '03008586954', 3, 0, 1, '2019-09-04 07:35:18', 1, '2020-02-18 07:11:08', 'RAFI TRAVEL AND TOURS', 'DAHRANWAL', NULL, 710, 710, 610, '0'),
(50, 'g@s.com', '$2y$10$fCeXpvYZYjBpVBLS0Do/5.nD0IqThd/BMGVedC6bdHqzW6RYO1ZdC', 'Ghazanfar Sab', '03068686008', 3, 0, 1, '2019-09-01 06:14:32', 1, '2019-11-22 11:26:35', 'HAMZA TRAVEL & TOURS', 'BAHAWALPUR', NULL, 600, 600, 500, '0'),
(51, 'q@t.com', '$2y$10$HUZINpHBR3MH5GzXbLXnSebZStXcV6Ufg7fEnk8VSI4fia8zVJqAm', 'Qureshi Travel', '03008712445', 3, 0, 1, '2019-09-03 08:16:37', 58, '2019-12-14 07:02:43', 'QURESHI TRAVEL & TOURS', 'Multan', NULL, 270, 270, 270, '1'),
(49, 'SHAHZAD@SHAHZAD.COM', '$2y$10$T/jfCVOWpWBD3X.AmUNj3uIW1BNWnyrqEqOoeldBLCWCksrf6rQ1a', 'Shahzad Bhawalpur', '03006844693', 3, 0, 1, '2019-08-31 08:05:00', NULL, NULL, 'SAQIB TRAVEL AND TOURS', 'BAHAWALPUR', NULL, 270, 270, 270, NULL),
(64, 'M@Y.COM', '$2y$10$RUwLiIcLVMMvm4F95Y3WUu/A/GQl56ETbeuMbp3zhzEuRP5Sm03Em', 'Muhammad Yasin', '03004632475', 3, 1, 1, '2019-10-15 10:12:42', 1, '2019-10-15 10:16:28', 'NEW LALA PAK TRAVELS', 'BASEER PUR', NULL, 750, 750, 650, NULL),
(48, 'HAJI@ALI.COM', '$2y$10$vA1kG0JZxMQmX13lDNoUI.m6Je8OMNqMZJabBaC.eXF.hi2E/koSq', 'Haji Bagh Ali', '03072290143', 3, 0, 1, '2019-08-26 08:56:45', 1, '2019-10-22 12:45:36', 'HAJI BAGLI ALI TRAVEL & TOURS', 'BASIR PUR', NULL, 0, 0, 0, '0'),
(47, 'TAHIR@MAHMOOD.COM', '$2y$10$9fgJj5MwqbZRr424qCIFo.5P03i7OzhRzY.RQjqckeohJeuV33C3a', 'Tahir Mahmood', '03037066155', 3, 0, 1, '2019-08-22 10:36:37', 1, '2020-10-29 11:45:14', 'AHMAD TAHIR TRAVEL & TOURS', 'FORT ABBAS', NULL, 530, 560, 540, '0'),
(46, 'A@A.COM', '$2y$10$7NVHHx4xibe1Bp.uF85wYue8d67.q/NfzawxCQGWMU5iljHVxrVwG', 'Counter', '03072290143', 3, 0, 1, '2019-08-22 10:14:11', NULL, NULL, 'AL ABRAR TRAVEL & TOURS', 'PARK ROED BAHAWALNAGAR', NULL, 270, 270, 270, NULL),
(45, 'M@HUSSAIN.COM', '$2y$10$TPVJgDObO2.PjchQU0OPIetkRXjfZs1VA2gyMsPbliQLIZCktC26O', 'Muhammad Hussain', '03068686008', 3, 0, 1, '2019-08-21 10:36:17', 1, '2020-01-25 12:22:15', 'MUHAMMAD HUSSAIN TRAVEL AND TOURS', 'HAROON ABAD', NULL, 760, 760, 660, '0'),
(68, 'T@A.COM', '$2y$10$syPOl8D./ExJ/EXhqspAGe20ZxZizCthbjOC4xXRe2grZQsmVZdKq', 'Tanveer Ashraf', '0632277751', 3, 0, 1, '2019-11-06 09:38:32', 1, '2020-02-24 06:06:31', 'TANVEER ASHRAF TRAVEL & TOURS', 'BAHAWALNAGAR', NULL, 740, 740, 610, '0'),
(69, 'T@W.COM', '$2y$10$ILXnQqJcxeiviqzE3/mJdO2kBm4CLYjxbOV6ovED7b8g8qUhRr3wW', 'Taqwa Travel', '03077366800', 3, 0, 1, '2019-11-27 12:51:42', 1, '2020-01-22 07:33:27', 'TAQWA AROOJ TRAVEL & TOURS', 'Multan', NULL, 710, 710, 610, '0'),
(70, 'S@T.COM', '$2y$10$Nm/QStI3z0JZmlxe0Yr.KunQFrm4NyKb/gVi//pLIdKUz74zFc7rG', 'Shakeel', '0307544298', 3, 0, 1, '2019-12-04 12:00:50', 1, '2019-12-13 09:52:53', 'SHAKEEL TRAVEL & TOURS', 'BASEER PUR', NULL, 0, 0, 0, '0'),
(71, 'A@I.COM', '$2y$10$bzE71WxDrybV3V4q3daU6.DgPiatnirGU4kENQYVLqgtg4ih.YwgW', 'Al Ikhlas', '02132330295', 3, 0, 1, '2019-12-10 13:57:45', 1, '2020-03-06 13:21:15', 'AL-IKHLAS TRAVEL & TOURS ', 'KARACHI', NULL, 700, 700, 600, '0'),
(72, 'K@S.COM', '$2y$10$zILzIbl5bVAyOpc.f8kJcOcvlBwtZ1hFHy8em3zPLAyNegREs6r06', 'Karwana Sabireen', '03007896541', 3, 0, 1, '2019-12-13 11:23:24', NULL, NULL, 'KARWANA SABIREEN TRAVEL', 'ISLAMABAD', NULL, 560, 560, 460, NULL),
(73, 'J@K.COM', '$2y$10$4N86PjRAVVegKvzCMEey8uMn/xLcGZ5fpdaLAKM8wdL4Fx8NtI3f2', 'Jam Kamal Travel', '0632277751', 3, 0, 58, '2019-12-20 13:28:25', 1, '2019-12-25 08:37:46', 'JAM KAMAL TRAVEL AND TOURS', 'SAKAR', NULL, 540, 540, 440, '0'),
(74, 'I@B.COM', '$2y$10$heG6m442fbtks.qc3MidOe4wRmidLdrmpCWWJNNnBUC/f6Z3QN0ta', 'Imtiaz Bukhari', '0632277751', 3, 0, 58, '2019-12-20 13:30:13', 1, '2020-02-09 10:24:08', 'IMTIAZ BUKHARI TRAVEL AND TOURS', 'RAHIM YAR KHAN', NULL, 700, 700, 610, '0'),
(75, 'S@H.COM', '$2y$10$53hDyiEYIPWk1fiFlNhzaOL4N7Ie2xiqIuxkbmr.nqokx9t4zTjq.', 'Sajjad Hussain', '03216606399', 3, 0, 1, '2020-02-03 09:37:08', 1, '2020-02-20 11:32:07', 'BROLLA TRAVEL & TOURS', 'Multan', NULL, 700, 710, 620, '47.62'),
(76, 'M@S.COM', '$2y$10$jeFZy6ejB4J5/PKoPEB7JO71dOww8hoNfl8LKCsqEclmUOceLXiW6', 'Muhammad Sohail', '0300000001', 3, 0, 1, '2020-02-03 09:38:52', 1, '2020-02-03 11:09:57', 'MUHAMMAD SOHAIL TRAVEL & TOURS', 'LAHORE', NULL, 705, 705, 620, '0'),
(77, 'SSS@SSS.COM', '$2y$10$oumdXT4vfuUaanMy4WMPAO82KWvH7BVZQ1b30nK7SIaF5OHh1CC3y', 'Sadiq', '03311362436', 3, 0, 1, '2022-02-07 10:07:13', NULL, NULL, 'SADIQ', 'MULTAN', NULL, 720, 720, 620, NULL),
(78, 'RASEED@RASEED.COM', '$2y$10$kK6mszRaR7hhWlxmHVVnTOefyqhocmv3O6cgXiPrscux4TIDWuVRa', 'Rasheed', '03012073172', 3, 0, 1, '2022-03-15 06:37:30', 1, '2022-08-27 06:25:20', 'MUHAMMAD HUSSAIN TRAVEL AND TOURS', 'DARA WALA', NULL, 0, 0, 0, '0'),
(79, 'WAQAS@BUKHRAI.COM', '$2y$10$0.Qy364vN/y8XLQ4K.bZW.ie9s7hQ03twzvwRS1D.Om4eqaMh5nKO', 'Waqas Bukhari', '03126699932', 3, 0, 1, '2022-03-15 06:38:50', NULL, NULL, 'MAAZ BUKHARI TRAVEL', 'BAHAWAL NAGAR', NULL, 720, 720, 620, NULL),
(80, 'SHAHZAID@BHV.COM', '$2y$10$rokH800n2AkhQDFRgonNp.xwKEbgcOlkJhr6rAeQk/t6ZaWMOkBTu', 'Shahzaid Bhv', '03352277751', 3, 0, 1, '2022-03-19 07:06:54', NULL, NULL, 'SHAHZAID BHV TRAVEL ', 'BAHWALPUR', NULL, 720, 720, 620, NULL),
(81, 'BAHAG@ALI.COM', '$2y$10$2PXqMNaROsmkYW79Cy0cL.H/7raSgrLt8xpWjWKIiAAg4llMiRa.6', 'Bahag Ali', '03214569874', 3, 0, 1, '2022-03-22 06:27:00', NULL, NULL, 'BAHAG ALI', 'HAVLI LAKHA', NULL, 720, 720, 620, NULL),
(82, 'AL@IKHLAS.COM', '$2y$10$.BCHyV/HOkUR3OdY23yJVuESaG95F7bJ1HpxpepHjkvgPZozSHX0m', 'Al-ikhlas Travel & Tours', '02132330295', 3, 0, 1, '2022-08-10 10:44:49', 1, '2022-08-10 10:45:55', 'AL-IKHLAS TRAVEL & TOURS ', 'KARACHI', NULL, 0, 0, 0, '0'),
(83, 'M@22.COM', '$2y$10$O7sHLLybh.0vOg8oEBxRH.TZ8sobKH0c5T5wrkQh.3GsuADGRyU9q', 'Hafiz Muhammad Sohail', '3006844693', 3, 0, 1, '2022-08-11 11:30:00', 1, '2022-08-11 11:30:21', 'HAFIZ MUHAMMAD SOHAIL ', 'MED', NULL, 0, 0, 0, '0'),
(84, 'RAHI@SAB.COM', '$2y$10$kZjt9Qxev6VM/UZWzOv7uukDb2PG6i0A16a46xTT9CMIeaO1BJBna', 'Rahi Sab', '03039163357', 3, 0, 1, '2022-08-14 10:02:36', 1, '2022-08-23 05:33:10', 'RAHI TRAVEL', 'Chishtian', NULL, 0, 0, 0, '0'),
(85, 'M@R23.COM', '$2y$10$FK3d3D2NSmZGkqlg6K7VIugm3UIRRSD/e6Z0s2hTte/FG1C721pXi', 'M Rafi 2023', '03008586954', 3, 0, 1, '2022-08-21 05:32:52', 1, '2022-08-25 05:55:15', 'RAFI TARVEL', 'DARA WALA', NULL, 0, 0, 0, '0'),
(86, 'MM@ASIF.COM', '$2y$10$pmR4nkJ5POk4PhR1X4VOo.THJ6VJJuXRfYfCqkDhjLZMG84FgwYwS', 'Muhammad Asif', '03067685078', 3, 0, 1, '2022-08-25 10:11:59', 1, '2022-08-25 10:23:56', 'ASIF TRAVEL AND TOURS', 'BAHAWAL NAGAR', NULL, 0, 0, 0, '0'),
(87, 'J@A.COM', '$2y$10$PJQTWcX9QHwpsP2pwg1XKOoaKoRZPgiArmuE27Tvn57aLi4pt5os2', 'Jam Abdullah', '0000000000', 3, 0, 1, '2022-09-05 12:08:29', 1, '2022-09-05 12:09:27', 'JAM ABDULLAH TRAVEL AND TOURS', '.', NULL, 0, 0, 0, '0'),
(88, 'ASLAM@LASH.COM', '$2y$10$zooa1b.8IDcOC7l7mz0Nxu3o8euajJ2KIppJ/6AjKpLtMKo1e2yfa', 'Lashri Travel And Tours', '03006951229', 3, 0, 1, '2022-09-17 05:27:00', 1, '2022-09-17 05:27:16', 'LASHRI TRAVEL AND TOURS', 'BAHAWAL NAGAR', NULL, 0, 0, 0, '0'),
(89, 'NOORI@S.COM', '$2y$10$zTezhDqMCGTHzLPv898jAOtx2fuW4Q2LMVyAMK7XerltGF4X48G0S', 'Noori Express', '03142150137', 3, 0, 1, '2022-09-24 05:05:05', 1, '2022-09-25 12:00:40', 'NOORI EXPRESS TRAVEL AND TOURS', 'KARACHI', 'phppxWhatsApp_Image_2022-05-24_at_4.38.36_PM-removebg-preview.png', 0, 0, 0, '0'),
(90, 'M@Y.COM', '$2y$10$PuT88J9Eq6PvXba9iN/Jf.DEOHwzKQ1AbYCt/zw4Njgwl/aNpqGxi', 'M Yousaf', '03216303521', 3, 0, 1, '2022-10-21 06:14:33', 1, '2022-10-22 05:44:09', 'KARWAN E MUBARAK TRAVELS AND TOURS', 'MULTAN', NULL, 0, 0, 0, '0'),
(91, 'TA@A.COM', '$2y$10$AmG0DCJj6aGpDJFSIttaNeG6cW2DIDIndp2nlEurhK49rvtmv1esS', 'Tanveer Ashraf Bahawalnagar', '03349606060', 3, 0, 1, '2022-11-26 06:00:44', 1, '2023-02-04 05:11:42', 'TANVEER ASHRAF TRAVEL AND TOURS', 'BAHAWAL NAGAR', NULL, 0, 0, 0, '0'),
(92, 'NOORI@E.COM', '$2y$10$ykunNJen7cLhaT1PUCTK6ezFqiRVgPa0lliXmA0WipjExJEcp5Qwe', 'Noori Express Ticket', '03006844693', 3, 0, 1, '2022-12-03 12:00:24', NULL, NULL, 'NOORI EXPRESS TICKET', 'KARACHI', NULL, 720, 720, 720, NULL),
(93, 'SANABEL@B.COM', '$2y$10$6I3jCJqFrxH/E8E5ExbhQOod7CWP1o2TqKPukZefJk0Gwz828Dvta', 'Sanabel', '03154705560', 3, 0, 1, '2022-12-19 12:11:07', 1, '2022-12-23 09:50:23', 'SANABEL ALHUDA TRAVEL & TOURS', 'Quetta', NULL, 0, 0, 0, '0'),
(94, 'ALI@SAB.COM', '$2y$10$pgsrd9tp//UFq1WHhadpNu9ZSJS6t5vfszQBQaSrbvBgig5S2k53C', 'Ali Sab', '8974563211', 3, 0, 1, '2023-02-02 10:40:30', 96, '2023-06-20 12:39:16', 'ALI MALAYSAIA', 'MALAYSAIA', NULL, 720, 720, 720, '0'),
(95, 'admin12@admin.com', '$2y$10$IificSnanYc8u7h.g.l1.OBouQfZzhmQZKuObPa20n/UEGFmrBMgC', 'Allah Rakha', '12345678', 1, 0, 0, '2015-07-01 18:56:49', 1, '2023-06-14 04:24:06', 'Al Abrar', 'New Building 1200 meter Makka', '89ALABRAR.png', NULL, NULL, NULL, NULL),
(96, 'admin2@admin.com', '$2y$10$F3EhElqWFNQnQghDsTSwPeJZT1AuWen7EthwJnzHGT7nLhRh0gfHO', 'Nadeem', '923017893497', 1, 0, 95, '2023-06-20 12:34:17', NULL, NULL, 'test', 'test', NULL, NULL, NULL, NULL, NULL),
(97, 'test@test.com', '$2y$10$x6q/DCBY0zjuVkp27FzBw.9wuXs06NSo66JHULNyhyoIcdNyj4Y9K', 'Test', '923017893497', 3, 0, 96, '2023-06-20 13:18:50', NULL, NULL, 'test', 'test', NULL, 720, 720, 720, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_sale`
--

DROP TABLE IF EXISTS `ticket_sale`;
CREATE TABLE IF NOT EXISTS `ticket_sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(120) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `ticket_no` varchar(100) NOT NULL,
  `pnr` varchar(100) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `ticket_from_to` varchar(120) NOT NULL,
  `category` varchar(110) NOT NULL,
  `purchase` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `bps_sale` enum('no','yes') DEFAULT 'no',
  `isDeleted` int(11) DEFAULT '0',
  `payment_status` enum('partial','full') DEFAULT NULL,
  `paid_amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_sale_payment`
--

DROP TABLE IF EXISTS `ticket_sale_payment`;
CREATE TABLE IF NOT EXISTS `ticket_sale_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_sale_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transection`
--

DROP TABLE IF EXISTS `transection`;
CREATE TABLE IF NOT EXISTS `transection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `account_type` enum('client','agent') NOT NULL,
  `voucher_id` int(11) DEFAULT NULL,
  `payment_type` enum('cr','dr') NOT NULL,
  `amount` int(11) NOT NULL,
  `isDeleted` int(11) DEFAULT NULL,
  `detail` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `bt_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

DROP TABLE IF EXISTS `trip`;
CREATE TABLE IF NOT EXISTS `trip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`id`, `name`, `vehicle_id`, `price`, `isDeleted`) VALUES
(1, 'MAD-API-MAD-HTL', 1, 0, 0),
(2, 'MAK-MAD', 1, 0, 0),
(3, 'MAD-MAK', 1, 0, 0),
(4, 'MAK-JED', 1, 0, 0),
(5, 'MAK-MAD-MAK', 1, 0, 0),
(6, 'MAD-MAK-JED', 1, 0, 0),
(7, 'MAD-MAK-MAD', 1, 0, 0),
(8, 'JED-MAK-MAD', 1, 0, 0),
(9, 'JED-MAK-MAD-MAK', 1, 0, 0),
(10, 'MAD-HTL-MAD-APT', 1, 0, 0),
(11, 'MAD-AIRPORT-MAD-MAK-JED', 1, 0, 0),
(12, 'MAD-AIRPORT-MAD-MAK-MAD-MAD-AIRPORT', 1, 0, 0),
(13, 'JED-MAK-MAD-MAD-AIRPORT', 1, 0, 0),
(14, 'JED-MAD-MAK-JED', 1, 0, 0),
(15, 'MAD-APT-MAD-MAK', 1, 0, 0),
(16, 'MAD-APT-MAD-& MAK-JED', 1, 0, 0),
(17, 'JED-MAK & MAD HTL-MAD-APT', 1, 0, 0),
(18, 'MAK-MAD-HTL-MAD-APT', 1, 0, 0),
(19, 'JED-MAD', 1, 0, 0),
(20, 'MAD-APT-MAD-HTL & MAD HTL-MAD APT', 1, 0, 0),
(21, 'MAK-MAD-MAK-JED', 1, 0, 0),
(22, 'MAK-MAZARAT', 1, 0, 0),
(23, 'MAD-MAZARAT', 1, 0, 0),
(24, 'NONE', 1, 0, 0),
(25, 'JED-MAK', 1, 0, 0),
(26, 'JED-MAK-MAD-JED', 1, 0, 0),
(27, 'JED-MAK-MAD-MAK-JED', 1, 0, 0),
(28, 'JED-MAK-JED', 1, 0, 0),
(29, 'MAD-API-MAD-HTL', 2, 0, 0),
(30, 'MAK-MAD', 2, 0, 0),
(31, 'MAD-MAK', 2, 0, 0),
(32, 'MAK-JED', 2, 0, 0),
(33, 'MAK-MAD-MAK', 2, 0, 0),
(34, 'MAD-MAK-JED', 2, 0, 0),
(35, 'MAD-MAK-MAD', 2, 0, 0),
(36, 'JED-MAK-MAD', 2, 0, 0),
(37, 'JED-MAK-MAD-MAK', 2, 0, 0),
(38, 'MAD-HTL-MAD-APT', 2, 0, 0),
(39, 'MAD-AIRPORT-MAD-MAK-JED', 2, 0, 0),
(40, 'MAD-AIRPORT-MAD-MAK-MAD-MAD-AIRPORT', 2, 0, 0),
(41, 'JED-MAK-MAD-MAD-AIRPORT', 2, 0, 0),
(42, 'JED-MAD-MAK-JED', 2, 0, 0),
(43, 'MAD-APT-MAD-MAK', 2, 0, 0),
(44, 'MAD-APT-MAD-& MAK-JED', 2, 0, 0),
(45, 'JED-MAK & MAD HTL-MAD-APT', 2, 0, 0),
(46, 'MAK-MAD-HTL-MAD-APT', 2, 0, 0),
(47, 'JED-MAD', 2, 0, 0),
(48, 'MAD-APT-MAD-HTL & MAD HTL-MAD APT', 2, 0, 0),
(49, 'MAK-MAD-MAK-JED', 2, 0, 0),
(50, 'MAK-MAZARAT', 2, 0, 0),
(51, 'MAD-MAZARAT', 2, 0, 0),
(52, 'NONE', 2, 0, 0),
(53, 'JED-MAK', 2, 0, 0),
(54, 'JED-MAK-MAD-JED', 2, 0, 0),
(55, 'JED-MAK-MAD-MAK-JED', 2, 0, 0),
(56, 'JED-MAK-JED', 2, 0, 0),
(57, 'MAD-API-MAD-HTL', 3, 0, 0),
(58, 'MAK-MAD', 3, 0, 0),
(59, 'MAD-MAK', 3, 0, 0),
(60, 'MAK-JED', 3, 0, 0),
(61, 'MAK-MAD-MAK', 3, 0, 0),
(62, 'MAD-MAK-JED', 3, 0, 0),
(63, 'MAD-MAK-MAD', 3, 0, 0),
(64, 'JED-MAK-MAD', 3, 0, 0),
(65, 'JED-MAK-MAD-MAK', 3, 0, 0),
(66, 'MAD-HTL-MAD-APT', 3, 0, 0),
(67, 'MAD-AIRPORT-MAD-MAK-JED', 3, 0, 0),
(68, 'MAD-AIRPORT-MAD-MAK-MAD-MAD-AIRPORT', 3, 0, 0),
(69, 'JED-MAK-MAD-MAD-AIRPORT', 3, 0, 0),
(70, 'JED-MAD-MAK-JED', 3, 0, 0),
(71, 'MAD-APT-MAD-MAK', 3, 0, 0),
(72, 'MAD-APT-MAD-& MAK-JED', 3, 0, 0),
(73, 'JED-MAK & MAD HTL-MAD-APT', 3, 0, 0),
(74, 'MAK-MAD-HTL-MAD-APT', 3, 0, 0),
(75, 'JED-MAD', 3, 0, 0),
(76, 'MAD-APT-MAD-HTL & MAD HTL-MAD APT', 3, 0, 0),
(77, 'MAK-MAD-MAK-JED', 3, 0, 0),
(78, 'MAK-MAZARAT', 3, 0, 0),
(79, 'MAD-MAZARAT', 3, 0, 0),
(80, 'NONE', 3, 0, 0),
(81, 'JED-MAK', 3, 0, 0),
(82, 'JED-MAK-MAD-JED', 3, 0, 0),
(83, 'JED-MAK-MAD-MAK-JED', 3, 0, 0),
(84, 'JED-MAK-JED', 3, 0, 0),
(85, 'MAD-API-MAD-HTL', 4, 0, 0),
(86, 'MAK-MAD', 4, 0, 0),
(87, 'MAD-MAK', 4, 0, 0),
(88, 'MAK-JED', 4, 0, 0),
(89, 'MAK-MAD-MAK', 4, 0, 0),
(90, 'MAD-MAK-JED', 4, 0, 0),
(91, 'MAD-MAK-MAD', 4, 0, 0),
(92, 'JED-MAK-MAD', 4, 0, 0),
(93, 'JED-MAK-MAD-MAK', 4, 0, 0),
(94, 'MAD-HTL-MAD-APT', 4, 0, 0),
(95, 'MAD-AIRPORT-MAD-MAK-JED', 4, 0, 0),
(96, 'MAD-AIRPORT-MAD-MAK-MAD-MAD-AIRPORT', 4, 0, 0),
(97, 'JED-MAK-MAD-MAD-AIRPORT', 4, 0, 0),
(98, 'JED-MAD-MAK-JED', 4, 0, 0),
(99, 'MAD-APT-MAD-MAK', 4, 0, 0),
(100, 'MAD-APT-MAD-& MAK-JED', 4, 0, 0),
(101, 'JED-MAK & MAD HTL-MAD-APT', 4, 0, 0),
(102, 'MAK-MAD-HTL-MAD-APT', 4, 0, 0),
(103, 'JED-MAD', 4, 0, 0),
(104, 'MAD-APT-MAD-HTL & MAD HTL-MAD APT', 4, 0, 0),
(105, 'MAK-MAD-MAK-JED', 4, 0, 0),
(106, 'MAK-MAZARAT', 4, 0, 0),
(107, 'MAD-MAZARAT', 4, 0, 0),
(108, 'NONE', 4, 0, 0),
(109, 'JED-MAK', 4, 0, 0),
(110, 'JED-MAK-MAD-JED', 4, 0, 0),
(111, 'JED-MAK-MAD-MAK-JED', 4, 0, 0),
(112, 'JED-MAK-JED', 4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

DROP TABLE IF EXISTS `user_rights`;
CREATE TABLE IF NOT EXISTS `user_rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `right_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=227 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_rights`
--

INSERT INTO `user_rights` (`id`, `right_id`, `user_id`) VALUES
(182, 13, 58),
(181, 12, 58),
(180, 11, 58),
(179, 10, 58),
(158, 13, 19),
(157, 12, 19),
(156, 11, 19),
(155, 10, 19),
(46, 11, 13),
(45, 10, 13),
(154, 8, 19),
(153, 5, 19),
(178, 9, 58),
(177, 8, 58),
(144, 11, 20),
(152, 4, 19),
(133, 11, 22),
(132, 10, 22),
(176, 7, 58),
(175, 6, 58),
(174, 5, 58),
(173, 4, 58),
(172, 3, 58),
(171, 2, 58),
(214, 13, 59),
(213, 11, 59),
(212, 10, 59),
(211, 8, 59),
(210, 5, 59),
(209, 4, 59),
(208, 3, 59),
(215, 2, 96),
(216, 3, 96),
(217, 4, 96),
(218, 5, 96),
(219, 6, 96),
(220, 7, 96),
(221, 8, 96),
(222, 9, 96),
(223, 10, 96),
(224, 11, 96),
(225, 12, 96),
(226, 13, 96);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  `sharing` enum('no','yes') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `name`, `isDeleted`, `sharing`) VALUES
(1, 'Buss', 0, 'yes'),
(2, 'GMC', 0, 'no'),
(3, 'HIACE', 0, 'no'),
(4, 'H.1', 0, 'no'),
(5, 'CAR', 0, 'no'),
(6, 'COASTER', 0, 'no'),
(7, 'Self', 0, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `visa_company`
--

DROP TABLE IF EXISTS `visa_company`;
CREATE TABLE IF NOT EXISTS `visa_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visa_company`
--

INSERT INTO `visa_company` (`id`, `name`, `isDeleted`) VALUES
(1, 'MADA AL OMRAN', 0),
(2, 'SHARIA', 1),
(3, 'ABU ZAID', 1),
(4, 'TALBIYAH', 0),
(5, 'DREAM WORLD', 1),
(6, 'ABDULLAH AL GHAMDI', 0),
(7, 'SAMI SAAD AL AHMADI', 1),
(8, 'DARAL AL WAFAD', 1),
(9, 'Other', 0),
(10, 'MAKKAH OPPORTUNITIES', 0);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

DROP TABLE IF EXISTS `voucher`;
CREATE TABLE IF NOT EXISTS `voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_date` date NOT NULL,
  `dep_time` time NOT NULL,
  `arv_date` date NOT NULL,
  `arv_time` time NOT NULL,
  `dep_sector` int(11) NOT NULL,
  `dep_sector2` varchar(100) NOT NULL,
  `dep_flight` int(11) NOT NULL,
  `dep_flight_no` varchar(100) NOT NULL,
  `dep_pnr_no` varchar(100) NOT NULL,
  `ret_sector` varchar(110) NOT NULL,
  `ret_sector2` int(100) NOT NULL,
  `ret_flight` int(11) NOT NULL,
  `ret_flight_no` varchar(100) NOT NULL,
  `ret_pnr_no` varchar(100) NOT NULL,
  `ret_date` date NOT NULL,
  `ret_time` time NOT NULL,
  `nights` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `trip_name` varchar(100) NOT NULL,
  `trip_amount` int(11) NOT NULL,
  `total_amount` float NOT NULL,
  `approve` enum('no','yes') NOT NULL DEFAULT 'no',
  `isDeleted` int(11) NOT NULL,
  `date` date NOT NULL,
  `adult_rate` int(11) NOT NULL,
  `child_rate` int(11) NOT NULL,
  `infant_rate` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `sr_rate` float NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `pkg_type` int(11) NOT NULL,
  `gp_hd_no` varchar(100) NOT NULL,
  `nziarat` int(11) NOT NULL,
  `document` enum('no','yes') NOT NULL,
  `document_fee` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_client`
--

DROP TABLE IF EXISTS `voucher_client`;
CREATE TABLE IF NOT EXISTS `voucher_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `document` enum('no','yes') NOT NULL,
  `document_fee` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_hotel`
--

DROP TABLE IF EXISTS `voucher_hotel`;
CREATE TABLE IF NOT EXISTS `voucher_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) NOT NULL,
  `city_nights` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(250) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `hotel_amount` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `isDeleted` int(11) DEFAULT '0',
  `c_in` enum('no','yes') NOT NULL DEFAULT 'no',
  `c_out` enum('no','yes') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_ziarat`
--

DROP TABLE IF EXISTS `voucher_ziarat`;
CREATE TABLE IF NOT EXISTS `voucher_ziarat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_id` int(11) NOT NULL,
  `ziarat_id` int(11) NOT NULL,
  `ziarat_rate` int(11) NOT NULL,
  `ziarat_amount` int(11) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ziarat`
--

DROP TABLE IF EXISTS `ziarat`;
CREATE TABLE IF NOT EXISTS `ziarat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ziarat`
--

INSERT INTO `ziarat` (`id`, `name`, `amount`, `isDeleted`) VALUES
(1, 'None', 0, 0),
(2, 'Makkah', 15, 0),
(3, 'Madina', 15, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
