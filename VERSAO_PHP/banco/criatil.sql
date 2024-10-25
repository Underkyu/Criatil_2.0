-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/10/2024 às 20:31
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
-- Banco de dados: `criatil`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `Codigo_Ava` int(11) NOT NULL,
  `Codigo_Brinq` int(11) NOT NULL,
  `Codigo_Usu` int(11) NOT NULL,
  `Nota_Ava` double NOT NULL,
  `Comentario` varchar(150) NOT NULL,
  `Titulo_Ava` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `brinquedo`
--

CREATE TABLE `brinquedo` (
  `Codigo_Brinq` int(11) NOT NULL,
  `Codigo_Selo` int(11) NOT NULL,
  `Codigo_Categoria` int(11) NOT NULL,
  `Nome_Brinq` varchar(100) NOT NULL,
  `Preco_Brinq` double NOT NULL,
  `Nota` double NOT NULL,
  `Fabricante` varchar(100) NOT NULL,
  `Descricao` varchar(250) NOT NULL,
  `Faixa_Etaria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `brinquedo`
--

INSERT INTO `brinquedo` (`Codigo_Brinq`, `Codigo_Selo`, `Codigo_Categoria`, `Nome_Brinq`, `Preco_Brinq`, `Nota`, `Fabricante`, `Descricao`, `Faixa_Etaria`) VALUES
(1, 1, 1, 'Hatsune Miku Funko Pop', 89.99, 4.5, 'FunkoMake', 'Uma boneca hatsunemiku de funko pop para todas suas necessidades vocaloidescas', '13+');

-- --------------------------------------------------------

--
-- Estrutura para tabela `brinqvendido`
--

CREATE TABLE `brinqvendido` (
  `Codigo_BrinqVendido` int(11) NOT NULL,
  `Codigo_Pedido` int(11) NOT NULL,
  `Codigo_Brinq` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `Codigo_Brinq` int(11) NOT NULL,
  `Codigo_Usu` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `Codigo_Categoria` int(11) NOT NULL,
  `Nome_Categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`Codigo_Categoria`, `Nome_Categoria`) VALUES
(1, 'Funko Pops');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cupom`
--

CREATE TABLE `cupom` (
  `Codigo_Cupom` int(11) NOT NULL,
  `Nome_Cupom` varchar(50) NOT NULL,
  `Status_Cupom` tinyint(1) NOT NULL,
  `Porcentagem_Cupom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem`
--

CREATE TABLE `imagem` (
  `Codigo_Imagem` int(11) NOT NULL,
  `Codigo_Brinq` int(11) NOT NULL,
  `Imagem` varchar(300) NOT NULL,
  `Num_Imagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `listadefavoritos`
--

CREATE TABLE `listadefavoritos` (
  `Codigo_Brinq` int(11) NOT NULL,
  `Codigo_Usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `Codigo_Pedido` int(11) NOT NULL,
  `Codigo_Brinq` int(11) NOT NULL,
  `Codigo_Usu` int(11) NOT NULL,
  `Codigo_Cupom` int(11) NOT NULL,
  `Preco_Total` double NOT NULL,
  `Data` date NOT NULL,
  `Status_Pedido` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `selo`
--

CREATE TABLE `selo` (
  `Codigo_Selo` int(11) NOT NULL,
  `Nome_Selo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `selo`
--

INSERT INTO `selo` (`Codigo_Selo`, `Nome_Selo`) VALUES
(1, 'Deficiente Auditivo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `Codigo_Usu` int(11) NOT NULL,
  `Nome_Usu` varchar(50) NOT NULL,
  `Nasc_Usu` date NOT NULL,
  `Celular_Usu` varchar(15) NOT NULL,
  `Email_Usu` varchar(100) NOT NULL,
  `Senha_Usu` varchar(200) NOT NULL,
  `Tipo_Usu` varchar(20) NOT NULL,
  `Token` varchar(200) NOT NULL,
  `Imagem` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`Codigo_Usu`, `Nome_Usu`, `Nasc_Usu`, `Celular_Usu`, `Email_Usu`, `Senha_Usu`, `Tipo_Usu`, `Token`, `Imagem`) VALUES
(1, 'Kasane Teto', '1999-04-01', '(11) 99922-5555', 'kasaneteto@gmail.com', 'kasan3teto', 'Cliente', 'qwfihn3uirtfhui23hnrtuin23h', 'imagem'),
(2, 'Gumi', '2009-06-26', '(21)99887-4455', 'copycat63@gmail.com', '$2y$10$bev5ui1wsva.IugUq7rb1.o5X8Bwu0FgFc1RjJMZdoC', 'Cliente', 'cc92acdfd56a896bfe5bd20c4e8a2e5bbe240da55be7cc37b3', NULL),
(3, 'Miku', '2006-05-11', '(11)99887-4455', 'miku@gmail.com', '$2y$10$fj8n3.zOViPo2V7FuEmZGOym0yiDhT7tv/fqbzKg4OB', 'Cliente', '02bb0832f957471461b332c5c218ecb8e54f9e5392ff6cecb7', NULL),
(4, 'Luka', '2007-06-05', '(41)99887-4455', 'nigthfever@gmail.com', '$2y$10$/MKOy7mjw6FAbA7XzEkIWe5f83cmWJ5yU/tuRiovXol', 'Cliente', '79b7c27ce90523962baa582bd05c5b692205f98740eded6c60', NULL),
(8, 'Cellbit', '2005-03-17', '(01)99887-4455', 'vivoturbo@gmail.com', '$2y$10$VPqtwv5399RUqPms8yAKqOVbXHYsEOPYiGCmuBqGObC', 'Cliente', 'bfaaa27ef58e6761496ce7406e16ab91ec9c57a04887e63a4d', NULL),
(9, 'Carlos', '2024-02-20', '(21)99887-4455', 'carlos@gmail.com', '$2y$10$56qLjFbh9cHZalaZCygCse4Q5BcYrj5phlLrrm4tHfz', 'Cliente', '88f0b0431984e734a0748fbdeff1364832ad7e9d243b08e994', NULL),
(10, 'soaidfgjoiwej', '2024-10-17', '1234124', 'wefgwef@gwegweg', '$2y$10$2nS1nSLwrZoEt1TK2/yj1u3D2Ce1oy2C732zZK.46aQ', 'Cliente', 'd0dff154ba23e2551c041e29e84b9bef03a011ceccbf3e4710', NULL),
(11, '12r2r', '0000-00-00', '2323234234234', 'dsfwef@wsfgwef', '$2y$10$865Clwr4R883usK/ITKE7uoO0cnwnbXb1Ga5BZzhrQs', 'Cliente', '818b627b27e5ad4b5d7c580d227cbfc3908be107f21e8ac53e', NULL),
(12, 'Gio', '2003-05-21', '12412423', 'copycat65@gmail.com', '$2y$10$.2RwYXeTwq/mweI/hUtM/eQBkcJzOYnrtSn6eSZNry7', 'Cliente', '55a496f179313c98251f7e7b6e73ea2653800be94cfc2592ab', NULL),
(13, 'Kyu', '2001-05-09', '(21)99887-4455', 'qwe@qwed', '$2y$10$Cou0tpW/MRtd98iuex0VcOwWIMZty9XxEBFmHM6.16s', 'Cliente', '59fe028e76d75dfc4001093ff471afc9232177f57e4d6d8ce4', NULL),
(14, 'qweqwe', '2001-05-09', '(21)99887-4455', 'qwe@qwedqwrfqw', '$2y$10$HOwvmBk9ElHlTrAsbG7JCuPUwgWN8Kd/sML31aZXm7r', 'Cliente', 'e447f68d98bfef6e225ea7f45779f0f07a018745961ffa166d', NULL),
(15, 'Gio', '2003-05-21', '12412423', 'copycat66@gmail.com', '$2y$10$aJ59wF6iS7.FOSxgvjhFBOBSGHN72816pKcnwhfOR4g', 'Cliente', '9241cd2c775c085fc19b711740cca510f71f611c9f5cd932e2', NULL),
(16, '12qweq43t', '2024-10-02', '255734625235', '234tg43tg34tg34t@t3rtwwert', '$2y$10$JGqpg9nxcgs9EP/y8sflIuRG9gxFW6q.q.8OPFM4.vc', 'Cliente', '1093ae763e608231bf8b29c5f884d03ee8d91aca35158c3b40', NULL),
(17, '12qweq', '2024-10-02', '12412423', 'qwe@qwedqwrqw', '$2y$10$Hfg8Pxv61QQH9t3EG5c1GugYRETtI7WbYxK248//m.7', 'Cliente', '3a4b4c39d357ab6ac47c2ce29e8af67f15019125ee3f83fd10', NULL),
(18, 'qwe', '2024-10-05', '12241241234', 'qwe@qwedwefgewfg', '$2y$10$PwFWJ/JyEldsm9l47h47Puui36wPCx0ZKnXXe/VYRFu', 'Cliente', 'a362da4e0ae427f0d090afbbf8fd7998641c095886727cb885', NULL),
(19, 'asfsafasf', '2006-02-21', '12412423', 'qwe@qwedqw', '$2y$10$LNgUJ7Hn02Q5hA9AQSir0OJDukQTxCt.EY/i29Y2rzL', 'Cliente', '4f55d7bf9687bdf943b4a0e640ca906444fd633443e0fc1a07', NULL),
(20, 'EuOdeioProgramdores', '2004-03-21', '(21)99887-44552', 'qwe@qweddfdfdffddf', '$2y$10$JhjTklkF6GkdduMxacdNFerCAEj9km1S1ewCpsQPLLMkzr9hzSOKm', 'Cliente', '2e3aa260346b267331d18513f36765544e000bdc15ce85fa673adf76d79f2a6c0b1fa2e6561d22f2afc5b79694eb454d7011', NULL),
(21, 'Doug', '2006-10-13', '12412423', 'wertwet@wetwet', '$2y$10$rSh6hy.EF/BucAY8J1clz.aA3qAlqjRFAUItXzsGvCiN9kfDB.Hei', 'Cliente', '4271e0c7aff809ae9707608df1175daba92e5b16614360bfa86c0a69d8feab1d2179e88cf5abc20757c89d4c251887264b4d', NULL),
(22, 'wetwe', '2024-10-01', '(21)99887-4455', 'qwrqw@WERGWER', '$2y$10$9e.k4KLbVDCjPdMrkcAXzutOSMhAFAQtIj.ov1R0CewFaDKdAUlhO', 'Cliente', '8c6778c8e7fcafe265934e00e0218a4e8a01e7e3dcce1e728e7c5fbc1ec349abdbcc91af3c2765d4e1d569a722ad51fe45c5', NULL),
(23, 'sdgsdg', '2024-10-04', '(21)99887-4455', 'wfgwegf@wegewg', '$2y$10$FGSiEwKgJ7HNOYKDojk58e7Mmbnust8ouMSEvy/Zf9/R5d3ya9KhW', 'Cliente', '9db7e36beab17a428ebcaf903971e0ec0527583e6ab10eed79fc6d212c68b2b3b41ec86c68fbf44ffa3f306759d72faed586', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`Codigo_Ava`),
  ADD KEY `Codigo_Brinq_Ava` (`Codigo_Brinq`),
  ADD KEY `Codigo_Usu_Ava` (`Codigo_Usu`);

--
-- Índices de tabela `brinquedo`
--
ALTER TABLE `brinquedo`
  ADD PRIMARY KEY (`Codigo_Brinq`),
  ADD KEY `Codigo_Selo_Brinq` (`Codigo_Selo`),
  ADD KEY `Codigo_Categoria_Brinq` (`Codigo_Categoria`);

--
-- Índices de tabela `brinqvendido`
--
ALTER TABLE `brinqvendido`
  ADD PRIMARY KEY (`Codigo_BrinqVendido`),
  ADD KEY `Codigo_Pedido_BrinqVendido` (`Codigo_Pedido`),
  ADD KEY `Codigo_Brinq_BrinqVendido` (`Codigo_Brinq`);

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD KEY `Codigo_Brinq_Carrinho` (`Codigo_Brinq`),
  ADD KEY `Codigo_Usu_Carrinho` (`Codigo_Usu`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Codigo_Categoria`);

--
-- Índices de tabela `cupom`
--
ALTER TABLE `cupom`
  ADD PRIMARY KEY (`Codigo_Cupom`);

--
-- Índices de tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`Codigo_Imagem`),
  ADD KEY `Codigo_Brinq_Imagem` (`Codigo_Brinq`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Codigo_Pedido`),
  ADD KEY `Codigo_Brinq_Pedido` (`Codigo_Brinq`),
  ADD KEY `Codigo_Usu_Pedido` (`Codigo_Usu`),
  ADD KEY `Codigo_Cupom_Pedido` (`Codigo_Cupom`);

--
-- Índices de tabela `selo`
--
ALTER TABLE `selo`
  ADD PRIMARY KEY (`Codigo_Selo`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Codigo_Usu`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `Codigo_Ava` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `brinquedo`
--
ALTER TABLE `brinquedo`
  MODIFY `Codigo_Brinq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `brinqvendido`
--
ALTER TABLE `brinqvendido`
  MODIFY `Codigo_BrinqVendido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Codigo_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cupom`
--
ALTER TABLE `cupom`
  MODIFY `Codigo_Cupom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `Codigo_Imagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Codigo_Pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `selo`
--
ALTER TABLE `selo`
  MODIFY `Codigo_Selo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Codigo_Usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `Codigo_Brinq_Ava` FOREIGN KEY (`Codigo_Brinq`) REFERENCES `brinquedo` (`Codigo_Brinq`),
  ADD CONSTRAINT `Codigo_Usu_Ava` FOREIGN KEY (`Codigo_Usu`) REFERENCES `usuario` (`Codigo_Usu`);

--
-- Restrições para tabelas `brinquedo`
--
ALTER TABLE `brinquedo`
  ADD CONSTRAINT `Codigo_Categoria_Brinq` FOREIGN KEY (`Codigo_Categoria`) REFERENCES `categoria` (`Codigo_Categoria`),
  ADD CONSTRAINT `Codigo_Selo_Brinq` FOREIGN KEY (`Codigo_Selo`) REFERENCES `selo` (`Codigo_Selo`);

--
-- Restrições para tabelas `brinqvendido`
--
ALTER TABLE `brinqvendido`
  ADD CONSTRAINT `Codigo_Brinq_BrinqVendido` FOREIGN KEY (`Codigo_Brinq`) REFERENCES `brinquedo` (`Codigo_Brinq`),
  ADD CONSTRAINT `Codigo_Pedido_BrinqVendido` FOREIGN KEY (`Codigo_Pedido`) REFERENCES `pedido` (`Codigo_Pedido`);

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `Codigo_Brinq_Carrinho` FOREIGN KEY (`Codigo_Brinq`) REFERENCES `brinquedo` (`Codigo_Brinq`),
  ADD CONSTRAINT `Codigo_Usu_Carrinho` FOREIGN KEY (`Codigo_Usu`) REFERENCES `usuario` (`Codigo_Usu`);

--
-- Restrições para tabelas `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `Codigo_Brinq_Imagem` FOREIGN KEY (`Codigo_Brinq`) REFERENCES `brinquedo` (`Codigo_Brinq`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `Codigo_Brinq_Pedido` FOREIGN KEY (`Codigo_Brinq`) REFERENCES `brinquedo` (`Codigo_Brinq`),
  ADD CONSTRAINT `Codigo_Cupom_Pedido` FOREIGN KEY (`Codigo_Cupom`) REFERENCES `cupom` (`Codigo_Cupom`),
  ADD CONSTRAINT `Codigo_Usu_Pedido` FOREIGN KEY (`Codigo_Usu`) REFERENCES `usuario` (`Codigo_Usu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
