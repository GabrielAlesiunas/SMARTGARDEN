-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Dez-2023 às 18:33
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
-- Estrutura da tabela `placa`
--

DROP TABLE IF EXISTS `placa`;
CREATE TABLE IF NOT EXISTS `placa` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `mac` varchar(200) DEFAULT NULL,
  `nome` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `temperatura` int NOT NULL,
  `luminosidade` int NOT NULL,
  `umidade` int NOT NULL,
  `fk_usuario_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_id` (`fk_usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `placa`
--

INSERT INTO `placa` (`id`, `mac`, `nome`, `temperatura`, `luminosidade`, `umidade`, `fk_usuario_id`) VALUES
(1, 'QR CODE', 'PLACA 1', 15, 54, 67, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `plantas`
--

INSERT INTO `plantas` (`id`, `nome`, `tempideal`, `umideal`, `lumideal`) VALUES
(2, 'Alface', 16, 60, 3500),
(3, 'Tomate', 21, 65, 6500),
(4, 'Cenoura', 19, 80, 3500),
(5, 'Cebola', 18, 65, 4000),
(6, 'Pimentão', 25, 70, 6500),
(7, 'Espinafre', 15, 55, 3500),
(8, 'Rabanete', 15, 55, 6500),
(9, 'Menta', 21, 60, 6000),
(10, 'Hortelã', 21, 60, 6000),
(11, 'Bertalha Roxa', 25, 75, 7000);

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
(2, 'Placa ESP32', 'Desvende o mundo da inovação com a nossa Placa ESP32, uma solução versátil e potente para os entusiastas da eletrônica e desenvolvedores ávidos. Projetada para oferecer desempenho excepcional e conect', 49),
(3, 'Kit de Sensores', 'Explore a personalização e a inteligência em seus projetos com nossos Sensores de Umidade, Luminosidade e Temperatura. Desenvolvidos para proporcionar medições precisas em tempo real, esses sensores s', 39),
(4, 'Hortelã', 'Desperte seu jardineiro interior com o nosso elegante Vaso de Hortelã Fresca. Este pequeno jardim em casa é a maneira perfeita de cultivar hortelã orgânica e fresca em sua cozinha, varanda ou jardim. ', 19.9),
(5, 'Bertalha Roxa', 'Bem-vindo ao mundo da Bertalha Roxa, uma planta fascinante que combina beleza e sabor em uma única experiência de cultivo. Esta variedade de bertalha não apenas encanta com suas folhas roxas vibrantes', 13.5),
(6, 'Menta', 'Bem-vindo à nossa seleção de Menta Fresca, um ingrediente versátil que pode transformar suas receitas e momentos de relaxamento. A menta é conhecida por seu sabor refrescante e aroma revigorante, torn', 29.9);

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `situacaoplanta`
--

INSERT INTO `situacaoplanta` (`id`, `fk_placa_id`, `data`, `temperatura`, `umidade`, `luminosidade`) VALUES
(0, 1, '2023-11-18 20:59:26', 10, 10, 10),
(1, 1, '2023-11-25 12:04:21', 1, 1, 1),
(2, 1, '2023-11-09 12:04:21', 2, 2, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `foto_perfil`) VALUES
(1, 'Gabriel', 'gabriel.alesiunas@yahoo.com.br', 'gabriel123', 'assets/img/imgPerfiluserpadrao.png'),
(8, 'admin', 'admin@gmail.com', 'Admin123@', 'assets/img/imgPerfilcorinthians.jpeg'),
(26, 'teste21', 'teste21@gmail.com', '123', 'assets/img/imgPerfil/userpadrao.png'),
(27, 'tcc', 'tcc@gmail.com', 'tcc123', 'assets/img/imgPerfillinux.png');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `placa`
--
ALTER TABLE `placa`
  ADD CONSTRAINT `placa_ibfk_1` FOREIGN KEY (`fk_usuario_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
