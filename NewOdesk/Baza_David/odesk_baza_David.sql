-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 09. jun 2016 ob 12.49
-- Različica strežnika: 10.0.17-MariaDB
-- Različica PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `odesk_baza`
--

-- --------------------------------------------------------

--
-- Struktura tabele `countries`
--

CREATE TABLE `countries` (
  `id_c` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE ucs2_slovenian_ci NOT NULL,
  `short` varchar(10) COLLATE ucs2_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ucs2 COLLATE=ucs2_slovenian_ci;

--
-- Odloži podatke za tabelo `countries`
--

INSERT INTO `countries` (`id_c`, `title`, `short`) VALUES
(1, 'Slovenia', 'SI'),
(2, 'Nemčija', 'GR');

-- --------------------------------------------------------

--
-- Struktura tabele `projects`
--

CREATE TABLE `projects` (
  `id_p` bigint(20) UNSIGNED NOT NULL,
  `id_u` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE ucs2_slovenian_ci NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text COLLATE ucs2_slovenian_ci
) ENGINE=MyISAM DEFAULT CHARSET=ucs2 COLLATE=ucs2_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `projects_users`
--

CREATE TABLE `projects_users` (
  `id_pu` bigint(20) UNSIGNED NOT NULL,
  `id_p` bigint(20) UNSIGNED NOT NULL,
  `id_u` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ucs2 COLLATE=ucs2_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `skills`
--

CREATE TABLE `skills` (
  `id_s` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE ucs2_slovenian_ci NOT NULL,
  `description` text COLLATE ucs2_slovenian_ci
) ENGINE=MyISAM DEFAULT CHARSET=ucs2 COLLATE=ucs2_slovenian_ci;

--
-- Odloži podatke za tabelo `skills`
--

INSERT INTO `skills` (`id_s`, `title`, `description`) VALUES
(1, 'PHP', NULL),
(2, 'Javascript', NULL);

-- --------------------------------------------------------

--
-- Struktura tabele `skills_users`
--

CREATE TABLE `skills_users` (
  `id_su` bigint(20) UNSIGNED NOT NULL,
  `id_u` bigint(20) UNSIGNED NOT NULL,
  `id_s` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ucs2 COLLATE=ucs2_slovenian_ci;

--
-- Odloži podatke za tabelo `skills_users`
--

INSERT INTO `skills_users` (`id_su`, `id_u`, `id_s`) VALUES
(11, 1, 2),
(10, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE `users` (
  `id_u` bigint(20) UNSIGNED NOT NULL,
  `id_c` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(200) COLLATE ucs2_slovenian_ci DEFAULT NULL,
  `last_name` varchar(200) COLLATE ucs2_slovenian_ci NOT NULL,
  `email` varchar(200) COLLATE ucs2_slovenian_ci NOT NULL,
  `pass` varchar(100) COLLATE ucs2_slovenian_ci NOT NULL,
  `description` varchar(500) COLLATE ucs2_slovenian_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE ucs2_slovenian_ci DEFAULT NULL,
  `active` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ucs2 COLLATE=ucs2_slovenian_ci;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id_u`, `id_c`, `first_name`, `last_name`, `email`, `pass`, `description`, `avatar`, `active`, `admin`, `score`) VALUES
(1, 1, 'David', 'Jan', 'David.Jan@gmail.com', '6f7f49e94ac380278a82a3f9e6991c33f0be8667', 'Suck a Dick', 'slike/cat.png', 0, 0, 0),
(2, 1, 'Admin', 'Admin', 'Admin@Admin.Admin', 'e18f43f2f2f9b6ac6d8a19be0d56655a15f2f1fa', '', 'slike/admin.png', 0, 1, NULL),
(3, 0, 'f', 'f', 'f@g.com', 'f037444b54eab9483ad4f4bb87815321f2e1768f', NULL, NULL, 0, 0, 0);

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id_c`),
  ADD UNIQUE KEY `id_c` (`id_c`);

--
-- Indeksi tabele `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_p`),
  ADD UNIQUE KEY `id_p` (`id_p`),
  ADD KEY `id_u` (`id_u`);

--
-- Indeksi tabele `projects_users`
--
ALTER TABLE `projects_users`
  ADD PRIMARY KEY (`id_pu`),
  ADD UNIQUE KEY `id_pu` (`id_pu`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `id_p` (`id_p`);

--
-- Indeksi tabele `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id_s`),
  ADD UNIQUE KEY `id_s` (`id_s`);

--
-- Indeksi tabele `skills_users`
--
ALTER TABLE `skills_users`
  ADD PRIMARY KEY (`id_su`),
  ADD UNIQUE KEY `id_su` (`id_su`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `id_s` (`id_s`);

--
-- Indeksi tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`),
  ADD UNIQUE KEY `id_u` (`id_u`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_c` (`id_c`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `countries`
--
ALTER TABLE `countries`
  MODIFY `id_c` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT tabele `projects`
--
ALTER TABLE `projects`
  MODIFY `id_p` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `projects_users`
--
ALTER TABLE `projects_users`
  MODIFY `id_pu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `skills`
--
ALTER TABLE `skills`
  MODIFY `id_s` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT tabele `skills_users`
--
ALTER TABLE `skills_users`
  MODIFY `id_su` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `id_u` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
