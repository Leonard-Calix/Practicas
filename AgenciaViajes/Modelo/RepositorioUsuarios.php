<?php 
class RepositorioUsuarios{
    
    public static function insertar_usuario($conexion, $usuario, $optPerfil){
        //También se puede hacer con un Procedimiento almacenado para registrar usuarios
        $usuario_insertado = false;
        if(isset($conexion)){
            try {
                /*INSERTAMOS EL USUARIO*/
                $sql1 = "INSERT INTO Usuarios(nombreUsuario,email,contrasena) VALUES(:nombreusuario, :email, :contrasena)";
                $sentencia = $conexion -> prepare($sql1);

                $sentencia -> bindParam(':nombreusuario', $usuario -> obtener_nombre(), PDO::PARAM_STR);
                $sentencia -> bindParam(':email', $usuario -> obtener_email(), PDO::PARAM_STR);
                $sentencia -> bindParam(':contrasena', $usuario -> obtener_contrasena(), PDO::PARAM_STR);

                $usuario_insertado = $sentencia -> execute();
                $usuario_insertado = false;
                /*COMPROBAMOS EL ULTIMO ID INSERTADO*/ 
                $ultimoID = $sentencia -> last_insert_id();

                /*INSERTAMOS EL USUARIO ASOCIADO CON SU PERFIL*/ 
                $sql2 = "INSERT INTO PerfilesUsuarios(idperfiles,idusuarios) VALUES(:optPerfil, :idusuario)";
                $sentencia2 = $conexion -> prepare($sql2);

                $sentencia2 -> bindParam(':optPerfil', $optPerfil, PDO::PARAM_INT);
                $sentencia2 -> bindParam(':idusario', $ultimoID, PDO::PARAM_INT);

                $usuario_insertado = $sentencia2 -> execute();
            } catch (PDOException $e) {
                echo 'Ha surgido un error'. $e ->getMessage().'<br>';
            }
        }
        return $usuario_insertado;
    }

    public static function nombre_existe($conexion, $nombre){
        $nombre_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM Usuarios WHERE nombreUsuario = :nombre";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    $nombre_existe = true;
                } else {
                    $nombre_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $nombre_existe;
    }

    public static function email_existe($conexion,$email){
        $email_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM Usuarios WHERE email = :email";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)) {
                    $email_existe = true;
                } else {
                    $email_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $email_existe;
    }
}
?>