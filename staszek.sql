-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Kwi 2023, 14:17
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `staszek`
--
CREATE DATABASE IF NOT EXISTS `staszek` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `staszek`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `artykuly`
--

CREATE TABLE IF NOT EXISTS `artykuly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tytul` varchar(100) DEFAULT NULL,
  `tresc` varchar(255) DEFAULT NULL,
  `strona` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `artykuly`
--

INSERT INTO `artykuly` (`id`, `tytul`, `tresc`, `strona`) VALUES
(1, 'inna planeta', 'Prawdopodobieństwo zniszczenia naszej cywilizacji jest niezerowe. Możemy zniszczyć się sami, możemy też doświadczyć losu dinozaurów. Jednym ze sposobów uniknięcia takiej ponurej przyszłości jest kolonizacja. Tylko gdzie? Pewnie powiecie „Mars”, ale to nie', 'artykuly/inna_planeta.php'),
(2, 'Latające czołgi', 'Ukraina otrzymała lub kupiła od Zachodu wiele cennego sprzętu, jednak ze względu na to, że nikt tak naprawdę nie wie, kiedy uda zakończyć się działania wojenne, konieczne są kolejne dostawy uzbrojenia. Tym razem pomocną dłoń dla ukraińskiej armii wyciągnę', 'artykuly/latajace_czolgi.php'),
(3, 'Youtube', 'Niepohamowana chęć zysku i obiektywizm moralny są nie do pogodzenia. W świecie algorytmów nie ma emocji i typowo ludzkich odczuć, ale za algorytmami stoją ludzie, a maszyny zdolne do błyskawicznego filtrowania i analizowania treści zwielokrotniają uprzedz', 'artykuly/youtube.php');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
