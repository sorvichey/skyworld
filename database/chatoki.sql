-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2019 at 04:22 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatoki`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `google_map` text,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `featured_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `address`, `phone`, `google_map`, `active`, `featured_image`) VALUES
(1, 'CHATOKI Midtown', 'The second floor of the indoor pedestrian street of wanda plaza, financial street, fuzhou city, fujian province', '096 2555 209', NULL, 1, 'fronts/shops//G7mzkvtp4VT9RcTucSW1nbbIi1Rz3HE9VtGN7pso.jpeg'),
(2, 'CHATOKI AEON I', 'The second floor of the indoor pedestrian street of wanda plaza, financial street, fuzhou city, fujian province', '010 37 36 51', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.9840201323204!2d104.87731481533037!3d11.55300309179746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951e4f86f4d9d%3A0x87d02c15d9bd3bcd!2sCHATOKI+Caf%C3%A9!5e0!3m2!1sen!2skh!4v1559163213684!5m2!1sen!2skh', 1, 'fronts/shops//DOUcL8wAj4q8ULcubbvQOmLCtC45XAMrJxTyP4Cq.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `location_slides`
--

CREATE TABLE `location_slides` (
  `id` int(11) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `location_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location_slides`
--

INSERT INTO `location_slides` (`id`, `photo`, `active`, `location_id`, `order`) VALUES
(1, 'fronts/slides//p1ooAzl4hbm453o4elL06Pc8zvS006j7gC800zzH.png', 0, 3, NULL),
(2, 'fronts/slides//b59Kd47YszawcJwwg0Le4BkSIQnW3wz9d7BiewKl.png', 0, 3, NULL),
(3, 'fronts/slides//pJHfRbGpQwEv0vyWY1KdQjRDXQ3kR6k6H8ZXV25V.png', 0, 3, NULL),
(4, 'fronts/slides//SXKTNPXnfwN1EZl0LD4BKI1tODp2n8ZXyh4ucQLp.png', 0, 3, 1),
(5, 'fronts/slides//buWCzFGJIEqTbwnYzFh2k7SOznaqLhigJaygHdHL.png', 0, 3, 44),
(6, 'fronts/slides//PQzVwfc5zh9x1YOrXZpQRSw7R1EaJLljV55WVoq6.png', 0, 3, 22),
(7, 'fronts/slides//AYYi5RuWcYcJBfC8oRyC8oWB6zODhmQZ0CwDITyw.png', 0, 1, 22),
(8, 'fronts/slides//IjuvJOFUopcXsAbCKEVEc2YRf0bt8NcRLb4w7cns.png', 0, 3, 1),
(9, 'fronts/slides//QnPnpoRIzTUSX4CNWGbFyWFzdjzwjkmxHik8uaI6.jpeg', 1, 3, 2),
(10, 'fronts/slides//9fLaEf705FsJSXqrDvR3aF4QF2rweFpi3Nl8GMvo.jpeg', 1, 3, 1),
(11, 'fronts/slides//Hbf4yfCuLd20Cvfei5UrPu0XidGUBqsgLy7lqzI4.jpeg', 1, 1, 1),
(12, 'fronts/slides//GAwR3uNxqYQMI8bcVfTuRZqqIBCl9FpWxEGXHQnf.jpeg', 1, 1, 2),
(13, 'fronts/slides//i0DFuiq6q5NxT50RJBoWg4RthgWgNDdG7Y0nRvIl.jpeg', 1, 2, 1),
(14, 'fronts/slides//hdGiSEfIkVxNcEHGd7a1EESXdPfkZsDQBCQosxKI.jpeg', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` longtext,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `background` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `active`, `background`) VALUES
(1, 'About Us', '<h2> </h2>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 1, 'uploads/pages//xF10a0eUSi6tShxQqU1937KQvvNJUezCfKZngQd4.jpeg'),
(2, 'Contact Us', '<p> </p>\r\n\r\n<h1 style=\"text-align:center\"><strong>A CHATOKI&nbsp;for Your Thoughts</strong></h1>\r\n\r\n<p style=\"text-align:center\">Give us feedback on your recent restaurant experience and get rewarded. Don\'t forget to have your receipt handy to complete the survey.</p>\r\n\r\n<p style=\"text-align:center\"><strong>TEXT OR CALL US:</strong></p>\r\n\r\n<h1 style=\"text-align:center\"><strong>099 2555 209</strong></h1>\r\n\r\n<p style=\"text-align:center\">Well it looks like you scored our number. Feel free to give us a text or a call with any questions, comments or concerns. We\'re here for ya!</p>', 1, 'uploads/pages//HW5gcOD5dNBKWS5eX8wQQx7MFsyMWs73mILV2fOW.jpeg'),
(3, 'CHATOKI Drink', NULL, 1, 'uploads/pages//VbNRPP2xKFGtJOp5EYLyYLqCpsmHlj3ZTGLNduwY.jpeg'),
(4, 'CHATOKI Shop', NULL, 1, 'uploads/pages//SML2zlx9jclQpArwO9OUUsDfguVgDIn3UxPHCqUV.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `alias` varchar(120) DEFAULT NULL,
  `list` tinyint(4) NOT NULL DEFAULT '0',
  `insert` tinyint(4) NOT NULL DEFAULT '0',
  `update` tinyint(4) NOT NULL DEFAULT '0',
  `delete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `alias`, `list`, `insert`, `update`, `delete`) VALUES
(1, 'User', 'អ្នកប្រើប្រាស់', 0, 0, 0, 0),
(2, 'Role', 'តួនាទី', 0, 0, 0, 0),
(3, 'Customer', 'អ្នកជំងឺ', 0, 0, 0, 0),
(4, 'Treatment', 'ការព្យាបាល', 0, 0, 0, 0),
(5, 'Slide', 'ស្លាយរូបភាព', 0, 0, 0, 0),
(6, 'Social', 'បណ្តាញសង្គម', 0, 0, 0, 0),
(7, 'Menu', 'មីុនុយ', 0, 0, 0, 0),
(8, 'Expense', 'ចំណាយ', 0, 0, 0, 0),
(9, 'Report', 'របាយការណ៍', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(220) NOT NULL,
  `description` longtext,
  `featured_image` varchar(200) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `featured_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `status`, `active`, `featured_image`) VALUES
(1, 'Cafe New1', 2.31, 'New', 0, 'uploads/products//cwu6YRyo7xoLBbLUBG2Gxrj41ZCASZLR4QsTW6Qk.png'),
(2, 'Brown Sugar', 2.3, NULL, 1, 'uploads/products//3tuBp1bylAB37hTN1uqbPVAJti8MmJU7qqIjmymI.jpeg'),
(3, 'Gen Maicha', 2.6, NULL, 1, 'uploads/products//ERnIw16zkcP9Adyl5z6f2vLldrtz41Zy9bhSWRq9.jpeg'),
(4, 'Apple Maccha', 2.9, NULL, 1, 'uploads/products//AphdMyqB1u6jVVBdRDKk9Rns0KP8RqPA47CBbbEa.jpeg'),
(5, 'Hojicha Almond', 2.3, NULL, 1, 'uploads/products//84N26ty2ttaljMiaffCkCmZMDy3xT9bYtA0qWEqM.jpeg'),
(6, 'Chacoal Latte', 2.7, NULL, 1, 'uploads/products//qf33nHQkB0j0df4NQK7KdL00uWyCYO1a0Kvu4G72.jpeg'),
(7, 'Kuromitsu', 3.3, NULL, 1, 'uploads/products//NYj3ADz6255dJS5CfadQyiPfW9TypGekPUgB8pJe.jpeg'),
(8, 'Maccha Almond', 2.1, NULL, 1, 'uploads/products//9gWLkXNKUMiCuI6w4QiVt7kH43wWsjhzVwOUPuHy.jpeg'),
(9, 'Maccha Soy Milk', 3.5, NULL, 1, 'uploads/products//U4YHzm0xXaGPLAFJWpkZ65gM6Ezyk7agizaVIDHt.jpeg'),
(10, 'Oolong Milk', 1.6, 'New', 1, 'uploads/products//vJlqDGgf8dBpSYxl6xCtYmpZUZFMYfxdYCYNZKaf.jpeg'),
(11, 'Maccha Fusion', 2.2, 'New', 1, 'uploads/products//s8jj9xlb1Xr33MceZQxFT34jtpPQdKaqJVpBoi12.jpeg'),
(12, 'Sweet Potato', 2.6, 'New', 1, 'uploads/products//IYALS3SdlVZLUYDNS4zaDx3gytkUitrqwXtwP5Ei.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `active`) VALUES
(1, 'Administrator', 1),
(5, 'Manager', 1),
(10, 'Test', 0),
(11, 'Test2', 0),
(12, 'Test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `list` int(11) NOT NULL DEFAULT '0',
  `insert` int(11) NOT NULL DEFAULT '0',
  `update` int(11) NOT NULL DEFAULT '0',
  `delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `list`, `insert`, `update`, `delete`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1),
(5, 1, 5, 1, 1, 1, 1),
(6, 1, 6, 1, 1, 1, 1),
(7, 1, 7, 1, 1, 1, 1),
(8, 1, 8, 1, 1, 1, 1),
(9, 1, 9, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` tinyint(4) NOT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `active` tinyint(4) DEFAULT '1',
  `title` varchar(200) DEFAULT NULL,
  `short_description` text,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `photo`, `order`, `active`, `title`, `short_description`, `price`) VALUES
(1, 'fronts/slides//A4caQg0OofHAJAHsGlIwjtI7mPfHgZyCe8S9pBCq.jpeg', 2, 0, NULL, NULL, NULL),
(2, 'fronts/slides//QEvrq3ZF6LnSB6knco6nR7OKkrDHFrHw3OkXaapk.jpeg', 1, 0, 'title', 'titite', NULL),
(3, 'fronts/slides//b6tnG1VUBhJDxl0NF0J4Uzr4V4ow8QDy5ro0IHoL.jpeg', 1, 1, 'MACHHA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', NULL),
(4, 'fronts/slides//wYy08nrvGKxZqqngWVeJ6i1WQr4dkkSFAmzHJr6v.jpeg', 0, 1, 'Sweet Potato', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 2.9);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` tinyint(4) NOT NULL,
  `url` varchar(120) DEFAULT NULL,
  `icon` varchar(60) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `url`, `icon`, `order`, `active`) VALUES
(1, '#', 'tw.png', 2, 0),
(2, 'https://www.facebook.com/ecc007', 'fronts/socials//LoRdzWw6qsJZPvELXs0RoWUgu5FmcFsk0E5ne96Q.png', 1, 0),
(3, 'https://www.instagram.com/', 'fronts/socials//lXwwoWcYVBlfNkyG6BvEmMvhEIQk4X0pm1kN8bma.png', 2, 1),
(4, 'https://www.email.com/', 'fronts/socials//N9w3JXWavJd3jAoPGOYISGWt1T5B8Pr2u51Jsvyf.png', 4, 0),
(5, 'https://www.facebook.com/chatokijapan/', 'fronts/socials//Du13CHe8YKoXnVjzu5ZJ77rq8UuW2Y9lJ4K1zc9i.png', 1, 1),
(6, 'twitter', 'fronts/socials//OxbJ8yJD8H731X7pp0YUToun3mrW0uedLw9jM9of.png', 2, 0),
(7, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_pages`
--

CREATE TABLE `sub_pages` (
  `id` int(11) NOT NULL,
  `description` longtext,
  `youtube` varchar(250) DEFAULT NULL,
  `page_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `featured_image` varchar(150) DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_pages`
--

INSERT INTO `sub_pages` (`id`, `description`, `youtube`, `page_id`, `active`, `featured_image`, `order`) VALUES
(1, NULL, '1', 1, 0, 'uploads/backgrounds//VnAdAyZlMxH4aH48PBZ6ftCkfQnavH03wkWwFAU3.jpeg', NULL),
(2, NULL, '1', 1, 0, 'uploads/backgrounds//bUJXnOGLxprtWNIzUlDsC6glkSYiIgoIFVsPEnDp.jpeg', NULL),
(3, NULL, 'youtube', 1, 0, 'uploads/backgrounds//rZx3caENroQxJkEBLfqavhlMmXqIhXrjd4FFpb9Z.jpeg', NULL),
(4, '<h3> </h3>\r\n\r\n<h3> </h3>\r\n\r\n<h3><strong>What is a good vision statement?</strong></h3>\r\n\r\n<p>Coffee has been the dominant crop in Colombia since the late 1800s, but until recently, it was nearly impossible to get a coffee-snob-approved cup in Bogotá’s cafes. Even though roughly 95 percent of Colombia’s coffee farms are small, family-owned affairs, the country’s most renowned agricultural product has long been destined for export, not local consumption. Left behind for Colombians was&nbsp;<em>pasilla</em>, the dregs of the coffee industry.</p>', NULL, 1, 1, 'uploads/pages//t09bmS1Zg0ESHUuxQw9gkWhIf9nzTqAEMXCFGnCf.jpeg', 2),
(5, NULL, 'https://www.youtube.com/embed/cz7QHNvNFfA', 1, 0, NULL, NULL),
(6, '<h3> </h3>\r\n\r\n<h3> </h3>\r\n\r\n<h3><strong>Mission</strong></h3>\r\n\r\n<p>A good&nbsp;<strong>mission statement</strong>&nbsp;can surprise, inspire, and transform your business. They provide a clearly stated purpose of who you are, what you do, how you benefit customers, and what you aspire to become. ... To that end, here are 18&nbsp;<strong>examples</strong>&nbsp;of highly effective&nbsp;<strong>mission statements</strong>&nbsp;across all industries.Dec 10, 2018</p>', NULL, 1, 1, 'uploads/pages//sQMZA8THtSVqlaGWEhu7UF1xzAqdglffkwdn0V1l.jpeg', 1),
(7, '<p>test</p>', 'https://www.youtube.com/embed/cz7QHNvNFfA', 1, 0, NULL, NULL),
(8, '<h2> </h2>\r\n\r\n<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'https://www.youtube.com/embed/8OO43TlOxTU', 1, 1, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `language` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `role_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`, `language`, `role_id`) VALUES
(1, 'hello', 'admin@gmail.com', '$2y$10$/qD60q8mFQnqwnle0S2FLOKQcUMbdcqUDu4w0f7cNsl1lbIGTpq3m', 'jIMeFQMNJ2OdLvkBgDhLywjE9oNlFg6JnSW5x94Jwno5RQTGPHmSbUBh4Q35', '2017-05-27 22:35:52', '2017-05-27 22:35:52', 'default.png', 'en', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `youtube` varchar(150) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `title` varchar(190) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `youtube`, `active`, `title`) VALUES
(1, 'https://www.youtube.com/embed/cz7QHNvNFfA', 0, ''),
(2, 'https://www.youtube.com/embed/cz7QHNvNFfA', 0, ''),
(3, 'https://www.youtube.com/embed/cz7QHNvNFfA', 0, 'Facebook Videos'),
(4, 'https://www.youtube.com/embed/cz7QHNvNFfA', 1, 'Facebook Video'),
(5, 'https://www.youtube.com/embed/cz7QHNvNFfA', 1, 'Facebook Video'),
(6, 'https://www.youtube.com/embed/cz7QHNvNFfA', 1, 'Facebook Video');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_slides`
--
ALTER TABLE `location_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_pages`
--
ALTER TABLE `sub_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location_slides`
--
ALTER TABLE `location_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_pages`
--
ALTER TABLE `sub_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
