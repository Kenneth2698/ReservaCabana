-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 163.178.107.10    Database: bdreservacabana
-- ------------------------------------------------------
-- Server version	5.7.25-log

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
-- Table structure for table `tbabonoplan`
--

DROP TABLE IF EXISTS `tbabonoplan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbabonoplan` (
  `abonoplanid` int(11) NOT NULL AUTO_INCREMENT,
  `compraplanid` int(11) NOT NULL,
  `fechacobro` date NOT NULL,
  `fechaabono` date DEFAULT NULL,
  `pagado` bit(1) DEFAULT NULL,
  `monto` int(11) DEFAULT NULL,
  PRIMARY KEY (`abonoplanid`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbabonoplan`
--

LOCK TABLES `tbabonoplan` WRITE;
/*!40000 ALTER TABLE `tbabonoplan` DISABLE KEYS */;
INSERT INTO `tbabonoplan` VALUES (106,32,'2020-06-28','2020-06-21',_binary '',16667),(107,32,'2020-07-05','2020-06-21',_binary '',6667),(108,32,'2020-07-12','2020-06-22',_binary '',15667),(109,32,'2020-07-19',NULL,_binary '\0',16667),(110,32,'2020-07-26',NULL,_binary '\0',16667),(111,32,'2020-08-02',NULL,_binary '\0',667),(112,33,'2020-06-21','2020-06-21',_binary '',25000),(113,33,'2020-07-05','2020-06-21',_binary '',5000),(114,33,'2020-07-19',NULL,_binary '\0',25000),(115,33,'2020-08-02',NULL,_binary '\0',25000),(116,33,'2020-08-16',NULL,_binary '\0',25000),(117,33,'2020-08-30',NULL,_binary '\0',20000),(118,34,'2020-06-23',NULL,_binary '\0',3684),(119,34,'2020-06-30',NULL,_binary '\0',3684),(120,34,'2020-07-07',NULL,_binary '\0',3684);
/*!40000 ALTER TABLE `tbabonoplan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbactividades`
--

DROP TABLE IF EXISTS `tbactividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbactividades` (
  `actividadid` int(11) NOT NULL AUTO_INCREMENT,
  `actividadnombre` varchar(100) DEFAULT NULL,
  `actividaddueno` varchar(300) DEFAULT NULL,
  `actividaddescripcion` varchar(500) DEFAULT NULL,
  `actividadprecio` int(11) DEFAULT NULL,
  `actividadimagen1` varchar(500) DEFAULT NULL,
  `actividadimagen2` varchar(500) DEFAULT NULL,
  `actividadestado` int(11) DEFAULT NULL,
  `cabanaid` int(11) DEFAULT NULL,
  PRIMARY KEY (`actividadid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbactividades`
--

LOCK TABLES `tbactividades` WRITE;
/*!40000 ALTER TABLE `tbactividades` DISABLE KEYS */;
INSERT INTO `tbactividades` VALUES (3,'Pesca de tilapia','Dueno pesca 3','pesca de las mejores tilapias',4000,'tilapia.jpg','tilapia2.jpg',1,1),(4,'Tortilla','Dueno tortillas','Mejores tortillas',2000,'tortilla.jpg','tortilla2.jpg',2,2),(5,'Gallos de pescado','Profesor Brenes','Tacos o gallos de pescado en tortilla de maiz',5000,'tilapia.jpg','tortilla.jpg',1,2),(6,'Prueba A','Prueba','AAAAAAA',1200,'tilapia2.jpg','tilapia2.jpg',2,1),(7,'Hacer tortillas','Jose','tortillas',3000,'tortilla.jpg','tilapia2.jpg',2,1);
/*!40000 ALTER TABLE `tbactividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcabana`
--

DROP TABLE IF EXISTS `tbcabana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcabana` (
  `cabanaid` int(11) NOT NULL AUTO_INCREMENT,
  `cabananombre` varchar(100) NOT NULL,
  `propietarioid` int(11) NOT NULL,
  `cabanaestado` int(11) NOT NULL,
  `cabanacantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`cabanaid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcabana`
--

LOCK TABLES `tbcabana` WRITE;
/*!40000 ALTER TABLE `tbcabana` DISABLE KEYS */;
INSERT INTO `tbcabana` VALUES (1,'Finca Buena Vista',6,1,10),(2,'Finca El Jardin',9,1,10);
/*!40000 ALTER TABLE `tbcabana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcabanacaracteristica`
--

DROP TABLE IF EXISTS `tbcabanacaracteristica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcabanacaracteristica` (
  `tbcabanacaracteristicaid` int(11) NOT NULL AUTO_INCREMENT,
  `cabanaid` int(11) NOT NULL,
  `cabanacaracteristicacodigo` varchar(500) NOT NULL,
  `cabanacaracteristicacriterio` varchar(500) NOT NULL,
  `cabanacaracteristicavalor` varchar(500) NOT NULL,
  `cabanacaracteristicaprioridad` varchar(500) NOT NULL,
  PRIMARY KEY (`tbcabanacaracteristicaid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcabanacaracteristica`
--

LOCK TABLES `tbcabanacaracteristica` WRITE;
/*!40000 ALTER TABLE `tbcabanacaracteristica` DISABLE KEYS */;
INSERT INTO `tbcabanacaracteristica` VALUES (16,1,'1-1,1-2','Material de construcción,Cocina','Madera,Equipada','1,2'),(18,2,'2-1,2-2','Vista,Cocina','Hacia el volcan,Con utensilios ','2,1');
/*!40000 ALTER TABLE `tbcabanacaracteristica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcabanadireccion`
--

DROP TABLE IF EXISTS `tbcabanadireccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcabanadireccion` (
  `direccionid` int(11) NOT NULL AUTO_INCREMENT,
  `direccionprovincia` varchar(50) NOT NULL,
  `direccioncanton` varchar(50) NOT NULL,
  `direcciondistrito` varchar(50) NOT NULL,
  `direccionotrasenas` varchar(100) NOT NULL,
  `cabanaid` int(11) DEFAULT NULL,
  PRIMARY KEY (`direccionid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcabanadireccion`
--

LOCK TABLES `tbcabanadireccion` WRITE;
/*!40000 ALTER TABLE `tbcabanadireccion` DISABLE KEYS */;
INSERT INTO `tbcabanadireccion` VALUES (1,'Cartago','Turrialba','Santa Cruz','San Antonio',1),(2,'Cartago','Alvarado','Pacayas','Frente a la iglesia',2);
/*!40000 ALTER TABLE `tbcabanadireccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcabanatarifa`
--

DROP TABLE IF EXISTS `tbcabanatarifa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcabanatarifa` (
  `cabanatarifaid` int(11) NOT NULL AUTO_INCREMENT,
  `cabanaid` int(11) NOT NULL,
  `cabanatarifamonto` float NOT NULL,
  PRIMARY KEY (`cabanatarifaid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcabanatarifa`
--

LOCK TABLES `tbcabanatarifa` WRITE;
/*!40000 ALTER TABLE `tbcabanatarifa` DISABLE KEYS */;
INSERT INTO `tbcabanatarifa` VALUES (4,2,15500),(5,1,20000);
/*!40000 ALTER TABLE `tbcabanatarifa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcaracteristicaimagen`
--

DROP TABLE IF EXISTS `tbcaracteristicaimagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcaracteristicaimagen` (
  `caracteristicaimagenid` int(11) NOT NULL AUTO_INCREMENT,
  `cabanacaracteristicaid` int(11) DEFAULT NULL,
  `caracteristicaimagencodigo` varchar(500) NOT NULL,
  `caracteristicaimagennombre` varchar(500) NOT NULL,
  `caracteristicaimagenruta` varchar(500) NOT NULL,
  PRIMARY KEY (`caracteristicaimagenid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcaracteristicaimagen`
--

LOCK TABLES `tbcaracteristicaimagen` WRITE;
/*!40000 ALTER TABLE `tbcaracteristicaimagen` DISABLE KEYS */;
INSERT INTO `tbcaracteristicaimagen` VALUES (2,16,'1-1,1-2','Madera,Equipada','madera.png,equipada.jpeg'),(3,18,'2-1,2-2','Vista,Cocina','madera.png,equipada.jpeg');
/*!40000 ALTER TABLE `tbcaracteristicaimagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcliente` (
  `clienteid` int(11) NOT NULL AUTO_INCREMENT,
  `clientenombrecompleto` varchar(50) NOT NULL,
  `clienteestado` int(11) DEFAULT NULL,
  PRIMARY KEY (`clienteid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcliente`
--

LOCK TABLES `tbcliente` WRITE;
/*!40000 ALTER TABLE `tbcliente` DISABLE KEYS */;
INSERT INTO `tbcliente` VALUES (1,'Jose David Rodriguez',1),(3,'Jose Carlos Umana',1),(5,'Kenneth Lopez Porras',1),(6,'Profe Brenes',1);
/*!40000 ALTER TABLE `tbcliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbclientecorreo`
--

DROP TABLE IF EXISTS `tbclientecorreo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbclientecorreo` (
  `correoid` int(11) NOT NULL AUTO_INCREMENT,
  `correovalor` varchar(500) NOT NULL,
  `clienteid` int(11) NOT NULL,
  PRIMARY KEY (`correoid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbclientecorreo`
--

LOCK TABLES `tbclientecorreo` WRITE;
/*!40000 ALTER TABLE `tbclientecorreo` DISABLE KEYS */;
INSERT INTO `tbclientecorreo` VALUES (5,'jose@gmail.com,jose@gmail.com',1),(6,'jose@gmail.com',3),(7,'',6);
/*!40000 ALTER TABLE `tbclientecorreo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcompraplan`
--

DROP TABLE IF EXISTS `tbcompraplan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcompraplan` (
  `compraplanid` int(11) NOT NULL AUTO_INCREMENT,
  `planid` int(11) NOT NULL,
  `clienteid` int(11) NOT NULL,
  PRIMARY KEY (`compraplanid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcompraplan`
--

LOCK TABLES `tbcompraplan` WRITE;
/*!40000 ALTER TABLE `tbcompraplan` DISABLE KEYS */;
INSERT INTO `tbcompraplan` VALUES (32,17,1),(33,18,5),(34,19,3);
/*!40000 ALTER TABLE `tbcompraplan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbhabitacion`
--

DROP TABLE IF EXISTS `tbhabitacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbhabitacion` (
  `habitacionid` int(11) NOT NULL AUTO_INCREMENT,
  `cabanaid` int(11) DEFAULT NULL,
  `habitacionestado` bit(1) DEFAULT NULL,
  `habitacioncapacidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`habitacionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbhabitacion`
--

LOCK TABLES `tbhabitacion` WRITE;
/*!40000 ALTER TABLE `tbhabitacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbhabitacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbofertas`
--

DROP TABLE IF EXISTS `tbofertas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbofertas` (
  `ofertaid` int(11) NOT NULL AUTO_INCREMENT,
  `ofertanombre` varchar(100) DEFAULT NULL,
  `ofertafechainicio` date DEFAULT NULL,
  `ofertafechafin` date DEFAULT NULL,
  `ofertaprecio` int(11) DEFAULT NULL,
  PRIMARY KEY (`ofertaid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbofertas`
--

LOCK TABLES `tbofertas` WRITE;
/*!40000 ALTER TABLE `tbofertas` DISABLE KEYS */;
INSERT INTO `tbofertas` VALUES (3,'Oferta Julio','2020-07-01','2020-07-31',900),(4,'Oferta de mes de junio','2020-06-09','2020-06-30',600),(5,'Ofertex','2020-09-09','2020-10-04',1200);
/*!40000 ALTER TABLE `tbofertas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbplan`
--

DROP TABLE IF EXISTS `tbplan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbplan` (
  `planid` int(11) NOT NULL AUTO_INCREMENT,
  `plancantidaddias` int(11) NOT NULL,
  `planmonto` int(11) NOT NULL,
  `planrestricciones` varchar(100) DEFAULT NULL,
  `cabanaid` int(11) DEFAULT NULL,
  PRIMARY KEY (`planid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbplan`
--

LOCK TABLES `tbplan` WRITE;
/*!40000 ALTER TABLE `tbplan` DISABLE KEYS */;
INSERT INTO `tbplan` VALUES (17,3,100000,'4,7',1),(18,2,150000,'5',2),(19,10,10000,'4',1);
/*!40000 ALTER TABLE `tbplan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbpropietario`
--

DROP TABLE IF EXISTS `tbpropietario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbpropietario` (
  `propietarioid` int(11) NOT NULL AUTO_INCREMENT,
  `propietarionombre` varchar(50) NOT NULL,
  `propietarionumerocuentabancaria` varchar(30) NOT NULL,
  `propietariocorreo` varchar(50) NOT NULL,
  `propietariotelefono` varchar(100) NOT NULL,
  PRIMARY KEY (`propietarioid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpropietario`
--

LOCK TABLES `tbpropietario` WRITE;
/*!40000 ALTER TABLE `tbpropietario` DISABLE KEYS */;
INSERT INTO `tbpropietario` VALUES (6,'Kenneth Gerado','123456','kenneth@corre.com','12345678'),(9,'Cristian Propietario','200-01-100-56654-2','cristian.brenes@ucr.ac.cr','83469309'),(10,'','','','');
/*!40000 ALTER TABLE `tbpropietario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbpropietariocuentabancaria`
--

DROP TABLE IF EXISTS `tbpropietariocuentabancaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbpropietariocuentabancaria` (
  `propietariocuentabancariaid` int(11) NOT NULL AUTO_INCREMENT,
  `propietarioid` int(11) DEFAULT NULL,
  `propietariocuentabancariabanconombre` varchar(200) DEFAULT NULL,
  `propietariocuentabancariabanconumerocuenta` varchar(300) DEFAULT NULL,
  `propietariocuentabancariaestado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`propietariocuentabancariaid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpropietariocuentabancaria`
--

LOCK TABLES `tbpropietariocuentabancaria` WRITE;
/*!40000 ALTER TABLE `tbpropietariocuentabancaria` DISABLE KEYS */;
INSERT INTO `tbpropietariocuentabancaria` VALUES (4,6,'BAC','123456','desactiva');
/*!40000 ALTER TABLE `tbpropietariocuentabancaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbreserva`
--

DROP TABLE IF EXISTS `tbreserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbreserva` (
  `reservaid` int(11) NOT NULL AUTO_INCREMENT,
  `cabanaid` int(11) NOT NULL,
  `reservacodigo` varchar(500) NOT NULL,
  `reservafechainicio` date NOT NULL,
  `reservafechafin` date NOT NULL,
  `reservahorainicio` time NOT NULL,
  `reservahorafin` time NOT NULL,
  `reservacantidadpersonas` smallint(6) NOT NULL,
  `reservatipopago` varchar(100) NOT NULL,
  `reservaclienteid` int(11) DEFAULT NULL,
  `reservamonto` int(11) DEFAULT NULL,
  PRIMARY KEY (`reservaid`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbreserva`
--

LOCK TABLES `tbreserva` WRITE;
/*!40000 ALTER TABLE `tbreserva` DISABLE KEYS */;
INSERT INTO `tbreserva` VALUES (28,1,'JunMonMon01','2020-06-01','2020-06-01','06:00:00','11:59:00',1,'tarjeta',1,NULL),(29,1,'JunMonMon01','2020-06-01','2020-06-01','18:00:00','23:59:00',1,'tarjeta',1,NULL),(30,1,'JunMonMon01','2020-06-01','2020-06-01','12:00:00','17:59:00',2,'tarjeta',1,NULL),(31,1,'JunThuThu05','2020-06-18','2020-06-18','12:00:00','17:59:00',2,'tarjeta',5,NULL),(32,1,'JunThuThu05','2020-06-18','2020-06-18','06:00:00','11:59:00',2,'tarjeta',5,NULL),(33,1,'JunThuThu05','2020-06-18','2020-06-18','18:00:00','23:59:00',3,'tarjeta',5,NULL),(34,2,'JunTueTue05','2020-06-02','2020-06-02','12:00:00','17:59:00',2,'tarjeta',5,NULL),(35,1,'JunTueTue01','2020-06-02','2020-06-02','06:00:00','11:59:00',1,'tarjeta',1,NULL),(36,1,'JunWedWed01','2020-06-03','2020-06-03','06:00:00','11:59:00',1,'tarjeta',1,NULL);
/*!40000 ALTER TABLE `tbreserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbreservaadelantopago`
--

DROP TABLE IF EXISTS `tbreservaadelantopago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbreservaadelantopago` (
  `reservaadelantopagoid` int(11) NOT NULL AUTO_INCREMENT,
  `reservaid` int(11) NOT NULL,
  `reservaadelantopagomonto` float NOT NULL,
  `reservaadelantopagofecha` date NOT NULL,
  `reservaadelantopagonumerodocumento` varchar(500) NOT NULL,
  `reservaadelantopagonombredepositante` varchar(500) NOT NULL,
  PRIMARY KEY (`reservaadelantopagoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbreservaadelantopago`
--

LOCK TABLES `tbreservaadelantopago` WRITE;
/*!40000 ALTER TABLE `tbreservaadelantopago` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbreservaadelantopago` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`servicioid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbservicio`
--

LOCK TABLES `tbservicio` WRITE;
/*!40000 ALTER TABLE `tbservicio` DISABLE KEYS */;
INSERT INTO `tbservicio` VALUES (21,'Rancho','grande y familiar'),(23,'Bar amplio','La Cabaña cuenta con una barra para 15 personas y una camara de enfriamiento'),(24,'SER','DESC'),(25,'Piscina','grande'),(26,'Piscina','Grande'),(27,'Piscina','Grande');
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
  `servicioid` int(11) NOT NULL,
  PRIMARY KEY (`servicioimagenid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbservicioimagen`
--

LOCK TABLES `tbservicioimagen` WRITE;
/*!40000 ALTER TABLE `tbservicioimagen` DISABLE KEYS */;
INSERT INTO `tbservicioimagen` VALUES (1,'foto.png',19),(2,'foto.jpg',19),(3,'foto.jpg',21),(4,'foto.jpg',22);
/*!40000 ALTER TABLE `tbservicioimagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbtelefono`
--

DROP TABLE IF EXISTS `tbtelefono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbtelefono` (
  `telefonoid` int(11) NOT NULL AUTO_INCREMENT,
  `telefonocriterio` varchar(500) NOT NULL,
  `telefonovalor` varchar(500) NOT NULL,
  `telefonoclienteid` int(11) NOT NULL,
  PRIMARY KEY (`telefonoid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtelefono`
--

LOCK TABLES `tbtelefono` WRITE;
/*!40000 ALTER TABLE `tbtelefono` DISABLE KEYS */;
INSERT INTO `tbtelefono` VALUES (2,'fijo','61893728',1),(3,'celular','12345',3),(4,'celular,fijo','123456,665555',6);
/*!40000 ALTER TABLE `tbtelefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbtemporada`
--

DROP TABLE IF EXISTS `tbtemporada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbtemporada` (
  `tbtemporadaid` int(11) NOT NULL AUTO_INCREMENT,
  `tbtemporadanombre` varchar(500) NOT NULL,
  `tbtemporadafechainicio` date NOT NULL,
  `tbtemporadafechafinal` date NOT NULL,
  PRIMARY KEY (`tbtemporadaid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtemporada`
--

LOCK TABLES `tbtemporada` WRITE;
/*!40000 ALTER TABLE `tbtemporada` DISABLE KEYS */;
INSERT INTO `tbtemporada` VALUES (4,'Baja','2020-04-01','2020-04-30'),(5,'Media','2020-01-01','2020-01-31'),(7,'Alta','2020-12-01','2020-12-31');
/*!40000 ALTER TABLE `tbtemporada` ENABLE KEYS */;
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
  `usuarioestado` bit(1) NOT NULL,
  `usuarioperfil` int(11) NOT NULL,
  PRIMARY KEY (`usuarioid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuario`
--

LOCK TABLES `tbusuario` WRITE;
/*!40000 ALTER TABLE `tbusuario` DISABLE KEYS */;
INSERT INTO `tbusuario` VALUES (1,'admin','admin',_binary '',1);
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

-- Dump completed on 2020-06-22  8:25:59
