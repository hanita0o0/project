-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 09:38 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noc`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `province_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `province_id`) VALUES
(1, 'تهران', 1),
(2, 'کرج', 2),
(3, 'اصفهان', 3);

-- --------------------------------------------------------

--
-- Table structure for table `code_phone`
--

CREATE TABLE `code_phone` (
  `id` int(11) NOT NULL,
  `code` varchar(12) NOT NULL,
  `province_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `code_phone`
--

INSERT INTO `code_phone` (`id`, `code`, `province_id`) VALUES
(1, '021', 1),
(2, '026', 2),
(3, '031', 3);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `address` varchar(512) NOT NULL,
  `type_location_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `latitude`, `longitude`, `province_id`, `city_id`, `region_id`, `address`, `type_location_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'پاپ سایت1', 38.8951, -78.1364, 1, 1, 2, 'فردوس غرب، خیابان پرواز،کوچه نهم، پلاک 52، واحد1', 1, 1, 1601420563, 1601448390),
(2, 'نقطه 2', 38.8951, -78.1364, 1, 1, 2, 'fff', 2, 1, 1601420606, 1601420606),
(4, 'پاپ سایت2', 45.8951, -77.0364, 3, 3, 4, 'میدان امام خمینی، نبش خیابان گلها، کوچه بنفشه، پلاک 5، واحد 10', 1, 1, 1601448275, 1601448275),
(5, 'پاپ سایت3', 38.8951, 80.0364, 2, 2, 5, 'بلوار ارم، خیابان شهرداری،خیایان 504،پلاک5، واحد10', 1, 1, 1601448561, 1601448561),
(6, 'پاپ سایت4', 45.8951, -78.1364, 3, 3, 3, 'خیابان اصلی، برج آتلانتیک', 1, 1, 1601448644, 1601448644),
(7, 'پاپ سایت5', 32.4951, -78.1364, 1, 1, 6, 'میدان صنعت، خیابان دوم', 1, 1, 1601448863, 1601448874),
(8, 'نقطه 1', 38.8951, -77.0364, 3, 3, 4, 'سی و سه پل، نبش خیابان پنجم،پلاک 70،واحد11', 2, 1, 1601448970, 1601448970),
(9, 'نقطه 3', 38.8951, -78.1364, 2, 2, 1, 'kkkk', 2, 1, 1601450450, 1601450450),
(10, 'نقطه 4', 45.8951, -78.1364, 3, 3, 4, 'تتتتتتتت', 2, 1, 1601450854, 1601450854),
(11, 'نقطه 5', 38.8951, -77.0364, 1, 1, 6, 'mmmmmm', 2, 1, 1601451070, 1601451070),
(12, 'نقطه 6', 32.4951, -77.0364, 1, 1, 7, 'vvvvvvvvvvvvvv', 2, 1, 1601451097, 1601451097),
(13, 'نقطه 7', 45.8951, -78.1364, 3, 3, 4, 'ccccccccccccccccccccccc', 2, 1, 1601451138, 1601451138);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1601419225),
('m130524_201442_init', 1601419229),
('m190124_110200_add_verification_token_column_to_user_table', 1601419230),
('m200924_183720_create_type_service_table', 1601419231),
('m200924_184537_create_type_location_table', 1601419234),
('m200924_185518_create_province_table', 1601419235),
('m200924_185813_create_city_table', 1601419238),
('m200924_185935_create_region_table', 1601419242),
('m200927_171331_create_role_table', 1601419243),
('m200927_171720_create_user_role_table', 1601419254),
('m200928_060034_create_code_phone_table', 1601419256),
('m200928_152547_create_location_table', 1601419279),
('m200929_224010_create_service_table', 1601419296);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'تهران'),
(2, 'البرز'),
(3, 'اصفهان');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `city_id`) VALUES
(1, 'گوهردشت', 2),
(2, 'فردوس', 1),
(3, 'احمدآباد', 3),
(4, 'زاینده رود', 3),
(5, 'مهرشهر', 2),
(6, 'شهرک غرب', 1),
(7, 'سعادت آیاد', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'administrator'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `code_phone_id` int(12) DEFAULT NULL,
  `phone` varchar(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `type_service_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `code_phone_id`, `phone`, `location_id`, `type_service_id`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 1, '44905020', 2, 1, 1, 1601422893, 1601423052),
(4, 3, '12534892', 8, 1, 1, 1601449143, 1601449143),
(5, 2, '44905258', 1, 2, 1, 1601450759, 1601450759);

-- --------------------------------------------------------

--
-- Table structure for table `type_location`
--

CREATE TABLE `type_location` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `type_service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_location`
--

INSERT INTO `type_location` (`id`, `name`, `type_service_id`) VALUES
(1, 'popsite', 2),
(2, 'point', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_service`
--

CREATE TABLE `type_service` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_service`
--

INSERT INTO `type_service` (`id`, `name`) VALUES
(1, 'adsl'),
(2, 'wireless');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'SXjFSwKaPBv6xYc1vjkhubWUcLMYei83', '$2y$13$ffd3.De/DavvJZKRlosn2O2IxG6jCfCpAimaJyi.4MQThG04v6C6C', NULL, 'admin@email.com', 10, 1601419615, 1601419615, 'bXyjGtf1ZySyLW3CREXy6-LagV7Akgml_1601419615'),
(2, 'test', 'N0ugJLgqDHI_YKFw9eaHAFGivswJZH11', '$2y$13$b6lxlQTNc0nlg19SSa0soe2rhoaA7M7vLPcpkw3ynAKj684pxAiK6', NULL, 'example@email.com', 10, 1601420901, 1601420901, '9FZiynTWpcqOAeFK3U3r0tZdLVgSlG1t_1601420901');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-city-province_id` (`province_id`);

--
-- Indexes for table `code_phone`
--
ALTER TABLE `code_phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-code_phone-province_id` (`province_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-location-province_id` (`province_id`),
  ADD KEY `idx-location-city_id` (`city_id`),
  ADD KEY `idx-location-region_id` (`region_id`),
  ADD KEY `idx-location-type_location_id` (`type_location_id`),
  ADD KEY `idx-location-created_by` (`created_by`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-region-city_id` (`city_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-service-code_phone_id` (`code_phone_id`),
  ADD KEY `idx-service-location_id` (`location_id`),
  ADD KEY `idx-service-type_service_id` (`type_service_id`),
  ADD KEY `idx-service-created_by` (`created_by`);

--
-- Indexes for table `type_location`
--
ALTER TABLE `type_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-type_location-type_service_id` (`type_service_id`);

--
-- Indexes for table `type_service`
--
ALTER TABLE `type_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-user_role-user_id` (`user_id`),
  ADD KEY `idx-user_role-role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `code_phone`
--
ALTER TABLE `code_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_location`
--
ALTER TABLE `type_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_service`
--
ALTER TABLE `type_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk-city-province_id` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `code_phone`
--
ALTER TABLE `code_phone`
  ADD CONSTRAINT `fk-code_phone-province_id` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk-location-city_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-location-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-location-province_id` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-location-region_id` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-location-type_location_id` FOREIGN KEY (`type_location_id`) REFERENCES `type_location` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `fk-region-city_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk-service-code_phone_id` FOREIGN KEY (`code_phone_id`) REFERENCES `code_phone` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-service-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-service-location_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-service-type_service_id` FOREIGN KEY (`type_service_id`) REFERENCES `type_service` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `type_location`
--
ALTER TABLE `type_location`
  ADD CONSTRAINT `fk-type_location-type_service_id` FOREIGN KEY (`type_service_id`) REFERENCES `type_service` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `fk-user_role-role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-user_role-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
