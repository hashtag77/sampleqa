-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2019 at 05:47 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.1.30-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampleqa`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `channel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `channel`, `creator`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laravel', 1, '2019-07-29 02:13:24', '2019-07-29 02:13:24', NULL),
(2, 'Angular', 1, '2019-07-29 02:14:30', '2019-07-29 02:14:30', NULL),
(3, 'JavaScript', 1, '2019-07-29 02:16:40', '2019-07-29 02:16:40', NULL),
(4, 'HTML', 1, '2019-07-29 02:17:00', '2019-07-29 02:17:00', NULL),
(5, 'CSS', 1, '2019-07-29 02:17:24', '2019-07-29 02:17:24', NULL),
(6, 'VueJS', 1, '2019-07-29 02:17:50', '2019-07-29 02:17:50', NULL),
(7, 'NodeJS', 1, '2019-07-29 02:18:07', '2019-07-29 02:18:07', NULL),
(8, 'Wordpress', 1, '2019-07-29 02:18:21', '2019-07-29 02:18:21', NULL),
(9, 'jQuery', 1, '2019-07-29 02:18:58', '2019-07-29 02:18:58', NULL),
(10, 'ReactJS', 1, '2019-07-29 02:19:11', '2019-07-29 02:19:11', NULL),
(11, 'FabricJS', 1, '2019-07-29 02:19:31', '2019-07-29 02:19:31', NULL),
(12, 'PHP', 1, '2019-07-29 02:21:57', '2019-07-29 02:21:57', NULL),
(13, 'Python', 1, '2019-07-29 02:22:19', '2019-07-29 02:22:19', NULL),
(14, 'Ruby on Rails', 1, '2019-07-29 02:22:30', '2019-07-29 02:22:30', NULL),
(15, 'Ionic', 1, '2019-07-29 02:49:25', '2019-07-29 02:49:25', NULL),
(16, 'Android', 1, '2019-07-29 04:36:11', '2019-07-29 04:36:11', NULL),
(17, 'Java', 1, '2019-07-29 04:36:28', '2019-07-29 04:36:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discussion_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `helpful` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `discussion_id`, `user_id`, `comment`, `helpful`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 'test', 0, NULL, '2019-07-29 23:53:44', '2019-07-29 23:53:44'),
(2, 6, 2, 'ans', 0, NULL, '2019-07-29 23:53:53', '2019-07-29 23:53:53'),
(3, 6, 4, 'teast commnet', 0, NULL, '2019-07-30 00:04:39', '2019-07-30 00:04:39'),
(4, 6, 4, 'test', 0, NULL, '2019-07-30 00:06:54', '2019-07-30 00:06:54'),
(5, 6, 4, 'new comment', 0, NULL, '2019-07-30 00:07:00', '2019-07-30 00:07:00'),
(6, 6, 4, 'play', 0, NULL, '2019-07-30 00:07:05', '2019-07-30 00:07:05'),
(7, 6, 4, 'FabricJS\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 0, NULL, '2019-07-30 00:14:29', '2019-07-30 00:14:29'),
(8, 7, 4, 'sdffdsfdtest', 0, NULL, '2019-07-30 01:02:59', '2019-07-31 02:53:28'),
(9, 7, 4, 'sads', 1, NULL, '2019-07-30 01:47:32', '2019-07-31 04:36:55'),
(10, 7, 4, 'adssadsadsads', 0, NULL, '2019-07-30 01:49:31', '2019-07-31 02:53:14'),
(11, 7, 4, 'dfdfgf', 0, NULL, '2019-07-30 06:58:25', '2019-07-30 06:58:25'),
(12, 7, 4, 'dsfds', 0, '2019-07-31 04:32:48', '2019-07-30 07:08:29', '2019-07-31 04:32:48'),
(13, 7, 2, 'wde', 0, NULL, '2019-07-30 23:18:19', '2019-07-30 23:18:19'),
(14, 7, 4, 'fff', 0, NULL, '2019-07-30 23:29:38', '2019-07-30 23:29:38'),
(15, 7, 4, 'ss', 0, NULL, '2019-07-31 00:01:57', '2019-07-31 00:01:57'),
(16, 11, 2, 'dfdsfds', 0, NULL, '2019-07-31 05:34:13', '2019-07-31 05:34:13'),
(17, 11, 4, 'test reply', 0, NULL, '2019-07-31 05:46:45', '2019-07-31 05:46:45'),
(18, 10, 4, 'sfsdf', 1, NULL, '2019-07-31 06:40:49', '2019-07-31 06:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thread_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '20190729110301',
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `query` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_id` int(11) NOT NULL,
  `status` enum('SOLVED','UNSOLVED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UNSOLVED',
  `views` bigint(20) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`id`, `thread_slug`, `user_id`, `title`, `query`, `channel_id`, `status`, `views`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '20190729110329-what-is-lorem-ipsum', 2, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 6, 'UNSOLVED', 0, NULL, '2019-07-29 05:33:29', '2019-07-29 05:33:29'),
(2, '20190729111904-why-do-we-use-it', 2, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 4, 'UNSOLVED', 4, NULL, '2019-07-29 05:49:04', '2019-07-31 06:45:06'),
(3, '20190729112502-section-11032-of-de-finibus-bonorum-et-malorum-written-by-cicero-in-45-bc', 1, 'Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC', '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"', 12, 'UNSOLVED', 0, NULL, '2019-07-29 05:55:02', '2019-07-29 05:55:02'),
(4, '20190729112537-1914-translation-by-h-rackham', 1, '1914 translation by H. Rackham', '"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"', 7, 'UNSOLVED', 0, NULL, '2019-07-29 05:55:37', '2019-07-29 05:55:37'),
(5, '20190729112600-1914-translation-by-h-rackham', 1, '1914 translation by H. Rackham', '"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."', 9, 'UNSOLVED', 0, NULL, '2019-07-29 05:56:00', '2019-07-29 05:56:00'),
(6, '20190729112637-1914-translation-by-h-rackham', 1, '1914 translation by H. Rackham', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 11, 'UNSOLVED', 3, NULL, '2019-07-29 05:56:37', '2019-07-31 05:49:34'),
(7, '20190731054808-what-is-my-thread', 4, 'What is my thread?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, 'SOLVED', 252, NULL, '2019-07-30 00:04:09', '2019-07-31 06:45:33'),
(8, '20190730063451-jsvdjssds', 4, 'jsvdjssds', 'sfddsfsfsfdsfds', 5, 'UNSOLVED', 0, NULL, '2019-07-30 01:04:51', '2019-07-30 01:47:26'),
(9, '20190730071540-why-do-we-use-it', 4, 'Why do we use it?', 'svbfjhdsbjfbsdfsdfdsf', 9, 'UNSOLVED', 5, NULL, '2019-07-30 01:45:40', '2019-07-31 00:17:35'),
(10, '20190731064840-the-standard-lorem-ipsum-passage-used-since-the-1500s', 4, 'The standard Lorem Ipsum passage, used since the 1500s', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', 14, 'SOLVED', 26, NULL, '2019-07-31 01:18:40', '2019-07-31 06:45:28'),
(11, '20190731111823-test-data', 2, 'test_data', 'test data', 1, 'UNSOLVED', 33, NULL, '2019-07-31 05:34:08', '2019-07-31 05:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `likes` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `comment_id`, `user_id`, `likes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 8, 4, 0, NULL, '2019-07-30 07:42:29', '2019-07-31 00:15:49'),
(2, 9, 4, 1, NULL, '2019-07-30 07:43:26', '2019-07-31 01:11:09'),
(3, 10, 4, 0, NULL, '2019-07-30 07:45:01', '2019-07-31 01:11:15'),
(4, 8, 2, 0, NULL, '2019-07-30 23:19:25', '2019-07-30 23:19:45'),
(5, 16, 2, 1, '2019-07-31 05:44:34', '2019-07-31 05:34:23', '2019-07-31 05:44:34'),
(6, 16, 1, 1, '2019-07-31 05:43:45', '2019-07-31 05:34:42', '2019-07-31 05:43:45'),
(7, 16, 1, 1, NULL, '2019-07-31 05:43:58', '2019-07-31 05:43:58'),
(8, 16, 2, 1, NULL, '2019-07-31 05:45:07', '2019-07-31 05:45:07'),
(9, 16, 4, 1, NULL, '2019-07-31 05:45:34', '2019-07-31 05:45:34'),
(10, 17, 4, 1, '2019-07-31 05:47:08', '2019-07-31 05:46:52', '2019-07-31 05:47:08');

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
(3, '2019_07_29_071241_create_channels_table', 2),
(6, '2019_07_29_072835_add_creator_in_channels', 3),
(8, '2019_07_29_095547_create_discussions_table', 4),
(10, '2019_07_29_103007_add_username_in_users', 5),
(15, '2019_07_29_104607_add_columns_to_discussions', 6),
(16, '2019_07_30_044259_create_comments_table', 7),
(24, '2019_07_30_065725_add_views_in_discussions', 8),
(25, '2019_07_30_124945_create_likes_table', 8);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', '@USER', 'user@user.com', NULL, '$2y$10$z3MXzWvIo8I6XRYabcliKONVZxJuGCFo6pTwtvNSo9Nsa0R5zAm8i', 'ONRXLr6UeJDzplGDwSHpPBl9QpVSO6T3ATY6lwuniA0SXLnPVkGjn6JO2sBi', '2019-07-29 00:26:55', '2019-07-29 00:26:55'),
(2, 'Test', '@TEST', 'test@test.com', NULL, '$2y$10$fqFT9K5pFeFxscKh9.fiVOPbXgaI69SCJViTpV/IzEuoB.pBr165C', NULL, '2019-07-29 05:11:47', '2019-07-29 05:11:47'),
(3, 'Demo', '@DEMO', 'demo@demo.com', NULL, '$2y$10$K/Hg3v6Tn/LCQ3qnWZVOMui7WHpPsDbgfyKytAdkoLvd4Q4NvPhbu', NULL, '2019-07-29 06:49:56', '2019-07-29 06:49:56'),
(4, 'Nitin', '@NITIN', 'nitin@mail.com', NULL, '$2y$10$p0BkHZKgvpwQpfMZ6UnUOeQeSRQ7Rm6exTEkh./E7Cr2ykm4yW3oG', NULL, '2019-07-30 00:03:48', '2019-07-30 00:03:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
