
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
DROP TABLE IF EXISTS `mailhandler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mailhandler` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `port` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `security` tinyint(3) unsigned NOT NULL,
  `replies` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `fromheader` varchar(128) DEFAULT NULL,
  `commands` text,
  `sigseparator` varchar(128) DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT NULL,
  `folder` varchar(255) NOT NULL,
  `imap` tinyint(3) unsigned NOT NULL,
  `mime` varchar(128) DEFAULT NULL,
  `mailto` varchar(255) NOT NULL,
  `delete_after_read` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `extraimap` varchar(255) NOT NULL,
  `format` int(11) NOT NULL DEFAULT '0',
  `authentication` varchar(255) NOT NULL DEFAULT 'mailhandler_default',
  PRIMARY KEY (`mid`),
  KEY `mail` (`mail`)
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

