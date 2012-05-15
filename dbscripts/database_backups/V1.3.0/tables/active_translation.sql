
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
DROP TABLE IF EXISTS `active_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `active_translation` (
  `atid` int(10) unsigned NOT NULL,
  `bs` int(10) unsigned NOT NULL,
  `bg` int(10) unsigned NOT NULL,
  `hr` int(10) unsigned NOT NULL,
  `cs` int(10) unsigned NOT NULL,
  `da` int(10) unsigned NOT NULL,
  `nl` int(10) unsigned NOT NULL,
  `en` int(10) unsigned NOT NULL,
  `et` int(10) unsigned NOT NULL,
  `fi` int(10) unsigned NOT NULL,
  `fr` int(10) unsigned NOT NULL,
  `de` int(10) unsigned NOT NULL,
  `el` int(10) unsigned NOT NULL,
  `hu` int(10) unsigned NOT NULL,
  `ic` int(10) unsigned NOT NULL,
  `ga` int(10) unsigned NOT NULL,
  `it` int(10) unsigned NOT NULL,
  `lv` int(10) unsigned NOT NULL,
  `lt` int(10) unsigned NOT NULL,
  `mk` int(10) unsigned NOT NULL,
  `mt` int(10) unsigned NOT NULL,
  `nb` int(10) unsigned NOT NULL,
  `nn` int(10) unsigned NOT NULL,
  `ot` int(10) unsigned NOT NULL,
  `pl` int(10) unsigned NOT NULL,
  `ptpt` int(10) unsigned NOT NULL,
  `ro` int(10) unsigned NOT NULL,
  `sr` int(10) unsigned NOT NULL,
  `sk` int(10) unsigned NOT NULL,
  `sl` int(10) unsigned NOT NULL,
  `es` int(10) unsigned NOT NULL,
  `sv` int(10) unsigned NOT NULL,
  `tr` int(10) unsigned NOT NULL,
  PRIMARY KEY (`atid`),
  KEY `bs` (`bs`),
  KEY `bg` (`bg`),
  KEY `hr` (`hr`),
  KEY `cs` (`cs`),
  KEY `da` (`da`),
  KEY `nl` (`nl`),
  KEY `en` (`en`),
  KEY `et` (`et`),
  KEY `fi` (`fi`),
  KEY `fr` (`fr`),
  KEY `de` (`de`),
  KEY `el` (`el`),
  KEY `hu` (`hu`),
  KEY `ic` (`ic`),
  KEY `ga` (`ga`),
  KEY `it` (`it`),
  KEY `lv` (`lv`),
  KEY `lt` (`lt`),
  KEY `mk` (`mk`),
  KEY `mt` (`mt`),
  KEY `nb` (`nb`),
  KEY `nn` (`nn`),
  KEY `ot` (`ot`),
  KEY `pl` (`pl`),
  KEY `ptpt` (`ptpt`),
  KEY `ro` (`ro`),
  KEY `sr` (`sr`),
  KEY `sk` (`sk`),
  KEY `sl` (`sl`),
  KEY `es` (`es`),
  KEY `sv` (`sv`),
  KEY `tr` (`tr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

