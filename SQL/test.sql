-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 10, 2020 alle 15:18
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `bill`
--

CREATE TABLE `bill` (
  `Id` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Number` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `bill`
--

INSERT INTO `bill` (`Id`, `Date`, `Number`, `CustomerId`) VALUES
(2, '2015-01-01 00:00:00', 3, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `billrow`
--

CREATE TABLE `billrow` (
  `Id` int(11) NOT NULL,
  `IdBill` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Amount` decimal(12,0) NOT NULL,
  `VAT` decimal(12,0) NOT NULL,
  `Total` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `billrow`
--

INSERT INTO `billrow` (`Id`, `IdBill`, `Description`, `Quantity`, `Amount`, `VAT`, `Total`) VALUES
(2, 2, 'cdsc', 1, '22', '22', '22'),
(6, 2, 'cddc', 1, '12', '111', '11');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `billrow`
--
ALTER TABLE `billrow`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdBill_Index` (`IdBill`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `bill`
--
ALTER TABLE `bill`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `billrow`
--
ALTER TABLE `billrow`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `billrow`
--
ALTER TABLE `billrow`
  ADD CONSTRAINT `IdBill_Index` FOREIGN KEY (`IdBill`) REFERENCES `bill` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
