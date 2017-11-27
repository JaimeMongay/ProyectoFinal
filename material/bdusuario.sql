/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : reservas

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-05-09 21:34:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Estado` int(1) NOT NULL DEFAULT '1',
  `FchAlta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FchModificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Deleted` int(1) NOT NULL DEFAULT '1',
  `Nivel` int(11) DEFAULT '1',
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('28', 'Jaime Mongay', 'jaimeju10@gmail.com', '$2y$07$KsjhvH69zP1r7t06pzXph.0HakuMAx6oENEr6bZv.eFxHI9RUqfGe', '1', '2017-05-02 17:59:42', '2017-05-02 17:59:42', '1', '1');
INSERT INTO `usuario` VALUES ('29', 'jose', 'jose@gmail.com', '$2y$07$KsjhvH69zP1r7t06pzXph.aGoLZR9HDl1vf.AMly15Opqh05GyACC', '1', '2017-05-02 18:03:34', '2017-05-02 18:03:34', '1', '1');
INSERT INTO `usuario` VALUES ('30', 'elena', 'elena@gmail.com', '$2y$07$KsjhvH69zP1r7t06pzXph.AMMdPfg1ZV7p37iqtsWdX5ZPMcqe24a', '1', '2017-05-04 13:24:41', '2017-05-04 13:24:41', '1', '1');
