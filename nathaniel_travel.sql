-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2025 at 09:45 AM
-- Server version: 8.0.43-0ubuntu0.24.04.1
-- PHP Version: 8.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nathaniel_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `adults` int DEFAULT NULL,
  `nights` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `price`, `country`, `title`, `short_description`, `details`, `image_url`, `start_date`, `end_date`, `adults`, `nights`, `created_at`, `updated_at`) VALUES
(1, 465765.00, 'Korea', 'adfwe', 'dsgfer', 'sfre dfer\r\nsdfrefer', 'https://res.cloudinary.com/digzrkdoe/image/upload/v1758792008/destinations/dest_update_68d50944a202d.png', '2025-09-25', '2025-11-28', 3, 6, '2025-09-22 04:45:43', '2025-09-25 08:20:08'),
(2, 465765.00, 'Korea', 'adfwe', 'dsgfer', 'sfre dfer\r\nsdfrefer', 'https://res.cloudinary.com/digzrkdoe/image/upload/v1758519943/destinations/dest_68d0e285d56e2.png', '2025-09-25', '2025-11-28', 3, 6, '2025-09-22 04:45:43', '2025-09-22 04:45:43'),
(3, 5000.00, 'United State', 'Travel with BDMS', 'A short test for the new functionalotu', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'https://res.cloudinary.com/digzrkdoe/image/upload/v1758541552/destinations/dest_68d136e9a4ad3.jpg', '2025-09-22', '2025-10-24', 2, 4, '2025-09-22 10:45:53', '2025-09-22 10:45:53'),
(4, 15000.00, 'United Kingdom-- edit', 'safrgreger-- edit', 'fretertre -- edit', 'srt4ry ghtrrt -- edit', 'https://res.cloudinary.com/digzrkdoe/image/upload/v1758791871/destinations/dest_update_68d508bbbeb1e.jpg', '2025-09-27', '2025-09-29', 3, 70, '2025-09-23 11:37:49', '2025-09-25 08:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_submissions`
--

CREATE TABLE `form_submissions` (
  `id` bigint UNSIGNED NOT NULL,
  `payload` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_submissions`
--

INSERT INTO `form_submissions` (`id`, `payload`, `created_at`, `updated_at`) VALUES
(1, '{\"name\": \"Habeeb Waliyu\", \"email\": \"frontend@gmail.com\", \"phone\": \"08122353109\", \"message\": \"dsgtrgt\", \"custom_end\": null, \"driver_age\": null, \"hotel_rooms\": null, \"booking_type\": \"contact\", \"custom_start\": null, \"custom_style\": null, \"flight_class\": null, \"hotel_guests\": null, \"activity_date\": null, \"activity_type\": null, \"custom_budget\": null, \"flight_adults\": null, \"hotel_checkin\": null, \"flight_arrival\": null, \"hotel_checkout\": null, \"hotel_location\": null, \"activity_people\": null, \"car_pickup_date\": null, \"flight_children\": null, \"car_dropoff_date\": null, \"flight_departure\": null, \"activity_location\": null, \"preferred_contact\": \"email\", \"custom_destination\": null, \"flight_return_date\": null, \"car_pickup_location\": null, \"car_dropoff_location\": null, \"flight_departure_date\": null}', '2025-09-09 12:09:58', '2025-09-09 12:09:58'),
(2, '{\"name\": \"frontend create\", \"email\": \"frontend@gmail.com\", \"phone\": \"08122353109\", \"message\": \"sadewde\", \"custom_end\": null, \"driver_age\": null, \"hotel_rooms\": null, \"booking_type\": \"contact\", \"custom_start\": null, \"custom_style\": null, \"flight_class\": null, \"hotel_guests\": null, \"activity_date\": null, \"activity_type\": null, \"custom_budget\": null, \"flight_adults\": null, \"hotel_checkin\": null, \"flight_arrival\": null, \"hotel_checkout\": null, \"hotel_location\": null, \"activity_people\": null, \"car_pickup_date\": null, \"flight_children\": null, \"car_dropoff_date\": null, \"flight_departure\": null, \"activity_location\": null, \"preferred_contact\": \"email\", \"custom_destination\": null, \"flight_return_date\": null, \"car_pickup_location\": null, \"car_dropoff_location\": null, \"flight_departure_date\": null}', '2025-09-09 12:27:53', '2025-09-09 12:27:53'),
(3, '{\"name\": \"Habeeb Waliyu\", \"email\": \"essentialdevelopers22@gmail.com\", \"phone\": \"0702 375 1278\", \"message\": \"dacwefew\", \"custom_end\": null, \"driver_age\": null, \"hotel_rooms\": null, \"booking_type\": \"contact\", \"custom_start\": null, \"custom_style\": null, \"flight_class\": null, \"hotel_guests\": null, \"activity_date\": null, \"activity_type\": null, \"custom_budget\": null, \"flight_adults\": null, \"hotel_checkin\": null, \"flight_arrival\": null, \"hotel_checkout\": null, \"hotel_location\": null, \"activity_people\": null, \"car_pickup_date\": null, \"flight_children\": null, \"car_dropoff_date\": null, \"flight_departure\": null, \"activity_location\": null, \"preferred_contact\": \"email\", \"custom_destination\": null, \"flight_return_date\": null, \"car_pickup_location\": null, \"car_dropoff_location\": null, \"flight_departure_date\": null}', '2025-09-09 12:29:11', '2025-09-09 12:29:11'),
(4, '{\"name\": \"frontend create\", \"email\": \"admin@gmail.com\", \"phone\": \"0702 375 1278\", \"message\": \"sfwfer\", \"custom_end\": null, \"driver_age\": null, \"hotel_rooms\": null, \"booking_type\": \"contact\", \"custom_start\": null, \"custom_style\": null, \"flight_class\": null, \"hotel_guests\": null, \"activity_date\": null, \"activity_type\": null, \"custom_budget\": null, \"flight_adults\": null, \"hotel_checkin\": null, \"flight_arrival\": null, \"hotel_checkout\": null, \"hotel_location\": null, \"activity_people\": null, \"car_pickup_date\": null, \"flight_children\": null, \"car_dropoff_date\": null, \"flight_departure\": null, \"activity_location\": null, \"preferred_contact\": \"email\", \"custom_destination\": null, \"flight_return_date\": null, \"car_pickup_location\": null, \"car_dropoff_location\": null, \"flight_departure_date\": null}', '2025-09-09 12:32:56', '2025-09-09 12:32:56'),
(5, '{\"name\": \"frontend create\", \"email\": \"frontend@gmail.com\", \"phone\": \"08122353109\", \"message\": \"wrwer\", \"custom_end\": null, \"driver_age\": null, \"hotel_rooms\": null, \"booking_type\": \"contact\", \"custom_start\": null, \"custom_style\": null, \"flight_class\": null, \"hotel_guests\": null, \"activity_date\": null, \"activity_type\": null, \"custom_budget\": null, \"flight_adults\": null, \"hotel_checkin\": null, \"flight_arrival\": null, \"hotel_checkout\": null, \"hotel_location\": null, \"activity_people\": null, \"car_pickup_date\": null, \"flight_children\": null, \"car_dropoff_date\": null, \"flight_departure\": null, \"activity_location\": null, \"preferred_contact\": \"email\", \"custom_destination\": null, \"flight_return_date\": null, \"car_pickup_location\": null, \"car_dropoff_location\": null, \"flight_departure_date\": null}', '2025-09-09 12:36:06', '2025-09-09 12:36:06'),
(6, '{\"name\": \"oluwaseun orekunrin\", \"email\": \"essentialdevelopers22@gmail.com\", \"phone\": \"446354567278\", \"message\": \"sadwdwe\", \"custom_end\": null, \"driver_age\": null, \"hotel_rooms\": null, \"booking_type\": \"activity\", \"custom_start\": null, \"custom_style\": null, \"flight_class\": null, \"hotel_guests\": null, \"activity_date\": \"2025-09-17\", \"activity_type\": \"adwerwe\", \"custom_budget\": null, \"flight_adults\": null, \"hotel_checkin\": null, \"flight_arrival\": null, \"hotel_checkout\": null, \"hotel_location\": null, \"activity_people\": \"5\", \"car_pickup_date\": null, \"flight_children\": null, \"car_dropoff_date\": null, \"flight_departure\": null, \"activity_location\": \"sdferre\", \"preferred_contact\": \"phone\", \"custom_destination\": null, \"flight_return_date\": null, \"car_pickup_location\": null, \"car_dropoff_location\": null, \"flight_departure_date\": null}', '2025-09-17 09:35:27', '2025-09-17 09:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint UNSIGNED NOT NULL,
  `destination_id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `destination_id`, `first_name`, `last_name`, `email`, `phone`, `message`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 3, 'test', 'dkrfrefr', 'ajffsdnj@test.com', '36576572', 'fdgfgtr fre', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-25 07:19:57', '2025-09-25 07:19:57'),
(2, 2, 'test', 'dkrfrefr', 'eapartment@test.com', '07064996327', 'dewe dew', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-25 07:46:05', '2025-09-25 07:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '0001_01_01_000000_create_users_table', 1),
(10, '0001_01_01_000001_create_cache_table', 1),
(11, '0001_01_01_000002_create_jobs_table', 1),
(12, '2025_07_17_041518_create_form_submissions_table', 1),
(13, '2025_09_22_053207_create_destinations_table', 2),
(14, '2025_09_25_080915_create_inquiries_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `form_submissions`
--
ALTER TABLE `form_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiries_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_submissions`
--
ALTER TABLE `form_submissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
