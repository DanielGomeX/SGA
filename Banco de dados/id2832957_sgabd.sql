-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 20, 2017 at 06:24 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2832957_sgabd`
--

-- --------------------------------------------------------

--
-- Table structure for table `academia`
--

CREATE TABLE `academia` (
  `cd_cnpj` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `userMASTER` int(8) NOT NULL,
  `cd_funcionario` int(3) NOT NULL,
  `nm_academia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cd_registro_geral_funcionario` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cd_telefone_academia` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cd_cpf_funcionario` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nm_endereco_academia` int(50) NOT NULL,
  `dt_admissao` date NOT NULL,
  `dt_demissao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acesso`
--

CREATE TABLE `acesso` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acesso`
--

INSERT INTO `acesso` (`id`, `usuario`, `senha`, `status`) VALUES
(1, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `aluno`
--

CREATE TABLE `aluno` (
  `matricula_aluno` int(11) NOT NULL,
  `nm_aluno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_aluno` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `registro_geral_aluno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nm_endereco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dt_nascimento_aluno` date NOT NULL,
  `cd_telefone_aluno` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nm_email_aluno` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `luta`
--

CREATE TABLE `luta` (
  `cd_modalidade` int(11) NOT NULL,
  `nm_modalidade` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `vl_modalidade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plano`
--

CREATE TABLE `plano` (
  `cd_plano` int(11) NOT NULL,
  `vl_plano` float NOT NULL,
  `dt_plano` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(11) NOT NULL,
  `nm_professor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `registro_geral_professor` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_professor` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `dt_nascimento_professor` date NOT NULL,
  `nm_endereco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nm_email_professor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cd_telefone_professor` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academia`
--
ALTER TABLE `academia`
  ADD PRIMARY KEY (`cd_cnpj`);

--
-- Indexes for table `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`matricula_aluno`);

--
-- Indexes for table `luta`
--
ALTER TABLE `luta`
  ADD PRIMARY KEY (`cd_modalidade`);

--
-- Indexes for table `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`cd_plano`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
