-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 31-Jan-2020 às 05:01
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
-- Estrutura da tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id_arq` bigint(20) NOT NULL,
  `nome_arq` longblob NOT NULL,
  `descricao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fk_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `arquivos`
--

INSERT INTO `arquivos` (`id_arq`, `nome_arq`, `descricao`, `fk_id`) VALUES
(1, '', '', 0),
(2, '', '', 0);

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
  `data` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `cpf`, `senha`, `senha_decript`, `data`) VALUES
(1, 'administrador', 'rotasecurity@gmail.com', '000.000.000-00', 'dd4b21e9ef71e1291183a46b913ae6f2', '00000000', ''),
(2, 'tecnico', 'tecnico@gmail.com', '111.111.111-11', '1bbd886460827015e5d605ed44252251', '11111111', ''),
(62, 'Mario', 'MARIO@GMAIL.COM', '222.222.222-22', 'bae5e3208a3c700e3db642b6631e95b9', '22222222', '30/01/2020'),
(63, 'Maria', 'MARIA@HOTMAIL.COM', '333.333.333-33', 'd27d320c27c3033b7883347d8beca317', '33333333', '30/01/2020'),
(71, 'Lucas', 'LUCAS@GMAIL.COM', '444.444.444-44', 'b857eed5c9405c1f2b98048aae506792', '44444444', '31/01/2020'),
(72, 'Dfdfd', 'FDFD@GMAIL.COM', '777.777.777-77', '30e535568de1f9231e7d9df0f4a5a44d', '77777777', '31/01/2020');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id_arq`),
  ADD KEY `fk_id_prod` (`fk_id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id_arq` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
