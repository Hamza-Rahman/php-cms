-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 08:36 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`cat_id`, `cat_title`) VALUES
(10, 'PHP'),
(11, 'JAVA'),
(13, 'C#'),
(14, 'Jquery'),
(19, 'Ruby'),
(20, ' python');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_status`, `comment_date`, `comment_content`) VALUES
(24, 3, 'hamza', 'hamza@hotmail.com', 'Unapprove', '2016-10-25', 'hi lllll'),
(25, 3, 'walid', 'walid294@hotmail.com', 'unapprove', '2016-10-25', 'jkajkaj'),
(26, 12, 'nabul', 'na@gmail.com', 'unapprove', '2016-10-25', 'hahakjhjs');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_catagory_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_catagory_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(16, 10, 'Javascript Tutorial', 'hamza rahman', '2016-10-24', '11866482_1614802432116703_1564499077254486755_n.jpg', '<h3 style="text-align: left;"><em><strong>hi this is nice one</strong></em></h3>', 'hamza rahman , javascript', '', 'published', 6),
(17, 10, 'Javascript', 'Nabil', '2016-10-24', '12421838_608328362654686_954441194_n.jpg', 'this is from nabil', 'nabil, jquery', '', 'published', 0),
(18, 11, 'JQuery', 'Nabil', '2016-10-24', '0000143_cold-cream.png', '<p>sdffsd</p>', 'nabil, jquery', '', 'published', 1),
(19, 10, 'Javascript Tutorial', 'hamza rahman', '2016-10-24', '11866482_1614802432116703_1564499077254486755_n.jpg', '<h3 style="text-align: left;"><em><strong>hi this is nice one</strong></em></h3>', 'hamza rahman , javascript', '', 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$somebodytryroaddme2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(21, 'Hamza', '$1$kX3.dt0.$cRugxg7ATxS0..rZMA38N0', 'Hamza', 'rahman', 'Hamza69@gmail.com', '', 'subscriber', '$2y$10$somebodytryroaddme2');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`id`, `session`, `user_time`) VALUES
(1, 'pko7uhl9n1tt99fsar0163jdl6', 1477334818),
(2, 'r0pq8el4inj0t8dsajqbenbvd6', 1477334455),
(3, 'e3olqlglolctd24d3nsdg8de74', 1477382227),
(4, '07ak6b4tc8320j93br7m0dmoo3', 1477419554),
(5, 'f0kperkmucbpemu4no89odb6v0', 1477465274),
(6, 'hrclbhnpr5r2kaeomffbvgope0', 1477469988),
(7, '7uvpirgr0k6pnl9ga2h8e8ngj1', 1477472389),
(8, 'opd7sqbpa67rk0ijp9gieepvn7', 1477476061),
(9, 'fp4soet0vn7b015sem3ulcjju3', 1477504237),
(10, 's8ijnpdghguhunb1n6b7sltal2', 1477549711),
(11, '19cqh919eorthdr22s0gfgml56', 1477554804),
(12, 'onv259gr8csg4kin8og1lkkqa7', 1477713107),
(13, 'oibftqo7uvgle9iga481ql93k2', 1477713814),
(14, 'c0irb4kir3njtoqd27e1uj6sr0', 1477718142),
(15, 'ms7rc5ka35th5au6gm0aoeind2', 1477730111),
(16, 'qfsit951k34iavse9fu12pkgt1', 1477736511),
(17, 'vli2s98bgejsq85b5f5p3nir14', 1479724821),
(18, '0uf1q9h00oo33jjptm23rgc3l0', 1481608162),
(19, '32kajkn5tlckj1jsd37935jm81', 1481615742),
(20, '64k2cv5ap7rlam78bp5q9kpva3', 1487486951),
(21, 'ij5da6l6e34kiv82f3kucee3b2', 1493723892);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_online`
--
ALTER TABLE `user_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
