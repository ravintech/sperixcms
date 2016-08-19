-- MySQL dump 10.13  Distrib 5.6.30, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: geotech
-- ------------------------------------------------------
-- Server version	5.6.30-1

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
-- Current Database: `geotech`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `geotech` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `geotech`;

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `message` text,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about`
--

LOCK TABLES `about` WRITE;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` VALUES (1,'About ggs','Ghana National Association of Adventist Students',1);
/*!40000 ALTER TABLE `about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobileNo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('Justice Owusu Agyemang','jayluxferro','91b507ee40d10b82518e0683969dbe60','justiceowusuagyemang@gmail.com','0501371810'),('Dr Frederick Owusu-Nimo','admin','21232f297a57a5a743894a0e4a801fc3','frednimo@gmail.com','0543333174');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `message` text,
  `status` int(1) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
INSERT INTO `announcements` VALUES (1,'AYGEC 2016','5th African Young Geotechnical Engineering Conference in Ghana<br/><b>Date:</b> 10th-12th August, 2016',1,NULL);
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `message` text,
  `link` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Hackathon 2017','2016-08-16-07-50-20.png','hackathon 2017',' ',1,NULL);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aygecmembers`
--

DROP TABLE IF EXISTS `aygecmembers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aygecmembers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `onames` varchar(200) DEFAULT NULL,
  `nationalsociety` varchar(500) DEFAULT NULL,
  `institution` varchar(200) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `address` text,
  `city` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `mobileNo` varchar(100) DEFAULT NULL,
  `emailAddr` varchar(200) DEFAULT NULL,
  `travel` varchar(10) DEFAULT NULL,
  `arrivaltime` varchar(200) DEFAULT NULL,
  `departuretime` varchar(200) DEFAULT NULL,
  `accommodation` varchar(100) DEFAULT NULL,
  `presenting` varchar(5) DEFAULT NULL,
  `tour1` int(1) DEFAULT NULL,
  `tour2` int(1) DEFAULT NULL,
  `need` text,
  `regDate` varchar(100) DEFAULT NULL,
  `eCode` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aygecmembers`
--

LOCK TABLES `aygecmembers` WRITE;
/*!40000 ALTER TABLE `aygecmembers` DISABLE KEYS */;
/*!40000 ALTER TABLE `aygecmembers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imgname` varchar(100) DEFAULT NULL,
  `info` varchar(500) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (5,'2016-05-29-06-40-28.jpg','AYGEC 2016','?news&id=1',1),(6,'2016-05-29-06-41-04.jpg','AYGEC 2016','?news&id=1',1),(7,'2016-05-29-06-41-25.jpg','AYGEC 2016','?news&id=1',1),(8,'2016-05-29-07-07-01.jpg','AYGEC 2016','?news&id=1',1);
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `briefcontent`
--

DROP TABLE IF EXISTS `briefcontent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `briefcontent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `message` text,
  `link` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `briefcontent`
--

LOCK TABLES `briefcontent` WRITE;
/*!40000 ALTER TABLE `briefcontent` DISABLE KEYS */;
INSERT INTO `briefcontent` VALUES (1,'5TH AFRICAN YOUNG GEOTECHNICAL ENGINEERING CONFERENCE IN GHANA','aygec2016.png','<p><span style=\"font-size: 15px; color: #7a1e21; font-weight: bold;\"><u style=\"font-size: 15px; color: #7a1e21; font-weight: bold;\">BACKGROUND:</u></span> The Young Geotechnical Conference has been widely accepted as an important event by Geotechnical Societies to promote geotechnical engineering among the younger generation. One of the objectives is to encourage the younger generation of geotechnical practitioners to carry forward the aims and ideals of ISSMGE. Africa has great need to develop new infrastructure and also to maintain existing ones to support its development. Most countries in Africa including Ghana are undergoing rapid economic growth. This development comes with the construction of heavier structures such as high-rise buildings and flyovers to accommodate increased loads, but also it comes with the need to use challenging soils and geologic materials to construct more roads into rural communities to evacuate agricultural produce. These developments pose challenges that require well-equipped geotechnical engineers. Capacity building among the young generation of geotechnical engineers in Ghana in particular and Africa in general is therefore required to address these challenges. In addition, young African geotechnical engineers need to cooperate among themselves and to learn from experienced engineers in order to be able to address current and future challenges in geotechnical engineering.</p><br>','?news&id=1',1);
/*!40000 ALTER TABLE `briefcontent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar`
--

LOCK TABLES `calendar` WRITE;
/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
INSERT INTO `calendar` VALUES (1,'Conference Begins','2016-08-09','?news&id=1',1);
/*!40000 ALTER TABLE `calendar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat` (
  `username` varchar(100) DEFAULT NULL,
  `message` text,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES ('drjay','AYGEC 2016','2016-04-29 09:38:00'),('drjay','AYGEC 2016','2016-04-29 10:07:00'),('drjay','AYGEC 2016','2016-04-29 10:12:00'),('drjay','AYGEC 2016','2016-04-29 10:13:00');
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conferencefees`
--

DROP TABLE IF EXISTS `conferencefees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conferencefees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conferencefees`
--

LOCK TABLES `conferencefees` WRITE;
/*!40000 ALTER TABLE `conferencefees` DISABLE KEYS */;
/*!40000 ALTER TABLE `conferencefees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuration`
--

DROP TABLE IF EXISTS `configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marquee` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuration`
--

LOCK TABLES `configuration` WRITE;
/*!40000 ALTER TABLE `configuration` DISABLE KEYS */;
INSERT INTO `configuration` VALUES (1,'Welcome...GHANA NATIONAL ASSOCIATION OF ADVENTIST STUDENTS-KNUST BRANCH(GNAAS-KNUST)');
/*!40000 ALTER TABLE `configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `message` text,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'contact us','<h4>Address:</h4><p><br></p>',1);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dollar`
--

DROP TABLE IF EXISTS `dollar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dollar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dollar`
--

LOCK TABLES `dollar` WRITE;
/*!40000 ALTER TABLE `dollar` DISABLE KEYS */;
/*!40000 ALTER TABLE `dollar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downloads`
--

LOCK TABLES `downloads` WRITE;
/*!40000 ALTER TABLE `downloads` DISABLE KEYS */;
INSERT INTO `downloads` VALUES (2,'5AYGEC',1);
/*!40000 ALTER TABLE `downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downloadslist`
--

DROP TABLE IF EXISTS `downloadslist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downloadslist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(500) DEFAULT NULL,
  `filename` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downloadslist`
--

LOCK TABLES `downloadslist` WRITE;
/*!40000 ALTER TABLE `downloadslist` DISABLE KEYS */;
/*!40000 ALTER TABLE `downloadslist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `featurednews`
--

DROP TABLE IF EXISTS `featurednews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `featurednews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(500) DEFAULT NULL,
  `source` text,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `featurednews`
--

LOCK TABLES `featurednews` WRITE;
/*!40000 ALTER TABLE `featurednews` DISABLE KEYS */;
INSERT INTO `featurednews` VALUES (2,'KNUST','<!-- start feedwind code --><script type=\"text/javascript\">document.write(\'\\x3Cscript type=\"text/javascript\" src=\"\' + (\'https:\' == document.location.protocol ? \'https://\' : \'http://\') + \'feed.mikle.com/js/rssmikle.js\">\\x3C/script>\');</script><script type=\"text/javascript\">(function() {var params = {rssmikle_url: \"http://knust.edu.gh/\",rssmikle_frame_width: \"400\",rssmikle_frame_height: \"300\",frame_height_by_article: \"0\",rssmikle_target: \"_blank\",rssmikle_font: \"Arial, Helvetica, sans-serif\",rssmikle_font_size: \"12\",rssmikle_border: \"on\",responsive: \"on\",rssmikle_css_url: \"\",text_align: \"left\",text_align2: \"left\",corner: \"off\",scrollbar: \"on\",autoscroll: \"on\",scrolldirection: \"up\",scrollstep: \"3\",mcspeed: \"20\",sort: \"Off\",rssmikle_title: \"on\",rssmikle_title_sentence: \"\",rssmikle_title_link: \"\",rssmikle_title_bgcolor: \"#035888\",rssmikle_title_color: \"#FFFFFF\",rssmikle_title_bgimage: \"\",rssmikle_item_bgcolor: \"#FFFFFF\",rssmikle_item_bgimage: \"\",rssmikle_item_title_length: \"55\",rssmikle_item_title_color: \"#035888\",rssmikle_item_border_bottom: \"on\",rssmikle_item_description: \"on\",item_link: \"off\",rssmikle_item_description_length: \"150\",rssmikle_item_description_color: \"#666666\",rssmikle_item_date: \"gl1\",rssmikle_timezone: \"Etc/GMT\",datetime_format: \"%b %e, %Y %l:%M %p\",item_description_style: \"text+tn\",item_thumbnail: \"full\",item_thumbnail_selection: \"auto\",article_num: \"15\",rssmikle_item_podcast: \"off\",keyword_inc: \"\",keyword_exc: \"\"};feedwind_show_widget_iframe(params);})();</script><div style=\"font-size:10px; text-align:center; width:300px;\"><a href=\"\" target=\"_blank\" style=\"color:#CCCCCC;\"></a><!--Please display the above link in your web page according to Terms of Service.--></div><!--  end  feedwind code -->',1);
/*!40000 ALTER TABLE `featurednews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (2,'AYGEC2016',1);
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallerylist`
--

DROP TABLE IF EXISTS `gallerylist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallerylist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallerylist`
--

LOCK TABLES `gallerylist` WRITE;
/*!40000 ALTER TABLE `gallerylist` DISABLE KEYS */;
INSERT INTO `gallerylist` VALUES (3,'AYGEC2016','2016-08-16-06-11-39.png','AYGEC 2016',1);
/*!40000 ALTER TABLE `gallerylist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Male'),(2,'Female'),(3,'Firm');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `glyphicon`
--

DROP TABLE IF EXISTS `glyphicon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `glyphicon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `glyphicon`
--

LOCK TABLES `glyphicon` WRITE;
/*!40000 ALTER TABLE `glyphicon` DISABLE KEYS */;
INSERT INTO `glyphicon` VALUES (1,'home'),(2,'info-sign'),(3,'user'),(4,'pencil'),(5,'log-in'),(6,'envelope'),(7,'picture'),(8,'facetime-video'),(9,'download'),(10,'earphone'),(11,'asterisk'),(12,'plus'),(13,'euro'),(14,'minus'),(15,'cloud'),(16,'envelope'),(17,'glass'),(18,'music'),(19,'search'),(20,'heart'),(21,'star'),(22,'star-empty'),(23,'film'),(24,'th'),(25,'th-large'),(26,'ok'),(27,'remove'),(28,'zoom-in'),(29,'zoom-out'),(30,'off'),(31,'signal'),(32,'briefcase'),(33,'cog'),(34,'trash'),(35,'file'),(36,'time'),(37,'road'),(38,'download-alt'),(39,'upload'),(40,'inbox'),(41,'play-circle'),(42,'repeat'),(43,'refresh'),(44,'list-alt'),(45,'lock'),(46,'flag'),(47,'headphones'),(48,'volume-off'),(49,'volume-down'),(50,'qrcode'),(51,'barcode'),(52,'tag'),(53,'tags'),(54,'book'),(55,'bookmark'),(56,'print'),(57,'camera'),(58,'font'),(59,'bold'),(60,'italic'),(61,'text-height'),(62,'text-width'),(63,'align-left'),(64,'align-right'),(65,'align-justify'),(66,'list'),(67,'indent-left'),(68,'indent-right'),(69,'map-marker'),(70,'adjust'),(71,'tint'),(72,'edit'),(73,'share'),(74,'check'),(75,'move'),(76,'step-backward'),(77,'fast-forward'),(78,'backward'),(79,'play'),(80,'pause'),(81,'stop'),(82,'forward'),(83,'fast-forward'),(84,'step-forward'),(85,'eject'),(86,'chevron-left'),(87,'chevron-right'),(88,'plus-sign'),(89,'minus-sign');
/*!40000 ALTER TABLE `glyphicon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gssmembership`
--

DROP TABLE IF EXISTS `gssmembership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gssmembership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `fullname` varchar(500) DEFAULT NULL,
  `membershiptype` varchar(100) DEFAULT NULL,
  `postaladdress` text,
  `mobileNo` varchar(50) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `employercompany` varchar(200) DEFAULT NULL,
  `employercompanyaddr` text,
  `university1` varchar(200) DEFAULT NULL,
  `u1yearcomp` varchar(100) DEFAULT NULL,
  `u1qualification` varchar(100) DEFAULT NULL,
  `university2` varchar(200) DEFAULT NULL,
  `u2yearcomp` varchar(100) DEFAULT NULL,
  `u2qualification` varchar(100) DEFAULT NULL,
  `university3` varchar(200) DEFAULT NULL,
  `u3yearcomp` varchar(100) DEFAULT NULL,
  `u3qualification` varchar(100) DEFAULT NULL,
  `workplace` varchar(500) DEFAULT NULL,
  `ghiemember` varchar(10) DEFAULT NULL,
  `ghieno` varchar(100) DEFAULT NULL,
  `datereg` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gssmembership`
--

LOCK TABLES `gssmembership` WRITE;
/*!40000 ALTER TABLE `gssmembership` DISABLE KEYS */;
INSERT INTO `gssmembership` VALUES (1,'jayluxferro','91b507ee40d10b82518e0683969dbe60','Justice Owusu Agyemang','1','KNUST','0501371810','justiceowusuagyemang@gmail.com','1','Ghanaian','Sperixlabs','SPERIXLABS','knust','2016','1','standford','2016','2','cambridge','2016','4','KNUST','1','Jay132434','2016-05-28 09:47:05');
/*!40000 ALTER TABLE `gssmembership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `happenings`
--

DROP TABLE IF EXISTS `happenings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `happenings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(500) DEFAULT NULL,
  `source` text,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `happenings`
--

LOCK TABLES `happenings` WRITE;
/*!40000 ALTER TABLE `happenings` DISABLE KEYS */;
INSERT INTO `happenings` VALUES (1,'KNUST','<!-- start feedwind code --><script type=\"text/javascript\">document.write(\'\\x3Cscript type=\"text/javascript\" src=\"\' + (\'https:\' == document.location.protocol ? \'https://\' : \'http://\') + \'feed.mikle.com/js/rssmikle.js\">\\x3C/script>\');</script><script type=\"text/javascript\">(function() {var params = {rssmikle_url: \"http://knust.edu.gh/\",rssmikle_frame_width: \"400\",rssmikle_frame_height: \"300\",frame_height_by_article: \"0\",rssmikle_target: \"_blank\",rssmikle_font: \"Arial, Helvetica, sans-serif\",rssmikle_font_size: \"12\",rssmikle_border: \"on\",responsive: \"on\",rssmikle_css_url: \"\",text_align: \"left\",text_align2: \"left\",corner: \"off\",scrollbar: \"on\",autoscroll: \"on\",scrolldirection: \"up\",scrollstep: \"3\",mcspeed: \"20\",sort: \"Off\",rssmikle_title: \"on\",rssmikle_title_sentence: \"\",rssmikle_title_link: \"\",rssmikle_title_bgcolor: \"#035888\",rssmikle_title_color: \"#FFFFFF\",rssmikle_title_bgimage: \"\",rssmikle_item_bgcolor: \"#FFFFFF\",rssmikle_item_bgimage: \"\",rssmikle_item_title_length: \"55\",rssmikle_item_title_color: \"#035888\",rssmikle_item_border_bottom: \"on\",rssmikle_item_description: \"on\",item_link: \"off\",rssmikle_item_description_length: \"150\",rssmikle_item_description_color: \"#666666\",rssmikle_item_date: \"gl1\",rssmikle_timezone: \"Etc/GMT\",datetime_format: \"%b %e, %Y %l:%M %p\",item_description_style: \"text+tn\",item_thumbnail: \"full\",item_thumbnail_selection: \"auto\",article_num: \"15\",rssmikle_item_podcast: \"off\",keyword_inc: \"\",keyword_exc: \"\"};feedwind_show_widget_iframe(params);})();</script><div style=\"font-size:10px; text-align:center; width:300px;\"><a href=\"\" target=\"_blank\" style=\"color:#CCCCCC;\"></a><!--Please display the above link in your web page according to Terms of Service.--></div><!--  end  feedwind code -->',1);
/*!40000 ALTER TABLE `happenings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `night` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` VALUES (1,'Royal Larmeta Hotel','$','75'),(2,'Sir Max Hotel','$','80'),(3,'Banni Villa Hotel','&cent;','80'),(4,'International Student Hostel','&cent;','30');
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lastlogin`
--

DROP TABLE IF EXISTS `lastlogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lastlogin` (
  `username` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lastlogin`
--

LOCK TABLES `lastlogin` WRITE;
/*!40000 ALTER TABLE `lastlogin` DISABLE KEYS */;
INSERT INTO `lastlogin` VALUES ('jayluxferro','127.0.0.1','2016-04-29 04:41:36'),('jayluxferro','127.0.0.1','2016-04-29 10:04:05'),('jayluxferro','127.0.0.1','2016-04-29 10:37:03'),('jayluxferro','127.0.0.1','2016-04-29 10:40:26'),('jayluxferro','127.0.0.1','2016-04-30 12:51:58'),('jayluxferro','127.0.0.1','2016-04-30 03:30:15'),('jayluxferro','127.0.0.1','2016-04-30 03:46:28'),('jayluxferro','127.0.0.1','2016-04-30 03:56:33'),('jayluxferro','127.0.0.1','2016-04-30 08:32:01'),('jayluxferro','127.0.0.1','2016-04-30 06:30:43'),('jayluxferro','127.0.0.1','2016-05-01 04:18:16'),('jayluxferro','127.0.0.1','2016-05-01 04:43:57'),('jayluxferro','127.0.0.1','2016-05-01 06:12:21'),('jayluxferro','127.0.0.1','2016-05-01 07:11:42'),('jayluxferro','127.0.0.1','2016-05-01 07:14:51'),('jayluxferro','127.0.0.1','2016-05-01 07:36:33'),('admin','127.0.0.1','2016-05-01 10:39:29'),('admin','127.0.0.1','2016-05-01 10:51:09'),('admin','127.0.0.1','2016-05-02 01:32:09'),('jayluxferro','127.0.0.1','2016-05-02 05:26:40'),('admin','127.0.0.1','2016-05-02 05:28:39'),('admin','127.0.0.1','2016-05-03 12:50:10'),('admin','127.0.0.1','2016-05-03 02:15:42'),('admin','127.0.0.1','2016-05-03 02:23:44'),('admin','127.0.0.1','2016-05-03 08:20:56'),('admin','127.0.0.1','2016-05-03 12:46:32'),('admin','127.0.0.1','2016-05-03 09:57:18'),('admin','127.0.0.1','2016-05-05 11:17:40'),('admin','127.0.0.1','2016-05-05 11:19:01'),('admin','127.0.0.1','2016-05-06 01:14:51'),('admin','127.0.0.1','2016-05-06 11:46:35'),('admin','127.0.0.1','2016-05-07 09:46:51'),('admin','127.0.0.1','2016-05-07 10:02:46'),('admin','127.0.0.1','2016-05-09 06:24:20'),('admin','127.0.0.1','2016-05-12 08:12:04'),('admin','127.0.0.1','2016-05-14 12:21:02'),('admin','127.0.0.1','2016-05-14 07:26:34'),('admin','127.0.0.1','2016-05-18 07:51:24'),('admin','127.0.0.1','2016-05-22 02:12:55'),('admin','127.0.0.1','2016-05-22 08:12:50'),('admin','127.0.0.1','2016-05-23 02:51:25'),('admin','127.0.0.1','2016-05-25 06:41:09'),('admin','127.0.0.1','2016-05-25 06:12:06'),('admin','127.0.0.1','2016-05-26 12:09:31'),('admin','127.0.0.1','2016-05-27 05:41:35'),('admin','127.0.0.1','2016-05-28 12:45:38'),('admin','127.0.0.1','2016-05-28 10:20:33'),('jayluxferro','127.0.0.1','2016-05-28 10:13:55'),('admin','127.0.0.1','2016-05-28 10:52:31'),('admin','127.0.0.1','2016-05-28 10:53:32'),('jayluxferro','127.0.0.1','2016-05-28 10:54:24'),('jayluxferro','127.0.0.1','2016-05-28 10:54:32'),('admin','127.0.0.1','2016-05-28 10:56:53'),('jayluxferro','127.0.0.1','2016-05-28 10:58:12'),('admin','127.0.0.1','2016-05-28 11:03:25'),('jayluxferro','127.0.0.1','2016-05-28 11:04:52'),('jayluxferro','127.0.0.1','2016-05-28 11:19:10'),('admin','127.0.0.1','2016-05-28 11:21:02'),('admin','127.0.0.1','2016-05-28 11:24:18'),('admin','127.0.0.1','2016-05-29 06:32:13'),('jayluxferro','127.0.0.1','2016-05-31 12:10:25'),('admin','127.0.0.1','2016-05-31 12:11:00'),('admin','127.0.0.1','2016-05-31 03:49:38'),('jayluxferro','127.0.0.1','2016-06-18 10:52:19'),('jayluxferro','127.0.0.1','2016-06-20 10:18:41'),('jayluxferro','127.0.0.1','2016-06-21 02:09:22'),('jayluxferro','127.0.0.1','2016-06-26 04:42:00'),('jayluxferro','127.0.0.1','2016-06-26 04:48:55'),('jayluxferro','127.0.0.1','2016-06-29 01:33:33'),('jayluxferro','::1','2016-07-07 03:02:45'),('jayluxferro','127.0.0.1','2016-07-09 12:03:32'),('jayluxferro','127.0.0.1','2016-07-09 12:14:31'),('jayluxferro','127.0.0.1','2016-07-09 12:23:35'),('jayluxferro','127.0.0.1','2016-07-09 12:30:23'),('jayluxferro','127.0.0.1','2016-07-09 12:31:35'),('jayluxferro','127.0.0.1','2016-07-13 05:05:44'),('jayluxferro','127.0.0.1','2016-08-05 08:57:45'),('jayluxferro','127.0.0.1','2016-08-07 06:13:54'),('jayluxferro','127.0.0.1','2016-08-07 06:15:37'),('jayluxferro','127.0.0.1','2016-08-08 05:58:14'),('jayluxferro','127.0.0.1','2016-08-08 06:05:08'),('jayluxferro','127.0.0.1','2016-08-11 12:53:32'),('admin','127.0.0.1','2016-08-11 01:05:12'),('admin','127.0.0.1','2016-08-12 04:28:55'),('jayluxferro','127.0.0.1','2016-08-14 07:26:34'),('admin','127.0.0.1','2016-08-16 01:23:05'),('admin','127.0.0.1','2016-08-16 06:21:18'),('admin','127.0.0.1','2016-08-17 07:29:55'),('admin','127.0.0.1','2016-08-17 12:18:53'),('jayluxferro','127.0.0.1','2016-08-17 04:19:21'),('drjay','127.0.0.1','2016-08-17 04:23:19'),('jayluxferro','127.0.0.1','2016-08-17 04:28:32'),('drjay','127.0.0.1','2016-08-17 04:30:51'),('jayluxferro','127.0.0.1','2016-08-17 04:55:59'),('jayluxferro','127.0.0.1','2016-08-17 11:56:05'),('jayluxferro','127.0.0.1','2016-08-18 12:05:10'),('jayluxferro','127.0.0.1','2016-08-18 12:56:00'),('jayluxferro','127.0.0.1','2016-08-18 02:08:00'),('admin','127.0.0.1','2016-08-18 02:10:57'),('admin','127.0.0.1','2016-08-18 02:13:43'),('admin','127.0.0.1','2016-08-18 02:25:12'),('jayluxferro','127.0.0.1','2016-08-18 02:38:43'),('jayluxferro','127.0.0.1','2016-08-18 04:59:03'),('jayluxferro','127.0.0.1','2016-08-19 01:18:51'),('jayluxferro','127.0.0.1','2016-08-19 02:00:36'),('jayluxferro','127.0.0.1','2016-08-19 02:09:34'),('admin','127.0.0.1','2016-08-19 02:30:34');
/*!40000 ALTER TABLE `lastlogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links` (
  `title` varchar(500) DEFAULT NULL,
  `source` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links`
--

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` VALUES ('5TH AFRICAN YOUNG GEOTECHNICAL ENGINEERING CONFERENCE IN GHANA','?news&id=1'),('AYGEC 2016 Registration','?register&aygec2016');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loggedIn`
--

DROP TABLE IF EXISTS `loggedIn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loggedIn` (
  `username` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loggedIn`
--

LOCK TABLES `loggedIn` WRITE;
/*!40000 ALTER TABLE `loggedIn` DISABLE KEYS */;
INSERT INTO `loggedIn` VALUES ('jayluxferro',0),('',0),('drjay',0);
/*!40000 ALTER TABLE `loggedIn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobileNo` varchar(100) DEFAULT NULL,
  `datereg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES ('Jay Lux Ferro','drjay','91b507ee40d10b82518e0683969dbe60','justiceowusuagyemang@gmail.com','0205737153','2016-04-29 09:32:00');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membershiptype`
--

DROP TABLE IF EXISTS `membershiptype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membershiptype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membershiptype`
--

LOCK TABLES `membershiptype` WRITE;
/*!40000 ALTER TABLE `membershiptype` DISABLE KEYS */;
INSERT INTO `membershiptype` VALUES (1,'Individual'),(2,'Students'),(3,'Firm');
/*!40000 ALTER TABLE `membershiptype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `glyphicon` varchar(100) DEFAULT NULL,
  `mydef` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'HOME','?home',1,'home',1),(2,'ABOUT US','?about',1,'info-sign',1),(3,'MEMBERSHIP','',1,'user',1),(4,'LATEST NEWS/EVENTS','?news',1,'envelope',1),(5,'RESOURCES','',1,'briefcase',1),(6,'CONTACT US','?contact',1,'earphone',1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `message` text,
  `link` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'5TH AFRICAN YOUNG GEOTECHNICAL ENGINEERING CONFERENCE IN GHANA','aygec2016.png','<p><span style=\"font-size: 15px; color: #7a1e21; font-weight: bold;\">BACKGROUND:</span> The Young Geotechnical Conference has been widely accepted as an important event by Geotechnical Societies to promote geotechnical engineering among the younger generation. One of the objectives is to encourage the younger generation of geotechnical practitioners to carry forward the aims and ideals of ISSMGE. Africa has great need to develop new infrastructure and also to maintain existing ones to support its development. Most countries in Africa including Ghana are undergoing rapid economic growth. This development comes with the construction of heavier structures such as high-rise buildings and flyovers to accommodate increased loads, but also it comes with the need to use challenging soils and geologic materials to construct more roads into rural communities to evacuate agricultural produce. These developments pose challenges that require well-equipped geotechnical engineers. Capacity building among the young generation of geotechnical engineers in Ghana in particular and Africa in general is therefore required to address these challenges. In addition, young African geotechnical engineers need to cooperate among themselves and to learn from experienced engineers in order to be able to address current and future challenges in geotechnical engineering.</p><br><p>This conference therefore seeks to bring together young geotechnical practitioners, researchers and academics from the region to share their work. The Ghana Geotechnical Society (GGS), which will host the event, strongly believes that this conference will create an increased awareness among young engineers in different parts of the continent, about the need to develop geotechnical engineering and also promote interest in the subject.</p><br><p>The Organizing Committee of the 5th African Young Geotechnical Engineering Conference (AYGEC 2016) kindly requests the African member Societies of ISSMGE to:</p><ul><li>display this \"5AYGEC Invitation\" in prominent places for all members to see,</li><li>become actively involved in the selection and nomination of young geotechnical engineers with good research projects to represent their societies at the 5th AYGEC 2016 and present their work.</li></ul><p></p><br><p><span style=\"color: #7a1e21; font-size: 15px; font-weight: bold;\">CONFERENCE OBJECTIVES:</span> Even though no specific theme is selected, the conference will seek to build the capacity of the participants and to initiate cooperation among young geotechnical engineers from different parts of Africa. In order to achieve these objectives, the conference will take advantage of the ISSMGE Board Meeting and the TC 107 Workshop scheduled at the same time, to receive input from some of the experienced engineers present. It will also provide opportunity for all participants to share their work in delegate papers and presentations.</p><br><p><span style=\"color: #7a1e21; font-weight: bold; font-size: 15px;\">VENUE:</span> The Conference will take place at the Kwame Nkrumah University of Science & Technology (KNUST) in Kumasi, Ghana. Ghana offers a very peaceful serene environment for the Conference. Kumasi is located about 280km from Accra the Capital City of Ghana. There are excellent bus and air links between Accra and Kumasi. By air, flight time is  25minutes.</p><br><p><span style=\"color: #7a1e21; font-weight: bold; font-size: 15px;\">SPONSORS:</span> The following are the institutions and organizations that have so far committed to support the Conference: </p><ul><li>ISSMGE</li><li>The Ghana Chapter of IGS</li><li>The Civil Engineering Department of KNUST</li><li>Ghana Institution of Engineers</li></ul><p></p><br><p><span style=\"color: #7a1e21; font-weight: bold; font-size: 15px;\">DATE:</span> The conference will be hosted from August 9th to August 13th 2016.</p><br><p><span style=\"color: #7a1e21; font-weight: bold; font-size: 15px;\">WHO CAN ATTEND THE CONFERENCE?</span> Delegates interested in attending the AYGEC should have attained the age of 35yrs or less at the time of the event. They are individuals expected from the industry, studying for their PhD or MSc including researchers. Interested participants outside of the African Region are also welcome.</p><br><p><span style=\"color: #7a1e21; font-weight: bold; font-size: 15px;\">CONFERENCE ACTIVITIES:</span> The main conference activities will include the following:</p><ul><li>Keynote lectures</li><li>Technical Presentations</li><li>Technical Field Trip</li><li>Site and Tourist visit</li><li>Social Engagement</li></ul><br>A parallel workshop on Laterites and Lateritic Soils will be organized by the Technical  Committee on Laterites and Lateritic Soils (TC 107). An ISSMGE Board meeting will also be held at the same time. This means that there will be many experienced geotechnical engineers and academics available to offer guidance to any of the young geotechnical engineers who will need it.<p></p><br><p><span style=\"font-size: 15px; color: #7a1e21; font-weight: bold;\">CONFERENCE SCHEDULE:</span> The schedule of activities can be downloaded here.</p><br><p><span style=\"font-size: 15px; color: #7a1e21; font-weight: bold;\">PAPERS AND PRESENTATIONS:</span> All delegates attending the conference are expected to produce a paper and make a 15-minute presentation on their paper. National Societies in the Region, and beyond, are therefore encouraged to send at least two (2) delegates to participate.  The Member Societies are responsible for the selection of the delegates, initial reviewing of the papers of delegates before submission to the organizing committee. Abstracts should not be more  than 250 words, written in 12 points Times Roman Font. Papers should be between 2 and 4 pages in length. Papers should cover the work of the delegate. Papers may be a description of construction project that the delegate has been involved in or a description of the delegate\'s research work either completed or in progress. A camera-ready version of the paper should be  submitted. Papers are preferred to have a single author who will attend 5th AYGEC as a delegate; any acknowledgement of supervisors, for example, should be included at the end of the paper.</p><br><p><span style=\"font-size: 15px; color: #7a1e21; font-weight: bold;\">TIMELINES:</span><br></p><table class=\"table table-bordered table-hover\"><tbody><tr><td>Receive Abstracts(LOC/National Society)</td><td> 1st June, 2016</td></tr><tr><td>Abstracts vetted(LOC/National Society)</td><td>30th June, 2016</td></tr><tr><td>Abstracts vetted by National Societies</td><td>30th April, 2016</td></tr><tr><td>Final list of Abstracts(LOC)</td><td>15th July, 2016</td></tr><tr><td>Conference</td><td>9th-13th August, 2016</td></tr></tbody></table><p></p><br><p><span style=\"color: #7a1e21; font-weight: bold; font-size: 15px;\">REGISTRATION ENTITLEMENTS:</span> <br></p><table class=\"table table-bordered table-hover\"><thead><tr><th>Category</th><th>Local</th><th>International</th></tr></thead><tbody><tr><td><b>Students</b></td><td>GHÂ¢ 300</td><td>$150</td></tr><tr><td><b>Non-Students</b></td><td>GHÂ¢ 550</td><td>$275</td></tr></tbody></table><p>Registration fee covers Attendance at all sessions, Welcome pack, Lunch, Refreshments during Conference and Conference dinner. </p><p></p><br><p><span style=\"color: #7a1e21; font-weight: bold; font-size: 15px;\">ACCOMMODATION:</span> Participants are requested to select from a number of designated Conference Hotels. A bus will be arranged to convey participants from the Hotels to the Conference Centre at the Distance Learning Centre on KNUST Campus</p><ul><li>Royal Lamerta hotel Conference Hotel: 3 star hotel, twin deluxe, executive rooms and suite, internet access, Restaurant, gym / massage swimming pool, 20 minutes from Conference Centre, $75/night</li><li>Sir Max hotel Conference Hotel Overflow, 3 star hotel, Restaurant, coffee shop, souvenir shop, internet access, swimming pool, 20 minutes from Conference Centre, US$80/night</li><li>Bani Villa Low Budget Hotel, Air-conditioned self-contained apartment with kitchenette, twin bed ,5 minutes from Conference Centre, GHÂ¢80/night</li><li>International Student Hostel Low Budget Accommodation, self-contained rooms, 5 minutes from Conference Centre, GHÂ¢30/night</li></ul><center><a href=\"#hotels\" data-toggle=\"modal\" class=\"btn btn-info btn-xs tooltip-bottom\" title=\"Click to view hotels\" style=\"margin-top: 25px; border-radius: 20px; -webkit-border-radius: 20px; -moz-border-radius: 20px;\"> View Hotels</a></center><p></p><br><p><span style=\"color: #7a1e21; font-weight: bold; font-size: 15px;\">TRANSPORTATION:</span> <br><span style=\"color: #000; font-weight: bold; font-size: 14px;\">By Bus:</span> </p><p>Participants can travel by private bus between Accra and Kumasi on the VIP Bus Service. It takes about 4 hours and costs Organizers will arrange for pick up from the airport to the VIP station in Accra and also from the VIP station in Kumasi to the Conference Hotel. If you wish to use this option please indicate as part of your registration. <b>Cost is $30 one way</b>.</p><br><span style=\"color: #000; font-weight: bold; font-size: 14px;\">By Air:</span><p>Participants can also travel from Accra to Kumasi by air using any of the two airlines (Africa World Airlines & Starbow). Organizers will arrange for pick up from Kumasi Airport to the Conference Hotel. Cost of airline ticket plus pick-up is <b>US$100 one way</b>.</p><p></p><br><p><span style=\"color: #7a1e21; font-weight: bold; font-size: 15px;\">POST CONFERENCE TOURS:</span> Participants should indicate which tour they wish to participate in. <br><br></p><h5><b>Tour 1: Friday 12th August 2016. Time:-14:00-18:00.</b></h5><b>Cost:</b> Free<br>Kumasi Cultural Museum:-Manhyia<br>Kente Village-Bonwire<br><br><h5><b>Tour 2: Saturday 13th August 2016: Time 08:00-14:00</b></h5><b>Cost(Local Participants):</b> Ghc360<br><b>Cost(International Participants):</b> $180<br><br><u>Cost includes:</u><br>Travel to Cape Coast, <br>Accommodation in Cape Coast<br>Tour of Cape Coast Castle, <br>Tour of Kakum National Park and Lunch<br>Return to Accra, 14:00<br><br><p></p><br><p><span style=\"color: #7a1e21; font-weight: bold; font-size: 15px;\">CONFERENCE ORGANIZATION:</span><br><span style=\"font-weight: bold; font-size: 13px; text-decoration: italics\">LOCAL ORGANIZING COMMITTEE:<br></span></p><ol><li>Ing. Prof. S.I.K. Ampadu, President, GGS, Conference Chair</li><li>Ing. Joseph Odei, Secretary, GGS</li><li>Ing. Kweku Solomon, GGS Treasurer</li><li>Dr. Frederick Owusu-Nimo, GGS</li><li>Mr. Felix Ayeh, GGS (PhD Student)</li><li>Ms. Priscilla Ackah, (MSc Student)</li><li>Mr. Augustine Lawer (PhD Student)</li></ol><br><span style=\"font-weight: bold; font-size: 13px; text-decoration: italics\">INTERNATIONAL ADVISORY COMMITTEE:</span><br><ol><li>Prof. Frank Roger, ISSMGE President</li><li>Prof. Fatma Baligh, ISSMGE, VP for Africa</li></ol> <p></p><br><p><span style=\"color: #7a1e21; font-weight: bold; font-size: 15px;\">CONTACT:</span></p><address>Ghana Geotechnical Society,<br>C/O Ghana Institution of Engineers,<br>P. O. Box AN 7042<br>Accra North<br>E-mail: <a href=\"mailto:5aygec16@gmail.com\">5aygec16@gmail.com</a></address><p></p><br>','',1,'2016-05-07 12:03:00');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passwdupate`
--

DROP TABLE IF EXISTS `passwdupate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passwdupate` (
  `username` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passwdupate`
--

LOCK TABLES `passwdupate` WRITE;
/*!40000 ALTER TABLE `passwdupate` DISABLE KEYS */;
INSERT INTO `passwdupate` VALUES ('jayluxferro','2016-05-01 07:14:42'),('jayluxferro','2016-05-01 07:35:37'),('admin','2016-05-01 10:51:00'),('admin','2016-05-03 02:21:49'),('admin','2016-05-05 11:18:57'),('jayluxferro','2016-07-09 12:30:20'),('jayluxferro','2016-08-07 06:15:34'),('jayluxferro','2016-08-18 12:05:04');
/*!40000 ALTER TABLE `passwdupate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `message` text,
  `link` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (1,'AYGEC 2016','2016-05-29-08-36-59.jpg','<h4><span style=\"font-size:16px;font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; line-height: 19.8px; text-align: -webkit-center;\">5TH AFRICAN YOUNG GEOTECHNICAL ENGINEERING CONFERENCE IN GHANA</span></h4>','?news&id=1',1);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualifications`
--

DROP TABLE IF EXISTS `qualifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualifications`
--

LOCK TABLES `qualifications` WRITE;
/*!40000 ALTER TABLE `qualifications` DISABLE KEYS */;
INSERT INTO `qualifications` VALUES (1,'BSc'),(2,'MSc'),(3,'MPhil'),(4,'PhD'),(5,'Prof');
/*!40000 ALTER TABLE `qualifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realtimechat`
--

DROP TABLE IF EXISTS `realtimechat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `realtimechat` (
  `username` varchar(100) DEFAULT NULL,
  `message` text,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realtimechat`
--

LOCK TABLES `realtimechat` WRITE;
/*!40000 ALTER TABLE `realtimechat` DISABLE KEYS */;
INSERT INTO `realtimechat` VALUES ('jayluxferro','I have a problem','2016-07-09 12:32:38');
/*!40000 ALTER TABLE `realtimechat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spotlight`
--

DROP TABLE IF EXISTS `spotlight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spotlight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `message` text,
  `link` varchar(500) DEFAULT NULL,
  `linkMsg` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spotlight`
--

LOCK TABLES `spotlight` WRITE;
/*!40000 ALTER TABLE `spotlight` DISABLE KEYS */;
INSERT INTO `spotlight` VALUES (1,'5th AYGEC','aygec2016.png','5TH AFRICAN YOUNG GEOTECHNICAL ENGINEERING CONFERENCE IN GHANA','?register&aygec2016','Register!!!',1);
/*!40000 ALTER TABLE `spotlight` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submenu`
--

DROP TABLE IF EXISTS `submenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `glyphicon` varchar(100) DEFAULT NULL,
  `mydef` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submenu`
--

LOCK TABLES `submenu` WRITE;
/*!40000 ALTER TABLE `submenu` DISABLE KEYS */;
INSERT INTO `submenu` VALUES (1,'Register','?register',3,1,'pencil',1),(2,'Log In','portal/',3,1,'log-in',1),(3,'Gallery','?gallery',5,1,'picture',1),(4,'Downloads','?downloads',5,1,'download',1),(5,'Videos','?videos',5,1,'facetime-video',1);
/*!40000 ALTER TABLE `submenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sysnotifications`
--

DROP TABLE IF EXISTS `sysnotifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sysnotifications` (
  `message` text,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sysnotifications`
--

LOCK TABLES `sysnotifications` WRITE;
/*!40000 ALTER TABLE `sysnotifications` DISABLE KEYS */;
INSERT INTO `sysnotifications` VALUES ('Server Up','2016-04-29 10:47:00');
/*!40000 ALTER TABLE `sysnotifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `titles`
--

DROP TABLE IF EXISTS `titles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `titles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `titles`
--

LOCK TABLES `titles` WRITE;
/*!40000 ALTER TABLE `titles` DISABLE KEYS */;
INSERT INTO `titles` VALUES (1,'Mr'),(2,'Miss'),(3,'Mrs'),(4,'Prof'),(5,'Dr');
/*!40000 ALTER TABLE `titles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (2,'5AYGEC',1);
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videoslist`
--

DROP TABLE IF EXISTS `videoslist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videoslist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(500) DEFAULT NULL,
  `source` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videoslist`
--

LOCK TABLES `videoslist` WRITE;
/*!40000 ALTER TABLE `videoslist` DISABLE KEYS */;
INSERT INTO `videoslist` VALUES (2,'5AYGEC','https://www.youtube.com/embed/uElPkghqoJw','<a href=\"https://spiderapps.net/geotech/\" style=\"color: rgb(0, 0, 0); text-decoration: none; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(245, 245, 245);\">What is Geotechnical Engineering?...Find out more....watch this video...</a>',1);
/*!40000 ALTER TABLE `videoslist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `world`
--

DROP TABLE IF EXISTS `world`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `world` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `video` varchar(500) DEFAULT NULL,
  `message` text,
  `link` varchar(500) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `world`
--

LOCK TABLES `world` WRITE;
/*!40000 ALTER TABLE `world` DISABLE KEYS */;
INSERT INTO `world` VALUES (1,'geotechnical','https://www.youtube.com/embed/uElPkghqoJw','What is Geotechnical Engineering?...Find out more....watch this video...','',1);
/*!40000 ALTER TABLE `world` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-19  4:01:32
