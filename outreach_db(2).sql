-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2019 at 03:22 AM
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
-- Database: `outreach_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `username`, `password`) VALUES
(1, 'ceumalolos', 'ceumalolos');

-- --------------------------------------------------------

--
-- Table structure for table `outreach_activity`
--

DROP TABLE IF EXISTS `outreach_activity`;
CREATE TABLE IF NOT EXISTS `outreach_activity` (
  `outreach_activity_id` int(255) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `proponent` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(255) NOT NULL,
  `target_p` varchar(255) NOT NULL,
  `mean` double NOT NULL,
  `interpretation` varchar(50) NOT NULL,
  `documentation` longtext CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`outreach_activity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outreach_activity`
--

INSERT INTO `outreach_activity` (`outreach_activity_id`, `type`, `title`, `proponent`, `date`, `venue`, `target_p`, `mean`, `interpretation`, `documentation`, `image`, `image1`, `image2`, `image3`, `image4`, `image5`) VALUES
(16, 'Health & Wellness', 'Fun Run 2019', 'COP', '2019-10-25', 'Malolos', 'CEU Students ', 5, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '368089.jpg', '105937.png', '219019.jpeg', '459578.jpg', '194143.', '500275.'),
(17, 'Environment Care', 'Tree Planting', 'USC', '2019-11-05', 'Centrodome Facade', 'CEU Students', 5, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '910906.jpg', '350753.jpg', '978156.', '755498.', '93608.', '421380.'),
(14, 'Literacy & Numeracy', 'Computer Training', 'COMPASS', '2019-11-02', 'Tikay Elementary School', 'TES Students', 5, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '954574.jpg', '173821.jpg', '708326.jpg', '710095.jpg', '892419.jpg', '720956.jpg'),
(13, 'Literacy & Numeracy', 'Computer Literacy', 'JPCS', '2019-11-01', 'BES', 'BES Students', 5, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '795965.jpg', '405701.jpg', '938215.', '595289.', '78152.', '135185.'),
(20, 'Livelihood & Entrepreneurship', 'Entrepreneurship Seminar', 'CAMT SC', '2019-11-04', 'ADA Function Room', 'CAMT Students', 5, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '509956.jpg', '500827.', '911330.', '736697.', '899834.', '752549.'),
(21, 'Livelihood & Entrepreneurship', 'Cash Flow ', 'CAMT SC', '2019-10-18', 'ADA Room', 'CAMT Students', 5, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '38776.jpg', '304493.jpg', '436391.', '621046.', '384148.', '164220.'),
(22, 'Livelihood & Entrepreneurship', 'Business Seminar', 'MASA', '2019-10-04', 'ADA', 'Business Students', 5, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '639427.jpg', '879339.jpg', '346151.', '150077.', '648430.', '209468.');

-- --------------------------------------------------------

--
-- Table structure for table `outreach_participant`
--

DROP TABLE IF EXISTS `outreach_participant`;
CREATE TABLE IF NOT EXISTS `outreach_participant` (
  `outreach_id` int(255) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(255) NOT NULL,
  `schl_number` varchar(50) NOT NULL,
  `p_lastname` varchar(255) NOT NULL,
  `p_firstname` varchar(255) NOT NULL,
  `p_middlename` varchar(255) DEFAULT NULL,
  `participation` varchar(50) NOT NULL,
  `collegeDepartment` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `proponent` varchar(255) NOT NULL,
  PRIMARY KEY (`outreach_id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outreach_participant`
--

INSERT INTO `outreach_participant` (`outreach_id`, `type`, `title`, `date`, `venue`, `schl_number`, `p_lastname`, `p_firstname`, `p_middlename`, `participation`, `collegeDepartment`, `proponent`) VALUES
(83, 'Literacy & Numeracy', 'Computer Training', '2019-11-02', 'BES', '2019-0001', 'Reyes', 'John', 'M.', 'Chairman', 'College of Accountancy, Management and Technology (CAMT)', 'CAMT SC'),
(85, 'Literacy & Numeracy', 'Computer Literacy', '2019-11-02', 'BES', '2018-0002', 'Sy', 'Mark', '', 'Committee Chairman', 'College of Accountancy, Management and Technology (CAMT)', 'CAMT SC'),
(86, 'Literacy & Numeracy', 'Computer Training', '2019-11-03', 'Tikay', '2018-0003', 'Marcos', 'Michael', '', 'Chairman', 'College of Accountancy, Management and Technology (CAMT)', 'CAMT SC'),
(87, 'Health & Wellness', '7th Bloodletting', '2019-11-02', 'MIR', '2018-0101', 'Maria', 'Maria', 'A.', 'Committee Member', 'Pharmacy and Medical Technology Department', 'PMT SC'),
(88, 'Health & Wellness', '7th Bloodletting', '2019-11-08', 'ADA', '2018-0022', 'John', 'Mark', 'A.', 'Audience', 'Dentistry Department', 'Dentistry SC'),
(90, 'Health & Wellness', '7th Bloodletting', '2019-11-03', 'ADA', '2018-20201', 'Santos', 'Andy', 'A.', 'Co-Chairman', 'Pharmacy and Medical Technology Department', 'COMPASS'),
(91, 'Health & Wellness', 'Fun Run 2019', '2019-11-11', 'Malolos', '2019-0111', 'Ono', 'Ono', 'O.', 'Committee Chairman', 'Pharmacy and Medical Technology Department', 'PMT SC'),
(92, 'Health & Wellness', 'Fun Run 2019', '2019-10-24', 'Malolos', '2019-9999', 'Reyes', 'Tin', 'N.', 'Committee Chairman', 'Nursing Department', 'Nursing SC'),
(93, 'Environment Care', 'Tree Planting 2', '2019-11-01', 'CEU', '2019-0765', 'Flores', 'Patrick', 'R.', 'Committee Chairman', 'Nursing Department', 'USC'),
(94, 'Environment Care', 'Tree Planting 2', '2019-11-11', 'CEU', '2018-09543', 'Cartel', 'Ludwig', '', 'Chairman', 'College of Accountancy, Management and Technology (CAMT)', 'JPCS'),
(95, 'Environment Care', 'Clean Up Drive', '2019-12-06', 'CEU', '2018-44552', 'Santos', 'Robin ', '', 'Co-Chairman', 'College of Hospitality Management (CHM)', 'CHM SC'),
(96, 'Environment Care', 'Tree Planting', '2019-10-01', 'CEU', '2018-45123', 'Policarpio', 'Johnroy', '', 'Co-Chairman', 'College of Education, Liberal Arts and Science (CELAS)', 'COMMASOC'),
(97, 'Environment Care', 'Tree Planting', '2019-10-01', 'CEU', '2019-76764', 'Godoy', 'Keith', '', 'Committee Chairman', 'Pharmacy and Medical Technology Department', 'PMT SC'),
(108, 'Environment Care', 'Tree Planting', '2019-11-26', 'asd', 'asd', 'asd', 'asd', 'asd', 'Chairman', 'Dentistry Department', 'asd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
