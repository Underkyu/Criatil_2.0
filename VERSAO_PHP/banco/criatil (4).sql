-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/11/2024 às 05:06
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

--
-- Despejando dados para a tabela `avaliacao`
--

INSERT INTO `avaliacao` (`Codigo_Ava`, `Codigo_Brinq`, `Codigo_Usu`, `Nota_Ava`, `Comentario`, `Titulo_Ava`) VALUES
(1, 1, 1, 4.5, 'Eu amei a hatsune miku e ainda amo minha voidalosca favorita', 'Miku hatsune omg'),
(2, 2, 2, 2.5, 'god FUCKING Dammit Kris where the FUCK are we?!', 'funkopop mt car'),
(3, 3, 3, 5, 'Bola de futebol é minha paixao interna', 'Eu amo joga bola'),
(4, 4, 4, 2, 'Comprei pro meu filho e ele atirou no meu olho. Resultado: UTI. rs.', 'Perigosa');

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
(1, 1, 1, 'Hatsune Miku Funko Pop', 89.99, 4.5, 'FunkoMake', 'Uma boneca hatsunemiku de funko pop para todas suas necessidades vocaloidescas', '13+'),
(2, 1, 1, 'Ralsei FunkoPop', 65.99, 4, 'FunkoCreate', 'Pelúcia do Ralsei from DeltaRune ele não', '7+'),
(3, 1, 1, 'Bola de fut', 39.99, 3, 'FootSolutions', 'Uma bola de futebol para futebol', '0'),
(4, 1, 1, 'Bola de fut', 39.99, 3, 'FootSolutions', 'Uma bola de futebol para futebol', '0'),
(5, 1, 1, 'Bola de fut', 39.99, 3, 'FootSolutions', 'Uma bola de futebol para futebol', '0'),
(6, 1, 1, 'Bola de fut', 39.99, 3, 'FootSolutions', 'Uma bola de futebol para futebol', '0');

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

--
-- Despejando dados para a tabela `imagem`
--

INSERT INTO `imagem` (`Codigo_Imagem`, `Codigo_Brinq`, `Imagem`, `Num_Imagem`) VALUES
(1, 1, '../imagens/Produtos/Miku/Imagem1.png', 1),
(2, 1, '../imagens/Produtos/Miku/imagem2.png', 2),
(3, 1, '../imagens/Produtos/Miku/imagem3.png', 3),
(4, 2, '../imagens/Produtos/Ralsei/ralseideltarune.png', 1),
(5, 3, '../imagens/Produtos/Bola/imagem1.png', 1),
(6, 4, '../imagens/Produtos/Bola/imagem1.png', 1),
(7, 5, '../imagens/Produtos/Bola/imagem1.png', 1),
(8, 6, '../imagens/Produtos/Bola/imagem1.png', 1);

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
  `Forma_Pagamento` varchar(20) NOT NULL,
  `Data` date NOT NULL,
  `Status_Pedido` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sac`
--

CREATE TABLE `sac` (
  `Codigo_sac` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensagem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sac`
--

INSERT INTO `sac` (`Codigo_sac`, `nome`, `email`, `mensagem`) VALUES
(1, 'Eu', 'pessoa@gmail.com', 'Ola tudo bem meu nome é ben10 ben10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `selo`
--

CREATE TABLE `selo` (
  `Codigo_Selo` int(11) NOT NULL,
  `Nome_Selo` varchar(50) NOT NULL,
  `Imagem_Selo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `selo`
--

INSERT INTO `selo` (`Codigo_Selo`, `Nome_Selo`, `Imagem_Selo`) VALUES
(1, 'Deficiente Auditivo', 0);

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
(1, 'Kasane Teto', '1234-12-12', '(11) 97188-9901', 'kasakasa@gmail.com', '$2y$10$3Eqq3Fdh6/ZSCd0X115Mk.9KGjjF4PETQYuaVRSHKoHVWE28PRyB2', 'Cliente', 'bf4cf72c57fb5db1023538b49fc0cb10250ed128ffbe0e9fd6812bffed441c51c50786601841a3e0cdf8eb9050c53c55d5e5', '../imagens/Conta/teto_perfil.jpg'),
(2, 'Susana Deta Runês', '1234-03-12', '(11) 97188-9903', 'guilhermebragas@hotmail.com', '$2y$10$1yoKbUehvpjOsieo3fFVye8qTwvvHKKT06QkVPaQTdq6zKsdZ63Ri', 'Cliente', '5535890485480cc6df129342de0bc34932553f86aa59b0f4a3c8c55e63b88ca419818433d40811fd797aa576af88d7414c82', '../imagens/Conta/susie.png'),
(3, 'eu pessoa da silva pereira castro', '1212-02-12', '(11) 97188-9901', 'jowjow2@hotmail.com', '$2y$10$VYLRc6zCy8XC8swKBucJq.sxAc3TOfSGRVQo2FB4Y3cwp.lCuIbyi', 'Cliente', '17fb64a6ff5be43fa21ad0c85dd072530abbb85a66450d58b2888382bef42c6cc63cdc12e50031054564997dc61c3653ffff', '../imagens/Conta/usuario.png'),
(4, 'Rosana Siqueira Silva', '1983-01-01', '(11) 97188-9903', 'rosanasiq@gmail.com', '$2y$10$AaYGQGG6dI2PbidewmxLM.Gqros8D1pvat7Y3.2dIjs/He4S6MWQy', 'Cliente', 'vazio', '../imagens/Conta/rosana.jpg'),
(25, 'Bruno', '1987-02-11', '(21)99887-4455', 'brunomars@gmail.com', '$2y$10$7wT6ISR3qO4Py4zTyX0Sxej8.mcbIJTKlP6H4ji7L4qGB1k1q6W3i', 'Cliente', '9a9c2ec5dda98ce7f878e13af091aed79144b0d71f6c5fcb98e76fbed5e51ddba964656918624a9723373a2ea30fbfc74cc1', NULL),
(26, 'Liana', '1999-11-11', '(11)99887-4455', 'risesthemoon@gmail.com', '$2y$10$PY0qglFbk1k4jHVmI.RBjup1nk5JEF9KQEqstjTJYmDSYMPqKZ79u', 'Cliente', '75687e1b01b8d826a45a1b22ec1f97e4a7ae26a721fad4e873a07a95215b2ff1d3d8fc737e862bd2561749070621202f7d1f', NULL),
(27, 'Teto', '2008-04-01', '(31)99887-4455', 'kasaneteto@gmail.com', '$2y$10$pR4jfpmAXBQVAUQwVaeFHet5YqIneBkkJoLxRdsSLGu/dCuvPUdQi', 'Cliente', '1a66d3b969a1fa1b5a82f6dbccdee2ac97b2ab64dddd4fd5964226282d6c1dcbc67b8feb66b05e4f5eb281caeec5ce6377f8', NULL),
(29, 'Hatsune Miku', '2005-11-11', '(81)99887-4455', 'mikumedesuasforcas@gmail.com', '$2y$10$9KBnFi0CYlmfRxBrP3geje/JK7/le4EX//6ogp/ZBPSnVkjE1/boS', 'Atualizar', 'vazio', 'vazio'),
(30, 'Bah', '2000-11-11', '12412241214124', '123213124@341324124', '$2y$10$0TJBRtCUoYMmfDoxPET2tuZnNA57UiSXk9pdC2pFjnCb1odE/Zdk.', 'Atualizar', 'vazio', 'vazio'),
(31, 'Gisele', '1999-09-09', '(21)99887-4455', 'eopeoeo@entrntr', '$2y$10$RRw9nJ.ucP.iB.aXZ4O9Ke3n7iUL0y0a2p42VZ5JmMpsP.SVXDnC2', 'Atualizar', 'def7467fa4b983c30737e05a2eac5c0230613881a7694695ce9d395176f70715a4a317dc0e75475dea8b9154eabc3822efea', 'c33ea36009bd947b52c4af7a04462acf9b6090d5c10c3fb988b0137a390fd4e9998305aaedc42b3b7f7b65a8555a023fcf8f4450db2031b64ef86f74'),
(32, 'Kaito', '2006-11-15', '(11)97787-4455', 'attakaito@gmail.com', '$2y$10$s9o8mnPyeFfU3ik2EAsbwegrXRUdiVBPODZdf16ihM1f8snz7I6BO', 'Atualizar', '916a22d400bc28f2f8f581c6e89e948903764b4ca0f10566bf274c61b171a841132848d9db07e2f16653ed8c7b81ddd9887b', '746f08cd313b8952caaf763fe94b68a1dfb176eb8ef8e4542d9fe5547da56d0787bfeee5461533cc7c4d8afff2f6d4f92a5add1cb19b86977456136d'),
(33, '23r23rf23', '1212-03-12', '123123123', 'qwe@qwed3rf32', '$2y$10$QD0xLdcIJoU6HKI4YA24W.3AAdhba/1tMzbCL7pt4dRqgyfXcMTP.', 'Cliente', 'aab704ba1ad11077a41e3c3e1d871b9024b7416ca16250142db73f5336b7ce62e782274294f8e098b15eb2ff75a1da6143b1', 'vazio'),
(34, 'Ralsei', '1999-11-11', '(71)99887-4455', 'ralsei@gmail.com', '$2y$10$1wdtPopQVQulpSOvBw2KweHvsLv2YeEHkA4XNxR/oz77zeUAcbt4u', 'Cliente', '9011f7c8b8b806b5b8961deddae4ba464408515a175ab2a7a22ac5cfe62e98d5501b2ae956a5ce9421b446800fa728eb7321', 'vazio'),
(35, 'Panda', '1988-10-31', '(21)99887-4455', 'panda@gmail.com', '$2y$10$HuS2elMkBiDpBcAJJkl/yOCcL7zeiNOm0Q9TKvTtgSe1deTQ0KSCq', 'Atualizar', 'd7539d03d711b09b6b6d9241743610b3392fed73803563d95decf0fca34a6d21cc0fb5eed5c5bb66a7d4875f75ecf4889636', '034db785026d42b0d4e13c5ab55444925b8a03a95009ac88d1ea2f0292df491d333525bee8343d0ec9109b685b45ac630eab2670a9a31919e907bcd0'),
(36, 'Brook', '1977-11-11', '(21)99887-4455', 'yohoho@gmail.com', '$2y$10$aDIM69XHKX.yWHcInZ8btuy5.Ox2GCx4ig2cIVZfeJSfauVJevTUi', 'Gerente', 'd822aed2d478c5d7dd061f0d43aa071b1477dabff79985abb6558ce559a0a046e728ad9e461318702d6ba8b76d00185649a2', 'vazio'),
(37, 'Kiryu', '2006-06-30', '(21)99887-4455', 'kiryu@gmail.com', '$2y$10$vCYV8PkQDgWxS0HzfpbjbeghmoBiCVlm2px3yHdwYfZ9eMWuKMl1K', 'Atualizar', '601cdd2de17b50e11b3b9e8b2ea0fe8cdcc7e0f371ff23528d37ca1106c0596e883eed8891332c8c10566edff158a632d5f2', 'e4f900d7481111949805223375618f4ecca82bb2dece05fb34473a34573fa632a88135e8179c42c53bb4f93b9e6221035a1b867ca26909e97c823764'),
(38, 'Eve', '1989-11-11', '(21)99887-4455', 'eve@gmail.com', '$2y$10$TnhP63zcPxGsszzlmpmHle9TgPnuqPfO1XrcMFrZuQ.QwPmc/ZCJW', 'Cliente', '1c77d77eb5c307802e2097b252cec6f916e803e2ce18a74119bfd7b7f1dfae018ead6643c56cb107ef3aa7869cfafe4d1648', 'vazio');

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
-- Índices de tabela `sac`
--
ALTER TABLE `sac`
  ADD PRIMARY KEY (`Codigo_sac`);

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
  MODIFY `Codigo_Ava` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `brinquedo`
--
ALTER TABLE `brinquedo`
  MODIFY `Codigo_Brinq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `Codigo_Imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Codigo_Pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sac`
--
ALTER TABLE `sac`
  MODIFY `Codigo_sac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `selo`
--
ALTER TABLE `selo`
  MODIFY `Codigo_Selo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Codigo_Usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
