-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: avaliacao
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `domains`
--

DROP TABLE IF EXISTS `domains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domains` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `status` enum('Ativo','Inativo') NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domains`
--

LOCK TABLES `domains` WRITE;
/*!40000 ALTER TABLE `domains` DISABLE KEYS */;
INSERT INTO `domains` VALUES (1,'gmail','gmail.com','Ativo',1,'2023-10-31 22:20:39','2023-10-31 22:20:39'),(2,'outlook','outlook.com','Inativo',2,'2023-10-31 22:20:39','2023-10-31 22:20:39'),(3,'YellowGo','YellowGo.com','Ativo',3,'2023-10-31 22:20:39','2023-10-31 22:20:39'),(8,'testes','bol.com.brs','Ativo',17,'2023-11-01 13:40:01','2023-11-01 14:02:07');
/*!40000 ALTER TABLE `domains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `protocol` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` text,
  `user_id` int DEFAULT NULL,
  `responsible_id` int DEFAULT NULL,
  `open_at` datetime DEFAULT NULL,
  `closed_at` datetime DEFAULT NULL,
  `closure_reason` text,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`protocol`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (5,'Problema de software','Bug','Encontrado um bug no aplicativo.',9,8,'2023-10-05 11:30:00','2023-10-06 10:15:00','Resolvido',9,'2023-10-05 11:30:00','2023-10-06 13:15:00'),(10,'Problema de software','Bug','Encontrado um bug no aplicativo.',9,8,'2023-10-05 11:30:00','2023-10-06 10:15:00','Resolvido',9,'2023-10-05 11:30:00','2023-10-06 13:15:00'),(11,'Solicitação de informações','Suporte','Usuário precisa de informações adicionais.',10,7,'2023-10-06 15:20:00','2023-10-06 17:45:00','Resolvido',10,'2023-10-06 15:20:00','2023-10-06 20:45:00'),(12,'Relatório de erro','Erro','Erro crítico no sistema.',9,7,'2023-10-07 13:40:00','2023-10-31 14:59:45','Foi resolvido',9,'2023-10-07 13:40:00','2023-10-31 17:59:45'),(14,'Solicitação de suporte técnico','Suporte','Usuário solicitou assistência técnica.',7,8,'2023-10-03 09:45:00','2023-10-03 16:20:00','Resolvido',7,'2023-10-03 09:45:00','2023-10-03 19:20:00'),(15,'Problema na conexão de rede','Suporte','Problema na conexão de rede da empresa.',7,8,'2023-10-04 14:00:00','2023-10-31 15:00:36','Foi resolvido',7,'2023-10-04 14:00:00','2023-10-31 18:00:36'),(16,'Problema no servidor de e-mail','Suporte','O servidor de e-mail está inacessível.',8,7,'2023-10-01 08:00:00','2023-10-02 14:30:00','Resolvido',8,'2023-10-01 08:00:00','2023-10-02 17:30:00'),(17,'Erros críticos nos sistema','Erros','O sistema está apresentando erros críticos.',8,7,'2023-10-02 10:15:00','2023-11-01 11:00:55','Resolvido',8,'2023-10-02 10:15:00','2023-11-01 14:01:10'),(22,'Erros críticos nos sistemas','bugs','aasd',14,2,'2023-11-01 11:01:30',NULL,NULL,14,'2023-11-01 11:01:30','2023-11-01 14:01:30');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('normal','responsável','superadmin') NOT NULL,
  `status` enum('Ativo','Inativo') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'suporte','suporte@suporte.com','12345678','responsável','Ativo','2023-10-31 04:38:16','2023-10-31 04:42:27'),(8,'admin','admin@admin.com','12345678','superadmin','Ativo','2023-10-31 04:38:58','2023-10-31 04:42:27'),(9,'normal','normal@normal.com','12345678','normal','Ativo','2023-10-31 04:39:47','2023-10-31 04:42:27'),(10,'normal1','normal1@normal.com','12345678','normal','Ativo','2023-10-31 04:56:11','2023-10-31 04:56:11'),(11,'teste','teste@gmail.com','12345678','normal','Ativo','2023-11-01 02:18:49','2023-11-01 02:18:49'),(12,'teste1','teste@gmail.com','12345678','responsável','Ativo','2023-11-01 02:20:50','2023-11-01 02:20:50'),(13,'teste','silvancortesmoura@outlook.com','$2y$12$6G0AvmWlyYi94/dLc7SyJuv6ZDNp98fhGtzjesFNpXskalKz4eAhy','normal','Ativo','2023-11-01 08:24:15','2023-11-01 08:24:15'),(14,'teste','teste@teste.com','$2y$12$.ea6ZVKsRjBJm4x40ZIYdOSd0YUHj2u4Oq2ntzezes.jiYoJHfltK','normal','Ativo','2023-11-01 08:31:54','2023-11-01 08:31:54'),(15,'teste','teste@teste12.com','$2y$12$OdAUgellLIWX.vPQSseYy.LDk2MdNIcnFUVjuvoZ0jJIpDnT9UIl6','normal','Ativo','2023-11-01 08:34:10','2023-11-01 08:34:10'),(16,'sdof','asdas@gsd.com','$2y$12$FwSWzDFeHimYEfB.53KlheLuT/dvwS/aQm7T0Otbl9r86hWX8j0wO','superadmin','Ativo','2023-11-01 08:34:51','2023-11-01 12:55:57'),(17,'teste2','teste@teste.com.br','$2y$12$xwQz1p4uIpdeQUOqRDotd.lfwM54Ma3GvFL40PhsK2QQTxQFxoiR.','normal','Ativo','2023-11-01 09:22:55','2023-11-01 09:22:55'),(18,'sdof','12@fma.com','$2y$12$ZAr.Bb2o46z9UOtiqFywAeyd9Wjmm37ojNnHfJn.BXQFFSxf8FPzO','normal','Ativo','2023-11-01 14:13:15','2023-11-01 14:13:15'),(19,'teste','silvancortesmoura@outlooasdk.com','$2y$10$eepEhALZ9mFMJ5snNSEbZuJf7.t5nJ0uwEu5slX9kT9FCWsz2ws4.','normal','Ativo','2023-11-01 15:50:16','2023-11-01 15:50:16');
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

-- Dump completed on 2023-11-01 11:00:15
