-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Nov-2024 às 19:19
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

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
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `Codigo_Ava` int(11) NOT NULL,
  `Codigo_Brinq` int(11) NOT NULL,
  `Codigo_Usu` int(11) NOT NULL,
  `Nota_Ava` double NOT NULL,
  `Comentario` varchar(150) NOT NULL,
  `Titulo_Ava` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`Codigo_Ava`, `Codigo_Brinq`, `Codigo_Usu`, `Nota_Ava`, `Comentario`, `Titulo_Ava`) VALUES
(2, 1, 1, 5, 'Essa boneca deixou minha filha Kasane muito feliz', 'Ótima para crianças'),
(3, 2, 4, 4, 'Ralsei do DeltaRune, onde fui parar?', 'Kris'),
(4, 3, 3, 4.5, 'Jogar um fut com essa bola foi legal', 'Futebol daora'),
(5, 4, 2, 2, 'O cubo quebrou antes de eu conseguir resolver', 'Quebra fácil'),
(6, 5, 1, 5, 'Coleciono pokemons e esse eu achei muito bonito, nem parece plástico', 'Lindo boneco'),
(7, 6, 2, 5, 'Meu amigo aprendeu libras com isso', 'Útil'),
(8, 7, 3, 3.5, 'Machuca muito, bem perigoso, mas divertido', 'Forte e legal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `brinquedo`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `brinquedo`
--

INSERT INTO `brinquedo` (`Codigo_Brinq`, `Codigo_Selo`, `Codigo_Categoria`, `Nome_Brinq`, `Preco_Brinq`, `Nota`, `Fabricante`, `Descricao`, `Faixa_Etaria`) VALUES
(1, 1, 1, 'Hatsune Miku FunkoPop', 89.99, 4.5, 'FunkoMake', 'Uma boneca hatsunemiku de funko pop para todas suas necessidades vocaloidescas', '13+'),
(2, 1, 1, 'Ralsei FunkoPop', 65.99, 4, 'FunkoCreate', 'Pelúcia do Ralsei from DeltaRune', '7+'),
(3, 1, 1, 'Bola de Futebol', 39.99, 3, 'FootSolutions', 'Uma bola de futebol para futebol', '0'),
(4, 2, 2, 'Cubo Mágico', 90.99, 3, 'MagicSolutions', 'Um cubo mágico para suas necessidades puzzlescas', '6+'),
(5, 2, 1, 'Funko Oshawott', 99.99, 4, 'FunkoMake', 'Um funko pop do Oshawott de Pokemon para Oshawott fans', '9+'),
(6, 1, 2, 'Alfabeto Libras', 49.99, 5, 'DefSolutions', 'Um alfabeto de libras para pessoas aprenderem libras', '0'),
(7, 2, 2, 'Arma Nerf', 109.99, 4.5, 'ELITE20', 'Uma arma nerf para diversão com toda a família', '13+');

-- --------------------------------------------------------

--
-- Estrutura da tabela `brinqvendido`
--

CREATE TABLE `brinqvendido` (
  `Codigo_BrinqVendido` int(11) NOT NULL,
  `Codigo_Pedido` int(11) NOT NULL,
  `Codigo_Brinq` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `Codigo_Brinq` int(11) NOT NULL,
  `Codigo_Usu` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `Codigo_Categoria` int(11) NOT NULL,
  `Nome_Categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`Codigo_Categoria`, `Nome_Categoria`) VALUES
(1, 'Funko Pops'),
(2, 'Gerais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupom`
--

CREATE TABLE `cupom` (
  `Codigo_Cupom` int(11) NOT NULL,
  `Nome_Cupom` varchar(50) NOT NULL,
  `Status_Cupom` tinyint(1) NOT NULL,
  `Porcentagem_Cupom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `Codigo_Imagem` int(11) NOT NULL,
  `Codigo_Brinq` int(11) NOT NULL,
  `Imagem` varchar(300) NOT NULL,
  `Num_Imagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`Codigo_Imagem`, `Codigo_Brinq`, `Imagem`, `Num_Imagem`) VALUES
(1, 1, '../imagens/Produtos/Miku/Imagem1.png', 1),
(2, 1, '../imagens/Produtos/Miku/imagem2.png', 2),
(3, 1, '../imagens/Produtos/Miku/imagem3.png', 3),
(4, 2, '../imagens/Produtos/Ralsei/ralseideltarune.png', 1),
(5, 3, '../imagens/Produtos/Bola/imagem1.png', 1),
(6, 4, '../imagens/Produtos/CuboMagico/imagem1.png', 1),
(7, 4, '../imagens/Produtos/CuboMagico/imagem2.png', 2),
(8, 4, '../imagens.', 3),
(9, 5, '../imagens/Produtos/Funko/imagem2.png', 1),
(10, 5, '../imagens/Produtos/Funko/imagem1.png', 2),
(11, 5, '../imagens/Produtos/Funko/imagem3.png', 3),
(12, 6, '../imagens/Produtos/Libras/imagem1.png', 1),
(13, 6, '../imagens/Produtos/Libras/imagem2.png', 2),
(14, 6, '../imagens/Produtos/Libras/imagem3.png', 3),
(15, 7, '../imagens/Produtos/Nerf/imagem3.png', 1),
(16, 7, '../imagens/Produtos/Nerf/imagem2.png', 2),
(17, 7, '../imagens/Produtos/Nerf/imagem1.png', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `listadefavoritos`
--

CREATE TABLE `listadefavoritos` (
  `Codigo_Brinq` int(11) NOT NULL,
  `Codigo_Usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sac`
--

CREATE TABLE `sac` (
  `Codigo_sac` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensagem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sac`
--

INSERT INTO `sac` (`Codigo_sac`, `nome`, `email`, `mensagem`) VALUES
(1, 'Eu', 'pessoa@gmail.com', 'Ola tudo bem meu nome é ben10 ben10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10 bn10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `selo`
--

CREATE TABLE `selo` (
  `Codigo_Selo` int(11) NOT NULL,
  `Nome_Selo` varchar(50) NOT NULL,
  `Imagem_Selo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `selo`
--

INSERT INTO `selo` (`Codigo_Selo`, `Nome_Selo`, `Imagem_Selo`) VALUES
(1, 'Deficiente Auditivo', 0),
(2, 'Geral', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Codigo_Usu`, `Nome_Usu`, `Nasc_Usu`, `Celular_Usu`, `Email_Usu`, `Senha_Usu`, `Tipo_Usu`, `Token`, `Imagem`) VALUES
(1, 'Rosana', '1973-08-15', '11 971889900', 'rosanasiq@gmail.com', '$2y$10$TEj2qHP30EgbslBfd5LIFe.GOKcrREhUId8xvUUNqYM9lu/ISI8SW', 'Cliente', 'f6e4379fc912278a1f14440a98e8960905b999921189bdf6f72950a45a311fbe6927c44e14d3b70e2b677761017298659a67', '../imagens/Conta/rosana.jpg'),
(2, 'Kasane', '2001-02-19', '89821-2122', 'kasaneteto@yahoo.com', '$2y$10$fuDLTvvCk6YNcgxBHbz/7eQ/okUdf9tZ01mN0rkQOaoQ8XixF6uMq', 'Cliente', '97204f8cf2dbba1ac0cda3275e9b42f7adf97efff70e064c670a6570abc51b2b470d43b11f95c8f14f8ef4945a20b92b5267', '../imagens/usuarios/2e58d04b77f8f3caf84caf5c31c107358a1d95c76410c8591be94878e3393515d74b68fad7e2f2e7b6d34f17dd0e618665aea3581b904df6827fab96.jpeg'),
(3, 'Jônatas', '2000-08-11', '1187192-1221', 'jowjow@gmail.com', '$2y$10$gEBH0nDybAB7ASvGo9x1ru1ebgk9QUL/E2LX7bPhnZ3NuZOnIy4se', 'Cliente', 'b0f9e9e538bb2c39ca316fc3bda5eab66311a9af7fee1a1ff49edae530fb865cedf9fda6e4cb4ed770b37110b707550eb6cc', '../imagens/usuarios/4e013b07ab6cef43b541146e37ef01352f11ba946179b07bd4486042a250335f8cbc03694a1e7f5a6874461103e1e19c6e774a135ead7ba1652e7b0b.jpeg'),
(4, 'Susana Deta Runês', '2020-01-12', '1199999-9999', 'susanarune@gmail.com', '$2y$10$4J7fiOZVOG5dhm8tuciXHea4HJp36VQ17hdhzwN1Iu1sNpEVbLpdW', 'Cliente', 'b22bd90f35dbfdfed789e3af3509a6d1b8eee93b043efc15389802cab9d38aa0486db78b0f61c94b1ae4c6f55d9a9b04b7d0', '../imagens/Conta/susie.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`Codigo_Ava`),
  ADD KEY `Codigo_Brinq_Ava` (`Codigo_Brinq`),
  ADD KEY `Codigo_Usu_Ava` (`Codigo_Usu`);

--
-- Índices para tabela `brinquedo`
--
ALTER TABLE `brinquedo`
  ADD PRIMARY KEY (`Codigo_Brinq`),
  ADD KEY `Codigo_Selo_Brinq` (`Codigo_Selo`),
  ADD KEY `Codigo_Categoria_Brinq` (`Codigo_Categoria`);

--
-- Índices para tabela `brinqvendido`
--
ALTER TABLE `brinqvendido`
  ADD PRIMARY KEY (`Codigo_BrinqVendido`),
  ADD KEY `Codigo_Pedido_BrinqVendido` (`Codigo_Pedido`),
  ADD KEY `Codigo_Brinq_BrinqVendido` (`Codigo_Brinq`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD KEY `Codigo_Brinq_Carrinho` (`Codigo_Brinq`),
  ADD KEY `Codigo_Usu_Carrinho` (`Codigo_Usu`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Codigo_Categoria`);

--
-- Índices para tabela `cupom`
--
ALTER TABLE `cupom`
  ADD PRIMARY KEY (`Codigo_Cupom`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`Codigo_Imagem`),
  ADD KEY `Codigo_Brinq_Imagem` (`Codigo_Brinq`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Codigo_Pedido`),
  ADD KEY `Codigo_Brinq_Pedido` (`Codigo_Brinq`),
  ADD KEY `Codigo_Usu_Pedido` (`Codigo_Usu`),
  ADD KEY `Codigo_Cupom_Pedido` (`Codigo_Cupom`);

--
-- Índices para tabela `sac`
--
ALTER TABLE `sac`
  ADD PRIMARY KEY (`Codigo_sac`);

--
-- Índices para tabela `selo`
--
ALTER TABLE `selo`
  ADD PRIMARY KEY (`Codigo_Selo`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Codigo_Usu`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `Codigo_Ava` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `brinquedo`
--
ALTER TABLE `brinquedo`
  MODIFY `Codigo_Brinq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `brinqvendido`
--
ALTER TABLE `brinqvendido`
  MODIFY `Codigo_BrinqVendido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Codigo_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cupom`
--
ALTER TABLE `cupom`
  MODIFY `Codigo_Cupom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `Codigo_Imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `Codigo_Selo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Codigo_Usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `Codigo_Brinq_Ava` FOREIGN KEY (`Codigo_Brinq`) REFERENCES `brinquedo` (`Codigo_Brinq`),
  ADD CONSTRAINT `Codigo_Usu_Ava` FOREIGN KEY (`Codigo_Usu`) REFERENCES `usuario` (`Codigo_Usu`);

--
-- Limitadores para a tabela `brinquedo`
--
ALTER TABLE `brinquedo`
  ADD CONSTRAINT `Codigo_Categoria_Brinq` FOREIGN KEY (`Codigo_Categoria`) REFERENCES `categoria` (`Codigo_Categoria`),
  ADD CONSTRAINT `Codigo_Selo_Brinq` FOREIGN KEY (`Codigo_Selo`) REFERENCES `selo` (`Codigo_Selo`);

--
-- Limitadores para a tabela `brinqvendido`
--
ALTER TABLE `brinqvendido`
  ADD CONSTRAINT `Codigo_Brinq_BrinqVendido` FOREIGN KEY (`Codigo_Brinq`) REFERENCES `brinquedo` (`Codigo_Brinq`),
  ADD CONSTRAINT `Codigo_Pedido_BrinqVendido` FOREIGN KEY (`Codigo_Pedido`) REFERENCES `pedido` (`Codigo_Pedido`);

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `Codigo_Brinq_Carrinho` FOREIGN KEY (`Codigo_Brinq`) REFERENCES `brinquedo` (`Codigo_Brinq`),
  ADD CONSTRAINT `Codigo_Usu_Carrinho` FOREIGN KEY (`Codigo_Usu`) REFERENCES `usuario` (`Codigo_Usu`);

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `Codigo_Brinq_Imagem` FOREIGN KEY (`Codigo_Brinq`) REFERENCES `brinquedo` (`Codigo_Brinq`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `Codigo_Brinq_Pedido` FOREIGN KEY (`Codigo_Brinq`) REFERENCES `brinquedo` (`Codigo_Brinq`),
  ADD CONSTRAINT `Codigo_Cupom_Pedido` FOREIGN KEY (`Codigo_Cupom`) REFERENCES `cupom` (`Codigo_Cupom`),
  ADD CONSTRAINT `Codigo_Usu_Pedido` FOREIGN KEY (`Codigo_Usu`) REFERENCES `usuario` (`Codigo_Usu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
