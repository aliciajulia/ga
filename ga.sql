-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 04 dec 2014 kl 14:48
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

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `inlog`
--
ALTER TABLE `inlog`
 ADD PRIMARY KEY (`anvnam`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
