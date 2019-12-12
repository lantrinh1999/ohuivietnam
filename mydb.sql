-- MySQL dump 10.17  Distrib 10.3.20-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: cosmetic
-- ------------------------------------------------------
-- Server version	10.3.20-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `attribute`
--

LOCK TABLES `attribute` WRITE;
/*!40000 ALTER TABLE `attribute` DISABLE KEYS */;
INSERT INTO `attribute` VALUES (1,'Khối lượng','khoi-luong','2019-11-18 02:38:27','2019-11-18 02:38:27'),(2,'Dung tích','dung-tich','2019-11-18 02:38:38','2019-11-18 02:38:38');
/*!40000 ALTER TABLE `attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `attribute_value`
--

LOCK TABLES `attribute_value` WRITE;
/*!40000 ALTER TABLE `attribute_value` DISABLE KEYS */;
INSERT INTO `attribute_value` VALUES (1,2,'100ml','100ml',NULL,'2019-11-18 02:38:49','2019-11-18 02:38:49'),(2,2,'200ml','200ml',NULL,'2019-11-18 02:38:54','2019-11-18 02:38:54'),(3,1,'100g','100g',NULL,'2019-11-18 02:39:05','2019-11-18 02:39:05'),(4,1,'200g','200g',NULL,'2019-11-18 02:39:10','2019-11-18 02:39:10');
/*!40000 ALTER TABLE `attribute_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (11,'Môi','moi',0,NULL,'2019-11-19 10:13:19','2019-11-19 10:13:19'),(12,'Son dưỡng','son-duong',11,NULL,'2019-11-19 10:13:31','2019-11-19 10:13:31'),(13,'Son thỏi','son-thoi',11,NULL,'2019-11-19 10:13:45','2019-11-19 10:13:45'),(14,'Son lỳ','son-ly',11,NULL,'2019-11-19 10:13:54','2019-11-19 10:13:54'),(15,'Mặt','mat',0,NULL,'2019-11-19 10:14:03','2019-11-19 10:14:03'),(16,'Phấn nền','phan-nen',15,NULL,'2019-11-19 10:14:12','2019-11-19 10:14:12'),(17,'Phấn trang điểm','phan-trang-diem',15,NULL,'2019-11-19 10:14:22','2019-11-19 10:14:22');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `discounts`
--

LOCK TABLES `discounts` WRITE;
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `earn_points`
--

LOCK TABLES `earn_points` WRITE;
/*!40000 ALTER TABLE `earn_points` DISABLE KEYS */;
/*!40000 ALTER TABLE `earn_points` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `get_reward`
--

LOCK TABLES `get_reward` WRITE;
/*!40000 ALTER TABLE `get_reward` DISABLE KEYS */;
/*!40000 ALTER TABLE `get_reward` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `history_reward`
--

LOCK TABLES `history_reward` WRITE;
/*!40000 ALTER TABLE `history_reward` DISABLE KEYS */;
/*!40000 ALTER TABLE `history_reward` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2015_10_12_000000_create_accounts_table',1),(4,'2019_10_24_162937_create_categories_table',1),(5,'2019_10_24_162940_create_products_table',1),(6,'2019_10_24_164207_create_comments_table',1),(7,'2019_10_24_164225_create_discounts_table',1),(8,'2019_10_24_164301_create_galleries_table',1),(9,'2019_10_24_164334_create_history_reward_table',1),(10,'2019_10_24_164356_create_options_table',1),(11,'2019_10_24_164360_create_vouchers_table',1),(12,'2019_10_24_164366_create_orders_table',1),(13,'2019_10_24_164438_create_pages_table',1),(14,'2019_10_24_164451_create_posts_table',1),(15,'2019_10_24_164555_create_products_categories_table',1),(16,'2019_10_24_164803_create_wishlists_table',1),(17,'2019_10_29_152159_create_earn_points_table',1),(18,'2019_10_29_152212_create_get_reward_table',1),(19,'2019_11_05_052704_create_social_accounts_table',1),(20,'2019_11_10_004900_create_attribute_table',1),(21,'2019_11_10_004928_create_attribute_value_table',1),(22,'2019_11_14_171541_add_sale_to_products_table',1),(23,'2019_11_17_191346_create_product_attribute',1),(24,'2019_12_24_164411_create_order_details_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product_attribute`
--

LOCK TABLES `product_attribute` WRITE;
/*!40000 ALTER TABLE `product_attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `social_accounts`
--

LOCK TABLES `social_accounts` WRITE;
/*!40000 ALTER TABLE `social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@gmail.com','$2y$10$J9h16ZLc4N0kM21N8Exg0uFOFAIHNifmI44tiTVoqtRRh9uRKtJ4G',500000,'ohuivietnam',NULL,1,500,0,'dXDwpenyqxriEoGM48RRJQCOf1j1UxWGy6MI2nDY2xMZvs7PtRKjCweIBeCu',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vouchers`
--

LOCK TABLES `vouchers` WRITE;
/*!40000 ALTER TABLE `vouchers` DISABLE KEYS */;
/*!40000 ALTER TABLE `vouchers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-22 22:47:49
