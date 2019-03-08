-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 03:57 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fname`, `lname`, `username`, `password`, `mobile`, `email`, `address`, `birthdate`, `gender`) VALUES
(1, 'client1', 'awdawd', 'flc', '123456', '45778989', '7987987', '897987', '1111-11-11', 'Male'),
(2, 'awwad', 'sefesa', 'gsergs', '123456', '686797', '987987', '987987987', '1111-11-11', 'Male'),
(3, 'awdawd', 'awdawd', 'sefgseg', '456456', '7897987987', '798797987', '987997', '1111-11-11', 'Male'),
(4, 'awdawd', 'fawfaw', 'awad', '123456', '657987', '987987', '987987', '98797-09-07', 'Male'),
(5, 'dawd', 'afawf', 'gsegseg', '123456', '897987', '897987', '9787', '1111-11-11', 'Male'),
(6, '797987', '97987987', '98789798', '123456', '987987', '897987', '98797', '275760-09-08', 'Male'),
(8, 'awawd', 'awdaw', '12345', '123456', '78987', '987987', '98798798', '87987-07-09', 'Male'),
(9, 'awdawd', '545', '5454', '456', '87987', '897897', '897987', '0111-11-11', 'Male'),
(10, 'titot', 'partsman', 'tots', 'tits', '04383858', 'partsman@yahoo.com', 'crosscal', '2016-03-03', 'Male'),
(11, 'kent', 'ybanez', 'kentoi', 'password', '09161515431', 'kentoi@yahoo.com', 'padidu', '1996-04-24', 'Female'),
(13, 'Dexter', 'manayan', 'dikoy', 'dikoy', '09098989098', 'dikoy@yahoo.com', 'calabanit', '1997-09-09', 'Male'),
(14, 'Jayson', 'Relampagos', 'Titot@partsman', 'gwapoko', '09306377767', 'jayson@yahoo.com', 'Calabanit, Glan sarangani provine', '1997-03-28', 'Male'),
(15, 'jaymar', 'daligdig', 'stash', '123', '09109280535', 'jaydaligdig123@gmail.com', 'awawd', '2018-12-19', 'Male'),
(16, 'dgdrg', 'hhg', '123', '123', '54353', 'jaymarrockerz@yahoo.com', 'awda', '2018-12-26', 'Male'),
(17, 'lejfhs', 'jhjrkfh', '1234', '1234', '34567890', 'kdjgrkl', 'iurgoiru', '2018-12-28', 'Male'),
(18, 'dawdd', 'sfef', '123456', '123456', '123', '123', '123', '1111-11-11', 'Male'),
(19, 'vxbfc', 'cgjgj', '11111', '11111', '11111111', '1111111111', '11111', '1111-11-11', 'Male'),
(21, '444', '444', '444', '444', '4444', '444', '44444', '2019-02-04', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `name`) VALUES
(1, 12, '5a815f518c64c9.01468719.png'),
(2, 13, '5a81905a3672f4.62803496.jpg'),
(3, 14, '5a81a21a67fd01.75885781.jpg'),
(4, 14, '5a81a21a6fcd22.70597576.jpg'),
(5, 14, '5a81a21a7df656.74136531.jpg'),
(6, 15, '5a81a22d92bc99.48102067.jpg'),
(7, 15, '5a81a22dad97f0.25630989.jpg'),
(8, 15, '5a81a22dd4a892.67805564.jpg'),
(9, 16, '5a81a612478b14.67956688.jpg'),
(10, 17, '5a81a66d63ea42.29808075.jpg'),
(11, 18, '5a81a6e9341551.53683976.jpg'),
(12, 19, '5a81a746d49228.30921918.jpg'),
(13, 20, '5a81a76ec6f7f7.12270206.png'),
(14, 21, '5a82399faf2a80.93036630.jpg'),
(15, 22, '5a8239d08907a6.39125274.jpg'),
(16, 23, '5a823a074c4562.51822398.jpg'),
(17, 24, '5a823ab59d1315.21759734.png'),
(18, 25, '5a8965d8ad8228.90007719.jpg'),
(19, 26, '5a8e5043810643.55108981.jpg'),
(20, 27, '5a8e53f60e1160.43552658.jpg'),
(21, 28, '5aa24787d40b28.05480164.jpg'),
(22, 29, '5aa2478ff0ea64.80093026.jpg'),
(23, 30, '5aa24860bdba24.20488744.jpg'),
(24, 31, '5aa249a8483c34.03103740.jpg'),
(25, 32, '5aa24c267287c6.29885843.jpg'),
(26, 33, '5aa24d7a7fdd59.90566834.jpg'),
(27, 34, '5aa24d906324d8.68815937.jpg'),
(28, 35, '5aa2532b802b71.50032720.jpg'),
(29, 36, '5aa35c67811cd5.99240496.jpg'),
(30, 37, '5aa35ccf905364.30380622.jpg'),
(31, 38, '5aa35daf01f774.72255996.jpg'),
(32, 39, '5aa35e08336e37.41515245.jpg'),
(33, 40, '5c247501315228.04184448.jpg'),
(34, 41, '5c247f285c28a2.35168276.jpg'),
(35, 42, '5c2ed9891790b9.09776285.jpg'),
(36, 43, '5c3417f1d092c4.61502026.jpg'),
(37, 46, '5c3759f26bf929.06684412.jpg'),
(38, 47, '5c433aff57a785.07232251.jpg'),
(39, 49, '5c584a85ca1cf7.21714443.jpg'),
(40, 52, '5c5bd3bcb995f5.11825557.jpg'),
(41, 52, '5c5bd3bcb99349.76978341.jpg'),
(42, 52, '5c5bd3bcb994d1.19046506.jpg'),
(43, 52, '5c5bd3bcb989e7.79026847.jpg'),
(44, 56, '5c5bd3c13ddc60.17742515.jpg'),
(45, 56, '5c5bd3c14720f3.75399736.jpg'),
(46, 56, '5c5bd3c1464469.28705964.jpg'),
(47, 56, '5c5bd3c154a3b7.74612172.jpg'),
(48, 60, '5c5bd3c169c928.20754163.jpg'),
(49, 60, '5c5bd3c16a31d0.77629168.jpg'),
(50, 60, '5c5bd3c1716bc4.85738554.jpg'),
(51, 60, '5c5bd3c1717173.23095149.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `flname` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `province` varchar(50) NOT NULL,
  `candm` varchar(50) NOT NULL,
  `barangay` varchar(80) NOT NULL,
  `completeAddress` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `customers_id`, `flname`, `mobile`, `province`, `candm`, `barangay`, `completeAddress`) VALUES
(5, 1, 'jaymar daligdig', 98797, '897987', '98798798', '798798798', '798798798'),
(6, 10, 'titot', 2147483647, 'sarangani', 'Glan', 'crosscal', 'crosscal calabanit'),
(7, 11, 'kent ybanez', 2147483647, 'sarangani', 'glan', 'padidu', 'padidu glan sarangani province'),
(8, 12, 'jayson relampagos', 2147483647, 'Sarangani', 'Glan', 'Calabanit', 'crosscal calabanit'),
(9, 14, 'jayson relampagos', 2147483647, 'Sarangani', 'Glan', 'Calabanit', 'crosscal calabanit'),
(10, 16, 'Jaymar', 2147483647, 'awdawd', 'sesef', 'sefsef', 'sgsghr'),
(11, 17, 'jaymar', 2147483647, 'south cotabato', 'hhwdu', 'usyfeui', 'uysfuyei'),
(12, 18, 'adwad', 54654, 'cdsgdh', 'dhdth', 'tjfj', 'ffyk'),
(13, 19, 'sample', 123, 'sample', 'sample', 'sample', 'sample'),
(14, 20, 'sample', 123, 'sample', 'sample', 'sample', 'sample'),
(15, 21, 'Jaymar', 987946, 'south cotabato', 'hhwdu', 'tjfj', 'uysfuyei');

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `id` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `trackingCode` varchar(120) NOT NULL,
  `para1` varchar(1000) NOT NULL,
  `para2` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `dateOrdered` date NOT NULL,
  `sold` tinyint(1) NOT NULL,
  `delevered` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`id`, `customerID`, `trackingCode`, `para1`, `para2`, `price`, `dateOrdered`, `sold`, `delevered`) VALUES
(21, 1, '5a88f4f68765e', '2nd hand phones,2nd hand phones,2nd hand phones', '1,1,2', 0, '2018-02-18', 1, '2018-02-22'),
(22, 1, '5a88f4f68765e', '2nd hand phones,sound booster,2nd hand phones', '1,1,1', 0, '2018-02-18', 1, '2018-02-22'),
(23, 1, '5a88f4f68765e', 'sound booster,Beach in an instant,2nd hand phones', '7,2,5', 0, '2018-02-18', 1, '2018-02-22'),
(25, 1, '5a88f4f68765e', '2nd hand phones,2nd hand phones,2nd hand phones', '1,1,1', 0, '2018-02-18', 1, '2018-02-22'),
(26, 1, '5a88f4f68765e', '2nd hand phones', '2', 0, '2018-02-18', 1, '2018-02-22'),
(34, 1, '5a88f4f68765e', '2nd hand phones,sound booster,Beach in an instant', '1,1,1', 14500, '2018-02-18', 1, '2018-02-22'),
(35, 1, '5a88f4f68765e', '2nd hand phones,2nd hand phones,Beach in an instant', '5,1,1', 41000, '2018-02-18', 1, '2018-02-22'),
(36, 1, '5a88f4f68765e', '2nd hand phones', '1', 6500, '2018-02-18', 1, '2018-02-22'),
(37, 1, '5a88f4f68765e', 'Beach in an instant,Floor mat', '1,2', 4500, '2018-02-18', 1, '2018-02-22'),
(38, 1, '5a88f4f68765e', 'Floor mat', '6', 3000, '2018-02-18', 1, '2018-02-22'),
(39, 1, '5a88f4f68765e', 'Floor mat', '4', 2000, '2018-02-19', 1, '2018-02-22'),
(40, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones', '2,1', 18100, '2018-02-22', 1, ''),
(41, 1, '5a88f4f68765e', 'chammomile,2nd hand phones', '1,1', 605298, '2018-02-22', 1, '2018-02-22'),
(42, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones', '1,1', 12300, '2018-02-22', 1, ''),
(43, 1, '5a88f4f68765e', 'Floor mat,2nd hand phones,Beach in an instant', '1,1,1', 10500, '2018-02-22', 1, ''),
(44, 1, '5a88f4f68765e', 'Jellyfish for sale', '1', 5800, '2018-02-22', 1, '2018-02-22'),
(45, 1, '5a88f4f68765e', 'Jellyfish for sale,chammomile', '1,2', 1203396, '2018-03-06', 1, '2018-03-06'),
(46, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(47, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(48, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(49, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(50, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(51, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(52, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(53, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(54, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(55, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(60, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(61, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(62, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(63, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(64, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2', '2,1', 11605, '2018-03-06', 1, ''),
(65, 1, '5a88f4f68765e', 'Jellyfish for sale,2nd hand phones 2,Jellyfish for sale', '2,1,1', 17405, '2018-03-06', 1, '2018-03-06'),
(66, 1, '5a88f4f68765e', 'Jellyfish for sale,Jellyfish for sale,2nd hand phones 2,chammomile', '1,1,1,1', 610403, '2018-03-06', 1, '2018-03-06'),
(67, 1, '5a88f4f68765e', 'chammomile,2nd hand phones 2', '3,1', 1796399, '2018-03-06', 1, '2018-03-06'),
(68, 1, '5a88f4f68765e', 'chammomile,chammomile,2nd hand phones 2', '1,1,1', 1197601, '2018-03-06', 1, '2018-03-06'),
(69, 10, '5aa2015891fdb', '2nd hand phones', '1', 6500, '2018-03-09', 1, '2018-03-09'),
(70, 11, '5aa202ab26860', '2nd hand phones', '1', 6500, '2018-03-09', 1, '2018-03-09'),
(71, 12, '5aa205f608bd3', 'Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale,Jellyfish for sale', '1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1', 116000, '2018-03-09', 1, '2018-03-09'),
(72, 11, '5aa202ab26860', 'drill', '1', 1300, '2018-03-09', 1, '2018-03-09'),
(74, 16, '5c238edf38a4c', 'shovel,hammer', '2,3', 660, '2018-12-26', 1, '2019-01-07'),
(75, 17, '5c247fd5f1f1f', 'Xiomi Redmi 5,cheap phones', '2,5', 11000, '2018-12-27', 1, ''),
(76, 16, '5c238edf38a4c', 'adwad,111', '1,1', 3435, '2019-01-10', 1, '2019-02-04'),
(77, 16, '5c238edf38a4c', 'galaxy 29,tyok,om,adwad', '1,1,1', 9479, '2019-02-04', 1, '2019-02-04'),
(78, 16, '5c238edf38a4c', 'tyok,om,sample phone', '1,1', 8055, '2019-02-04', 1, '2019-02-04'),
(79, 16, '5c238edf38a4c', 'tyok,om', '1', 55, '2019-02-04', 1, '2019-02-04'),
(80, 16, '5c238edf38a4c', 'tyok,om', '1', 55, '2019-02-04', 1, '2019-02-04'),
(81, 16, '5c238edf38a4c', 'tyok,om', '1', 55, '2019-02-04', 1, '2019-02-04'),
(82, 16, '5c238edf38a4c', 'tyok,om', '1', 55, '2019-02-04', 1, '2019-02-04'),
(83, 16, '5c238edf38a4c', 'tyok,om', '1', 55, '2019-02-04', 1, '2019-02-04'),
(84, 16, '5c238edf38a4c', 'tyok,om', '1', 55, '2019-02-04', 1, '2019-02-04'),
(85, 16, '5c238edf38a4c', 'tyok,om', '1', 55, '2019-02-04', 1, '2019-02-04'),
(86, 16, '5c238edf38a4c', ',tyok,om', '1,1', 55, '2019-02-11', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sold` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customers_id`, `productID`, `quantity`, `sold`) VALUES
(48, 1, 24, 1, 1),
(49, 1, 22, 1, 1),
(50, 1, 25, 2, 1),
(52, 1, 26, 2, 1),
(53, 1, 24, 1, 1),
(54, 1, 27, 1, 1),
(55, 1, 24, 1, 1),
(56, 1, 26, 1, 1),
(57, 1, 24, 1, 1),
(58, 1, 25, 1, 1),
(59, 1, 24, 1, 1),
(60, 1, 22, 1, 1),
(61, 1, 26, 1, 1),
(62, 1, 26, 1, 1),
(63, 1, 27, 2, 1),
(64, 1, 26, 2, 1),
(65, 1, 21, 1, 1),
(66, 1, 26, 1, 1),
(67, 1, 26, 1, 1),
(68, 1, 26, 1, 1),
(69, 1, 21, 1, 1),
(70, 1, 27, 1, 1),
(71, 1, 27, 3, 1),
(72, 1, 21, 1, 1),
(73, 1, 27, 1, 1),
(74, 1, 27, 1, 1),
(75, 1, 21, 1, 1),
(76, 10, 24, 1, 1),
(77, 10, 21, 1, 0),
(78, 11, 24, 1, 1),
(79, 12, 26, 1, 1),
(80, 12, 26, 1, 1),
(81, 12, 26, 1, 1),
(82, 12, 26, 1, 1),
(83, 12, 26, 1, 1),
(84, 12, 26, 1, 1),
(85, 12, 26, 1, 1),
(86, 12, 26, 1, 1),
(87, 12, 26, 1, 1),
(88, 12, 26, 1, 1),
(89, 12, 26, 1, 1),
(90, 12, 26, 1, 1),
(91, 12, 26, 1, 1),
(92, 12, 26, 1, 1),
(93, 12, 26, 1, 1),
(94, 12, 26, 1, 1),
(95, 12, 26, 1, 1),
(96, 12, 26, 1, 1),
(97, 12, 26, 1, 1),
(98, 12, 26, 1, 1),
(99, 13, 21, 1, 0),
(100, 11, 32, 1, 1),
(101, 14, 39, 1, 0),
(102, 14, 38, 1, 0),
(103, 14, 37, 1, 0),
(104, 14, 36, 1, 0),
(105, 16, 36, 2, 1),
(106, 16, 31, 3, 1),
(107, 17, 40, 2, 1),
(108, 17, 41, 5, 1),
(109, 16, 41, 1, 1),
(110, 18, 42, 1, 0),
(111, 18, 41, 1, 0),
(112, 18, 40, 1, 0),
(113, 16, 46, 1, 1),
(114, 16, 43, 1, 1),
(115, 16, 48, 1, 1),
(116, 16, 47, 1, 1),
(117, 16, 46, 1, 1),
(121, 16, 47, 1, 1),
(122, 16, 44, 1, 1),
(123, 16, 47, 1, 1),
(125, 16, 47, 1, 1),
(128, 16, 47, 1, 1),
(129, 20, 48, 1, 0),
(130, 20, 44, 1, 0),
(131, 21, 47, 1, 0),
(133, 16, 47, 1, 1),
(135, 16, 47, 1, 1),
(137, 16, 47, 1, 1),
(139, 16, 47, 1, 1),
(140, 16, 49, 1, 0),
(141, 16, 47, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `wallet` double NOT NULL,
  `dater` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `customer_id`, `wallet`, `dater`) VALUES
(1, 16, 55, '2019-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_date` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `discription` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `supplier` varchar(150) NOT NULL,
  `type` varchar(20) NOT NULL,
  `sell` tinyint(1) NOT NULL,
  `sellingStocks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_date`, `name`, `discription`, `price`, `supplier`, `type`, `sell`, `sellingStocks`) VALUES
(40, '2018-12-28', 'Xiomi Redmi 5', 'Rush sale ', 2500, 'sample supplier', 'Product', 0, 8),
(41, '2018-12-27', 'cheap phones', 'rush', 1200, 'ime', 'Product', 1, 35),
(42, '5645-03-13', 'natashas best', 'jacket jacket jacket jacket jacket jacket jacket jacket jacket ', 600, 'natasha', 'Product', 1, 203),
(44, '2222-02-22', 'sample phone', 'cheap phones', 8000, 'natasha', 'Product', 1, 9),
(45, '0011-11-11', '11123233', '111113434', 4354676, 'natasha', 'Product', 0, 22),
(46, '0011-11-11', 'adwad', 'awdawd', 3424, 'natasha', 'Product', 1, 18),
(47, '1111-11-11', 'tyok,om', 'kn jbihgu', 55, 'natasha', 'Product', 1, -5),
(48, '1111-11-11', 'galaxy 29', 'samsung phones', 6000, 'samsung', 'Product', 1, 49),
(60, '1111-11-11', 'akdjwiu', 'sidufioeu', 9000, 'samsung corps', 'Product', 0, 437);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `supplierName` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `dateE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplierName`, `address`, `contact`, `dateE`) VALUES
(6, 'sample supplier', 'adawd', '3456788', '2018-12-27'),
(7, 'ime', 'awoi', '87387', '2018-12-25'),
(8, 'samsung corps', 'oisrgiou', 'd09876', '1111-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `wallet` double NOT NULL,
  `dater` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `customer_id`, `wallet`, `dater`) VALUES
(1, 16, 34, '2019-0202-0101 0404:45:11'),
(2, 16, 34, '2019-02-01 04:45:41'),
(3, 16, 34, '2019-02-01 11:48:05'),
(4, 16, 342, '2019-02-02 05:13:27'),
(5, 21, 1000, '2019-02-07 02:45:52'),
(6, 21, 1000, '2019-02-07 02:45:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
