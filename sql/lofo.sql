-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2015 年 08 月 25 日 09:43
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `lofo`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `found`
-- 

CREATE TABLE `found` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `school` varchar(255) NOT NULL,
  `place` text NOT NULL,
  `img` text NOT NULL,
  `contact` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

-- 
-- 导出表中的数据 `found`
-- 

INSERT INTO `found` VALUES (36, 'found', '888', '4444', '2015-08-25 17:38:13', '西校区', '7888', '', '444');
INSERT INTO `found` VALUES (35, 'found', '666', '4444', '2015-08-25 17:38:07', '西校区', '7888', '', '444');
INSERT INTO `found` VALUES (33, 'found', '444', '4444', '0000-00-00 00:00:00', '西校区', '', '', '444');
INSERT INTO `found` VALUES (34, 'found', '444', '4444', '2015-08-25 17:38:00', '西校区', '7888', '', '444');

-- --------------------------------------------------------

-- 
-- 表的结构 `lost`
-- 

CREATE TABLE `lost` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `time` datetime NOT NULL,
  `school` varchar(255) NOT NULL,
  `place` text NOT NULL,
  `img` text NOT NULL,
  `contact` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

-- 
-- 导出表中的数据 `lost`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `user`
-- 

CREATE TABLE `user` (
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `user`
-- 

INSERT INTO `user` VALUES ('admin', '123456');
