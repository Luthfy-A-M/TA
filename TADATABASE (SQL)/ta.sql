-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 09:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_comment` text NOT NULL,
  `comment_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `comment_strategy_id` int(11) DEFAULT NULL,
  `comment_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_comment`, `comment_datetime`, `comment_strategy_id`, `comment_user_id`) VALUES
(12, 'test bikin comment 1', '2022-04-12 15:10:28', 14, 17),
(13, 'coba lagi', '2022-04-12 15:11:14', 14, 17),
(14, 'bikin comen', '2022-04-12 15:12:34', 14, 17),
(15, 'ga ke refresh', '2022-04-12 15:13:26', 14, 17),
(16, 'biar \r\nbisa \r\ngini cuk', '2022-04-13 20:25:32', 14, 17),
(17, 'coba', '2022-06-18 13:42:28', 14, 17),
(18, 'Coba \r\nlagi \r\nini', '2022-06-18 13:42:37', 14, 17),
(19, 'ok mas', '2022-06-18 14:34:05', 14, 16),
(20, 'try', '2022-08-07 00:33:07', 17, 17),
(21, 'try', '2022-08-07 00:33:44', 17, 17),
(22, 'try', '2022-08-07 00:34:57', 17, 17),
(23, 'cek', '2022-08-26 14:53:33', 14, 17);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `data_id` int(11) NOT NULL,
  `data` int(11) NOT NULL,
  `date` varchar(8) DEFAULT NULL,
  `strategy_concept_id` int(11) NOT NULL,
  `data_date_sort` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`data_id`, `data`, `date`, `strategy_concept_id`, `data_date_sort`) VALUES
(39, 25, '07-2022', 15, '2022-07-10'),
(40, 40, '07-2022', 17, '2022-07-10'),
(45, 50, '09-2022', 15, '2022-09-10'),
(46, 40, '09-2022', 17, '2022-09-10'),
(48, 75, '10-2022', 15, '2022-10-10'),
(49, 50, '10-2022', 17, '2022-10-10'),
(54, 100, '11-2022', 15, '2022-11-10'),
(55, 50, '11-2022', 17, '2022-11-10'),
(57, 110, '12-2022', 15, '2022-12-10'),
(58, 60, '12-2022', 17, '2022-12-10'),
(59, 120, '01-2023', 15, '2023-01-10'),
(60, 70, '01-2023', 17, '2023-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_13_204039_create_images_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notificationName` varchar(255) NOT NULL,
  `notification` tinyint(1) NOT NULL DEFAULT 0,
  `notification_date` date DEFAULT NULL,
  `notification_user_id` int(11) DEFAULT NULL,
  `notification_strategy_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notificationName`, `notification`, `notification_date`, `notification_user_id`, `notification_strategy_id`) VALUES
(6, 'an Just Commented On Your Strategy', 0, '2022-04-12', 16, 14),
(7, 'an Just Commented On Your Strategy', 0, '2022-04-12', 16, 14),
(8, 'an Just Commented On Your Strategy', 0, '2022-04-12', 16, 14),
(9, 'an Just Commented On Your Strategy', 0, '2022-04-12', 16, 14),
(10, 'an Just Commented On Your Strategy', 1, '2022-04-13', 16, 14),
(11, 'an Just Created New Strategy', 0, '2022-04-14', 16, 21),
(12, 'an Just Created New Strategy', 1, '2022-04-14', 18, 22),
(13, 'an Just Created New Strategy', 0, '2022-04-14', 18, 23),
(14, 'an Just Commented On Your Strategy', 0, '2022-06-18', 16, 14),
(15, 'an Just Commented On Your Strategy', 0, '2022-06-18', 16, 14),
(16, 'Luthf Just Commented On Your Strategy', 0, '2022-06-18', 17, 14),
(17, 'an Just Created New Strategy', 0, '2022-07-14', 16, 24),
(18, 'an Just Commented On Your Strategy', 0, '2022-08-06', 16, 17),
(19, 'an Just Commented On Your Strategy', 0, '2022-08-06', 16, 17),
(20, 'an Just Commented On Your Strategy', 0, '2022-08-06', 16, 17),
(21, 'an Just Commented On Your Strategy', 0, '2022-08-26', 16, 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `segments`
--

CREATE TABLE `segments` (
  `segment_id` int(11) NOT NULL,
  `propositionvalue` text NOT NULL,
  `resistor` text NOT NULL,
  `strategy_id` int(11) NOT NULL,
  `purpose` text DEFAULT NULL,
  `strategyconcept` text DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `segment_name` varchar(255) NOT NULL,
  `uniqueobjective` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `segments`
--

INSERT INTO `segments` (`segment_id`, `propositionvalue`, `resistor`, `strategy_id`, `purpose`, `strategyconcept`, `reason`, `segment_name`, `uniqueobjective`) VALUES
(8, 'cobacobaaja', 'cobacoba', 15, NULL, NULL, NULL, 'cobacobajuga', ''),
(16, 'asdasd', 'asdasd', 16, 'asdasd', 'Engage,Customize', 'asdasd', 'tryit', ''),
(19, 'sdadas', 'dasdasdasd', 17, 'asdasd', 'Access,Engage', 'asdasdasd', 'segment alalala', ''),
(20, 'asdasd', 'asdasd', 17, NULL, NULL, NULL, 'asdasd', ''),
(21, 'asdasd', 'asdasd', 18, 'asdasd', 'Engage,Customize', 'asdasdasd', 'asdasd', ''),
(22, 'coba', 'coba', 19, NULL, NULL, NULL, 'baru', ''),
(23, 'asdsd', 'dddddd', 14, '+money', 'Access,Engage', 'easiest way', 'segment2', ''),
(24, '1111', '123123', 20, 'nambah uang', 'Engage,Collaborate', 'no excuse', '123123', ''),
(25, 'ini valu gw', 'hambatankah ?', 14, 'nyari duit via nft', 'Access,Connect', 'risen gw', 'segmen 2 gw', ''),
(26, 'val1', 'bari', 21, 'purp', 'Access,Engage', 'r1', 'segm1', ''),
(27, 'v2', 'b2', 21, NULL, NULL, NULL, 'seg2', ''),
(28, 'val', 'bar', 22, 'pur', 'Engage', 'reas', 'seg', ''),
(29, 'val2', 'bar2', 22, NULL, NULL, NULL, 'seg2', ''),
(30, 'dummy', 'dummy', 23, 'dummy', 'Access', 'dummy', 'dummy', ''),
(31, 'v1', 'b1', 24, 'p1', 'Engage,Customize', 'r1', 'segmen1', 'u1');

-- --------------------------------------------------------

--
-- Table structure for table `strategys`
--

CREATE TABLE `strategys` (
  `strategy_id` int(11) NOT NULL,
  `objective` text NOT NULL,
  `userid` int(11) NOT NULL,
  `facilitatorid` int(11) NOT NULL,
  `strategy_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `strategys`
--

INSERT INTO `strategys` (`strategy_id`, `objective`, `userid`, `facilitatorid`, `strategy_name`) VALUES
(14, 'Meningkatkan Penjualan', 17, 16, 'Strategy abcde'),
(15, 'cobacoba', 17, 18, 'asdasd'),
(16, 'mainobjectivetry', 17, 16, 'newone'),
(17, 'main objective', 17, 16, 'strategy name was this'),
(18, 'asdasdd', 17, 16, 'asdasd'),
(19, 'Ayaya Together', 17, 18, 'StrategyChecks123'),
(20, '12122222', 17, 16, '12aayayayay'),
(21, 'def', 17, 16, 'strataaa'),
(22, 'main1', 17, 18, 'strat1'),
(23, 'dummy', 17, 18, 'dummy'),
(24, 'Meningkatkan peminat saham', 17, 16, 'testagain');

-- --------------------------------------------------------

--
-- Table structure for table `strategy_concepts`
--

CREATE TABLE `strategy_concepts` (
  `strategy_concept_id` int(11) NOT NULL,
  `strategy_concept_name` longtext NOT NULL,
  `strategy_concept_description` longtext NOT NULL,
  `strategy_concept_indicator` longtext NOT NULL,
  `segment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `strategy_concepts`
--

INSERT INTO `strategy_concepts` (`strategy_concept_id`, `strategy_concept_name`, `strategy_concept_description`, `strategy_concept_indicator`, `segment_id`) VALUES
(2, 'sdasdasd', 'asdadasdasd\r\n\r\n\r\nasdajsdhkahsd\r\n\r\n\r\nasdjaosdhljashd', 'asdgaskdjhasd\r\nasdajkhsdkjahd\r\nasdkjhasdkjh', 16),
(8, 'asdasd', 'asdasdasd', 'asdasdasdad', 19),
(9, 'asdasd', 'asdasdasd', 'asdasd', 21),
(10, 'asdasd', 'asdasdasd', 'asdasdasd', 21),
(15, 'Buat Video Promosi test', 'Buat Video Promosi Untuk Meningkatkan Popularitas Produk', 'Penjualan Meningkat 10%', 23),
(16, 'aaaaaaaa', 'bbbbbbbbbbbb', 'cccccccccccc', 24),
(17, 'Buat Akun Instagram', 'Dapatkan Follower Yang Banyak', 'Follower meningkat 20%', 25),
(19, 'concept1', 'des1', 'indicate', 26),
(20, 'c2', 'd2', 'i2', 26),
(21, 'concept', 'des', 'indi', 28),
(22, 'dummy', 'dummy', 'dummy', 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `status`) VALUES
(4, 'Luthfy Aqil Mahendra', 'luthfyaqilmahendra9@gmail.com', NULL, '$2y$10$.qOpvWlyJERoHpKJFBODFukzcTBpYjjZVscS9PZvIMGvAv3fIhdhO', NULL, '2019-12-13 10:33:44', '2019-12-13 10:33:44', 'Admin', 'aktif'),
(13, 'an', 'asdasdasdasdadasasdd@gmail.com', NULL, '$2y$10$RbQ51PN7PL2j.we3WUK3M.TnTgR5Iyeh1FbtRn.DOCURGUj7kaUJq', NULL, '2021-11-14 03:28:23', '2021-11-14 03:28:23', 'Facilitator', 'nonaktif'),
(14, 'asdasdasd', 'asdsdsdsa@gmail.com', NULL, '$2y$10$n6lGugn88B8K7AfWYl7yq.NIhxRqUonlD9YZb7/XkFpMIkZJn.7rO', NULL, '2021-11-14 03:32:07', '2021-11-14 03:32:07', 'Client', 'aktif'),
(15, 'aasd', 'adasdsad@gmail.com', NULL, '$2y$10$KOdxyTiihdvYOnsRVN9HFuhXlUTcT5ka666/9W7AblFM6vxq7pNb6', NULL, '2021-11-14 03:32:47', '2021-11-14 03:32:47', 'Facilitator', 'nonaktif'),
(16, 'Luthf', 'rokforan@gmail.com', NULL, '$2y$10$A4l5mqsI44pT4J8hBRY8keUmBEm5izYGmj9b1ycT72a/.MQOhQbSG', NULL, '2021-11-17 23:12:35', '2021-11-17 23:12:35', 'Facilitator', 'aktif'),
(17, 'an', 'aaaaaaa@gmail.com', NULL, '$2y$10$97pLnl.ZEm1BOLI/HD8FJ.qSdN5H6dEHK5D3bWcRTFr9rQtZh1wBy', NULL, '2021-11-17 23:16:35', '2021-11-17 23:16:35', 'Client', 'aktif'),
(18, 'facilatotorrr', 'faci@gmail.com', NULL, '$2y$10$CV4MmsnZGscxkb.RKorkW.I0AM/ekOxI5yzyU7zcRwRfgkD29O4Jm', NULL, '2021-11-18 02:01:34', '2021-11-18 02:01:34', 'Facilitator', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_strategy_id` (`comment_strategy_id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`data_id`),
  ADD KEY `data_strategy_concepts_id` (`strategy_concept_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `segments`
--
ALTER TABLE `segments`
  ADD PRIMARY KEY (`segment_id`),
  ADD KEY `strategy_id` (`strategy_id`);

--
-- Indexes for table `strategys`
--
ALTER TABLE `strategys`
  ADD PRIMARY KEY (`strategy_id`);

--
-- Indexes for table `strategy_concepts`
--
ALTER TABLE `strategy_concepts`
  ADD PRIMARY KEY (`strategy_concept_id`),
  ADD KEY `segment_id` (`segment_id`);

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `segments`
--
ALTER TABLE `segments`
  MODIFY `segment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `strategys`
--
ALTER TABLE `strategys`
  MODIFY `strategy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `strategy_concepts`
--
ALTER TABLE `strategy_concepts`
  MODIFY `strategy_concept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_strategy_id`) REFERENCES `strategys` (`strategy_id`);

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`strategy_concept_id`) REFERENCES `strategy_concepts` (`strategy_concept_id`);

--
-- Constraints for table `segments`
--
ALTER TABLE `segments`
  ADD CONSTRAINT `segments_ibfk_1` FOREIGN KEY (`strategy_id`) REFERENCES `strategys` (`strategy_id`);

--
-- Constraints for table `strategy_concepts`
--
ALTER TABLE `strategy_concepts`
  ADD CONSTRAINT `strategy_concepts_ibfk_1` FOREIGN KEY (`segment_id`) REFERENCES `segments` (`segment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
