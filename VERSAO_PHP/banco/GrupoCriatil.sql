-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3789
-- Generation Time: Nov 28, 2024 at 12:42 AM
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
(18, 9, 14, 4, 'não testei ainda mas é um cubo lindo', 'Lindo'),
(19, 2, 15, 5, 'comprei logo dois, bonito demais', 'muito bonito'),
(20, 11, 15, 5, 'é o batman, não tem com não gostar', 'meu herói favorito'),
(21, 12, 15, 5, 'funko brabo do gandalf o branco', 'voce não vai passar'),
(22, 13, 16, 4, 'As cartas são bem sensíveis mas meu filho adorou', 'meu filho amou'),
(23, 6, 16, 4.5, 'achei um pouco cara, mas é de boa qualidade', 'bola'),
(24, 14, 17, 5, 'lindo tabuleiro', 'gostei'),
(25, 15, 17, 5, 'agora é minha vez de se divertir rs', 'adorei'),
(26, 2, 17, 5, 'vou dar de presente pro meu netinho', 'muito bonito'),
(27, 14, 19, 3.5, 'Da pra jogar de 3?', 'To na duvida');

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
(1, 1, 1, 'Pelúcia Hatsune Miku', 59.99, 3, 'Plush Japan', 'Uma pelúcia da Hatsune Miku do grupo artístico VOCALOID - 100% Algodão', 'Livre', 0),
(2, 1, 2, 'Ralsei Funko Pop', 109.99, 4.5, 'FunkoMake', 'Um Funko Pop do personagem Ralsei criado por Toby Fox em DELTARUNE - Feito na China.', 'Livre', 0),
(3, 1, 1, 'Pelúcia Ralsei', 49.99, 2, 'Plush Japan', 'Uma pelúcia do personagem Ralsei (ASRIEL) de DELTARUNE - Embarque em mundos mágicos e sombrios com esse boneco exclusivo. 100% ALGODÃO [PRODUTO EM FALTA]', 'Livre', 1),
(4, 2, 10, 'Alfabeto Libras', 49.99, 4, 'TOYSTER', 'Aprendendo o alfabeto em libras - Ensine seus filhos o alfabeto em libras de uma maneira simples e divertida!', '4+', 0),
(5, 3, 6, 'Jogo da Velha Tátil', 19.99, 4, 'Montesorri', 'Um tabuleiro de jogo da velha interativo/tátil para divertir as crianças - Feito com base de madeira, ele possui peças igualmente em madeira, essa peça é uma ótima opção para um jogo rápido entre filhos, familiares e amigos!', '4+', 0),
(6, 3, 8, 'Bola de Futebol Acessível', 160.5, 5, 'FUT-5', 'Desenvolvida com guizos internos para melhor localização dos atletas com deficiência visual, a Bola para Futebol Acessível possui a alta tecnologia da marca Ludwig - Diversão igual para todos!', '7+', 0),
(7, 1, 8, 'Nerf Elite 2.0', 104, 3, 'NERF', 'Com os blasters Nerf Elite 2.0, a batalha atinge um novo nível. Se divirta com todos os amigos no campo! ', '13+', 0),
(8, 1, 2, 'Oshawott Funko Pop', 101.99, 4.5, 'Funko Pop', 'Leve o pokémon Oshawott para sua coleção! Este Funko Pop original captura o charme único do Pokémon aquático de Unova - Perfeito para fãs e colecionadores!', 'Livre', 0),
(9, 1, 9, 'Cubo Mágico', 30.99, 4, 'Puzzle Solutions', 'O clássico Cubo Mágico; o desafio ideal para a diversão. Não recomendado para menores de 4 anos - peças digestíveis.', '4+', 0),
(11, 1, 12, 'Batman Action Figure', 200, 5, 'dc comics', 'Um Action figure do clássico Cavaleiro das Trevas da DC, Batman', '10', 0),
(12, 1, 2, 'Gandalf Funko Pop', 149.5, 5, 'pop!', 'O Funko Pop do mago Gandalf, o Branco agora disponível ', '10', 0),
(13, 3, 7, 'Uno Braille', 64.99, 5, 'Mattel', 'O clássico jogo de cartas UNO agora está disponível com braille incluido', '4+', 0),
(14, 3, 9, 'xadrez adaptado', 69.5, 5, 'xadrez', 'Tabuleiro estojo adaptado no sistema Braille. Letras e números do sistema Braille são representados em forma de relevo. Possui orifícios para encaixe das peças com cavilhas.', '4+', 0),
(15, 1, 9, 'bingo', 29.99, 5, 'Bingo Premium', 'um bingo especial para a diversão todas as famílias e idades', '4+', 0),
(16, 1, 5, 'guitarra', 49, 0, 'mattel', 'Este brinquedo de guitarrinha estimula o gosto pela música e desenvolve a criança num todo!', '+3', 0);

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
(25, 18, 13, 1);

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
(1, '', 1, 0);

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
(29, 15, '1a80bd27396a4a5fcc8e10cf3a3ec7b272366dbba1f8d2bf8d3f6ea2728688106d8d7ce892a2be9294a015463d5f6d1eb6c282ee1436cfd7f3e59fab', 1),
(30, 15, '4382ae8b640b5fc235a2b45ec64d9734d6fa50bb78fe176c3c4a6ce3dae9405c1d244eb2c2f92210d0b458dbd4e394c6821cc3f496a7bea043345102_2', 2),
(31, 16, 'gui', 1);

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
(9, 12),
(7, 12),
(8, 12),
(6, 12),
(5, 12),
(1, 19);

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
(18, 19, 1, 64.99, 'Pix', '2024-11-27 13:49:04', 'Finalizado');

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
(3, 'LUCAS BONFIM VILELA', 'lucasbvilela01@gmail.com', 'Mais formas de pagamento!');

-- --------------------------------------------------------

--
-- Table structure for table `selo`
--

CREATE TABLE `selo` (
  `Codigo_Selo` int NOT NULL,
  `Nome_Selo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Imagem_Selo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selo`
--

INSERT INTO `selo` (`Codigo_Selo`, `Nome_Selo`, `Imagem_Selo`) VALUES
(1, 'Sem Selo', ''),
(2, 'Deficiência Auditiva', 'Auditiva'),
(3, 'Deficiência Visual', 'Visual');

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
(8, 'Hatsune Miku', '1999-11-11', '(21) 99887-4455', 'mikumedesuasforcas@gmail.com', '$2y$10$TQSpD7VL0TTCV2ttSLSkue.8iGK5tPUj74RxYi5U58hKe05Bj1AJS', 'Cliente', 'a910d8fb0421f7afb0739e7c28136892d10e7a8b17d37bc731fef324c89a643555637129edd012a4bdf99adb5f418e5f5e4a', 'vazio'),
(12, 'Avaliador Pedro', '2110-12-08', '(01) 92873-0182', 'email@gmail', '$2y$10$ZFJDVVoliIuQY/U7/pLGNu.Luge.UDDUcAaCYP/Pt1QKgenDx21Ki', 'Gerente', '1baf66dc46a0c69c2df8d4da0d3cb86ae67dd9e759eaa91017bacc233830f69c2c366882a23ea17336aa5f9d1b49c0e52602', 'cf66dcdc31228b8f3d6aae2911a481f2ac45940e6fc4d449672960724f32b9b052df6908b7fbff088657d5d79af746b03a795a40213bf31e0b939dbb'),
(14, 'José Diaz', '1989-07-12', '(77) 77777-7777', 'josediaz@gmail.com', '$2y$10$JNN2tmCBa8pNSJMfU4w6NOFAbMP5HFmx0Or9wzHPhb.pMdoficHaq', 'Cliente', '9aedf194d09d3169a516b0ecdaab1fdfc863d42677052d3645dfc454a07190c6b31faa677d112536dd95dcc2a1d57cd9392d', 'b05a1e4cd11e80b2b145387f6cd253d386f2941ab251123c66d8238cf3670724942abfe83bbe91eca4c417ed3918cd5f5b3f44e4ad0896bc932066d3'),
(15, 'fernando colecionador', '1999-09-30', '(44) 44477-7777', 'fernando@gmail.com', '$2y$10$8tQuWUREfGzy34BH/96JFuLuAdoi./sr2oruzEpOhXwQyTLxSd8hu', 'Cliente', '065c656d13e68887422c3e5c3fa193bdc326364d54bfc947c9dd25f690d614cc68f13f857dcb5bc31577fee148679ff3ec0b', '8536fecc31ad8bbaa966f453f6ed21aa37473b3716d03ccd5e0a13c5ccd087ef87f7ac2b5943bc285e825e60eefb8532dcc3089bcbc90a6ed8339de6'),
(16, 'yasmin silva', '1996-10-20', '(00) 00000-0000', 'yasmin@gmail.com', '$2y$10$G.L4bM/ujkCNsCJFXahV.OFShQVAU50lRASVIxbPkg3o3Z2e7Czh.', 'Cliente', '5a31404e2400c834718484bd3fd54e180f5b35b319f82e3acb9490e030c1d6b153b631c6b40e69921493387be697da8a2a94', 'c9b5fd0e2669c5238fc804f1ca66923cca1f8c629ecee5e168a83b004901dd260e89a9b7f1527b3e76872ad1e620d60b450414a2dc8a6983171cbf2e'),
(17, 'ana maria', '1974-12-09', '(44) 44000-0444', 'anamaria@gmail.com', '$2y$10$6UfnmOnGHrETczL1g5gTHeil/8qstUJlxs6ud5LkhwrgK9F6WbctS', 'Cliente', '05c831683c98c52223f36a058f56b4250048d1c7fa043db995b510edfe293284c3541b628b061ccdb5262849fe39bffb0c16', '31a2e99cde73a3b54159db9886efd82b13ce3c7baa8445fee50ad85602425120e6ee221417747fb1585f251d2d0643c7d8380624ead30424e0a83aeb'),
(18, 'Liana Flores', '2001-12-11', '(21) 99887-4455', 'lianaflores@gmail.com', '$2y$10$9xBzUf039G.lAbfB0Hmb0OBODx7av00xno5a6R99u08C/WR1o7NFC', 'Gerente', '6d997fcfeb5700125ed138eb170124516a37009db5988400c2366314407d7b8b90fa35c13764507b597b9c4ff556c9a427c9', '30146e6f41e14cb817485bbef3bf8f4ecc648561aaa2487e018f3ace9d67c9a612c696095b27ed6769ec3a7000873f3a707347683706ab09f42f200a'),
(19, 'vinicius fernandes', '2008-02-04', '(55) 04002-8922', 'viniciusfernandes@gmail.com', '$2y$10$D/M.9e5VWdovZgv6B4wJveLwSLQcxWtIRRFDb3O0FBKKnSHtOpxvG', 'Cliente', 'b4dc70a4d9a1034a63cf6ae16b1f94f4088af89fb715cc61434066acb9a4b4c1ed41e3c549b51fb8c64db82605503374f681', '36bd624defc9f337d34d7e94c7e6b384bcf44593ab99f30e67cedc03fdedc089bf37faf2d0704431d508879c2f0decc38135d5c627e24c9b84d0cfd6'),
(20, 'vinicius augusto', '2024-11-27', '(44) 44555-6666', 'viniciusaugusto@gmail', '$2y$10$lAHdXvlxrxcvvKxgQpggrecHd2B7XymellA1bRojAS.vwMDQPzJwC', 'Cliente', '02f126638578d6b62e634d7c93da44056bb2f76bdac711868f060ad38601ec15368adb5f93b347af001364590276080d22d0', '69c808f2316b17b6dac36026c1cbbff8d74e2525a5c421c416894877564e28a17460b54b85c26d420955c1dd500e4d93b643695892e67ed79a88773c');

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
  MODIFY `Codigo_Ava` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `brinquedo`
--
ALTER TABLE `brinquedo`
  MODIFY `Codigo_Brinq` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `brinqvendido`
--
ALTER TABLE `brinqvendido`
  MODIFY `Codigo_BrinqVendido` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Codigo_Categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cupom`
--
ALTER TABLE `cupom`
  MODIFY `Codigo_Cupom` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `Codigo_Imagem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Codigo_Pedido` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sac`
--
ALTER TABLE `sac`
  MODIFY `Codigo_sac` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `selo`
--
ALTER TABLE `selo`
  MODIFY `Codigo_Selo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Codigo_Usu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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

--
-- Constraints for table `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `Codigo_Brinq_Imagem` FOREIGN KEY (`Codigo_Brinq`) REFERENCES `brinquedo` (`Codigo_Brinq`);

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `Codigo_Cupom_Pedido` FOREIGN KEY (`Codigo_Cupom`) REFERENCES `cupom` (`Codigo_Cupom`),
  ADD CONSTRAINT `Codigo_Usu_Pedido` FOREIGN KEY (`Codigo_Usu`) REFERENCES `usuario` (`Codigo_Usu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
