-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 29, 2010 at 04:10 PM
-- Server version: 5.0.41
-- PHP Version: 5.2.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `kristiansaarela`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `kasutajad`
-- 

CREATE TABLE `kasutajad` (
  `kasutaja_nimi` varchar(40) collate latin1_general_ci NOT NULL,
  `parool` varchar(100) collate latin1_general_ci NOT NULL,
  `email` varchar(40) collate latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `kasutajad`
-- 

INSERT INTO `kasutajad` VALUES ('pedeurkel', '7815696ecbf1c96e6894b779456d330e', 'asd');
INSERT INTO `kasutajad` VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'asdmin');
INSERT INTO `kasutajad` VALUES ('testt', 'e10adc3949ba59abbe56e057f20f883e', 'asdasdasd');
INSERT INTO `kasutajad` VALUES ('kristian', '25f9e794323b453885f5181f1b624d0b', 'asdasdasd');
INSERT INTO `kasutajad` VALUES ('tola', 'e10adc3949ba59abbe56e057f20f883e', 'asda');
INSERT INTO `kasutajad` VALUES ('uhti', 'e10adc3949ba59abbe56e057f20f883e', 'asdwa');
INSERT INTO `kasutajad` VALUES ('uhti', 'e10adc3949ba59abbe56e057f20f883e', 'asdwa');
INSERT INTO `kasutajad` VALUES ('resss', 'e10adc3949ba59abbe56e057f20f883e', 'asdwasd');
INSERT INTO `kasutajad` VALUES ('tyyyytab', 'e10adc3949ba59abbe56e057f20f883e', 'asdwasd');

-- --------------------------------------------------------

-- 
-- Table structure for table `session`
-- 

CREATE TABLE `session` (
  `sid` varchar(32) collate latin1_general_ci NOT NULL,
  `kasutaja_nimi` varchar(16) collate latin1_general_ci default NULL,
  `user_data` text collate latin1_general_ci,
  `svars` text collate latin1_general_ci,
  `created` datetime NOT NULL,
  `changed` timestamp NOT NULL default CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `session`
-- 

INSERT INTO `session` VALUES ('3940fc662d5943199ec34677f9a9988b', '', 'N;', NULL, '2010-04-29 15:41:20', '2010-04-29 15:41:20');
INSERT INTO `session` VALUES ('77cb1bfef4f6d5af7eed2ba0a0538fc1', '', 'N;', NULL, '2010-04-29 15:47:02', '2010-04-29 15:47:02');
INSERT INTO `session` VALUES ('ead1ccb6be9bbcfd553d557893e01708', '', 'N;', NULL, '2010-04-29 15:49:33', '2010-04-29 15:49:33');
INSERT INTO `session` VALUES ('88588b6679d244ba2a239e2e75f050be', 'tola', 'a:3:{s:13:"kasutaja_nimi";s:4:"tola";s:6:"parool";s:32:"e10adc3949ba59abbe56e057f20f883e";s:5:"email";s:4:"asda";}', NULL, '2010-04-29 15:51:59', '2010-04-29 15:51:59');
INSERT INTO `session` VALUES ('d34b1b5b242acc24fd522ef750db1e04', 'uhti', 'a:3:{s:13:"kasutaja_nimi";s:4:"uhti";s:6:"parool";s:32:"e10adc3949ba59abbe56e057f20f883e";s:5:"email";s:5:"asdwa";}', NULL, '2010-04-29 15:53:34', '2010-04-29 15:53:34');
INSERT INTO `session` VALUES ('46256444b1038062a8033b1cc34dc6fa', 'uhti', 'a:3:{s:13:"kasutaja_nimi";s:4:"uhti";s:6:"parool";s:32:"e10adc3949ba59abbe56e057f20f883e";s:5:"email";s:5:"asdwa";}', NULL, '2010-04-29 15:53:56', '2010-04-29 15:53:56');
INSERT INTO `session` VALUES ('cc5a1d8f7582240d89d2358df0c6b2d8', 'resss', 'a:3:{s:13:"kasutaja_nimi";s:5:"resss";s:6:"parool";s:32:"e10adc3949ba59abbe56e057f20f883e";s:5:"email";s:7:"asdwasd";}', NULL, '2010-04-29 16:04:58', '2010-04-29 16:04:58');
INSERT INTO `session` VALUES ('547be1a4a666132d31294b9db82bc950', 'tyyyytab', 'a:3:{s:13:"kasutaja_nimi";s:8:"tyyyytab";s:6:"parool";s:32:"e10adc3949ba59abbe56e057f20f883e";s:5:"email";s:7:"asdwasd";}', NULL, '2010-04-29 16:08:38', '2010-04-29 16:08:38');

-- --------------------------------------------------------

-- 
-- Table structure for table `task`
-- 

CREATE TABLE `task` (
  `username` varchar(16) collate latin1_general_ci NOT NULL,
  `task_description` varchar(255) collate latin1_general_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `task`
-- 

INSERT INTO `task` VALUES ('anna', 'esimene', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `username` varchar(16) collate latin1_general_ci NOT NULL,
  `passwd` char(40) collate latin1_general_ci NOT NULL,
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` VALUES ('test', '4a0cde71aee7158542d013fc0c9f5acfc735c612', 'test@anna');
INSERT INTO `user` VALUES ('test@test.test', 'eabd8ce9404507aa8c22714d3f5eada9', 'test');
INSERT INTO `user` VALUES ('anna', 'eabd8ce9404507aa8c22714d3f5eada9', 'anna@test.anna');
INSERT INTO `user` VALUES ('anna.pugatsova', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'anna.pugatsova@khk.tartu.ee');

-- --------------------------------------------------------

-- 
-- Table structure for table `ylesanded`
-- 

CREATE TABLE `ylesanded` (
  `kasutaja_nimi` varchar(40) collate latin1_general_ci NOT NULL,
  `kirjeldus` varchar(250) collate latin1_general_ci NOT NULL,
  `algusaeg` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `loppaeg` timestamp NOT NULL default '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `ylesanded`
-- 

INSERT INTO `ylesanded` VALUES ('admin', '', '0000-00-00 00:00:00', '2010-03-11 12:30:00');
INSERT INTO `ylesanded` VALUES ('admin', 'asdasdsafa', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
