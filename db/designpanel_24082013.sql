-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.28-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table designpanel.tbl_projects
CREATE TABLE IF NOT EXISTS `tbl_projects` (
  `project_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(500) DEFAULT NULL,
  `project_description` varchar(1000) DEFAULT NULL,
  `project_status` int(1) DEFAULT NULL,
  `project_date` datetime DEFAULT NULL,
  `project_update` datetime DEFAULT NULL,
  `project_delete_date` datetime DEFAULT NULL,
  `project_createdby` int(10) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table designpanel.tbl_projects: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_projects` DISABLE KEYS */;
REPLACE INTO `tbl_projects` (`project_id`, `project_name`, `project_description`, `project_status`, `project_date`, `project_update`, `project_delete_date`, `project_createdby`) VALUES
	(1, 'Sample', 'This is just a test', 0, NULL, NULL, NULL, NULL),
	(2, 'Govind', 'Patil', 0, NULL, NULL, NULL, NULL),
	(3, 'Testing', 'Testing', 0, NULL, NULL, NULL, NULL),
	(4, 'Testing', 'Testing', 0, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tbl_projects` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
