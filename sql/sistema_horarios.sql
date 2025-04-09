-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 07-Abr-2025 às 21:16
-- Versão do servidor: 8.0.39-0ubuntu0.22.04.1
-- versão do PHP: 8.1.2-1ubuntu2.19

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
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int NOT NULL,
  `nome_disciplina` varchar(90) NOT NULL,
  `carga_horaria` smallint UNSIGNED NOT NULL,
  `nivel_ensino` varchar(45) NOT NULL,
  `tipo` enum('semestral','anual') NOT NULL,
  `ch_semanal` tinyint NOT NULL,
  `cor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `nome_disciplina`, `carga_horaria`, `nivel_ensino`, `tipo`, `ch_semanal`, `cor`) VALUES
(30, 'ENAGR0009 - METODOLOGIA  CIENTÍFICA', 80, 'Superior', 'semestral', 3, '#d9e6fd'),
(31, 'ENAGR0016 -  AGROMETEOROLOGIA E  CLIMATOLOGIA', 80, 'Superior', 'semestral', 3, '#b18bde'),
(32, 'ENAGR0011 - TOPOGRAFIA', 80, 'Superior', 'semestral', 3, '#d0029f'),
(33, 'ENAGR0012 - GÊNESE DO  SOLO', 80, 'Superior', 'semestral', 3, '#1263de'),
(34, 'ENAGR0013 - ZOOLOGIA DOS  VERTEBRADOS E  INVERTEBRADOS', 80, 'Superior', 'semestral', 4, '#0adeec'),
(35, 'ENAGR0015 - QUÍMICA  ORGÂNICA', 80, 'Superior', 'semestral', 3, '#4ebcbe'),
(36, 'ENAGR0014 - CÁLCULO II', 80, 'Superior', 'semestral', 3, '#8a4e47'),
(37, 'ENAGR0010 - ANATOMIA  VEGETAL', 80, 'Superior', 'semestral', 4, '#5cde2c'),
(38, 'ENAGR0030 - ZOOTECNICA  GERAL', 80, 'Superior', 'semestral', 3, '#f1c559'),
(39, 'ENAGR0026 - FISIOLOGIA  VEGETAL', 80, 'Superior', 'semestral', 2, '#92520a'),
(40, 'ENAGR0027 - ESTATÍSTICA  EXPERIMENTAL', 80, 'Superior', 'semestral', 3, '#e77de0'),
(41, 'ENAGR0028 - SOCIOLOGIA E  ANTROPOLOGIA RURAL', 80, 'Superior', 'semestral', 3, '#dd7584'),
(42, 'ENAGR0025 - FERTILIDADE E  ADUBAÇÃO DO SOLO', 80, 'Superior', 'semestral', 4, '#c57e08'),
(43, 'ENAGR0029 -  SENSORIAMENTO REMOTO E  GEOPROCESSAMENTO', 80, 'Superior', 'semestral', 4, '#c2b5a5'),
(44, 'ENAGR0031 - IRRIGAÇÃO E  DRENAGEM', 80, 'Superior', 'semestral', 6, '#0b2497'),
(45, 'ENAGR0050 - PISCICULTURA', 80, 'Superior', 'semestral', 4, '#ce66d6'),
(46, 'ENAGR0049 - SILVICULTURA', 80, 'Superior', 'semestral', 4, '#9298c2'),
(47, 'ENAGR0047 - MANEJO E  CONSERVAÇÃO DE SOLO E  ÁGUA', 80, 'Superior', 'semestral', 6, '#5507f4'),
(48, 'ENAGR0046 - CONTROLE DE  DOENÇAS DE PLANTAS', 80, 'Superior', 'semestral', 6, '#30f713'),
(49, 'ENAGR0051 - ESTÁGIO I', 80, 'Superior', 'semestral', 4, '#0b84a0'),
(50, 'ENAGR0074 - SISTEMAS  AGROFLORESTAIS', 80, 'Superior', 'semestral', 3, '#fc8092'),
(51, 'ENAGR0059 - CULTURAS  ANUAIS', 80, 'Superior', 'semestral', 3, '#e93a2d'),
(52, 'ENAGR0063 - OLERICULTURA', 80, 'Superior', 'semestral', 4, '#6becce'),
(53, 'ENAGR0060 - APICULTURA E  MELIPONICULTURA', 80, 'Superior', 'semestral', 3, '#34b930'),
(54, 'ENAGR0064 - PROJETO  INTEGRADOR II', 80, 'Superior', 'semestral', 3, '#f59818'),
(55, 'ENAGR0062 -  DESENVOLVIMENTO  REGIONAL E SISTEMAS DE  PRODUÇÃO FAMILIAR', 80, 'Superior', 'semestral', 3, '#de4a65'),
(56, 'ENAGR0061 - AGRICULTURA  DE PRECISÃO', 80, 'Superior', 'semestral', 3, '#17f1b8'),
(57, 'EAS25-2 - INTRODUÇÃO À ECOLOGIA', 80, 'Superior', 'semestral', 2, '#f3bd49'),
(58, 'EAS25-2 - QUÍMICA  AMBIENTAL', 80, 'Superior', 'semestral', 2, '#06ca0a'),
(59, 'EAS25-2 - CÁLCULO I', 80, 'Superior', 'semestral', 4, '#fce8d0'),
(60, 'ENASA0102 - ESTATÍSTICA E  PROBABILIDADE', 80, 'Superior', 'semestral', 2, '#f27d43'),
(61, 'EAS25-2 - CIÊNCIA DOS  MATERIAIS', 80, 'Superior', 'semestral', 4, '#11c64a'),
(62, 'EAS25-1 - DESENHO TÉCNICO', 80, 'Superior', 'semestral', 4, '#a34923'),
(63, 'EAS25-1 - BIOLOGIA GERAL', 80, 'Superior', 'semestral', 2, '#bc3ba2'),
(64, 'ENASA0095 - BIOQUÍMICA', 80, 'Superior', 'semestral', 2, '#805543'),
(65, 'ENASA0142 - AVALIAÇÃO DE  IMPACTOS AMBIENTAIS II', 80, 'Superior', 'semestral', 3, '#bc981d'),
(66, 'ENASA0138 -  SENSORIAMENTO REMOTO E  GEOPROCESSAMENTO', 80, 'Superior', 'semestral', 3, '#282166'),
(67, 'ENASA0137 - GESTÃO DE  IMPACTOS DA MINERAÇÃO', 80, 'Superior', 'semestral', 2, '#d83e96'),
(68, 'ENASA0140 - SISTEMAS DE  ESGOTO SANITÁRIO', 80, 'Superior', 'semestral', 3, '#a7822e'),
(69, 'ENASA0139 - PREVENÇÃO E  CONTROLE DA POLUIÇÃO  ATMOSFÉRICA', 80, 'Superior', 'semestral', 2, '#457e96'),
(70, 'ENASA0135 - GESTÃO  AMBIENTAL', 80, 'Superior', 'semestral', 3, '#96885f'),
(71, 'ENASA0136 - SISTEMAS DE  ABASTACIMENTO DE ÁGUA', 80, 'Superior', 'semestral', 2, '#f16f67'),
(72, 'ENASA0141 - PROJETO  INTEGRADOR I', 80, 'Superior', 'semestral', 2, '#f1d48d'),
(73, 'ENASA0151 - SANEAMENTO RURAL E DE PEQUENAS COMUNIDADES', 80, 'Superior', 'semestral', 3, '#8e81d9'),
(74, 'ENASA0165 - PROJETOS  ALTERNATIVOS DE GERAÇÃO DE ENERGIA', 80, 'Superior', 'semestral', 3, '#5fb951'),
(75, 'ENASA0153 - TRATAMENTO DE EFLUENTES INDUSTRIAIS', 80, 'Superior', 'semestral', 2, '#332cc6'),
(76, 'ENASA0154 - SISTEMAS DE GESTÃO INTEGRADA', 80, 'Superior', 'semestral', 3, '#f390d7'),
(77, 'ENASA0150 - PLANEJAMENTO E GESTÃO DE BACIAS HIDROGRÁFICAS', 80, 'Superior', 'semestral', 4, '#0d8539'),
(78, 'ENASA0156 - TCC I', 80, 'Superior', 'semestral', 2, '#c6b463'),
(79, 'ENASA0152 - SEGURANÇA NO TRABALHO', 80, 'Superior', 'semestral', 3, '#594510'),
(80, 'ENASA0155 - ESTÁGIO I', 80, 'Superior', 'semestral', 4, '#64c396'),
(81, 'TIEDI0812 - QUÍMICA I', 80, 'Superior', 'semestral', 2, '#63fdae'),
(82, 'TIEDI0813 - FÍSICA I', 80, 'Médio', 'semestral', 2, '#9b229c'),
(83, 'TIEDI0819 - FILOSOFIA I', 80, 'Médio', 'semestral', 2, '#f47c1f'),
(84, 'TIEDI0817 - HISTÓRIA I', 80, 'Médio', 'semestral', 2, '#2b876a'),
(85, 'TIEDI0820 - SOCIOLOGIA I', 80, 'Médio', 'semestral', 2, '#3c0140'),
(86, 'TIEDI0806 - LÍNGUA  PORTUGUESA I', 80, 'Médio', 'semestral', 3, '#be07c2'),
(87, 'TIEDI0824 - MATEMÁTICA I', 80, 'Médio', 'semestral', 3, '#33b389'),
(88, 'TIEDI0814 - MATERIAIS DE  CONSTRUÇÃO CIVIL', 80, 'Médio', 'semestral', 3, '#c2d352'),
(89, 'TIEDI0809 - ARTE', 80, 'Médio', 'semestral', 2, '#05c700'),
(90, 'TIEDI0807 - LÍNGUA  ESTRANGEIRA (INGLÊS) I', 80, 'Médio', 'semestral', 1, '#9776c9'),
(91, 'TIEDI0815 - TECNOLOGIA DA  CONSTRUÇÃO CIVIL', 80, 'Médio', 'semestral', 3, '#c6204d'),
(92, 'TIEDI0816 - NOÇÕES DE INFORMÁTICA E DESENHO TÉCNICO', 80, 'Médio', 'semestral', 4, '#83ee82'),
(93, 'TIEDI0811 - BIOLOGIA I', 80, 'Médio', 'semestral', 2, '#6bdedc'),
(94, 'TIEDI0808 - EDUCAÇÃO FÍSICA I', 80, 'Médio', 'semestral', 3, '#96745b'),
(95, 'TIEDI0828 - FÍSICA II', 80, 'Médio', 'semestral', 2, '#5ce152'),
(96, 'TIEDI0829 - DESENHO DE PROJETO', 80, 'Médio', 'semestral', 4, '#85d48d'),
(97, 'TIEDI0822 - LÍNGUA ESTRANGEIRA - INGLÊS II', 80, 'Médio', 'semestral', 2, '#b039fe'),
(98, 'TIEDI0831 - TOPOGRAFIA', 80, 'Médio', 'semestral', 2, '#343dd4'),
(99, 'TIEDI0834 - GEOGRAFIA II', 80, 'Médio', 'semestral', 2, '#7b6615'),
(100, 'TIEDI0836 - SOCIOLOGIA II', 80, 'Médio', 'semestral', 2, '#b0856d'),
(101, 'TIEDI0826 - BIOLOGIA II', 80, 'Médio', 'semestral', 2, '#2976ef'),
(102, 'TIEDI0825 - MATEMÁTICA II', 80, 'Médio', 'semestral', 2, '#1b9c0b'),
(103, 'TIEDI0835 - FILOSOFIA II', 80, 'Médio', 'semestral', 1, '#0207ad'),
(104, 'TIEDI0832 - ESTABILIDADE DAS CONSTRUÇÕES', 80, 'Médio', 'semestral', 3, '#938a1d'),
(105, 'TIEDI0821 - LÍNGUA PORTUGUESA II', 80, 'Médio', 'semestral', 2, '#4aafb3'),
(106, 'TIEDI0833 - HISTÓRIA II', 80, 'Médio', 'semestral', 2, '#4d5e5a'),
(107, 'TIEDI0830 - MECÂNICA DOS SOLOS E FUNDAÇÕES', 80, 'Médio', 'semestral', 2, '#7306de'),
(109, 'TIEDI0823 - EDUCAÇÃO FÍSICA II', 80, 'Médio', 'semestral', 3, '#4dff92'),
(110, 'TIEDI0844 - INSTALAÇÕES PREDIAIS', 80, 'Médio', 'semestral', 4, '#f77e4d'),
(111, 'TIEDI0845 - PATOLOGIA E  MANUTENÇÃO DAS  CONSTRUÇÕES', 80, 'Médio', 'semestral', 2, '#4c9ee1'),
(112, 'TIEDI0837 - LÍNGUA  PORTUGUESA III', 80, 'Médio', 'semestral', 2, '#bc1c44'),
(113, 'TIEDI0847 - GEOGRAFIA III', 80, 'Médio', 'semestral', 2, '#4c10dd'),
(114, 'TIEDI0841 - QUÍMICA III', 80, 'Médio', 'semestral', 2, '#6105e7'),
(115, 'TIEDI0848 - ÉTICA, GESTÃO  ORGANIZACIONAL E  SEGURANÇA NO TRABALHO', 80, 'Médio', 'semestral', 2, '#dc20ef'),
(116, 'TIEDI0838 - LÍNGUA  ESTRANGEIRA - INGLÊS III', 80, 'Médio', 'semestral', 1, '#ee159c'),
(117, 'TIEDI0849 - GESTÃO DE  OBRAS', 80, 'Médio', 'semestral', 2, '#ee69fd'),
(118, 'TIEDI0843 - ESTRUTURA DE  CONCRETO', 80, 'Médio', 'semestral', 2, '#309ed8'),
(119, 'TIEDI0846 - HISTÓRIA III', 80, 'Médio', 'semestral', 2, '#308c0b'),
(120, 'TIEDI0840 - BIOLOGIA III', 80, 'Médio', 'semestral', 2, '#56dde1'),
(121, 'TIEDI0842 - FÍSICA III', 80, 'Médio', 'semestral', 2, '#ceebb2'),
(123, 'TIEDI0839 - MATEMÁTICA III', 80, 'Médio', 'semestral', 2, '#2af2ea'),
(124, 'TIEDI0850 - PROJETO  INTEGRADOR', 80, 'Médio', 'semestral', 1, '#ce14d1'),
(125, 'TIEDI0818 - GEOGRAFIA I', 80, 'Médio', 'semestral', 3, '#5c8794'),
(126, 'TIEDI0827 - QUÍMICA II ', 80, 'Medio', 'semestral', 2, '#ef0917'),
(127, 'TIAGR0443 - QUÍMICA I ', 80, 'Medio', 'semestral', 2, '#67c269'),
(128, 'TIAGR0434 - LÍNGUA ESTRANGEIRA - INGLÊS I ', 80, 'Medio', 'semestral', 1, '#b46c2e'),
(129, 'TIAGR0448 - INTRODUÇÃO À BOTÂNICA E TECNOLOGIA DE  SEMENTES ', 80, 'Medio', 'semestral', 3, '#272cd0'),
(130, 'TIAGR0446 - PEDOLOGIA APLICADA E FERTILIDADE DO  SOLO ', 80, 'Medio', 'semestral', 2, '#353cc5'),
(131, 'TIAGR0438 - HISTÓRIA I ', 80, 'Medio', 'semestral', 2, '#5ee06e'),
(132, 'TIAGR0445 - INTRODUÇÃO À AGROECOLOGIA E EXTENSÃO  RURAL ', 80, 'Medio', 'semestral', 2, '#141feb'),
(133, 'TIAGR0437 - ARTES ', 80, 'Medio', 'semestral', 2, '#37e670'),
(134, 'TIAGR0442 - BIOLOGIA I ', 80, 'Medio', 'semestral', 2, '#0b51ba'),
(135, 'TIAGR0441 - SOCIOLOGIA I ', 80, 'Medio', 'semestral', 2, '#2bb028'),
(136, 'TIAGR0449 - MATEMÁTICA I ', 80, 'Medio', 'semestral', 2, '#6f8f12'),
(137, 'TIAGR0433 - LÍNGUA  PORTUGUESA I ', 80, 'Medio', 'semestral', 2, '#5126ff'),
(138, 'TIAGR0444 - FÍSICA I ', 80, 'Medio', 'semestral', 2, '#2f6ef3'),
(139, 'TIAGR0440 - FILOSOFIA I ', 80, 'Medio', 'semestral', 1, '#28a7fa'),
(140, 'TIAGR0447 - ZOOTECNICA I ', 80, 'Medio', 'semestral', 3, '#d077f3'),
(141, 'TIAGR0435 - EDUCAÇÃO  FÍSICA I ', 80, 'Medio', 'semestral', 3, '#ccd1f8'),
(142, 'TIAGR0464 - OLERICULTURA E  FRUTICULTURA ', 80, 'Medio', 'semestral', 3, '#fa8e21'),
(143, 'TIAGR0463 - ZOOTECNICA II ', 80, 'Medio', 'semestral', 3, '#7eaa31'),
(144, 'TIAGR0459 - QUÍMICA II ', 80, 'Medio', 'semestral', 2, '#248f36'),
(145, 'TIAGR0451 - LÍNGUA ESTRANGEIRA - INGLÊS II ', 80, 'Medio', 'semestral', 2, '#60fe08'),
(146, 'TIAGR0462 - IRRIGAÇÃO E  DRENAGEM ', 80, 'Medio', 'semestral', 2, '#f10cea'),
(147, 'TIAGR0466 - MATEMÁTICA II ', 80, 'Medio', 'semestral', 2, '#5d8b48'),
(148, 'TIAGR0454 - HISTÓRIA II ', 80, 'Medio', 'semestral', 2, '#fc0582'),
(149, 'TIAGR0458 - BIOLOGIA II ', 80, 'Medio', 'semestral', 2, '#1c507f'),
(150, 'TIAGR0461 - TOPOGRAFIA  APLICADA E GEOPROCESSAMENTO ', 80, 'Medio', 'semestral', 2, '#50465a'),
(151, 'TIAGR0457 - SOCIOLOGIA II ', 80, 'Medio', 'semestral', 1, '#9e61fb'),
(152, 'TIAGR0465 - PROJETO INTEGRADOR ', 80, 'Medio', 'semestral', 1, '#415c67'),
(153, 'TIAGR0455 - GEOGRAFIA II ', 80, 'Medio', 'semestral', 2, '#888e1f'),
(154, 'TIAGR0450 - LÍNGUA  PORTUGUESA II ', 80, 'Medio', 'semestral', 2, '#fa9ec0'),
(155, 'TIAGR0460 - FÍSICA II ', 80, 'Medio', 'semestral', 2, '#5a056f'),
(156, 'TIAGR0456 - FILOSOFIA II ', 80, 'Medio', 'semestral', 2, '#8fa898'),
(157, 'TIAGR0452 - EDUCAÇÃO  FÍSICA II ', 80, 'Medio', 'semestral', 3, '#a9a624'),
(158, 'TIAGR0478 - MANEJO DE PRAGAS, DOENÇAS E PLANTAS  DANINHAS ', 80, 'Medio', 'semestral', 3, '#efeaac'),
(159, 'TIAGR0476 - ZOOTECNICA III ', 80, 'Medio', 'semestral', 3, '#c169d6'),
(160, 'TIAGR0479 - SISTEMAS E PRODUTOS AGROFLORESTAIS ', 80, 'Medio', 'semestral', 3, '#c05971'),
(161, 'TIAGR0468 - LÍNGUA ESTRANGEIRA - INGLÊS III ', 80, 'Medio', 'semestral', 1, '#0bcf60'),
(162, 'TIAGR0471 - GEOGRAFIA III ', 80, 'Medio', 'semestral', 2, '#f37727'),
(163, 'TIAGR0477 - GRANDES CULTURAS, PLANTAS  MEDICINAIS E ORNAMENTAIS ', 80, 'Medio', 'semestral', 3, '#f36322'),
(164, 'TIAGR0475 - MANEJO E CONSERVAÇÃO DO SOLO  MECANIZAÇÃO AGRÍCOLA E RECUPERAÇÃO DE ÁREAS  DEG', 80, 'Medio', 'semestral', 3, '#9596b9'),
(165, 'TIAGR0472 - BIOLOGIA III ', 80, 'Medio', 'semestral', 2, '#1c0d3b'),
(166, 'TIAGR0467 - LÍNGUA  PORTUGUESA III ', 80, 'Medio', 'semestral', 2, '#58507e'),
(167, 'TIAGR0480 - MATEMÁTICA III ', 80, 'Medio', 'semestral', 2, '#56905f'),
(168, 'TIAGR0473 - QUÍMICA III ', 80, 'Medio', 'semestral', 2, '#1f058f'),
(169, 'TIAGR0470 - HISTÓRIA III ', 80, 'Medio', 'semestral', 2, '#751d9c'),
(170, 'TIAGR0474 - FÍSICA III ', 80, 'Medio', 'semestral', 2, '#4b631c'),
(171, 'TIAGR0439 - GEOGRAFIA I', 80, 'Medio', 'semestral', 4, '#18d2bb');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario_aula`
--

CREATE TABLE `horario_aula` (
  `id` int NOT NULL,
  `id_horario_aula` varchar(20) NOT NULL,
  `status` varchar(45) NOT NULL,
  `periodo_letivo` varchar(45) NOT NULL,
  `dia_semana` tinyint(1) NOT NULL,
  `horario_inicio` smallint NOT NULL,
  `horario_fim` smallint NOT NULL,
  `cor` varchar(45) NOT NULL,
  `id_sala` int NOT NULL,
  `codigo_turma` varchar(45) NOT NULL,
  `id_disciplina` int NOT NULL,
  `professor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `horario_aula`
--

INSERT INTO `horario_aula` (`id`, `id_horario_aula`, `status`, `periodo_letivo`, `dia_semana`, `horario_inicio`, `horario_fim`, `cor`, `id_sala`, `codigo_turma`, `id_disciplina`, `professor`) VALUES
(218, '20250326154910', 'ativo', '25.1', 1, 7, 10, '#d9e6fd', 9, 'EAG24T', 30, 42),
(219, '20250326154910', 'ativo', '25.1', 1, 10, 13, '#b18bde', 9, 'EAG24T', 31, 43),
(220, '20250326154910', 'ativo', '25.1', 2, 7, 10, '#d0029f', 9, 'EAG24T', 32, 43),
(221, '20250326154910', 'ativo', '25.1', 2, 10, 13, '#1263de', 9, 'EAG24T', 33, 47),
(222, '20250326154910', 'ativo', '25.1', 3, 8, 12, '#0adeec', 9, 'EAG24T', 34, 45),
(223, '20250326154910', 'ativo', '25.1', 4, 7, 10, '#4ebcbe', 9, 'EAG24T', 35, 44),
(224, '20250326154910', 'ativo', '25.1', 4, 10, 13, '#8a4e47', 9, 'EAG24T', 36, 48),
(225, '20250326154910', 'ativo', '25.1', 5, 8, 12, '#5cde2c', 9, 'EAG24T', 37, 46),
(226, '20250327155917', 'ativo', '25.1', 1, 1, 4, '#f1c559', 9, 'EAG23M', 38, 49),
(227, '20250327155917', 'ativo', '25.1', 1, 4, 6, '#92520a', 9, 'EAG23M', 39, 50),
(228, '20250327155917', 'ativo', '25.1', 2, 1, 4, '#e77de0', 9, 'EAG23M', 40, 51),
(229, '20250327155917', 'ativo', '25.1', 2, 4, 7, '#dd7584', 9, 'EAG23M', 41, 52),
(230, '20250327155917', 'ativo', '25.1', 3, 1, 5, '#c57e08', 9, 'EAG23M', 42, 53),
(231, '20250327155917', 'ativo', '25.1', 3, 5, 7, '#92520a', 9, 'EAG23M', 39, 50),
(232, '20250327155917', 'ativo', '25.1', 4, 1, 3, '#92520a', 9, 'EAG23M', 39, 54),
(233, '20250327155917', 'ativo', '25.1', 4, 3, 7, '#c2b5a5', 10, 'EAG23M', 43, 55),
(234, '20250327155917', 'ativo', '25.1', 5, 1, 7, '#0b2497', 9, 'EAG23M', 44, 43),
(235, '20250328144827', 'ativo', '25.1', 1, 7, 9, '#ce66d6', 10, 'EAG22T', 45, 49),
(236, '20250328144827', 'ativo', '25.1', 1, 9, 13, '#9298c2', 10, 'EAG22T', 46, 50),
(237, '20250328144827', 'ativo', '25.1', 2, 7, 13, '#ce66d6', 10, 'EAG22T', 45, 49),
(238, '20250328144827', 'ativo', '25.1', 3, 7, 13, '#5507f4', 10, 'EAG22T', 47, 53),
(239, '20250328144827', 'ativo', '25.1', 4, 7, 13, '#9298c2', 10, 'EAG22T', 46, 50),
(240, '20250328144827', 'ativo', '25.1', 5, 7, 13, '#30f713', 10, 'EAG22T', 48, 47),
(290, '20250328154944', 'ativo', '25.1', 1, 1, 4, '#fc8092', 10, 'EAG21M', 50, 50),
(291, '20250328154944', 'ativo', '25.1', 1, 4, 7, '#e93a2d', 10, 'EAG21M', 51, 46),
(292, '20250328154944', 'ativo', '25.1', 2, 1, 5, '#6becce', 10, 'EAG21M', 52, 53),
(293, '20250328154944', 'ativo', '25.1', 2, 5, 7, '#e93a2d', 10, 'EAG21M', 51, 46),
(294, '20250328154944', 'ativo', '25.1', 3, 1, 4, '#34b930', 10, 'EAG21M', 53, 49),
(295, '20250328154944', 'ativo', '25.1', 4, 1, 4, '#f59818', 14, 'EAG21M', 54, 50),
(296, '20250328154944', 'ativo', '25.1', 4, 4, 7, '#de4a65', 14, 'EAG21M', 55, 56),
(297, '20250328154944', 'ativo', '25.1', 3, 4, 7, '#17f1b8', 10, 'EAG21M', 56, 43),
(306, '20250328200508', 'ativo', '25.1', 1, 8, 10, '#f3bd49', 12, 'EAS24T', 57, 61),
(307, '20250328200508', 'ativo', '25.1', 1, 10, 12, '#06ca0a', 12, 'EAS24T', 58, 90),
(308, '20250328200508', 'ativo', '25.1', 2, 7, 11, '#fce8d0', 12, 'EAS24T', 59, 48),
(309, '20250328200508', 'ativo', '25.1', 2, 11, 13, '#f27d43', 12, 'EAS24T', 60, 81),
(310, '20250328200508', 'ativo', '25.1', 3, 8, 12, '#11c64a', 12, 'EAS24T', 61, 77),
(311, '20250328200508', 'ativo', '25.1', 4, 9, 13, '#a34923', 13, 'EAS24T', 62, 55),
(312, '20250328200508', 'ativo', '25.1', 5, 8, 10, '#bc3ba2', 12, 'EAS24T', 63, 58),
(313, '20250328200508', 'ativo', '25.1', 5, 10, 12, '#805543', 12, 'EAS24T', 64, 90),
(322, '20250328201414', 'ativo', '25.1', 1, 1, 4, '#bc981d', 16, 'EAS22M', 65, 82),
(323, '20250328201414', 'ativo', '25.1', 1, 4, 7, '#282166', 17, 'EAS22M', 66, 55),
(324, '20250328201414', 'ativo', '25.1', 2, 1, 4, '#d83e96', 16, 'EAS22M', 67, 91),
(325, '20250328201414', 'ativo', '25.1', 2, 4, 7, '#a7822e', 16, 'EAS22M', 68, 80),
(326, '20250328201414', 'ativo', '25.1', 3, 1, 4, '#457e96', 16, 'EAS22M', 69, 82),
(327, '20250328201414', 'ativo', '25.1', 3, 4, 7, '#96885f', 16, 'EAS22M', 70, 91),
(328, '20250328201414', 'ativo', '25.1', 4, 1, 4, '#f16f67', 16, 'EAS22M', 71, 69),
(329, '20250328201414', 'ativo', '25.1', 4, 4, 6, '#f1d48d', 16, 'EAS22M', 72, 42),
(330, '20250328201850', 'ativo', '25.1', 1, 7, 10, '#8e81d9', 16, 'EAS21T', 73, 82),
(331, '20250328201850', 'ativo', '25.1', 1, 10, 13, '#5fb951', 16, 'EAS21T', 74, 91),
(332, '20250328201850', 'ativo', '25.1', 2, 8, 11, '#f390d7', 16, 'EAS21T', 76, 82),
(333, '20250328201850', 'ativo', '25.1', 2, 11, 13, '#332cc6', 16, 'EAS21T', 75, 91),
(334, '20250328201850', 'ativo', '25.1', 3, 8, 12, '#0d8539', 16, 'EAS21T', 77, 55),
(335, '20250328201850', 'ativo', '25.1', 4, 8, 10, '#c6b463', 16, 'EAS21T', 78, 60),
(336, '20250328201850', 'ativo', '25.1', 4, 10, 13, '#594510', 16, 'EAS21T', 79, 80),
(337, '20250328201850', 'ativo', '25.1', 5, 8, 12, '#64c396', 16, 'EAS21T', 80, 91),
(352, '20250404141419', 'ativo', '25.1', 1, 1, 3, '#63fdae', 13, 'TE25M', 81, 67),
(353, '20250404141419', 'ativo', '25.1', 1, 3, 5, '#9b229c', 13, 'TE25M', 82, 68),
(354, '20250404141419', 'ativo', '25.1', 1, 5, 7, '#f47c1f', 13, 'TE25M', 83, 66),
(355, '20250404141419', 'ativo', '25.1', 2, 1, 3, '#2b876a', 13, 'TE25M', 84, 56),
(356, '20250404141419', 'ativo', '25.1', 2, 3, 4, '#3c0140', 13, 'TE25M', 85, 52),
(357, '20250404141419', 'ativo', '25.1', 2, 4, 7, '#be07c2', 13, 'TE25M', 86, 59),
(358, '20250404141419', 'ativo', '25.1', 3, 1, 4, '#33b389', 13, 'TE25M', 87, 57),
(359, '20250404141419', 'ativo', '25.1', 3, 4, 7, '#c2d352', 13, 'TE25M', 88, 69),
(360, '20250404141419', 'ativo', '25.1', 4, 1, 3, '#05c700', 12, 'TE25M', 89, 70),
(361, '20250404141419', 'ativo', '25.1', 4, 3, 4, '#9776c9', 12, 'TE25M', 90, 71),
(362, '20250404141419', 'ativo', '25.1', 4, 4, 7, '#c6204d', 12, 'TE25M', 91, 72),
(363, '20250404141419', 'ativo', '25.1', 5, 1, 5, '#83ee82', 14, 'TE25M', 92, 69),
(364, '20250404141419', 'ativo', '25.1', 5, 5, 7, '#6bdedc', 13, 'TE25M', 93, 65),
(365, '20250404141419', 'ativo', '25.1', 1, 9, 12, '#96745b', 20, 'TE25M', 94, 62),
(366, '20250404142049', 'ativo', '25.1', 1, 1, 3, '#5ce152', 11, 'TE24M', 95, 73),
(367, '20250404142049', 'ativo', '25.1', 1, 3, 7, '#85d48d', 14, 'TE24M', 96, 72),
(368, '20250404142049', 'ativo', '25.1', 2, 1, 3, '#b039fe', 11, 'TE24M', 97, 74),
(369, '20250404142049', 'ativo', '25.1', 2, 3, 5, '#343dd4', 11, 'TE24M', 98, 69),
(370, '20250404142049', 'ativo', '25.1', 2, 5, 7, '#7b6615', 11, 'TE24M', 99, 75),
(371, '20250404142049', 'ativo', '25.1', 3, 1, 3, '#b0856d', 11, 'TE24M', 100, 52),
(372, '20250404142049', 'ativo', '25.1', 3, 3, 5, '#2976ef', 11, 'TE24M', 101, 64),
(373, '20250404142049', 'ativo', '25.1', 3, 5, 7, '#1b9c0b', 11, 'TE24M', 102, 57),
(374, '20250404142049', 'ativo', '25.1', 4, 1, 2, '#0207ad', 11, 'TE24M', 103, 66),
(375, '20250404142049', 'ativo', '25.1', 4, 2, 5, '#938a1d', 11, 'TE24M', 104, 77),
(376, '20250404142049', 'ativo', '25.1', 4, 5, 7, '#4aafb3', 11, 'TE24M', 105, 76),
(377, '20250404142049', 'ativo', '25.1', 5, 1, 3, '#ef0917', 11, 'TE24M', 126, 67),
(378, '20250404142049', 'ativo', '25.1', 5, 3, 5, '#4d5e5a', 11, 'TE24M', 106, 78),
(379, '20250404142049', 'ativo', '25.1', 5, 5, 7, '#7306de', 11, 'TE24M', 107, 69),
(380, '20250404142049', 'ativo', '25.1', 5, 9, 12, '#4dff92', 20, 'TE24M', 109, 79),
(381, '20250404144535', 'ativo', '25.1', 1, 7, 11, '#f77e4d', 13, 'TE23T', 110, 77),
(382, '20250404144535', 'ativo', '25.1', 1, 11, 13, '#4c9ee1', 13, 'TE23T', 111, 72),
(383, '20250404144535', 'ativo', '25.1', 2, 7, 9, '#bc1c44', 13, 'TE23T', 112, 74),
(384, '20250404144535', 'ativo', '25.1', 2, 9, 11, '#4c10dd', 13, 'TE23T', 113, 75),
(385, '20250404144535', 'ativo', '25.1', 2, 11, 13, '#6105e7', 13, 'TE23T', 114, 90),
(386, '20250404144535', 'ativo', '25.1', 3, 7, 9, '#dc20ef', 13, 'TE23T', 115, 80),
(387, '20250404144535', 'ativo', '25.1', 3, 9, 10, '#ee159c', 13, 'TE23T', 116, 71),
(388, '20250404144535', 'ativo', '25.1', 3, 10, 13, '#ee69fd', 13, 'TE23T', 117, 72),
(389, '20250404144535', 'ativo', '25.1', 4, 7, 11, '#309ed8', 14, 'TE23T', 118, 77),
(390, '20250404144535', 'ativo', '25.1', 4, 11, 13, '#308c0b', 14, 'TE23T', 119, 78),
(391, '20250404144535', 'ativo', '25.1', 5, 7, 9, '#56dde1', 13, 'TE23T', 120, 45),
(392, '20250404144535', 'ativo', '25.1', 5, 9, 11, '#ceebb2', 13, 'TE23T', 121, 73),
(393, '20250404144535', 'ativo', '25.1', 5, 11, 13, '#2af2ea', 13, 'TE23T', 123, 57),
(394, '20250404144535', 'ativo', '25.1', 4, 5, 6, '#ce14d1', 1, 'TE23T', 124, 70),
(395, '20250404153708', 'ativo', '25.1', 1, 1, 3, '#67c269', 18, 'TA25M', 127, 44),
(396, '20250404153708', 'ativo', '25.1', 1, 3, 4, '#b46c2e', 18, 'TA25M', 128, 71),
(397, '20250404153708', 'ativo', '25.1', 1, 4, 7, '#272cd0', 18, 'TA25M', 129, 53),
(398, '20250404153708', 'ativo', '25.1', 2, 1, 3, '#353cc5', 18, 'TA25M', 130, 47),
(399, '20250404153708', 'ativo', '25.1', 2, 3, 5, '#5ee06e', 18, 'TA25M', 131, 56),
(400, '20250404153708', 'ativo', '25.1', 2, 5, 7, '#141feb', 18, 'TA25M', 132, 53),
(401, '20250404153708', 'ativo', '25.1', 3, 1, 3, '#37e670', 18, 'TA25M', 133, 70),
(402, '20250404153708', 'ativo', '25.1', 3, 3, 5, '#0b51ba', 18, 'TA25M', 134, 63),
(403, '20250404153708', 'ativo', '25.1', 3, 5, 7, '#2bb028', 18, 'TA25M', 135, 52),
(404, '20250404153708', 'ativo', '25.1', 4, 1, 4, '#6f8f12', 18, 'TA25M', 136, 48),
(405, '20250404153708', 'ativo', '25.1', 4, 4, 7, '#5126ff', 18, 'TA25M', 137, 59),
(406, '20250404153708', 'ativo', '25.1', 5, 1, 3, '#2f6ef3', 18, 'TA25M', 138, 68),
(407, '20250404153708', 'ativo', '25.1', 5, 3, 4, '#28a7fa', 18, 'TA25M', 139, 66),
(408, '20250404153708', 'ativo', '25.1', 5, 4, 7, '#d077f3', 18, 'TA25M', 140, 46),
(409, '20250404153708', 'ativo', '25.1', 2, 9, 12, '#ccd1f8', 20, 'TA25M', 141, 62),
(410, '20250404154723', 'ativo', '25.1', 1, 1, 4, '#fa8e21', 12, 'TA24M', 142, 53),
(411, '20250404154723', 'ativo', '25.1', 1, 4, 7, '#7eaa31', 12, 'TA24M', 143, 49),
(412, '20250404154723', 'ativo', '25.1', 2, 1, 3, '#248f36', 12, 'TA24M', 144, 44),
(413, '20250404154723', 'ativo', '25.1', 2, 3, 5, '#60fe08', 12, 'TA24M', 145, 74),
(414, '20250404154723', 'ativo', '25.1', 2, 5, 7, '#f10cea', 12, 'TA24M', 146, 69),
(415, '20250404154723', 'ativo', '25.1', 3, 1, 3, '#5d8b48', 12, 'TA24M', 147, 83),
(416, '20250404154723', 'ativo', '25.1', 3, 3, 5, '#fc0582', 12, 'TA24M', 148, 56),
(417, '20250404154723', 'ativo', '25.1', 3, 5, 7, '#1c507f', 12, 'TA24M', 149, 58),
(418, '20250404154723', 'ativo', '25.1', 4, 1, 3, '#50465a', 17, 'TA24M', 150, 55),
(419, '20250404154723', 'ativo', '25.1', 4, 3, 4, '#9e61fb', 17, 'TA24M', 151, 52),
(420, '20250404154723', 'ativo', '25.1', 4, 4, 5, '#415c67', 17, 'TA24M', 152, 65),
(421, '20250404154723', 'ativo', '25.1', 4, 5, 7, '#888e1f', 17, 'TA24M', 153, 75),
(422, '20250404154723', 'ativo', '25.1', 5, 1, 3, '#fa9ec0', 12, 'TA24M', 154, 76),
(423, '20250404154723', 'ativo', '25.1', 5, 3, 5, '#5a056f', 12, 'TA24M', 155, 68),
(424, '20250404154723', 'ativo', '25.1', 5, 5, 7, '#8fa898', 12, 'TA24M', 156, 66),
(425, '20250404154723', 'ativo', '25.1', 4, 9, 12, '#a9a624', 20, 'TA24M', 157, 79),
(426, '20250404160016', 'ativo', '25.1', 1, 7, 10, '#efeaac', 18, 'TA23T', 158, 43),
(427, '20250404160016', 'ativo', '25.1', 1, 10, 13, '#c169d6', 18, 'TA23T', 159, 49),
(428, '20250404160016', 'ativo', '25.1', 2, 7, 10, '#c05971', 18, 'TA23T', 160, 50),
(429, '20250404160016', 'ativo', '25.1', 2, 10, 11, '#0bcf60', 18, 'TA23T', 161, 71),
(430, '20250404160016', 'ativo', '25.1', 2, 11, 13, '#f37727', 18, 'TA23T', 162, 75),
(431, '20250404160016', 'ativo', '25.1', 3, 7, 10, '#f36322', 18, 'TA23T', 163, 46),
(432, '20250404160016', 'ativo', '25.1', 3, 10, 13, '#9596b9', 18, 'TA23T', 164, 50),
(433, '20250404160016', 'ativo', '25.1', 4, 7, 9, '#1c0d3b', 18, 'TA23T', 165, 64),
(434, '20250404160016', 'ativo', '25.1', 4, 9, 11, '#58507e', 18, 'TA23T', 166, 74),
(435, '20250404160016', 'ativo', '25.1', 4, 11, 13, '#56905f', 18, 'TA23T', 167, 51),
(436, '20250404160016', 'ativo', '25.1', 5, 7, 11, '#1f058f', 18, 'TA23T', 168, 44),
(437, '20250404160016', 'ativo', '25.1', 5, 11, 13, '#4b631c', 18, 'TA23T', 170, 73);

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo_letivo`
--

CREATE TABLE `periodo_letivo` (
  `periodo` varchar(10) NOT NULL,
  `ano` int NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `periodo_letivo`
--

INSERT INTO `periodo_letivo` (`periodo`, `ano`, `ativo`) VALUES
('24.2', 2024, 0),
('25.1', 2025, 1),
('25.2', 2025, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `id_sala` int NOT NULL,
  `nome_sala` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`id_sala`, `nome_sala`) VALUES
(1, 'Sala 7'),
(3, 'Sala 8'),
(9, 'Sala 3'),
(10, 'Lab. Inf. II'),
(11, 'Sala 4'),
(12, 'Sala 2'),
(13, 'Sala 5 Des. Téc.'),
(14, 'Lab. Inf. I'),
(16, 'Sala 6'),
(17, 'Lab. Inf. III'),
(18, 'Sala 1'),
(19, 'Sala 9'),
(20, 'Sala Ed. Física');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `codigo_turma` varchar(45) NOT NULL,
  `nome_turma` varchar(45) NOT NULL,
  `nivel_ensino` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`codigo_turma`, `nome_turma`, `nivel_ensino`) VALUES
('BIO22N', 'BIO 22 - Noite', 'Superior'),
('BIO23N', 'BIO 23 - Noite', 'Superior'),
('BIO24N', 'BIO 24 - Noite', 'Superior'),
('EAG21M', 'EAG 21 - Manhã', 'Superior'),
('EAG22T', 'EAG 22 - Tarde', 'Superior'),
('EAG23M', 'EAG 23 - Manhã', 'Superior'),
('EAG24T', 'EAG 24 - Tarde', 'Superior'),
('EAS21T', 'EAS 21 - Tarde', 'Superior'),
('EAS22M', 'EAS 22 - Manhã', 'Superior'),
('EAS24T', 'EAS 24 - Tarde', 'Superior'),
('TA23T', 'TA-23  - Tarde', 'Médio'),
('TA24M', 'TA-24  - Manhã', 'Médio'),
('TA25M', 'TA-25  - Manhã', 'Médio'),
('TADS23N', 'TADS 23 - Noite', 'Superior'),
('TADS24T', ' TADS 24 - Tarde', 'Superior'),
('TE23T', 'TE-23  - Tarde', 'Médio'),
('TE24M', 'TE-24  - Manhã', 'Médio'),
('TE25M', 'TE-25  - Manhã', 'Médio'),
('TI23M', 'TI-23  - Manhã', 'Médio'),
('TI23T', 'TI-23  - Tarde', 'Médio'),
('TI24M', 'TI-24  - Manhã', 'Médio'),
('TI24T', 'rrr', 'rrr'),
('TI25M', 'TI-25  - Manhã', 'Médio'),
('TI25T', 'TI-25  - Tarde', 'Médio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `nome` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` enum('admin','aluno','professor') NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`);

--
-- Índices para tabela `horario_aula`
--
ALTER TABLE `horario_aula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_horario_aula_sala_idx` (`id_sala`),
  ADD KEY `fk_horario_aula_disciplina_idx` (`id_disciplina`),
  ADD KEY `fk_horario_aula_turma_idx` (`codigo_turma`),
  ADD KEY `fk_periodo_letivo` (`periodo_letivo`);

--
-- Índices para tabela `periodo_letivo`
--
ALTER TABLE `periodo_letivo`
  ADD PRIMARY KEY (`periodo`);

--
-- Índices para tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`codigo_turma`),
  ADD UNIQUE KEY `codigo_turma_UNIQUE` (`codigo_turma`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT de tabela `horario_aula`
--
ALTER TABLE `horario_aula`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=438;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `horario_aula`
--
ALTER TABLE `horario_aula`
  ADD CONSTRAINT `fk_horario_aula_disciplina` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`),
  ADD CONSTRAINT `fk_horario_aula_sala` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`),
  ADD CONSTRAINT `fk_horario_aula_turma` FOREIGN KEY (`codigo_turma`) REFERENCES `turma` (`codigo_turma`),
  ADD CONSTRAINT `fk_periodo_letivo` FOREIGN KEY (`periodo_letivo`) REFERENCES `periodo_letivo` (`periodo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
