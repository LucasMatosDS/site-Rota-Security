-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05-Jan-2020 às 03:17
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
  `data` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `cpf`, `senha`, `senha_decript`, `data`) VALUES
(1, 'Administrador', 'ADM@ADM.COM', '000.000.000-00', 'dd4b21e9ef71e1291183a46b913ae6f2', '00000000', ''),
(2, 'Tecnico', 'TECNICO@TI.COM', '111.111.111-11', '1bbd886460827015e5d605ed44252251', '11111111', ''),
(3, 'Jose', 'JOSE@GMAIL.COM', '222.222.222-22', 'bae5e3208a3c700e3db642b6631e95b9', '22222222', '04/01/2020'),
(4, 'Matilda', 'MATILDA@GMAIL.COM', '333.333.333-33', 'd27d320c27c3033b7883347d8beca317', '33333333', '04/01/2020'),
(5, 'Lucas', 'LUCAS@GMAIL.COM', '444.444.444-44', 'b857eed5c9405c1f2b98048aae506792', '44444444', '04/01/2020'),
(6, 'Julio', 'JULIO@GMAIL.COM', '888.888.888-88', '8ddcff3a80f4189ca1c9d4d902c3c909', '88888888', '04/01/2020');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
