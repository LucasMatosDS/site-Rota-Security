-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 08-Maio-2020 às 06:59
-- Versão do servidor: 10.4.6-MariaDB
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
-- Banco de dados: `rota`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senha_decript` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `arquivo` longblob NOT NULL,
  `descricao` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `cpf`, `senha`, `senha_decript`, `arquivo`, `descricao`, `data`) VALUES
(1, 'administrador', 'rotasecurity@gmail.com', '000.000.000-00', 'dd4b21e9ef71e1291183a46b913ae6f2', '00000000', '', '-', '-'),
(2, 'tecnico', 'tecnico@gmail.com', '111.111.111-11', '1bbd886460827015e5d605ed44252251', '11111111', '', '-', '-'),
(19, 'JOSE', 'JOSE@GMAIL.COM', '222.222.222-22', 'bae5e3208a3c700e3db642b6631e95b9', '22222222', 0x3332353266373930373765653430326561333163616232373765646364646561, 'dsdd', '07/05/2020'),
(20, 'ANA', 'ANA@GMAIL.COM', '444.444.444-44', 'b857eed5c9405c1f2b98048aae506792', '44444444', 0x3164356661333036643835646634373637323635613238336131366331303638, 'aaa', '07/05/2020'),
(21, 'SD', 'DS@GMAIL.COM', '777.777.777-77', '30e535568de1f9231e7d9df0f4a5a44d', '77777777', 0x3c696d673e, 'descriÃ§Ã£o indisponÃ­vel!', '07/05/2020');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id_img` int(11) NOT NULL,
  `imagem` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id_img`, `imagem`) VALUES
(1, 0x417574756d6e5f696e5f4b616e61735f62795f57616e675f4a696e79752e6a7067),
(2, 0x616c75636172642d68656c6c73696e672e6a7067),
(3, 0x4461726b5f4976792e6a7067),
(4, 0x646561746874726f6f7065722e6a7067),
(5, 0x427574746572666c795f28696d6167655f62795f5261795f42696c636c696666292e6a7067),
(6, 0x426561636866726f6e745f28696d6167655f62795f5261795f42696c636c696666292e6a7067),
(7, 0x417368696d204453696c76612e6a7067);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_img`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
