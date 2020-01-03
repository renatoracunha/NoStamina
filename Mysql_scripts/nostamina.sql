-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Jan-2020 às 18:08
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nostamina`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `idade` int(2) DEFAULT NULL,
  `mensal` varchar(1) NOT NULL DEFAULT 'F',
  `saldo` double DEFAULT NULL,
  `partidas` int(5) DEFAULT NULL,
  `vitorias` int(5) DEFAULT NULL,
  `derrotas` int(5) DEFAULT NULL,
  `empates` int(5) DEFAULT NULL,
  `minutos` int(11) DEFAULT NULL,
  `gols` int(11) DEFAULT NULL,
  `assistencias` int(11) DEFAULT NULL,
  `mvp` int(11) DEFAULT NULL,
  `seloGuita` int(11) DEFAULT NULL,
  `ativo` varchar(1) NOT NULL DEFAULT 'T',
  `telefone` int(15) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `players`
--

INSERT INTO `players` (`id`, `nome`, `idade`, `mensal`, `saldo`, `partidas`, `vitorias`, `derrotas`, `empates`, `minutos`, `gols`, `assistencias`, `mvp`, `seloGuita`, `ativo`, `telefone`, `login`, `senha`, `img`) VALUES
(1, 'Renato Cunha', 28, 'T', 40, 322, 150, 150, 22, 30000, 57, 21, 8, 3, 'T', 997474813, 'renatoracunha', '123', 'profile1.jpg'),
(2, 'Eduardo Cunha', 23, 'T', 40, 300, 15, 15, 220, 30000, 570, 210, 80, 3, 'T', 997474813, 'eduracunha', '123', 'profile2.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `players_ratings`
--

CREATE TABLE `players_ratings` (
  `id` int(11) NOT NULL,
  `player_votador` int(11) NOT NULL,
  `player_votado` int(11) NOT NULL,
  `media_votos` double NOT NULL,
  `shooting` int(1) NOT NULL,
  `pass` int(1) NOT NULL,
  `defence` int(1) NOT NULL,
  `stamina` int(1) NOT NULL,
  `speed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `players_ratings`
--

INSERT INTO `players_ratings` (`id`, `player_votador`, `player_votado`, `media_votos`, `shooting`, `pass`, `defence`, `stamina`, `speed`) VALUES
(1, 2, 1, 4, 4, 5, 5, 3, 3),
(2, 1, 2, 3.8, 3, 3, 5, 5, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `players_ratings`
--
ALTER TABLE `players_ratings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `players_ratings`
--
ALTER TABLE `players_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
