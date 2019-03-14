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
(1, 1, NULL, NULL, NULL, 'student', '', 'student@student.thomasmore.be', '$2y$10$mA.zxi.HHmms37m.7jMbReLLxprF0QxjvGAxC6PClG8/j0gbnZdhO'),
(2, 2, NULL, NULL, NULL, 'docent', '', 'docent@docent.thomasmore.be', '$2y$10$at02OHrl0hae630baexpQelVzB7tCtuiWAWOBN/4ZpYvdeb9rcJdO'),
<<<<<<< HEAD
(3, 3, NULL, NULL, NULL, 'isp', '', 'isp@isp.thomasmore.be', '$2y$10$3o47tu.GlfVCB8pnVaIgoeGdEgUYBwqArkcXfdl40VXnh2nIRaTpO');
=======
(3, 3, NULL, NULL, NULL, 'isp', '', 'isp@isp.thomasmore.be', '$2y$10$3o47tu.GlfVCB8pnVaIgoeGdEgUYBwqArkcXfdl40VXnh2nIRaTpO'),
(4, 2, NULL, NULL, NULL, 'War', 'Op de Beeck', 'r0709145@student.thomasmore.be', '$2y$10$YHt6uKYFJm3x5D22uJtfZe0OqBIqpZGLLejQZXtQzZ1Y1LkZEjNwG'),
(5, 1, NULL, NULL, NULL, 'Thomas', 'Dergent', 'r0699038@student.thomasmore.be', '$2y$10$kpMzFOLnEAUXRKI0yHB3G..drQs1/bpPQl2AVyIAa5wdhfEXb.922'),
(6, 1, NULL, NULL, NULL, 'Raf', 'Van Elst', 'r0695265@student.thomasmore.be', '$2y$10$zCNqLiJjeYdZQbhGKNh94u7GGhGZxVhpHyrSPUbx1Uvj6OVE3wtXu'),
(7, 3, NULL, NULL, NULL, 'Melih', 'Doksanbir', 'r0720857@student.thomasmore.be', '$2y$10$70MgO/PYKo8ehmQoHjer4uoaNVriUGqSgD0krJaOynIWaarC5FFo2'),
(8, 1, NULL, NULL, NULL, 'Simon', 'Smedts', 'r0695798@student.thomasmore.be', '$2y$10$3gAFKTTlIEi5LmqO83f2quUe33ot8LfSVRW8N14YTDfT4EgK41wIu');
>>>>>>> 65f969d4920d45ff766cf258032a1e9f424373d3

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


INSERT INTO `gebruiker_lesmoment` (`id`, `gebruikerId`, `lesmomentId`, `naam`) VALUES
(1, 1, 20, ''),
(2, 7, 18, ''),
(3, 6, 10, ''),
(4, 4, 9, ''),
(5, 4, 15, ''),
(6, 5, 5, ''),
(7, 1, 8, ''),
(8, 8, 11, '');
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
(1, '1ITFB', 30),
(2, '1ITFC', 40),
(3, '2 APP-BI A', 35),
(4, '2 APP-BI B', 35),
(5, '2 IOT', 40),
(6, '2 CCS', 40),
(7, '2 APP-BI groep 1', 35),
(8, '2 APP-BI groep 2', 35);

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
(1, 1, 1, 5, 'Maandag', 1, 20),
(2, 5, 2, 5, 'Maandag', 2, 10),
(3, 7, 3, 5, 'Maandag', 3, 30),
(4, 6, 4, 5, 'Maandag', 4, 30),
(5, 4, 5, 5, 'Dinsdag', 1, 40),
(6, 8, 6, 5, 'Dinsdag', 2, 30),
(7, 2, 7, 5, 'Woensdag', 3, 35),
(8, 3, 8, 5, 'Woensdag', 4, 40),
(9, 1, 9, 5, 'Donderdag', 1, 40),
(10, 2, 10, 5, 'Donderdag', 2, 0),
(11, 3, 11, 5, 'Donderdag', 3, 0),
(12, 4, 12, 5, 'Donderdag', 4, 0),
(13, 5, 13, 5, 'Vrijdag', 1, 0),
(14, 6, 14, 5, 'Vrijdag', 2, 0),
(15, 7, 15, 5, 'Vrijdag', 3, 0),
(16, 8, 16, 5, 'Vrijdag', 4, 0),
(17, 7, 17, 5, 'Maandag', 1, 0),
(18, 4, 7, 5, 'Maandag', 2, 0),
(19, 1, 4, 5, 'Maandag', 3, 0),
(20, 1, 15, 5, 'Maandag', 4, 0);

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
(1, 'G E103 - LESLOKAAL (38)'),
(2, 'BEMT INDONESIË - LESLOKAAL (60), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(3, 'G B210 - VERGADERLOKAAL (8)'),
(4, 'BEMT INDONESIË - LESLOKAAL (60)'),
(5, 'BEMT NKOREA - LESLOKAAL (81)'),
(6, 'F013 - LESLOKAAL (41)'),
(7, 'BEMT INDONESIË - LESLOKAAL (60), BEMT JAPAN - LESLOKAAL (30), BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(8, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)'),
(9, 'P306B - PRACTICUMRUIMTE (30)'),
(10, 'BEMT INDONESIË - LESLOKAAL (60)'),
(11, 'BEMT NKOREA - LESLOKAAL (81)'),
(12, 'BEMT NKOREA - LESLOKAAL (81), BEMT ZKOREA - LESLOKAAL (1)');

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
(1, 'APP'),
(2, 'BIT'),
(3, 'EMDEV'),
(4, 'CCS'),
(5, 'APP-BI');

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
(1, 'Model', 'Je neemt alle vakken op van hetzelfde jaar.'),
(2, 'Combi', 'Je neemt ook vakken van vorig jaar op waardoor je misschien vakken van je huidige jaar moet laten vallen.');

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
(1, 5, 'WPF (2 APP-BI lesgroep 1)', NULL, NULL, NULL),
(2, 5, 'WPF (2 APP-BI lesgroep 2)', NULL, NULL, NULL),
(3, 5, 'Professionele ontwikkeling 2', NULL, NULL, NULL),
(4, 5, 'English 2 (Lesgroep 1)', NULL, NULL, NULL),
(5, 5, 'English 2 (Lesgroep 2)', NULL, NULL, NULL),
(6, 5, 'Businessprocessen (2 APP-BI A)', NULL, NULL, NULL),
(7, 5, 'Businessprocessen (2 APP-BI B)', NULL, NULL, NULL),
(8, 5, 'ITIL (2 APP-BI A)', NULL, NULL, NULL),
(9, 5, 'ITIL (2 APP-BI B)', NULL, NULL, NULL),
(10, 5, 'Cordova (2 APP-BI A)', NULL, NULL, NULL),
(11, 5, 'Cordova (2 APP-BI B)', NULL, NULL, NULL),
(12, 5, 'Project APP-BIT (2 APP-BI)', NULL, NULL, NULL),
(13, 5, 'UML (2 APP-BI A)', NULL, NULL, NULL),
(14, 5, 'UML (2 APP-BI B)', NULL, NULL, NULL),
(15, 5, 'ASP.NET MVC (2 APP-BI lesgroep 1)', NULL, NULL, NULL),
(16, 5, 'java advanced (2 APP-BI A)', NULL, NULL, NULL),
(17, 5, 'java advanced (2 APP-BI B)', NULL, NULL, NULL);


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
