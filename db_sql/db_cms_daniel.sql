-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2014 at 02:31 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_cms_daniel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cw_about_us`
--

CREATE TABLE IF NOT EXISTS `cw_about_us` (
`about_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cw_about_us`
--

INSERT INTO `cw_about_us` (`about_id`, `description`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `cw_articles`
--

CREATE TABLE IF NOT EXISTS `cw_articles` (
`article_id` int(11) NOT NULL,
  `title` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `directory` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `author` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cw_articles`
--

INSERT INTO `cw_articles` (`article_id`, `title`, `description`, `directory`, `image`, `category`, `date_created`, `date_modified`, `author`, `status`) VALUES
(2, 'Testing Percobaan', 'fseet', 'Upload/', '20141211130811-e-ticket.jpg', 2, '2014-12-11 13:08:11', '2014-12-11 19:50:01', 'Super User', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cw_category`
--

CREATE TABLE IF NOT EXISTS `cw_category` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cw_category`
--

INSERT INTO `cw_category` (`id`, `category_id`, `category_name`, `note`, `status`) VALUES
(1, 1, 'Komputer', 'Segala sesuatu yang berhubungan dengan komputer, seperti hardware, software, maupun aksesoris lainnya', 1),
(4, 4, 'vvvv', '', 0),
(3, 3, 'Berita', 'Sekumpulan informasi terkini', 1),
(2, 2, 'Makanan', 'Segala sesuatu yang berhubungan dengan makanan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cw_contact_us`
--

CREATE TABLE IF NOT EXISTS `cw_contact_us` (
`contact_id` int(11) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cw_contact_us`
--

INSERT INTO `cw_contact_us` (`contact_id`, `contact_email`, `subject`) VALUES
(1, 'whielz.smith@gmail.com', 'Undangan');

-- --------------------------------------------------------

--
-- Table structure for table `cw_image_logo`
--

CREATE TABLE IF NOT EXISTS `cw_image_logo` (
`logo_id` int(11) NOT NULL,
  `logo_name` varchar(50) NOT NULL,
  `directory` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cw_image_logo`
--

INSERT INTO `cw_image_logo` (`logo_id`, `logo_name`, `directory`) VALUES
(1, '20141211095813-f08d3e1e61.jpg', 'Upload/');

-- --------------------------------------------------------

--
-- Table structure for table `cw_status`
--

CREATE TABLE IF NOT EXISTS `cw_status` (
`id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `status_name` varchar(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cw_status`
--

INSERT INTO `cw_status` (`id`, `status_id`, `status_name`) VALUES
(1, 0, 'Tidak Aktif'),
(2, 1, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `cw_users`
--

CREATE TABLE IF NOT EXISTS `cw_users` (
`user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_visited` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cw_users`
--

INSERT INTO `cw_users` (`user_id`, `name`, `nickname`, `password`, `email`, `level_id`, `date_created`, `date_modified`, `date_visited`, `status`) VALUES
(1, 'Super User', 'superuser', 'e10adc3949ba59abbe56e057f20f883e', 'danielwiranatawijaya@gmail.com', 1, '2014-12-10 20:22:44', '2014-12-11 20:08:56', '2014-12-11 20:09:07', 1),
(2, 'Willy', 'ws14593', 'e10adc3949ba59abbe56e057f20f883e', 'whielz.smith@gmail.com', 2, '2014-12-11 14:23:31', '0000-00-00 00:00:00', '2014-12-11 20:09:39', 1),
(4, 'Daniel123', 'daniel123', 'e10adc3949ba59abbe56e057f20f883e', 'danielwijaya@gmail.com', 3, '2014-12-11 14:46:26', '2014-12-11 16:21:15', '2014-12-11 20:11:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cw_user_level`
--

CREATE TABLE IF NOT EXISTS `cw_user_level` (
`id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `level_name` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cw_user_level`
--

INSERT INTO `cw_user_level` (`id`, `level_id`, `level_name`) VALUES
(1, 1, 'Super User'),
(2, 2, 'Admin'),
(3, 3, 'User'),
(4, 4, 'Publics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cw_about_us`
--
ALTER TABLE `cw_about_us`
 ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `cw_articles`
--
ALTER TABLE `cw_articles`
 ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `cw_category`
--
ALTER TABLE `cw_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_contact_us`
--
ALTER TABLE `cw_contact_us`
 ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `cw_image_logo`
--
ALTER TABLE `cw_image_logo`
 ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `cw_status`
--
ALTER TABLE `cw_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_users`
--
ALTER TABLE `cw_users`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cw_user_level`
--
ALTER TABLE `cw_user_level`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cw_about_us`
--
ALTER TABLE `cw_about_us`
MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cw_articles`
--
ALTER TABLE `cw_articles`
MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cw_category`
--
ALTER TABLE `cw_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cw_contact_us`
--
ALTER TABLE `cw_contact_us`
MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cw_image_logo`
--
ALTER TABLE `cw_image_logo`
MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cw_status`
--
ALTER TABLE `cw_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cw_users`
--
ALTER TABLE `cw_users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cw_user_level`
--
ALTER TABLE `cw_user_level`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
