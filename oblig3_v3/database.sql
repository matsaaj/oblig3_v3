-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2017 at 09:09 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oblig3_v3`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `item_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `item_description` text COLLATE utf8_unicode_ci NOT NULL,
  `item_publishdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `category_id`, `user_id`, `item_name`, `item_description`, `item_publishdate`) VALUES
(26, 1, 49, 'Spisebord for hagen med glassplate Selges!', 'Bord med 6 stoler gis vekk! Hull i bord for parasoll.\r\nKjøpt på Taigaen for 3-4 år siden.\r\nNypris var 5999,- gir vekk nå pga. nye møbler.', '2017-06-03 18:54:51'),
(27, 6, 49, 'En ny ting', 'lorem ipsum ajajjajfkzhvkzxc. hei og hå', '2017-06-03 19:02:00'),
(28, 2, 50, 'Playstation 1 med noen spill', 'Playstation 1 med kontroll.\r\nSpill:\r\nTony Hawk skateboarding\r\nCool Boarder snowboarding\r\nNHL \r\nSpecops\r\nDie Hard', '2017-06-03 19:04:17'),
(29, 4, 49, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mi orci, dapibus vitae est quis, suscipit condimentum velit. Praesent hendrerit, odio vitae pharetra rhoncus, risus lorem congue velit, ac elementum diam urna ut felis. Aliquam pharetra metus sit amet ante semper eleifend. Fusce vel sodales erat. Nunc vulputate varius ipsum quis efficitur.', '2017-06-03 19:04:59'),
(30, 1, 51, 'Solseng rosa \"Curve\" m/armlener', 'En lekker solseng i aluminium og textilene. Hvitfarget ramme og farget trekk gir et eksklusivt preg. Ryggen kan settes i 4 forskjellige posisjoner.', '2017-06-03 19:06:32'),
(31, 1, 51, 'TV-bord gis bort!', 'Tv bord gis bort. Kosta omtrent 1000,- nytt. \r\n\r\nMål:\r\nH: 40cm \r\nB: 111 cm\r\nD: 33 cm', '2017-06-03 19:07:22'),
(32, 1, 51, 'Sofa gis bort grunnet flytting!', 'Helt grei sofa. Putene kan følge med dersom interesse.', '2017-06-03 19:07:55'),
(33, 5, 51, 'Bakluke til bil', 'en rustfri bakluke til vectra b. \r\nMed fungerende viskermotor ', '2017-06-03 19:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `name`) VALUES
(1, 'Møbler og interiør'),
(2, 'Elektronikk og hvitevarer'),
(3, 'Klær og kosmetikk'),
(4, 'Hage, oppussing og hus'),
(5, 'Fritid, hobby og underholdning'),
(6, 'Foreldre og barn');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `firstname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `email`, `password`) VALUES
(49, 'Ola', 'Nordmann', 'ola.n@gmail.com', '$2y$10$3M.SGO4GBJyOZXkH71nmuOrgjs.pEqOaw1Fuq3v6beTeFI22MW2sm'),
(50, 'Test', 'User', 'mail@mail.com', '$2y$10$Xw.Z1GLSb/b0K4gspR9YcOtic4y3vIn39nngzUOJyF3zTjAe7ayIG'),
(51, 'Geir', 'Fridtjofsen', 'm@i.l', '$2y$10$rW27lpHOmn8uuwlqtIC73Oa3DSO.xXPj6s226RQsnCCoFdVEFRBjG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `item_categories` (`id`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
