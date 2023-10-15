-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2023 a las 22:46:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `Id_categoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Cantidad_juegos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`Id_categoria`, `Nombre`, `Descripcion`, `Cantidad_juegos`) VALUES
(1, 'Run and gun', '\"Run & gun\" video games, also known as run & gun shooters, are a sub-genre of shoot, particularly side-scrolling shooter video games, in which the player generally controls a lone gunman as they travel on foot through levels defeating enemies.', 3),
(2, 'Simulation', '\"Simulation\" video games are a diverse super-category of video games, generally designed to closely simulate real world activities. A simulation game attempts to copy various activities from real life in the form of a game for various purposes such as training, analysis, prediction, or entertainment.', 1),
(3, 'Arcade', '\"Arcade\" video games are known for their fast-paced gameplay, frantic action, and immediate fun. Inspired by classic arcade machines that used to fill amusement arcades, these games focus on quick and accessible gameplay. The gaming experience in arcade titles is characterized by simple yet addictive challenges that test your reflexes and skills.', 1),
(4, 'Strategy', '\"Strategy\" video games are known for their emphasis on critical thinking, planning, and resource management. These games challenge players to use their intellect to outmaneuver opponents or solve complex puzzles.', 1),
(5, 'Metroidvania', '\"Metroidvania\" video games blend elements of exploration, action, and platforming, typically in a nonlinear world filled with secrets and upgrades. This category draws its name from two iconic game series, \"Metroid\" and \"Castlevania\", which pioneered this style of gameplay.', 3),
(7, 'Action', 'An action game is a video game genre that emphasizes physical challenges, including hand–eye coordination and reaction time.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `Id_juego` int(11) NOT NULL,
  `Id_categoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `Precio` int(11) NOT NULL,
  `Imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`Id_juego`, `Id_categoria`, `Nombre`, `Descripcion`, `Precio`, `Imagen`) VALUES
(1, 1, 'Sunset riders', '\"SUNSETRIDERS\" is an action shooting game released by KONAMI in 1991. The game takes place in the American Old West during the 19th century. Four gunmen are out to claim the grand prize linked to SIR RICHARD ROSE. Enjoy this exhilarating Western with simple controls.', 5250, 'https://img.unocero.com/2020/03/sunset-riders-nintendo-switch-1-1-1024x576.jpg'),
(2, 2, 'Euro Truck Simulator 2', 'Travel across Europe as king of the road, a trucker who delivers important cargo across impressive distances! With dozens of cities to explore, your endurance, skill and speed will all be pushed to their limits.', 1000, 'https://cdn.cloudflare.steamstatic.com/steam/apps/227300/header.jpg?t=1696680356'),
(3, 3, 'Donkey Kong', 'Donkey Kong is a large, powerful, muscular ape with a red tie sporting his initials. The name Donkey Kong is given to three characters in the Nintendo universe, including two from the arcade games and one from the Donkey Kong Country series.', 8385, 'https://upload.wikimedia.org/wikipedia/en/1/14/Donkey_Kong_flier.jpg'),
(4, 4, 'Age Of Empires 2 The Conquerors', 'Age of Empires II: Definitive Edition incluye \"Los últimos khanes\", que incorpora 3 campañas y 4 civilizaciones nuevas. Las frecuentes actualizaciones contienen eventos, contenido adicional, nuevos modos de juego (¡como el reciente modo cooperativo!) y funciones mejoradas.', 1500, 'https://cdn.cloudflare.steamstatic.com/steam/apps/813780/header.jpg?t=1688658568'),
(5, 5, 'Hollow Knight', '¡Forja tu propio camino en Hollow Knight! Una aventura épica a través de un vasto reino de insectos y héroes que se encuentra en ruinas. Explora cavernas tortuosas, combate contra criaturas corrompidas y entabla amistad con extraños insectos.', 1050, 'https://cdn.cloudflare.steamstatic.com/steam/apps/367520/header.jpg?t=1695270428'),
(6, 5, 'Blasphemous', 'Blasphemous es un juego de acción y plataformas sin piedad, con elementos de combate hack-n-slash, ambientado en el retorcido mundo de Cvstodia. Explora, mejora tus habilidades y masacra las hordas de enemigos que se interponen en tu misión para romper el ciclo de condenación eterna.', 1200, 'https://cdn.cloudflare.steamstatic.com/steam/apps/774361/header.jpg?t=1694433820'),
(7, 5, 'Blasphemous 2', 'El Penitente se despierta una vez más para librar una lucha sin fin contra el Milagro en Blasphemous 2.', 4200, 'https://cdn.cloudflare.steamstatic.com/steam/apps/2114740/header.jpg?t=1694618661'),
(8, 1, 'Mega Man 11', '¡Mega Man vuelve a la acción! La entrega más reciente de esta franquicia multimillonaria mezcla la desafiante acción de juego de plataformas 2D con un estilo visual renovado. El nuevo sistema de doble marcha da un nuevo giro a la gratificante mecánica de juego por la que es famosa la serie.', 1514, 'https://cdn.cloudflare.steamstatic.com/steam/apps/742300/header.jpg?t=1669873876'),
(10, 1, 'Cuphead', 'Cuphead es un juego de acción clásico estilo \"dispara y corre\" que se centra en combates contra el jefe. Inspirado en los dibujos animados de los años 30, los aspectos visual y sonoro están diseñados con esmero empleando las mismas técnicas de la época.', 6000, 'https://cdn.cloudflare.steamstatic.com/steam/apps/268910/header.jpg?t=1695655205'),
(14, 7, 'New World', 'Explora un emocionante MMO de mundo abierto repleto de peligros y oportunidades en el que forjarás un nuevo destino en la isla sobrenatural de Aetérnum.', 2600, 'https://cdn.cloudflare.steamstatic.com/steam/apps/1063730/header.jpg?t=1695753023');

--
-- Disparadores `juegos`
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `SuperAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `EsAdmin` tinyint(1) DEFAULT 0,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `SuperAdmin`, `EsAdmin`, `Email`, `Username`, `Password`) VALUES
(1, 0, 0, 'alexis@gmail.com', 'Ale', '$2y$10$tk0ED10D5S3heek0t2xPCusZIDM9nZtB51jj.lPkj4teFNhZpwO7m'),
(2, 0, 0, 'tanita@gmail.com', 'Abichuela', '$2y$10$AaXmtap2M.q6XcN2D45bpe/6O3sRDDTC6pKUEGx9WrraJKnsxU7PW'),
(3, 0, 0, 'pepito@gmail.com', 'Pepe', '$2y$10$SkLk1jMD4kIOzgu91A6j1.nvGeZ.ivJYen/4vEuoWZt1KdItBSYla'),
(4, 0, 0, 'franco.monsalvo24@gmail.com', 'CCindor', '$2y$10$exjzhNM9ZSivFa40VfLbZOqBl1Ve2zEx98NgBP1l3Jd7bGoXsGkyK'),
(5, 0, 1, 'web2-2c-2023@gmail.com', 'webadmin', '$2y$10$yZ1dGsfIfB1wbvm6OcJ4XO7lXalKUtat8Bi.EYQH/5s6RJqn7GLM.'),
(6, 0, 0, 'bonnibel@gmail.com', 'bonni', '$2y$10$03jDaSZwfv7qBxZMOuY27OsSNpQQp2YG493MrOP9uqojxyiaUBLLe'),
(7, 0, 0, 'bocajuniors@gmail.com', 'Boca', '$2y$10$YQG/NFdCLndelV1BQ5MiRuruEnpm3RtCE9yW0Pr.V1Ce0ISZtSz0W'),
(8, 0, 0, 'sergioc@gmail.com', 'Sergio', '$2y$10$ZzIAx1TqeIKZ0fpWJgVHAeCf5ZRTG9GUoxpaAsxhD3vERbrCBfpwy'),
(9, 1, 0, 'ale2.0@gmail.com', 'Ale 2.0', '$2y$10$5rk6TZ1/QDXFKG.GyJjjQOCcy.lSfK6fsYu5n4N8tfC7YLZx4ogQm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`Id_categoria`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`Id_juego`),
  ADD KEY `FK_id_categoria` (`Id_categoria`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `Id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `Id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `juegos_ibfk_1` FOREIGN KEY (`Id_categoria`) REFERENCES `categorias` (`Id_categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
