-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-04-2019 a las 21:48:30
-- Versión del servidor: 10.1.38-MariaDB-cll-lve
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `serviceo_DONBOSCO`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crgdcnt`
--

CREATE TABLE `crgdcnt` (
  `CDCODIGO` int(11) UNSIGNED NOT NULL,
  `INDOCODIGO` int(11) UNSIGNED NOT NULL,
  `CARCODIGO` int(11) NOT NULL,
  `CDFECHAI` date DEFAULT NULL,
  `CDFECHAS` date DEFAULT NULL,
  `CDESTADO` int(2) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crrcnprcldtll`
--

CREATE TABLE `crrcnprcldtll` (
  `CRDTPRCODIGO` int(11) NOT NULL,
  `DTPRCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `PRCCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `DTQMCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `USUCODIGOACT` int(11) NOT NULL,
  `USUCODIGOMOD` int(11) NOT NULL,
  `DTPRTAREAS` double NOT NULL,
  `DTPRACTINDIV` double NOT NULL,
  `DTPRACTGRUPAL` double NOT NULL,
  `DTPRLECCIONES` double NOT NULL,
  `DTPRPRUEBA` double NOT NULL,
  `DTPRADICIONAL1` double NOT NULL,
  `DTPRADICIONAL2` double NOT NULL,
  `DTPRPROMEDIO1` double NOT NULL,
  `DTPRREFUERZO` double NOT NULL,
  `DTPRPROMEDIO` double NOT NULL,
  `MATCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `MATDESCRIPCION` varchar(50) DEFAULT NULL,
  `MATORDEN` int(10) UNSIGNED DEFAULT NULL,
  `MATTIPO` int(10) UNSIGNED DEFAULT NULL,
  `DTPRESTADO` int(11) NOT NULL,
  `PRCNOTA1` double NOT NULL,
  `PRCNOTA2` double NOT NULL,
  `PRCNOTA3` double NOT NULL,
  `PRCNOTA4` double NOT NULL,
  `PRCNOTA5` double NOT NULL,
  `PRCNOTA6` double NOT NULL,
  `PRCNOTA7` double NOT NULL,
  `PRCNOTA8` double NOT NULL,
  `PRCNOTA9` double NOT NULL,
  `PRCDESCA1` varchar(20) NOT NULL,
  `PRCDESCA2` varchar(20) NOT NULL,
  `PRCDESC1` varchar(20) NOT NULL,
  `PRCDESC2` varchar(20) NOT NULL,
  `PRCDESC3` varchar(20) NOT NULL,
  `PRCDESC4` varchar(20) NOT NULL,
  `PRCDESC5` varchar(20) NOT NULL,
  `PRCDESC6` varchar(20) NOT NULL,
  `PRCDESC7` varchar(20) NOT NULL,
  `PRCDESC8` varchar(20) NOT NULL,
  `PRCFECHA1` varchar(20) NOT NULL,
  `PRCFECHA2` varchar(20) NOT NULL,
  `PRCFECHA3` varchar(20) NOT NULL,
  `PRCFECHA4` varchar(20) NOT NULL,
  `PRCFECHA5` varchar(20) NOT NULL,
  `PRCFECHA6` varchar(20) NOT NULL,
  `PRCFECHA7` varchar(20) NOT NULL,
  `PRCFECHA8` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crrcnqmstrdtll`
--

CREATE TABLE `crrcnqmstrdtll` (
  `CRDTQMCODIGO` int(11) NOT NULL,
  `DTQMCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `USUCODIGO` int(11) NOT NULL,
  `USUCODIGOACT` int(11) NOT NULL,
  `QUICODIGO` int(10) UNSIGNED DEFAULT NULL,
  `MTRNO` int(10) UNSIGNED DEFAULT NULL,
  `MATCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `QUIPROMPARCIAL` double NOT NULL,
  `QUIEQUIVALENCIA80` double NOT NULL,
  `QUIEXAMEN` double NOT NULL,
  `QUIEQUIVALENCIA20` double NOT NULL,
  `QUIPROMQUIMESTRE` double NOT NULL,
  `MTRESTADO` int(10) UNSIGNED DEFAULT '1',
  `DTQMESTADO` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crs`
--

CREATE TABLE `crs` (
  `CURCODIGO` int(11) NOT NULL,
  `INSCODIGO` int(11) NOT NULL,
  `CURDESCRIPCION` varchar(30) NOT NULL,
  `CUROBSERVACION` text,
  `CURORDEN` int(11) DEFAULT NULL,
  `CURSIGLA` varchar(10) DEFAULT NULL,
  `CURESTADO` int(2) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dcntmtr`
--

CREATE TABLE `dcntmtr` (
  `DCMTCODIGO` int(10) UNSIGNED NOT NULL,
  `INDOCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `MATCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `FAMCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `DCMTESTADO` int(10) UNSIGNED DEFAULT NULL,
  `ANOCODIGO` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dtscdmcs`
--

CREATE TABLE `dtscdmcs` (
  `DARCODIGO` int(10) UNSIGNED NOT NULL,
  `PERCODIGO` int(11) NOT NULL,
  `DARFECHAING` datetime DEFAULT NULL,
  `DARINSTPROCED` varchar(200) DEFAULT NULL,
  `DARREPITE` varchar(5) DEFAULT NULL,
  `DARCURREP` varchar(200) DEFAULT NULL,
  `DARASIGPREF` varchar(200) DEFAULT NULL,
  `DARASIGDIFC` varchar(200) DEFAULT NULL,
  `DARDIGNIDAD` varchar(200) DEFAULT NULL,
  `DARLOGROS` varchar(200) DEFAULT NULL,
  `DARPARTIC` varchar(200) DEFAULT NULL,
  `DARCLUBES` varchar(200) DEFAULT NULL,
  `DAREXTRACU` varchar(200) DEFAULT NULL,
  `DAROBSERVACION` varchar(200) DEFAULT NULL,
  `DARPRODISC` varchar(3) DEFAULT NULL,
  `DARPDCAUSA` varchar(200) DEFAULT NULL,
  `DARPROAPROV` varchar(3) DEFAULT NULL,
  `DARPACAUSA` varchar(200) DEFAULT NULL,
  `DARPROASIS` varchar(3) DEFAULT NULL,
  `DARPASCAUSA` varchar(200) DEFAULT NULL,
  `DARCFEXONERA` varchar(3) DEFAULT NULL,
  `DARCFTIEMPO` int(10) UNSIGNED DEFAULT NULL,
  `DARCFCAUSA` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dtsdsld`
--

CREATE TABLE `dtsdsld` (
  `DDSCODIGO` int(10) UNSIGNED NOT NULL,
  `PERCODIGO` int(11) NOT NULL,
  `DDSDISCAPACIDAD` varchar(2) DEFAULT NULL,
  `DDSPORCENTAJE` double DEFAULT NULL,
  `DDSCARNE` varchar(20) DEFAULT NULL,
  `DDSDETALLE` varchar(200) DEFAULT NULL,
  `DDSCONDMED` varchar(2) DEFAULT NULL,
  `DDSCMDETALLE` varchar(200) DEFAULT NULL,
  `DDSMEDICAMENTOS` varchar(200) DEFAULT NULL,
  `DDSATENMEDICA` varchar(200) DEFAULT NULL,
  `DDSMEDICO` varchar(200) DEFAULT NULL,
  `DDSOBSERVACION` varchar(300) DEFAULT NULL,
  `DDSALERGIA` varchar(2) DEFAULT NULL,
  `DDSALEDETALLE` varchar(200) DEFAULT NULL,
  `DDDEFICIENCIA` varchar(50) DEFAULT NULL,
  `DDDEFCUAL` varchar(100) DEFAULT NULL,
  `DDCARACTEROL` varchar(100) DEFAULT NULL,
  `DDINTERESES` varchar(100) DEFAULT NULL,
  `DDAPTITUD` varchar(100) DEFAULT NULL,
  `DDVERVAL` varchar(100) DEFAULT NULL,
  `DDNUMERIA` varchar(100) DEFAULT NULL,
  `DDPSICOMOTR` varchar(100) DEFAULT NULL,
  `DDDESTREZA` varchar(100) DEFAULT NULL,
  `DDCONFLICTO` varchar(100) DEFAULT NULL,
  `DDOBSERVACION` varchar(200) DEFAULT NULL,
  `DDDIAGNOSTICO` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dtspstrl`
--

CREATE TABLE `dtspstrl` (
  `PASCODIGO` int(10) UNSIGNED NOT NULL,
  `PERCODIGO` int(11) DEFAULT NULL,
  `PASRELIGION` varchar(100) DEFAULT NULL,
  `PASPARROQUIA` varchar(100) DEFAULT NULL,
  `PASBAUTISMO` varchar(3) DEFAULT NULL,
  `PASCOMUNION` varchar(3) DEFAULT NULL,
  `PASCONFIRMACION` varchar(3) DEFAULT NULL,
  `PASBIBLIA` varchar(3) DEFAULT NULL,
  `PASOBSERV` varchar(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fml`
--

CREATE TABLE `fml` (
  `FAMCODIGO` int(11) UNSIGNED NOT NULL,
  `INSCODIGO` int(11) NOT NULL,
  `FAMNOMBRE` varchar(30) NOT NULL,
  `FAMNOCREDITO` int(11) UNSIGNED DEFAULT NULL,
  `FAMESTADO` int(2) UNSIGNED DEFAULT NULL,
  `FANSIGLAS` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grp`
--

CREATE TABLE `grp` (
  `GRUCODIGO` int(11) NOT NULL,
  `CURCODIGO` int(11) NOT NULL,
  `ESPCODIGO` int(11) NOT NULL,
  `ANOCODIGO` int(11) NOT NULL,
  `GRUNOPARTICIPANTE` int(4) UNSIGNED DEFAULT NULL,
  `GRUESTADO` int(2) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grpmtr`
--

CREATE TABLE `grpmtr` (
  `GMCODIGO` int(11) UNSIGNED NOT NULL,
  `MATCODIGO` int(11) NOT NULL,
  `GRUCODIGO` int(11) NOT NULL,
  `GMESTADO` int(2) UNSIGNED DEFAULT NULL,
  `GMPLANTILLA` int(1) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grpmtrdcnt`
--

CREATE TABLE `grpmtrdcnt` (
  `INDOCODIGO` int(11) UNSIGNED NOT NULL,
  `GRUCODIGO` int(11) NOT NULL,
  `MATCODIGO` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grpprll`
--

CREATE TABLE `grpprll` (
  `GRUCODIGO` int(11) NOT NULL,
  `PARCODIGO` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grpprllmtrdcnt`
--

CREATE TABLE `grpprllmtrdcnt` (
  `GMCODIGO` int(11) NOT NULL,
  `DCMTCODIGO` int(10) UNSIGNED NOT NULL,
  `PARCODIGO` int(11) NOT NULL,
  `GPMDESTADO` int(10) UNSIGNED DEFAULT NULL,
  `INDOCODIGO` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hstrvtl`
--

CREATE TABLE `hstrvtl` (
  `HVCODIGO` int(10) UNSIGNED NOT NULL,
  `PERCODIGO` int(11) NOT NULL,
  `HVEDADMADRE` int(10) UNSIGNED DEFAULT NULL,
  `HVACCIDENTE` varchar(200) DEFAULT NULL,
  `HVMEDICAMENTO` varchar(200) DEFAULT NULL,
  `HVTERMINO` varchar(20) DEFAULT NULL,
  `HVPREMATURO` varchar(20) DEFAULT NULL,
  `HVCESAREA` varchar(20) DEFAULT NULL,
  `HVNORMAL` varchar(20) DEFAULT NULL,
  `HVDIFICULTADES` varchar(200) DEFAULT NULL,
  `HVPESO` varchar(20) DEFAULT NULL,
  `HVTALLA` varchar(20) DEFAULT NULL,
  `HVCAMINAR` varchar(20) DEFAULT NULL,
  `HVHABLO` varchar(20) DEFAULT NULL,
  `HVLACTANCIA` varchar(20) DEFAULT NULL,
  `HVBIBERON` varchar(20) DEFAULT NULL,
  `HVESFINTER` varchar(20) DEFAULT NULL,
  `HVENFERMED` varchar(200) DEFAULT NULL,
  `HVACCIDENT` varchar(200) DEFAULT NULL,
  `HVALERGIAS` varchar(200) DEFAULT NULL,
  `HVCIRUGIAS` varchar(200) DEFAULT NULL,
  `HVPERDCONO` varchar(200) DEFAULT NULL,
  `HVOTROS` varchar(200) DEFAULT NULL,
  `HVOBESIDAD` varchar(5) DEFAULT NULL,
  `HVENFCAR` varchar(5) DEFAULT NULL,
  `HVHIPER` varchar(5) DEFAULT NULL,
  `HVDIABETES` varchar(5) DEFAULT NULL,
  `HVENFMEN` varchar(5) DEFAULT NULL,
  `HVOTRAENF` varchar(20) DEFAULT NULL,
  `HVPADRE` varchar(200) DEFAULT NULL,
  `HVMADRE` varchar(200) DEFAULT NULL,
  `HVHERMANO` varchar(200) DEFAULT NULL,
  `HVPARIENTES` varchar(200) DEFAULT NULL,
  `HVOBSERVACIONES` text,
  `HVCOSTHAB` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lcldd`
--

CREATE TABLE `lcldd` (
  `LOCCODIGO` int(10) UNSIGNED NOT NULL,
  `INSCODIGO` int(11) NOT NULL,
  `LOCNOMBRE` varchar(50) NOT NULL,
  `LOCSIGLAS` varchar(10) DEFAULT NULL,
  `LOCDIRECCION` varchar(50) DEFAULT NULL,
  `LOCTELEFONO` varchar(12) DEFAULT NULL,
  `LOCESTADO` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mtr`
--

CREATE TABLE `mtr` (
  `MATCODIGO` int(11) NOT NULL,
  `FAMCODIGO` int(11) UNSIGNED NOT NULL,
  `MATID` varchar(10) DEFAULT NULL,
  `MATDESCRIPCION` varchar(40) NOT NULL,
  `MATOBSERVACION` text,
  `MATNOCREDITO` int(3) DEFAULT NULL,
  `MATNOCONSECUTIVO` int(3) UNSIGNED DEFAULT NULL,
  `MATESTADO` int(2) UNSIGNED DEFAULT NULL,
  `MATTIPO` int(10) UNSIGNED DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mtrcl`
--

CREATE TABLE `mtrcl` (
  `MTRNO` int(10) UNSIGNED NOT NULL,
  `INESCODIGO` int(10) UNSIGNED NOT NULL,
  `GRUCODIGO` int(11) NOT NULL,
  `MTRID` varchar(20) DEFAULT NULL,
  `ANOCODIGO` int(11) DEFAULT NULL,
  `PARCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `MTRFOLIO` int(10) UNSIGNED DEFAULT NULL,
  `MTRFECHA` date DEFAULT NULL,
  `MTRFECHAEXT` varchar(50) DEFAULT NULL,
  `MTRESTADO` int(10) UNSIGNED DEFAULT '1',
  `MTRFECESTADO` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nlctv`
--

CREATE TABLE `nlctv` (
  `ANOCODIGO` int(11) NOT NULL,
  `INSCODIGO` int(11) NOT NULL,
  `ANODESCRIPCION` varchar(30) DEFAULT NULL,
  `ANOFECHAINICIAL` date DEFAULT NULL,
  `ANOFECHAFINAL` date DEFAULT NULL,
  `ANOOBSERVACION` text,
  `ANOESTADO` int(2) UNSIGNED DEFAULT NULL,
  `ANOINICIO` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nsttcn`
--

CREATE TABLE `nsttcn` (
  `INSCODIGO` int(11) NOT NULL,
  `INSID` varchar(20) DEFAULT NULL,
  `INSNOMBRE` varchar(100) NOT NULL,
  `INSDESCRIPCION` text,
  `INSOBSERVACION` text,
  `INSRUC` varchar(20) DEFAULT NULL,
  `INSDIRECCION` text,
  `INSTELEFONO1` varchar(12) DEFAULT NULL,
  `INSTELEFONO2` varchar(12) DEFAULT NULL,
  `INSFAX` varchar(12) DEFAULT NULL,
  `INSMOVIL` varchar(12) DEFAULT NULL,
  `INSESTADO` int(2) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nsttcndcnt`
--

CREATE TABLE `nsttcndcnt` (
  `INDOCODIGO` int(11) UNSIGNED NOT NULL,
  `PERCODIGO` int(11) NOT NULL,
  `INSCODIGO` int(11) NOT NULL,
  `INDOID` varchar(20) DEFAULT NULL,
  `INDOFECHAI` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nsttcnstdnt`
--

CREATE TABLE `nsttcnstdnt` (
  `INESCODIGO` int(10) UNSIGNED NOT NULL,
  `INSCODIGO` int(11) NOT NULL,
  `PERCODIGO` int(11) NOT NULL,
  `ANOCODIGO` int(11) DEFAULT NULL,
  `INESID` varchar(20) DEFAULT NULL,
  `INESFECHAI` datetime DEFAULT NULL,
  `INESESTADO` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nvlfrmcn`
--

CREATE TABLE `nvlfrmcn` (
  `NFCODIGO` int(11) UNSIGNED NOT NULL,
  `NFNOMBRE` varchar(30) NOT NULL,
  `NFVALOR` double DEFAULT NULL,
  `NFPUNTOS` int(3) UNSIGNED DEFAULT NULL,
  `NFORDEN` int(3) UNSIGNED DEFAULT NULL,
  `NFESTADO` int(2) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nvlfrmcndcnt`
--

CREATE TABLE `nvlfrmcndcnt` (
  `NFDCODIGO` int(11) UNSIGNED NOT NULL,
  `CDCODIGO` int(11) UNSIGNED NOT NULL,
  `NFCODIGO` int(11) UNSIGNED NOT NULL,
  `NFDFECHAI` date DEFAULT NULL,
  `NDFFECHAP` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prcl`
--

CREATE TABLE `prcl` (
  `PRCCODIGO` int(10) UNSIGNED NOT NULL,
  `QUICODIGO` int(10) UNSIGNED DEFAULT NULL,
  `PRCDESCRIPCION` varchar(50) DEFAULT NULL,
  `PRCORDEN` int(10) UNSIGNED DEFAULT NULL,
  `PRCFECHAI` datetime DEFAULT NULL,
  `PRCFECHAF` datetime DEFAULT NULL,
  `PRCSECCION` varchar(15) DEFAULT NULL,
  `PRCVERSION` int(2) NOT NULL,
  `PRCESTADO` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prcldtll`
--

CREATE TABLE `prcldtll` (
  `DTPRCODIGO` int(10) UNSIGNED NOT NULL,
  `PRCCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `DTQMCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `DTPRTAREAS` double NOT NULL,
  `DTPRACTINDIV` double NOT NULL,
  `DTPRACTGRUPAL` double NOT NULL,
  `DTPRLECCIONES` double NOT NULL,
  `DTPRPRUEBA` double NOT NULL,
  `DTPRADICIONAL1` double NOT NULL,
  `DTPRADICIONAL2` double NOT NULL,
  `DTPRPROMEDIO1` double NOT NULL,
  `DTPRREFUERZO` double NOT NULL,
  `DTPRPROMEDIO` double NOT NULL,
  `MATCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `MATDESCRIPCION` varchar(50) DEFAULT NULL,
  `MATORDEN` int(10) UNSIGNED DEFAULT NULL,
  `MATTIPO` int(10) UNSIGNED DEFAULT NULL,
  `DTPRESTADO` int(11) NOT NULL,
  `PRCNOTA1` double NOT NULL,
  `PRCNOTA2` double NOT NULL,
  `PRCNOTA3` double NOT NULL,
  `PRCNOTA4` double NOT NULL,
  `PRCNOTA5` double NOT NULL,
  `PRCNOTA6` double NOT NULL,
  `PRCNOTA7` double NOT NULL,
  `PRCNOTA8` double NOT NULL,
  `PRCNOTA9` double NOT NULL,
  `PRCDESCA1` varchar(20) NOT NULL,
  `PRCDESCA2` varchar(20) NOT NULL,
  `PRCDESC1` varchar(20) NOT NULL,
  `PRCDESC2` varchar(20) NOT NULL,
  `PRCDESC3` varchar(20) NOT NULL,
  `PRCDESC4` varchar(20) NOT NULL,
  `PRCDESC5` varchar(20) NOT NULL,
  `PRCDESC6` varchar(20) NOT NULL,
  `PRCDESC7` varchar(20) NOT NULL,
  `PRCDESC8` varchar(20) NOT NULL,
  `PRCFECHA1` varchar(20) NOT NULL,
  `PRCFECHA2` varchar(20) NOT NULL,
  `PRCFECHA3` varchar(20) NOT NULL,
  `PRCFECHA4` varchar(20) NOT NULL,
  `PRCFECHA5` varchar(20) NOT NULL,
  `PRCFECHA6` varchar(20) NOT NULL,
  `PRCFECHA7` varchar(20) NOT NULL,
  `PRCFECHA8` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prfl`
--

CREATE TABLE `prfl` (
  `PERFCODIGO` int(11) NOT NULL,
  `PERFNOMBRE` varchar(20) NOT NULL,
  `PERFDESCRIPCION` text,
  `PERFESTADO` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prll`
--

CREATE TABLE `prll` (
  `PARCODIGO` int(11) NOT NULL,
  `INSCODIGO` int(11) NOT NULL,
  `PARDESCRIPCION` varchar(5) NOT NULL,
  `PAROBSEVACION` text,
  `PARORDEN` int(11) DEFAULT NULL,
  `PARESTADO` int(2) UNSIGNED DEFAULT NULL,
  `PARNOPARTICIPANTES` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prntsc`
--

CREATE TABLE `prntsc` (
  `PARCODIGO` int(10) UNSIGNED NOT NULL,
  `PERCODIGO` int(11) NOT NULL,
  `PARIENTE` int(10) UNSIGNED DEFAULT NULL,
  `PARENTEZCO` varchar(20) DEFAULT NULL,
  `PAROBSERVACION` varchar(100) DEFAULT NULL,
  `PARLUGARTRAB` varchar(100) DEFAULT NULL,
  `PARINSTRUCCION` varchar(20) DEFAULT NULL,
  `PARPROFESION` varchar(30) DEFAULT NULL,
  `PARREPRESENT` varchar(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `psn`
--

CREATE TABLE `psn` (
  `PERCODIGO` int(11) NOT NULL,
  `PERNOMBRES` varchar(30) DEFAULT NULL,
  `PERAPELLIDOS` varchar(30) DEFAULT NULL,
  `PERSEXO` char(20) DEFAULT NULL,
  `PERFECHANACIMIENTO` date DEFAULT NULL,
  `PERLUGARNACIMIENTO` varchar(40) DEFAULT NULL,
  `PERCC` varchar(12) DEFAULT NULL,
  `PERDIRECCION` varchar(100) DEFAULT NULL,
  `PERSECTOR` varchar(100) DEFAULT NULL,
  `PERTELEFONO` varchar(100) DEFAULT NULL,
  `PERMOVIL` varchar(12) DEFAULT NULL,
  `PEREMAIL` varchar(100) DEFAULT NULL,
  `PERESTADOCIVIL` varchar(30) DEFAULT NULL,
  `PERDOCUMENTO` varchar(30) DEFAULT NULL,
  `PEROBSERVACION` text,
  `PERESTADO` int(2) UNSIGNED DEFAULT NULL,
  `PERNACIONALIDAD` varchar(20) DEFAULT NULL,
  `PERPARROQUIA` varchar(100) DEFAULT NULL,
  `PERRAZA` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qmstr`
--

CREATE TABLE `qmstr` (
  `QUICODIGO` int(10) UNSIGNED NOT NULL,
  `QUIDESCRIPCION` varchar(30) DEFAULT NULL,
  `QUIORDEN` int(10) UNSIGNED DEFAULT NULL,
  `QUIFECHAI` datetime DEFAULT NULL,
  `QUIFECHAF` datetime DEFAULT NULL,
  `INSCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `QUITIPO` int(11) NOT NULL,
  `QUISECCION` varchar(20) NOT NULL,
  `ANOCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `QUIESTADO` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qmstrdtll`
--

CREATE TABLE `qmstrdtll` (
  `DTQMCODIGO` int(10) UNSIGNED NOT NULL,
  `QUICODIGO` int(10) UNSIGNED DEFAULT NULL,
  `MTRNO` int(10) UNSIGNED DEFAULT NULL,
  `MATCODIGO` int(10) UNSIGNED DEFAULT NULL,
  `QUIPROMPARCIAL` double NOT NULL,
  `QUIEQUIVALENCIA80` double NOT NULL,
  `QUIEXAMEN` double NOT NULL,
  `QUIEQUIVALENCIA20` double NOT NULL,
  `QUIPROMQUIMESTRE` double NOT NULL,
  `MTRESTADO` int(10) UNSIGNED DEFAULT '1',
  `DTQMESTADO` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rfrncsfmlrs`
--

CREATE TABLE `rfrncsfmlrs` (
  `RFCODIGO` int(10) UNSIGNED NOT NULL,
  `PERCODIGO` int(11) NOT NULL,
  `RFPERSVIVE` text,
  `RFNOHERMANOS` int(10) UNSIGNED DEFAULT NULL,
  `RFEDADES` varchar(100) DEFAULT NULL,
  `RFLUGAROCUPA` int(10) UNSIGNED DEFAULT NULL,
  `RFESTRUCTURA` varchar(200) DEFAULT NULL,
  `RFFDISCAPACIDAD` varchar(10) DEFAULT NULL,
  `RFNOMBREDELDIS` varchar(200) DEFAULT NULL,
  `RFOBSERVACIONES` text,
  `RFVIVIENDA` varchar(30) DEFAULT NULL,
  `RFVIVDESCRIP` varchar(200) DEFAULT NULL,
  `RFLUZ` varchar(2) DEFAULT NULL,
  `RFAGUA` varchar(2) DEFAULT NULL,
  `RFSSHH` varchar(2) DEFAULT NULL,
  `RFPOZO` varchar(2) DEFAULT NULL,
  `RFTELEFONO` varchar(2) DEFAULT NULL,
  `RFCABLE` varchar(2) DEFAULT NULL,
  `RFCELULAR` varchar(2) DEFAULT NULL,
  `RFCOMPUTADOR` varchar(2) DEFAULT NULL,
  `RFINTERNET` varchar(2) DEFAULT NULL,
  `RFOBSERVACION` varchar(300) DEFAULT NULL,
  `RFINGPAD` double DEFAULT NULL,
  `RFINGMAD` double DEFAULT NULL,
  `RFINGOTRO` double DEFAULT NULL,
  `RFEGRTOTAL` double DEFAULT NULL,
  `RFNOHERMANAS` int(10) UNSIGNED DEFAULT NULL,
  `RFVIVECON` varchar(50) DEFAULT NULL,
  `RFHERMANOSINST` int(10) UNSIGNED DEFAULT NULL,
  `RFHERCURSOS` varchar(100) DEFAULT NULL,
  `RFNIVELSEC` varchar(50) DEFAULT NULL,
  `RFHINSTNOMBRES` varchar(200) DEFAULT NULL,
  `RFEGRPAD` double DEFAULT NULL,
  `RFEGRMAD` double DEFAULT NULL,
  `RFHOGAR` varchar(30) DEFAULT NULL,
  `RFOTROS` varchar(50) DEFAULT NULL,
  `RFBIENES` varchar(100) DEFAULT NULL,
  `RFOBSERVACION2` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spcldd`
--

CREATE TABLE `spcldd` (
  `ESPCODIGO` int(11) NOT NULL,
  `INSCODIGO` int(11) NOT NULL,
  `ESPDESCRIPCION` varchar(50) NOT NULL,
  `ESPOBSERVACION` text,
  `ESPESTADO` int(2) UNSIGNED DEFAULT NULL,
  `ESPNOCREDITOS` int(11) UNSIGNED DEFAULT NULL,
  `ESPSIGLAS` varchar(10) DEFAULT NULL,
  `ESPSECCION` varchar(20) DEFAULT NULL,
  `ESPORDEN` int(3) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sr`
--

CREATE TABLE `sr` (
  `USUCODIGO` int(11) NOT NULL,
  `PERCODIGO` int(11) NOT NULL,
  `USUNOMBRE` varchar(20) NOT NULL,
  `USUPASSWORD` varchar(20) NOT NULL,
  `USUDESCRIPCION` text,
  `USUOBSERVACION` text,
  `USUFECHACREACION` datetime DEFAULT NULL,
  `USUESTADO` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `srprfl`
--

CREATE TABLE `srprfl` (
  `PERFCODIGO` int(11) NOT NULL,
  `USUCODIGO` int(11) NOT NULL,
  `ANOCODIGO` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `crgdcnt`
--
ALTER TABLE `crgdcnt`
  ADD PRIMARY KEY (`CDCODIGO`);

--
-- Indices de la tabla `crrcnprcldtll`
--
ALTER TABLE `crrcnprcldtll`
  ADD PRIMARY KEY (`CRDTPRCODIGO`);

--
-- Indices de la tabla `crrcnqmstrdtll`
--
ALTER TABLE `crrcnqmstrdtll`
  ADD PRIMARY KEY (`CRDTQMCODIGO`);

--
-- Indices de la tabla `crs`
--
ALTER TABLE `crs`
  ADD PRIMARY KEY (`CURCODIGO`);

--
-- Indices de la tabla `dcntmtr`
--
ALTER TABLE `dcntmtr`
  ADD PRIMARY KEY (`DCMTCODIGO`);

--
-- Indices de la tabla `dtscdmcs`
--
ALTER TABLE `dtscdmcs`
  ADD PRIMARY KEY (`DARCODIGO`);

--
-- Indices de la tabla `dtsdsld`
--
ALTER TABLE `dtsdsld`
  ADD PRIMARY KEY (`DDSCODIGO`);

--
-- Indices de la tabla `dtspstrl`
--
ALTER TABLE `dtspstrl`
  ADD PRIMARY KEY (`PASCODIGO`);

--
-- Indices de la tabla `fml`
--
ALTER TABLE `fml`
  ADD PRIMARY KEY (`FAMCODIGO`);

--
-- Indices de la tabla `grp`
--
ALTER TABLE `grp`
  ADD PRIMARY KEY (`GRUCODIGO`);

--
-- Indices de la tabla `grpmtr`
--
ALTER TABLE `grpmtr`
  ADD PRIMARY KEY (`GMCODIGO`);

--
-- Indices de la tabla `grpmtrdcnt`
--
ALTER TABLE `grpmtrdcnt`
  ADD PRIMARY KEY (`INDOCODIGO`,`GRUCODIGO`,`MATCODIGO`);

--
-- Indices de la tabla `grpprll`
--
ALTER TABLE `grpprll`
  ADD PRIMARY KEY (`GRUCODIGO`,`PARCODIGO`);

--
-- Indices de la tabla `grpprllmtrdcnt`
--
ALTER TABLE `grpprllmtrdcnt`
  ADD PRIMARY KEY (`GMCODIGO`,`DCMTCODIGO`,`PARCODIGO`);

--
-- Indices de la tabla `hstrvtl`
--
ALTER TABLE `hstrvtl`
  ADD PRIMARY KEY (`HVCODIGO`);

--
-- Indices de la tabla `lcldd`
--
ALTER TABLE `lcldd`
  ADD PRIMARY KEY (`LOCCODIGO`);

--
-- Indices de la tabla `mtr`
--
ALTER TABLE `mtr`
  ADD PRIMARY KEY (`MATCODIGO`);

--
-- Indices de la tabla `mtrcl`
--
ALTER TABLE `mtrcl`
  ADD PRIMARY KEY (`MTRNO`);

--
-- Indices de la tabla `nlctv`
--
ALTER TABLE `nlctv`
  ADD PRIMARY KEY (`ANOCODIGO`);

--
-- Indices de la tabla `nsttcn`
--
ALTER TABLE `nsttcn`
  ADD PRIMARY KEY (`INSCODIGO`);

--
-- Indices de la tabla `nsttcndcnt`
--
ALTER TABLE `nsttcndcnt`
  ADD PRIMARY KEY (`INDOCODIGO`);

--
-- Indices de la tabla `nsttcnstdnt`
--
ALTER TABLE `nsttcnstdnt`
  ADD PRIMARY KEY (`INESCODIGO`);

--
-- Indices de la tabla `nvlfrmcn`
--
ALTER TABLE `nvlfrmcn`
  ADD PRIMARY KEY (`NFCODIGO`);

--
-- Indices de la tabla `nvlfrmcndcnt`
--
ALTER TABLE `nvlfrmcndcnt`
  ADD PRIMARY KEY (`NFDCODIGO`);

--
-- Indices de la tabla `prcl`
--
ALTER TABLE `prcl`
  ADD PRIMARY KEY (`PRCCODIGO`);

--
-- Indices de la tabla `prcldtll`
--
ALTER TABLE `prcldtll`
  ADD PRIMARY KEY (`DTPRCODIGO`);

--
-- Indices de la tabla `prfl`
--
ALTER TABLE `prfl`
  ADD PRIMARY KEY (`PERFCODIGO`);

--
-- Indices de la tabla `prll`
--
ALTER TABLE `prll`
  ADD PRIMARY KEY (`PARCODIGO`);

--
-- Indices de la tabla `prntsc`
--
ALTER TABLE `prntsc`
  ADD PRIMARY KEY (`PARCODIGO`);

--
-- Indices de la tabla `psn`
--
ALTER TABLE `psn`
  ADD PRIMARY KEY (`PERCODIGO`);

--
-- Indices de la tabla `qmstr`
--
ALTER TABLE `qmstr`
  ADD PRIMARY KEY (`QUICODIGO`);

--
-- Indices de la tabla `qmstrdtll`
--
ALTER TABLE `qmstrdtll`
  ADD PRIMARY KEY (`DTQMCODIGO`);

--
-- Indices de la tabla `rfrncsfmlrs`
--
ALTER TABLE `rfrncsfmlrs`
  ADD PRIMARY KEY (`RFCODIGO`);

--
-- Indices de la tabla `spcldd`
--
ALTER TABLE `spcldd`
  ADD PRIMARY KEY (`ESPCODIGO`);

--
-- Indices de la tabla `sr`
--
ALTER TABLE `sr`
  ADD PRIMARY KEY (`USUCODIGO`);

--
-- Indices de la tabla `srprfl`
--
ALTER TABLE `srprfl`
  ADD PRIMARY KEY (`PERFCODIGO`,`USUCODIGO`,`ANOCODIGO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `crgdcnt`
--
ALTER TABLE `crgdcnt`
  MODIFY `CDCODIGO` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `crrcnprcldtll`
--
ALTER TABLE `crrcnprcldtll`
  MODIFY `CRDTPRCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8642;

--
-- AUTO_INCREMENT de la tabla `crrcnqmstrdtll`
--
ALTER TABLE `crrcnqmstrdtll`
  MODIFY `CRDTQMCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8207;

--
-- AUTO_INCREMENT de la tabla `crs`
--
ALTER TABLE `crs`
  MODIFY `CURCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `dcntmtr`
--
ALTER TABLE `dcntmtr`
  MODIFY `DCMTCODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1275;

--
-- AUTO_INCREMENT de la tabla `dtscdmcs`
--
ALTER TABLE `dtscdmcs`
  MODIFY `DARCODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2905;

--
-- AUTO_INCREMENT de la tabla `dtsdsld`
--
ALTER TABLE `dtsdsld`
  MODIFY `DDSCODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2905;

--
-- AUTO_INCREMENT de la tabla `dtspstrl`
--
ALTER TABLE `dtspstrl`
  MODIFY `PASCODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2905;

--
-- AUTO_INCREMENT de la tabla `fml`
--
ALTER TABLE `fml`
  MODIFY `FAMCODIGO` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `grp`
--
ALTER TABLE `grp`
  MODIFY `GRUCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `grpmtr`
--
ALTER TABLE `grpmtr`
  MODIFY `GMCODIGO` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1266;

--
-- AUTO_INCREMENT de la tabla `hstrvtl`
--
ALTER TABLE `hstrvtl`
  MODIFY `HVCODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2905;

--
-- AUTO_INCREMENT de la tabla `lcldd`
--
ALTER TABLE `lcldd`
  MODIFY `LOCCODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mtr`
--
ALTER TABLE `mtr`
  MODIFY `MATCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT de la tabla `mtrcl`
--
ALTER TABLE `mtrcl`
  MODIFY `MTRNO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6933;

--
-- AUTO_INCREMENT de la tabla `nlctv`
--
ALTER TABLE `nlctv`
  MODIFY `ANOCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `nsttcn`
--
ALTER TABLE `nsttcn`
  MODIFY `INSCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nsttcndcnt`
--
ALTER TABLE `nsttcndcnt`
  MODIFY `INDOCODIGO` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de la tabla `nsttcnstdnt`
--
ALTER TABLE `nsttcnstdnt`
  MODIFY `INESCODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3057;

--
-- AUTO_INCREMENT de la tabla `nvlfrmcn`
--
ALTER TABLE `nvlfrmcn`
  MODIFY `NFCODIGO` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nvlfrmcndcnt`
--
ALTER TABLE `nvlfrmcndcnt`
  MODIFY `NFDCODIGO` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prcl`
--
ALTER TABLE `prcl`
  MODIFY `PRCCODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `prcldtll`
--
ALTER TABLE `prcldtll`
  MODIFY `DTPRCODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=576660;

--
-- AUTO_INCREMENT de la tabla `prfl`
--
ALTER TABLE `prfl`
  MODIFY `PERFCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `prll`
--
ALTER TABLE `prll`
  MODIFY `PARCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `prntsc`
--
ALTER TABLE `prntsc`
  MODIFY `PARCODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3360;

--
-- AUTO_INCREMENT de la tabla `psn`
--
ALTER TABLE `psn`
  MODIFY `PERCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7952;

--
-- AUTO_INCREMENT de la tabla `qmstr`
--
ALTER TABLE `qmstr`
  MODIFY `QUICODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `qmstrdtll`
--
ALTER TABLE `qmstrdtll`
  MODIFY `DTQMCODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226947;

--
-- AUTO_INCREMENT de la tabla `rfrncsfmlrs`
--
ALTER TABLE `rfrncsfmlrs`
  MODIFY `RFCODIGO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2895;

--
-- AUTO_INCREMENT de la tabla `spcldd`
--
ALTER TABLE `spcldd`
  MODIFY `ESPCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `sr`
--
ALTER TABLE `sr`
  MODIFY `USUCODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
