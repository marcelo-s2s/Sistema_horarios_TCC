-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 07-Abr-2025 às 21:13
-- Versão do servidor: 8.0.39-0ubuntu0.22.04.1
-- versão do PHP: 8.1.2-1ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(5, 7, 'admin', '2025-01-31 23:56:49'),
(7, 9, 'admin', '2025-02-01 19:01:41'),
(28, 42, 'professor', '2025-03-26 13:17:55'),
(29, 43, 'professor', '2025-03-26 13:18:21'),
(30, 44, 'professor', '2025-03-26 13:18:28'),
(31, 45, 'professor', '2025-03-26 13:18:41'),
(32, 46, 'professor', '2025-03-26 13:18:51'),
(33, 47, 'professor', '2025-03-26 13:19:07'),
(34, 48, 'professor', '2025-03-26 13:19:24'),
(35, 49, 'professor', '2025-03-26 13:19:37'),
(36, 50, 'professor', '2025-03-26 13:21:35'),
(37, 51, 'professor', '2025-03-26 13:22:06'),
(38, 52, 'professor', '2025-03-26 13:22:14'),
(39, 53, 'professor', '2025-03-26 13:22:22'),
(40, 54, 'professor', '2025-03-26 13:22:34'),
(41, 55, 'professor', '2025-03-26 13:22:42'),
(42, 56, 'professor', '2025-03-26 13:23:50'),
(43, 57, 'professor', '2025-03-26 13:24:12'),
(44, 58, 'professor', '2025-03-26 13:24:25'),
(45, 59, 'professor', '2025-03-26 13:24:36'),
(46, 60, 'professor', '2025-03-26 13:24:44'),
(47, 61, 'professor', '2025-03-26 13:24:52'),
(48, 62, 'professor', '2025-03-26 13:25:01'),
(49, 63, 'professor', '2025-03-26 13:25:10'),
(50, 64, 'professor', '2025-03-26 13:25:22'),
(51, 65, 'professor', '2025-03-26 13:25:45'),
(52, 66, 'professor', '2025-03-26 13:26:28'),
(53, 67, 'professor', '2025-03-26 13:27:00'),
(54, 68, 'professor', '2025-03-26 13:27:09'),
(55, 69, 'professor', '2025-03-26 13:39:20'),
(56, 70, 'professor', '2025-03-26 13:39:29'),
(57, 71, 'professor', '2025-03-26 13:39:37'),
(58, 72, 'professor', '2025-03-26 13:39:47'),
(59, 73, 'professor', '2025-03-26 13:40:20'),
(60, 74, 'professor', '2025-03-26 13:40:40'),
(61, 75, 'professor', '2025-03-26 13:40:53'),
(62, 76, 'professor', '2025-03-26 13:41:16'),
(63, 77, 'professor', '2025-03-26 13:41:22'),
(64, 78, 'professor', '2025-03-26 13:42:20'),
(65, 79, 'professor', '2025-03-26 13:42:47'),
(66, 80, 'professor', '2025-03-26 13:43:09'),
(67, 81, 'professor', '2025-03-26 13:44:14'),
(68, 82, 'professor', '2025-03-26 13:44:31'),
(69, 83, 'professor', '2025-03-26 13:46:18'),
(70, 84, 'professor', '2025-03-26 13:47:22'),
(71, 85, 'professor', '2025-03-26 13:47:31'),
(72, 86, 'professor', '2025-03-26 13:47:39'),
(73, 87, 'professor', '2025-03-26 13:47:49'),
(74, 88, 'professor', '2025-03-26 13:49:19'),
(75, 89, 'professor', '2025-03-26 13:49:42'),
(76, 90, 'professor', '2025-03-28 20:04:43'),
(77, 91, 'professor', '2025-03-28 20:13:46'),
(78, 92, 'user', '2025-04-03 21:03:54'),
(79, 93, 'professor', '2025-04-03 21:08:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_identities`
--

CREATE TABLE `auth_identities` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `secret` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `secret2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text COLLATE utf8mb4_general_ci,
  `force_reset` tinyint(1) NOT NULL DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(7, 7, 'email_password', NULL, 'marcelo.msds96@gmail.com', '$2y$12$w6uInk75syRU9RdVKG2dgeOgrKzAx4wiUmcGViwpXmiEkVyakyGFe', NULL, NULL, 0, '2025-04-07 21:01:34', '2025-01-31 23:56:49', '2025-04-07 21:01:34'),
(9, 9, 'email_password', NULL, 'admin@gmail.com', '$2y$12$Ln9y/XpgDlm0X8jSaYZovOqnDpnQKwFLyNAHM.DQh.g1m9UDIABe6', NULL, NULL, 0, '2025-04-03 21:11:17', '2025-02-01 19:01:41', '2025-04-03 21:11:17'),
(30, 7, 'magic-link', NULL, 'f1b9eab0e5a859544cfb', NULL, '2025-03-20 21:10:39', NULL, 0, NULL, '2025-03-20 20:10:39', '2025-03-20 20:10:39'),
(37, 92, 'email_password', NULL, 'fabricio@gmail.com', '$2y$12$sACcjN8BsHhrXn1mBr7XX.0cxPTqQFTB34eTReqlbG35V5lAvztKG', NULL, NULL, 0, NULL, '2025-04-03 21:03:54', '2025-04-03 21:03:54'),
(38, 92, 'magic-link', NULL, 'b47781325443a13d385f', NULL, '2025-04-03 22:04:58', NULL, 0, NULL, '2025-04-03 21:04:58', '2025-04-03 21:04:58'),
(39, 93, 'email_password', NULL, 'fabricio.ribeiro@ifpa.edu.br', '$2y$12$k4JGzlq3wrzntTjs1rNxfetzP2PvPHBOo.X0w2cMo4XrKq1Rqz2si', NULL, NULL, 0, '2025-04-03 21:08:29', '2025-04-03 21:08:15', '2025-04-03 21:08:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2024-12-04 20:11:33', 1),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2024-12-04 20:32:24', 1),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2024-12-05 18:38:52', 1),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2024-12-05 19:53:06', 1),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2024-12-06 13:11:04', 1),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2024-12-06 18:19:06', 1),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2024-12-09 18:43:05', 1),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2024-12-09 18:51:55', 1),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-06 20:52:21', 1),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-06 20:56:57', 1),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-07 11:52:00', 1),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-07 17:39:26', 1),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-13 17:52:08', 1),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-14 12:15:25', 1),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-15 20:26:06', 1),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-20 17:43:21', 1),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-23 13:00:22', 1),
(18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-23 18:24:44', 1),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-24 11:48:34', 1),
(20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-24 18:14:30', 1),
(21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-24 18:45:02', 1),
(22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-31 19:14:55', 1),
(23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 1, '2025-01-31 23:39:01', 1),
(24, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'teste@gmail.com', 8, '2025-02-01 00:11:48', 1),
(25, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-01 00:12:59', 1),
(26, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-01 00:14:58', 1),
(27, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'teste@gmail.com', 8, '2025-02-01 00:23:53', 1),
(28, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-01 01:07:24', 1),
(29, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-01 01:14:35', 1),
(30, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-01 18:44:47', 1),
(31, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-01 21:15:50', 1),
(32, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-05 14:17:37', 1),
(33, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-08 18:57:38', 1),
(34, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-08 20:17:10', 1),
(35, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-08 20:35:06', 1),
(36, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-08 20:55:32', 1),
(37, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-08 21:26:15', 1),
(38, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-09 02:42:52', 1),
(39, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'carlos@gmail.com', NULL, '2025-02-09 02:53:04', 0),
(40, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'carlos@gmail.com', NULL, '2025-02-09 02:53:10', 0),
(41, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'carlos@gmail.com', NULL, '2025-02-09 02:53:22', 0),
(42, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'carlos@gmail.com', 13, '2025-02-09 02:53:27', 1),
(43, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-09 02:53:47', 1),
(44, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', NULL, '2025-02-09 22:32:44', 0),
(45, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-09 22:32:52', 1),
(46, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-10 01:12:18', 1),
(47, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-10 12:57:34', 1),
(48, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-11 14:38:50', 1),
(49, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-12 01:03:22', 1),
(50, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-17 14:21:49', 1),
(51, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-18 12:35:49', 1),
(52, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', NULL, '2025-02-18 18:39:25', 0),
(53, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-18 18:39:42', 1),
(54, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-19 13:22:29', 1),
(55, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-25 19:05:47', 1),
(56, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-26 12:08:24', 1),
(57, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-02-26 18:13:05', 1),
(58, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 9, '2025-02-26 18:34:14', 1),
(59, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', NULL, '2025-03-15 13:46:43', 0),
(60, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-15 13:46:48', 1),
(61, '168.227.163.245', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-15 19:28:15', 1),
(62, '168.227.163.245', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-15 21:06:22', 1),
(63, '168.227.163.245', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-17 14:06:58', 1),
(64, '168.227.163.245', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-18 12:40:57', 1),
(65, '168.227.163.12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-19 15:10:52', 1),
(66, '168.227.163.12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-19 15:11:30', 1),
(67, '168.227.163.196', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-20 19:26:41', 1),
(68, '168.227.163.196', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-20 19:45:00', 1),
(69, '168.227.163.196', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-20 20:06:24', 1),
(70, '168.227.163.196', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-20 20:15:47', 1),
(71, '168.227.163.196', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-21 12:00:51', 1),
(72, '168.227.163.86', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-22 13:32:25', 1),
(73, '168.227.163.86', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-22 13:51:32', 1),
(74, '168.227.163.86', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-22 20:48:44', 1),
(75, '200.129.129.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 9, '2025-03-24 20:29:53', 1),
(76, '168.227.163.188', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-25 19:15:54', 1),
(77, '168.227.163.65', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-26 13:11:50', 1),
(78, '168.227.163.65', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-26 18:37:38', 1),
(79, '168.227.163.65', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-27 14:07:22', 1),
(80, '168.227.163.65', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-27 20:16:51', 1),
(81, '168.227.163.65', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-28 14:37:39', 1),
(82, '168.227.163.65', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-28 15:27:03', 1),
(83, '168.227.163.65', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-28 15:29:33', 1),
(84, '168.227.163.65', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-03-28 19:20:10', 1),
(85, '168.227.163.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-04-02 18:20:19', 1),
(86, '168.227.163.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-04-02 18:55:10', 1),
(87, '168.227.163.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', NULL, '2025-04-03 14:12:47', 0),
(88, '168.227.163.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-04-03 14:12:53', 1),
(89, '168.227.163.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-04-03 15:29:04', 1),
(90, '168.227.163.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-04-03 19:34:14', 1),
(91, '200.129.129.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 9, '2025-04-03 20:52:08', 1),
(92, '200.129.129.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 9, '2025-04-03 20:58:16', 1),
(93, '200.129.129.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 9, '2025-04-03 21:02:20', 1),
(94, '200.129.129.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 9, '2025-04-03 21:05:15', 1),
(95, '200.129.129.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'email_password', 'fabricio.ribeiro@ifpa.edu.br', 93, '2025-04-03 21:08:29', 1),
(96, '200.129.129.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 9, '2025-04-03 21:11:17', 1),
(97, '168.227.163.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-04-04 13:50:36', 1),
(98, '168.227.163.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-04-04 18:41:44', 1),
(99, '168.227.163.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'email_password', 'marcelo.msds96@gmail.com', 7, '2025-04-07 21:01:34', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_remember_tokens`
--

CREATE TABLE `auth_remember_tokens` (
  `id` int UNSIGNED NOT NULL,
  `selector` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `hashedValidator` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_token_logins`
--

CREATE TABLE `auth_token_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'login', 'CodeIgniter\\Shield', 1733340789, 1),
(2, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'login', 'CodeIgniter\\Settings', 1733340789, 1),
(3, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'login', 'CodeIgniter\\Settings', 1733340789, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `value` text COLLATE utf8mb4_general_ci,
  `type` varchar(31) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'string',
  `context` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_message` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Marcelo', NULL, NULL, 1, '2025-02-01 00:22:18', '2025-01-31 23:56:49', '2025-01-31 23:56:49', NULL),
(9, 'Admin', NULL, NULL, 1, NULL, '2025-02-01 19:01:41', '2025-02-01 19:01:42', NULL),
(42, 'Maria Paula', NULL, NULL, 0, NULL, '2025-03-26 13:17:55', '2025-03-26 13:17:55', NULL),
(43, 'Luciano Junio', NULL, NULL, 0, NULL, '2025-03-26 13:18:21', '2025-03-26 13:18:21', NULL),
(44, 'Alexandre Bentes', NULL, NULL, 0, NULL, '2025-03-26 13:18:28', '2025-03-26 13:18:28', NULL),
(45, 'Carlison Oliveira', NULL, NULL, 0, NULL, '2025-03-26 13:18:41', '2025-03-26 13:18:41', NULL),
(46, 'Helen Monique', NULL, NULL, 0, NULL, '2025-03-26 13:18:51', '2025-03-26 13:18:51', NULL),
(47, 'Jakson Leite', NULL, NULL, 0, NULL, '2025-03-26 13:19:07', '2025-03-26 13:19:07', NULL),
(48, 'Eliesio Silva', NULL, NULL, 0, NULL, '2025-03-26 13:19:24', '2025-03-26 13:19:24', NULL),
(49, 'Aline Alcantara', NULL, NULL, 0, NULL, '2025-03-26 13:19:37', '2025-03-26 13:19:37', NULL),
(50, 'Lucas Ximenes', NULL, NULL, 0, NULL, '2025-03-26 13:21:35', '2025-03-26 13:21:35', NULL),
(51, 'Ronilson Santana', NULL, NULL, 0, NULL, '2025-03-26 13:22:06', '2025-03-26 13:22:06', NULL),
(52, 'Felipe Colome', NULL, NULL, 0, NULL, '2025-03-26 13:22:14', '2025-03-26 13:22:14', NULL),
(53, 'Altamiro Malta', NULL, NULL, 0, NULL, '2025-03-26 13:22:22', '2025-03-26 13:22:22', NULL),
(54, 'Brendson Brito', NULL, NULL, 0, NULL, '2025-03-26 13:22:34', '2025-03-26 13:22:34', NULL),
(55, 'Josiclaudio Freitas', NULL, NULL, 0, NULL, '2025-03-26 13:22:42', '2025-03-26 13:22:42', NULL),
(56, 'Wilverson Melo', NULL, NULL, 0, NULL, '2025-03-26 13:23:50', '2025-03-26 13:23:50', NULL),
(57, 'Luis Wagner', NULL, NULL, 0, NULL, '2025-03-26 13:24:12', '2025-03-26 13:24:12', NULL),
(58, 'Irene Sampaio', NULL, NULL, 0, NULL, '2025-03-26 13:24:25', '2025-03-26 13:24:25', NULL),
(59, 'Marília Araújo', NULL, NULL, 0, NULL, '2025-03-26 13:24:36', '2025-03-26 13:24:36', NULL),
(60, 'Denys Silva', NULL, NULL, 0, NULL, '2025-03-26 13:24:44', '2025-03-26 13:24:44', NULL),
(61, 'Reinaldo Cajaiba', NULL, NULL, 0, NULL, '2025-03-26 13:24:52', '2025-03-26 13:24:52', NULL),
(62, 'Leandro Cruz', NULL, NULL, 0, NULL, '2025-03-26 13:25:01', '2025-03-26 13:25:01', NULL),
(63, 'Marcos Amador', NULL, NULL, 0, NULL, '2025-03-26 13:25:10', '2025-03-26 13:25:10', NULL),
(64, 'Wully Barreto', NULL, NULL, 0, NULL, '2025-03-26 13:25:22', '2025-03-26 13:25:22', NULL),
(65, 'Fernanda Kolodiuk', NULL, NULL, 0, NULL, '2025-03-26 13:25:45', '2025-03-26 13:25:45', NULL),
(66, 'João Pereira', NULL, NULL, 0, NULL, '2025-03-26 13:26:28', '2025-03-26 13:26:28', NULL),
(67, 'Leonardo Villar', NULL, NULL, 0, NULL, '2025-03-26 13:27:00', '2025-03-26 13:27:00', NULL),
(68, 'Haylan Sousa', NULL, NULL, 0, NULL, '2025-03-26 13:27:09', '2025-03-26 13:27:09', NULL),
(69, 'Manoel Neto', NULL, NULL, 0, NULL, '2025-03-26 13:39:20', '2025-03-26 13:39:20', NULL),
(70, 'Anderson Fortaleza', NULL, NULL, 0, NULL, '2025-03-26 13:39:29', '2025-03-26 13:39:29', NULL),
(71, 'Marcos Serafim', NULL, NULL, 0, NULL, '2025-03-26 13:39:37', '2025-03-26 13:39:37', NULL),
(72, 'Erika Hayashida', NULL, NULL, 0, NULL, '2025-03-26 13:39:47', '2025-03-26 13:39:47', NULL),
(73, 'Efrem Ribeiro', NULL, NULL, 0, NULL, '2025-03-26 13:40:20', '2025-03-26 13:40:20', NULL),
(74, 'Lilian Barros', NULL, NULL, 0, NULL, '2025-03-26 13:40:40', '2025-03-26 13:40:40', NULL),
(75, 'Angela Santos', NULL, NULL, 0, NULL, '2025-03-26 13:40:53', '2025-03-26 13:40:53', NULL),
(76, 'Eliete Cardoso', NULL, NULL, 0, NULL, '2025-03-26 13:41:16', '2025-03-26 13:41:16', NULL),
(77, 'Carlos Castro', NULL, NULL, 0, NULL, '2025-03-26 13:41:22', '2025-03-26 13:41:22', NULL),
(78, 'Julio Nascimento', NULL, NULL, 0, NULL, '2025-03-26 13:42:20', '2025-03-26 13:42:20', NULL),
(79, 'Suellen Barbosa', NULL, NULL, 0, NULL, '2025-03-26 13:42:47', '2025-03-26 13:42:47', NULL),
(80, 'Darleny Santos', NULL, NULL, 0, NULL, '2025-03-26 13:43:09', '2025-03-26 13:43:09', NULL),
(81, 'Maykon Sulivan', NULL, NULL, 0, NULL, '2025-03-26 13:44:14', '2025-03-26 13:44:14', NULL),
(82, 'Amanda Mitoso', NULL, NULL, 0, NULL, '2025-03-26 13:44:31', '2025-03-26 13:44:31', NULL),
(83, 'José Moreira', NULL, NULL, 0, NULL, '2025-03-26 13:46:18', '2025-03-26 13:46:18', NULL),
(84, 'Fabrício Ribeiro', NULL, NULL, 0, NULL, '2025-03-26 13:47:22', '2025-03-26 13:47:22', NULL),
(85, 'Davi Guimarães', NULL, NULL, 0, NULL, '2025-03-26 13:47:31', '2025-03-26 13:47:31', NULL),
(86, 'Joab Torres', NULL, NULL, 0, NULL, '2025-03-26 13:47:39', '2025-03-26 13:47:39', NULL),
(87, 'Gleison Sousa', NULL, NULL, 0, NULL, '2025-03-26 13:47:49', '2025-03-26 13:47:49', NULL),
(88, 'Bruno Barreto', NULL, NULL, 0, NULL, '2025-03-26 13:49:19', '2025-03-26 13:49:19', NULL),
(89, 'Kadja Vieira', NULL, NULL, 0, NULL, '2025-03-26 13:49:42', '2025-03-26 13:49:42', NULL),
(90, 'Corina Sousa', NULL, NULL, 0, NULL, '2025-03-28 20:04:43', '2025-03-28 20:04:43', NULL),
(91, 'Antonio Ricardo', NULL, NULL, 0, NULL, '2025-03-28 20:13:46', '2025-03-28 20:13:46', NULL),
(92, 'fabricio aluno', NULL, NULL, 1, NULL, '2025-04-03 21:03:53', '2025-04-03 21:03:54', NULL),
(93, 'fabricio.ribeiro', NULL, NULL, 1, NULL, '2025-04-03 21:08:15', '2025-04-03 21:08:15', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Índices para tabela `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`);

--
-- Índices para tabela `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`);

--
-- Índices para tabela `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de tabela `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de tabela `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
