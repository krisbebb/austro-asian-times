-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 23, 2018 at 04:15 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `news_db`
--
-- Dumping data for table `journalists`
--

INSERT INTO `journalists` (`id`, `login`, `firstname`, `lastname`, `privilege`, `hashed_password`, `salt`) VALUES
(1, 'kris', 'Bigg', 'Boss', 2, '80b03549f7879a84ebb04bd46fde4132a5bedac49d180c0cf0aee105e0846f0a', '5802A39F64CD7BE1'),
(2, 'kris2', 'John', 'Journo', 1, 'b6be06a139be0809f80ee8f18b974b79d56d9aef3f20b7e381c72a47686e4597', '69DB587F10AE324C');

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `headline`, `data`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'First Headline', 'This is the first headline for my online newspaper', 1, '2018-05-18 19:18:22', '2018-05-19 18:13:08'),
(3, 'Second Headline', 'testing add data', 2, '2018-05-20 17:56:43', '2018-05-20 17:56:43'),
(4, 'Headline3', 'Testing add data again', 2, '2018-05-20 17:57:13', '2018-05-20 17:57:13'),
(5, 'Another article to test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae odio neque. Nullam accumsan quam nibh, nec suscipit arcu molestie non. Sed at mi nec nisi varius mattis et eget elit. Pellentesque blandit est quis dui auctor, pulvinar lacinia ante aliquam. Aenean vehicula sapien vel varius eleifend. Phasellus accumsan, elit eu consectetur suscipit, massa tellus tincidunt arcu, sed pellentesque odio dui eget enim. Suspendisse accumsan ultrices iaculis. In non quam eu metus bibendum interdum. Vestibulum luctus tempor sollicitudin. Nulla dictum sodales eros, sit amet consectetur sapien finibus a. Donec eros massa, gravida eu lacus eget, maximus pretium libero.', 2, '2018-05-22 01:46:33', '2018-05-22 01:46:33');

--
