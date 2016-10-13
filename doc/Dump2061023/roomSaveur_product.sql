CREATE DATABASE  IF NOT EXISTS `roomSaveur` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `roomSaveur`;
-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: roomSaveur
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptive` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `tva` double NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `dlc` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D34A04AD3C0BE965` (`filename`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (3,'3700929316301','HA1:FILET DE POULET ROTI','Menu HA1 FAUCHON Entrée : Velouté d\'automne à la châtaigne et à la courge\r\nbutternut Plat : Filet de poulet rôti au thé Lapsang Souchong, salade de crozets\r\naux artichauts et pickles d\'oignons rouges Dessert : Financier aux agrumes et\r\ncrème de citron vert FAUCHON\r\nCe plateau est livré avec : Un pain aux céréales Bleu-blanc-coeur Une\r\ngourmandise Fauchon Une bouteille Evian 33cl Un verre et un kit de couverts',29.9,10,'/tmp/phpUmrW5K','7283587f2a44ce7cc4634ce208531a26bfbcf821.jpg','2016-10-12 15:08:00','2016-10-12 15:08:00',1),(4,'3700929316401','HA3:SAUMON ROTI','Menu HA3 FAUCHON Entrée : Polenta aux girolles et cèpes Plat : Saumon rôti,\r\nsauce à la clémentine, endives braisées et mousseline de céleri rave Fromage :\r\nFromage affiné Dessert : L\'incontournable éclair Paris-Brest FAUCHON\r\nCe plateau est livré avec : Un pain aux céréales Bleu-blanc-coeur Une\r\ngourmandise Fauchon Une bouteille Evian 33cl Un verre et un kit de couverts',36.8,10,'/tmp/phpdnr0aW','d865ffb9d59fc12b1a2294d4cadd800d242543e8.jpg','2016-10-12 15:08:42','2016-10-12 15:08:42',1),(5,'3700929316501','HA4:PAVE DE RUMSTECK AU POIVRE','Menu HA4 FAUCHON Entrée : Le fameux éclair FAUCHON au saumon et yuzu\r\nPlat : Pavé de rumsteck au poivre sauvage, courge butternut, condiment\r\nbetterave et chou rouge confit Fromage : Fromage affiné Dessert : Baba au\r\nrhum FAUCHON\r\nCe plateau est livré avec : Un pain aux céréales Bleu-blanc-coeur Une\r\ngourmandise Fauchon Une bouteille Evian 33cl Un verre et un kit de couverts',37.5,10,'/tmp/phpIvI2yW','0f6c5446fbc77f06fabf755e27f7a780de39dbf8.jpg','2016-10-12 15:09:23','2016-10-12 15:09:23',1),(6,'3700929316601','HM2A:MENU DU MOMENT','\"Menu Hm2 FLO PRESTIGEDisponible du 12 septembre 2016 au 27 novembre\r\n2016Entrée : Salade paysanne : lentilles blondes de Saint-Flour, gésiers de\r\ncanard et comté A.O.P. Plat : Filet de poulet fermier rôti au paprika, poêlée\r\nde légumes et mousseline de panais aux agrumes Fromage : Chèvre cendré\r\nDessert : Ile flottante au caramel et noisettes\r\nCe plateau est livré avec : Un pain Bleu-blanc-coeur Un Napolitain au chocolat\r\nnoir bio Un verre et un kit de couverts',24.5,10,'/tmp/phpEqkAB3','a3a71da7b89d4541769a0aad4d68a46872f3c082.jpg','2016-10-12 15:16:46','2016-10-12 15:16:46',2),(7,'3700929316701','HM4:BOEUF FRANCAIS','\"Menu Hm4 FLO PRESTIGE Entrée : Ardoise de jambon de Bayonne Plat : Pièce\r\nde boeuf cuisson basse température et sauce façon charcutière, pommes de\r\nterre et pleurotes Fromage : Camembert Dessert : Comme un café liégeois\r\nCe plateau est livré avec : Deux pains Bleu-blanc-coeur Un Napolitain au\r\nchocolat noir bio Un verre et un kit de couverts\r\n\"',26.5,10,'/tmp/phpKcOQcd','97d453b8ce50963887c7d47b177062e7d2765073.jpg','2016-10-12 15:17:34','2016-10-12 15:17:34',2),(8,'3700929316801','HM5A:SAUMON ROTI ET LENTILLES','\"Menu Hm5 FLO PRESTIGEDu 12 septembre 2016 au 11 décembre 2016Entrée\r\nde saison : Verrine de carottes bio aux agrumes et houmous Plat : Saumon rôti\r\nau carvi, salade de lentilles blondes de Saint-Flour et crème façon du Barry\r\nFromage : Brie Dessert : Tarte citron meringuée\r\nCe plateau est livré avec : Un pain Bleu-blanc-coeur Un Napolitain au chocolat\r\nnoir bio Un verre et un kit de couverts\r\n\"',27.8,10,'/tmp/phpPxakS7','849db1e73fd481123df7fa15a49148a4f38b0019.jpg','2016-10-12 15:18:08','2016-10-12 15:18:08',2),(9,'3700929316901','HP1:VOLAILLE LEGEREMENTEPICEE','\"Menu Hp1 PLEINE NATURE Entrée : Velouté aux courges de Cédrick à la crème\r\nde hareng fumé au Tréport Plat : Volaille bio légèrement épicée, moutarde à\r\nl\'ancienne du Vexin, chou pak choï et rattes du Touquet Dessert : Sablé aux\r\npommes locavore\r\nCe plateau est livré avec : Un pain Bleu-blanc-coeur Une bouteille d\'eau 50cl\r\nUn kit de couverts',23.5,10,'/tmp/phpfyfDHs','15f2af59543e4fc4f18897bfba4371ab0b0d242a.jpg','2016-10-12 15:20:52','2016-10-12 15:20:52',1),(10,'3700929317001','HP2:BOEUF AUX SAVEURS D ASIE','\"Menu Hp2 PLEINE NATURE Entrée : Salade de lentilles vertes du Vexin et céleri\r\nPlat : Émincé de boeuf bio aux saveurs d\'Asie, salade thaï aux légumes et huile\r\nde sésame Dessert : Crème aux oeufs bio et amandes effilées\r\nCe plateau est livré avec : Un pain Bleu-blanc-coeur Une bouteille d\'eau 50cl\r\nUn kit de couverts\r\n\"',24.5,10,'/tmp/phpQs8aoE','633a440c470b1cd839a93f4ca165061a73cc1255.jpg','2016-10-12 15:21:31','2016-10-12 15:21:31',1),(11,'3700929317101','HR1:FILET DE POULET AU CITRON','\"Menu Hr1 ROBERTA Entrée : Cappuccino de carottes infusées à la sauge et\r\nnuage de ricotta Plat : Filet de poulet au citron, sauce potiron à la marjolaine et\r\npâtes radiatori aux pleurotes Fromage : Mozzarella di Bufala D.O.P. Dessert :\r\nTarte \"\"al cioccolato al latte\"\"\r\nCe plateau est livré avec : Un pain Bleu-blanc-coeur Un verre et un kit de\r\ncouverts\"',24.5,10,'/tmp/phpAt216y','f61141774597e798222b5e52f44d7800b6bd8afc.jpg','2016-10-12 15:22:02','2016-10-12 15:22:02',1),(12,'3700929317201','HR2:BOEUF CUISSON DOUCE','\"Menu Hr2 ROBERTA Entrée: Gratin de pâtes maccheroni à la tomate et au\r\nbasilic Plat : Boeuf cuisson douce, caponata et concassée d\'oignons Borettane\r\nFromage: Gorgonzola D.O.P. Dessert: Comme \"\"una torta al limone\"\"\r\nCe plateau est livré avec : Un pain Bleu-blanc-coeur Un verre et un kit de\r\ncouverts\"',26.5,10,'/tmp/phpoYXi3o','17bc2108cc900407906ec5cc7eeed367fc250a1f.jpg','2016-10-12 15:22:43','2016-10-12 15:22:43',1),(13,'3700929317301','HR4:PAVE DE SAUMON ROTI','\"Menu Hr4 ROBERTA Entrée: Flan au potiron et gorgonzola D.O.P. Plat : Pavé\r\nde saumon rôti, polenta aux olives et sauce aux câpres Fromage: Mozzarella di\r\nBufala D.O.P. Dessert: Minestrone de \"\"frutta\"\"\r\nCe plateau est livré avec : Un pain Bleu-blanc-coeur Un verre et un kit de\r\ncouverts\"',28.9,10,'/tmp/phpF8XOu1','a1c1efbf41506e7e0b11f40152137c63ef036455.jpg','2016-10-12 15:23:18','2016-10-12 15:23:18',1),(14,'3700929317401','PAIN AUX CEREALES','PAIN',0.8,5.5,'/tmp/phpM35HDQ','c702885602c7d5312c94412f822d090f953aa9e4.jpg','2016-10-12 15:24:26','2016-10-12 15:24:26',10),(15,'3700929317601','EVIAN 50CL','EAU',2.5,5.5,'/tmp/phpTIAgPC','84d3555db5c335887ee1824f6507c7010c880918.jpg','2016-10-12 15:25:58','2016-10-12 15:25:58',100),(16,'3700929317801','COCA COLA 33CL','COCA COLA',2,10,'/tmp/phpjWAbg3','d63e7290575cc07178f7335fab93e06a246ab79f.jpg','2016-10-12 15:26:26','2016-10-12 15:26:26',100);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-13 19:52:26
