-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: wild_shop
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `basket`
--

DROP TABLE IF EXISTS `basket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `basket` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `product_id` bigint unsigned NOT NULL,
  `session_id` text NOT NULL,
  `count` int NOT NULL DEFAULT '1',
  `price` decimal(10,0) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basket`
--

LOCK TABLES `basket` WRITE;
/*!40000 ALTER TABLE `basket` DISABLE KEYS */;
INSERT INTO `basket` VALUES (1,1,2,'454864lkjgg',2,12);
/*!40000 ALTER TABLE `basket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `text` text,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'Все супер!','2021-05-26 12:53:31'),(2,2,'Мне не понравилось(','2021-05-26 15:53:31'),(3,1,'Высшее качество обслуживания!','2021-05-28 12:53:31'),(4,2,'Я больше ни ногой','2021-05-29 19:53:31'),(5,1,'таким как ты никогда ничего не нравится','2021-05-30 10:53:31');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `likes` int unsigned DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'01.jpg',2),(2,'02.jpg',6),(3,'03.jpg',8),(4,'04.jpg',4),(5,'05.jpg',0),(6,'06.jpg',9),(7,'07.jpg',22),(8,'08.jpg',20),(9,'09.jpg',14),(10,'10.jpg',15),(11,'11.jpg',68),(12,'12.jpg',12),(13,'13.jpg',23),(14,'14.jpg',31),(15,'15.jpg',36);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `category_id` bigint unsigned NOT NULL,
  `views` int DEFAULT '0',
  UNIQUE KEY `id` (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `newscategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Иностранный язык для особенных детей: шпаргалка для учителя','МОСКВА, 25 мая — РИА Новости. Ученые Московского городского педагогического университета (МГПУ) разработали модульную программу повышения квалификации учителей иностранного языка, работающих в инклюзивном классе. В программе сформулированы дополнительные профессиональные компетенции педагога, необходимые для успешной работы с детьми с особыми образовательными потребностями, связанными с ограничениями возможностями здоровья (слух, зрение, работа опорно-двигательного аппарата). Исследование опубликовано в журнале Integration of Education.',2,2),(2,'Путин поддержал идею об отчетах депутатов перед избирателями','Президент РФ Владимир Путин поддержал идею обязать депутатов Госдумы и парламентские партии на постоянной основе отчитываться перед избирателями о проделанной работе.\nДепутат Александр Хинштейн (ЕР) на встрече президента с руководством партии \"Единая Россия\" и участниками праймериз предложил обязать парламентские партии и депутатов Госдумы на постоянной основе отчитываться перед избирателями о проделанной работе.',4,1),(3,'Головин и Миранчук прибыли в расположение сборной России в Австрии','ЕВРО-2020. Полузащитник \"Монако\" Александр Головин и хавбек итальянской \"Аталанты\" Алексей Миранчук прибыли в расположение сборной России по футболу.\nСборная России проводит сбор в Австрии в преддверии чемпионата Европы.\nЕВРО-2020 пройдет в 11 городах Европы, в том числе в Санкт-Петербурге, с 11 июня по 11 июля. На групповом этапе финального турнира сборная России встретится с командами Бельгии (12 июня), Финляндии (16 июня) и Дании (21 июня).',1,3),(4,'Овечкин рассказал, в каком клубе хочет завершить карьеру','МОСКВА, 25 мая - РИА Новости. Российский нападающий Александр Овечкин заявил, что хотел бы завершить карьеру хоккеиста в клубе НХЛ \"Вашингтон\".',1,5),(5,'В Петербурге предложили построить второй по высоте небоскреб в мире','МОСКВА, 25 мая - РИА Новости. \"Газпром\" предложил построить в Санкт-Петербурге \"Лахта Центр 2\", который станет вторым по высоте небоскребом в мире, говорится в сообщении компании.\nНовая градостроительная инициатива была представлена на заседании межведомственного совета по реализации соглашения о сотрудничестве между Санкт-Петербургом и \"Газпромом\".',3,10);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newscategories`
--

DROP TABLE IF EXISTS `newscategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `newscategories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newscategories`
--

LOCK TABLES `newscategories` WRITE;
/*!40000 ALTER TABLE `newscategories` DISABLE KEYS */;
INSERT INTO `newscategories` VALUES (1,'спорт'),(2,'наука'),(3,'общество'),(4,'мир');
/*!40000 ALTER TABLE `newscategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(145) NOT NULL,
  `phone` int NOT NULL,
  `email` text NOT NULL,
  `session_id` text NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('новый','собран','отправлен','доставлен') DEFAULT 'новый',
  UNIQUE KEY `id` (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,'Не указано'),(2,'Фрукты'),(3,'Напитки'),(4,'Пиццы');
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `category_id` bigint unsigned NOT NULL DEFAULT '1',
  `img_name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` decimal(10,0) NOT NULL DEFAULT '1',
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Яблоко красное',2,'apple01.png','Яблоки – очень популярный и, пожалуй, наиболее распространенный в нашей стране фрукт. \nРегулярное их употребление помогает поддерживать необходимый уровень витаминов и минералов, важных для человеческого организма. \nВ них содержатся витамины С, В1, В2, Р, Е, каротин, калий, железо, марганец, кальций, пектины, сахара, органические кислоты и другие полезные вещества.',12,'2021-07-02 18:58:21'),(2,'Пиццa c пoмидopaми',4,'pizza01.png','Пиццa c пoмидopaми — пpocтaя и вкуcнaя. В ocнoвe ee клaccичecкиe итaльянcкиe peцeпты. Ингpeдиeнты:пoмидopы, cыp, зeлeнь и oливкoвoe мacлo.',24,'2021-07-02 18:58:21'),(3,'Чай черный с лимоном',3,'tea01.png','Байховый чай (от китайского бай хуа — «белый цветок», название едва распустившихся почек чайного листа, одного из компонентов чая, придающих ему аромат и вкус) — торговое название рассыпного чая, выработанного в виде отдельных чаинок.',10,'2021-07-02 18:58:21');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `session_id` text,
  `hash` text,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','123',NULL,'qwe567'),(2,'user','321',NULL,'');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-02 18:58:51
