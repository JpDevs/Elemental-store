-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 11:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lojaelemental`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Vip'),
(2, 'Dinheiro'),
(3, 'Carros'),
(4, 'Extra');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `products_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `active`, `products_id`) VALUES
(1, 'https://cdn.discordapp.com/attachments/998970689644138526/999812550109700116/unknown.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(255) DEFAULT 'https://i1.sndcdn.com/artworks-000126744176-zttdav-t500x500.jpg',
  `price` decimal(10,2) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `img`, `price`, `description`, `active`) VALUES
(1, 1, 'VIP BRONZE', 'https://media.discordapp.net/attachments/984609077822889994/999761324101881876/ELEMENTAL.png?width=675&height=675', '20.00', ' 5 % de desconto na conce, R$ 100.000, Salário de R$ 2500, 1 Veículo vip', 1),
(2, 1, 'VIP PRATA', 'https://media.discordapp.net/attachments/984609077822889994/999761324101881876/ELEMENTAL.png?width=675&height=675', '45.00', '+2 Espaços na garagem, 10 % de desconto na conce, R$ 300.000, Salário de R$ 4500, 2 Veículo vip, 1 Apartamento', 1),
(3, 1, 'VIP OURO', 'https://media.discordapp.net/attachments/984609077822889994/999761324101881876/ELEMENTAL.png?width=675&height=675', '55.00', '-Preço da Vip ao mês: R$ 55,00\n-Desconto Conce: 15%\n-Instagram Verificado\n- +4 Espaços Garagem\n-Dinheiro ganho no jogo: $300.000\n-Salário $ 4500\n-Carro: 2 veículos VIP\n-Apartamento: 1', 1),
(4, 1, 'VIP PLATINA', 'https://media.discordapp.net/attachments/984609077822889994/999761324101881876/ELEMENTAL.png?width=675&height=675', '75.00', '-Preço da Vip ao mês: R$ 75,00 \n-Desconto Conce: 20%\n-Instagram Verificado\n- +6 Espaços Garagem\n-Dinheiro ganho no jogo: $500.000\n- Salário $ 7500\n-Carro: 3 veículos VIP\n-Casa/Apartamento de luxo: 1', 1),
(5, 1, 'VIP DIAMANTE', 'https://media.discordapp.net/attachments/984609077822889994/999761324101881876/ELEMENTAL.png?width=675&height=675', '95.00', '-Preço da Vip ao mês: R$ 95,00 \n<br>\n-Desconto Conce: 25%\n<br>\n-Instagram Verificado\n<br>\n- +9 Espaços Garagem\n<br>\n-Dinheiro ganho no jogo: $700.000\n<br>\n-Salário $ 10500\n<br>\n-Carro: SaveiroDubi + 2 veículos VIP\n<br>\n-Casa/Apartamento de luxo: 1', 1),
(6, 1, 'VIP ELEMENTAL・( PERMANENTE )', 'https://media.discordapp.net/attachments/984609077822889994/999761324101881876/ELEMENTAL.png?width=675&height=675', '160.00', '-Preço da Vip ao mês: R$ 20.00\n-Desconto Conce: 5%\n-Dinheiro ganho no jogo: $100.000\n-Salário $ 2500\n-Carro: 1 veículos VIP', 1),
(7, 2, '400K', 'https://media.discordapp.net/attachments/984609077822889994/999761324101881876/ELEMENTAL.png?width=675&height=675', '25.00', '400k (o dinheiro será setado no paypal, só clicar em sacar que irá para o seu banco)', 0),
(8, 2, '1kk', 'https://media.discordapp.net/attachments/984609077822889994/999761324101881876/ELEMENTAL.png?width=675&height=675', '55.00', '1kk (o dinheiro será setado no paypal, só clicar em sacar que irá para o seu banco)', 0),
(9, 2, '10kk', 'https://media.discordapp.net/attachments/984609077822889994/999761324101881876/ELEMENTAL.png?width=675&height=675', '400.00', '10kk (o dinheiro será setado no paypal, só clicar em sacar que irá para o seu banco)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `player_id` int(11) DEFAULT NULL,
  `sales_status_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_status`
--

CREATE TABLE `sales_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_status`
--

INSERT INTO `sales_status` (`id`, `name`) VALUES
(1, 'Aguardando Pagamento'),
(2, 'Recusada'),
(3, 'Não Processada'),
(4, 'Concluida'),
(5, 'Cancelada');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `payment_endpoint` varchar(45) NOT NULL,
  `payment_token` varchar(100) DEFAULT NULL,
  `store_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`,`products_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_status`
--
ALTER TABLE `sales_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_status`
--
ALTER TABLE `sales_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
