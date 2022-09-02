-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 08:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `quiz_id`, `question_id`, `answer`, `is_right`, `marks`, `created_at`, `updated_at`) VALUES
(13, 6, 1, 1, '$variable =  value;', 'Yes', 10, '2022-09-01 06:01:58', '2022-09-01 06:01:58'),
(14, 6, 1, 3, '$A = 10', 'Yes', 10, '2022-09-01 06:01:58', '2022-09-01 06:01:58'),
(15, 6, 1, 8, 'Bell laboratories', 'Yes', 10, '2022-09-01 06:01:58', '2022-09-01 06:01:58'),
(16, 6, 1, 9, 'to live', 'Yes', 10, '2022-09-01 06:01:58', '2022-09-01 06:01:58'),
(17, 6, 1, 10, 'ALL', 'Yes', 10, '2022-09-01 06:01:58', '2022-09-01 06:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_31_083958_create_quizzes_table', 2),
(6, '2022_08_31_091618_create_questions_table', 3),
(8, '2022_08_31_103044_create_options_table', 4),
(9, '2022_08_31_185648_create_answers_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `option_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_four` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_right_option` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option_one`, `option_two`, `option_three`, `option_four`, `is_right_option`, `created_at`, `updated_at`) VALUES
(1, 1, '@variable  =  value;', '#variable  = value;', '$variable =  value;', '&variable = value;', '$variable =  value;', '2022-08-31 05:44:42', '2022-08-31 15:44:33'),
(4, 3, '$2A = 10', '2$A = 10', '#A = 10', '$A = 10', '$A = 10', '2022-08-31 06:41:06', '2022-08-31 06:41:06'),
(5, 4, 'A', 'B', 'C', 'D', 'B', '2022-08-31 15:21:44', '2022-08-31 15:21:44'),
(6, 5, 'A', 'B', 'C', 'D', 'D', '2022-08-31 15:22:04', '2022-08-31 15:22:04'),
(7, 6, 'A', 'B', 'C', 'D', 'B', '2022-08-31 15:22:35', '2022-08-31 15:22:35'),
(8, 7, 'A', 'B', 'C', NULL, 'B', '2022-08-31 15:22:58', '2022-08-31 15:22:58'),
(9, 8, 'Microsoft', 'Bell laboratories', 'Apple', 'Motorolla', 'Bell laboratories', '2022-09-01 03:50:47', '2022-09-01 03:50:47'),
(10, 9, 'to live', 'to have lived', 'to be lived', 'to be living', 'to live', '2022-09-01 03:54:48', '2022-09-01 03:54:48'),
(11, 10, 'HTML', 'CSS', 'PHP', 'ALL', 'ALL', '2022-09-01 03:59:31', '2022-09-01 03:59:31');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question`, `marks`, `created_at`, `updated_at`) VALUES
(1, 1, 'How to declared PHP veriable ?', 10, '2022-08-31 05:44:42', '2022-08-31 06:19:54'),
(3, 1, 'Right variable syntax in PHP .', 10, '2022-08-31 06:41:06', '2022-08-31 06:41:06'),
(4, 2, 'Question 1', 1, '2022-08-31 15:21:44', '2022-08-31 15:21:44'),
(5, 2, 'Question 2', 1, '2022-08-31 15:22:04', '2022-08-31 15:22:04'),
(6, 2, 'Question 3', 1, '2022-08-31 15:22:35', '2022-08-31 15:22:35'),
(7, 2, 'Question 4', 1, '2022-08-31 15:22:58', '2022-08-31 15:22:58'),
(8, 1, 'Unix operating system is a trademark of which company?', 10, '2022-09-01 03:50:47', '2022-09-01 03:50:47'),
(9, 1, 'I\'m very happy _____ in Bangladesh. I really miss being there.', 10, '2022-09-01 03:54:48', '2022-09-01 03:54:48'),
(10, 1, 'Which of the following is included in CSE?', 10, '2022-09-01 03:59:31', '2022-09-01 03:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `slug`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Quiz 1', 'quiz-1', '2022-08-31', '2022-08-31 03:03:48', '2022-08-31 03:03:48'),
(2, 'Quiz 2', 'quiz-2', '2022-08-31', '2022-08-31 03:05:59', '2022-08-31 03:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `cv_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@gmail.com', NULL, '$2y$10$zjm0we0TJKjQT.IVrCI9je0LVrSzs4d/Ip56E8xI1bf/oJl.smgWW', 1, NULL, NULL, 2, '2022-09-01 12:25:14', '2022-09-01 12:25:14'),
(6, 'Jhon Doe', '1234567895', 'jondoe@gmail.com', NULL, '$2y$10$Eki0wSHq6GT3C66UMwCyz.oFEiHaUBVvnKuUtrygf.LE.lHRQBwJ6', 0, NULL, NULL, 2, '2022-08-30 15:01:46', '2022-08-30 16:50:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_user_id_foreign` (`user_id`),
  ADD KEY `answers_question_id_foreign` (`question_id`),
  ADD KEY `answers_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_question_id_foreign` (`question_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
