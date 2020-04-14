-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018-05-26 21:25:03
-- 服务器版本： 5.5.56-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `czhao10`
--

-- --------------------------------------------------------

--
-- 表的结构 `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `id` int(255) NOT NULL,
  `access_type` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `access`
--

INSERT INTO `access` (`id`, `access_type`) VALUES
(1, 'Full_Access'),
(2, 'General_Access');

-- --------------------------------------------------------

--
-- 表的结构 `Cafe_Accesstype`
--

CREATE TABLE IF NOT EXISTS `Cafe_Accesstype` (
  `Access` int(11) NOT NULL,
  `Access_Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Cafe_Accesstype`
--

INSERT INTO `Cafe_Accesstype` (`Access`, `Access_Type`) VALUES
(1, 'Director'),
(2, 'Manager'),
(3, 'Staff'),
(4, 'Customer');

-- --------------------------------------------------------

--
-- 表的结构 `Cafe_Foodlist`
--

CREATE TABLE IF NOT EXISTS `Cafe_Foodlist` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` decimal(11,1) NOT NULL,
  `Image File` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10007 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Cafe_Foodlist`
--

INSERT INTO `Cafe_Foodlist` (`ID`, `Name`, `Price`, `Image File`, `Description`, `Type`) VALUES
(10001, 'Chicken Roll', 12.0, 'food1.jpg', 'Crispy and Fresh!', 'Food'),
(10002, 'Latte', 3.0, 'food2.jpg', 'Can choose ice or warm', 'Drink'),
(10003, 'Pan Cake', 10.0, 'food3.jpg', 'Tasty and sweet', 'Food'),
(10004, 'Black Coffee', 3.5, 'food4.jpg', 'Imported coffee bean', 'Drink'),
(10005, 'Terryaki Chicken', 13.0, 'food5.jpg', 'Crispy and fresh!', 'Food'),
(10006, 'Mocha', 4.0, 'food6.png', 'Can choose ice or warm', 'Drink');

-- --------------------------------------------------------

--
-- 表的结构 `Cafe_Information`
--

CREATE TABLE IF NOT EXISTS `Cafe_Information` (
  `ID` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Open_Hour` varchar(255) NOT NULL,
  `Menu_Date` date NOT NULL,
  `Telephone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Cafe_Information`
--

INSERT INTO `Cafe_Information` (`ID`, `Location`, `Open_Hour`, `Menu_Date`, `Telephone`) VALUES
(1, 'Ref Cafe', '8:30am-6pm Monday-Friday', '2018-05-23', '(03) 6226 7689'),
(2, 'Lazenby Cafe', '8am-4pm Monday-Friday', '2018-05-23', '(03) 6226 1858'),
(3, 'Trade Table Cafe', '8:30am-4pm Monday-Friday', '2018-05-23', '(03) 6226 1544');

-- --------------------------------------------------------

--
-- 表的结构 `Cafe_Menu_Product`
--

CREATE TABLE IF NOT EXISTS `Cafe_Menu_Product` (
  `ID` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Cafe_Menu_Product`
--

INSERT INTO `Cafe_Menu_Product` (`ID`, `Location`) VALUES
(10001, 'Ref Cafe'),
(10002, 'Ref Cafe'),
(10004, 'Lazenby Cafe'),
(10003, 'Lazenby Cafe'),
(10004, 'Ref Cafe'),
(10005, 'Trade Table Cafe'),
(10006, 'Trade Table Cafe');

-- --------------------------------------------------------

--
-- 表的结构 `Cafe_Message`
--

CREATE TABLE IF NOT EXISTS `Cafe_Message` (
  `Location` varchar(255) NOT NULL,
  `Open_Hour` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `Cafe_Orderedfood`
--

CREATE TABLE IF NOT EXISTS `Cafe_Orderedfood` (
  `ID` int(11) NOT NULL,
  `Customer` varchar(255) NOT NULL,
  `Transaction_ID` varchar(255) NOT NULL,
  `Item_List` varchar(255) NOT NULL,
  `Store` varchar(32) NOT NULL,
  `Total_Price` varchar(255) NOT NULL,
  `Ordered_Time` datetime NOT NULL,
  `Comment` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Cafe_Orderedfood`
--

INSERT INTO `Cafe_Orderedfood` (`ID`, `Customer`, `Transaction_ID`, `Item_List`, `Store`, `Total_Price`, `Ordered_Time`, `Comment`) VALUES
(17, 'kaster', '5b0400000dfe3', 'Chicken Roll x1/', 'Ref Cafe', '12', '2018-05-22 21:33:20', 'mk'),
(19, 'kaster', '5b06383f28397', 'Chicken Roll x1/ Latte x1/', 'Ref Cafe', '15', '2018-05-24 13:57:51', '524');

-- --------------------------------------------------------

--
-- 表的结构 `Cafe_Staff`
--

CREATE TABLE IF NOT EXISTS `Cafe_Staff` (
  `ID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Card_Number` varchar(32) NOT NULL,
  `Balance` decimal(11,1) NOT NULL,
  `Access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Cafe_Staff`
--

INSERT INTO `Cafe_Staff` (`ID`, `Name`, `Password`, `Location`, `Card_Number`, `Balance`, `Access`) VALUES
('CM0001', 'Josh', 'f7218680c5f853a0b4cb25a0c52699e0', 'Ref Cafe', '1027541938475493', 0.0, 2),
('CM0002', 'Bill', 'f7218680c5f853a0b4cb25a0c52699e0', 'Lazenby Cafe', '2939405345446739', 0.0, 2),
('CM0003', 'Tim', 'f7218680c5f853a0b4cb25a0c52699e0', 'Trade Table Cafe', '', 0.0, 2),
('DB0001', 'kaster', 'f7218680c5f853a0b4cb25a0c52699e0', 'all', '1111111111111111', 440.0, 1),
('SF0001', 'Jason', 'f7218680c5f853a0b4cb25a0c52699e0', 'Ref Cafe', '', 0.0, 3);

-- --------------------------------------------------------

--
-- 表的结构 `Cafe_User_Account`
--

CREATE TABLE IF NOT EXISTS `Cafe_User_Account` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Student/Employee ID` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` int(20) NOT NULL,
  `Card_Number` varchar(255) NOT NULL,
  `Balance` decimal(11,1) NOT NULL,
  `Access` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Cafe_User_Account`
--

INSERT INTO `Cafe_User_Account` (`ID`, `Name`, `Password`, `Student/Employee ID`, `Email`, `Phone`, `Card_Number`, `Balance`, `Access`) VALUES
(4, 'amy', 'f7218680c5f853a0b4cb25a0c52699e0', '123123', '1@qq', 2147483647, '123123123', 100.0, 4),
(5, 'mike', 'f7218680c5f853a0b4cb25a0c52699e0', '123132', '1@qq.com', 2147483647, '23213131', 0.0, 4),
(6, 'Tom', 'f7218680c5f853a0b4cb25a0c52699e0', '123123', '2@qq.com', 1234859353, '132312321312', 0.0, 4);

-- --------------------------------------------------------

--
-- 表的结构 `classics`
--

CREATE TABLE IF NOT EXISTS `classics` (
  `author` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `type` varchar(16) NOT NULL,
  `year` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `classics`
--

INSERT INTO `classics` (`author`, `title`, `type`, `year`) VALUES
('Soonja', 'Spooky Story', 'Fiction', '2015');

-- --------------------------------------------------------

--
-- 表的结构 `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `ID` int(11) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Population` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `countries`
--

INSERT INTO `countries` (`ID`, `Country`, `City`, `Population`) VALUES
(1, 'AU', 'Adelaide', 1262940),
(2, 'AU', 'Brisbane', 2146577),
(3, 'AU', 'Canberra', 418292),
(4, 'AU', 'Darwin', 129062),
(5, 'AU', 'Hobart', 216276),
(6, 'AU', 'Melbourne', 4169103),
(7, 'AU', 'Perth', 1832114),
(8, 'AU', 'Sydney', 4605992),
(9, 'UK', 'Birmingham', 2284093),
(10, 'UK', 'Glasgow', 1199629),
(11, 'UK', 'Leeds', 1499465),
(12, 'UK', 'Liverpool', 816216),
(13, 'UK', 'London', 8278251),
(14, 'UK', 'Manchester', 2240230),
(15, 'UK', 'Newcastle', 879996),
(16, 'UK', 'Nottingham', 666358),
(17, 'US', 'Chicago', 9504753),
(18, 'US', 'Dallas', 6526548),
(19, 'US', 'Houston', 6086538),
(20, 'US', 'Los Angeles', 12944801),
(21, 'US', 'Miami', 5670125),
(22, 'US', 'New York City', 19015900),
(23, 'US', 'Philadelphia', 5922414),
(24, 'US', 'Washington, D.C.', 5703948);

-- --------------------------------------------------------

--
-- 表的结构 `Guestbook`
--

CREATE TABLE IF NOT EXISTS `Guestbook` (
  `ID` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Guestbook`
--

INSERT INTO `Guestbook` (`ID`, `name`, `password`, `email`, `url`, `comments`, `update_time`) VALUES
(1, 'soonja', 'f7218680c5f853a0b4cb25a0c52699e0', 'soonja@utas.edu.au', 'myhome@utas.edu', 'excellent', '2017-04-30 14:00:00'),
(2, 'syeom', 'f7218680c5f853a0b4cb25a0c52699e0', 's.yeom@utas.edu.au', 'www.utas.edu.au', 'This is an important message, please read it carefully!', '2018-04-18 14:00:00'),
(3, 'Testing', 'f7218680c5f853a0b4cb25a0c52699e0', 'testing@testing.com', 'testing.com.au', 'testing with MD5 for password', '2018-04-19 14:00:00'),
(4, 'another testing', 'f7218680c5f853a0b4cb25a0c52699e0', 'anothertesting@com', '1', 'testing1111', '2018-05-15 14:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `KIT502_product`
--

CREATE TABLE IF NOT EXISTS `KIT502_product` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `KIT502_product`
--

INSERT INTO `KIT502_product` (`ID`, `Name`, `Price`, `Description`) VALUES
(1, 'iMac', 1999, '17 inch Apple All-in-One'),
(2, 'Macbook Pro Retina', 2799, '15 inch Apple Laptop with Retina display'),
(3, 'Alienware M18x Gaming Laptop', 3299, '18 inch DELL Gaming Laptop'),
(4, 'XPS One 2710 (Touch)', 2499, '27 inch DELL ALL-in-One');

-- --------------------------------------------------------

--
-- 表的结构 `Tutorial 7`
--

CREATE TABLE IF NOT EXISTS `Tutorial 7` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Tutorial 7`
--

INSERT INTO `Tutorial 7` (`id`, `username`, `password`, `access`) VALUES
(1, 'Soonja', '4297f44b13955235245b2497399d7a93', 1),
(2, 'Amanda', '0e9212587d373ca58e9bada0c15e6fe4', 2);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`ID`, `username`, `password`) VALUES
(0, 'mark', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Cafe_Foodlist`
--
ALTER TABLE `Cafe_Foodlist`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `Cafe_Orderedfood`
--
ALTER TABLE `Cafe_Orderedfood`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Cafe_Staff`
--
ALTER TABLE `Cafe_Staff`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `Cafe_User_Account`
--
ALTER TABLE `Cafe_User_Account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `KIT502_product`
--
ALTER TABLE `KIT502_product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- Indexes for table `Tutorial 7`
--
ALTER TABLE `Tutorial 7`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Cafe_Foodlist`
--
ALTER TABLE `Cafe_Foodlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10007;
--
-- AUTO_INCREMENT for table `Cafe_Orderedfood`
--
ALTER TABLE `Cafe_Orderedfood`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `Cafe_User_Account`
--
ALTER TABLE `Cafe_User_Account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `Tutorial 7`
--
ALTER TABLE `Tutorial 7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
