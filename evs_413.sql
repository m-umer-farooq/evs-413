/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - evs_413
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`evs_413` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `evs_413`;

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `order_detail` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `orders` */

insert  into `orders`(`id`,`user_id`,`order_detail`,`created_date`) values 
(2,3,'some detail','2023-02-18 16:09:39'),
(3,3,'some detail 3','2023-02-18 16:11:52');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `username` varchar(16) DEFAULT NULL,
  `email` varchar(31) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`username`,`email`,`password`,`is_active`,`created_date`) values 
(1,'Umer','Farooq Butt','umer','umer.pucit@gmail.com','7c222fb2927d828af22f592134e8932480637c0d','1','2023-02-12 15:15:52'),
(3,'Khubaib','Butt','khubaib','khubaib@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','1','2023-02-12 15:44:53');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
