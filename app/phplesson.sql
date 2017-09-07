-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 07. Sep 2017 um 15:13
-- Server-Version: 5.7.19-0ubuntu0.17.04.1
-- PHP-Version: 7.1.9-1+ubuntu17.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `phplesson`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `customers`
--

INSERT INTO `customers` (`id`, `email`, `firstname`, `lastname`, `street`, `postcode`, `city`, `created_at`, `updated_at`) VALUES
(1, 'MStockenberg@googlemail.com', 'Marten', 'Stockenberg', 'HauptmannstraÃŸe 7', '04109', 'Leipzig', '2017-08-09 17:17:31', NULL),
(2, 'hans@wurst.de', 'Hans', 'Wurst', 'WurststraÃŸe', '1337', 'Hansestadt', '2017-08-09 17:32:25', NULL),
(3, 'MStockenberg@googlemail.com', 'Marten', 'Stockenberg', 'HauptmannstraÃŸe 7', '04109', 'Leipzig', '2017-08-10 15:48:08', NULL),
(4, 'MStockenberg@googlemail.com', 'marten_schueler', 'stockenberg', 'MarschnerstraÃŸe, 14', '04109', 'Leipzig', '2017-08-14 16:45:29', NULL),
(5, 'MStockenberg@googlemail.com', 'Marten', 'Stockenberg', 'HauptmannstraÃŸe 7', '04109', 'Leipzig', '2017-08-14 20:50:31', NULL),
(6, 'MStockenberg@googlemail.com', 'marten_schueler', 'stockenberg', 'MarschnerstraÃŸe, 14', '04109', 'Leipzig', '2017-08-15 12:15:21', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `total` float NOT NULL,
  `state_id` int(11) NOT NULL,
  `shipped_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`id`, `total`, `state_id`, `shipped_at`, `created_at`, `updated_at`, `customer_id`) VALUES
(1, 0, 1, NULL, '2017-08-09 17:17:31', NULL, 1),
(2, 0, 1, NULL, '2017-08-09 17:32:25', NULL, 2),
(3, 610.45, 2, NULL, '2017-08-10 15:48:08', '2017-08-14 17:41:55', 3),
(4, 84.5, 4, NULL, '2017-08-14 16:45:29', '2017-08-14 17:52:51', 4),
(5, 1, 2, NULL, '2017-08-14 20:50:31', '2017-08-15 10:11:59', 5),
(6, 10, 4, NULL, '2017-08-15 12:15:21', '2017-09-07 11:22:13', 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `orders_products`
--

INSERT INTO `orders_products` (`id`, `product_id`, `order_id`, `product_amount`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 2, '2017-08-09 17:17:31', NULL),
(2, 10, 2, 2, '2017-08-09 17:32:25', NULL),
(3, 7, 2, 4, '2017-08-09 17:32:25', NULL),
(4, 9, 2, 2, '2017-08-09 17:32:25', NULL),
(5, 7, 3, 5, '2017-08-10 15:48:08', NULL),
(6, 10, 3, 1, '2017-08-10 15:48:08', NULL),
(7, 9, 3, 5, '2017-08-10 15:48:08', NULL),
(8, 9, 4, 50, '2017-08-14 16:45:29', NULL),
(9, 7, 4, 20, '2017-08-14 16:45:29', NULL),
(10, 7, 5, 1, '2017-08-14 20:50:31', NULL),
(11, 7, 6, 10, '2017-08-15 12:15:21', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `name`, `amount`, `price`, `img`, `description`, `created_at`, `updated_at`) VALUES
(7, 'Apfel', '19', '1.00', 'apfel-img-9270.jpg', 'Test', '2017-08-01 13:28:52', '2017-08-15 10:15:21'),
(9, 'Birne', '0', '1.29', 'building.jpg', 'Lecker', '2017-08-01 13:45:38', '2017-08-15 17:51:04'),
(10, 'Flatscreen', '200', '599,00', 'wallpaper-paint-23.jpg', 'Action!', '2017-08-01 16:43:20', NULL),
(11, 'M&ouml;hre', '500', '1.00', 'Moehre-201020421070.jpg', 'Eine leckere Karotte', '2017-08-15 12:14:26', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `states`
--

INSERT INTO `states` (`id`, `state`, `state_id`) VALUES
(3, 'Bestellung ist Eingegangen', 1),
(4, 'Bestellung wird bearbeitet', 2),
(7, 'Bestellung wurde versandt', 3),
(9, 'Alles fein', 4),
(10, 'Neuer Status', 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '3',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'MStockenberg@googlemail.com', '$2y$14$DDurPmJHR3L8Qo05YLkoe.VNPD3wDt7jqkRNX3nqN80L8JBgGFAeG', 1, '2017-07-03 16:39:27', NULL),
(3, 'Jens', 'test@test.de', '$2y$12$OZbewbHGei3jBpgnLLNVRe5qJB6tox.X8CL4pPzyHCgyB.DWHZAo6', 2, '2017-08-15 18:36:01', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT für Tabelle `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
