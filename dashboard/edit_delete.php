<script src="../validaciones.js"></script>
<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Editar-eliminar encuesta</h1>
    
    
    
 <?php
 error_reporting(E_ERROR | E_WARNING | E_PARSE);
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM bde_datos_usuario WHERE id_usuario_fk=".$_SESSION['s_usuario_id'];


$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetch(PDO::FETCH_ASSOC);
                           
                   
                            ?> 

 
<div class="container">
      
                     


    <h2>CAPITULO I </h2>
  
   
		<form method="post" action="bd/crud.php" id="form_encuesta" name="form_encuesta">
        <div class="form-control">
		
            <label for="name" id="label-name">
                1.	¿Cuál es su país de residencia permanente?
            </label>
 
            <!-- Input Type Text -->
            <input type="text"  id="pais_resi" name="pais_resi"   placeholder="Ingrese su país de residencia" required value="<?= $data['pais_resi'];?>" />
        </div>
  
        <div class="form-control">
            <label for="nacionalidad" id="label-nacionalidad">
               2.	¿Cuál es su nacionalidad?                                   
            </label>
 
            <!-- Input Nacionalidad-->
             <input type="text"    id="nacionalidad"   name="nacionalidad"       placeholder="nacionalidad" required value="<?= $data['nacionalidad'];?>"/>
        </div>
  
         <div class="form-control">
        
            
			
			<tr>
			<td><label >3. Sexo</label></td>
			<td><input type="radio" value="M" id="sexo1"  name="sexo" <?php if($data['sexo']=='M') echo 'checked';?>  required>M</td>
			<td><input type="radio" value="F" id="sexo2" name="sexo"  <?php if($data['sexo']=='F') echo 'checked';?> required />F</td>
			</tr>
			
			
        </div>
        <div class="form-control">
            <label for="edad" id="label-edad">
                Edad
            </label>
 
            <!-- Input Type Text -->
               <input type="number"        name="edad"           id="edad"         value=<?=$data['edad'];?>          placeholder="Ingrese su edad" min="1" max="130" required />
        </div>
		
		 <div class="form-control">
		 <table>
		    <tr>
		    <td colspan="4"><label >4. ¿Con quien viaja?	</label></td>
		    </tr>
			<tr>	
			<td><input type="radio" value="1"    id="vsolo"  name="viaja" <?php if($data['id_viaja_fk']=='1') echo 'checked';?> required onclick="document.getElementById('label-c2').focus();document.querySelector('#votro_cual').required = false;document.querySelector('#no_personas_viaje').required = false;">Solo</td>
			<td><input type="radio" value="2" id="vfamilia" name="viaja"  <?php if($data['id_viaja_fk']=='2') echo 'checked';?> required onclick="document.querySelector('#votro_cual').required = false;document.querySelector('#no_personas_viaje').required = true;"/>Familia</td>
			<td><input type="radio" value="3" id="vcompatrabestu" name="viaja"  <?php if($data['id_viaja_fk']=='3') echo 'checked';?> required onclick="document.querySelector('#votro_cual').required = false;document.querySelector('#no_personas_viaje').required = true;"
			
			/>Compañeros de trabajo y/o estudio</td>
			<td><input type="radio" value="4" id="vamigo" name="viaja"  <?php if($data['id_viaja_fk']=='4') echo 'checked';?> required onclick="document.querySelector('#votro_cual').required = false;document.querySelector('#no_personas_viaje').required = true;"/>Amigos</td>
			</tr>
			<tr>
			<td><input type="radio" value="5" id="votro" name="viaja"  <?php if($data['id_viaja_fk']=='5') echo 'checked';?> required onclick="document.querySelector('#votro_cual').required = true;document.querySelector('#no_personas_viaje').required = true;"/>Otro.  ¿Cuál?</td>
			
			<td colspan="4">
			<textarea name="votro_cual" id="votro_cual"        placeholder=""><?=$data['otro_viaja'];?></textarea>
			</td>
			</tr>
         </table>
          
            
       
		
		 <table>
		    <tr><td>
            <label for="no_personas_viaje" id="label-no_personas">
                5.	¿Incluyéndolo a usted con cuantas personas viaja?
            </label></td>
          <td>
            <!-- Input Type Text -->
            <input type="number"
                   id="no_personas_viaje" name="no_personas_viaje"
                   placeholder="Ingrese # personas con que viaja" value=<?=$data['no_personas_viaje'];?> required /> 
		  </tr>
       </table>
    
	 
	 
	 
	   <h2>CAPITULO II </h2>
       
           
             
           <label  id="label-c2" name="label-c2">
                6.	¿Cuál fue el principal motivo de este viaje? (Por favor seleccione solo una opción).
				
				Si selecciona 1 Pase a la pregunta No. 8
            </label>
             
          <table>
		   <tr>
		    <td><input type="radio" value="1" id="mfamigo" name="motivo" <?php if($data['id_motivo_fk']=='1') echo 'checked';?> required onclick="document.querySelector('#mootro_cual').required = false;"/>1 .Visita a familiares o amigos</td>
			<td><input type="radio" value="8" id="mreligioso" name="motivo" <?php if($data['id_motivo_fk']=='8') echo 'checked';?> required />8.Religioso </td>		   </tr>
		   <tr>
		    <td><input type="radio" value="2" id="mvacaciones" name="motivo"  <?php if($data['id_motivo_fk']=='2') echo 'checked';?> required onclick="document.querySelector('#mootro_cual').required = false;"/>2. Vacaciones (recreación, ocio, sol y playa)</td>
			<td><input type="radio" value="9" id="mcongreso" name="motivo" <?php if($data['id_motivo_fk']=='8') echo 'checked';?> required onclick="document.querySelector('#mootro_cual').required = false;"/>9. Asistencia a Congresos, Seminarios,convenciones</td>
		   </tr>
           <tr>
		    <td><input type="radio" value="3" id="mcompras" name="motivo" <?php if($data['id_motivo_fk']=='3') echo 'checked';?> required onclick="document.querySelector('#mootro_cual').required = false;"/>3. Compras</td>
			<td><input type="radio" value="10" id="mtrabajor" name="motivo" <?php if($data['id_motivo_fk']=='9') echo 'checked';?> required onclick="document.querySelector('#mootro_cual').required = false;"/>10. Trabajo remunerado en destino  </td>
		   </tr>	
           <tr>
             <td><input type="radio" value="4" id="mturismo" name="motivo" <?php if($data['id_motivo_fk']=='4') echo 'checked';?> required onclick="document.querySelector('#mootro_cual').required = false;"/>4. Turismo Cultural</td>	
             <td> <input type="radio" value="11" id="mtrabajonr" name="motivo"  <?php if($data['id_motivo_fk']=='10') echo 'checked';?> required onclick="document.querySelector('#mootro_cual').required = false;"/>11. Trabajo o negocios (no remunerado en destino)</td>
           </tr>
		   <tr>	 
			 <td><input type="radio" value="5" id="mturismo" name="motivo"  <?php if($data['id_motivo_fk']=='5') echo 'checked';?> required onclick="document.querySelector('#mootro_cual').required = false;"/>5. Asistencia a eventos artísticos y/o deportivos destino</td>	
             <td><input type="radio" value="12" id="mparteveartdepo"  <?php if($data['id_motivo_fk']=='11') echo 'checked';?>name="motivo"  required onclick="document.querySelector('#mootro_cual').required = false;"/>12. Participación en eventos artísticos y/o deportivos</td>				
		   </tr>
		    <tr>	 
			 <td><input type="radio" value="6" id="mestudio" name="motivo" <?php if($data['id_motivo_fk']=='6') echo 'checked';?> required onclick="document.querySelector('#mootro_cual').required = false;"/>6. Estudio y/o formación</td>	
            	
		   </tr>
		   
		   <tr><td><input type="radio" value="7" id="mtratamientosaludbell" name="motivo" <?php if($data['id_motivo_fk']=='7') echo 'checked';?> required onclick="document.querySelector('#mootro_cual').required = false;"/>7.Tratamiento de salud y belleza </td>
		   <td><input type="radio" value="13" id="mtransito" name="motivo"  <?php if($data['id_motivo_fk']=='13') echo 'checked';?> required onclick="document.querySelector('#mootro_cual').required = false;"/>13. Tránsito</td>
			</tr>
			
		<tr>
		    <td><input type="radio" value="14" id="motro" name="motivo"  <?php if($data['id_motivo_fk']=='14') echo 'checked';?> required onclick="document.querySelector('#mootro_cual').required = true;"/>14. Otro ¿Cuál? 	<td colspan="4">
			<textarea name="mootro_cual" id="mootro_cual"
                placeholder=""><?=$data['otro_motivo'];?></textarea></td>
			</tr>	
		 </table> 
        
  
       
  
       
            <label>7.	¿Cómo organizó su viaje? 	
                <small>(puede seleccionar más de una opción)</small>
            </label>
		         <tr><td>Si selecciona 1, 2 o 3 Pase a la pregunta No. 10</td></tr>
            <?php	
	   $query = $conexion->prepare("SELECT * FROM bde_paquetes");
    
       $query->execute();
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			
			
           
      	    $query_organiza = $conexion->prepare("SELECT * FROM bde_usuario_organiza WHERE id_usuario_fk=".$_SESSION['s_usuario_id']." AND id_organiza_fk=".$row['id']);
			$query_organiza->execute();
			$row_organiza = $query_organiza->fetch(PDO::FETCH_ASSOC);
		
			
    ?>
				 
            <label for="inp-1">
                <input type="checkbox"
                       name="organiza[]" id="organiza[]" value="<?=$row['id'];?>" 
					   <?php if($row_organiza['id_organiza_fk']==$row['id']) echo "checked";?>  
					   onclick="document.querySelector('#otro_organiza').required = false;"><?=$row['valor_opcion'];?></input></label>
    <?php if($row['id']==3){ ?>        
			
                
					
					<tr><td>Si selecciona 4 o 5 Pase a la pregunta No. 9</td></tr> 
	<?php }
	    if($row['id']==5){ ?>   
				
		   	   
					   <textarea name="otro_organiza" id="otro_organiza"  placeholder=""><?=$row_organiza['otro_organiza'];?></textarea></label>
      <?php } 
	  
		}?>
      
       
  
            <label for="comment">
                8.	¿Qué tipo de servicios comprendió el paquete turístico? (puede seleccionar más de una opción)
            </label>
 

 
          <?php	
	   $query = $conexion->prepare("SELECT * FROM bde_servicio");
    
       $query->execute();
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			
			
           
      	    $query_servicio = $conexion->prepare("SELECT * FROM bde_usuario_servicio WHERE id_usuario_fk=".$_SESSION['s_usuario_id']." AND id_servicio_fk=".$row['id_servicio']);
			$query_servicio->execute();
			$row_servicio = $query_servicio->fetch(PDO::FETCH_ASSOC);
			
		 if($row['id_servicio']<8){ ?>  
		           <br>
            <label for="inp-1">
                <input type="checkbox"
                       name="servicio[]" value="<?=$row['id_servicio'];?>"  <?php if($row_servicio['id_servicio_fk']==$row['id_servicio']) echo "checked";?> onclick="document.querySelector('#otro_transporte_interno').required = false;document.querySelector('#otro_servicio_transporte').required = false;"><?=$row['nombre'];?></input></label>
           

		  		 <?php }

                  if($row['id_servicio']==8){
				 ?>
						
			<label for="inp-8">
                <input type="checkbox"
                       name="servicio[]" value="<?=$row['id_servicio'];?>" <?php if($row_servicio['id_servicio_fk']==$row['id_servicio']) echo "checked";?> onclick="document.querySelector('#otro_transporte_interno').required = true;"><?=$row['nombre'];?></input>
					   
					   <textarea name="otro_transporte_interno" id="otro_transporte_interno"  placeholder=""><?=$row_servicio['otro_transporte_interno'];?></textarea>
					   
					   
					   </label>
					   
				  <?php } 
				  if($row['id_servicio']==9){?> 
            <label for="inp-9">
                <input type="checkbox"
                       name="servicio[]" value="<?=$row['id_servicio'];?>" <?php if($row_servicio['id_servicio_fk']==$row['id_servicio']) echo "checked";?> onclick="document.querySelector('#otro_servicio_transporte').required = true;"><?=$row['nombre'];?> </input>
					   <textarea name="otro_servicio_transporte" id="otro_servicio_transporte"         placeholder=""><?=$row_servicio['otro_servicio_transporte'];?></textarea></label>
			
               
		 
				  
		<?php         } 
		}
		?>
			
               
		 <h2>CAPITULO III </h2>
		   
            <label for="comment">
               Gastos: Registre el valor que fue pagado por Usted, por Terceros que NO hacen parte de su grupo de viaje y por Terceros que SI hacen parte de su grupo de viaje, así como el tipo de moneda utilizado y el número de personas que cubre cada gasto.
            </label>
			<table border=1>
			<tr>
			<td>Gastos</td>
			<td>¿Hubo gasto?</td> 
			<td> Pagado por usted</td>  
			<td> Terceros que NO hacen parte del grupo</td>
			<td>Terceros que SI hacen parte del grupo</td>  
			<td>¿Para cuantas personas?</td>
			
			</tr>
			
						<?php 
			     
			 $query_paquete = $conexion->prepare("SELECT * FROM bde_gastos g LEFT JOIN bde_gasto_usuario u
ON u.id_usuario_fk=".$_SESSION['s_usuario_id']." AND g.id_gasto=1
			 and g.id_gasto=u.id_gasto_fk	AND u.id_gasto_fk=1 ");
			 
					 
    
             $query_paquete->execute();
		     $row_paquete = $query_paquete->fetch(PDO::FETCH_ASSOC);
			 
			?>
			<tr>
			<td><?='a. Paquete turístico'?></td>
			<td><input type="radio" value="s" <?php if($row_paquete['hubo_gasto']=='s') echo "checked";?>  id="sipaquete" name="paquete" onclick="document.querySelector('#valor_pag_ustedpq').disabled  = false;document.querySelector('#valor_pag_ustedpq').required  = true;document.querySelector('#tipo_mone_ustedpq').disabled  = false;document.querySelector('#tipo_mone_ustedpq').required  = true;document.querySelector('#tipo_mone_nogruppq').disabled  = false;document.querySelector('#tipo_mone_nogruppq').required  = true;document.querySelector('#tipo_mone_sigruppq').disabled  = false;document.querySelector('#tipo_mone_sigruppq').required  = true;document.querySelector('#valor_ter_nogruppq').disabled  = false;document.querySelector('#valor_ter_nogruppq').required  = true;document.querySelector('#valor_ter_sigruppq').disabled  = false;document.querySelector('#valor_ter_sigruppq').required  = true;document.querySelector('#no_personas_paquetepq').disabled  = false;document.querySelector('#no_personas_paquetepq').required  = true;" />Si
			<input type="radio" value="n" <?php if($row_paquete['hubo_gasto']=='n') echo "checked";?> id="nopaquete" name="paquete" onclick="document.querySelector('#valor_pag_ustedpq').disabled  = true;document.querySelector('#valor_pag_ustedpq').required  = false;document.querySelector('#tipo_mone_ustedpq').disabled  = true;document.querySelector('#tipo_mone_ustedpq').required  = false;document.querySelector('#tipo_mone_nogruppq').disabled  = true;document.querySelector('#tipo_mone_nogruppq').required  = false;document.querySelector('#tipo_mone_sigruppq').disabled  = true;document.querySelector('#tipo_mone_sigruppq').required  = false;document.querySelector('#valor_ter_nogruppq').disabled  = true;document.querySelector('#valor_ter_nogruppq').required  = false;document.querySelector('#valor_ter_sigruppq').disabled  = true;document.querySelector('#valor_ter_sigruppq').required  = false;document.querySelector('#no_personas_paquetepq').disabled  = true;document.querySelector('#no_personas_paquetepq').required  = false;"  />No 
			</td>
		    <td>Valor <input type="number"  id="valor_pag_ustedpq" name="valor_pag_ustedpq"  value=<?=$row_paquete['valor_pag_usted'];?>  />Tipo de moneda  <input type="text"    id="tipo_mone_ustedpq"   name="tipo_mone_ustedpq"       placeholder="tipo moneda" value="<?=$row_paquete['tipo_mone_uste'];?>"  /></td>  
			<td>Valor <input type="number"  id="valor_ter_nogruppq" name="valor_ter_nogruppq"  value=<?=$row_paquete['valor_terc_nogrup'];?>  /> Tipo de moneda <input type="text"    id="tipo_mone_nogruppq"   name="tipo_mone_nogruppq"  value="<?=$row_paquete['tipo_mone_nogrup'];?>"    placeholder="tipo moneda"  /></td>
			<td>Valor <input type="number"  id="valor_ter_sigruppq" name="valor_ter_sigruppq"  value=<?=$row_paquete['valor_terc_sigrup'];?>   /> Tipo de moneda <input type="text"    id="tipo_mone_sigruppq"   name="tipo_mone_sigruppq"   value="<?=$row_paquete['tipo_mone_sigrup'];?>"     placeholder="tipo moneda"  /></td>  
			<td>  <input type="number"   id="no_personas_paquetepq" name="no_personas_paquete"  value=<?=$row_paquete['no_personas'];?> size="4" /></td>
			
			</tr>
			<?php 
			     
			 $query_transporte = $conexion->prepare("SELECT * FROM bde_gastos g LEFT JOIN bde_gasto_usuario u
ON u.id_usuario_fk=".$_SESSION['s_usuario_id']." AND g.id_gasto=2
			 and g.id_gasto=u.id_gasto_fk	AND u.id_gasto_fk=2");
    
             $query_transporte->execute();
		     $row_transporte = $query_transporte->fetch(PDO::FETCH_ASSOC);
			 
			
			?>
				<tr>
			<td><?='b. Transporte Internacional'?></td>
			<td><input type="radio" value="s" <?php if($row_transporte['hubo_gasto']=='s') echo "checked";?> id="sitransporte" name="transporte"  onclick="document.querySelector('#valor_pag_ustedt').disabled  = false;document.querySelector('#valor_pag_ustedt').required  = true;document.querySelector('#tipo_mone_ustedt').disabled  = false;document.querySelector('#tipo_mone_ustedt').required  = true;document.querySelector('#tipo_mone_nogrupt').disabled  = false;document.querySelector('#tipo_mone_nogrupt').required  = true;document.querySelector('#tipo_mone_sigrupt').disabled  = false;document.querySelector('#tipo_mone_sigrupt').required  = true;document.querySelector('#valor_ter_nogrupt').disabled  = false;document.querySelector('#valor_ter_nogrupt').required  = true;document.querySelector('#valor_ter_sigrupt').disabled  = false;document.querySelector('#valor_ter_sigrupt').required  = true;document.querySelector('#no_personas_transporte').disabled  = false;document.querySelector('#no_personas_transporte').required  = true;"/>Si
			<input type="radio" value="n" <?php if($row_transporte['hubo_gasto']=='n') echo "checked";?> id="notransporte" name="transporte"  onclick="document.querySelector('#valor_pag_ustedt').disabled  = true;document.querySelector('#valor_pag_ustedt').required  = false;document.querySelector('#tipo_mone_ustedt').disabled  = true;document.querySelector('#tipo_mone_ustedt').required  = false;document.querySelector('#tipo_mone_nogrupt').disabled  = true;document.querySelector('#tipo_mone_nogrupt').required  = false;document.querySelector('#tipo_mone_sigrupt').disabled  = true;document.querySelector('#tipo_mone_sigrupt').required  = false;document.querySelector('#valor_ter_nogrupt').disabled  = true;document.querySelector('#valor_ter_nogrupt').required  = false;document.querySelector('#valor_ter_sigrupt').disabled  = true;document.querySelector('#valor_ter_sigrupt').required  = false;document.querySelector('#no_personas_transporte').disabled  = true;document.querySelector('#no_personas_transporte').required  = false;" />No 
			</td>
		    <td>Valor <input type="number"  id="valor_pag_ustedt" value=<?=$row_transporte['valor_pag_usted'];?> name="valor_pag_ustedt"  value=0  />Tipo de moneda  <input type="text"    id="tipo_mone_ustedt"   name="tipo_mone_ustedt"    value="<?=$row_transporte['tipo_mone_uste'];?>"   placeholder="tipo moneda"  /></td>  
			<td>Valor <input type="number"  id="valor_ter_nogrupt" value=<?=$row_transporte['valor_terc_nogrup'];?> name="valor_ter_nogrupt"  value=0  /> Tipo de moneda <input type="text"    id="tipo_mone_nogrupt"   name="tipo_mone_nogrupt"  value="<?=$row_transporte['tipo_mone_nogrup'];?>"     placeholder="tipo moneda"  /></td>
			<td>Valor <input type="number"  id="valor_ter_sigrupt" value=<?=$row_transporte['valor_terc_sigrup'];?> name="valor_ter_sigrupt"  value=0  /> Tipo de moneda <input type="text"    id="tipo_mone_sigrupt"   name="tipo_mone_sigrupt"    value="<?=$row_transporte['tipo_mone_sigrup'];?>"   placeholder="tipo moneda"  /></td>  
			<td>  <input type="number"   id="no_personas_transporte" value=<?=$row_transporte['no_personas'];?> name="no_personas_transporte"  value=0 size="4" /></td>
			
			
			</tr>
			
			</table>
			<?php 
			     
			 $query_visita = $conexion->prepare("SELECT * FROM bde_pais_visita WHERE id_usuario_fk=".$_SESSION['s_usuario_id']);
    
             $query_visita->execute();
		     $row_visita = $query_visita->fetch(PDO::FETCH_ASSOC);
			 
			?>
			<label for="comment">
               10.	Por favor nombre los países de visita y el número de noches en cada forma de alojamiento utilizado. 
            </label>
			<table>
			<tr>
			<td>
			País de visita
		    </td>	
			
			<td>
			Vivienda propia
		    </td>
			<td>
			Hotel / Apartahotel
		    </td>
			
			<td>
			Vivienda familiar o de amigos

		    </td>
			<td>
			
			Vivienda  En alquiler
            </td>
			<td>
			Otro tipo de vivienda
			</td>
			</tr>
			
			<tr>
			
			<td>
			<textarea name="pais_visita" id="pais_visita"     placeholder=""><?=$row_visita['pais_visita'];?></textarea>
			</td>
			<td>
			<input type="number"  id="noch_vi_prop" name="noch_vi_prop"  value=<?=$row_visita['noch_vi_prop'];?>  /># Noches
			</td>
			
			<td>
			<input type="number"  id="noch_hotaphot" name="noch_hotaphot"  value=<?=$row_visita['noch_hotaphot'];?>  /># Noches
			</td>
			
			<td>
			<input type="number"  id="noch_vi_famami" name="noch_vi_famami"  value=<?=$row_visita['noch_vi_famiami'];?>  /># Noches
			</td>
			
			<td>
			<input type="number"  id="noch_vi_alqui" name="noch_vi_alqui"  value=<?=$row_visita['noch_vi_alqui'];?>  /># Noches
			</td>
			
			<td>
			<input type="number"  id="noch_ot_tipvi" name="noch_ot_tipvi"  value=<?=$row_visita['noch_ot_tipvi'];?>  /># Noches
			</td>
			</tr>
			
			</table>
		
		 <table align="center" width="1050px;">
		 <tr>
		   <td >
  		   <button type="submit" class="login-form-bgbtn" name="actualizar_encuesta" value="actualizar_encuesta" onclick="return validar();">Actualizar</button>
		   </td>
		  
		   <td >
		   <button type="submit"  class="login-form-bgbtn" name="eliminar_encuesta" value="eliminar_encuesta" >Eliminar</button>
		   </td>
		  
		  </tr> 
        </table>
           
        </div>
        	
    </div>    
      
 
       </form>
    
    

<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>