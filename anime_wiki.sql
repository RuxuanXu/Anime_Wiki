-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018-07-03 03:54:45
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

--
-- 資料表的匯出資料 `act`
--

INSERT INTO `act` (`chara_id`, `anime_id`) VALUES
(132, 188),
(136, 190),
(137, 190),
(138, 190),
(139, 190),
(140, 190),
(141, 191),
(142, 191),
(148, 194),
(149, 195),
(150, 195),
(151, 195);

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
(3, '紫羅蘭永恆花園'),
(5, '名偵探柯南'),
(6, '冰菓'),
(7, '魔法使的新娘'),
(9, '快樂樹朋友'),
(188, '魔法禁書目錄'),
(190, '庫洛魔法使 小櫻牌篇'),
(191, '科學超電磁砲'),
(194, 'zsdfzzsdf'),
(195, '測試動畫');

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
('魔法禁書目錄', 188),
('庫洛魔法使', 190),
('魔法禁書目錄', 191),
('', 194),
('wqe', 195);

-- --------------------------------------------------------

--
-- 資料表結構 `chara`
--

CREATE TABLE `chara` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `chara`
--

INSERT INTO `chara` (`id`, `name`) VALUES
(102, 'Hell'),
(103, '小貓'),
(104, '小豬'),
(105, '小貓'),
(106, '小豬'),
(107, '小貓'),
(108, '小智'),
(109, '皮卡丘'),
(110, '艾莉絲'),
(111, '小貓'),
(112, '小狗'),
(113, '小綿羊'),
(114, ''),
(115, ''),
(116, ''),
(117, ''),
(118, ''),
(119, ''),
(120, ''),
(121, ''),
(122, ''),
(123, ''),
(124, ''),
(125, ''),
(126, ''),
(127, ''),
(128, ''),
(129, 'asdf'),
(130, 'asdfff'),
(131, ''),
(132, '上條當麻'),
(133, '岡崎汐'),
(134, '春原陽平'),
(135, '伊吹風子'),
(136, '可魯貝洛斯(原始型態)'),
(137, '木之本櫻'),
(138, '大道寺知世'),
(139, '李小狼'),
(140, ''),
(141, '御坂美琴'),
(142, '白井黑子'),
(143, '0'),
(144, ''),
(145, ''),
(146, ''),
(147, ''),
(148, ''),
(149, ''),
(150, ''),
(151, '');

-- --------------------------------------------------------

--
-- 資料表結構 `collection`
--

CREATE TABLE `collection` (
  `user_id` int(6) NOT NULL,
  `anime_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `collection`
--

INSERT INTO `collection` (`user_id`, `anime_id`) VALUES
(4, 3),
(4, 195);

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
(8, 'HentaiInc'),
(18, ''),
(19, '早安'),
(20, 'OLM Team Kato'),
(21, '沒有這間公司'),
(22, 'dsf'),
(23, 'dsaf'),
(24, 'J.C. STAFF'),
(25, 'MADHOUSE'),
(26, 'gyugy'),
(27, 'zsfz'),
(28, 'qweqwe');

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
(3, 3),
(6, 3),
(5, 4),
(7, 5),
(9, 7),
(194, 18),
(188, 24),
(191, 24),
(190, 25),
(195, 28);

-- --------------------------------------------------------

--
-- 資料表結構 `period`
--

CREATE TABLE `period` (
  `year` int(6) NOT NULL,
  `season` enum('春','夏','秋','冬') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `period`
--

INSERT INTO `period` (`year`, `season`) VALUES
(0, '春'),
(123, '春'),
(1234, '春'),
(1985, '春'),
(1986, '春'),
(1986, '夏'),
(1999, '春'),
(2008, '秋'),
(2009, '秋'),
(2010, '秋'),
(2018, '春'),
(12324, '春'),
(12345, '春'),
(123312, '春');

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
(''),
('asdfasdfsad'),
('CLANNAD'),
('Dino'),
('dsf'),
('guygyu'),
('sdf'),
('Series6'),
('SeriesABC'),
('SeriesH'),
('seriesS'),
('wqe'),
('zsdfzzsdf'),
('庫洛魔法使'),
('神奇寶貝'),
('魔法禁書目錄');

-- --------------------------------------------------------

--
-- 資料表結構 `showtime`
--

CREATE TABLE `showtime` (
  `anime_id` int(6) NOT NULL,
  `year` int(6) NOT NULL,
  `season` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `showtime`
--

INSERT INTO `showtime` (`anime_id`, `year`, `season`) VALUES
(194, 0, '春'),
(195, 0, '春'),
(190, 1999, '春'),
(188, 2008, '秋'),
(191, 2009, '秋');

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
(1, 88),
(2, 89),
(2, 90),
(2, 91),
(3, 92),
(3, 93),
(3, 94),
(3, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(2, 101),
(2, 102),
(2, 103),
(2, 104),
(2, 105),
(2, 106),
(2, 107),
(3, 108),
(3, 109),
(3, 110),
(3, 111),
(3, 112),
(3, 113),
(3, 114),
(3, 115),
(3, 116),
(3, 117),
(2, 118),
(2, 119),
(2, 120),
(2, 121),
(2, 122),
(2, 123),
(2, 124),
(2, 125),
(3, 126),
(3, 127),
(3, 128),
(3, 129),
(3, 130),
(3, 131),
(3, 132),
(3, 133),
(3, 134),
(3, 135),
(3, 136),
(3, 137),
(3, 138),
(3, 139),
(3, 140),
(3, 141),
(3, 142),
(3, 143),
(3, 144),
(3, 145),
(3, 146),
(3, 147),
(3, 148),
(3, 149),
(3, 150),
(3, 151),
(3, 152),
(2, 153),
(2, 154),
(2, 155),
(2, 156),
(2, 157),
(2, 158),
(2, 159),
(2, 160),
(2, 161),
(2, 162),
(2, 163),
(2, 164),
(2, 165),
(2, 166),
(3, 166),
(2, 167),
(2, 168),
(4, 169),
(4, 170),
(2, 171),
(5, 172),
(6, 173),
(3, 174),
(7, 175),
(3, 176),
(3, 177),
(3, 178),
(3, 179),
(3, 180),
(3, 181),
(3, 182),
(3, 183),
(3, 184),
(3, 185),
(3, 186),
(8, 187),
(9, 188),
(10, 189),
(11, 190),
(12, 191),
(13, 192),
(14, 193),
(3, 194),
(15, 195);

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
(1, 'Rain'),
(2, 'melt'),
(3, ''),
(4, '大園'),
(5, '湯山邦彥'),
(6, '大麻'),
(7, 'dsf'),
(8, 'asdf'),
(9, '錦織博'),
(10, '石原立也'),
(11, '淺香守生'),
(12, '長井龍雪'),
(13, 'gyu'),
(14, 'sdf'),
(15, 'qwe');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `authority` enum('normal','editor','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `authority`) VALUES
(4, 'norza', 'asdf', 'admin'),
(5, 'guest', '123', 'normal'),
(12, 'bnm', 'bnm', 'normal'),
(13, '1234', '1234', 'normal'),
(14, 'qwe', 'qwe', 'editor');

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
-- 資料表索引 `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`user_id`,`anime_id`),
  ADD KEY `collection_ibfk_2` (`anime_id`);

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
-- 資料表索引 `user`
--
ALTER TABLE `user`
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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;
--
-- 使用資料表 AUTO_INCREMENT `chara`
--
ALTER TABLE `chara`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- 使用資料表 AUTO_INCREMENT `company`
--
ALTER TABLE `company`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- 使用資料表 AUTO_INCREMENT `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
-- 資料表的 Constraints `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `collection_ibfk_2` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `make_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `make_ibfk_2` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `showtime`
--
ALTER TABLE `showtime`
  ADD CONSTRAINT `showtime_ibfk_2` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
