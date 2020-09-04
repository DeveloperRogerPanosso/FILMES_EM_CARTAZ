-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Set-2020 às 02:20
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `b7web_projeto_filmes_cartaz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `image_filme` varchar(200) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `duracao` varchar(100) NOT NULL,
  `historico` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `image_filme`, `titulo`, `genero`, `duracao`, `historico`) VALUES
(56, 'images/filme06.jpg', 'Viúva Negra', 'Ficção Cientifica, Ação', '1h 56m', 'Em Viúva Negra, após seu nascimento, Natasha Romanoff (Scarlett Johansson) é dada à KGB, que a prepara para se tornar sua agente definitiva. Quando a URSS rompe, o governo tenta matá-la enquanto a ação se move para a atual Nova York, onde ela trabalha como freelancer.'),
(57, 'images/filme07.jpg', 'O Vidro', 'Suspense', '2h 12m', 'Kevin Crumb, um homem com 24 personalidades diferentes, passa a ser perseguido por David Dunn. O jogo de gato e rato entre o homem inquebrável e a Fera é influenciado pela presença de Elijah Price, que manipula seus encontros e guarda segredos sobre os dois.'),
(59, 'images/filme05.jpg', 'Mulan', 'Ficcao_cientifica', '1h 45m', 'Mulan, uma jovem chinesa que não se encaixa na sociedade, teme que seu pai, um homem doente, seja convocado para lutar na guerra que se aproxima. A garota então se disfarça de homem e assume o posto de seu pai no exército chinês. Acompanhada por seu dragão Mushu, Mulan parte para a linha de batalha, faz amizade com os outros soldados e usa sua inteligência para ajudar a combater a invasão dos hunos enquanto luta para esconder sua verdadeira identidade.'),
(60, 'images/vingadores.jpg', 'Vingadores Ultimato(pt.1)', 'Ficcao_cientifica', '2h 12m', 'Em Vingadores: Ultimato, após Thanos eliminar metade das criaturas vivas em Vingadores: Guerra Infinita, os heróis precisam lidar com a dor da perda de amigos e seus entes queridos. Com Tony Stark (Robert Downey Jr.) vagando perdido no espaço sem água nem comida, o Capitão América/Steve Rogers (Chris Evans) e a Viúva Negra/Natasha Romanov (Scarlett Johansson) precisam liderar a resistência contra o titã louco.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
