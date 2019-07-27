<?php
include_once '../Modelo/Conexion.php';
include_once '../Modelo/Usuarios.php';
include_once '../Modelo/RepositorioUsuarios.php';
/*
if(isset($_POST['name'])){
    $nameUser = $_POST['name'];
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
}
if(isset($_POST['password1'])){
    $contrasena1 = $_POST['password1'];
}
if(isset($_POST['password2'])){
    $contrasena2 = $_POST['password2'];
}
if(isset($_POST['optPerf'])){
    $optPerf = $_POST['optPerf'];
}


*/

$nameUser = "a";
$email = "shajkdah";
$contrasena1 = "djkahsd";
$contrasena2 = "gdasdjka";
$optPerf = "jagsdh";



Conexion::abrirConexion();
$validador = new ValidadorRegistro($nameUser,$email,$contrasena1,$contrasena2,$optPerf,Conexion::obtenerConexion());
if($validador -> registro_valido()){
    $usuario = new Usuarios('',$validador->obtener_nombre(),$validador->obtener_email(),
                            password_hash($validador->obtener_clave(),PASSWORD_DEFAULT));
    
    $usuario_insertado = RepositorioUsuarios::insertar_usuario(Conexion::obtenerConexion(),$usuario, $optPerf);

    echo $usuario_insertado ? "<br>Registrado Correctamente" : "<br>Error";
}else{
  echo "<br>Datos Incorrectos". $usuario_insertado;
}

?>