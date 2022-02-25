-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2017 at 05:16 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sta`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('open','full','finished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `capacity` int(11) NOT NULL,
  `score_home` int(11) NOT NULL DEFAULT '0',
  `score_away` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `created_at`, `updated_at`, `start`, `location`, `status`, `capacity`, `score_home`, `score_away`) VALUES
(1, '2017-09-21 05:49:42', '2017-09-21 05:49:42', '2017-09-21 07:49:42', 'spaladium', 'finished', 10, 1, 0),
(2, '2017-09-21 05:49:42', '2017-09-21 05:49:42', '2017-09-21 07:49:42', 'poljud', 'finished', 12, 2, 1),
(3, '2017-09-21 05:49:42', '2017-09-21 05:49:42', '2017-09-21 07:49:42', 'poljud', 'finished', 10, 2, 4),
(4, '2017-09-21 05:49:42', '2017-09-21 05:54:26', '2017-09-21 07:49:42', 'spaladium', 'finished', 12, 2, 3),
(5, '2017-09-21 05:49:42', '2017-09-21 05:55:00', '2017-09-21 07:49:42', 'bene', 'open', 10, 2, 3),
(6, '2017-09-21 05:49:42', '2017-09-21 05:49:42', '2017-09-21 07:49:42', 'gusar', 'open', 10, 0, 0),
(7, '2017-09-21 05:54:07', '2017-09-21 05:54:07', '2017-09-29 19:00:00', 'asd', 'open', 12, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `match_comments`
--

CREATE TABLE `match_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `match_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `match_comments`
--

INSERT INTO `match_comments` (`id`, `created_at`, `updated_at`, `match_id`, `user_id`, `content`) VALUES
(1, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 2, 4, 'asd asd asd asd '),
(2, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 3, 2, 'Komentar 2'),
(3, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 1, 6, 'Komentar 3'),
(4, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 1, 7, 'Komentar 4'),
(5, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 3, 6, 'Komentar 5'),
(6, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 4, 1, 'Komentar 6'),
(7, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 1, 5, 'Komentar 7'),
(8, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 1, 7, 'Komentar 8'),
(9, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 3, 4, 'Komentar 9'),
(10, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 2, 2, 'klasndkl lnaklsdnklna'),
(11, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 3, 3, 'text'),
(12, '2017-09-21 08:56:45', '2017-09-21 08:56:45', 3, 1, 'alksndklnasnd');

-- --------------------------------------------------------

--
-- Table structure for table `match_user`
--

CREATE TABLE `match_user` (
  `match_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `goals` int(11) NOT NULL DEFAULT '0',
  `assists` int(11) NOT NULL DEFAULT '0',
  `saves` int(11) NOT NULL DEFAULT '0',
  `team` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `match_user`
--

INSERT INTO `match_user` (`match_id`, `user_id`, `goals`, `assists`, `saves`, `team`) VALUES
(2, 1, 4, 1, 1, 'home'),
(3, 1, 1, 1, 1, 'away'),
(4, 1, 1, 1, 1, 'home'),
(5, 1, 0, 1, 1, 'away'),
(1, 2, 0, 3, 5, 'home'),
(4, 2, 4, 5, 4, 'away'),
(5, 2, 1, 4, 3, 'away'),
(1, 3, 1, 1, 1, 'away'),
(2, 3, 1, 1, 1, 'home'),
(3, 3, 1, 1, 1, 'away'),
(4, 3, 1, 1, 1, 'home'),
(5, 3, 1, 1, 1, 'home'),
(1, 4, 6, 6, 6, 'away'),
(5, 4, 6, 6, 6, 'away'),
(1, 5, 5, 3, 0, 'home'),
(2, 5, 4, 4, 2, 'home'),
(3, 5, 1, 3, 0, 'away'),
(4, 5, 4, 2, 2, 'away'),
(5, 5, 0, 0, 0, 'away'),
(4, 6, 4, 1, 1, 'away'),
(5, 6, 0, 0, 0, 'home'),
(1, 7, 3, 3, 0, 'home'),
(2, 7, 3, 3, 2, 'away'),
(3, 7, 1, 3, 0, 'away'),
(4, 7, 4, 2, 2, 'home'),
(5, 7, 0, 0, 0, 'away'),
(1, 8, 5, 3, 0, 'home'),
(2, 8, 4, 4, 2, 'home'),
(3, 8, 1, 3, 0, 'away'),
(4, 8, 4, 2, 2, 'away'),
(5, 8, 0, 0, 0, 'away'),
(3, 9, 1, 3, 0, 'home'),
(4, 9, 1, 2, 2, 'away'),
(5, 9, 2, 0, 0, 'away'),
(1, 10, 2, 3, 3, 'home'),
(2, 10, 1, 2, 2, 'home'),
(5, 10, 0, 3, 4, 'away'),
(1, 11, 2, 3, 3, 'away'),
(2, 11, 2, 2, 4, 'home'),
(3, 11, 1, 3, 3, 'away'),
(4, 11, 4, 2, 1, 'away'),
(5, 11, 0, 0, 0, 'home');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pathToThumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `created_at`, `updated_at`, `pathToThumb`, `path`, `user_id`) VALUES
(1, '2017-09-21 05:49:43', '2017-09-21 05:49:43', '/images/rsz_slika1.jpg', '/images/slika1.jpg', 1),
(2, '2017-09-21 05:49:43', '2017-09-21 05:49:43', '/images/rsz_slika2.jpg', '/images/slika2.jpg', 3),
(3, '2017-09-21 05:49:43', '2017-09-21 05:49:43', '/images/rsz_slika3.jpg', '/images/slika3.jpg', 3),
(4, '2017-09-21 05:49:43', '2017-09-21 05:49:43', '/images/rsz_slika4.jpg', '/images/slika4.jpg', 2),
(7, '2017-09-21 05:49:43', '2017-09-21 05:49:43', '/images/rsz_slika3.jpg', '/images/slika3.jpg', 3),
(8, '2017-09-21 05:49:43', '2017-09-21 05:49:43', '/images/rsz_slika4.jpg', '/images/slika4.jpg', 2),
(11, '2017-09-21 05:49:43', '2017-09-21 05:49:43', '/images/rsz_slika3.jpg', '/images/slika3.jpg', 3),
(12, '2017-09-21 05:49:43', '2017-09-21 05:49:43', '/images/rsz_slika4.jpg', '/images/slika4.jpg', 2),
(15, '2017-09-21 05:49:43', '2017-09-21 05:49:43', '/images/rsz_slika3.jpg', '/images/slika3.jpg', 3),
(16, '2017-09-21 05:49:43', '2017-09-21 05:49:43', '/images/rsz_slika4.jpg', '/images/slika4.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `media_comments`
--

CREATE TABLE `media_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `media_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_comments`
--

INSERT INTO `media_comments` (`id`, `created_at`, `updated_at`, `media_id`, `user_id`, `content`) VALUES
(1, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 2, 4, 'komentar 1'),
(2, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 3, 2, 'Komentar 2'),
(3, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 1, 6, 'Komentar 3'),
(4, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 1, 7, 'Komentar 4'),
(5, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 3, 6, 'mediaComment 5'),
(6, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 4, 1, 'Komentar 6'),
(7, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 1, 5, 'Komentar 7'),
(8, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 1, 7, 'Komentar 8'),
(9, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 3, 4, 'Komentar 9'),
(10, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 2, 2, 'random'),
(11, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 3, 3, 'ggwp');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(348, '2017_09_14_181810_create_matches_table', 1),
(349, '2017_09_14_181818_create_users_table', 1),
(350, '2017_09_14_181830_match_user', 1),
(351, '2017_09_16_221608_create_match_comments_table', 1),
(352, '2017_09_16_223726_create_media_table', 1),
(353, '2017_09_16_224501_create_media_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mmr` int(11) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `remember_token`, `created_at`, `updated_at`, `name`, `email`, `password`, `mmr`, `age`) VALUES
(1, 1, 'KGtS1sYwBBTjx6YSm37Edibgi18oFNqToZoZWxpzzqe01bDjpn731OlCFJdn', '2017-09-21 05:49:42', '2017-09-21 05:54:26', 'pero', 'pero', '$2y$10$FSVELOdm07jB5vOQgUy9Q.Y2LBWSm6Tpb3460A.INSHh7gSiCxocq', 94, 1990),
(2, 0, NULL, '2017-09-21 05:49:42', '2017-09-21 05:54:26', 'ivan', 'ivan', '$2y$10$0PzHW6bnAbRJxfmvzbQI4eU1P6f1Q.ut8yqQArUkSQtv7PDem2lga', 99, 1990),
(3, 0, NULL, '2017-09-21 05:49:42', '2017-09-21 05:54:26', 'mate', 'mate', '$2y$10$GSRAvGd8vIqeK2KDhUDjTOd38Kt5i48ku3Dio.WeA7p1RWxpSh2eK', 91, 1990),
(4, 0, NULL, '2017-09-21 05:49:42', '2017-09-21 05:49:42', 'duje', 'duje', '$2y$10$wIGii3zZKaX1sVhQPyd.weAATGGy9bTVe/MNDOGSGKUftxJg4Xsiy', 92, 1990),
(5, 0, NULL, '2017-09-21 05:49:42', '2017-09-21 05:54:26', 'ante', 'ante', '$2y$10$jAuiBus2UZz5QU1Urfz8ae7iwAGi2MD7NzBAQ1qmKHUBnvgQOiLrS', 79, 1990),
(6, 0, NULL, '2017-09-21 05:49:42', '2017-09-21 05:54:26', 'josko', 'josko', '$2y$10$22w1sp1FFN0gV6eftcaeAOsQ9wuq7yBfbXSWL/eo37nizzkH7xFsS', 122, 1990),
(7, 0, NULL, '2017-09-21 05:49:42', '2017-09-21 05:54:26', 'toni', 'toni', '$2y$10$lEdLNDCMdUplgVaTfO8Im.p.edUdQnyyNp2FrKLhd.mVH8Jcea3gy', 88, 1990),
(8, 0, NULL, '2017-09-21 05:49:42', '2017-09-21 05:54:26', 'ljubo', 'ljubo', '$2y$10$h6wdPcQLcvgh1bZ4t4vSh.S7uIpq8xnM2nPSDPMieaMfHCu5bTn8G', 91, 1990),
(9, 0, NULL, '2017-09-21 05:49:43', '2017-09-21 05:54:26', 'jon', 'jon', '$2y$10$p89Xhjv433j013yOMs4Ky.9QdmGTc8qeftsjnzPyJS8jD2rDR/La6', 111, 1990),
(10, 0, NULL, '2017-09-21 05:49:43', '2017-09-21 05:49:43', 'ronaldo', 'ronaldo', '$2y$10$k4jS0GSip5pfKJmxar5iN.YnXcjS.YCkqaC82ElzP98qnQnfedfnm', 130, 1990),
(11, 0, NULL, '2017-09-21 05:49:43', '2017-09-21 05:54:26', 'messi', 'messi', '$2y$10$gZ54arAiIRStAn1E3qS84.MD3XUEL4SA1kSujTjahvc49kMc6lX5q', 71, 1990);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_comments`
--
ALTER TABLE `match_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_comments_user_id_foreign` (`user_id`),
  ADD KEY `match_comments_match_id_foreign` (`match_id`);

--
-- Indexes for table `match_user`
--
ALTER TABLE `match_user`
  ADD KEY `match_user_match_id_foreign` (`match_id`),
  ADD KEY `match_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_user_id_foreign` (`user_id`);

--
-- Indexes for table `media_comments`
--
ALTER TABLE `media_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_comments_media_id_foreign` (`media_id`),
  ADD KEY `media_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `match_comments`
--
ALTER TABLE `match_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `media_comments`
--
ALTER TABLE `media_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `match_comments`
--
ALTER TABLE `match_comments`
  ADD CONSTRAINT `match_comments_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `match_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `match_user`
--
ALTER TABLE `match_user`
  ADD CONSTRAINT `match_user_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `match_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `media_comments`
--
ALTER TABLE `media_comments`
  ADD CONSTRAINT `media_comments_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `media_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
