-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-10-2022 a las 05:30:06
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `news_diario_proyectocet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `autor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `imagen`, `texto`, `fecha_creacion`, `autor`) VALUES
(54, 'Evolution', '1664694793_vinilo.png', 'Evolution Music desarrolló un producto que contribuye a descarbonizar la industria musical y el creador Marc Carey pretende que los artistas dejen de utilizar PVC en los vinilos y apuesten al disco fabricado en bioplástico.', '2022-10-02 09:13:13', 'CNN español'),
(55, 'La NASA descubre un exoplaneta parecido a la Tierra', '1664694912_supertierraspng.png', 'La NASA ha descubierto un exoplaneta posiblemente cubierto de océanos a 100 años luz de la Tierra. Por sus similitudes con nuestro mundo, TOI-1452 b entra en el grupo de las \"supertierras\". Mira más detalles de este descubrimiento.', '2022-10-02 09:15:12', 'CNN español'),
(56, 'Apple asegura trabajar en la falla reportada en los iPhone 14 Pro y Pro-Max', '1664694940_iphone.png', 'Apple asegura trabajar en la falla reportada en los iPhone 14 Pro y Pro-Max. Tras quejas de usuarios, el gigante tecnológico Apple asegura estar trabajando en el defecto detectado en sus dos últimos dispositivos iPhone 14 Pro y iPhone 14 Pro Max. Aquí los detalles.', '2022-10-02 09:15:40', 'CNN español');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `fecha_creacion`) VALUES
(3, 'gaby', 'gabyugartemaco@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-09-27 18:47:39'),
(4, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-09-27 19:24:12'),
(5, 'maddy', 'maddy@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-09-27 20:39:09'),
(6, 'laia', 'laia@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-09-27 23:33:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;
