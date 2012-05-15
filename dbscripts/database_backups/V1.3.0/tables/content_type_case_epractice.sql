
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
DROP TABLE IF EXISTS `content_type_case_epractice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content_type_case_epractice` (
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `nid` int(10) unsigned NOT NULL DEFAULT '0',
  `field_acronym_value` longtext,
  `field_presentation_url_url` varchar(2048) DEFAULT NULL,
  `field_presentation_url_title` varchar(255) DEFAULT NULL,
  `field_presentation_url_attributes` mediumtext,
  `field_website_url_url` varchar(2048) DEFAULT NULL,
  `field_website_url_title` varchar(255) DEFAULT NULL,
  `field_website_url_attributes` mediumtext,
  `field_city_region_value` longtext,
  `field_start_end_date_value` varchar(20) DEFAULT NULL,
  `field_start_end_date_value2` varchar(20) DEFAULT NULL,
  `field_operational_date_value` varchar(20) DEFAULT NULL,
  `field_policy_context_value` longtext,
  `field_target_users_value` longtext,
  `field_desc_target_users_groups_value` longtext,
  `field_desc_implementation_value` longtext,
  `field_tech_solution_value` longtext,
  `field_main_results_value` longtext,
  `field_roi_desc_value` longtext,
  `field_track_record_sharing_value` longtext,
  `field_lessons_learnt_value` longtext,
  `field_case_logo_fid` int(11) DEFAULT NULL,
  `field_case_logo_list` tinyint(4) DEFAULT NULL,
  `field_case_logo_data` text,
  PRIMARY KEY (`vid`),
  KEY `nid` (`nid`)
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

