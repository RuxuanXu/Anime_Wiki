-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018-06-26 07:32:24
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
-- 資料表結構 `act`
--

CREATE TABLE `act` (
  `chara_id` int(6) NOT NULL,
  `anime_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `anime`
--

CREATE TABLE `anime` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `anime`
--

INSERT INTO `anime` (`id`, `name`) VALUES
(2, '刀劍神域'),
(3, '紫羅蘭永恆花園'),
(4, '境界的彼方'),
(5, '名偵探柯南'),
(6, '冰菓'),
(7, '魔法使的新娘'),
(86, 'S'),
(87, 'Yee'),
(88, 'Yee');

-- --------------------------------------------------------

--
-- 資料表結構 `belong`
--

CREATE TABLE `belong` (
  `series_name` varchar(20) NOT NULL,
  `anime_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `belong`
--

INSERT INTO `belong` (`series_name`, `anime_id`) VALUES
('seriesS', 86),
('Dino', 87),
('Dino', 88);

-- --------------------------------------------------------

--
-- 資料表結構 `chara`
--

CREATE TABLE `chara` (
  `id` int(6) NOT NULL,
  `name` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `company`
--

CREATE TABLE `company` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `company`
--

INSERT INTO `company` (`id`, `name`) VALUES
(1, 'YAOYOROZU'),
(2, 'A-1 Pictures'),
(3, '京都動畫'),
(4, 'TMS/V1 Studio'),
(5, 'WIT STUDIO'),
(6, '測試公司'),
(7, 'Mondo Media'),
(16, '123'),
(17, 'ASB');

-- --------------------------------------------------------

--
-- 資料表結構 `dub`
--

CREATE TABLE `dub` (
  `voice_id` int(6) NOT NULL,
  `chara_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `make`
--

CREATE TABLE `make` (
  `anime_id` int(6) NOT NULL,
  `company_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `make`
--

INSERT INTO `make` (`anime_id`, `company_id`) VALUES
(2, 2),
(3, 3),
(4, 3),
(6, 3),
(5, 4),
(7, 5),
(86, 17),
(87, 17),
(88, 17);

-- --------------------------------------------------------

--
-- 資料表結構 `period`
--

CREATE TABLE `period` (
  `year` int(6) NOT NULL,
  `season` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `series`
--

CREATE TABLE `series` (
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `series`
--

INSERT INTO `series` (`name`) VALUES
('Dino'),
('seriesS');

-- --------------------------------------------------------

--
-- 資料表結構 `showtime`
--

CREATE TABLE `showtime` (
  `anime_id` int(6) NOT NULL,
  `year` int(6) NOT NULL,
  `season` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `supervise`
--

CREATE TABLE `supervise` (
  `supervisor_id` int(6) NOT NULL,
  `anime_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `supervise`
--

INSERT INTO `supervise` (`supervisor_id`, `anime_id`) VALUES
(1, 88);

-- --------------------------------------------------------

--
-- 資料表結構 `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `supervisor`
--

INSERT INTO `supervisor` (`id`, `name`) VALUES
(1, 'Rain');

-- --------------------------------------------------------

--
-- 資料表結構 `voice`
--

CREATE TABLE `voice` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `act`
--
ALTER TABLE `act`
  ADD PRIMARY KEY (`chara_id`,`anime_id`),
  ADD KEY `anime_id` (`anime_id`);

--
-- 資料表索引 `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `belong`
--
ALTER TABLE `belong`
  ADD PRIMARY KEY (`series_name`,`anime_id`),
  ADD KEY `anime_id` (`anime_id`);

--
-- 資料表索引 `chara`
--
ALTER TABLE `chara`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `dub`
--
ALTER TABLE `dub`
  ADD PRIMARY KEY (`voice_id`,`chara_id`),
  ADD KEY `dub_ibfk_2` (`chara_id`);

--
-- 資料表索引 `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`anime_id`,`company_id`),
  ADD KEY `company_id` (`company_id`);

--
-- 資料表索引 `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`year`,`season`);

--
-- 資料表索引 `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`name`);

--
-- 資料表索引 `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`anime_id`,`year`,`season`),
  ADD KEY `year` (`year`);

--
-- 資料表索引 `supervise`
--
ALTER TABLE `supervise`
  ADD PRIMARY KEY (`supervisor_id`,`anime_id`),
  ADD KEY `anime_id` (`anime_id`);

--
-- 資料表索引 `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `voice`
--
ALTER TABLE `voice`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- 使用資料表 AUTO_INCREMENT `chara`
--
ALTER TABLE `chara`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `company`
--
ALTER TABLE `company`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用資料表 AUTO_INCREMENT `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `voice`
--
ALTER TABLE `voice`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `act`
--
ALTER TABLE `act`
  ADD CONSTRAINT `act_ibfk_1` FOREIGN KEY (`chara_id`) REFERENCES `chara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `act_ibfk_2` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `belong`
--
ALTER TABLE `belong`
  ADD CONSTRAINT `belong_ibfk_1` FOREIGN KEY (`series_name`) REFERENCES `series` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `belong_ibfk_2` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `dub`
--
ALTER TABLE `dub`
  ADD CONSTRAINT `dub_ibfk_1` FOREIGN KEY (`voice_id`) REFERENCES `voice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dub_ibfk_2` FOREIGN KEY (`chara_id`) REFERENCES `chara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `make`
--
ALTER TABLE `make`
  ADD CONSTRAINT `make_ibfk_1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `make_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `showtime`
--
ALTER TABLE `showtime`
  ADD CONSTRAINT `showtime_ibfk_2` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `supervise`
--
ALTER TABLE `supervise`
  ADD CONSTRAINT `supervise_ibfk_1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supervise_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
