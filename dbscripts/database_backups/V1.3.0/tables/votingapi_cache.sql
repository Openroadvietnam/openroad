
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
DROP TABLE IF EXISTS `votingapi_cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votingapi_cache` (
  `vote_cache_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_type` varchar(64) NOT NULL DEFAULT 'node',
  `content_id` int(10) unsigned NOT NULL DEFAULT '0',
  `value` float NOT NULL DEFAULT '0',
  `value_type` varchar(64) NOT NULL DEFAULT 'percent',
  `tag` varchar(64) NOT NULL DEFAULT 'vote',
  `function` varchar(64) NOT NULL DEFAULT '',
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vote_cache_id`),
  KEY `content` (`content_type`,`content_id`),
  KEY `content_function` (`content_type`,`content_id`,`function`),
  KEY `content_tag_func` (`content_type`,`content_id`,`tag`,`function`),
  KEY `content_vtype_tag` (`content_type`,`content_id`,`value_type`,`tag`),
  KEY `content_vtype_tag_func` (`content_type`,`content_id`,`value_type`,`tag`,`function`)
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

