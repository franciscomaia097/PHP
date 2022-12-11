-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Dez-2022 às 20:01
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdcampismo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cabanasinfo`
--

CREATE TABLE `cabanasinfo` (
  `idCabana` int(11) NOT NULL,
  `nome` text NOT NULL,
  `img_cabana` text NOT NULL,
  `preco_noite` varchar(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cabanasinfo`
--

INSERT INTO `cabanasinfo` (`idCabana`, `nome`, `img_cabana`, `preco_noite`, `tipo`, `descricao`, `estado`) VALUES
(1, 'Cabana de Campismo', 'cabana1.jpg', '50€', 'T2', 'Cabana de Campismo T2, 50€ por noite', 1),
(2, 'Cabana do Amor', 'cabana2.jpg', '60€', 'T1', 'Cabana do amor', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `nomeEstado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`idEstado`, `nomeEstado`) VALUES
(1, 'Livre'),
(2, 'Ocupado');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cabanasinfo`
--
ALTER TABLE `cabanasinfo`
  ADD PRIMARY KEY (`idCabana`),
  ADD KEY `estado` (`estado`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cabanasinfo`
--
ALTER TABLE `cabanasinfo`
  MODIFY `idCabana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cabanasinfo`
--
ALTER TABLE `cabanasinfo`
  ADD CONSTRAINT `cabanasinfo_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`idEstado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
