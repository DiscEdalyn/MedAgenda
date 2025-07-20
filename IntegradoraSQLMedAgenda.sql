-- Base de datos Integradora 11/11/2024
-- Parra Torres Edy Guadalupe

drop database if exists MedAgenda;
CREATE DATABASE MedAgenda;
USE MedAgenda;


CREATE TABLE pacientes (
  idPacientes int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombrePaciente varchar(50) NOT NULL,
  nacimiento date NOT NULL,
  sexo enum('H','M') NOT NULL,
  sangre varchar(5) NOT NULL,
  peso int(5) NOT NULL,
  estatura int(5) NOT NULL,
  dir varchar(70) NOT NULL,
  correo varchar(70) NOT NULL,
  contra varchar(50) NOT NULL,
  telefono varchar(10) NOT NULL,
  celular varchar(10) NOT NULL,
  enfermedades varchar(90) NOT NULL,
  alergias varchar(90) NOT NULL,
  detalles varchar(150) NOT NULL,
  inhabilitado bit(1) NOT NULL DEFAULT 0,
  tipo_cuenta enum('paciente') NOT NULL DEFAULT 'paciente'
);

CREATE TABLE medicos (
  idMedico int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombreMedico varchar(70) NOT NULL,
  cedula varchar(30) NOT NULL,
  especialidad varchar(70) NOT NULL,
  correo varchar(70) NOT NULL,
  contra varchar(35) NOT NULL,
  tipo_cuenta enum('medico') NOT NULL DEFAULT 'medico'
);

CREATE TABLE citas (
  idCita int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  fecha date NOT NULL,
  hora time NOT NULL,
  fechaCancelacion datetime NOT NULL,
  canceladoPor bit(1) NOT NULL, 
  estado VARCHAR(50) NOT NULL DEFAULT 'En Espera',
  idPaciente int(11) NOT NULL,
  idMedico int(11) NOT NULL,
  foreign key (idPaciente) references pacientes(idPacientes),
  foreign key (idMedico) references medicos(idMedico)
);

CREATE TABLE encuesta (
  idEncuenta int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  idCita int(11) NOT NULL,
  idMedico int(11) NOT NULL,
  atencion int(5) NOT NULL,
  limpieza int(5) NOT NULL,
  efectividad int(5) NOT NULL,
  espera int(5) NOT NULL,
  claridad int(5) NOT NULL,
  atencion_prom float NOT NULL,
  limpieza_prom float NOT NULL,
  efectividad_prom float NOT NULL,
  espera_prom float NOT NULL,
  claridad_prom float NOT NULL
);

CREATE TABLE pacientesoff (
  idPacientes int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombrePaciente varchar(50) NOT NULL,
  nacimiento date NOT NULL,
  sexo enum('H','M') NOT NULL,
  sangre varchar(5) NOT NULL,
  peso int(5) NOT NULL,
  estatura int(5) NOT NULL,
  dir varchar(70) NOT NULL,
  correo varchar(70) NOT NULL,
  contra varchar(50) NOT NULL,
  telefono varchar(10) NOT NULL,
  celular varchar(10) NOT NULL,
  enfermedades varchar(90) NOT NULL,
  alergias varchar(90) NOT NULL,
  detalles varchar(150) NOT NULL,
  inhabilitado bit(1) NOT NULL DEFAULT 0,
  tipo_cuenta enum('paciente') NOT NULL DEFAULT 'paciente',
  fechaEstado date NOT NULL,
  Usuario VARCHAR(30) NOT NULL
);

/* Stored Procedures */

-- Insertar paciente
DELIMITER $$
create procedure MD_IngresarPaciente
(IN _nombrePaciente varchar(30), IN _nacimiento date, IN _sexo enum('H','M'), IN _sangre varchar(5), IN _peso INT(5), IN _estatura INT(5), IN _dir varchar(70),
IN _correo varchar(70), IN _contra varchar(50), IN _telefono varchar(10), IN _celular varchar(10), IN _enfermedades varchar(90), IN _alergias varchar(90),
IN _detalles varchar(150))
begin
	insert into pacientes(nombrePaciente,nacimiento,sexo,sangre,peso,estatura,dir,correo,contra,telefono,celular,enfermedades,alergias,detalles) values (_nombrePaciente,_nacimiento,_sexo,_sangre,_peso,_estatura,_dir,_correo,_contra,_telefono,_celular,_enfermedades,_alergias,_detalles);
end
$$

-- Actualizar paciente
DELIMITER $$
create procedure MD_ActualizarPacientes
(IN idPaciente INT (11), IN _nombrePaciente varchar(30), IN _nacimiento date, IN _sexo enum('H','M'), IN _sangre varchar(5), IN _peso INT(5), IN _estatura INT(5), IN _dir varchar(70),
IN _correo varchar(70), IN _contra varchar(50), IN _telefono varchar(10), IN _celular varchar(10), IN _enfermedades varchar(90), IN _alergias varchar(90),
IN _detalles varchar(150), IN _inhabilitado BIT(1))
begin
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
end
$$

-- Eliminar Paciente
DELIMITER $$
create procedure MD_EliminarPaciente(IN _idPacientes int(11))
begin
	delete from pacientes where idPacientes = _idPacientes;
end
$$

-- Seleccionar paciente
DELIMITER $$
create procedure MD_SeleccionarPaciente(IN _idPacientes int(11))
begin
	select * from pacientes where idPacientes = _idPacientes;
end
$$

-- SPs de Citas
-- Crear cita
DELIMITER $$
create procedure MD_CrearCita(IN _fecha date, IN _hora time, IN _idPaciente INT(11), IN _idMedico INT(11))
begin
	insert into citas(fecha,hora,idPaciente,idMedico) values (_fecha,_hora,_idPaciente,_idMedico);
end
$$

-- Cancelar Cita
DELIMITER $$
create procedure MD_CancelarCita(IN _idCita INT(11),estado VARCHAR(30))
begin
	select estado from citas where idCita = _idCita;
	set estado = "Cancelado";
end
$$


/* Triggers */
-- Trigger before delete
DELIMITER $$
create trigger BackupPaciente
before delete on pacientes
for each row
begin
	insert into pacientesoff(idPacientes,nombrePaciente,nacimiento,sexo,sangre,peso,estatura,dir,correo,contra,telefono,celular,enfermedades,alergias,detalles,
    inhabilitado,tipo_cuenta,fechaEstado,Usuario)
    values
    (old.idPacientes,old.nombrePaciente,old.nacimiento,old.sexo,old.sangre,old.peso,old.estatura,old.dir,old.correo,old.contra,old.telefono,old.celular,old.enfermedades,
    old.alergias,old.detalles,old.inhabilitado + 1,old.tipo_cuenta,NOW(),'Usuario');
end
$$

-- Trigger before update
DELIMITER $$
create trigger UpdateOff
before update on pacientes
for each row
begin
	if new.inhabilitado = 1 then
    insert into pacientesoff(idPacientes,nombrePaciente,nacimiento,sexo,sangre,peso,estatura,dir,correo,contra,telefono,celular,enfermedades,alergias,detalles,
    inhabilitado,tipo_cuenta,fechaEstado,Usuario)
    values
    (old.idPacientes,old.nombrePaciente,old.nacimiento,old.sexo,old.sangre,old.peso,old.estatura,old.dir,old.correo,old.contra,old.telefono,old.celular,old.enfermedades,
    old.alergias,old.detalles,old.inhabilitado,old.tipo_cuenta,NOW(),'Usuario');
    end if;
end
$$
