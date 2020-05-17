-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 02:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`) VALUES
('20200509231818', '2020-05-09 23:18:48'),
('20200509231922', '2020-05-09 23:50:11'),
('20200510010911', '2020-05-10 01:10:42'),
('20200510011115', '2020-05-10 01:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `imageUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `shortDescription` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `imageUrl`, `createdAt`, `updatedAt`, `shortDescription`) VALUES
(1, 1, 'Laravel', '<p>This is one of the most popular open-source PHP frameworks, that was introduced in 2011. Lavarel helps developers in building the most robust web applications by simplifying common tasks like caching, security, routing, and authentication.</p>\n                <strong>Advantages of Lavarel</strong>\n                <ol>\n                  <li>Lavarel has features that make it a great platform to develop robust apps with the complex backend.</li>\n                  <li>It allows for customization of apps to fit the developer’s needs. These include data migration, security, and MVC architecture support.</li>\n                  <li>Lavarel also allows for the development of speedy and highly secure web applications. Since security is an important aspect of web app development, you should consider this platform for your apps.</li>\n                </ol>', 'laravel.png', '2020-05-10 01:50:11', '2020-05-10 01:50:11', 'This is one of the most popular open-source PHP frameworks'),
(2, 2, 'Symfony', '<p>The Symfony is among the earliest PHP framework, and it has been in existence since 2005. Due to the many years of existence, Symfony has become a reliable framework for developing web applications. It is also known as an extensive PHP MVC framework that follows all the PHP standards.</p>\n                <p>Symfony shares many similar features with Lavarel making it difficult to choose one over the other.</p>\n                <strong>Advantages of Symphony</strong>\n                <ol>\n                  <li>It is flexible and can, therefore, be integrated with other projects including Drupal. You can therefore easily install it and use it on various platforms</li>\n                  <li>Symfony allows for fast app development due to its reusable components, a module system, and it requires just a small memory space</li>\n                  <li>It also allows for interoperability. This enables developers to use various software building blocks such as forms management and translation management</li>\n                </ol>', 'symfony.png', '2020-05-10 01:50:11', '2020-05-10 01:50:11', 'The Symfony is among the earliest PHP framework'),
(3, 1, 'Yii', '<p>The Yii backend development framework is a relatively new programming network released in 2008. This framework is ideal for all kind of web apps. Given that it is new to the industry, it helps brings incorporates new invention like lazy loading in the development of web apps. Modern apps that use lazy loading technique have fast loading time.</p>\n                <strong>Advantages of Yii</strong>\n                <ol>\n                  <li>Interoperability with other frameworks like Zend</li>\n                  <li>It is a lightweight framework with high performance and great speed</li>\n                  <li>Has security features like cookie tampering and SOL injection to protect your web apps from possible attacks. This makes it a great choice for e-commerce projects and CMS forums</li>\n                  <li>You cannot create complex web apps with this framework</li>\n                </ol>', 'yii.png', '2020-05-10 01:50:11', '2020-05-10 01:50:11', 'The Yii backend development framework is a relatively new programming network released in 2008'),
(4, 2, 'Zend', '<p>The Zend is an object-oriented framework. As such it is extendable to allow developers to incorporate functionalities that suit their projects. It also contains Zend components to help create web apps with improved functionalities.</p>\n                <strong>Advantages of Zend</strong>\n                <ul>\n                  <li>It is community oriented with an extended community base</li>\n                  <li>Highly flexible with additional that allow developers to custom create apps that fit their needs. There are also Zend components to allow developers to choose their desired components to increase their app functionality</li>\n                  <li>Excellent speed and efficiency</li>\n                  <li>The library components are lightweight with high functionality</li>\n                </ul>', 'zend.png', '2020-05-10 01:50:11', '2020-05-10 01:50:11', 'The Zend is an object-oriented framework');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatarUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatarUrl`, `email`, `password`, `createdAt`, `updatedAt`) VALUES
(1, 'John', '1.jpg', 'johndoe@gmail.com', '123', '2020-05-10 01:50:11', '2020-05-10 01:50:11'),
(2, 'Margaret', '2.jpg', 'margaretjlatham@gmail.com', '1234', '2020-05-10 01:50:11', '2020-05-10 01:50:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_885DBAFAA76ED395` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_885DBAFAA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
