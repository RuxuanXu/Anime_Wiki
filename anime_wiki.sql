-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jun 01, 2018, 06:53 AM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `anime_wiki`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `anime`
-- 

CREATE TABLE `anime` (
  `id` int(6) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

-- 
-- 列出以下資料庫的數據： `anime`
-- 

INSERT INTO `anime` VALUES (51, 'è€¶');
INSERT INTO `anime` VALUES (53, 'å—¨');

-- --------------------------------------------------------

-- 
-- 資料表格式： `company`
-- 

CREATE TABLE `company` (
  `id` int(6) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

-- 
-- 列出以下資料庫的數據： `company`
-- 

INSERT INTO `company` VALUES (48, 'å¤§éº»');
INSERT INTO `company` VALUES (49, 'weed');
INSERT INTO `company` VALUES (50, 'hello');

-- --------------------------------------------------------

-- 
-- 資料表格式： `make`
-- 

CREATE TABLE `make` (
  `anime_id` int(6) NOT NULL,
  `company_id` int(6) NOT NULL,
  PRIMARY KEY  (`anime_id`,`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `make`
-- 

INSERT INTO `make` VALUES (51, 48);
INSERT INTO `make` VALUES (53, 50);
