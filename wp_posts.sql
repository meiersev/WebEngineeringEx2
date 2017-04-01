-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Apr 2017 um 17:18
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bitnami_wordpress`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2017-03-31 11:29:07', '2017-03-31 11:29:07', 'Welcome to WordPress. This is your first post. Edit or delete it, then start writing!', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2017-03-31 11:29:07', '2017-03-31 11:29:07', '', 0, 'http:/?p=1', 0, 'post', '', 1),
(2, 1, '2017-03-31 11:29:07', '2017-03-31 11:29:07', 'This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href=\"http:/wordpress/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'trash', 'closed', 'open', '', 'sample-page__trashed', '', '', '2017-04-01 13:31:43', '2017-04-01 13:31:43', '', 0, 'http:/?page_id=2', 0, 'page', '', 0),
(3, 1, '2017-03-31 11:47:58', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2017-03-31 11:47:58', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/wordpress/?p=3', 0, 'post', '', 0),
(4, 1, '2017-04-01 13:21:28', '2017-04-01 13:21:28', 'LaPlace Restaurant was founded in May of 2015. The cuisine we serve is created with the utmost attention to details. Our emphasis is on providing fresh, locally sourced, exquisite food. As such our menus change on a regular basis, allowing us to offer you mouth watering, perfectly prepared dishes.', 'Welcome', '', 'publish', 'closed', 'closed', '', 'welcome', '', '', '2017-04-01 14:55:52', '2017-04-01 14:55:52', '', 0, 'http://127.0.0.1/wordpress/?page_id=4', 0, 'page', '', 0),
(5, 1, '2017-04-01 13:21:28', '2017-04-01 13:21:28', 'LaPlace Restaurant was founded in May of 2015. The cuisine we serve is created with the utmost attention to details. Our emphasis is on providing fresh, locally sourced, exquisite food. As such our menus change on a regular basis, allowing us to offer you mouth watering, perfectly prepared dishes.', 'Welcome', '', 'inherit', 'closed', 'closed', '', '4-revision-v1', '', '', '2017-04-01 13:21:28', '2017-04-01 13:21:28', '', 4, 'http://127.0.0.1/wordpress/2017/04/01/4-revision-v1/', 0, 'revision', '', 0),
(6, 1, '2017-04-01 13:28:53', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2017-04-01 13:28:53', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/wordpress/?page_id=6', 0, 'page', '', 0),
(7, 1, '2017-04-01 13:28:54', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2017-04-01 13:28:54', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/wordpress/?page_id=7', 0, 'page', '', 0),
(8, 1, '2017-04-01 13:31:43', '2017-04-01 13:31:43', 'This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href=\"http:/wordpress/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2017-04-01 13:31:43', '2017-04-01 13:31:43', '', 2, 'http://127.0.0.1/wordpress/2017/04/01/2-revision-v1/', 0, 'revision', '', 0),
(9, 1, '2017-04-01 14:53:39', '2017-04-01 14:53:39', 'Our cuisine is a melting pot of different cultures which have come together to form a unique blend of flavours and techniques.', 'High Quality Cuisine', '', 'publish', 'closed', 'closed', '', 'high-quality-cuisine', '', '', '2017-04-01 14:53:39', '2017-04-01 14:53:39', '', 0, 'http://127.0.0.1/wordpress/?page_id=9', 0, 'page', '', 0),
(10, 1, '2017-04-01 14:53:39', '2017-04-01 14:53:39', 'Our cuisine is a melting pot of different cultures which have come together to form a unique blend of flavours and techniques.', 'High Quality Cuisine', '', 'inherit', 'closed', 'closed', '', '9-revision-v1', '', '', '2017-04-01 14:53:39', '2017-04-01 14:53:39', '', 9, 'http://127.0.0.1/wordpress/2017/04/01/9-revision-v1/', 0, 'revision', '', 0),
(11, 1, '2017-04-01 14:55:46', '2017-04-01 14:55:46', 'La Place Restaurant was founded in May of 2015. The cuisine we serve is created with the utmost attention to details. Our emphasis is on providing fresh, locally sourced, exquisite food. As such our menus change on a regular basis, allowing us to offer you mouth watering, perfectly prepared dishes.', 'Welcome', '', 'inherit', 'closed', 'closed', '', '4-revision-v1', '', '', '2017-04-01 14:55:46', '2017-04-01 14:55:46', '', 4, 'http://127.0.0.1/wordpress/2017/04/01/4-revision-v1/', 0, 'revision', '', 0),
(12, 1, '2017-04-01 14:55:52', '2017-04-01 14:55:52', 'LaPlace Restaurant was founded in May of 2015. The cuisine we serve is created with the utmost attention to details. Our emphasis is on providing fresh, locally sourced, exquisite food. As such our menus change on a regular basis, allowing us to offer you mouth watering, perfectly prepared dishes.', 'Welcome', '', 'inherit', 'closed', 'closed', '', '4-revision-v1', '', '', '2017-04-01 14:55:52', '2017-04-01 14:55:52', '', 4, 'http://127.0.0.1/wordpress/2017/04/01/4-revision-v1/', 0, 'revision', '', 0),
(13, 1, '2017-04-01 15:01:44', '2017-04-01 15:01:44', 'It\'s vital to our operation to make sure everybody is aware of the quality of the ingredients we use. As the choices we make in terms of which supplies we buy for our recipes is intrinsic to factors such as the healthiness of the food we make to the price you pay for it. That\'s why on our menus you find the origins of each of our ingredients.', 'Only the Best Ingredients', '', 'publish', 'closed', 'closed', '', 'only-the-best-ingredients', '', '', '2017-04-01 15:01:44', '2017-04-01 15:01:44', '', 0, 'http://127.0.0.1/wordpress/?page_id=13', 0, 'page', '', 0),
(14, 1, '2017-04-01 15:01:44', '2017-04-01 15:01:44', 'It\'s vital to our operation to make sure everybody is aware of the quality of the ingredients we use. As the choices we make in terms of which supplies we buy for our recipes is intrinsic to factors such as the healthiness of the food we make to the price you pay for it. That\'s why on our menus you find the origins of each of our ingredients.', 'Only the Best Ingredients', '', 'inherit', 'closed', 'closed', '', '13-revision-v1', '', '', '2017-04-01 15:01:44', '2017-04-01 15:01:44', '', 13, 'http://127.0.0.1/wordpress/2017/04/01/13-revision-v1/', 0, 'revision', '', 0),
(15, 1, '2017-04-01 15:04:24', '2017-04-01 15:04:24', 'In our Philosophy, a restaurant is not only a place where to eat but also to communicate and know new people. For these reasons we organize various events every month.', 'Our Events', '', 'publish', 'closed', 'closed', '', 'our-events', '', '', '2017-04-01 15:04:24', '2017-04-01 15:04:24', '', 0, 'http://127.0.0.1/wordpress/?page_id=15', 0, 'page', '', 0),
(16, 1, '2017-04-01 15:04:24', '2017-04-01 15:04:24', 'In our Philosophy, a restaurant is not only a place where to eat but also to communicate and know new people. For these reasons we organize various events every month.', 'Our Events', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2017-04-01 15:04:24', '2017-04-01 15:04:24', '', 15, 'http://127.0.0.1/wordpress/2017/04/01/15-revision-v1/', 0, 'revision', '', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
