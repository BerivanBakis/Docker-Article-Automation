-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: db:3306
-- Üretim Zamanı: 23 Şub 2024, 13:05:24
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
-- Tablo için tablo yapısı `comments_table`
--

CREATE TABLE `comments_table` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `article_id` int NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `comments_table`
--

INSERT INTO `comments_table` (`id`, `user_id`, `article_id`, `comment`) VALUES
(1, 1, 1, 'Great article!'),
(2, 2, 3, 'I found this very informative.'),
(3, 3, 5, 'Interesting insights.'),
(4, 4, 2, 'Well written.'),
(5, 1, 7, 'Looking forward to more articles like this.'),
(6, 2, 9, 'This article helped me a lot.'),
(7, 3, 4, 'I have a question regarding this topic.'),
(8, 4, 6, 'Could you elaborate on this point?'),
(9, 1, 8, 'I completely agree with the author.'),
(10, 2, 10, 'I disagree with some points in this article.'),
(11, 3, 1, 'Nice job!'),
(12, 4, 3, 'I appreciate the effort put into this.'),
(13, 1, 5, 'I wish there were more examples provided.'),
(14, 2, 2, 'Excellent analysis.'),
(15, 3, 6, 'This article opened my eyes to new possibilities.'),
(16, 4, 9, 'I have shared this with my colleagues.'),
(17, 1, 10, 'Looking forward to the next part.'),
(18, 2, 4, 'I have bookmarked this page for future reference.'),
(19, 3, 8, 'This article deserves more attention.'),
(20, 4, 7, 'I will recommend this to my friends.');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `comments_table`
--
ALTER TABLE `comments_table`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `comments_table`
--
ALTER TABLE `comments_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
