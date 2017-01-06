-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2017 at 05:06 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  `userProfession` varchar(50) NOT NULL,
  `userPic` varchar(200) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userProfession`, `userPic`) VALUES
(42, 'Teja Paku Alam', 'penjaga gawang (GK)', '360351.jpg'),
(43, 'Andritany A', 'penjaga gawang (GK)', '625619.jpg'),
(44, 'Kurnia Meiga', 'penjaga gawang (GK)', '998629.jpg'),
(70, 'Benny Wahyudi', 'Center Back (CB)', '279011.jpg'),
(51, 'Manahati Lestusen', 'Center Back (CB)', '403947.jpg'),
(52, 'Abdul Rachman', 'Center Back (CB)', '451904.jpg'),
(53, 'Abduh Lestaluhu', 'Center Back (CB)', '692752.jpg'),
(54, 'Fakhruddin', 'Center Back (CB)', '572297.jpg'),
(55, 'Yanto Basna', 'Center Back (CB)', '180538.jpg'),
(56, 'Gunawan Dwi Cahyo', 'Center Back (CB)', '575803.jpg'),
(57, 'Hansamu Yama', 'Center Back (CB)', '249988.jpg'),
(58, 'Bayu Pradana', 'Tengah (MD)', '309895.jpg'),
(59, 'Dedi Kusnandar', 'Tengah (MD)', '268219.jpg'),
(60, 'Zulham Zamrun', 'Tengah Sayap ', '704946.jpg'),
(61, 'Rizky Pora', 'Tengah Sayap', '805371.jpg'),
(62, 'Andik Vermansah', 'Tengah Sayap', '891009.jpg'),
(63, 'Bayu Gatra', 'Tengah Sayap', '466720.jpg'),
(64, 'Evan Dimas', 'Tengah Sayap', '652783.jpg'),
(65, 'Stefano Lilipaly', 'Tengah Sayap', '231451.jpg'),
(66, 'Boaz Salossa', 'Depan (CF)', '343156.jpg'),
(67, 'Ferdinand Sinaga', 'Depan (CF)', '969209.jpg'),
(68, 'Lerby Eliandry', 'Depan (CF)', '810157.jpg'),
(71, 'Alfred Riedl', 'Coach', '601351.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
