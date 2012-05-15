
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
DROP TABLE IF EXISTS `heartbeat_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `heartbeat_activity` (
  `uaid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `uid_target` int(10) unsigned DEFAULT '0',
  `nid` int(10) unsigned DEFAULT NULL,
  `nid_target` int(10) unsigned DEFAULT NULL,
  `access` tinyint(4) NOT NULL DEFAULT '0',
  `message_id` varchar(250) DEFAULT '',
  `message` longtext NOT NULL,
  `message_concat` longtext NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `language` varchar(12) DEFAULT 'en',
  `nid_info` varchar(128) DEFAULT '',
  `nid_target_info` varchar(128) DEFAULT '',
  `uaid_comments` int(10) unsigned DEFAULT '0',
  `variables` longtext,
  PRIMARY KEY (`uaid`),
  KEY `timestamp` (`timestamp`),
  KEY `uid` (`uid`),
  KEY `message_id` (`message_id`),
  KEY `uid_target` (`uid_target`),
  KEY `nid` (`nid`),
  KEY `nid_target` (`nid_target`),
  KEY `language` (`language`)
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

