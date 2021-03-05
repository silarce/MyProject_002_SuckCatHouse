-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: suckcathouse
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Current Database: `suckcathouse`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `suckcathouse` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `suckcathouse`;

--
-- Table structure for table `cats`
--

DROP TABLE IF EXISTS `cats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cats` (
  `catID` int(50) NOT NULL AUTO_INCREMENT,
  `catName` varchar(100) DEFAULT NULL,
  `breed` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `furColor` varchar(50) DEFAULT NULL,
  `pawColor` varchar(50) DEFAULT NULL,
  `catDesc` varchar(2000) DEFAULT NULL,
  `coverImgPath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cats`
--

LOCK TABLES `cats` WRITE;
/*!40000 ALTER TABLE `cats` DISABLE KEYS */;
INSERT INTO `cats` VALUES (1,'Aurora','布偶貓','母','冷豔灰<br>淡奶油黃<br>吹雪白','薔薇粉','Aurora was born on October 25th 2013. She live\'s in Stockholm, the capital of Sweden, together with her human mother and father and kitty brother Prince Phillip','./img/theCats/Aurora/Aurora_001.jpg'),(2,'Grumpy','米克斯','母','不爽棕<br>不爽白','不爽黑','我很不爽','./img/theCats/Grumpy/Grumpy_008.jpg'),(3,'Nala','虎斑暹羅貓','母','呆萌灰','可愛黑','The story of one kitten, Nala, starts off at a home where the owners could no longer take care of the cats and kittens because there were too many. Nala was then taken away to the shelter where she was separated from her original family. Sadly we don’t know what happened to the rest of the cats or kittens, but when adopted, Nala was the only one left.','./img/theCats/Nala/Nala_004.jpg'),(4,'Hosico','蘇格蘭貓','公','棉花糖橘','幸福粉','Hosico is a gold scottish cat, boy. He was born on August 4, 2014 in Russia. ‘Hosico’ translated from Japanese means ‘star child’. His ascent to success in Instagram he began from his childhood, when he was a little kitten. Now he is admired by people from all over the world.','./img/theCats/Hosico/Hosico_002.jpg'),(5,'Messi','美洲貓','公','黏人橘','大大黑','Месси настоящий друг! И поможет, и поддержит, и поговорит😁❤️ . Messi is a true friend! And help, and support, and talk😁❤️','./img/theCats/Messi/Messi_004.jpg'),(6,'Venus','米克斯','母','對稱黑<br>對稱橘','點點黑<br>點點粉','Venus the Two Face Cat. 0% Photoshopped, 100% Born This Way!','./img/theCats/Venus/Venus_011.jpg');
/*!40000 ALTER TABLE `cats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `pw` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (2,'blackdarkwitch@gmail.com','darkdarkdark','黑暗女巫','0487654321','沉默小鎮領主的房子'),(7,'test2@gmail.com','test2','測試先生2','gk4g42u04cj84-4',''),(8,'tester3@gmail.com','tester3','tester3','0012345678','tester center'),(9,'cat@gmail.com','cat','cat','12345678','沉默小鎮貓窩'),(10,'dog@gmail.com','$2y$10$AlnYOdNfUzN5HssFQ96myeWP5gyD4SRKHsW6jbyHc7Gfi85ObfIpq','dog','dog','dog'),(11,'bigcentersky@gmail.com','$2y$10$mVf9wgq2Gyfn4cGsq2BNLedMoNq2e71yq06fLEeF1imdWh.gpuOOa','大中天','0012345678','沉默小鎮比較大的門');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `memberID` int(11) NOT NULL,
  `recipient` varchar(100) DEFAULT NULL,
  `reTel` varchar(100) DEFAULT NULL,
  `reAddress` varchar(100) DEFAULT NULL,
  `orderInfo` varchar(5000) NOT NULL,
  `payable` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `caceClosed` varchar(10) DEFAULT 'FALSE',
  PRIMARY KEY (`orderID`),
  KEY `memberID` (`memberID`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `members` (`memberID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,2,'黑暗女巫','0487654321','沉默小鎮領主的房子','','','','FALSE'),(2,2,'暗女巫','0444556677','沉默小鎮更暗的屋子','測試','測試','','FALSE'),(3,2,'暗女巫','0444556677','沉默小鎮更暗的屋子','測試','測試','黑暗女巫','FALSE'),(4,11,'大中天','0012345678','沉默小鎮比較大的門','{\"3\":\"{\"productID\":\"3\",\"price\":\"1500\",\"quantity\":\"3\",\"subtotal\":4500}\",\"1\":\"{\"productID\":\"1\",\"price\":\"1000\",\"quantity\":\"4\",\"subtotal\":4000}\",\"6\":\"{\"productID\":\"6\",\"price\":\"2500\",\"quantity\":\"1\",\"subtotal\":2500}\",\"4\":\"{\"productID\":\"4\",\"price\":\"1000\",\"quantity\":\"8\",\"subtotal\":8000}\"}','19000','大中天','FALSE'),(5,11,'大中天','0012345678','沉默小鎮比較大的門','','','大中天','FALSE'),(6,11,'大中天','0012345678','沉默小鎮比較大的門','','','大中天','FALSE'),(7,11,'大中天','0012345678','沉默小鎮比較大的門','','','大中天','FALSE'),(8,11,'大中天','0012345678','沉默小鎮比較大的門','','','大中天','FALSE'),(9,11,'鎖鏈妮娜','77889966','就在公園的盪鞦韆','{\"4\":\"{\"productID\":\"4\",\"price\":\"1000\",\"quantity\":\"2\",\"subtotal\":2000}\",\"3\":\"{\"productID\":\"3\",\"price\":\"1500\",\"quantity\":\"3\",\"subtotal\":4500}\"}','6500','大中天','FALSE'),(10,11,'薩奇斯','12345885','沉默小鎮廣場','{\"1\":\"{\"productID\":\"1\",\"price\":\"1000\",\"quantity\":\"3\",\"subtotal\":3000}\"}','3000','大中天','FALSE'),(11,11,'大中天','0012345678','沉默小鎮比較大的門','{\"2\":\"{\"productID\":\"2\",\"price\":\"1500\",\"quantity\":\"3\",\"subtotal\":4500}\"}','4500','大中天','FALSE'),(12,11,'大中天','0012345678','沉默小鎮比較大的門','{\"4\":\"{\"productID\":\"4\",\"price\":\"1000\",\"quantity\":\"1\",\"subtotal\":1000}\"}','1000','大中天','FALSE'),(13,11,'TEST','0012345678','沉默小鎮比較大的門','{\"2\":\"{\"productID\":\"2\",\"price\":\"1500\",\"quantity\":\"3\",\"subtotal\":4500}\"}','4500','大中天','FALSE'),(14,11,'呼呼呼','0012345678','沉默小鎮比較大的門','{\"1\":\"{\"productID\":\"1\",\"price\":\"1000\",\"quantity\":\"1\",\"subtotal\":1000}\"}','1000','大中天','FALSE');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `pNum` varchar(100) DEFAULT NULL,
  `pName` varchar(100) DEFAULT NULL,
  `pDesc` varchar(100) DEFAULT NULL,
  `actor` varchar(100) DEFAULT NULL,
  `sup` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `imgPath` varchar(255) DEFAULT NULL,
  `imgSamplePath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'NYAN-004','特選乱れ猫撫で狂い弐拾連発','SONイチオシの猫シリ－ズ初の一般向けリリースされたこの１本を見ないで何を見る？\r\nそれぞれ毛色の違う猫たちのしなやかにくねる体は必見！','素猫多数','SoftNyanko','1000','./img/SoftNyanko/cover/NYAN-004.jpg','./img/SoftNyanko/cover_sample/s_NYAN-004.jpg'),(2,'NYAN-005',' 	\r\nろり＆ぷちNONSTOPやり放題２４時間','ろり～た＆ぷちにゃんたちの比類なき乱れっぷりをご堪能あれ！\r\n齧られて爪を立てられ、抱き締めて…！\r\n幼い魅力満載の子の１本！！','仔にゃんこたち','SoftNyanko','1500','./img/SoftNyanko/cover/NYAN-005.jpg','./img/SoftNyanko/cover_sample/s_NYAN-005.jpg'),(3,'NYAN-006','ザ・肉球','肉球フェチ垂涎のこの１本！\r\n家猫の柔らかい肉球、外猫の硬い肉球…！！\r\n色とりどりの肉球の森へようこそ！','匿名肉球','SoftNyanko','1500','./img/SoftNyanko/cover/NYAN-006.jpg','./img/SoftNyanko/cover_sample/s_NYAN-006.jpg'),(4,'NYAN-007','媚態箱入猫','気付くとそこに収まる猫。\r\n狭苦しく、息苦しいそれをあえて楽しむ！\r\nもう、箱無しでは生きていけない…！快楽を忘れられない猫たちのあられもない姿をあなたに！！','箱猫多数','SoftNyanko','1000','./img/SoftNyanko/cover/NYAN-007.jpg','./img/SoftNyanko/cover_sample/s_NYAN-007.jpg'),(5,'NYAN-008','ねこすぷれっ仔大集合♥','猫は猫らしく！\r\nだけど、あなたにだけこっそり見せてあげる…！\r\nキュートな姿があなたを捕らえて離さない！！\r\nでも！\r\n嫌がる仔に無理矢理するのは虐待です。\r\nOK仔にだけしましょうね。','ねこすぷれっ仔多数','SoftNyanko','1000','./img/SoftNyanko/cover/NYAN-008.jpg','./img/SoftNyanko/cover_sample/s_NYAN-008.jpg'),(6,'NYAN-009','魅惑の夫人　やよい','魅惑のまなざし、そそるその体…！\r\nやよい様の全てを詰め込んだこの１本！！\r\n高貴な香りを漂わせて、いま、あなたの前に。','やよい夫人','SoftNyanko','2500','./img/SoftNyanko/cover/NYAN-009.jpg','./img/SoftNyanko/cover_sample/s_NYAN-009.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `revID` int(11) NOT NULL AUTO_INCREMENT,
  `catID` int(50) NOT NULL,
  `service` varchar(50) DEFAULT NULL,
  `ps` varchar(1000) DEFAULT NULL,
  `memberID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`revID`),
  KEY `catID` (`catID`),
  KEY `memberID` (`memberID`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `cats` (`catID`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `members` (`memberID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (1,2,NULL,NULL,7,'黑暗女巫'),(6,1,'吸貓','請告訴我們您有多愛吸貓',2,'大中天'),(7,1,'吸貓','第三次測試',2,'2'),(8,1,'吸貓','第四次',2,'黑暗女巫'),(10,5,'肉球踏踏','第五次',7,'測試先生2'),(11,4,'肉球踏踏','第六次測試',7,'測試先生2');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tteesstt`
--

DROP TABLE IF EXISTS `tteesstt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tteesstt` (
  `tteessttID` int(11) NOT NULL AUTO_INCREMENT,
  `memberID` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tteessttID`),
  KEY `memberID` (`memberID`),
  CONSTRAINT `tteesstt_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `members` (`memberID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tteesstt`
--

LOCK TABLES `tteesstt` WRITE;
/*!40000 ALTER TABLE `tteesstt` DISABLE KEYS */;
/*!40000 ALTER TABLE `tteesstt` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-05  0:11:35
