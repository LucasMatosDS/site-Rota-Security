-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 21-Jun-2020 às 22:42
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
  `arquivo` blob NOT NULL,
  `descricao` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `cpf`, `senha`, `senha_decript`, `arquivo`, `descricao`, `data`) VALUES
(1, 'administrador', 'rotasecurity@gmail.com', '000.000.000-00', 'dd4b21e9ef71e1291183a46b913ae6f2', '00000000', 0x2d, '-', '-'),
(2, 'tecnico', 'tecnico@gmail.com', '111.111.111-11', '1bbd886460827015e5d605ed44252251', '11111111', 0x2d, '-', '-'),
(3, 'JOSE', 'JOSE@GMAIL.COM', '222.222.222-22', '659139961dfa52223b3590a213f62c67', '22222222', 0x646f63642e646f63, 'fdfd', '22/05/2020'),
(5, 'ANA', 'ANA@HOTMAIL.COM', '444.444.444-44', 'b857eed5c9405c1f2b98048aae506792', '44444444', 0x63757272c3ad63756c6f2e706466, 'gffgg', '22/05/2020'),
(7, 'LUCAS', 'LUCAS@GMAIL.COM', '666.666.666-66', '7c497868c9e6d3e4cf2e87396372cd3b', '66666666', 0x6c756361732e706466, 'thghgh', '24/05/2020'),
(8, 'JOANA', 'JOANA@HOTMAIL.COM', '777.777.777-77', '30e535568de1f9231e7d9df0f4a5a44d', '77777777', 0x6475722e646f6378, 'kjkjkjk', '24/05/2020');

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
(1, 0x63696e6e616d6f6e2d77616c6c70617065722e706e67),
(3, 0x6435666336363266663431636466666231323334393364663334313066656638);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

CREATE TABLE `postagens` (
  `id_postagem` bigint(20) NOT NULL,
  `titulo_postagem` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `conteudo` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `postagens`
--

INSERT INTO `postagens` (`id_postagem`, `titulo_postagem`, `conteudo`) VALUES
(4, 'fdfdfd', 'rgrrgrgrgrg'),
(5, 'kjkjk', 'jkjkhkhjkj'),
(6, 'Apple', 'Apple Inc. (NASDAQ: AAPL; NYSE: AAPL; anteriormente Apple Computer, Inc.) Ã© uma empresa multinacional norte-americana que tem o objetivo de projetar e comercializar produtos eletrÃ´nicos de consumo, software de computador e computadores pessoais. Os produtos de hardware mais conhecidos da empresa incluem a linha de computadores Macintosh, iPod, iPhone, iPad, Apple TV e o Apple Watch. Os softwares incluem o sistema operacional macOS, o navegador de mÃ­dia iTunes, suÃ­te de software multimÃ­dia e criatividade iLife, suÃ­te de software de produtividade iWork, Aperture, um pacote de fotografia profissional, Final Cut Studio, uma suÃ­te de vÃ­deo profissional, produtos de software, LÃ³gica Studio, um conjunto de ferramentas de produÃ§Ã£o musical, navegador Safari e o iOS, um sistema operacional mÃ³vel. ');

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
-- Índices para tabela `postagens`
--
ALTER TABLE `postagens`
  ADD PRIMARY KEY (`id_postagem`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `postagens`
--
ALTER TABLE `postagens`
  MODIFY `id_postagem` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
