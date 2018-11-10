-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 10 Kas 2018, 02:34:17
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `personel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

CREATE TABLE `personel` (
  `tc` bigint(11) NOT NULL,
  `namelast` varchar(255) DEFAULT NULL,
  `fathername` varchar(255) DEFAULT NULL,
  `mothername` varchar(255) DEFAULT NULL,
  `birthday` timestamp NULL DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `homeaddress` text,
  `cellphone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bro_row` int(11) DEFAULT NULL,
  `blood` int(11) DEFAULT NULL,
  `primary_school` varchar(255) DEFAULT NULL,
  `middle_school` varchar(255) DEFAULT NULL,
  `high_school` varchar(255) DEFAULT NULL,
  `university` int(11) DEFAULT NULL,
  `note_u` double DEFAULT NULL,
  `kpss` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`tc`, `namelast`, `fathername`, `mothername`, `birthday`, `birthplace`, `homeaddress`, `cellphone`, `email`, `bro_row`, `blood`, `primary_school`, `middle_school`, `high_school`, `university`, `note_u`, `kpss`) VALUES
(11111111111, 'asdasdas', 'asdasdasd', 'sadasdasd', '0000-00-00 00:00:00', 'asdasda', 'asdasdas', '5555555555', 'root@ff.com', 8, 0, 'asdasdasd', 'dasdasd', 'asdasdasd', 0, 4, 4),
(13423022726, 'Metehan Yüksel', 'Sami', 'Fehime', '1996-03-25 21:00:00', 'Ankara', 'Yenimahalle', '5543994180', 'h.metehanyuksel@gmail.com', 3, 0, 'Şehit Piyade', 'Şehit Piyade', 'Zeynep Salih', 0, 87, 11);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'mthnyksl', '123456');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`tc`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
