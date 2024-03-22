-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: db:3306
-- Üretim Zamanı: 23 Şub 2024, 13:12:52
-- Sunucu sürümü: 8.3.0
-- PHP Sürümü: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `php_docker`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favorites_table`
--

CREATE TABLE `favorites_table` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `article_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `favorites_table`
--

INSERT INTO `favorites_table` (`id`, `user_id`, `article_id`) VALUES
(1, 1, 7),
(2, 1, 9),
(3, 1, 10),
(4, 2, 2),
(5, 2, 4),
(6, 2, 6),
(7, 3, 1),
(8, 3, 3),
(9, 3, 5),
(10, 4, 2),
(11, 4, 8),
(12, 4, 9);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `favorites_table`
--
ALTER TABLE `favorites_table`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `favorites_table`
--
ALTER TABLE `favorites_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
