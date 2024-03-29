-- MySQL dump 10.13  Distrib 5.7.37, for Linux (x86_64)
--
-- Host: localhost    Database: imdsound
-- ------------------------------------------------------
-- Server version	5.7.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'pass');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `list_id_list` int(11) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`list_id_list`),
  CONSTRAINT `fk_Album_List1` FOREIGN KEY (`list_id_list`) REFERENCES `list` (`id_list`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (1,'2022-07-19 15:22:29'),(10,'2022-07-19 23:36:29'),(25,'2022-07-19 23:37:16'),(26,'2022-07-19 23:39:27'),(28,'2022-07-19 23:42:24'),(29,'2022-07-19 23:44:06'),(30,'2022-07-19 23:45:12'),(31,'2022-07-19 23:47:05'),(32,'2022-07-19 23:50:27'),(33,'2022-07-20 16:40:20'),(34,'2022-07-20 16:40:32'),(35,'2022-07-20 16:45:37'),(36,'2022-07-20 16:45:54');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album_has_music`
--

DROP TABLE IF EXISTS `album_has_music`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_has_music` (
  `album_list_id_list` int(11) NOT NULL,
  `music_id_music` int(11) NOT NULL,
  PRIMARY KEY (`album_list_id_list`,`music_id_music`),
  KEY `fk_Album_has_music_music1_idx` (`music_id_music`),
  KEY `fk_Album_has_music_Album1_idx` (`album_list_id_list`),
  CONSTRAINT `fk_Album_has_music_Album1` FOREIGN KEY (`album_list_id_list`) REFERENCES `album` (`list_id_list`) ON DELETE CASCADE,
  CONSTRAINT `fk_Album_has_music_music1` FOREIGN KEY (`music_id_music`) REFERENCES `music` (`idmusic`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_has_music`
--

LOCK TABLES `album_has_music` WRITE;
/*!40000 ALTER TABLE `album_has_music` DISABLE KEYS */;
/*!40000 ALTER TABLE `album_has_music` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist` (
  `user_email` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `admin_id_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_email`),
  KEY `fk_Artist_Admin1_idx` (`admin_id_admin`),
  KEY `fk_Artist_User1_idx` (`user_email`),
  CONSTRAINT `fk_Artist_Admin1` FOREIGN KEY (`admin_id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE SET NULL,
  CONSTRAINT `fk_Artist_User1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES ('andre@email.com','sem nome','sem descricao',1),('andre@follow.com','sem nome','sem descricao',1),('bru@email.com','sem nome','sem descricao',1),('bruno@follow.com','sem nome','sem descricao',1),('bruno@gmail.com','happy','soluta',1);
/*!40000 ALTER TABLE `artist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artist_cadastra_album`
--

DROP TABLE IF EXISTS `artist_cadastra_album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist_cadastra_album` (
  `artist_user_email` varchar(45) NOT NULL,
  `album_list_id_list` int(11) NOT NULL,
  PRIMARY KEY (`artist_user_email`,`album_list_id_list`),
  KEY `fk_Artist_has_Album_Album1_idx` (`album_list_id_list`),
  KEY `fk_Artist_has_Album_Artist1_idx` (`artist_user_email`),
  CONSTRAINT `fk_Artist_has_Album_Album1` FOREIGN KEY (`album_list_id_list`) REFERENCES `album` (`list_id_list`) ON DELETE CASCADE,
  CONSTRAINT `fk_Artist_has_Album_Artist1` FOREIGN KEY (`artist_user_email`) REFERENCES `artist` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist_cadastra_album`
--

LOCK TABLES `artist_cadastra_album` WRITE;
/*!40000 ALTER TABLE `artist_cadastra_album` DISABLE KEYS */;
INSERT INTO `artist_cadastra_album` VALUES ('bruno@gmail.com',1),('bruno@gmail.com',26),('bruno@gmail.com',28),('bruno@gmail.com',29),('bruno@gmail.com',30),('bruno@gmail.com',31),('bruno@gmail.com',32),('andre@follow.com',33),('andre@follow.com',34),('andre@follow.com',35),('andre@follow.com',36);
/*!40000 ALTER TABLE `artist_cadastra_album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artist_cadastra_music`
--

DROP TABLE IF EXISTS `artist_cadastra_music`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist_cadastra_music` (
  `music_id_music` int(11) NOT NULL,
  `artist_user_email` varchar(45) NOT NULL,
  PRIMARY KEY (`music_id_music`,`artist_user_email`),
  KEY `fk_Artist_has_music_music1_idx` (`music_id_music`),
  KEY `fk_Artist_has_music_Artist1_idx` (`artist_user_email`),
  CONSTRAINT `fk_Artist_has_music_Artist1` FOREIGN KEY (`artist_user_email`) REFERENCES `artist` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Artist_has_music_music1` FOREIGN KEY (`music_id_music`) REFERENCES `music` (`idmusic`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist_cadastra_music`
--

LOCK TABLES `artist_cadastra_music` WRITE;
/*!40000 ALTER TABLE `artist_cadastra_music` DISABLE KEYS */;
/*!40000 ALTER TABLE `artist_cadastra_music` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feature`
--

DROP TABLE IF EXISTS `feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feature` (
  `feat_name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`feat_name`),
  UNIQUE KEY `descrition_UNIQUE` (`feat_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feature`
--

LOCK TABLES `feature` WRITE;
/*!40000 ALTER TABLE `feature` DISABLE KEYS */;
INSERT INTO `feature` VALUES ('feat1','passasdfas'),('feat2','passasdfas'),('feat3','passasdfas'),('feat4','passasdfas');
/*!40000 ALTER TABLE `feature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `list`
--

DROP TABLE IF EXISTS `list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `list` (
  `id_list` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `num_likes` int(11) NOT NULL DEFAULT '0',
  `duration_time` int(11) NOT NULL DEFAULT '0',
  `picture` mediumtext,
  PRIMARY KEY (`id_list`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `list`
--

LOCK TABLES `list` WRITE;
/*!40000 ALTER TABLE `list` DISABLE KEYS */;
INSERT INTO `list` VALUES (1,'Primeiro',0,0,NULL),(10,'GÃªnero',0,0,'12a60e13-3c18-4132-a43f-1d3ac215060e.jpeg'),(11,'GÃªnero',0,0,'12a60e13-3c18-4132-a43f-1d3ac215060e.jpeg'),(25,'GÃªnero',0,0,'12a60e13-3c18-4132-a43f-1d3ac215060e.jpeg'),(26,'GÃªnero',0,0,'12a60e13-3c18-4132-a43f-1d3ac215060e.jpeg'),(28,'GÃªnero',0,0,'12a60e13-3c18-4132-a43f-1d3ac215060e.jpeg'),(29,'GÃªnero',0,0,'12a60e13-3c18-4132-a43f-1d3ac215060e.jpeg'),(30,'api',0,0,'brenda.jpg'),(31,'api',0,0,'brenda.jpg'),(32,'Build',0,0,NULL),(33,'Bruno Wagner',0,0,'Captura de tela de 2022-05-30 17-59-28.png'),(34,'SÃ³ la se do',0,0,NULL),(35,'bruno',0,0,NULL),(36,'bruno',0,0,'assinatura-email-bruno.png');
/*!40000 ALTER TABLE `list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `list_has_genre`
--

DROP TABLE IF EXISTS `list_has_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `list_has_genre` (
  `genre_name` varchar(45) NOT NULL,
  `list_id_list` int(11) NOT NULL,
  PRIMARY KEY (`genre_name`,`list_id_list`),
  KEY `fk_List_has_genre_genre1_idx` (`genre_name`),
  KEY `fk_List_has_genre_List1_idx` (`list_id_list`),
  CONSTRAINT `fk_List_has_genre_List1` FOREIGN KEY (`list_id_list`) REFERENCES `list` (`id_list`) ON DELETE CASCADE,
  CONSTRAINT `fk_List_has_genre_genre1` FOREIGN KEY (`genre_name`) REFERENCES `music_genre` (`name`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `list_has_genre`
--

LOCK TABLES `list_has_genre` WRITE;
/*!40000 ALTER TABLE `list_has_genre` DISABLE KEYS */;
/*!40000 ALTER TABLE `list_has_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `music`
--

DROP TABLE IF EXISTS `music`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `music` (
  `idmusic` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `duration_time` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL DEFAULT '0',
  `lyrics` varchar(45) DEFAULT NULL,
  `data_create` date NOT NULL,
  PRIMARY KEY (`idmusic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `music`
--

LOCK TABLES `music` WRITE;
/*!40000 ALTER TABLE `music` DISABLE KEYS */;
/*!40000 ALTER TABLE `music` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `music_genre`
--

DROP TABLE IF EXISTS `music_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `music_genre` (
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `music_genre`
--

LOCK TABLES `music_genre` WRITE;
/*!40000 ALTER TABLE `music_genre` DISABLE KEYS */;
INSERT INTO `music_genre` VALUES ('pass1'),('pass2'),('pass3'),('pass4'),('pass5');
/*!40000 ALTER TABLE `music_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `music_has_genre`
--

DROP TABLE IF EXISTS `music_has_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `music_has_genre` (
  `music_idmusic` int(11) NOT NULL,
  `genre_name` varchar(45) NOT NULL,
  PRIMARY KEY (`music_idmusic`,`genre_name`),
  KEY `fk_music_has_genre_genre1_idx` (`genre_name`),
  KEY `fk_music_has_genre_music1_idx` (`music_idmusic`),
  CONSTRAINT `fk_music_has_genre_genre1` FOREIGN KEY (`genre_name`) REFERENCES `music_genre` (`name`) ON UPDATE CASCADE,
  CONSTRAINT `fk_music_has_genre_music1` FOREIGN KEY (`music_idmusic`) REFERENCES `music` (`idmusic`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `music_has_genre`
--

LOCK TABLES `music_has_genre` WRITE;
/*!40000 ALTER TABLE `music_has_genre` DISABLE KEYS */;
/*!40000 ALTER TABLE `music_has_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playlist`
--

DROP TABLE IF EXISTS `playlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playlist` (
  `list_id_list` int(11) NOT NULL,
  `visibilty` tinyint(4) NOT NULL,
  PRIMARY KEY (`list_id_list`),
  KEY `fk_Playlist_List1_idx` (`list_id_list`),
  CONSTRAINT `fk_Playlist_List1` FOREIGN KEY (`list_id_list`) REFERENCES `list` (`id_list`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlist`
--

LOCK TABLES `playlist` WRITE;
/*!40000 ALTER TABLE `playlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `playlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playlist_has_music`
--

DROP TABLE IF EXISTS `playlist_has_music`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playlist_has_music` (
  `playlist_list_id_list` int(11) NOT NULL,
  `music_id_music` int(11) NOT NULL,
  PRIMARY KEY (`playlist_list_id_list`,`music_id_music`),
  KEY `fk_Playlist_has_music_music1_idx` (`music_id_music`),
  KEY `fk_Playlist_has_music_Playlist1_idx` (`playlist_list_id_list`),
  CONSTRAINT `fk_Playlist_has_music_Playlist1` FOREIGN KEY (`playlist_list_id_list`) REFERENCES `playlist` (`list_id_list`) ON DELETE CASCADE,
  CONSTRAINT `fk_Playlist_has_music_music1` FOREIGN KEY (`music_id_music`) REFERENCES `music` (`idmusic`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlist_has_music`
--

LOCK TABLES `playlist_has_music` WRITE;
/*!40000 ALTER TABLE `playlist_has_music` DISABLE KEYS */;
/*!40000 ALTER TABLE `playlist_has_music` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `id_subscription` int(11) NOT NULL,
  `init_date` date NOT NULL,
  `expiration_date` date NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `type_type_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_subscription`),
  KEY `fk_subscription_type1_idx` (`type_type_name`),
  KEY `fk_subscription_User1_idx` (`user_email`),
  CONSTRAINT `fk_subscription_User1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_subscription_type1` FOREIGN KEY (`type_type_name`) REFERENCES `type` (`type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription`
--

LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `type_name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `value` decimal(2,0) NOT NULL,
  PRIMARY KEY (`type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_has_feature`
--

DROP TABLE IF EXISTS `type_has_feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_has_feature` (
  `type_type_name` varchar(45) NOT NULL,
  `feature_feat_name` varchar(45) NOT NULL,
  PRIMARY KEY (`type_type_name`,`feature_feat_name`),
  KEY `fk_type_has_feature_feature1_idx` (`feature_feat_name`),
  KEY `fk_type_has_feature_type1_idx` (`type_type_name`),
  CONSTRAINT `fk_type_has_feature_feature1` FOREIGN KEY (`feature_feat_name`) REFERENCES `feature` (`feat_name`) ON DELETE CASCADE,
  CONSTRAINT `fk_type_has_feature_type1` FOREIGN KEY (`type_type_name`) REFERENCES `type` (`type_name`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_has_feature`
--

LOCK TABLES `type_has_feature` WRITE;
/*!40000 ALTER TABLE `type_has_feature` DISABLE KEYS */;
/*!40000 ALTER TABLE `type_has_feature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `email` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `phone_number` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('andre@email.com','6f6fa3613fa06d0e5f7b02b3a6266807e27e6a79','andre','oioi','oioi'),('andre@follow.com','$2y$10$too/Ja/pvKGidsTo06GOYukry3FwMSJoNGeymNKQj4w79Q39Fumjm','Andre','456','456'),('asdf@asdf.com','$2y$10$Glu.yPHfxtdt8nVY2p7ieuz0FwpoI1KbOA7WamHVFMrq3tDs8rWVi','Bruno','1234','1234'),('bru@email.com','asdfasdf','adadfd','adfadf','asdfasdf'),('bruno@follow.com','$2y$10$L35hWgTJBBqdu9IlJnRfT.dFh1QmLOVXJiqPoXi0wMJb0r6gjkFDW','Bruno Wagner','123','123'),('bruno@gmail.com','1234','brunowagner','Oi','oi'),('caito@ok.com','2651c2a44c389403c19ba8e93d90b3093cb50449','Couto','fuifui','fiufiu'),('outro@google.com','d247d73fd2de0a03f9dbf1e79c2c3f266c7ae2f0','Outro','okok','okok');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_playlist`
--

DROP TABLE IF EXISTS `user_has_playlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_playlist` (
  `user_email` varchar(45) NOT NULL,
  `playlist_list_id_list` int(11) NOT NULL,
  PRIMARY KEY (`user_email`,`playlist_list_id_list`),
  KEY `fk_User_has_Playlist_Playlist1_idx` (`playlist_list_id_list`),
  KEY `fk_User_has_Playlist_User1_idx` (`user_email`),
  CONSTRAINT `fk_User_has_Playlist_Playlist1` FOREIGN KEY (`playlist_list_id_list`) REFERENCES `playlist` (`list_id_list`) ON DELETE CASCADE,
  CONSTRAINT `fk_User_has_Playlist_User1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_playlist`
--

LOCK TABLES `user_has_playlist` WRITE;
/*!40000 ALTER TABLE `user_has_playlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_has_playlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_listen_music`
--

DROP TABLE IF EXISTS `user_listen_music`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_listen_music` (
  `user_email` varchar(45) NOT NULL,
  `music_id_music` int(11) NOT NULL,
  `last_date_listen` date NOT NULL,
  PRIMARY KEY (`user_email`,`music_id_music`),
  KEY `fk_User_has_music_music1_idx` (`music_id_music`),
  KEY `fk_User_has_music_User1_idx` (`user_email`),
  CONSTRAINT `fk_User_has_music_User1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_User_has_music_music1` FOREIGN KEY (`music_id_music`) REFERENCES `music` (`idmusic`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_listen_music`
--

LOCK TABLES `user_listen_music` WRITE;
/*!40000 ALTER TABLE `user_listen_music` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_listen_music` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-20 17:02:57
