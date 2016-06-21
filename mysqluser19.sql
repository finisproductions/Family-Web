-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.achins.com
-- Generation Time: Jan 07, 2015 at 11:24 AM
-- Server version: 5.1.56
-- PHP Version: 5.4.20

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mysqluser19`
--

-- --------------------------------------------------------

--
-- Table structure for table `addressbook`
--

CREATE TABLE IF NOT EXISTS `addressbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_firstname` varchar(30) NOT NULL,
  `a_lastname` varchar(30) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_password` varchar(15) NOT NULL,
  `a_city` varchar(30) NOT NULL,
  `a_state` varchar(2) NOT NULL,
  `a_bio` text NOT NULL,
  `a_access` int(11) NOT NULL DEFAULT '0',
  `a_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `a_photo` varchar(255) DEFAULT NULL,
  `a_rss` varchar(255) DEFAULT NULL,
  `a_reset` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `addressbook`
--

INSERT INTO `addressbook` (`id`, `a_firstname`, `a_lastname`, `a_email`, `a_password`, `a_city`, `a_state`, `a_bio`, `a_access`, `a_createdate`, `a_photo`, `a_rss`, `a_reset`) VALUES
(1, 'John', 'Smith', 'john.smith@maricopa.edu', 'password1', 'Mesa', 'AZ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac ex tempor, vulputate neque quis, feugiat lacus. Quisque sed tincidunt orci. Donec ullamcorper rutrum commodo. Vivamus vehicula tellus eu maximus mattis. Nullam magna lorem, sollicitudin sit amet magna eget, scelerisque ultricies velit. Nullam ornare eros id diam porttitor ultrices. Quisque at pharetra dolor, at molestie metus. Aliquam erat volutpat. Duis ultrices neque nec velit tristique consequat. Mauris sodales mollis diam, id porta enim mollis id. Nulla eu neque et sapien molestie hendrerit in non ex. In ut magna ac odio aliquet venenatis. Fusce orci enim, vestibulum sed arcu vulputate, dictum ornare lectus.', 2, '2014-10-26 10:35:32', NULL, 'http://feeds.wnyc.org/radiolab', NULL),
(2, 'Jane', 'Doe', 'finisproductions@gmail.com', 'new', 'Scottsdale', 'AZ', 'Vivamus commodo eu quam cursus mattis. Etiam massa mauris, pellentesque ac dignissim eget, vulputate ut tortor. Sed lacinia ultricies mauris a vehicula. Etiam convallis sagittis justo a rhoncus. Nulla cursus mauris arcu, quis egestas enim rhoncus vitae. Nam placerat velit semper finibus mattis. Sed vel nulla semper, facilisis augue in, varius velit. Aliquam dui tortor, auctor vitae facilisis in, egestas at est. Integer id lectus a ante facilisis maximus vel non lectus.', 1, '2014-10-26 10:37:06', NULL, 'http://www.npr.org/rss/rss.php?id=1019', '681112257'),
(3, 'Bob', 'Apple', 'user1234@yahoo.com', 'password1', 'Los Angeles', 'CA', 'Phasellus ornare non nunc id malesuada. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur fermentum, tortor eu placerat ultricies, nisi felis commodo massa, eget commodo nisl ante et sapien. Maecenas vitae sagittis orci, quis consequat mauris. Integer fringilla nulla vel diam fringilla, ac vehicula nisi iaculis. Nulla ut lacinia dolor. Donec maximus sem id lacinia vulputate. Quisque dolor dolor, eleifend at eros et, elementum tincidunt quam. Proin vel nisl nec odio ultricies sollicitudin. Donec vitae feugiat risus. Phasellus vitae mauris egestas, fringilla enim a, lobortis ex. Duis a efficitur odio. In id tellus mauris. Integer lacus neque, bibendum a efficitur nec, porta cursus enim. Nullam pharetra arcu et risus bibendum fermentum et in nisl.', 4, '2014-10-26 10:37:06', 'm001_1416218153id_3.jpg', 'http://feeds.gawker.com/io9/full', NULL),
(4, 'George', 'Johnson', 'georgejohnson@continential.com', 'password1', 'Washington', 'DC', 'Aliquam tempor eleifend aliquet. In tempor arcu tortor, nec sodales ante tempus mollis. Duis auctor eu ex id molestie. Curabitur urna dui, pellentesque ornare accumsan vitae, auctor et erat. Aliquam erat volutpat. In hac habitasse platea dictumst. Quisque viverra arcu quis quam tristique dapibus id ac magna.', 2, '2014-10-26 10:39:27', '10Container_FINAL[1]_1418854330id_4.jpg', 'http://rss.cnn.com/rss/cnn_topstories.rss', NULL),
(5, 'Marty', 'Reyes-Mendoza', 'mrm@school.com', 'password1', 'Jackson Hole', 'WY', 'Aliquam imperdiet massa mollis convallis cursus. Aenean imperdiet sapien ut laoreet varius. Ut pretium quis orci at consequat. Nunc in efficitur libero. Vivamus nunc nibh, suscipit nec ultrices sit amet, congue hendrerit urna. Integer at ullamcorper libero, eget fermentum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 3, '2014-10-26 10:39:27', NULL, '', NULL),
(8, 'Cris', 'Romero', 'info@finisproductions.com', 'password', 'Phoenix', 'Az', 'Hello this is my bio Lorem Ipsum', 1, '2014-11-05 17:57:06', 'nuz_1416217989id_8.jpg', '', '39950430'),
(9, 'Murray', 'James', 'mjames@yahoo.com', 'pass', 'Yuma', 'AZ', '', 4, '2014-11-05 18:45:54', 'm002_1416218181id_9.jpg', '', NULL),
(12, 'Jane ', 'Thompson', 'info@jtexample.net', 'password1', 'Scottsdale', 'Az', 'Bio info', 2, '2014-11-17 03:34:06', '002_1416224069id_.jpg', '', NULL),
(13, 'Tablet', 'User', 'test@test.com', 'password', 'tempe', 'as', '', 2, '2014-11-17 05:03:11', 'image_1416229561id_13.jpg', '', NULL),
(14, 'Larry', 'Meatball', 'meat@ball.com', 'password', 'Phoenix', 'Az', 'I am a local housecat who loves to keep current with technological trends. ', 2, '2014-11-25 00:37:57', 'TheMeatball_1416904701id_.jpg', 'http://feeds.wired.com/wired/index', NULL),
(15, 'Rob', 'Loy', 'rob.loy@sccmail.maricopa.edu', 'password', 'Scottsdale', 'Az', '(602) 418-4041 ', 1, '2014-11-25 00:43:03', 'ROBAA00126_1416905007id_.jpg', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `familyweb`
--

CREATE TABLE IF NOT EXISTS `familyweb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_firstname` varchar(30) NOT NULL,
  `a_lastname` varchar(30) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_password` varchar(15) NOT NULL,
  `a_access` int(11) NOT NULL DEFAULT '1',
  `a_reset` varchar(128) NOT NULL,
  `a_active` int(1) NOT NULL DEFAULT '1',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `familyweb`
--

INSERT INTO `familyweb` (`id`, `a_firstname`, `a_lastname`, `a_email`, `a_password`, `a_access`, `a_reset`, `a_active`) VALUES
(1, 'Cris', 'Romero', 'finisproductions@gmail.com', 'password', 1, '', 1),
(2, 'John', 'Doe', 'jdoe@me.com', 'password', 2, '', 1),
(3, 'Jane', 'Doe', 'jdoe2@me.com', 'password', 2, '', 1),
(4, 'Larry', 'Meatball', 'meat@ball.com', 'password', 2, '', 1),
(5, 'User', '5', 'email@email.com', 'password', 2, '', 0),
(6, 'Rob', 'Loy', 'rob.loy@gmail.com', 'password', 1, '', 1),
(7, 'Dat', 'Luda', 'lmoreno214@gmail.com', 'password', 2, '', 1),
(8, 'John', 'Lot', 'rivurman@yahoo.com', 'password1', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `l_id` int(3) NOT NULL AUTO_INCREMENT,
  `l_user` varchar(35) NOT NULL,
  `l_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `l_location` varchar(65) NOT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`l_id`, `l_user`, `l_time`, `l_location`) VALUES
(25, 'Cris Romero', '2014-12-24 08:48:44', '71.223.249.85'),
(24, 'Rob Loy', '2014-12-23 18:31:51', '98.165.219.166'),
(23, 'Cris Romero', '2014-12-22 10:50:40', '71.223.249.85'),
(22, 'Larry Meatball', '2014-12-21 20:12:56', '63.142.161.17'),
(19, 'Dat Luda', '2014-12-21 17:19:11', '174.19.211.96'),
(21, 'Cris Romero', '2014-12-21 18:41:49', '24.56.38.249'),
(20, 'Cris Romero', '2014-12-21 17:34:42', '68.104.205.194');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_from` varchar(25) NOT NULL,
  `m_to` varchar(25) NOT NULL,
  `message` longtext NOT NULL,
  `m_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_status` varchar(1) NOT NULL DEFAULT '0',
  `m_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`m_id`, `m_from`, `m_to`, `message`, `m_time`, `m_status`, `m_active`) VALUES
(21, 'Admin User', '4', '123987987987', '2014-12-19 02:03:29', '0', 0),
(28, 'John Doe', '1', '1231456', '2014-12-20 16:49:57', '1', 0),
(20, 'Admin User', '3', 'BBBBBBBBBBBBBBBBBBBBBBBB', '2014-12-19 02:02:46', '0', 0),
(19, 'Admin User', '5', '123456', '2014-12-19 02:01:49', '0', 0),
(18, 'Admin User', '2', 'This is the add message page', '2014-12-19 02:01:25', '0', 0),
(17, 'John Doe', '2', 'BBBBBBBBBBBBBBBBBBBBBBBB', '2014-12-19 00:35:50', '0', 0),
(15, 'John Doe', '1', 'AAAAAAAAAAAAAAAAAA', '2014-12-19 00:34:00', '1', 0),
(16, 'Larry Meatball', '1', 'AAAAAAAAAAAAAAAA', '2014-12-19 00:34:53', '1', 0),
(13, 'Larry Meatball', '1', 'This is a message from user 4', '2014-12-19 00:29:55', '1', 0),
(22, 'John Doe', '2', 'This is going to be a long message. This is going to be a long message. This is going to be a long message. This is going to be a long message. This is going to be a long message. This is going to be a long message. This is going to be a long message. This is going to be a long message. This is going to be a long message. This is going to be a long message. This is going to be a long message. This is going to be a long message. This is going to be a long message. ', '2014-12-20 04:33:08', '0', 0),
(23, 'John Doe', '2', 'asdfasdfasdfasdf', '2014-12-20 13:17:05', '0', 0),
(24, 'John Doe', '1', 'asdf', '2014-12-20 13:17:21', '1', 0),
(25, 'Cris Romero', '2', 'This will be a long message. This will be a long message. This will be a long message. This will be a long message. This will be a long message. This will be a long message. This will be a long message. This will be a long message. ', '2014-12-20 13:49:58', '0', 0),
(26, 'Cris Romero', '1', 'This will be a long message. This will be a long message. This will be a long message. This will be a long message. This will be a long message. This will be a long message. This will be a long message. This will be a long message. ', '2014-12-20 13:50:08', '1', 0),
(27, 'John Doe', '2', 'BBBBBBBBBBBBBBBBBBBBBBBB', '2014-12-20 15:20:16', '0', 0),
(33, 'Cris Romero', '6', 'Hello Professor Loy, welcome to the FamilyWeb application 1.0. So far this is only the basic configuration of a private messaging and task listing network. As you can see, each user has a Home screen where they can view their own tasks and messages as well as assign new tasks and send new messages. If you are an admin then you will have a link to Manage the system. This will include the ability to add, edit and remove Users as well as Messages and Tasks. Per your recommendations the Delete function does not actually remove any of the items from the database, instead it merely turns their active status to No. When each user loads their messages and tasks the database only returns items which are active from the database. The security only allows access to the user page with a valid login and only allows admin level access if you are an admin. Initially the design of the Home screen should be a static page with content being shown or hidden using JavaScript links, however that functionality will have to wait until the next update. ', '2014-12-21 03:52:41', '0', 1),
(29, 'Larry Meatball', '2', '21654', '2014-12-20 16:52:09', '0', 0),
(30, 'Larry Meatball', '1', 'FINAL TEST\r\n', '2014-12-20 16:53:47', '1', 0),
(31, 'Cris Romero', '1', 'Final Test', '2014-12-20 16:56:44', '1', 0),
(32, 'Cris Romero', '1', 'Final Test', '2014-12-20 16:56:44', '0', 0),
(34, 'Cris Romero', '6', 'The site layout and design is simple but hopefully effective. It is responsive to a degree however to truly take advantage of this the next update will likely focus on removing all of the content from tables and using div tags instead to display tasks and messages. Text size and layout items should resize as well as tables now, just seems to be a little buggy and table styling is what gave me the most difficulty from the design perspective. ', '2014-12-21 04:01:03', '0', 1),
(35, 'Cris Romero', '6', 'Also I have created a simple login table which assists the admin by creating a timestamp and ip address record each time a user logs in. \r\n', '2014-12-21 04:34:59', '0', 1),
(36, 'Cris Romero', '6', 'One of the features that I struggled with and am proud to have accomplished is the dropdwon boxes when sending messages or tasks. To accomplish this I created userarray.php which independently connects to the database and pulls each user record, then assigns each to a new user array along with the option number and user number which is loaded into the select option in the form. \r\nPretty cool.\r\n', '2014-12-21 04:49:51', '0', 1),
(37, 'Cris Romero', '6', 'Final note, in order to make the messages more readable I loaded an independent font face to load inside tables, this separates the styled elements from database elements so they are more easily read.\r\n', '2014-12-21 04:50:53', '0', 1),
(38, 'Cris Romero', '7', 'Orale homes, here got the next million dollar app LOL\r\n', '2014-12-21 17:13:30', '1', 1),
(39, 'Dat Luda', '1', 'this working? This legit right herr', '2014-12-21 17:20:15', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_to` varchar(15) NOT NULL,
  `t_from` varchar(15) NOT NULL,
  `task` varchar(255) NOT NULL,
  `t_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `t_status` int(1) NOT NULL DEFAULT '0',
  `t_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`t_id`, `t_to`, `t_from`, `task`, `t_time`, `t_status`, `t_active`) VALUES
(15, '1', 'John Doe', 'array test', '2014-12-21 03:46:08', 1, 0),
(14, '3', 'John Doe', 'array test', '2014-12-21 03:46:07', 0, 0),
(13, '4', 'John Doe', 'array test', '2014-12-21 03:46:06', 0, 0),
(12, '2', 'John Doe', 'BBBBBBBBBBBBBBBBBBB', '2014-12-21 03:46:05', 0, 0),
(11, '2', 'John Doe', 'BBBBBBBBBBBBBBBBBBB', '2014-12-21 03:46:04', 0, 0),
(10, '4', 'Larry Meatball', 'AAAAAAAAAAAAAAAAAAAAAAAAAAA', '2014-12-20 16:08:40', 0, 0),
(8, '1', 'Larry Meatball', 'This is a task from user 4', '2014-12-21 03:46:04', 1, 0),
(16, '2', 'John Doe', '123654987987', '2014-12-21 03:46:09', 0, 0),
(17, '5', 'John Doe', 'array test', '2014-12-21 03:46:10', 0, 0),
(18, '3', 'Admin User', 'AAAAAAAAAAAAAAAAAAAAAAAAAAA', '2014-12-20 16:09:27', 0, 0),
(19, '4', 'Admin User', 'Task test', '2014-12-21 03:46:10', 0, 0),
(20, '5', 'Admin User', 'Task Print R', '2014-12-21 03:46:11', 0, 0),
(21, '1', 'Admin User', 'This is the assign task form', '2014-12-21 03:46:12', 1, 0),
(22, '2', 'John Doe', 'sdfasdfsdf', '2014-12-21 03:46:12', 0, 0),
(23, '2', 'John Doe', 'VVVVVVVVVVVVVVVVVVVVVV', '2014-12-21 03:46:13', 0, 0),
(24, '2', 'John Doe', '123456', '2014-12-21 03:46:14', 0, 0),
(25, '1', 'Larry Meatball', '123456456', '2014-12-21 03:46:15', 1, 0),
(26, '1', 'Cris Romero', 'Final Test', '2014-12-21 03:46:15', 0, 0),
(28, '6', 'Cris Romero', 'Task 1 - Login and check out the Home interface', '2014-12-21 03:46:52', 0, 1),
(27, '6', 'Rob Loy', 'Task 1 - Inspect the user interface', '2014-12-21 03:46:16', 0, 0),
(29, '6', 'Cris Romero', 'View your messages and Tasks, noting that you can clear them from your page by clicking either "Done" or "Read".', '2014-12-21 03:53:22', 0, 1),
(30, '6', 'Cris Romero', 'Check out the admin page by clicking on Manage above. ', '2014-12-21 03:53:59', 0, 1),
(31, '6', 'Cris Romero', 'Login as normal user to see that there are no admin privleges. ', '2014-12-21 04:01:29', 0, 1),
(32, '7', 'Cris Romero', 'Task 1 - Login and check out the Home interface', '2014-12-21 17:19:41', 1, 1),
(33, '1', 'Dat Luda', 'Get that monies from Brian fore he peace off', '2014-12-21 17:34:56', 1, 1),
(34, '7', 'Cris Romero', 'Been havin dat', '2014-12-22 10:50:58', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `access` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `firstname`, `lastname`, `email`, `access`) VALUES
(1, 'Cris', 'Romero', 'chr2130012@maricopa.edu', 'a'),
(2, 'John', 'Smith', 'j.smith@example.com', 'a'),
(3, 'James', 'Johnson', 'jj@example.com', 'a'),
(24, 'Jim', 'Bob', 'email@web.com', 'a'),
(20, 'Albert', 'Tuberoso', 'test@test.com', 'a');
