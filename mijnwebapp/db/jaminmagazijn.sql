-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 20 sep 2026 om 20:50
-- Serverversie: 9.1.0
-- PHP-versie: 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jaminmagazijn`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `allergeen`
--

DROP TABLE IF EXISTS `allergeen`;
CREATE TABLE IF NOT EXISTS `allergeen` (
  `Id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Omschrijving` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerkingen` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL,
  `DatumGewijzigd` datetime(6) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `allergeen`
--

INSERT INTO `allergeen` (`Id`, `Naam`, `Omschrijving`, `IsActief`, `Opmerkingen`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Gluten', 'Dit product bevat gluten', b'1', NULL, '2026-09-20 22:39:45.747344', '2026-09-20 22:39:45.747355'),
(2, 'Gelatine', 'Dit product bevat gelatine', b'1', NULL, '2026-09-20 22:39:45.747470', '2026-09-20 22:39:45.747470'),
(3, 'AZO-Kleurstof', 'Dit product bevat AZO-kleurstoffen', b'1', NULL, '2026-09-20 22:39:45.747504', '2026-09-20 22:39:45.747504'),
(4, 'Lactose', 'Dit product bevat lactose', b'1', NULL, '2026-09-20 22:39:45.747515', '2026-09-20 22:39:45.747516'),
(5, 'Soja', 'Dit product bevat soja', b'1', NULL, '2026-09-20 22:39:45.747527', '2026-09-20 22:39:45.747527');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leverancier`
--

DROP TABLE IF EXISTS `leverancier`;
CREATE TABLE IF NOT EXISTS `leverancier` (
  `Id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Naam` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ContactPersoon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LeverancierNummer` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobiel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerkingen` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL,
  `DatumGewijzigd` datetime(6) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `leverancier`
--

INSERT INTO `leverancier` (`Id`, `Naam`, `ContactPersoon`, `LeverancierNummer`, `Mobiel`, `IsActief`, `Opmerkingen`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Venco', 'Bert van Linge', 'L1029384719', '06-28493827', b'1', NULL, '2026-09-20 22:39:45.831989', '2026-09-20 22:39:45.831994'),
(2, 'Astra Sweets', 'Jasper del Monte', 'L1029284315', '06-39398734', b'1', NULL, '2026-09-20 22:39:45.832068', '2026-09-20 22:39:45.832069'),
(3, 'Haribo', 'Sven Stalman', 'L1029324748', '06-24383291', b'1', NULL, '2026-09-20 22:39:45.832091', '2026-09-20 22:39:45.832092'),
(4, 'Basset', 'Joyce Stelterberg', 'L1023845773', '06-48293823', b'1', NULL, '2026-09-20 22:39:45.832101', '2026-09-20 22:39:45.832101'),
(5, 'De Bron', 'Remco Veenstra', 'L1023857736', '06-34291234', b'1', NULL, '2026-09-20 22:39:45.832109', '2026-09-20 22:39:45.832109');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `magazijn`
--

DROP TABLE IF EXISTS `magazijn`;
CREATE TABLE IF NOT EXISTS `magazijn` (
  `Id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProductId` int UNSIGNED NOT NULL,
  `VerpakkingsEenheid` decimal(4,1) NOT NULL,
  `AantalAanwezig` int DEFAULT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerkingen` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL,
  `DatumGewijzigd` datetime(6) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Magazijn_ProductId_Product_Id` (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `magazijn`
--

INSERT INTO `magazijn` (`Id`, `ProductId`, `VerpakkingsEenheid`, `AantalAanwezig`, `IsActief`, `Opmerkingen`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 5.0, 453, b'1', NULL, '2026-09-20 22:39:46.027214', '2026-09-20 22:39:46.027220'),
(2, 2, 2.5, 400, b'1', NULL, '2026-09-20 22:39:46.027323', '2026-09-20 22:39:46.027323'),
(3, 3, 5.0, 1, b'1', NULL, '2026-09-20 22:39:46.027355', '2026-09-20 22:39:46.027355'),
(4, 4, 1.0, 800, b'1', NULL, '2026-09-20 22:39:46.027365', '2026-09-20 22:39:46.027366'),
(5, 5, 3.0, 234, b'1', NULL, '2026-09-20 22:39:46.027376', '2026-09-20 22:39:46.027377'),
(6, 6, 2.0, 345, b'1', NULL, '2026-09-20 22:39:46.027386', '2026-09-20 22:39:46.027386'),
(7, 7, 1.0, 795, b'1', NULL, '2026-09-20 22:39:46.027394', '2026-09-20 22:39:46.027395'),
(8, 8, 10.0, 233, b'1', NULL, '2026-09-20 22:39:46.027403', '2026-09-20 22:39:46.027404'),
(9, 9, 2.5, 123, b'1', NULL, '2026-09-20 22:39:46.027413', '2026-09-20 22:39:46.027413'),
(10, 10, 3.0, NULL, b'1', NULL, '2026-09-20 22:39:46.027421', '2026-09-20 22:39:46.027421'),
(11, 11, 2.0, 367, b'1', NULL, '2026-09-20 22:39:46.027429', '2026-09-20 22:39:46.027430'),
(12, 12, 1.0, 467, b'1', NULL, '2026-09-20 22:39:46.027438', '2026-09-20 22:39:46.027438'),
(13, 13, 5.0, 20, b'1', NULL, '2026-09-20 22:39:46.027446', '2026-09-20 22:39:46.027446');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Naam` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Barcode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerkingen` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL,
  `DatumGewijzigd` datetime(6) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`Id`, `Naam`, `Barcode`, `IsActief`, `Opmerkingen`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Mintnopjes', '8719587231278', b'1', NULL, '2026-09-20 22:39:44.782520', '2026-09-20 22:39:44.782527'),
(2, 'Schoolkrijt', '8719587326713', b'1', NULL, '2026-09-20 22:39:44.782640', '2026-09-20 22:39:44.782641'),
(3, 'Honingdrop', '8719587327836', b'1', NULL, '2026-09-20 22:39:44.782666', '2026-09-20 22:39:44.782667'),
(4, 'Zure Beren', '8719587321441', b'1', NULL, '2026-09-20 22:39:44.782672', '2026-09-20 22:39:44.782672'),
(5, 'Cola Flesjes', '8719587321237', b'1', NULL, '2026-09-20 22:39:44.782678', '2026-09-20 22:39:44.782679'),
(6, 'Turtles', '8719587322245', b'1', NULL, '2026-09-20 22:39:44.782684', '2026-09-20 22:39:44.782684'),
(7, 'Witte Muizen', '8719587328256', b'1', NULL, '2026-09-20 22:39:44.782689', '2026-09-20 22:39:44.782689'),
(8, 'Reuzen Slangen', '8719587325641', b'1', NULL, '2026-09-20 22:39:44.782694', '2026-09-20 22:39:44.782695'),
(9, 'Zoute Rijen', '8719587322739', b'1', NULL, '2026-09-20 22:39:44.782700', '2026-09-20 22:39:44.782701'),
(10, 'Winegums', '8719587327527', b'1', NULL, '2026-09-20 22:39:44.782705', '2026-09-20 22:39:44.782706'),
(11, 'Drop Munten', '8719587322345', b'1', NULL, '2026-09-20 22:39:44.782710', '2026-09-20 22:39:44.782711'),
(12, 'Kruis Drop', '8719587322265', b'1', NULL, '2026-09-20 22:39:44.782716', '2026-09-20 22:39:44.782716'),
(13, 'Zoute Ruitjes', '8719587323256', b'1', NULL, '2026-09-20 22:39:44.782721', '2026-09-20 22:39:44.782722');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `productperallergeen`
--

DROP TABLE IF EXISTS `productperallergeen`;
CREATE TABLE IF NOT EXISTS `productperallergeen` (
  `Id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProductId` int UNSIGNED NOT NULL,
  `AllergeenId` int UNSIGNED NOT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerkingen` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL,
  `DatumGewijzigd` datetime(6) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_ProductPerAllergeen_ProductId_Product_Id` (`ProductId`),
  KEY `FK_ProductPerAllergeen_AllergeenId_Allergeen_Id` (`AllergeenId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `productperallergeen`
--

INSERT INTO `productperallergeen` (`Id`, `ProductId`, `AllergeenId`, `IsActief`, `Opmerkingen`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 2, b'1', NULL, '2026-09-20 22:39:46.127180', '2026-09-20 22:39:46.127188'),
(2, 1, 1, b'1', NULL, '2026-09-20 22:39:46.127310', '2026-09-20 22:39:46.127310'),
(3, 1, 3, b'1', NULL, '2026-09-20 22:39:46.127345', '2026-09-20 22:39:46.127346'),
(4, 3, 4, b'1', NULL, '2026-09-20 22:39:46.127359', '2026-09-20 22:39:46.127359'),
(5, 6, 5, b'1', NULL, '2026-09-20 22:39:46.127372', '2026-09-20 22:39:46.127372'),
(6, 9, 2, b'1', NULL, '2026-09-20 22:39:46.127385', '2026-09-20 22:39:46.127385'),
(7, 9, 5, b'1', NULL, '2026-09-20 22:39:46.127398', '2026-09-20 22:39:46.127398'),
(8, 10, 2, b'1', NULL, '2026-09-20 22:39:46.127409', '2026-09-20 22:39:46.127410'),
(9, 12, 4, b'1', NULL, '2026-09-20 22:39:46.127424', '2026-09-20 22:39:46.127424'),
(10, 13, 1, b'1', NULL, '2026-09-20 22:39:46.127435', '2026-09-20 22:39:46.127435'),
(11, 13, 4, b'1', NULL, '2026-09-20 22:39:46.127446', '2026-09-20 22:39:46.127446'),
(12, 13, 5, b'1', NULL, '2026-09-20 22:39:46.127458', '2026-09-20 22:39:46.127458');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `productperleverancier`
--

DROP TABLE IF EXISTS `productperleverancier`;
CREATE TABLE IF NOT EXISTS `productperleverancier` (
  `Id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `LeverancierId` int UNSIGNED NOT NULL,
  `ProductId` int UNSIGNED NOT NULL,
  `DatumLevering` date NOT NULL,
  `Aantal` int NOT NULL,
  `DatumEerstVolgendeLevering` date DEFAULT NULL,
  `IsActief` bit(1) NOT NULL DEFAULT b'1',
  `Opmerkingen` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DatumAangemaakt` datetime(6) NOT NULL,
  `DatumGewijzigd` datetime(6) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_ProductPerLeverancier_LeverancierId_Leverancier_Id` (`LeverancierId`),
  KEY `FK_ProductPerLeverancier_ProductId_Product_Id` (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `productperleverancier`
--

INSERT INTO `productperleverancier` (`Id`, `LeverancierId`, `ProductId`, `DatumLevering`, `Aantal`, `DatumEerstVolgendeLevering`, `IsActief`, `Opmerkingen`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, 1, '2024-10-09', 23, '2024-10-16', b'1', NULL, '2026-09-20 22:39:46.232496', '2026-09-20 22:39:46.232501'),
(2, 1, 1, '2024-10-18', 21, '2024-10-25', b'1', NULL, '2026-09-20 22:39:46.232636', '2026-09-20 22:39:46.232637'),
(3, 1, 2, '2024-10-09', 12, '2024-10-16', b'1', NULL, '2026-09-20 22:39:46.232675', '2026-09-20 22:39:46.232676'),
(4, 1, 3, '2024-10-10', 11, '2024-10-17', b'1', NULL, '2026-09-20 22:39:46.232696', '2026-09-20 22:39:46.232696'),
(5, 2, 4, '2024-10-14', 16, '2024-10-21', b'1', NULL, '2026-09-20 22:39:46.232716', '2026-09-20 22:39:46.232717'),
(6, 2, 4, '2024-10-21', 23, '2024-10-28', b'1', NULL, '2026-09-20 22:39:46.232780', '2026-09-20 22:39:46.232783'),
(7, 2, 5, '2024-10-14', 45, '2024-10-21', b'1', NULL, '2026-09-20 22:39:46.232814', '2026-09-20 22:39:46.232814'),
(8, 2, 6, '2024-10-14', 30, '2024-10-21', b'1', NULL, '2026-09-20 22:39:46.232837', '2026-09-20 22:39:46.232837'),
(9, 3, 7, '2024-10-12', 12, '2024-10-19', b'1', NULL, '2026-09-20 22:39:46.232851', '2026-09-20 22:39:46.232851'),
(10, 3, 7, '2024-10-19', 23, '2024-10-26', b'1', NULL, '2026-09-20 22:39:46.232864', '2026-09-20 22:39:46.232865'),
(11, 3, 8, '2024-10-10', 12, '2024-10-17', b'1', NULL, '2026-09-20 22:39:46.232877', '2026-09-20 22:39:46.232877'),
(12, 3, 9, '2024-10-11', 1, '2024-10-18', b'1', NULL, '2026-09-20 22:39:46.232889', '2026-09-20 22:39:46.232889'),
(13, 4, 10, '2024-10-16', 24, '2024-10-30', b'1', NULL, '2026-09-20 22:39:46.232907', '2026-09-20 22:39:46.232908'),
(14, 5, 11, '2024-10-10', 47, '2024-10-17', b'1', NULL, '2026-09-20 22:39:46.232957', '2026-09-20 22:39:46.232959'),
(15, 5, 11, '2024-10-19', 60, '2024-10-26', b'1', NULL, '2026-09-20 22:39:46.232981', '2026-09-20 22:39:46.232981'),
(16, 5, 12, '2024-10-11', 45, NULL, b'1', NULL, '2026-09-20 22:39:46.232999', '2026-09-20 22:39:46.232999'),
(17, 5, 13, '2024-10-12', 23, NULL, b'1', NULL, '2026-09-20 22:39:46.233018', '2026-09-20 22:39:46.233019');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `magazijn`
--
ALTER TABLE `magazijn`
  ADD CONSTRAINT `FK_Magazijn_ProductId_Product_Id` FOREIGN KEY (`ProductId`) REFERENCES `product` (`Id`);

--
-- Beperkingen voor tabel `productperallergeen`
--
ALTER TABLE `productperallergeen`
  ADD CONSTRAINT `FK_ProductPerAllergeen_AllergeenId_Allergeen_Id` FOREIGN KEY (`AllergeenId`) REFERENCES `allergeen` (`Id`),
  ADD CONSTRAINT `FK_ProductPerAllergeen_ProductId_Product_Id` FOREIGN KEY (`ProductId`) REFERENCES `product` (`Id`);

--
-- Beperkingen voor tabel `productperleverancier`
--
ALTER TABLE `productperleverancier`
  ADD CONSTRAINT `FK_ProductPerLeverancier_LeverancierId_Leverancier_Id` FOREIGN KEY (`LeverancierId`) REFERENCES `leverancier` (`Id`),
  ADD CONSTRAINT `FK_ProductPerLeverancier_ProductId_Product_Id` FOREIGN KEY (`ProductId`) REFERENCES `product` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
