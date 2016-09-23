/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.21 : Database - tiketka
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tiketka` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tiketka`;

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `idKelas` int(3) NOT NULL AUTO_INCREMENT,
  `namaKelas` varchar(30) NOT NULL,
  `harga` int(12) NOT NULL,
  PRIMARY KEY (`idKelas`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`idKelas`,`namaKelas`,`harga`) values (4,'VIP',125000),(5,'Tribun Barat',75000),(6,'Tribun Timur',45000),(7,'Tribun Utara',20000),(8,'Tribun Selatan',20000);

/*Table structure for table `kereta` */

DROP TABLE IF EXISTS `kereta`;

CREATE TABLE `kereta` (
  `idKA` int(3) NOT NULL AUTO_INCREMENT,
  `namaKA` varchar(30) NOT NULL,
  `tanggalBerangkat` date NOT NULL,
  `tanggalTiba` date NOT NULL,
  `jamBerangkat` varchar(10) NOT NULL,
  `jamTiba` varchar(10) NOT NULL,
  `dari` varchar(30) NOT NULL,
  `ke` varchar(30) NOT NULL,
  `idKelas` int(3) NOT NULL,
  PRIMARY KEY (`idKA`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `kereta` */

insert  into `kereta`(`idKA`,`namaKA`,`tanggalBerangkat`,`tanggalTiba`,`jamBerangkat`,`jamTiba`,`dari`,`ke`,`idKelas`) values (5,'Persib vs Persija','2016-01-06','0000-00-00','15:10','17:00','','',4),(6,'Persib vs Persija','2016-01-06','0000-00-00','15:10','17:00','','',5),(7,'Persib vs Persija','2016-01-06','0000-00-00','15:10','17:00','','',6),(8,'Persib vs Persija','2016-01-06','0000-00-00','15:10','17:00','','',7),(9,'Persib vs Persija','2016-01-06','0000-00-00','15:10','17:00','','',8);

/*Table structure for table `pesan` */

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `idPesan` int(5) NOT NULL AUTO_INCREMENT,
  `namaPemesan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `dewasa` int(11) NOT NULL,
  `anak` int(11) NOT NULL,
  `idKA` int(3) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`idPesan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `pesan` */

insert  into `pesan`(`idPesan`,`namaPemesan`,`alamat`,`noTelp`,`dewasa`,`anak`,`idKA`,`status`) values (10,'Andika','Sumedang','085871572009',2,2,6,'Y'),(11,'Andika','Bandung','0227911836',1,2,8,'Y');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `iduser` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`iduser`,`username`,`pass`,`level`) values (1,'admin','admin123','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
