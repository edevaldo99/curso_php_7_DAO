-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Jun-2017 às 14:09
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbphp7`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(150) NOT NULL,
  `senha` varchar(254) NOT NULL,
  `cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `login`, `senha`, `cadastro`) VALUES
(1, 'admin', '123', '2017-06-18 23:31:31'),
(2, 'user', 'pass', '2017-06-19 12:03:18'),
(3, 'Marcos', '12345', '2017-06-18 23:44:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
