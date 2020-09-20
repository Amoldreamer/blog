-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2019 at 02:28 PM
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
-- Database: `sms`
--

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_07_21_183119_create_roles_table', 1),
(3, '2019_07_21_183201_create_role_users_table', 1),
(4, '2019_07_24_090401_create_states_table', 1),
(8, '2019_07_30_141611_create_salaries_table', 2),
(9, '2014_10_12_000000_create_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assumed_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `assumed_role`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'employee', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 3, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 3, NULL, NULL),
(5, 2, 3, NULL, NULL),
(6, 1, 3, NULL, NULL),
(7, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Register` int(11) NOT NULL,
  `Department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Year` int(11) NOT NULL,
  `Working_days` int(11) NOT NULL,
  `Basic_pay` int(11) NOT NULL,
  `Medical_claim` int(11) NOT NULL,
  `Travel_allowance` int(11) NOT NULL,
  `Dearness_allowance` int(11) NOT NULL,
  `Others` int(11) NOT NULL,
  `Provident_fund` int(11) NOT NULL,
  `Monthly_tax` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Salary_act_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Salary_notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `Register`, `Department`, `Designation`, `Month`, `Year`, `Working_days`, `Basic_pay`, `Medical_claim`, `Travel_allowance`, `Dearness_allowance`, `Others`, `Provident_fund`, `Monthly_tax`, `Total`, `Salary_act_no`, `Salary_notes`, `created_at`, `updated_at`) VALUES
(1, 884690, NULL, '', 'Januray', 0, 43, 90, 90, 90, 90, 90, 90, 90, 270, '', 'good', NULL, NULL),
(2, 689035, NULL, '', 'July', 0, 34, 80, 80, 80, 80, 80, 80, 80, 240, '', 'good', NULL, NULL),
(3, 371367, NULL, '', 'May', 0, 56, 90, 90, 90, 90, 90, 90, 90, 270, '', 'good', '2019-07-30 18:23:50', NULL),
(4, 480985, NULL, '', 'October', 0, 34, 90, 90, 90, 90, 90, 90, 90, 270, '', 'good', '2019-07-30 18:31:25', NULL),
(5, 769523, NULL, '', 'March', 2019, 56, 90, 90, 90, 90, 90, 90, 90, 270, '', 'good', '2019-07-30 19:59:56', NULL),
(6, 658505, 'Human Resource', 'Manager', 'February', 2019, 43, 90, 90, 90, 90, 90, 90, 90, 270, '3432242', 'nice', '2019-07-31 16:42:36', NULL),
(7, 884690, 'Human Resource', 'Manager', 'April', 2015, 34, 90, 90, 90, 90, 90, 90, 90, 270, '4332423', 'dfjkslkdjf', '2019-07-31 18:43:23', NULL),
(8, 469154, 'Human Resource', 'Manager', 'January', 2019, 43, 90, 90, 90, 90, 90, 90, 90, 270, '59848093', 'fkdjfs', '2019-07-31 18:49:20', NULL),
(9, 469154, 'Human Resource', 'Manager', 'March', 2019, 34, 90, 90, 90, 90, 90, 90, 90, 270, '4980934', 'kldfjls', '2019-07-31 18:50:49', NULL),
(10, 469154, 'Human Resource', 'Manager', 'June', 2019, 54, 90, 90, 90, 90, 90, 90, 90, 270, '9493434', 'klfdjljsgkg', '2019-07-31 18:52:04', NULL),
(11, 658505, 'Human Resource', 'Manager', 'June', 2019, 32, 90, 90, 90, 90, 90, 90, 90, 270, '49053', 'dgjljdsf', '2019-07-31 18:54:46', NULL),
(12, 769523, 'Human Resource', 'Manager', 'March', 2018, 34, 90, 90, 90, 90, 90, 90, 90, 270, '4984983', 'fjkdslkfdj', '2019-07-31 19:15:42', NULL),
(13, 769523, 'Human Resource', 'Manager', 'December', 2018, 23, 80, 80, 80, 80, 80, 80, 80, 240, '4343232', 'jfkdsjljfld', '2019-08-01 10:41:18', NULL),
(14, 769523, 'Human Resource', 'Manager', 'January', 2019, 56, 70, 70, 70, 70, 70, 70, 70, 210, '4738383', 'jkfdsjlskf', '2019-08-01 10:43:22', NULL),
(15, 769523, 'Human Resource', 'Manager', 'February', 2019, 34, 98, 98, 98, 98, 98, 98, 98, 294, '87989', 'dkfjskd', '2019-08-01 10:49:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `states` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `states`, `created_at`, `updated_at`) VALUES
(1, 'Arkansas', NULL, NULL),
(2, 'California', NULL, NULL),
(3, 'Florida', NULL, NULL),
(4, 'Maryland', NULL, NULL),
(5, 'North Carolina', NULL, NULL),
(6, 'Texas', NULL, NULL),
(7, 'Washington', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Register` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `salary_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Register`, `name`, `email`, `password`, `mobile`, `date_of_birth`, `address`, `city`, `state`, `photo`, `role_id`, `salary_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 884690, 'Amol Acharya', 'acharyaamol36@gmail.com', '$2y$10$jBmzFdwf9SF4Kmuvy6jbke2hDkKOPafED9U8sR1TfkqszD.ioxdRm', '6534434', '2000-07-03', 'ffsdfsda', 'Little Rock', 'Arkansas', '1564502465.jpg', 1, 7, NULL, '2019-07-30 16:01:05', NULL),
(4, 689035, 'Alok', 'alok@gmail.com', '$2y$10$f1z2bU.qq7DM21BwhvwTN.CYZ3uYRpJu7/EpDKcnJGd6mQwYKtzsO', '8493498', '2000-07-02', 'fkjosjfs', 'Little Rock', 'Arkansas', '1564509492.jpg', 1, 2, NULL, NULL, NULL),
(5, 371367, 'Ram', 'ram@gmail.com', '$2y$10$hc/nZROXlmRsGGM8I6stT.WMjVagD8E0mAsIUv2ZEdQi86fSo3Qcm', '934850', '2000-07-02', 'dfjlskd', 'Charlotte', 'North Carolina', '1564510992.jpg', 1, 3, NULL, NULL, NULL),
(6, 480985, 'Nabin', 'nabin@gmail.com', '$2y$10$FDWPSp535edgfvVYcAgtR.vpeNvS4WDcNIDfi3ZyAWX87u3.oDCHW', '849398', '2000-07-02', 'fkdjlsd', 'Orlando', 'Florida', '1564511449.jpg', 1, 4, NULL, NULL, NULL),
(7, 769523, 'hemant', 'hemand@gmail.com', '$2y$10$.UWqE/Sd2MVas7bOmpoqJeL2LgUJndd9Fqq667LLw64EnF.jZGBS.', '4897392', '2000-07-02', 'rijldfsjlsfd', 'Seatle', 'Washington', '1564516514.jpg', 2, 15, NULL, NULL, NULL),
(8, 658505, 'Prabin', 'prabin@gmail.com', '$2y$10$HviqbPVGbXjl7mX9UCPZtO1ccSogEJ8KhtxGcx2TN6.f9h7pF12r2', '4987932', '2000-07-01', 'fdlksajlajfld', 'Charlotte', 'North Carolina', '1564591188.jpg', 1, 11, NULL, NULL, NULL),
(9, 469154, 'Nirmal', 'nirmal@gmail.com', '$2y$10$f68ySkomofjQbrD.ueIWlOTVQafBza/nVq7vQstFC/0v6mAeFc/HO', '4358947', '2000-07-17', 'fdksjljsfds', 'Seatle', 'Washington', '1564598885.jpg', 1, 10, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_salary_id_foreign` (`salary_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_salary_id_foreign` FOREIGN KEY (`salary_id`) REFERENCES `salaries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
