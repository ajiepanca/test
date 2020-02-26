# Host: LOCALHOST  (Version 5.5.5-10.4.6-MariaDB)
# Date: 2020-02-12 17:05:55
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "calas"
#

DROP TABLE IF EXISTS `calas`;
CREATE TABLE `calas` (
  `nim` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenkel` enum('LAKI LAKI','PEREMPUAN') DEFAULT NULL,
  `peminatan` varchar(100) DEFAULT '',
  `alamat` varchar(50) DEFAULT NULL,
  `agama` enum('ISLAM','BUDDHA','KRISTEN','HINDU','KATOLIK','KONGHUCU') DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "calas"
#

INSERT INTO `calas` VALUES ('1911501266','nisrina cantik','PEREMPUAN','NETWORKING, PROGRAMMING','ciledug','ISLAM','nisrinajelek123@gmail.com'),('1911501268','muhamad ajie panca kurniawan','LAKI LAKI','NETWORKING, PROGRAMMING','london. gerendeng','ISLAM','ajiepanca123@gmail.com');
