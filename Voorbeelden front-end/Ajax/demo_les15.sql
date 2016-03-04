-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 19 feb 2016 om 16:01
-- Serverversie: 5.6.26
-- PHP-versie: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_les15`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` mediumint(9) NOT NULL,
  `key` tinytext NOT NULL,
  `name` text NOT NULL,
  `amount` bigint(20) NOT NULL DEFAULT '0',
  `fname` text,
  `lname` varchar(20) DEFAULT NULL,
  `gemeentebelasting` int(11) NOT NULL,
  `scholen` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `states`
--

INSERT INTO `states` (`id`, `key`, `name`, `amount`, `fname`, `lname`, `gemeentebelasting`, `scholen`) VALUES
(1, 'PRO_WV', 'West-vlaanderen', 0, NULL, '', 0, 0),
(2, 'PRO_VB', 'Vlaams Brabant', 449, 'Janx', '', 0, 0),
(3, 'PRO_OV', 'Oost-vlaanderen', 100, 'bart', '', 0, 0),
(4, 'PRO_N', 'Namen', 0, NULL, '', 0, 0),
(5, 'PRO_LUX', 'Luxemburg', 0, NULL, '', 0, 0),
(6, 'PRO_LIM', 'Limburg', 1243, 'Arne', '', 0, 0),
(7, 'PRO_LI', 'Luik', 33, 'jan', '', 0, 0),
(8, 'PRO_HE', 'Henegouwen', 0, NULL, '', 0, 0),
(9, 'PRO_BRU', 'Brussel', 0, NULL, '', 0, 0),
(10, 'PRO_WB', 'Waals Brabant', 15, 'Sam0', 'Amant0', 50, 60),
(11, 'PRO_ANT', 'Antwerpen', 500, 'Bart', 'de Wever', 150, 15);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `states`
--
ALTER TABLE `states`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
