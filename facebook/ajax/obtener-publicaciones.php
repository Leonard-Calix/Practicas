<?php 
include("../class/class_conexion.php");
$conexion = new Conexion();
    $codigoUsuario=$_GET["codigoUsuario"];
    $sql = "SELECT codigo_publicacion, titulo_publicacion, texto_publicacion, fecha_publicacion ".
            "FROM tbl_publicaciones ".
            "WHERE codigo_usuario = ".$codigoUsuario;

             $resultado = $conexion->ejecutarInstruccion($sql);
             $i = 0;
             $resultadoPublicaciones = array();
             while($fila = $conexion->obtenerFila($resultado)){
                $resultadoPublicaciones[$i] = $fila;
               $sqlComentarios = sprintf(" SELECT a.codigo_usuario, a.comentario, b.nombre_usuario, b.url_imagen_perfil ".
                                "FROM tbl_comentarios a ".
                                "INNER JOIN tbl_usuarios b ".
                                "ON a.codigo_usuario = b.codigo_usuario ".
                                "WHERE codigo_publicacion = %s",
                                 $fila["codigo_publicacion"]);
               $resultadoComentarios= $conexion->ejecutarInstruccion($sqlComentarios);
               $resultadoComentariosArreglo = array();
                while ($filaComentario = $conexion->obtenerFila($resultadoComentarios)){
                    $resultadoComentariosArreglo[] = $filaComentario;
                }
         $resultadoPublicaciones[$i]["comentarios"] = $resultadoComentariosArreglo; //Datos comentarios
                $i++;


            }
        
            echo json_encode( $resultadoPublicaciones);

            
         $conexion->cerrarConexion();
?>



