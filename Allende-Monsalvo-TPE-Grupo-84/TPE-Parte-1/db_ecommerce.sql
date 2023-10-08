-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 01:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `Id_categoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Cantidad_juegos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`Id_categoria`, `Nombre`, `Descripcion`, `Cantidad_juegos`) VALUES
(1, 'Run and gun', '\"Run & gun\" video games, also known as run & gun shooters, are a sub-genre of shoot \\\'em ups, particularly side-scrolling shooter video games, in which the player generally controls a lone gunman as they travel on foot through levels defeating enemies.', 3),
(2, 'Simulator', '\"Simulation\" video games are a diverse super-category of video games, generally designed to closely simulate real world activities. A simulation game attempts to copy various activities from real life in the form of a game for various purposes such as training, analysis, prediction, or entertainment.', 1),
(3, 'Arcade', '\"Arcade\" video games are known for their fast-paced gameplay, frantic action, and immediate fun. Inspired by classic arcade machines that used to fill amusement arcades, these games focus on quick and accessible gameplay. The gaming experience in arcade titles is characterized by simple yet addictive challenges that test your reflexes and skills.\'', 1),
(4, 'Strategy', '\"Strategy\" video games are known for their emphasis on critical thinking, planning, and resource management. These games challenge players to use their intellect to outmaneuver opponents or solve complex puzzles.\'', 1),
(5, 'Metroidvania', '\"Metroidvania\" video games blend elements of exploration, action, and platforming, typically in a nonlinear world filled with secrets and upgrades. This category draws its name from two iconic game series, \"Metroid\" and \"Castlevania\", which pioneered this style of gameplay.\'', 3);

-- --------------------------------------------------------

--
-- Table structure for table `juegos`
--

CREATE TABLE `juegos` (
  `Id_juego` int(11) NOT NULL,
  `Id_categoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `juegos`
--

INSERT INTO `juegos` (`Id_juego`, `Id_categoria`, `Nombre`, `Precio`, `Imagen`) VALUES
(1, 1, 'Sunset riders', 4900, 'https://img.unocero.com/2020/03/sunset-riders-nintendo-switch-1-1-1024x576.jpg'),
(2, 2, 'Euro Truck Simulator 2', 964, 'https://cdn.cloudflare.steamstatic.com/steam/apps/227300/header.jpg?t=1696680356'),
(3, 3, 'Donkey Kong', 8385, 'https://upload.wikimedia.org/wikipedia/en/1/14/Donkey_Kong_flier.jpg'),
(4, 4, 'Age Of Empires 2 The Conquerors', 1500, 'https://cdn.cloudflare.steamstatic.com/steam/apps/813780/header.jpg?t=1688658568'),
(5, 5, 'Hollow Knight', 1050, 'https://cdn.cloudflare.steamstatic.com/steam/apps/367520/header.jpg?t=1695270428'),
(6, 5, 'Blasphemous', 1200, 'https://cdn.cloudflare.steamstatic.com/steam/apps/774361/header.jpg?t=1694433820'),
(7, 5, 'Blasphemous 2', 4200, 'https://cdn.cloudflare.steamstatic.com/steam/apps/2114740/header.jpg?t=1694618661'),
(8, 1, 'Mega Man 11', 1514, 'https://cdn.cloudflare.steamstatic.com/steam/apps/742300/header.jpg?t=1669873876'),
(9, 1, 'Cuphead', 6000, 'https://cdn.cloudflare.steamstatic.com/steam/apps/268910/header.jpg?t=1695655205');

--
-- Triggers `juegos`
--
DELIMITER $$
CREATE TRIGGER `after_juego_delete` AFTER DELETE ON `juegos` FOR EACH ROW BEGIN
    UPDATE categorias
    SET cantidad_juegos = (
        SELECT COUNT(*)
        FROM juegos
        WHERE juegos.id_categoria = categorias.id_categoria
    )
    WHERE id_categoria = OLD.id_categoria;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_juego_insert` AFTER INSERT ON `juegos` FOR EACH ROW BEGIN
    UPDATE categorias
    SET cantidad_juegos = cantidad_juegos + 1
    WHERE id_categoria = NEW.id_categoria;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_juego_update` AFTER UPDATE ON `juegos` FOR EACH ROW BEGIN
    UPDATE categorias
    SET cantidad_juegos = (
        SELECT COUNT(*)
        FROM juegos
        WHERE juegos.id_categoria = categorias.id_categoria
    )
    WHERE id_categoria = NEW.id_categoria;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `EsAdmin` tinyint(1) DEFAULT 0,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `EsAdmin`, `Email`, `Username`, `Password`) VALUES
(1, 0, 'alexis@gmail.com', 'Ale', '$2y$10$tk0ED10D5S3heek0t2xPCusZIDM9nZtB51jj.lPkj4teFNhZpwO7m'),
(2, 0, 'tanita@gmail.com', 'Abichuela', '$2y$10$AaXmtap2M.q6XcN2D45bpe/6O3sRDDTC6pKUEGx9WrraJKnsxU7PW'),
(3, 0, 'pepito@gmail.com', 'Pepe', '$2y$10$SkLk1jMD4kIOzgu91A6j1.nvGeZ.ivJYen/4vEuoWZt1KdItBSYla'),
(4, 0, 'franco.monsalvo24@gmail.com', 'CCindor', '$2y$10$exjzhNM9ZSivFa40VfLbZOqBl1Ve2zEx98NgBP1l3Jd7bGoXsGkyK'),
(5, 1, 'web2-2c-2023@gmail.com', 'webadmin', '$2y$10$yZ1dGsfIfB1wbvm6OcJ4XO7lXalKUtat8Bi.EYQH/5s6RJqn7GLM.'),
(6, 0, 'bonnibel@gmail.com', 'bonni', '$2y$10$03jDaSZwfv7qBxZMOuY27OsSNpQQp2YG493MrOP9uqojxyiaUBLLe'),
(7, 0, 'bocajuniors@gmail.com', 'Boca', '$2y$10$YQG/NFdCLndelV1BQ5MiRuruEnpm3RtCE9yW0Pr.V1Ce0ISZtSz0W'),
(8, 0, 'sergioc@gmail.com', 'Sergio', '$2y$10$ZzIAx1TqeIKZ0fpWJgVHAeCf5ZRTG9GUoxpaAsxhD3vERbrCBfpwy'),
(9, 0, 'ale2.0@gmail.com', 'Ale 2.0', '$2y$10$5rk6TZ1/QDXFKG.GyJjjQOCcy.lSfK6fsYu5n4N8tfC7YLZx4ogQm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`Id_categoria`);

--
-- Indexes for table `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`Id_juego`),
  ADD KEY `FK_id_categoria` (`Id_categoria`) USING BTREE;

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `Id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `juegos`
--
ALTER TABLE `juegos`
  MODIFY `Id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `juegos_ibfk_1` FOREIGN KEY (`Id_categoria`) REFERENCES `categorias` (`Id_categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
