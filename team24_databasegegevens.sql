-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 28 feb 2019 om 10:28
-- Serverversie: 10.1.38-MariaDB
-- PHP-versie: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team24`
--
CREATE DATABASE IF NOT EXISTS `team24` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `team24`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afspraak`
--

CREATE TABLE `afspraak` (
  `id` int(50) NOT NULL,
  `studentId` int(50) DEFAULT NULL,
  `docentId` int(50) DEFAULT NULL,
  `lokaalId` int(50) NOT NULL,
  `tijdslot` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `id` int(50) NOT NULL,
  `gebruikertypeId` int(50) NOT NULL,
  `klasId` int(50) DEFAULT NULL,
  `trajectId` int(50) DEFAULT NULL,
  `afspraakId` int(50) DEFAULT NULL,
  `voornaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paswoord` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`id`, `gebruikertypeId`, `klasId`, `trajectId`, `afspraakId`, `voornaam`, `achternaam`, `email`, `paswoord`) VALUES
(1, 1, NULL, NULL, NULL, 'Melih', 'Doksanbir', 'r0720857@student.thomasmore.be', 'r0720857'),
(4, 1, 2, 1, 1, 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikertype`
--

CREATE TABLE `gebruikertype` (
  `id` int(50) NOT NULL,
  `beschrijving` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikertype`
--

INSERT INTO `gebruikertype` (`id`, `beschrijving`) VALUES
(1, 'student'),
(2, 'docent'),
(3, 'isp');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker_lesmoment`
--

CREATE TABLE `gebruiker_lesmoment` (
  `id` int(50) NOT NULL,
  `gebruikerId` int(50) NOT NULL,
  `lesmomentId` int(50) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klas`
--

CREATE TABLE `klas` (
  `id` int(50) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maxAantal` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klas`
--

INSERT INTO `klas` (`id`, `naam`, `maxAantal`) VALUES
(2, '1ITFB', 30),
(1093, 'G ITF 2 APP-BI B', 0),
(1094, 'G ITF 2 APP-BI B', 0),
(1095, 'G ITF 2 CE, G ITF 2 CT', 0),
(1096, 'G ITF 2 CE, G ITF 2 CT', 0),
(1097, 'G ITF 2 APP-BI A, G ITF 2 APP-BI B, G ITF 2 IOT', 0),
(1098, 'G ITF 2 APP-BI B', 0),
(1099, 'G ITF 2 APP-BI A', 0),
(1100, 'G ITF 2 APP-BI A', 0),
(1101, 'G ITF 2 APP-BI A', 0),
(1102, 'G ITF 2 APP-BI A', 0),
(1103, 'G ITF 2 APP-BI A, G ITF 2 APP-BI B', 0),
(1104, 'G ITF 2 APP-BI A, G ITF 2 APP-BI B', 0),
(1105, 'G ITF 2 APP-BI A', 0),
(1106, 'G ITF 2 APP-BI A', 0),
(1107, 'G ITF 2 APP-BI A', 0),
(1108, 'G ITF 2 APP-BI A', 0),
(1109, '', 0),
(1110, 'G ITF 2 APP-BI B', 0),
(1111, 'G ITF 2 APP-BI B', 0),
(1112, 'G ITF 2 CE, G ITF 2 CT', 0),
(1113, 'G ITF 2 CE, G ITF 2 CT', 0),
(1114, 'G ITF 2 APP-BI A, G ITF 2 APP-BI B, G ITF 2 IOT', 0),
(1115, 'G ITF 2 APP-BI B', 0),
(1116, 'G ITF 2 APP-BI A', 0),
(1117, 'G ITF 2 APP-BI A', 0),
(1118, 'G ITF 2 APP-BI A', 0),
(1119, 'G ITF 2 APP-BI A', 0),
(1120, 'G ITF 2 APP-BI A, G ITF 2 APP-BI B', 0),
(1121, 'G ITF 2 APP-BI A, G ITF 2 APP-BI B', 0),
(1122, 'G ITF 2 APP-BI A', 0),
(1123, 'G ITF 2 APP-BI A', 0),
(1124, 'G ITF 2 APP-BI A', 0),
(1125, 'G ITF 2 APP-BI A', 0),
(1126, '', 0),
(1127, 'G ITF 2 APP-BI B', 0),
(1128, 'G ITF 2 APP-BI B', 0),
(1129, 'G ITF 2 CE, G ITF 2 CT', 0),
(1130, 'G ITF 2 CE, G ITF 2 CT', 0),
(1131, 'G ITF 2 APP-BI A, G ITF 2 APP-BI B, G ITF 2 IOT', 0),
(1132, 'G ITF 2 APP-BI B', 0),
(1133, 'G ITF 2 APP-BI A', 0),
(1134, 'G ITF 2 APP-BI A', 0),
(1135, 'G ITF 2 APP-BI A', 0),
(1136, 'G ITF 2 APP-BI A', 0),
(1137, 'G ITF 2 APP-BI A, G ITF 2 APP-BI B', 0),
(1138, 'G ITF 2 APP-BI A, G ITF 2 APP-BI B', 0),
(1139, 'G ITF 2 APP-BI A', 0),
(1140, 'G ITF 2 APP-BI A', 0),
(1141, 'G ITF 2 APP-BI A', 0),
(1142, 'G ITF 2 APP-BI A', 0),
(1143, '', 0),
(1144, '', 0),
(1145, '', 0),
(1146, '', 0),
(1147, '', 0),
(1148, '', 0),
(1149, '', 0),
(1150, '', 0),
(1151, '', 0),
(1152, '', 0),
(1153, '', 0),
(1154, 'f', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lesmoment`
--

CREATE TABLE `lesmoment` (
  `id` int(50) NOT NULL,
  `klasId` int(50) DEFAULT NULL,
  `vakId` int(50) DEFAULT NULL,
  `richtingId` int(50) DEFAULT NULL,
  `weekdag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesblok` int(50) NOT NULL,
  `maxAantal` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `lesmoment`
--

INSERT INTO `lesmoment` (`id`, `klasId`, `vakId`, `richtingId`, `weekdag`, `lesblok`, `maxAantal`) VALUES
(523, 1093, 810, NULL, 'Maandag', 1, 0),
(524, 1094, 811, NULL, 'Maandag', 2, 0),
(525, 1095, 812, NULL, 'Maandag', 3, 0),
(526, 1096, 813, NULL, 'Maandag', 4, 0),
(527, 1097, 814, NULL, 'Dinsdag', 1, 0),
(528, 1098, 815, NULL, 'Dinsdag', 2, 0),
(529, 1099, 816, NULL, 'Woensdag', 3, 0),
(530, 1100, 817, NULL, 'Woesndag', 4, 0),
(531, 1101, 818, NULL, 'Donderdag', 1, 0),
(532, 1102, 819, NULL, 'Donderdag', 2, 0),
(533, 1103, 820, NULL, 'Donderdag', 3, 0),
(534, 1104, 821, NULL, 'Donderdag', 4, 0),
(535, 1105, 822, NULL, 'Vrijdag', 1, 0),
(536, 1106, 823, NULL, 'Vrijdag', 2, 0),
(537, 1107, 824, NULL, 'Vrijdag', 3, 0),
(538, 1108, 825, NULL, 'Vrijdag', 4, 0),
(539, 1110, 827, NULL, 'Maandag', 1, 0),
(540, 1111, 828, NULL, 'Maandag', 2, 0),
(541, 1112, 829, NULL, 'Maandag', 3, 0),
(542, 1113, 830, NULL, 'Maandag', 4, 0),
(543, 1114, 831, NULL, 'Dinsdag', 1, 0),
(544, 1115, 832, NULL, 'Dinsdag', 2, 0),
(545, 1116, 833, NULL, 'Woensdag', 3, 0),
(546, 1117, 834, NULL, 'Woesndag', 4, 0),
(547, 1118, 835, NULL, 'Donderdag', 1, 0),
(548, 1119, 836, NULL, 'Donderdag', 2, 0),
(549, 1120, 837, NULL, 'Donderdag', 3, 0),
(550, 1121, 838, NULL, 'Donderdag', 4, 0),
(551, 1122, 839, NULL, 'Vrijdag', 1, 0),
(552, 1123, 840, NULL, 'Vrijdag', 2, 0),
(553, 1124, 841, NULL, 'Vrijdag', 3, 0),
(554, 1125, 842, NULL, 'Vrijdag', 4, 0),
(555, 1127, 844, NULL, 'Maandag', 1, 0),
(556, 1128, 845, NULL, 'Maandag', 2, 0),
(557, 1129, 846, NULL, 'Maandag', 3, 0),
(558, 1130, 847, NULL, 'Maandag', 4, 0),
(559, 1131, 848, NULL, 'Dinsdag', 1, 0),
(560, 1132, 849, NULL, 'Dinsdag', 2, 0),
(561, 1133, 850, NULL, 'Woensdag', 3, 0),
(562, 1134, 851, NULL, 'Woesndag', 4, 0),
(563, 1135, 852, NULL, 'Donderdag', 1, 0),
(564, 1136, 853, NULL, 'Donderdag', 2, 0),
(565, 1137, 854, NULL, 'Donderdag', 3, 0),
(566, 1138, 855, NULL, 'Donderdag', 4, 0),
(567, 1139, 856, NULL, 'Vrijdag', 1, 0),
(568, 1140, 857, NULL, 'Vrijdag', 2, 0),
(569, 1141, 858, NULL, 'Vrijdag', 3, 0),
(570, 1142, 859, NULL, 'Vrijdag', 4, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lokaal`
--

CREATE TABLE `lokaal` (
  `id` int(50) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `lokaal`
--

INSERT INTO `lokaal` (`id`, `naam`) VALUES
(30, 'G E103 - LESLOKAAL (38)'),
(31, 'G E103 - LESLOKAAL (38)'),
(32, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(33, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(34, 'G B210 - VERGADERLOKAAL (8)'),
(35, 'BEMT INDONESIË - LESLOKAAL (60)'),
(36, 'BEMT NKOREA - LESLOKAAL (81)'),
(37, 'BEMT NKOREA - LESLOKAAL (81)'),
(38, 'F013 - LESLOKAAL (41)'),
(39, 'F013 - LESLOKAAL (41)'),
(40, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(41, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(42, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(43, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(44, 'P306B - PRACTICUMRUIMTE (30)'),
(45, 'P306B - PRACTICUMRUIMTE (30)'),
(46, ''),
(47, ''),
(48, ''),
(49, ''),
(50, ''),
(51, ''),
(52, ''),
(53, ''),
(54, ''),
(55, ''),
(56, ''),
(57, ''),
(58, 'G E103 - LESLOKAAL (38)'),
(59, 'G E103 - LESLOKAAL (38)'),
(60, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(61, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(62, 'G B210 - VERGADERLOKAAL (8)'),
(63, 'BEMT INDONESIË - LESLOKAAL (60)'),
(64, 'BEMT NKOREA - LESLOKAAL (81)'),
(65, 'BEMT NKOREA - LESLOKAAL (81)'),
(66, 'F013 - LESLOKAAL (41)'),
(67, 'F013 - LESLOKAAL (41)'),
(68, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(69, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(70, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(71, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(72, 'P306B - PRACTICUMRUIMTE (30)'),
(73, 'P306B - PRACTICUMRUIMTE (30)'),
(74, ''),
(75, ''),
(76, ''),
(77, ''),
(78, ''),
(79, ''),
(80, ''),
(81, ''),
(82, ''),
(83, ''),
(84, ''),
(85, ''),
(86, 'G E103 - LESLOKAAL (38)'),
(87, 'G E103 - LESLOKAAL (38)'),
(88, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(89, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(90, 'G B210 - VERGADERLOKAAL (8)'),
(91, 'BEMT INDONESIË - LESLOKAAL (60)'),
(92, 'BEMT NKOREA - LESLOKAAL (81)'),
(93, 'BEMT NKOREA - LESLOKAAL (81)'),
(94, 'F013 - LESLOKAAL (41)'),
(95, 'F013 - LESLOKAAL (41)'),
(96, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(97, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(98, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(99, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(100, 'P306B - PRACTICUMRUIMTE (30)'),
(101, 'P306B - PRACTICUMRUIMTE (30)'),
(102, ''),
(103, ''),
(104, ''),
(105, ''),
(106, ''),
(107, ''),
(108, ''),
(109, ''),
(110, ''),
(111, ''),
(112, ''),
(113, ''),
(114, 'G E103 - LESLOKAAL (38)'),
(115, 'G E103 - LESLOKAAL (38)'),
(116, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(117, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(118, 'G B210 - VERGADERLOKAAL (8)'),
(119, 'BEMT INDONESIË - LESLOKAAL (60)'),
(120, 'BEMT NKOREA - LESLOKAAL (81)'),
(121, 'BEMT NKOREA - LESLOKAAL (81)'),
(122, 'F013 - LESLOKAAL (41)'),
(123, 'F013 - LESLOKAAL (41)'),
(124, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(125, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(126, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(127, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(128, 'P306B - PRACTICUMRUIMTE (30)'),
(129, 'P306B - PRACTICUMRUIMTE (30)'),
(130, ''),
(131, ''),
(132, ''),
(133, ''),
(134, ''),
(135, ''),
(136, ''),
(137, ''),
(138, ''),
(139, ''),
(140, ''),
(141, ''),
(142, 'G E103 - LESLOKAAL (38)'),
(143, 'G E103 - LESLOKAAL (38)'),
(144, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(145, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(146, 'G B210 - VERGADERLOKAAL (8)'),
(147, 'BEMT INDONESIË - LESLOKAAL (60)'),
(148, 'BEMT NKOREA - LESLOKAAL (81)'),
(149, 'BEMT NKOREA - LESLOKAAL (81)'),
(150, 'F013 - LESLOKAAL (41)'),
(151, 'F013 - LESLOKAAL (41)'),
(152, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(153, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(154, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(155, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(156, 'P306B - PRACTICUMRUIMTE (30)'),
(157, 'P306B - PRACTICUMRUIMTE (30)'),
(158, ''),
(159, ''),
(160, ''),
(161, ''),
(162, ''),
(163, ''),
(164, ''),
(165, ''),
(166, ''),
(167, ''),
(168, ''),
(169, ''),
(170, 'G E103 - LESLOKAAL (38)'),
(171, 'G E103 - LESLOKAAL (38)'),
(172, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(173, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(174, 'G B210 - VERGADERLOKAAL (8)'),
(175, 'BEMT INDONESIË - LESLOKAAL (60)'),
(176, 'BEMT NKOREA - LESLOKAAL (81)'),
(177, 'BEMT NKOREA - LESLOKAAL (81)'),
(178, 'F013 - LESLOKAAL (41)'),
(179, 'F013 - LESLOKAAL (41)'),
(180, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(181, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(182, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(183, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(184, 'P306B - PRACTICUMRUIMTE (30)'),
(185, 'P306B - PRACTICUMRUIMTE (30)'),
(186, ''),
(187, ''),
(188, ''),
(189, ''),
(190, ''),
(191, ''),
(192, ''),
(193, ''),
(194, ''),
(195, ''),
(196, ''),
(197, ''),
(198, 'G E103 - LESLOKAAL (38)'),
(199, 'G E103 - LESLOKAAL (38)'),
(200, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(201, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(202, 'G B210 - VERGADERLOKAAL (8)'),
(203, 'BEMT INDONESIË - LESLOKAAL (60)'),
(204, 'BEMT NKOREA - LESLOKAAL (81)'),
(205, 'BEMT NKOREA - LESLOKAAL (81)'),
(206, 'F013 - LESLOKAAL (41)'),
(207, 'F013 - LESLOKAAL (41)'),
(208, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(209, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(210, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(211, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(212, 'P306B - PRACTICUMRUIMTE (30)'),
(213, 'P306B - PRACTICUMRUIMTE (30)'),
(214, ''),
(215, ''),
(216, ''),
(217, ''),
(218, ''),
(219, ''),
(220, ''),
(221, ''),
(222, ''),
(223, ''),
(224, ''),
(225, ''),
(226, 'G E103 - LESLOKAAL (38)'),
(227, 'G E103 - LESLOKAAL (38)'),
(228, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(229, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(230, 'G B210 - VERGADERLOKAAL (8)'),
(231, 'BEMT INDONESIË - LESLOKAAL (60)'),
(232, 'BEMT NKOREA - LESLOKAAL (81)'),
(233, 'BEMT NKOREA - LESLOKAAL (81)'),
(234, 'F013 - LESLOKAAL (41)'),
(235, 'F013 - LESLOKAAL (41)'),
(236, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(237, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(238, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(239, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(240, 'P306B - PRACTICUMRUIMTE (30)'),
(241, 'P306B - PRACTICUMRUIMTE (30)'),
(242, ''),
(243, ''),
(244, ''),
(245, ''),
(246, ''),
(247, ''),
(248, ''),
(249, ''),
(250, ''),
(251, ''),
(252, ''),
(253, ''),
(254, 'G E103 - LESLOKAAL (38)'),
(255, 'G E103 - LESLOKAAL (38)'),
(256, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(257, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(258, 'G B210 - VERGADERLOKAAL (8)'),
(259, 'BEMT INDONESIË - LESLOKAAL (60)'),
(260, 'BEMT NKOREA - LESLOKAAL (81)'),
(261, 'BEMT NKOREA - LESLOKAAL (81)'),
(262, 'F013 - LESLOKAAL (41)'),
(263, 'F013 - LESLOKAAL (41)'),
(264, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(265, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(266, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(267, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(268, 'P306B - PRACTICUMRUIMTE (30)'),
(269, 'P306B - PRACTICUMRUIMTE (30)'),
(270, ''),
(271, ''),
(272, ''),
(273, ''),
(274, ''),
(275, ''),
(276, ''),
(277, ''),
(278, ''),
(279, ''),
(280, ''),
(281, ''),
(282, 'G E103 - LESLOKAAL (38)'),
(283, 'G E103 - LESLOKAAL (38)'),
(284, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(285, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(286, 'G B210 - VERGADERLOKAAL (8)'),
(287, 'BEMT INDONESIË - LESLOKAAL (60)'),
(288, 'BEMT NKOREA - LESLOKAAL (81)'),
(289, 'BEMT NKOREA - LESLOKAAL (81)'),
(290, 'F013 - LESLOKAAL (41)'),
(291, 'F013 - LESLOKAAL (41)'),
(292, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(293, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(294, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(295, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(296, 'P306B - PRACTICUMRUIMTE (30)'),
(297, 'P306B - PRACTICUMRUIMTE (30)'),
(298, ''),
(299, ''),
(300, ''),
(301, ''),
(302, ''),
(303, ''),
(304, ''),
(305, ''),
(306, ''),
(307, ''),
(308, ''),
(309, ''),
(310, 'G E103 - LESLOKAAL (38)'),
(311, 'G E103 - LESLOKAAL (38)'),
(312, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(313, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(314, 'G B210 - VERGADERLOKAAL (8)'),
(315, 'BEMT INDONESIË - LESLOKAAL (60)'),
(316, 'BEMT NKOREA - LESLOKAAL (81)'),
(317, 'BEMT NKOREA - LESLOKAAL (81)'),
(318, 'F013 - LESLOKAAL (41)'),
(319, 'F013 - LESLOKAAL (41)'),
(320, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(321, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(322, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(323, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(324, 'P306B - PRACTICUMRUIMTE (30)'),
(325, 'P306B - PRACTICUMRUIMTE (30)'),
(326, ''),
(327, ''),
(328, ''),
(329, ''),
(330, ''),
(331, ''),
(332, ''),
(333, ''),
(334, ''),
(335, ''),
(336, ''),
(337, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mail`
--

CREATE TABLE `mail` (
  `id` int(50) NOT NULL,
  `onderwerp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `richting`
--

CREATE TABLE `richting` (
  `id` int(50) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `richting`
--

INSERT INTO `richting` (`id`, `naam`) VALUES
(1, 'APP');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `traject`
--

CREATE TABLE `traject` (
  `id` int(50) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `traject`
--

INSERT INTO `traject` (`id`, `naam`, `beschrijving`) VALUES
(1, 'Model', 'Je neemt alle vakken op van hetzelfde jaar.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vak`
--

CREATE TABLE `vak` (
  `id` int(50) NOT NULL,
  `richtingId` int(50) DEFAULT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studiepunt` int(50) DEFAULT NULL,
  `fase` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `vak`
--

INSERT INTO `vak` (`id`, `richtingId`, `naam`, `beschrijving`, `studiepunt`, `fase`) VALUES
(810, NULL, 'WPF (2 APP-BI lesgroep 3)', NULL, NULL, NULL),
(811, NULL, 'WPF (2 APP-BI lesgroep 3)', NULL, NULL, NULL),
(812, NULL, 'Professionele ontwikkeling 2 (2 C)', NULL, NULL, NULL),
(813, NULL, 'Professionele ontwikkeling 2 (2 C)', NULL, NULL, NULL),
(814, NULL, 'English 2 (Lesgroep di 1)', NULL, NULL, NULL),
(815, NULL, 'WPF (2 APP-BI lesgroep 3)', NULL, NULL, NULL),
(816, NULL, 'Businessprocessen en ITIL (2 APP-BI A)', NULL, NULL, NULL),
(817, NULL, 'Businessprocessen en ITIL (2 APP-BI A)', NULL, NULL, NULL),
(818, NULL, 'Cordova (2 APP-BI A)', NULL, NULL, NULL),
(819, NULL, 'Cordova (2 APP-BI A)', NULL, NULL, NULL),
(820, NULL, 'Project APP-BIT (2 APP-BI)', NULL, NULL, NULL),
(821, NULL, 'Project APP-BIT (2 APP-BI)', NULL, NULL, NULL),
(822, NULL, 'UML (2 APP-BI A)', NULL, NULL, NULL),
(823, NULL, 'UML (2 APP-BI A)', NULL, NULL, NULL),
(824, NULL, 'Businessprocessen en ITIL (2 APP-BI A)', NULL, NULL, NULL),
(825, NULL, 'Businessprocessen en ITIL (2 APP-BI A)', NULL, NULL, NULL),
(826, NULL, '', NULL, NULL, NULL),
(827, NULL, 'WPF (2 APP-BI lesgroep 3)', NULL, NULL, NULL),
(828, NULL, 'WPF (2 APP-BI lesgroep 3)', NULL, NULL, NULL),
(829, NULL, 'Professionele ontwikkeling 2 (2 C)', NULL, NULL, NULL),
(830, NULL, 'Professionele ontwikkeling 2 (2 C)', NULL, NULL, NULL),
(831, NULL, 'English 2 (Lesgroep di 1)', NULL, NULL, NULL),
(832, NULL, 'WPF (2 APP-BI lesgroep 3)', NULL, NULL, NULL),
(833, NULL, 'Businessprocessen en ITIL (2 APP-BI A)', NULL, NULL, NULL),
(834, NULL, 'Businessprocessen en ITIL (2 APP-BI A)', NULL, NULL, NULL),
(835, NULL, 'Cordova (2 APP-BI A)', NULL, NULL, NULL),
(836, NULL, 'Cordova (2 APP-BI A)', NULL, NULL, NULL),
(837, NULL, 'Project APP-BIT (2 APP-BI)', NULL, NULL, NULL),
(838, NULL, 'Project APP-BIT (2 APP-BI)', NULL, NULL, NULL),
(839, NULL, 'UML (2 APP-BI A)', NULL, NULL, NULL),
(840, NULL, 'UML (2 APP-BI A)', NULL, NULL, NULL),
(841, NULL, 'Businessprocessen en ITIL (2 APP-BI A)', NULL, NULL, NULL),
(842, NULL, 'Businessprocessen en ITIL (2 APP-BI A)', NULL, NULL, NULL),
(843, NULL, '', NULL, NULL, NULL),
(844, NULL, 'WPF (2 APP-BI lesgroep 3)', NULL, NULL, NULL),
(845, NULL, 'WPF (2 APP-BI lesgroep 3)', NULL, NULL, NULL),
(846, NULL, 'Professionele ontwikkeling 2 (2 C)', NULL, NULL, NULL),
(847, NULL, 'Professionele ontwikkeling 2 (2 C)', NULL, NULL, NULL),
(848, NULL, 'English 2 (Lesgroep di 1)', NULL, NULL, NULL),
(849, NULL, 'WPF (2 APP-BI lesgroep 3)', NULL, NULL, NULL),
(850, NULL, 'Businessprocessen en ITIL (2 APP-BI A)', NULL, NULL, NULL),
(851, NULL, 'Businessprocessen en ITIL (2 APP-BI A)', NULL, NULL, NULL),
(852, NULL, 'Cordova (2 APP-BI A)', NULL, NULL, NULL),
(853, NULL, 'Cordova (2 APP-BI A)', NULL, NULL, NULL),
(854, NULL, 'Project APP-BIT (2 APP-BI)', NULL, NULL, NULL),
(855, NULL, 'Project APP-BIT (2 APP-BI)', NULL, NULL, NULL),
(856, NULL, 'UML (2 APP-BI A)', NULL, NULL, NULL),
(857, NULL, 'UML (2 APP-BI A)', NULL, NULL, NULL),
(858, NULL, 'Businessprocessen en ITIL (2 APP-BI A)', NULL, NULL, NULL),
(859, NULL, 'Businessprocessen en ITIL (2 APP-BI A)', NULL, NULL, NULL),
(860, NULL, '', NULL, NULL, NULL),
(861, NULL, '', NULL, NULL, NULL),
(862, NULL, '', NULL, NULL, NULL),
(863, NULL, '', NULL, NULL, NULL),
(864, NULL, '', NULL, NULL, NULL),
(865, NULL, '', NULL, NULL, NULL),
(866, NULL, '', NULL, NULL, NULL),
(867, NULL, '', NULL, NULL, NULL),
(868, NULL, '', NULL, NULL, NULL),
(869, NULL, '', NULL, NULL, NULL),
(870, NULL, '', NULL, NULL, NULL),
(871, NULL, '', NULL, NULL, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `afspraak`
--
ALTER TABLE `afspraak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `docentId` (`docentId`),
  ADD KEY `lokaalId` (`lokaalId`);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gebruikertypeId` (`gebruikertypeId`),
  ADD KEY `klasId` (`klasId`),
  ADD KEY `trajectId` (`trajectId`),
  ADD KEY `afspraakId` (`afspraakId`);

--
-- Indexen voor tabel `gebruikertype`
--
ALTER TABLE `gebruikertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gebruiker_lesmoment`
--
ALTER TABLE `gebruiker_lesmoment`
  ADD KEY `gebruikerId` (`gebruikerId`),
  ADD KEY `lesmomentId` (`lesmomentId`);

--
-- Indexen voor tabel `klas`
--
ALTER TABLE `klas`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `lesmoment`
--
ALTER TABLE `lesmoment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klasId` (`klasId`),
  ADD KEY `vakId` (`vakId`),
  ADD KEY `richtingId` (`richtingId`);

--
-- Indexen voor tabel `lokaal`
--
ALTER TABLE `lokaal`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `richting`
--
ALTER TABLE `richting`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `traject`
--
ALTER TABLE `traject`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `vak`
--
ALTER TABLE `vak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `richtingId` (`richtingId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `afspraak`
--
ALTER TABLE `afspraak`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `klas`
--
ALTER TABLE `klas`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1155;

--
-- AUTO_INCREMENT voor een tabel `lesmoment`
--
ALTER TABLE `lesmoment`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=571;

--
-- AUTO_INCREMENT voor een tabel `lokaal`
--
ALTER TABLE `lokaal`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT voor een tabel `richting`
--
ALTER TABLE `richting`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `vak`
--
ALTER TABLE `vak`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=872;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `afspraak`
--
ALTER TABLE `afspraak`
  ADD CONSTRAINT `afspraak_ibfk_4` FOREIGN KEY (`docentId`) REFERENCES `gebruiker` (`id`),
  ADD CONSTRAINT `afspraak_ibfk_5` FOREIGN KEY (`studentId`) REFERENCES `gebruiker` (`id`),
  ADD CONSTRAINT `afspraak_ibfk_6` FOREIGN KEY (`lokaalId`) REFERENCES `lokaal` (`id`);

--
-- Beperkingen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD CONSTRAINT `gebruiker_ibfk_3` FOREIGN KEY (`trajectId`) REFERENCES `traject` (`id`),
  ADD CONSTRAINT `gebruiker_ibfk_5` FOREIGN KEY (`klasId`) REFERENCES `klas` (`id`),
  ADD CONSTRAINT `gebruiker_ibfk_6` FOREIGN KEY (`gebruikertypeId`) REFERENCES `gebruikertype` (`id`),
  ADD CONSTRAINT `gebruiker_ibfk_7` FOREIGN KEY (`trajectId`) REFERENCES `traject` (`id`);

--
-- Beperkingen voor tabel `gebruiker_lesmoment`
--
ALTER TABLE `gebruiker_lesmoment`
  ADD CONSTRAINT `gebruiker_lesmoment_ibfk_3` FOREIGN KEY (`gebruikerId`) REFERENCES `gebruiker` (`id`),
  ADD CONSTRAINT `gebruiker_lesmoment_ibfk_4` FOREIGN KEY (`lesmomentId`) REFERENCES `lesmoment` (`id`);

--
-- Beperkingen voor tabel `lesmoment`
--
ALTER TABLE `lesmoment`
  ADD CONSTRAINT `lesmoment_ibfk_4` FOREIGN KEY (`klasId`) REFERENCES `klas` (`id`),
  ADD CONSTRAINT `lesmoment_ibfk_5` FOREIGN KEY (`vakId`) REFERENCES `vak` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
