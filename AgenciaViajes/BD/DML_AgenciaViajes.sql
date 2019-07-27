/*TABLAS CATALOGO (NO MODIFICABLES)*/

/*TABLA PERFILES*/
INSERT INTO Perfiles(nombrePerfil,descripcionPerfil) VALUES('Administrador','Permite entrar a todos los modulos del sistema, asi como modificarlos');
INSERT INTO Perfiles(nombrePerfil,descripcionPerfil) VALUES('Turista','Usuario estandar que puede acceder a los paquetes y ofertas turisticas');
INSERT INTO Perfiles(nombrePerfil,descripcionPerfil) VALUES('GuiaTuristico','Permite ver las notificaciones donde tiene sirver de guia');

/*TABLA MÓDULOS*/
INSERT INTO Modulos(nombreModulo,descripcionModulo) VALUES('Perfiles','Modulo que controla los perfiles del sistema');
INSERT INTO Modulos(nombreModulo,descripcionModulo) VALUES('Usuarios','Modulo para administrar los usuarios del sistema');
INSERT INTO Modulos(nombreModulo,descripcionModulo) VALUES('Roles','Modulo de asignacion de roles');
INSERT INTO Modulos(nombreModulo,descripcionModulo) VALUES('Modulos','Modulo para administrar los modulos que se van a usar en el sistema');

/*TABLA ROLES*/

/*idModulos --> aqui va id del modulo para administrar perfiles*/
INSERT INTO Roles(nombreRol,descripcionRol,idModulos) VALUES('CrearPerfil','Este rol permite crear perfiles en el sistema',1);
INSERT INTO Roles(nombreRol,descripcionRol,idModulos) VALUES('ModificarPerfil','Este rol permite modificar perfiles en el sistema',1);
INSERT INTO Roles(nombreRol,descripcionRol,idModulos) VALUES('BorrarPerfil','Este rol permite eliminar perfiles en el sistema',1);

/*idModulos --> aqui va id del modulo para administrar usuarios*/
INSERT INTO Roles(nombreRol,descripcionRol,idModulos) VALUES('CrearUser','Este rol permite crear usuarios en el sistema',2);
INSERT INTO Roles(nombreRol,descripcionRol,idModulos) VALUES('ModificarUser','Este rol permite modificar usuarios en el sistema',2);
INSERT INTO Roles(nombreRol,descripcionRol,idModulos) VALUES('BorrarUser','Este rol permite eliminar usuarios en el sistema',2);

/*idModulos --> aqui va id del modulo para administrar roles*/
INSERT INTO Roles(nombreRol,descripcionRol,idModulos) VALUES('CrearRol','Este rol permite crear roles en el sistema',3);
INSERT INTO Roles(nombreRol,descripcionRol,idModulos) VALUES('ModificarRol','Este rol permite modificar roles en el sistema',3);
INSERT INTO Roles(nombreRol,descripcionRol,idModulos) VALUES('BorrarRol','Este rol permite eliminar roles en el sistema',3);

/*idModulos --> aqui va id del modulo para administrar modulos*/
INSERT INTO Roles(nombreRol,descripcionRol,idModulos) VALUES('CrearModulo','Este rol permite crear modulos en el sistema',4);
INSERT INTO Roles(nombreRol,descripcionRol,idModulos) VALUES('ModificarModulo','Este rol permite modificar modulos en el sistema',4);
INSERT INTO Roles(nombreRol,descripcionRol,idModulos) VALUES('BorrarModulo','Este rol permite eliminar modulos en el sistema',4);
