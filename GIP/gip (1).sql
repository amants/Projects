-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 18 mrt 2016 om 15:59
-- Serverversie: 5.6.26
-- PHP-versie: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gip`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(85) NOT NULL,
  `email` varchar(85) NOT NULL,
  `title` varchar(85) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `title`, `message`, `timestamp`, `ip`) VALUES
(1, 'Sam Amant', '', 'test', 'Testing deze shit man', '2016-03-07 09:27:24', '::1'),
(2, 'Sam Amant', '', 'Testing this post', 'sfsfdgsdfgsd\r\nfg\r\nsdf\r\ngsd\r\nfgs\r\ndfgsdfgsd', '2016-03-07 09:32:32', '::1'),
(3, 'Sam Amant', 'sam_amant@hotmail.com', 'qsdfqsdf', 'fsdfgdfssgdfgsdfgsdf \r\n\r\nsdfgsdfg', '2016-03-07 10:09:06', '::1'),
(4, 'Sam Amant', 'df@sdf.be', 'qsdfqsdf', 'sdfsf', '2016-03-07 10:12:36', '::1'),
(5, 'Sam Amant', 'sam_amant@hotmail.com', 'Testing this shiiiet', 'dgsdfgsdfgs', '2016-03-10 11:42:04', '::1'),
(6, 'Sam Amant', 'sam_amant@hotmail.com', 'asdasd', 'qsdsdqfsdf', '2016-03-18 14:41:25', '::1'),
(7, '', 'sam_amant@hotmail.com', 'asdasd', 'qsdsdqfsdf', '2016-03-18 14:45:18', '::1'),
(8, 'Sam Amant', 'sam_amant@hotmail.com', 'Testing this shiiiet', 'sdfdsfg', '2016-03-18 14:47:56', '::1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'none.jpg',
  `caption` varchar(85) NOT NULL,
  `productid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(85) NOT NULL,
  `description` text NOT NULL,
  `editdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `editdate`) VALUES
(1, 'Regular', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt\r\nmollit anim id est laborum."Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '2016-03-14 09:15:43'),
(2, 'Premium', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt\r\nmollit anim id est laborum."Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '2016-03-14 09:15:43'),
(3, 'Enterprise', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt\r\nmollit anim id est laborum."Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '2016-03-14 09:15:48');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `hash` text NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `sessions`
--

INSERT INTO `sessions` (`id`, `userid`, `hash`, `ip`) VALUES
(1, 1, '3ab7e3a5cef7b75d151a73d2ab7e978e', '::1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(85) NOT NULL,
  `content` varchar(85) NOT NULL,
  `changedate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `settings`
--

INSERT INTO `settings` (`id`, `name`, `content`, `changedate`) VALUES
(1, 'contactmail', 'amants@visocloud.org', '2016-03-07 09:28:45');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `usergroups`
--

CREATE TABLE IF NOT EXISTS `usergroups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `usergroups`
--

INSERT INTO `usergroups` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'User'),
(4, 'Guest'),
(5, 'Banned');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(85) NOT NULL,
  `lname` varchar(85) NOT NULL,
  `email` varchar(85) NOT NULL,
  `ip` varchar(85) NOT NULL,
  `username` varchar(85) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` text NOT NULL,
  `salt` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `ip`, `username`, `regdate`, `password`, `salt`) VALUES
(1, 'Sam', 'Amant', 'sam_amant@hotmail.com', '', 'Rexani', '2016-03-14 09:52:10', 'cc3d7464188aa15965a33b8aeceef7fc921312b478e7dee97cf1cde31617646d7151e6f00d6945ca6d8658650dfe617149775d1bb70703c0282c5babd11154c8', '99974');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `usergroups`
--
ALTER TABLE `usergroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT voor een tabel `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `usergroups`
--
ALTER TABLE `usergroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
