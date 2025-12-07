-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/12/2025 às 20:47
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
-- Banco de dados: `login`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome_aluno` varchar(100) NOT NULL,
  `data_nasc` date NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  `rua` varchar(120) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `nome_responsavel` varchar(100) NOT NULL,
  `tipo_responsavel` int(11) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome_aluno`, `data_nasc`, `cidade`, `bairro`, `rua`, `cep`, `nome_responsavel`, `tipo_responsavel`, `curso`) VALUES
(1, 'Lucas Pereira Lima', '2005-08-15', 'Crateús', 'São Vicente', 'Rua José Bastos, 123', '63000-001', 'Ana Paula Lima', 1, 3),
(2, 'Maria Eduarda Sousa', '2004-03-21', 'Novo Oriente', 'Centro', 'Avenida Principal, 45', '63000-002', 'João Vitor Sousa', 2, 1),
(3, 'Pedro Henrique Silva', '2006-11-03', 'Crateús', 'Fátima', 'Travessa dos Coqueiros, 78', '63000-003', 'Fernanda Mota', 1, 4),
(4, 'Isabela Freitas Costa', '2005-05-10', 'Independência', 'Cohab', 'Rua das Flores, 90', '63000-004', 'Carlos Alberto Costa', 3, 2),
(5, 'Gabriel Nunes Oliveira', '2003-01-28', 'Crateús', 'Campo Velho', 'Rua da Paz, 321', '63000-005', 'Patrícia Nunes', 5, 3),
(6, 'Julia Ferreira Santos', '2004-07-19', 'Nova Russas', 'São Francisco', 'Rua dos Navegantes, 65', '63000-006', 'Roberto Santos', 4, 1),
(7, 'Rafael Alves Mendes', '2006-09-02', 'Crateús', 'Aldeota', 'Avenida Dom Quixote, 10', '63000-007', 'Luiza Alves', 1, 2),
(8, 'Sofia Gomes Rocha', '2005-12-14', 'Quiterianópolis', 'Bela Vista', 'Rua Tiradentes, 22', '63000-008', 'Ricardo Gomes', 2, 4),
(9, 'Matheus Dantas Vieira', '2003-02-25', 'Independência', 'Centro', 'Rua 7 de Setembro, 54', '63000-009', 'Helena Dantas', 3, 3),
(10, 'Lara Barbosa Castro', '2006-04-17', 'Novo Oriente', 'Vila Nova', 'Travessa Ceará, 33', '63000-010', 'Marta Barbosa', 5, 1),
(11, 'Enzo Ribeiro Melo', '2004-10-08', 'Crateús', 'Ponte Preta', 'Rua do Sol, 88', '63000-011', 'Felipe Melo', 4, 2),
(12, 'Beatriz Costa Aguiar', '2005-06-30', 'Nova Russas', 'Centro', 'Rua Coronel Justino, 111', '63000-012', 'Camila Costa', 1, 4),
(13, 'Thiago Fernandes Pinheiro', '2003-03-12', 'Quiterianópolis', 'Centro', 'Avenida Castelo Branco, 25', '63000-013', 'Daniel Pinheiro', 2, 3),
(14, 'Giovanna Sales Teixeira', '2006-08-22', 'Crateús', 'São José', 'Rua da Saudade, 44', '63000-014', 'Cláudia Sales', 3, 1),
(15, 'Arthur Rocha Pimentel', '2004-01-07', 'Independência', 'Mata dos Cavalos', 'Rua das Acácias, 67', '63000-015', 'André Pimentel', 5, 2),
(16, 'Valentina Paz Morais', '2005-07-01', 'Novo Oriente', 'Lajedo', 'Avenida João Pessoa, 99', '63000-016', 'Silvana Paz', 4, 4),
(17, 'Miguel Borges Ramos', '2006-10-29', 'Nova Russas', 'Patronato', 'Rua das Margaridas, 30', '63000-017', 'Márcia Ramos', 1, 3),
(18, 'Heloísa Carvalho Soares', '2003-04-05', 'Crateús', 'Altamira', 'Travessa dos Estudantes, 15', '63000-018', 'Paulo Soares', 2, 1),
(19, 'Guilherme Xavier Lima', '2005-09-24', 'Quiterianópolis', 'Pedreiras', 'Rua Piauí, 18', '63000-019', 'Regina Xavier', 3, 2),
(20, 'Laura Cunha Batista', '2004-11-16', 'Independência', 'Vila Padre Cícero', 'Rua Amazonas, 50', '63000-020', 'Antônio Cunha', 4, 4),
(21, 'Sofia Lins Barros', '2007-03-11', 'Crateús', 'São Vicente', 'Rua do Progresso, 201', '63000-021', 'Antônio Barros', 1, 2),
(22, 'Davi Reis Nogueira', '2005-09-07', 'Crateús', 'Fátima', 'Rua da Glória, 42', '63000-022', 'Juliana Reis', 2, 4),
(23, 'Laura Rocha Farias', '2004-11-20', 'Novo Oriente', 'Centro', 'Rua XV de Novembro, 105', '63000-023', 'Ricardo Rocha', 3, 1),
(24, 'Heitor Brito Melo', '2006-01-28', 'Independência', 'Cohab', 'Avenida Norte, 77', '63000-024', 'Marcia Brito', 4, 3),
(25, 'Manuela Sales Dantas', '2007-05-19', 'Nova Russas', 'São Francisco', 'Rua Ceará, 11', '63000-025', 'José Dantas', 5, 2),
(26, 'Bernardo Alves Pinho', '2005-02-14', 'Quiterianópolis', 'Bela Vista', 'Rua Santos Dumont, 303', '63000-026', 'Amanda Pinho', 1, 1),
(27, 'Alice Nunes Bezerra', '2004-10-05', 'Crateús', 'Campo Velho', 'Rua do Amanhecer, 150', '63000-027', 'Fabio Bezerra', 2, 3),
(28, 'Lorenzo Moura Castro', '2006-12-23', 'Novo Oriente', 'Vila Nova', 'Rua da Bica, 222', '63000-028', 'Helena Castro', 3, 4),
(29, 'Helena Dias Santos', '2007-04-01', 'Independência', 'Centro', 'Rua São José, 18', '63000-029', 'Vitor Santos', 4, 2),
(30, 'Theo Gomes Ferreira', '2005-08-18', 'Nova Russas', 'Patronato', 'Travessa do Comércio, 55', '63000-030', 'Leticia Ferreira', 5, 1),
(31, 'Maria Clara Souza', '2004-03-29', 'Crateús', 'Aldeota', 'Avenida dos Ipês, 400', '63000-031', 'Diego Souza', 1, 3),
(32, 'Pedro Henrique Lima', '2006-11-12', 'Quiterianópolis', 'Pedreiras', 'Rua 25 de Março, 12', '63000-032', 'Camila Lima', 2, 4),
(33, 'Cecília Duarte Paiva', '2007-06-03', 'Novo Oriente', 'Lajedo', 'Rua das Palmeiras, 77', '63000-033', 'Luciano Paiva', 3, 1),
(34, 'João Gabriel Costa', '2005-01-22', 'Independência', 'Vila Padre Cícero', 'Rua da Esperança, 36', '63000-034', 'Marina Costa', 4, 2),
(35, 'Mariana Ferreira Viana', '2004-07-10', 'Crateús', 'São José', 'Rua das Amoreiras, 80', '63000-035', 'Roberto Viana', 5, 3),
(36, 'Gabriel Santos Xavier', '2006-09-25', 'Nova Russas', 'São Francisco', 'Avenida da Liberdade, 199', '63000-036', 'Ana Xavier', 1, 4),
(37, 'Lara Oliveira Morais', '2007-02-09', 'Quiterianópolis', 'Centro', 'Rua Rio de Janeiro, 21', '63000-037', 'Paulo Morais', 2, 1),
(38, 'Daniel Silva Mendes', '2005-04-13', 'Crateús', 'Altamira', 'Rua da Estrela, 50', '63000-038', 'Juliana Mendes', 3, 2),
(39, 'Isabela Viana Carvalho', '2004-12-04', 'Novo Oriente', 'Vila Nova', 'Travessa do Povo, 60', '63000-039', 'Felipe Carvalho', 4, 3),
(40, 'Arthur Ribeiro Guedes', '2006-08-01', 'Independência', 'Mata dos Cavalos', 'Rua da Primavera, 43', '63000-040', 'Cristina Guedes', 5, 4),
(41, 'Luiza Castro Sales', '2007-10-27', 'Nova Russas', 'Centro', 'Rua do Açude, 92', '63000-041', 'Bruno Sales', 1, 1),
(42, 'Mateus Alves Dias', '2005-03-15', 'Crateús', 'Ponte Preta', 'Rua dos Cristais, 75', '63000-042', 'Renata Dias', 2, 2),
(43, 'Giovanna Mendes Pires', '2004-05-09', 'Quiterianópolis', 'Pedreiras', 'Avenida Paraíso, 13', '63000-043', 'Fernando Pires', 3, 3),
(44, 'Felipe Gomes Soares', '2006-02-06', 'Novo Oriente', 'Lajedo', 'Rua da Saudade, 20', '63000-044', 'Patricia Soares', 4, 4),
(45, 'Júlia Lima Teixeira', '2007-09-17', 'Independência', 'Centro', 'Rua Sete Quedas, 85', '63000-045', 'Claudio Teixeira', 5, 1),
(46, 'Vicente Ferreira Nunes', '2005-06-21', 'Crateús', 'São Vicente', 'Rua A, 35', '63000-046', 'Adriana Nunes', 1, 2),
(47, 'Carolina Rocha Freire', '2004-08-03', 'Nova Russas', 'Patronato', 'Rua Padre Cícero, 29', '63000-047', 'Gustavo Freire', 2, 3),
(48, 'Guilherme Neves Brito', '2006-10-10', 'Quiterianópolis', 'Bela Vista', 'Avenida Beira Rio, 55', '63000-048', 'Lúcia Brito', 3, 4),
(49, 'Esther Souza Ramos', '2007-01-31', 'Crateús', 'Fátima', 'Rua B, 61', '63000-049', 'Sérgio Ramos', 4, 1),
(50, 'Murilo Pires Azevedo', '2005-11-26', 'Novo Oriente', 'Centro', 'Rua da Matriz, 72', '63000-050', 'Márcia Azevedo', 5, 2),
(51, 'Emanuel Santos Costa', '2004-02-19', 'Independência', 'Cohab', 'Rua E, 48', '63000-051', 'Carlos Costa', 1, 3),
(52, 'Clara Alves Mota', '2006-04-08', 'Nova Russas', 'São Francisco', 'Avenida Norte, 120', '63000-052', 'Andreia Mota', 2, 4),
(53, 'João Pedro Nogueira', '2007-07-25', 'Quiterianópolis', 'Pedreiras', 'Rua C, 91', '63000-053', 'Marcelo Nogueira', 3, 1),
(54, 'Ana Clara Duarte', '2005-12-11', 'Crateús', 'Campo Velho', 'Rua D, 21', '63000-054', 'Vânia Duarte', 4, 2),
(55, 'Benício Ribeiro Pinho', '2004-09-14', 'Novo Oriente', 'Vila Nova', 'Rua F, 37', '63000-055', 'Roberto Pinho', 5, 3),
(56, 'Heloísa Lima Borges', '2006-05-27', 'Independência', 'Vila Padre Cícero', 'Rua G, 15', '63000-056', 'Tatiane Borges', 1, 4),
(57, 'Nicolas Melo Soares', '2007-08-06', 'Nova Russas', 'Centro', 'Rua H, 88', '63000-057', 'Fernando Soares', 2, 1),
(58, 'Luiza Ferreira Ramos', '2005-03-02', 'Crateús', 'Aldeota', 'Avenida I, 55', '63000-058', 'Karla Ramos', 3, 2),
(59, 'Pietro Dias Lima', '2004-11-21', 'Quiterianópolis', 'Centro', 'Rua J, 66', '63000-059', 'Gilberto Lima', 4, 3),
(60, 'Elisa Viana Costa', '2006-01-16', 'Novo Oriente', 'Lajedo', 'Travessa K, 99', '63000-060', 'Renata Costa', 5, 4),
(61, 'Samuel Gomes Silva', '2007-04-29', 'Independência', 'Mata dos Cavalos', 'Rua L, 10', '63000-061', 'Ricardo Silva', 1, 1),
(62, 'Helena Aguiar Sales', '2005-07-04', 'Nova Russas', 'Patronato', 'Rua M, 20', '63000-062', 'Luciana Sales', 2, 2),
(63, 'Ryan Barbosa Freitas', '2004-06-19', 'Crateús', 'São José', 'Rua N, 30', '63000-063', 'Daniel Freitas', 3, 3),
(64, 'Cecília Lima Dantas', '2006-11-05', 'Quiterianópolis', 'Bela Vista', 'Rua O, 40', '63000-064', 'Simone Dantas', 4, 4),
(65, 'Benjamim Oliveira Paz', '2007-02-18', 'Novo Oriente', 'Vila Nova', 'Avenida P, 50', '63000-065', 'Alexandre Paz', 5, 1),
(66, 'Lívia Castro Mota', '2005-09-01', 'Independência', 'Centro', 'Rua Q, 60', '63000-066', 'Elaine Mota', 1, 2),
(67, 'Joaquim Sousa Alves', '2004-04-23', 'Nova Russas', 'São Francisco', 'Rua R, 70', '63000-067', 'Flávio Alves', 2, 3),
(68, 'Antônio Ferreira Rocha', '2006-08-14', 'Crateús', 'Altamira', 'Rua S, 80', '63000-068', 'Viviane Rocha', 3, 4),
(69, 'Isis Pereira Soares', '2007-01-09', 'Quiterianópolis', 'Pedreiras', 'Rua T, 90', '63000-069', 'Marcos Soares', 4, 1),
(70, 'Breno Teixeira Pires', '2005-10-30', 'Novo Oriente', 'Lajedo', 'Rua U, 100', '63000-070', 'Heloísa Pires', 5, 2),
(71, 'Benício Costa Ramos', '2007-11-20', 'Crateús', 'São Vicente', 'Rua V, 110', '63000-071', 'André Ramos', 1, 2),
(72, 'Isadora Nunes Lima', '2009-03-05', 'Novo Oriente', 'Centro', 'Avenida W, 120', '63000-072', 'Bia Nunes', 2, 4),
(73, 'Lucas Gabriel Pires', '2008-08-14', 'Independência', 'Cohab', 'Rua X, 130', '63000-073', 'Cláudio Pires', 3, 1),
(74, 'Chloe Sales Teixeira', '2010-01-27', 'Nova Russas', 'Centro', 'Rua Y, 140', '63000-074', 'Débora Sales', 4, 3),
(75, 'Miguel Ângelo Rocha', '2007-05-19', 'Quiterianópolis', 'Bela Vista', 'Rua Z, 150', '63000-075', 'Elaine Rocha', 5, 2),
(76, 'Valentina Dias Alves', '2009-02-14', 'Crateús', 'Fátima', 'Rua Alpha, 160', '63000-076', 'Fernando Alves', 1, 1),
(77, 'Guilherme Silva Mota', '2008-10-09', 'Novo Oriente', 'Vila Nova', 'Rua Beta, 170', '63000-077', 'Gabriela Mota', 2, 3),
(78, 'Maria Júlia Mendes', '2010-06-22', 'Independência', 'Centro', 'Rua Gama, 180', '63000-078', 'Henrique Mendes', 3, 4),
(79, 'Theo Oliveira Viana', '2007-12-04', 'Nova Russas', 'São Francisco', 'Avenida Delta, 190', '63000-079', 'Iara Oliveira', 4, 2),
(80, 'Alice Ferreira Gomes', '2009-07-30', 'Quiterianópolis', 'Pedreiras', 'Rua Épsilon, 200', '63000-080', 'João Gomes', 5, 1),
(81, 'Enzo Gabriel Castro', '2008-04-12', 'Crateús', 'Campo Velho', 'Rua Zeta, 210', '63000-081', 'Karina Castro', 1, 3),
(82, 'Laura Neves Soares', '2010-11-03', 'Novo Oriente', 'Lajedo', 'Rua Eta, 220', '63000-082', 'Lucas Soares', 2, 4),
(83, 'Rafaela Lima Paz', '2007-06-28', 'Independência', 'Vila Padre Cícero', 'Rua Teta, 230', '63000-083', 'Marta Paz', 3, 1),
(84, 'Arthur Farias Borges', '2009-01-16', 'Nova Russas', 'Patronato', 'Avenida Iota, 240', '63000-084', 'Nuno Borges', 4, 2),
(85, 'Helena Costa Ramos', '2008-09-01', 'Quiterianópolis', 'Centro', 'Rua Kappa, 250', '63000-085', 'Olívia Ramos', 5, 3),
(86, 'Davi Lucca Souza', '2010-05-11', 'Crateús', 'Aldeota', 'Rua Lambda, 260', '63000-086', 'Pedro Souza', 1, 4),
(87, 'Manuella Alves Duarte', '2007-03-24', 'Novo Oriente', 'Centro', 'Rua Mu, 270', '63000-087', 'Quitéria Duarte', 2, 1),
(88, 'Calebe Ribeiro Freitas', '2009-12-19', 'Independência', 'Mata dos Cavalos', 'Rua Nu, 280', '63000-088', 'Rafael Freitas', 3, 2),
(89, 'Lívia Gomes Vieira', '2008-07-07', 'Nova Russas', 'São Francisco', 'Rua Xi, 290', '63000-089', 'Sônia Vieira', 4, 3),
(90, 'Heitor Sales Pinho', '2010-04-03', 'Quiterianópolis', 'Bela Vista', 'Avenida Ômicron, 300', '63000-090', 'Telmo Pinho', 5, 4),
(91, 'Pietro Santos Aguiar', '2007-08-17', 'Crateús', 'São José', 'Rua Pi, 310', '63000-091', 'Ulisses Aguiar', 1, 1),
(92, 'Sofia Lima Barbosa', '2009-11-23', 'Novo Oriente', 'Vila Nova', 'Rua Ro, 320', '63000-092', 'Vera Barbosa', 2, 2),
(93, 'Isac Mota Nogueira', '2008-02-06', 'Independência', 'Cohab', 'Rua Sigma, 330', '63000-093', 'Waldir Nogueira', 3, 3),
(94, 'Cecília Rocha Xavier', '2010-09-15', 'Nova Russas', 'Centro', 'Rua Tau, 340', '63000-094', 'Yara Xavier', 4, 4),
(95, 'João Lucas Castro', '2007-04-01', 'Quiterianópolis', 'Pedreiras', 'Avenida Ípsilon, 350', '63000-095', 'Zeca Castro', 5, 1),
(96, 'Clarice Alves Sousa', '2009-05-26', 'Crateús', 'Altamira', 'Rua Phi, 360', '63000-096', 'Ângela Sousa', 1, 2),
(97, 'Rodrigo Viana Lima', '2008-12-10', 'Novo Oriente', 'Lajedo', 'Rua Chi, 370', '63000-097', 'Beto Lima', 2, 3),
(98, 'Marina Teixeira Paz', '2010-03-18', 'Independência', 'Vila Padre Cícero', 'Rua Psi, 380', '63000-098', 'Cida Paz', 3, 4),
(99, 'Benjamim Mendes Costa', '2007-10-04', 'Nova Russas', 'Patronato', 'Rua Ômega, 390', '63000-099', 'Duda Costa', 4, 1),
(100, 'Manuella Dias Silva', '2009-01-21', 'Quiterianópolis', 'Bela Vista', 'Rua Mil, 400', '63000-100', 'Elias Silva', 5, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Admin', 'test@test.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
