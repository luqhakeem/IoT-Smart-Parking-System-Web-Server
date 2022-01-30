/*
MySQL Backup
Database: iot_parking
Backup Time: 2022-01-01 12:01:54
*/

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `iot_parking`.`parking`;
DROP TABLE IF EXISTS `iot_parking`.`payment`;
DROP TABLE IF EXISTS `iot_parking`.`record`;
DROP TABLE IF EXISTS `iot_parking`.`user`;
DROP TABLE IF EXISTS `iot_parking`.`vehicle`;
CREATE TABLE `parking` (
  `id` int NOT NULL,
  `lot` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isAvailable` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `payment` (
  `id` int NOT NULL,
  `recordID` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `payMethod` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `record` (
  `id` int NOT NULL,
  `userID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `parkID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `carID` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `time_in` int NOT NULL,
  `time_out` int DEFAULT NULL,
  `isPaid` enum('0','1') COLLATE utf8mb4_general_ci DEFAULT '0',
  `time_pay` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_num` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `vehicle` (
  `id` int NOT NULL,
  `userID` int NOT NULL,
  `numplate` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
BEGIN;
LOCK TABLES `iot_parking`.`parking` WRITE;
DELETE FROM `iot_parking`.`parking`;
INSERT INTO `iot_parking`.`parking` (`id`,`lot`,`level`,`isAvailable`) VALUES (1, '1', '1', '1'),(2, '2', '1', '1');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `iot_parking`.`payment` WRITE;
DELETE FROM `iot_parking`.`payment`;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `iot_parking`.`record` WRITE;
DELETE FROM `iot_parking`.`record`;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `iot_parking`.`user` WRITE;
DELETE FROM `iot_parking`.`user`;
INSERT INTO `iot_parking`.`user` (`id`,`username`,`email`,`fullname`,`password`,`phone_num`) VALUES (1, 'admin', 'admin@iotparking.my', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', '999'),(2, 'luqman', 'me@luqmanhakeem.my', 'Luqman Hakeem Mohamad Nor', '73ed16fbc87f023c2371b7383ed18f56', '0168937836');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `iot_parking`.`vehicle` WRITE;
DELETE FROM `iot_parking`.`vehicle`;
UNLOCK TABLES;
COMMIT;
