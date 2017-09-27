-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Set-2017 às 07:08
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE IF NOT EXISTS `carros` (
  `id_carro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `marca_carro` varchar(50) DEFAULT NULL,
  `modelo_carro` varchar(50) DEFAULT NULL,
  `ano_carro` char(4) DEFAULT NULL,
  PRIMARY KEY (`id_carro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id_carro`, `marca_carro`, `modelo_carro`, `ano_carro`) VALUES
(4, 'Jac', 'j3', '1997'),
(5, 'fiat', 'bravo', '2017'),
(9, 'VW', 'up', '2000'),
(10, 'Jac', 'T5', '2015'),
(11, 'Jac', 'T5', '2015');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
