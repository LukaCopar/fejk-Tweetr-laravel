-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 11:33 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dejktweetr`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'a delas?', 1, 3, '2018-11-06 09:33:12', '2018-11-06 09:33:12'),
(2, 'dela', 1, 3, '2018-11-06 09:42:44', '2018-11-06 09:42:44'),
(3, 'asdasd', 1, 4, '2018-11-07 07:25:00', '2018-11-07 07:25:00'),
(4, 'shit', 3, 5, '2018-12-03 09:52:29', '2018-12-03 09:52:29'),
(5, 'fghfgh', 3, 8, '2018-12-03 10:43:33', '2018-12-03 10:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` int(10) UNSIGNED NOT NULL,
  `follows_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `follows_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 2, 3, '2018-12-09 09:32:28', '2018-12-09 09:32:28'),
(12, 1, 3, '2018-12-09 09:32:37', '2018-12-09 09:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_19_100438_create_posts_table', 1),
(4, '2018_10_19_133114_add_user_id_to_posts', 1),
(5, '2018_10_22_121826_add_cover_image_to_posts', 1),
(6, '2018_10_23_083523_create_comments_table', 1),
(7, '2018_11_06_074638_create_follows_table', 2),
(8, '2018_11_06_074924_create_follows_table', 3),
(9, '2018_11_13_071927_add_username_to_users', 4),
(10, '2018_11_13_074035_add_profile_pic_to_user', 5),
(11, '2018_11_13_085028_add_profile_pic__u_r_l_t_o_user', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('luka.copar@gmail.com', '$2y$10$O0XlBXtYfIdpRiO1ukUyp.ODuAMY.2ucDWmsICx2F6YUmiaiXqbjO', '2018-11-19 09:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `cover_image`) VALUES
(1, 'first post', '<p>yay</p>', '2018-11-06 07:01:27', '2018-11-06 07:01:27', 1, 'noimage.jpg'),
(2, 'second post', '<p>second yes</p>', '2018-11-06 07:01:41', '2018-11-06 07:01:41', 1, '3cn4udby0eu11_1541491300.jpg'),
(3, 'third post', '<p>asdw</p>', '2018-11-06 07:05:11', '2018-11-06 07:05:11', 1, '3cn4udby0eu11_1541491511.jpg'),
(4, 'dffg', '<p><strong>ascadsdbbsdbsf as asf af af af a f<em> asf as fasf asf af</em></strong></p>', '2018-11-07 07:24:42', '2018-11-07 07:24:42', 1, 'iqaion2m5nr11_1541579082.jpg'),
(5, 'second user post', '<p>jep it sure is</p>', '2018-11-19 09:42:42', '2018-11-19 09:42:42', 2, '8e08s664azx11_1542624161.jpg'),
(6, 'mrs', '<p>u kurac</p>', '2018-12-03 09:16:44', '2018-12-03 09:16:44', 3, 'noimage.jpg'),
(7, 'banane', '<p><strong>asdawdawdasd</strong></p>', '2018-12-03 10:41:46', '2018-12-03 10:41:46', 3, 'm2r9t52590y11_1543837305.jpg'),
(8, 'asdjaw', '<p><a href=\"https://i.ytimg.com/vi/34WuL-VI_es/sddefault.jpg\"><img alt=\"jlahsdja\" src=\"https://i.ytimg.com/vi/34WuL-VI_es/sddefault.jpg\" style=\"height:480px; width:640px\" /></a></p>', '2018-12-03 10:43:10', '2018-12-03 10:43:10', 3, 'noimage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ussername` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic_URL` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `ussername`, `profile_pic_URL`) VALUES
(1, 'Luka Čoparrr', 'luka.copar@gmail.com', NULL, '$2y$10$YOD.nUSOtbJLKkk6V0b5EOIhHcBlHl1O5T.YQDCN3Y4G0zDHoVCwG', 'yyVJLcEYeqF08JIXvOhINEtzlRzKghpd2ba8fTDoTADat67vs8LPPiOBk8Bh', '2018-11-06 07:01:16', '2018-11-19 09:52:13', 'Luka Čopar', 'uso2o6l3a0y11_1542624733.jpg'),
(2, 'Luka Čopar', 'luka.copar2@gmail.com', NULL, '$2y$10$YOD.nUSOtbJLKkk6V0b5EOIhHcBlHl1O5T.YQDCN3Y4G0zDHoVCwG', NULL, '2018-11-19 09:42:04', '2018-11-19 10:10:26', 'Fabpotato', '5qz6urlgj0y11_1542625826.jpg'),
(3, 'david', 'lol.lol@lol.lol', NULL, '$2y$10$YOD.nUSOtbJLKkk6V0b5EOIhHcBlHl1O5T.YQDCN3Y4G0zDHoVCwG', NULL, '2018-12-03 09:11:37', '2018-12-03 09:11:37', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
