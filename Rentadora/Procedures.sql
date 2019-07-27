DROP PROCEDURE IF EXISTS Obtener;
DELIMITER $$ 
	CREATE PROCEDURE Obtener(IN in_nombre VARCHAR(45), OUT out_numero VARCHAR(45) ) 
	BEGIN 
		SELECT TELEFONO INTO out_numero FROM contactos WHERE nombre=in_nombre; 
	END; $$ 
DELIMITER ;


///////////////////////////////////////////////

DELIMITER $$ 
CREATE PROCEDURE prueba (IN in_nombre VARCHAR(45), IN in_numero VARCHAR(45), OUT mensaje VARCHAR(45))
begin

	if ( in_nombre=' ' ) then
    	set mensaje='faltan datos';
    	
    end if;
    
    insert into contactos(nombre, telefono) values(in_nombre, in_numero);

	END; $$ 
DELIMITER ;


////////////////////////////////////////////////

DELIMITER $$ 
CREATE PROCEDURE producto (IN in_nombre VARCHAR(45), IN precio decimal(7), OUT mensaje VARCHAR(45))
begin

	declare impuesto decimal(7);
    declare total decimal(7);
    declare uss decimal(7);
    
    set impuesto = precio * 0.15;
    set total = precio * ( 1.15 );
    set uss = total/( 24.65 );

   
    
    insert into producto(nombre, precio, impuesto, total, totalUss) values(in_nombre, precio, impuesto, total, uss);
    
    set mensaje = 'Registro exitoso';

	END; $$ 
DELIMITER ;