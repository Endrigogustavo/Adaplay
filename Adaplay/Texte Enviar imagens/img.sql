-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Set-2023 às 02:51
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
-- Banco de dados: `img`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aquivos`
--

CREATE TABLE `aquivos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data_upload` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aquivos`
--

INSERT INTO `aquivos` (`id`, `nome`, `path`, `data_upload`) VALUES
(1, 'dr.jpeg', 'arquivos/650793724a3c5.jpeg', '2023-09-17 21:01:54'),
(2, 'dr.jpeg', 'arquivos/65079740d23ff.jpeg', '2023-09-17 21:18:08'),
(3, 'dr.jpeg', 'arquivos/65079edcba7a9.jpeg', '2023-09-17 21:50:36'),
(4, 'tai.jpg', 'arquivos/65079ee50f9e4.jpg', '2023-09-17 21:50:45');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aquivos`
--
ALTER TABLE `aquivos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aquivos`
--
ALTER TABLE `aquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
