-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018-06-01 10:04:12
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `anime_wiki`
--

-- --------------------------------------------------------

--
-- 資料表結構 `anime`
--

CREATE TABLE `anime` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `anime`
--

INSERT INTO `anime` (`id`, `name`) VALUES
(1, '動物朋友'),
(2, '刀劍神域'),
(3, '紫羅蘭永恆花園'),
(4, '境界的彼方');

-- --------------------------------------------------------

--
-- 資料表結構 `company`
--

CREATE TABLE `company` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `company`
--

INSERT INTO `company` (`id`, `name`) VALUES
(1, 'YAOYOROZU'),
(2, 'A-1 Pictures'),
(3, '京都動畫');

-- --------------------------------------------------------

--
-- 資料表結構 `make`
--

CREATE TABLE `make` (
  `anime_id` int(6) NOT NULL,
  `company_id` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `make`
--

INSERT INTO `make` (`anime_id`, `company_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 3);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`anime_id`,`company_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `company`
--
ALTER TABLE `company`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
