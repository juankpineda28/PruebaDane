<?php
include_once '../bd/conexion.php';

session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$objeto = new Conexion();
$conexion = $objeto->Conectar();

if (isset($_POST['ingresar_encuesta'])) {
	/*
	*/
	 


$sql="INSERT INTO bde_datos_usuario

(id_usuario_fk, pais_resi, nacionalidad, sexo, id_viaja_fk, otro_viaja, no_personas_viaje, 
id_motivo_fk, otro_motivo,edad) 
VALUES (:id_usuario_fk, :pais_resi, :nacionalidad, :sexo, :id_viaja_fk, :otro_viaja, :no_personas_viaje, :id_motivo_fk, :otro_motivo,:edad)" ;


$query = $conexion->prepare($sql);
$id_usuario_fk=$_SESSION['s_usuario_id'];
$query->bindParam("id_usuario_fk",$id_usuario_fk, PDO::PARAM_STR);//1

$pais_resi=$_POST["pais_resi"];
$query->bindParam("pais_resi",$pais_resi, PDO::PARAM_STR);
$nacionalidad=$_POST["nacionalidad"];
$query->bindParam("nacionalidad",$nacionalidad, PDO::PARAM_STR);
$sexo=$_POST["sexo"];
$query->bindParam("sexo",$sexo, PDO::PARAM_STR);
$id_viaje_fk=$_POST["viaja"];
$query->bindParam("id_viaja_fk",$id_viaje_fk, PDO::PARAM_STR);
$otro_viaja=$_POST["votro_cual"];
$query->bindParam("otro_viaja",$otro_viaja,PDO::PARAM_STR);
$no_personas_viaje=$_POST["no_personas_viaje"];
$query->bindParam("no_personas_viaje",$no_personas_viaje,PDO::PARAM_STR);
$id_motivo_fk=$_POST["motivo"];
$query->bindParam("id_motivo_fk",$id_motivo_fk,PDO::PARAM_STR);  
$otro_motivo=$_POST["mootro_cual"];
$query->bindParam("otro_motivo",$otro_motivo,PDO::PARAM_STR);
$edad=$_POST["edad"];
$query->bindParam("edad",$edad,PDO::PARAM_STR);


$result = $query->execute();
 
		 if ($result) {
			 
			 echo '<script type="text/javascript">'
			   , 'alert("Se registro su encuesta satisfactoriamente");'
			   , 'window.location.href = "../index.php"</script>'
			;
		
           
			
        } else {
           
			
			 echo '<script type="text/javascript">'
			   , 'alert("Hay un problema almacenando su encuesta");'
			   , 'window.location.href = "../index.php";</script>';
		
           
			print_r($query->errorInfo());
			
        }
		
//Almacena forma de organización del viaje		
$array_organiza = $_POST["organiza"];
foreach ($array_organiza as $k => $o) {
  
      
		         if($o==5){
					 
					   $sql="INSERT INTO bde_usuario_organiza(id_usuario_fk, id_organiza_fk,otro_organiza) VALUES (:id_usuario_fk,:id_organiza_fk,:otro_organiza)";
					   $query = $conexion->prepare($sql);
					   $query->bindParam("id_usuario_fk",$id_usuario_fk,PDO::PARAM_STR);
					   $query->bindParam("id_organiza_fk",$o,PDO::PARAM_STR);
					   $otro_organiza=$_POST["otro_organiza"];
					   $query->bindParam("otro_organiza",$otro_organiza,PDO::PARAM_STR);
					   $result = $query->execute();
					  
					   
				 }else{
					 
					    $sql="INSERT INTO bde_usuario_organiza(id_usuario_fk, id_organiza_fk) VALUES (:id_usuario_fk,:id_organiza_fk)";
						$query = $conexion->prepare($sql);
						
						$query->bindParam("id_usuario_fk",$id_usuario_fk,PDO::PARAM_STR);
						
						$query->bindParam("id_organiza_fk",$o,PDO::PARAM_STR);
						
						$result = $query->execute();
				 }
		//print_r($query->errorInfo());  otro_organiza
}

//Almacena el tipo de servicio

$array_servicio = $_POST["servicio"];
foreach ($array_servicio as $k => $o) {
  
        if($o==8){
        $sql="INSERT INTO bde_usuario_servicio(id_usuario_fk, id_servicio_fk, otro_transporte_interno) VALUES (:id_usuario_fk, :id_servicio_fk, :otro_transporte_interno)";
	    $query = $conexion->prepare($sql);
	    
		$query->bindParam("id_usuario_fk",$id_usuario_fk,PDO::PARAM_STR);
		
		$query->bindParam("id_servicio_fk",$o,PDO::PARAM_STR);
		
		$otro_transporte=$_POST["otro_transporte_interno"];
		$query->bindParam("otro_transporte_interno",$otro_transporte,PDO::PARAM_STR);
		
		$result = $query->execute();
		print_r($query->errorInfo());
		}else if($o==9){
			
		$sql="INSERT INTO bde_usuario_servicio(id_usuario_fk, id_servicio_fk, otro_servicio_transporte) VALUES (:id_usuario_fk, :id_servicio_fk, :otro_servicio_transporte)";
	  
	    $query = $conexion->prepare($sql);
	    
		$query->bindParam("id_usuario_fk",$id_usuario_fk,PDO::PARAM_STR);
		
		$query->bindParam("id_servicio_fk",$o,PDO::PARAM_STR);
		
		$otro_servicio=$_POST["otro_servicio_transporte"];
		$query->bindParam("otro_servicio_transporte",$otro_servicio,PDO::PARAM_STR);
		
		$result = $query->execute();
		
		}else{
			
		$sql="INSERT INTO bde_usuario_servicio(id_usuario_fk, id_servicio_fk) VALUES (:id_usuario_fk, :id_servicio_fk)";
	  
	    $query = $conexion->prepare($sql);
	    
		$query->bindParam("id_usuario_fk",$id_usuario_fk,PDO::PARAM_STR);
		
		$query->bindParam("id_servicio_fk",$o,PDO::PARAM_STR);
		
		
		
		$result = $query->execute();
		 
			
		}
		      
		
}

//guardar gastos

if($_POST["paquete"]=='n'){
		  $sql="INSERT INTO bde_gasto_usuario	 (id_usuario_fk, id_gasto_fk)  VALUES (".$id_usuario_fk." , )";
	 
		
	 } else{
        
	  $sql="INSERT INTO bde_gasto_usuario
	 (id_usuario_fk, id_gasto_fk,hubo_gasto,valor_pag_usted, tipo_mone_uste, valor_terc_nogrup, tipo_mone_nogrup, valor_terc_sigrup, tipo_mone_sigrup, no_personas) 
	 
	 VALUES (".$id_usuario_fk." , 1, '".$_POST["paquete"]." ',".$_POST["valor_pag_ustedpq"].", '".$_POST["tipo_mone_ustedpq"]." ', ".$_POST["valor_ter_nogruppq"].",' ".$_POST["tipo_mone_nogruppq"]."',
	 ". $_POST["valor_ter_sigruppq"].", '".$_POST["tipo_mone_sigruppq"]."',".$_POST["no_personas_paquete"].")";
	 
	 $query = $conexion->prepare($sql);
	 
	 $result = $query->execute();
	 
	 //print_r($query->errorInfo());
	 }

  
	 if($_POST["transporte"]=='n'){
		  $sql="INSERT INTO respuesta_gasto_usuario	 (id_usuario_fk, id_gasto_fk) 	 VALUES (".$id_usuario_fk." , 2)";
	 
		
	 } else{
		 
		 $sql="INSERT INTO bde_gasto_usuario
	 (id_usuario_fk, id_gasto_fk,hubo_gasto,valor_pag_usted, tipo_mone_uste, valor_terc_nogrup, tipo_mone_nogrup, valor_terc_sigrup, tipo_mone_sigrup, no_personas) 
	 
	 VALUES (".$id_usuario_fk." , 2, '".$_POST["transporte"]." ',".$_POST["valor_pag_ustedt"].", '".$_POST["tipo_mone_ustedt"]." ', ".$_POST["valor_ter_nogrupt"].",' ".$_POST["tipo_mone_nogrupt"]."',
	 ". $_POST["valor_ter_sigrupt"].", '".$_POST["tipo_mone_sigrupt"]."',".$_POST["no_personas_transporte"].")";
	  
	 }
	 
	 
	 $query = $conexion->prepare($sql);
	 
	 $result = $query->execute();
	 
		 
	 //pais visita
	 $sql="INSERT INTO bde_pais_visita(id_usuario_fk, pais_visita, noch_vi_prop, noch_hotaphot, noch_vi_famiami, noch_vi_alqui, noch_ot_tipvi) 
	 VALUES (:id_usuario_fk, :pais_visita, :noch_vi_prop, :noch_hotaphot, :noch_vi_famiami, :noch_vi_alqui, :noch_ot_tipvi)";
	  
	    $query = $conexion->prepare($sql);
	    
		$query->bindParam("id_usuario_fk",$id_usuario_fk,PDO::PARAM_STR);
		
		$query->bindParam("pais_visita",$_POST["pais_visita"],PDO::PARAM_STR);
		
		$query->bindParam("noch_vi_prop",$_POST["noch_vi_prop"],PDO::PARAM_STR);
		
		$query->bindParam("noch_hotaphot",$_POST["noch_hotaphot"],PDO::PARAM_STR);
		
		$query->bindParam("noch_vi_famiami",$_POST["noch_vi_famami"],PDO::PARAM_STR);
		
		$query->bindParam("noch_vi_alqui",$_POST["noch_vi_alqui"],PDO::PARAM_STR);
		
		$query->bindParam("noch_ot_tipvi",$_POST["noch_ot_tipvi"],PDO::PARAM_STR);
		
		 
	 
	 $result = $query->execute();
	 
			
	
}

if (isset($_POST['actualizar_encuesta'])) {
	/*
	*/
	 


$sql="UPDATE bde_datos_usuario 

SET

pais_resi=:pais_resi, nacionalidad=:nacionalidad, sexo=:sexo, id_viaja_fk =:id_viaja_fk, otro_viaja=:otro_viaja, no_personas_viaje=:no_personas_viaje, 
id_motivo_fk=:id_motivo_fk, otro_motivo=:otro_motivo,edad=:edad

WHERE id_usuario_fk=:id_usuario_fk" ;


$query = $conexion->prepare($sql);
$id_usuario_fk=$_SESSION['s_usuario_id'];
$query->bindParam("id_usuario_fk",$id_usuario_fk, PDO::PARAM_STR);//1

$pais_resi=$_POST["pais_resi"];
$query->bindParam("pais_resi",$pais_resi, PDO::PARAM_STR);
$nacionalidad=$_POST["nacionalidad"];
$query->bindParam("nacionalidad",$nacionalidad, PDO::PARAM_STR);
$sexo=$_POST["sexo"];
$query->bindParam("sexo",$sexo, PDO::PARAM_STR);
$id_viaje_fk=$_POST["viaja"];
$query->bindParam("id_viaja_fk",$id_viaje_fk, PDO::PARAM_STR);
$otro_viaja=$_POST["votro_cual"];
$query->bindParam("otro_viaja",$otro_viaja,PDO::PARAM_STR);
$no_personas_viaje=$_POST["no_personas_viaje"];
$query->bindParam("no_personas_viaje",$no_personas_viaje,PDO::PARAM_STR);
$id_motivo_fk=$_POST["motivo"];
$query->bindParam("id_motivo_fk",$id_motivo_fk,PDO::PARAM_STR);  
$otro_motivo=$_POST["mootro_cual"];
$query->bindParam("otro_motivo",$otro_motivo,PDO::PARAM_STR);
$edad=$_POST["edad"];
$query->bindParam("edad",$edad,PDO::PARAM_STR);


$result = $query->execute();
 
		 if ($result) {
            echo '<p class="success">Se actualizó su encuesta correctamente</p>';
			
			
			
			
			$query = $conexion->prepare("DELETE FROM bde_usuario_organiza WHERE id_usuario_fk=:id_usuario_fk");
			$query->bindParam("id_usuario_fk",$id_usuario_fk, PDO::PARAM_STR);
			$result = $query->execute();
			
			
			
			$query = $conexion->prepare("DELETE FROM bde_usuario_servicio WHERE id_usuario_fk=:id_usuario_fk");
			$query->bindParam("id_usuario_fk",$id_usuario_fk, PDO::PARAM_STR);
			$result = $query->execute();
			
			
			
			$query = $conexion->prepare("DELETE FROM bde_gasto_usuario WHERE id_usuario_fk=:id_usuario_fk");
			$query->bindParam("id_usuario_fk",$id_usuario_fk, PDO::PARAM_STR);
			$result = $query->execute();
			
			
			
			$query = $conexion->prepare("DELETE FROM bde_pais_visita WHERE id_usuario_fk=:id_usuario_fk");
			$query->bindParam("id_usuario_fk",$id_usuario_fk, PDO::PARAM_STR);
			$result = $query->execute();
			
			      
					//Almacena forma de organización del viaje		
					$array_organiza = $_POST["organiza"];
					foreach ($array_organiza as $k => $o) {
					  
						  
									 if($o==5){
										 
										   $sql="INSERT INTO bde_usuario_organiza(id_usuario_fk, id_organiza_fk,otro_organiza) VALUES (:id_usuario_fk,:id_organiza_fk,:otro_organiza)";
										   $query = $conexion->prepare($sql);
										   $query->bindParam("id_usuario_fk",$id_usuario_fk,PDO::PARAM_STR);
										   $query->bindParam("id_organiza_fk",$o,PDO::PARAM_STR);
										   $otro_organiza=$_POST["otro_organiza"];
										   $query->bindParam("otro_organiza",$otro_organiza,PDO::PARAM_STR);
										   $result = $query->execute();
										  
										   
									 }else{
										 
											$sql="INSERT INTO bde_usuario_organiza(id_usuario_fk, id_organiza_fk) VALUES (:id_usuario_fk,:id_organiza_fk)";
											$query = $conexion->prepare($sql);
											
											$query->bindParam("id_usuario_fk",$id_usuario_fk,PDO::PARAM_STR);
											
											$query->bindParam("id_organiza_fk",$o,PDO::PARAM_STR);
											
											$result = $query->execute();
									 }
							
					}

					//Almacena el tipo de servicio

					$array_servicio = $_POST["servicio"];
					foreach ($array_servicio as $k => $o) {
					  
							if($o==8){
							$sql="INSERT INTO bde_usuario_servicio(id_usuario_fk, id_servicio_fk, otro_transporte_interno) VALUES (:id_usuario_fk, :id_servicio_fk, :otro_transporte_interno)";
							$query = $conexion->prepare($sql);
							
							$query->bindParam("id_usuario_fk",$id_usuario_fk,PDO::PARAM_STR);
							
							$query->bindParam("id_servicio_fk",$o,PDO::PARAM_STR);
							
							$otro_transporte=$_POST["otro_transporte_interno"];
							$query->bindParam("otro_transporte_interno",$otro_transporte,PDO::PARAM_STR);
							
							$result = $query->execute();
						
							}else if($o==9){
								
							$sql="INSERT INTO bde_usuario_servicio(id_usuario_fk, id_servicio_fk, otro_servicio_transporte) VALUES (:id_usuario_fk, :id_servicio_fk, :otro_servicio_transporte)";
						  
							$query = $conexion->prepare($sql);
							
							$query->bindParam("id_usuario_fk",$id_usuario_fk,PDO::PARAM_STR);
							
							$query->bindParam("id_servicio_fk",$o,PDO::PARAM_STR);
							
							$otro_servicio=$_POST["otro_servicio_transporte"];
							$query->bindParam("otro_servicio_transporte",$otro_servicio,PDO::PARAM_STR);
							
							$result = $query->execute();
							
							}else{
								
							$sql="INSERT INTO bde_usuario_servicio(id_usuario_fk, id_servicio_fk) VALUES (:id_usuario_fk, :id_servicio_fk)";
						  
							$query = $conexion->prepare($sql);
							
							$query->bindParam("id_usuario_fk",$id_usuario_fk,PDO::PARAM_STR);
							
							$query->bindParam("id_servicio_fk",$o,PDO::PARAM_STR);
							
							
							
							$result = $query->execute();
							 
								
							}
								  
							
					}

					//guardar gastos

					if($_POST["paquete"]=='n'){
							  $sql="INSERT INTO bde_gasto_usuario	 (id_usuario_fk, id_gasto_fk)  VALUES (".$id_usuario_fk." , )";
						 
							
						 } else{
							
						  $sql="INSERT INTO bde_gasto_usuario
						 (id_usuario_fk, id_gasto_fk,hubo_gasto,valor_pag_usted, tipo_mone_uste, valor_terc_nogrup, tipo_mone_nogrup, valor_terc_sigrup, tipo_mone_sigrup, no_personas) 
						 
						 VALUES (".$id_usuario_fk." , 1, '".$_POST["paquete"]." ',".$_POST["valor_pag_ustedpq"].", '".$_POST["tipo_mone_ustedpq"]." ', ".$_POST["valor_ter_nogruppq"].",' ".$_POST["tipo_mone_nogruppq"]."',
						 ". $_POST["valor_ter_sigruppq"].", '".$_POST["tipo_mone_sigruppq"]."',".$_POST["no_personas_paquete"].")";
						 
						 $query = $conexion->prepare($sql);
						 
						 $result = $query->execute();
						 
						 //print_r($query->errorInfo());
						 }

					  
						 if($_POST["transporte"]=='n'){
							  $sql="INSERT INTO bde_gasto_usuario	 (id_usuario_fk, id_gasto_fk) 	 VALUES (".$id_usuario_fk." , 2)";
						 
							
						 } else{
							 
							 $sql="INSERT INTO bde_gasto_usuario
						 (id_usuario_fk, id_gasto_fk,hubo_gasto,valor_pag_usted, tipo_mone_uste, valor_terc_nogrup, tipo_mone_nogrup, valor_terc_sigrup, tipo_mone_sigrup, no_personas) 
						 
						 VALUES (".$id_usuario_fk." , 2, '".$_POST["transporte"]." ',".$_POST["valor_pag_ustedt"].", '".$_POST["tipo_mone_ustedt"]." ', ".$_POST["valor_ter_nogrupt"].",' ".$_POST["tipo_mone_nogrupt"]."',
						 ". $_POST["valor_ter_sigrupt"].", '".$_POST["tipo_mone_sigrupt"]."',".$_POST["no_personas_transporte"].")";
						  
						 }
						 
						 
						 $query = $conexion->prepare($sql);
						 
						 $result = $query->execute();
						 
						// print_r($query->errorInfo());
						 
						 //pais visita
						 $sql="INSERT INTO bde_pais_visita(id_usuario_fk, pais_visita, noch_vi_prop, noch_hotaphot, noch_vi_famiami, noch_vi_alqui, noch_ot_tipvi) 
						 VALUES (:id_usuario_fk, :pais_visita, :noch_vi_prop, :noch_hotaphot, :noch_vi_famiami, :noch_vi_alqui, :noch_ot_tipvi)";
						  
							$query = $conexion->prepare($sql);
							
							$query->bindParam("id_usuario_fk",$id_usuario_fk,PDO::PARAM_STR);
							
							$query->bindParam("pais_visita",$_POST["pais_visita"],PDO::PARAM_STR);
							
							$query->bindParam("noch_vi_prop",$_POST["noch_vi_prop"],PDO::PARAM_STR);
							
							$query->bindParam("noch_hotaphot",$_POST["noch_hotaphot"],PDO::PARAM_STR);
							
							$query->bindParam("noch_vi_famiami",$_POST["noch_vi_famami"],PDO::PARAM_STR);
							
							$query->bindParam("noch_vi_alqui",$_POST["noch_vi_alqui"],PDO::PARAM_STR);
							
							$query->bindParam("noch_ot_tipvi",$_POST["noch_ot_tipvi"],PDO::PARAM_STR);
							
							 
						 
						 $result = $query->execute();
						 
						  echo '<script type="text/javascript">'
			   , 'alert("Se actualizó su encuesta satisfactoriamente");'
			   , 'window.location.href = "../edit_delete.php"</script>'
			;
		
			
			
        } else {
            echo '<p class="error">Hay un problema altualizando su encuesta!</p>';
			print_r($query->errorInfo());
			
        }
}	
		
if (isset($_POST['eliminar_encuesta'])) {
	
	        $id_usuario_fk=$_SESSION['s_usuario_id'];
	
	        $query = $conexion->prepare("DELETE FROM bde_usuario_organiza WHERE id_usuario_fk=:id_usuario_fk");
			$query->bindParam("id_usuario_fk",$id_usuario_fk, PDO::PARAM_STR);
			$result = $query->execute();
			
			
			
			$query = $conexion->prepare("DELETE FROM bde_usuario_servicio WHERE id_usuario_fk=:id_usuario_fk");
			$query->bindParam("id_usuario_fk",$id_usuario_fk, PDO::PARAM_STR);
			$result = $query->execute();
			
			
			
			$query = $conexion->prepare("DELETE FROM bde_gasto_usuario WHERE id_usuario_fk=:id_usuario_fk");
			$query->bindParam("id_usuario_fk",$id_usuario_fk, PDO::PARAM_STR);
			$result = $query->execute();
			
			
			
			$query = $conexion->prepare("DELETE FROM bde_pais_visita WHERE id_usuario_fk=:id_usuario_fk");
			$query->bindParam("id_usuario_fk",$id_usuario_fk, PDO::PARAM_STR);
			$result = $query->execute();
			
			$query = $conexion->prepare("DELETE FROM bde_datos_usuario WHERE id_usuario_fk=:id_usuario_fk");
			$query->bindParam("id_usuario_fk",$id_usuario_fk, PDO::PARAM_STR);
			$result = $query->execute();
			 
			 if ($result) {
           
			 echo '<script type="text/javascript">'
			   , 'alert("Se borró su encuesta correctamente");'
			   , 'window.location.href = "../index.php";</script>';
			 }
			else {
            echo '<p class="error">Hay un problema eliminando su encuesta!</p>';
			print_r($query->errorInfo());
			
            }

	
	
}
?>
