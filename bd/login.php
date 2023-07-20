<?php
session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD

$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$result = $resultado->fetch(PDO::FETCH_ASSOC);


if($resultado->rowCount() >= 1){
	
	  if ($pass == $result['password']) {
            $_SESSION['s_usuario_id'] = $result['id'];
			
			$data = $result;
            $_SESSION["s_usuario"] = $usuario;
			
		
		             	
			            $queryencuesta = $conexion->prepare("SELECT * FROM bde_datos_usuario WHERE id_usuario_fk=".$result['id']);
						
						$queryencuesta->execute();
						
						
						 if ($queryencuesta->rowCount() > 0) {
                         $data="usuario con encuesta";
						 }else{
							 
							 print json_encode($data);
						 }
						 
						
               
			
			  
			
        }else{
			
			$data=null;
			print json_encode($data);exit(0);
		}
	
}else{
	
	$data='usuario no existe';
	
}	

print ($data);


/*
$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$pass' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_usuario"] = $usuario;
}else{
    $_SESSION["s_usuario"] = null;
    $data=null;
}

print json_encode($data);
$conexion=null;*/

//usuarios de pruebaen la base de datos
//usuario:admin pass:12345
//usuario:demo pass:demo
/*
if (isset($_POST['ingresar'])) {
    $usuario = $_POST['username'];
    $password = md5($_POST['password']);
    
    $query = $connection->prepare("SELECT * FROM usuario WHERE usuario=:usuario");
    $query->bindParam("usuario", $usuario, PDO::PARAM_STR);
    $query->execute();
	
	$result = $query->fetch(PDO::FETCH_ASSOC);
	
	
	
    if ($query->rowCount() > 0) {
        		      
        if ($password == $result['password']) {
            $_SESSION['user_id'] = $result['id'];
			
			            $queryencuesta = $connection->prepare("SELECT * FROM respuesta_usuario WHERE id_usuario_fk=".$result['id']);
						
						$queryencuesta->execute();
						
						
						 if ($queryencuesta->rowCount() > 0) {
                            echo '<p><a href="gestion_encuesta.php">Consultar/Editar/Eliminar encuesta</a></p>';
						 }
						 else{
							  echo '<p class="success"><a href="ingresar_encuesta.php">Diligenciar encuesta</a></p>';
						 }
						
               
			
			  
			
        } else {
            echo '<p class="error">Contraseña incorrecta</p>';
        }
    }else{
		
		
		header('Location: crear_usuario.php');
	}
   
}else{
	$queryencuesta = $connection->prepare("SELECT * FROM respuesta_usuario WHERE id_usuario_fk=".$_SESSION['user_id']);
						
						$queryencuesta->execute();
						
						
						 if ($queryencuesta->rowCount() > 0) {
                            echo '<p><a href="gestion_encuesta.php">Consultar/Editar/Eliminar encuesta</a></p>';
						 }
						 else{
							  echo '<p class="success"><a href="ingresar_encuesta.php">Diligenciar encuesta</a></p>';
						 }
	
}*/