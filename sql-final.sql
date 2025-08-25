-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: bcfexa
-- ------------------------------------------------------
-- Server version	8.4.4

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
-- Table structure for table `actividad`
--

DROP TABLE IF EXISTS `actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actividad` (
  `NroResolucion` varchar(45) NOT NULL,
  `NroExpediente` varchar(45) NOT NULL,
  `NroConvenioMarco` varchar(45) NOT NULL,
  `Fecha_inicio` date DEFAULT NULL,
  `Fecha_final` date DEFAULT NULL,
  `Resumen` varchar(1000) DEFAULT NULL,
  `Objetivo` varchar(200) DEFAULT NULL,
  `TipoActividad_Id` int NOT NULL,
  `PlazoRenovacion` tinyint DEFAULT NULL,
  `RenovacionAutomatica` int NOT NULL,
  `Id` int NOT NULL AUTO_INCREMENT,
  `UbicacionArchivo_Id` int NOT NULL,
  `Informe_Id` int NOT NULL,
  `MonedaOrganizacion_Id` int NOT NULL,
  `InversionOrganizacion` float NOT NULL,
  `NotaInversionOrganizacion` varchar(5000) NOT NULL,
  `MonedaUnidad_Id` int NOT NULL,
  `InversionUnidad` float NOT NULL,
  `NotaInversionUnidad` varchar(5000) NOT NULL,
  `NroResolucion_Asociada` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad`
--

LOCK TABLES `actividad` WRITE;
/*!40000 ALTER TABLE `actividad` DISABLE KEYS */;
INSERT INTO `actividad` VALUES ('R12/23','02-967-1-22','Convenio 123456','2022-08-25','2024-08-07','formalizar actividades Científicas, Técnicas ','Crear conciencia                                                          ',8,0,0,12,0,0,2,2000,'Las actividades no implicarán erogación financiera alguna para las FACULTADES. Se contará con los tres casos',1,5000,'Cambiado otra vez',''),('R51/21','02-1038-T-21','0','2021-09-07','2021-12-31','Se acordarán las condiciones del Servicio a Terceros (ST) solicitado por la EMPRESA a la FACULTAD, conducente a realizar la Descripción Petrográfica de muestras provistas por la EMPRESA, perteneciente','Descripción Petrográfica de cortes delgados correspondientes al proyecto minero Las Flechas y proyecto Evelina',1,0,0,13,0,0,1,120000,'El costo total del ST será de ciento veinte mil doscientos (120.200,00 pesos), incluyendo: 1) prepar',1,0,'El cronograma de actividades estará sujeto a la posibilidad de acceder al instrumental disponible en',''),('R85/21','02-0805-A-21','Convenio Editado','2021-11-30','2025-11-30','La Facultad, a través del Departamento de Biología, y el Colegio, se comprometen a establecer como objeto de la presente Acta Complementaria es generar un marco de colaboración en actividades de mutuo interés por su trascendencia social, cultural y educativa de estudiantes y profesionales de las Ciencias Biológicas','. ',3,0,0,14,0,0,1,0,'Para la concreción de las acciones propuestas en la cláusula segunda las partes se comprometen a gestionar conjunta o separadamente ante otros organismos públicos y privados, nacionales e internacionales, los recursos financieros necesarios para la implementación de los mismos.',1,0,'.',''),('55A23','02-0805-A-21','Canvenio 1','2023-06-01','2023-06-08','Resumen nuevo','       ',12,24,1,15,0,0,1,123456,'Nota monto organizacion',2,12345,'Todo en dolares x Exactas',''),('R65/22','4','123','2022-08-16','2024-08-16','tiene por objeto formalizar actividades Científicas, Técnicas y de Extensión entre LAS FACULTADES en el marco del proyecto de extensión denominado “Geoparque Cerro de Valdivia: Acciones estratégicas participativas para su desarrollo”. Aprobado por Resolución -2022-32-APN-SECPU-ME como continuidad de Proyecto “Propuesta de Creación del Geoparque Cerro de Valdivia (Pocito). Una nueva alternativa al turismo tradicional','Sensibilizar a la comunidad mediante capacitaciones y talleres sobre la importancia del desarrollo de un abordaje técnico y responsable de la gastronomía como medio de desarrollo comunitario en el mar',1,24,1,16,0,0,1,0,'Sin erogaci´n',1,0,'Sin erogación','');
/*!40000 ALTER TABLE `actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleactividadorganizacion`
--

DROP TABLE IF EXISTS `detalleactividadorganizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalleactividadorganizacion` (
  `Actividad_Id` int NOT NULL,
  `Organizacion_Id` int NOT NULL,
  PRIMARY KEY (`Actividad_Id`,`Organizacion_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleactividadorganizacion`
--

LOCK TABLES `detalleactividadorganizacion` WRITE;
/*!40000 ALTER TABLE `detalleactividadorganizacion` DISABLE KEYS */;
INSERT INTO `detalleactividadorganizacion` VALUES (12,1),(12,2),(13,58),(14,19),(15,4),(15,9),(15,10),(16,52);
/*!40000 ALTER TABLE `detalleactividadorganizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleactividadunidad`
--

DROP TABLE IF EXISTS `detalleactividadunidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalleactividadunidad` (
  `UnidadEjecutora_Id` int NOT NULL,
  `Actividad_Id` int NOT NULL,
  `CatedraCarreraImpactada` varchar(100) DEFAULT NULL,
  `CantidadAlumnosInvolucrados` int DEFAULT NULL,
  PRIMARY KEY (`UnidadEjecutora_Id`,`Actividad_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleactividadunidad`
--

LOCK TABLES `detalleactividadunidad` WRITE;
/*!40000 ALTER TABLE `detalleactividadunidad` DISABLE KEYS */;
INSERT INTO `detalleactividadunidad` VALUES (0,14,NULL,NULL),(0,16,NULL,NULL),(2,12,NULL,NULL),(3,12,NULL,NULL),(4,12,NULL,NULL),(4,14,NULL,NULL),(6,16,NULL,NULL),(12,15,NULL,NULL),(13,15,NULL,NULL),(16,13,NULL,NULL),(19,15,NULL,NULL);
/*!40000 ALTER TABLE `detalleactividadunidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallepersonaactividad`
--

DROP TABLE IF EXISTS `detallepersonaactividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detallepersonaactividad` (
  `Actividad_Id` int NOT NULL,
  `Persona_Id` int NOT NULL,
  `Org_o_Uni` int NOT NULL,
  `Rol_Id` int NOT NULL,
  PRIMARY KEY (`Actividad_Id`,`Persona_Id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallepersonaactividad`
--

LOCK TABLES `detallepersonaactividad` WRITE;
/*!40000 ALTER TABLE `detallepersonaactividad` DISABLE KEYS */;
INSERT INTO `detallepersonaactividad` VALUES (12,1,1,2),(12,2,2,2),(12,9,1,2),(13,1,1,2),(13,43,2,2),(14,42,1,2),(14,44,2,2),(15,4,2,2),(15,5,2,2),(15,7,1,2),(15,9,1,2),(15,10,2,2),(16,27,1,3),(16,30,1,4),(16,41,2,2);
/*!40000 ALTER TABLE `detallepersonaactividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informe`
--

DROP TABLE IF EXISTS `informe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `informe` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `InformeUnidad` varchar(45) DEFAULT NULL,
  `FechaInformeUnidad` date DEFAULT NULL,
  `InformeOrganizacion` varchar(45) DEFAULT NULL,
  `FechaInformeOrganizacion` date DEFAULT NULL,
  `InformeComision` varchar(45) DEFAULT NULL,
  `FechaInformeComision` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informe`
--

LOCK TABLES `informe` WRITE;
/*!40000 ALTER TABLE `informe` DISABLE KEYS */;
/*!40000 ALTER TABLE `informe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monedadeinversion`
--

DROP TABLE IF EXISTS `monedadeinversion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `monedadeinversion` (
  `Id` int NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monedadeinversion`
--

LOCK TABLES `monedadeinversion` WRITE;
/*!40000 ALTER TABLE `monedadeinversion` DISABLE KEYS */;
INSERT INTO `monedadeinversion` VALUES (1,'Peso Argentino'),(2,'Dolar Estadounidense'),(3,'Dolar Canadiense'),(4,'Euro'),(5,'Boliviano'),(6,'Real Brasileño'),(7,'Yuan');
/*!40000 ALTER TABLE `monedadeinversion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizacion`
--

DROP TABLE IF EXISTS `organizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organizacion` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(150) DEFAULT NULL,
  `Domicilio` varchar(45) DEFAULT NULL,
  `Localidad` varchar(45) DEFAULT NULL,
  `Provincia` varchar(45) DEFAULT NULL,
  `Pais` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizacion`
--

LOCK TABLES `organizacion` WRITE;
/*!40000 ALTER TABLE `organizacion` DISABLE KEYS */;
INSERT INTO `organizacion` VALUES (1,'Cámara Minera de San Juan',NULL,NULL,NULL,NULL),(2,'Asociación Médica San Juan',NULL,NULL,NULL,NULL),(3,'Corte de Justicia de San Juan',NULL,NULL,NULL,NULL),(4,'Desarrollo de Prospectos Mineros S. A.',NULL,NULL,NULL,NULL),(5,'Empresa Accusys Technology SRL',NULL,NULL,NULL,NULL),(6,'Empresa Argentina Fortescue SAU',NULL,NULL,NULL,NULL),(7,'Empresa Austral Gold y Cámara Minera de San Juan',NULL,NULL,NULL,NULL),(8,'Empresa BGC Engeneering',NULL,NULL,NULL,NULL),(9,'Empresa Casposo Argentina LTD',NULL,NULL,NULL,NULL),(10,'Empresa EGG S.A.S.',NULL,NULL,NULL,NULL),(11,'Empresa Minera Piuquenes S.A.',NULL,NULL,NULL,NULL),(12,'Empresa Vector Argentina (AUSENCO)',NULL,NULL,NULL,NULL),(13,'Empresa WES S.A.S.',NULL,NULL,NULL,NULL),(14,'Escuela Universitaria de Ciencias de la Salud',NULL,NULL,NULL,NULL),(15,'Facultad de Aquitectura, Urbanismo y Diseño',NULL,NULL,NULL,NULL),(16,'Facultad de Ciencias Físico-Matemáticas y Naturales de la Universidad de San Luis',NULL,NULL,NULL,NULL),(17,'Facultad de Ciencias Químicas y Tecnológicas de la Universidad Católica de Cuyo',NULL,NULL,NULL,NULL),(18,'Facultad de Filosofía Humanidades y Artes',NULL,NULL,NULL,NULL),(19,'Federación de Entidades Profesionales Universitarias (FEPU)',NULL,NULL,NULL,NULL),(20,'Colegio Profesional de Ciencias Biológicas de San Juan',NULL,NULL,NULL,NULL),(21,'Fiscalía de Estado',NULL,NULL,NULL,NULL),(22,'Fundación Bioandina Argentina',NULL,NULL,NULL,NULL),(23,'Fundación Sadosky',NULL,NULL,NULL,NULL),(24,'Fundación Sadosky (línea A)',NULL,NULL,NULL,NULL),(25,'Fundación Sadosky (línea B)',NULL,NULL,NULL,NULL),(26,'Glencore Pachón y Observatorio Astronómico Felix Aguilar',NULL,NULL,NULL,NULL),(27,'Consejo de Coordinación para la protección de Glaciares (Gobierno de la Provincia de San Juan)',NULL,NULL,NULL,NULL),(28,'Ministerio de Educación (Gobierno de San Juan)',NULL,NULL,NULL,NULL),(29,'Ministerio de Gobierno de San Juan',NULL,NULL,NULL,NULL),(30,'Ministerio de la Producción y Desarrollo Económico',NULL,NULL,NULL,NULL),(31,'Ministerio de Minería',NULL,NULL,NULL,NULL),(32,'Empresa Golden Mining',NULL,NULL,NULL,NULL),(33,'Ministerio de Obras y Servicios Públicos',NULL,NULL,NULL,NULL),(34,'Ministerio de Salud Pública de la Provincia de San Juan',NULL,NULL,NULL,NULL),(35,'Ministerio de Turismo y Cultura del Gobierno de la Provincia de San Juan',NULL,NULL,NULL,NULL),(36,'Municipalidad de Pocito',NULL,NULL,NULL,NULL),(37,'Municipalidad de Angaco',NULL,NULL,NULL,NULL),(38,'Municipalidad de Calingasta',NULL,NULL,NULL,NULL),(39,'Municipalidad de Chimbas',NULL,NULL,NULL,NULL),(40,'Municipalidad de Jachal',NULL,NULL,NULL,NULL),(41,'Municipalidad de la Ciudad de San Juan',NULL,NULL,NULL,NULL),(42,'Municipalidad de Rawson',NULL,NULL,NULL,NULL),(43,'Municipalidad de Río Hurtado, Región de Coquimbo, Chile',NULL,NULL,NULL,NULL),(44,'Municipalidad de Rivadavia',NULL,NULL,NULL,NULL),(45,'Red Regional de Prácticas Socioeducativas de Universidades Públicas - Zona Cuyo ',NULL,NULL,NULL,NULL),(46,'Secretaría de Estado de Ambiente y Desarrollo Sustentable del Gobierno de la Provincia de San Juan (SEADS)',NULL,NULL,NULL,NULL),(47,'Secretaría de Estado de Ciencia, Tecnología e Innovación (SECITI)',NULL,NULL,NULL,NULL),(48,'Ministerio de Salud Pública',NULL,NULL,NULL,NULL),(49,'Secretaría de Estado de Seguridad y Orden Público',NULL,NULL,NULL,NULL),(50,'Secretaría de Tránsito y Transporte',NULL,NULL,NULL,NULL),(51,'Subsecretaría de Agricultura Familiar - Delegación San Juan, dependiente de la Secretaría de Desarrollo Rural y Agricultura Familiar del MAGP',NULL,NULL,NULL,NULL),(52,'Universidad Católica de Cuyo',NULL,NULL,NULL,NULL),(53,'Universidad de Ciego de Ávila Máximo Gómez Báez UNICA  - Cuba',NULL,NULL,NULL,NULL),(54,'Universidad Estatal a Distancia UNED - Costa Rica',NULL,NULL,NULL,NULL),(55,'Universidad Nacional de La Pampa',NULL,NULL,NULL,NULL),(56,'Universidad Nacional de Tierra del Fuego, Antártida e Islas del Atlántico Sur',NULL,NULL,NULL,NULL),(57,'Universidad Presbiteriana Mackenzie - Instituto Presbiteriano Mackenzie',NULL,NULL,NULL,NULL),(58,'Empresa Yamana Gold',NULL,NULL,NULL,NULL),(59,'Colegio Profesional de Ciencias Biológicas de San Juan',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `organizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `Titulo` varchar(20) NOT NULL,
  `CUIL` int DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Jácome, Luis','Biologo',NULL),(2,'Cintas, Carla Agustina','Sra.',NULL),(3,'Romero, Carlos (Tránsito)','',NULL),(4,'Piedrahita, Cristian','',NULL),(5,'Tapella, Daniel (DPI)','',NULL),(6,'Directores de Dpto. de Física de FCFMN','',NULL),(7,'Valladares, Diego (Dr.)','',NULL),(8,'Simoncelli, Iván (Dr.)','',NULL),(9,'Arenson, Lukas U. ','Dr.',NULL),(10,'Wainstein, Pablo A.','Dr.',NULL),(11,'Dr. Paulo Centres','',NULL),(12,'Dr. Rodolfo Porasso','',NULL),(13,'Dra. Liliana Salva','',NULL),(14,'Dra. Yanina Ripoll','',NULL),(15,'Parrón, Gabriela','Sra.',NULL),(16,'Delgado, Gustavo E. ','Ing.',NULL),(17,'Ing. Alfredo Morales','',NULL),(18,'Grillo, Bruno','Ing.',NULL),(19,'Ing. Diego Molina','',NULL),(20,'Ing. Juan Carlos Cabrera','',NULL),(21,'Ing. Juan Manuel Raigón','',NULL),(22,'Juan Pablo Pappalardoi ','',NULL),(23,'Leonardo Blasco (Sube)','',NULL),(24,'Lic. Ana María Graffigna ','',NULL),(25,'Lic. Ariel Pittavino','',NULL),(26,'Muñoz Riofrio, Daniel','Lic.',NULL),(27,'Lic. Daniela Ramírez','',NULL),(28,'Lic. Florencia Cano Suárez.','',NULL),(29,'Lic. Héctor Alejandro Gómez','',NULL),(30,'Lic. Mariano Carmona','',NULL),(31,'Lic. Yanina Ripoll','',NULL),(32,'Med. Vet. Ivan Simoncelli','',NULL),(33,'Sr. Christian Speltin','',NULL),(34,'Sr. Cristian Daniel Quiroga','',NULL),(35,'Sr. Mariano Benet','',NULL),(36,'Sra. Carolina Fernández','',NULL),(37,'Sra. Lucía Norma Altamirano','',NULL),(38,'Sra. Valeria Saieg','',NULL),(39,'Tco. José Alberto Marinero','',NULL),(40,'Tco. Pablo Emanuel Pastro','',NULL),(41,'Lic. Dinia Schmitter de Salvo','',NULL),(42,'La Organización no declara RRHH','',NULL),(43,'Dra. Gabriela Torres','',NULL),(44,'La Unidad no declara RRHH 	','',NULL),(45,'MONTANI, María Cecilia','Lic.',NULL),(46,'Rodríguez Assaf, Leticia','Lic.',NULL),(47,'Olguin, Luis Alberto','Prog.',NULL);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Coordinador General'),(2,'Representante Técnico');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoactividad`
--

DROP TABLE IF EXISTS `tipoactividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipoactividad` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoactividad`
--

LOCK TABLES `tipoactividad` WRITE;
/*!40000 ALTER TABLE `tipoactividad` DISABLE KEYS */;
INSERT INTO `tipoactividad` VALUES (1,'Acta Complementaria'),(2,'Acta Complementaria de Prácticas Profesionale'),(3,'Acta Compromiso'),(4,'Acta Constitutiva'),(5,'Acta de Colaboración'),(6,'Acta Intención'),(7,'Acta Inter Facultades'),(8,'Adenda'),(9,'Convenio de Servicio de Asistencia Técnica'),(10,'Convenio Específico de Asistencia Técnica'),(11,'Convenio Específico'),(12,'Convenio Específico de Cooperación, Capacitación y Asistencia Técnica'),(13,'Convenio Específico de Prácticas Profesionales Situadas No Rentadas'),(14,'Convenio Específico de Servicio de Asistencia Técnica'),(15,'Convenio Marco de Cooperación');
/*!40000 ALTER TABLE `tipoactividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicacionarchivo`
--

DROP TABLE IF EXISTS `ubicacionarchivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ubicacionarchivo` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `UbicacionOriginal` varchar(45) DEFAULT NULL,
  `UbicacionCopia` varchar(45) DEFAULT NULL,
  `UbicacionDigital` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacionarchivo`
--

LOCK TABLES `ubicacionarchivo` WRITE;
/*!40000 ALTER TABLE `ubicacionarchivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ubicacionarchivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidadejecutora`
--

DROP TABLE IF EXISTS `unidadejecutora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unidadejecutora` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Unidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidadejecutora`
--

LOCK TABLES `unidadejecutora` WRITE;
/*!40000 ALTER TABLE `unidadejecutora` DISABLE KEYS */;
INSERT INTO `unidadejecutora` VALUES (2,'Centro de Investigaciones de la Geósfera y Biosfera (CIGEOBIO))'),(3,'Centro Tecnológico Educativo'),(4,'Departamento de Biología '),(5,'Departamento de Física'),(6,'Departamento de Geología'),(7,'Departamento de Geofísica y Astronomía'),(8,'Departamento de Informática'),(9,'Gabinete de Ciencias Planetarias'),(10,'Gabinete de Estudios de Geocriología, Glaciología, Nivología y Cambio Climático'),(11,'Gabinete de Neotectónica y Geomorfología'),(12,'Gabinete de Investigación de Servicios Ecosistémicos de Zonas Áridas (GISEZA)'),(13,'IIAM'),(14,'Instituo Geofísico Sismológico \"Ing. Fernando S. Volponi\" (IGSV)'),(15,'Instituto de Ciencias Astronómicas de la Tierra y del Espacio (ICATE)'),(16,'Instituto de Geología \"Dr. Emiliano P. Aparicio\" (INGEO)'),(17,'Instituto de Informática'),(18,'Instituto y Museo de Ciencias Naturales'),(19,'Observatorio Astronómico \"Felix Aguilar\" (OAFA)'),(20,'Programa de Investigación Educación a Distancia - FCEFN'),(21,'Todas las unidades académicas'),(31,''),(32,'');
/*!40000 ALTER TABLE `unidadejecutora` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-25  9:53:28
