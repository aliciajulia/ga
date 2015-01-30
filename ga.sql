-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 23 jan 2015 kl 10:46
-- Serverversion: 5.6.20
-- PHP-version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `ga`
--
CREATE DATABASE IF NOT EXISTS `ga` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ga`;

-- --------------------------------------------------------

--
-- Tabellstruktur `behandlingar`
--

DROP TABLE IF EXISTS `behandlingar`;
CREATE TABLE IF NOT EXISTS `behandlingar` (
`id` int(11) NOT NULL,
  `namn` varchar(30) NOT NULL,
  `längd` int(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumpning av Data i tabell `behandlingar`
--

INSERT INTO `behandlingar` (`id`, `namn`, `längd`) VALUES
(5, 'massage', 60),
(6, 'akupentur', 70),
(7, 'massage', 70),
(8, 'massage', 55),
(9, 'massage', 60),
(10, 'massage', 60),
(11, 'massage', 60),
(12, 'massage', 60),
(13, 'fotmassage', 30),
(14, 'massage', 55),
(15, 'massage', 55);

-- --------------------------------------------------------

--
-- Tabellstruktur `inlog`
--

DROP TABLE IF EXISTS `inlog`;
CREATE TABLE IF NOT EXISTS `inlog` (
  `anvnam` varchar(20) NOT NULL,
  `losord` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `inlog`
--

INSERT INTO `inlog` (`anvnam`, `losord`) VALUES
('inger', 'inger');

-- --------------------------------------------------------

--
-- Tabellstruktur `tider`
--

DROP TABLE IF EXISTS `tider`;
CREATE TABLE IF NOT EXISTS `tider` (
`id` int(11) NOT NULL,
  `starttid` datetime NOT NULL,
  `sluttid` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumpning av Data i tabell `tider`
--

INSERT INTO `tider` (`id`, `starttid`, `sluttid`) VALUES
(4, '2014-05-20 14:00:00', '2014-05-20 15:30:00'),
(5, '2014-04-20 14:00:00', '2014-04-20 14:30:00'),
(6, '2014-05-20 15:00:00', '2014-05-20 16:30:00');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `behandlingar`
--
ALTER TABLE `behandlingar`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `inlog`
--
ALTER TABLE `inlog`
 ADD PRIMARY KEY (`anvnam`);

--
-- Index för tabell `tider`
--
ALTER TABLE `tider`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `behandlingar`
--
ALTER TABLE `behandlingar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT för tabell `tider`
--
ALTER TABLE `tider`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
