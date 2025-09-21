-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/09/2025 às 16:52
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
(3, 'gerente3', '$2y$10$boxfPvxclZee9DNR9L3js.8WmAwXhqA0UXOzY6B7xLOeSTIJ9oGBa', 'gerentetres', 'gerente.tres@gmail.com', 'gerente'),
(4, 'repositor1', '$2y$10$31ncgb7HtYCG.jyCxvs9Wem2xnVkP7.AhhwVztH8M2EIzR2c.l23G', 'Repositor Um', 'repositorum@empresa.com', 'repositor'),
(5, 'gerente1', '$2y$10$Te4IhAgtlU/KkblWPR1VGOvg2vZMclBRuSI16CqI.0QmmO4s7vPiy', 'Gerente 1', 'gerente1@gmail.com', 'gerente'),
(6, 'funcionario1', '$2y$10$2XIzQ9Vwe1jQqGXFCvx.i.TrYneie1fQhssxMvlJYBxOXm0/0Vw8W', 'Funcionario 1', 'funcionario1@gmail.com', 'funcionario'),
(7, 'repositor2', '$2y$10$UZ6G9OwqzLICb9JEjoFove2/pnSTkiSLhMc3lY.DtyLKw5KyaKoCS', 'Repositor 2', 'repositor2@gmail.com', 'repositor'),
(8, 'gerente2', '$2y$10$TOPsrXMD5kJ3UmKKVJgFcOlZysmYz0sXY0ws99JCU47mW0iJyxTAW', 'Gerente 2', 'gerente2@gmail.com', 'gerente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProd` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `fotos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`idProd`, `nome`, `categoria`, `preco`, `quantidade`, `fotos`) VALUES
(1, 'Brioche', 'Pães Doces', 10.00, 22, 'imagens/brioche.jpg'),
(43, 'Donuts', 'Doces', 5.00, 10, 'imagens/68b18ebe8abeb.jpg'),
(44, 'Pão Francês', 'Pães', 0.80, 500, 'imagens/68d004f4e6bc6.jpg'),
(45, 'Pão de Forma Integral', 'Pães', 9.90, 40, 'imagens/68d007222c3dd.jpg'),
(46, 'Pão de Batata com Recheio de Catupiry', 'Pães', 5.50, 60, 'imagens/68d00749c441a.jpg'),
(47, 'Baguete Tradicional', 'Pães', 7.00, 35, 'imagens/68d0076373c68.jpg'),
(48, 'Pão Doce com Coco', 'Pães Doces', 3.50, 70, 'imagens/68d0077f845a6.jpg'),
(49, 'Bolo de Chocolate (fatia)', 'Bolos', 6.00, 80, 'imagens/68d007cad296a.jpg'),
(50, 'Bolo de Fubá (inteiro)', 'Bolos', 25.00, 15, 'imagens/68d007ecdf3f3.jpg'),
(51, 'Torta de Limão (fatia)', 'Sobremesa', 25.00, 15, 'imagens/68d0080f28bfd.jpg'),
(52, 'Sonho com Creme', 'Doces', 4.50, 100, 'imagens/68d0083c37153.jpg'),
(53, 'Churros de Doce de Leite', 'Doces', 3.00, 120, 'imagens/68d0085380db3.jpg'),
(54, 'Coxinha de Frango', 'Salgados', 4.00, 150, 'imagens/68d0089044d49.jpg'),
(55, 'Pastel de Queijo', 'Salgados', 5.00, 90, 'imagens/68d0096098220.png'),
(56, 'Empadinha de Frango', 'Salgados', 4.50, 70, 'imagens/68d009927d6ae.jpg'),
(57, 'Esfiha de Carne', 'Salgados', 5.50, 110, 'imagens/68d009aa525ae.jpg'),
(58, 'Quiche de Alho-Poró Mini', 'Salgados', 6.00, 30, 'imagens/68d009ddde73c.jpg'),
(59, 'Café Expresso (pequeno)', 'Bebidas', 4.00, 200, 'imagens/68d009fbd39b2.jpeg'),
(60, 'Café com Leite (médio)', 'Bebidas', 5.50, 150, 'imagens/68d00a1b30216.jpg'),
(61, 'Suco Natural de Laranja (300ml)', 'Bebidas', 6.60, 80, 'imagens/68d00a4242891.jpeg'),
(62, 'Capuccino (médio)', 'Bebidas', 7.50, 60, 'imagens/68d00a5e5da27.jpg'),
(63, 'Chá Gelado de Pêssego (500ml)', 'Bebidas', 5.50, 40, 'imagens/68d00a7d14c66.jpg'),
(64, 'Croissant de Queijo', 'Salgados', 8.00, 30, 'imagens/68d01092b813d.jpg');

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
  MODIFY `idFunc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
