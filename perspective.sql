-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07/01/2025 às 20:25
-- Versão do servidor: 10.11.10-MariaDB
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u790137918_probweb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `amizades`
--

CREATE TABLE `amizades` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_amigo` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_publicacao` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `conteudo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_amigo` int(11) DEFAULT NULL,
  `conteudo` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `publicacoes`
--

CREATE TABLE `publicacoes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_amigo` int(11) DEFAULT NULL,
  `data` varchar(50) DEFAULT NULL,
  `num_curtir` int(11) DEFAULT NULL,
  `conteudo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `nome_url` varchar(150) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `data_nascimento` varchar(15) DEFAULT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `cidade_uf` varchar(75) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `fundo` varchar(10) DEFAULT NULL,
  `sexo` varchar(30) DEFAULT NULL,
  `cpf` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  `profissao` varchar(75) DEFAULT NULL,
  `trabalho` varchar(75) DEFAULT NULL,
  `escolaridade` varchar(30) DEFAULT NULL,
  `escola` varchar(75) DEFAULT NULL,
  `locais` text DEFAULT NULL,
  `idiomas` text DEFAULT NULL,
  `musicas` text DEFAULT NULL,
  `filmes` text DEFAULT NULL,
  `livros` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `hash` varchar(64) DEFAULT NULL,
  `hash_cookie` varchar(64) DEFAULT NULL,
  `salt` varchar(64) DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `nome_url`, `email`, `data_nascimento`, `telefone`, `cidade_uf`, `foto`, `fundo`, `sexo`, `cpf`, `estado`, `pais`, `profissao`, `trabalho`, `escolaridade`, `escola`, `locais`, `idiomas`, `musicas`, `filmes`, `livros`, `descricao`, `hash`, `hash_cookie`, `salt`, `ip`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '16/15/79', '123456789', 'Manaus', '1621089968609fdeb041481394275010.jpg', 'bg4.png', 'Masculino', '', 'Amazonas', 'Brasil', 'Cozinheiro', '', 'Ensino Médio', '', 'Paris', 'Português, Francês', 'Palavra Cantada', 'Ratatouille', 'Ratatouille, em Busca De Um Sonho', '<p>Um rato maneiro que ama cozinhar, fã do Ratatouille.&nbsp;</p>', 'c06a758bb76c44e0aad202d1f700720eef64b3b9feb1047df94dd25948768f97', 'a6b9e15e9f3aa13a375fcd56125e380caf948268fd06b5428a83f11e776c4599', '=>9\"ÀFë`kE^x', '191.189.2.226'),

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `amizades`
--
ALTER TABLE `amizades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amizades`
--
ALTER TABLE `amizades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
