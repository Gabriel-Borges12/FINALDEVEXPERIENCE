-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Nov-2024 às 19:44
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `birl_academy`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` enum('aluno','instrutor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo_usuario`) VALUES
(1, 'aaa', 'borgesgs369@gmail.com', '$2y$10$itbZzPfBgraNAdvBgYA7Q.RoBUUpasBeMMrvRYD0eF1SJTjWw0vWi', 'aluno'),
(2, 'aaa', 'borgesgs369@gmail.com', '$2y$10$WnbRlmS7yGQFO71wkGh2tOMD8jWm7Wwi42CkhIBUfHglXKG1v1P1q', 'aluno'),
(3, 'gabriel', 'gabs@gmail.com', '$2y$10$C2kHiKl0u/3ZDppjU4zDQuwXRqCmeM8oX8/bi7cBr14oUJO9Vi0Xy', 'aluno'),
(4, 'gabriel', 'gabs@gmail.com', '$2y$10$wTfc4W4SEu4Qq7yWRQhpKO2styuk9vKx/rfFVs11GPSjdy30WGeWC', 'aluno'),
(5, 'aaaa@gmail.com', '1234567@gmail.com', '$2y$10$xWPWEk7xlqNCRUxO2//JZO.dQzGuirEkyi38pZvqhkWJJ2CflAj.i', 'aluno'),
(6, 'vitor', 'vitor12@gmail.com', '$2y$10$WyDon6fuMDKTb14YrXG0peY.rzTdy92mtcY6L.HT3/Mzpr7ft7iZm', 'aluno'),
(7, 'Gabriel', 'gabriel@gmail.com', '$2y$10$bcXNXHUgQ/Bh1CQcCdNiaePpTJUZpl744lPnlxISU1SkgsTpQd93C', 'instrutor'),
(8, 'fiu', 'fioreze@gmail.com', '$2y$10$9bADS2euKtClaqBH/3DzD.nZRdexb/A2bh8GF/U3DqznMDbb5fHZ2', 'aluno'),
(9, 'greg', 'greg@gmail.com', '$2y$10$ftrOLfCL.71q2hu8wBkquuxzZcl8r1a1SfMFp8xl.4rgAJJ/eZ72m', 'instrutor');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
