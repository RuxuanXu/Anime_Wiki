-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: May 29, 2018, 04:57 AM
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
  `anime_id` varchar(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY  (`anime_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `anime`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `company`
-- 

CREATE TABLE `company` (
  `company_id` varchar(6) NOT NULL,
  `company_name` varchar(20) NOT NULL,
  PRIMARY KEY  (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `company`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `make`
-- 

CREATE TABLE `make` (
  `anime_id` varchar(6) NOT NULL,
  `company_id` varchar(6) NOT NULL,
  PRIMARY KEY  (`anime_id`,`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `make`
-- 

