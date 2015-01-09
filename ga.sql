-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 09 jan 2015 kl 14:48
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumpning av Data i tabell `tider`
--

INSERT INTO `tider` (`id`, `starttid`, `sluttid`) VALUES
(4, '2014-05-20 14:00:00', '2014-05-20 14:30:00'),
(5, '2014-04-20 14:00:00', '2014-04-20 14:30:00');

--
-- Index för dumpade tabeller
--

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
-- AUTO_INCREMENT för tabell `tider`
--
ALTER TABLE `tider`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
