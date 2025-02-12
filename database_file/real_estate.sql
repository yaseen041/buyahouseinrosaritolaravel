-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2025 at 10:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `permissions` varchar(255) DEFAULT NULL,
  `type` tinyint(4) DEFAULT 1 COMMENT '0= super_admin, 1 = staff user',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = inactive, 1 = active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `phone_no`, `permissions`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$12$3a8mjCQxD54t89r/w7STAOl3xBFdmmByfEj70DV92knLbkdNfaLU6', NULL, NULL, 0, 1, '2022-04-15 12:25:42', '2023-12-26 12:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `designation`, `phone`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Emma Brown', 'Senior Real Estate Agent', '+1 (555) 123-4567', '1718273923.jpg', 'With over 10 years of experience in the New York real estate market, I specialize in luxury apartments and commercial properties.', '2024-06-13 10:18:43', '2024-06-13 10:18:43'),
(2, 'James Johnson', 'Property Consultant', '+61 1234 5678', '1718273968.jpg', 'I have a passion for matching clients with their dream homes in Sydney. Let me help you find the perfect property.', '2024-06-13 10:19:28', '2024-06-13 10:19:28'),
(3, 'Sarah White', 'Real Estate Broker', '+1 (415) 987-6543', '1718274018.jpg', 'Based in San Francisco, I provide personalized service to ensure smooth transactions and happy clients.', '2024-06-13 10:20:18', '2024-06-13 10:20:18'),
(4, 'Lucas Silva', 'Senior Sales Manager', '+55 11 98765-4321', '1718274057.jpg', 'Com vasta experiência no mercado imobiliário de São Paulo, estou aqui para ajudá-lo a encontrar sua nova casa', '2024-06-13 10:20:57', '2024-06-13 10:20:57'),
(5, 'Takahiro Yamamoto', 'Property Specialist', '+81 90-1234-5678', '1718274102.jpg', '東京の不動産市場に精通しており、あなたのニーズに合った理想の物件を見つけるのをお手伝いします', '2024-06-13 10:21:42', '2024-06-13 10:21:42'),
(6, 'Anna Müller', 'Real Estate Advisor', '+49 30 12345678', '1718274148.jpg', 'Ich biete Ihnen umfassende Beratung beim Kauf oder Verkauf Ihrer Immobilie in Berlin. Kontaktieren Sie mich gerne!', '2024-06-13 10:22:28', '2024-06-13 10:22:28'),
(7, 'Carlos González', 'Property Manager', '+52 55 1234 5678', '1718274185.jpg', 'Con más de 15 años de experiencia en el mercado inmobiliario de la Ciudad de México, estoy aquí para ayudarte con tus necesidades.', '2024-06-13 10:23:05', '2024-06-13 10:23:05'),
(8, 'Julia Schmidt', 'Real Estate Agent', '+49 89 87654321', '1718274222.jpg', 'Als Immobilienmaklerin in München bringe ich Sie in Ihr neues Zuhause. Kontaktieren Sie mich für professionelle Beratung.', '2024-06-13 10:23:42', '2024-06-13 10:23:42'),
(9, 'Diego Fernandez', 'Senior Property Consultant', '+54 11 8765-4321', '1718274259.jpg', 'Con amplia experiencia en el mercado inmobiliario de Buenos Aires, estoy aquí para ayudarlo a encontrar la propiedad perfecta.', '2024-06-13 10:24:19', '2024-06-13 10:24:19'),
(10, 'Sophie Dupont', 'Real Estate Broker', '+33 1 2345 6789', '1718274307.jpg', 'Fort de nombreuses années d\'expérience dans le marché immobilier de Paris, je suis à votre service pour trouver votre futur chez-vous.', '2024-06-13 10:25:07', '2024-06-13 10:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 = Draft, 1 = Published',
  `meta_title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `fb_image` text DEFAULT NULL,
  `fb_title` text DEFAULT NULL,
  `fb_description` text DEFAULT NULL,
  `twitter_title` text DEFAULT NULL,
  `twitter_description` text DEFAULT NULL,
  `twitter_image` text DEFAULT NULL,
  `json_ld_code` text DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `parent_id`, `title`, `category_id`, `description`, `author_id`, `slug`, `featured_image`, `status`, `meta_title`, `meta_description`, `meta_keywords`, `fb_image`, `fb_title`, `fb_description`, `twitter_title`, `twitter_description`, `twitter_image`, `json_ld_code`, `publish_date`, `created_at`, `updated_at`) VALUES
(15, NULL, 'LI', 3, '<p>LI</p><figure class=\"image\"><img style=\"aspect-ratio:500/500;\" src=\"http://localhost/realestate/public/ckeditor-uploads/Modern Real Estate Agency Logo Template_1736760478.png\" width=\"500\" height=\"500\"></figure>', 1, 'li', 'helical pier service-1736760618.jpg', 1, 'LI', 'LI', 'LI', 'helical pier service-1736760618.jpg', 'LI', 'LI', 'LI', 'LI', 'helical pier service-1736760618.jpg', '{\r\n  \"@context\": \"https://schema.org\",\r\n  \"@type\": \"Article\",\r\n  \"headline\": \"LI\",\r\n  \"description\": \"LI\",\r\n  \"author\": {\r\n    \"@type\": \"Person\",\r\n    \"name\": \"Defense Claims\"\r\n  },\r\n  \"publisher\": {\r\n    \"@type\": \"Organization\",\r\n    \"name\": \"Defense Claims\",\r\n    \"logo\": {\r\n      \"@type\": \"ImageObject\",\r\n      \"url\": \"https://defenseclaims.com/assets/images/fav.jpg\"\r\n    }\r\n  },\r\n  \"datePublished\": \"2025-01-13\",\r\n  \"mainEntityOfPage\": {\r\n    \"@type\": \"WebPage\",\r\n    \"@id\": \"https://defenseclaims.com/li\"\r\n  }\r\n}', '2025-01-13 09:28:47', '2025-01-13 04:28:47', '2025-01-13 04:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Loans', NULL, NULL, '2024-12-10 07:40:03', '2024-12-10 07:40:03'),
(2, 'Predatory Student', NULL, 1, '2024-12-10 07:40:18', '2024-12-10 07:40:18'),
(3, 'Predatory Schools', NULL, 1, '2024-12-10 07:40:46', '2024-12-10 07:40:46'),
(4, 'Test Category 2', NULL, 1, '2024-12-23 13:13:54', '2025-01-13 03:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `slug`, `state`, `country`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Rosarito', 'rosarito', 'Baja California', 'Mexico', '2024-06-13 07:18:33', '2024-06-13 07:18:33', NULL),
(2, 'Los Angeles', 'los-angeles', 'California', 'United States', '2024-06-13 07:25:28', '2024-06-13 07:25:28', NULL),
(3, 'Washington, DC', 'washington-dc', 'Fedral Territory', 'United States', '2025-01-16 03:54:48', '2025-01-16 04:28:39', '1737019719.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1: Interior Feature, 2: Exterior Finish, 3: Featured Amenities, 4: Appliances, 5: Views, 6: Heating, 7: Cooling, 8: Roof, 9: Sewer-Water Systems, 10: Extra Features',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0: Inactive, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `slug`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tiles', 'tiles', 1, 1, '2024-06-13 07:38:31', '2024-06-13 07:38:31'),
(2, 'Swimming Pool', 'swimming-pool', 3, 1, '2024-06-13 07:39:03', '2024-06-13 07:39:03'),
(3, 'Tennis Court', 'tennis-court', 3, 1, '2024-06-13 07:39:14', '2024-06-13 07:39:14'),
(4, 'Gated Community', 'gated-community', 3, 1, '2024-06-13 07:39:25', '2024-06-13 07:39:25'),
(5, 'Stove', 'stove', 4, 1, '2024-06-13 07:39:45', '2024-06-13 07:39:45'),
(6, 'Dishwasher', 'dishwasher', 4, 1, '2024-06-13 07:39:56', '2024-06-13 07:39:56'),
(7, 'Washer', 'washer', 4, 1, '2024-06-13 07:40:06', '2024-06-13 07:40:06'),
(8, 'Refrigerator', 'refrigerator', 4, 1, '2024-06-13 07:40:16', '2024-06-13 07:40:16'),
(9, 'Microwave', 'microwave', 4, 1, '2024-06-13 07:40:26', '2024-06-13 07:40:26'),
(10, 'Panoramic', 'panoramic', 5, 1, '2024-06-13 07:40:46', '2024-06-13 07:40:46'),
(11, 'Oceanfront', 'oceanfront', 5, 1, '2024-06-13 07:40:55', '2024-06-13 07:40:55'),
(12, 'Downtown', 'downtown', 5, 1, '2024-06-13 07:41:04', '2024-06-13 07:41:04'),
(13, 'Oceanview', 'oceanview', 5, 1, '2024-06-13 07:41:18', '2024-06-13 07:41:18'),
(14, 'Waterview', 'waterview', 5, 1, '2024-06-13 07:41:27', '2024-06-13 07:41:27'),
(15, 'Waterfront', 'waterfront', 5, 1, '2024-06-13 07:41:36', '2024-06-13 07:41:36'),
(16, 'Central Electric', 'central-electric', 6, 1, '2024-06-13 07:41:50', '2024-06-13 07:41:50'),
(17, 'Ceiling Fan', 'ceiling-fan', 7, 1, '2024-06-13 07:42:00', '2024-06-13 07:42:00'),
(18, 'Public', 'public', 9, 1, '2024-06-13 07:42:15', '2024-06-13 07:42:15'),
(19, 'City Water', 'city-water', 9, 1, '2024-06-13 07:42:24', '2024-06-13 07:42:24'),
(20, 'Lobby', 'lobby', 10, 1, '2024-06-13 07:42:44', '2024-06-13 07:42:44'),
(21, 'Cable TV Available', 'cable-tv-available', 10, 1, '2024-06-13 07:43:07', '2024-06-13 07:43:07'),
(22, 'Furnished', 'furnished', 10, 1, '2024-06-13 07:43:15', '2024-06-13 07:43:15'),
(23, 'Controlled Access', 'controlled-access', 10, 1, '2024-06-13 07:43:22', '2024-06-13 07:43:22'),
(24, 'Wheelchair Access', 'wheelchair-access', 10, 1, '2024-06-13 07:43:29', '2024-06-13 07:43:29'),
(25, 'Covered Parking', 'covered-parking', 10, 1, '2024-06-13 07:43:37', '2024-06-13 07:43:37'),
(26, 'High Speed Internet available', 'high-speed-internet-available', 10, 1, '2024-06-13 07:43:45', '2024-06-13 07:43:45'),
(27, 'Public Transportation', 'public-transportation', 10, 1, '2024-06-13 07:43:53', '2024-06-13 07:43:53'),
(28, 'Floodlights', 'floodlights', 2, 1, '2024-06-13 07:45:56', '2024-06-13 07:45:56'),
(29, 'Pathway lights', 'pathway-lights', 2, 1, '2024-06-13 07:46:34', '2024-06-13 07:46:34'),
(30, 'Metal', 'metal', 8, 1, '2024-06-13 07:47:09', '2024-06-13 07:47:09'),
(31, 'Slate', 'slate', 8, 1, '2024-06-13 07:47:19', '2024-06-13 07:47:19'),
(32, 'Asphalt shingles', 'asphalt-shingles', 8, 1, '2024-06-13 07:47:29', '2024-06-13 07:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `home_evals`
--

CREATE TABLE `home_evals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `year_built` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `bedroom` varchar(255) DEFAULT NULL,
  `bathroom` varchar(255) DEFAULT NULL,
  `half_bathroom` varchar(255) DEFAULT NULL,
  `has_suite` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: No, 2: Yes, 3: Potential',
  `garage` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: N/A, 1: 1, 2: 2, 3: 3, 4: 4, 5: 5+',
  `garage_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: Attached, 2: Detached',
  `basement_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: None, 2: Full, 3: Partial, 4: Crawl, 5: Walkout',
  `dev_lvl` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: None, 2: 25%, 3: 50%, 4: 75%, 5: Complete',
  `move_plan` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: 1 Month, 2: 3 Month, 3: 6 Month, 4: 1 Year, 5: 2+ Years',
  `notes` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: New, 2: Contacted, 3: Closed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_evals`
--

INSERT INTO `home_evals` (`id`, `fname`, `lname`, `email`, `phone`, `address`, `city`, `state`, `zip`, `year_built`, `size`, `bedroom`, `bathroom`, `half_bathroom`, `has_suite`, `garage`, `garage_type`, `basement_type`, `dev_lvl`, `move_plan`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', '+19871234519', '221 Bakers Street', 'New York City', 'New York', '10001', '2017', '1280', '4', '3', '1', 2, 1, 1, 3, 5, 3, 'Wondering what your home is worth? I would be happy to help you in whatever way I can. The articles and resources on this page are complimentary and part of the many services I offer.', 1, '2024-06-13 13:20:09', '2024-06-13 13:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2024_06_03_112734_create_neighborhoods_table', 2),
(26, '2024_06_03_113828_create_features_table', 2),
(27, '2024_06_03_122537_create_types_table', 2),
(28, '2024_06_03_122834_create_properties_table', 2),
(29, '2024_06_04_053629_create_property_features_table', 2),
(30, '2024_06_04_053907_create_property_types_table', 2),
(31, '2024_06_04_111142_add_code_field_to_neighborhoods_table', 2),
(32, '2024_06_04_115901_add_fields_to_neighborhoods_table', 2),
(33, '2024_06_07_052015_add_fields_to_properties_table', 2),
(34, '2024_06_09_202726_add_fields_to_neighborhoods_table', 2),
(35, '2024_06_10_064724_add_banner_field_to_types_table', 2),
(36, '2024_06_10_070540_add_isfeatured_to_properties_table', 2),
(37, '2024_06_10_111105_create_testimonials_table', 2),
(38, '2024_06_10_114806_create_agents_table', 2),
(39, '2024_06_10_123615_add_short_description_to_properties_table', 2),
(40, '2024_06_10_131450_create_home_evals_table', 2),
(41, '2024_06_11_045819_add_views_column_to_properties_table', 2),
(42, '2024_06_11_085327_create_cities_table', 2),
(43, '2024_06_11_193516_create_search_saves_table', 2),
(44, '2024_06_12_135144_add_fields_to_neighborhoods_table', 2),
(45, '2025_01_16_084544_add_image_field_to_cities_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `neighborhoods`
--

CREATE TABLE `neighborhoods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0: Inactive, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amenity_icon1` varchar(255) DEFAULT NULL,
  `amenity_icon2` varchar(255) DEFAULT NULL,
  `amenity_icon3` varchar(255) DEFAULT NULL,
  `amenity_title1` varchar(255) DEFAULT NULL,
  `amenity_title2` varchar(255) DEFAULT NULL,
  `amenity_title3` varchar(255) DEFAULT NULL,
  `amenity_desc1` text DEFAULT NULL,
  `amenity_desc2` text DEFAULT NULL,
  `amenity_desc3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `neighborhoods`
--

INSERT INTO `neighborhoods` (`id`, `title`, `slug`, `code`, `banner`, `zip`, `country`, `state`, `city`, `map`, `longitude`, `latitude`, `images`, `description`, `status`, `created_at`, `updated_at`, `amenity_icon1`, `amenity_icon2`, `amenity_icon3`, `amenity_title1`, `amenity_title2`, `amenity_title3`, `amenity_desc1`, `amenity_desc2`, `amenity_desc3`) VALUES
(2, 'Calafia', 'calafia97', 'C32', 'C321718265390.jpg', '20710', 'Mexico', 'Baja California', 'Rosarito', NULL, '-117.06544088536376', '32.35930490692262', '\"[\\\"7491718265212.jpg\\\",\\\"3971718265212.jpg\\\",\\\"8641718265213.jpg\\\"]\"', '<h2 style=\"margin-left:0px;\"><strong>Location and Accessibility</strong></h2><p style=\"margin-left:0px;\">Calafia is situated a few minutes south of Rosarito and approximately 40 minutes from the United States border at San Diego. Its strategic location offers dual benefits – the joy of living in beautiful Mexico and the convenience of accessing the United States effortlessly.Known as the “Jewels” of Rosarito Beach, La Jolla residents enjoy fine dining, boutiques, &amp; art galleries all surrounded by beautiful ocean coastline views.</p><p style=\"margin-left:0px;\">La Jolla Excellence is a highly esteemed oceanfront gated community celebrated for its luxury, quality &amp; prestige.<br>Real estate opportunities here are diverse, ranging from upscale moderately priced condos to luxurious 7 figure townhouses nestled right off a year round sandy beach.</p><p style=\"margin-left:0px;\">THE SIZE AND LAYOUT OF THE PROPERTY<br>If it’s space you’re looking for in a home while still enjoying the best a condominium community offers, then you’ve found the right place.<br>This true single-story home expertly tailors contemporary luxuries &amp; modern conveniences across a whopping 2,500 SqFt that include 3 abundant sized bedrooms, a voluminous sized kitchen, &amp; a spacious two car garage. The best part is its oversized balcony where you can doze off in the neverending Pacific Ocean views.</p><p style=\"margin-left:0px;\">What makes this even better is that if you hurry you can still be in time to select your color floors, quartz, cabinetry amongst other things. You may also be in time to customize to your very own liking.</p><p style=\"margin-left:0px;\">INSIDE THE GATED COMMUNITY<br>Lush gardens, access to 2 semi private beaches &amp; 5 star resort amenities liven up this gated oceanfront development. The privileged residential resort was engineered to accommodate refined construction in a key strategic location, thereby enabling effortless comforts &amp; imaginable unperturbed luxuries.</p><figure class=\"image image-style-align-left image_resized\" style=\"width:45.24%;\"><img style=\"aspect-ratio:2048/1536;\" src=\"https://explorelogicsit.net/propertydealership/public/ckeditor-uploads/IMG_8805-scaled_1718265319.jpg\" width=\"2048\" height=\"1536\"></figure><p style=\"margin-left:0px;\"><br>Among the countless features the development offers:<br>– Access to 2 semi-private beaches<br>– Indoor &amp; Outdoor pools<br>– Jacuzzis<br>– Saunas<br>– Ocean view gym<br>– Clubhouse for events; equipped with fully functional kitchens<br>– Multiple sports courts<br>– Lush gardens<br>– Secure gated access<br>– 24 / 7 round the clock manned security</p><p style=\"margin-left:0px;\">LOCATION, LOCATION, LOCATION<br>Located less than 3 minutes from downtown Rosarito, yet worlds apart from the busy hustle and bustle of the tourist-centric nightlife…<br>Outside the 24 hour secure gated community there are over a dozen stores and restaurants within a 3 block walking distance radius.<br>As well as round the clock convenience stores &amp; multiple gas stations. This area pampers you with all commodities one could desire.</p><p style=\"margin-left:0px;\">La Jolla Excellence is only a 35-minute straight shot south of the San Diego border if crossing by car.<br>Or breeze on through the express border crossing at the Tijuana airport and UBER or Taxi over to your home in less than 45 minutes.</p><p style=\"margin-left:0px;\">A picturesque 45 minute drive south down Baja’s golden coast will land you down in Mexico’s very own Napa valley. Known around the world as “Valle de Guadalupe” *Pronounced (Va-Ye) in Spanish.</p><p style=\"margin-left:0px;\">TITLE OF THE PROPERTY<br>This property is not yet constructed &amp; is anticipated for delivery in late 2024.<br>This villa will be sold new and unfurnished It will include all new stainless steel kitchen appliances.<br>This sale is through a cession of rights.</p><p style=\"margin-left:0px;\">TERMS OF THE SALE<br>Financing is not available for this property at this time.<br>If you require financing please contact your preferred lender prior to scheduling a viewing.</p><p style=\"margin-left:0px;\">VIEWING THIS PROPERTY<br>A similar property is available to view by appointment only.<br>We ask that you do your best to coordinate a viewing with at least 24 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule on a case by case basis and we may ask for proof of funds before a showing.</p><p style=\"margin-left:0px;\">** Please note all pictures of villa are for illustration purposes only and the villa shown has upgrades**</p><p style=\"margin-left:0px;\">*PRICE IS DISPLAYED IN U.S. DOLLARS BUT PURCHASE WILL BE REGISTERED IN MEXICAN PESOS AT THE CURRENT EXCHANGE RATE AT THE TIME OF CLOSING*</p><p style=\"margin-left:0px;\">*Disclaimer: Information is deemed to be correct but not guaranteed*</p>', 1, '2024-06-13 07:56:08', '2024-06-13 07:56:30', 'C7011718265368.jpg', 'C7021718265368.jpg', 'C7031718265368.jpg', 'oceanfront', 'For relaxation', 'Pools', 'Calafia is situated a few minutes south of Rosarito and approximately 40 minutes from the United States border at San Diego.', 'Calafia is situated a few minutes south of Rosarito and approximately 40 minutes from the United States border at San Diego.', 'Calafia is situated a few minutes south of Rosarito and approximately 40 minutes from the United States border at San Diego.'),
(3, 'Club Marena', 'club-marena46', 'CM7', 'CM71718265604.jpg', '20710', 'United States', 'California', 'Los Angeles', NULL, '-117.04913305455321', '32.3498791695025', '\"[\\\"1521718265468.jpg\\\",\\\"6661718265468.jpg\\\",\\\"5801718265469.jpg\\\"]\"', '<h1 style=\"margin-left:0px;text-align:center;\"><strong>Club Marena</strong></h1><p style=\"margin-left:0px;\">Known as the “Jewels” of Rosarito Beach, La Jolla residents enjoy fine dining, boutiques, &amp; art galleries all surrounded by beautiful ocean coastline views.</p><p style=\"margin-left:0px;\">La Jolla Excellence is a highly esteemed oceanfront gated community celebrated for its luxury, quality &amp; prestige.<br>Real estate opportunities here are diverse, ranging from upscale moderately priced condos to luxurious 7 figure townhouses nestled right off a year round sandy beach.</p><p style=\"margin-left:0px;\">THE SIZE AND LAYOUT OF THE PROPERTY<br>If it’s space you’re looking for in a home while still enjoying the best a condominium community offers, then you’ve found the right place.<br>This true single-story home expertly tailors contemporary luxuries &amp; modern conveniences across a whopping 2,500 SqFt that include 3 abundant sized bedrooms, a voluminous sized kitchen, &amp; a spacious two car garage. The best part is its oversized balcony where you can doze off in the neverending Pacific Ocean views.</p><p style=\"margin-left:0px;\">What makes this even better is that if you hurry you can still be in time to select your color floors, quartz, cabinetry amongst other things. You may also be in time to customize to your very own liking.</p><p><img class=\"image_resized image-style-align-right\" style=\"aspect-ratio:2560/1920;width:50%;\" src=\"https://explorelogicsit.net/propertydealership/public/ckeditor-uploads/IMG_8822-scaled_1718265490.jpg\" width=\"2560\" height=\"1920\"></p><p style=\"margin-left:0px;\">INSIDE THE GATED COMMUNITY<br>Lush gardens, access to 2 semi private beaches &amp; 5 star resort amenities liven up this gated oceanfront development. The privileged residential resort was engineered to accommodate refined construction in a key strategic location, thereby enabling effortless comforts &amp; imaginable unperturbed luxuries.<br>Among the countless features the development offers:<br>– Access to 2 semi-private beaches<br>– Indoor &amp; Outdoor pools<br>– Jacuzzis<br>– Saunas<br>– Ocean view gym<br>– Clubhouse for events; equipped with fully functional kitchens<br>– Multiple sports courts<br>– Lush gardens<br>– Secure gated access<br>– 24 / 7 round the clock manned security</p><p style=\"margin-left:0px;\">LOCATION, LOCATION, LOCATION<br>Located less than 3 minutes from downtown Rosarito, yet worlds apart from the busy hustle and bustle of the tourist-centric nightlife…<br>Outside the 24 hour secure gated community there are over a dozen stores and restaurants within a 3 block walking distance radius.<br>As well as round the clock convenience stores &amp; multiple gas stations. This area pampers you with all commodities one could desire.</p><p style=\"margin-left:0px;\">La Jolla Excellence is only a 35-minute straight shot south of the San Diego border if crossing by car.<br>Or breeze on through the express border crossing at the Tijuana airport and UBER or Taxi over to your home in less than 45 minutes.</p><p style=\"margin-left:0px;\">A picturesque 45 minute drive south down Baja’s golden coast will land you down in Mexico’s very own Napa valley. Known around the world as “Valle de Guadalupe” *Pronounced (Va-Ye) in Spanish.</p><p style=\"margin-left:0px;\">TITLE OF THE PROPERTY<br>This property is not yet constructed &amp; is anticipated for delivery in late 2024.<br>This villa will be sold new and unfurnished It will include all new stainless steel kitchen appliances.<br>This sale is through a cession of rights.</p><p style=\"margin-left:0px;\">TERMS OF THE SALE<br>Financing is not available for this property at this time.<br>If you require financing please contact your preferred lender prior to scheduling a viewing.</p><p style=\"margin-left:0px;\">VIEWING THIS PROPERTY<br>A similar property is available to view by appointment only.<br>We ask that you do your best to coordinate a viewing with at least 24 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule on a case by case basis and we may ask for proof of funds before a showing.</p><p style=\"margin-left:0px;\">** Please note all pictures of villa are for illustration purposes only and the villa shown has upgrades**</p><p style=\"margin-left:0px;\">*PRICE IS DISPLAYED IN U.S. DOLLARS BUT PURCHASE WILL BE REGISTERED IN MEXICAN PESOS AT THE CURRENT EXCHANGE RATE AT THE TIME OF CLOSING*</p><p style=\"margin-left:0px;\">*Disclaimer: Information is deemed to be correct but not guaranteed*</p>', 1, '2024-06-13 08:00:04', '2024-06-13 08:00:04', 'CM711718265604.jpg', 'CM721718265604.jpg', 'CM731718265604.jpg', 'Location', 'Accessibility', 'Infrastructure', 'Club Marena is a prestigious oceanfront development situated on a point of land that extends into the Pacific Ocean. \r\n\r\nWith its prime location, residents are treated to panoramic 270° views of the ocean, including stunning sunrises, sunsets, and even the opportunity to spot gray whales during their migratory season.', 'Situated just 45 minutes south of the international border and only an hour south of the San Diego International Airport, it offers convenient access for both domestic and international travelers.', 'Manicured grounds worked on by a seasoned staff 6 days a week\r\n\r\nOceanfront walkway very well maintained'),
(4, 'Costa Bella', 'costa-bella32', 'CB78', 'CB781718265730.jpg', '22713', 'Mexico', 'Baja California', 'Rosarito', NULL, '-117.05711530858153', '32.35807236632225', '\"[\\\"1991718265691.jpg\\\",\\\"3941718265691.jpg\\\",\\\"5951718265691.jpg\\\"]\"', '<p style=\"margin-left:0px;\">Known as the “Jewels” of Rosarito Beach, La Jolla residents enjoy fine dining, boutiques, &amp; art galleries all surrounded by beautiful ocean coastline views.</p><p style=\"margin-left:0px;\">La Jolla Excellence is a highly esteemed oceanfront gated community celebrated for its luxury, quality &amp; prestige.<br>Real estate opportunities here are diverse, ranging from upscale moderately priced condos to luxurious 7 figure townhouses nestled right off a year round sandy beach.</p><p style=\"margin-left:0px;\">THE SIZE AND LAYOUT OF THE PROPERTY<br>If it’s space you’re looking for in a home while still enjoying the best a condominium community offers, then you’ve found the right place.<br>This true single-story home expertly tailors contemporary luxuries &amp; modern conveniences across a whopping 2,500 SqFt that include 3 abundant sized bedrooms, a voluminous sized kitchen, &amp; a spacious two car garage. The best part is its oversized balcony where you can doze off in the neverending Pacific Ocean views.</p><p style=\"margin-left:0px;\">What makes this even better is that if you hurry you can still be in time to select your color floors, quartz, cabinetry amongst other things. You may also be in time to customize to your very own liking.</p><figure class=\"image image-style-align-right image_resized\" style=\"width:50%;\"><img style=\"aspect-ratio:2560/1440;\" src=\"https://explorelogicsit.net/propertydealership/public/ckeditor-uploads/IMG_4647-1-scaled_1718265708.jpg\" width=\"2560\" height=\"1440\"></figure><p style=\"margin-left:0px;\">INSIDE THE GATED COMMUNITY<br>Lush gardens, access to 2 semi private beaches &amp; 5 star resort amenities liven up this gated oceanfront development. The privileged residential resort was engineered to accommodate refined construction in a key strategic location, thereby enabling effortless comforts &amp; imaginable unperturbed luxuries.<br>Among the countless features the development offers: &nbsp;<br>– Access to 2 semi-private beaches<br>– Indoor &amp; Outdoor pools<br>– Jacuzzis<br>– Saunas<br>– Ocean view gym<br>– Clubhouse for events; equipped with fully functional kitchens<br>– Multiple sports courts<br>– Lush gardens<br>– Secure gated access<br>– 24 / 7 round the clock manned security</p><p style=\"margin-left:0px;\">LOCATION, LOCATION, LOCATION<br>Located less than 3 minutes from downtown Rosarito, yet worlds apart from the busy hustle and bustle of the tourist-centric nightlife…<br>Outside the 24 hour secure gated community there are over a dozen stores and restaurants within a 3 block walking distance radius.<br>As well as round the clock convenience stores &amp; multiple gas stations. This area pampers you with all commodities one could desire.</p><p style=\"margin-left:0px;\">La Jolla Excellence is only a 35-minute straight shot south of the San Diego border if crossing by car.<br>Or breeze on through the express border crossing at the Tijuana airport and UBER or Taxi over to your home in less than 45 minutes.</p><p style=\"margin-left:0px;\">A picturesque 45 minute drive south down Baja’s golden coast will land you down in Mexico’s very own Napa valley. Known around the world as “Valle de Guadalupe” *Pronounced (Va-Ye) in Spanish.</p><p style=\"margin-left:0px;\">TITLE OF THE PROPERTY<br>This property is not yet constructed &amp; is anticipated for delivery in late 2024.<br>This villa will be sold new and unfurnished It will include all new stainless steel kitchen appliances.<br>This sale is through a cession of rights.</p><p style=\"margin-left:0px;\">TERMS OF THE SALE<br>Financing is not available for this property at this time.<br>If you require financing please contact your preferred lender prior to scheduling a viewing.</p><p style=\"margin-left:0px;\">VIEWING THIS PROPERTY<br>A similar property is available to view by appointment only.<br>We ask that you do your best to coordinate a viewing with at least 24 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule on a case by case basis and we may ask for proof of funds before a showing.</p><p style=\"margin-left:0px;\">** Please note all pictures of villa are for illustration purposes only and the villa shown has upgrades**</p><p style=\"margin-left:0px;\">*PRICE IS DISPLAYED IN U.S. DOLLARS BUT PURCHASE WILL BE REGISTERED IN MEXICAN PESOS AT THE CURRENT EXCHANGE RATE AT THE TIME OF CLOSING*</p><p style=\"margin-left:0px;\">*Disclaimer: Information is deemed to be correct but not guaranteed*</p>', 1, '2024-06-13 08:02:10', '2024-06-13 08:02:10', 'CB7811718265730.jpg', 'CB7821718265730.jpg', 'CB7831718265730.jpg', 'Beach', 'Dining Experiences', 'Pool And Jacuzzi', 'The development provides access to a sandy beach, creating an ideal environment to relax and enjoy the sun.', 'Costa Bella’s location offers a rich culinary experience. North of Costa Bella, you’ll find popular restaurants like Treinta Quattro Pizza, and the Popotla restaurant and bar', 'The community amenities include an oceanfront pool, Jacuzzi, and beautifully landscaped walkways overlooking the ocean.'),
(5, 'La Jolla Del Mar', 'la-jolla-del-mar12', 'LJDM20', 'LJDM201718265852.jpg', '22713', 'Mexico', 'Baja California', 'Rosarito', NULL, '-117.05316709691161', '32.35807236632225', '\"[\\\"8761718265807.jpg\\\",\\\"1401718265807.jpg\\\",\\\"5291718265807.jpg\\\"]\"', '<p style=\"margin-left:0px;\"><strong>If you’re in search of a stunning oceanfront development in the Rosarito area, look no further than La Jolla del Mar.&nbsp;</strong></p><p style=\"margin-left:0px;\"><strong>With its prime location and luxurious amenities, this development stands out as the premier choice for those seeking a slice of paradise in Baja California. In this article, we will explore the wonders of La Jolla del Mar, highlighting its unique features, amenities, and the wide range of properties available for sale, including condos and villas.&nbsp;</strong></p><p style=\"margin-left:0px;\"><strong>Whether you’re looking for a vacation home or a permanent residence, La Jolla del Mar offers a dreamlike coastal living experience.</strong></p><h2 style=\"margin-left:0px;\"><strong>Condos</strong></h2><p style=\"margin-left:0px;\"><strong>La Jolla del Mar’s condo offerings cater to a range of needs and preferences.&nbsp;</strong></p><p style=\"margin-left:0px;\"><strong>From cozy one-bedroom units to spacious penthouses, these condos boast modern designs, high-quality finishes, and breathtaking ocean views.&nbsp;</strong></p><p style=\"margin-left:0px;\"><strong>With the convenience of covered parking and access to the community’s exceptional amenities, owning a condo in La Jolla del Mar is a true testament to coastal luxury.</strong></p><h2 style=\"margin-left:0px;\">Villas</h2><p style=\"margin-left:0px;\"><strong>For those seeking the epitome of luxury living, La Jolla del Mar’s beachfront villas are an absolute dream come true.&nbsp;</strong></p><p style=\"margin-left:0px;\"><strong>With approximately 30 villas available, each offering its own unique charm and architectural style, you can find the perfect oasis to call home.&nbsp;</strong></p><p style=\"margin-left:0px;\"><strong>Imagine waking up to the sound of crashing waves and indulging in unparalleled ocean views from your private villa.</strong></p><p style=\"margin-left:0px;\"><img src=\"https://mybajaproperty.com/wp-content/uploads/2023/12/Calafia_3-1.webp\" alt=\"\" srcset=\"https://mybajaproperty.com/wp-content/uploads/2023/12/Calafia_3-1.webp 1024w, https://mybajaproperty.com/wp-content/uploads/2023/12/Calafia_3-1-300x199.webp 300w, https://mybajaproperty.com/wp-content/uploads/2023/12/Calafia_3-1-768x510.webp 768w\" sizes=\"100vw\" width=\"1024\" height=\"680\"></p><h2 style=\"margin-left:0px;\">La Jolla Del Mar Amenities</h2><p style=\"margin-left:0px;text-align:center;\"><strong>La Jolla del Mar sets itself apart from other developments in the area with its exceptional range of amenities. Whether you’re seeking relaxation or adventure, this community has something for everyone. Let’s dive into some of the standout features:</strong></p>', 1, '2024-06-13 08:04:12', '2024-06-13 08:04:12', 'LJDM2011718265852.jpg', 'LJDM2021718265852.jpg', 'LJDM2031718265852.jpg', 'Sandy Beaches Year-Round', 'Towering Luxury', 'Covered Parking And Commercial Center', 'Unlike many other Baja real estate communities, La Jolla del Mar enjoys sandy beaches that remain pristine all year long. Imagine stepping onto the soft sand and feeling the ocean breeze on your face as you take a leisurely stroll along the shore. These sandy beaches provide ample space for walking, running, and even surfing for those looking to catch some waves.', 'La Jolla del Mar is comprised of two awe-inspiring oceanfront towers, each offering breathtaking views of the Pacific Ocean. The towers feature a variety of spacious condos with well-appointed interiors and modern finishes. Whether you’re looking for a cozy one-bedroom unit or a sprawling penthouse, La Jolla del Mar has a wide range of options to suit your needs.', 'In addition to its stunning residences, La Jolla del Mar provides convenient amenities such as covered parking and a commercial center. The covered parking structure ensures that your vehicle is protected from the elements, while the commercial center offers a range of modern conveniences, restaurants, and entertainment options right at your doorstep.'),
(6, 'La Jolla Excellence', 'la-jolla-excellence31', 'LJE6', 'LJE521718266031.jpg', '20710', 'United States', 'California', 'Los Angeles', NULL, '-117.04449819737548', '32.34712376841702', '\"[\\\"241718265959.jpg\\\",\\\"7221718265959.jpg\\\",\\\"9101718265959.jpg\\\"]\"', '<p style=\"margin-left:0px;text-align:justify;\">La Jolla Excellence is a premier residential development situated in Playas de Rosarito, Baja California, Mexico.</p><p style=\"margin-left:0px;text-align:justify;\">This opulent community boasts an extensive selection of premium villas and condos for sale that ensure unparalleled comfort and convenience for homeowners.</p><p style=\"margin-left:0px;text-align:justify;\">With breathtaking ocean vistas, top-of-the-line amenities, and convenient access to local attractions, La Jolla Excellence stands out as the ideal destination for those seeking a sophisticated lifestyle in a stunning seaside location.</p><p style=\"margin-left:0px;text-align:justify;\">Explore our range of Rosarito Real Estate options today!</p><h2 style=\"margin-left:0px;text-align:justify;\"><strong>Real Estate Options in La Jolla Excellence Villas</strong></h2><p style=\"margin-left:0px;text-align:justify;\">La Jolla Excellence offers 105 villas, each boasting a private garage and ranging in size from 2,500 to 4,200 square feet.&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">These spacious and elegant homes are designed to cater to the needs of discerning homeowners, with high-quality construction and premium finishes throughout.&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">With ample living space and breathtaking views, these villas provide the perfect setting for a luxurious lifestyle in Rosarito.</p><figure class=\"image image-style-align-left image_resized\" style=\"width:50%;\"><img style=\"aspect-ratio:2560/1707;\" src=\"https://explorelogicsit.net/propertydealership/public/ckeditor-uploads/Todo-Santos-Villa-Kitchen-scaled (1)_1718265928.jpg\" width=\"2560\" height=\"1707\"></figure><h2 style=\"margin-left:0px;text-align:justify;\"><strong>Condos</strong></h2><p style=\"margin-left:0px;text-align:justify;\">In addition to the villas, La Jolla Excellence features five high-rise condominium complexes with units ranging from two to four bedrooms. These condos offer a more affordable option for those seeking a stylish and comfortable home in the Rosarito area. With a variety of configurations and sizes to choose from, buyers are sure to find the perfect condo to suit their needs and preferences.<img style=\"height:auto;\" src=\"https://mybajaproperty.com/wp-content/uploads/2023/12/La_Jolla_Excellence_43.webp\" alt=\"\"></p><h2 style=\"margin-left:0px;text-align:justify;\"><strong>La Jolla Excellence Amenities</strong></h2><p style=\"margin-left:0px;text-align:justify;\">La Jolla Excellence is known for its exceptional amenities, available exclusively to residents and their guests. These amenities cater to a variety of interests and preferences, ensuring that everyone in the community can enjoy a fulfilling and enjoyable lifestyle.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><h4 style=\"margin-left:0px;text-align:justify;\">Beach</h4><p style=\"margin-left:0px;text-align:justify;\">Residents of La Jolla Excellence enjoy access to two pristine, private sand beaches, perfect for sunbathing, swimming, or simply enjoying the stunning ocean views. These beaches provide a peaceful and exclusive retreat for homeowners, away from the crowds and noise of public beaches.</p><h4 style=\"margin-left:0px;text-align:justify;\">Restaurant And Bar</h4><p style=\"margin-left:0px;text-align:justify;\">The community features an on-site restaurant and bar, offering delicious dining options and refreshing beverages within the comfort of the development. Residents can enjoy a leisurely meal or a casual drink without ever leaving the community.</p><h4 style=\"margin-left:0px;text-align:justify;\">Multiple Pools And Jacuzzis</h4><p style=\"margin-left:0px;text-align:justify;\">Pools – 2 of them indoor/covered<br>10 Jacuzzis<br>Saunas<br>Steam rooms</p>', 1, '2024-06-13 08:07:11', '2024-07-10 07:14:38', 'LJE5211718266031.jpg', 'LJE5221718266031.jpg', 'LJE5231718266031.jpg', 'Beach', 'Restaurant And Bar', 'Multiple Jacuzzis', 'Residents of La Jolla Excellence enjoy access to two pristine, private sand beaches, perfect for sunbathing, swimming, or simply enjoying the stunning ocean views. These beaches provide a peaceful and exclusive retreat for homeowners, away from the crowds and noise of public beaches.', 'Residents can enjoy a leisurely meal or a casual drink without ever leaving the community.', 'The community features an on-site restaurant and bar, offering delicious dining options and refreshing beverages within the comfort of the development.'),
(7, 'La Jolla Real', 'la-jolla-real95', 'LJR48', 'LJR481718266273.jpg', '22713', 'Mexico', 'Baja California', 'Rosarito', NULL, '-117.05325292760008', '32.35749234140319', '\"[\\\"2921718266118.jpg\\\",\\\"7111718266118.jpg\\\",\\\"7521718266119.jpg\\\",\\\"5521718266119.jpg\\\"]\"', '<p style=\"margin-left:0px;\"><strong>La Jolla Real is a beautiful place located in Rosarito, Baja California.&nbsp;</strong></p><p style=\"margin-left:0px;\"><strong>It is a perfect location for those who are looking to invest in Baja real estate. The charm of La Jolla Real is mesmerizing, and it is a place that attracts many people from all over the world.&nbsp;</strong></p><p style=\"margin-left:0px;\"><strong>The beauty of the place is not the only reason why people invest in real estate here. There are many other factors that contribute to the increasing trend of investing in La Jolla Real Estate.</strong></p><h2 style=\"margin-left:0px;\"><strong>The charm of La Jolla Real</strong></h2><p style=\"margin-left:0px;\"><strong>La Jolla Real is a gated community that offers a peaceful and serene environment for its residents.&nbsp;</strong></p><p style=\"margin-left:0px;\"><strong>The community is surrounded by beautiful gardens and greenery, making it a perfect place to relax and unwind. The architecture of the houses in La Jolla Real is unique and stunning, with intricate details and designs that add to the beauty of the place.&nbsp;</strong></p><p style=\"margin-left:0px;\"><strong>The community also has a private beach that is accessible only to its residents, adding to the exclusivity of the place.</strong></p><h2 style=\"margin-left:0px;\">Amenities</h2><p style=\"margin-left:0px;\"><strong>Apart from the beauty of the place, La Jolla Real also offers many amenities to its residents.&nbsp;</strong></p><p style=\"margin-left:0px;\"><strong>The community has a clubhouse, a fitness center, and a pool. There are also many restaurants and cafes nearby, making it convenient for the residents to enjoy a meal or a cup of coffee.&nbsp;</strong></p><p style=\"margin-left:0px;\"><strong>The community also has a 24-hour security system, ensuring the safety and security of its residents.</strong></p><p style=\"margin-left:0px;\"><img style=\"height:auto;\" src=\"https://mybajaproperty.com/wp-content/uploads/2023/12/LaJollaReal19.webp\" alt=\"\"></p><h2 style=\"margin-left:0px;\"><strong>LA JOLLA REAL PROPERTIES</strong></h2><figure class=\"image image_resized image-style-align-left\" style=\"height:auto;width:330px;\"><img style=\"aspect-ratio:710/387;\" src=\"https://mybajaproperty.com/wp-content/uploads/2024/05/301T5Excellence-Main-Picture-1-710x387.jpg\" alt=\"301 T5 La Jolla Excellence\" width=\"710\" height=\"387\"></figure><p><img class=\"image_resized\" style=\"aspect-ratio:710/387;height:auto;width:330px;\" src=\"https://mybajaproperty.com/wp-content/uploads/2024/01/702-Perla-Jolla-Real-Main-Photo-710x387.webp\" alt=\"La Jolla Real, Unit 702, Tower Perla (Plus $5,000 US Dollar Buyer Credit)\" width=\"710\" height=\"387\"></p><p>&nbsp;</p><p>&nbsp;</p><p style=\"margin-left:auto;\">&nbsp;</p><h2 style=\"margin-left:0px;\"><a href=\"https://mybajaproperty.com/property/la-jolla-real-unit-702-tower-perla/\"><strong>La Jolla Real, Unit 702, Tower Perla&nbsp;</strong></a></h2><p><img class=\"image_resized\" style=\"aspect-ratio:710/387;height:auto;width:330px;\" src=\"https://mybajaproperty.com/wp-content/uploads/2024/01/LJR-302-Perla-Rental-1-710x387.webp\" alt=\"La Jolla Real, Unit 302, Tower Perla\" width=\"710\" height=\"387\"></p><p><img class=\"image_resized\" style=\"aspect-ratio:710/387;height:auto;width:330px;\" src=\"https://mybajaproperty.com/wp-content/uploads/2024/05/IMG_6715-scaled.jpg\" alt=\"401 Perla La Jolla Real\" width=\"710\" height=\"387\"></p><h2 style=\"margin-left:0px;\">La Jolla Real Amenities:</h2><h2 style=\"margin-left:0px;\"><strong>La Jolla Real boasts an impressive array of amenities, designed to cater to the needs and desires of its residents.</strong></h2><p style=\"margin-left:0px;\">&nbsp;</p><h4 style=\"margin-left:0px;\">Beachfront Bliss</h4><p style=\"margin-left:0px;\"><strong>Take a leisurely stroll along the shoreline, soak up the sun, or indulge in water sports—La Jolla Real presents endless possibilities for leisure and enjoyment.</strong></p><p style=\"margin-left:0px;\">&nbsp;</p><h4 style=\"margin-left:0px;\">Modern And Secure Living</h4><p style=\"margin-left:0px;\"><strong>La Jolla Real prides itself on providing a secure environment for its residents. With 24-hour security and controlled access, residents can have peace of mind knowing that their safety is of utmost importance.</strong></p><p style=\"margin-left:0px;\">&nbsp;</p><h4 style=\"margin-left:0px;\">Recreational Facilities</h4><p style=\"margin-left:0px;\"><strong>A well-appointed clubhouse, complete with a fitness center and swimming pool, provides a space for socializing and staying active.</strong></p><h2 style=\"margin-left:0px;\">La Jolla Real Location</h2>', 1, '2024-06-13 08:11:13', '2024-06-13 08:11:13', 'LJR4811718266273.jpeg', 'LJR4821718266273.jpg', 'LJR4831718266273.jpg', 'Beachfront Bliss', 'Modern And Secure Living', 'Recreational Facilities', 'Take a leisurely stroll along the shoreline, soak up the sun, or indulge in water sports—La Jolla Real presents endless possibilities for leisure and enjoyment.', 'La Jolla Real prides itself on providing a secure environment for its residents. With 24-hour security and controlled access, residents can have peace of mind knowing that their safety is of utmost importance.', 'A well-appointed clubhouse, complete with a fitness center and swimming pool, provides a space for socializing and staying active.'),
(8, 'La Paloma', 'la-paloma61', 'LP51', 'LP751718266379.jpg', '22713', 'Mexico', 'Baja California', 'Rosarito', NULL, '-117.05660032445067', '32.35698481654725', '\"[\\\"7111718266339.jpg\\\",\\\"4561718266339.jpg\\\",\\\"4721718266340.jpg\\\"]\"', '<p style=\"margin-left:0px;text-align:justify;\">Located just 30 miles south of San Diego and 5 minutes from downtown Rosarito, the La Paloma neighborhood in Rosarito Beach, Mexico offers a picturesque and exclusive beachfront experience.&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">This gated community is a hidden gem, providing breathtaking ocean views and a tranquil atmosphere away from the hustle and bustle of the city. La Paloma is not only a sought-after destination for vacationers but also a prime location for those seeking Baja real estate.&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">In this article, we will explore the charm of the La Paloma neighborhood and the opportunities it presents for those interested in investing in Rosarito real estate.</p><h2 style=\"margin-left:0px;text-align:justify;\"><strong>A Beachfront Retreat: La Paloma Beach &amp; Tennis Resort</strong></h2><p style=\"margin-left:0px;text-align:justify;\">Nestled within the La Paloma neighborhood, the La Paloma Beach &amp; Tennis Resort stands as a beacon of relaxation and luxury. With its range of 1, 2, and 3 bedroom villas and condos available for rent or purchase, this exclusive resort offers unforgettable moments for the whole family. The spacious and comfortable accommodations make you feel right at home, while the stunning ocean views make it a truly magical experience.</p><p style=\"margin-left:0px;text-align:justify;\"><img class=\"image-style-align-right image_resized\" style=\"aspect-ratio:1024/768;width:50%;\" src=\"https://mybajaproperty.com/wp-content/uploads/2023/12/LaPalomaNeighborhood5.webp\" alt=\"\" srcset=\"https://mybajaproperty.com/wp-content/uploads/2023/12/LaPalomaNeighborhood5.webp 1024w, https://mybajaproperty.com/wp-content/uploads/2023/12/LaPalomaNeighborhood5-300x225.webp 300w, https://mybajaproperty.com/wp-content/uploads/2023/12/LaPalomaNeighborhood5-768x576.webp 768w\" sizes=\"100vw\" width=\"1024\" height=\"768\"></p><h2 style=\"margin-left:0px;text-align:justify;\"><strong>La Paloma Amenities</strong></h2><p style=\"margin-left:0px;text-align:justify;\">La Paloma is designed to provide guests with a complete and fulfilling vacation experience.</p><h4 style=\"margin-left:0px;text-align:justify;\">Beach</h4><p style=\"margin-left:0px;text-align:justify;\">For the fitness enthusiasts, La Paloma offers a state-of-the-art fitness center equipped with a variety of workout machines. This allows guests to maintain their fitness routine even during vacation.</p><h4 style=\"margin-left:0px;text-align:justify;\">Restaurant And Room Service</h4><p style=\"margin-left:0px;text-align:justify;\">On-premise dining is made easy with La Paloma’s restaurant serving a range of delectable dishes. Room service is also available for guests who prefer to dine in the comfort of their own room.</p><h4 style=\"margin-left:0px;text-align:justify;\">Multiple Pools And Jacuzzis</h4><p style=\"margin-left:0px;text-align:justify;\">Guests can choose from not one, but four swimming pools based on their preference. Two of these pools are heated year-round for those who enjoy a soothing dip regardless of the season. La Paloma also houses four jacuzzis, perfect for unwinding after a day of sightseeing or shopping.</p>', 1, '2024-06-13 08:12:59', '2024-06-20 05:33:11', 'LP7511718266379.jpg', 'LP7521718266379.jpg', 'LP7531718266379.jpg', 'Beach', 'Restaurant And Room Service', 'Multiple Pools And Jacuzzis', 'For the fitness enthusiasts, La Paloma offers a state-of-the-art fitness center equipped with a variety of workout machines. This allows guests to maintain their fitness routine even during vacation.', 'On-premise dining is made easy with La Paloma’s restaurant serving a range of delectable dishes. Room service is also available for guests who prefer to dine in the comfort of their own room.', 'Guests can choose from not one, but four swimming pools based on their preference. Two of these pools are heated year-round for those who enjoy a soothing dip regardless of the season. La Paloma also houses four jacuzzis, perfect for unwinding after a day of sightseeing or shopping.'),
(9, 'Las Olas Grand', 'las-olas-grand69', 'LOG66', 'LOG431718266503.jpg', '22713', 'Mexico', 'Baja California', 'Rosarito', NULL, '-117.06187776657208', '32.36443734553148', '\"[\\\"3101718266462.jpg\\\",\\\"541718266462.jpg\\\",\\\"6091718266463.jpg\\\"]\"', '<p style=\"margin-left:0px;\">If you’re in search of a luxurious oceanfront retreat in Mexico, look no further than Las Olas Grand in Rosarito Beach.&nbsp;</p><p style=\"margin-left:0px;\">Located just two miles south of the vibrant city center, this exclusive development offers unparalleled beauty and tranquility.&nbsp;</p><p style=\"margin-left:0px;\">With its private white sandy beach and breathtaking views of the Pacific Ocean, Las Olas Grand is a true oasis for those seeking relaxation and serenity.</p><h2 style=\"margin-left:0px;\"><strong>A Prime Location</strong></h2><p style=\"margin-left:0px;\">One of the standout features of Las Olas Grand is its unbeatable location. Situated in the heart of Baja California, this development is conveniently close to Rosarito Beach, allowing for quick trips to town whenever you desire.&nbsp;</p><p style=\"margin-left:0px;\">Whether you’re looking to explore the local shops and restaurants or simply soak up the sun on the sandy shores, everything you need is within reach.</p><h2 style=\"margin-left:0px;\"><strong>Spectacular Ocean Views</strong></h2><p style=\"margin-left:0px;\">Las Olas Grand boasts a 21-story tower that is designed to take full advantage of its prime position on the Pacific Ocean.&nbsp;</p><p style=\"margin-left:0px;\">From the 6th floor and above, residents are treated to panoramic views that stretch from Ensenada in the south to the Coronado Islands in the north.&nbsp;</p><p style=\"margin-left:0px;\">Imagine waking up every morning to the sight of dolphins swimming in the crystal-clear waters or witnessing the majestic migration of whales during certain times of the year.</p><figure class=\"image image-style-align-left image_resized\" style=\"width:50%;\"><img style=\"aspect-ratio:2560/1920;\" src=\"https://explorelogicsit.net/propertydealership/public/ckeditor-uploads/IMG_8822-scaled_1718266433.jpg\" width=\"2560\" height=\"1920\"></figure><h2 style=\"margin-left:0px;\"><strong>Las Olas Grand Amenities</strong></h2><p style=\"margin-left:0px;\">Living at Las Olas Grand is like being on a never-ending vacation. It offers array of resort-style amenities.</p><h4 style=\"margin-left:0px;\">Quality Of Development</h4><p style=\"margin-left:0px;\">Las Olas Grand is a symbol of high-quality development. Its complex is well-planned and provides a relaxing, high-luxury atmosphere. The development leads down to the beach access and is surrounded by beautifully maintained walkways and lush gardens.</p><h4 style=\"margin-left:0px;\">Oceanfront Fitness Center</h4><p style=\"margin-left:0px;\">Stay fit while enjoying the captivating ocean view in the oceanfront fitness center. Relax and rejuvenate in the luxury spa, offering a range of treatments to help you unwind.</p><h4 style=\"margin-left:0px;\">Oceanfront Leisure Areas</h4><p style=\"margin-left:0px;\">The oceanfront leisure areas, equipped with jacuzzis and cabanas, offer the perfect spot for relaxation or socializing.</p>', 1, '2024-06-13 08:15:03', '2024-06-20 05:28:55', 'LOG4311718266503.jpg', 'LOG4321718266503.jpg', 'LOG4331718266503.jpg', 'Quality Of Development', 'Oceanfront Fitness Center', 'Oceanfront Leisure Areas', 'Las Olas Grand is a symbol of high-quality development. Its complex is well-planned and provides a relaxing, high-luxury atmosphere.\r\n\r\nThe development leads down to the beach access and is surrounded by beautifully maintained walkways and lush gardens.', 'Stay fit while enjoying the captivating ocean view in the oceanfront fitness center.\r\n\r\nRelax and rejuvenate in the luxury spa, offering a range of treatments to help you unwind.', 'The oceanfront leisure areas, equipped with jacuzzis and cabanas, offer the perfect spot for relaxation or socializing');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` double(20,2) DEFAULT NULL,
  `views` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `neighborhood_id` bigint(20) UNSIGNED NOT NULL,
  `listing_status` tinyint(4) NOT NULL COMMENT '1: For Sale, 2: For Rent, 3: Rented, 4: Sale Pending, 5: Sold',
  `size` varchar(255) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `parking_spaces` int(11) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `gallery` text NOT NULL,
  `map` varchar(255) DEFAULT NULL,
  `description` mediumtext NOT NULL,
  `short_description` text DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `dev_lvl` tinyint(4) NOT NULL COMMENT '1: Under Construction, 2: Built, 3: Under Renovation, 4: Renovated',
  `year_built` varchar(255) NOT NULL,
  `property_tax` varchar(255) NOT NULL,
  `hoa_fees` varchar(255) NOT NULL,
  `rent_cycle` tinyint(4) NOT NULL COMMENT '1: Monthly, 2: Quarterly, 3: Semi-Annually, 4: Annually',
  `date_available` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0: Inactive, 1: Active',
  `is_featured` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: No, 2: Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `listing_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Sale, 1=Rent',
  `lattitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `code`, `title`, `slug`, `price`, `views`, `neighborhood_id`, `listing_status`, `size`, `bedrooms`, `bathrooms`, `parking_spaces`, `banner`, `gallery`, `map`, `description`, `short_description`, `address`, `country`, `state`, `city`, `dev_lvl`, `year_built`, `property_tax`, `hoa_fees`, `rent_cycle`, `date_available`, `status`, `is_featured`, `created_at`, `updated_at`, `listing_type`, `lattitude`, `longitude`) VALUES
(1, 'C32S6460', 'La Jolla Excellence Villa Todo Santos, Suite 68', 'la-jolla-excellence-villa-todo-santos-suite-6843', 575000.00, 6, 2, 1, '2528', 4, 2, 1, 'C32S24481718267094.jpg', '[\"151718266984.jpg\",\"3661718266984.jpg\",\"6701718266984.jpg\"]', NULL, '<p style=\"margin-left:0px;\">Known as the “Jewels” of Rosarito Beach, La Jolla residents enjoy fine dining, boutiques, &amp; art galleries all surrounded by beautiful ocean coastline views.</p><p style=\"margin-left:0px;\">La Jolla Excellence is a highly esteemed oceanfront gated community celebrated for its luxury, quality &amp; prestige.<br>Real estate opportunities here are diverse, ranging from upscale moderately priced condos to luxurious 7 figure townhouses nestled right off a year round sandy beach.</p><p style=\"margin-left:0px;\">THE SIZE AND LAYOUT OF THE PROPERTY<br>If it’s space you’re looking for in a home while still enjoying the best a condominium community offers, then you’ve found the right place.<br>This true single-story home expertly tailors contemporary luxuries &amp; modern conveniences across a whopping 2,500 SqFt that include 3 abundant sized bedrooms, a voluminous sized kitchen, &amp; a spacious two car garage. The best part is its oversized balcony where you can doze off in the neverending Pacific Ocean views.</p><p style=\"margin-left:0px;\">What makes this even better is that if you hurry you can still be in time to select your color floors, quartz, cabinetry amongst other things. You may also be in time to customize to your very own liking.</p><p style=\"margin-left:0px;\">INSIDE THE GATED COMMUNITY<br>Lush gardens, access to 2 semi private beaches &amp; 5 star resort amenities liven up this gated oceanfront development. The privileged residential resort was engineered to accommodate refined construction in a key strategic location, thereby enabling effortless comforts &amp; imaginable unperturbed luxuries.<br>Among the countless features the development offers:<br>– Access to 2 semi-private beaches<br>– Indoor &amp; Outdoor pools<br>– Jacuzzis<br>– Saunas<br>– Ocean view gym<br>– Clubhouse for events; equipped with fully functional kitchens<br>– Multiple sports courts<br>– Lush gardens<br>– Secure gated access<br>– 24 / 7 round the clock manned security</p><p style=\"margin-left:0px;\">LOCATION, LOCATION, LOCATION<br>Located less than 3 minutes from downtown Rosarito, yet worlds apart from the busy hustle and bustle of the tourist-centric nightlife…<br>Outside the 24 hour secure gated community there are over a dozen stores and restaurants within a 3 block walking distance radius.<br>As well as round the clock convenience stores &amp; multiple gas stations. This area pampers you with all commodities one could desire.</p><p style=\"margin-left:0px;\">La Jolla Excellence is only a 35-minute straight shot south of the San Diego border if crossing by car.<br>Or breeze on through the express border crossing at the Tijuana airport and UBER or Taxi over to your home in less than 45 minutes.</p><p style=\"margin-left:0px;\">A picturesque 45 minute drive south down Baja’s golden coast will land you down in Mexico’s very own Napa valley. Known around the world as “Valle de Guadalupe” *Pronounced (Va-Ye) in Spanish.</p><p style=\"margin-left:0px;\">TITLE OF THE PROPERTY<br>This property is not yet constructed &amp; is anticipated for delivery in late 2024.<br>This villa will be sold new and unfurnished It will include all new stainless steel kitchen appliances.<br>This sale is through a cession of rights.</p><p style=\"margin-left:0px;\">TERMS OF THE SALE<br>Financing is not available for this property at this time.<br>If you require financing please contact your preferred lender prior to scheduling a viewing.</p><p style=\"margin-left:0px;\">VIEWING THIS PROPERTY<br>A similar property is available to view by appointment only.<br>We ask that you do your best to coordinate a viewing with at least 24 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule on a case by case basis and we may ask for proof of funds before a showing.</p><p style=\"margin-left:0px;\">** Please note all pictures of villa are for illustration purposes only and the villa shown has upgrades**</p><p style=\"margin-left:0px;\">*PRICE IS DISPLAYED IN U.S. DOLLARS BUT PURCHASE WILL BE REGISTERED IN MEXICAN PESOS AT THE CURRENT EXCHANGE RATE AT THE TIME OF CLOSING*</p><p style=\"margin-left:0px;\">*Disclaimer: Information is deemed to be correct but not guaranteed*</p>', 'This property is not yet constructed & is anticipated for delivery in late 2024. This villa will be sold new and unfurnished It will include all new stainless steel kitchen appliances. This sale is through a cession of rights.', 'LA JOLLA EXCELLENCE', 'Mexico', 'Baja California', 'Rosarito', 2, '2020', '2000', '150', 1, '2024-06-13 00:00:00', 1, 2, '2024-06-13 08:24:54', '2024-08-21 08:11:44', 1, '32.36718121494819', '-117.06217931920165'),
(2, 'CM7S3144', 'La Jolla Excellence – Unit 1504 – Tower 5', 'la-jolla-excellence-unit-1504-tower-524', 479000.00, 1, 3, 1, '1885', 3, 2, 1, 'CM7S96271718267257.jpg', '[\"2131718267230.jpg\",\"3581718267230.jpg\",\"531718267230.jpg\"]', NULL, '<p style=\"margin-left:0px;\">Location, location, location… breathtaking scenery, a year-round sandy beach, and the pinnacle of resort living!&nbsp;</p><p style=\"margin-left:0px;\">Situated on the sands of Popotla’s Artesanal Boulevard, one of Rosarito Beach’s most exquisite and exclusive beachfront segments, is La Jolla Excellence, a brand-new, unique residential housing development that stands out among its contemporaries.&nbsp;</p><p style=\"margin-left:0px;\">World-class designers have collaborated with award-winning architectural firm DECASA to develop a home that is perfectly harmonious with its surroundings. Every element of the design, from the choice of materials to the gently sloping façade to the interior flow, is in continual communication with the peace and harmony of the Pacific Ocean.</p><p style=\"margin-left:0px;\"><strong>THE SIZE AND LAYOUT&nbsp;&nbsp;</strong></p><p style=\"margin-left:0px;\">Not only are you still in time to customize this immaculately 2 bedroom, 2 bathroom condo, but you can also potentially add a 3rd bedroom. Hurry, to personalize your superb décor, combining a pleasant vacation home atmosphere with a Newport-style flair. This 1,865 square feet is spacious and flows throughout providing a stress-free area for you to take in the breathtaking views.</p><p style=\"margin-left:0px;\">Indulge in the captivating oceanfront main bedroom that offers awe-inspiring views right from the moment you wake up, it is also complete with an ensuite bathroom. The living area is generously sized, providing ample space for relaxation, while the fully equipped kitchen ensures all your hosting needs are met with ease. Whether you’re enjoying the stunning vistas or entertaining guests, this condo offers the perfect combination of comfort and functionality.</p><p style=\"margin-left:0px;\"><strong>THE COMMUNITY&nbsp;</strong></p><p style=\"margin-left:0px;\">This highly desirable community is renowned for its two convenient beach accesses, making it a prime location for beach lovers. Additionally, residents are delighted by the wide array of entertainment and dining options available within walking distance. The development boasts numerous impressive features, including but not limited to:</p><p style=\"margin-left:0px;\">– Access to 2 semi-private beaches &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; – Multiple Jacuzzis&nbsp;</p><p style=\"margin-left:0px;\">– Multiple Pools&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; – 3 of the pools indoor/covered&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">– Steam rooms&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; – Saunas</p><p style=\"margin-left:0px;\">– 2 ocean view gyms&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;– Restaurant-Bar</p><p style=\"margin-left:0px;\">– Boardwalk &amp; jogging trails&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;– Kid’s playground</p><p style=\"margin-left:0px;\">– Indoor cinema room&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;– 3 Multiple sports courts</p><p style=\"margin-left:0px;\">– Multi-use clubhouses for events that are equipped with fully functional kitchens&nbsp;</p><p style=\"margin-left:0px;\"><strong>THE LOCATION&nbsp;</strong></p><p style=\"margin-left:0px;\">Conveniently situated just a short 3-minute drive south of downtown Rosarito, La Jolla Excellence offers a tranquil escape from the vibrant tourist-centric nightlife. Despite its close proximity to the city, this community feels worlds apart from the noise and commotion. Moreover, it is a mere 35-minute drive south from the San Ysidro border crossing, making it easily accessible for residents and visitors alike.</p><p style=\"margin-left:0px;\"><strong>PROPERTY TITLE&nbsp;</strong></p><p style=\"margin-left:0px;\">The property is free and clear of all liens and encumbrances ready for a Cession of Rights transfer for the new Buyer to obtain clear title in the way of a “Bank Trust” (Fideicomiso) for foreign buyers or Escritura (Fee Simple Title) for Mexican nationals.&nbsp;&nbsp;</p><p style=\"margin-left:0px;\"><strong>TERMS&nbsp;</strong></p><p style=\"margin-left:0px;\">This is a cash sale only. No financing is considered.</p><p style=\"margin-left:0px;\"><strong>VIEWING THIS CONDO&nbsp;</strong></p><p style=\"margin-left:0px;\">This property is viewed by appointment only.&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">We ask that you do your best to coordinate a viewing with at least 48 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule&nbsp; on a case by case basis.</p><p style=\"margin-left:0px;\">*PLEASE NOTE that since this property is pre-construction, unit pictures are for illustrative purposes only. Pictures of same floorpan were used*</p><p style=\"margin-left:0px;\">*Disclaimer: Information is deemed to be correct but not guaranteed*</p><p style=\"margin-left:0px;\">*PRICE IS DISPLAYED IN U.S. DOLLARS BUT PURCHASE WILL BE REGISTERED IN MEXICAN PESOS AT THE CURRENT EXCHANGE RATE AT THE TIME OF CLOSING*</p>', 'This property is viewed by appointment only.    We ask that you do your best to coordinate a viewing with at least 48 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule  on a case by case basis.', '11501, Escenica Ensenada - Tijuana Playa Encantada 22713 Playas de Rosarito, BC', 'United States', 'California', 'Los Angeles', 4, '2023', '1500', '180', 1, '2024-06-13 00:00:00', 1, 1, '2024-06-13 08:27:37', '2024-06-13 11:58:12', 1, '32.34542992552219', '-117.04861807042235'),
(4, 'LJDM20S8091', 'Mision Viejo North House', 'mision-viejo-north-house30', 45000.00, 2, 5, 1, '2700', 5, 2, 1, 'LJDM20S80911718270491.jpg', '[\"3351718270438.jpg\",\"4081718270438.jpg\",\"3991718270439.jpg\"]', NULL, '<p style=\"margin-left:0px;\"><strong>Your newly built home with stunning views of the ocean is ready for you at an incredible price!</strong></p><p style=\"margin-left:0px;\"><strong>DEVELOPMENT INTRO</strong>&nbsp;</p><p style=\"margin-left:0px;\">Mision Viejo is a coastal city at the center of the region, offering an excellent spot for discovering Tijuana and Ensenada. It’s a close-knit community with round-the-clock security, attracting visitors due to its proximity to multiple areas of interest.&nbsp;</p><p style=\"margin-left:0px;\"><strong>THE SIZE AND LAYOUT&nbsp;</strong>&nbsp;</p><p style=\"margin-left:0px;\">This ADA compliant one-story, three-bedroom, two-bathroom, 2,500 square foot cozy home offers a peaceful and worry-free way of living. It features a spacious two-car garage with plenty of room for storage, a lovely private courtyard attached to the main bedroom and living space. Upon entering, you’re greeted by a beautiful waterfall effect and a cupula that provides ample lighting and special details. The showers are designed for easy wheelchair access. The standout feature is the rooftop terrace, equipped with fun amenities like a large chessboard and views that span from hills and mountains to city lights, bays, and breathtaking sunsets over the white water ocean. The house is equipped with solar panels, making it environmentally friendly and helping to lower energy costs. This charmingly spacious home is fully furnished and ready to move into.</p><p style=\"margin-left:0px;\"><strong>THE COMMUNITY&nbsp;</strong></p><p style=\"margin-left:0px;\">All subterranean utilities are available in Mission Viejo, including street lights and public water. Being a community with its own dedicated water reclamation sanitation plant using recovered gray waters, it is among the few. With a full-time contract administrator, a maintenance worker, and weekly gardeners, it’s one of the better-run communities in Baja.</p><p style=\"margin-left:0px;\">Together with CC&amp;R regulations and an abundance of facilities, it also has a lovely clubhouse with card tables, restrooms, shuffleboard, and a kid’s playhouse. Courts for basketball, tennis, and bocce ball. Two well landscaped and maintained garden parks are among the common areas. There are two beach walks accessible from the north and south. This gated neighborhood features large paved streets, pleasant staff, and security officers that speak English around-the-clock.&nbsp;<i><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></i></p><p style=\"margin-left:0px;\"><strong>THE LOCATION&nbsp;</strong></p><p style=\"margin-left:0px;\">Mision Viejo’s&nbsp; convenient location allows for easy access to the sand dunes, a 20-minute drive from the bustling heart of Rosarito Beach and about 4 miles from the acclaimed lobster fishing town of Puerto Nuevo. Situated about 32 miles from the San Ysidro border, it’s conveniently located near major highways. Nearby, Primo Tapia boasts a wide range of dining choices, ensuring there’s plenty to enjoy.</p><p style=\"margin-left:0px;\"><strong>TITLE</strong>&nbsp;</p><p style=\"margin-left:0px;\">The property is free and clear of all liens and encumbrances.&nbsp;</p><p style=\"margin-left:0px;\"><strong>TERMS</strong></p><p style=\"margin-left:0px;\">Please arrange all financing approvals with your lender prior to setting up a showing as proof of funds may be requested to schedule.&nbsp;</p><p style=\"margin-left:0px;\"><strong>VIEWING THIS PROPERTY</strong></p><p style=\"margin-left:0px;\">This property is viewed by appointment only.&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">We ask that you do your best to coordinate a viewing with at least 48 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule&nbsp; on a case by case basis.</p><p style=\"margin-left:0px;\"><i><strong>*PROPERTY PRICE IS DISPLAYED IN U.S. DOLLARS BUT WILL BE REGISTERED AT THE CURRENT EXCHANGE RATE IN MEXICAN PESOS AT THE TIME OF CLOSING*</strong></i></p><p style=\"margin-left:0px;\"><i><strong>Disclaimer: Information is deemed to be correct but not guaranteed.</strong></i></p>', 'Mision Viejo is a coastal city at the center of the region, offering an excellent spot for discovering Tijuana and Ensenada. It’s a close-knit community with round-the-clock security, attracting visitors due to its proximity to multiple areas of interest.', 'Mision Viejo', 'Mexico', 'Baja California', 'Rosarito', 3, '2019', '1500', '100', 1, '2024-06-13 00:00:00', 1, 1, '2024-06-13 09:21:31', '2024-06-13 12:06:20', 1, '32.356886256702545', '-117.05668615513915'),
(6, 'LP75S9171', '301 T5 La Jolla Excellence', '301-t5-la-jolla-excellence67', 459000.00, 0, 8, 1, '1389', 2, 2, 1, 'LP75S22061718270778.jpg', '[\"151718270723.jpg\",\"9471718270723.jpg\",\"541718270723.jpg\"]', NULL, '<p style=\"margin-left:0px;\"><strong>DEVELOPMENT INTRO</strong>&nbsp;</p><p style=\"margin-left:0px;\">La Jolla Excellence is a prestigious coastal destination known for its luxurious resort amenities and beautiful sandy beach. This lavish property provides a unique chance to enjoy high-end beachfront living. With its meticulous design and prime location, La Jolla Excellence offers a sophisticated and indulgent lifestyle, ensuring unparalleled relaxation and tranquility.</p><p style=\"margin-left:0px;\"><strong>THE SIZE AND LAYOUT&nbsp;</strong>&nbsp;</p><p style=\"margin-left:0px;\">This BRAND NEW sought-after corner unit boasts 3 bedrooms and 2 bathrooms, offering a luxurious living experience with breathtaking views of the Pacific Ocean. Spanning 1,937 square feet, the spacious layout includes modern finishes, new appliances, and extra upgrades. As you step inside, you’ll be greeted by an open and connected living area featuring a large island, perfect for entertaining guests. The expansive balcony provides a stunning backdrop of the Pacific Ocean, allowing you to enjoy endless views and beautiful sunsets, creating an ideal outdoor entertaining space. This condo is due to be delivered late 2024.</p><p style=\"margin-left:0px;\"><strong>THE COMMUNITY&nbsp;</strong></p><p style=\"margin-left:0px;\">Lush gardens, access to 2 semi-private beaches, and 5-star resort amenities enhance this gated oceanfront development. The exclusive residential resort was meticulously designed for sophisticated construction in a prime location, offering seamless comforts and luxurious experiences. Some of the features included in this development are access to 2 semi-private beaches, indoor and outdoor pools, jacuzzis, saunas, an ocean-view gym, a clubhouse for events with fully equipped kitchens, multiple sports courts, lush gardens, secure gated access, and 24/7 manned security for peace of mind.</p><p style=\"margin-left:0px;\"><strong>THE LOCATION&nbsp;</strong></p><p style=\"margin-left:0px;\">Situated just under 3 minutes away from downtown Rosarito, La Jolla Excellence offers a tranquil escape from the bustling tourist nightlife. It’s a convenient 35-minute drive south of the San Diego border by car, or a quick trip through the express border crossing at the Tijuana airport followed by a short Uber or taxi ride of less than 45 minutes. A scenic 45-minute drive along Baja’s stunning coastline will lead you to Mexico’s own Napa Valley, known as “Valle de Guadalupe.” Outside the secure gated community, you’ll find over a dozen stores and restaurants within a 3-block walking distance, along with 24-hour convenience stores and multiple gas stations. This area provides all the amenities one could desire for a comfortable stay.</p><p style=\"margin-left:0px;\"><strong>TITLE</strong>&nbsp;</p><p style=\"margin-left:0px;\">Sold as a Cession of Rights.&nbsp;</p><p style=\"margin-left:0px;\"><strong>TERMS&nbsp;</strong></p><p style=\"margin-left:0px;\">This is a cash sale only. No financing is considered.&nbsp;</p><p style=\"margin-left:0px;\"><strong>VIEWING THIS PROPERTY</strong></p><p style=\"margin-left:0px;\">This property is viewed by appointment only.&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">We ask that you do your best to coordinate a viewing with at least 48 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule&nbsp; on a case by case basis.</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\">*PROPERTY PRICE IS DISPLAYED IN U.S. DOLLARS BUT WILL BE REGISTERED AT THE CURRENT EXCHANGE RATE IN MEXICAN PESOS AT THE TIME OF CLOSING*</p><p style=\"margin-left:0px;\">*PROPERTY IS PRE CONSTRUCTION AND DUE TO BE DELIVERED END OF 2024, PHOTOS ARE FOR ILLUSTRATION PURPOSES ONLY AND SOME MAY CONTAIN ADDITIONAL UPGRADES*</p><p style=\"margin-left:0px;\">Disclaimer: Information is deemed to be correct but not guaranteed.</p>', 'La Jolla Excellence is a prestigious coastal destination known for its luxurious resort amenities and beautiful sandy beach. This lavish property provides a unique chance to enjoy high-end beachfront living. With its meticulous design and prime location,', '11501 Blvd Popotla Km 28.5, Unidad 301 Torre 5, La Jolla Excellence, Playa Encantada, Rosarito, Baja California, México CP', 'Mexico', 'Baja California', 'Rosarito', 2, '2017', '1800``', '200', 1, '2024-06-13 00:00:00', 1, 1, '2024-06-13 09:26:18', '2024-06-13 10:14:22', 1, '32.35166583003841', '-117.04741644078368'),
(7, 'LJE52S5986', '401 Perla La Jolla Real', '401-perla-la-jolla-real69', 389000.00, 0, 6, 1, '1700', 2, 2, 1, 'LJE52S59861718270929.jpg', '[\"9801718270834.jpg\",\"4101718270834.jpg\",\"5811718270834.jpg\"]', NULL, '<p style=\"margin-left:0px;\">La Jolla Real is a highly esteemed seaside location recognized for its beautiful gardens, luxury resort facilities, and a pristine sandy beach. This opulent complex offers a special opportunity to savor premium beachfront living. Featuring meticulous design and a superb location, La Jolla Real presents an elegant and indulgent way of life, guaranteeing unmatched relaxation and peace.</p><p style=\"margin-left:0px;\"><strong>THE SIZE AND LAYOUT&nbsp;</strong>&nbsp;</p><p style=\"margin-left:0px;\">This corner unit has 2 bedrooms and 2 bathrooms, providing a resort-like living experience with stunning views of the Pacific Ocean. The spacious layout covers 1,545 square feet and features traditional touches like travertine flooring and granite countertops, adding a touch of luxury. Upon entering, you will be welcomed by an open and connected living area, complete with a large island ideal for hosting guests.</p><p style=\"margin-left:0px;\"><strong>THE COMMUNITY&nbsp;</strong></p><p style=\"margin-left:0px;\">Upon arrival, you will be greeted by lovely gardens, lavish amenities, a cool ocean breeze, and the exclusive semi-private beach. In addition to the delightful condo, La Jolla Real offers a range of luxurious amenities to enhance your seaside retreat. Whether you enjoy relaxing by the pool, rejuvenating in the sauna, or strolling along the semi-private sandy beach that you can easily access from La Jolla Real, there are plenty of ways to enjoy the coastal lifestyle.</p><p style=\"margin-left:0px;\">Immerse yourself in the calmness of the carefully designed gardens, where you can find quiet places to relax and enjoy the calming sound of the waves. Some of the many amenities included in the development are:</p><ul><li>Semi-private beach access</li><li>Swimming pools</li><li>Hot tubs</li><li>Sauna</li><li>Gym with ocean views</li><li>Event clubhouses with fully equipped kitchens</li><li>Various sports courts</li><li>Beautiful gardens</li><li>Gas and charcoal outdoor grills.</li></ul><p style=\"margin-left:0px;\"><strong>THE LOCATION&nbsp;</strong></p><p style=\"margin-left:0px;\">La Jolla Real’s convenient location allows for easy access to the finest coastal lifestyle offerings. Enjoy the lively dining and shopping options that are just a short distance from your home. Situated less than 3 minutes south of downtown Rosarito, this area provides a peaceful contrast to the busy tourist-oriented nightlife scene. Additionally, outside the secure gated community, there are more than a dozen stores available for your convenience. You can reach the San Diego border crossing in just 30 minutes by driving North, or you can head down to Valle de Guadalupe, Baja’s version of Napa Valley, with a 45-minute drive South.</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\"><strong>TITLE</strong>&nbsp;</p><p style=\"margin-left:0px;\">The property is free and clear of all liens and encumbrances.&nbsp;</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\"><strong>TERMS&nbsp;</strong></p><p style=\"margin-left:0px;\">This is a cash sale only. No financing is considered. Please arrange all financing approvals with your lender prior to setting up a showing as proof of funds may be requested to schedule.&nbsp;</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\"><strong>VIEWING THIS PROPERTY</strong></p><p style=\"margin-left:0px;\">This property is viewed by appointment only.&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">We ask that you do your best to coordinate a viewing with at least 48 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule&nbsp; on a case by case basis.</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\">*PROPERTY PRICE IS DISPLAYED IN U.S. DOLLARS BUT WILL BE REGISTERED AT THE CURRENT EXCHANGE RATE IN MEXICAN PESOS AT THE TIME OF CLOSING*</p><p style=\"margin-left:0px;\">Disclaimer: Information is deemed to be correct but not guaranteed.</p>', 'This corner unit has 2 bedrooms and 2 bathrooms, providing a resort-like living experience with stunning views of the Pacific Ocean. The spacious layout covers 1,545 square feet and features traditional touches like travertine flooring and granite counter', 'Blvd. Popotla 11295, Unit 401 Torre Perla, La Jolla Real, Playa Encantada, Playas de Rosarito, B.C.', 'United States', 'California', 'Los Angeles', 2, '2020', '1950', '189', 1, '2024-06-13 00:00:00', 1, 1, '2024-06-13 09:28:49', '2024-06-13 09:28:49', 1, '32.362323880709965', '-117.05084966832274'),
(8, 'LJE52S9654', '401 Perla La Jolla Real', '401-perla-la-jolla-real41', 389000.00, 4, 6, 1, '1700', 2, 2, 1, 'LJE52S96541718270929.jpg', '[\"9801718270834.jpg\",\"4101718270834.jpg\",\"5811718270834.jpg\"]', NULL, '<p style=\"margin-left:0px;\">La Jolla Real is a highly esteemed seaside location recognized for its beautiful gardens, luxury resort facilities, and a pristine sandy beach. This opulent complex offers a special opportunity to savor premium beachfront living. Featuring meticulous design and a superb location, La Jolla Real presents an elegant and indulgent way of life, guaranteeing unmatched relaxation and peace.</p><p style=\"margin-left:0px;\"><strong>THE SIZE AND LAYOUT&nbsp;</strong>&nbsp;</p><p style=\"margin-left:0px;\">This corner unit has 2 bedrooms and 2 bathrooms, providing a resort-like living experience with stunning views of the Pacific Ocean. The spacious layout covers 1,545 square feet and features traditional touches like travertine flooring and granite countertops, adding a touch of luxury. Upon entering, you will be welcomed by an open and connected living area, complete with a large island ideal for hosting guests.</p><p style=\"margin-left:0px;\"><strong>THE COMMUNITY&nbsp;</strong></p><p style=\"margin-left:0px;\">Upon arrival, you will be greeted by lovely gardens, lavish amenities, a cool ocean breeze, and the exclusive semi-private beach. In addition to the delightful condo, La Jolla Real offers a range of luxurious amenities to enhance your seaside retreat. Whether you enjoy relaxing by the pool, rejuvenating in the sauna, or strolling along the semi-private sandy beach that you can easily access from La Jolla Real, there are plenty of ways to enjoy the coastal lifestyle.</p><p style=\"margin-left:0px;\">Immerse yourself in the calmness of the carefully designed gardens, where you can find quiet places to relax and enjoy the calming sound of the waves. Some of the many amenities included in the development are:</p><ul><li>Semi-private beach access</li><li>Swimming pools</li><li>Hot tubs</li><li>Sauna</li><li>Gym with ocean views</li><li>Event clubhouses with fully equipped kitchens</li><li>Various sports courts</li><li>Beautiful gardens</li><li>Gas and charcoal outdoor grills.</li></ul><p style=\"margin-left:0px;\"><strong>THE LOCATION&nbsp;</strong></p><p style=\"margin-left:0px;\">La Jolla Real’s convenient location allows for easy access to the finest coastal lifestyle offerings. Enjoy the lively dining and shopping options that are just a short distance from your home. Situated less than 3 minutes south of downtown Rosarito, this area provides a peaceful contrast to the busy tourist-oriented nightlife scene. Additionally, outside the secure gated community, there are more than a dozen stores available for your convenience. You can reach the San Diego border crossing in just 30 minutes by driving North, or you can head down to Valle de Guadalupe, Baja’s version of Napa Valley, with a 45-minute drive South.</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\"><strong>TITLE</strong>&nbsp;</p><p style=\"margin-left:0px;\">The property is free and clear of all liens and encumbrances.&nbsp;</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\"><strong>TERMS&nbsp;</strong></p><p style=\"margin-left:0px;\">This is a cash sale only. No financing is considered. Please arrange all financing approvals with your lender prior to setting up a showing as proof of funds may be requested to schedule.&nbsp;</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\"><strong>VIEWING THIS PROPERTY</strong></p><p style=\"margin-left:0px;\">This property is viewed by appointment only.&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">We ask that you do your best to coordinate a viewing with at least 48 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule&nbsp; on a case by case basis.</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\">*PROPERTY PRICE IS DISPLAYED IN U.S. DOLLARS BUT WILL BE REGISTERED AT THE CURRENT EXCHANGE RATE IN MEXICAN PESOS AT THE TIME OF CLOSING*</p><p style=\"margin-left:0px;\">Disclaimer: Information is deemed to be correct but not guaranteed.</p>', 'This corner unit has 2 bedrooms and 2 bathrooms, providing a resort-like living experience with stunning views of the Pacific Ocean. The spacious layout covers 1,545 square feet and features traditional touches like travertine flooring and granite counter', 'Blvd. Popotla 11295, Unit 401 Torre Perla, La Jolla Real, Playa Encantada, Playas de Rosarito, B.C.', 'United States', 'California', 'Los Angeles', 2, '2020', '1950', '189', 1, '2024-06-13 00:00:00', 1, 2, '2024-06-13 09:28:49', '2024-06-21 07:48:52', 1, '32.362323880709965', '-117.05084966832274'),
(9, 'LOG43R9825', 'For Rent Marena Cove, Suite Number 106', 'for-rent-marena-cove-suite-number-10658', 3000.00, 0, 9, 2, '3700`', 3, 3, 1, 'LOG43R42781718271091.jpg', '[\"8441718271039.jpg\"]', NULL, '<p style=\"margin-left:0px;\">Welcome to Marena Cove, an illustrious and very exclusive gated oceanfront community located in Southern Rosarito.</p><p style=\"margin-left:0px;\">Located just 45 minutes south of the San Diego border crossing this mid size resort style development is truly a hidden gem in our area.</p><p style=\"margin-left:0px;\">If you’ve been looking for an elite high end gated community with very few neighbors this is the place for you!</p><p style=\"margin-left:0px;\">THE SIZE AND LAYOUT<br>This 3 Bed 3 Bath is over 3,700 SqFt offers complete privacy of endless views to the Pacific Ocean.<br>The breathtaking ocean views pour into the living area, master bedroom, secondary bedrooms and kitchen,</p><p style=\"margin-left:0px;\">The house itself is adorned with endless charm that hits all the right notes for an estate of this caliber.<br>Extensive upgrades were installed by the owners over the years of their ownership. No corners were cut, not costs were spared.</p><p style=\"margin-left:0px;\">These include solar panels for an electricity bill free home, a gourmet chef’s kitchen, a water bar with all the bells and whistles, a whole house water filtration system and a closed camera security circuit, among others. This home is arguably trumped by its own ravishing panoramic seascape and water vistas.</p><p style=\"margin-left:0px;\">The outside of the home is nothing short of spectacular!<br>You’ll find a sprawling oceanside entertainment deck equipped with a private sunset jacuzzi, exterior fire pit and it’s very own palapa all conveniently located steps away from the property’s own direct beach access.</p><p style=\"margin-left:0px;\">THE COMMUNITY<br>Marena Cove is most recognized for its exclusive and coveted waterfront boardwalk alongside manicured gardens,<br>Access is controlled 24 hours. Utilities are underground and amenities in the community include a pool, outdoor kitchen &amp; tables area as well as a tennis court.</p><p style=\"margin-left:0px;\">THE LOCATION<br>Located less than 20 minutes south of downtown Rosarito, yet close enough to local favorite restaurants, grocery stores and gas stations; Marena Cove is only about a 45-minute straight shot south of the San Diego border crossing, 8 minute from Lobster Village (Puerto Nuevo) and 45 minutes from Valle de Guadalupe (Mexican Wine Country).</p><p style=\"margin-left:0px;\">TERMS<br>This home is rented fully furnished and pets will be considered with an additional deposit.</p><p style=\"margin-left:0px;\">VIEWING THIS PROPERTY<br>This property is viewed by appointment only.<br>We ask that you do your best to coordinate a viewing with at least 24 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule on a case by case basis.</p><p style=\"margin-left:0px;\">*Disclaimer: Information is deemed to be correct but not guaranteed*</p><p style=\"margin-left:0px;\">*PRICE IS DISPLAYED IN U.S. DOLLARS BUT PURCHASE WILL BE REGISTERED IN MEXICAN PESOS AT THE CURRENT EXCHANGE RATE AT THE TIME OF CLOSING*</p>', 'These include solar panels for an electricity bill free home, a gourmet chef’s kitchen, a water bar with all the bells and whistles, a whole house water filtration system and a closed camera security circuit, among others. This home is arguably trumped by', 'Ensenada - Rosarito 22746 Primo Tapia, B.C. Mexico', 'Mexico', 'Baja California', 'Rosarito', 2, '2014', '', '', 1, '2025-02-05 00:00:00', 1, 2, '2024-06-13 09:31:31', '2024-06-13 11:06:25', 2, '32.34325677495258', '-117.0400350015747'),
(10, 'C32R8267', 'Real del Mar , La Cañada', 'real-del-mar-la-ca-ada39', 2400.00, 2, 2, 2, '2,000', 3, 4, 1, 'C32R82671718271228.jpg', '[\"7801718271173.jpg\",\"6741718271173.jpg\",\"9131718271174.jpg\"]', NULL, '<p style=\"margin-left:0px;\">THE SIZE AND LAYOUT</p><p style=\"margin-left:0px;\">Get ready to be in awe of this incredibly roomy three-bedroom, three-and-a-half-bathroom home in a top-notch community with breathtaking views! The open floor plan is defined by the amazing carved ceilings and wide windows that let in an abundance of natural light. The well-kept interior boasts a modern kitchen and appliances, a unique ceiling, and several other thoughtfully designed features. The spacious, well-maintained home includes stainless steel appliances, air conditioning units in the living room and two bedrooms, and a whole-house heater. This home features a modest third bedroom with an ensuite bathroom in addition to two spacious main bedrooms. Additionally, there is a large garage that is ideal for storage and organized. This house’s backyard is its primary feature. With a spacious jacuzzi, a pizza oven, and an outdoor kitchen, this area is perfect for entertaining. The house is available unfurnished, but for an extra monthly fee, you may arrange for a furnished space if that’s what you’re after. This house is close to the community private school and in a very safe neighborhood. This is the ideal family house in a highly sought-after neighborhood.</p><p style=\"margin-left:0px;\">THE COMMUNITY</p><p style=\"margin-left:0px;\">With stand-alone homes, this is one of the most sought-after communities. To make this your ideal location, the community offers a private school, dining options, lodging, a golf course, an equestrian club, and many other attractions.</p><p style=\"margin-left:0px;\">THE LOCATION</p><p style=\"margin-left:0px;\">The distance to the south of the San Ysidro border crossing is only roughly twenty minutes straight; it takes five minutes to go to Rosarito and five minutes to get to Playas de Tijuana.</p><p style=\"margin-left:0px;\">TERMS</p><p style=\"margin-left:0px;\">This is a long term rental only. Asking is $2,750 USD per month</p><p style=\"margin-left:0px;\">VIEWING THIS PROPERTY</p><p style=\"margin-left:0px;\">This property is occupied and may viewed by appointment only.</p><p style=\"margin-left:0px;\">We ask that you do your best to coordinate a viewing with at least 48 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule&nbsp; on a case by case basis.</p><p style=\"margin-left:0px;\">*PRICE IS DISPLAYED IN U.S. DOLLARS *</p><p style=\"margin-left:0px;\">Disclaimer: Information is deemed to be correct but not guaranteed.</p>', 'Breathtaking views pour into the living area, master bedroom, secondary bedroom and kitchen, which are filled with endless charm that hits all the right notes for an estate of this caliber. Extensive upgrades were tended by the owners over their ownership', 'Tijuana', 'Mexico', 'Baja California', 'Rosarito', 2, '2017', '', '', 2, '2024-02-08 00:00:00', 1, 2, '2024-06-13 09:33:48', '2024-06-13 11:57:59', 2, '32.34615731879762', '-117.04389738255614'),
(11, 'CB78R6896', 'La Jolla Real, Unit 302, Tower Perla', 'la-jolla-real-unit-302-tower-perla11', 6000.00, 0, 4, 2, '1327', 2, 2, 1, 'CB78R68961718271360.jpg', '[\"6181718271307.jpg\",\"9871718271308.jpg\",\"8171718271308.jpg\"]', NULL, '<p style=\"margin-left:0px;\">FOR RENT – In an exquisite oceanfront community that offers the epitome of coastal luxury living. Nestled within lush gardens and boasting 5-star resort amenities, this exclusive condominium presents a rare opportunity to indulge in an unparalleled beachfront lifestyle. La Jolla Real is an exquisite oceanfront community known for its lush gardens, 5 star resort amenities and long semi private sandy beach. This privileged oceanfront community was systematically engineered to accommodate refined qualitative construction in a key strategic location, thereby facilitating all the effortless comforts imaginable to enjoy a luxurious unperturbed lifestyle.</p><p style=\"margin-left:0px;\">THE SIZE AND LAYOUT<br>Perfectly positioned to capture unobstructed Pacific Ocean views, this resort-style 2 bed, 2 bath condo spans across a generous 1,327 square feet. Every detail of this thoughtfully designed home has been meticulously considered to maximize both functionality and aesthetics.</p><p style=\"margin-left:0px;\">THE COMMUNITY<br>From the moment you arrive you will be greeted by lush gardens, resort style amenities, refreshing ocean breeze and the unmistakable exclusive beach.</p><p style=\"margin-left:0px;\">Among the many countless features the development includes for it’s long term renters are:</p><p style=\"margin-left:0px;\">– Access to a semi-private beach<br>– Pools<br>– Jacuzzis<br>– Sauna<br>– Ocean view gym<br>– Clubhouses for events; equipped with fully functional kitchens<br>– Multiple sports courts<br>– Lush gardens<br>– Outdoor grills (Gas and Charcoal)</p><p style=\"margin-left:0px;\">THE LOCATION<br>La Jolla Real’s strategic location ensures effortless access to the best of coastal living. Indulge in the vibrant dining and shopping scene, just moments away from your doorstep. It is also located less than 3 minutes south of downtown Rosarito, yet worlds apart from the loud hustle and bustle of the tourist-centric nightlife; La Jolla Real is only about a 35-minute straight shot south of the San Ysidro border crossing.</p><p style=\"margin-left:0px;\">Outside the 24 hour secure gated community there are over a dozen stores and restaurants within walking distance of a 3 block radius. A short 30 minute drive North will have you back at the San Diego border crossing or a quick 45 minute drive south will get you down to Baja’s very own Napa valley, otherwise known as Valle de Guadalupe.</p><p style=\"margin-left:0px;\">PETS<br>Pets may be considered with an additional deposit.</p><p style=\"margin-left:0px;\">TERMS<br>This is a LONG term rental only, minimum of 1 year lease. Property is rented furnished.</p><p style=\"margin-left:0px;\">VIEWING THIS CONDO<br>This property is viewed by appointment only.<br>We ask that you do your best to coordinate a viewing with at least 24 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule on a case by case basis.</p><p style=\"margin-left:0px;\"><strong>Disclaimer: Information is deemed to be correct but not guaranteed.</strong></p>', 'As soon as you step foot here, you’ll be welcomed by beautiful gardens, luxurious amenities, a refreshing ocean breeze, and the unmistakable semi-private beach. Outside of this pristine condo, La Jolla Real provides a variety of resort-style amenities to', 'La Jolla Real', 'Mexico', 'Baja California', 'Rosarito', 2, '2017', '', '', 3, '2025-05-09 00:00:00', 1, 1, '2024-06-13 09:36:00', '2024-06-13 09:36:00', 2, '32.36696599344374', '-117.03445600682372'),
(12, 'LJR48R7169', 'La Jolla Excellence Suite 204 Tower 4', 'la-jolla-excellence-suite-204-tower-474', 250.00, 13, 7, 2, '1389', 5, 2, 1, 'LJR48R81151718271497.jpg', '[\"6951718271451.jpg\",\"1501718271451.jpg\",\"3111718271451.jpg\"]', NULL, '<p style=\"margin-left:0px;\">This single-story condo oasis of luxury and elegance is skillfully designed and boasts 3 bedrooms, 2 bathrooms, and a spacious 1,863 square feet, ensuring ample space for a comfortable stay.<br>Prepare to be enchanted by the rich allure that permeates every corner of this property, as it cleverly captivates your senses and immerses you in the euphoric tranquility of the Pacific Ocean.<br>Indulge in the ultimate indoor-outdoor living experience, made even more fulfilling by the oversized oceanfront balcony. This expansive space is perfect for entertaining guests or simply unwinding on a lazy Sunday morning, while enjoying a front-row seat to the mesmerizing sea views.<br>Let the soothing sounds of the ocean and the gentle sea breeze whisk you away into a state of pure relaxation. This condo offers a truly enchanting retreat, where you can savor the beauty of nature and create cherished memories with friends and family.</p><p style=\"margin-left:0px;\">INSIDE THE GATED COMMUNITY<br>Lush gardens, access to 2 semi private beaches &amp; 5 star resort amenities liven up this gated oceanfront development. The privileged residential resort was engineered to accommodate refined construction in a key strategic location, thereby enabling effortless comforts &amp; imaginable unperturbed luxuries.<br>Among the countless features the development offers:<br>– Access to 2 semi-private beaches<br>– Indoor &amp; Outdoor pools<br>– Jacuzzis<br>– Saunas<br>– Multiple sports courts<br>– Lush gardens<br>– Secure gated access<br>– 24 / 7 round the clock manned security</p><p style=\"margin-left:0px;\">LOCATION, LOCATION, LOCATION<br>Located less than 3 minutes from downtown Rosarito, yet worlds apart from the busy hustle and bustle of the tourist-centric nightlife…<br>La Jolla Excellence is only a 35-minute straight shot south of the San Diego border if crossing by car.<br>Or breeze on through the express border crossing at the Tijuana airport and UBER or Taxi over to your home in less than 45 minutes.</p><p style=\"margin-left:0px;\">A picturesque 45 minute drive south down Baja’s golden coast will land you down in Mexico’s very own Napa valley. Known around the world as “Valle de Guadalupe” *Pronounced (Va-Ye) in Spanish.<br>Outside the 24 hour secure gated community there are over a dozen stores and restaurants within a 3 block walking distance radius.<br>As well as round the clock convenience stores &amp; multiple gas stations. This area pampers you with all commodities one could desire.</p><p style=\"margin-left:0px;\">TERMS OF RENTALS<br>There is a $75 USD cleaning fee, a $25 registration fee and a $2 per person bracelet fee to be added to the rental.<br>A minimum of 2 night rental is required and there are special discounts for week or longer rentals.</p><p style=\"margin-left:0px;\">*PRICE IS DISPLAYED IN U.S. DOLLARS*</p><p style=\"margin-left:0px;\"><strong>Disclaimer: Information is deemed to be correct but not guaranteed.</strong></p>', 'This property is viewed by appointment only.    We ask that you do your best to coordinate a viewing with at least 48 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule  on a case by case basis.', 'La Jolla Excellence', 'Mexico', 'Baja California', 'Rosarito', 2, '2015', '', '', 0, '2024-02-08 00:00:00', 1, 1, '2024-06-13 09:38:17', '2024-10-07 13:37:32', 2, '32.35275570962376', '-117.0568578165161');
INSERT INTO `properties` (`id`, `code`, `title`, `slug`, `price`, `views`, `neighborhood_id`, `listing_status`, `size`, `bedrooms`, `bathrooms`, `parking_spaces`, `banner`, `gallery`, `map`, `description`, `short_description`, `address`, `country`, `state`, `city`, `dev_lvl`, `year_built`, `property_tax`, `hoa_fees`, `rent_cycle`, `date_available`, `status`, `is_featured`, `created_at`, `updated_at`, `listing_type`, `lattitude`, `longitude`) VALUES
(13, 'LJE6R1656', 'La Jolla Excellence – Suite 301 – Tower 4', 'la-jolla-excellence-suite-301-tower-432', 30000.00, 2, 6, 3, '1987', 4, 3, 1, 'LJE52R42031718271636.jpg', '[\"2201718271576.jpg\",\"3871718271577.jpg\",\"7461718271577.jpg\"]', NULL, '<p style=\"margin-left:0px;\">Those looking for unmatched rental property with an outstanding location, beach access and the ultimate in resort living need look no further! On the sands of the artesanal Boulevard of Popotla, one of Rosarito Beach’s most beautiful and exclusive stretches of beachfront, sits La Jolla Excellence —a new distinctive residential housing development that sparkles among its peers.</p><p style=\"margin-left:0px;\">Award-winning architectural firm DECASA has partnered with world-class designers to create a residence that is in complete harmony with its surroundings. Every aspect of the design—including the use of materials, the soft undulating façade, the flow of its interiors—is in constant dialogue with the harmony and tranquility of the Pacific Ocean.</p><p style=\"margin-left:0px;\">THE SIZE AND LAYOUT</p><p style=\"margin-left:0px;\">This exquisitely furnished 3 Bed 2 Bath unit is by far not your everyday cookie cutter condo. The owner’s were fully involved in the design and furnishing of the unit, making every inch of the 1,937 Square Feet flow effortlessly and elegantly to the cadence of the Pacific Ocean setting the pace for a life lived in full.<br>They went above and beyond with the finishes for this condo as it was meant to be for personal use only. High ceilings, stand alone oven, cook top and many other extras make this condo a unique and exclusive piece of property.</p><p style=\"margin-left:0px;\">Its perfect location will allow you to enjoy white water and the immense pacific ocean as well as the Coronado islands without being too low or too high up on the 10 floor tower.</p><p style=\"margin-left:0px;\">THE COMMUNITY</p><p style=\"margin-left:0px;\">One of the most sought out communities in the area not only for the two beach accesses but also for the various entertainment/dining experiences all within walking distance.</p><p style=\"margin-left:0px;\">Among the many countless features the development includes are:</p><p style=\"margin-left:0px;\">– Access to 2 semi-private beaches – Multiple Jacuzzis<br>– Multiple Pools – 3 of the pools indoor/covered<br>– Steam rooms – Saunas<br>– 2 ocean view gyms – Restaurant-Bar<br>– Boardwalk &amp; jogging trails – Kid’s playground<br>– Indoor cinema room – 3 Multiple sports courts<br>– Multi-use clubhouses for events; equipped with fully functional kitchens</p><p style=\"margin-left:0px;\">THE LOCATION</p><p style=\"margin-left:0px;\">Located less than 3 minutes south of downtown Rosarito, yet worlds apart from the loud hustle and bustle of the tourist-centric nightlife; La Jolla Excellence is only about a 35-minute straight shot south of the San Ysidro border crossing.</p><p style=\"margin-left:0px;\">It is also conveniently located within a 3 block radius of over 12 restaurants with different cuisines, convenience stores &amp; gas stations.</p><p style=\"margin-left:0px;\">If that weren’t enough, more than 300 different wineries, microbreweries, and remarkable first-rate restaurants are located only 45 minutes away in Baja’s very own Napa Valley; better known around the world as “Valle de Guadalupe” or locals simply call it “Valle”.</p><p style=\"margin-left:0px;\">RENTAL TERMS</p><p style=\"margin-left:0px;\">This is a long term rental only meaning it requires at least a 1yr lease.</p><p style=\"margin-left:0px;\">VIEWING THIS CONDO</p><p style=\"margin-left:0px;\">This property is viewed by appointment only.<br>We ask that you do your best to coordinate a viewing with at least 48 hours notice to set you up for an exclusive and private showing.</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\"><strong>Disclaimer: Information is deemed to be correct but not guaranteed.</strong></p>', 'This corner unit has 2 bedrooms and 2 bathrooms, providing a resort-like living experience with stunning views of the Pacific Ocean. The spacious layout covers 1,545 square feet and features traditional touches like travertine flooring and granite counter', ': LA JOLLA EXCELLENCE', 'United States', 'California', 'Los Angeles', 3, '2021', '', '', 4, '2024-06-07 00:00:00', 1, 1, '2024-06-13 09:40:36', '2025-01-14 06:27:26', 2, '32.3558009584353', '-117.0579736154663'),
(14, 'LJE52S1898', 'Las Olas One, Unit 19', 'las-olas-one-unit-1917', 200000.00, 0, 6, 1, '1145', 3, 3, 1, 'LJE52S64411718271790.jpg', '[\"7151718271749.jpg\",\"2371718271749.jpg\",\"421718271750.jpg\"]', NULL, '<p style=\"margin-left:0px;\">This is a unique opportunity and it is priced to SELL!</p><p style=\"margin-left:0px;\">An Oceanfront Condo with all the bells and whistles of Rosarito.</p><p style=\"margin-left:0px;\">Las Olas One sits just 3 minutes away from downtown Rosarito, allowing you access to one the most exclusive and beautiful stretches of beachfront.</p><p style=\"margin-left:0px;\">This is a unique opportunity to be in a resort type style condo with beach access and just a short drive from downtown Rosarito for under $300K. This incredible condo has an infinity pool and jacuzzi that sit as close as possible to the Pacific Ocean not only allowing for incredible ocean views, majestic sunsets but also allowing you to relish the indisputably best views to the Coronado islands, Rosarito Pier and Rosarito Downtown. In addition, this is an excellent income property as it has a year round sandy beach and is within a nice beach walk away from downtown Rosarito.</p><h3 style=\"margin-left:0px;\"><strong><u>THE SIZE AND LAYOUT</u></strong></h3><p style=\"margin-left:0px;\">This 1,145 square feet, 2 Bed 2 Bath unit is ready for you to personalize and move in – As you enter you walk into the open concept kitchen/dining and living area. All allowing spectacular Ocean views from anywhere you decide to be. The master bedroom although not oceanfront also offers striking Ocean views.</p><p style=\"margin-left:0px;\">This condo sits on the 5th floor and offers a nice size balcony to enjoy picturesque million dollar views. This condo is offered as is and furnished with everything that is needed for your immediate enjoyment or for you to begin using it as an income property.</p><p style=\"margin-left:0px;\">If you are looking for that perfect mix of a vacation home and an income property all in one without such a big investment this is the place for you as it is very popular amongst renters because it offers all the bells and whistles of the bigger developments while also allowing direct access to a sandy beach and still managing to be close enough to downtown yet far enough to not be in the busy party scene.</p><h3 style=\"margin-left:0px;\"><strong><u>THE COMMUNITY</u></strong></h3><p style=\"margin-left:0px;\">Las Olas One is a small community that consists of only one tower that sits directly on the OceanFront offering as close to the water as possible living.<br>This community offers alluring amenities, direct Beach access to a sandy beach and ample entertainment/dining experiences all within walking distance.</p><p style=\"margin-left:0px;\">Amenities include:</p><p style=\"margin-left:0px;\">– Secured direct beach access<br>– Infinity pool<br>– Infinity jacuzzi<br>– Ocean view gym<br>– 24 hr security<br>– Gated community<br>– Elevator</p><h3 style=\"margin-left:0px;\"><strong><u>THE LOCATION</u></strong></h3><p style=\"margin-left:0px;\">It’s only about a 35-minute straight shot south of the San Ysidro border crossing, yet worlds apart from the tourist-centric nightlife of downtown Rosarito.</p><p style=\"margin-left:0px;\">Over 2 dozen restaurants with different cuisines, convenience stores, and gas stations are within a 3-block radius.</p><p style=\"margin-left:0px;\">Moreover, Baja’s Napa Valley is only 45 minutes away with more than 300 wineries, microbreweries, and first-rate restaurants; also known as “Valle de Guadalupe”, or simply “Valle” to locals.</p><p style=\"margin-left:0px;\"><strong><u>TITLE</u></strong></p><p style=\"margin-left:0px;\">The property is free and clear of all liens and encumbrances ready for the new Buyer to obtain clear title in the way of a “Bank Trust” (Fideicomiso) for foreign buyers transfer or Escritura (Fee Simple Title) for Mexican nationals.</p><p style=\"margin-left:0px;\"><strong><u>TERMS</u></strong></p><p style=\"margin-left:0px;\">This is a cash sale only. No financing is considered. Please arrange all financing approvals with your lender prior to setting up a showing as proof of funds may be requested to schedule.</p><p style=\"margin-left:0px;\"><strong><u>VIEWING THIS CONDO</u></strong></p><p style=\"margin-left:0px;\">This property is viewed by appointment only.<br>Because this property is currently being rented short term, we ask that you do your best to coordinate a viewing with at least 48 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule on a case by case basis.</p><p style=\"margin-left:0px;\"><strong>*Condo is sold furnished*</strong></p><p style=\"margin-left:0px;\"><strong>*Disclaimer: Information is deemed to be correct but not guaranteed*</strong></p><p style=\"margin-left:0px;\"><strong>*PRICE IS DISPLAYED IN U.S. DOLLARS BUT PURCHASE WILL BE REGISTERED IN MEXICAN PESOS AT THE CURRENT EXCHANGE RATE AT THE TIME OF CLOSING*</strong></p>', 'As soon as you step foot here, you’ll be welcomed by beautiful gardens, luxurious amenities, a refreshing ocean breeze, and the unmistakable semi-private beach. Outside of this pristine condo, La Jolla Real provides a variety of resort-style amenities to', 'Las Olas One', 'United States', 'California', 'Los Angeles', 2, '2020', '1800', '140', 1, '2024-06-13 00:00:00', 1, 1, '2024-06-13 09:43:10', '2024-07-08 11:45:54', 1, '32.36239638015435', '-117.05720113927'),
(15, 'CB78S8861', 'La Jolla Del Mar, Suite 1201 – Tower1', 'la-jolla-del-mar-suite-1201-tower182', 399000.00, 15, 4, 5, '1548', 2, 2, 1, 'CB78S87191718271908.jpg', '[\"8421718271861.jpg\",\"2721718271861.jpg\",\"7701718271862.jpg\"]', NULL, '<p style=\"margin-left:0px;\">This extraordinary residence is truly one-of-a-kind in this development, adorned with a multitude of desirable amenities that are sure to elevate your living experience. And let’s not forget about its unbeatable location, which adds an extra touch of magic to this already remarkable property. Don’t miss out on this exceptional chance to make this sought out floor plan with an updated kitchen your own and take your lifestyle to new heights.</p><p style=\"margin-left:0px;\">THE SIZE AND LAYOUT<br>Indulge in this ultimate oceanfront 2 bed, 2 bath 1,546 sq. ft. corner unit retreat in one of the favorite gems in town. with the ensuite master bedroom of this remarkable residence. Unwind in tranquility as you step into the spacious master bath, boasting a large shower area and a large walk-in closet to accommodate all your needs. Just imagine waking up to awe-inspiring ocean views and stepping out onto your private balcony to embrace the day ahead. It’s the perfect way to start each morning, surrounded by the beauty and serenity of the ocean right at your doorstep.<br>Step into this remarkable property where attention to detail awaits. As you enter, you’ll immediately notice the superior upgrades and meticulous craftsmanship that sets this property apart. The elegant travertine floors flow gracefully through every corner, creating a sophisticated ambiance that is hard to resist.<br>For culinary enthusiasts, the kitchen is an absolute dream. Showcasing exquisite quartz countertops and state-of-the-art stainless steel appliances, it sets the stage for both style and functionality. Whether you enjoy preparing elaborate meals or simply appreciate a well-designed space, this kitchen is sure to satisfy your desires since it’s a perfect space for both cooking up a storm and entertaining guests.</p><p style=\"margin-left:0px;\">THE COMMUNITY<br>Prepare to be charmed from the moment you arrive at this extraordinary destination. Lush gardens welcome you, surrounding you with natural beauty and tranquility. As you explore further, you’ll discover an array of resort-style amenities that promise to elevate your living experience. The refreshing ocean breeze will invigorate your senses, reminding you of the incredible location you are privileged to call yours. And of course, the unmistakable exclusive sandy beach awaits, inviting you to indulge in sun-soaked days and unforgettable moments. Get ready to immerse yourself in a world of luxury, relaxation, and the unparalleled joys of beachfront living.</p><p style=\"margin-left:0px;\">Step beyond the walls of this impeccably maintained condo, and you’ll discover a world of resort-style amenities at La Jolla Del Mar, designed to enhance your coastal experience. Lounge by the poolside, bask in the warm sun, and let your worries melt away. For a truly rejuvenating experience, indulge in the sauna and feel your stress dissipate. And don’t forget to take a leisurely stroll along the long semi-private sandy beach, available to La Jolla Real residents. Immerse yourself in the tranquility of the meticulously landscaped gardens, where you can find peaceful nooks to relax and savor the soothing sound of the waves. At La Jolla Del Mar, every day feels like a luxurious vacation.</p><p style=\"margin-left:0px;\">Among the many countless features the development includes are:</p><p style=\"margin-left:0px;\">-Direct access to a sandy beach<br>– Pools<br>– Jacuzzis<br>– Steam room<br>– Ocean view gym<br>– Clubhouse for events; equipped with fully functional kitchens<br>– Multiple sports courts<br>– Lush gardens<br>– Outdoor grills (Gas and Charcoal)</p><p style=\"margin-left:0px;\">THE LOCATION<br>La Jolla Del Mar’s strategic location ensures effortless access to the best of coastal living. Indulge in the vibrant dining and shopping scene, just moments away from your doorstep. It is also located less than 5 minutes south of downtown Rosarito, yet worlds apart from the loud hustle and bustle of the tourist-centric nightlife; La Jolla Del Mar is only about a 35-minute straight shot south of the San Ysidro border crossing.</p><p style=\"margin-left:0px;\">Outside the 24 hour secure gated community there are over a dozen stores and restaurants within walking distance of a 3 block radius. A short 30 minute drive North will have you back at the San Diego border crossing or a quick 45 minute drive south will get you down to Baja’s very own Napa valley, otherwise known as Valle de Guadalupe.</p><p style=\"margin-left:0px;\">TITLE<br>This property is free and clear and ready to transfer title to its lucky new owner.<br>This condo will be sold fully furnished.</p><p style=\"margin-left:0px;\">TERMS<br>Financing is not available for this property at this time.</p><p style=\"margin-left:0px;\">VIEWING THIS CONDO<br>This property is viewed by appointment only.<br>We ask that you do your best to coordinate a viewing with at least 24 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule on a case by case basis.</p><p style=\"margin-left:0px;\">*PRICE IS DISPLAYED IN U.S. DOLLARS BUT PURCHASE WILL BE REGISTERED IN MEXICAN PESOS AT THE TIME OF CLOSING*</p><p style=\"margin-left:0px;\"><strong>Disclaimer: Information is deemed to be correct but not guaranteed.</strong></p>', 'Mision Viejo is a coastal city at the center of the region, offering an excellent spot for discovering Tijuana and Ensenada. It’s a close-knit community with round-the-clock security, attracting visitors due to its proximity to multiple areas of interest.', 'La Jolla Del Mar', 'Mexico', 'Baja California', 'Rosarito', 2, '2021', '1750', '220', 1, '2024-06-13 00:00:00', 1, 1, '2024-06-13 09:45:08', '2024-10-07 13:37:27', 1, '32.349925620857356', '-117.04690145665282'),
(16, 'LJR48S5256', 'Las Palmas, Suite 404', 'las-palmas-suite-40459', 325000.00, 0, 7, 1, '1670', 2, 2, 2, 'LJR48S69121718272021.jpg', '[\"5941718271983.jpg\",\"5431718271983.jpg\",\"3631718271984.jpg\"]', NULL, '<p style=\"margin-left:0px;\">INFINITE VIEWS!!!</p><p style=\"margin-left:0px;\">Welcome to Las Palmas, a beachfront paradise located as close to the water as possible. This stunning 2 bed, 2 bath condo offers an incredible opportunity to experience coastal living at its finest.<br>Spanning across 1,600 square feet, this spacious 2bed, 2 bath condo has been thoughtfully designed with comfort and style in mind. As you step inside, you are greeted by an open and inviting living space, perfect for entertaining family and friends. The living area seamlessly flows into the entertainment space where you’ll find a pool table, creating a harmonious yet fun atmosphere for gatherings and relaxation.<br>Since it is located on the 4th floor and has large wide windows, it allows you to enjoy Baja’s coastal view. A large balcony invites for amazing outdoor space and offers privileged million dollar views to enjoy a sandy beach, ocean blue and endless white water waves as well as the southern pacific coastal lines.</p><p style=\"margin-left:0px;\">The living area and kitchen are an open concept allowing for maximum views from anywhere within the property. An Oceanfront main bedroom allows for breathtaking headboard views from the moment you wake up. A spacious ensuite includes a large jacuzzi tub and shower.</p><p style=\"margin-left:0px;\">Whether you’re seeking a permanent beachfront residence, a vacation retreat or an income property, this condo in Las Palmas is the perfect place. Embrace the relaxed coastal lifestyle, immerse yourself in breathtaking ocean views, and create unforgettable memories in this idyllic location.</p><p style=\"margin-left:0px;\">THE COMMUNITY<br>Las Palmas has resort type amenities that include a tennis court, two large pools connected by a cascading water feature, a children’s wading pool, four therapy spas, spacious sundeck and a fully equipped clubhouse. The clubhouse provides direct access to a sandy beach and marine rich tidepools. The unique style of the building’s curved facade serves as a buffer against the wind. Las Palmas is unique since it is positioned very close to the waterline. This Allows residents to enjoy a front row seat to all the Marine life action.</p><p style=\"margin-left:0px;\">24/7 guard gated security entrance provides access to tri level parking with ample<br>guest spaces and beautiful landscaped grounds with water fountains and reflecting<br>Pools. The amazing lobby allows for ample relaxation space and the keyed access only elevators provide high security throughout the property.</p><p style=\"margin-left:0px;\">THE LOCATION<br>Located less than 5 minutes south of downtown Rosarito, yet worlds apart from the loud hustle and bustle of the tourist-centric nightlife; Las Palmas is only about a 35-minute straight shot south of the San Ysidro border crossing.</p><p style=\"margin-left:0px;\">Outside the 24 hour secure gated community there are many stores and restaurants within walking distance of a 3 block radius. A short 30 minute drive North will have you back at the San Diego border crossing or a quick 45 minute drive south will get you down to Baja’s very own Napa valley, otherwise known as Valle de Guadalupe.</p><p style=\"margin-left:0px;\">TITLE<br>This property is free and clear and currently in an Escritura ready to transfer title to its lucky new owner.<br>This condo will be sold furnished and turn key minus personal items and a few decor items.</p><p style=\"margin-left:0px;\">TERMS<br>Financing is not available for this property at this time.</p><p style=\"margin-left:0px;\">VIEWING THIS CONDO<br>This property is viewed by appointment only.<br>We ask that you do your best to coordinate a viewing with at least 24 hours notice, however we are flexible to schedule on a case by case basis.</p><p style=\"margin-left:0px;\">*PRICE IS DISPLAYED IN U.S. DOLLARS BUT PURCHASE WILL BE REGISTERED IN MEXICAN PESOS AT THE CURRENT EXCHANGE RATE AT THE TIME OF CLOSING*</p><p style=\"margin-left:0px;\">*Disclaimer: Information is deemed to be correct but not guaranteed*</p>', 'Breathtaking views pour into the living area, master bedroom, secondary bedroom and kitchen, which are filled with endless charm that hits all the right notes for an estate of this caliber. Extensive upgrades were tended by the owners over their ownership', 'Las Palmas', 'Mexico', 'Baja California', 'Rosarito', 2, '2020', '1300', '150', 1, '2024-06-13 00:00:00', 1, 1, '2024-06-13 09:47:01', '2024-06-13 10:12:45', 1, '32.34789533450008', '-117.04561399632567'),
(17, 'LOG66S4212', 'Bajamar, Mision Todos Santos, Suite Number 1019', 'bajamar-mision-todos-santos-suite-number-101956', 469000.00, 7, 9, 1, '2210', 4, 4, 1, 'LOG43S56801718272136.jpg', '[\"5171718272089.jpg\",\"4551718272090.jpg\"]', NULL, '<p style=\"margin-left:0px;\">THE SIZE AND LAYOUT</p><p style=\"margin-left:0px;\">Experience the epitome of luxury living in this remarkable 4-bed, 4-bath villa, nestled within a prestigious oceanfront golf resort community. Spanning an impressive 6,611 square feet, this single-story gem offers a truly enchanting lifestyle.<br>Step inside and be greeted by an open and inviting floor plan that seamlessly blends elegance and functionality. The living area features soaring ceilings, abundant natural light, and overlooks the 9th hole of the golf course.<br>The spacious kitchen showcases ample storage space. Whip up delicious meals and gather around in this charming space, or enjoy an intimate dining experience in the adjacent formal dining area.<br>The villa boasts four bedrooms, each with its own en-suite bathroom, offering privacy and comfort for all guests.<br>Step outside and soak in the beauty of the surroundings. The villa overlooks the golf course, providing a picturesque backdrop for outdoor entertaining. Relax on the spacious one of the two expansive patios, both provide a serene backdrop for outdoor living and entertaining. Take a dip in the refreshing sparkling pool, lounge under the shaded pergola that is nearby, or simply unwind while enjoying the stunning views of the manicured greens.</p><p style=\"margin-left:0px;\">This villa also offers the convenience of a double garage, providing ample space for parking and storage. Whether you have a collection of luxury vehicles or simply need extra room for recreational equipment, the double garage ensures that you have plenty of space for all your needs.<br>Don’t miss your chance to own this remarkable villa and experience the epitome of luxury and relaxation. Contact us now to schedule a private tour and make this magnificent property your own.</p><p style=\"margin-left:0px;\">Discover the pinnacle of resort living in this captivating villa, where luxury, comfort, and convenience unite. Don’t miss the opportunity to make this extraordinary property your own. Contact us today to schedule a private tour and experience the enchantment of this resort community living at its finest.</p><p style=\"margin-left:0px;\">THE COMMUNITY</p><p style=\"margin-left:0px;\">As part of the esteemed resort community, residents enjoy access to a host of exceptional amenities. Tee off at the championship golf course, take advantage of the tennis courts, enjoy workouts in the fitness facilities, relax at the onsite spa, enjoy the gourmet style restaurant or explore the scenic walking trails that wind through the community. With an array of recreational options, there is always something to keep you active and engaged. Here are a few amenities;<br>– 18 hole par 72 Golf course- Gym – Clubhouse<br>– Parks – Jacuzzi<br>– Professional tennis court – Walking trails<br>– Hotel – Biking trails<br>– Full service gourmet restaurant – Full service bar<br>– Spa – Heated pools<br>– Sports courts – Pet park<br>– Whale watching facilities – Social gatherings</p><p style=\"margin-left:0px;\">THE LOCATION</p><p style=\"margin-left:0px;\">Embark on a picturesque journey along Mexico’s scenic Highway #1 (cuota) and immerse yourself in the beauty of the Pacific Ocean as you make your way to BajaMar just a convenient 60-minute drive from the San Ysidro border.</p><p style=\"margin-left:0px;\">TITLE</p><p style=\"margin-left:0px;\">The property is free and clear of all liens and encumbrances. Title is held by way of a current withstanding Mexican Corporation ready to transfer to a new owner.</p><p style=\"margin-left:0px;\">TERMS</p><p style=\"margin-left:0px;\">This is a cash sale only. No financing is considered. Please arrange all financing approvals with your lender prior to setting up a showing as proof of funds may be requested to schedule.</p><p style=\"margin-left:0px;\">VIEWING THIS PROPERTY</p><p style=\"margin-left:0px;\">This property is viewed by appointment only.<br>We ask that you do your best to coordinate a viewing with at least 48 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule on a case by case basis.</p><p style=\"margin-left:0px;\">Property prices are displayed in dollars but will be registered in pesos at the time of closing to the current exchange rate.</p><p style=\"margin-left:0px;\"><strong>Disclaimer: Information is deemed to be correct but not guaranteed.</strong></p>', 'This property is viewed by appointment only.    We ask that you do your best to coordinate a viewing with at least 48 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule  on a case by case basis.', 'Bajamar', 'Mexico', 'Baja California', 'Rosarito', 2, '2021', '2800', '500', 1, '2024-06-13 00:00:00', 1, 1, '2024-06-13 09:48:56', '2024-10-08 06:18:16', 1, '32.33652896813322', '-117.05465169960135'),
(18, 'CB78S6742', 'La Jolla Excellence Condo, Suite Number 102 T3', 'la-jolla-excellence-condo-suite-number-102-t380', 590000.00, 6, 4, 1, '2528', 2, 2, 1, 'CB78S90731718284608.jpg', '[\"7741718284605.jpeg\",\"5011718284605.jpeg\",\"2631718284606.jpg\"]', NULL, '<p style=\"margin-left:0px;\">Paradise now has a zip code</p><p style=\"margin-left:0px;\">Known as one of the most prestigious communities in Rosarito, La Jolla Excellence truly lives up to its reputation.</p><p style=\"margin-left:0px;\">From stunning grand penthouses perched high in towering buildings to ultra luxury million-dollar contemporary Villas that line the ocean bluffs and sandy beaches.&nbsp; Real estate opportunities here do not disappoint as they offer a variety of upscale &amp; moderately priced condominiums and townhomes.</p><p style=\"margin-left:0px;\"><strong>THE SIZE AND LAYOUT&nbsp; OF THE PROPERTY</strong></p><p style=\"margin-left:0px;\">This true single story 3 Bed 3 Bath 2,500+ SqFt corner Villa was skillfully designed to accommodate all modern luxuries in a rich alluring elegance, cleverly enamoring all your senses to the euphonic serene, that is the Pacific Ocean.&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">Savoring indoor outdoor living has never been as fulfilling as it can be from this oversized oceanfront balcony, ideal for entertaining or simply subsiding lazily on a warm Sunday morning with a front row seat to the sea.&nbsp;</p><p style=\"margin-left:0px;\">Tearing one away from breathtaking ocean views makes it easier when you consider how comfortable &amp; accommodating the oversized environments are inside the home.&nbsp; Dominant spaces that include massive bedrooms, an enlarged kitchen &amp; an immense two car garage colossal enough for large wide vehicles.</p><p style=\"margin-left:0px;\">The beauty of purchasing this property is that you are in just in time to mix, match &amp; select from dozens of options in flooring, quartz, cabinetry, etc, to make this your very own unique home.&nbsp; And if you have never enjoyed the affluence of owning a brand new home designed by your own character &amp; personalization, then this is truly the treat for you.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-left:0px;\"><strong>INSIDE THE GATED COMMUNITY&nbsp;</strong></p><p style=\"margin-left:0px;\">Lush gardens, access to 2 semi private beaches &amp; 5 star resort amenities liven up this gated oceanfront development.&nbsp; The privileged residential resort was engineered to accommodate refined construction in a key strategic location, thereby enabling effortless comforts &amp; imaginable unperturbed luxuries. Among the countless features the development offers:</p><p style=\"margin-left:0px;\">– Access to 2 semi-private beaches&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">– Indoor &amp; Outdoor pools&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">– Jacuzzis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">– Saunas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">– Ocean view gym&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">– Clubhouse for events; equipped with fully functional kitchens&nbsp;</p><p style=\"margin-left:0px;\">– Multiple sports courts</p><p style=\"margin-left:0px;\">– Lush gardens</p><p style=\"margin-left:0px;\">– Secure gated access</p><p style=\"margin-left:0px;\">– 24 / 7 round the clock manned security</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\"><strong>LOCATION, LOCATION, LOCATION&nbsp;</strong></p><p style=\"margin-left:0px;\">Located less than 3 minutes from downtown Rosarito, yet worlds apart from the busy hustle and bustle of the tourist-centric nightlife…</p><p style=\"margin-left:0px;\">La Jolla Excellence is only a 35-minute straight shot south of the San Diego border if crossing by car.&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">Or breeze on through the express border crossing at the Tijuana airport and UBER or Taxi over to your home in less than 45 minutes.&nbsp;</p><p style=\"margin-left:0px;\">A picturesque 45 minute drive south down Baja’s golden coast will land you down in Mexico’s very own Napa valley.&nbsp; Known around the world as “Valle de Guadalupe” *Pronounced (Va-Ye) in Spanish.&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">Outside the 24 hour secure gated community there are over a dozen stores and restaurants within a 3 block walking distance radius.&nbsp;</p><p style=\"margin-left:0px;\">As well as round the clock convenience stores &amp; multiple gas stations.&nbsp; This area pampers you with all commodities one could desire.&nbsp;&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\"><strong>TITLE OF THE PROPERTY</strong></p><p style=\"margin-left:0px;\">This property is not yet constructed &amp; is anticipated for delivery in late 2024.&nbsp;</p><p style=\"margin-left:0px;\">This villa will be sold new &amp; fully finished.&nbsp; It will include all new stainless steel kitchen appliances.&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">This sale is through a cession of rights.</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\"><strong>TERMS OF THE SALE</strong></p><p style=\"margin-left:0px;\">Financing is not available for this property at this time.&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">&nbsp;</p><p style=\"margin-left:0px;\"><strong>VIEWING THIS PROPERTY&nbsp;</strong></p><p style=\"margin-left:0px;\">A similar property is available to view by appointment only.&nbsp;&nbsp;</p><p style=\"margin-left:0px;\">We ask that you do your best to coordinate a viewing with at least 24 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule&nbsp; on a case by case basis and we may ask for proof of funds before a showing.</p><p style=\"margin-left:0px;\"><strong>** Please note all pictures of villa are for illustration purposes only and the villa shown has upgrades**</strong></p><p style=\"margin-left:0px;\"><strong>*PRICE IS DISPLAYED IN U.S. DOLLARS BUT PURCHASE WILL BE REGISTERED IN MEXICAN PESOS AT THE CURRENT EXCHANGE RATE AT THE TIME OF CLOSING*</strong></p><p style=\"margin-left:0px;\"><strong>*Disclaimer: Information is deemed to be correct but not guaranteed*</strong></p>', 'Savoring indoor outdoor living has never been as fulfilling as it can be from this oversized oceanfront balcony, ideal for entertaining or simply subsiding lazily on a warm Sunday morning with a front row seat to the sea.', ': La Jolla Excellence Villa Todo Santos , Suite 71', 'Mexico', 'Baja California', 'Rosarito', 2, '2020', '1400', '160', 2, '2024-06-13 00:00:00', 1, 1, '2024-06-13 13:16:48', '2024-08-09 05:39:59', 1, '32.36040375707907', '-117.0458714883911'),
(19, 'LJE52R5567', 'La Jolla Excellence Condo, Suite Number 102 T3', 'la-jolla-excellence-condo-suite-number-102-t345', 4500.00, 5, 6, 2, '1580', 3, 2, 4, 'LJE52R37411718284710.jpg', '[\"1241718284634.jpg\",\"8121718284634.jpg\",\"6391718284635.jpg\"]', NULL, '<p style=\"margin-left:0px;text-align:justify;\">Paradise now has a zip code</p><p style=\"margin-left:0px;text-align:justify;\">Known as one of the most prestigious communities in Rosarito, La Jolla Excellence truly lives up to its reputation.</p><p style=\"margin-left:0px;text-align:justify;\">From stunning grand penthouses perched high in towering buildings to ultra luxury million-dollar contemporary Villas that line the ocean bluffs and sandy beaches.&nbsp; Real estate opportunities here do not disappoint as they offer a variety of upscale &amp; moderately priced condominiums and townhomes.</p><p style=\"margin-left:0px;text-align:justify;\"><strong>THE SIZE AND LAYOUT&nbsp; OF THE PROPERTY</strong></p><figure class=\"image image-style-align-right image_resized\" style=\"width:45.02%;\"><img style=\"aspect-ratio:1000/1000;\" src=\"https://explorelogicsit.net/propertydealership/public/ckeditor-uploads/logoofapp(1)_1718340268.png\" width=\"1000\" height=\"1000\"></figure><p style=\"margin-left:0px;text-align:justify;\">This true single story 3 Bed 3 Bath 2,500+ SqFt corner Villa was skillfully designed to accommodate all modern luxuries in a rich alluring elegance, cleverly enamoring all your senses to the euphonic serene, that is the Pacific Ocean.&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">Savoring indoor outdoor living has never been as fulfilling as it can be from this oversized oceanfront balcony, ideal for entertaining or simply subsiding lazily on a warm Sunday morning with a front row seat to the sea.&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">Tearing one away from breathtaking ocean views makes it easier when you consider how comfortable &amp; accommodating the oversized environments are inside the home.&nbsp; Dominant spaces that include massive bedrooms, an enlarged kitchen &amp; an immense two car garage colossal enough for large wide vehicles.</p><p style=\"margin-left:0px;text-align:justify;\">The beauty of purchasing this property is that you are in just in time to mix, match &amp; select from dozens of options in flooring, quartz, cabinetry, etc, to make this your very own unique home.&nbsp; And if you have never enjoyed the affluence of owning a brand new home designed by your own character &amp; personalization, then this is truly the treat for you.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\"><strong>INSIDE THE GATED COMMUNITY&nbsp;</strong></p><p style=\"margin-left:0px;text-align:justify;\">Lush gardens, access to 2 semi private beaches &amp; 5 star resort amenities liven up this gated oceanfront development.&nbsp; The privileged residential resort was engineered to accommodate refined construction in a key strategic location, thereby enabling effortless comforts &amp; imaginable unperturbed luxuries. Among the countless features the development offers:</p><p style=\"margin-left:0px;text-align:justify;\">– Access to 2 semi-private beaches&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">– Indoor &amp; Outdoor pools&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">– Jacuzzis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">– Saunas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">– Ocean view gym&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">– Clubhouse for events; equipped with fully functional kitchens&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">– Multiple sports courts</p><p style=\"margin-left:0px;text-align:justify;\">– Lush gardens</p><p style=\"margin-left:0px;text-align:justify;\">– Secure gated access</p><p style=\"margin-left:0px;text-align:justify;\">– 24 / 7 round the clock manned security</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\"><strong>LOCATION, LOCATION, LOCATION&nbsp;</strong></p><figure class=\"image image-style-align-left image_resized\" style=\"width:50%;\"><img style=\"aspect-ratio:1536/1364;\" src=\"https://explorelogicsit.net/propertydealership/public/ckeditor-uploads/web_ui_5-1-1536x1364(1)_1718340281.png\" width=\"1536\" height=\"1364\"><figcaption>Test caption</figcaption></figure><p style=\"margin-left:0px;text-align:justify;\">Located less than 3 minutes from downtown Rosarito, yet worlds apart from the busy hustle and bustle of the tourist-centric nightlife…</p><p style=\"margin-left:0px;text-align:justify;\">La Jolla Excellence is only a 35-minute straight shot south of the San Diego border if crossing by car.&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">Or breeze on through the express border crossing at the Tijuana airport and UBER or Taxi over to your home in less than 45 minutes.&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">A picturesque 45 minute drive south down Baja’s golden coast will land you down in Mexico’s very own Napa valley.&nbsp; Known around the world as “Valle de Guadalupe” *Pronounced (Va-Ye) in Spanish.&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">Outside the 24 hour secure gated community there are over a dozen stores and restaurants within a 3 block walking distance radius.&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">As well as round the clock convenience stores &amp; multiple gas stations.&nbsp; This area pampers you with all commodities one could desire.&nbsp;&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\"><strong>TITLE OF THE PROPERTY</strong></p><p style=\"margin-left:0px;text-align:justify;\">This property is not yet constructed &amp; is anticipated for delivery in late 2024.&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">This villa will be sold new &amp; fully finished.&nbsp; It will include all new stainless steel kitchen appliances.&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">This sale is through a cession of rights.</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\"><strong>TERMS OF THE SALE</strong></p><p style=\"margin-left:0px;text-align:justify;\">Financing is not available for this property at this time.&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\"><strong>VIEWING THIS PROPERTY&nbsp;</strong></p><p style=\"margin-left:0px;text-align:justify;\">A similar property is available to view by appointment only.&nbsp;&nbsp;</p><p style=\"margin-left:0px;text-align:justify;\">We ask that you do your best to coordinate a viewing with at least 24 hours notice to set you up for an exclusive and private showing, however we are flexible to schedule&nbsp; on a case by case basis and we may ask for proof of funds before a showing.</p><p style=\"margin-left:0px;text-align:justify;\">** Please note all pictures of villa are for illustration purposes only and the villa shown has upgrades**</p><p style=\"margin-left:0px;text-align:justify;\">*PRICE IS DISPLAYED IN U.S. DOLLARS BUT PURCHASE WILL BE REGISTERED IN MEXICAN PESOS AT THE CURRENT EXCHANGE RATE AT THE TIME OF CLOSING*</p><p style=\"margin-left:0px;text-align:justify;\">*Disclaimer: Information is deemed to be correct but not guaranteed*</p>', 'The beauty of purchasing this property is that you are in just in time to mix, match & select from dozens of options in flooring, quartz, cabinetry, etc, to make this your very own unique home.  And if you have never enjoyed the affluence of owning a brand new home designed by your own character & personalization, then this is truly the treat for you.', 'LA JOLLA EXCELLENCE', 'United States', 'California', 'Los Angeles', 3, '2019', '', '', 3, '2024-06-13 00:00:00', 1, 1, '2024-06-13 13:18:30', '2024-10-08 06:17:55', 2, '32.35685113765144', '-117.05660032445067');

-- --------------------------------------------------------

--
-- Table structure for table `property_features`
--

CREATE TABLE `property_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_features`
--

INSERT INTO `property_features` (`id`, `property_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(90, 4, 1, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(91, 4, 2, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(92, 4, 3, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(93, 4, 4, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(94, 4, 5, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(95, 4, 6, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(96, 4, 7, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(97, 4, 8, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(98, 4, 9, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(99, 4, 10, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(100, 4, 11, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(101, 4, 12, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(102, 4, 13, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(103, 4, 14, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(104, 4, 15, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(105, 4, 16, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(106, 4, 17, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(107, 4, 18, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(108, 4, 19, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(109, 4, 20, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(110, 4, 21, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(111, 4, 22, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(112, 4, 23, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(113, 4, 24, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(114, 4, 25, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(115, 4, 26, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(116, 4, 27, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(117, 4, 28, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(118, 4, 29, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(119, 4, 30, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(120, 4, 31, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(121, 4, 32, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(176, 7, 1, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(177, 7, 2, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(178, 7, 4, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(179, 7, 5, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(180, 7, 6, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(181, 7, 7, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(182, 7, 8, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(183, 7, 9, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(184, 7, 10, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(185, 7, 11, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(186, 7, 12, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(187, 7, 13, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(188, 7, 14, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(189, 7, 15, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(190, 7, 16, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(191, 7, 17, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(192, 7, 18, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(193, 7, 19, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(194, 7, 20, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(195, 7, 21, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(196, 7, 22, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(197, 7, 23, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(198, 7, 24, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(199, 7, 25, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(200, 7, 26, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(201, 7, 28, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(202, 7, 29, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(203, 7, 30, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(204, 8, 1, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(205, 8, 2, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(206, 8, 4, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(207, 8, 5, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(208, 8, 6, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(209, 8, 7, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(210, 8, 8, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(211, 8, 9, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(212, 8, 10, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(213, 8, 11, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(214, 8, 12, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(215, 8, 13, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(216, 8, 14, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(217, 8, 15, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(218, 8, 16, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(219, 8, 17, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(220, 8, 18, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(221, 8, 19, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(222, 8, 20, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(223, 8, 21, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(224, 8, 22, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(225, 8, 23, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(226, 8, 24, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(227, 8, 25, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(228, 8, 26, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(229, 8, 28, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(230, 8, 29, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(231, 8, 30, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(257, 10, 1, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(258, 10, 2, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(259, 10, 3, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(260, 10, 4, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(261, 10, 6, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(262, 10, 7, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(263, 10, 8, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(264, 10, 9, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(265, 10, 10, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(266, 10, 11, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(267, 10, 12, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(268, 10, 13, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(269, 10, 14, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(270, 10, 15, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(271, 10, 18, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(272, 10, 20, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(273, 10, 21, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(274, 10, 23, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(275, 10, 24, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(276, 10, 25, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(277, 10, 26, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(278, 10, 27, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(279, 10, 29, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(280, 10, 32, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(281, 11, 1, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(282, 11, 2, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(283, 11, 4, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(284, 11, 5, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(285, 11, 6, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(286, 11, 7, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(287, 11, 8, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(288, 11, 9, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(289, 11, 10, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(290, 11, 13, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(291, 11, 14, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(292, 11, 15, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(293, 11, 16, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(294, 11, 17, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(295, 11, 18, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(296, 11, 19, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(297, 11, 20, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(298, 11, 21, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(299, 11, 25, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(300, 11, 26, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(301, 11, 27, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(302, 11, 28, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(303, 11, 30, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(476, 16, 4, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(477, 16, 5, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(478, 16, 6, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(479, 16, 7, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(480, 16, 8, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(481, 16, 9, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(482, 16, 10, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(483, 16, 11, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(484, 16, 12, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(485, 16, 13, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(486, 16, 14, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(487, 16, 15, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(488, 16, 16, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(489, 16, 18, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(490, 16, 19, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(491, 16, 20, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(492, 16, 22, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(493, 16, 23, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(494, 16, 24, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(495, 16, 25, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(496, 16, 26, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(497, 16, 27, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(498, 16, 29, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(499, 16, 32, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(549, 6, 1, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(550, 6, 2, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(551, 6, 3, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(552, 6, 4, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(553, 6, 5, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(554, 6, 6, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(555, 6, 7, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(556, 6, 8, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(557, 6, 9, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(558, 6, 10, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(559, 6, 11, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(560, 6, 12, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(561, 6, 13, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(562, 6, 14, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(563, 6, 15, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(564, 6, 16, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(565, 6, 17, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(566, 6, 19, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(567, 6, 20, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(568, 6, 21, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(569, 6, 22, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(570, 6, 23, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(571, 6, 24, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(572, 6, 25, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(573, 6, 26, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(574, 6, 28, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(575, 6, 31, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(576, 6, 32, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(577, 2, 1, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(578, 2, 2, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(579, 2, 3, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(580, 2, 4, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(581, 2, 5, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(582, 2, 6, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(583, 2, 7, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(584, 2, 8, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(585, 2, 9, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(586, 2, 10, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(587, 2, 11, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(588, 2, 12, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(589, 2, 13, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(590, 2, 14, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(591, 2, 15, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(592, 2, 16, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(593, 2, 17, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(594, 2, 18, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(595, 2, 19, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(596, 2, 20, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(597, 2, 21, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(598, 2, 22, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(599, 2, 23, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(600, 2, 24, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(601, 2, 25, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(602, 2, 26, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(603, 2, 27, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(604, 2, 28, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(605, 2, 29, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(606, 2, 30, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(607, 2, 31, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(608, 2, 32, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(609, 1, 1, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(610, 1, 2, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(611, 1, 3, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(612, 1, 4, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(613, 1, 5, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(614, 1, 6, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(615, 1, 7, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(616, 1, 8, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(617, 1, 9, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(618, 1, 10, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(619, 1, 12, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(620, 1, 13, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(621, 1, 14, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(622, 1, 15, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(623, 1, 16, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(624, 1, 17, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(625, 1, 18, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(626, 1, 20, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(627, 1, 21, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(628, 1, 24, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(629, 1, 25, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(630, 1, 26, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(631, 1, 27, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(632, 1, 28, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(633, 1, 31, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(659, 9, 1, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(660, 9, 2, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(661, 9, 4, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(662, 9, 5, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(663, 9, 7, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(664, 9, 8, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(665, 9, 9, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(666, 9, 10, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(667, 9, 12, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(668, 9, 13, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(669, 9, 14, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(670, 9, 15, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(671, 9, 16, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(672, 9, 17, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(673, 9, 18, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(674, 9, 28, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(675, 9, 32, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(703, 15, 1, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(704, 15, 2, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(705, 15, 5, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(706, 15, 8, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(707, 15, 9, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(708, 15, 10, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(709, 15, 11, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(710, 15, 12, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(711, 15, 13, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(712, 15, 14, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(713, 15, 15, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(714, 15, 16, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(715, 15, 17, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(716, 15, 18, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(717, 15, 20, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(718, 15, 23, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(719, 15, 24, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(720, 15, 25, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(721, 15, 26, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(722, 15, 28, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(723, 15, 30, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(724, 15, 32, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(931, 19, 1, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(932, 19, 2, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(933, 19, 3, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(934, 19, 4, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(935, 19, 5, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(936, 19, 6, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(937, 19, 7, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(938, 19, 8, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(939, 19, 9, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(940, 19, 10, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(941, 19, 11, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(942, 19, 12, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(943, 19, 13, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(944, 19, 14, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(945, 19, 15, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(946, 19, 16, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(947, 19, 17, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(948, 19, 18, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(949, 19, 19, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(950, 19, 20, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(951, 19, 21, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(952, 19, 22, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(953, 19, 23, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(954, 19, 24, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(955, 19, 25, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(956, 19, 26, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(957, 19, 27, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(958, 19, 28, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(959, 19, 29, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(960, 19, 30, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(961, 19, 31, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(962, 19, 32, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(963, 17, 1, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(964, 17, 2, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(965, 17, 4, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(966, 17, 5, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(967, 17, 6, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(968, 17, 7, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(969, 17, 8, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(970, 17, 9, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(971, 17, 10, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(972, 17, 11, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(973, 17, 12, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(974, 17, 13, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(975, 17, 14, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(976, 17, 15, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(977, 17, 16, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(978, 17, 17, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(979, 17, 18, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(980, 17, 20, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(981, 17, 21, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(982, 17, 23, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(983, 17, 24, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(984, 17, 25, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(985, 17, 26, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(986, 17, 28, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(987, 17, 30, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(988, 17, 31, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(989, 17, 32, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(1019, 12, 3, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1020, 12, 4, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1021, 12, 5, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1022, 12, 6, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1023, 12, 7, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1024, 12, 9, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1025, 12, 10, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1026, 12, 11, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1027, 12, 13, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1028, 12, 14, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1029, 12, 15, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1030, 12, 16, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1031, 12, 17, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1032, 12, 18, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1033, 12, 20, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1034, 12, 21, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1035, 12, 23, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1036, 12, 24, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1037, 12, 25, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1038, 12, 26, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1039, 12, 29, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1040, 12, 30, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(1070, 18, 1, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1071, 18, 2, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1072, 18, 3, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1073, 18, 4, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1074, 18, 5, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1075, 18, 6, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1076, 18, 7, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1077, 18, 8, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1078, 18, 9, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1079, 18, 10, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1080, 18, 11, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1081, 18, 12, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1082, 18, 13, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1083, 18, 14, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1084, 18, 15, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1085, 18, 18, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1086, 18, 19, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1087, 18, 20, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1088, 18, 21, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1089, 18, 22, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1090, 18, 23, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1091, 18, 24, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1092, 18, 25, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1093, 18, 26, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1094, 18, 27, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1095, 18, 28, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1096, 18, 29, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1097, 18, 30, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1098, 18, 32, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(1126, 14, 1, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1127, 14, 2, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1128, 14, 3, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1129, 14, 5, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1130, 14, 6, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1131, 14, 7, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1132, 14, 8, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1133, 14, 9, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1134, 14, 10, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1135, 14, 11, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1136, 14, 12, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1137, 14, 13, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1138, 14, 14, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1139, 14, 15, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1140, 14, 16, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1141, 14, 17, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1142, 14, 18, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1143, 14, 19, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1144, 14, 20, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1145, 14, 21, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1146, 14, 23, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1147, 14, 24, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1148, 14, 25, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1149, 14, 26, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1150, 14, 28, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1151, 14, 30, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1152, 14, 31, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(1153, 13, 1, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1154, 13, 2, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1155, 13, 3, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1156, 13, 5, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1157, 13, 6, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1158, 13, 7, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1159, 13, 8, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1160, 13, 10, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1161, 13, 11, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1162, 13, 12, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1163, 13, 13, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1164, 13, 14, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1165, 13, 16, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1166, 13, 17, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1167, 13, 18, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1168, 13, 20, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1169, 13, 23, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1170, 13, 24, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1171, 13, 25, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1172, 13, 26, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1173, 13, 28, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1174, 13, 30, '2025-01-14 06:27:26', '2025-01-14 06:27:26'),
(1175, 13, 32, '2025-01-14 06:27:26', '2025-01-14 06:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `property_id`, `type_id`, `created_at`, `updated_at`) VALUES
(4, 4, 2, '2024-06-13 09:21:31', '2024-06-13 09:21:31'),
(7, 7, 5, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(8, 7, 8, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(9, 8, 5, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(10, 8, 8, '2024-06-13 09:28:49', '2024-06-13 09:28:49'),
(12, 10, 3, '2024-06-13 09:33:48', '2024-06-13 09:33:48'),
(13, 11, 5, '2024-06-13 09:36:00', '2024-06-13 09:36:00'),
(27, 16, 7, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(28, 16, 8, '2024-06-13 10:12:45', '2024-06-13 10:12:45'),
(32, 6, 4, '2024-06-13 10:14:22', '2024-06-13 10:14:22'),
(33, 2, 2, '2024-06-13 10:14:57', '2024-06-13 10:14:57'),
(34, 1, 1, '2024-06-13 10:15:12', '2024-06-13 10:15:12'),
(36, 9, 7, '2024-06-13 11:06:25', '2024-06-13 11:06:25'),
(38, 15, 3, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(39, 15, 8, '2024-06-13 12:25:50', '2024-06-13 12:25:50'),
(71, 19, 1, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(72, 19, 4, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(73, 19, 5, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(74, 19, 6, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(75, 19, 7, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(76, 19, 8, '2024-06-25 13:13:34', '2024-06-25 13:13:34'),
(77, 17, 1, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(78, 17, 5, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(79, 17, 8, '2024-06-27 05:16:08', '2024-06-27 05:16:08'),
(86, 12, 6, '2024-06-27 05:16:53', '2024-06-27 05:16:53'),
(93, 18, 1, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(94, 18, 2, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(95, 18, 3, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(96, 18, 6, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(97, 18, 7, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(98, 18, 8, '2024-07-08 09:41:44', '2024-07-08 09:41:44'),
(100, 14, 8, '2024-07-08 11:45:54', '2024-07-08 11:45:54'),
(101, 13, 7, '2025-01-14 06:27:26', '2025-01-14 06:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `search_saves`
--

CREATE TABLE `search_saves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `search_query` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `search_saves`
--

INSERT INTO `search_saves` (`id`, `user_id`, `title`, `search_query`, `created_at`, `updated_at`) VALUES
(1, 92, 'Excellence', '{\"title\":\"Excellence\",\"type_id\":\"2\",\"min_bed\":\"0\",\"min_bath\":\"0\",\"min_price\":\"300\",\"max_price\":\"8000000\",\"min_size\":\"500\",\"max_size\":\"4500\",\"neighborhood_id\":\"4\",\"city_id\":\"1\",\"listing_status\":\"1\",\"features_id_array\":\"[1,56,91]\",\"sorting\":\"2\"}', '2024-06-14 11:07:05', '2024-06-14 11:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `meta_tag`, `meta_key`, `meta_value`) VALUES
(1, 'project', 'site_title', 'Explore Homes'),
(2, 'project', 'short_site_title', 'EH'),
(3, 'project', 'site_logo', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `designation` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `content`, `designation`, `location`, `image`, `created_at`, `updated_at`) VALUES
(1, 'John Smith', 'I\'m thrilled with the apartment I bought through your agency. The location is perfect, and the process was smooth from start to finish.', 'Software Engineer', 'New York, USA', '1718272933.jpg', '2024-06-13 10:02:13', '2024-06-13 10:02:13'),
(2, 'Michael Johnson', 'I\'m impressed with the level of professionalism and dedication shown by your real estate agents. They made the buying process stress-free.', 'Accountant', 'Sydney, Australia', '1718273068.jpg', '2024-06-13 10:04:28', '2024-06-13 10:04:28'),
(3, 'David Lee', 'Your team understood my specific needs as a buyer. They were able to find me a property that exceeded my expectations.', 'Architect', 'San Francisco, USA', '1718273105.jpg', '2024-06-13 10:05:05', '2024-06-13 10:05:05'),
(4, 'Alexandre Silva', 'Estou muito satisfeito com a minha nova casa em São Paulo. Obrigado pela atenção e suporte durante todo o processo de compra.', 'Business Owner', 'São Paulo, Brazil', '1718273140.jpg', '2024-06-13 10:05:40', '2024-06-13 10:05:40'),
(5, 'Hiroshi Tanaka', '東京での私の新しい家についてあなたの助けに感謝しています。あなたのチームの専門知識とサポートに感謝します', 'Engineer', 'Tokyo, Japan', '1718273207.jpg', '2024-06-13 10:06:47', '2024-06-13 10:06:47'),
(6, 'Sophie MüllerDesigner', 'Vielen Dank für die Hilfe bei der Suche nach meiner neuen Wohnung in Berlin. Ich bin sehr zufrieden mit der Immobilie und dem Service', 'Designer', 'Berlin, Germany', '1718273260.jpg', '2024-06-13 10:07:40', '2024-06-13 10:07:40'),
(7, 'Mark Johnson', 'I want to thank your team for finding me the perfect home in Chicago. Your knowledge and dedication were exceptional', 'Doctor', 'Chicago, USA', '1718273298.jpg', '2024-06-13 10:08:18', '2024-06-13 10:08:18'),
(8, 'Juan Pérez', 'Estoy muy contento con la casa que compré gracias a su agencia. El proceso fue eficiente y la atención personalizada fue excelente.', 'Lawyer', 'Mexico City, Mexico', '1718273363.jpg', '2024-06-13 10:09:23', '2024-06-13 10:09:23'),
(9, 'Andreas Schmidt', 'Herzlichen Dank für die Unterstützung bei der Suche nach meinem neuen Zuhause in München. Ich bin mit Ihrer Dienstleistung sehr zufrieden.', 'Manager', 'Munich, Germany', '1718273398.jpg', '2024-06-13 10:09:58', '2024-06-13 10:09:58'),
(10, 'Mateo Rodriguez', 'Quiero expresar mi gratitud por haberme ayudado a encontrar el lugar perfecto para vivir en Buenos Aires. Su profesionalismo fue clave.', 'Artist', 'Buenos Aires, Argentina', '1718273791.jpg', '2024-06-13 10:16:31', '2024-06-13 10:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0: Inactive, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `title`, `slug`, `banner`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Condo', 'condo', '1718264139.jpg', 1, '2024-06-13 07:35:39', '2024-06-13 07:35:39'),
(2, 'Houses', 'houses', '1718264155.jpg', 1, '2024-06-13 07:35:55', '2024-06-13 07:35:55'),
(3, 'Villas', 'villas', '1718264171.jpg', 1, '2024-06-13 07:36:11', '2024-06-13 07:36:11'),
(4, 'Apartments', 'apartments', '1718264187.jpg', 1, '2024-06-13 07:36:27', '2024-06-13 07:36:27'),
(5, 'Warehouses', 'warehouses', '1718264206.jpg', 1, '2024-06-13 07:36:46', '2024-06-13 07:36:46'),
(6, 'Beach houses', 'beach-houses', '1718264236.jpg', 1, '2024-06-13 07:37:16', '2024-06-13 07:37:16'),
(7, 'Mountain cabins', 'mountain-cabins', '1718264255.jpg', 1, '2024-06-13 07:37:35', '2024-06-13 07:37:35'),
(8, 'Luxury homes', 'luxury-homes', '1718264270.jpg', 1, '2024-06-13 07:37:50', '2024-06-13 07:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT 'user.png',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive or del by user, 1=active',
  `is_blocked` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `phone_no`, `image_name`, `status`, `is_blocked`, `created_at`, `updated_at`) VALUES
(92, 'John', 'Doe', 'john@gmail.com', '$2y$12$A1kHkTc5TnFL7swEQMr/KuUvw5jkP7OnoHV.xxe.7Wyg2sGvyIJ9i', '+923394008600', 'user.png', 1, 0, '2023-12-29 09:49:14', '2024-06-14 11:03:51'),
(100, 'John', 'Watson', 'johnwatson@gmail.com', '$2y$12$tVVuRZbLZAv36sWQBectvOcVUrNpsaFfvGKsHK4GJITmvcO/JUGwq', '+1456712347', '1718180371.webp', 0, 0, '2024-06-12 08:09:41', '2024-06-14 11:03:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_evals`
--
ALTER TABLE `home_evals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `properties_code_unique` (`code`),
  ADD KEY `properties_neighborhood_id_foreign` (`neighborhood_id`);

--
-- Indexes for table `property_features`
--
ALTER TABLE `property_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_features_property_id_foreign` (`property_id`),
  ADD KEY `property_features_feature_id_foreign` (`feature_id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_types_property_id_foreign` (`property_id`),
  ADD KEY `property_types_type_id_foreign` (`type_id`);

--
-- Indexes for table `search_saves`
--
ALTER TABLE `search_saves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `home_evals`
--
ALTER TABLE `home_evals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `property_features`
--
ALTER TABLE `property_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1176;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `search_saves`
--
ALTER TABLE `search_saves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_neighborhood_id_foreign` FOREIGN KEY (`neighborhood_id`) REFERENCES `neighborhoods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_features`
--
ALTER TABLE `property_features`
  ADD CONSTRAINT `property_features_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_features_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_types`
--
ALTER TABLE `property_types`
  ADD CONSTRAINT `property_types_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_types_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
