-- Model: DDL
-- Version: 1.0
-- Project: Agencia de Viajes
-- Author: Em Sanchez

CREATE DATABASE AgenciaViajes DEFAULT CHARACTER SET utf8;

USE AgenciaViajes;

CREATE TABLE IF NOT EXISTS Roles(
  idRoles INT(11) NOT NULL AUTO_INCREMENT,
  nombreRol VARCHAR(45) NULL DEFAULT NULL,
  DescripcionRol VARCHAR(255) NULL DEFAULT NULL,
  idModulos INT(11) NOT NULL,
  PRIMARY KEY (idRoles)
);

CREATE TABLE IF NOT EXISTS Usuarios(
  idUsuarios INT(11) NOT NULL AUTO_INCREMENT,
  nombreUsuario VARCHAR(45) NULL DEFAULT NULL,
  email VARCHAR(45) NULL DEFAULT NULL,
  contrasena VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (idUsuarios)
);

CREATE TABLE IF NOT EXISTS RolesUsuarios(
  idRolUsuario INT(11) NOT NULL AUTO_INCREMENT,
  idRoles INT(11) NOT NULL,
  idUsuarios INT(11) NOT NULL,
  PRIMARY KEY (idRolUsuario, idRoles, idUsuarios)
);

CREATE TABLE IF NOT EXISTS Modulos (
  idModulos INT(11) NOT NULL AUTO_INCREMENT,
  nombreModulo VARCHAR(45) NULL DEFAULT NULL,
  descripcionModulo VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (idModulos)
);

CREATE TABLE IF NOT EXISTS Perfiles(
  idPerfiles INT(11) NOT NULL AUTO_INCREMENT,
  nombrePerfil VARCHAR(45) NULL DEFAULT NULL,
  descripcionPerfil VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (idPerfiles)
);

CREATE TABLE IF NOT EXISTS PerfilesUsuarios (
  idPerfilUsuario INT(11) NOT NULL AUTO_INCREMENT,
  idPerfiles INT(11) NOT NULL,
  idUsuarios INT(11) NOT NULL,
  PRIMARY KEY (idPerfilUsuario, idPerfiles, idUsuarios)
);

CREATE TABLE IF NOT EXISTS PerfilesModulos (
  idPerfilesModulos INT(11) NOT NULL AUTO_INCREMENT,
  idPerfiles INT(11) NOT NULL,
  idModulos INT(11) NOT NULL,
  PRIMARY KEY (idPerfilesModulos, idPerfiles, idModulos)
);

/*RELACIONES DE LAS TABLAS*/

/*TABLA ROLES CON MODULOS*/
ALTER TABLE Roles ADD CONSTRAINT FK_Roles_Modulos FOREIGN KEY (idModulos) REFERENCES Modulos(idModulos); 

/*TABLA ROLES USUARIOS*/
ALTER TABLE RolesUsuarios ADD CONSTRAINT FK_ROLES_USUARIOS_01 FOREIGN KEY(idRoles) REFERENCES Roles(idRoles);
ALTER TABLE RolesUsuarios ADD CONSTRAINT FK_ROLES_USUARIOS_02 FOREIGN KEY(idUsuarios) REFERENCES Usuarios(idUsuarios);

/*TABLA PERFILES USUARIOS*/
ALTER TABLE PerfilesUsuarios ADD CONSTRAINT FK_PERFILES_USUARIOS_01 FOREIGN KEY(idPerfiles) REFERENCES Perfiles(idPerfiles);
ALTER TABLE PerfilesUsuarios ADD CONSTRAINT FK_PERFILES_USUARIOS_02 FOREIGN KEY(idUsuarios) REFERENCES Usuarios(idUsuarios);

/*TABLA PERFILES MODULOS*/
ALTER TABLE PerfilesModulos ADD CONSTRAINT FK_PERFILES_MODULOS_01 FOREIGN KEY(idPerfiles) REFERENCES Perfiles(idPerfiles);
ALTER TABLE PerfilesModulos ADD CONSTRAINT FK_PERFILES_MODULOS_02 FOREIGN KEY(idModulos) REFERENCES Modulos(idModulos);
