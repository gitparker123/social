-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 02:16 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `name`) VALUES
(1, 3, 2, 'aaa'),
(2, 3, 5, 'user2'),
(3, 2, 3, 'user1');

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
(3, '2019_01_09_180637_delete_columns_from_users', 1),
(4, '2019_01_09_192842_change_avatar_column_from_users', 1),
(5, '2019_01_09_194315_change_column_from_users', 1),
(6, '2019_01_09_200742_change_social_field_from_users', 1),
(7, '2019_01_11_094033_create_users_activations_table', 1),
(8, '2019_01_20_053317_create_notifications_table', 2),
(9, '2019_02_03_185836_add_new_columns_in_users', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('111dd638-ed19-4020-83b9-5d5453cd224c', 'App\\Notifications\\InviteFriend', 'App\\User', 1, '{\"data\":\"Invite you\"}', NULL, '2019-01-19 22:38:17', '2019-01-19 22:38:17'),
('de39dbd1-3ee7-49c9-ba8b-91fc9e4d3927', 'App\\Notifications\\InviteFriend', 'App\\User', 1, '{\"data\":\"Invite you\"}', NULL, '2019-01-20 02:47:29', '2019-01-20 02:47:29'),
('ed3b2269-a8a2-4028-9c20-ee473919efba', 'App\\Notifications\\InviteFriend', 'App\\User', 1, '{\"data\":\"Invite you\"}', NULL, '2019-01-19 22:33:16', '2019-01-19 22:33:16');

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
('hellowjone@dr.com', '$2y$10$R3UvXHVwU7GYzm0kOB1YbezKEWodDbQOWD8Y7cx1QETqVSVyH44n.', '2019-01-18 10:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT '0',
  `setting_1` tinyint(1) NOT NULL DEFAULT '0',
  `setting_2` tinyint(1) NOT NULL DEFAULT '0',
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `globe_ids` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `facebook_id`, `linkedin_id`, `google_id`, `gender`, `remember_token`, `created_at`, `updated_at`, `is_activated`, `setting_1`, `setting_2`, `label`, `lat`, `lng`, `globe_ids`) VALUES
(2, 'aaa', 'hellowjone@mail.com', '$2y$10$2zw0iL09Rvzrqvhe4MN9FOyGx.J5omvyefSQRA9tIo.mPKbc0gZCq', NULL, NULL, NULL, NULL, NULL, 'Cj8gJ6ktbqKNSIvnc1XUBoPoYhQwvSaXKER2L8g0v7ymFHXWaniGx59zApvz', '2019-01-18 11:02:30', '2019-01-18 11:02:30', 1, 1, 1, '', '34.0494', '-118.2640', 'user1,user2,bbb'),
(3, 'user1', 'xinxu728@gmail.com', '$2y$10$kZEdqQm0t/TLgo67DUE0DOK9iQXurPGo/h6XvLiBOYX/8xH9Xps0G', NULL, NULL, NULL, NULL, NULL, 'K7WFgbWmWpqb7APytXcEquG6z2AbK5yq32E3LA8QmIg9eQRN3nEUg4WwFDzN', '2019-01-20 03:05:28', '2019-01-20 03:08:54', 1, 1, 0, '', '34.0494', '-118.2640', 'aaa'),
(5, 'user2', 'hellowjone@dr.com', '$2y$10$p5ASy.k.tqMy4wepBG9uL.qcHM9ZWq.vYWmKkzQfuoJAV5dB3NccK', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-20 03:16:35', '2019-01-20 03:17:03', 1, 1, 1, '', '34', '67', ''),
(8, 'wangping', 'wangping@mail.com', '$2y$10$S9gO7QyXw1oYsbnoVr3XreyUjVQ/Ix4LF8K0eLaKVH8I4wyJlnssS', NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-21 05:09:39', '2019-01-21 05:10:18', 1, 0, 0, '', '56', '90', ''),
(9, 'bbb', 'bbb@mail.com', '$2y$10$sP6eyVD7eDV59H5HM7QOn.MILZvdy21e2aYG4p1vaaj/5mq8yat0O', NULL, NULL, NULL, NULL, NULL, '4DC1kKfA62qnO0DbI6uJbj9T1fIifSOeZVWcnQNzYWMQIdzdpF9pustpJ9fX', '2019-02-03 22:40:07', '2019-02-03 22:40:34', 1, 1, 0, NULL, '45', '43', 'aaa,user2,user1'),
(10, 'ccc', 'ccc@mail.com', '$2y$10$UxXY1puZWEVtX4pPs3JIIuG6AW2AE7rr7xXgzG0b5Y2zRz6MdpjvS', NULL, NULL, NULL, NULL, NULL, 'BKPaYvQ7CgdkrCQwxlbLR5U93QRN7kl7UWYl3U4CHrNILcCDlrEeyH0sKbcq', '2019-02-03 22:54:16', '2019-02-03 22:54:32', 1, 0, 0, NULL, '98', '-34', NULL),
(11, 'ddd', 'ddd@mail.com', '$2y$10$w/yfr53DMtY9M7Jf3JThKewmSVZnv2U.V7rsEiq8qcub.6XnIYBBG', NULL, NULL, NULL, NULL, NULL, 'IcPEIneDewCxwRffktDToZNkBPPrYeI7QlnCL3pcKM4EV0FDk6E29HzUv1ta', '2019-02-03 23:28:39', '2019-02-03 23:28:57', 1, 0, 0, NULL, '12', '43', NULL),
(12, 'eee', 'eee@mail.com', '$2y$10$Cylw0shaKNhlWyQg4zdijuyp9BAe.dSBOmx1zkb6JKCF94tkPmbmC', NULL, NULL, NULL, NULL, NULL, 'RQKh1mVgWVQ5IvAxvm7FCGsxIrhoasvJorKWAUtv6vYXLDYvWzrrOWqWuCKq', '2019-02-03 23:31:12', '2019-02-03 23:31:33', 1, 0, 0, NULL, '34', '112', NULL),
(13, 'fff', 'fff@mail.com', '$2y$10$Qi2i5adA3v6qp5masRuOku90evzFIoAVHmLZefQHSXWp0TaO30LxW', NULL, NULL, NULL, NULL, NULL, 'mEoFBymiCKgMAF8UZOQIm5JSDUoCfHw2fVTXsjHa2k2c3IKBZoyS5MeprG7Q', '2019-02-03 23:36:30', '2019-02-03 23:37:10', 1, 1, 1, NULL, '34.0494', '-118.2640', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_activations`
--

INSERT INTO `user_activations` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(2, 2, 'STPieJP7yLFYac5FdsFgN2Ru5lfzrS', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activations_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_activations`
--
ALTER TABLE `user_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD CONSTRAINT `user_activations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
