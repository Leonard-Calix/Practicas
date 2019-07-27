DELIMITER $$
CREATE PROCEDURE SP_REGISTRARUSUARIOS(IN @nombreUsuario VARCHAR, IN @email VARCHAR, IN @contrasena VARCHAR,
                                      IN perfilUser INT, OUT Mensaje BOOLEAN, OUT Error VARCHAR2)
BEGIN
    DECLARE existePerfil INT;
    DECLARE ultimoID INT;
    /*INSERTAMOS EL USUARIO*/
    INSERT INTO Usuarios(nombreUsuario,email,contrasena) VALUES(@nombreUsuario,@email,@contrasena);

    /*Obtenemos el ultimo id insertado*/
    SELECT idUsuarios INTO ultimoID FROM Usuarios ORDER BY idUsuarios DESC Limit 1;

    /*Comprobamos si el perfil de usuario existe*/
    SELECT idperfiles INTO existePerfil FROM perfiles WHERE idperfiles = perfilUser;
    

    /*INSERTAMOS EL USUARIO CON EL PERFIL ASOCIADO*/
    INSERT INTO PERFILESUSUARIOS(idperfiles,idusuarios) VALUES(perfilUser,ultimoID);

    /*NOTIFICAMOS QUE EL USUARIO SE HA INSERTADO*/

END$$

