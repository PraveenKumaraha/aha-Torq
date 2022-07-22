-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 11:13 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin@admin.com', NULL, '$2y$10$PqSKV7Ye2PVTzNor1tEhguuPxzY3lGTN9H4JWZqlNwK2GvjYB7OXG', 1, NULL, '2020-07-07 18:30:00', '2020-10-14 09:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `bike_body_types`
--

CREATE TABLE `bike_body_types` (
  `id` int(11) NOT NULL,
  `bike_body` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deteled_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bike_brands`
--

CREATE TABLE `bike_brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bike_brands`
--

INSERT INTO `bike_brands` (`id`, `brand_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hero', 1, NULL, NULL, NULL),
(2, 'Honda', 1, '2022-05-25 13:48:50', '2022-05-25 13:48:50', NULL),
(3, 'Suzuki', 1, '2022-05-25 13:50:06', '2022-05-25 13:50:06', NULL),
(4, 'Honda', 1, '2022-05-25 14:36:22', '2022-05-25 14:36:22', NULL),
(5, 'Suzuki1', 1, '2022-05-25 14:58:49', '2022-05-25 14:58:49', NULL),
(6, 'Suzuki', 1, '2022-05-25 14:58:57', '2022-05-25 14:58:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bike_fuel_types`
--

CREATE TABLE `bike_fuel_types` (
  `id` int(11) NOT NULL,
  `bike_fuel` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bike_fuel_types`
--

INSERT INTO `bike_fuel_types` (`id`, `bike_fuel`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 'text1', '2022-05-29 17:25:34', '2022-05-29 17:50:07', NULL, 1),
(2, 'sdcvf', '2022-05-29 17:50:14', '2022-05-29 17:57:17', '2022-05-29 17:57:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bike_models`
--

CREATE TABLE `bike_models` (
  `id` int(11) NOT NULL,
  `bike_model` varchar(50) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bike_models`
--

INSERT INTO `bike_models` (`id`, `bike_model`, `brand_id`, `status`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'V151', 1, 1, NULL, NULL, '2022-05-28 15:13:32'),
(2, '15', 2, 1, '2022-05-27 18:10:51', NULL, '2022-05-27 18:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `category` varchar(200) DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT 1,
  `file_path` varchar(255) DEFAULT 'assets/images/blog/default.png',
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `category`, `uploaded_by`, `file_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Velit consectetur saepe adipisci pariatur laboriosam sit. Dolores qui et expedita rerum earum quia. Optio cumque quia dolor et. Doloremque provident vero suscipit.', 'Doloremque et reprehenderit tempore natus a animi. Corrupti porro ea voluptatem id. Excepturi atque aut perferendis. Consequatur sapiente qui distinctio totam eligendi.', '1', 1, 'assets/images/blog/1652161665.jpg', 1, '2020-07-13 09:38:13', '2022-05-10 06:17:45'),
(2, 'Iste qui est ea facere quisquam rem. Magnam saepe qui consequatur qui iste delectus alias. Aliquam iusto quas voluptas commodi molestiae.', 'Et ipsum beatae consequatur. Ut provident id aliquam debitis enim. Cupiditate aliquam qui repellendus ad saepe. Voluptate alias qui fugiat nihil aut aspernatur. Laboriosam modi et quia nihil voluptate molestias porro.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(3, 'Eos voluptatem dolorem laudantium facere ipsa aut. Qui illo quaerat eos recusandae culpa. Molestias et voluptates fugit ab totam laboriosam. Rem libero maxime perferendis facilis hic architecto.', 'Accusamus minima in nulla aut eos consequuntur vitae est. Ad quod ab at quo dolores porro. Voluptatem molestiae dolorem a unde nobis laudantium totam.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(4, 'Reiciendis dolores in sunt illo. Repudiandae deleniti soluta tempore voluptatum consectetur voluptatem perspiciatis. Rerum qui eius aut adipisci.', 'Quam aut eos ullam. Dolor et vitae aut maxime. Ducimus qui harum voluptatum deserunt dolorum corporis tempore.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(5, 'Vel numquam non ipsam amet dicta doloremque eligendi. Nulla rerum aut reiciendis voluptas mollitia et. Atque iste dolor animi neque consequuntur labore doloribus.', 'Dolorem unde tempora eum. Velit eum velit quia in repudiandae natus et incidunt. Corrupti eum dolor nobis est quibusdam. Velit iusto consectetur reiciendis ex aut consequuntur odit. Excepturi laborum est occaecati fugiat voluptas.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(6, 'Sed qui inventore voluptas iste pariatur nihil fugiat. Laboriosam nam fugiat odit temporibus et. Porro omnis quaerat nobis voluptas et cupiditate nam. Ut id eum eos. Quas voluptatem nobis rem non.', 'Assumenda vel tenetur saepe repellendus amet. Quo qui placeat aut et laborum magnam. Corporis et velit quibusdam ipsa. Alias excepturi labore et hic necessitatibus dicta.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(7, 'Velit at magnam libero quibusdam cum. Accusantium modi porro excepturi sit sequi. Facilis nihil inventore a qui aut.', 'Quia est numquam dolor enim eum est. Amet voluptatem est architecto voluptatem vero vitae ut.', '1', 1, 'assets/images/blog/1652161497.jpg', 1, '2020-07-13 09:38:13', '2022-05-10 06:14:57'),
(8, 'Accusamus et sit saepe ut eum. Qui error ipsum dolor optio provident error aut. Et facilis corrupti saepe. Aliquam et omnis quibusdam hic dicta.', 'Ut dolorum aut labore corrupti occaecati ipsa dolores est. Officiis ipsam dolores tenetur sequi velit rerum dolor. Magni debitis pariatur asperiores nesciunt perferendis. Molestiae autem non est veritatis.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(9, 'Repudiandae id aperiam est et. Delectus possimus ipsam est accusamus.', 'Ad maxime et quam sed minima sint quia. Facilis odio et voluptas earum hic quas magnam numquam. Ut debitis cupiditate eos enim.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(10, 'Quis pariatur porro sint vel excepturi. Delectus facilis rerum sed molestiae.', 'Quos harum officia esse sunt in qui natus nihil. Est eligendi sint possimus aut. Quis et qui repellat inventore et. Ut ut ratione id accusamus vel.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:38:13', '2020-07-13 09:38:13'),
(14, 'Quam accusamus molestias qui optio fugiat omnis autem. Reprehenderit adipisci accusantium qui iusto sapiente sed voluptatem quasi. Laboriosam voluptas blanditiis earum amet voluptas sit.', 'Quas laboriosam corporis dolorem id itaque et. Est aut illo alias aut sint. Eaque sunt impedit mollitia nihil impedit repellat architecto.', 'Latest News', 1, 'assets/images/blog/default_news_a.jpg', 1, '2020-07-13 09:41:03', '2020-09-28 06:48:49'),
(15, 'Et deleniti maiores eum consectetur facere inventore. Enim praesentium quo quia praesentium. Est voluptatem qui molestiae voluptas harum. Ut inventore impedit sequi vitae fugit aut est repellat.', 'Adipisci expedita fuga consequatur nobis aut suscipit iusto blanditiis. Magnam accusamus necessitatibus numquam et repellendus aut culpa consectetur. Et quod accusamus ut harum adipisci ab. Vero debitis nobis veniam quia cupiditate voluptates. Pariatur est doloremque eum voluptas incidunt vero quas et.', 'Latest News', 1, 'assets/images/blog/default_news_a.jpg', 1, '2020-07-13 09:41:03', '2020-09-28 06:49:00'),
(16, 'Animi dignissimos natus optio voluptatum officiis. Culpa aspernatur fugit nemo non officia.', 'Mollitia voluptatem est aut similique qui commodi vitae. Est in perspiciatis eligendi eveniet sunt. Quisquam error exercitationem odit aut.', 'Latest News', 1, 'assets/images/blog/default_news_a.jpg', 1, '2020-07-13 09:41:03', '2020-09-28 07:39:46'),
(17, 'Et sit quia veniam qui optio. Ut dolorum illum nemo error neque repellendus. Expedita atque consectetur consequatur.', 'Quas est architecto natus. Non libero repellat tempore ut excepturi recusandae a. Officiis repellendus aut neque aliquam. Tenetur aut placeat iure.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:41:03', '2020-07-13 09:41:03'),
(18, 'Dolor consequatur repudiandae molestias dolorum hic autem corrupti. Et dolores porro totam quidem sequi et. Ab voluptas soluta qui eum assumenda.', 'Dolor provident consequatur autem dicta qui aut. Est non assumenda provident ut. Eos maiores quos molestias alias maxime omnis nisi voluptatibus. Nisi vero quam incidunt ut nobis.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:41:03', '2020-07-13 09:41:03'),
(19, 'Perspiciatis officia qui rerum enim sit non debitis. Omnis nesciunt voluptas saepe optio labore. Dolore voluptatum qui exercitationem optio eum exercitationem.', 'Et assumenda non rerum et. Quibusdam et nam eos qui quia minima sit rerum. Perspiciatis velit impedit fuga magni voluptas voluptas blanditiis eius.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:41:03', '2020-07-13 09:41:03'),
(20, 'Sed eaque enim rerum sapiente dolorem porro aut. Rerum quae debitis deleniti quibusdam veniam. Delectus unde nulla rerum vel sed. Accusantium quae optio animi minus est sed.', 'Corporis est optio exercitationem nesciunt velit quos iste. Consectetur praesentium aliquid ipsa ducimus reiciendis.', '1', 1, 'assets/images/blog/default.png', 1, '2020-07-13 09:41:03', '2020-07-13 09:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `car_body_types`
--

CREATE TABLE `car_body_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_body_types`
--

INSERT INTO `car_body_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(5, 'suv', 1, '2022-05-10 12:16:42', '2022-05-10 12:16:42'),
(8, 'MUN', 1, '2022-05-10 16:45:43', '2022-05-10 16:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `car_brands`
--

CREATE TABLE `car_brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `image_url` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_brands`
--

INSERT INTO `car_brands` (`id`, `brand_name`, `image_url`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Maruthi', '', 1, '2022-05-10 10:26:30', '2022-05-10 10:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `car_fuel_types`
--

CREATE TABLE `car_fuel_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_fuel_types`
--

INSERT INTO `car_fuel_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Petroltext', 1, '2022-05-10 12:17:06', '2022-05-10 13:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `id` int(11) NOT NULL,
  `model_name` varchar(50) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `image_url` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`id`, `model_name`, `brand_id`, `image_url`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Swift', 9, '', 1, '2022-05-10 12:16:13', '2022-05-10 12:16:13'),
(5, 'Test', 9, '', 1, '2022-05-10 13:11:28', '2022-05-10 13:11:28'),
(6, 'A1 Model', 9, '', 1, '2022-05-10 15:56:53', '2022-05-10 15:56:53'),
(7, 'fg', 9, '', 1, '2022-05-27 14:51:50', '2022-05-27 14:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `car_transmission_types`
--

CREATE TABLE `car_transmission_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_transmission_types`
--

INSERT INTO `car_transmission_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Manual & Automatic (AMT)', 1, '2022-05-10 12:17:30', '2022-05-12 12:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `car_versions`
--

CREATE TABLE `car_versions` (
  `id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_versions`
--

INSERT INTO `car_versions` (`id`, `model_id`, `version`, `status`, `created_at`, `updated_at`) VALUES
(6, 4, 2021, 0, '2022-05-10 12:16:29', '2022-05-10 16:41:23'),
(7, 5, 2022, 1, '2022-05-10 13:12:20', '2022-05-10 13:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `house_serveys`
--

CREATE TABLE `house_serveys` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `street_id` int(11) NOT NULL,
  `house_hold_no` int(11) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `langitude` varchar(50) NOT NULL,
  `afi_id` int(11) NOT NULL,
  `ari_id` int(11) NOT NULL,
  `sari_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_08_141130_create_admins_table', 2),
(6, '2020_07_08_145603_create_permission_tables', 3),
(7, '2014_10_12_100000_create_password_resets_table', 4),
(8, '2019_02_02_112609_create_settings_table', 4),
(9, '2014_10_12_000000_create_users_table', 5),
(10, '2016_06_01_000001_create_oauth_auth_codes_table', 6),
(11, '2016_06_01_000002_create_oauth_access_tokens_table', 6),
(12, '2016_06_01_000003_create_oauth_refresh_tokens_table', 6),
(13, '2016_06_01_000004_create_oauth_clients_table', 6),
(14, '2016_06_01_000005_create_oauth_personal_access_clients_table', 6),
(16, '2020_07_12_220312_create_blogs_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('00030adbe699f7c5ff9998a9c11e9b3c365506d31e3fc12aca91db02765b288906453f421b6cff39', 1, 6, 'adminApiToken', '[]', 0, '2022-05-09 06:28:01', '2022-05-09 06:28:01', '2023-05-09 11:58:01'),
('010fc9ef0e5b8aad738f83a6caa1a6d21fcbe6fcfcbc5ac82cbd7a855776afb4bb3333f5e44d835f', 1, 6, 'adminApiToken', '[]', 0, '2022-04-21 05:37:28', '2022-04-21 05:37:28', '2023-04-21 11:07:28'),
('027ae400a8e608d36a65b1fcc48c85aec9f532a63339286a94fc5e06b1bc8b42e531232518a8118e', 1, 4, 'adminApiToken', '[]', 0, '2020-10-14 09:04:15', '2020-10-14 09:04:15', '2021-10-14 14:34:15'),
('04f1cdd795db1dfc5e874b74f56fdc7478324b32c068f733ed3d18cf05dec25b72bba97a165fb4d8', 1, 6, 'adminApiToken', '[]', 0, '2022-05-29 05:33:49', '2022-05-29 05:33:49', '2023-05-29 11:03:49'),
('0f707bace12531b78cdac9b025cbba47f9c6dbf8d93daa4d6c3d4940d99780fa917debbc4f5ff560', 1, 6, 'adminApiToken', '[]', 0, '2022-04-29 04:07:15', '2022-04-29 04:07:15', '2023-04-29 09:37:15'),
('15b0c203e0acc3981e00d2725e01a7e4fd7c8120992fd13a91ac0e5a96a917e0d93fa070be790160', 1, 6, 'adminApiToken', '[]', 0, '2022-05-04 07:19:47', '2022-05-04 07:19:47', '2023-05-04 12:49:47'),
('1820378d0f2c142219dfabc52c9b7684bc859691c42dd7934ffcea3537b20c842b9a5b1250625c2c', 1, 6, 'adminApiToken', '[]', 0, '2022-04-27 04:32:39', '2022-04-27 04:32:39', '2023-04-27 10:02:39'),
('19f093c86a96dc272608060afe74da06d9ab5f4d0c8d07fbebe4570fd1b9ec9a1044646635553ef3', 1, 6, 'adminApiToken', '[]', 0, '2022-05-04 10:44:15', '2022-05-04 10:44:15', '2023-05-04 16:14:15'),
('1b543e13687898b60cf077dfbbe9f6d83c5730ad06d34bd0e9326ff25e69491e6ac8a12ccd196b4b', 1, 6, 'adminApiToken', '[]', 0, '2022-04-26 05:48:59', '2022-04-26 05:48:59', '2023-04-26 11:18:59'),
('20e16b4c0b2289a2d8042242159a4f8e49f2714e33d5f6845d10e3c500a02440348b7662bb330ad5', 1, 6, 'adminApiToken', '[]', 0, '2022-04-26 04:51:36', '2022-04-26 04:51:36', '2023-04-26 10:21:36'),
('22175cc248cb18af8fa33c6ea81f4c44860f31617f160683fa06c28c0941eaaf06adba4b03d0e8e4', 1, 6, 'adminApiToken', '[]', 0, '2022-05-01 04:36:20', '2022-05-01 04:36:20', '2023-05-01 10:06:20'),
('263c780486fab8aa73034f4091bd0ac9a59488dffd873f2646b317333e88feb59031f610f13f2283', 1, 6, 'adminApiToken', '[]', 0, '2022-05-26 11:49:41', '2022-05-26 11:49:41', '2023-05-26 17:19:41'),
('2769caa72c1f5faa7eaa4f63faa85667ff66b21ed94c374f2bba90270fda1a75e21e93c97f3e2a54', 1, 6, 'adminApiToken', '[]', 0, '2022-07-20 08:00:22', '2022-07-20 08:00:22', '2023-07-20 13:30:22'),
('283286f44b38455b086fbd8455080771460d5120df9657ba54d57f6ad2e8c26a9a4ff30f22e362bc', 1, 6, 'adminApiToken', '[]', 0, '2022-05-24 05:12:51', '2022-05-24 05:12:51', '2023-05-24 10:42:51'),
('303b9e6019ec72e43bf8e5cd1c888ce2d4f7fe271b06fdcf87904bd2ecaf592e042e5f4b2bfd3e69', 1, 6, 'adminApiToken', '[]', 0, '2022-04-26 05:53:56', '2022-04-26 05:53:56', '2023-04-26 11:23:56'),
('32e169c1e64603ac024bf61246ffb66963d5a5c8b57b43b4f94eb45af20a297a9502fb5cbfa16909', 1, 6, 'adminApiToken', '[]', 0, '2022-05-06 11:22:16', '2022-05-06 11:22:16', '2023-05-06 16:52:16'),
('34cfca8b577333694edb5d4a43e45503ca2478f916462fe0c4d3c64a66dfb59f222dc11b06849cf7', 2, 1, 'userApiToken', '[]', 0, '2020-07-18 11:47:50', '2020-07-18 11:47:50', '2021-07-18 17:17:50'),
('3799c340353c18a1467e458d99b4fce22d421cfbd82fcb393046a52c857561b9d065b1b9bb35ad8d', 1, 6, 'adminApiToken', '[]', 0, '2022-05-06 04:20:11', '2022-05-06 04:20:11', '2023-05-06 09:50:11'),
('447a2f70f1bdb29a6931f2a7308363642292ab36556e7594366597dc6547eccdf1095605772b833b', 1, 6, 'adminApiToken', '[]', 0, '2022-04-26 05:52:53', '2022-04-26 05:52:53', '2023-04-26 11:22:53'),
('527a02e10dfb12bc5513cc6af4b30d6ca370895e5db83885393b5a8bda3ee12056465c85087c17ff', 1, 6, 'adminApiToken', '[]', 0, '2022-05-29 09:38:00', '2022-05-29 09:38:00', '2023-05-29 15:08:00'),
('5f7b4423510994e06703257ff7226c697b839a51e22ed178b5127a68cdfa6ad002bec044f094ba9a', 1, 6, 'adminApiToken', '[]', 0, '2022-05-23 06:18:22', '2022-05-23 06:18:22', '2023-05-23 11:48:22'),
('5ffb2783e00b8664798fb8ce49927ef82f05618df3a2179cd2dfed1e5c0e00a9f8600ebf9fe7836b', 1, 6, 'adminApiToken', '[]', 0, '2022-05-06 16:08:02', '2022-05-06 16:08:02', '2023-05-06 21:38:02'),
('642fba77f6c28b86d7d04e4e5eb56d816ee23c8fb4901b3e34806d7756d34d9046a409447e5218a4', 1, 6, 'adminApiToken', '[]', 0, '2022-05-28 06:39:21', '2022-05-28 06:39:21', '2023-05-28 12:09:21'),
('67cba7b98c79510c5fac62493938fa857b1cf00da731c40c852ec4949f04be06e0dd476a84d94f8f', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 10:50:50', '2020-09-27 10:50:50', '2021-09-27 16:20:50'),
('6ba12a89b78b3b63f4c4a5de4488eb035020b5cdc028e728e06830df93bed13955288bb1a384da1d', 1, 6, 'adminApiToken', '[]', 0, '2022-05-01 02:14:35', '2022-05-01 02:14:35', '2023-05-01 07:44:35'),
('708e8d828c1856a0bc933a68949d00aee19f329b80848952c48cf9dac682447c0a1235804c26653f', 1, 6, 'adminApiToken', '[]', 0, '2022-04-26 05:26:53', '2022-04-26 05:26:53', '2023-04-26 10:56:53'),
('750d5aabf7ba3048d88fffa07422c73781ec3c6abe047691d11e71d8fc48b2b70e3c9a018d0bf2aa', 1, 6, 'adminApiToken', '[]', 0, '2022-05-04 08:39:15', '2022-05-04 08:39:15', '2023-05-04 14:09:15'),
('7921d726eeb4418e7579a14991df966516afaafc185d41d76a59b935d1e72336404ecd70f8b33510', 1, 6, 'adminApiToken', '[]', 0, '2022-05-04 13:23:01', '2022-05-04 13:23:01', '2023-05-04 18:53:01'),
('819188c28c660bd3ffcd837697b79f7db97a89891885285f39c3745dcb576543fd4eceac117baab7', 1, 6, 'adminApiToken', '[]', 0, '2022-04-21 04:25:41', '2022-04-21 04:25:41', '2023-04-21 09:55:41'),
('880b208f0047cbec150644077d6bffabce1f33ea493a2d4fe5ce6ca706cacdc00be950496e5750d6', 1, 6, 'adminApiToken', '[]', 0, '2022-05-24 05:25:08', '2022-05-24 05:25:08', '2023-05-24 10:55:08'),
('8c4078bea4d31b1c102d8a2469181c08c185c08be9c1e1f0e49bcf7e0461a3877dabbf2ad6a9a0d6', 1, 6, 'adminApiToken', '[]', 0, '2022-05-25 07:28:27', '2022-05-25 07:28:27', '2023-05-25 12:58:27'),
('8d434e0b57626a23afd93373383aae511546397e2aead846294cdbf5bccdcf64d7ffa7026efb5077', 1, 6, 'adminApiToken', '[]', 0, '2022-04-26 15:56:30', '2022-04-26 15:56:30', '2023-04-26 21:26:30'),
('9a66bb3015a2751d4608c16ea387e7d6496d477f133f2d1a8516bb3a74f9145411ceb519cbc9f7b9', 1, 6, 'adminApiToken', '[]', 0, '2022-05-27 05:22:23', '2022-05-27 05:22:23', '2023-05-27 10:52:23'),
('9a6771bb1271ce1a5084986c93ee0ee2b4fcdf9fff0c0fe29f45842d239213d0c0eed45d14110ce0', 1, 6, 'adminApiToken', '[]', 0, '2022-05-05 09:14:32', '2022-05-05 09:14:32', '2023-05-05 14:44:32'),
('9cac807cde31be6822c2be6d3f1eba29238157b027327b5932862cd4610454a3fb627db720bb06b4', 1, 6, 'adminApiToken', '[]', 0, '2022-04-27 06:50:45', '2022-04-27 06:50:45', '2023-04-27 12:20:45'),
('a3bdbb9dfb26af8ce92b4b9a4167ec930032774772e6bcac3a396131c3de1674691574dd9240db0c', 2, 6, 'userApiToken', '[]', 0, '2022-05-06 16:06:28', '2022-05-06 16:06:28', '2023-05-06 21:36:28'),
('a419addf4ae7bea31145205699c7e95182f9c9957068f6e32554187ab3f7980bc5374635df10a69f', 1, 4, 'adminApiToken', '[]', 0, '2020-09-28 06:46:49', '2020-09-28 06:46:49', '2021-09-28 12:16:49'),
('a63a5ed742a080a9d8cf1379aa60e1ba0b0fbc087ffea1e858144bf92f87931119eedd334ace7ffb', 1, 4, 'adminApiToken', '[]', 0, '2020-10-15 05:50:50', '2020-10-15 05:50:50', '2021-10-15 11:20:50'),
('a6d3c2bca28bdd3bd63b76cda6058945d130c3b4406efff89dd30262140c90ba32463991ae7480ed', 1, 6, 'adminApiToken', '[]', 0, '2022-04-26 10:27:21', '2022-04-26 10:27:21', '2023-04-26 15:57:21'),
('ab09563fd805d57dc698103035caa419b87a8872d5058901a99919a6770865ef4d1eb0030b7a0f7c', 1, 1, 'userApiToken', '[]', 0, '2020-07-18 11:43:13', '2020-07-18 11:43:13', '2021-07-18 17:13:13'),
('aba07437dc75b1db27d0a72c0b746d54c715e5d5f6af5ef0916e52c51bcb4c5a84a3c8574ccedecc', 2, 6, 'userApiToken', '[]', 0, '2022-04-30 07:44:24', '2022-04-30 07:44:24', '2023-04-30 13:14:24'),
('b08f0b8b4168b499a2e742948248a09a148895c64c039e8e653c32a9eb9dc137843ae250b821b4a1', 1, 6, 'adminApiToken', '[]', 0, '2022-04-22 13:00:25', '2022-04-22 13:00:25', '2023-04-22 18:30:25'),
('b51eef7e4e4ecbe660c9d236df95df58d136cce33620f80c5723fe18279f8b40a98a565200a6478e', 1, 6, 'adminApiToken', '[]', 0, '2022-04-28 12:46:43', '2022-04-28 12:46:43', '2023-04-28 18:16:43'),
('b52a30c63cc1b340667df571077236c019d8f939efd1db0e941d3acffb7007d7cd87df157d117f4c', 1, 6, 'adminApiToken', '[]', 0, '2022-05-26 11:48:37', '2022-05-26 11:48:37', '2023-05-26 17:18:37'),
('b718f0e9d22bea92d0a5b684a2c1d4d46c3538ebbab8acb0c3fb955cce182b0775c48f572afadf5f', 1, 6, 'adminApiToken', '[]', 0, '2022-05-26 06:50:20', '2022-05-26 06:50:20', '2023-05-26 12:20:20'),
('b9a09cda50e25606427f0f179019becb6fecdbed95b2dc9362c82d26a53db53d4084d642a5496465', 1, 6, 'adminApiToken', '[]', 0, '2022-05-28 09:00:06', '2022-05-28 09:00:06', '2023-05-28 14:30:06'),
('bb42f06a00a887377a917efd4b8cc381c39b9a18d9d55ea457976b6deaab1b50a18f8545d407ddab', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 11:51:14', '2020-09-27 11:51:14', '2021-09-27 17:21:14'),
('bb9b42d96cb0b0969d4a5a4d86e9ff51b841cb0c6e3eb085c5ef332bac8072469e5202882738cbdc', 1, 6, 'adminApiToken', '[]', 0, '2022-05-10 06:07:19', '2022-05-10 06:07:19', '2023-05-10 11:37:19'),
('c30c00bae40d2bc79467db053b96a7418ecb5e319c009b6b5bb1d532dabfcd7754b50851e147da5f', 1, 6, 'adminApiToken', '[]', 0, '2022-04-21 05:29:36', '2022-04-21 05:29:36', '2023-04-21 10:59:36'),
('c83bf9c7e8434f8b38012833b7f88c53282f8b232c95df819b6e13bd26aa003646fc14331def3361', 1, 6, 'adminApiToken', '[]', 0, '2022-04-22 10:40:29', '2022-04-22 10:40:29', '2023-04-22 16:10:29'),
('c9b2414c2f00b9c6c97196a1ee88b99944690d7659b830bc7c244dd62e2bd4d7032a6b8c456b250d', 1, 6, 'adminApiToken', '[]', 0, '2022-05-12 06:57:28', '2022-05-12 06:57:28', '2023-05-12 12:27:28'),
('ca38db9878276cfcbace325421e859f4a8795af6f489f3f7ef7e2577f73237dd4b4a98d91b54a769', 2, 6, 'userApiToken', '[]', 0, '2022-05-02 10:30:57', '2022-05-02 10:30:57', '2023-05-02 16:00:57'),
('cd061cd3054a7641f3144d57bacbf0262f2cb18b05956c31d59632f4792daa9354a0dddd20f8fc04', 1, 6, 'adminApiToken', '[]', 0, '2022-05-09 09:20:54', '2022-05-09 09:20:54', '2023-05-09 14:50:54'),
('d9f29ed0d6be329356ca4be84dcae7fa56eeb89df4efbf9fcbe1dfdc882d9befe5abdc2dd9373383', 1, 4, 'Admin', '[]', 0, '2020-09-27 11:42:30', '2020-09-27 11:42:30', '2021-09-27 17:12:30'),
('dcf24d9385de348f6322373538b210a7596b880aa7def6aeec7a63e917cd6b8a003a035c9e9e4947', 1, 4, 'adminApiToken', '[]', 0, '2020-09-27 11:50:34', '2020-09-27 11:50:34', '2021-09-27 17:20:34'),
('dfad541b4c920e84aef7485ee136b1afb8938931f36c69f1d73b3128bfbe5054fb2ccbeb77a36bdc', 1, 6, 'adminApiToken', '[]', 0, '2022-05-04 07:18:15', '2022-05-04 07:18:15', '2023-05-04 12:48:15'),
('e1c17028f85def0aa7783be314af9bb09c2906c9ea1690addbac2e642ee9becfcfe11bb2568ce21e', 1, 6, 'adminApiToken', '[]', 0, '2022-04-22 15:50:08', '2022-04-22 15:50:08', '2023-04-22 21:20:08'),
('e2f9ad99efc73216d190ad33c280cd97679de5228bb8b99bb6facafa7e105accf039a023a449a62b', 1, 6, 'adminApiToken', '[]', 0, '2022-04-26 09:26:10', '2022-04-26 09:26:10', '2023-04-26 14:56:10'),
('ec826898bd4714700bbc968105f55d8f0819858600558098aa7604265b3a1d09cfb8a42a75e20240', 1, 6, 'adminApiToken', '[]', 0, '2022-05-05 05:24:48', '2022-05-05 05:24:48', '2023-05-05 10:54:48'),
('f0a41c177ac854689145cb3215c600271c87a4b24daf13987b19533780c9d5d6b086b665a45066c4', 1, 6, 'adminApiToken', '[]', 0, '2022-05-02 10:23:07', '2022-05-02 10:23:07', '2023-05-02 15:53:07'),
('f595da87e1caf1d5f5ebbff4fd007c7a25c04f27461935f50667f4a739af3e4a1ecefe3893a7ddf9', 2, 6, 'userApiToken', '[]', 0, '2022-04-29 12:02:27', '2022-04-29 12:02:27', '2023-04-29 17:32:27'),
('f6519f296274983e1d801c336b955e070f4e355e3193cea8d6ad6e6a52198d601488fd6d339eb25d', 1, 6, 'adminApiToken', '[]', 0, '2022-04-22 04:21:27', '2022-04-22 04:21:27', '2023-04-22 09:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel7 Boilerplate Personal Access Client', 'Ue8FQpWBQqhtri31cNsPRvbNewyfiQZV7oiGglm9', '', 'http://localhost', 1, 0, 0, '2020-07-12 16:10:52', '2020-07-12 16:10:52'),
(2, NULL, 'Laravel7 Boilerplate Password Grant Client', 'YnLJHdBV6qJSQHnAzCD4MAOVTpJ9sSmdnM8T78xY', 'users', 'http://localhost', 0, 1, 0, '2020-07-12 16:10:52', '2020-07-12 16:10:52'),
(3, NULL, 'Moblie Apps', 'ZlnWXAvjeW1CoeKWb6PXI2GfnvjZ3vxrNoQ045E1', 'users', 'http://localhost', 0, 1, 0, '2020-07-18 06:52:38', '2020-07-18 06:52:38'),
(4, NULL, 'Laravel 8 Boilerplate Personal Access Client', 'EE4IEqacN39YjXXXV5LWWzN3odRfeB5Wu9DA9Qfb', NULL, 'http://localhost', 1, 0, 0, '2020-09-26 12:28:06', '2020-09-26 12:28:06'),
(5, NULL, 'Laravel 8 Boilerplate Password Grant Client', 'PHyBfYRldhPzj3UGafU0nuEoh1xiARC9dJi316oe', 'users', 'http://localhost', 0, 1, 0, '2020-09-26 12:28:06', '2020-09-26 12:28:06'),
(6, NULL, 'Laravel Personal Access Client', 'JkQs9JTl9ryxYD9f9Y4iTxt051UhjHBVvGfmrJLb', NULL, 'http://localhost', 1, 0, 0, '2022-04-20 16:38:44', '2022-04-20 16:38:44'),
(7, NULL, 'Laravel Password Grant Client', 'VEKuHeXpMLuahleEnUqx1zyUB13w2aecP5iJx7HX', 'users', 'http://localhost', 0, 1, 0, '2022-04-20 16:38:44', '2022-04-20 16:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-12 16:10:52', '2020-07-12 16:10:52'),
(2, 4, '2020-09-26 12:28:06', '2020-09-26 12:28:06'),
(3, 6, '2022-04-20 16:38:44', '2022-04-20 16:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-view', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(2, 'role-create', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(3, 'role-edit', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(4, 'role-delete', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(5, 'permission-view', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(6, 'permission-create', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(7, 'permission-edit', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(8, 'permission-delete', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(9, 'user-view', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(10, 'user-create', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(11, 'user-edit', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(12, 'user-delete', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(13, 'blog-view', 'admin', '2020-07-13 14:07:29', '2020-07-13 14:07:29'),
(14, 'blog-create', 'admin', '2020-07-13 14:07:41', '2020-07-13 14:07:41'),
(15, 'blog-edit', 'admin', '2020-07-13 14:07:49', '2020-07-13 14:07:49'),
(16, 'blog-delete', 'admin', '2020-07-13 14:07:59', '2020-07-13 14:07:59'),
(17, 'operator-create', 'user', '2020-10-14 10:48:41', '2020-10-14 10:48:41'),
(18, 'range-create', 'user', '2020-10-15 05:52:11', '2020-10-15 05:52:11'),
(19, 'range-view', 'user', '2020-10-15 05:52:18', '2020-10-15 05:52:18'),
(20, 'range-edit', 'user', '2020-10-15 05:52:31', '2020-10-15 05:52:31'),
(21, 'range-delete', 'user', '2020-10-15 05:52:37', '2020-10-15 05:52:37'),
(22, 'User Add', 'user', '2022-04-28 12:50:18', '2022-04-28 12:50:18'),
(23, 'User Show', 'user', '2022-04-28 12:50:39', '2022-04-28 12:50:39'),
(24, 'UserEdit', 'user', '2022-04-28 12:51:14', '2022-04-28 12:51:14'),
(25, 'sample', 'admin', '2022-04-28 12:53:46', '2022-04-28 12:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `mobile_no` varchar(150) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `name`, `mobile_no`, `user_type_id`, `created_at`, `updated_at`) VALUES
(3, 'Dhana raj r', '6374112691', 1, '2022-04-27 05:00:13', '2022-04-27 05:22:03'),
(4, 'Harish', '9597402134', 1, '2022-04-27 05:32:05', '2022-04-27 05:32:05'),
(5, 'kamal', '7373170110', 1, '2022-04-27 10:40:30', '2022-04-27 10:40:30'),
(6, 'Ragavan', '6374112692', 1, '2022-05-04 07:20:25', '2022-05-04 07:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2020-07-08 09:57:14', '2020-07-08 09:57:14'),
(2, 'Operator', 'user', '2020-10-15 05:55:02', '2020-10-15 05:55:02'),
(3, 'A- Category', 'user', '2022-04-28 12:49:30', '2022-04-28 12:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(17, 3),
(18, 2),
(18, 3),
(19, 2),
(19, 3),
(20, 2),
(20, 3),
(21, 2),
(21, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `eiin` varchar(255) DEFAULT NULL,
  `pabx` varchar(255) DEFAULT NULL,
  `reg` varchar(255) DEFAULT NULL,
  `stablished` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT 'assets/images/logo/favicon.png',
  `social_facebook` varchar(255) DEFAULT 'https://www.facebook.com/',
  `social_twitter` varchar(255) DEFAULT 'https://www.twitter.com/',
  `social_linkedin` varchar(255) DEFAULT 'https://www.linkedin.com/',
  `social_google` varchar(255) DEFAULT 'https://www.google.com/',
  `social_youtube` varchar(255) DEFAULT 'https://www.youtube.com/',
  `layout` varchar(255) NOT NULL DEFAULT '1',
  `maps` text DEFAULT NULL,
  `running_year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `slogan`, `eiin`, `pabx`, `reg`, `stablished`, `email`, `contact`, `address`, `website`, `logo`, `favicon`, `social_facebook`, `social_twitter`, `social_linkedin`, `social_google`, `social_youtube`, `layout`, `maps`, `running_year`, `created_at`, `updated_at`) VALUES
(1, 'Laravel Boilerplate', 'Knowledge is Power', '123', '123', '12345', '2013', 'riyadhahmed777@gmail.com', '+8801531117886', 'Chattogram, Bangladesh', 'http://riyadh.com/', 'assets/images/logo/1598681688.png', 'assets/images/logo/1571036986.png', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.linkedin.com/', 'https://www.google.com/', 'https://www.youtube.com/', '0', NULL, '2019-2020', '2020-10-14 09:59:11', '2020-10-14 09:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `streets`
--

CREATE TABLE `streets` (
  `id` int(11) NOT NULL,
  `ward_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `streets`
--

INSERT INTO `streets` (`id`, `ward_id`, `name`, `area`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Valluvar Street', 'Mullai Nagar', 1, NULL, '2022-04-27 17:36:31'),
(2, 4, 'renga street', 'Amma Mandapam', 1, '2022-04-27 17:15:13', '2022-04-27 17:36:52'),
(3, 3, 'Main Street', 'Lic Colony Back Side', 1, '2022-04-27 17:34:15', '2022-04-27 17:37:20'),
(4, 1, 'new street', 'kajamalai main road,tvs nagar', 1, '2022-04-27 17:39:07', '2022-04-27 17:39:07'),
(5, 6, 'BUTP 1', 'BUTP', 1, '2022-05-04 12:51:59', '2022-05-04 12:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `person_id` int(11) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`person_id`, `id`, `name`, `mobile_no`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 2, 'Dhana raj r', '6374112691', 'dhana7927@gmail.com', NULL, '$2y$10$Q/C/gF0O.KzTorLOg41ucuF866MABJhGi08h4cQjZFJ/JQxtRwig.', 1, NULL, '2022-04-27 05:00:13', '2022-04-27 05:22:03'),
(4, 3, 'Harish', '9597402134', NULL, NULL, '$2y$10$vp.xUJQdFeCAdYH4P34.NeakHBX17fMvhD0RK.R2FZxp8ahDo.Ml2', 0, NULL, '2022-04-27 05:32:05', '2022-04-27 10:40:43'),
(5, 4, 'kamal', '7373170110', NULL, NULL, '$2y$10$R75.OPIQLPS1U5kJTe443eIcCmr4JEHzs4Cc0/O560jK5fRqpwK.e', 1, NULL, '2022-04-27 10:40:30', '2022-04-27 10:40:30'),
(6, 5, 'Ragavan', '6374112692', NULL, NULL, '$2y$10$9lAEcMyy.cOwjL3QZcQjo.CEgkShN5OGY1CckpaxV4GJApWcFBK26', 0, NULL, '2022-05-04 07:20:26', '2022-05-04 07:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` int(11) UNSIGNED NOT NULL,
  `zone_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `zone_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ward1', 1, NULL, '2022-04-27 15:56:02'),
(2, 1, 'Ward2', 1, NULL, '2022-04-27 16:06:13'),
(3, 1, 'Ward3', 1, NULL, '2022-04-27 16:06:20'),
(4, 4, 'ward 32', 1, '2022-04-27 15:44:00', '2022-04-27 15:44:00'),
(5, 4, 'ward28', 1, '2022-04-27 16:15:16', '2022-04-27 16:15:28'),
(6, 9, 'TVS  NAGAR', 1, '2022-05-04 12:51:17', '2022-05-04 12:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Srirangam', 0, NULL, '2022-05-04 12:48:50'),
(3, 'Ponmalai', 1, NULL, '2022-04-27 13:00:52'),
(4, 'KK Nagar', 1, NULL, '2022-04-27 13:01:02'),
(5, 'Thiruverumpur', 1, NULL, '2022-04-27 13:01:09'),
(7, 'Ward5', 1, '2022-04-27 15:39:48', '2022-04-27 15:39:48'),
(8, 'kajamalai', 0, '2022-04-27 16:14:10', '2022-04-27 16:14:22'),
(9, 'Kajamalai', 1, '2022-05-04 12:50:58', '2022-05-04 12:50:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bike_body_types`
--
ALTER TABLE `bike_body_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bike_brands`
--
ALTER TABLE `bike_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bike_fuel_types`
--
ALTER TABLE `bike_fuel_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bike_models`
--
ALTER TABLE `bike_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_body_types`
--
ALTER TABLE `car_body_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_brands`
--
ALTER TABLE `car_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_fuel_types`
--
ALTER TABLE `car_fuel_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_transmission_types`
--
ALTER TABLE `car_transmission_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_versions`
--
ALTER TABLE `car_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_serveys`
--
ALTER TABLE `house_serveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_email_unique` (`email`);

--
-- Indexes for table `streets`
--
ALTER TABLE `streets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ward_id` (`ward_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bike_body_types`
--
ALTER TABLE `bike_body_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bike_brands`
--
ALTER TABLE `bike_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bike_fuel_types`
--
ALTER TABLE `bike_fuel_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bike_models`
--
ALTER TABLE `bike_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `car_body_types`
--
ALTER TABLE `car_body_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `car_fuel_types`
--
ALTER TABLE `car_fuel_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `car_transmission_types`
--
ALTER TABLE `car_transmission_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `car_versions`
--
ALTER TABLE `car_versions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `house_serveys`
--
ALTER TABLE `house_serveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `streets`
--
ALTER TABLE `streets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `streets`
--
ALTER TABLE `streets`
  ADD CONSTRAINT `streets_ibfk_1` FOREIGN KEY (`ward_id`) REFERENCES `wards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
