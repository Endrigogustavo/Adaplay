-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/11/2023 às 23:58
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
-- Banco de dados: `db_adaplay`
--

CREATE DATABASE `db_adaplay`;

USE `db_adaplay`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_nome` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_senha` varchar(255) NOT NULL,
  `admin_imagem` text NOT NULL,
  `admin_contato` varchar(255) NOT NULL,
  `admin_pais` text NOT NULL,
  `admin_trabalho` varchar(255) NOT NULL,
  `admin_sobre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_nome`, `admin_email`, `admin_senha`, `admin_imagem`, `admin_contato`, `admin_pais`, `admin_trabalho`, `admin_sobre`) VALUES
(2, 'Administrator', 'admin@mail.com', 'senhaword@123', 'user-profile-min.png', '7777775500', 'Morocco', 'Front-End Developer', ' Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum senhaage, and going through the cites of the word in classical ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_preço` varchar(255) NOT NULL,
  `tamanho` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`p_id`, `ip_add`, `qty`, `p_preço`, `tamanho`) VALUES
(33, '::1', 0, '', 'Select a Size'),
(34, '::1', 0, '', 'Select a Size');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `cat_id` int(10) NOT NULL,
  `cat_título` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_imagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_título`, `cat_top`, `cat_imagem`) VALUES
(2, 'Feminine', 'no', 'feminelg.png'),
(3, 'Kids', 'no', 'kidslg.jpg'),
(4, 'Others', 'yes', 'othericon.png'),
(5, 'Men', 'yes', 'malelg.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(10) NOT NULL,
  `cliente_nome` varchar(255) NOT NULL,
  `cliente_email` varchar(255) NOT NULL,
  `cliente_senha` varchar(255) NOT NULL,
  `cliente_país` text NOT NULL,
  `cliente_cidade` text NOT NULL,
  `cliente_contact` varchar(255) NOT NULL,
  `cliente_endereco` text NOT NULL,
  `cliente_image` text NOT NULL,
  `cliente_ip` varchar(255) NOT NULL,
  `cliente_confirm_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `cliente_nome`, `cliente_email`, `cliente_senha`, `cliente_país`, `cliente_cidade`, `cliente_contact`, `cliente_endereco`, `cliente_image`, `cliente_ip`, `cliente_confirm_code`) VALUES
(2, 'user', 'user@ave.com', '123', 'United State', 'New York', '0092334566931', 'new york', 'user.jpg', '::1', ''),
(3, 'Demo Cliente', 'demo@cliente.com', 'Passarword123', 'DemoPaís', 'DemoCity', '700000000', 'DemoAddress', 'sample_image.jpg', '::1', ''),
(4, 'Thomas', 'thomas@demo.com', 'Passarword123', 'One País', 'One City', '777777777', '111 Address', 'sample_img360.png', '::1', '1427053935'),
(5, 'Fracis', 'test@cliente.com', 'Passarword123', 'US', 'Demo City', '780000000', '112 Bleck Street', 'userav-min.png', '::1', '1634138674'),
(6, 'Sample Cliente', 'cliente@mail.com', 'Passarword123', 'Sample País', 'Sample City', '7800000000', 'Sample Address', 'user-icn-min.png', '::1', '174829126'),
(8, 'Guilherme', 'Alex@gmail.com', '123', '', '', '(11) 4002-8922', '4', 'download (6).jpg', '::1', ''),
(9, 'Guilherme', 'guilhermebarreto072@gmail.com', '123', '12', '12', '(11) 4002-8922', '3', 'download (6).jpg', '::1', ''),
(10, 'eeeeagEWGAWG', 'eeeee@eee', '12344', '', '', '33', '33', 'ECMyixRXYAEPt5y.jpg', '::1', ''),
(11, 'Endrigo', 'Teste10@gmail.com', '111', '', '', '1111', '111', '74_by_dinocozero_d92wmbw.png', '::1', ''),
(12, 'Endrigo', 'TesteApi@e', 'qqqq', '', '', '11', 'Rua virginia de miranda', 'Ayv_edna.jpg', '::1', ''),
(13, 'testeApi', 'gdjjdjd@ee', '111', '', '', 'qq', 'Avenida Paulista - Bela Vista, São Paulo - SP, Brasil', '__hanako_and_yashiro_and_kou__render__by_stardustinqs_dedrx6e.png', '::1', ''),
(14, 'eeeeeeeeeeeee', 'eeeeeeeeee@eeee', '111', '', '', '1111', 'Rua Augusta - Consolação, São Paulo - SP, Brasil', 'MicrosoftTeams-image.png', '::1', ''),
(15, 'eeeeeeeeeeeee', 'eeeeeeeeee@eeee', '111', '', '', '1111', 'Rua Augusta - Consolação, São Paulo - SP, Brasil', 'MicrosoftTeams-image.png', '::1', ''),
(16, 'eeeeeeeeeeeee', 'eeeeeeeeee@eeee', '111', '', '', '1111', 'Rua Augusta - Consolação, São Paulo - SP, Brasil', 'MicrosoftTeams-image.png', '::1', ''),
(17, 'eeeeeeeeeeeee', 'eeeeeeeeee@eeee', '111', '', '', '1111', 'Rua Augusta - Consolação, São Paulo - SP, Brasil', 'MicrosoftTeams-image.png', '::1', ''),
(18, 'bb', 'ee@ee', '11', '', '', '11e', 'Expo Center Norte - Rua José Bernardo Pinto - Vila Guilherme, São Paulo - SP, Brasil', 'MicrosoftTeams-image.png', '::1', ''),
(19, 'ee', 'eeee@e', 'eee', '', '', 'ee', 'We Coffee - Avenida Paulista - Bela Vista, São Paulo - SP, Brasil', 'Ayv_edna.jpg', '::1', ''),
(20, 'ee', 'eeeeeeeeeeeeee@e', 'bb', '', '', '1111', 'Brás, São Paulo - SP, Brasil', 'klee_genshin_impact_character_render_by_deg5270_de910q8.png', '::1', ''),
(21, 'eee', 'eee@eee', 'eee', '', '', 'eee', 'Espaço Unimed - Rua Tagipuru - Barra Funda, São Paulo - SP, Brasil', 'Hospital.drawio (1).png', '::1', ''),
(22, 'eee', 'eee@33', 'ee', '', '', 'eee', 'Estádio do Morumbi - Praça Roberto Gomes Pedrosa - Morumbi, São Paulo - SP, Brasil', 'anime_girl_render_by_nanavichan_dfhqi3i.png', '::1', ''),
(23, 'ee', 'eee@ee', '1', '', '', '11', '25 de Março - Centro Histórico de São Paulo, São Paulo - SP, Brasil', 'IMG-20231015-WA0000.jpeg', '::1', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente_ordens`
--

CREATE TABLE `cliente_ordens` (
  `ordem_id` int(10) NOT NULL,
  `cliente_id` int(10) NOT NULL,
  `due_quantia` int(100) NOT NULL,
  `fatura_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `tamanho` text NOT NULL,
  `ordem_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ordem_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `cliente_ordens`
--

INSERT INTO `cliente_ordens` (`ordem_id`, `cliente_id`, `due_quantia`, `fatura_no`, `qty`, `tamanho`, `ordem_date`, `ordem_status`) VALUES
(33, 7, 120, 868259345, 1, 'Pequeno', '2023-08-16 14:03:15', 'pendente'),
(34, 7, 90, 800308188, 1, 'Pequeno', '2023-08-16 15:20:11', 'pendente'),
(35, 7, 90, 631149204, 1, 'Pequeno', '2023-08-25 00:13:22', 'pendente'),
(36, 7, 120, 714565636, 1, 'Pequeno', '2023-09-15 06:54:38', 'pendente'),
(37, 9, 466, 1928425727, 1, 'Pequeno', '2023-09-17 05:24:29', 'Complete'),
(38, 9, 55, 1638651532, 1, 'Pequeno', '2023-09-17 05:32:04', 'pendente'),
(39, 9, 800, 1256324032, 1, 'Pequeno', '2023-09-18 03:01:58', 'pendente'),
(40, 9, 80, 1256324032, 1, 'Pequeno', '2023-09-18 03:01:58', 'pendente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato_nos`
--

CREATE TABLE `contato_nos` (
  `contato_id` int(10) NOT NULL,
  `contato_email` text NOT NULL,
  `contato_cabeçalho` text NOT NULL,
  `contato_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `contato_nos`
--

INSERT INTO `contato_nos` (`contato_id`, `contato_email`, `contato_cabeçalho`, `contato_desc`) VALUES
(1, 'Adaplay@mail.com', 'Fale Conosco', 'Teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cupons`
--

CREATE TABLE `cupons` (
  `cupom_id` int(10) NOT NULL,
  `produto_id` int(10) NOT NULL,
  `cupom_título` varchar(255) NOT NULL,
  `cupom_preço` varchar(255) NOT NULL,
  `cupom_code` varchar(255) NOT NULL,
  `cupom_limit` int(100) NOT NULL,
  `cupom_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `cupons`
--

INSERT INTO `cupons` (`cupom_id`, `produto_id`, `cupom_título`, `cupom_preço`, `cupom_code`, `cupom_limit`, `cupom_used`) VALUES
(8, 25, 'Teste ', '200', 'GUILHERME', 5, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fabricantes`
--

CREATE TABLE `fabricantes` (
  `fabricante_id` int(10) NOT NULL,
  `fabricante_título` text NOT NULL,
  `fabricante_top` text NOT NULL,
  `fabricante_imagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `fabricantes`
--

INSERT INTO `fabricantes` (`fabricante_id`, `fabricante_título`, `fabricante_top`, `fabricante_imagem`) VALUES
(2, 'Adidas', 'no', 'adilg.png'),
(3, 'Nike', 'no', 'niketransl.png'),
(4, 'Philip Plein', 'no', 'pplg.png'),
(5, 'Lacoste', 'no', 'lacostelg.png'),
(7, 'Polo', 'no', 'polobn.jpg'),
(8, 'Gildan 1800', 'no', 'sample_img360.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lista_de_desejos`
--

CREATE TABLE `lista_de_desejos` (
  `Lista_de_Desejos_id` int(10) NOT NULL,
  `cliente_id` int(10) NOT NULL,
  `produto_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagem_clients`
--

CREATE TABLE `mensagem_clients` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `assunto` varchar(220) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `mensagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mensagem_clients`
--

INSERT INTO `mensagem_clients` (`id`, `nome`, `email`, `assunto`, `telefone`, `mensagem`) VALUES
(2, 'endrigobjisçk', 'wekfjnewfk@rr', 'Reclamação de Produto', '(11) 11111-1111', 'eeeeeee'),
(4, 'E', 'e@e', 'Reclamação de Produto', '(11) 11111-1111', '11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacote_produto_relação`
--

CREATE TABLE `pacote_produto_relação` (
  `rel_id` int(10) NOT NULL,
  `rel_título` varchar(255) NOT NULL,
  `produto_id` int(10) NOT NULL,
  `pacote_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `pagamento_id` int(10) NOT NULL,
  `fatura_no` int(10) NOT NULL,
  `quantia` int(10) NOT NULL,
  `pagamento_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `pagamento_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `pagamentos`
--

INSERT INTO `pagamentos` (`pagamento_id`, `fatura_no`, `quantia`, `pagamento_mode`, `ref_no`, `code`, `pagamento_date`) VALUES
(8, 1835758347, 480, 'Bank Code', 1012125550, 66500, '09-14-2021'),
(9, 1144520, 480, 'Bank Code', 1025000020, 66990, '09-14-2021'),
(10, 2145000000, 480, 'Bank Code', 2147483647, 66580, '09-14-2021'),
(20, 858195683, 100, 'Bank Code', 1400256000, 47850, '09-13-2021'),
(21, 2138906686, 120, 'Bank Code', 1455000020, 202020, '09-13-2021'),
(22, 2138906686, 120, 'Bank Code', 1450000020, 202020, '09-15-2021'),
(23, 361540113, 180, 'Western Union', 1470000020, 12001, '09-15-2021'),
(24, 361540113, 180, 'UBL/Omni', 1258886650, 200, '09-15-2021'),
(25, 901707655, 245, 'Western Union', 1200002588, 88850, '09-15-2021'),
(26, 12131313, 0, 'UBL/Omni', 121, 0, '2023-09-17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pendente_ordens`
--

CREATE TABLE `pendente_ordens` (
  `ordem_id` int(10) NOT NULL,
  `cliente_id` int(10) NOT NULL,
  `fatura_no` int(10) NOT NULL,
  `produto_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `tamanho` text NOT NULL,
  `ordem_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `produto_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `fabricante_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `produto_título` text NOT NULL,
  `produto_url` text NOT NULL,
  `produto_img1` text NOT NULL,
  `produto_img2` text NOT NULL,
  `produto_img3` text NOT NULL,
  `produto_preço` int(10) NOT NULL,
  `produto_psp_preço` int(100) NOT NULL,
  `produto_desc` text NOT NULL,
  `produto_features` text NOT NULL,
  `produto_video` text NOT NULL,
  `produto_keywords` text NOT NULL,
  `produto_label` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`produto_id`, `p_cat_id`, `cat_id`, `fabricante_id`, `date`, `produto_título`, `produto_url`, `produto_img1`, `produto_img2`, `produto_img3`, `produto_preço`, `produto_psp_preço`, `produto_desc`, `produto_features`, `produto_video`, `produto_keywords`, `produto_label`, `status`) VALUES
(25, 4, 3, 2, '2023-09-16 23:03:38', 'Teste', 'TesteUrl', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 350, 300, '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Teste', 'Presente', 'produto'),
(26, 5, 3, 3, '2023-09-16 22:55:36', 'Teste - 2', 'Teste2Url', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 800, 400, '\r\nbbbbbbbbb\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n', 'Teste 2', 'Novo', 'produto'),
(27, 6, 4, 4, '2023-09-16 23:03:51', 'Teste - 3', 'Teste3Url', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 200, 100, '\r\nccccccccccccccccccc\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n', 'Teste - 3 ', 'Oferta', 'produto'),
(28, 7, 5, 5, '2023-09-16 23:13:26', 'Teste - 4', 'Teste4Url', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 50, 40, '\r\n\r\ncccccccccccccc', '\r\n\r\n', '\r\n\r\n', 'Teste - 4', 'Novo', 'produto'),
(29, 9, 2, 7, '2023-09-16 23:15:05', 'Teste - 5', 'Teste5Url', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 500, 466, '\r\n\r\neeeeeeeeeeeeeeeeeee', '\r\n\r\n', '\r\n\r\n', 'Teste - 5', 'Presente', 'produto'),
(30, 6, 4, 8, '2023-09-17 04:59:26', 'Teste - 6', 'Teste6Url', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 900, 500, '\r\n\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '\r\n\r\n', '\r\n\r\n', 'Teste - 6 ', 'Oferta', 'produto'),
(31, 8, 3, 2, '2023-09-17 05:00:27', 'Teste - 7', 'Teste7Url', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 65, 55, '\r\n\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '\r\n\r\n', '\r\n\r\n', 'Teste - 7', 'Presente', 'produto'),
(32, 4, 2, 7, '2023-09-17 05:01:21', 'Teste - 8', 'Teste8Url', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 80, 60, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '\r\n\r\n', '\r\n\r\n', 'Teste - 8', 'Novo', 'produto'),
(33, 7, 3, 5, '2023-09-17 05:04:40', 'Teste - 0', 'Teste0Url', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 150, 50, '\r\n\r\ndddddddddddddddddddddddddddddddddddd', '\r\n\r\n', '\r\n\r\n', 'Teste - 0', 'Novo', 'produto'),
(34, 6, 3, 3, '2023-09-17 06:51:32', 'Teste - 9', 'Teste9Url', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 'indisponivel-vodute.png', 345, 290, 'aaaaaaaaaaaaaaaaavc\r\n\r\n', '\r\n\r\n', '\r\n\r\n', 'Teste - 9', 'Presente', 'produto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_categorias`
--

CREATE TABLE `produto_categorias` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_título` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_imagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `produto_categorias`
--

INSERT INTO `produto_categorias` (`p_cat_id`, `p_cat_título`, `p_cat_top`, `p_cat_imagem`) VALUES
(4, 'Coats', 'no', 'coaticn.png'),
(5, 'T-Shirts', 'no', 'tshirticn.png'),
(6, 'Sweater', 'no', 'sweatericn.png'),
(7, 'jackets', 'yes', 'jacketicn.png'),
(9, 'Trousers', 'no', 'trousericn.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sobre_nos`
--

CREATE TABLE `sobre_nos` (
  `sobre_id` int(10) NOT NULL,
  `sobre_heading` text NOT NULL,
  `sobre_short_desc` text NOT NULL,
  `sobre_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `sobre_nos`
--

INSERT INTO `sobre_nos` (`sobre_id`, `sobre_heading`, `sobre_short_desc`, `sobre_desc`) VALUES
(1, 'Sobre Us - Our Story', '\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,\r\n', 'Rhone was the collective vision of a small group of weekday warriors. For years, we were frustrated by the lack of activewear designed for men and wanted something better. With that in mind, we set out to design premium apparel that is made for motion and engineered to endure.\r\n\r\nAdvanced materials and state of the art technology are combined with heritage craftsmanship to create a new standard in activewear. Every produto tells a story of premium performance, reminding its wearer to push themselves physically without having to sacrifice comfort and style.\r\n\r\nBeyond our produto offering, Rhone is founded on principles of progress and integrity. Just as we aim to become better as a company, we invite men everywhere to raise the bar and join us as we move Forever Forward.');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`p_id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Índices de tabela `cliente_ordens`
--
ALTER TABLE `cliente_ordens`
  ADD PRIMARY KEY (`ordem_id`);

--
-- Índices de tabela `contato_nos`
--
ALTER TABLE `contato_nos`
  ADD PRIMARY KEY (`contato_id`);

--
-- Índices de tabela `cupons`
--
ALTER TABLE `cupons`
  ADD PRIMARY KEY (`cupom_id`);

--
-- Índices de tabela `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`fabricante_id`);

--
-- Índices de tabela `lista_de_desejos`
--
ALTER TABLE `lista_de_desejos`
  ADD PRIMARY KEY (`Lista_de_Desejos_id`);

--
-- Índices de tabela `mensagem_clients`
--
ALTER TABLE `mensagem_clients`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pacote_produto_relação`
--
ALTER TABLE `pacote_produto_relação`
  ADD PRIMARY KEY (`rel_id`);

--
-- Índices de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`pagamento_id`);

--
-- Índices de tabela `pendente_ordens`
--
ALTER TABLE `pendente_ordens`
  ADD PRIMARY KEY (`ordem_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`produto_id`);

--
-- Índices de tabela `produto_categorias`
--
ALTER TABLE `produto_categorias`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Índices de tabela `sobre_nos`
--
ALTER TABLE `sobre_nos`
  ADD PRIMARY KEY (`sobre_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `cliente_ordens`
--
ALTER TABLE `cliente_ordens`
  MODIFY `ordem_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `contato_nos`
--
ALTER TABLE `contato_nos`
  MODIFY `contato_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cupons`
--
ALTER TABLE `cupons`
  MODIFY `cupom_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `fabricantes`
--
ALTER TABLE `fabricantes`
  MODIFY `fabricante_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `lista_de_desejos`
--
ALTER TABLE `lista_de_desejos`
  MODIFY `Lista_de_Desejos_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `mensagem_clients`
--
ALTER TABLE `mensagem_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pacote_produto_relação`
--
ALTER TABLE `pacote_produto_relação`
  MODIFY `rel_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `pagamento_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `pendente_ordens`
--
ALTER TABLE `pendente_ordens`
  MODIFY `ordem_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `produto_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `produto_categorias`
--
ALTER TABLE `produto_categorias`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `sobre_nos`
--
ALTER TABLE `sobre_nos`
  MODIFY `sobre_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
