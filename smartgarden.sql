-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Nov-2023 às 17:30
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `smartgarden`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracaoplanta`
--

DROP TABLE IF EXISTS `configuracaoplanta`;
CREATE TABLE IF NOT EXISTS `configuracaoplanta` (
  `id` int NOT NULL,
  `fk_Placa_id` int DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `temperatura_ideal` double DEFAULT NULL,
  `umidade_ideal` double DEFAULT NULL,
  `luminosidade_ideal` double DEFAULT NULL,
  `fk_Plantas_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `placa`
--

DROP TABLE IF EXISTS `placa`;
CREATE TABLE IF NOT EXISTS `placa` (
  `id` int NOT NULL,
  `mac` varchar(50) DEFAULT NULL,
  `fk_Usuario_id` int DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mac` (`mac`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `plantas`
--

DROP TABLE IF EXISTS `plantas`;
CREATE TABLE IF NOT EXISTS `plantas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `tempideal` int DEFAULT NULL,
  `umideal` int DEFAULT NULL,
  `lumideal` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `valor` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacaoplanta`
--

DROP TABLE IF EXISTS `situacaoplanta`;
CREATE TABLE IF NOT EXISTS `situacaoplanta` (
  `id` int NOT NULL,
  `fk_Placa_id` int DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `temperatura` double DEFAULT NULL,
  `umidade` double DEFAULT NULL,
  `luminosidade` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `foto_perfil` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `foto_perfil`) VALUES
(1, 'Gabriel', 'gabriel.alesiunas@yahoo.com.br', '@Ghjk87yzwe99', 'assets/img/imgPerfilIsxisd.jpg'),
(8, 'admin', 'admin@gmail.com', 'Admin123@', 'assets/img/imgPerfilcorinthians.jpeg'),
(13, 'a', 'teste@gmail.com', '123', 'assets/img/imgPerfil/userpadrao.png'),
(14, 'adc', 'd@gmail.com', 'd', 'assets/img/imgPerfil/userpadrao.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
