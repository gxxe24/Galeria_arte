-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.4.3 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla proyectointegrador.cache: ~0 rows (aproximadamente)

-- Volcando datos para la tabla proyectointegrador.cache_locks: ~0 rows (aproximadamente)

-- Volcando datos para la tabla proyectointegrador.extras: ~0 rows (aproximadamente)

-- Volcando datos para la tabla proyectointegrador.failed_jobs: ~0 rows (aproximadamente)

-- Volcando datos para la tabla proyectointegrador.jobs: ~0 rows (aproximadamente)

-- Volcando datos para la tabla proyectointegrador.job_batches: ~0 rows (aproximadamente)

-- Volcando datos para la tabla proyectointegrador.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1);

-- Volcando datos para la tabla proyectointegrador.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando datos para la tabla proyectointegrador.presentacion: ~0 rows (aproximadamente)
INSERT INTO `presentacion` (`id`, `idcategoria`, `nombre`) VALUES
	(1, 2, 'Grande');

-- Volcando datos para la tabla proyectointegrador.productos: ~6 rows (aproximadamente)
INSERT INTO `productos` (`id`, `idtipo`, `nombre`, `precio`, `descripcion`, `foto`) VALUES
	(1, 1, 'Resonancia Etérea\r\n\r\n', 1500, 'Lorem ipsum dolor sit amet consectetur adipiscing elit, condimentum lobortis iaculis tortor hendrerit bibendum per aenean, pharetra facilisi suscipit leo sem ', 'https://i.pinimg.com/736x/b1/a5/4c/b1a54c35428ebb981c3052dad7a79d37.jpg'),
	(3, 2, 'Pepe', 110000, 'Pepe es pepe', ''),
	(5, 3, 'Abstracto 2', 10000, '---', ''),
	(6, 3, 'Aaaa', 12000, 'NADA', 'https://cdn2.unrealengine.com/Diesel%2Fproductv2%2Fbatman-arkham-knight%2FEGS_WB_Batman_Arkham_Knight_G1_1920x1080_19_0911-1920x1080-1d69e15f00cb5ab57249f208f1f8f45d52cbbc59.jpg');

-- Volcando datos para la tabla proyectointegrador.sessions: ~2 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('7vqGHnj7tfZXleT4xNGKzzCYAIRMqinDN3qTAKz3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzFQQUt0MjZIOHd2dkZEWW0yRUp4R3pvS3hQRVJ3c1V1NENiZjZVRSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770422765),
	('ilUpXntj2KQTt4UAv06Y2KfiLMHtVilmAzlEaDGZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWEZPRW4yV3RubUk5WFdiUXROMjFqUnZwR3R6amkwVXI5Z0FiQVZycSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXRhbG9nb19wcm9kdWN0b3MiO3M6NToicm91dGUiO3M6MjY6IkdhbGVyaWEuY2F0YWxvZ29fcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770403635);

-- Volcando datos para la tabla proyectointegrador.tipo: ~3 rows (aproximadamente)
INSERT INTO `tipo` (`id`, `nombre`) VALUES
	(1, 'Pintura'),
	(2, 'Escultura'),
	(3, 'Abstracto');

-- Volcando datos para la tabla proyectointegrador.users: ~0 rows (aproximadamente)

-- Volcando datos para la tabla proyectointegrador.usuarios: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
