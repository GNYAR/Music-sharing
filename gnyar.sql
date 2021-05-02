-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-29 18:32:26
-- 伺服器版本： 10.4.17-MariaDB
-- PHP 版本： 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `gnyar`
--
CREATE DATABASE IF NOT EXISTS `gnyar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gnyar`;

-- --------------------------------------------------------

--
-- 資料表結構 `songs`
--
-- 建立時間： 2020-12-29 15:48:21
-- 最後更新： 2020-12-29 17:31:04
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE `songs` (
  `name` varchar(50) NOT NULL,
  `singer` varchar(50) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `link` varchar(20) NOT NULL,
  `descript` varchar(500) DEFAULT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `songs`
--

INSERT INTO `songs` (`name`, `singer`, `title`, `link`, `descript`, `time`) VALUES
('Style', 'Taylor Swift', 'We go crashing down, we come back every time', '-CmadmM5cOk', '', 1609176142),
('Call You Mine', 'The Chainsmokers, Bebe Rexha', 'Can I call you mine?', '3XCVM3G3pns', '', 1609176236),
('I\'ll Never Love Again', 'Lady Gaga', '人生無常 愛要及時', '52nfjRzIaj8', 'Wish I could\r\nI could have said goodbye\r\nI would have said what I wanted to\r\nMaybe even cried for you\r\nIf I knew it would be the last time\r\nI would have broke my heart in two\r\nTryin\' to save a part of you', 1609176614),
('Here With Me', 'Marshmello, CHVRCHES', 'I Need You Here With Me', 'HHnjuUVgSJ4', 'Can I tell you something\r\njust between you and me?\r\nWhen I hear your voice, I know I\'m finally free\r\nEvery single word is perfect as it can be\r\nAnd I need you here with me', 1609176664),
('Old Town Road', 'Lil Nas X, Billy Ray Cyrus', '用堅強的毅力、不被動搖的決心追求事物', 'r7qovpFAGrQ', 'I\'m gonna take my horse to the old town road\r\nI\'m gonna ride \'til I can\'t no more\r\nCan\'t nobody tell me nothin\'\r\nYou can\'t tell me nothin\'', 1609176739),
('willow', 'Taylor Swift', 'Wherever you stray, I follow', 'RsEZmictANA', '', 1609176806),
('Kills You Slowly', 'The Chainsmokers', 'Hold it, even though it kills you slowly', 'SO7EjEbN9BA', 'But we dress up and play pretend\r\nThen we act like we\'re good again\r\nI do things I can\'t defend\r\nAnd even when you hold it in', 1609176774),
('Fever', 'Dua Lipa, Angèle', 'I\'ve got a fever, so can you check?', 'vs61OHs2g-w', '', 1609212868),
('dorothea', 'Taylor Swift', 'Do you ever stop and think about me?', 'zI4DS5GmQWE', 'It\'s never too late to come back to my side\r\nThe stars in your eyes shined brighter in Tupelo\r\nAnd if you\'re ever tired of being known for who you know\r\nYou know, you\'ll always know me', 1609178149),
('Afterglow', 'Ed Sheeran', 'Oh, I will hold on to the afterglow', '_xG9CviE5Fs', '', 1609176827);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`link`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
