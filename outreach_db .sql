-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2019 at 05:08 AM
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
  PRIMARY KEY (`outreach_activity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outreach_activity`
--

INSERT INTO `outreach_activity` (`outreach_activity_id`, `type`, `title`, `proponent`, `date`, `venue`, `target_p`, `mean`, `interpretation`, `documentation`, `image`) VALUES
(39, 'Health & Wellness', 'Fun Run 2019', 'COMPASS, Nursing SC, PMT SC', '2019-11-16', 'Bulacan Sports Complex', 'CEU Students', 4.6, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Netus et malesuada fames ac turpis egestas. Eget velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Mauris sit amet massa vitae. Dui accumsan sit amet nulla. Sit amet mattis vulputate enim. Adipiscing diam donec adipiscing tristique. Cras fermentum odio eu feugiat pretium nibh ipsum. In metus vulputate eu scelerisque felis imperdiet proin. Nulla aliquet enim tortor at auctor urna nunc id cursus. Mauris a diam maecenas sed. Rhoncus est pellentesque elit ullamcorper. Urna et pharetra pharetra massa massa ultricies mi quis. Velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Quis varius quam quisque id diam vel. Pellentesque habitant morbi tristique senectus et netus et. Metus dictum at tempor commodo ullamcorper a.', '854183.jpeg'),
(40, 'Health & Wellness', 'Health Seminar', 'Dentistry SC', '2019-11-19', 'ADA Hotel', 'Students', 5, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Netus et malesuada fames ac turpis egestas. Eget velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Mauris sit amet massa vitae. Dui accumsan sit amet nulla. Sit amet mattis vulputate enim. Adipiscing diam donec adipiscing tristique. Cras fermentum odio eu feugiat pretium nibh ipsum. In metus vulputate eu scelerisque felis imperdiet proin. Nulla aliquet enim tortor at auctor urna nunc id cursus. Mauris a diam maecenas sed. Rhoncus est pellentesque elit ullamcorper. Urna et pharetra pharetra massa massa ultricies mi quis. Velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Quis varius quam quisque id diam vel. Pellentesque habitant morbi tristique senectus et netus et. Metus dictum at tempor commodo ullamcorper a.', '765879.jfif'),
(38, 'Literacy & Numeracy', 'Computer Literacy', 'JPCS, CAMT SC', '2019-11-08', 'CMIS', 'CMIS Students', 5, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Netus et malesuada fames ac turpis egestas. Eget velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Mauris sit amet massa vitae. Dui accumsan sit amet nulla. Sit amet mattis vulputate enim. Adipiscing diam donec adipiscing tristique. Cras fermentum odio eu feugiat pretium nibh ipsum. In metus vulputate eu scelerisque felis imperdiet proin. Nulla aliquet enim tortor at auctor urna nunc id cursus. Mauris a diam maecenas sed. Rhoncus est pellentesque elit ullamcorper. Urna et pharetra pharetra massa massa ultricies mi quis. Velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Quis varius quam quisque id diam vel. Pellentesque habitant morbi tristique senectus et netus et. Metus dictum at tempor commodo ullamcorper a.', '389098.jpg'),
(37, 'Literacy & Numeracy', 'JPCS Outreach ', 'JPCS', '2019-10-04', 'MHDPNHS', 'MHDPNHS Grade 10 Students', 4.7, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Netus et malesuada fames ac turpis egestas. Eget velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Mauris sit amet massa vitae. Dui accumsan sit amet nulla. Sit amet mattis vulputate enim. Adipiscing diam donec adipiscing tristique. Cras fermentum odio eu feugiat pretium nibh ipsum. In metus vulputate eu scelerisque felis imperdiet proin. Nulla aliquet enim tortor at auctor urna nunc id cursus. Mauris a diam maecenas sed. Rhoncus est pellentesque elit ullamcorper. Urna et pharetra pharetra massa massa ultricies mi quis. Velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Quis varius quam quisque id diam vel. Pellentesque habitant morbi tristique senectus et netus et. Metus dictum at tempor commodo ullamcorper a.', '422841.jpg'),
(43, 'Environment Care', 'Tree Planting', 'COMPASS, Science Laboratory', '2019-11-09', 'Centrodome Facade', 'CEU Students', 5, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Netus et malesuada fames ac turpis egestas. Eget velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Mauris sit amet massa vitae. Dui accumsan sit amet nulla. Sit amet mattis vulputate enim. Adipiscing diam donec adipiscing tristique. Cras fermentum odio eu feugiat pretium nibh ipsum. In metus vulputate eu scelerisque felis imperdiet proin. Nulla aliquet enim tortor at auctor urna nunc id cursus. Mauris a diam maecenas sed. Rhoncus est pellentesque elit ullamcorper. Urna et pharetra pharetra massa massa ultricies mi quis. Velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Quis varius quam quisque id diam vel. Pellentesque habitant morbi tristique senectus et netus et. Metus dictum at tempor commodo ullamcorper a.', '695184.jpg'),
(44, 'Environment Care', 'Tree Planting 2', 'Science Laboratory', '2019-11-25', 'CEU', 'CEU Students', 5, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Netus et malesuada fames ac turpis egestas. Eget velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Mauris sit amet massa vitae. Dui accumsan sit amet nulla. Sit amet mattis vulputate enim. Adipiscing diam donec adipiscing tristique. Cras fermentum odio eu feugiat pretium nibh ipsum. In metus vulputate eu scelerisque felis imperdiet proin. Nulla aliquet enim tortor at auctor urna nunc id cursus. Mauris a diam maecenas sed. Rhoncus est pellentesque elit ullamcorper. Urna et pharetra pharetra massa massa ultricies mi quis. Velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Quis varius quam quisque id diam vel. Pellentesque habitant morbi tristique senectus et netus et. Metus dictum at tempor commodo ullamcorper a.', '540086.jpg'),
(45, 'Livelihood & Entrepreneurship', 'Cash Flow Seminar', 'MASA', '2019-11-12', 'ADA Hotel', 'CAMT Students', 5, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Netus et malesuada fames ac turpis egestas. Eget velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Mauris sit amet massa vitae. Dui accumsan sit amet nulla. Sit amet mattis vulputate enim. Adipiscing diam donec adipiscing tristique. Cras fermentum odio eu feugiat pretium nibh ipsum. In metus vulputate eu scelerisque felis imperdiet proin. Nulla aliquet enim tortor at auctor urna nunc id cursus. Mauris a diam maecenas sed. Rhoncus est pellentesque elit ullamcorper. Urna et pharetra pharetra massa massa ultricies mi quis. Velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Quis varius quam quisque id diam vel. Pellentesque habitant morbi tristique senectus et netus et. Metus dictum at tempor commodo ullamcorper a.', '80708.jpg'),
(47, 'Livelihood & Entrepreneurship', 'Money Management', 'CAMT SC', '2019-11-06', 'ADA Function Room', 'CAMT Students', 5, 'Excellent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Netus et malesuada fames ac turpis egestas. Eget velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Mauris sit amet massa vitae. Dui accumsan sit amet nulla. Sit amet mattis vulputate enim. Adipiscing diam donec adipiscing tristique. Cras fermentum odio eu feugiat pretium nibh ipsum. In metus vulputate eu scelerisque felis imperdiet proin. Nulla aliquet enim tortor at auctor urna nunc id cursus. Mauris a diam maecenas sed. Rhoncus est pellentesque elit ullamcorper. Urna et pharetra pharetra massa massa ultricies mi quis. Velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Quis varius quam quisque id diam vel. Pellentesque habitant morbi tristique senectus et netus et. Metus dictum at tempor commodo ullamcorper a.', '725669.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outreach_participant`
--

INSERT INTO `outreach_participant` (`outreach_id`, `type`, `title`, `date`, `venue`, `schl_number`, `p_lastname`, `p_firstname`, `p_middlename`, `participation`, `collegeDepartment`, `proponent`) VALUES
(121, 'Environment Care', 'Tree Planting', '2019-11-06', 'Centrodome Facade', '2018-0091', 'Lopez', 'Ralph', '', 'Committee Member', 'College of Accountancy, Management and Technology (CAMT)', 'JPCS'),
(109, 'Literacy & Numeracy', 'Computer Literacy', '2019-11-05', 'CMIS', '2018-0001', 'Dela Cruz', 'Juan', 'A.', 'Chairman', 'College of Accountancy, Management and Technology (CAMT)', 'CAMT SC'),
(110, 'Literacy & Numeracy', 'Computer Literacy', '2019-11-19', 'CMIS', '2019-00412', 'Sillo', 'Kenneth', 'R.', 'Co-Chairman', 'College of Accountancy, Management and Technology (CAMT)', 'JPCS'),
(111, 'Literacy & Numeracy', 'Computer Literacy', '2019-10-30', 'CMIS', '2018-00091', 'Lopez', 'Ralph', '', 'Co-Chairman', 'College of Accountancy, Management and Technology (CAMT)', 'JPCS'),
(112, 'Literacy & Numeracy', 'JPCS Outreach ', '2019-11-12', 'MHDPNHS', '2019-0001', 'Santos', 'Robin', '', 'Chairman', 'College of Accountancy, Management and Technology (CAMT)', 'JPCS'),
(117, 'Literacy & Numeracy', 'JPCS Outreach ', '2019-10-30', 'MHDPNHS', '2018-01201', 'Policarpio', 'Johnroy', 'V.', 'Committee Member', 'College of Accountancy, Management and Technology (CAMT)', 'JPCS'),
(114, 'Health & Wellness', 'Health Seminar', '2019-11-15', 'ADA', '2018-00111', 'Godoy', 'Keith', '', 'Committee Chairman', 'College of Accountancy, Management and Technology (CAMT)', 'JPCS'),
(115, 'Health & Wellness', 'Health Seminar', '2019-11-15', 'ADA', '2018-09090', 'Sunga', 'Vincent', 'A.', 'Committee Member', 'College of Accountancy, Management and Technology (CAMT)', 'CAMT'),
(116, 'Health & Wellness', 'Health Seminar', '2019-11-15', 'ADA', '2019-09011', 'Reyes', 'Mark', 'B.', 'Audience', 'Nursing Department', 'Nursing SC'),
(118, 'Health & Wellness', 'Fun Run 2019', '2019-11-14', 'Malolos Capitol', '2018-00091', 'Lopez', 'Ralph', '', 'Committee Chairman', 'College of Accountancy, Management and Technology (CAMT)', 'JPCS'),
(119, 'Health & Wellness', 'Fun Run 2019', '2019-10-16', 'Malolos Capitol', '2018-99010', 'Sy', 'John', 'F.', 'Co-Chairman', 'Pharmacy and Medical Technology Department', 'PMT SC'),
(120, 'Environment Care', 'Tree Planting', '2019-11-14', 'Centrodome Facade', '2019-00412', 'Sillo', 'Kenneth', 'R.', 'Audience', 'College of Accountancy, Management and Technology (CAMT)', 'JPCS'),
(122, 'Environment Care', 'Tree Planting 2', '2019-11-25', 'CEU', '2019-67890', 'Alexander', 'Ralph', 'F.', 'Committee Chairman', 'Dentistry Department', 'Dentistry SC'),
(127, 'Livelihood & Entrepreneurship', 'Cash Flow Seminar', '2019-11-01', 'ADA', '2019-07071', 'San', 'Hon', 'A.', 'Chairman', 'College of Education, Liberal Arts and Science (CELAS)', 'CELAS SC'),
(124, 'Environment Care', 'Tree Planting 2', '2019-11-25', 'CEU', '2019-45321', 'Faith', 'Santos', 'A.', 'Committee Member', 'College of Hospitality Management (CHM)', 'CHM SC'),
(126, 'Environment Care', 'Tree Planting 2', '2019-11-25', 'CEU', '2019-23231', 'Lee', 'John ', 'D.', 'Committee Chairman', 'College of Education, Liberal Arts and Science (CELAS)', 'CELAS SC'),
(128, 'Livelihood & Entrepreneurship', 'Cash Flow Seminar', '2019-11-07', 'ADA', '2018-95421', 'Correa', 'Duane', '', 'Chairman', 'College of Accountancy, Management and Technology (CAMT)', 'CAMT SC'),
(129, 'Livelihood & Entrepreneurship', 'Money Management', '2019-11-12', 'CEU', '2018-54621', 'Cartel', 'Ludwig', '', 'Chairman', 'College of Education, Liberal Arts and Science (CELAS)', 'CELAS SC'),
(130, 'Livelihood & Entrepreneurship', 'Money Management', '2019-11-13', 'CEU', '2018-54321', 'Chua', 'Joshua', '', 'Committee Chairman', 'College of Hospitality Management (CHM)', 'CHM SC'),
(131, 'Livelihood & Entrepreneurship', 'Money Management', '2019-11-05', 'CEU', '2019-46521', 'Kim', 'Titus', '', 'Committee Chairman', 'Pharmacy and Medical Technology Department', 'PMT SC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
