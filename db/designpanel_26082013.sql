-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.19 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-08-26 21:11:18
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for designpanel
DROP DATABASE IF EXISTS `designpanel`;
CREATE DATABASE IF NOT EXISTS `designpanel` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `designpanel`;


-- Dumping structure for table designpanel.tbl_admin_users
DROP TABLE IF EXISTS `tbl_admin_users`;
CREATE TABLE IF NOT EXISTS `tbl_admin_users` (
  `a_user_id` int(10) NOT NULL AUTO_INCREMENT,
  `a_user_name` varchar(50) DEFAULT NULL,
  `a_user_pass` varchar(50) DEFAULT NULL,
  `a_user_first_name` varchar(50) DEFAULT NULL,
  `a_user_last_name` varchar(50) DEFAULT NULL,
  `a_user_status` varchar(1) DEFAULT NULL,
  `a_user_add_date` datetime DEFAULT NULL,
  `a_user_edit_date` datetime DEFAULT NULL,
  `a_user_delete_date` datetime DEFAULT NULL,
  `a_user_added_by` int(10) DEFAULT NULL,
  `a_user_last_login_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`a_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='tables containing Admin Users info';

-- Dumping data for table designpanel.tbl_admin_users: ~1 rows (approximately)
DELETE FROM `tbl_admin_users`;
/*!40000 ALTER TABLE `tbl_admin_users` DISABLE KEYS */;
INSERT INTO `tbl_admin_users` (`a_user_id`, `a_user_name`, `a_user_pass`, `a_user_first_name`, `a_user_last_name`, `a_user_status`, `a_user_add_date`, `a_user_edit_date`, `a_user_delete_date`, `a_user_added_by`, `a_user_last_login_datetime`) VALUES
	(1, 'admin', 'admin', 'Govind', 'Patil', '1', '2013-08-26 03:36:21', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tbl_admin_users` ENABLE KEYS */;


-- Dumping structure for table designpanel.tbl_projects
DROP TABLE IF EXISTS `tbl_projects`;
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

-- Dumping data for table designpanel.tbl_projects: ~4 rows (approximately)
DELETE FROM `tbl_projects`;
/*!40000 ALTER TABLE `tbl_projects` DISABLE KEYS */;
INSERT INTO `tbl_projects` (`project_id`, `project_name`, `project_description`, `project_status`, `project_date`, `project_update`, `project_delete_date`, `project_createdby`) VALUES
	(1, 'Sample', 'This is just a test', 0, NULL, NULL, NULL, NULL),
	(2, 'Govind', 'Patil', 0, NULL, NULL, NULL, NULL),
	(3, 'Testing', 'Testing', 0, NULL, NULL, NULL, NULL),
	(4, 'Testing', 'Testing', 0, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tbl_projects` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
