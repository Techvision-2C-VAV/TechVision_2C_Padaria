-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/06/2025 às 23:04
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_funcionarios`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `idFunc` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(225) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `funcao` enum('gerente','funcionario','repositor','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`idFunc`, `usuario`, `senha`, `nome_completo`, `email`, `funcao`) VALUES
(1, 'gerente1', '$2y$10$qrDKhH7Is71Orwaszf/GOePzJ/PGjFSmsDWuIQR/YOHEMzABruCuu', 'Gerente Um', 'gerenteum@empresa.com', 'gerente'),
(2, 'funcionario1', '$2y$10$q7AbAHeElJlzm/FGhdiGQOW0vadNLFz5XcG5TuTvlf3Ff2co1qpPa', 'Funcionario Um', 'funcionarioum@empresa.com', 'funcionario'),
(4, 'repositor1', '$2y$10$31ncgb7HtYCG.jyCxvs9Wem2xnVkP7.AhhwVztH8M2EIzR2c.l23G', 'Repositor Um', 'repositorum@empresa.com', 'repositor');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProd` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`idProd`, `nome`, `categoria`, `preco`, `quantidade`) VALUES
(1, 'Brioche', 'Pães Doces', 10.00, 22),
(22, 'Pão Francês', 'Pães', 0.80, 200),
(23, 'Pão Integral', 'Pães', 1.20, 100),
(24, 'Bolo de Chocolate', 'Bolos', 25.00, 15),
(25, 'Bolo de Cenoura com Cobertura', 'Bolos', 22.50, 10),
(26, 'Brigadeiro', 'Doces', 1.50, 80),
(27, 'Beijinho', 'Doces', 1.50, 70),
(28, 'Coxinha de Frango', 'Salgados', 5.00, 60),
(29, 'Enroladinho de Salsicha', 'Salgados', 4.50, 50),
(30, 'Café com Leite', 'Bebidas', 4.00, 40),
(31, 'Suco Natural de Laranja', 'Bebidas', 6.00, 30),
(32, 'Torta de Frango', 'Tortas', 30.00, 5),
(33, 'Torta de Limão', 'Tortas', 28.00, 5),
(34, 'Biscoito de Polvilho', 'Biscoitos', 3.00, 100),
(35, 'Cookies com Gotas de Chocolate', 'Biscoitos', 3.50, 90),
(36, 'Sanduíche Natural de Frango', 'Sanduíches', 8.00, 20),
(37, 'Sanduíche com Queijo e Presunto', 'Sanduíches', 7.50, 20),
(38, 'Pão de Linhaça', 'Saudáveis', 2.00, 50),
(39, 'Bolo Integral de Banana', 'Saudáveis', 18.00, 10),
(40, 'Pão sem Glúten', 'Sem Glúten', 3.00, 30),
(41, 'Brownie sem Glúten', 'Sem Glúten', 4.50, 25);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`idFunc`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProd`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idFunc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
