<?php
session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_REQUEST['usuario'])) ? $_REQUEST['usuario'] : '';
$password = (isset($_REQUEST['password'])) ? $_REQUEST['password'] : '';

$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD

$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' ";
$registro = "INSERT INTO usuarios (usuario , password) VALUES ($usuario, $password)";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$result = $resultado->fetch(PDO::FETCH_ASSOC);


if($resultado->rowCount() >= 1){
	
	$data='usuario ya existe ';  
	
 
    } else {
	

$query = $conexion->prepare("INSERT INTO usuarios(USUARIO,PASSWORD) VALUES (:username,:password)");
$query->bindParam("username", $usuario, PDO::PARAM_STR);
$query->bindParam("password", $pass, PDO::PARAM_STR);
$result = $query->execute();
         if ($result) {
            $data=$result;
        } else {
            $data=null;
        }		
	
}	

print json_encode($data);
