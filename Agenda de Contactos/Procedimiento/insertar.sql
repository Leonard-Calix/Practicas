DELIMITER $$

CREATE PROCEDURE insertarContacto(IN in_nombre VARCHAR(45), IN in_telefono VARCHAR(45), OUT mensaje VARCHAR(45))
begin

    insert into contacto(id, nombre, telefono) values(in_nombre, in_telefono);
    
    set mensaje = 'Registro exitoso';

END; $$

DELIMITER ;

