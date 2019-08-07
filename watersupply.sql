-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2019 at 08:29 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watersupply`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertd` (IN `nm` VARCHAR(15), IN `ph` BIGINT(10), IN `ad` VARCHAR(50), IN `lm` VARCHAR(50), IN `dn` VARCHAR(8), IN `nc` INT, IN `dt` VARCHAR(10))  NO SQL
    DETERMINISTIC
INSERT INTO takeorder(name,Phoneno,address,landmark,doorno,noc,date)VALUES(nm,Ph,ad,lm,dn,nc,dt)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `memship`
--

CREATE TABLE `memship` (
  `cardno` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `Phone` bigint(10) NOT NULL,
  `amt` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memship`
--

INSERT INTO `memship` (`cardno`, `name`, `Phone`, `amt`) VALUES
(1, 'kanishka', 8951900164, 70),
(2, 'kanish', 8521479635, 32);

-- --------------------------------------------------------

--
-- Table structure for table `profrdel`
--

CREATE TABLE `profrdel` (
  `ordno` int(11) NOT NULL,
  `workerid` int(5) DEFAULT NULL,
  `name` varchar(15) NOT NULL,
  `PhoneNo` bigint(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `landmark` varchar(20) NOT NULL,
  `doorno` varchar(10) DEFAULT NULL,
  `noc` int(5) DEFAULT NULL,
  `amt` varchar(5) DEFAULT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profrdel`
--

INSERT INTO `profrdel` (`ordno`, `workerid`, `name`, `PhoneNo`, `address`, `landmark`, `doorno`, `noc`, `amt`, `date`) VALUES
(1, 4, 'kanishka', 8951900164, 'devarajurs badavane 5th cross,1st main', 'new Court', '1456/9p', 9, 'Paid', '2017-12-13'),
(2, 4, 'kanish', 8521479635, 'devarajurs badavane 5th cross,1st main', 'new Court', '1456/9p', 8, '320', '2017-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `salesstats`
--

CREATE TABLE `salesstats` (
  `ownerph` bigint(11) NOT NULL,
  `dialywages` int(11) NOT NULL,
  `Ototearned` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesstats`
--

INSERT INTO `salesstats` (`ownerph`, `dialywages`, `Ototearned`) VALUES
(1, 2400, 9854);

-- --------------------------------------------------------

--
-- Table structure for table `takeorder`
--

CREATE TABLE `takeorder` (
  `ordno` int(11) NOT NULL,
  `name` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `PhoneNo` bigint(10) NOT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `landmark` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `doorno` varchar(8) CHARACTER SET utf8mb4 NOT NULL,
  `noc` int(5) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `takeorder`
--

INSERT INTO `takeorder` (`ordno`, `name`, `PhoneNo`, `address`, `landmark`, `doorno`, `noc`, `date`) VALUES
(1, 'kanishka', 8951900164, 'devarajurs badavane 5th cross,1st main', 'kavri bakeri', '1948/p8', 9, '2017-12-09'),
(2, 'kanishka', 8951900164, 'devarajurs badavane 5th cross,1st main', 'new Court', '1456/9p', 9, '2017-12-13'),
(3, 'kanish', 8521479635, 'devarajurs badavane 5th cross,1st main', 'new Court', '1456/9p', 8, '2017-12-24'),
(4, 'kanishka', 8951900164, 'devarajurs badavane 5th cross,1st main', 'new Court', '1456/9p', 9, '2017-12-24'),
(5, 'kanishka', 8951900164, 'devarajurs badavane 5th cross,1st main', 'new Court', '1456/9p', 1, '2017-12-24');

--
-- Triggers `takeorder`
--
DELIMITER $$
CREATE TRIGGER `ordback` AFTER INSERT ON `takeorder` FOR EACH ROW BEGIN
INSERT into ordersbackup(name,Phoneno,address,landmark,doorno,noc,date) values(NEW.name,NEW.Phoneno,NEW.address,NEW.landmark,NEW.doorno,NEW.noc,NEW.date);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `workerid` int(5) NOT NULL,
  `workername` varchar(20) NOT NULL,
  `workeradhno` varchar(14) NOT NULL,
  `workerph` bigint(10) NOT NULL,
  `workertyp` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`workerid`, `workername`, `workeradhno`, `workerph`, `workertyp`) VALUES
(1, 'Ganesh', '7899-4566-1233', 8521479636, 'Clerk'),
(2, 'Priyanka', '1233-4566-7899', 7412365895, 'Clerk'),
(3, 'Naveen', '1233-4566-7889', 9632147895, 'Delman'),
(4, 'Akshay', '7899-4566-1433', 7418529635, 'Delman'),
(5, 'Bharath', '7899-4566-1243', 3214569875, 'Delman'),
(6, 'Harsha', '1233-4566-6899', 9638527144, 'Delman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `memship`
--
ALTER TABLE `memship`
  ADD PRIMARY KEY (`cardno`,`Phone`),
  ADD KEY `PhoneNo` (`Phone`);

--
-- Indexes for table `profrdel`
--
ALTER TABLE `profrdel`
  ADD PRIMARY KEY (`ordno`),
  ADD KEY `fk1` (`noc`);

--
-- Indexes for table `salesstats`
--
ALTER TABLE `salesstats`
  ADD PRIMARY KEY (`ownerph`);

--
-- Indexes for table `takeorder`
--
ALTER TABLE `takeorder`
  ADD PRIMARY KEY (`ordno`),
  ADD KEY `fk4` (`PhoneNo`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`workerid`,`workeradhno`,`workerph`),
  ADD UNIQUE KEY `workerid` (`workerid`),
  ADD UNIQUE KEY `workeradhno` (`workeradhno`),
  ADD UNIQUE KEY `workerph` (`workerph`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `memship`
--
ALTER TABLE `memship`
  MODIFY `cardno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profrdel`
--
ALTER TABLE `profrdel`
  MODIFY `ordno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `takeorder`
--
ALTER TABLE `takeorder`
  MODIFY `ordno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
