-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Jun-2020 às 06:49
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clientes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `cnpj` tinyint(1) NOT NULL,
  `endereco` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cnpj`, `endereco`) VALUES
(1, 1, 'Rua xxx'),
(2, 0, 'Rua aaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cnpj`
--

CREATE TABLE `cnpj` (
  `clientes_p_juridica` int(11) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `nome_fantasia` varchar(45) DEFAULT NULL,
  `inscricao_estadual` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cnpj`
--

INSERT INTO `cnpj` (`clientes_p_juridica`, `cnpj`, `nome_fantasia`, `inscricao_estadual`) VALUES
(1, '12345678', 'Empresa1', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoafisica`
--

CREATE TABLE `pessoafisica` (
  `clientes_p_fisica` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `data_nascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoafisica`
--

INSERT INTO `pessoafisica` (`clientes_p_fisica`, `cpf`, `nome`, `data_nascimento`) VALUES
(2, '31233423424', 'Fulano', '2020-04-01');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `cnpj`
--
ALTER TABLE `cnpj`
  ADD KEY `fk_cnpj_clientes_idx` (`clientes_p_juridica`);

--
-- Índices para tabela `pessoafisica`
--
ALTER TABLE `pessoafisica`
  ADD KEY `fk_cpf_clientes1_idx` (`clientes_p_fisica`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cnpj`
--
ALTER TABLE `cnpj`
  ADD CONSTRAINT `fk_cnpj_clientes` FOREIGN KEY (`clientes_p_juridica`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoafisica`
--
ALTER TABLE `pessoafisica`
  ADD CONSTRAINT `fk_cpf_clientes1` FOREIGN KEY (`clientes_p_fisica`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
