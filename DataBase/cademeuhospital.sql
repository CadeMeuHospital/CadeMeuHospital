-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 01-Dez-2013 às 13:29
-- Versão do servidor: 5.6.11
-- versão do PHP: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `cademeuhospital`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `evaluate`
--

CREATE TABLE IF NOT EXISTS `evaluate` (
  `id_evaluate` int(5) NOT NULL AUTO_INCREMENT,
  `id_cod_unico` int(5) NOT NULL,
  `amount_people` int(5) NOT NULL,
  `value_vote` int(5) NOT NULL,
  `amount_people_1` int(11) NOT NULL,
  `amount_people_2` int(11) NOT NULL,
  `amount_people_3` int(11) NOT NULL,
  `amount_people_4` int(11) NOT NULL,
  `amount_people_5` int(11) NOT NULL,
  PRIMARY KEY (`id_evaluate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
