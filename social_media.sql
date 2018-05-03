-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 26, 2018 at 08:13 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) NOT NULL,
  `post_id` int(3) NOT NULL,
  `comment_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `comment_time` date NOT NULL,
  `comments` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `post_id`, `comment_title`, `comment_time`, `comments`) VALUES
(1, 20, 63, 'This is the title', '2018-04-16', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate reiciendis alias a doloribus neque. Voluptas ipsum doloremque ipsa voluptatum quo quasi, voluptatem explicabo ad, dicta officiis reiciendis.</p>'),
(17, 23, 63, 'sample', '2018-04-26', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate reiciendis alias a doloribus neque. Voluptas ipsum doloremque ipsa voluptatum quo quasi, voluptatem explicabo ad, dicta officiis reiciendis.</p>'),
(18, 23, 66, 'very nice', '2018-04-26', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate reiciendis alias a doloribus neque. Voluptas ipsum doloremque ipsa voluptatum quo quasi, voluptatem explicabo ad, dicta officiis reiciendis.</p>'),
(13, 20, 65, 'La discoteca', '2018-04-25', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate reiciendis alias a doloribus neque. Voluptas ipsum doloremque ipsa voluptatum quo quasi, voluptatem explicabo ad, dicta officiis reiciendis.</p>'),
(11, 20, 65, 'Nice Disco Bardfsg ', '2018-04-25', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate reiciendis alias a doloribus neque. Voluptas ipsum doloremque ipsa voluptatum quo quasi, voluptatem explicabo ad, dicta officiis reiciendis.</p>'),
(10, 20, 63, 'El mejor conferencia', '2018-04-25', '<p>nim<strong>i nihil possimus iusto officiis blanditiis quam distinctio corporis, commodi quod fugit maxime voluptatibus! Odio molestiae</strong> optio quam excepturi voluptates!&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(3) NOT NULL AUTO_INCREMENT,
  `post_user_id` int(3) NOT NULL,
  `post_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_comment` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_image` varchar(60) COLLATE utf8_bin NOT NULL,
  `post_image_location` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_user_id`, `post_title`, `post_comment`, `post_image`, `post_image_location`) VALUES
(52, 23, 'La calle en Madrid', '<p>Sint<strong> ducimus</strong> eius aliquam <strong>esse eos accusantium</strong> laborum unum sint <strong><em>gracs en du marche decit&nbsp;</em></strong>un unum sint</p>', '3.jpg', 'img_upload/3.jpg'),
(50, 23, 'La rue aux Berlin', '<p>Quaerat <em><strong>laudantium, minima, explicabo, dolorum neque illo id&nbsp;</strong></em><em>touts le jours amie porquia c\'est deliciouse suelement&nbsp;</em></p>', '2.jpg', 'img_upload/2.jpg'),
(61, 20, 'En francais bicicleta', '<p><strong><em>Doloribus incidunt saepe, dolores blanditiis</em></strong> possimus ea aspernatur quas ad error</p>', '9.jpg', 'img_upload/9.jpg'),
(63, 20, 'Le Conferencia 2018', '<p><em>int ducimus <strong>eius aliquam esse eos accusantium</strong> laborum distinctio dolorum itaque</em></p>', '10.jpg', 'img_upload/10.jpg'),
(65, 20, 'Ratsky Disco house', '<p>Patski This is the disco house in Ayala Center Cebu during 2000. Owned by patski and manski.</p>', '8.jpg', 'img_upload/8.jpg'),
(66, 23, 'La comida en Asia', '<p>El pollo es muy delicioso&nbsp;<strong>en la avenue en&nbsp;</strong>mactan. Todos los turistas son feliz en hay vacaciones porque los cosas son no caro.</p>', '5.jpg', 'img_upload/5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_password` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_image` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`) VALUES
(21, 'aim321', 'z@yahoo.com', '3d186804534370c3c817db0563f0e461', 'e.jpg'),
(20, 'aiman12', 'a@yahoo.com', '6a204bd89f3c8348afd5c77c717a097a', 'a.jpg'),
(22, 'aion12', 'y1@yahoo.com', '6a204bd89f3c8348afd5c77c717a097a', 'aiman.JPG'),
(23, 'aiman1', 'q@yahoo.com', '3d186804534370c3c817db0563f0e461', 'aiman.JPG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
