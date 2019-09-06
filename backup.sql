/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 8.0.17 : Database - minispotify
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`minispotify` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `minispotify`;

/*Table structure for table `canciones` */

DROP TABLE IF EXISTS `canciones`;

CREATE TABLE `canciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) DEFAULT NULL,
  `album` varchar(50) DEFAULT NULL,
  `compositor` varchar(50) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

/*Data for the table `canciones` */

insert  into `canciones`(`id`,`url`,`album`,`compositor`,`titulo`) values 
(17,'benny-hill.mp3','The Show','Boots Radolph','Benny Hill'),
(18,'braveheart.mp3','Digimon','Ayumi Miyazaki','Brave Heart'),
(19,'doper.mp3','Circus Doop','Doop','Doper than Dope'),
(20,'equipoA.mp3','El Equipo A','Mike Post','The A-Team'),
(21,'guile-theme-snes.mp3','Street Fighter','Yoko Shimomura','Guile Theme SNES'),
(22,'indiana.mp3','Indiana Jones','John Williams','Indiana Jones Intro'),
(23,'mariachis.mp3','Mariachis','Jesús González Rubio','El Jarabe Tapatío'),
(24,'pokemon_tr_motto.mp3','Pokemon anime','Shinji Miyazaki','Lema Team Rocket'),
(25,'rocky.mp3','Rocky','Bill Conti','Rocky'),
(26,'spanish-flea.mp3','Spanish Flea','Julius Wechter','Spanish Flea'),
(27,'two-steps-from-hell-black-blade.mp3','Two Steps from Hell','Thomas J. Bergersen','Black Blade'),
(28,'two-steps-from-hell-heart-of-courage.mp3','Two Steps from Hell','Thomas J. Bergersen','Heart of Courage'),
(29,'two-steps-from-hell-invincible-invincible.mp3','Two Steps from Hell','Thomas J. Bergersen','Invincible'),
(30,'two-steps-from-hell-norwegian-pirate.mp3','Two Steps from Hell','Thomas J. Bergersen','Norwegian Pirate'),
(31,'two-steps-from-hell-protectors-of-the-earth.mp3','Two Steps from Hell','Thomas J. Bergersen','Protectors of the Earth'),
(32,'two-steps-from-hell-victory.mp3','Two Steps from Hell','Thomas J. Bergersen','Victory'),
(33,'imperial-march.mp3','Star Wars','John Williams','Imperial March'),
(34,'battle-of-the-heroes.mp3','Star Wars','John Williams','Obi-Wan VS Anakin'),
(35,'duel-of-fates.mp3','Star Wars','John Williams','Darth Maul'),
(36,'cataclysm-orgrimmar.mp3','World of Warcraft WoW','David Arkenstone','Orgrimmar Cataclysm'),
(37,'deepholm-cataclysm-music.mp3','World of Warcraft WoW','David Arkenstone','Deepholm'),
(38,'ragnaros-molten-core.mp3','World of Warcraft WoW','Rusell Brower','Ragnaros Molten Core'),
(39,'gomu-is-ineffective.mp3','One Piece Anime','Tanaka Kouhei','Gomu Gomu Ineffective'),
(40,'black-beard-theme.mp3','One Piece Anime','Tanaka Kouhei','Blackbeard'),
(41,'starcraft-terran.mp3','Starcraft II','Rusell Brower','Stracraft II Terran'),
(42,'antecamara.mp3','World of Warcraft WoW','Rusell Brower','Ulduar Antecamara'),
(43,'dark_hyrule_castle.mp3','Zelda: The Minish Cap','Mitsuhiko Takano','Dark Hyrule Castle'),
(44,'hyrule.mp3','Zelda: The Minish Cap','Ryo Nagamatsu','Hyrule Overworld'),
(45,'Ice_Fortress.mp3','World of Warcraft WoW','Rusell Brower','Icecrown Citadel'),
(46,'lorule.mp3','Zelda: Link','Ryo Nagamatsu','Lorule Overworld'),
(47,'magmoor.mp3','Metroid Prime','Kenji Yamamoto','Magmoor'),
(48,'overworld.mp3','Super Mario','Koji Kondo','Super Mario Main'),
(49,'pirates.mp3','Metroid Prime','Kenji Yamamoto','Space Pirates'),
(50,'poseidon.mp3','God of War III','Ron Fish','Poseidon'),
(51,'sindragosa.mp3','World of Warcraft WoW','Rusell Brower','Sindragosa'),
(52,'sparta.mp3','God of War III','Ron Fish','Rage of Sparta'),
(53,'zeus.mp3','God of War III','Ron Fish','Zeus Boss Battle');

/*Table structure for table `listas` */

DROP TABLE IF EXISTS `listas`;

CREATE TABLE `listas` (
  `id_lista` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lista`),
  KEY `usuario_lista` (`id_usuario`),
  CONSTRAINT `usuario_lista` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `listas` */

insert  into `listas`(`id_lista`,`nombre`,`id_usuario`) values 
(1,'Lista 1',1),
(2,'MiPrimeraLista',2),
(3,'listaprueba',3),
(4,'Lista con botón',NULL),
(5,'Lista 2',NULL),
(6,'Lista 3',NULL);

/*Table structure for table `listas_canciones` */

DROP TABLE IF EXISTS `listas_canciones`;

CREATE TABLE `listas_canciones` (
  `id_lista` int(11) NOT NULL,
  `id_cancion` int(11) NOT NULL,
  PRIMARY KEY (`id_lista`,`id_cancion`),
  KEY `canciones_lista` (`id_cancion`,`id_lista`),
  CONSTRAINT `canciones_lista` FOREIGN KEY (`id_cancion`) REFERENCES `canciones` (`id`),
  CONSTRAINT `lista_canciones` FOREIGN KEY (`id_lista`) REFERENCES `listas` (`id_lista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `listas_canciones` */

insert  into `listas_canciones`(`id_lista`,`id_cancion`) values 
(1,18),
(2,17);

/*Table structure for table `listas_usuarios` */

DROP TABLE IF EXISTS `listas_usuarios`;

CREATE TABLE `listas_usuarios` (
  `lista_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `like` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`lista_id`,`usuario_id`),
  KEY `usuario_cancion` (`usuario_id`),
  CONSTRAINT `usuario_cancion` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `listas_usuarios` */

insert  into `listas_usuarios`(`lista_id`,`usuario_id`,`like`) values 
(17,1,0),
(17,2,NULL),
(18,1,NULL),
(25,2,NULL);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `roles` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`usuario`,`password`,`roles`) values 
(1,'Prueba','111','[]'),
(2,'1111','$argon2id$v=19$m=65536,t=4,p=1$SGJLQ1J1RjE5QVdLLjFnYw$HrPyjELQVukF3ThQJE1LL8K4Cprn40S6ZrGaPT9F17E','[]'),
(3,'1234','$argon2id$v=19$m=65536,t=4,p=1$U0JrV0VWZk5pV2h6NGd6dg$e7028EDtZRsUm/YD/Bl/m09n1AlVmRKs5q3/RjHcxuo','[]'),
(4,'2222','$argon2id$v=19$m=65536,t=4,p=1$R1lmWGF1TVpuL2JVN3lwRQ$7HmyMBqKGD50wXN/gA5bBiEpabza2Ls8E4E0PfRChlY','[]'),
(5,'usuarioprueba','$argon2id$v=19$m=65536,t=4,p=1$QTUzVzRXMUVxUWJwek82YQ$Chhwl1FgLKwncdSUmLJfez+4wgVYHFySAOk9tWRiOVQ','[]');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
