-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: my_new_house_db
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `address`
--
CREATE DATABASE my_new_house_db;
DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(100) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL DEFAULT 'Jandira',
  `state` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `complement` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (97,'Rua Duque de Caxias','06624-450','Jardim Bom Pastor','Jandira','Solteiro',76,'Brasil','casa 1','2023-10-09 06:58:51','2023-10-09 06:58:51',NULL),(98,'Rua Duque de Caxias','06624-450','Jardim Bom Pastor','Jandira','Solteiro',1223,'Brasil','casa 2','2023-10-09 07:01:07','2023-10-09 07:01:07',NULL),(99,'Rua Duque de Caxias','06624-450','Jardim Bom Pastor','Jandira','Solteiro',1223,'Brasil','casa 1','2023-10-09 07:01:41','2023-10-09 07:01:41',NULL),(100,'Rua Duque de Caxias','06624-450','Jardim Bom Pastor','Jandira','Solteiro',1223,'Brasil','casa 1','2023-10-09 07:02:37','2023-10-09 07:02:37',NULL),(101,'Rua Duque de Caxias','06624-450','Vitoria da conquista','Jandira','SP',1223,'Brasil','casa 2','2023-10-09 07:03:10','2023-10-09 07:03:10',NULL),(102,'Rua Duque de Caxias','06624-450','Jardim Bom Pastor','Jandira','Solteiro',1223,'Brasil','casa 2','2023-10-09 07:07:20','2023-10-09 07:07:20',NULL),(103,'Rua Duque de Caxias','06624-450','Vitoria da conquista','Jandira','Solteiro',1223,'Brasil','casa 1','2023-10-09 07:10:06','2023-10-09 07:10:06',NULL),(104,'Rua Duque de Caxias','06624-450','Vitoria da conquista','Jandira','Solteiro',1223,'Brasil','casa 1','2023-10-09 07:12:03','2023-10-09 07:12:03',NULL),(105,'Rua Duque de Caxias','06624-450','Leopoldina','Jandira','Solteiro',1223,'Brasil','casa 2','2023-10-09 07:13:10','2023-10-09 07:13:10',NULL),(106,'Rua Duque de Caxias','06624-450','Vitoria da conquista','Jandira','Solteiro',1223,'Brasil','sadasd','2023-10-09 07:14:15','2023-10-09 07:14:15',NULL),(107,'Rua Duque de Caxias','06624-450','Jardim Bom Pastor','Jandira','Solteiro',76,'Brasil','','2023-10-09 07:16:46','2023-10-09 07:16:46',NULL),(108,'Rua Duque de Caxias','06624-450','Vitoria da conquista','Jandira','Solteiro',1223,'Brasil','casa 1','2023-10-09 07:18:14','2023-10-09 07:18:14',NULL),(109,'Rua Duque de Caxias','06624-450','Vitoria da conquista','Jandira','Solteiro',1221,'Brasil','casa 2','2023-10-09 07:18:54','2023-10-09 07:18:54',NULL),(110,'Rua Duque de Caxias','06624-450','Jardim Bom Pastor','Jandira','SP',23,'Brasil','casa 2','2023-10-09 12:33:30','2023-10-09 12:33:30',NULL),(111,'Rua Josephina Daniel Pupin','79075-836','Residencial Jose Teruel Filho','Campo Grande','MS',322,'Brasil','casa 1','2023-10-09 12:32:42','2023-10-09 12:32:42',NULL),(112,'Rua Duque de Caxias','000000-000','Jardim Bom Pastor','copacabana','RJ',244,'Brasil','casa 2','2023-10-09 12:33:41','2023-10-09 12:33:41',NULL),(113,'Rua dos cearás','06624-450','Bom jesus da Lapa','Ibipitanga','Bahia',999,'Brasil','','2023-10-09 08:36:10','2023-10-09 08:36:10',NULL),(114,'Rua das pessoas','06624-450','Bairro don pedro','Salvador','BA',23,'Brasil','','2023-10-09 12:33:52','2023-10-09 12:33:52',NULL),(115,'Rua Duque de Caxias','06624-450','Jardim Bom Pastor','Salvador','Bahia',23,'Brasil','','2023-10-09 08:38:05','2023-10-09 08:38:05',NULL),(116,'Rua Duque de Caxias','06624-450','Jardim Bom Pastor','Jandira','Solteiro',1223,'Brasil','casa 1','2023-10-09 08:43:14','2023-10-09 08:43:14',NULL),(117,'Rua Duque de Caxias','06624-450','Vitoria da conquista','Jandira','SP',1223,'Brasil','casa 1','2023-10-09 12:34:01','2023-10-09 12:34:01',NULL),(118,'Rua Duque de Caxias','06624-450','Vitoria da conquista','Jandira','SP',1223,'Brasil','casa 1','2023-10-09 09:31:49','2023-10-09 09:31:49',NULL),(119,'Rua Duque de Caxias','06624-450','Vitoria da conquista','Jandira','Solteiro',1223,'Brasil','','2023-10-09 09:32:14','2023-10-09 09:32:14',NULL);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `house`
--

DROP TABLE IF EXISTS `house`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `house` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_address` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `house_type` varchar(20) NOT NULL,
  `contract_type` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `description` longtext DEFAULT NULL,
  `amout_room` int(11) DEFAULT 1,
  `amount_baths` int(11) DEFAULT 1,
  `amount_vacancy` int(11) DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`id_user`),
  KEY `fk_address` (`id_address`),
  CONSTRAINT `fk_address` FOREIGN KEY (`id_address`) REFERENCES `address` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `house`
--

LOCK TABLES `house` WRITE;
/*!40000 ALTER TABLE `house` DISABLE KEYS */;
INSERT INTO `house` VALUES (75,97,116,'Casa','Venda',1500,1,'',1,0,0,'2023-10-09 06:58:51','2023-10-09 06:58:51',NULL),(76,98,116,'Casa','Venda',1500,1,'',1,0,0,'2023-10-09 07:01:07','2023-10-09 07:01:07',NULL),(77,99,116,'Casa','Venda',233,1,'',1,0,0,'2023-10-09 07:01:41','2023-10-09 07:01:41',NULL),(83,105,116,'Apartamento','Venda',234,1,'saddddddddddddddddddddddddd',1,0,0,'2023-10-09 07:13:10','2023-10-09 07:13:10',NULL),(84,106,116,'Casa','Venda',1500,1,'',1,0,0,'2023-10-09 07:14:15','2023-10-09 07:14:15',NULL),(88,110,117,'Apartamento','Venda',10000,1,'Casa recém reformada com uma estrutura belíssima de 150m² de construção. Possui uma suíte com closet, 1 dormitório, 1 banheiro e 1 lavabo.\n\nA cozinha é toda planejada e ampla. Há um lindo quintal lateral e vaga para 2 carros. Possui na área externa churrasqueira e espaço gourmet para receber convidados.\n\nFica a apenas 8 minutos do hospital Albert Einstein. Há praças, supermercados e bancos a menos de 10min de caminhada. Em apenas 2min é possível chegar ao ponto de ônibus mais próximo.\n\nO condomínio oferece uma ampla piscina com raio de 25 m, espaço gourmet. Há vigilância com o circuito de câmeras de segurança e portaria 24h.\n\nNão deixe de visitar e conhecer a beleza desse imóvel de perto!',1,3,2,'2023-10-09 12:33:30','2023-10-09 12:33:30',NULL),(89,111,117,'Casa','Aluguel selected',2500,1,'Magnífica casa recém construída com 1.400m² com detalhes em mármore. Possui design feito por “Fulano de Tal” com total integração a todos os ambientes.\n\nA sala principal possui pé direito triplo com 12 metros. Você pode contar com 4 suítes, todos os armários planejados, cozinha equipada e completa, área de serviço, dependência de empregados e área de armazenamento.\n\nToda a área externa possui paisagismo, além de duas piscinas, adulta de 20m e uma infantil, hidromassagem e sauna. Para completar, um amplo espaço gourmet para receber convidados e vagas cobertas para 12 veículos. \n\nA casa está localizada numa rua totalmente residencial, próximo a praças e há apenas 5min de carro do shopping Iguatemi de São Paulo. Há museus, bares e restaurantes próximos.\n\nNão perca sua chance de conhecer essa incrível mansão em uma das melhores áreas de São Paulo. Possui todo o conforto e segurança que você e sua família precisam!',4,4,1,'2023-10-09 12:32:42','2023-10-09 12:32:42',NULL),(90,112,117,'Apartamento','Venda',2000000,1,'Casa recém reformada com uma estrutura belíssima de 150m² de construção. Possui uma suíte com closet, 1 dormitório, 1 banheiro e 1 lavabo.\n\nA cozinha é toda planejada e ampla. Há um lindo quintal lateral e vaga para 2 carros. Possui na área externa churrasqueira e espaço gourmet para receber convidados.\n\nFica a apenas 8 minutos do hospital Albert Einstein. Há praças, supermercados e bancos a menos de 10min de caminhada. Em apenas 2min é possível chegar ao ponto de ônibus mais próximo.\n\nO condomínio oferece uma ampla piscina com raio de 25 m, espaço gourmet. Há vigilância com o circuito de câmeras de segurança e portaria 24h.\n\nNão deixe de visitar e conhecer a beleza desse imóvel de perto!',3,4,3,'2023-10-09 12:33:41','2023-10-09 12:33:41',NULL),(91,114,117,'Apartamento','Venda',1500,1,'Casa recém reformada com uma estrutura belíssima de 150m² de construção. Possui uma suíte com closet, 1 dormitório, 1 banheiro e 1 lavabo.\n\nA cozinha é toda planejada e ampla. Há um lindo quintal lateral e vaga para 2 carros. Possui na área externa churrasqueira e espaço gourmet para receber convidados.\n\nFica a apenas 8 minutos do hospital Albert Einstein. Há praças, supermercados e bancos a menos de 10min de caminhada. Em apenas 2min é possível chegar ao ponto de ônibus mais próximo.\n\nO condomínio oferece uma ampla piscina com raio de 25 m, espaço gourmet. Há vigilância com o circuito de câmeras de segurança e portaria 24h.\n\nNão deixe de visitar e conhecer a beleza desse imóvel de perto!',2,2,1,'2023-10-09 12:33:52','2023-10-09 12:33:52',NULL),(92,115,117,'Casa','Venda',19000000,1,'Casa recém reformada com uma estrutura belíssima de 150m² de construção. Possui uma suíte com closet, 1 dormitório, 1 banheiro e 1 lavabo.\n\nA cozinha é toda planejada e ampla. Há um lindo quintal lateral e vaga para 2 carros. Possui na área externa churrasqueira e espaço gourmet para receber convidados.\n\nFica a apenas 8 minutos do hospital Albert Einstein. Há praças, supermercados e bancos a menos de 10min de caminhada. Em apenas 2min é possível chegar ao ponto de ônibus mais próximo.\n\nO condomínio oferece uma ampla piscina com raio de 25 m, espaço gourmet. Há vigilância com o circuito de câmeras de segurança e portaria 24h.\n\nNão deixe de visitar e conhecer a beleza desse imóvel de perto!',4,2,3,'2023-10-09 08:38:05','2023-10-09 08:38:05',NULL),(94,117,117,'Apartamento','Venda',1500,1,'Casa recém reformada com uma estrutura belíssima de 150m² de construção. Possui uma suíte com closet, 1 dormitório, 1 banheiro e 1 lavabo.\n\nA cozinha é toda planejada e ampla. Há um lindo quintal lateral e vaga para 2 carros. Possui na área externa churrasqueira e espaço gourmet para receber convidados.\n\nFica a apenas 8 minutos do hospital Albert Einstein. Há praças, supermercados e bancos a menos de 10min de caminhada. Em apenas 2min é possível chegar ao ponto de ônibus mais próximo.\n\nO condomínio oferece uma ampla piscina com raio de 25 m, espaço gourmet. Há vigilância com o circuito de câmeras de segurança e portaria 24h.\n\nNão deixe de visitar e conhecer a beleza desse imóvel de perto!',1,2,2,'2023-10-09 12:34:01','2023-10-09 12:34:01',NULL),(95,118,117,'Apartamento','Aluguel ',1500,1,'',1,2,3,'2023-10-09 09:31:49','2023-10-09 09:31:49',NULL),(96,119,117,'Casa','Venda',234,1,'',1,2,2,'2023-10-09 09:32:14','2023-10-09 09:32:14',NULL);
/*!40000 ALTER TABLE `house` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `house_room`
--

DROP TABLE IF EXISTS `house_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `house_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_house` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_house` (`id_house`),
  KEY `fk_room` (`id_room`),
  CONSTRAINT `fk_house` FOREIGN KEY (`id_house`) REFERENCES `house` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_room` FOREIGN KEY (`id_room`) REFERENCES `room` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `house_room`
--

LOCK TABLES `house_room` WRITE;
/*!40000 ALTER TABLE `house_room` DISABLE KEYS */;
/*!40000 ALTER TABLE `house_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(900) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (50,'Array','2023-10-09 07:16:46','2023-10-09 07:16:46'),(51,'public/upload/Y2FyYQ==.jpg','2023-10-09 07:18:14','2023-10-09 07:18:14'),(52,'public/upload/Y2FyYQ==.jpg','2023-10-09 07:18:54','2023-10-09 07:18:54'),(53,'public/upload/a3hsYXJnZQ==.jpg','2023-10-09 08:19:01','2023-10-09 08:19:01'),(54,'public/upload/UEFELUNPRDQzLUZPVE8tMS1XRUI=.jpg','2023-10-09 08:32:38','2023-10-09 08:32:38'),(55,'public/upload/N3gzNw==.jpg','2023-10-09 08:34:49','2023-10-09 08:34:49'),(56,'public/upload/aW1hZ2VzICgyKQ==.jpeg','2023-10-09 08:37:07','2023-10-09 08:37:07'),(57,'public/upload/aW1hZ2VzICgxKQ==.jpeg','2023-10-09 08:38:05','2023-10-09 08:38:05'),(58,'public/upload/aG9tZS1pY29uLXNpbGhvdWV0dGU=.png','2023-10-09 08:43:14','2023-10-09 08:43:14'),(59,'public/upload/Y2FzYTE=.jpg','2023-10-09 08:44:13','2023-10-09 08:44:13'),(60,'public/upload/Y2FzYTE=.jpg','2023-10-09 09:31:49','2023-10-09 09:31:49'),(61,'public/upload/aW1hZ2Vz.jpeg','2023-10-09 09:32:14','2023-10-09 09:32:14');
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_photo` int(11) NOT NULL,
  `id_house` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_photo_house` (`id_house`),
  KEY `fk_photo` (`id_photo`),
  CONSTRAINT `fk_photo` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_photo_house` FOREIGN KEY (`id_house`) REFERENCES `house` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (49,53,88),(50,54,89),(51,55,90),(52,56,91),(53,57,92),(55,59,94),(56,60,95),(57,61,96);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_address` int(11) DEFAULT NULL,
  `id_photo` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_IDX` (`id`,`name`,`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (116,NULL,NULL,'Matheus','vieira.matheuscosta@gmail.com','$2y$10$W55ha/GvrILXGGuN8vj3r.ma1.NJMgB9ucqA2JxWZvfbFUeGBZ4/.','2023-10-09 06:58:24','2023-10-09 06:58:24',NULL),(117,NULL,NULL,'Matheus','vieira@costa.com','$2y$10$kmTCjL2jubn1dn1RpRRLT.eXsk.Brf34jI3l.qxdT551Psds2bhx.','2023-10-09 08:16:42','2023-10-09 08:16:42',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-09 14:39:59
