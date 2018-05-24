-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 24, 2018 at 09:44 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `news_db`
--
CREATE DATABASE IF NOT EXISTS `news_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `news_db`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `headline` varchar(70) NOT NULL,
  `data` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `headline`, `data`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'First Headline', 'This is the first headline for my online newspaper', 1, '2018-05-18 19:18:22', '2018-05-19 18:13:08'),
(3, 'Second Headline', 'testing add data', 2, '2018-05-20 17:56:43', '2018-05-20 17:56:43'),
(4, 'Headline3', 'Testing add data again', 2, '2018-05-20 17:57:13', '2018-05-20 17:57:13'),
(5, 'Another article to test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae odio neque. Nullam accumsan quam nibh, nec suscipit arcu molestie non. Sed at mi nec nisi varius mattis et eget elit. Pellentesque blandit est quis dui auctor, pulvinar lacinia ante aliquam. Aenean vehicula sapien vel varius eleifend. Phasellus accumsan, elit eu consectetur suscipit, massa tellus tincidunt arcu, sed pellentesque odio dui eget enim. Suspendisse accumsan ultrices iaculis. In non quam eu metus bibendum interdum. Vestibulum luctus tempor sollicitudin. Nulla dictum sodales eros, sit amet consectetur sapien finibus a. Donec eros massa, gravida eu lacus eget, maximus pretium libero.', 2, '2018-05-22 01:46:33', '2018-05-22 01:46:33'),
(6, 'New article', 'Mauris ac velit dignissim, facilisis metus id, auctor nunc. Suspendisse potenti. Duis convallis, urna id maximus ullamcorper, ex neque rutrum est, egestas egestas elit ipsum sed quam. Vestibulum tincidunt aliquet molestie. Cras id vulputate ante. Vivamus in nisi lacus. Donec porta suscipit ipsum, sed hendrerit nisi vulputate et. Sed non faucibus purus. Sed vitae ipsum sit amet orci ullamcorper condimentum. Donec fermentum lorem sit amet enim tristique laoreet. Aenean venenatis neque ligula, et blandit nisi congue at. In hendrerit neque diam, eu finibus sapien blandit in. Curabitur iaculis pulvinar porta. Aliquam molestie nulla in consectetur ultricies. Aliquam convallis ornare elit ut rhoncus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 1, '2018-05-24 04:09:00', '2018-05-24 04:09:00'),
(7, 'headline 6', 'Sed ultricies fringilla purus in bibendum. Vestibulum ut porta erat. Nam iaculis cursus ex, quis pretium arcu pulvinar in. Morbi cursus, elit et mattis vulputate, nisl ligula viverra urna, et aliquet lorem magna vel nisi. Quisque eget odio viverra, tristique libero sit amet, suscipit ante. Ut pretium bibendum dapibus. Maecenas tristique, elit a pellentesque imperdiet, dolor eros tincidunt augue, quis eleifend ipsum ligula in est. Aliquam eget nisl faucibus, porttitor ligula ut, laoreet ligula. Donec et molestie ipsum. Duis ac nisi nisl. Nulla facilisi. Quisque ut condimentum tortor, at suscipit odio. Curabitur quis ornare ex, ac aliquam tellus. Pellentesque eleifend nisl ac lorem mattis, in maximus magna rutrum. Sed consectetur lorem ultrices, volutpat ante et, facilisis lacus. Sed dapibus pharetra erat, nec dictum odio pretium vitae.', 1, '2018-05-24 04:43:13', '2018-05-24 04:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `article_tags`
--

DROP TABLE IF EXISTS `article_tags`;
CREATE TABLE `article_tags` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_tags`
--

INSERT INTO `article_tags` (`article_id`, `tag_id`) VALUES
(1, 1),
(4, 1),
(6, 1),
(3, 2),
(5, 2),
(5, 3),
(4, 4),
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `journalists`
--

DROP TABLE IF EXISTS `journalists`;
CREATE TABLE `journalists` (
  `id` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `privilege` int(11) NOT NULL,
  `hashed_password` char(64) NOT NULL,
  `salt` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `journalists`
--

INSERT INTO `journalists` (`id`, `login`, `firstname`, `lastname`, `privilege`, `hashed_password`, `salt`) VALUES
(1, 'kris', 'Bigg', 'Boss', 2, '80b03549f7879a84ebb04bd46fde4132a5bedac49d180c0cf0aee105e0846f0a', '5802A39F64CD7BE1'),
(2, 'kris2', 'John', 'Journo', 1, 'b6be06a139be0809f80ee8f18b974b79d56d9aef3f20b7e381c72a47686e4597', '69DB587F10AE324C');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_text` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_text`) VALUES
(1, 'Australia'),
(2, 'World'),
(3, 'Technology'),
(4, 'Sport');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `created_by_fk1` (`created_by`);

--
-- Indexes for table `article_tags`
--
ALTER TABLE `article_tags`
  ADD PRIMARY KEY (`article_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`) USING BTREE;

--
-- Indexes for table `journalists`
--
ALTER TABLE `journalists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `journalists`
--
ALTER TABLE `journalists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `created_by_fk1` FOREIGN KEY (`created_by`) REFERENCES `journalists` (`id`);

--
-- Constraints for table `article_tags`
--
ALTER TABLE `article_tags`
  ADD CONSTRAINT `article_tags_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE;
