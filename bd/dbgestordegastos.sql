-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18/09/2023 às 00:31
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbgestordegastos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbbanco`
--

CREATE TABLE `tbbanco` (
  `idBanco` int(11) NOT NULL,
  `nomebanco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbconfig`
--

CREATE TABLE `tbconfig` (
  `idConfig` int(11) NOT NULL,
  `moedaConfig` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbconfig`
--

INSERT INTO `tbconfig` (`idConfig`, `moedaConfig`) VALUES
(1, '€');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdespesa`
--

CREATE TABLE `tbdespesa` (
  `idDespesa` int(11) NOT NULL,
  `valorTotalDespesa` double DEFAULT NULL,
  `dataDespesa` varchar(10) NOT NULL,
  `anoDespesa` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbdespesa`
--

INSERT INTO `tbdespesa` (`idDespesa`, `valorTotalDespesa`, `dataDespesa`, `anoDespesa`) VALUES
(61, NULL, '2023-08', '2023'),
(62, NULL, '2023-09', '2023'),
(70, NULL, '2023-07', '2023'),
(71, NULL, '2023-06', '2023'),
(72, NULL, '2024-02', '2024'),
(73, NULL, '2025-07', '2025'),
(74, NULL, '2024-01', '2024'),
(75, NULL, '2024-05', '2024'),
(76, NULL, '2023-10', '2023');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdespesadescricao`
--

CREATE TABLE `tbdespesadescricao` (
  `idDespesaDescricao` int(11) NOT NULL,
  `nomeDespesaDescricao` varchar(200) NOT NULL,
  `valorDespesaDescricao` double NOT NULL,
  `dataPagamentoDespesaDescricao` varchar(10) NOT NULL,
  `tipoDespesaDescricao` varchar(200) NOT NULL,
  `titularDespesaDescricao` varchar(200) NOT NULL,
  `situacaoDespesaDescricao` varchar(200) NOT NULL,
  `idDespesaDescricaoIdDespesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbmetododepagamento`
--

CREATE TABLE `tbmetododepagamento` (
  `idMetodoDePagamento` int(11) NOT NULL,
  `nomeMetodoDePagamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbreceita`
--

CREATE TABLE `tbreceita` (
  `idReceita` int(11) NOT NULL,
  `titularReceita` varchar(200) NOT NULL,
  `valorReceita` double NOT NULL,
  `descricaoReceita` varchar(200) DEFAULT NULL,
  `categoriaReceita` varchar(200) NOT NULL,
  `dataReceita` varchar(10) NOT NULL,
  `situacaoReceita` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbreceitadescricao`
--

CREATE TABLE `tbreceitadescricao` (
  `idReceitaDescricao` int(11) NOT NULL,
  `nomeReceitaDescricao` varchar(200) NOT NULL,
  `valorReceitaDescricao` double NOT NULL,
  `dataReceitaDescricao` date NOT NULL,
  `situacaoReceitaDescricao` varchar(200) NOT NULL,
  `titularReceitaDescricao` varchar(200) NOT NULL,
  `tipoReceitaDescricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbsituacaodespesa`
--

CREATE TABLE `tbsituacaodespesa` (
  `idSituacaoDespesa` int(11) NOT NULL,
  `nomeSituacaoDespesa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbsituacaoreceita`
--

CREATE TABLE `tbsituacaoreceita` (
  `idSituacaoReceita` int(11) NOT NULL,
  `nomeSituacaoReceita` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtipodespesa`
--

CREATE TABLE `tbtipodespesa` (
  `idTipoDespesa` int(11) NOT NULL,
  `nomeCategoriaDespesa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtiporeceita`
--

CREATE TABLE `tbtiporeceita` (
  `idTipoReceita` int(11) NOT NULL,
  `categoriaTipoReceita` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtitular`
--

CREATE TABLE `tbtitular` (
  `idTitular` int(11) NOT NULL,
  `nomeTitular` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbuser`
--

CREATE TABLE `tbuser` (
  `idUser` int(11) NOT NULL,
  `nomeUser` varchar(200) NOT NULL,
  `loginUser` varchar(200) NOT NULL,
  `passwordUser` varchar(64) NOT NULL,
  `tipoUser` int(11) NOT NULL DEFAULT 0,
  `fotoUser` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbuser`
--

INSERT INTO `tbuser` (`idUser`, `nomeUser`, `loginUser`, `passwordUser`, `tipoUser`, `fotoUser`) VALUES
(1, 'admin', 'admin', 'admin', 1, 'app/admin/user/assets/img/semfoto.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbbanco`
--
ALTER TABLE `tbbanco`
  ADD PRIMARY KEY (`idBanco`);

--
-- Índices de tabela `tbconfig`
--
ALTER TABLE `tbconfig`
  ADD PRIMARY KEY (`idConfig`);

--
-- Índices de tabela `tbdespesa`
--
ALTER TABLE `tbdespesa`
  ADD PRIMARY KEY (`idDespesa`);

--
-- Índices de tabela `tbdespesadescricao`
--
ALTER TABLE `tbdespesadescricao`
  ADD PRIMARY KEY (`idDespesaDescricao`),
  ADD KEY `idDespesaDescricaoIdDespesa` (`idDespesaDescricaoIdDespesa`);

--
-- Índices de tabela `tbmetododepagamento`
--
ALTER TABLE `tbmetododepagamento`
  ADD PRIMARY KEY (`idMetodoDePagamento`);

--
-- Índices de tabela `tbreceita`
--
ALTER TABLE `tbreceita`
  ADD PRIMARY KEY (`idReceita`);

--
-- Índices de tabela `tbreceitadescricao`
--
ALTER TABLE `tbreceitadescricao`
  ADD PRIMARY KEY (`idReceitaDescricao`);

--
-- Índices de tabela `tbsituacaodespesa`
--
ALTER TABLE `tbsituacaodespesa`
  ADD PRIMARY KEY (`idSituacaoDespesa`);

--
-- Índices de tabela `tbsituacaoreceita`
--
ALTER TABLE `tbsituacaoreceita`
  ADD PRIMARY KEY (`idSituacaoReceita`);

--
-- Índices de tabela `tbtipodespesa`
--
ALTER TABLE `tbtipodespesa`
  ADD PRIMARY KEY (`idTipoDespesa`);

--
-- Índices de tabela `tbtiporeceita`
--
ALTER TABLE `tbtiporeceita`
  ADD PRIMARY KEY (`idTipoReceita`);

--
-- Índices de tabela `tbtitular`
--
ALTER TABLE `tbtitular`
  ADD PRIMARY KEY (`idTitular`);

--
-- Índices de tabela `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbbanco`
--
ALTER TABLE `tbbanco`
  MODIFY `idBanco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbconfig`
--
ALTER TABLE `tbconfig`
  MODIFY `idConfig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbdespesa`
--
ALTER TABLE `tbdespesa`
  MODIFY `idDespesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `tbdespesadescricao`
--
ALTER TABLE `tbdespesadescricao`
  MODIFY `idDespesaDescricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de tabela `tbmetododepagamento`
--
ALTER TABLE `tbmetododepagamento`
  MODIFY `idMetodoDePagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbreceita`
--
ALTER TABLE `tbreceita`
  MODIFY `idReceita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbreceitadescricao`
--
ALTER TABLE `tbreceitadescricao`
  MODIFY `idReceitaDescricao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbsituacaodespesa`
--
ALTER TABLE `tbsituacaodespesa`
  MODIFY `idSituacaoDespesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tbsituacaoreceita`
--
ALTER TABLE `tbsituacaoreceita`
  MODIFY `idSituacaoReceita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT de tabela `tbtipodespesa`
--
ALTER TABLE `tbtipodespesa`
  MODIFY `idTipoDespesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tbtiporeceita`
--
ALTER TABLE `tbtiporeceita`
  MODIFY `idTipoReceita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tbtitular`
--
ALTER TABLE `tbtitular`
  MODIFY `idTitular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbdespesadescricao`
--
ALTER TABLE `tbdespesadescricao`
  ADD CONSTRAINT `tbdespesadescricao_ibfk_1` FOREIGN KEY (`idDespesaDescricaoIdDespesa`) REFERENCES `tbdespesa` (`idDespesa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
