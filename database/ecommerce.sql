-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 08:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `acessos`
--

CREATE TABLE `acessos` (
  `id_acesso` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `tipo_acesso` enum('ADMIN','NORMAL') DEFAULT 'NORMAL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acessos`
--

INSERT INTO `acessos` (`id_acesso`, `funcionario_id`, `nome_usuario`, `senha`, `tipo_acesso`) VALUES
(1, 1, 'admin', '202cb962ac59075b964b07152d234b70', 'ADMIN'),
(3, 3, 'normal', '202cb962ac59075b964b07152d234b70', 'NORMAL');

-- --------------------------------------------------------

--
-- Table structure for table `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `nome_cargo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nome_cargo`) VALUES
(1, 'Director de vendas'),
(2, 'Editor de produtos');

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome_categoria`) VALUES
(1, 'Assessórios'),
(2, 'Roupas');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(100) DEFAULT NULL,
  `telefone_cliente` varchar(20) NOT NULL,
  `email_cliente` varchar(100) DEFAULT NULL,
  `endereco_cliente` varchar(200) NOT NULL,
  `senha_cliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome_cliente`, `telefone_cliente`, `email_cliente`, `endereco_cliente`, `senha_cliente`) VALUES
(1, 'Primeiro cliente', '992229992', 'primeiro@cliente.com', 'Minha casa', '202cb962ac59075b964b07152d234b70'),
(4, 'Segundo usuario 2', '944444444', 'oi@test.com', 'Casa da minha mãe', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(100) NOT NULL,
  `foto_funcionario` varchar(200) DEFAULT NULL,
  `telefone_funcionario` varchar(20) NOT NULL,
  `email_funcionario` varchar(100) NOT NULL,
  `salario_funcionario` decimal(10,2) DEFAULT NULL,
  `endereco_funcionario` varchar(200) NOT NULL,
  `cargo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `nome_funcionario`, `foto_funcionario`, `telefone_funcionario`, `email_funcionario`, `salario_funcionario`, `endereco_funcionario`, `cargo_id`) VALUES
(1, 'Primeiro Funcionário', 'face17.jpg', '935555500', 'admin@user.com', 10000.00, 'Viana, Estalagem', 1),
(3, 'Segundo Funcionario', '0088644ce920cd5dd40db00772cd7ad8.jpg', '999999999', 'alberkitumba@gmail.com', 15000.00, 'Sei lá se vive aonde', 1);

-- --------------------------------------------------------

--
-- Table structure for table `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id_itens_pedido` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade_item` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itens_pedido`
--

INSERT INTO `itens_pedido` (`id_itens_pedido`, `pedido_id`, `produto_id`, `quantidade_item`) VALUES
(1, 1, 1, 2),
(2, 2, 1, 2),
(3, 3, 1, 1),
(4, 3, 1, 3),
(5, 3, 1, 1),
(6, 6, 1, 2),
(7, 7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `funcionario_id` int(11) DEFAULT NULL,
  `data_pedido` date NOT NULL DEFAULT current_timestamp(),
  `endereco_entrega` varchar(200) DEFAULT NULL,
  `estado_pedido` enum('PAGO','A_CAMINHO','ENTREGUE','CANCELADO') NOT NULL DEFAULT 'PAGO',
  `valor_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `cliente_id`, `funcionario_id`, `data_pedido`, `endereco_entrega`, `estado_pedido`, `valor_total`) VALUES
(1, 1, NULL, '2023-06-06', NULL, 'PAGO', NULL),
(2, 1, NULL, '2023-06-06', NULL, 'PAGO', NULL),
(3, 1, 1, '2023-06-06', 'Teste', 'A_CAMINHO', 100.00),
(6, 4, NULL, '2023-06-07', NULL, 'PAGO', 200.00),
(7, 1, 1, '2023-06-07', 'Na minha vizinha', 'A_CAMINHO', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `foto_produto` varchar(100) DEFAULT NULL,
  `preco_produto` decimal(10,2) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `quantidade_produto` int(11) DEFAULT NULL,
  `criado_aos` date NOT NULL DEFAULT current_timestamp(),
  `descricao_produto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `foto_produto`, `preco_produto`, `categoria_id`, `quantidade_produto`, `criado_aos`, `descricao_produto`) VALUES
(1, 'Relógio', '76185fc2a031e4e75658c8f484b3b92d.jpg', 100.00, 1, 13, '2023-06-04', 'Um relógio de alta qualidade e com muito bom feeling o que te dará uma auria diferente no recintos frequentados');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id_acesso`),
  ADD UNIQUE KEY `nome_usuario` (`nome_usuario`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `telefone_cliente` (`telefone_cliente`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `cargo_id` (`cargo_id`);

--
-- Indexes for table `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id_itens_pedido`),
  ADD KEY `itens_pedido_ibfk_1` (`pedido_id`),
  ADD KEY `itens_pedido_ibfk_2` (`produto_id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `pedidos_ibfk_1` (`cliente_id`),
  ADD KEY `pedidos_ibfk_2` (`funcionario_id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `produtos_ibfk_1` (`categoria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id_itens_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acessos`
--
ALTER TABLE `acessos`
  ADD CONSTRAINT `acessos_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id_funcionario`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id_cargo`);

--
-- Constraints for table `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `itens_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itens_pedido_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id_funcionario`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
