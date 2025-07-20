-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2024 at 06:44 AM
-- Server version: 10.11.6-MariaDB-0+deb12u1
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MedAgenda`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `MD_ActualizarPacientes` (IN `idPaciente` INT(11), IN `_nombrePaciente` VARCHAR(30), IN `_nacimiento` DATE, IN `_sexo` ENUM('H','M'), IN `_sangre` VARCHAR(5), IN `_peso` INT(5), IN `_estatura` INT(5), IN `_dir` VARCHAR(70), IN `_correo` VARCHAR(70), IN `_contra` VARCHAR(50), IN `_telefono` VARCHAR(10), IN `_celular` VARCHAR(10), IN `_enfermedades` VARCHAR(90), IN `_alergias` VARCHAR(90), IN `_detalles` VARCHAR(150), IN `_inhabilitado` BIT(1))   begin
	update pacientes
    set
    nombrePaciente = _nombrePaciente,
    nacimiento = _nacimiento,
    sexo = _sexo,
    sangre = _sangre,
    peso = _peso,
    estatura = _estatura,
    dir = _dir,
    correo = _correo,
    contra = _contra,
    telefono = _telefono,
    celular = _celular,
    enfermedades = _enfermedades,
    alergias = _alergias,
    detalles = _detalles,
    inhabilitado = _inhabilitado;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MD_CancelarCita` (IN `_idCita` INT(11), `estado` VARCHAR(30))   begin
	select estado from citas where idCita = _idCita;
	set estado = "Cancelado";
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MD_CrearCita` (IN `_fecha` DATE, IN `_hora` TIME, IN `_idPaciente` INT(11), IN `_idMedico` INT(11))   begin
	insert into citas(fecha,hora,idPaciente,idMedico) values (_fecha,_hora,_idPaciente,_idMedico);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MD_EliminarPaciente` (IN `_idPacientes` INT(11))   begin
	delete from pacientes where idPacientes = _idPacientes;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MD_IngresarPaciente` (IN `_nombrePaciente` VARCHAR(30), IN `_nacimiento` DATE, IN `_sexo` ENUM('H','M'), IN `_sangre` VARCHAR(5), IN `_peso` INT(5), IN `_estatura` INT(5), IN `_dir` VARCHAR(70), IN `_correo` VARCHAR(70), IN `_contra` VARCHAR(50), IN `_telefono` VARCHAR(10), IN `_celular` VARCHAR(10), IN `_enfermedades` VARCHAR(90), IN `_alergias` VARCHAR(90), IN `_detalles` VARCHAR(150))   begin
	insert into pacientes(nombrePaciente,nacimiento,sexo,sangre,peso,estatura,dir,correo,contra,telefono,celular,enfermedades,alergias,detalles) values (_nombrePaciente,_nacimiento,_sexo,_sangre,_peso,_estatura,_dir,_correo,_contra,_telefono,_celular,_enfermedades,_alergias,_detalles);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MD_SeleccionarPaciente` (IN `_idPacientes` INT(11))   begin
	select * from pacientes where idPacientes = _idPacientes;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `promedio_campo` (IN `campo` VARCHAR(20), IN `fecha_inicio` DATE, IN `fecha_final` DATE)   BEGIN
  DECLARE query VARCHAR(255);

  SET @query = CONCAT('SELECT AVG(', campo, ') AS Promedio 
                      FROM encuesta 
                      JOIN citas ON encuesta.idCita = citas.idCita 
                      WHERE citas.fecha BETWEEN "', fecha_inicio, '" AND "', fecha_final, '";');

  PREPARE stmt FROM @query;
  EXECUTE stmt;
  DEALLOCATE PREPARE stmt;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `idCita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `fechaCancelacion` datetime DEFAULT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'En Espera',
  `idPaciente` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `citas`
--

INSERT INTO `citas` (`idCita`, `fecha`, `hora`, `fechaCancelacion`, `estado`, `idPaciente`, `idMedico`) VALUES
(1, '2024-12-11', '09:30:00', '0000-00-00 00:00:00', 'Cancelada', 1, 1),
(2, '2024-11-21', '10:00:00', '0000-00-00 00:00:00', 'En Espera', 2, 2),
(3, '2024-11-22', '11:00:00', '0000-00-00 00:00:00', 'En Espera', 3, 3),
(4, '2024-11-23', '12:00:00', '0000-00-00 00:00:00', 'En Espera', 4, 4),
(5, '2024-11-24', '13:00:00', '0000-00-00 00:00:00', 'En Espera', 5, 5),
(6, '2024-11-25', '14:00:00', '0000-00-00 00:00:00', 'En Espera', 6, 6),
(7, '2024-11-26', '15:00:00', '0000-00-00 00:00:00', 'En Espera', 7, 7),
(8, '2024-11-27', '16:00:00', '0000-00-00 00:00:00', 'En Espera', 8, 8),
(9, '2024-11-28', '17:00:00', '0000-00-00 00:00:00', 'En Espera', 9, 9),
(10, '2024-11-29', '18:00:00', '0000-00-00 00:00:00', 'En Espera', 10, 10),
(11, '2024-11-30', '19:00:00', '0000-00-00 00:00:00', 'En Espera', 11, 11),
(12, '2024-12-01', '20:00:00', '0000-00-00 00:00:00', 'En Espera', 12, 12),
(13, '2024-12-02', '21:00:00', '0000-00-00 00:00:00', 'En Espera', 13, 13),
(14, '2024-12-03', '22:00:00', '0000-00-00 00:00:00', 'En Espera', 14, 14),
(15, '2024-12-04', '23:00:00', '0000-00-00 00:00:00', 'En Espera', 15, 15),
(16, '2024-12-05', '08:00:00', '0000-00-00 00:00:00', 'En Espera', 16, 16),
(17, '2024-12-06', '09:00:00', '0000-00-00 00:00:00', 'En Espera', 17, 17),
(18, '2024-12-07', '10:00:00', '0000-00-00 00:00:00', 'En Espera', 18, 18),
(19, '2024-12-08', '11:00:00', '0000-00-00 00:00:00', 'En Espera', 19, 19),
(20, '2024-12-09', '12:00:00', '0000-00-00 00:00:00', 'En Espera', 20, 20),
(21, '2024-11-30', '09:00:00', '0000-00-00 00:00:00', 'Cancelada', 1, 9),
(22, '2024-11-22', '11:30:00', '0000-00-00 00:00:00', 'Cancelada', 1, 2),
(23, '2024-11-22', '09:00:00', '0000-00-00 00:00:00', 'Completada', 1, 1),
(24, '2024-11-23', '13:00:00', '0000-00-00 00:00:00', 'Completada', 1, 7),
(25, '2024-11-27', '10:00:00', '0000-00-00 00:00:00', 'Cancelada', 1, 16),
(26, '2024-11-26', '17:00:00', '0000-00-00 00:00:00', 'Cancelada', 1, 16),
(27, '2024-11-26', '12:30:00', '0000-00-00 00:00:00', 'Cancelada', 1, 16),
(28, '2024-11-29', '15:30:00', '0000-00-00 00:00:00', 'Cancelada', 1, 11),
(29, '2024-12-04', '09:00:00', '0000-00-00 00:00:00', 'Cancelada', 1, 2),
(30, '2024-12-04', '11:30:00', NULL, 'Cancelada', 1, 4),
(31, '2024-12-18', '09:00:00', NULL, 'En Espera', 1, 1),
(32, '2024-12-30', '12:00:00', NULL, 'Completada', 1, 12),
(33, '2024-12-23', '09:00:00', NULL, 'Completada', 1, 5),
(34, '2024-12-16', '12:00:00', NULL, 'En Espera', 1, 15),
(35, '2024-12-27', '10:00:00', NULL, 'Completada', 1, 1),
(36, '2024-12-17', '14:00:00', NULL, 'Completada', 1, 1),
(37, '2024-12-18', '13:30:00', NULL, 'En Espera', 1, 1),
(38, '2024-12-24', '16:30:00', NULL, 'Completada', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `encuesta`
--

CREATE TABLE `encuesta` (
  `idEncuenta` int(11) NOT NULL,
  `idCita` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `atencion` int(5) NOT NULL,
  `limpieza` int(5) NOT NULL,
  `efectividad` int(5) NOT NULL,
  `espera` int(5) NOT NULL,
  `claridad` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `encuesta`
--

INSERT INTO `encuesta` (`idEncuenta`, `idCita`, `idMedico`, `atencion`, `limpieza`, `efectividad`, `espera`, `claridad`) VALUES
(1, 23, 1, 5, 5, 5, 5, 5),
(3, 1, 1, 4, 4, 3, 5, 3),
(4, 24, 1, 5, 5, 5, 5, 5),
(5, 32, 1, 2, 3, 2, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `medicos`
--

CREATE TABLE `medicos` (
  `idMedico` int(11) NOT NULL,
  `nombreMedico` varchar(70) NOT NULL,
  `cedula` varchar(30) NOT NULL,
  `especialidad` varchar(70) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `contra` varchar(35) NOT NULL,
  `tipo_cuenta` enum('medico') NOT NULL DEFAULT 'medico'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicos`
--

INSERT INTO `medicos` (`idMedico`, `nombreMedico`, `cedula`, `especialidad`, `correo`, `contra`, `tipo_cuenta`) VALUES
(1, 'Dr. Juan Pérez', '1234567890', 'Cardiología', 'juan.perez@example.com', 'password1', 'medico'),
(2, 'Dr. María López', '2345678901', 'Nefrología', 'maria.lopez@example.com', 'password2', 'medico'),
(3, 'Dr. Carlos García', '3456789012', 'Neurología', 'carlos.garcia@example.com', 'password3', 'medico'),
(4, 'Dr. Ana Martínez', '4567890123', 'Ortopedía', 'ana.martinez@example.com', 'password4', 'medico'),
(5, 'Dr. José Rodríguez', '5678901234', 'Pediatría', 'jose.rodriguez@example.com', 'password5', 'medico'),
(6, 'Dr. Laura Hernández', '6789012345', 'Dermatología', 'laura.hernandez@example.com', 'password6', 'medico'),
(7, 'Dr. David González', '7890123456', 'Ginecología', 'david.gonzalez@example.com', 'password7', 'medico'),
(8, 'Dr. Patricia Sánchez', '8901234567', 'Oftalmología', 'patricia.sanchez@example.com', 'password8', 'medico'),
(9, 'Dr. Javier Ramírez', '9012345678', 'Psiquiatría', 'javier.ramirez@example.com', 'password9', 'medico'),
(10, 'Dr. Carmen Torres', '0123456789', 'Oncología', 'carmen.torres@example.com', 'password10', 'medico'),
(11, 'Dr. Luis Flores', '1123456789', 'Endocrinología', 'luis.flores@example.com', 'password11', 'medico'),
(12, 'Dr. Elena Díaz', '2123456789', 'Reumatología', 'elena.diaz@example.com', 'password12', 'medico'),
(13, 'Dr. Miguel Morales', '3123456789', 'Urología', 'miguel.morales@example.com', 'password13', 'medico'),
(14, 'Dr. Rosa Gómez', '4123456789', 'Gastroenterología', 'rosa.gomez@example.com', 'password14', 'medico'),
(15, 'Dr. Francisco Ruiz', '5123456789', 'Neumología', 'francisco.ruiz@example.com', 'password15', 'medico'),
(16, 'Dr. Teresa Jiménez', '6123456789', 'Hematología', 'teresa.jimenez@example.com', 'password16', 'medico'),
(17, 'Dr. Alberto Mendoza', '7123456789', 'Infectología', 'alberto.mendoza@example.com', 'password17', 'medico'),
(18, 'Dr. Marta Castro', '8123456789', 'Nefrología', 'marta.castro@example.com', 'password18', 'medico'),
(19, 'Dr. Ricardo Ortiz', '9123456789', 'Cardiología', 'ricardo.ortiz@example.com', 'password19', 'medico'),
(20, 'Dr. Silvia Romero', '1012345678', 'Dermatología', 'silvia.romero@example.com', 'password20', 'medico');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `idPacientes` int(11) NOT NULL,
  `nombrePaciente` varchar(50) NOT NULL,
  `nacimiento` date NOT NULL,
  `sexo` enum('H','M') NOT NULL,
  `sangre` varchar(18) NOT NULL,
  `peso` int(5) NOT NULL,
  `estatura` int(5) NOT NULL,
  `dir` varchar(70) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `contra` varchar(250) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `enfermedades` varchar(90) NOT NULL,
  `alergias` varchar(90) NOT NULL,
  `detalles` varchar(150) NOT NULL,
  `inhabilitado` bit(1) NOT NULL,
  `tipo_cuenta` enum('paciente') NOT NULL DEFAULT 'paciente',
  `foto_perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`idPacientes`, `nombrePaciente`, `nacimiento`, `sexo`, `sangre`, `peso`, `estatura`, `dir`, `correo`, `contra`, `telefono`, `celular`, `enfermedades`, `alergias`, `detalles`, `inhabilitado`, `tipo_cuenta`, `foto_perfil`) VALUES
(1, 'Adrian Felipe Lara Torres', '2005-09-09', 'H', 'B positivo (B+)', 76, 176, 'Av. Jalisco y 59', 'adrianfelilara@gmail.com', 'utslrc123', '6531650326', '6531650326', 'Ninguna', 'Ninguna', 'Ningune', b'0', 'paciente', NULL),
(2, 'María Fernanda López', '1990-05-12', 'M', 'O negativo (O-)', 65, 160, '1', 'maria.lopez@example.com', 'password123', '6531650327', '6531650327', 'Diabetes', 'Ninguna', 'Insulina diaria', b'0', 'paciente', NULL),
(3, 'Juan Carlos Pérez', '1985-11-23', 'H', 'A positivo (A+)', 80, 175, '2', 'juan.perez@example.com', 'password123', '6531650328', '6531650328', 'Hipertensión', 'Polvo', 'Medicamento diario', b'0', 'paciente', NULL),
(4, 'Ana Sofía Martínez', '2000-07-15', 'M', 'AB positivo (AB+)', 55, 165, '3', 'ana.martinez@example.com', 'password123', '6531650329', '6531650329', 'Asma', 'Ácaros', 'Inhalador', b'0', 'paciente', NULL),
(5, 'Luis Alberto Gómez', '1995-03-30', 'H', 'B negativo (B-)', 90, 180, '4', 'luis.gomez@example.com', 'password123', '6531650330', '6531650330', 'Ninguna', 'Maní', 'Ninguno', b'0', 'paciente', NULL),
(6, 'Carmen Rodríguez', '1988-12-05', 'M', 'O positivo (O+)', 70, 170, '5', 'carmen.rodriguez@example.com', 'password123', '6531650331', '6531650331', 'Hipotiroidismo', 'Ninguna', 'Levotiroxina diaria', b'0', 'paciente', NULL),
(7, 'José Antonio Ramírez', '1978-09-18', 'H', 'A negativo (A-)', 85, 178, '6', 'jose.ramirez@example.com', 'password123', '6531650332', '6531650332', 'Ninguna', 'Lácteos', 'Ninguno', b'0', 'paciente', NULL),
(8, 'Laura Patricia Sánchez', '1992-04-22', 'M', 'B positivo (B+)', 60, 162, '7', 'laura.sanchez@example.com', 'password123', '6531650333', '6531650333', 'Migrañas', 'Ninguna', 'Medicamento para migrañas', b'0', 'paciente', NULL),
(9, 'Miguel Ángel Torres', '1983-01-10', 'H', 'O negativo (O-)', 95, 185, '8', 'miguel.torres@example.com', 'password123', '6531650334', '6531650334', 'Ninguna', 'Mariscos', 'Ninguno', b'0', 'paciente', NULL),
(10, 'Paula Andrea Morales', '1997-06-14', 'M', 'A positivo (A+)', 68, 168, '9', 'paula.morales@example.com', 'password123', '6531650335', '6531650335', 'Epilepsia', 'Ninguna', 'Medicamento anticonvulsivo', b'0', 'paciente', NULL),
(11, 'Carlos Eduardo Herrera', '1980-02-27', 'H', 'AB negativo (AB-)', 78, 172, '10', 'carlos.herrera@example.com', 'password123', '6531650336', '6531650336', 'Ninguna', 'Polen', 'Ninguno', b'0', 'paciente', NULL),
(12, 'Gabriela Isabel Ruiz', '1993-08-19', 'M', 'O positivo (O+)', 72, 174, '11', 'gabriela.ruiz@example.com', 'password123', '6531650337', '6531650337', 'Artritis', 'Ninguna', 'Medicamento antiinflamatorio', b'0', 'paciente', NULL),
(13, 'Ricardo Javier Mendoza', '1986-11-02', 'H', 'B negativo (B-)', 88, 182, '12', 'ricardo.mendoza@example.com', 'password123', '6531650338', '6531650338', 'Ninguna', 'Gluten', 'Ninguno', b'0', 'paciente', NULL),
(14, 'Patricia Elena Vargas', '1991-05-25', 'M', 'A positivo (A+)', 64, 166, '13', 'patricia.vargas@example.com', 'password123', '6531650339', '6531650339', 'Ninguna', 'Nueces', 'Ninguno', b'0', 'paciente', NULL),
(15, 'Fernando José Castillo', '1984-03-08', 'H', 'O negativo (O-)', 92, 184, '14', 'fernando.castillo@example.com', 'password123', '6531650340', '6531650340', 'Hipertensión', 'Ninguna', 'Medicamento diario', b'0', 'paciente', NULL),
(16, 'Mónica Alejandra Flores', '1996-07-29', 'M', 'B positivo (B+)', 58, 160, '15', 'monica.flores@example.com', 'password123', '6531650341', '6531650341', 'Asma', 'Ácaros', 'Inhalador', b'0', 'paciente', NULL),
(17, 'Jorge Luis Gutiérrez', '1982-10-11', 'H', 'A negativo (A-)', 86, 180, '16', 'jorge.gutierrez@example.com', 'password123', '6531650342', '6531650342', 'Ninguna', 'Lácteos', 'Ninguno', b'0', 'paciente', NULL),
(18, 'Sandra Milena Ortiz', '1994-01-03', 'M', 'O positivo (O+)', 66, 164, '17', 'sandra.ortiz@example.com', 'password123', '6531650343', '6531650343', 'Diabetes', 'Ninguna', 'Insulina diaria', b'0', 'paciente', NULL),
(19, 'Alberto Daniel Ríos', '1987-06-16', 'H', 'B negativo (B-)', 91, 183, '18', 'alberto.rios@example.com', 'password123', '6531650344', '6531650344', 'Ninguna', 'Maní', 'Ninguno', b'0', 'paciente', NULL),
(20, 'Lucía Fernanda Navarro', '1990-09-21', 'M', 'A positivo (A+)', 62, 162, '19', 'lucia.navarro@example.com', 'password123', '6531650345', '6531650345', 'Migrañas', 'Ninguna', 'Medicamento para migrañas', b'0', 'paciente', NULL),
(21, 'Francisco Javier Peña', '1981-12-04', 'H', 'O negativo (O-)', 94, 186, '20', 'francisco.pena@example.com', 'password123', '6531650346', '6531650346', 'Ninguna', 'Mariscos', 'Ninguno', b'0', 'paciente', NULL),
(22, 'Valeria Isabel Castro', '1995-08-28', 'M', 'B positivo (B+)', 70, 170, '21', 'valeria.castro@example.com', 'password123', '6531650347', '6531650347', 'Epilepsia', 'Ninguna', 'Medicamento anticonvulsivo', b'0', 'paciente', NULL),
(23, 'Héctor Manuel Silva', '1983-02-15', 'H', 'A negativo (A-)', 84, 178, '22', 'hector.silva@example.com', 'password123', '6531650348', '6531650348', 'Ninguna', 'Polen', 'Ninguno', b'0', 'paciente', NULL),
(26, 'Adrian Felipe Lara Torres', '2024-12-12', 'H', 'A positivo (A+)', 70, 180, '3460 E UDALL LN', 'ad@utslrc.com', '123', '9285811637', '6531650326', 'Ninguna', 'Ninguna', 'Ninguno', b'0', 'paciente', NULL),
(27, 'Adrian Felipe Lara Torres', '2018-02-06', 'H', 'A positivo (A+)', 75, 165, '3460 E UDALL LN', 'ad@utslrc.com', 'password1234', '9285811637', '6531650326', 'Ninguna', 'Cacahuates', 'Ninguna', b'0', 'paciente', NULL);

--
-- Triggers `pacientes`
--
DELIMITER $$
CREATE TRIGGER `BackupPaciente` BEFORE DELETE ON `pacientes` FOR EACH ROW begin
	insert into pacientesoff(idPacientes,nombrePaciente,nacimiento,sexo,sangre,peso,estatura,dir,correo,contra,telefono,celular,enfermedades,alergias,detalles,
    inhabilitado,tipo_cuenta,fechaEstado,Usuario)
    values
    (old.idPacientes,old.nombrePaciente,old.nacimiento,old.sexo,old.sangre,old.peso,old.estatura,old.dir,old.correo,old.contra,old.telefono,old.celular,old.enfermedades,
    old.alergias,old.detalles,old.inhabilitado + 1,old.tipo_cuenta,NOW(),'Usuario');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UpdateOff` BEFORE UPDATE ON `pacientes` FOR EACH ROW begin
	if new.inhabilitado = 1 then
    insert into pacientesoff(idPacientes,nombrePaciente,nacimiento,sexo,sangre,peso,estatura,dir,correo,contra,telefono,celular,enfermedades,alergias,detalles,
    inhabilitado,tipo_cuenta,fechaEstado,Usuario)
    values
    (old.idPacientes,old.nombrePaciente,old.nacimiento,old.sexo,old.sangre,old.peso,old.estatura,old.dir,old.correo,old.contra,old.telefono,old.celular,old.enfermedades,
    old.alergias,old.detalles,old.inhabilitado,old.tipo_cuenta,NOW(),'Usuario');
    end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pacientesoff`
--

CREATE TABLE `pacientesoff` (
  `idPacientes` int(11) NOT NULL,
  `nombrePaciente` varchar(50) NOT NULL,
  `nacimiento` date NOT NULL,
  `sexo` enum('H','M') NOT NULL,
  `sangre` varchar(5) NOT NULL,
  `peso` int(5) NOT NULL,
  `estatura` int(5) NOT NULL,
  `dir` varchar(70) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `contra` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `enfermedades` varchar(90) NOT NULL,
  `alergias` varchar(90) NOT NULL,
  `detalles` varchar(150) NOT NULL,
  `inhabilitado` bit(1) NOT NULL DEFAULT b'0',
  `tipo_cuenta` enum('paciente') NOT NULL DEFAULT 'paciente',
  `fechaEstado` date NOT NULL,
  `Usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pacientesoff`
--

INSERT INTO `pacientesoff` (`idPacientes`, `nombrePaciente`, `nacimiento`, `sexo`, `sangre`, `peso`, `estatura`, `dir`, `correo`, `contra`, `telefono`, `celular`, `enfermedades`, `alergias`, `detalles`, `inhabilitado`, `tipo_cuenta`, `fechaEstado`, `Usuario`) VALUES
(24, 'Adrian Felipe Lara Torres', '2024-12-05', 'H', 'A pos', 70, 180, '3460 E UDALL LN', 'ad@utslrc.com', '$2y$10$zGoKkpmOcJKDjnTwPxnfm.7EOicbJ6rmRHWynUNlRLQ', '9285811637', '6531650326', 'Ninguna', 'Ninguna', 'Ninguno', b'1', 'paciente', '2024-12-03', 'Usuario'),
(25, 'Adrian Felipe Lara Torres', '2024-12-04', 'H', 'A pos', 70, 180, '3460 E UDALL LN', 'adrianfelilara@gmail.com', 'utslrc123', '9285811637', '6531650326', 'Ninguna', 'Ninguna', 'Ninguno', b'1', 'paciente', '2024-12-03', 'Usuario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `idPaciente` (`idPaciente`),
  ADD KEY `idMedico` (`idMedico`);

--
-- Indexes for table `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`idEncuenta`),
  ADD KEY `idCita` (`idCita`),
  ADD KEY `idMedico` (`idMedico`);

--
-- Indexes for table `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`idMedico`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idPacientes`);

--
-- Indexes for table `pacientesoff`
--
ALTER TABLE `pacientesoff`
  ADD PRIMARY KEY (`idPacientes`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citas`
--
ALTER TABLE `citas`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `idEncuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicos`
--
ALTER TABLE `medicos`
  MODIFY `idMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idPacientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pacientesoff`
--
ALTER TABLE `pacientesoff`
  MODIFY `idPacientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPacientes`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`idMedico`) REFERENCES `medicos` (`idMedico`);

--
-- Constraints for table `encuesta`
--
ALTER TABLE `encuesta`
  ADD CONSTRAINT `encuesta_ibfk_1` FOREIGN KEY (`idCita`) REFERENCES `citas` (`idCita`),
  ADD CONSTRAINT `encuesta_ibfk_2` FOREIGN KEY (`idMedico`) REFERENCES `medicos` (`idMedico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
