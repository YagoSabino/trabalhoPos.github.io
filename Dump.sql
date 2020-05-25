-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.10


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema loja
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ loja;
USE loja;

--
-- Table structure for table `loja`.`carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE `carrinho` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(11) NOT NULL,
  `dataCompra` date DEFAULT NULL,
  `codCliente` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codCliente` (`codCliente`),
  CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loja`.`carrinho`
--

/*!40000 ALTER TABLE `carrinho` DISABLE KEYS */;
INSERT INTO `carrinho` (`codigo`,`estado`,`dataCompra`,`codCliente`) VALUES 
 (1,1,NULL,18),
 (2,1,NULL,18),
 (3,2,NULL,19),
 (4,2,NULL,19),
 (5,2,'2020-05-23',19),
 (6,2,'2020-05-23',19),
 (8,2,'2020-05-23',18),
 (12,2,'2020-05-23',19),
 (13,2,'2020-05-23',19),
 (14,2,'2020-05-23',27);
/*!40000 ALTER TABLE `carrinho` ENABLE KEYS */;


--
-- Table structure for table `loja`.`categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loja`.`categoria`
--

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`codigo`,`categoria`,`descricao`) VALUES 
 (1,'Equipamentos','Equipamentos de Treino'),
 (2,'Suplementos','Suplementos NUtricionais e de Treino'),
 (3,'Moda Fitness','Moda Fitness de Ginastica e Musculação');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


--
-- Table structure for table `loja`.`cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loja`.`cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`codigo`,`nome`,`endereco`,`login`,`senha`) VALUES 
 (18,'yago sabino vieira','rua x, n 88, bairro tal','yago','1234'),
 (19,'teste cliente ','rua x, n 88, bairro tal','teste','1234'),
 (20,'teste nome de usuario','teste','teste123',''),
 (21,'teste nome de usuario','teste','teste123',''),
 (22,'testette','13123123','yago2','12345'),
 (23,'testette','13123123','yago2','12345'),
 (24,'testette','13123123','yago2',''),
 (25,'novo usuario','tstet','novo','123'),
 (26,'TESTE','YRYRRY','yago2','12345'),
 (27,'yan sabino vieira','Rua Kuarue, 104, rendenção','yanzinho','12345');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Table structure for table `loja`.`itemcarrinho`
--

DROP TABLE IF EXISTS `itemcarrinho`;
CREATE TABLE `itemcarrinho` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codProduto` int(11) NOT NULL,
  `codCarrinho` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codProduto` (`codProduto`),
  KEY `codCarrinho` (`codCarrinho`),
  CONSTRAINT `itemcarrinho_ibfk_1` FOREIGN KEY (`codProduto`) REFERENCES `produto` (`codigo`),
  CONSTRAINT `itemcarrinho_ibfk_2` FOREIGN KEY (`codCarrinho`) REFERENCES `carrinho` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loja`.`itemcarrinho`
--

/*!40000 ALTER TABLE `itemcarrinho` DISABLE KEYS */;
INSERT INTO `itemcarrinho` (`codigo`,`codProduto`,`codCarrinho`,`quantidade`) VALUES 
 (1,1,4,1),
 (2,1,5,1),
 (3,2,5,1),
 (4,1,6,1),
 (5,2,8,1),
 (6,6,8,1),
 (7,6,12,1),
 (8,3,13,1),
 (9,1,14,1),
 (10,7,14,1);
/*!40000 ALTER TABLE `itemcarrinho` ENABLE KEYS */;


--
-- Table structure for table `loja`.`produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `valor` double NOT NULL,
  `codcategoria` int(11) NOT NULL,
  `urlImagem` varchar(500) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codcategoria` (`codcategoria`),
  CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`codcategoria`) REFERENCES `categoria` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loja`.`produto`
--

/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`codigo`,`nome`,`valor`,`codcategoria`,`urlImagem`,`descricao`) VALUES 
 (1,'Halter de 5kg',50,1,'img1','Descrição teste'),
 (2,'Halter de 10kg',55,1,'img2','Descrição teste'),
 (3,'Halter de 15kg',60,1,'img3','Descrição teste'),
 (4,'Whey Protein Concentrado',110,2,'img4','Descrição teste'),
 (5,'Albumina Hidrolisada',70,2,'img5','Descrição teste'),
 (6,'Calça Leggin Preta 38',45,3,'img6','Descrição teste'),
 (7,'Regata Cavada G',25,3,'img7','Descrição teste');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
