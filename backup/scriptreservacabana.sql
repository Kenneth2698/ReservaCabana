
--
-- Table structure for table `tbservicio`
--

DROP TABLE IF EXISTS `tbservicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbservicio` (
  `servicioid` int(11) NOT NULL AUTO_INCREMENT,
  `servicionombre` varchar(30) NOT NULL,
  `serviciodescripcion` varchar(100) NOT NULL,
  `servicioimagenid` int(11) NOT NULL,
  PRIMARY KEY (`servicioid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbservicio`
--

LOCK TABLES `tbservicio` WRITE;
/*!40000 ALTER TABLE `tbservicio` DISABLE KEYS */;
INSERT INTO `tbservicio` VALUES (13,'Piscina','Piscina familiar grande',1);
/*!40000 ALTER TABLE `tbservicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbservicioimagen`
--

DROP TABLE IF EXISTS `tbservicioimagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbservicioimagen` (
  `servicioimagenid` int(11) NOT NULL AUTO_INCREMENT,
  `servicioimagenruta` varchar(100) NOT NULL,
  PRIMARY KEY (`servicioimagenid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbservicioimagen`
--

LOCK TABLES `tbservicioimagen` WRITE;
/*!40000 ALTER TABLE `tbservicioimagen` DISABLE KEYS */;
INSERT INTO `tbservicioimagen` VALUES (1,'foto.png');
/*!40000 ALTER TABLE `tbservicioimagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbusuario` (
  `usuarioid` int(11) NOT NULL AUTO_INCREMENT,
  `usuarionombre` varchar(50) DEFAULT NULL,
  `usuariocontrasenna` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`usuarioid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuario`
--

LOCK TABLES `tbusuario` WRITE;
/*!40000 ALTER TABLE `tbusuario` DISABLE KEYS */;
INSERT INTO `tbusuario` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `tbusuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
