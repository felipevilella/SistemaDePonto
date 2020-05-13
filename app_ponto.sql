-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Mar-2020 às 02:26
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `app_ponto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto`
--

DROP TABLE IF EXISTS `ponto`;
CREATE TABLE IF NOT EXISTS `ponto` (
  `id_ponto` int(11) NOT NULL AUTO_INCREMENT,
  `horario` time NOT NULL,
  `fk_idTipoPonto` int(11) NOT NULL,
  `fk_idUsuario` int(11) NOT NULL,
  `data` date,
  PRIMARY KEY (`id_ponto`),
  KEY `fk_idTipoPonto` (`fk_idTipoPonto`),
  KEY `fk_idUsuario` (`fk_idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ponto`
--

INSERT INTO `ponto` (`id_ponto`, `horario`, `fk_idTipoPonto`, `fk_idUsuario`, `data`) VALUES
(18, '23:10:13', 1, 1, '2020-03-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_ponto`
--

DROP TABLE IF EXISTS `tipo_ponto`;
CREATE TABLE IF NOT EXISTS `tipo_ponto` (
  `idTipoPonto` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoPonto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_ponto`
--

INSERT INTO `tipo_ponto` (`idTipoPonto`, `nome`) VALUES
(1, 'Inicio expediente'),
(2, 'Saida Almoço'),
(3, 'retorno almoço'),
(4, 'Final expediente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `senha` longtext NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `senha`, `email`) VALUES
(1, 'Felipe Vilella de Oliveira Alves', '6f162cc04ac5dcb63bff385a8555f8ad65b0069f9dfc49b58167a6b2d7c67d0140f1e700c94ac4010405f5b78f7edd48b11579cae97b0dcfd3124e7afcdee49bPHoI6ZzC7PSwiI+eTPQ6zEP5EvKWQY022zBvOBsLTgc=', 'felipevilellaalves@hotmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
