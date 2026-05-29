-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 29. kvě 2026, 19:22
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `knihovna`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `rezervace`
--

CREATE TABLE `rezervace` (
  `id` int(11) NOT NULL,
  `jmeno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `kniha_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `seznam_knih`
--

CREATE TABLE `seznam_knih` (
  `id` int(11) NOT NULL,
  `nazev` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `obrazek` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `seznam_knih`
--

INSERT INTO `seznam_knih` (`id`, `nazev`, `autor`, `obrazek`) VALUES
(1, 'Harry Potter a Kámen mudrců', 'J.K. Rowlingová', 'https://ia600404.us.archive.org/view_archive.php?archive=/33/items/l_covers_0010/l_covers_0010_11.zip&file=0010110415-L.jpg'),
(2, '1984', 'George Orwell', 'https://ia601701.us.archive.org/view_archive.php?archive=/4/items/l_covers_0011/l_covers_0011_26.zip&file=0011260565-L.jpg'),
(3, 'Hobit', 'J.R.R. Tolkien', 'https://covers.openlibrary.org/b/isbn/9780547928227-L.jpg'),
(4, 'Malý Princ', 'Antoine de Saint-Exupéry', 'https://covers.openlibrary.org/b/isbn/9780156012195-L.jpg'),
(5, 'Alchymista', 'Paulo Coelho', 'https://covers.openlibrary.org/b/isbn/9780062315007-L.jpg'),
(6, 'Deník malého poseroutky', 'Jeff Kinney', 'https://1bdc831cdf.cbaul-cdnwnd.com/46cda6ed875e4cd60d6a31db208c0d81/200000001-7ca087e94d-public/denik%201.jpg?s3=1'),
(7, 'Velký Gatsby', 'F. Scott Fitzgerald', 'https://covers.openlibrary.org/b/isbn/9780743273565-L.jpg'),
(8, 'Duna', 'Frank Herbert', 'https://covers.openlibrary.org/b/isbn/9780441013593-L.jpg');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `rezervace`
--
ALTER TABLE `rezervace`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kniha` (`kniha_id`);

--
-- Indexy pro tabulku `seznam_knih`
--
ALTER TABLE `seznam_knih`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `rezervace`
--
ALTER TABLE `rezervace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pro tabulku `seznam_knih`
--
ALTER TABLE `seznam_knih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `rezervace`
--
ALTER TABLE `rezervace`
  ADD CONSTRAINT `fk_kniha` FOREIGN KEY (`kniha_id`) REFERENCES `seznam_knih` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
