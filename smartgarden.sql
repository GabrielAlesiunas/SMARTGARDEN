-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09-Nov-2023 às 00:46
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.1.13

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
  `fk_placa_id` int DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `temperatura_ideal` double DEFAULT NULL,
  `umidade_ideal` double DEFAULT NULL,
  `luminosidade_ideal` double DEFAULT NULL,
  `fk_plantas_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `placa`
--

DROP TABLE IF EXISTS `placa`;
CREATE TABLE IF NOT EXISTS `placa` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `mac` varchar(200) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `fk_usuario_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_id` (`fk_usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `plantas`
--

DROP TABLE IF EXISTS `plantas`;
CREATE TABLE IF NOT EXISTS `plantas` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `tempideal` bigint DEFAULT NULL,
  `umideal` bigint DEFAULT NULL,
  `lumideal` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `plantas`
--

INSERT INTO `plantas` (`id`, `nome`, `tempideal`, `umideal`, `lumideal`) VALUES
(1, 'maconha', 21, 24, 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `valor`) VALUES
(1, 'Irrigador Automático Inteligente com Arduino', 'Transforme o seu jardim em um oásis verdejante e vibrante com o nosso Irrigador Automático Inteligente baseado em Arduino. Este inovador sistema de irrigação é a solução perfeita para manter suas plan', 119.9),
(4, 'Hortelã', 'Desperte seu jardineiro interior com o nosso elegante Vaso de Hortelã Fresca. Este pequeno jardim em casa é a maneira perfeita de cultivar hortelã orgânica e fresca em sua cozinha, varanda ou jardim. ', 19.9),
(5, 'Bertalha Roxa', 'Bem-vindo ao mundo da Bertalha Roxa, uma planta fascinante que combina beleza e sabor em uma única experiência de cultivo. Esta variedade de bertalha não apenas encanta com suas folhas roxas vibrantes', 13.5),
(6, 'Menta', 'Bem-vindo à nossa seleção de Menta Fresca, um ingrediente versátil que pode transformar suas receitas e momentos de relaxamento. A menta é conhecida por seu sabor refrescante e aroma revigorante, torn', 29.9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacaoplaca`
--

DROP TABLE IF EXISTS `situacaoplaca`;
CREATE TABLE IF NOT EXISTS `situacaoplaca` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `temperatura` bigint DEFAULT NULL,
  `umidade` bigint DEFAULT NULL,
  `luminosidade` bigint DEFAULT NULL,
  `fk_placa_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_placa_id` (`fk_placa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacaoplanta`
--

DROP TABLE IF EXISTS `situacaoplanta`;
CREATE TABLE IF NOT EXISTS `situacaoplanta` (
  `id` int NOT NULL,
  `fk_placa_id` int DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `foto_perfil`) VALUES
(1, 'Gabriel', 'gabriel.alesiunas@yahoo.com.br', 'gabriel123', 'assets/img/imgPerfiluserpadrao.png'),
(8, 'admin', 'admin@gmail.com', 'Admin123@', 'assets/img/imgPerfilcorinthians.jpeg');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `placa`
--
ALTER TABLE `placa`
  ADD CONSTRAINT `placa_ibfk_1` FOREIGN KEY (`fk_usuario_id`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `situacaoplaca`
--
ALTER TABLE `situacaoplaca`
  ADD CONSTRAINT `situacaoplaca_ibfk_1` FOREIGN KEY (`fk_placa_id`) REFERENCES `placa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
