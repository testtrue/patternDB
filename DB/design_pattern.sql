-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Sep 2017 um 10:30
-- Server-Version: 10.1.8-MariaDB
-- PHP-Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `design_pattern`
--
CREATE DATABASE IF NOT EXISTS `design_pattern` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `design_pattern`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pattern`
--
-- Erstellt am: 21. Sep 2017 um 08:28
--

DROP TABLE IF EXISTS `pattern`;
CREATE TABLE `pattern` (
  `ID` int(11) NOT NULL,
  `type_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONEN DER TABELLE `pattern`:
--   `type_ID`
--       `pattern_type` -> `ID`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pattern_type`
--
-- Erstellt am: 21. Sep 2017 um 07:45
--

DROP TABLE IF EXISTS `pattern_type`;
CREATE TABLE `pattern_type` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONEN DER TABELLE `pattern_type`:
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `picture`
--
-- Erstellt am: 21. Sep 2017 um 07:54
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `ID` int(11) NOT NULL,
  `pattern_ID` int(11) NOT NULL,
  `picture_type_ID` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `filename` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONEN DER TABELLE `picture`:
--   `pattern_ID`
--       `pattern` -> `ID`
--   `picture_type_ID`
--       `picture_type` -> `ID`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `picture_type`
--
-- Erstellt am: 21. Sep 2017 um 07:52
--

DROP TABLE IF EXISTS `picture_type`;
CREATE TABLE `picture_type` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONEN DER TABELLE `picture_type`:
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `text`
--
-- Erstellt am: 21. Sep 2017 um 08:04
--

DROP TABLE IF EXISTS `text`;
CREATE TABLE `text` (
  `ID` int(11) NOT NULL,
  `pattern_ID` int(11) NOT NULL,
  `type_ID` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONEN DER TABELLE `text`:
--   `pattern_ID`
--       `pattern` -> `ID`
--   `type_ID`
--       `text_type` -> `ID`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `text_type`
--
-- Erstellt am: 21. Sep 2017 um 08:05
--

DROP TABLE IF EXISTS `text_type`;
CREATE TABLE `text_type` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONEN DER TABELLE `text_type`:
--

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `pattern`
--
ALTER TABLE `pattern`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `pattern_type`
--
ALTER TABLE `pattern_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `picture_type`
--
ALTER TABLE `picture_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `text_type`
--
ALTER TABLE `text_type`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `pattern`
--
ALTER TABLE `pattern`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `pattern_type`
--
ALTER TABLE `pattern_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `picture`
--
ALTER TABLE `picture`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `picture_type`
--
ALTER TABLE `picture_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `text`
--
ALTER TABLE `text`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `text_type`
--
ALTER TABLE `text_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
