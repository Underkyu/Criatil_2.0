-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/11/2024 às 03:14
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
(2, 1, 1, 5, 'Essa boneca deixou minha filha Kasane muito feliz', 'Ótima para crianças'),
(3, 2, 4, 4, 'Ralsei do DeltaRune, onde fui parar?', 'Kris'),
(4, 3, 3, 4.5, 'Jogar um fut com essa bola foi legal', 'Futebol daora'),
(5, 4, 2, 2, 'O cubo quebrou antes de eu conseguir resolver', 'Quebra fácil'),
(6, 5, 1, 5, 'Coleciono pokemons e esse eu achei muito bonito, nem parece plástico', 'Lindo boneco'),
(7, 6, 2, 5, 'Meu amigo aprendeu libras com isso', 'Útil'),
(8, 7, 3, 3.5, 'Machuca muito, bem perigoso, mas divertido', 'Forte e legal');

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
  `Faixa_Etaria` varchar(10) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `brinquedo`
--

INSERT INTO `brinquedo` (`Codigo_Brinq`, `Codigo_Selo`, `Codigo_Categoria`, `Nome_Brinq`, `Preco_Brinq`, `Nota`, `Fabricante`, `Descricao`, `Faixa_Etaria`, `Status`) VALUES
(1, 1, 1, 'Pelúcia Hatsune Miku', 59.99, 5, 'Plush Japan', 'Uma pelúcia da Hatsune Miku do grupo artístico VOCALOID - 100% Algodão', 'Livre', 0),
(2, 1, 2, 'Ralsei Funko Pop', 109.99, 4.5, 'FunkoMake', 'Um Funko Pop do personagem Ralsei criado por Toby Fox em DELTARUNE - Feito na China.', 'Livre', 0),
(3, 1, 1, 'Pelúcia Ralsei', 49.99, 2, 'Plush Japan', 'Uma pelúcia do personagem Ralsei (ASRIEL) de DELTARUNE - Embarque em mundos mágicos e sombrios com esse boneco exclusivo. 100% ALGODÃO [PRODUTO EM FALTA]', 'Livre', 1),
(4, 2, 10, 'Alfabeto Libras', 49.9, 4, 'TOYSTER', 'Aprendendo o alfabeto em libras - Ensine seus filhos o alfabeto em libras de uma maneira simples e divertida!', '4+', 0),
(5, 3, 6, 'Jogo da Velha Tátil', 19.99, 4, 'Montesorri', 'Um tabuleiro de jogo da velha interativo/tátil para divertir as crianças - Feito com base de madeira, ele possui peças igualmente em madeira, essa peça é uma ótima opção para um jogo rápido entre filhos, familiares e amigos!', '4+', 0),
(6, 3, 8, 'Bola de Futebol Acessível', 160.5, 5, 'FUT-5', 'Desenvolvida com guizos internos para melhor localização dos atletas com deficiência visual, a Bola para Futebol Acessível possui a alta tecnologia da marca Ludwig - Diversão igual para todos!', '7+', 0),
(7, 1, 8, 'Nerf Elite 2.0', 104, 3, 'NERF', 'Com os blasters Nerf Elite 2.0, a batalha atinge um novo nível. Se divirta com todos os amigos no campo! ', '13+', 0),
(8, 1, 2, 'Oshawott Funko Pop', 101.99, 4.5, 'Funko Pop', 'Leve o pokémon Oshawott para sua coleção! Este Funko Pop original captura o charme único do Pokémon aquático de Unova - Perfeito para fãs e colecionadores!', 'Livre', 0),
(9, 1, 9, 'Cubo Mágico', 30.99, 4, 'Puzzle Solutions', 'O clássico Cubo Mágico; o desafio ideal para a diversão. Não recomendado para menores de 4 anos - peças digestíveis.', '4+', 0);

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
(1, 'Pelúcias'),
(2, 'Funko Pop'),
(3, 'Carrinhos'),
(4, 'Eletrônica'),
(5, 'Arte'),
(6, 'Tabuleiro'),
(7, 'Cartas'),
(8, 'Esportes'),
(9, 'Quebra-Cabeças'),
(10, 'Educativos');

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
(1, 1, '0d45235dcaf59b4b85c47d65c1f24318e9f04dbd90b6e6b43b1a849cd21ef87a3477ba2105116a3ec70cd60484e4c5511f6470fce1e5e8a8defb9624', 1),
(2, 1, '01917e3755cb8ea2a9787a9aa8df593369e9130e887c3a03bf0f1152d7de9ae300ca2a2991ecf8a2664a34838dda9b375417312313bbeaacab92270b_2', 2),
(3, 1, '22288f801386223a25ffd894beed26b649ac2cdd924883b5a36c326597bb1b7f551566c1763c6a53a853a6f83c3f325dcebb5171bb156a5886cc56cd_3', 3),
(4, 2, '8c9c3f4301c8f25f2f23f53b2db84e366003c3d0b0a46ab54f5172d8d397997e856cd8d08bc069c9858e30c5a0e831f71aa3c20189ee5c0a362e22e5', 1),
(5, 2, '435e53224c0cd2247b1464884b98639e3cf05303e4eb8895259c5557620d093047a3298bc777303b4090d579cfa6fb8733927520d703d389ada27ed2_2', 2),
(6, 3, '421b79a1850b1771cf0d1fe17db14cec2858fa4ff9c2b9e63a4ba822537575d55a5dad08e356cc6a7e11b92f7f4c8f38271d691930aaf49b87090ae7', 1),
(7, 4, '2133673d536e5ee7f7952e9f2cd75262b7f016c717633f893de50f40c2928509e0f75b72047627d76efa2edb12f68358a967e12be8e985388724a681', 1),
(8, 4, 'a2f9399bd69b1d6357f9ca49a98a7b9d38eefdb2a589d5f7a6cc20a8ceb05998471a846a4f30a2beb4ed5fc3116e24ec4f12b392958b1ae118769c95_2', 2),
(9, 4, '2c965b54e9bc109139c8bc36243172711e54fa8b4a80a69c6b4a375a2098ba4bb80aa3ad17b1c18a023c945da0a7e6edb1b25615942292e346a030b5_3', 3),
(10, 5, 'b29b14ef1fe82daf45e44248e7dd94e6b3940bbac9e26618eecad645b6feba2dfd33d43443f2c1771627fa769ed190a94a3528443c5f5d1e0dc34d36', 1),
(11, 6, 'daeebdec01a5958c9c21903b3a9d2d1e75235d9d6c95729239660bc87341ae304f309444ddfd086b955548622ed0b58c49bfe1c41434600bfb4bf186', 1),
(12, 7, '4dcb1184dadd322301ed9eab39829759433bc7c59daac5240bccb447702a2e400c2c7126640cecef9305f09fb9daf6d5bae1d26eab7393902236bf23', 1),
(13, 7, '92a41987f282c7d008aa430ac0ba81edf5c2931751663e7ef03c0a4ac665acffa89cec10ba91fa6db3f2fe4165ae7b1351ad6f7e2ccb099893f75452_2', 2),
(14, 7, '2995cdb3620ed27101bd7c39d8e57c7725eee7e64a40041ccc9768cc76c4ffadbaac6d46bce36fbefb1b90ca174f3fe21b1d45fc037e036b39166f33_3', 3),
(15, 8, 'e44c625f72a4cc7815624fbe3e1c218ab90f85c7649a1a454391d667fdcecf9befb16607d0111c08a0cd2f5e4e61211d5aab3a171a97001cc32008da', 1),
(16, 8, 'dec67f0a10baaa7c881d6f9656fefed9163f675c30d2d0bcfaa160cfa345fc569fed275a44b26feef493a53984e3af0f5acecec4e1b8c12456dcf8bf_2', 2),
(17, 8, '28da9435c9dc2e46580894e40b6bd93c6e2fd44d7c23b537f5e70993745dad0152cda9be3ec2e7941dd9bbe2962f381926e015fbafd83f13b4e7f37d_3', 3),
(18, 9, 'e1366b5baf33a41bef793394a0d9c1e0953152024232889dc9293abe5579f7d95128c7b40f71df79784b23193698d0c7301a838de28185d810054242', 1),
(19, 9, '01164b07cfa657cbcbc99d9827646416c23a20af713f6bf58898fd228c45c776b25e9c3eea688d36a99dc66c7fd525f6bc079aa354fd9fe515cf3c68_2', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `listadefavoritos`
--

CREATE TABLE `listadefavoritos` (
  `Codigo_Brinq` int(11) NOT NULL,
  `Codigo_Usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `listadefavoritos`
--

INSERT INTO `listadefavoritos` (`Codigo_Brinq`, `Codigo_Usu`) VALUES
(8, 6),
(6, 6),
(4, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `Codigo_Pedido` int(11) NOT NULL,
  `Codigo_Usu` int(11) NOT NULL,
  `Codigo_Cupom` int(11) DEFAULT NULL,
  `Preco_Total` double NOT NULL,
  `Forma_Pagamento` varchar(20) NOT NULL,
  `Data_Pedido` datetime NOT NULL,
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

-- --------------------------------------------------------

--
-- Estrutura para tabela `selo`
--

CREATE TABLE `selo` (
  `Codigo_Selo` int(11) NOT NULL,
  `Nome_Selo` varchar(50) NOT NULL,
  `Imagem_Selo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `selo`
--

INSERT INTO `selo` (`Codigo_Selo`, `Nome_Selo`, `Imagem_Selo`) VALUES
(1, 'Sem Selo', ''),
(2, 'Deficiência Auditiva', 'Auditiva'),
(3, 'Deficiência Visual', 'Visual'),
(4, 'Deficiência Deepwoken', '4bb6bacebfddc04b66d902e0b17de85f8a1ebbf65a1e30fd12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `Codigo_Usu` int(11) NOT NULL,
  `Nome_Usu` varchar(50) NOT NULL,
  `Nasc_Usu` date NOT NULL,
  `Celular_Usu` varchar(15) DEFAULT NULL,
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
(1, 'Rosana Siqueira', '1987-12-09', '(11) 97521-1889', 'rosanasiq@gmail.com', '$2y$10$XZK56CKhQ99iIsuxIqIpTOrYEKlrOcvHerqZ8XR.bs62ZYWr.aiva', 'Cliente', '0d07950e4b66af163b072f370b03bf34c1db0ec5a0762c6ed0bf46818945d78c3c1a99c574feaddefb7b3b6e559779274fd6', '31b61e901b185be6e8a58a0730a45c4a75e1c2c491b720ae24786dd2d786b69cfd62157c144af03783c31ba3450d9c3455022457774b236727435b7f'),
(2, 'Ricardo Souza', '1993-11-09', '(11) 97492-1221', 'ricas@hotmail.com', '$2y$10$NJ.vVoz7s6UaPGYYx3qh3e85K12lqcbeSNaN6tFk8dIcBnKT41doa', 'Cliente', '6ee4c54eb63ec1e147030dcfcf128f8668a3fe811883ab42b2f8195080f52328fd42ea4da7a66e9127cfb658cd15c8167f98', '36ca795a7aef34ad8ad99a7bf4cf7847f0d74978c951cd6ad331f46f94194884f137e6d7e0fae988378005de66359163acc30516b5e85029fc8c7ada'),
(3, 'Cássio Gomes', '2006-12-01', '(11) 95853-3922', 'elcassio@gmail.com', '$2y$10$vozGTgSShePrI59.WxRnEeIObXf9mLD00FpkNhblQcO11g4e7v/XW', 'Cliente', 'e94d5498fafc9495ec2c02ae5fb6816c78112d3a76e74564ced749fb0f72f68700c26930884e0f7ed293743954f03ff3150e', 'c3b56e4dada6e6b3cdc4fcfa8db41604afc45a8b90d6705937096632b65a6d0448779658fdffda754009182bcc15a0bd3f0256e72467b2d9c3cedf25'),
(4, 'Guilherme Britos', '1993-01-03', '(11) 93812-1221', 'guigui@gmail.com', '$2y$10$IeX0NVHaz1QFrCcyU55SHOngBpYOPF.M2AjNa5x6l3mT7.i2azxIy', 'Cliente', 'f45743d8716100d1f325ebfae89461f200deacb16edce4caea592b020268dc8588f186697f6bca7d0141c04a9885caec8b80', '0e8d29d27681f1049882ba048a7ad6b394746a1a18d09663701fd94fdf4e012fe9282659daab86ad6f44f788ab9b8040f5a7d94b8227a542c86f3903'),
(5, 'Brito Carrero', '1988-12-08', '(11) 98612-3871', 'brito@gmail.com', '$2y$10$o0WKp5VMVhg21KDDf4bUi.dY37TWVFQYpA7fuItZc7DnTfpn87oNG', 'Cliente', '756a229c0886b4ae0c9b13b488ca9234a2220f4a2b93b52b8b8c084cbcede53f8faa4ad988bd7768a938734c56021848ca0e', '41e988ec496a950e9b049be21b5f6ec8250fad053a968625421e8fcfc87fb01120b232ce90917010110e519d64565a3bfce8529928a27e1a5907b651'),
(7, 'conta silva', '1982-12-08', '(89) 12738-9712', 'conta@gmail', '$2y$10$YVvogMZ6Uv1SEMoE8L6bJeUzI5RNd0fh0If0U1jo7bWCN2rrFtOKy', 'Cliente', 'ab1e368e49f3ea4c41fc307c1f7421a324eb0e2c19a835ec80fd2dfde46c38d5a49c7ab09a855b9d734e2443d7285eec5db9', 'vazio'),
(8, 'conta silva', '9274-12-08', '(91) 82376-8712', 'email@gmail', '$2y$10$1VWdx34BnUdZw09amWU53.3NYCDHi6C10QFfTXWoxkNtRTfB29F9K', 'Cliente', 'cd0bd67538ab2360f83e82b95eec89e82fc657bfb34027b6b67f46c0a36ecf455e40b8598793b5bf0bbba9f4d95025bef2f4', 'vazio');

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
  MODIFY `Codigo_Ava` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `brinquedo`
--
ALTER TABLE `brinquedo`
  MODIFY `Codigo_Brinq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `brinqvendido`
--
ALTER TABLE `brinqvendido`
  MODIFY `Codigo_BrinqVendido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Codigo_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `Codigo_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `sac`
--
ALTER TABLE `sac`
  MODIFY `Codigo_sac` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `selo`
--
ALTER TABLE `selo`
  MODIFY `Codigo_Selo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Codigo_Usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `Codigo_Cupom_Pedido` FOREIGN KEY (`Codigo_Cupom`) REFERENCES `cupom` (`Codigo_Cupom`),
  ADD CONSTRAINT `Codigo_Usu_Pedido` FOREIGN KEY (`Codigo_Usu`) REFERENCES `usuario` (`Codigo_Usu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
