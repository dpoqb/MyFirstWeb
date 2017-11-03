-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2017-11-02 20:42:59
-- 服务器版本： 5.7.20-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_tb`
--

CREATE TABLE `admin_tb` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(20) NOT NULL,
  `realname` varchar(20) NOT NULL,
  `add_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin_tb`
--

INSERT INTO `admin_tb` (`id`, `username`, `password`, `realname`, `add_time`) VALUES
(1, 'songwei', 'sw789789', 'SW', '2017-11-02 13:54:01');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `article_title_view`
-- (See below for the actual view)
--
CREATE TABLE `article_title_view` (
`id` int(11)
,`article_title` varchar(80)
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `get_admin_name_view`
-- (See below for the actual view)
--
CREATE TABLE `get_admin_name_view` (
`id` int(10)
,`username` varchar(20)
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `get_alltime_view`
-- (See below for the actual view)
--
CREATE TABLE `get_alltime_view` (
`id` int(11)
,`article_title` varchar(80)
,`day` varchar(2)
,`month` varchar(4)
,`year` varchar(4)
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `get_username_view`
-- (See below for the actual view)
--
CREATE TABLE `get_username_view` (
`id` int(11)
,`username` varchar(20)
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `get_year_view`
-- (See below for the actual view)
--
CREATE TABLE `get_year_view` (
`id` int(11)
,`year` varchar(4)
);

-- --------------------------------------------------------

--
-- 表的结构 `literatures`
--

CREATE TABLE `literatures` (
  `id` int(11) NOT NULL,
  `article_title` varchar(80) NOT NULL DEFAULT '<尚未添加文献标题>',
  `first_author_name` varchar(20) NOT NULL DEFAULT '无',
  `second_author_name` varchar(20) NOT NULL DEFAULT '无',
  `periodical` varchar(50) NOT NULL DEFAULT '无',
  `abstract` text NOT NULL,
  `key_words` varchar(50) NOT NULL DEFAULT '无',
  `ptime` varchar(20) NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发表时间',
  `upload_time` datetime NOT NULL COMMENT '上传时间',
  `pdf` char(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `users_tb`
--

CREATE TABLE `users_tb` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `realname` varchar(10) NOT NULL COMMENT '真实姓名',
  `search_team` varchar(20) NOT NULL,
  `role` set('老师','学生','其他','') NOT NULL,
  `email` varchar(50) NOT NULL,
  `add_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 视图结构 `article_title_view`
--
DROP TABLE IF EXISTS `article_title_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `article_title_view`  AS  select `literatures`.`id` AS `id`,`literatures`.`article_title` AS `article_title` from `literatures` ;

-- --------------------------------------------------------

--
-- 视图结构 `get_admin_name_view`
--
DROP TABLE IF EXISTS `get_admin_name_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `get_admin_name_view`  AS  select `admin_tb`.`id` AS `id`,`admin_tb`.`username` AS `username` from `admin_tb` ;

-- --------------------------------------------------------

--
-- 视图结构 `get_alltime_view`
--
DROP TABLE IF EXISTS `get_alltime_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `get_alltime_view`  AS  select `literatures`.`id` AS `id`,`literatures`.`article_title` AS `article_title`,left(`literatures`.`ptime`,2) AS `day`,substr(`literatures`.`ptime`,4,4) AS `month`,right(`literatures`.`ptime`,4) AS `year` from `literatures` ;

-- --------------------------------------------------------

--
-- 视图结构 `get_username_view`
--
DROP TABLE IF EXISTS `get_username_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `get_username_view`  AS  select `users_tb`.`id` AS `id`,`users_tb`.`username` AS `username` from `users_tb` ;

-- --------------------------------------------------------

--
-- 视图结构 `get_year_view`
--
DROP TABLE IF EXISTS `get_year_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `get_year_view`  AS  select `literatures`.`id` AS `id`,right(`literatures`.`ptime`,4) AS `year` from `literatures` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `literatures`
--
ALTER TABLE `literatures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `literatures_title` (`article_title`),
  ADD KEY `literatures_periodical` (`periodical`),
  ADD KEY `literatures_author` (`first_author_name`,`second_author_name`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `literatures`
--
ALTER TABLE `literatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
