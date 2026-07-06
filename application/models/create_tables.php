-- --------------------------------------------------------
-- Table structure for module data
-- --------------------------------------------------------
CREATE TABLE `modules` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `difficulty` enum('beginner','intermediate','advanced') NOT NULL,
  `language` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `icon_color` varchar(7) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;