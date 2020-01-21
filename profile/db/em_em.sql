-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 21 jan 2020 om 20:45
-- Serverversie: 5.5.14
-- PHP-versie: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `em_em`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `eventCode` int(11) NOT NULL,
  `eventVendor` varchar(45) NOT NULL,
  `eventName` varchar(45) NOT NULL,
  `eventDescription` varchar(250) NOT NULL,
  `quantityTickets` int(11) NOT NULL,
  `stockTickets` int(11) NOT NULL,
  `eventPrice` int(11) NOT NULL,
  `eventBeginDate` date NOT NULL,
  `eventEndDate` date NOT NULL,
  `eventBeginTime` time NOT NULL,
  `eventEndTime` time NOT NULL,
  `eventPresentor` varchar(15) NOT NULL,
  `eventLocation` varchar(20) NOT NULL,
  `eventImg` varchar(50) DEFAULT NULL,
  `eventColor` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `events`
--

INSERT INTO `events` (`id`, `eventCode`, `eventVendor`, `eventName`, `eventDescription`, `quantityTickets`, `stockTickets`, `eventPrice`, `eventBeginDate`, `eventEndDate`, `eventBeginTime`, `eventEndTime`, `eventPresentor`, `eventLocation`, `eventImg`, `eventColor`) VALUES
(6, 123456, 'Test', 'Niek&#39;s verjaardagsfeestje!!!!', 'Feest!!!', 100, 0, 10, '2019-04-23', '2019-04-23', '16:00:00', '23:30:00', 'Niek Vlam', 'Utrecht', 'none', '#5252f8'),
(15, 2147483647, 'Tomorrowland', 'Tomorrowland 2020', 'Party', 1000, 0, 100, '2020-08-26', '2020-09-03', '00:00:00', '00:00:00', 'Tomorrowland', 'Amsterdam', 'C:\\fakepath\\default.jpg', '#57e3ce');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE `order` (
  `id` int(3) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `insertion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wrong_logins` int(9) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role` int(9) NOT NULL DEFAULT '1',
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirm_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `fname`, `insertion`, `lname`, `email`, `wrong_logins`, `password`, `user_role`, `role`, `confirmed`, `confirm_code`) VALUES
(2, 'Niels', '', 'Kohlenberg', '528907@student.glu.nl', 2, '$2y$10$VelVkYu8XLwhvtIhZrI2MOwG68nLspTQkZIqKBle7CWYEawqjdmT6', 2, 'Developer', 1, '19966'),
(10, 'tom', 'de', 'waardt', '530408@gluweb.nl', 0, '$2y$10$cIWA7H3l9ICReckjS7rxWuwDfph30iLMtZrqDR.QVATJILNoGeBWS', 2, 'Developer', 1, '37227'),
(11, 'Joost', 'van', 'Veen', 'nospam@accentinteractive.nl', 0, '$2y$10$mIe0qeCJk36pTm.kRaMhTu8iA85nlW2iZJXRqdVH8YLGzxLuUwUJm', 1, '', 1, '83657'),
(12, 'Bart', 'van', 'Schoonhoven', 'bartvanschoonhoven@gmail.com', 0, '$2y$10$44tEUU9nd2bm8VPprRfn3Ogir3ypgZHaG8itVe0boFKeVNtNe/wHi', 1, '', 0, '29196'),
(13, 'Henk', 'de', 'Vries', 'pbijker@glu.nl', 0, '$2y$10$WnNJOiwKGwqUO4wlbpfTl.RSc/I0gMtyTOGx.JVK.BGRPqQdLS8KS', 1, '', 0, '79430');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
