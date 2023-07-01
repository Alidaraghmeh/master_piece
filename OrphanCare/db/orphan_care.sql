-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 11:27 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orphan_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET ucs2 NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(2, 'Ahmad anbar', 'ahmad@gmail.com', 'afsafsafsafs', ' afs afs afs afs ');

-- --------------------------------------------------------

--
-- Table structure for table `donates`
--

CREATE TABLE `donates` (
  `name` varchar(50) NOT NULL,
  `NID` varchar(10) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `idOrphanage` varchar(50) NOT NULL,
  `nameOrphanage` varchar(50) NOT NULL,
  `cardname` text NOT NULL,
  `cardnumber` text NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donates`
--

INSERT INTO `donates` (`name`, `NID`, `phone`, `email`, `idOrphanage`, `nameOrphanage`, `cardname`, `cardnumber`, `amount`) VALUES
('Ehab Ahmad', '1231231231', '0786612012', 'ehab-ahmad@gmail.com', '12345', 'Dar Sakhr for orphan care', 'Ehab Ahmad', '2222-1111-0000-4444', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `idEvent` int(11) NOT NULL,
  `emailU` varchar(50) NOT NULL,
  `nameU` varchar(50) NOT NULL,
  `nameEvent` varchar(50) NOT NULL,
  `dateEvent` date NOT NULL,
  `timeEvent` varchar(15) NOT NULL,
  `timeEvent1` varchar(15) NOT NULL,
  `addressEvent` varchar(15) NOT NULL,
  `typeEvent` varchar(100) NOT NULL,
  `descriptionEvent` text NOT NULL,
  `idOrph` int(11) NOT NULL,
  `nameOrph` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`idEvent`, `emailU`, `nameU`, `nameEvent`, `dateEvent`, `timeEvent`, `timeEvent1`, `addressEvent`, `typeEvent`, `descriptionEvent`, `idOrph`, `nameOrph`) VALUES
(1, 'Loay@gmail.com', 'Loay Tarifi', 'test', '2019-11-28', 'Morning', '10:00 AM', 'Amman', 'Find Raiser', 'test test test test test test test test test  test', 12345, 'Dar Sakhr for orphan care'),
(2, 'test@gmail.com', 'test', 'test', '2019-12-31', '10', 'test', 'test', 'test', 'test', 1, '1'),
(8, 'Farah@gmail.com', 'Farah Anas', 'Love Athers', '2019-10-23', 'Morning', '10-12 AM', 'Amman', 'Training', '70% boy Have GF ,other Have Brain!\r\n\r\nA whole day to celebrate.\r\n\r\nKnowledge is power..\r\n\r\nKeep Calm and Sing on Mountains…\r\n\r\nSucess Does not come in a day…!!\r\n\r\nWe learn by Doing…\r\n\r\nSimplicity is to live without ideals.\r\n\r\nAlways Be Positive…..\r\n\r\nHabits are That make you happy..', 12345, 'Dar Sakhr for orphan care'),
(9, 'Loay@gmail.com', 'Loay Tarifi', 'test', '2019-12-15', 'Morning', '10:00 AM', 'Amman', 'Training', 'test test', 12345, 'Dar Sakhr for orphan care'),
(10, 'Farah@gmail.com', 'Farah Anas', 'test', '2020-03-15', 'Morning', '12:00 AM', 'Amman', 'Training', 'Test Test Test Test Test Test Test Test Test Test', 12345, 'Dar Sakhr for orphan care');

-- --------------------------------------------------------

--
-- Table structure for table `ministry`
--

CREATE TABLE `ministry` (
  `email` varchar(50) NOT NULL,
  `password` int(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ministry`
--

INSERT INTO `ministry` (`email`, `password`, `name`) VALUES
('ehab@gmail.com', 102030, 'Ehab Ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `datePosted` date NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `orphanStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `name`, `datePosted`, `msg`, `orphanStatus`) VALUES
(2, 'Ehab Ahmad', '2019-07-18', 'In  Love Story, Mom Agrees And Dad Disagrees? It’s Because Mom Knows What Love Is,… And Dad Knows What Boys Are….\r\n\r\n I have no time to hate people,…who hate me…because, I’m always busy in loving people, who love me….', '12345'),
(3, 'Ehab Ahmad', '2019-07-18', 'People say me bad…..but trust me I am the worst!\r\n\r\nI don’t need to explain myself because, I know I’m right.', '9981050839 - 12345 - 1231231230'),
(4, 'Ehab Ahmad', '2019-11-22', 'https://goo.gl/maps/P2xz2mFYMzzW6GrB6', '1231231230 - 12345');

-- --------------------------------------------------------

--
-- Table structure for table `orphanage`
--

CREATE TABLE `orphanage` (
  `idOrph` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `location` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orphanage`
--

INSERT INTO `orphanage` (`idOrph`, `name`, `phone`, `location`) VALUES
(12345, 'Dar Sakhr for orphan care', '0786612042', 'https://goo.gl/maps/1dvLKUf1enA2');

-- --------------------------------------------------------

--
-- Table structure for table `orphanageadmin`
--

CREATE TABLE `orphanageadmin` (
  `idOrph` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `address` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orphanageadmin`
--

INSERT INTO `orphanageadmin` (`idOrph`, `name`, `phone`, `address`, `email`, `password`) VALUES
(12345, 'Nader Mohammad Harb', '0786005352', 'Zarqa', 'nader@gmail.com', '12332100');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `idOrph` int(30) NOT NULL,
  `emailOrph` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` text NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `idOrph`, `emailOrph`, `image`, `name`, `description`, `price`, `quantity`) VALUES
(3, 12345, 'nader@gmail.com', '5e66c1752c8f42.15178577.jpg', 'For testing', 'Ignore this description Ignore this description Ignore this description Ignore this description Ignore this description Ignore this description', '120', 3);

-- --------------------------------------------------------

--
-- Table structure for table `requestmstry`
--

CREATE TABLE `requestmstry` (
  `idEvent` int(11) NOT NULL,
  `emailU` varchar(50) NOT NULL,
  `nameU` varchar(50) NOT NULL,
  `nameEvent` varchar(50) NOT NULL,
  `dateEvent` date NOT NULL,
  `timeEvent` varchar(15) NOT NULL,
  `timeEvent1` varchar(15) NOT NULL,
  `addressEvent` varchar(15) NOT NULL,
  `typeEvent` varchar(100) NOT NULL,
  `descriptionEvent` text NOT NULL,
  `idOrph` int(11) NOT NULL,
  `nameOrph` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `requestorph`
--

CREATE TABLE `requestorph` (
  `idEvent` int(11) NOT NULL,
  `emailU` varchar(50) NOT NULL,
  `nameU` varchar(50) NOT NULL,
  `nameEvent` varchar(50) NOT NULL,
  `fDate` date NOT NULL,
  `sDate` date NOT NULL,
  `tDate` date NOT NULL,
  `timeEvent` varchar(15) NOT NULL,
  `timeEvent1` varchar(15) NOT NULL,
  `addressEvent` varchar(15) NOT NULL,
  `typeEvent` varchar(100) NOT NULL,
  `descriptionEvent` text NOT NULL,
  `idOrph` int(11) NOT NULL,
  `nameOrph` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `requestsvol`
--

CREATE TABLE `requestsvol` (
  `emailU` varchar(50) NOT NULL,
  `nameU` varchar(50) NOT NULL,
  `idEvent` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requestsvol`
--

INSERT INTO `requestsvol` (`emailU`, `nameU`, `idEvent`, `email`, `status`) VALUES
('Farah@gmail.com', 'Farah Anas', 10, 'Loay@gmail.com', 1),
('Loay@gmail.com', 'Loay Tarifi', 9, 'Farah@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `idOrph` int(11) NOT NULL,
  `idProduct` text NOT NULL,
  `nameProduct` text NOT NULL,
  `priceProduct` text NOT NULL,
  `quantityProduct` text NOT NULL,
  `buyerEmail` text NOT NULL,
  `buyerName` text NOT NULL,
  `buyerPhone` text NOT NULL,
  `cardname` text NOT NULL,
  `cardnumber` text NOT NULL,
  `total` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `idOrph`, `idProduct`, `nameProduct`, `priceProduct`, `quantityProduct`, `buyerEmail`, `buyerName`, `buyerPhone`, `cardname`, `cardnumber`, `total`) VALUES
(2, 12345, '3', 'For testing', '120', '2', 'Loay@gmail.com', 'Loay Tarifi', '0786612012', 'Ehab Ahmad', '1111000022221111', '240');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(100) NOT NULL,
  `NID` varchar(10) NOT NULL,
  `phone` text NOT NULL,
  `age` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `volunteer` varchar(15) DEFAULT 'No',
  `ATime` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `NID`, `phone`, `age`, `gender`, `address`, `email`, `password`, `volunteer`, `ATime`) VALUES
('Loay Tarifi', '1231231230', '0786612012', '24', 'Male', 'Amman', 'Loay@gmail.com', '123123', 'Volunteer', 'Morning'),
('Farah Anas', '9981050839', '0123456798', '20', 'FeMale', 'Zarqa', 'Farah@gmail.com', '15995100', 'Volunteer', 'Morning');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `idEvent` int(11) NOT NULL,
  `emailV` varchar(50) NOT NULL,
  `nameV` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`idEvent`, `emailV`, `nameV`) VALUES
(8, 'Farah@gmail.com', 'Farah Anas'),
(1, 'Farah@gmail.com', 'Farah Anas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`idEvent`);

--
-- Indexes for table `ministry`
--
ALTER TABLE `ministry`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orphanage`
--
ALTER TABLE `orphanage`
  ADD PRIMARY KEY (`idOrph`);

--
-- Indexes for table `orphanageadmin`
--
ALTER TABLE `orphanageadmin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestmstry`
--
ALTER TABLE `requestmstry`
  ADD PRIMARY KEY (`idEvent`);

--
-- Indexes for table `requestorph`
--
ALTER TABLE `requestorph`
  ADD PRIMARY KEY (`idEvent`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`NID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `idEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `requestmstry`
--
ALTER TABLE `requestmstry`
  MODIFY `idEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `requestorph`
--
ALTER TABLE `requestorph`
  MODIFY `idEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
