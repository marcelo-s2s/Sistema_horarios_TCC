-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/02/2025 às 20:20
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
-- Banco de dados: `sistema_horarios`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `nome_disciplina` varchar(90) NOT NULL,
  `carga_horaria` smallint(3) UNSIGNED NOT NULL,
  `nivel_ensino` varchar(45) NOT NULL,
  `tipo` enum('semestral','anual') NOT NULL,
  `ch_semanal` tinyint(2) NOT NULL,
  `cor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `nome_disciplina`, `carga_horaria`, `nivel_ensino`, `tipo`, `ch_semanal`, `cor`) VALUES
(2, 'Matemática', 1, 'medio', 'anual', 5, '#E12120'),
(3, 'Biologia', 80, 'medio', 'semestral', 6, '#00B800'),
(9, 'Inglês', 60, 'medio', 'semestral', 2, '#FFBCC5'),
(10, 'Química', 60, 'medio', 'semestral', 2, '#74a0e7'),
(13, 'Geografia', 40, 'medio', 'semestral', 4, '#e56e24'),
(16, 'Tested5', 22, 'dwec', 'semestral', 3, '#000000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario_aula`
--

CREATE TABLE `horario_aula` (
  `id` int(11) NOT NULL,
  `id_horario_aula` varchar(20) NOT NULL,
  `status` varchar(45) NOT NULL,
  `periodo_letivo` varchar(45) NOT NULL,
  `dia_semana` tinyint(1) NOT NULL,
  `horario_inicio` smallint(2) NOT NULL,
  `horario_fim` smallint(2) NOT NULL,
  `cor` varchar(45) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `codigo_turma` varchar(45) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `horario_aula`
--

INSERT INTO `horario_aula` (`id`, `id_horario_aula`, `status`, `periodo_letivo`, `dia_semana`, `horario_inicio`, `horario_fim`, `cor`, `id_sala`, `codigo_turma`, `id_disciplina`, `professor`) VALUES
(130, '20250113200007', 'ativo', '25.1', 6, 3, 5, '#74a0e7', 1, '220B', 10, 5),
(131, '20250113200007', 'ativo', '25.1', 4, 5, 7, '#FFBCC5', 1, '220B', 9, 5),
(132, '20250115215131', 'ativo', '25.1', 3, 2, 4, '#FFBCC5', 3, '098A', 9, 5),
(133, '20250115215131', 'ativo', '25.1', 5, 2, 7, '#E12120', 1, '098A', 2, 6),
(134, '20250115215131', 'ativo', '25.1', 6, 2, 4, '#74a0e7', 3, '098A', 10, 8),
(137, '20250115222905', 'ativo', '25.1', 5, 4, 7, '#000000', 3, 'Teste', 16, 8),
(138, '20250123184514', 'ativo', '25.1', 1, 1, 6, '#E12120', 1, '110A', 2, 5),
(139, '20250123184514', 'ativo', '25.1', 2, 1, 3, '#FFBCC5', 3, '110A', 9, 7),
(140, '20250123184514', 'ativo', '25.1', 3, 1, 5, '#E56E24', 1, '110A', 13, 6),
(141, '20250123184514', 'ativo', '25.1', 6, 2, 5, '#000000', 6, '110A', 16, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `periodo_letivo`
--

CREATE TABLE `periodo_letivo` (
  `periodo` varchar(10) NOT NULL,
  `ano` int(4) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `periodo_letivo`
--

INSERT INTO `periodo_letivo` (`periodo`, `ano`, `ativo`) VALUES
('25.1', 2025, 1),
('25.2', 2025, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `nome_sala` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `sala`
--

INSERT INTO `sala` (`id_sala`, `nome_sala`) VALUES
(1, 'Sala 7'),
(3, 'Sala8'),
(6, 'Sala 5');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `codigo_turma` varchar(45) NOT NULL,
  `nome_turma` varchar(45) NOT NULL,
  `nivel_ensino` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `turma`
--

INSERT INTO `turma` (`codigo_turma`, `nome_turma`, `nivel_ensino`) VALUES
('098A', 'Terceirão', 'médio'),
('110A', 'Os inteligentes', 'médio'),
('220B', 'Turma bagunceira', 'médio'),
('390C', 'Turma teste', 'graduação'),
('hfuowh', 'hrthrs', 'hbrh'),
('Teste', 'teseee', 'tesss');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` enum('admin','aluno','professor') NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `tipo_usuario`, `data_cadastro`) VALUES
(1, 'Marcelol', 'marcelo@gmail.com', '123', 'aluno', '2024-11-05 21:47:23'),
(4, 'Pauloll', 'adm@gmail.com', ',l,p', 'admin', '2024-11-05 21:49:15'),
(5, 'Paulo', 'p@a', 'aaaa', 'professor', '2024-11-23 01:22:42'),
(6, 'Gui', 'g@a', 'eee', 'professor', '2024-11-23 01:22:55'),
(7, 'Felipe', 'f@a', 'aaa', 'professor', '2024-11-23 01:23:05'),
(8, 'Fernando', 'ferni@h', 'err', 'professor', '2024-12-03 00:48:13');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`);

--
-- Índices de tabela `horario_aula`
--
ALTER TABLE `horario_aula`
  ADD PRIMARY KEY (`id`,`id_sala`,`codigo_turma`,`id_disciplina`,`professor`),
  ADD KEY `fk_horario_aula_sala_idx` (`id_sala`),
  ADD KEY `fk_horario_aula_disciplina_idx` (`id_disciplina`),
  ADD KEY `fk_horario_aula_usuario_idx` (`professor`),
  ADD KEY `fk_horario_aula_turma_idx` (`codigo_turma`);

--
-- Índices de tabela `periodo_letivo`
--
ALTER TABLE `periodo_letivo`
  ADD PRIMARY KEY (`periodo`);

--
-- Índices de tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`codigo_turma`),
  ADD UNIQUE KEY `codigo_turma_UNIQUE` (`codigo_turma`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `horario_aula`
--
ALTER TABLE `horario_aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `horario_aula`
--
ALTER TABLE `horario_aula`
  ADD CONSTRAINT `fk_horario_aula_disciplina` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_aula_sala` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_aula_turma` FOREIGN KEY (`codigo_turma`) REFERENCES `turma` (`codigo_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_aula_usuario` FOREIGN KEY (`professor`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
