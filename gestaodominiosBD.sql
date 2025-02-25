-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/02/2025 às 13:04
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gestaodominios`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `companies`
--

INSERT INTO `companies` (`id`, `name`, `website`, `created_at`, `updated_at`) VALUES
(1, 'UOL Host', 'https://www.uolhost.com.br', '2025-02-21 22:04:01', '2025-02-21 22:04:01'),
(2, 'DialHost', 'https://www.dialhost.com.br', '2025-02-21 22:04:01', '2025-02-21 22:04:01'),
(3, 'AWS', 'https://aws.amazon.com', '2025-02-21 22:04:01', '2025-02-21 22:04:01'),
(4, 'HostGator', 'https://www.hostgator.com.br', '2025-02-21 22:04:01', '2025-02-21 22:04:01'),
(5, 'BlueHost', 'https://www.bluehost.com', '2025-03-01 13:00:00', '2025-03-01 13:00:00'),
(6, 'GoDaddy', 'https://www.godaddy.com', '2025-03-01 13:05:00', '2025-03-01 13:05:00'),
(7, 'DigitalOcean', 'https://www.digitalocean.com', '2025-03-01 13:10:00', '2025-03-01 13:10:00'),
(8, 'SiteGround', 'https://www.siteground.com', '2025-03-01 13:15:00', '2025-03-01 13:15:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `domains`
--

CREATE TABLE `domains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('Ativo','Expirado','Pendente') NOT NULL,
  `expiration_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `domains`
--

INSERT INTO `domains` (`id`, `user_id`, `company_id`, `name`, `status`, `expiration_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'exemplo1.com', 'Ativo', '2025-12-31', '2025-02-22 01:10:00', '2025-02-22 01:10:00'),
(2, 1, 2, 'exemplo2.net', 'Expirado', '2025-01-15', '2025-02-22 15:00:00', '2025-02-22 15:00:00'),
(3, 1, 3, 'exemplo3.org', 'Pendente', '2025-08-20', '2025-02-22 15:05:00', '2025-02-22 15:05:00'),
(4, 1, 4, 'exemplo4.com.br', 'Ativo', '2026-05-10', '2025-02-22 15:10:00', '2025-02-22 15:10:00'),
(5, 1, 1, 'exemplo5.com', 'Ativo', '2025-11-11', '2025-02-22 15:15:00', '2025-02-22 15:15:00'),
(6, 1, 2, 'exemplo6.net', 'Expirado', '2024-12-31', '2025-02-22 15:20:00', '2025-02-22 15:20:00'),
(7, 1, 3, 'exemplo7.org', 'Pendente', '2025-09-09', '2025-02-22 15:25:00', '2025-02-22 15:25:00'),
(8, 1, 4, 'exemplo8.com.br', 'Ativo', '2025-07-07', '2025-02-22 15:30:00', '2025-02-22 15:30:00'),
(9, 1, 1, 'exemplo9.com', 'Ativo', '2025-10-10', '2025-02-22 15:35:00', '2025-02-22 15:35:00'),
(10, 1, 2, 'exemplo10.net', 'Expirado', '2025-03-03', '2025-02-22 15:40:00', '2025-02-22 15:40:00'),
(11, 1, 3, 'exemplo11.org', 'Pendente', '2025-04-04', '2025-02-22 15:45:00', '2025-02-22 15:45:00'),
(12, 1, 4, 'exemplo12.com.br', 'Ativo', '2025-08-08', '2025-02-22 15:50:00', '2025-02-22 15:50:00'),
(13, 1, 2, 'exemplo13.net', 'Expirado', '2025-01-01', '2025-02-22 15:55:00', '2025-02-22 15:55:00'),
(14, 1, 3, 'exemplo14.org', 'Pendente', '2025-06-06', '2025-02-22 16:00:00', '2025-02-22 16:00:00'),
(15, 1, 4, 'exemplo15.com.br', 'Ativo', '2025-12-12', '2025-02-22 16:05:00', '2025-02-22 16:05:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_02_21_182102_create_users_table', 1),
(2, '2025_02_21_182529_create_sessions_table', 1),
(3, '2025_02_21_185549_create_domains_table', 1),
(4, '2025_02_21_190107_create_companies_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MTPdcimRahc3JQkReA4faspnBNMMtJTcZhOJ72Jk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieExRS1I2T3laTVcxYldQNTl4VGg2bU1oZktKcmo0ZDk1emRoUnNBSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1740407341);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', '$2y$12$ylPdilqy3SjD.JtyU2.MN.slRnlZ6U0plP9hHg2WG4dtZr.Cm8Wqe', '2025-02-21 22:04:00', '2025-02-21 22:04:00'),
(3, 'brayan wosch', 'brayanwosch@gmail.com', '$2y$12$kHzdIwrACS3Q8QKkUieA/uQnFsX1crBEuh/h.Wpo4wLZPND/Fjd2e', '2025-02-22 01:38:41', '2025-02-22 01:38:41'),
(19, 'João Silva', 'joao.silva@example.com', '$2y$12$ylPdilqy3SjD.JtyU2.MN.slRnlZ6U0plP9hHg2WG4dtZr.Cm8Wqe', '2025-02-22 13:00:00', '2025-02-22 13:00:00'),
(20, 'Maria Souza', 'maria.souza@example.com', '$2y$12$ylPdilqy3SjD.JtyU2.MN.slRnlZ6U0plP9hHg2WG4dtZr.Cm8Wqe', '2025-02-22 13:10:00', '2025-02-22 13:10:00'),
(21, 'Carlos Pereira', 'carlos.pereira@example.com', '$2y$12$ylPdilqy3SjD.JtyU2.MN.slRnlZ6U0plP9hHg2WG4dtZr.Cm8Wqe', '2025-02-22 13:20:00', '2025-02-22 13:20:00'),
(22, 'Ana Martins', 'ana.martins@example.com', '$2y$12$ylPdilqy3SjD.JtyU2.MN.slRnlZ6U0plP9hHg2WG4dtZr.Cm8Wqe', '2025-02-22 13:30:00', '2025-02-22 13:30:00'),
(23, 'Pedro Costa', 'pedro.costa@example.com', '$2y$12$ylPdilqy3SjD.JtyU2.MN.slRnlZ6U0plP9hHg2WG4dtZr.Cm8Wqe', '2025-02-22 13:40:00', '2025-02-22 13:40:00'),
(24, 'Lucas Fernandes', 'lucas.fernandes@example.com', '$2y$12$ylPdilqy3SjD.JtyU2.MN.slRnlZ6U0plP9hHg2WG4dtZr.Cm8Wqe', '2025-02-22 13:50:00', '2025-02-22 13:50:00'),
(25, 'Fernanda Lima', 'fernanda.lima@example.com', '$2y$12$ylPdilqy3SjD.JtyU2.MN.slRnlZ6U0plP9hHg2WG4dtZr.Cm8Wqe', '2025-02-22 14:00:00', '2025-02-22 14:00:00'),
(26, 'Rafael Gomes', 'rafael.gomes@example.com', '$2y$12$ylPdilqy3SjD.JtyU2.MN.slRnlZ6U0plP9hHg2WG4dtZr.Cm8Wqe', '2025-02-22 14:10:00', '2025-02-22 14:10:00'),
(27, 'Bruna Alves', 'bruna.alves@example.com', '$2y$12$ylPdilqy3SjD.JtyU2.MN.slRnlZ6U0plP9hHg2WG4dtZr.Cm8Wqe', '2025-02-22 14:20:00', '2025-02-22 14:20:00'),
(28, 'Gabriel Santos', 'gabriel.santos@example.com', '$2y$12$ylPdilqy3SjD.JtyU2.MN.slRnlZ6U0plP9hHg2WG4dtZr.Cm8Wqe', '2025-02-22 14:30:00', '2025-02-22 14:30:00'),
(29, 'Mariana Ribeiro', 'mariana.ribeiro@example.com', '$2y$12$ylPdilqy3SjD.JtyU2.MN.slRnlZ6U0plP9hHg2WG4dtZr.Cm8Wqe', '2025-02-22 14:40:00', '2025-02-22 14:40:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_name_unique` (`name`);

--
-- Índices de tabela `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `domains_user_id_foreign` (`user_id`),
  ADD KEY `domains_company_id_foreign` (`company_id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `domains`
--
ALTER TABLE `domains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `domains`
--
ALTER TABLE `domains`
  ADD CONSTRAINT `domains_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `domains_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
