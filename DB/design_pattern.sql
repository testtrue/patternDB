-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 26. Sep 2017 um 08:39
-- Server-Version: 5.6.34-log
-- PHP-Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `design_pattern`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pattern`
--

CREATE TABLE `pattern` (
  `ID` int(11) NOT NULL,
  `type_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pattern_type`
--

CREATE TABLE `pattern_type` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `picture`
--

CREATE TABLE `picture` (
  `ID` int(11) NOT NULL,
  `pattern_ID` int(11) NOT NULL,
  `picture_type_ID` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `filename` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `picture_type`
--

CREATE TABLE `picture_type` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `text`
--

CREATE TABLE `text` (
  `ID` int(11) NOT NULL,
  `pattern_ID` int(11) NOT NULL,
  `type_ID` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `text_type`
--

CREATE TABLE `text_type` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
