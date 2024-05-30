-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 06:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `titulo`, `conteudo`, `criado_em`, `actualizado_em`) VALUES
(4, 1, 'Tipos de webdesign', 'Web Design Ilustrativo\r\nA ilustração é uma ferramenta incrivelmente versátil que pode encontrar muitos usos diferentes em design. E quando se trata de web design, podemos encontrar uma variedade extremamente ampla de implementações, complementando com desenhos, artes e até pinturas, deixando o site mais parecido com a sua marca.\r\n\r\nWeb Design Minimalista\r\nO objetivo do minimalismo é expor a essência do site eliminando todas as formas não essenciais, recursos e conceitos. Em web design, minimalismo apaga potenciais distrações e desnuda elementos em suas formas mais básicas.\r\n\r\nWeb Design Tipográfico\r\nAs primeiras impressões são as que ficam. Se você ainda não percebeu, sua tipografia ajuda a criar uma experiência para os usuários antes mesmo de ler uma palavra ou clicar em um botão. Tipografia tem o potencial para ir além de simplesmente contar uma história. O tipo de fonte cria uma atmosfera e indica uma resposta muito parecida com o tom de voz.Como um dos princípios essenciais do site, a tipografia pode realmente ajudar ou fazer fracassar um design de site. Apesar dos recentes avanços na tecnologia, estamos ainda bastante limitados quando se trata de layouts de tipografias criativas, ou seja, técnicas de substituição de imagem ainda são comuns, mas atualmente temos um enorme leque de escolhas quando se trata de fontes para os nossos projetos.\r\n\r\nWeb Design de única página\r\nO Web Design de única página não é uma nova tendência. Esta opção de design de sites sugere que ela é mais prática e eficaz do que a maioria. Como todas as tendências, os sites de página única têm as suas vantagens e desvantagens, mas em um mundo onde milhares de novos sites são criados diariamente, uma única página pode ser a melhor maneira para atender o público-alvo, uma vez que não haverá muita distração pelo site.\r\n\r\nSaiba que a única página não é ideal para todos os fins. Ter um propósito refinado para seu site, saber se o seu conteúdo vai caber numa única página e criar um layout interessante são alguns dos pontos mais importantes para fazer seu design de página única atender todo o seu potencial.\r\n\r\nWeb Design Liso\r\nO design plano é uma abordagem de design minimalista que tem como objetivo a usabilidade. Dispõe de espaço limpo, aberto, bordas nítidas, cores vivas e ilustrações bidimensionais/planas .A Microsoft foi uma das primeiras a aplicar este estilo de design à sua interface. Em vez de converter um objeto na vida real, tais como uma agenda em uma pequena ilustração realista, os defensores do design plano identificaram aplicativos com imagens simples, como os ícones. Em vez de trazer aspectos da vida real para uma interface, é ilustrada uma separação clara entre a tecnologia e os objetos táteis.', '2024-05-30 14:10:03', '2024-05-30 14:10:03'),
(5, 1, 'Definicao de webdesign', 'Web design é uma área do design que cuida de toda a comunicação visual de uma página na internet, sendo não apenas responsável pela parte da estética de um site, como também da parte de funcionalidade do site.\r\n\r\nOu seja, uma página, loja virtual ou software precisa ser tão bonito, quanto funcional para os usuários.', '2024-05-30 16:06:16', '2024-05-30 16:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `criado_em`) VALUES
(1, 'admin', '1234', '2024-05-27 14:53:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
