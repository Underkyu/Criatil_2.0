-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3789
-- Generation Time: Nov 30, 2024 at 12:00 AM
-- Server version: 8.0.40-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `GrupoCriatil`
--

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao`
--

CREATE TABLE `avaliacao` (
  `Codigo_Ava` int NOT NULL,
  `Codigo_Brinq` int NOT NULL,
  `Codigo_Usu` int NOT NULL,
  `Nota_Ava` double NOT NULL,
  `Comentario` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Titulo_Ava` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avaliacao`
--

INSERT INTO `avaliacao` (`Codigo_Ava`, `Codigo_Brinq`, `Codigo_Usu`, `Nota_Ava`, `Comentario`, `Titulo_Ava`) VALUES
(2, 1, 1, 5, 'Essa boneca deixou minha filha Kasane muito feliz', 'Ótima para crianças'),
(3, 2, 4, 4, 'Ralsei do DeltaRune, onde fui parar?', 'Kris'),
(4, 3, 3, 4.5, 'Jogar um fut com essa bola foi legal', 'Futebol daora'),
(5, 4, 2, 2, 'O cubo quebrou antes de eu conseguir resolver', 'Quebra fácil'),
(6, 5, 1, 5, 'Coleciono pokemons e esse eu achei muito bonito, nem parece plástico', 'Lindo boneco'),
(7, 6, 2, 5, 'Meu amigo aprendeu libras com isso', 'Útil'),
(8, 7, 3, 3.5, 'Machuca muito, bem perigoso, mas divertido', 'Forte e legal'),
(16, 4, 14, 5, 'Meu filho esta conseguindo aprender a ler, realmente muito bom.', 'muito bom'),
(17, 5, 14, 5, 'Eu e meu filho brincamos por horas', 'divertido'),
(19, 2, 15, 5, 'comprei logo dois, bonito demais', 'muito bonito'),
(20, 11, 15, 5, 'é o batman, não tem com não gostar', 'meu herói favorito'),
(21, 12, 15, 5, 'funko brabo do gandalf o branco', 'voce não vai passar'),
(22, 13, 16, 4, 'As cartas são bem sensíveis mas meu filho adorou', 'meu filho amou'),
(23, 6, 16, 4.5, 'achei um pouco cara, mas é de boa qualidade', 'bola'),
(24, 14, 17, 5, 'lindo tabuleiro', 'gostei'),
(25, 15, 17, 5, 'agora é minha vez de se divertir rs', 'adorei'),
(28, 15, 22, 5, 'chamei toda minha família pra jogar', 'muito divertido'),
(29, 21, 23, 5, 'comprei pra minha filha, ela adora pelúcias', 'fofinho'),
(30, 28, 30, 4, 'Meu primo mais novo adorou!', 'Divertido '),
(31, 6, 30, 5, 'Tenho um sobrinho com baixa visão e que adora jogar futebol, essa bola foi um achado em tanto!', 'Funcional.'),
(32, 1, 30, 4.5, 'Adoro a Miku e essa pelúcia é de altíssima qualidade, adorei!!', 'Muito fofa.'),
(33, 31, 31, 3, 'Minha filha adora essas cartas, ela quer todas elas, comprei mais de 10 pacotes para ela, ela se divertiu muito e o preço não é salgado.\r\n', 'Interessante.'),
(34, 2, 31, 4.5, 'Meu filho me pediu isso, ele disse que era de algum jogo, não entendo muito disso, mas achei muito bem feito e bonito, compraria de novo com certeza ', 'Bonito.'),
(35, 31, 29, 5, 'É o jogo preferido da minha filha, ela amou', 'Minha filha adorou'),
(37, 29, 31, 5, 'Meu filho tem muito desconforto com texturas e esse brinquedo ajudou ele a ficar mais confortável enquanto segura variadas, de fato inovador.', 'Meu filho adorou!'),
(38, 29, 29, 4, 'Muito bom de apertar, me deixou relaxado, mas é caro', 'Satisfatório '),
(39, 27, 29, 5, 'Muito bom, os clássicos nunca morrem', 'Clássico '),
(40, 26, 31, 2.5, 'Minha filha nova gostou muito, só fico um pouco incomodado com o barulho que o brinquedo faz, mas a qualidade é ótima.', 'Barulho estranho '),
(41, 14, 31, 5, 'Ensinei meu filho a jogar xadrez, ótimo para desenvolver a lógica!', 'Ótimo para lógica!'),
(42, 28, 29, 5, 'Legal e engraçado ', 'Legal'),
(43, 1, 33, 4, 'Costura não é aparente e a pelúcia é macia e manter o seu formato, ótimo produto.', 'Alta qualidade.'),
(44, 26, 32, 4, 'Relaxante mas não tanto para uma nota 5', 'Bom'),
(45, 5, 33, 5, 'Meu filho tem baixa visão e brincar com ele sempre foi difícil, mas com isso nos conseguimos brincar juntos, adorei!!', 'Filho gostou.'),
(46, 9, 33, 4.5, 'Meu filho tem baixa visão e sempre quis brincar com um cubo mágico, com isso ele finalmente conseguiu, gostei muito.', 'Meu filho adorou.'),
(48, 25, 32, 3, 'Achei que era um notebook de verdade', 'Esperava outra coisa'),
(49, 1, 34, 4, 'Minha neta pediu e ela gostou bastante.', 'Bonitinha.'),
(50, 8, 34, 3, 'Não tem articulações, mas é de alta qualidade', 'Fofinho.'),
(51, 9, 34, 5, 'Meu filho é cego e gostou do produto, se ele gostou eu gosto.', 'Bom.'),
(53, 25, 35, 5, 'Ele começou a aprender inglês e isso está ajudando muito ele', 'Meu filho adorou'),
(54, 26, 34, 2.5, 'Meu neto gostou.', 'Colorido.'),
(55, 29, 34, 4.5, 'Minha netinha adorou!!', 'Interessante.'),
(56, 11, 35, 5, 'Agora é hora dos adultos brincarem', 'Lindo'),
(57, 31, 34, 4, 'Minha filha adolescente pediu, não entendi para que serve, mas ela ficou muito feliz, isso que importa.', 'Não entendi.'),
(58, 11, 30, 5, 'Figura bem detalhada, é incrível.', 'Ótima qualidade.'),
(59, 22, 36, 5, 'Lembrou da época em que eu brincava quando eu era criança', 'Legal'),
(60, 31, 36, 5, 'Gosto desse jogo então comprei, e adorei', 'Divertido'),
(61, 6, 36, 5, 'Achei caro, mas é divertido ver como é jogar bola com gizmos', 'Legal'),
(62, 1, 37, 5, 'alta qualidde!', 'Muito boa!'),
(63, 1, 38, 4, 'Excelente qualidade!', 'ótimo produto!'),
(64, 1, 38, 4, 'Excelente qualidade!', 'ótimo produto!'),
(65, 1, 38, 4, 'Excelente qualidade!', 'ótimo produto!');

-- --------------------------------------------------------

--
-- Table structure for table `brinquedo`
--

CREATE TABLE `brinquedo` (
  `Codigo_Brinq` int NOT NULL,
  `Codigo_Selo` int NOT NULL,
  `Codigo_Categoria` int NOT NULL,
  `Nome_Brinq` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Preco_Brinq` double NOT NULL,
  `Nota` double NOT NULL,
  `Fabricante` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Descricao` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `Faixa_Etaria` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brinquedo`
--

INSERT INTO `brinquedo` (`Codigo_Brinq`, `Codigo_Selo`, `Codigo_Categoria`, `Nome_Brinq`, `Preco_Brinq`, `Nota`, `Fabricante`, `Descricao`, `Faixa_Etaria`, `Status`) VALUES
(1, 1, 1, 'Pelúcia Hatsune Miku', 59.99, 4.5, 'Plush Japan', 'Uma pelúcia da Hatsune Miku do grupo artístico VOCALOID - 100% Algodão', 'Livre', 0),
(2, 1, 2, 'Ralsei Funko Pop', 109.99, 4.5, 'FunkoMake', 'Um Funko Pop do personagem Ralsei criado por Toby Fox em DELTARUNE - Feito na China.', 'Livre', 0),
(4, 2, 10, 'Alfabeto Libras', 49.99, 4, 'TOYSTER', 'Aprendendo o alfabeto em libras - Ensine seus filhos o alfabeto em libras de uma maneira simples e divertida!', '4+', 1),
(5, 3, 6, 'Jogo da Velha Tátil', 19.99, 5, 'Montesorri', 'Um tabuleiro de jogo da velha interativo/tátil para divertir as crianças - Feito com base de madeira, ele possui peças igualmente em madeira, essa peça é uma ótima opção para um jogo rápido entre filhos, familiares e amigos!', '4+', 0),
(6, 3, 8, 'Bola de Futebol Acessível', 160.5, 5, 'FUT-5', 'Desenvolvida com guizos internos para melhor localização dos atletas com deficiência visual, a Bola para Futebol Acessível possui a alta tecnologia da marca Ludwig - Diversão igual para todos!', '7+', 0),
(7, 1, 8, 'Nerf Elite 2.0', 104, 3, 'NERF', 'Com os blasters Nerf Elite 2.0, a batalha atinge um novo nível. Se divirta com todos os amigos no campo! ', '13+', 0),
(8, 1, 2, 'Oshawott Funko Pop', 101.99, 3, 'Funko Pop', 'Leve o pokémon Oshawott para sua coleção! Este Funko Pop original captura o charme único do Pokémon aquático de Unova - Perfeito para fãs e colecionadores!', 'Livre', 0),
(9, 1, 9, 'Cubo Mágico', 30.99, 5, 'Puzzle Solutions', 'O clássico Cubo Mágico; o desafio ideal para a diversão. Não recomendado para menores de 4 anos - peças digestíveis.', '4+', 0),
(11, 1, 12, 'Batman Action Figure', 200, 5, 'dc comics', 'Um Action figure do clássico Cavaleiro das Trevas da DC, Batman', '10', 0),
(12, 1, 2, 'Gandalf Funko Pop', 149.5, 5, 'pop!', 'O Funko Pop do mago Gandalf, o Branco agora disponível ', '10', 0),
(13, 3, 7, 'Uno Braille', 64.99, 5, 'Mattel', 'O clássico jogo de cartas UNO agora está disponível com braille incluido', '4+', 0),
(14, 3, 9, 'Tabuleiro de Xadrez Adaptado', 69.5, 5, 'xadrez', 'Tabuleiro estojo adaptado no sistema Braille. Letras e números do sistema Braille são representados em forma de relevo. Possui orifícios para encaixe das peças com cavilhas.', '4+', 0),
(15, 1, 9, 'Jogo de Bingo', 29.99, 5, 'Bingo Premium', 'um bingo especial para a diversão todas as famílias e idades', '4+', 0),
(16, 1, 5, 'Guitarra de Brinquedo', 49, 0, 'mattel', 'Este brinquedo de guitarrinha estimula o gosto pela música e desenvolve a criança num todo!', '+3', 0),
(17, 14, 9, 'Pop It Anti Stress', 22.99, 0, 'Pop It', 'É insípido e inofensivo para pessoas e animais de estimação. Cores brilhantes e sons agradáveis são certos para satisfazer qualquer um!', '+3', 0),
(18, 2, 6, 'Jogo Aprendendo Libras', 44.57, 4.5, 'libras', 'Desenvolve a atenção, noção de forma, a habildiade de encaixar e ajuda a estimular o aprendizado das libras.', '+10', 0),
(19, 1, 4, 'Barbie Sereia Arco ìris', 194.99, 0, 'Mattel', 'Mergulhe com Barbie Sereia e veja um show de luzes na água! A sua cauda cintilante emite luzes quando mergulhada na água ou acionada manualmente.', '+3', 0),
(20, 1, 3, 'Hot Wheels Action Pista Desafio Extremo', 384.99, 0, 'Mattel', 'A Hot Wheels Action Pista de Brinquedo Desafio Extremo da Mattel é um emocionante conjunto de pistas de corrida para os amantes de carros e velocidade.', '+10', 0),
(21, 1, 1, 'Squishmallows Pelúcia De 20cm', 61.99, 0, 'Sunny', 'Squishmallows são os brinquedos de pelúcia mais fofos e macios', '+3', 0),
(22, 1, 4, 'Tamagotchi Nano Harry Potter', 349.99, 5, 'BANDAI', 'Divirta-se Conheça o novo Tamagotchi Bichinho Virtual edição especial Harry Potter', '+3', 0),
(23, 1, 1, 'Curlimals - Higgle Ouriço', 149.99, 0, 'Sunny', ' é um brinquedo de pelúcia interativo e incrivelmente fofo, com seu pelo macio e brilhante.', '+3', 0),
(24, 13, 9, 'Jogo de Encaixe', 30.99, 0, 'TOYSTER', 'Um jogo de encaixe para estimular o movimento dos músculos do seu filho', '0', 0),
(25, 13, 10, 'Laptop Do Patrulha Canina Bilingue', 78, 4, 'Candide', 'é educativo, bilíngue (português e inglês) e vem com diferentes atividades, sendo elas: música, letras, palavras, ortografia, perguntas e respostas, soma, divisão e outros', '4+', 0),
(26, 14, 10, 'Robô Pop It Estica-Puxa ', 16.99, 3, 'Candide', 'O brinquedo possibilita várias formas de brincar e se divertir e garante horas de entretenimento saudável.    Perfeito para deixar as crianças desenvolverem a criatividade, explorando as diversas possibilidades de posições do boneco.', '+3', 0),
(27, 1, 6, 'Banco Imobiliário', 166.5, 5, 'Estrela', 'O tradicional jogo Banco Imobiliário, com a máquina de crédito e débito para fazer as transações bancárias.', '+10', 0),
(28, 1, 4, 'Cacto Dançante E Falante Toca Música Repete A Fala E Dança', 42.99, 4.5, 'Estrela', 'O que é aquele boneco se mexendo? Tem olhos grandes e um rosto sorridente, o que é muito normal para um brinquedo. Mas também pode dançar e cantar de uma maneira divertida!', '+3', 0),
(29, 14, 1, 'Brinquedo de Apertar Fidget Toys Squishy Anti-Stress', 49.65, 4.5, 'Mattel', 'Com texturas macias e cores vibrantes, eles estimulam os sentidos e ajudam a desenvolver habilidades motoras.', '+4', 0),
(30, 14, 5, 'Arma de Dinheiro ', 118.75, 0, 'Estrela', 'Arma de Dinheiro Money Gun . Acompanha Notas de Brinde', '+12', 1),
(31, 1, 2, 'Pkxd Gogos e Mini Livro Surpresa', 8.49, 4.5, 'Candide', ' Agora, você pode levar o PK XD para o mundo real! Com 42 colecionáveis (sortidos e surpresa), incluindo 20 personagens do jogo + 20 pets e 2 raros, a diversidade de opções permite que você colecione seus personagens favoritos.', '+4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brinqvendido`
--

CREATE TABLE `brinqvendido` (
  `Codigo_BrinqVendido` int NOT NULL,
  `Codigo_Pedido` int NOT NULL,
  `Codigo_Brinq` int NOT NULL,
  `Quantidade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brinqvendido`
--

INSERT INTO `brinqvendido` (`Codigo_BrinqVendido`, `Codigo_Pedido`, `Codigo_Brinq`, `Quantidade`) VALUES
(1, 5, 9, 1),
(2, 5, 8, 1),
(3, 5, 7, 1),
(4, 5, 5, 1),
(5, 6, 8, 1),
(6, 6, 1, 20),
(7, 7, 9, 1),
(8, 7, 7, 1),
(9, 7, 2, 1),
(10, 8, 9, 1),
(11, 8, 8, 1),
(12, 8, 7, 1),
(13, 8, 6, 1),
(14, 8, 5, 1),
(15, 9, 4, 1),
(16, 10, 5, 1),
(17, 11, 9, 1),
(18, 12, 2, 2),
(19, 13, 12, 2),
(20, 14, 13, 2),
(21, 15, 6, 2),
(22, 16, 14, 2),
(23, 16, 15, 1),
(24, 17, 14, 1),
(25, 18, 13, 1),
(26, 19, 15, 1),
(27, 20, 21, 1),
(28, 21, 22, 1),
(29, 21, 23, 1),
(30, 21, 21, 1),
(31, 21, 29, 1),
(32, 21, 28, 1),
(33, 22, 29, 1),
(34, 22, 28, 1),
(35, 23, 6, 1),
(36, 23, 28, 1),
(37, 24, 1, 1),
(38, 25, 29, 4),
(39, 25, 31, 1),
(40, 25, 9, 1),
(41, 26, 2, 3),
(42, 26, 31, 15),
(43, 26, 29, 1),
(44, 26, 27, 1),
(45, 26, 14, 1),
(46, 26, 21, 1),
(47, 26, 26, 1),
(48, 26, 15, 1),
(49, 26, 11, 1),
(50, 27, 1, 1),
(51, 28, 31, 1),
(52, 29, 29, 1),
(53, 30, 27, 1),
(54, 31, 28, 1),
(55, 32, 26, 1),
(56, 33, 1, 10),
(57, 33, 5, 15),
(58, 34, 11, 1),
(59, 35, 9, 1),
(60, 36, 11, 1),
(61, 37, 25, 1),
(62, 38, 18, 1),
(63, 38, 31, 3),
(64, 38, 29, 1),
(65, 38, 27, 1),
(66, 38, 26, 1),
(67, 38, 8, 1),
(68, 38, 9, 1),
(69, 38, 1, 1),
(70, 39, 25, 1),
(71, 40, 11, 1),
(72, 41, 11, 35),
(73, 42, 22, 1),
(74, 43, 31, 1),
(75, 44, 6, 1),
(76, 45, 29, 1),
(77, 45, 1, 1),
(78, 45, 28, 1),
(79, 45, 27, 1),
(80, 46, 1, 2),
(81, 46, 29, 1),
(82, 46, 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `Codigo_Categoria` int NOT NULL,
  `Nome_Categoria` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
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
(10, 'Educativos'),
(12, 'Colecionáveis');

-- --------------------------------------------------------

--
-- Table structure for table `cupom`
--

CREATE TABLE `cupom` (
  `Codigo_Cupom` int NOT NULL,
  `Nome_Cupom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Status_Cupom` tinyint(1) NOT NULL,
  `Porcentagem_Cupom` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cupom`
--

INSERT INTO `cupom` (`Codigo_Cupom`, `Nome_Cupom`, `Status_Cupom`, `Porcentagem_Cupom`) VALUES
(1, '', 1, 0),
(2, '20OFF', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `imagem`
--

CREATE TABLE `imagem` (
  `Codigo_Imagem` int NOT NULL,
  `Codigo_Brinq` int NOT NULL,
  `Imagem` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `Num_Imagem` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imagem`
--

INSERT INTO `imagem` (`Codigo_Imagem`, `Codigo_Brinq`, `Imagem`, `Num_Imagem`) VALUES
(1, 1, 'Imagem1', 1),
(2, 1, '01917e3755cb8ea2a9787a9aa8df593369e9130e887c3a03bf0f1152d7de9ae300ca2a2991ecf8a2664a34838dda9b375417312313bbeaacab92270b_2', 2),
(3, 1, '22288f801386223a25ffd894beed26b649ac2cdd924883b5a36c326597bb1b7f551566c1763c6a53a853a6f83c3f325dcebb5171bb156a5886cc56cd_3', 3),
(4, 2, '8c9c3f4301c8f25f2f23f53b2db84e366003c3d0b0a46ab54f5172d8d397997e856cd8d08bc069c9858e30c5a0e831f71aa3c20189ee5c0a362e22e5', 1),
(5, 2, '435e53224c0cd2247b1464884b98639e3cf05303e4eb8895259c5557620d093047a3298bc777303b4090d579cfa6fb8733927520d703d389ada27ed2_2', 2),
(6, 3, '421b79a1850b1771cf0d1fe17db14cec2858fa4ff9c2b9e63a4ba822537575d55a5dad08e356cc6a7e11b92f7f4c8f38271d691930aaf49b87090ae7', 1),
(7, 4, '2133673d536e5ee7f7952e9f2cd75262b7f016c717633f893de50f40c2928509e0f75b72047627d76efa2edb12f68358a967e12be8e985388724a681', 1),
(10, 5, 'b29b14ef1fe82daf45e44248e7dd94e6b3940bbac9e26618eecad645b6feba2dfd33d43443f2c1771627fa769ed190a94a3528443c5f5d1e0dc34d36', 1),
(11, 6, 'daeebdec01a5958c9c21903b3a9d2d1e75235d9d6c95729239660bc87341ae304f309444ddfd086b955548622ed0b58c49bfe1c41434600bfb4bf186', 1),
(12, 7, '4dcb1184dadd322301ed9eab39829759433bc7c59daac5240bccb447702a2e400c2c7126640cecef9305f09fb9daf6d5bae1d26eab7393902236bf23', 1),
(13, 7, '92a41987f282c7d008aa430ac0ba81edf5c2931751663e7ef03c0a4ac665acffa89cec10ba91fa6db3f2fe4165ae7b1351ad6f7e2ccb099893f75452_2', 2),
(14, 7, '2995cdb3620ed27101bd7c39d8e57c7725eee7e64a40041ccc9768cc76c4ffadbaac6d46bce36fbefb1b90ca174f3fe21b1d45fc037e036b39166f33_3', 3),
(15, 8, 'e44c625f72a4cc7815624fbe3e1c218ab90f85c7649a1a454391d667fdcecf9befb16607d0111c08a0cd2f5e4e61211d5aab3a171a97001cc32008da', 1),
(16, 8, 'dec67f0a10baaa7c881d6f9656fefed9163f675c30d2d0bcfaa160cfa345fc569fed275a44b26feef493a53984e3af0f5acecec4e1b8c12456dcf8bf_2', 2),
(17, 8, '28da9435c9dc2e46580894e40b6bd93c6e2fd44d7c23b537f5e70993745dad0152cda9be3ec2e7941dd9bbe2962f381926e015fbafd83f13b4e7f37d_3', 3),
(18, 9, 'e1366b5baf33a41bef793394a0d9c1e0953152024232889dc9293abe5579f7d95128c7b40f71df79784b23193698d0c7301a838de28185d810054242', 1),
(19, 9, '01164b07cfa657cbcbc99d9827646416c23a20af713f6bf58898fd228c45c776b25e9c3eea688d36a99dc66c7fd525f6bc079aa354fd9fe515cf3c68_2', 2),
(20, 10, '466b58a0b7057de941ba53f8d3acf1bcb0fb32b7d33634727a1730bbd613f5933262c4dbdf7da718d8a049c068361bad23250f6055f4723f6c75c9b2', 1),
(21, 11, 'batman4', 1),
(22, 11, '9ae78666ba4f4fc404bc2ac2dd6a40c41df0d26285dad5da8910abaa47a962faa87f28728054ee4c1a207d36509eee383553778b53cbfd207f4cc087_2', 2),
(23, 11, 'bac9daac5de376dabb6709a18dc53c99e495603ad8ada8f70662186aab254372eb73fa6c8b2a254b72f0aa6277046997df78559f35f026500ca91bcc_3', 3),
(24, 12, '2576b7972a58c086ee2b615cba89ff7afa8aa8f3abd5a7a7b6fd26e61897c4552d2bd1e414700338f0c83caa303f02b029e1ae480b46776e1537017a', 1),
(25, 13, 'b77b82245c2c9059ba48da058c87dfc56710e87288cb786b769abe0cec89572e0986302965783d46453f615325387a774aab94eff4e4ed93d266a6eb', 1),
(26, 14, 'd46c53bf9404a2d069780b1abbb97ad67def5ec04d85b12ee49d043181d743142ca66e6da7e51f50a47e778fa91dde6f15d012683633f9c69e6db7de', 1),
(27, 14, '4c0de6c1119198ac2257f5eaae8b1fcfaaa6c908e4ab535ed89b21e2915862a2fe92fdf36796b5319a405585dcdad166b129beb91613be74c55a604a_2', 2),
(28, 14, 'b5abf25dfcd0cf075c322877f3defb685e72d9715a30a11187c4601e813f06c4b4414ed200e43ec47efdf9306a0fa9c2057cf554dc0c01c42601037b_3', 3),
(29, 15, 'bingo1', 1),
(30, 15, 'bingo_2', 2),
(31, 16, 'gui', 1),
(32, 17, '79176ff3832712c356a8e287414030056b9ac2e37f695d738db63f89ba6c466827b600f532f4b6a48854e20180c0f130e2b7c220766d09b9f3bbbf94', 1),
(33, 17, '152f574e2f9d7179cfc8887f9e31edc22cfe367b96b8f80b64909b74e04d018276d59af589f841f141c3eb8b199441cb742eae03e0ba705851b66387_2', 2),
(34, 17, 'adb340ada16b7ddc618f71a3ea21bb905f16d3d1d40717b5c26dfe654fefe4db2cc06d4f2b472ac1f3ad497ae9f9ff2b9fa7a387c36ca895eccd387d_3', 3),
(35, 18, 'PROD_288133504311', 1),
(36, 18, '8a762a7c004ccede1cfebb52815a26db_2', 2),
(37, 18, '5767224-800-auto_3', 3),
(38, 19, 'f1e9113912f85964c0658a6922015e80decddaa0b0650cfb242199181f12f12764527a2f9534e12bf6e407df4b9c1fc50734de1c4272c38bf2f2b986', 1),
(39, 19, '4d912300c3b3590b9818abe0e9d996072aa2d126b76e1235c14d1b335bb382c135b2ec94320b71841dc7102d2176a6350050b59ceb23186cef7e45f3_2', 2),
(40, 19, '61a5dfabff63c6b6d908414e5254f0c298e4eb409b27e396314baf939a19d4f8708788755e9a4019f5d2015e0f05383d543114c206ec0e6a88fbc17f_3', 3),
(41, 20, '57bee31c725d8e45a73888415cac206ab853556fbbae4c7e5432eec9cb50a585fdce80a9079a5694872f3e4204dca95fd7cba046465886b5cea439d7', 1),
(42, 20, '40407e3112bea0e3f92fcb29891b8adc84307ef3b20f27ae146dd1124a7f2601dd60f4f3552c8c07f77d73bb810e16967e2522d097e5647228ceb36f_2', 2),
(43, 21, 'cbb4715cfee4749720bde1ed66058bca55a4983379f6b0b6a0b3aa85ddf27c72316314684a7cd933639fd111b2403f9d15682eaa573979fa50a970fe', 1),
(44, 21, '1211-0b927511937b6e06d516905494252638-1024-1024_2', 2),
(45, 21, '131-bc620f70215119046216905494253920-1024-1024_3', 3),
(46, 22, '2e4e7cffdaec2a5788269955683c01489c96de42893b35b899ff3df0ba1c27334ff6ce14b9f041ebf8118f2fead5a560b92a5114d2f34dd9509aab4a', 1),
(47, 22, '3a285c78ab24e9be036a0002bac1a80b22d9eef4cad0b94d803a93c1be1230a9221f9dd275fd2b3de5ba5ce38b07137ce09cbec2455220f5d16e67a2_2', 2),
(48, 22, '84f972c9f61037a274155100408e6585b780038124da66afc2340eb59aee654ce4ff24930293b35d369224d0530e79fd6c1a717c71e2d7856f6121da_3', 3),
(49, 23, 'a2a8c5908d73fa0bebaf3d9c83326e2b228f44afc25a7db187c8b0703c5c9f1dee01eb408bbd4858fb05c497ee0af4e8adc8e63758b29950d7d3d80e', 1),
(50, 23, 'fa86f27cd7e0d3ad0365495a9884e9f34feb2f83a64b372e352ffd2e82bbefebd1fd55472510f0426984051cbe617274c592540dc58043b7258087a0_2', 2),
(51, 24, '147a0e7c811da29fcd11df82815144ea7d36526fb7c73bbf1ccee1cadd8d76b0ec40fd964d9e104e2649f593ff073940839a459e4a324bded252b995', 1),
(52, 24, '4e15dddd3031fd54fc8343dd3514e3d3f5a68c6a4f1d5651ed415b4974536a8c406f3ba1fdfb19db89ad50e77f5734f72d4993f04e820dc213295dbb_2', 2),
(53, 24, '85053c4a24cf0842f1e0dd9b0e1a597300cd4b73bd9cf783433bd2d89f88c457b70b06fc48b55c1b40ed2ca2f69a41659520c544f4334a550f99f1e8_3', 3),
(54, 25, '61hsC+UotVL._AC_SX569_', 1),
(58, 25, '9ec6b66f0416f872207603640c6a45903812c652bf43e5a9de53fd7eef25ed41f427289ee783296f78d08f82287db954de2deca8c32c6c962af3337f_3', 3),
(59, 26, '51Q6SxAZcRL._AC_SX569_', 1),
(60, 27, '71QUpZDSMVL._AC_SX569_', 1),
(61, 27, '71Em2Fkx+9L._AC_SX569__2', 2),
(62, 26, '51O-PDLzp0L._AC_SX569__2', 2),
(63, 26, '41BhJBFRccL._AC_SX569__3', 3),
(64, 28, '428b1f27302e15a864d8fe7869a79163b3784984a34fef6ac5fa1f4eedd14124e5d59643bed19a3bbfd6bf48256c515509dc5ab036822c94a3909301', 1),
(67, 29, '20d5232a3c7ab7f4598b33256f795310621bbeef4c85203e89687a54a0568ba708b792d44af0d7aef07f944b599899d05dc86b8204bc62ca8855635a', 1),
(68, 30, '412844ac1224e94e8fa1df82da4ef8121b36aef2dc9b002827a0ab356bb9c737b1600debad6c3dbfffbca053dd0fb62c3e03f5a0ae17d03eb8bb6f39', 1),
(70, 31, '35d6ce1e09292fa17efed8b49013218452d17d16492c1785d569dbf4db69173414c88c5d8204d8ed200b30495a49cdfeca35359ed2ca3af3ee6f4ca8', 1),
(71, 31, 'd3bcad5ab06651041a7c960179d6f59f270880eee887980a6da6d7c8f3ee0ae17ba737ddf13415cfe4c17c4c89aa2e0e4dfb57125935aedfda1f0e5b_2', 2),
(72, 31, '3dc8d81f931977b6a97c9c57d6e19770c74803a021e7046a438636eb41be2700e3d11c99cd356780a2479b8b86d0105b97d4374f19adc65bbc1524d4_3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `listadefavoritos`
--

CREATE TABLE `listadefavoritos` (
  `Codigo_Brinq` int NOT NULL,
  `Codigo_Usu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listadefavoritos`
--

INSERT INTO `listadefavoritos` (`Codigo_Brinq`, `Codigo_Usu`) VALUES
(8, 6),
(6, 6),
(4, 6),
(6, 9),
(7, 9),
(8, 9),
(1, 10),
(9, 13),
(7, 13),
(1, 19),
(15, 22),
(24, 26),
(29, 28),
(31, 28),
(9, 28),
(1, 30),
(29, 30),
(6, 30),
(28, 30),
(2, 31),
(11, 31),
(12, 31),
(17, 31),
(16, 31),
(1, 37),
(28, 37),
(27, 37),
(1, 38),
(29, 38),
(31, 38);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `Codigo_Pedido` int NOT NULL,
  `Codigo_Usu` int NOT NULL,
  `Codigo_Cupom` int DEFAULT NULL,
  `Preco_Total` double NOT NULL,
  `Forma_Pagamento` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Data_Pedido` datetime NOT NULL,
  `Status_Pedido` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`Codigo_Pedido`, `Codigo_Usu`, `Codigo_Cupom`, `Preco_Total`, `Forma_Pagamento`, `Data_Pedido`, `Status_Pedido`) VALUES
(5, 9, 1, 256.97, 'Pix', '2024-11-24 12:30:34', 'Finalizado'),
(6, 10, 1, 1301.79, 'Pix', '2024-11-24 12:43:12', 'Finalizado'),
(7, 13, 1, 244.98, 'Pix', '2024-11-24 15:12:42', 'Finalizado'),
(8, 12, 1, 417.47, 'Pix', '2024-11-24 18:29:44', 'Finalizado'),
(9, 14, 1, 49.99, 'Debito', '2024-11-25 23:38:03', 'Finalizado'),
(10, 14, 1, 19.99, 'Pix', '2024-11-25 23:49:03', 'Finalizado'),
(11, 14, 1, 30.99, 'Pix', '2024-11-25 23:53:00', 'Finalizado'),
(12, 15, 1, 219.98, 'Boleto', '2024-11-26 00:30:05', 'Finalizado'),
(13, 15, 1, 299.98, 'Pix', '2024-11-26 00:48:57', 'Finalizado'),
(14, 16, 1, 129.98, 'Pix', '2024-11-26 01:11:45', 'Finalizado'),
(15, 16, 1, 321, 'Boleto', '2024-11-26 01:14:17', 'Finalizado'),
(16, 17, 1, 168.99, 'Debito', '2024-11-26 23:50:49', 'Finalizado'),
(17, 19, 1, 69.5, 'Pix', '2024-11-27 13:42:56', 'Finalizado'),
(18, 19, 1, 64.99, 'Pix', '2024-11-27 13:49:04', 'Finalizado'),
(19, 22, 1, 29.99, 'Pix', '2024-11-28 14:24:39', 'Finalizado'),
(20, 23, 1, 61.99, 'Debito', '2024-11-28 14:28:14', 'Finalizado'),
(21, 27, 2, 523.688, 'Pix', '2024-11-29 10:02:40', 'Finalizado'),
(22, 27, 2, 74.112, 'Pix', '2024-11-29 10:29:41', 'Finalizado'),
(23, 30, 2, 162.792, 'Pix', '2024-11-29 11:46:59', 'Finalizado'),
(24, 30, 2, 47.992, 'Pix', '2024-11-29 11:50:08', 'Finalizado'),
(25, 28, 1, 238.08, 'Pix', '2024-11-29 11:59:27', 'Finalizado'),
(26, 31, 2, 841.552, 'Boleto', '2024-11-29 11:59:38', 'Finalizado'),
(27, 28, 2, 47.992, 'Pix', '2024-11-29 12:00:12', 'Finalizado'),
(28, 29, 1, 8.49, 'Pix', '2024-11-29 12:01:13', 'Finalizado'),
(29, 29, 1, 49.65, 'Pix', '2024-11-29 12:03:12', 'Finalizado'),
(30, 29, 1, 166.5, 'Boleto', '2024-11-29 12:04:56', 'Finalizado'),
(31, 29, 1, 42.99, 'Pix', '2024-11-29 12:06:25', 'Finalizado'),
(32, 32, 1, 16.99, 'Pix', '2024-11-29 12:10:28', 'Finalizado'),
(33, 33, 1, 899.75, 'Debito', '2024-11-29 12:11:42', 'Finalizado'),
(34, 32, 1, 200, 'Pix', '2024-11-29 12:13:51', 'Finalizado'),
(35, 33, 2, 24.792, 'Credito', '2024-11-29 12:14:40', 'Finalizado'),
(36, 32, 1, 200, 'Pix', '2024-11-29 12:15:06', 'Finalizado'),
(37, 32, 1, 78, 'Credito', '2024-11-29 12:16:19', 'Finalizado'),
(38, 34, 1, 496.15, 'Boleto', '2024-11-29 12:19:31', 'Finalizado'),
(39, 35, 1, 78, 'Pix', '2024-11-29 12:21:51', 'Finalizado'),
(40, 35, 1, 200, 'Boleto', '2024-11-29 12:23:59', 'Finalizado'),
(41, 30, 2, 5600, 'Credito', '2024-11-29 12:26:29', 'Finalizado'),
(42, 36, 1, 349.99, 'Credito', '2024-11-29 12:32:19', 'Finalizado'),
(43, 36, 1, 8.49, 'Pix', '2024-11-29 12:34:47', 'Finalizado'),
(44, 36, 1, 160.5, 'Pix', '2024-11-29 12:36:44', 'Finalizado'),
(45, 37, 2, 255.304, 'Credito', '2024-11-29 12:59:15', 'Finalizado'),
(46, 38, 2, 142.496, 'Pix', '2024-11-29 13:58:11', 'Finalizado');

-- --------------------------------------------------------

--
-- Table structure for table `sac`
--

CREATE TABLE `sac` (
  `Codigo_sac` int NOT NULL,
  `nome` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mensagem` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sac`
--

INSERT INTO `sac` (`Codigo_sac`, `nome`, `email`, `mensagem`) VALUES
(1, 'carlos', 'carloshrbarile@gmail.com', 'oi'),
(2, 'Miguel', 'migblad11@gmail.com', 'Quero mais cupons'),
(3, 'LUCAS BONFIM VILELA', 'lucasbvilela01@gmail.com', 'Mais formas de pagamento!'),
(4, 'José Diaz', 'josediaz@gmail.com', 'ola, estou com um problema'),
(5, 'Nome', 'email@gmail.com', 'dúvida'),
(6, 'nome', 'email@1', 'dúvida');

-- --------------------------------------------------------

--
-- Table structure for table `selo`
--

CREATE TABLE `selo` (
  `Codigo_Selo` int NOT NULL,
  `Nome_Selo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Imagem_Selo` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selo`
--

INSERT INTO `selo` (`Codigo_Selo`, `Nome_Selo`, `Imagem_Selo`) VALUES
(1, 'Sem Selo', ''),
(2, 'Deficiência Auditiva', 'Auditiva'),
(3, 'Deficiência Visual', 'Visual'),
(13, 'Deficiência Motora', 'Motora'),
(14, 'Deficiência Intelectual', 'Intelectual');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `Codigo_Usu` int NOT NULL,
  `Nome_Usu` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Nasc_Usu` date NOT NULL,
  `Celular_Usu` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email_Usu` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Senha_Usu` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `Tipo_Usu` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Token` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `Imagem` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`Codigo_Usu`, `Nome_Usu`, `Nasc_Usu`, `Celular_Usu`, `Email_Usu`, `Senha_Usu`, `Tipo_Usu`, `Token`, `Imagem`) VALUES
(1, 'Rosana Siqueira', '1987-12-09', '(11) 97521-1889', 'rosanasiq@gmail.com', '$2y$10$XZK56CKhQ99iIsuxIqIpTOrYEKlrOcvHerqZ8XR.bs62ZYWr.aiva', 'Cliente', '0d07950e4b66af163b072f370b03bf34c1db0ec5a0762c6ed0bf46818945d78c3c1a99c574feaddefb7b3b6e559779274fd6', '31b61e901b185be6e8a58a0730a45c4a75e1c2c491b720ae24786dd2d786b69cfd62157c144af03783c31ba3450d9c3455022457774b236727435b7f'),
(2, 'Ricardo Souza', '1993-11-09', '(11) 97492-1221', 'ricas@hotmail.com', '$2y$10$NJ.vVoz7s6UaPGYYx3qh3e85K12lqcbeSNaN6tFk8dIcBnKT41doa', 'Cliente', '6ee4c54eb63ec1e147030dcfcf128f8668a3fe811883ab42b2f8195080f52328fd42ea4da7a66e9127cfb658cd15c8167f98', '36ca795a7aef34ad8ad99a7bf4cf7847f0d74978c951cd6ad331f46f94194884f137e6d7e0fae988378005de66359163acc30516b5e85029fc8c7ada'),
(3, 'Cássio Gomes', '2006-12-01', '(11) 95853-3922', 'elcassio@gmail.com', '$2y$10$vozGTgSShePrI59.WxRnEeIObXf9mLD00FpkNhblQcO11g4e7v/XW', 'Cliente', 'e94d5498fafc9495ec2c02ae5fb6816c78112d3a76e74564ced749fb0f72f68700c26930884e0f7ed293743954f03ff3150e', 'c3b56e4dada6e6b3cdc4fcfa8db41604afc45a8b90d6705937096632b65a6d0448779658fdffda754009182bcc15a0bd3f0256e72467b2d9c3cedf25'),
(4, 'Guilherme Britos', '1993-01-03', '(11) 93812-1221', 'guigui@gmail.com', '$2y$10$IeX0NVHaz1QFrCcyU55SHOngBpYOPF.M2AjNa5x6l3mT7.i2azxIy', 'Cliente', 'f45743d8716100d1f325ebfae89461f200deacb16edce4caea592b020268dc8588f186697f6bca7d0141c04a9885caec8b80', '0e8d29d27681f1049882ba048a7ad6b394746a1a18d09663701fd94fdf4e012fe9282659daab86ad6f44f788ab9b8040f5a7d94b8227a542c86f3903'),
(5, 'Brito Carrero', '1988-12-08', '(11) 98612-3871', 'brito@gmail.com', '$2y$10$maUt5gopWT2QyGQwbvqvrOavMQLPZMvoAfZ/nwmJUf/nzDTegBUHG', 'Bloqueado', '756a229c0886b4ae0c9b13b488ca9234a2220f4a2b93b52b8b8c084cbcede53f8faa4ad988bd7768a938734c56021848ca0e', '41e988ec496a950e9b049be21b5f6ec8250fad053a968625421e8fcfc87fb01120b232ce90917010110e519d64565a3bfce8529928a27e1a5907b651'),
(7, 'Vinicius Augusto', '1994-06-25', '(11) 96808-0107', 'viniciusnini222@gmail.com', '$2y$10$nmkGuof9y8gP8nrlPAfuJ.vVqe896bNqFXBhqRub2YfJUSRzdCeQC', 'Cliente', 'f56081865148c48d5da8c506d7e9f11a54a3d0bc031a0fcf678d39f9ac145889262b86b7b57199c21080d1c992f929d0c2b5', 'vazio'),
(12, 'Pedro Bueno', '2110-12-08', '(11) 99529-1131', 'email@gmail', '$2y$10$ZFJDVVoliIuQY/U7/pLGNu.Luge.UDDUcAaCYP/Pt1QKgenDx21Ki', 'Cliente', '02a14bff2f53586ccc90dfd3aa1dff70f4ebf1cd4f84540348e4d142ca22018bc4d9fc8b41dd1a50d6ce3d9bf5142f02ca39', 'c73971aa13985eb61ff55eef33bfe7a74d10145ccc28ae33bd4a6828d88c52f344c7900409962aef2b523685c99db7b46a613fbd9cb50fbbb7b7670a'),
(14, 'José Diaz', '1989-07-12', '(77) 77777-7777', 'josediaz@gmail.com', '$2y$10$JNN2tmCBa8pNSJMfU4w6NOFAbMP5HFmx0Or9wzHPhb.pMdoficHaq', 'Cliente', 'ebc4804dac3d776b8785bfeb2a8bb9dbf895082ab95bae43825aab58950b255bf19048819a4f865795a528a90012a2c956f6', 'b05a1e4cd11e80b2b145387f6cd253d386f2941ab251123c66d8238cf3670724942abfe83bbe91eca4c417ed3918cd5f5b3f44e4ad0896bc932066d3'),
(15, 'fernando colecionador', '1999-09-30', '(44) 44477-7777', 'fernando@gmail.com', '$2y$10$8tQuWUREfGzy34BH/96JFuLuAdoi./sr2oruzEpOhXwQyTLxSd8hu', 'Cliente', '065c656d13e68887422c3e5c3fa193bdc326364d54bfc947c9dd25f690d614cc68f13f857dcb5bc31577fee148679ff3ec0b', '8536fecc31ad8bbaa966f453f6ed21aa37473b3716d03ccd5e0a13c5ccd087ef87f7ac2b5943bc285e825e60eefb8532dcc3089bcbc90a6ed8339de6'),
(16, 'yasmin silva', '1996-10-20', '(00) 00000-0000', 'yasmin@gmail.com', '$2y$10$G.L4bM/ujkCNsCJFXahV.OFShQVAU50lRASVIxbPkg3o3Z2e7Czh.', 'Cliente', '5a31404e2400c834718484bd3fd54e180f5b35b319f82e3acb9490e030c1d6b153b631c6b40e69921493387be697da8a2a94', 'c9b5fd0e2669c5238fc804f1ca66923cca1f8c629ecee5e168a83b004901dd260e89a9b7f1527b3e76872ad1e620d60b450414a2dc8a6983171cbf2e'),
(17, 'ana maria', '1974-12-09', '(44) 44000-0444', 'anamaria@gmail.com', '$2y$10$6UfnmOnGHrETczL1g5gTHeil/8qstUJlxs6ud5LkhwrgK9F6WbctS', 'Cliente', '05c831683c98c52223f36a058f56b4250048d1c7fa043db995b510edfe293284c3541b628b061ccdb5262849fe39bffb0c16', '31a2e99cde73a3b54159db9886efd82b13ce3c7baa8445fee50ad85602425120e6ee221417747fb1585f251d2d0643c7d8380624ead30424e0a83aeb'),
(18, 'Liana Flores', '2001-12-11', '(21) 99887-4455', 'lianaflores@gmail.com', '$2y$10$9xBzUf039G.lAbfB0Hmb0OBODx7av00xno5a6R99u08C/WR1o7NFC', 'Gerente', 'c2b5d86b90a8fe21f5ce412c886c53323b7bc05216be31795535db328687615a8f50778bfb4ec3f82ce0c667c9633d77e183', '30146e6f41e14cb817485bbef3bf8f4ecc648561aaa2487e018f3ace9d67c9a612c696095b27ed6769ec3a7000873f3a707347683706ab09f42f200a'),
(19, 'vinicius fernandes', '2008-02-04', '(55) 04002-8922', 'viniciusfernandes@gmail.com', '$2y$10$D/M.9e5VWdovZgv6B4wJveLwSLQcxWtIRRFDb3O0FBKKnSHtOpxvG', 'Bloqueado', '19b2a13ac845c0c607a3e51f3f3a99161255ee5ec0512cfa6fc95af071dc7b54cefa9059dd1304ba091e9839cb4769bb0a04', '36bd624defc9f337d34d7e94c7e6b384bcf44593ab99f30e67cedc03fdedc089bf37faf2d0704431d508879c2f0decc38135d5c627e24c9b84d0cfd6'),
(20, 'vinicius augusto', '2024-11-27', '(44) 44555-6666', 'viniciusaugusto@gmail', '$2y$10$lAHdXvlxrxcvvKxgQpggrecHd2B7XymellA1bRojAS.vwMDQPzJwC', 'Bloqueado', '02f126638578d6b62e634d7c93da44056bb2f76bdac711868f060ad38601ec15368adb5f93b347af001364590276080d22d0', '69c808f2316b17b6dac36026c1cbbff8d74e2525a5c421c416894877564e28a17460b54b85c26d420955c1dd500e4d93b643695892e67ed79a88773c'),
(21, 'Silvana Rosa', '1982-05-11', '(21) 93487-3523', 'silvana@gmail.com', '$2y$10$N.XgCXY86xTLb8Ltrumm2O5OkDa.HelfumTdSEmC1cD18clm8nCDO', 'Bloqueado', '322cec2b0d7ec9fda05e38d99f34ce80dbe50d5210e0ec2445584c10a46f44e7fb12bf75ca80d45d5abf5e4a43f076e2d625', 'vazio'),
(22, 'mariana josefa', '1990-07-22', '(11) 22334-4556', 'marianajosefa@gmail.com', '$2y$10$lsZNNnJeAM26lP3RdE6txe2TbMWDvLwgixcorn1jlpk6ZxkfS.YRq', 'Cliente', '3c4fdcfc237870cea097fff3603117bb6ac2a2cb0f9a09a1ba28fee2c459ba7c2392e7dcf6f5c20fcf986b929600cc550cb9', '228f9ba694c6ac6efbcda456293ca10d9061e8e8ca7693365903c3020474cdd80ba8101fc85c46fc0e8657c4133972b508826fd58ad3fe9dedece57b'),
(23, 'Mirela souza', '1998-01-31', '(00) 99887-7665', 'Mirelasouza@gmail.com', '$2y$10$RdolDqYfRNxG/7aOOhlaHORBkdA6OoNJ4FhHtHPsHcmfGxYp2gCCS', 'Cliente', 'ac387e80adb1b041ddadc9b1622da66eab926ae5326b3185d1980c50bdceb27549ca6532cd74ebe1c15f4a62a2ab04ee0e84', '7af3300880ef7c7ea559b89828e1e76e7ae85ac82c268b8d350e85aa708e0db328321746ca04734584b83541d5f9e3ad17ef69d132d3e72b60438324'),
(24, 'silvano andré', '2002-10-20', '(77) 66992-2445', 'silvanoandre@gmail.com', '$2y$10$9cVEMM4y625Byxs39WyQlO862yDoZU0wBRJA6PZblFfMuHgwSntCa', 'Cliente', 'eabf6635491364332c81274a84f3d1c1734485bfd1453e5de990a8f1daefdbf910c1d16cf1ff4f4a90ed31fa3394df3d8af4', 'vazio'),
(25, 'milena Frinhani', '1987-04-05', '(00) 22446-6880', 'milenafrinhani@gmail.com', '$2y$10$1aMcLUmleetYsUko69DIjuym7coNxkm2l8bBjIb7jSYMtNtmNhnne', 'Cliente', 'd292a1829742a7627ee1a4f5aa945c9025578ca0b695e3d261abf68b9800baa8054a63272138e1441b4f98d944789cecd311', 'c3b8f63f6c5d20bde6d3d94d4a76a92ae88be3ba827fbbd02340c4b3278e6eaccad06aaf1c4b138e32d5d11316ce6fc40e0e37b3b2047046408b53ee'),
(26, 'Cláudia Santos', '2000-06-09', '(61) 85227-1889', 'claudia@gmail.com', '$2y$10$jNFqFduL73uWUy4ujRT56ejN8HPK5n.BTsawYDvzO2E8z.JPoNky6', 'Cliente', '9a8eb4b2ff85266bf84c2505aeb0c7d2bcab946cb35f1f1e0db2b374bd55f89b9229dca3ae4a2f24bf0601f0993903c7987c', '9e047b70562b68c55772ea30e2cda6c2004bee1edc0521ce3489ac644461494e9d2e67ebbf4b05ad3ac99615034a3548e8e6bf27b9b0ade6efe188a7'),
(27, 'Carlos Barbosa', '1974-03-12', '(21) 99887-4455', 'carlos@gmail.com', '$2y$10$5JaRPinyfiU4w8wJs.i0BeZBWg32Psntwh3vRdvBBP1Kyooxlx3s6', 'Cliente', 'da59719322172ae83888ac4cc87125708cd839f3c84999bc692e531ba189a641d0b70caad56ab7b3e19272eadcb0022bdafe', 'vazio'),
(29, 'João silvano', '1975-11-29', NULL, 'joaosilvani@gmail.com', '$2y$10$uM5weAXTwzF0Dv7YK1wez.XI3rTQuuM2YwNfjK1Cf7XtBDTEjhc3O', 'Cliente', 'edd9d6eeee58362607c3953ac957a3d6389d6c3d05e7429528480701e3b7d057e888a186057c88292dad79ec5e5850bda689', 'vazio'),
(30, 'Lucas Bonfim', '2008-01-26', NULL, 'lucasbvilela01@gmail.com', '$2y$10$nAooUrXANT5mraqdcGNlZuy.gfic.iokjpXInlcXmeZQHU98IylBu', 'Bloqueado', '90cbf63a4c6c31c94004d92e8fe2c874722b80cee891edbd1376cec76a6d532fc2233fbaa0d0ec2a067c718e833c4d5715dc', 'a31a65371b4d11f19ca95d3694b1a7a908e5297fcad60d872710673b5fbfe4a713d5658425350f4bd4a37360234ee821cb20c30d5cc61d7f930a16fe'),
(31, 'João Neto ', '1987-08-18', NULL, 'joao15@email', '$2y$10$qV.TRPTIo3pbfZuMeVhijOIdGp3GxpJ6L5gvkRCvKLKs45NkTdg.W', 'Cliente', '8a10cd7888c74c9696ac53f85460813d5263de826715473c7a7c4e067a8417345569db949b1988889f749e46f32bbe6f4ed9', 'vazio'),
(32, 'Jônatas Palmieri', '2007-10-20', NULL, 'jonataspalmieri@gmail.com', '$2y$10$xDBJzLFcyAw2Bzb2iBx5neFk1pWikcbD3.NpjLl86X4Gc4CSmtqPu', 'Cliente', 'df206d1036730ead57714dbaebc38f2694767ca313c10a568bc4e62785800bdc3c35219defec59ba884391524096fd7f3941', '050c29bfc304bf6c0675699eaf5c99d9892b3352b28c93b73aa9cf552000ddb62cd6d93c8f408c159e669038f8ebf6bd4fdc94895e9d2055a2803345'),
(33, 'Ronaldo Azevedo', '1992-09-29', NULL, 'ronaldazevedo@email', '$2y$10$ITPVYgaHkfJiyFrVJSa.pefEUjb/45k8rn0ft9ekNz6N6rX7jckHO', 'Cliente', '46d0abc9d6e4a0c89909db32803575bc2e208d8a15c99bbe24863230d57966475c88e8dae5d5b32c67ea495102b2427127c3', 'vazio'),
(34, 'Humberto Silva ', '1975-07-21', NULL, 'Humberto@email', '$2y$10$j5LXC5U3nAzm5UCJgrJuGe2ulqWRMEGQSf.EAiv9MHrAdoa4dh5by', 'Cliente', '729fad5eb3492d2705106cb0ab66ae080688587b7125861cbc222601ea1e3fd394d026a49d25703ddbc04ee4f6541c418a5a', 'vazio'),
(35, 'José Albuquerque ', '1992-11-29', NULL, 'albuquerque@gmail.com', '$2y$10$3GMQ1ihUJQ07uu39pe10aun.9yNPz6CkV9sgUAg9bX9U2LxS2iB7W', 'Cliente', '5aa6e0ac022de6d5e9e11c7f9e31569f7f891cfce95c76ff02644f71b9d006dbfe28e4e5b88801d747751077a37c90bb1d7b', 'vazio'),
(36, 'David Romero Garcia ', '1995-11-29', '(55) 57774-8482', 'david@gmail.com', '$2y$10$5FN5Q2f3uIU93Vj2I3hU6.Yy/eupAHcOn50zyo.6bE1Cz4x5VtmM2', 'Cliente', '1dba4fd68b670957eeae498fe55260726426e4fc191070977afa5f140f726d40b8923af35abde05dcab145e7aa27e256d54f', 'dbf55af81018782398ed55c3c6948cd211981478226936f98b3f5d2fb740902b052de9373a408dcee95c82135e1e4808480586584b693b3706f622a4'),
(37, 'Nome sobrenomes', '2000-11-11', '', 'email@gmail.com', '$2y$10$4DtpRlRqe/Tad31tOpo7weqno5HuawQYsABP9gUdYmJvtSlBYREe2', 'Cliente', 'ad4f1dc7b9b3135cce4b63c4df97633e65b8460c493135d257f337c4b9384257841f8193a4290ad203eb9333aeb6f4facafc', 'vazio'),
(38, 'nome sobrenomes', '2000-11-11', '', 'email123@email', '$2y$10$1hRPpjOV4KCVYZz4DD09RuVf03gEgBFVJTQLUWeKzbW87mLI5aVz2', 'Cliente', '6dd618b92400b4fb97c8b78bc9b6794f6fc08c0e5045b92c7cc1e76f91e469588abfcd93ed98f5b3b84a5600eebbc5545325', 'vazio'),
(39, 'Guilherme teste', '2004-07-19', NULL, 'guilhermeteste@gmail.com', '$2y$10$e2PC0KQBAH10jdnoWD.1s.ByNaCOh9CUomVyjItq29LSpZaN4id4S', 'Cliente', 'be94429adc3ad9b4cb8217bec69a0bff16820755345a6fbc27d7aeb5b6b93c20f5a48759af46b6f0778ade8cdcade5abab2d', 'vazio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`Codigo_Ava`),
  ADD KEY `Codigo_Brinq_Ava` (`Codigo_Brinq`),
  ADD KEY `Codigo_Usu_Ava` (`Codigo_Usu`);

--
-- Indexes for table `brinquedo`
--
ALTER TABLE `brinquedo`
  ADD PRIMARY KEY (`Codigo_Brinq`),
  ADD KEY `Codigo_Selo_Brinq` (`Codigo_Selo`),
  ADD KEY `Codigo_Categoria_Brinq` (`Codigo_Categoria`);

--
-- Indexes for table `brinqvendido`
--
ALTER TABLE `brinqvendido`
  ADD PRIMARY KEY (`Codigo_BrinqVendido`),
  ADD KEY `Codigo_Pedido_BrinqVendido` (`Codigo_Pedido`),
  ADD KEY `Codigo_Brinq_BrinqVendido` (`Codigo_Brinq`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Codigo_Categoria`);

--
-- Indexes for table `cupom`
--
ALTER TABLE `cupom`
  ADD PRIMARY KEY (`Codigo_Cupom`);

--
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`Codigo_Imagem`),
  ADD KEY `Codigo_Brinq_Imagem` (`Codigo_Brinq`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Codigo_Pedido`),
  ADD KEY `Codigo_Usu_Pedido` (`Codigo_Usu`),
  ADD KEY `Codigo_Cupom_Pedido` (`Codigo_Cupom`);

--
-- Indexes for table `sac`
--
ALTER TABLE `sac`
  ADD PRIMARY KEY (`Codigo_sac`);

--
-- Indexes for table `selo`
--
ALTER TABLE `selo`
  ADD PRIMARY KEY (`Codigo_Selo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Codigo_Usu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `Codigo_Ava` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `brinquedo`
--
ALTER TABLE `brinquedo`
  MODIFY `Codigo_Brinq` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `brinqvendido`
--
ALTER TABLE `brinqvendido`
  MODIFY `Codigo_BrinqVendido` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Codigo_Categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cupom`
--
ALTER TABLE `cupom`
  MODIFY `Codigo_Cupom` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `Codigo_Imagem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Codigo_Pedido` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sac`
--
ALTER TABLE `sac`
  MODIFY `Codigo_sac` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `selo`
--
ALTER TABLE `selo`
  MODIFY `Codigo_Selo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Codigo_Usu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `Codigo_Brinq_Ava` FOREIGN KEY (`Codigo_Brinq`) REFERENCES `brinquedo` (`Codigo_Brinq`),
  ADD CONSTRAINT `Codigo_Usu_Ava` FOREIGN KEY (`Codigo_Usu`) REFERENCES `usuario` (`Codigo_Usu`);

--
-- Constraints for table `brinquedo`
--
ALTER TABLE `brinquedo`
  ADD CONSTRAINT `Codigo_Categoria_Brinq` FOREIGN KEY (`Codigo_Categoria`) REFERENCES `categoria` (`Codigo_Categoria`),
  ADD CONSTRAINT `Codigo_Selo_Brinq` FOREIGN KEY (`Codigo_Selo`) REFERENCES `selo` (`Codigo_Selo`);

--
-- Constraints for table `brinqvendido`
--
ALTER TABLE `brinqvendido`
  ADD CONSTRAINT `Codigo_Brinq_BrinqVendido` FOREIGN KEY (`Codigo_Brinq`) REFERENCES `brinquedo` (`Codigo_Brinq`),
  ADD CONSTRAINT `Codigo_Pedido_BrinqVendido` FOREIGN KEY (`Codigo_Pedido`) REFERENCES `pedido` (`Codigo_Pedido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
