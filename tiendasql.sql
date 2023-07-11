-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla tiendadevelopapp.categories: ~2 rows (aproximadamente)
REPLACE INTO `categories` (`id`, `slug`, `name`, `picture`, `created_at`, `updated_at`) VALUES
	(30, 'producto', 'Producto', NULL, '2023-07-10 02:26:25', '2023-07-10 02:38:24'),
	(32, 'cosmticos', 'Cosméticos', NULL, '2023-07-10 19:20:36', '2023-07-10 19:20:36');

-- Volcando datos para la tabla tiendadevelopapp.coupons: ~0 rows (aproximadamente)
REPLACE INTO `coupons` (`id`, `name`, `type`, `value`, `uses`, `used`, `created_at`, `updated_at`) VALUES
	(1, 'asd', 1, 12, 12, NULL, NULL, NULL);

-- Volcando datos para la tabla tiendadevelopapp.failed_jobs: ~0 rows (aproximadamente)

-- Volcando datos para la tabla tiendadevelopapp.favorites: ~0 rows (aproximadamente)

-- Volcando datos para la tabla tiendadevelopapp.migrations: ~0 rows (aproximadamente)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(2, '2023_07_06_000000_create_statuses_table', 1),
	(3, '2023_07_07_000000_create_user_rols_table', 1),
	(4, '2023_07_07_000001_create_users_table', 1),
	(5, '2023_07_07_000003_create_failed_jobs_table', 1),
	(6, '2023_07_07_100002_create_password_resets_table', 1),
	(7, '2023_07_07_211951_create_categories_table', 1),
	(8, '2023_07_07_212543_create_products_table', 1),
	(9, '2023_07_07_212544_create_products_details_table', 1),
	(10, '2023_07_07_212623_create_favorites_table', 1),
	(11, '2023_07_07_212855_create_user_addresses_table', 1),
	(12, '2023_07_07_213012_create_coupons_table', 1),
	(13, '2023_07_07_213014_create_shipping_zone_methods_table', 1),
	(14, '2023_07_07_213015_create_orders_table', 1),
	(15, '2023_07_07_223734_create_settings_table', 1),
	(16, '2023_07_07_224512_create_orders_items_table', 1),
	(17, '2023_07_07_230432_create_orders_notes_table', 1);

-- Volcando datos para la tabla tiendadevelopapp.orders: ~0 rows (aproximadamente)
REPLACE INTO `orders` (`id`, `id_status`, `id_user`, `id_billing`, `id_shipping`, `note`, `sub_total`, `id_coupon`, `discount`, `total`, `envio`, `created_at`, `updated_at`) VALUES
	(4, 1, 6, 4, 4, NULL, 3500, NULL, NULL, 8500, 5000, '2023-07-11 16:25:01', '2023-07-11 16:25:01');

-- Volcando datos para la tabla tiendadevelopapp.orders_items: ~0 rows (aproximadamente)
REPLACE INTO `orders_items` (`id`, `id_orders`, `id_product`, `created_at`, `updated_at`, `value`, `quantity`) VALUES
	(5, 4, 7, '2023-07-11 16:25:01', '2023-07-11 16:25:01', 1500, 1),
	(6, 4, 8, '2023-07-11 16:25:01', '2023-07-11 16:25:01', 2000, 1);

-- Volcando datos para la tabla tiendadevelopapp.orders_notes: ~0 rows (aproximadamente)

-- Volcando datos para la tabla tiendadevelopapp.password_resets: ~0 rows (aproximadamente)

-- Volcando datos para la tabla tiendadevelopapp.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando datos para la tabla tiendadevelopapp.products: ~4 rows (aproximadamente)
REPLACE INTO `products` (`id`, `id_categories`, `id_status`, `name`, `slug`, `picture`, `short_description`, `description`, `inventory`, `price`, `sale_price`, `created_at`, `updated_at`) VALUES
	(7, 30, 1, 'Colageno', 'colageno', '/imagenes/1688986834_COLAGENO-x-100.jpg', 'Registro Sanitario: NSOC12017-22CO', 'Este producto te puede interesar', 198, 2000, 1500, '2023-07-10 16:00:34', '2023-07-11 16:25:01'),
	(8, 30, 1, 'JARABE DE TOTUMO', 'jarabedetotumo', '/imagenes/1688987037_JARABE-TOTUMO.png', 'Registro Sanitario: PFT2022-0000014-R2', 'Estos productos te van a interesar', 1995, 2000, NULL, '2023-07-10 16:03:57', '2023-07-11 16:25:01'),
	(9, 30, 1, 'ISOFLAVONAS DE SOYA', 'isoflavonasdesoya', '/imagenes/1688987439_ISOFLAVONAS-x-60.png', 'Registro Sanitario: SD2013-0002708', 'Estos productos te van a interesar', 2000, 2000, NULL, '2023-07-10 16:10:39', '2023-07-10 16:10:39');

-- Volcando datos para la tabla tiendadevelopapp.products_attributes: ~3 rows (aproximadamente)
REPLACE INTO `products_attributes` (`id`, `id_product`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(6, 7, 'VITAMINA', 'E', '2023-07-10 16:00:34', '2023-07-10 16:00:34'),
	(7, 8, 'Totumo (Crescentia cujete)', '62,50 gramos', '2023-07-10 16:03:57', '2023-07-10 16:03:57'),
	(8, 9, 'Vitamina', 'C', '2023-07-10 16:10:39', '2023-07-10 16:10:39');

-- Volcando datos para la tabla tiendadevelopapp.settings: ~0 rows (aproximadamente)

-- Volcando datos para la tabla tiendadevelopapp.shipping_zone_methods: ~2 rows (aproximadamente)
REPLACE INTO `shipping_zone_methods` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
	(2, 'Envió gratis', 0, '2023-07-10 15:07:13', '2023-07-10 15:07:13'),
	(3, 'Precio fijo', 5000, '2023-07-10 15:07:25', '2023-07-10 15:07:25');

-- Volcando datos para la tabla tiendadevelopapp.statuses: ~0 rows (aproximadamente)
REPLACE INTO `statuses` (`id`, `type`, `name`, `created_at`, `updated_at`) VALUES
	(1, 1, 'draf', NULL, NULL),
	(2, 1, 'nuevo', NULL, NULL);

-- Volcando datos para la tabla tiendadevelopapp.users: ~0 rows (aproximadamente)
REPLACE INTO `users` (`id`, `rol`, `id_status`, `name`, `last_name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'Admin', 'admin', '123456789', 'parra@gmail.com', NULL, '$2y$10$lkdzBPxkH0aBXM7PBhEWluir.7quQ2BFBlLBI4/aML.HQK4MU4122', NULL, '2023-07-10 21:41:52', '2023-07-10 21:41:52'),
	(3, 2, 1, '3045787762', 'Prueba', '3045787762', 'parra2@gmail.com', NULL, '$2y$10$RwiM7/bk8xeE53gBaED1GOi2voI.9Us0MBkfFuibMDxt2QNz9BvWi', NULL, '2023-07-11 15:17:28', '2023-07-11 15:17:28'),
	(4, 2, 1, '3045787762', 'Prueba', '3045787762', 'parra3@gmail.com', NULL, '$2y$10$jL0eOsRYfgurcGozLF/VkO8Lrviw14Zaxbm801M2faDUqlPO9Ned2', NULL, '2023-07-11 15:30:40', '2023-07-11 15:30:40'),
	(5, 2, 1, 'Prueba', 'prueba', '3045787762', 'prueba@gmail.com', NULL, '$2y$10$07Brd96HMyH33QCeEbped.owEzJuBr9wLsN1TruWWZZAa4mgUX3bS', NULL, '2023-07-11 16:11:15', '2023-07-11 16:11:15'),
	(6, 2, 1, 'Prueba', 'prueba', '3045787762', 'prueba2@gmail.com', NULL, '$2y$10$qiSVpVeHttYRdUpiexLkw.p3Z34ozSFDewWRRK5wOvEof6uyVUlHu', NULL, '2023-07-11 16:25:01', '2023-07-11 16:25:01');

-- Volcando datos para la tabla tiendadevelopapp.user_addresses: ~0 rows (aproximadamente)
REPLACE INTO `user_addresses` (`id`, `id_user`, `type`, `address`, `department`, `state`, `created_at`, `updated_at`) VALUES
	(1, 3, 1, 'Cra 27 calle 83', 'asd', 'asd', '2023-07-11 15:17:28', '2023-07-11 15:17:28'),
	(2, 4, 1, 'Cra 27 calle 83', 'asd', 'asd', '2023-07-11 15:30:40', '2023-07-11 15:30:40'),
	(3, 5, 1, 'Cra 27 calle 83', 'Atlantico', 'barranquilla', '2023-07-11 16:11:15', '2023-07-11 16:11:15'),
	(4, 6, 1, 'Cra 27 calle 83', 'Atlantico', 'Barranquilla', '2023-07-11 16:25:01', '2023-07-11 16:25:01');

-- Volcando datos para la tabla tiendadevelopapp.user_rols: ~0 rows (aproximadamente)
REPLACE INTO `user_rols` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', NULL, NULL),
	(2, 'user', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
