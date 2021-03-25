-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2021 at 05:00 PM
-- Server version: 5.7.33
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thubcoke_t-hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(15) NOT NULL,
  `post_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `user_id`, `comment`, `date`) VALUES
(49, 71, 21, 'Hi', '2019-12-30 04:02:11.000000'),
(52, 76, 23, 'T-hubðŸ’¥ðŸ’¥', '2019-12-30 17:51:37.000000'),
(53, 77, 23, 'Happy new year t-hub', '2020-01-02 23:30:32.000000');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(15) NOT NULL,
  `event_name` varchar(99) NOT NULL,
  `date_created` datetime(6) NOT NULL,
  `event_date` date NOT NULL,
  `kickoff` time(2) NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `regular_charges` int(10) NOT NULL,
  `vip_charges` int(10) NOT NULL,
  `vvip_charges` int(10) NOT NULL,
  `event_place` text NOT NULL,
  `user_id` int(15) NOT NULL,
  `banner` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `date_created`, `event_date`, `kickoff`, `event_location`, `regular_charges`, `vip_charges`, `vvip_charges`, `event_place`, `user_id`, `banner`) VALUES
(23, 'Launching T-hub', '2019-12-30 10:45:03.000000', '2020-12-15', '08:00:00.00', 'Kisii', 0, 0, 0, 'T-hub Office', 23, 'IMG_20191230_122503.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `follow_id` int(15) NOT NULL,
  `follower` int(15) NOT NULL,
  `following` int(15) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`follow_id`, `follower`, `following`, `date`) VALUES
(2, 6, 5, '2019-10-05 03:27:17.000000'),
(3, 13, 12, '2019-10-10 12:24:12.000000'),
(4, 13, 9, '2019-10-10 12:24:26.000000'),
(5, 10, 13, '2019-10-10 12:32:12.000000'),
(6, 14, 12, '2019-10-10 13:04:38.000000'),
(10, 5, 13, '2019-10-27 05:59:24.000000'),
(13, 16, 9, '2019-11-01 02:06:00.000000'),
(14, 16, 5, '2019-11-01 02:06:45.000000'),
(20, 16, 13, '2019-11-01 02:36:44.000000'),
(23, 6, 13, '2019-11-01 03:23:55.000000'),
(26, 6, 16, '2019-11-07 10:29:55.000000'),
(27, 6, 9, '2019-12-21 02:00:05.000000');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(15) NOT NULL,
  `user_to` int(15) NOT NULL,
  `user_from` int(15) NOT NULL,
  `message` text NOT NULL,
  `msg_seen` text NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `user_to`, `user_from`, `message`, `msg_seen`, `date`) VALUES
(114, 21, 22, 'Hi', 'yes', '2019-12-29 20:24:41.000000'),
(115, 22, 21, 'How are you', 'yes', '2019-12-30 08:26:51.000000'),
(116, 22, 23, 'Hi flekstech, welcome to t-hub and enjoy every bit of staying on our site.Please send your reviews and any question or concern.', 'yes', '2019-12-30 10:53:37.000000'),
(117, 21, 23, 'Hi fleks254, welcome to t-hub..share your talent with the whole world and watch it grow', 'yes', '2019-12-30 10:56:27.000000'),
(118, 22, 21, 'Am fine thank you', 'yes', '2019-12-30 13:23:03.000000'),
(119, 23, 21, 'Thank you', 'yes', '2019-12-30 13:26:11.000000'),
(120, 22, 21, 'Hi', 'yes', '2019-12-30 13:27:13.000000'),
(121, 22, 21, 'Helllo', 'yes', '2019-12-30 13:27:20.000000'),
(122, 22, 21, 'Hi', 'yes', '2019-12-30 13:27:29.000000'),
(123, 21, 22, ' Hoello am fine', 'yes', '2019-12-30 13:28:58.000000'),
(124, 21, 22, 'Am doing good', 'yes', '2019-12-30 13:29:44.000000'),
(125, 22, 21, 'Am goo', 'yes', '2019-12-30 13:35:47.000000'),
(126, 22, 21, 'Okay', 'yes', '2019-12-30 13:37:30.000000'),
(127, 21, 22, 'Hi', 'yes', '2019-12-30 15:37:23.000000'),
(128, 22, 21, 'hi too', 'yes', '2019-12-30 15:37:53.000000'),
(129, 21, 24, 'Oyah', 'yes', '2019-12-30 15:47:33.000000'),
(130, 24, 21, 'sema', 'no', '2019-12-30 15:47:47.000000'),
(131, 21, 24, 'Jinga', 'yes', '2019-12-30 15:47:49.000000'),
(132, 25, 21, 'Hi bobby', 'no', '2019-12-30 17:52:19.000000'),
(133, 26, 23, 'Hi Elishaouma,welcome to t-hub', 'no', '2019-12-30 18:44:06.000000'),
(134, 26, 23, 'Lets build a better world for the talented individuals', 'no', '2019-12-30 18:44:58.000000'),
(135, 24, 21, 'Enter your message here.jjj', 'no', '2019-12-31 13:25:01.000000'),
(136, 28, 23, 'Hi Shakiez welcome to t-hub', 'no', '2020-01-01 08:56:17.000000'),
(137, 29, 23, 'Hi violet, welcome to t-hub and enjoy staying here', 'no', '2020-01-01 13:23:45.000000'),
(138, 30, 23, 'Hi Prince, welcome to t-hub..enjoy staying here', 'no', '2020-01-01 16:24:10.000000'),
(139, 30, 21, 'hi', 'no', '2020-01-01 17:12:46.000000'),
(140, 25, 21, 'hi', 'no', '2020-01-05 06:55:41.000000');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `not_id` int(15) NOT NULL,
  `not_from` int(15) NOT NULL,
  `not_to` int(15) NOT NULL,
  `notification` varchar(99) NOT NULL,
  `not_seen` int(99) NOT NULL DEFAULT '0',
  `not_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`not_id`, `not_from`, `not_to`, `notification`, `not_seen`, `not_date`) VALUES
(75, 23, 0, 'event', 1, '2019-12-30 10:45:03.000000'),
(76, 21, 23, '5', 1, '2019-12-30 11:02:22.000000'),
(77, 21, 23, '5', 1, '2019-12-30 14:42:13.000000'),
(78, 23, 21, '5', 1, '2019-12-30 18:49:04.000000'),
(79, 22, 23, '5', 1, '2020-01-01 11:31:15.000000');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `post_content` text NOT NULL,
  `upload_image` varchar(99) NOT NULL,
  `video` varchar(99) NOT NULL,
  `post_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `post_content`, `upload_image`, `video`, `post_date`) VALUES
(70, 21, 'Wine party', 'images (19).jpeg.08b00ba03eec515dc90550c4a90c68f19cc63de8.619427', '', '2019-12-29 19:05:28.000000'),
(72, 21, 'No', '', 'VID-20191216-WA0010.mp4.6efdb76fdca904b498d798396afa2fce14d6bba3.3135281', '2019-12-29 19:56:49.000000'),
(73, 23, 'Our logo', 'IMG_20191230_122835.jpg.e2777cbe8c7be622e5823d18e4b27d8b29dc78fb.9069286', '', '2019-12-30 09:37:59.000000'),
(74, 23, 'T-shirt brand', 'IMG_20191230_122715.jpg.0736d364fd1f3e27cfac573ba81102768021adf7.3786587', '', '2019-12-30 09:39:05.000000'),
(75, 23, 'No', 'IMG_20191230_122655.jpg.04713810e9e957bef50aee20ee67397bfd8b71e7.4084312', '', '2019-12-30 09:39:33.000000'),
(76, 23, 'Business card', 'IMG_20191230_122540.jpg.b38272e0c23e8115918850c2b30b0b7f5666f3b1.8638127', '', '2019-12-30 09:40:30.000000'),
(77, 23, 'Happy new year from t-hub familyâš¡âš¡âš¡âš¡âš¡âš¡', 'IMG-20200101-WA0002.jpg.8a471da90e9a0456ba55449bb0933cf5229b155e.1509094', '', '2020-01-01 06:12:52.000000');

-- --------------------------------------------------------

--
-- Table structure for table `post_votes`
--

CREATE TABLE `post_votes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_votes`
--

INSERT INTO `post_votes` (`id`, `post_id`, `user_id`, `vote`) VALUES
(896, 76, 21, 'like'),
(897, 75, 21, 'like'),
(898, 74, 21, 'like'),
(899, 73, 21, 'like'),
(900, 72, 21, 'like'),
(901, 71, 21, 'like'),
(903, 76, 23, 'like'),
(904, 75, 23, 'like'),
(905, 74, 23, 'like'),
(906, 73, 23, 'like'),
(918, 71, 23, 'like'),
(925, 70, 23, 'like'),
(926, 72, 23, 'dislike'),
(929, 77, 23, 'like'),
(930, 77, 28, 'like'),
(931, 76, 28, 'like'),
(932, 76, 28, 'like'),
(933, 75, 28, 'like'),
(934, 75, 28, 'like'),
(936, 74, 28, 'like'),
(937, 73, 28, 'like'),
(938, 71, 28, 'like'),
(939, 70, 28, 'like'),
(940, 77, 22, 'like'),
(941, 76, 22, 'like'),
(942, 75, 22, 'like'),
(943, 74, 22, 'like'),
(944, 73, 22, 'like'),
(945, 72, 22, 'dislike'),
(946, 71, 22, 'like'),
(947, 70, 22, 'like'),
(948, 74, 29, 'like'),
(949, 74, 29, 'like'),
(950, 71, 29, 'like'),
(951, 71, 29, 'like'),
(952, 73, 29, 'like'),
(953, 73, 29, 'like'),
(954, 71, 30, 'like'),
(955, 71, 30, 'like'),
(965, 74, 0, 'like'),
(968, 75, 0, 'like'),
(973, 73, 0, 'like'),
(975, 72, 0, 'dislike'),
(991, 76, 0, 'like'),
(994, 70, 0, 'like'),
(997, 77, 0, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rate_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `artist_id` int(15) NOT NULL,
  `rating` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rate_id`, `user_id`, `artist_id`, `rating`) VALUES
(10, 22, 21, 5),
(11, 21, 23, 5),
(12, 23, 21, 5),
(13, 22, 23, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Reaction`
--

CREATE TABLE `Reaction` (
  `reaction_id` int(15) NOT NULL,
  `post_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `reactor_id` int(15) NOT NULL,
  `reaction` text NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(15) NOT NULL,
  `comment_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `reply_msg` varchar(99) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trial`
--

CREATE TABLE `trial` (
  `id` int(99) NOT NULL,
  `sms` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trial`
--

INSERT INTO `trial` (`id`, `sms`) VALUES
(1, 'a'),
(2, 'a'),
(3, 'a'),
(4, 'a'),
(5, 'a'),
(6, 'a'),
(7, 'a'),
(8, 'a'),
(9, 'a'),
(10, 'a'),
(11, 'a'),
(12, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(15) NOT NULL,
  `firstname` text,
  `lastname` text,
  `phonenumber` int(15) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `account_type` text,
  `sex` text,
  `join_date` datetime(6) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `hometown` text,
  `current_location` text,
  `profile_pic` varchar(99) DEFAULT NULL,
  `school` text,
  `about` text,
  `website` varchar(20) DEFAULT NULL,
  `art` text,
  `extra_art` text,
  `password` varchar(255) DEFAULT NULL,
  `state` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `phonenumber`, `username`, `email`, `account_type`, `sex`, `join_date`, `birthday`, `hometown`, `current_location`, `profile_pic`, `school`, `about`, `website`, `art`, `extra_art`, `password`, `state`) VALUES
(21, 'felix', 'Omondi', 719780583, 'Fleks254 ', 'Flekstech@gmail.com', 'Artist', 'Female', '2019-12-29 18:39:38.000000', '1999-04-18', 'Homabay', 'Kisii', '1577683838.png', 'Kisii', 'Talented man', '', 'Music', 'Mc', '785feb09e338b63ebdfee91ad8aa70fc', ''),
(22, 'Felix', 'Omondi', 719780583, 'Flekstech', 'felvha3387@gmail.com', 'Normal', 'Male', '2019-12-29 20:21:12.000000', '1999-04-18', 'Homabay', 'Kisii', '1577899676.png', NULL, NULL, NULL, NULL, NULL, '25d55ad283aa400af464c76d713c07ad', ''),
(23, 'Talent', 'Hub', 719780583, 'T-Hub', 'Flekstech@gmail.com', 'Artist', 'Male', '2019-12-30 08:31:49.000000', '2019-01-05', 'Nairobi', 'Nairobi', '1577936316.png', 'Kisii University', 'Lets build the future for the talented', 'http://t-hubb.com', 'Music', 'Mc', '1f50315076869084830146b95d670143', ''),
(24, 'Samuel', 'Kimani', 797852135, '@@@captainkim', 'samuelkimwilson@gmail.com', 'Normal', 'Male', '2019-12-30 15:46:28.000000', '1996-08-09', 'Nakuru', 'Kisii', 'default.png', NULL, NULL, NULL, NULL, NULL, 'fe389fe2f8536c70a794320f35fe5ab0', ''),
(25, 'Bob', 'Kibiwott', 720602923, 'Bobby254', 'bobbychukyz@gmail.com', 'Normal', 'Male', '2019-12-30 17:38:24.000000', '1998-08-04', 'Eldoret', 'Kisii', 'default.png', NULL, NULL, NULL, NULL, NULL, 'e27968fe7ac7310349f3f7b0ad98e022', ''),
(26, 'Elisha', 'Chiaga', 710739512, 'Elishaouma', 'oumae9731@gmail.com', 'Normal', 'Male', '2019-12-30 18:37:40.000000', '2000-08-10', 'Homabay', 'Chuka', 'default.png', NULL, NULL, NULL, NULL, NULL, 'e4c97b20771f15ea5ea479067f7357f7', ''),
(27, 'Sila', 'Mugadia', 723299521, 'Mugadia', 'xilomuga@gmail.com', 'Normal', 'Male', '2019-12-30 19:20:51.000000', '1996-04-19', 'Eldama Ravine', 'Eldama Ravine', 'default.png', NULL, NULL, NULL, NULL, NULL, '09920c6d17c4c98c8dc896f929a081fa', ''),
(28, 'Sharon', 'Marembo', 748494250, 'Shakiez', 'marembosharon02@gmail.com', 'Normal', 'Female', '2020-01-01 07:41:36.000000', '1998-12-16', 'Homabay', 'Homabay', 'default.png', NULL, NULL, NULL, NULL, NULL, 'ccd7cbf9cdeefab809d7383e3d4e02d2', ''),
(29, 'Violet', 'Otieno', 705029520, 'Violet Adhiambo', 'adhiamboviolet9@gmail.com', 'Normal', 'Female', '2020-01-01 12:35:53.000000', '2020-05-08', 'Kisumu', 'Kisumu', 'default.png', NULL, NULL, NULL, NULL, NULL, '162596d81cc9161694bc54fba3980599', ''),
(30, 'Emmanuel', 'Ronoh', 716431786, 'Prince raj', 'mac59115@gmail.com', 'Normal', 'Male', '2020-01-01 14:36:53.000000', '1999-12-25', 'Bomet', 'Kisii', '1577898575.png', NULL, NULL, NULL, NULL, NULL, '81119fc9baf58253f9fc80895a31d835', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_votes`
--
ALTER TABLE `post_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `Reaction`
--
ALTER TABLE `Reaction`
  ADD PRIMARY KEY (`reaction_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `trial`
--
ALTER TABLE `trial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `follow_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `not_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `post_votes`
--
ALTER TABLE `post_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=998;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rate_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Reaction`
--
ALTER TABLE `Reaction`
  MODIFY `reaction_id` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
