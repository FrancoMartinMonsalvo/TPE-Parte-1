-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 07:41 PM
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
  `Descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`Id_categoria`, `Nombre`, `Descripcion`) VALUES
(1, 'Run and gun', '\"Run & gun\" video games, also known as run & gun shooters, are a sub-genre of shoot \'em ups, particularly side-scrolling shooter video games, in which the player generally controls a lone gunman as they travel on foot through levels defeating enemies.'),
(2, 'Simulation', '\"Simulation\" video games are a diverse super-category of video games, generally designed to closely simulate real world activities. A simulation game attempts to copy various activities from real life in the form of a game for various purposes such as training, analysis, prediction, or entertainment.'),
(3, 'Arcade', '\"Arcade\" video games are known for their fast-paced gameplay, frantic action, and immediate fun. Inspired by classic arcade machines that used to fill amusement arcades, these games focus on quick and accessible gameplay. The gaming experience in arcade titles is characterized by simple yet addictive challenges that test your reflexes and skills.'),
(4, 'Strategy', '\"Strategy\" video games are known for their emphasis on critical thinking, planning, and resource management. These games challenge players to use their intellect to outmaneuver opponents or solve complex puzzles.'),
(5, 'Metroidvania', '\"Metroidvania\" video games blend elements of exploration, action, and platforming, typically in a nonlinear world filled with secrets and upgrades. This category draws its name from two iconic game series, \"Metroid\" and \"Castlevania,\" which pioneered this style of gameplay.');

-- --------------------------------------------------------

--
-- Table structure for table `juegos`
--

CREATE TABLE `juegos` (
  `Id_juego` int(11) NOT NULL,
  `Id_categoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `juegos`
--

INSERT INTO `juegos` (`Id_juego`, `Id_categoria`, `Nombre`, `Precio`) VALUES
(1, 1, 'Sunset riders', 4900),
(2, 2, 'Euro truck simulator 2', 964),
(3, 3, 'Donkey Kong', 8385),
(4, 4, 'Age Of Empires 2 The Conquerors', 1500),
(5, 5, 'Hollow Knight', 1050),
(6, 5, 'Blasphemous', 1200),
(7, 5, 'Blasphemous 2', 4200),
(12, 2, 'WRC 4 FIA World Rally Championship', 227),
(14, 3, '123', 4800);

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
  MODIFY `Id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
