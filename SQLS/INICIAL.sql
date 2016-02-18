-- phpMyAdmin SQL Dump
-- version 4.4.6.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2015 a las 13:21:01
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hcfa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Adjuntos`
--

CREATE TABLE IF NOT EXISTS `Adjuntos` (
  `idAdjuntos` int(11) NOT NULL,
  `idPaciente` bigint(11) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `nombre_archivo` varchar(100) DEFAULT NULL,
  `peso_archivo` varchar(100) DEFAULT NULL,
  `url_archivo` varchar(150) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_admins`
--

CREATE TABLE IF NOT EXISTS `booking_admins` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) DEFAULT NULL,
  `admin_password` varchar(100) DEFAULT NULL,
  `admin_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_availability`
--

CREATE TABLE IF NOT EXISTS `booking_availability` (
  `id_availability` int(11) NOT NULL,
  `availability_date_from` date DEFAULT NULL,
  `availability_date_to` date DEFAULT NULL,
  `availability_time_from` int(11) DEFAULT NULL,
  `availability_time_to` int(11) DEFAULT NULL,
  `calendar_id` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_calendars`
--

CREATE TABLE IF NOT EXISTS `booking_calendars` (
  `calendar_id` int(11) NOT NULL,
  `calendar_title` varchar(100) DEFAULT NULL,
  `calendar_order` int(11) DEFAULT NULL,
  `calendar_active` int(11) DEFAULT NULL,
  `booking_holidays_holiday_id` int(11) NOT NULL,
  `booking_availability_id_availability` int(11) NOT NULL,
  `booking_slots_slot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_config`
--

CREATE TABLE IF NOT EXISTS `booking_config` (
  `config_id` int(11) NOT NULL,
  `config_name` varchar(100) DEFAULT NULL,
  `config_value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_dias_bloqueados`
--

CREATE TABLE IF NOT EXISTS `booking_dias_bloqueados` (
  `id` int(11) NOT NULL,
  `Grupo` int(11) DEFAULT NULL,
  `desde` datetime DEFAULT NULL,
  `hasta` datetime DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_emails`
--

CREATE TABLE IF NOT EXISTS `booking_emails` (
  `email_id` int(11) NOT NULL,
  `email_name` varchar(100) DEFAULT NULL,
  `email_subject` varchar(700) DEFAULT NULL,
  `email_text` text,
  `email_cancel_text` text,
  `email_signature` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_field_types`
--

CREATE TABLE IF NOT EXISTS `booking_field_types` (
  `type_id` int(11) NOT NULL,
  `reservation_field_name` varchar(200) DEFAULT NULL,
  `reservation_field_type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_frange`
--

CREATE TABLE IF NOT EXISTS `booking_frange` (
  `id_frange` int(11) NOT NULL,
  `frange_date_from` date DEFAULT NULL,
  `frange_date_to` date DEFAULT NULL,
  `frange_slot` int(11) DEFAULT NULL,
  `slot_pause` int(11) DEFAULT NULL,
  `frange_time_from` int(11) DEFAULT NULL,
  `frange_time_to` int(11) DEFAULT NULL,
  `calendar_id` int(11) DEFAULT NULL,
  `booking_calendars_calendar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_holidays`
--

CREATE TABLE IF NOT EXISTS `booking_holidays` (
  `holiday_id` int(11) NOT NULL,
  `holiday_date` date DEFAULT NULL,
  `calendar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_horarios_atencion`
--

CREATE TABLE IF NOT EXISTS `booking_horarios_atencion` (
  `id` int(11) NOT NULL,
  `Grupo` int(11) DEFAULT NULL,
  `dia` tinyint(1) DEFAULT NULL,
  `desde` time DEFAULT NULL,
  `hasta` time DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_paypal_currency`
--

CREATE TABLE IF NOT EXISTS `booking_paypal_currency` (
  `currency_id` int(11) NOT NULL,
  `currency_name` varchar(100) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_paypal_locale`
--

CREATE TABLE IF NOT EXISTS `booking_paypal_locale` (
  `locale_id` int(11) NOT NULL,
  `locale_country` varchar(100) DEFAULT NULL,
  `locale_code` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_reservation`
--

CREATE TABLE IF NOT EXISTS `booking_reservation` (
  `reservation_id` int(11) NOT NULL,
  `slot_id` int(11) DEFAULT NULL,
  `tipoDocumento` varchar(2) DEFAULT NULL,
  `idPaciente` bigint(11) DEFAULT NULL,
  `reservation_name` varchar(50) DEFAULT NULL,
  `reservation_surname` varchar(50) DEFAULT NULL,
  `reservation_email` varchar(100) DEFAULT NULL,
  `reservation_phone` varchar(50) DEFAULT NULL,
  `tipoConsulta` varchar(10) DEFAULT NULL,
  `reservation_message` text,
  `reservation_seats` int(11) DEFAULT NULL,
  `reservation_field1` text,
  `reservation_field2` text,
  `reservation_field3` text,
  `reservation_field4` text,
  `reservation_confirmed` int(11) DEFAULT NULL,
  `reservation_cancelled` int(11) DEFAULT NULL,
  `calendar_id` int(11) DEFAULT NULL,
  `idEstadoVisita` int(11) DEFAULT NULL,
  `DatosBasicosPacientes_idPaciente` int(20) NOT NULL,
  `DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1` int(20) NOT NULL,
  `DatosBasicosPacientes_TiposDocumento_idTiposDocumento` varchar(2) NOT NULL,
  `DatosBasicosPacientes_Entidad_idEntidad` int(11) NOT NULL,
  `booking_calendars_calendar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_slots`
--

CREATE TABLE IF NOT EXISTS `booking_slots` (
  `slot_id` int(11) NOT NULL,
  `slot_special_text` varchar(700) DEFAULT NULL,
  `slot_special_mode` int(11) DEFAULT NULL,
  `slot_date` date DEFAULT NULL,
  `slot_time_from` time DEFAULT NULL,
  `slot_time_to` time DEFAULT NULL,
  `slot_price` double DEFAULT NULL,
  `slot_av` int(11) DEFAULT NULL,
  `slot_active` int(11) DEFAULT NULL,
  `calendar_id` int(11) DEFAULT NULL,
  `slot_reservation` tinyint(1) DEFAULT NULL,
  `reservation_message` varchar(100) DEFAULT NULL,
  `idEstadoVisita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_timezones`
--

CREATE TABLE IF NOT EXISTS `booking_timezones` (
  `timezone_id` int(11) NOT NULL,
  `timezone_name` varchar(100) DEFAULT NULL,
  `timezone_value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Chat`
--

CREATE TABLE IF NOT EXISTS `Chat` (
  `id` int(11) NOT NULL,
  `from` varchar(200) DEFAULT NULL,
  `to` varchar(200) DEFAULT NULL,
  `message` text,
  `sent` datetime DEFAULT NULL,
  `recd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Chat_online`
--

CREATE TABLE IF NOT EXISTS `Chat_online` (
  `idUser` int(11) NOT NULL,
  `fecha` int(14) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codServ`
--

CREATE TABLE IF NOT EXISTS `codServ` (
  `id` int(11) NOT NULL,
  `idServ` varchar(20) NOT NULL,
  `descripcion` text,
  `codGrupo` varchar(10) NOT NULL,
  `mes` int(11) NOT NULL,
  `codClasif` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Control`
--

CREATE TABLE IF NOT EXISTS `Control` (
  `idControl` int(11) NOT NULL,
  `idPaciente` bigint(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipoControl` varchar(30) DEFAULT NULL,
  `comentarioPacienteOPreguntas` varchar(200) DEFAULT NULL,
  `controlDolor` varchar(2) DEFAULT NULL,
  `controlDolorComentario` varchar(100) DEFAULT NULL,
  `fiebre` varchar(2) DEFAULT NULL,
  `malestarGeneralYEscalofrios` varchar(2) DEFAULT NULL,
  `picosFebriles` varchar(2) DEFAULT NULL,
  `picosFebrilesComentario` varchar(100) DEFAULT NULL,
  `nauseas` varchar(2) DEFAULT NULL,
  `vomito` varchar(2) DEFAULT NULL,
  `epigastralgia` varchar(2) DEFAULT NULL,
  `estrenimiento` varchar(2) DEFAULT NULL,
  `lipotimias` varchar(2) DEFAULT NULL,
  `lipotimiasComentario` varchar(100) DEFAULT NULL,
  `refiereDificultadRespiratoria` varchar(2) DEFAULT NULL,
  `tosSeca` varchar(2) DEFAULT NULL,
  `tosEspectoracion` varchar(2) DEFAULT NULL,
  `asteniaYAdinamica` varchar(2) DEFAULT NULL,
  `indicacionesMedicas` varchar(2) DEFAULT NULL,
  `indicacionesMedicasComentario` varchar(100) DEFAULT NULL,
  `conductasIrregulares` varchar(2) DEFAULT NULL,
  `conductasIrregularesComentario` varchar(100) DEFAULT NULL,
  `estadoGeneral` varchar(2) DEFAULT NULL,
  `toleraViaOral` varchar(2) DEFAULT NULL,
  `alertaYOrientado` varchar(2) DEFAULT NULL,
  `hidratado` varchar(2) DEFAULT NULL,
  `mucosasNormocromicas` varchar(2) DEFAULT NULL,
  `diuresisNormal` varchar(2) DEFAULT NULL,
  `signosVitalesNormales` varchar(2) DEFAULT NULL,
  `dificultadRespiratoria` varchar(2) DEFAULT NULL,
  `dificultadRespiratoriaComentario` varchar(100) DEFAULT NULL,
  `cuadroObstructivo` varchar(2) DEFAULT NULL,
  `cuadroObstructivoComentario` varchar(100) DEFAULT NULL,
  `tipoExamenFisico` varchar(45) DEFAULT NULL,
  `resultadoSimetrico` varchar(2) DEFAULT NULL,
  `senosAsimetricos` varchar(2) DEFAULT NULL,
  `senosAsimetricosComentario` varchar(100) DEFAULT NULL,
  `cinturaAcentuada` varchar(2) DEFAULT NULL,
  `implanteMasAlto` varchar(2) DEFAULT NULL,
  `implantteMasAltoLado` varchar(50) DEFAULT NULL,
  `implanteMasAltoComentario` varchar(100) DEFAULT NULL,
  `senoMasGrande` varchar(2) DEFAULT NULL,
  `senoMasGrandeLado` varchar(50) DEFAULT NULL,
  `senoMasGrandeComentario` varchar(100) DEFAULT NULL,
  `senoMasPlano` varchar(2) DEFAULT NULL,
  `senoMasPlanoLado` varchar(50) DEFAULT NULL,
  `senoMasPlanoComentario` varchar(100) DEFAULT NULL,
  `senoMasDuro` varchar(2) DEFAULT NULL,
  `senoMasDuroLado` varchar(50) DEFAULT NULL,
  `senoMasDuroComentario` varchar(100) DEFAULT NULL,
  `areolasIrregulares` varchar(2) DEFAULT NULL,
  `narizSimetrica` varchar(2) DEFAULT NULL,
  `fosasAsimetricas` varchar(2) DEFAULT NULL,
  `laterorinia` varchar(2) DEFAULT NULL,
  `puntaAsimetrica` varchar(2) DEFAULT NULL,
  `depresionVertienteNasal` varchar(2) DEFAULT NULL,
  `depresionVertienteUbicacion` varchar(50) DEFAULT NULL,
  `depresionVertienteComentario` varchar(100) DEFAULT NULL,
  `parpadosSimetricos` varchar(2) DEFAULT NULL,
  `leveMuestraEscleral` varchar(2) DEFAULT NULL,
  `leveMuestraEscleralLado` varchar(50) DEFAULT NULL,
  `leveMuestraEscleralComentario` varchar(100) DEFAULT NULL,
  `plieguesProcesoCorreccion` varchar(2) DEFAULT NULL,
  `plieguesProcesoLado` varchar(50) DEFAULT NULL,
  `colecciones` varchar(2) DEFAULT NULL,
  `drenarSeroma` varchar(2) DEFAULT NULL,
  `drenarSeromaComentario` varchar(100) DEFAULT NULL,
  `drenarSeromaVolumen` varchar(10) DEFAULT NULL,
  `drenarHematoma` varchar(2) DEFAULT NULL,
  `drenarHematomaComentario` varchar(100) DEFAULT NULL,
  `drenarHematomaUbicacion` varchar(50) DEFAULT NULL,
  `drenarHematomaVolumen` varchar(10) DEFAULT NULL,
  `envioSecrecionCutivo` varchar(2) DEFAULT NULL,
  `sinEritema` varchar(2) DEFAULT NULL,
  `eritemaYCalor` varchar(2) DEFAULT NULL,
  `eritemaUbicacion` varchar(50) DEFAULT NULL,
  `eritemaComentario` varchar(100) DEFAULT NULL,
  `flictenas` varchar(2) DEFAULT NULL,
  `flictenasUbicacion` varchar(50) DEFAULT NULL,
  `flictenasComentario` varchar(100) DEFAULT NULL,
  `edemaPiel` varchar(2) DEFAULT NULL,
  `edemaPielUbicacion` varchar(50) DEFAULT NULL,
  `edemaPielComentario` varchar(100) DEFAULT NULL,
  `vesiculas` varchar(2) DEFAULT NULL,
  `vesiculasUbicacion` varchar(50) DEFAULT NULL,
  `vesiculasComentario` varchar(100) DEFAULT NULL,
  `pliegues` varchar(20) DEFAULT NULL,
  `plieguesUbicacion` varchar(50) DEFAULT NULL,
  `abultamientos` varchar(20) DEFAULT NULL,
  `abultamientosUbicacion` varchar(50) DEFAULT NULL,
  `areaDeprimida` varchar(2) DEFAULT NULL,
  `areaDeprimidaUbicacion` varchar(50) DEFAULT NULL,
  `areaDeprimidaComentario` varchar(100) DEFAULT NULL,
  `irregularidades` varchar(20) DEFAULT NULL,
  `irregularidadesUbicacion` varchar(50) DEFAULT NULL,
  `irregularidadesComentario` varchar(100) DEFAULT NULL,
  `heridasCubiertas` varchar(2) DEFAULT NULL,
  `cicatrizaAdecuadamente` varchar(2) DEFAULT NULL,
  `hipertrofica` varchar(2) DEFAULT NULL,
  `hipertroficaUbicacion` varchar(50) DEFAULT NULL,
  `hipertroficaComentario` varchar(100) DEFAULT NULL,
  `queloide` varchar(2) DEFAULT NULL,
  `queloideUbicacion` varchar(50) DEFAULT NULL,
  `queloideComentario` varchar(100) DEFAULT NULL,
  `pigmentada` varchar(2) DEFAULT NULL,
  `pigmentadaUbicacion` varchar(50) DEFAULT NULL,
  `pigmentadaComentario` varchar(100) DEFAULT NULL,
  `puntosInternos` varchar(2) DEFAULT NULL,
  `puntosInternosUbicacion` varchar(50) DEFAULT NULL,
  `puntosInternosComentario` varchar(100) DEFAULT NULL,
  `dehiscencia` varchar(2) DEFAULT NULL,
  `dehiscenciaUbicacion` varchar(50) DEFAULT NULL,
  `dehiscenciaComentarios` varchar(100) DEFAULT NULL,
  `granuloma` varchar(2) DEFAULT NULL,
  `granulomaUbicacion` varchar(50) DEFAULT NULL,
  `granulomaComentario` varchar(100) DEFAULT NULL,
  `mejoraEritemaCicatriz` varchar(2) DEFAULT NULL,
  `mejoraCalidadCicatriz` varchar(2) DEFAULT NULL,
  `pielEpitelizaAdecuadamente` varchar(2) DEFAULT NULL,
  `eliminandoEscaras` varchar(2) DEFAULT NULL,
  `ritidesDesaparecida` varchar(2) DEFAULT NULL,
  `persisteRitides` varchar(2) DEFAULT NULL,
  `persisteRitidesUbicacion` varchar(50) DEFAULT NULL,
  `persisteRitidesComentario` varchar(100) DEFAULT NULL,
  `mejoraPielCara` varchar(2) DEFAULT NULL,
  `mejoraManchasCara` varchar(2) DEFAULT NULL,
  `eritemaIntensoCara` varchar(2) DEFAULT NULL,
  `eritemaIntensoCaraUbicacion` varchar(50) DEFAULT NULL,
  `eritemaIntensoCaraComentario` varchar(100) DEFAULT NULL,
  `eritemaModeradoCara` varchar(2) DEFAULT NULL,
  `eritemaProlongadoCara` varchar(2) DEFAULT NULL,
  `areasHiperpigmentadas` varchar(2) DEFAULT NULL,
  `areasHiperpigmentadasUbicacion` varchar(50) DEFAULT NULL,
  `areasHiperpigmentadasComentario` varchar(100) DEFAULT NULL,
  `areasHipopigmentadas` varchar(2) DEFAULT NULL,
  `areasHipopigmentadasUbicacion` varchar(50) DEFAULT NULL,
  `areasHipopigmentadasComentario` varchar(100) DEFAULT NULL,
  `quistesMilio` varchar(2) DEFAULT NULL,
  `resequedadPielCara` varchar(2) DEFAULT NULL,
  `colgajoVitalSinSufrimiento` varchar(2) DEFAULT NULL,
  `colgajoEpidermiosis` varchar(2) DEFAULT NULL,
  `colgajoEpidermiosisUbicacion` varchar(50) DEFAULT NULL,
  `colgajoEpidermiosisComentario` varchar(100) DEFAULT NULL,
  `colgajoNecrosis` varchar(2) DEFAULT NULL,
  `colgajoNecrosisUbicacion` varchar(50) DEFAULT NULL,
  `colgajoNecrosisComentario` varchar(100) DEFAULT NULL,
  `areolasVitalesSinSufrimiento` varchar(2) DEFAULT NULL,
  `epidermolisisAreola` varchar(2) DEFAULT NULL,
  `epidermolisisAreolaUbicacion` varchar(50) DEFAULT NULL,
  `epidermolisisAreolaComentario` varchar(100) DEFAULT NULL,
  `necrosisAreola` varchar(2) DEFAULT NULL,
  `necrosisAreolaUbicacion` varchar(50) DEFAULT NULL,
  `necrosisAreolaComentario` varchar(100) DEFAULT NULL,
  `adecuadaRetraccionPiel` varchar(2) DEFAULT NULL,
  `mejoriaTonoPiel` varchar(2) DEFAULT NULL,
  `mejoriaParcialCelulitis` varchar(2) DEFAULT NULL,
  `persisteFlacidezAbdominal` varchar(2) DEFAULT NULL,
  `persisteFlacidezParpadosS` varchar(2) DEFAULT NULL,
  `aparicionEstriasHipogastrio` varchar(2) DEFAULT NULL,
  `aparicionEstriasSenos` varchar(2) DEFAULT NULL,
  `heridasCubiertas2` varchar(2) DEFAULT NULL,
  `vendajePosicion` varchar(2) DEFAULT NULL,
  `sinSignosInfeccion` varchar(2) DEFAULT NULL,
  `drenajeClaro` varchar(2) DEFAULT NULL,
  `drenajeSanguinolento` varchar(2) DEFAULT NULL,
  `drenajeTurbio` varchar(2) DEFAULT NULL,
  `drenajeMalOlor` varchar(2) DEFAULT NULL,
  `drenajeEscasoUnDia` varchar(2) DEFAULT NULL,
  `drenajeModeradoUnDia` varchar(2) DEFAULT NULL,
  `drenajeAbundanteUnDia` varchar(2) DEFAULT NULL,
  `sinEvidenciaSangrado` varchar(2) DEFAULT NULL,
  `minimoFosasNasales` varchar(2) DEFAULT NULL,
  `sangradoActivo` varchar(2) DEFAULT NULL,
  `sangradoActivoUbicacion` varchar(50) DEFAULT NULL,
  `sangradoActivoComentario` varchar(100) DEFAULT NULL,
  `inflamacion` varchar(2) DEFAULT NULL,
  `inflamacionEsperada` varchar(20) DEFAULT NULL,
  `sinReaccionesAlergicas` varchar(2) DEFAULT NULL,
  `erupcionGeneralizada` varchar(2) DEFAULT NULL,
  `erupcionAbdomen` varchar(2) DEFAULT NULL,
  `erupcionEspalda` varchar(2) DEFAULT NULL,
  `erupcionSenos` varchar(2) DEFAULT NULL,
  `eritemaAsociadoVendajes` varchar(2) DEFAULT NULL,
  `flictenasAsociadasVendajes` varchar(2) DEFAULT NULL,
  `sinIrritacionPeritoneal` varchar(2) DEFAULT NULL,
  `distencionAbdominal` varchar(2) DEFAULT NULL,
  `signosIrritacionPeritoneal` varchar(2) DEFAULT NULL,
  `signosIrritacionComentario` varchar(100) DEFAULT NULL,
  `peristalismoNormal` varchar(2) DEFAULT NULL,
  `cardiopulmonarNormal` varchar(2) DEFAULT NULL,
  `sinDificultadRespiratoria` varchar(2) DEFAULT NULL,
  `hiperventilacionBasal` varchar(2) DEFAULT NULL,
  `estertoresPulmonares` varchar(2) DEFAULT NULL,
  `estertoresPulmonaresUbicacion` varchar(50) DEFAULT NULL,
  `estertoresPulmonaresComentario` varchar(100) DEFAULT NULL,
  `movilizacionSecreciones` varchar(2) DEFAULT NULL,
  `masa` varchar(2) DEFAULT NULL,
  `masaUbicacion` varchar(50) DEFAULT NULL,
  `masaComentario` varchar(100) DEFAULT NULL,
  `agudezaVisualNormal` varchar(2) DEFAULT NULL,
  `eritemaYSecrecionOjos` varchar(2) DEFAULT NULL,
  `adecuadaEvolucion` varchar(2) DEFAULT NULL,
  `adecuadaEvolucionComentario` varchar(100) DEFAULT NULL,
  `resultadoEstetico` varchar(2) DEFAULT NULL,
  `resultadoEsteticoComentario` varchar(100) DEFAULT NULL,
  `satisfaccionPaciente` varchar(45) DEFAULT NULL,
  `satisfaccionProcedimiento` varchar(45) DEFAULT NULL,
  `testimonioPaciente` varchar(300) DEFAULT NULL,
  `DatosBasicosPacientes_idPaciente` int(20) NOT NULL,
  `DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cotizacion`
--

CREATE TABLE IF NOT EXISTS `Cotizacion` (
  `idCotizacion` int(11) NOT NULL,
  `idPaciente` bigint(11) DEFAULT NULL,
  `idTratamientosPropuestos` varchar(45) DEFAULT NULL,
  `valoresPredeterminados` varchar(200) DEFAULT NULL,
  `descuento` varchar(45) DEFAULT NULL,
  `otrosDescuentos` varchar(45) DEFAULT NULL,
  `descuentoSoberTotal` varchar(45) DEFAULT NULL,
  `cotizacionTNQ` varchar(45) DEFAULT NULL,
  `idTratamientosNoQuirurgicos` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `DatosBasicosPacientes_idPaciente` int(20) NOT NULL,
  `DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DatosAdicionalesPacientes`
--

CREATE TABLE IF NOT EXISTS `DatosAdicionalesPacientes` (
  `fechaCreacion` date DEFAULT NULL,
  `idPaciente` int(20) NOT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `fechaNacimiento` datetime DEFAULT NULL,
  `lugarNacimiento` varchar(50) DEFAULT NULL,
  `edad` int(3) DEFAULT NULL,
  `referidoPor` varchar(100) DEFAULT NULL,
  `referidoPorOtros` varchar(100) DEFAULT NULL,
  `direccionOficina` varchar(100) DEFAULT NULL,
  `telefonoOficina` varchar(20) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `ciudadOtra` varchar(50) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `paIs` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ocupacion` varchar(50) DEFAULT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `comoSeEntero` varchar(100) DEFAULT NULL,
  `comoSeEnteroDesc` varchar(100) DEFAULT NULL,
  `copiaCedula` varchar(100) DEFAULT NULL,
  `EPS` varchar(30) DEFAULT NULL,
  `ARP` varchar(30) DEFAULT NULL,
  `prepagada` varchar(30) DEFAULT NULL,
  `menorDeEdad` varchar(50) DEFAULT NULL,
  `acudienteResponsable` varchar(100) DEFAULT NULL,
  `acompanante` varchar(100) DEFAULT NULL,
  `origenEnfermedad` varchar(30) DEFAULT NULL,
  `contactoNombre` varchar(50) DEFAULT NULL,
  `contactoRelacion` varchar(50) DEFAULT NULL,
  `contactoTelefonoCasa` varchar(20) DEFAULT NULL,
  `contactoTelefonoTrabajo` varchar(20) DEFAULT NULL,
  `contactoCelular` varchar(15) DEFAULT NULL,
  `revisionPor` varchar(50) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `foto` longblob,
  `estadoCivil` varchar(30) DEFAULT NULL,
  `grupoSanguineo` varchar(5) DEFAULT NULL,
  `RH` varchar(5) DEFAULT NULL,
  `nombrePareja` varchar(50) DEFAULT NULL,
  `edadPareja` varchar(30) DEFAULT NULL,
  `oficioPareja` varchar(50) DEFAULT NULL,
  `tipoPaciente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DatosBasicosPacientes`
--

CREATE TABLE IF NOT EXISTS `DatosBasicosPacientes` (
  `fechaCreacion` date DEFAULT NULL,
  `nombre1` varchar(50) DEFAULT NULL,
  `nombre2` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `tipoDocumento` varchar(20) DEFAULT NULL,
  `idPaciente` int(20) NOT NULL,
  `direccionCasa` varchar(100) DEFAULT NULL,
  `telefonoCasa` varchar(20) DEFAULT NULL,
  `celular1` varchar(15) DEFAULT NULL,
  `celular2` varchar(15) DEFAULT NULL,
  `DatosAdicionalesPacientes_idPaciente` int(20) NOT NULL,
  `DatosAdicionalesPacientes_idPaciente1` int(20) NOT NULL,
  `TiposDocumento_idTiposDocumento` varchar(2) NOT NULL,
  `Entidad_idEntidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dxcie10`
--

CREATE TABLE IF NOT EXISTS `dxcie10` (
  `id` int(11) NOT NULL,
  `IdDx` varchar(10) NOT NULL,
  `Diagnostico` text,
  `grp10` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EncuestaSatisfaccion`
--

CREATE TABLE IF NOT EXISTS `EncuestaSatisfaccion` (
  `idEncuestaSatisfaccion` int(11) NOT NULL,
  `idPaciente` int(20) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `instalaciones` varchar(500) DEFAULT NULL,
  `consultorio` varchar(200) DEFAULT NULL,
  `tnq` varchar(200) DEFAULT NULL,
  `personal` varchar(500) DEFAULT NULL,
  `doctorAmaya` varchar(200) DEFAULT NULL,
  `doctorPicon` varchar(200) DEFAULT NULL,
  `ingrid` varchar(200) DEFAULT NULL,
  `carolinaBernal` varchar(200) DEFAULT NULL,
  `janete` varchar(200) DEFAULT NULL,
  `rina` varchar(200) DEFAULT NULL,
  `maria` varchar(200) DEFAULT NULL,
  `cristina` varchar(200) DEFAULT NULL,
  `jenny` varchar(200) DEFAULT NULL,
  `jessica` varchar(200) DEFAULT NULL,
  `recepcionCirulaser` varchar(200) DEFAULT NULL,
  `circulante` varchar(200) DEFAULT NULL,
  `nombreCirculante` varchar(200) DEFAULT NULL,
  `enfermeraRecuperacion` varchar(200) DEFAULT NULL,
  `nombreEnfermeraRecuperacion` varchar(200) DEFAULT NULL,
  `enfermeraCasa` varchar(200) DEFAULT NULL,
  `nombreEnfermeraCasa` varchar(200) DEFAULT NULL,
  `DatosBasicosPacientes_idPaciente` int(20) NOT NULL,
  `DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Entidad`
--

CREATE TABLE IF NOT EXISTS `Entidad` (
  `idEntidad` int(11) NOT NULL,
  `nitEntidad` varchar(100) DEFAULT NULL,
  `codigoEntidad` varchar(50) DEFAULT NULL,
  `razonSocial` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EnvioCorreos`
--

CREATE TABLE IF NOT EXISTS `EnvioCorreos` (
  `idEnvioCorreos` int(11) NOT NULL,
  `idPaciente` bigint(11) DEFAULT NULL,
  `correoEnvio` varchar(100) DEFAULT NULL,
  `fechaEnvio` date DEFAULT NULL,
  `tipoEnvio` varchar(200) DEFAULT NULL,
  `parametroEnvio` varchar(200) DEFAULT NULL,
  `DatosBasicosPacientes_idPaciente` int(20) NOT NULL,
  `DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EstadoVisita`
--

CREATE TABLE IF NOT EXISTS `EstadoVisita` (
  `idEstadoVisita` int(11) NOT NULL,
  `nombreEstadoVisita` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Facturacion`
--

CREATE TABLE IF NOT EXISTS `Facturacion` (
  `idFacturacion` int(11) NOT NULL,
  `idPaciente` int(20) DEFAULT NULL,
  `idEntidad` int(11) DEFAULT NULL,
  `nroAutorizacion` varchar(45) DEFAULT NULL,
  `valorConsulta` int(11) DEFAULT NULL,
  `moderadora` int(11) DEFAULT NULL,
  `pagoNeto` int(11) DEFAULT NULL,
  `codFacEspecialista` varchar(45) DEFAULT NULL,
  `idTratamientoPropuesto` int(11) DEFAULT NULL,
  `fechaFactura` date DEFAULT NULL,
  `fechaInicioContrato` date DEFAULT NULL,
  `fechaFinContrato` date DEFAULT NULL,
  `conNumeroContrato` varchar(50) DEFAULT NULL,
  `conPlanBenificios` varchar(200) DEFAULT NULL,
  `conNumeroPoliza` varchar(50) DEFAULT NULL,
  `conValorTotal` varchar(50) DEFAULT NULL,
  `conValorComision` varchar(50) DEFAULT NULL,
  `conValorEntidad` varchar(45) DEFAULT NULL,
  `idControl` int(11) DEFAULT NULL,
  `descripcionQuirurgica` int(11) DEFAULT NULL,
  `DatosBasicosPacientes_idPaciente` int(20) NOT NULL,
  `DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HistoriaClinica`
--

CREATE TABLE IF NOT EXISTS `HistoriaClinica` (
  `idHistoriaClinica` int(11) NOT NULL,
  `idPaciente` int(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `secuelasPrevias` varchar(2) DEFAULT NULL,
  `mejorarContornoCorporal` varchar(2) DEFAULT NULL,
  `mejorarFlacidezAbdomen` varchar(2) DEFAULT NULL,
  `aumentarProyeccionGluteos` varchar(2) DEFAULT NULL,
  `mejorarCicatrizLipectomia` varchar(2) DEFAULT NULL,
  `mejorarCelulitis` varchar(2) DEFAULT NULL,
  `disminuirEstriasAbdomen` varchar(45) DEFAULT NULL,
  `deseaTenerHijos` varchar(2) DEFAULT NULL,
  `mejorarAspectoOrejas` varchar(2) DEFAULT NULL,
  `areasMayorInteres` varchar(100) DEFAULT NULL,
  `mejorarPigmentacionCara` varchar(2) DEFAULT NULL,
  `disminuirSurcosNasogenianos` varchar(2) DEFAULT NULL,
  `disminuirSurcosMarioneta` varchar(2) DEFAULT NULL,
  `disminuisLineasExpresion` varchar(2) DEFAULT NULL,
  `patasGallina` varchar(2) DEFAULT NULL,
  `frente` varchar(2) DEFAULT NULL,
  `ceno` varchar(2) DEFAULT NULL,
  `secuelasAcne` varchar(2) DEFAULT NULL,
  `mejorarPielCara` varchar(2) DEFAULT NULL,
  `mejorarFlacidezCuello` varchar(2) DEFAULT NULL,
  `depilacionLaser` varchar(2) DEFAULT NULL,
  `mejorarRitidesLabioS` varchar(2) DEFAULT NULL,
  `mejorarPigmentacionSurcosN` varchar(2) DEFAULT NULL,
  `mejorarArrugasParpadoI` varchar(2) DEFAULT NULL,
  `mejorarEntrecejo` varchar(2) DEFAULT NULL,
  `mejorarCodigoBarras` varchar(2) DEFAULT NULL,
  `corregirManchasCara` varchar(2) DEFAULT NULL,
  `revisionPorSistemas` varchar(2000) DEFAULT NULL,
  `aumentarSenos` varchar(2) DEFAULT NULL,
  `disminuirSenos` varchar(2) DEFAULT NULL,
  `levantamientoSenos` varchar(2) DEFAULT NULL,
  `cambiarImplantesSenos` varchar(2) DEFAULT NULL,
  `mejorarCicatricesMamoplastia` varchar(2) DEFAULT NULL,
  `tallaAproximadaDesea` varchar(10) DEFAULT NULL,
  `enfermedadActual` varchar(200) DEFAULT NULL,
  `reseccionNevusCara` varchar(2) DEFAULT NULL,
  `reseccionNevusCuerpo` varchar(2) DEFAULT NULL,
  `corregirLobulosHendidos` varchar(2) DEFAULT NULL,
  `mejorarCalidadCicatriz` varchar(2) DEFAULT NULL,
  `brochureTNQ` varchar(200) DEFAULT NULL,
  `otros` varchar(100) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `mejorarCicatrizAbdomen` varchar(2) DEFAULT NULL,
  `mejorarCicatrizCara` varchar(2) DEFAULT NULL,
  `reseccionNevusComentario` varchar(100) DEFAULT NULL,
  `imagenesAportadas` varchar(100) DEFAULT NULL,
  `excesoPielParpadoSuperior` varchar(2) DEFAULT NULL,
  `bolsasParpadoInferior` varchar(2) DEFAULT NULL,
  `flacidezParpadoInferior` varchar(2) DEFAULT NULL,
  `mejorarLineasExpresion` varchar(2) DEFAULT NULL,
  `elevarCejas` varchar(2) DEFAULT NULL,
  `aumentarProyeccionMenton` varchar(2) DEFAULT NULL,
  `mejorarEsteticaNariz` varchar(2) DEFAULT NULL,
  `mejorarSecuelasRino` varchar(2) DEFAULT NULL,
  `mejorarCuadroObstructivo` varchar(2) DEFAULT NULL,
  `respiraBien` varchar(2) DEFAULT NULL,
  `respiraMal` varchar(2) DEFAULT NULL,
  `FND` varchar(2) DEFAULT NULL,
  `FNI` varchar(2) DEFAULT NULL,
  `ambas` varchar(2) DEFAULT NULL,
  `abdomenColgante` varchar(2) DEFAULT NULL,
  `flacidezAbdominal` varchar(10) DEFAULT NULL,
  `striaeDistensae` varchar(10) DEFAULT NULL,
  `diastasisRectos` varchar(10) DEFAULT NULL,
  `gigantomastia` varchar(2) DEFAULT NULL,
  `tamanoSenos` varchar(10) DEFAULT NULL,
  `ptosis` varchar(10) DEFAULT NULL,
  `asimetriaFormaTamano` varchar(10) DEFAULT NULL,
  `acumulacionGrasa` varchar(150) DEFAULT NULL,
  `celulitis` varchar(100) DEFAULT NULL,
  `flacidezEnfrenteA` varchar(150) DEFAULT NULL,
  `blefachalasisPS` varchar(2) DEFAULT NULL,
  `cojinesAdipososPS` varchar(2) DEFAULT NULL,
  `blefachalasisPI` varchar(2) DEFAULT NULL,
  `cojinesAdipososPI` varchar(2) DEFAULT NULL,
  `asimetria` varchar(10) DEFAULT NULL,
  `ojerasHiperpigmentadas` varchar(2) DEFAULT NULL,
  `surcoNasoyugalPronunciado` varchar(2) DEFAULT NULL,
  `flacidezTarsal` varchar(2) DEFAULT NULL,
  `secuelasAcneMotivoC` varchar(2) DEFAULT NULL,
  `gibaOsteocartilaginosa` varchar(2) DEFAULT NULL,
  `laterorinia` varchar(2) DEFAULT NULL,
  `malaDefinicionPunta` varchar(2) DEFAULT NULL,
  `malaProyeccionPunta` varchar(2) DEFAULT NULL,
  `ptosisPunta` varchar(2) DEFAULT NULL,
  `asimetriaPunta` varchar(2) DEFAULT NULL,
  `pielGruesa` varchar(2) DEFAULT NULL,
  `alasGruesas` varchar(2) DEFAULT NULL,
  `fosasAmplias` varchar(2) DEFAULT NULL,
  `asimetriaFosasNasales` varchar(2) DEFAULT NULL,
  `deflexionSeptal` varchar(2) DEFAULT NULL,
  `hipertrofiaCornetes` varchar(2) DEFAULT NULL,
  `hipoplasiaMenton` varchar(2) DEFAULT NULL,
  `lineaExpresionPronunciadas` varchar(15) DEFAULT NULL,
  `fotodano` varchar(10) DEFAULT NULL,
  `protesisColaCeja` varchar(10) DEFAULT NULL,
  `cojinMalar` varchar(10) DEFAULT NULL,
  `flacidezCara` varchar(10) DEFAULT NULL,
  `flacidezCuello` varchar(10) DEFAULT NULL,
  `jowlsPronunciados` varchar(10) DEFAULT NULL,
  `surcosNasogenianos` varchar(10) DEFAULT NULL,
  `surcosMarioneta` varchar(10) DEFAULT NULL,
  `codigoBarrasLabios` varchar(10) DEFAULT NULL,
  `hiperpigmentacionCara` varchar(10) DEFAULT NULL,
  `secuelasAcneExamenF` varchar(10) DEFAULT NULL,
  `codigoBarras` varchar(10) DEFAULT NULL,
  `flacidezEnfrenteR` varchar(150) DEFAULT NULL,
  `tipoPiel` varchar(20) DEFAULT NULL,
  `surcos` varchar(100) DEFAULT NULL,
  `fotodanoCalidadPiel` varchar(100) DEFAULT NULL,
  `ritides` varchar(50) DEFAULT NULL,
  `manchas` varchar(50) DEFAULT NULL,
  `telangiectasias` varchar(10) DEFAULT NULL,
  `telangiectasiasDesc` varchar(100) DEFAULT NULL,
  `cicatrices` varchar(100) DEFAULT NULL,
  `cicatrizHipertrofica` varchar(100) DEFAULT NULL,
  `cicatrizQueloide` varchar(100) DEFAULT NULL,
  `areaCicatriz` varchar(100) DEFAULT NULL,
  `otrasCicatrices` varchar(100) DEFAULT NULL,
  `masas` varchar(100) DEFAULT NULL,
  `malaDefinicionAntihelix` varchar(10) DEFAULT NULL,
  `hipertrofiaConcha` varchar(10) DEFAULT NULL,
  `asimetriaOrejas` varchar(10) DEFAULT NULL,
  `deformidades` varchar(100) DEFAULT NULL,
  `tratamientoSeRealizara` int(11) DEFAULT NULL,
  `cirugiaPostparto` varchar(2) DEFAULT NULL,
  `lipoesculturaAsistida` varchar(2) DEFAULT NULL,
  `lipoinyeccion` varchar(2) DEFAULT NULL,
  `abdominoplastia` varchar(2) DEFAULT NULL,
  `mamoplastiaAumento` varchar(2) DEFAULT NULL,
  `cambioImplantes` varchar(2) DEFAULT NULL,
  `mamoplastiaReduccion` varchar(2) DEFAULT NULL,
  `pexiaMamaria` varchar(2) DEFAULT NULL,
  `pexiaMamariaOpciones` varchar(150) DEFAULT NULL,
  `gluteoplastiaImplantes` varchar(2) DEFAULT NULL,
  `rinoplastia` varchar(2) DEFAULT NULL,
  `rinoplastiaOpc` varchar(25) DEFAULT NULL,
  `mentoplastia` varchar(2) DEFAULT NULL,
  `otoplastia` varchar(2) DEFAULT NULL,
  `blefaroplastia` varchar(2) DEFAULT NULL,
  `blefaroplastiaOpc` varchar(10) DEFAULT NULL,
  `ritidoplastia` varchar(2) DEFAULT NULL,
  `lipoinyeccionSurcos` varchar(2) DEFAULT NULL,
  `bichectomia` varchar(2) DEFAULT NULL,
  `dermoabrasionLabioSuperior` varchar(2) DEFAULT NULL,
  `acidoHialuronico` varchar(2) DEFAULT NULL,
  `botox` varchar(30) DEFAULT NULL,
  `idTratamientosPropuestos` int(11) DEFAULT NULL,
  `cicatricesExtensas` varchar(2) DEFAULT NULL,
  `ombligoFormaDiferida` varchar(2) DEFAULT NULL,
  `asimetriaPreexistente` varchar(50) DEFAULT NULL,
  `acumulosGrasosAbdomen` varchar(2) DEFAULT NULL,
  `noAbdominoplastia` varchar(2) DEFAULT NULL,
  `persistenciaAcumulosGrasos` varchar(2) DEFAULT NULL,
  `persistenciaAlgunasEstrias` varchar(2) DEFAULT NULL,
  `persistirFlacidez` varchar(50) DEFAULT NULL,
  `mejoriaParcial` varchar(50) DEFAULT NULL,
  `interpretacionAreasPaciente` varchar(2) DEFAULT NULL,
  `marcacionAbdominales` varchar(2) DEFAULT NULL,
  `aumentoProyeccionGluteos` varchar(2) DEFAULT NULL,
  `escurrimientoSenos` varchar(2) DEFAULT NULL,
  `persistirAsimetrias` varchar(2) DEFAULT NULL,
  `dispositivosAprobacionInvima` varchar(2) DEFAULT NULL,
  `fotografiasParaDescribir` varchar(2) DEFAULT NULL,
  `calidadCicatriz` varchar(2) DEFAULT NULL,
  `presenciaMalaCicatrizacion` varchar(2) DEFAULT NULL,
  `cambiosSensibilidadPiel` varchar(2) DEFAULT NULL,
  `asimetriaDesviacionNariz` varchar(2) DEFAULT NULL,
  `asimetriaFosasNasales_copy1` varchar(2) DEFAULT NULL,
  `laboratoriosPrequirurgicos` varchar(2) DEFAULT NULL,
  `laboratoriosPrequirurgicosOpc` varchar(100) DEFAULT NULL,
  `autorizacionTecnicaCirugia` varchar(2) DEFAULT NULL,
  `indicacionAsistente` varchar(300) DEFAULT NULL,
  `implantesProbables` varchar(100) DEFAULT NULL,
  `documentoListaChequeo` longblob,
  `documentoContrato` longblob,
  `documentoConsentimientos` longblob,
  `documentoInformacionComplicaciones` longblob,
  `documentoDescripcionesQuirurgicas` longblob,
  `DatosBasicosPacientes_idPaciente` int(20) NOT NULL,
  `DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HistoriaClinicaPreliminar`
--

CREATE TABLE IF NOT EXISTS `HistoriaClinicaPreliminar` (
  `idhistoriaClinicaPreliminar` int(11) NOT NULL,
  `idPaciente` int(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `secuelasPrevias` varchar(2) DEFAULT NULL,
  `mejorarContornoCorporal` varchar(2) DEFAULT NULL,
  `mejorarFlacidezAbdomen` varchar(2) DEFAULT NULL,
  `aumentarProyeccionGluteos` varchar(2) DEFAULT NULL,
  `mejorarCicatrizLipectomia` varchar(2) DEFAULT NULL,
  `mejorarCelulitis` varchar(2) DEFAULT NULL,
  `disminuirEstriasAbdomen` varchar(45) DEFAULT NULL,
  `deseaTenerHijos` varchar(2) DEFAULT NULL,
  `mejorarAspectoOrejas` varchar(2) DEFAULT NULL,
  `areasMayorInteres` varchar(100) DEFAULT NULL,
  `mejorarPigmentacionCara` varchar(2) DEFAULT NULL,
  `disminuirSurcosNasogenianos` varchar(2) DEFAULT NULL,
  `disminuirSurcosMarioneta` varchar(2) DEFAULT NULL,
  `disminuisLineasExpresion` varchar(2) DEFAULT NULL,
  `patasGallina` varchar(2) DEFAULT NULL,
  `frente` varchar(2) DEFAULT NULL,
  `ceno` varchar(2) DEFAULT NULL,
  `secuelasAcne` varchar(2) DEFAULT NULL,
  `mejorarPielCara` varchar(2) DEFAULT NULL,
  `mejorarFlacidezCuello` varchar(2) DEFAULT NULL,
  `depilacionLaser` varchar(2) DEFAULT NULL,
  `mejorarRitidesLabioS` varchar(2) DEFAULT NULL,
  `mejorarPigmentacionSurcosN` varchar(2) DEFAULT NULL,
  `mejorarArrugasParpadoI` varchar(2) DEFAULT NULL,
  `mejorarEntrecejo` varchar(2) DEFAULT NULL,
  `mejorarCodigoBarras` varchar(2) DEFAULT NULL,
  `corregirManchasCara` varchar(2) DEFAULT NULL,
  `revisionPorSistemas` varchar(2000) DEFAULT NULL,
  `aumentarSenos` varchar(2) DEFAULT NULL,
  `disminuirSenos` varchar(2) DEFAULT NULL,
  `levantamientoSenos` varchar(2) DEFAULT NULL,
  `cambiarImplantesSenos` varchar(2) DEFAULT NULL,
  `mejorarCicatricesMamoplastia` varchar(2) DEFAULT NULL,
  `tallaAproximadaDesea` varchar(10) DEFAULT NULL,
  `enfermedadActual` varchar(200) DEFAULT NULL,
  `reseccionNevusCara` varchar(2) DEFAULT NULL,
  `reseccionNevusCuerpo` varchar(2) DEFAULT NULL,
  `corregirLobulosHendidos` varchar(2) DEFAULT NULL,
  `mejorarCalidadCicatriz` varchar(2) DEFAULT NULL,
  `brochureTNQ` varchar(200) DEFAULT NULL,
  `otros` varchar(100) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `mejorarCicatrizAbdomen` varchar(2) DEFAULT NULL,
  `mejorarCicatrizCara` varchar(2) DEFAULT NULL,
  `reseccionNevusComentario` varchar(100) DEFAULT NULL,
  `imagenesAportadas` varchar(100) DEFAULT NULL,
  `excesoPielParpadoSuperior` varchar(2) DEFAULT NULL,
  `bolsasParpadoInferior` varchar(2) DEFAULT NULL,
  `flacidezParpadoInferior` varchar(2) DEFAULT NULL,
  `mejorarLineasExpresion` varchar(2) DEFAULT NULL,
  `elevarCejas` varchar(2) DEFAULT NULL,
  `aumentarProyeccionMenton` varchar(2) DEFAULT NULL,
  `mejorarEsteticaNariz` varchar(2) DEFAULT NULL,
  `mejorarSecuelasRino` varchar(2) DEFAULT NULL,
  `mejorarCuadroObstructivo` varchar(2) DEFAULT NULL,
  `respiraBien` varchar(2) DEFAULT NULL,
  `respiraMal` varchar(2) DEFAULT NULL,
  `FND` varchar(2) DEFAULT NULL,
  `FNI` varchar(2) DEFAULT NULL,
  `ambas` varchar(2) DEFAULT NULL,
  `abdomenColgante` varchar(2) DEFAULT NULL,
  `flacidezAbdominal` varchar(10) DEFAULT NULL,
  `striaeDistensae` varchar(10) DEFAULT NULL,
  `diastasisRectos` varchar(10) DEFAULT NULL,
  `gigantomastia` varchar(2) DEFAULT NULL,
  `tamanoSenos` varchar(10) DEFAULT NULL,
  `ptosis` varchar(10) DEFAULT NULL,
  `asimetriaFormaTamano` varchar(10) DEFAULT NULL,
  `acumulacionGrasa` varchar(150) DEFAULT NULL,
  `celulitis` varchar(100) DEFAULT NULL,
  `flacidezEnfrenteA` varchar(150) DEFAULT NULL,
  `blefachalasisPS` varchar(2) DEFAULT NULL,
  `cojinesAdipososPS` varchar(2) DEFAULT NULL,
  `blefachalasisPI` varchar(2) DEFAULT NULL,
  `cojinesAdipososPI` varchar(2) DEFAULT NULL,
  `asimetria` varchar(10) DEFAULT NULL,
  `ojerasHiperpigmentadas` varchar(2) DEFAULT NULL,
  `surcoNasoyugalPronunciado` varchar(2) DEFAULT NULL,
  `flacidezTarsal` varchar(2) DEFAULT NULL,
  `secuelasAcneMotivoC` varchar(2) DEFAULT NULL,
  `gibaOsteocartilaginosa` varchar(2) DEFAULT NULL,
  `laterorinia` varchar(2) DEFAULT NULL,
  `malaDefinicionPunta` varchar(2) DEFAULT NULL,
  `malaProyeccionPunta` varchar(2) DEFAULT NULL,
  `ptosisPunta` varchar(2) DEFAULT NULL,
  `asimetriaPunta` varchar(2) DEFAULT NULL,
  `pielGruesa` varchar(2) DEFAULT NULL,
  `alasGruesas` varchar(2) DEFAULT NULL,
  `fosasAmplias` varchar(2) DEFAULT NULL,
  `asimetriaFosasNasales` varchar(2) DEFAULT NULL,
  `deflexionSeptal` varchar(2) DEFAULT NULL,
  `hipertrofiaCornetes` varchar(2) DEFAULT NULL,
  `hipoplasiaMenton` varchar(2) DEFAULT NULL,
  `lineaExpresionPronunciadas` varchar(15) DEFAULT NULL,
  `fotodano` varchar(10) DEFAULT NULL,
  `protesisColaCeja` varchar(10) DEFAULT NULL,
  `cojinMalar` varchar(10) DEFAULT NULL,
  `flacidezCara` varchar(10) DEFAULT NULL,
  `flacidezCuello` varchar(10) DEFAULT NULL,
  `jowlsPronunciados` varchar(10) DEFAULT NULL,
  `surcosNasogenianos` varchar(10) DEFAULT NULL,
  `surcosMarioneta` varchar(10) DEFAULT NULL,
  `codigoBarrasLabios` varchar(10) DEFAULT NULL,
  `hiperpigmentacionCara` varchar(10) DEFAULT NULL,
  `secuelasAcneExamenF` varchar(10) DEFAULT NULL,
  `codigoBarras` varchar(10) DEFAULT NULL,
  `flacidezEnfrenteR` varchar(150) DEFAULT NULL,
  `tipoPiel` varchar(20) DEFAULT NULL,
  `surcos` varchar(100) DEFAULT NULL,
  `fotodanoCalidadPiel` varchar(100) DEFAULT NULL,
  `ritides` varchar(50) DEFAULT NULL,
  `manchas` varchar(50) DEFAULT NULL,
  `telangiectasias` varchar(10) DEFAULT NULL,
  `telangiectasiasDesc` varchar(100) DEFAULT NULL,
  `cicatrices` varchar(100) DEFAULT NULL,
  `cicatrizHipertrofica` varchar(100) DEFAULT NULL,
  `cicatrizQueloide` varchar(100) DEFAULT NULL,
  `areaCicatriz` varchar(100) DEFAULT NULL,
  `otrasCicatrices` varchar(100) DEFAULT NULL,
  `masas` varchar(100) DEFAULT NULL,
  `malaDefinicionAntihelix` varchar(10) DEFAULT NULL,
  `hipertrofiaConcha` varchar(10) DEFAULT NULL,
  `asimetriaOrejas` varchar(10) DEFAULT NULL,
  `deformidades` varchar(100) DEFAULT NULL,
  `tratamientoSeRealizara` int(11) DEFAULT NULL,
  `cirugiaPostparto` varchar(2) DEFAULT NULL,
  `lipoesculturaAsistida` varchar(2) DEFAULT NULL,
  `lipoinyeccion` varchar(2) DEFAULT NULL,
  `abdominoplastia` varchar(2) DEFAULT NULL,
  `mamoplastiaAumento` varchar(2) DEFAULT NULL,
  `cambioImplantes` varchar(2) DEFAULT NULL,
  `mamoplastiaReduccion` varchar(2) DEFAULT NULL,
  `pexiaMamaria` varchar(2) DEFAULT NULL,
  `pexiaMamariaOpciones` varchar(150) DEFAULT NULL,
  `gluteoplastiaImplantes` varchar(2) DEFAULT NULL,
  `rinoplastia` varchar(2) DEFAULT NULL,
  `rinoplastiaOpc` varchar(25) DEFAULT NULL,
  `mentoplastia` varchar(2) DEFAULT NULL,
  `otoplastia` varchar(2) DEFAULT NULL,
  `blefaroplastia` varchar(2) DEFAULT NULL,
  `blefaroplastiaOpc` varchar(10) DEFAULT NULL,
  `ritidoplastia` varchar(2) DEFAULT NULL,
  `lipoinyeccionSurcos` varchar(2) DEFAULT NULL,
  `bichectomia` varchar(2) DEFAULT NULL,
  `dermoabrasionLabioSuperior` varchar(2) DEFAULT NULL,
  `acidoHialuronico` varchar(2) DEFAULT NULL,
  `botox` varchar(30) DEFAULT NULL,
  `idTratamientosPropuestos` int(11) DEFAULT NULL,
  `cicatricesExtensas` varchar(2) DEFAULT NULL,
  `ombligoFormaDiferida` varchar(2) DEFAULT NULL,
  `asimetriaPreexistente` varchar(50) DEFAULT NULL,
  `acumulosGrasosAbdomen` varchar(2) DEFAULT NULL,
  `noAbdominoplastia` varchar(2) DEFAULT NULL,
  `persistenciaAcumulosGrasos` varchar(2) DEFAULT NULL,
  `persistenciaAlgunasEstrias` varchar(2) DEFAULT NULL,
  `persistirFlacidez` varchar(50) DEFAULT NULL,
  `mejoriaParcial` varchar(50) DEFAULT NULL,
  `interpretacionAreasPaciente` varchar(2) DEFAULT NULL,
  `marcacionAbdominales` varchar(2) DEFAULT NULL,
  `aumentoProyeccionGluteos` varchar(2) DEFAULT NULL,
  `escurrimientoSenos` varchar(2) DEFAULT NULL,
  `persistirAsimetrias` varchar(2) DEFAULT NULL,
  `dispositivosAprobacionInvima` varchar(2) DEFAULT NULL,
  `fotografiasParaDescribir` varchar(2) DEFAULT NULL,
  `calidadCicatriz` varchar(2) DEFAULT NULL,
  `presenciaMalaCicatrizacion` varchar(2) DEFAULT NULL,
  `cambiosSensibilidadPiel` varchar(2) DEFAULT NULL,
  `asimetriaDesviacionNariz` varchar(2) DEFAULT NULL,
  `asimetriaFosasNasales_copy1` varchar(2) DEFAULT NULL,
  `laboratoriosPrequirurgicos` varchar(2) DEFAULT NULL,
  `laboratoriosPrequirurgicosOpc` varchar(100) DEFAULT NULL,
  `autorizacionTecnicaCirugia` varchar(2) DEFAULT NULL,
  `indicacionAsistente` varchar(300) DEFAULT NULL,
  `implantesProbables` varchar(100) DEFAULT NULL,
  `DatosBasicosPacientes_idPaciente` int(20) NOT NULL,
  `DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ImplementosUsados`
--

CREATE TABLE IF NOT EXISTS `ImplementosUsados` (
  `idImplementosUsados` int(11) NOT NULL,
  `idPaciente` int(20) DEFAULT NULL,
  `idInventario` int(11) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `cantidad` varchar(50) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `Inventario_idInventarioImplantesConsumibles` int(11) NOT NULL,
  `DatosBasicosPacientes_idPaciente` int(20) NOT NULL,
  `DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Inventario`
--

CREATE TABLE IF NOT EXISTS `Inventario` (
  `idInventario` int(11) NOT NULL,
  `codigoProducto` int(11) NOT NULL,
  `tipoProducto` varchar(20) DEFAULT NULL,
  `nombreProducto` varchar(50) DEFAULT NULL,
  `precio` varchar(50) DEFAULT NULL,
  `costo` varchar(50) DEFAULT NULL,
  `cantidad` varchar(50) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `fechaModificacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LiquidosAdministradosEliminados`
--

CREATE TABLE IF NOT EXISTS `LiquidosAdministradosEliminados` (
  `idLiquidosAdministradosEliminados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ListaChequeo`
--

CREATE TABLE IF NOT EXISTS `ListaChequeo` (
  `idListaChequeo` int(11) NOT NULL,
  `idPaciente` int(20) DEFAULT NULL,
  `tieneFechaCirugia` varchar(2) DEFAULT NULL,
  `programoCirulaser` varchar(2) DEFAULT NULL,
  `hizoRCQ` varchar(2) DEFAULT NULL,
  `tieneLaboratorios` varchar(2) DEFAULT NULL,
  `tieneCitaPreanestesia` varchar(2) DEFAULT NULL,
  `asistioPreanestesia` varchar(2) DEFAULT NULL,
  `tieneInformacionVuelo` varchar(2) DEFAULT NULL,
  `alojarseConNosotros` varchar(2) DEFAULT NULL,
  `DatosBasicosPacientes_idPaciente` int(20) NOT NULL,
  `DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ListaSeguimientos`
--

CREATE TABLE IF NOT EXISTS `ListaSeguimientos` (
  `idListaSeguimientos` int(11) NOT NULL,
  `idPaciente` int(20) DEFAULT NULL,
  `prioridadProspectos` tinyint(1) DEFAULT NULL,
  `seguimientosAnteriores` varchar(100) DEFAULT NULL,
  `proximoSeguimiento` date DEFAULT NULL,
  `comentarioPrivado` varchar(500) DEFAULT NULL,
  `comentarioresAnterioresFuturos` varchar(500) DEFAULT NULL,
  `fechaProbableCirugia` date DEFAULT NULL,
  `fechaProbableTNQ` date DEFAULT NULL,
  `pacienteCirugia` varchar(30) DEFAULT NULL,
  `opcionesVarias` varchar(40) DEFAULT NULL,
  `opcionesVariasDes` varchar(200) DEFAULT NULL,
  `enviarCorreo` varchar(2) DEFAULT NULL,
  `DatosBasicosPacientes_idPaciente` int(20) NOT NULL,
  `DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Medicamentos`
--

CREATE TABLE IF NOT EXISTS `Medicamentos` (
  `idMedicamento` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `dosis` varchar(100) DEFAULT NULL,
  `cantidad` varchar(50) DEFAULT NULL,
  `nota` varchar(200) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `presentacion` varchar(30) DEFAULT NULL,
  `frecuencia` varchar(50) DEFAULT NULL,
  `viaAdministracion` varchar(20) DEFAULT NULL,
  `duracion` varchar(50) DEFAULT NULL,
  `ubicacion` varchar(50) DEFAULT NULL,
  `lote` varchar(50) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PacienteConProblemas`
--

CREATE TABLE IF NOT EXISTS `PacienteConProblemas` (
  `idPacienteConProblemas` int(11) NOT NULL,
  `idPaciente` int(20) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `fechaCirugia` date DEFAULT NULL,
  `cirugiaRealizada` varchar(2) DEFAULT NULL,
  `problema` varchar(500) DEFAULT NULL,
  `solucionPlanteada` varchar(500) DEFAULT NULL,
  `fechaSolucion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PlanReferidosEspecialistas`
--

CREATE TABLE IF NOT EXISTS `PlanReferidosEspecialistas` (
  `idPlanReferidosEspecialistas` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `medicoReferido` varchar(45) DEFAULT NULL,
  `tratamientoPropuestoFelipeAmaya` varchar(45) DEFAULT NULL,
  `tratamientoRealizado` varchar(45) DEFAULT NULL,
  `sesionesSugeridas` varchar(45) DEFAULT NULL,
  `sesionesRealizadas` varchar(45) DEFAULT NULL,
  `equipoUtilizado` varchar(45) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  `valorPagadoMedicoReferido` varchar(45) DEFAULT NULL,
  `participacion` varchar(45) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Plantillas`
--

CREATE TABLE IF NOT EXISTS `Plantillas` (
  `idPlantilla` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridad`
--

CREATE TABLE IF NOT EXISTS `prioridad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prioridad`
--

INSERT INTO `prioridad` (`id`, `nombre`) VALUES
(1, 'Prioritaria'),
(2, 'No Prioritaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ProcedimientosVisita`
--

CREATE TABLE IF NOT EXISTS `ProcedimientosVisita` (
  `idProcedimientoVisita` int(11) NOT NULL,
  `idPaciente` int(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `drenajeManual` varchar(2) DEFAULT NULL,
  `retiranPuntos` varchar(2) DEFAULT NULL,
  `retiraPuntoCausaReaccion` varchar(2) DEFAULT NULL,
  `cambianVendajes` varchar(2) DEFAULT NULL,
  `drenaColeccion` varchar(2) DEFAULT NULL,
  `volumen` varchar(50) DEFAULT NULL,
  `revisionQuirurgicaCicatriz` varchar(2) DEFAULT NULL,
  `neoumbilicoplastia` varchar(2) DEFAULT NULL,
  `infiltraCicatrizCorticoide` varchar(2) DEFAULT NULL,
  `infiltraCicatrizFluouro` varchar(2) DEFAULT NULL,
  `lavaBolsilloSolucionDakin` varchar(2) DEFAULT NULL,
  `cantidadSolucion` varchar(50) DEFAULT NULL,
  `lavaBolsilloSSN` varchar(2) DEFAULT NULL,
  `cantidadSSN` varchar(50) DEFAULT NULL,
  `relleno` int(11) DEFAULT NULL,
  `toxinaBotulinica` int(11) DEFAULT NULL,
  `sesionVenusFreeze` varchar(2) DEFAULT NULL,
  `sesionIPL` varchar(2) DEFAULT NULL,
  `sesionUltrasonido` varchar(2) DEFAULT NULL,
  `sesionMicrodermoabrasion` varchar(2) DEFAULT NULL,
  `sesionHydrafacial` varchar(2) DEFAULT NULL,
  `idTratamientoNoQuirurgico` int(11) DEFAULT NULL,
  `tratamientoRealizadoPor` varchar(50) DEFAULT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `indicaSuspender` varchar(200) DEFAULT NULL,
  `indicaRealizarMasaje` varchar(2) DEFAULT NULL,
  `continuarMasajePostquirurgico` varchar(2) DEFAULT NULL,
  `formulanSesionesUltrasonido` varchar(2) DEFAULT NULL,
  `colocaCaja` varchar(2) DEFAULT NULL,
  `retiraFaja` varchar(2) DEFAULT NULL,
  `remitePara` varchar(2) DEFAULT NULL,
  `remiteParaTNQ` varchar(2) DEFAULT NULL,
  `colocaEspumaCompresiva` varchar(2) DEFAULT NULL,
  `colocaTabla` varchar(2) DEFAULT NULL,
  `colocaBandaEstabilizadora` varchar(2) DEFAULT NULL,
  `solicitanImagenesDiagnosticas` varchar(2) DEFAULT NULL,
  `seFormula` varchar(2) DEFAULT NULL,
  `continuaEsquemaAntibiotico` varchar(2) DEFAULT NULL,
  `citaControlesDiarios` varchar(2) DEFAULT NULL,
  `citaControl` varchar(2) DEFAULT NULL,
  `citaPeriodicamente` varchar(2) DEFAULT NULL,
  `citaPeriodicamenteComentario` varchar(300) DEFAULT NULL,
  `citaCuracion` varchar(2) DEFAULT NULL,
  `insisteDeambulacionFrecuente` varchar(2) DEFAULT NULL,
  `indicacionesSignosAlarma` varchar(2) DEFAULT NULL,
  `citaConsultorio` varchar(2) DEFAULT NULL,
  `asistirInmadiatoUrgencias` varchar(2) DEFAULT NULL,
  `remiteServicioUrgencias` varchar(2) DEFAULT NULL,
  `controlRealizadoPor` varchar(50) DEFAULT NULL,
  `remitirOtroEspecialista` varchar(2) DEFAULT NULL,
  `nutricion` varchar(2) DEFAULT NULL,
  `depilee` varchar(2) DEFAULT NULL,
  `dermatologia` varchar(2) DEFAULT NULL,
  `cardiologia` varchar(2) DEFAULT NULL,
  `gastroenterologia` varchar(2) DEFAULT NULL,
  `reumatologia` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RespuestasPaciente`
--

CREATE TABLE IF NOT EXISTS `RespuestasPaciente` (
  `idRespuestasPaciente` int(11) NOT NULL,
  `idPaciente` int(20) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `deseaMejorar` varchar(200) DEFAULT NULL,
  `areasMolestan` varchar(200) DEFAULT NULL,
  `mejorarOtraZona` varchar(200) DEFAULT NULL,
  `tratamientosNoQuirurgicos` varchar(200) DEFAULT NULL,
  `cirugiasEsteticasPrevias` varchar(200) DEFAULT NULL,
  `cirugiaNoEstetica` varchar(200) DEFAULT NULL,
  `algunaEnfermedad` varchar(200) DEFAULT NULL,
  `autorizaEnvioInformacion` varchar(2) DEFAULT NULL,
  `enfermedadesCorazon` varchar(2) DEFAULT NULL,
  `enfermedadesCorazonCual` varchar(200) DEFAULT NULL,
  `enfermedadesPulmones` varchar(2) DEFAULT NULL,
  `enfermedadesPulmonesCual` varchar(200) DEFAULT NULL,
  `presionArterial` varchar(2) DEFAULT NULL,
  `ritmoCardiaco` varchar(2) DEFAULT NULL,
  `asma` varchar(2) DEFAULT NULL,
  `tos` varchar(2) DEFAULT NULL,
  `gripaUltimaSemana` varchar(2) DEFAULT NULL,
  `dolorPechoEscaleras` varchar(2) DEFAULT NULL,
  `dolorPechoPlano` varchar(2) DEFAULT NULL,
  `diabetes` varchar(2) DEFAULT NULL,
  `tiroides` varchar(2) DEFAULT NULL,
  `viveBogota` varchar(2) DEFAULT NULL,
  `diasLlevaBogota` varchar(50) DEFAULT NULL,
  `hepatitis` varchar(20) DEFAULT NULL,
  `estomago` varchar(2) DEFAULT NULL,
  `estrenimiento` varchar(2) DEFAULT NULL,
  `sangradoDientes` varchar(2) DEFAULT NULL,
  `tenidoTrombos` varchar(2) DEFAULT NULL,
  `enfermedadRinones` varchar(2) DEFAULT NULL,
  `alegicoMedicamentos` varchar(2) DEFAULT NULL,
  `alergicoMedicamentosCuales` varchar(200) DEFAULT NULL,
  `moverExtremidad` varchar(2) DEFAULT NULL,
  `dolorEspalda` varchar(2) DEFAULT NULL,
  `otrasEnfermedades` varchar(2) DEFAULT NULL,
  `otrasEnfermedadesCuales` varchar(200) DEFAULT NULL,
  `familiaresDiabetes` varchar(2) DEFAULT NULL,
  `familiaresTrombofilia` varchar(2) DEFAULT NULL,
  `familiaresCancerSeno` varchar(2) DEFAULT NULL,
  `familiaresCancerSenoCual` varchar(100) DEFAULT NULL,
  `medicamentosUltimosDias` varchar(2) DEFAULT NULL,
  `medicamentosUltimosDiasCual` varchar(100) DEFAULT NULL,
  `pastillasAjoCebolla` varchar(2) DEFAULT NULL,
  `multivitaminicos` varchar(2) DEFAULT NULL,
  `omega` varchar(2) DEFAULT NULL,
  `gingobiloba` varchar(2) DEFAULT NULL,
  `vitaminaE` varchar(2) DEFAULT NULL,
  `alkaseltzer` varchar(2) DEFAULT NULL,
  `analgesicos` varchar(2) DEFAULT NULL,
  `medicamentosAlternativos` varchar(2) DEFAULT NULL,
  `medicamentosAlternativosCuales` varchar(100) DEFAULT NULL,
  `RH` varchar(20) DEFAULT NULL,
  `transfusionesSangre` varchar(2) DEFAULT NULL,
  `transfusionesSangreCual` varchar(100) DEFAULT NULL,
  `botoxAnteriormente` varchar(2) DEFAULT NULL,
  `noQuirurgicosCara` varchar(20) DEFAULT NULL,
  `noQuirurgicosCaraOtro` varchar(100) DEFAULT NULL,
  `noQuirurgicosCuerpo` varchar(20) DEFAULT NULL,
  `noQuirurgicosCuerpoOtro` varchar(100) DEFAULT NULL,
  `tratamientoReduccion` varchar(2) DEFAULT NULL,
  `tratamientoReduccionCual` varchar(100) DEFAULT NULL,
  `biopolimeros` varchar(2) DEFAULT NULL,
  `biopolimerosArea` varchar(100) DEFAULT NULL,
  `acidoHialuronico` varchar(2) DEFAULT NULL,
  `acidoHialuronicoArea` varchar(100) DEFAULT NULL,
  `acidoHialuronicoCuando` varchar(100) DEFAULT NULL,
  `tratamientoManchas` varchar(100) DEFAULT NULL,
  `productosPielRostro` varchar(100) DEFAULT NULL,
  `protectorSolar` varchar(2) DEFAULT NULL,
  `alcohol` varchar(2) DEFAULT NULL,
  `fuma` varchar(2) DEFAULT NULL,
  `fumaCuantosDiarios` varchar(50) DEFAULT NULL,
  `fumaDesdeCuando` varchar(50) DEFAULT NULL,
  `fumo` varchar(2) DEFAULT NULL,
  `fumoCuantosDiarios` varchar(50) DEFAULT NULL,
  `fumoHastaCuando` varchar(50) DEFAULT NULL,
  `drogasPsicoactivas` varchar(2) DEFAULT NULL,
  `drogasPsicoactivasCuales` varchar(100) DEFAULT NULL,
  `encontrarseEmbarazada` varchar(2) DEFAULT NULL,
  `embarazosAnteriores` varchar(100) DEFAULT NULL,
  `partosAnteriores` varchar(100) DEFAULT NULL,
  `embarazosGemelares` varchar(2) DEFAULT NULL,
  `perdidasEspontaneas` varchar(2) DEFAULT NULL,
  `perdidasEspontaneasCuantas` varchar(100) DEFAULT NULL,
  `ultimoEmbarazo` varchar(100) DEFAULT NULL,
  `creeEstarEmbarazada` varchar(2) DEFAULT NULL,
  `ultimaMenstruacion` varchar(100) DEFAULT NULL,
  `lentesDeContacto` varchar(2) DEFAULT NULL,
  `dientesOProtesis` varchar(2) DEFAULT NULL,
  `dienteFlojo` varchar(2) DEFAULT NULL,
  `complicacionesConAnestesia` varchar(2) DEFAULT NULL,
  `complicacionesConAnestesiaCual` varchar(100) DEFAULT NULL,
  `quirurgicos` varchar(100) DEFAULT NULL,
  `medicos` varchar(100) DEFAULT NULL,
  `farmacologicos` varchar(100) DEFAULT NULL,
  `homeopaticos` varchar(100) DEFAULT NULL,
  `alergicos` varchar(100) DEFAULT NULL,
  `ginecoObstetricas` varchar(100) DEFAULT NULL,
  `ginecoObstetricasG` varchar(10) DEFAULT NULL,
  `ginecoObstetricasP` varchar(10) DEFAULT NULL,
  `ginecoObstetricasC` varchar(10) DEFAULT NULL,
  `ginecoObstetricasA` varchar(10) DEFAULT NULL,
  `ginecoObstetricasE` varchar(10) DEFAULT NULL,
  `ginecoObstetricasFur` varchar(10) DEFAULT NULL,
  `toxicologicas` varchar(50) DEFAULT NULL,
  `tabaquismo` varchar(50) DEFAULT NULL,
  `indicaSuspender` varchar(50) DEFAULT NULL,
  `otros` varchar(100) DEFAULT NULL,
  `signosVitalesNormales` varchar(10) DEFAULT NULL,
  `FrecuenciaCardiaca` varchar(10) DEFAULT NULL,
  `FrecuenciaRespiratoria` varchar(10) DEFAULT NULL,
  `TensionArterial` varchar(10) DEFAULT NULL,
  `DatosBasicosPacientes_idPaciente` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `payload` text,
  `last_activity` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `payload`, `last_activity`) VALUES
('00eca56e25821db56e1d24d1e5e3537bf78c5554', 'YToxMzp7czo1OiJmbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cDovL2xvY2FsaG9zdC9mYS9wdWJsaWMvZGFzaGJvYXJkIjt9czo2OiJfdG9rZW4iO3M6NDA6IkRMSVJ3SFFtMDBpejV1RUlXVjJEaHhJdkZWaVBaZGxPU1VObGNoZjMiO3M6NjoidGhlbWVzIjtzOjE2OiJzeGltby1saWdodC1ibHVlIjtzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjM4OiJodHRwOi8vbG9jYWxob3N0L2hjZmEvcHVibGljL2Rhc2hib2FyZCI7fXM6Mzg6ImxvZ2luXzgyZTVkMmM1NmJkZDA4MTEzMThmMGNmMDc4Yjc4YmZjIjtzOjE6IjEiO3M6MzoidWlkIjtzOjE6IjEiO3M6MzoiZ2lkIjtzOjE6IjEiO3M6MzoiZWlkIjtzOjE0OiJjc29sZXJAbHVrdS5jbyI7czoyOiJsbCI7czoxOToiMjAxNS0xMi0yMSAxMToxODo0MiI7czozOiJmaWQiO3M6MTI6IkNhbWlsbyBTb2xlciI7czo0OiJsYW5nIjtzOjI6ImVuIjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ1MDcwMDA0NjtzOjE6ImMiO2k6MTQ1MDY5NjcxODtzOjE6ImwiO3M6MToiMCI7fX0=', 1450700046);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SignosVitales`
--

CREATE TABLE IF NOT EXISTS `SignosVitales` (
  `idSignosVitales` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` varchar(50) DEFAULT NULL,
  `tensionArterial` varchar(50) DEFAULT NULL,
  `frecuenciaCardiaca` varchar(50) DEFAULT NULL,
  `saturacionSinOxigeno` varchar(50) DEFAULT NULL,
  `saturacionConOxigeno` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudAu`
--

CREATE TABLE IF NOT EXISTS `solicitudAu` (
  `id` int(11) NOT NULL,
  `fechaSolicitud` datetime NOT NULL,
  `tipoSolicitud` varchar(20) NOT NULL,
  `fechaEsperada` date NOT NULL,
  `observaciones` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitudAu`
--

INSERT INTO `solicitudAu` (`id`, `fechaSolicitud`, `tipoSolicitud`, `fechaEsperada`, `observaciones`, `timestamp`) VALUES
(8, '2015-10-02 14:47:49', 'Evento', '2015-11-02', '', '2015-10-03 00:47:52'),
(9, '2015-10-06 16:13:46', 'Evento', '2015-11-06', '', '2015-10-07 02:13:55'),
(10, '2015-11-18 07:29:53', 'Programa', '2015-12-18', '', '2015-10-07 20:34:07'),
(11, '2015-11-24 14:29:30', 'Evento', '2015-12-24', '', '2015-10-09 00:42:17'),
(12, '2015-10-08 14:42:41', 'Evento', '2015-11-08', '', '2015-10-09 00:42:43'),
(13, '2015-10-09 07:48:59', 'Evento', '2015-11-09', '', '2015-10-09 17:49:03'),
(14, '2015-10-09 09:52:40', 'Evento', '2015-11-09', '', '2015-10-09 19:52:42'),
(15, '2015-10-09 11:00:44', 'Programa', '2015-11-09', '', '2015-10-09 21:37:25'),
(16, '2015-10-14 12:02:56', 'Evento', '2015-11-14', '', '2015-10-14 22:03:01'),
(17, '2015-10-15 11:06:22', 'Evento', '2015-11-15', '', '2015-10-15 21:06:26'),
(18, '2015-10-16 10:26:59', 'Evento', '2015-11-16', '', '2015-10-16 20:27:02'),
(19, '2015-10-20 06:40:00', 'Evento', '2015-11-20', '', '2015-10-20 16:40:03'),
(20, '2015-10-27 11:20:32', 'Evento', '2015-11-27', '', '2015-10-27 21:20:35'),
(21, '2015-11-04 11:39:13', 'Evento', '2015-12-04', '', '2015-10-30 21:53:01'),
(22, '2015-11-17 13:39:51', 'Programa', '2015-12-17', '', '2015-11-06 21:35:42'),
(23, '2015-11-10 07:09:56', 'Evento', '2015-12-10', '', '2015-11-10 17:09:58'),
(24, '2015-11-12 14:02:42', 'Programa', '2015-12-12', '', '2015-11-13 00:02:47'),
(25, '2015-10-06 12:00:00', 'Programa', '2015-11-06', '', '2015-11-13 00:14:36'),
(26, '2015-11-12 14:43:15', 'Programa', '2015-12-12', '', '2015-11-13 00:43:26'),
(27, '2015-10-07 01:00:30', 'Programa', '2015-11-07', '', '2015-11-13 17:23:55'),
(28, '2015-10-07 10:30:14', 'Programa', '2015-11-07', '', '2015-11-13 17:31:42'),
(29, '2015-11-13 07:38:13', 'Programa', '2015-12-13', '', '2015-11-13 17:38:28'),
(30, '2015-11-13 07:41:01', 'Programa', '2015-12-13', '', '2015-11-13 17:41:05'),
(31, '2015-11-13 07:43:49', 'Programa', '2015-12-13', '', '2015-11-13 17:43:53'),
(32, '2015-11-13 14:05:51', 'Programa', '2015-12-13', '', '2015-11-14 00:07:19'),
(33, '2015-11-13 14:30:44', 'Programa', '2015-12-13', '', '2015-11-14 00:34:56'),
(34, '2015-10-07 11:00:55', 'Programa', '2015-11-07', '', '2015-11-17 21:33:35'),
(35, '2015-11-17 11:36:40', 'Programa', '2015-12-17', '', '2015-11-17 21:36:46'),
(36, '2015-11-17 13:40:04', 'Programa', '2015-12-17', '', '2015-11-17 23:40:07'),
(37, '2015-11-17 13:40:17', 'Programa', '2015-12-17', '', '2015-11-17 23:40:22'),
(38, '2015-11-17 15:18:58', 'Programa', '2015-12-17', '', '2015-11-18 01:19:02'),
(39, '2015-11-18 07:29:01', 'Programa', '2015-12-18', '', '2015-11-18 17:29:04'),
(40, '2015-11-18 07:31:17', 'Programa', '2015-12-18', '', '2015-11-18 17:31:20'),
(41, '2015-11-18 07:31:38', 'Programa', '2015-12-18', '', '2015-11-18 17:31:41'),
(42, '2015-11-18 07:31:58', 'Programa', '2015-12-18', '', '2015-11-18 17:32:03'),
(43, '2015-11-18 07:32:22', 'Programa', '2015-12-18', '', '2015-11-18 17:32:25'),
(44, '2015-11-18 08:01:10', 'Programa', '2015-12-18', '', '2015-11-18 18:01:14'),
(45, '2015-11-18 10:21:24', 'Programa', '2015-12-18', '', '2015-11-18 20:20:04'),
(46, '2015-11-18 10:33:21', 'Programa', '2015-12-18', '', '2015-11-18 20:33:24'),
(47, '2015-11-18 14:17:14', 'Programa', '2015-12-18', '', '2015-11-19 00:17:25'),
(48, '2015-11-18 14:39:21', 'Programa', '2015-12-18', '', '2015-11-19 00:39:28'),
(49, '2015-11-23 09:08:00', 'Programa', '2015-12-23', '', '2015-11-23 14:08:10'),
(50, '2015-11-23 11:57:08', 'Programa', '2015-12-23', '', '2015-11-23 16:57:13'),
(51, '2015-11-24 14:00:56', 'Evento', '2015-12-24', '', '2015-11-24 19:01:05'),
(52, '2015-11-24 15:07:14', 'Evento', '2015-12-24', '', '2015-11-24 20:07:19'),
(53, '2015-11-24 15:24:51', 'Evento', '2015-12-24', '', '2015-11-24 20:24:59'),
(54, '2015-11-24 15:40:25', 'Evento', '2015-12-24', '', '2015-11-24 20:40:30'),
(55, '2015-11-24 15:49:31', 'Evento', '2015-12-24', '', '2015-11-24 20:49:39'),
(56, '2015-11-24 16:20:15', 'Evento', '2015-12-24', '', '2015-11-24 21:20:43'),
(57, '2015-11-25 08:55:09', 'Programa', '2015-12-25', '', '2015-11-25 13:55:12'),
(58, '2015-11-25 09:23:18', 'Evento', '2015-12-25', '', '2015-11-25 14:23:21'),
(59, '2015-11-25 11:22:08', 'Evento', '2015-12-25', '', '2015-11-25 16:22:13'),
(60, '2015-12-03 07:42:02', 'Evento', '2016-01-03', '', '2015-12-03 12:42:07'),
(61, '2015-12-04 14:22:05', 'Evento', '2016-01-04', '', '2015-12-04 19:22:18'),
(62, '2015-12-11 10:53:02', 'Evento', '2016-01-11', '', '2015-12-11 15:53:10'),
(63, '2015-12-14 11:43:57', 'Programa', '2016-01-14', '', '2015-12-14 16:44:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tareas`
--

CREATE TABLE IF NOT EXISTS `Tareas` (
  `idTareas` int(11) NOT NULL,
  `idPaciente` int(20) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `idUsuarioAsignado` varchar(30) DEFAULT NULL,
  `creadoPor` varchar(45) DEFAULT NULL,
  `modificadoPor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_groups`
--

CREATE TABLE IF NOT EXISTS `tb_groups` (
  `group_id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `level` int(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_groups`
--

INSERT INTO `tb_groups` (`group_id`, `name`, `description`, `level`) VALUES
(1, 'Superadmin', 'Root Superadmin , should be as top level groups', 1),
(2, 'Gerencia', 'Con todas las posibilidades de la aplicación', 2),
(4, 'Secretaria', 'Ingreso de la información para la solicitud de autorizaciones', 3),
(7, 'Coordinador de Citas', 'Listar pacientes pendientes por asignar y permite cambios de estado', 6),
(8, 'Admisiones', 'Cambia estado de asignado a atendido o ausentes', 7),
(9, 'Facturación', 'Pone el número de la factura sobre pacientes atendidos', 8),
(11, 'CP', 'Cirujano Plástico', 3),
(12, 'Terapia', 'Usuario Terapia', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_groups_access`
--

CREATE TABLE IF NOT EXISTS `tb_groups_access` (
  `id` int(6) NOT NULL,
  `group_id` int(6) DEFAULT NULL,
  `module_id` int(6) DEFAULT NULL,
  `access_data` text
) ENGINE=InnoDB AUTO_INCREMENT=720 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_groups_access`
--

INSERT INTO `tb_groups_access` (`id`, `group_id`, `module_id`, `access_data`) VALUES
(169, 1, 8, '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}'),
(170, 2, 8, '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}'),
(171, 3, 8, '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}'),
(199, 1, 7, '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}'),
(200, 2, 7, '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}'),
(201, 3, 7, '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}'),
(319, 1, 11, '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"1","is_excel":"1"}'),
(320, 2, 11, '{"is_global":"1","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}'),
(321, 3, 11, '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}'),
(322, 1, 2, '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}'),
(323, 2, 2, '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}'),
(324, 3, 2, '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}'),
(343, 1, 1, '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}'),
(344, 2, 1, '{"is_global":"1","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}'),
(345, 3, 1, '{"is_global":"1","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}'),
(373, 1, 21, '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"1","is_excel":"0"}'),
(374, 2, 21, '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}'),
(375, 3, 21, '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_logs`
--

CREATE TABLE IF NOT EXISTS `tb_logs` (
  `auditID` int(20) NOT NULL,
  `ipaddress` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `module` varchar(50) DEFAULT NULL,
  `task` varchar(50) DEFAULT NULL,
  `note` text,
  `logdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_logs`
--

INSERT INTO `tb_logs` (`auditID`, `ipaddress`, `user_id`, `module`, `task`, `note`, `logdate`) VALUES
(1, '::1', 1, 'primeraauto', 'save', 'Data with ID 1 Has been Updated !', '2015-09-13 22:20:58'),
(2, '::1', 1, 'primeraauto', 'save', 'Data with ID 1 Has been Updated !', '2015-09-13 22:21:45'),
(3, '::1', 1, 'primeraauto', 'save', 'Data with ID 1 Has been Updated !', '2015-09-13 22:29:00'),
(4, '::1', 1, 'calendar', 'save', 'New Data with ID 14 Has been Inserted !', '2015-09-13 23:01:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_menu`
--

CREATE TABLE IF NOT EXISTS `tb_menu` (
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `menu_name` varchar(100) DEFAULT NULL,
  `menu_type` char(10) DEFAULT NULL,
  `role_id` varchar(100) DEFAULT NULL,
  `deep` smallint(2) DEFAULT NULL,
  `ordering` int(6) DEFAULT NULL,
  `position` enum('top','sidebar','both') DEFAULT NULL,
  `menu_icons` varchar(30) DEFAULT NULL,
  `active` enum('0','1') DEFAULT '1',
  `access_data` text,
  `allow_guest` enum('0','1') DEFAULT '0',
  `menu_lang` text
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_menu`
--

INSERT INTO `tb_menu` (`menu_id`, `parent_id`, `module`, `url`, `menu_name`, `menu_type`, `role_id`, `deep`, `ordering`, `position`, `menu_icons`, `active`, `access_data`, `allow_guest`, `menu_lang`) VALUES
(14, 0, 'autorizaciones', '', 'Autorizaciones', 'internal', NULL, NULL, NULL, 'sidebar', 'fa-edit', '1', '{"1":"0","2":"1","4":"1","5":"0","6":"0","7":"0","8":"0","9":"0","10":"0"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mes`
--

CREATE TABLE IF NOT EXISTS `tb_mes` (
  `id` int(11) NOT NULL,
  `mes` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_mes`
--

INSERT INTO `tb_mes` (`id`, `mes`) VALUES
(0, 'No Aplica'),
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_module`
--

CREATE TABLE IF NOT EXISTS `tb_module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(100) DEFAULT NULL,
  `module_title` varchar(100) DEFAULT NULL,
  `module_note` varchar(255) DEFAULT NULL,
  `module_author` varchar(100) DEFAULT NULL,
  `module_created` timestamp NULL DEFAULT NULL,
  `module_desc` text,
  `module_db` varchar(255) DEFAULT NULL,
  `module_db_key` varchar(100) DEFAULT NULL,
  `module_type` enum('master','report','proccess','core','generic','addon','ajax') DEFAULT 'master',
  `module_config` longtext,
  `module_lang` text
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_module`
--

INSERT INTO `tb_module` (`module_id`, `module_name`, `module_title`, `module_note`, `module_author`, `module_created`, `module_desc`, `module_db`, `module_db_key`, `module_type`, `module_config`, `module_lang`) VALUES
(1, 'users', 'User Lists', 'View All Users', 'Mango Tm', '2013-07-10 15:46:46', NULL, 'tb_users', 'id', 'core', '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MSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24o4w4ci9ydGx1cgQ4O4olo4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIopZ1cnN0XimhbWU4LCJhbG3hcyoIonR4XgVzZXJzo4w4bGF4ZWw4O4JG6XJzdCBOYWl3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24o4w4ci9ydGx1cgQ4O4oio4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIopxhcgRfbpFtZSosopFs6WFzoj24dGJfdXN3cnM4LCJsYWJ3bCoIokxhcgQ5TpFtZSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIo4osonNvcnRs6XN0oj24NyosopNvbpa4Ons4dpFs6WQ4O4o4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjEsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4J3bWF1bCosopFs6WFzoj24dGJfdXN3cnM4LCJsYWJ3bCoIokVtYW3so4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24o4w4ci9ydGx1cgQ4O4oao4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIonBhcgNgbgJko4w4YWx1YXM4O4J0Y39lciVycyosopxhYpVsoj24UGFzcgdvcpQ4LCJi6WVgoj2wLCJkZXRh6Ww4OjAsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4omo4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIopxvZi3uXiF0dGVtcHQ4LCJhbG3hcyoIonR4XgVzZXJzo4w4bGF4ZWw4O4JMbid1b4BBdHR3bXB0o4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTA4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2xLCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24YgJ3YXR3ZF9hdCosopFs6WFzoj24dGJfdXN3cnM4LCJsYWJ3bCoIokNyZWF0ZWQ5QXQ4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMSosopNvbpa4Ons4dpFs6WQ4O4o4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjEsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4JsYXN0XixvZi3uo4w4YWx1YXM4O4J0Y39lciVycyosopxhYpVsoj24TGFzdCBMbid1b4osonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEyo4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIonVwZGF0ZWRfYXQ4LCJhbG3hcyoIonR4XgVzZXJzo4w4bGF4ZWw4O4JVcGRhdGVkoEF0o4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTM4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2xLCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24YWN06XZ3o4w4YWx1YXM4O4J0Y39lciVycyosopxhYpVsoj24QWN06XZ3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24o4w4ci9ydGx1cgQ4O4oxNCosopNvbpa4Ons4dpFs6WQ4O4o4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjEsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9XSw4Zp9ybV9jbixlbWa4OjosopZvcplfbGFmbgV0oj17opNvbHVtb4oIM4w4dG30bGU4O4JVciVycyxEYXRho4w4Zp9ybWF0oj24ZgJ1ZCosopR1cgBsYXk4O4J2bgJ1ep9udGFson0sopZvcplzoj1beyJp6WVsZCoIop3ko4w4YWx1YXM4O4J0Y39l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cp9lcCoIMCw4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj20LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24ZWlh6Ww4LCJhbG3hcyoIonR4XgVzZXJzo4w4bGF4ZWw4O4JFbWF1bCosopZvcplfZgJvdXA4OjAsonJ3cXV1cpVkoj24ZWlh6Ww4LCJi6WVgoj2xLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4OjUsop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JwYXNzdi9yZCosopFs6WFzoj24dGJfdXN3cnM4LCJsYWJ3bCoIo3BhcgNgbgJko4w4Zp9ybV9ncp9lcCoIMCw4cpVxdW3yZWQ4O4owo4w4dp33dyoIMCw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIN4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24MCosopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4Jsbid1b39hdHR3bXB0o4w4YWx1YXM4O4J0Y39lciVycyosopxhYpVsoj24TG9n6Wa5QXR0ZWlwdCosopZvcplfZgJvdXA4OjAsonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4Ojcsop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JsYXN0XixvZi3uo4w4YWx1YXM4O4J0Y39lciVycyosopxhYpVsoj24TGFzdCBMbid1b4osopZvcplfZgJvdXA4OjEsonJ3cXV1cpVkoj24MCosonZ1ZXc4OjAsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4Oj5sop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIojA4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24YXZhdGFyo4w4YWx1YXM4O4J0Y39lciVycyosopxhYpVsoj24QXZhdGFyo4w4Zp9ybV9ncp9lcCoIojE4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2xLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ZWR1dCoIMSw4ciVhcpN2oj24MCosonN1epU4O4o4LCJzbgJ0bG3zdCoIojk4LCJs6Wl1dGVkoj24o4w4bgB06W9uoj17op9wdF90eXB3oj1udWxsLCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4OpmlbGwsopxvbitlcF9rZXk4OpmlbGwsopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4OpmlbGwsonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4OpmlbGwsonBhdGhfdG9fdXBsbiFkoj24XC9lcGxvYWRzXC9lciVyclwvo4w4dXBsbiFkXgRmcGU4O4J1bWFnZSosonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JhYgR1dpU4LCJhbG3hcyoIonR4XgVzZXJzo4w4bGF4ZWw4O4JTdGF0dXM4LCJpbgJtXidybgVwoj2xLCJyZXFl6XJ3ZCoIonJ3cXV1cpVko4w4dp33dyoIMSw4dH3wZSoIonJhZG3vo4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIMTAsop9wdG3vb4oIeyJvcHRfdH3wZSoIopRhdGFs6XN0o4w4bG9v6gVwXgFlZXJmoj24MD1JbpFjdG3iZXwxOkFjdG3iZSosopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JjcpVhdGVkXiF0o4w4YWx1YXM4O4J0Y39lciVycyosopxhYpVsoj24QgJ3YXR3ZCBBdCosopZvcplfZgJvdXA4OjEsonJ3cXV1cpVkoj24MCosonZ1ZXc4OjAsonRmcGU4O4J0ZXh0YXJ3YSosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54OjAsonNvcnRs6XN0oj2xMSw4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonVwZGF0ZWRfYXQ4LCJhbG3hcyoIonR4XgVzZXJzo4w4bGF4ZWw4O4JVcGRhdGVkoEF0o4w4Zp9ybV9ncp9lcCoIMSw4cpVxdW3yZWQ4O4owo4w4dp33dyoIMCw4dH3wZSoIonR3eHRhcpVho4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIMCw4ci9ydGx1cgQ4OjEyLCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fVl9', '{"title":{"id":""},"note":{"id":""}}'),
(2, 'groups', 'Users Group', 'View All', 'Mango Tm', '2013-07-10 06:45:14', NULL, 'tb_groups', 'group_id', 'core', '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O4JJRCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojA4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMCw4bG3u6yoIo4osonRhcpd3dCoIo39zZWxpo4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24bpFtZSosopFs6WFzoj24dGJfZgJvdXBzo4w4bGF4ZWw4O4JOYWl3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24o4w4ci9ydGx1cgQ4O4oxo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjAsopx1bps4O4o4LCJ0YXJnZXQ4O4JfciVsZ4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIopR3ciNy6XB06W9uo4w4YWx1YXM4O4J0Y39ncp9lcHM4LCJsYWJ3bCoIokR3ciNy6XB06W9uo4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24o4w4ci9ydGx1cgQ4O4oyo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjAsopx1bps4O4o4LCJ0YXJnZXQ4O4JfciVsZ4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIopx3dpVso4w4YWx1YXM4O4J0Y39ncp9lcHM4LCJsYWJ3bCoIokx3dpVso4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MyosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2wLCJs6Wmroj24o4w4dGFyZiV0oj24XgN3bGY4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9XX0=', '{"title":{"id":""},"note":{"id":""}}'),
(4, 'module', 'Module Management', 'All module applications', 'Mango Tm', '2013-08-25 04:58:43', NULL, 'tb_module', 'module_id', 'core', 'eyJ0YWJsZV9kY4oIonR4XilvZHVsZSosonBy6Wlhcn3f6iVmoj24bW9kdWx3Xi3ko4w4cgFsXgN3bGVjdCoIo3NFTEVDVCB0Y39tbiRlbGUubW9kdWx3Xi3kLHR4XilvZHVsZSmtbiRlbGVfbpFtZSx0Y39tbiRlbGUubW9kdWx3XgR1dGx3LHR4XilvZHVsZSmtbiRlbGVfbp90ZSx0Y39tbiRlbGUubW9kdWx3XiFldGhvc4x0Y39tbiRlbGUubW9kdWx3XiNyZWF0ZWQsdGJfbW9kdWx3LplvZHVsZV9kZXNjLHR4XilvZHVsZSmtbiRlbGVfZGosdGJfbW9kdWx3LplvZHVsZV9kY39rZXksdGJfbW9kdWx3LplvZHVsZV90eXB3LHR4XilvZHVsZSmncp9lcF91ZCx0Y39tbiRlbGUubW9kdWx3XgBhdG55oEZST005dGJfbW9kdWx3oCosonNxbF9g6GVyZSoIo4A5oFdoRVJFoHR4XilvZHVsZSmtbiRlbGVf6WQ5SVM5Tk9UoEmVTEw5QUmEoGlvZHVsZV9uYWl3oCE9JilvZHVsZSc5oCosonNxbF9ncp9lcCoIo4A5oCA4LCJpbgJtcyoIWgs4Zp33bGQ4O4JtbiRlbGVf6WQ4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24TW9kdWx3oE3ko4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J26WRkZWa4LCJhZGQ4OpZhbHN3LCJ3ZG30oj1pYWxzZSw4ciVhcpN2oj2wLCJz6X13oj24cgBhbjEyo4w4ci9ydGx1cgQ4O4owo4w4bgB06W9uoj17op9wdF90eXB3oj1pYWxzZSw4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIZpFsciUsopxvbitlcF9iYWxlZSoIZpFsciUsop3zXiR3cGVuZGVuYgk4OpZhbHN3LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4OpZhbHN3LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj1pYWxzZSw4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bW9kdWx3XimhbWU4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24TW9kdWx3oEmhbWU4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMCw4dH3wZSoIonR3eHQ4LCJhZGQ4O4o4LCJ3ZG30oj24o4w4ciVhcpN2oj2xLCJz6X13oj24cgBhbjEyo4w4ci9ydGx1cgQ4OjEsop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIojA4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JtbiRlbGVfdG30bGU4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24TW9kdWx3oFR1dGx3o4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24MSosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj24o4w4ZWR1dCoIo4osonN3YXJj6CoIMSw4ci3IZSoIonNwYWaxM4osonNvcnRs6XN0oj2yLCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4owo4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bW9kdWx3XimvdGU4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24TW9kdWx3oEmvdGU4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4o4LCJi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dGVuZF9jbGFzcyoIo4J9fV0sopdy6WQ4O3t7opZ1ZWxkoj24bW9kdWx3Xi3ko4w4YWx1YXM4O4J0Y39tbiRlbGU4LCJsYWJ3bCoIoklvZHVsZSBJZCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMCw4bG3u6yoIo4osonRhcpd3dCoIo39zZWxpo4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24bW9kdWx3XgBhdG54LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24QXBwcyosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojo4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMCw4bG3u6yoIo4osonRhcpd3dCoIo39zZWxpo4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24bW9kdWx3XimhbWU4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24Qi9udHJvbGx3c4osonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojM4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMCw4bG3u6yoIo4osonRhcpd3dCoIo39zZWxpo4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24bW9kdWx3XgR1dGx3o4w4YWx1YXM4O4J0Y39tbiRlbGU4LCJsYWJ3bCoIoklvZHVsZSBOYWl3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEyMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NCosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2wLCJs6Wmroj24o4w4dGFyZiV0oj24XgN3bGY4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4JtbiRlbGVfbp90ZSosopFs6WFzoj24dGJfbW9kdWx3o4w4bGF4ZWw4O4JObgR3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojElMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NSosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2wLCJs6Wmroj24o4w4dGFyZiV0oj24XgN3bGY4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4JtbiRlbGVfYXV06G9yo4w4YWx1YXM4O4J0Y39tbiRlbGU4LCJsYWJ3bCoIokFldGhvc4osonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojY4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMCw4bG3u6yoIo4osonRhcpd3dCoIo39zZWxpo4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24bW9kdWx3XiNyZWF0ZWQ4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24QgJ3YXR3ZCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojc4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMCw4bG3u6yoIo4osonRhcpd3dCoIo39zZWxpo4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24bW9kdWx3XiR3ciM4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24TW9kdWx3oER3ciM4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oao4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjAsopx1bps4O4o4LCJ0YXJnZXQ4O4JfciVsZ4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIoplvZHVsZV9kY4osopFs6WFzoj24dGJfbW9kdWx3o4w4bGF4ZWw4O4JNbiRlbGU5RGo4LCJi6WVgoj2wLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4omo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjAsopx1bps4O4o4LCJ0YXJnZXQ4O4JfciVsZ4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIoplvZHVsZV9kY39rZXk4LCJhbG3hcyoIonR4XilvZHVsZSosopxhYpVsoj24TW9kdWx3oER4oEt3eSosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEwo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjAsopx1bps4O4o4LCJ0YXJnZXQ4O4JfciVsZ4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIoplvZHVsZV90eXB3o4w4YWx1YXM4O4J0Y39tbiRlbGU4LCJsYWJ3bCoIo3RmcGU4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oxMSosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2wLCJs6Wmroj24o4w4dGFyZiV0oj24XgN3bGY4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4Jncp9lcF91ZCosopFs6WFzoj24dGJfbW9kdWx3o4w4bGF4ZWw4O4JHcp9lcCBJZCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEyo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjAsopx1bps4O4o4LCJ0YXJnZXQ4O4JfciVsZ4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fXldfQ==', NULL),
(7, 'menu', 'Menu Management', 'Manage All Menu', 'Mango Tm', '2014-01-06 07:50:29', NULL, 'tb_menu', 'menu_id', 'core', 'eyJ0YWJsZV9kY4oIonR4Xil3bnU4LCJwcp3tYXJmXit3eSoIopl3bnVf6WQ4LCJzcWxfciVsZWN0oj24U0VMRUNUoHR4Xil3bnUuK4A5R3JPTSB0Y39tZWmloCosonNxbF9g6GVyZSoIo4BXSEVSRSB0Y39tZWmlLpl3bnVf6WQ5SVM5Tk9UoEmVTEw4LCJzcWxfZgJvdXA4O4o4LCJncp3koj1beyJp6WVsZCoIopl3bnVf6WQ4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIokl3bnU5SWQ4LCJi6WVgoj24MCosopR3dGF1bCoIojA4LCJzbgJ0YWJsZSoIojE4LCJzZWFyYi54O4oxo4w4ZG9gbpxvYWQ4O4oxo4w4ZnJvepVuoj24MCosoph1ZGR3b4oIojA4LCJhbG3nb4oIopx3ZnQ4LCJg6WR06CoIojEwMCosonNvcnRs6XN0oj24MCosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj1pYWxzZSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj1pYWxzZSw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fX0sonRmcGU4O4J0ZXh0on0seyJp6WVsZCoIonBhcpVudF91ZCosopFs6WFzoj24dGJfbWVudSosopxhYpVsoj24UGFyZWm0oE3ko4w4dp33dyoIojE4LCJkZXRh6Ww4O4oxo4w4ci9ydGF4bGU4O4oxo4w4ciVhcpN2oj24MSosopRvdimsbiFkoj24MSosopZybg13b4oIojA4LCJ26WRkZWa4O4oxo4w4YWx1Zia4O4JsZWZ0o4w4di3kdG54O4oxMDA4LCJzbgJ0bG3zdCoIojE4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIZpFsciUsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIZpFsciUsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9LCJ0eXB3oj24dGVadCJ9LHs4Zp33bGQ4O4JtbiRlbGU4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIoklvZHVsZSosonZ1ZXc4O4oxo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosopFs6Wduoj24bGVpdCosond1ZHR2oj24MTUwo4w4ci9ydGx1cgQ4O4ozo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OpZhbHN3LCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OpZhbHN3LCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fSw4dH3wZSoIonR3eHQ4fSx7opZ1ZWxkoj24dXJso4w4YWx1YXM4O4J0Y39tZWmlo4w4bGF4ZWw4O4JVcpw4LCJi6WVgoj24MCosopR3dGF1bCoIojA4LCJzbgJ0YWJsZSoIojE4LCJzZWFyYi54O4oxo4w4ZG9gbpxvYWQ4O4oxo4w4ZnJvepVuoj24MCosoph1ZGR3b4oIojA4LCJhbG3nb4oIopx3ZnQ4LCJg6WR06CoIojEwMCosonNvcnRs6XN0oj24MyosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj1pYWxzZSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj1pYWxzZSw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fX0sonRmcGU4O4J0ZXh0on0seyJp6WVsZCoIopl3bnVfbpFtZSosopFs6WFzoj24dGJfbWVudSosopxhYpVsoj24TWVudSBOYWl3o4w4dp33dyoIojE4LCJkZXRh6Ww4O4oxo4w4ci9ydGF4bGU4O4oxo4w4ciVhcpN2oj24MSosopRvdimsbiFkoj24MSosopZybg13b4oIojA4LCJ26WRkZWa4O4owo4w4YWx1Zia4O4JsZWZ0o4w4di3kdG54O4ozMDA4LCJzbgJ0bG3zdCoIojo4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIZpFsciUsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIZpFsciUsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9LCJ0eXB3oj24dGVadCJ9LHs4Zp33bGQ4O4JtZWmlXgRmcGU4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIokl3bnU5VH3wZSosonZ1ZXc4O4owo4w4ZGV0YW3soj24MCosonNvcnRhYpx3oj24MSosonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosopFs6Wduoj24bGVpdCosond1ZHR2oj24MTAwo4w4ci9ydGx1cgQ4O4olo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OpZhbHN3LCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OpZhbHN3LCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fSw4dH3wZSoIonR3eHQ4fSx7opZ1ZWxkoj24cp9sZV91ZCosopFs6WFzoj24dGJfbWVudSosopxhYpVsoj24Up9sZSBJZCosonZ1ZXc4O4owo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosopFs6Wduoj24bGVpdCosond1ZHR2oj24MTAwo4w4ci9ydGx1cgQ4O4oio4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OpZhbHN3LCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OpZhbHN3LCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fSw4dH3wZSoIonR3eHQ4fSx7opZ1ZWxkoj24ZGV3cCosopFs6WFzoj24dGJfbWVudSosopxhYpVsoj24RGV3cCosonZ1ZXc4O4owo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosopFs6Wduoj24bGVpdCosond1ZHR2oj24MTAwo4w4ci9ydGx1cgQ4O4ogo4w4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OpZhbHN3LCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OpZhbHN3LCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fSw4dH3wZSoIonR3eHQ4fSx7opZ1ZWxkoj24bgJkZXJ1bpc4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIok9yZCosonZ1ZXc4O4oxo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosopFs6Wduoj24bGVpdCosond1ZHR2oj24NTA4LCJzbgJ0bG3zdCoIoj54LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIZpFsciUsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIZpFsciUsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9LCJ0eXB3oj24dGVadCJ9LHs4Zp33bGQ4O4JwbgN1dG3vb4osopFs6WFzoj24dGJfbWVudSosopxhYpVsoj24UG9z6XR1bia4LCJi6WVgoj24MCosopR3dGF1bCoIojA4LCJzbgJ0YWJsZSoIojE4LCJzZWFyYi54O4oxo4w4ZG9gbpxvYWQ4O4oxo4w4ZnJvepVuoj24MCosoph1ZGR3b4oIojA4LCJhbG3nb4oIopx3ZnQ4LCJg6WR06CoIojEwMCosonNvcnRs6XN0oj24OSosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj1pYWxzZSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj1pYWxzZSw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fX0sonRmcGU4O4J0ZXh0on0seyJp6WVsZCoIopl3bnVf6WNvbnM4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIo4BJYi9uo4w4dp33dyoIojE4LCJkZXRh6Ww4O4oxo4w4ci9ydGF4bGU4O4oxo4w4ciVhcpN2oj24MSosopRvdimsbiFkoj24MSosopZybg13b4oIojA4LCJ26WRkZWa4O4owo4w4YWx1Zia4O4JsZWZ0o4w4di3kdG54O4olMCosonNvcnRs6XN0oj24MTA4LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIZpFsciUsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIZpFsciUsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9LCJ0eXB3oj24dGVadCJ9LHs4Zp33bGQ4O4JhYgR1dpU4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIokFjdG3iZSosonZ1ZXc4O4oxo4w4ZGV0YW3soj24MSosonNvcnRhYpx3oj24MSosonN3YXJj6CoIojE4LCJkbgdubG9hZCoIojE4LCJpcp9IZWa4O4owo4w46G3kZGVuoj24MCosond1ZHR2oj24NTA4LCJhbG3nb4oIopN3bnR3c4osonNvcnRs6XN0oj24NyosopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj1pYWxzZSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj1pYWxzZSw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fX0sonRmcGU4O4J0ZXh0onldLCJpbgJtcyoIWgs4Zp33bGQ4O4JtZWmlXi3ko4w4YWx1YXM4O4J0Y39tZWmlo4w4bGF4ZWw4O4JNZWmloE3ko4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIojE4LCJ0eXB3oj24dGVadCosopFkZCoIojE4LCJ3ZG30oj24MSosonN3YXJj6CoIojE4LCJz6X13oj24cgBhbjEyo4w4ci9ydGx1cgQ4OjAsopZvcplfZgJvdXA4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JwYXJ3bnRf6WQ4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIo3BhcpVudCBJZCosonJ3cXV1cpVkoj24MCosonZ1ZXc4O4oxo4w4dH3wZSoIonR3eHQ4LCJhZGQ4O4oxo4w4ZWR1dCoIojE4LCJzZWFyYi54O4oxo4w4ci3IZSoIonNwYWaxM4osonNvcnRs6XN0oj2xLCJpbgJtXidybgVwoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bW9kdWx3o4w4YWx1YXM4O4J0Y39tZWmlo4w4bGF4ZWw4O4JNbiRlbGU4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoIM4w4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonVybCosopFs6WFzoj24dGJfbWVudSosopxhYpVsoj24VXJso4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIojE4LCJ0eXB3oj24dGVadCosopFkZCoIojE4LCJ3ZG30oj24MSosonN3YXJj6CoIojE4LCJz6X13oj24cgBhbjEyo4w4ci9ydGx1cgQ4OjMsopZvcplfZgJvdXA4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JtZWmlXimhbWU4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIokl3bnU5TpFtZSosonJ3cXV1cpVkoj24MCosonZ1ZXc4O4oxo4w4dH3wZSoIonR3eHQ4LCJhZGQ4O4oxo4w4ZWR1dCoIojE4LCJzZWFyYi54O4oxo4w4ci3IZSoIonNwYWaxM4osonNvcnRs6XN0oj20LCJpbgJtXidybgVwoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bWVudV90eXB3o4w4YWx1YXM4O4J0Y39tZWmlo4w4bGF4ZWw4O4JNZWmloFRmcGU4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoINSw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonJvbGVf6WQ4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIo3JvbGU5SWQ4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoIN4w4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopR3ZXA4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIokR3ZXA4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoINyw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIop9yZGVy6Wmno4w4YWx1YXM4O4J0Y39tZWmlo4w4bGF4ZWw4O4JPcpR3cp3uZyosonJ3cXV1cpVkoj24MCosonZ1ZXc4O4oxo4w4dH3wZSoIonR3eHQ4LCJhZGQ4O4oxo4w4ZWR1dCoIojE4LCJzZWFyYi54O4oxo4w4ci3IZSoIonNwYWaxM4osonNvcnRs6XN0oj2aLCJpbgJtXidybgVwoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24cG9z6XR1bia4LCJhbG3hcyoIonR4Xil3bnU4LCJsYWJ3bCoIo3Bvci306W9uo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIojE4LCJ0eXB3oj24dGVadCosopFkZCoIojE4LCJ3ZG30oj24MSosonN3YXJj6CoIojE4LCJz6X13oj24cgBhbjEyo4w4ci9ydGx1cgQ4OjksopZvcplfZgJvdXA4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JtZWmlXi3jbimzo4w4YWx1YXM4O4J0Y39tZWmlo4w4bGF4ZWw4O4JNZWmloE3jbimzo4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIojE4LCJ0eXB3oj24dGVadCosopFkZCoIojE4LCJ3ZG30oj24MSosonN3YXJj6CoIojE4LCJz6X13oj24cgBhbjEyo4w4ci9ydGx1cgQ4OjEwLCJpbgJtXidybgVwoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24YWN06XZ3o4w4YWx1YXM4O4J0Y39tZWmlo4w4bGF4ZWw4O4JBYgR1dpU4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoIMTEsopZvcplfZgJvdXA4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9XX0=', NULL);
INSERT INTO `tb_module` (`module_id`, `module_name`, `module_title`, `module_note`, `module_author`, `module_created`, `module_desc`, `module_db`, `module_db_key`, `module_type`, `module_config`, `module_lang`) VALUES
(8, 'pages', 'Pages CMS Management', 'View all static pages', 'Mango Tm', '2014-03-25 22:33:41', NULL, 'tb_pages', 'pageID', 'core', 'eyJ0YWJsZV9kY4oIonR4XgBhZiVzo4w4cHJ1bWFyeV9rZXk4O4JwYWd3SUQ4LCJzcWxfciVsZWN0oj24oFNFTEVDVCB0Y39wYWd3cyaqoEZST005dGJfcGFnZXM5o4w4cgFsXgd2ZXJ3oj24oFdoRVJFoHR4XgBhZiVzLnBhZiVJRCBJUyBOTlQ5T3VMTCosonNxbF9ncp9lcCoIo4osopZvcplzoj1beyJp6WVsZCoIonBhZiVJRCosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIo3BhZiVJRCosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2xLCJ0eXB3oj246G3kZGVuo4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojE4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24dG30bGU4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGF4ZWw4O4JU6XRsZSosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIonJ3cXV1cpVko4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj24M4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JhbG3hcyosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIokFs6WFzo4w4Zp9ybV9ncp9lcCoIo4osonJ3cXV1cpVkoj24YWxwYSosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIojM4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bp90ZSosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIokmvdGU4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMCw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj2wLCJzbgJ0bG3zdCoIojk4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24YgJ3YXR3ZCosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIokNyZWF0ZWQ4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIoph1ZGR3b4osopFkZCoIMSw4ZWR1dCoIMSw4ciVhcpN2oj24MSosonN1epU4O4o4LCJzbgJ0bG3zdCoIojc4LCJvcHR1bia4Ons4bgB0XgRmcGU4OpmlbGwsopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIbnVsbCw4bG9v6gVwXit3eSoIbnVsbCw4bG9v6gVwXgZhbHV3oj1udWxsLCJ1cl9kZXB3bpR3bpNmoj1udWxsLCJ1cl9tdWx06XBsZSoIbnVsbCw4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj1udWxsLCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj1udWxsLCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24dXBkYXR3ZCosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIo3VwZGF0ZWQ4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIoph1ZGR3b4osopFkZCoIMSw4ZWR1dCoIMSw4ciVhcpN2oj24MSosonN1epU4O4o4LCJzbgJ0bG3zdCoIoj54LCJvcHR1bia4Ons4bgB0XgRmcGU4OpmlbGwsopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIbnVsbCw4bG9v6gVwXit3eSoIbnVsbCw4bG9v6gVwXgZhbHV3oj1udWxsLCJ1cl9kZXB3bpR3bpNmoj1udWxsLCJ1cl9tdWx06XBsZSoIbnVsbCw4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj1udWxsLCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj1udWxsLCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24Zp3sZWmhbWU4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGF4ZWw4O4JG6Wx3bpFtZSosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIopFscGE4LCJi6WVgoj2xLCJ0eXB3oj24dGVadCosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4O4o0o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonN0YXRlcyosopFs6WFzoj24dGJfcGFnZXM4LCJsYWJ3bCoIo3N0YXRlcyosopZvcplfZgJvdXA4O4o4LCJyZXFl6XJ3ZCoIonJ3cXV1cpVko4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj24NSosop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JhYiN3cgM4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGF4ZWw4O4JBYiN3cgM4LCJpbgJtXidybgVwoj24o4w4cpVxdW3yZWQ4O4JyZXFl6XJ3ZCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0YXJ3YSosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4O4oio4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopFsbG9gXidlZXN0o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24QWxsbgc5RgV3cgQ4LCJsYWmndWFnZSoIWl0sonJ3cXV1cpVkoj24MCosonZ1ZXc4O4oxo4w4dH3wZSoIonR3eHRhcpVho4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoIOSw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonR3bXBsYXR3o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24VGVtcGxhdGU4LCJsYWmndWFnZSoIWl0sonJ3cXV1cpVkoj24MCosonZ1ZXc4O4oxo4w4dH3wZSoIonR3eHRhcpVho4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoIMTAsopZvcplfZgJvdXA4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JtZXRh6iVmo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24TWV0YWt3eSosopxhbpdlYWd3oj1bXSw4cpVxdW3yZWQ4O4owo4w4dp33dyoIojE4LCJ0eXB3oj24dGVadGFyZWE4LCJhZGQ4O4oxo4w4ZWR1dCoIojE4LCJzZWFyYi54O4oxo4w4ci3IZSoIonNwYWaxM4osonNvcnRs6XN0oj2xMSw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIopl3dGFkZXNjo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhYpVsoj24TWV0YWR3ciM4LCJsYWmndWFnZSoIWl0sonJ3cXV1cpVkoj24MCosonZ1ZXc4O4oxo4w4dH3wZSoIonR3eHRhcpVho4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoIMTosopZvcplfZgJvdXA4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9XSw4ZgJ1ZCoIWgs4Zp33bGQ4O4JwYWd3SUQ4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3BhZiVJRCosonZ1ZXc4OjAsopR3dGF1bCoIMCw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2xLCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24dG30bGU4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3R1dGx3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24M4osopNvbpa4Ons4dpFs6WQ4O4o4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjEsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4JubgR3o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JObgR3o4w4dp33dyoIMCw4ZGV0YW3soj2wLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMCw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MyosopNvbpa4Ons4dpFs6WQ4O4o4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjEsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4JhbG3hcyosopFs6WFzoj24dGJfcGFnZXM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24UixlZyosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojQ4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2xLCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24Zp3sZWmhbWU4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIokZ1bGVuYWl3o4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NSosopNvbpa4Ons4dpFs6WQ4O4o4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjEsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4JzdGF0dXM4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3N0YXRlcyosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojY4LCJjbimuoj17onZhbG3koj24o4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2xLCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24YWNjZXNzo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JBYiN3cgM4LCJi6WVgoj2wLCJkZXRh6Ww4OjAsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ogo4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIopNyZWF0ZWQ4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIokNyZWF0ZWQ4LCJi6WVgoj2wLCJkZXRh6Ww4OjAsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4oao4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIopFsbG9gXidlZXN0o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JBbGxvdyBHdWVzdCosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojk4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIonVwZGF0ZWQ4LCJhbG3hcyoIonR4XgBhZiVzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3VwZGF0ZWQ4LCJi6WVgoj2wLCJkZXRh6Ww4OjAsonNvcnRhYpx3oj2wLCJzZWFyYi54OjEsopRvdimsbiFkoj2wLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4omo4w4Yi9ub4oIeyJiYWx1ZCoIo4osopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIonR3bXBsYXR3o4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JUZWlwbGF0ZSosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEwo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjEsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4JtZXRh6iVmo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JNZXRh6iVmo4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MTE4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIopl3dGFkZXNjo4w4YWx1YXM4O4J0Y39wYWd3cyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JNZXRhZGVzYyosonZ1ZXc4OjAsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojEyo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjEsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9XX0=', '{"title":{"in":"","pt-br":""},"note":{"in":"","pt-br":""}}'),
(11, 'logs', 'Logs', 'Users Activity Log', 'Mango Tm', '2014-04-21 22:59:43', NULL, 'tb_logs', 'auditID', 'core', 'eyJ0YWJsZV9kY4oIonR4XixvZgM4LCJwcp3tYXJmXit3eSoIopFlZG30SUQ4LCJzcWxfciVsZWN0oj24oFNFTEVDVCB0Y39sbidzL425R3JPTSB0Y39sbidzoCosonNxbF9g6GVyZSoIo4BXSEVSRSB0Y39sbidzLpFlZG30SUQ5SVM5Tk9UoEmVTEw4LCJzcWxfZgJvdXA4O4o4LCJncp3koj1beyJp6WVsZCoIopFlZG30SUQ4LCJhbG3hcyoIonR4XixvZgM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24QXVk6XRJRCosonZ1ZXc4OjAsopR3dGF1bCoIMCw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjAsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojo4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIop3wYWRkcpVzcyosopFs6WFzoj24dGJfbG9ncyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JJUHM4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4ozo4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjEsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4JlciVyXi3ko4w4YWx1YXM4O4J0Y39sbidzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3VzZXJzo4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NCosopNvbpa4Ons4dpFs6WQ4O4oxo4w4ZGo4O4J0Y39lciVycyosopt3eSoIop3ko4w4ZG3zcGxheSoIopZ1cnN0XimhbWU4fSw4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjEsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4JtbiRlbGU4LCJhbG3hcyoIonR4XixvZgM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24TW9kdWx3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2xLCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24dGFz6yosopFs6WFzoj24dGJfbG9ncyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JUYXNro4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24N4osopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2xLCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24bp90ZSosopFs6WFzoj24dGJfbG9ncyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JObgR3o4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24NyosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2xLCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24bG9nZGF0ZSosopFs6WFzoj24dGJfbG9ncyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JMbidkYXR3o4w4dp33dyoIMCw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MSosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2xLCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fV0sopZvcplfYi9sdWluoj2yLCJpbgJtXixheW9ldCoIeyJjbixlbWa4OjosonR1dGx3oj24bG9ncyxzZHNkciQ4LCJpbgJtYXQ4O4Jncp3ko4w4ZG3zcGxheSoIophvcp3Ibim0YWw4fSw4Zp9ybXM4O3t7opZ1ZWxkoj24YXVk6XRJRCosopFs6WFzoj24dGJfbG9ncyosopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JBdWR1dE3Eo4w4Zp9ybV9ncp9lcCoIMCw4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj2wLCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osop3zXillbHR1cGx3oj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4J1cGFkZHJ3cgM4LCJhbG3hcyoIonR4XixvZgM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24SXBhZGRyZXNzo4w4Zp9ybV9ncp9lcCoIMCw4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHQ4LCJhZGQ4OjEsonN1epU4O4owo4w4ZWR1dCoIMSw4ciVhcpN2oj24MSosonNvcnRs6XN0oj2xLCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osop3zXillbHR1cGx3oj24o4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJyZXN1epVfdi3kdG54O4o4LCJyZXN1epVf6GV1Zih0oj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JubgR3o4w4YWx1YXM4O4J0Y39sbidzo4w4bGF4ZWw4O4JObgR3o4w4Zp9ybV9ncp9lcCoIMCw4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonR3eHRhcpVhXiVk6XRvc4osopFkZCoIMSw4ZWR1dCoIMSw4ciVhcpN2oj24MSosonN1epU4O4o4LCJzbgJ0bG3zdCoIM4w4bgB06W9uoj17op9wdF90eXB3oj1udWxsLCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4OpmlbGwsopxvbitlcF9rZXk4OpmlbGwsopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4OpmlbGwsop3zXillbHR1cGx3oj1udWxsLCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4OpmlbGwsonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4OpmlbGwsonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4JsbidkYXR3o4w4YWx1YXM4O4J0Y39sbidzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIokxvZiRhdGU4LCJpbgJtXidybgVwoj2wLCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj2xLCJ0eXB3oj24dGVadF9kYXR3dG3tZSosopFkZCoIMSw4ci3IZSoIojA4LCJ3ZG30oj2xLCJzZWFyYi54O4oxo4w4ci9ydGx1cgQ4OjMsop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w46XNfbXVsdG3wbGU4O4o4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonJ3ci3IZV9g6WR06CoIo4osonJ3ci3IZV92ZW3n6HQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonVzZXJf6WQ4LCJhbG3hcyoIonR4XixvZgM4LCJsYWJ3bCoIo3VzZXJzo4w4Zp9ybV9ncp9lcCoIMSw4cpVxdW3yZWQ4O4owo4w4dp33dyoIMSw4dH3wZSoIonN3bGVjdCosopFkZCoIMSw4ZWR1dCoIMSw4ciVhcpN2oj24MSosonN1epU4O4o4LCJzbgJ0bG3zdCoINCw4bgB06W9uoj17op9wdF90eXB3oj24ZXh0ZXJuYWw4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4J0Y39lciVycyosopxvbitlcF9rZXk4O4J1ZCosopxvbitlcF9iYWxlZSoIopZ1cnN0XimhbWU4LCJ1cl9kZXB3bpR3bpNmoj1udWxsLCJ1cl9tdWx06XBsZSoIbnVsbCw4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIbnVsbCw4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIonRhcis4LCJhbG3hcyoIonR4XixvZgM4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24VGFz6yosopZvcplfZgJvdXA4OjEsonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoINSw4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJ1cl9tdWx06XBsZSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24bW9kdWx3o4w4YWx1YXM4O4J0Y39sbidzo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIoklvZHVsZSosopZvcplfZgJvdXA4OjEsonJ3cXV1cpVkoj24MCosonZ1ZXc4OjEsonRmcGU4O4J0ZXh0o4w4YWRkoj2xLCJz6X13oj24MCosopVk6XQ4OjEsonN3YXJj6CoIojE4LCJzbgJ0bG3zdCoIN4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJ1cl9tdWx06XBsZSoIo4osopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4cpVz6X13Xgd1ZHR2oj24o4w4cpVz6X13Xih36Wd2dCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fVl9', NULL),
(21, 'notification', 'Notification', 'View my notification', NULL, '2015-07-09 05:20:42', NULL, 'tb_notification', 'id', 'core', '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dGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fSx7opZ1ZWxkoj24YgJ3YXR3ZCosopFs6WFzoj24dGJfbp906WZ1YiF06W9uo4w4bGF4ZWw4O4JDcpVhdGVko4w4bGFuZgVhZiU4O3tdLCJyZXFl6XJ3ZCoIojA4LCJi6WVgoj24MSosonRmcGU4O4J0ZXh0XiRhdGV06Wl3o4w4YWRkoj24MSosopVk6XQ4O4oxo4w4ciVhcpN2oj24MSosonN1epU4O4JzcGFuMTo4LCJzbgJ0bG3zdCoINCw4Zp9ybV9ncp9lcCoIo4osop9wdG3vb4oIeyJvcHRfdH3wZSoIo4osopxvbitlcF9xdWVyeSoIo4osopxvbitlcF90YWJsZSoIo4osopxvbitlcF9rZXk4O4o4LCJsbi9rdXBfdpFsdWU4O4o4LCJ1cl9kZXB3bpR3bpNmoj24o4w4ciVsZWN0XillbHR1cGx3oj24MCosop3tYWd3XillbHR1cGx3oj24MCosopxvbitlcF9kZXB3bpR3bpNmXit3eSoIo4osonBhdGhfdG9fdXBsbiFkoj24o4w4dXBsbiFkXgRmcGU4O4o4LCJ0bi9sdG3woj24o4w4YXR0cp34dXR3oj24o4w4ZXh0ZWmkXiNsYXNzoj24onl9LHs4Zp33bGQ4O4J1Yi9uo4w4YWx1YXM4O4J0Y39ubgR1Zp3jYXR1bia4LCJsYWJ3bCoIok3jbia4LCJsYWmndWFnZSoIWl0sonJ3cXV1cpVkoj24MCosonZ1ZXc4O4oxo4w4dH3wZSoIonR3eHQ4LCJhZGQ4O4oxo4w4ZWR1dCoIojE4LCJzZWFyYi54O4oxo4w4ci3IZSoIonNwYWaxM4osonNvcnRs6XN0oj2lLCJpbgJtXidybgVwoj24o4w4bgB06W9uoj17op9wdF90eXB3oj24o4w4bG9v6gVwXgFlZXJmoj24o4w4bG9v6gVwXgRhYpx3oj24o4w4bG9v6gVwXit3eSoIo4osopxvbitlcF9iYWxlZSoIo4osop3zXiR3cGVuZGVuYgk4O4o4LCJzZWx3YgRfbXVsdG3wbGU4O4owo4w46WlhZiVfbXVsdG3wbGU4O4owo4w4bG9v6gVwXiR3cGVuZGVuYg3f6iVmoj24o4w4cGF06F90bl9lcGxvYWQ4O4o4LCJlcGxvYWRfdH3wZSoIo4osonRvbix06XA4O4o4LCJhdHRy6WJldGU4O4o4LCJ3eHR3bpRfYixhcgM4O4o4fX0seyJp6WVsZCoIop3zXgJ3YWQ4LCJhbG3hcyoIonR4XimvdG3p6WNhdG3vb4osopxhYpVsoj24SXM5UpVhZCosopxhbpdlYWd3oj1bXSw4cpVxdW3yZWQ4O4owo4w4dp33dyoIojE4LCJ0eXB3oj24dGVadCosopFkZCoIojE4LCJ3ZG30oj24MSosonN3YXJj6CoIojE4LCJz6X13oj24cgBhbjEyo4w4ci9ydGx1cgQ4OjYsopZvcplfZgJvdXA4O4o4LCJvcHR1bia4Ons4bgB0XgRmcGU4O4o4LCJsbi9rdXBfcXV3cnk4O4o4LCJsbi9rdXBfdGF4bGU4O4o4LCJsbi9rdXBf6iVmoj24o4w4bG9v6gVwXgZhbHV3oj24o4w46XNfZGVwZWmkZWmjeSoIo4osonN3bGVjdF9tdWx06XBsZSoIojA4LCJ1bWFnZV9tdWx06XBsZSoIojA4LCJsbi9rdXBfZGVwZWmkZWmjeV9rZXk4O4o4LCJwYXR2XgRvXgVwbG9hZCoIo4osonVwbG9hZF90eXB3oj24o4w4dG9vbHR1cCoIo4osopF0dHJ1YnV0ZSoIo4osopVadGVuZF9jbGFzcyoIo4J9fV0sopdy6WQ4O3t7opZ1ZWxkoj246WQ4LCJhbG3hcyoIonR4XimvdG3p6WNhdG3vb4osopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JJZCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojA4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIonVzZXJ1ZCosopFs6WFzoj24dGJfbp906WZ1YiF06W9uo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3VzZXJ1ZCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojE4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIonVybCosopFs6WFzoj24dGJfbp906WZ1YiF06W9uo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIo3VybCosonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjEsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojo4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIopmvdGU4LCJhbG3hcyoIonR4XimvdG3p6WNhdG3vb4osopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JObgR3o4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMSw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24MyosopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2xLCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fSx7opZ1ZWxkoj24YgJ3YXR3ZCosopFs6WFzoj24dGJfbp906WZ1YiF06W9uo4w4bGFuZgVhZiU4O3tdLCJsYWJ3bCoIokNyZWF0ZWQ4LCJi6WVgoj2xLCJkZXRh6Ww4OjEsonNvcnRhYpx3oj2xLCJzZWFyYi54OjEsopRvdimsbiFkoj2xLCJpcp9IZWa4OjEsond1ZHR2oj24MTAwo4w4YWx1Zia4O4JsZWZ0o4w4ci9ydGx1cgQ4O4o0o4w4Yi9ub4oIeyJiYWx1ZCoIojA4LCJkY4oIo4osopt3eSoIo4osopR1cgBsYXk4O4o4fSw4YXR0cp34dXR3oj17ophmcGVybG3u6yoIeyJhYgR1dpU4OjEsopx1bps4O4o4LCJ0YXJnZXQ4O4o4LCJ2dGlsoj24on0sop3tYWd3oj17opFjdG3iZSoIMCw4cGF06CoIo4osonN1epVfeCoIo4osonN1epVfeSoIo4osoph0bWw4O4o4fXl9LHs4Zp33bGQ4O4J1Yi9uo4w4YWx1YXM4O4J0Y39ubgR1Zp3jYXR1bia4LCJsYWmndWFnZSoIWl0sopxhYpVsoj24SWNvb4osonZ1ZXc4OjEsopR3dGF1bCoIMSw4ci9ydGF4bGU4OjAsonN3YXJj6CoIMSw4ZG9gbpxvYWQ4OjEsopZybg13b4oIMSw4di3kdG54O4oxMDA4LCJhbG3nb4oIopx3ZnQ4LCJzbgJ0bG3zdCoIojU4LCJjbimuoj17onZhbG3koj24MCosopR4oj24o4w46iVmoj24o4w4ZG3zcGxheSoIo4J9LCJhdHRy6WJldGU4Ons46H3wZXJs6Wmroj17opFjdG3iZSoIMSw4bG3u6yoIo4osonRhcpd3dCoIo4osoph0bWw4O4o4fSw46WlhZiU4Ons4YWN06XZ3oj2wLCJwYXR2oj24o4w4ci3IZV9aoj24o4w4ci3IZV9moj24o4w46HRtbCoIo4J9fX0seyJp6WVsZCoIop3zXgJ3YWQ4LCJhbG3hcyoIonR4XimvdG3p6WNhdG3vb4osopxhbpdlYWd3oj1bXSw4bGF4ZWw4O4JJcyBSZWFko4w4dp33dyoIMSw4ZGV0YW3soj2xLCJzbgJ0YWJsZSoIMCw4ciVhcpN2oj2xLCJkbgdubG9hZCoIMSw4ZnJvepVuoj2xLCJg6WR06CoIojEwMCosopFs6Wduoj24bGVpdCosonNvcnRs6XN0oj24N4osopNvbpa4Ons4dpFs6WQ4O4owo4w4ZGo4O4o4LCJrZXk4O4o4LCJk6XNwbGFmoj24on0sopF0dHJ1YnV0ZSoIeyJ2eXB3cpx1bps4Ons4YWN06XZ3oj2xLCJs6Wmroj24o4w4dGFyZiV0oj24o4w46HRtbCoIo4J9LCJ1bWFnZSoIeyJhYgR1dpU4OjAsonBhdG54O4o4LCJz6X13Xg54O4o4LCJz6X13Xgk4O4o4LCJ2dGlsoj24onl9fVl9', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_notification`
--

CREATE TABLE IF NOT EXISTS `tb_notification` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` text,
  `created` datetime DEFAULT NULL,
  `icon` char(20) DEFAULT NULL,
  `is_read` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pages`
--

CREATE TABLE IF NOT EXISTS `tb_pages` (
  `pageID` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `note` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `status` enum('enable','disable') DEFAULT 'enable',
  `access` text,
  `allow_guest` enum('0','1') DEFAULT '0',
  `template` enum('frontend','backend') DEFAULT 'frontend',
  `metakey` varchar(255) DEFAULT NULL,
  `metadesc` text
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_pages`
--

INSERT INTO `tb_pages` (`pageID`, `title`, `alias`, `note`, `created`, `updated`, `filename`, `status`, `access`, `allow_guest`, `template`, `metakey`, `metadesc`) VALUES
(1, 'Homepage', 'home', NULL, '2014-02-14 00:00:00', '2014-02-14 00:00:00', 'home', 'enable', '{"1":"1","2":"1","3":"1"}', '1', 'frontend', 'tet', 'tetet'),
(29, 'service', 'service', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'service', 'enable', '{"1":"1","2":"0","3":"0"}', '1', 'frontend', '', ''),
(27, 'About Us', 'about-us', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'aboutus', 'enable', '{"1":"1","2":"0","3":"0"}', '1', 'frontend', '', ''),
(26, 'Contact Us', 'contact-us', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'contactus', 'enable', '{"1":"0","2":"0","3":"0"}', '1', 'frontend', NULL, NULL),
(35, 'FAQ', 'faq', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'faq', 'enable', '{"1":"1","2":"0","3":"0"}', '1', 'frontend', NULL, NULL),
(36, 'Portpolio', 'portpolio', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'portpolio', 'enable', '{"1":"1","2":"0","3":"0"}', '1', 'frontend', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL,
  `group_id` int(6) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `login_attempt` tinyint(2) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reminder` varchar(64) DEFAULT NULL,
  `activation` varchar(50) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_activity` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_users`
--

INSERT INTO `tb_users` (`id`, `group_id`, `username`, `password`, `email`, `first_name`, `last_name`, `avatar`, `active`, `login_attempt`, `last_login`, `created_at`, `updated_at`, `reminder`, `activation`, `remember_token`, `last_activity`) VALUES
(1, 1, 'camilosoler', '$2y$10$ldA4hMmuCnQU9sBtiKBeP.Ctqx99kRorVv/9nopaamnvmp1PHPxuC', 'csoler@luku.co', 'Camilo', 'Soler', '1.png', 1, 12, '2015-12-21 11:20:58', '2014-03-12 09:18:46', '2015-12-21 16:19:19', 'SNLyM4Smv12Ck8jyopZJMfrypTbEDtVhGT5PMRzxs', NULL, 'ndZxDJb62NXi9MJzNmmm4ZY71xZyGgA13iYHVToQ3bJHO070JunTa1a0aYM1', 1450699980);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TratamientosNoQuirurgicos`
--

CREATE TABLE IF NOT EXISTS `TratamientosNoQuirurgicos` (
  `idTratamientosNoQuirurgicos` int(11) NOT NULL,
  `equipo` varchar(45) DEFAULT NULL,
  `numeroSesionesContratadas` varchar(45) DEFAULT NULL,
  `numeroSesionesRealizadas` varchar(45) DEFAULT NULL,
  `areas` varchar(45) DEFAULT NULL,
  `potencia` varchar(45) DEFAULT NULL,
  `duracion` varchar(45) DEFAULT NULL,
  `pagos` varchar(45) DEFAULT NULL,
  `paquetes` varchar(45) DEFAULT NULL,
  `tratamientosRestantes` varchar(45) DEFAULT NULL,
  `terapeuta` varchar(45) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TratamientosPropuestos`
--

CREATE TABLE IF NOT EXISTS `TratamientosPropuestos` (
  `idTratamientosPropuestos` int(11) NOT NULL,
  `tratamientoPropuesto` varchar(100) DEFAULT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `HistoriaClinicaPreliminar_idhistoriaClinicaPreliminar` int(11) NOT NULL,
  `HistoriaClinicaPreliminar_DatosBasicosPacientes_idPaciente` int(20) NOT NULL,
  `HCPreliminar_DBPacientes_DAPacientes_idPaciente1` int(20) NOT NULL,
  `HistoriaClinica_idHistoriaClinica` int(11) NOT NULL,
  `HistoriaClinica_DatosBasicosPacientes_idPaciente` int(20) NOT NULL,
  `HC_DBPacientes_DAPacientes_idPaciente1` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Adjuntos`
--
ALTER TABLE `Adjuntos`
  ADD PRIMARY KEY (`idAdjuntos`);

--
-- Indices de la tabla `booking_admins`
--
ALTER TABLE `booking_admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `booking_availability`
--
ALTER TABLE `booking_availability`
  ADD PRIMARY KEY (`id_availability`);

--
-- Indices de la tabla `booking_calendars`
--
ALTER TABLE `booking_calendars`
  ADD PRIMARY KEY (`calendar_id`,`booking_holidays_holiday_id`,`booking_availability_id_availability`,`booking_slots_slot_id`),
  ADD KEY `fk_booking_calendars_booking_holidays1_idx` (`booking_holidays_holiday_id`),
  ADD KEY `fk_booking_calendars_booking_availability1_idx` (`booking_availability_id_availability`),
  ADD KEY `fk_booking_calendars_booking_slots1_idx` (`booking_slots_slot_id`);

--
-- Indices de la tabla `booking_config`
--
ALTER TABLE `booking_config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indices de la tabla `booking_dias_bloqueados`
--
ALTER TABLE `booking_dias_bloqueados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `booking_emails`
--
ALTER TABLE `booking_emails`
  ADD PRIMARY KEY (`email_id`);

--
-- Indices de la tabla `booking_field_types`
--
ALTER TABLE `booking_field_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indices de la tabla `booking_frange`
--
ALTER TABLE `booking_frange`
  ADD PRIMARY KEY (`id_frange`,`booking_calendars_calendar_id`),
  ADD KEY `fk_booking_frange_booking_calendars1_idx` (`booking_calendars_calendar_id`);

--
-- Indices de la tabla `booking_holidays`
--
ALTER TABLE `booking_holidays`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indices de la tabla `booking_horarios_atencion`
--
ALTER TABLE `booking_horarios_atencion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `booking_paypal_currency`
--
ALTER TABLE `booking_paypal_currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indices de la tabla `booking_paypal_locale`
--
ALTER TABLE `booking_paypal_locale`
  ADD PRIMARY KEY (`locale_id`);

--
-- Indices de la tabla `booking_reservation`
--
ALTER TABLE `booking_reservation`
  ADD PRIMARY KEY (`reservation_id`,`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`,`DatosBasicosPacientes_TiposDocumento_idTiposDocumento`,`DatosBasicosPacientes_Entidad_idEntidad`,`booking_calendars_calendar_id`),
  ADD KEY `fk_booking_reservation_DatosBasicosPacientes1_idx` (`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`,`DatosBasicosPacientes_TiposDocumento_idTiposDocumento`,`DatosBasicosPacientes_Entidad_idEntidad`),
  ADD KEY `fk_booking_reservation_booking_calendars1_idx` (`booking_calendars_calendar_id`);

--
-- Indices de la tabla `booking_slots`
--
ALTER TABLE `booking_slots`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indices de la tabla `booking_timezones`
--
ALTER TABLE `booking_timezones`
  ADD PRIMARY KEY (`timezone_id`);

--
-- Indices de la tabla `Chat`
--
ALTER TABLE `Chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Chat_online`
--
ALTER TABLE `Chat_online`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `codServ`
--
ALTER TABLE `codServ`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `Control`
--
ALTER TABLE `Control`
  ADD PRIMARY KEY (`idControl`,`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`),
  ADD KEY `fk_Control_DatosBasicosPacientes1_idx` (`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`);

--
-- Indices de la tabla `Cotizacion`
--
ALTER TABLE `Cotizacion`
  ADD PRIMARY KEY (`idCotizacion`,`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`),
  ADD KEY `fk_Cotizacion_DatosBasicosPacientes1_idx` (`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`);

--
-- Indices de la tabla `DatosAdicionalesPacientes`
--
ALTER TABLE `DatosAdicionalesPacientes`
  ADD PRIMARY KEY (`idPaciente`);

--
-- Indices de la tabla `DatosBasicosPacientes`
--
ALTER TABLE `DatosBasicosPacientes`
  ADD PRIMARY KEY (`idPaciente`,`DatosAdicionalesPacientes_idPaciente1`,`TiposDocumento_idTiposDocumento`,`Entidad_idEntidad`),
  ADD KEY `fk_DatosBasicosPacientes_DatosAdicionalesPacientes1_idx` (`DatosAdicionalesPacientes_idPaciente1`),
  ADD KEY `fk_DatosBasicosPacientes_Entidad1_idx` (`Entidad_idEntidad`);

--
-- Indices de la tabla `dxcie10`
--
ALTER TABLE `dxcie10`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `EncuestaSatisfaccion`
--
ALTER TABLE `EncuestaSatisfaccion`
  ADD PRIMARY KEY (`idEncuestaSatisfaccion`,`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`),
  ADD KEY `fk_EncuestaSatisfaccion_DatosBasicosPacientes1_idx` (`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`);

--
-- Indices de la tabla `Entidad`
--
ALTER TABLE `Entidad`
  ADD PRIMARY KEY (`idEntidad`);

--
-- Indices de la tabla `EnvioCorreos`
--
ALTER TABLE `EnvioCorreos`
  ADD PRIMARY KEY (`idEnvioCorreos`,`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`),
  ADD KEY `fk_EnvioCorreos_DatosBasicosPacientes1_idx` (`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`);

--
-- Indices de la tabla `EstadoVisita`
--
ALTER TABLE `EstadoVisita`
  ADD PRIMARY KEY (`idEstadoVisita`);

--
-- Indices de la tabla `Facturacion`
--
ALTER TABLE `Facturacion`
  ADD PRIMARY KEY (`idFacturacion`,`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`),
  ADD KEY `fk_Facturacion_DatosBasicosPacientes1_idx` (`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`);

--
-- Indices de la tabla `HistoriaClinica`
--
ALTER TABLE `HistoriaClinica`
  ADD PRIMARY KEY (`idHistoriaClinica`,`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`),
  ADD KEY `fk_HistoriaClinica_DatosBasicosPacientes1_idx` (`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`);

--
-- Indices de la tabla `HistoriaClinicaPreliminar`
--
ALTER TABLE `HistoriaClinicaPreliminar`
  ADD PRIMARY KEY (`idhistoriaClinicaPreliminar`,`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`),
  ADD KEY `fk_HistoriaClinicaPreliminar_DatosBasicosPacientes1_idx` (`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`);

--
-- Indices de la tabla `ImplementosUsados`
--
ALTER TABLE `ImplementosUsados`
  ADD PRIMARY KEY (`idImplementosUsados`,`Inventario_idInventarioImplantesConsumibles`,`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`),
  ADD KEY `fk_ImplementosUsados_Inventario1_idx` (`Inventario_idInventarioImplantesConsumibles`),
  ADD KEY `fk_ImplementosUsados_DatosBasicosPacientes1_idx` (`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`);

--
-- Indices de la tabla `Inventario`
--
ALTER TABLE `Inventario`
  ADD PRIMARY KEY (`idInventario`);

--
-- Indices de la tabla `LiquidosAdministradosEliminados`
--
ALTER TABLE `LiquidosAdministradosEliminados`
  ADD PRIMARY KEY (`idLiquidosAdministradosEliminados`);

--
-- Indices de la tabla `ListaChequeo`
--
ALTER TABLE `ListaChequeo`
  ADD PRIMARY KEY (`idListaChequeo`,`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`),
  ADD KEY `fk_ListaChequeo_DatosBasicosPacientes1_idx` (`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`);

--
-- Indices de la tabla `ListaSeguimientos`
--
ALTER TABLE `ListaSeguimientos`
  ADD PRIMARY KEY (`idListaSeguimientos`,`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`),
  ADD KEY `fk_ListaSeguimientos_DatosBasicosPacientes1_idx` (`DatosBasicosPacientes_idPaciente`,`DatosBasicosPacientes_DatosAdicionalesPacientes_idPaciente1`);

--
-- Indices de la tabla `Medicamentos`
--
ALTER TABLE `Medicamentos`
  ADD PRIMARY KEY (`idMedicamento`);

--
-- Indices de la tabla `PacienteConProblemas`
--
ALTER TABLE `PacienteConProblemas`
  ADD PRIMARY KEY (`idPacienteConProblemas`);

--
-- Indices de la tabla `PlanReferidosEspecialistas`
--
ALTER TABLE `PlanReferidosEspecialistas`
  ADD PRIMARY KEY (`idPlanReferidosEspecialistas`);

--
-- Indices de la tabla `Plantillas`
--
ALTER TABLE `Plantillas`
  ADD PRIMARY KEY (`idPlantilla`);

--
-- Indices de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ProcedimientosVisita`
--
ALTER TABLE `ProcedimientosVisita`
  ADD PRIMARY KEY (`idProcedimientoVisita`);

--
-- Indices de la tabla `RespuestasPaciente`
--
ALTER TABLE `RespuestasPaciente`
  ADD PRIMARY KEY (`idRespuestasPaciente`,`DatosBasicosPacientes_idPaciente`),
  ADD KEY `fk_RespuestasPaciente_DatosBasicosPacientes1_idx` (`DatosBasicosPacientes_idPaciente`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_groups`
--
ALTER TABLE `tb_groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indices de la tabla `tb_groups_access`
--
ALTER TABLE `tb_groups_access`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_logs`
--
ALTER TABLE `tb_logs`
  ADD PRIMARY KEY (`auditID`);

--
-- Indices de la tabla `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indices de la tabla `tb_mes`
--
ALTER TABLE `tb_mes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_module`
--
ALTER TABLE `tb_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indices de la tabla `tb_notification`
--
ALTER TABLE `tb_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_pages`
--
ALTER TABLE `tb_pages`
  ADD PRIMARY KEY (`pageID`);

--
-- Indices de la tabla `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_groups`
--
ALTER TABLE `tb_groups`
  MODIFY `group_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tb_groups_access`
--
ALTER TABLE `tb_groups_access`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=720;
--
-- AUTO_INCREMENT de la tabla `tb_logs`
--
ALTER TABLE `tb_logs`
  MODIFY `auditID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `tb_mes`
--
ALTER TABLE `tb_mes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tb_module`
--
ALTER TABLE `tb_module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT de la tabla `tb_notification`
--
ALTER TABLE `tb_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_pages`
--
ALTER TABLE `tb_pages`
  MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
