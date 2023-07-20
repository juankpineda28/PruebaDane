<script src="../validaciones.js"></script>
<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Registrar encuesta</h1>
    
    
    
 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, nombre, pais, edad FROM personas";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                           
                        /*    foreach($data as $dat) {                                                        
                             echo $dat['id'] 
                              
                          
                                }*/
                            ?> 

 
<div class="container">
      
                     


    <h2>CAPITULO I </h2>
  
   
		<form method="post" action="bd/crud.php" id="form_encuesta" name="form_encuesta">
        <div class="form-control">
		
            <label for="name" id="label-name">
                1.	¿Cuál es su país de residencia permanente?
            </label>
 
            <!-- Input Type Text -->
            <input type="text"  id="pais_resi" name="pais_resi"   placeholder="Ingrese su país de residencia" required />
        </div>
  
        <div class="form-control">
            <label for="nacionalidad" id="label-nacionalidad">
               2.	¿Cuál es su nacionalidad?                                   
            </label>
 
            <!-- Input Nacionalidad-->
             <input type="text"    id="nacionalidad"   name="nacionalidad"       placeholder="nacionalidad" required />
        </div>
  
         <div class="form-control">
        
            
			
			<tr>
			<td><label >3. Sexo</label></td>
			<td><input type="radio" value="M" id="sexo1"  name="sexo" required>M</td>
			<td><input type="radio" value="F" id="sexo2" name="sexo"  required />F</td>
			</tr>
			
			
        </div>
        <div class="form-control">
            <label for="edad" id="label-edad">
                Edad
            </label>
 
            <!-- Input Type Text -->
            <input type="number"              name="edad"     id="edad"                   placeholder="Ingrese su edad" min="1" max="130" required />
        </div>
		
		 <div class="form-control">
		 <table>
		    <tr>
		    <td colspan="4"><label >4. ¿Con quien viaja?	</label></td>
		    </tr>
			<tr>	
			<td><input type="radio" value="1"    id="vsolo"  name="viaja" required onclick="document.getElementById('label-c2').focus();document.querySelector('#votro_cual').required = false;document.querySelector('#no_personas_viaje').required = false;">Solo</td>
			<td><input type="radio" value="2" id="vfamilia" name="viaja"  required onclick="document.querySelector('#votro_cual').required = false;document.querySelector('#no_personas_viaje').required = true;"/>Familia</td>
			<td><input type="radio" value="3" id="vcompatrabestu" name="viaja"  required onclick="document.querySelector('#votro_cual').required = false;document.querySelector('#no_personas_viaje').required = true;"
			
			/>Compañeros de trabajo y/o estudio</td>
			<td><input type="radio" value="4" id="vamigo" name="viaja"  required onclick="document.querySelector('#votro_cual').required = false;document.querySelector('#no_personas_viaje').required = true;"/>Amigos</td>
			</tr>
			<tr>
			<td><input type="radio" value="5" id="votro" name="viaja"  required onclick="document.querySelector('#votro_cual').required = true;document.querySelector('#no_personas_viaje').required = true;"/>Otro.  ¿Cuál?</td>
			
			<td colspan="4">
			<textarea name="votro_cual" id="votro_cual"        placeholder=""></textarea>
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
                   placeholder="Ingrese # personas con que viaja" value=0 required />
				</td>   
		  </tr>
       </table>
    
	 
	 
	 
	   <h2>CAPITULO II </h2>
       
            <label  id="label-c2" name="label-c2">
                6.	¿Cuál fue el principal motivo de este viaje? (Por favor seleccione solo una opción).
				
				Si selecciona 1 Pase a la pregunta No. 8
            </label>
             
          <table>
		   <tr>
		    <td><input type="radio" value="1" id="mfamigo" name="motivo"  required onclick="document.querySelector('#mootro_cual').required = false;"/>1 .Visita a familiares o amigos</td>
			<td><input type="radio" value="8" id="mreligioso" name="motivo"  required />8.Religioso </td>
		   </tr>
		   <tr>
		    <td><input type="radio" value="2" id="mvacaciones" name="motivo"  required onclick="document.querySelector('#mootro_cual').required = false;"/>2. Vacaciones (recreación, ocio, sol y playa)</td>
			<td><input type="radio" value="9" id="mcongreso" name="motivo"  required onclick="document.querySelector('#mootro_cual').required = false;"/>9. Asistencia a Congresos, Seminarios,convenciones</td>
		   </tr>
           <tr>
		    <td><input type="radio" value="3" id="mcompras" name="motivo"  required onclick="document.querySelector('#mootro_cual').required = false;"/>3. Compras</td>
			<td><input type="radio" value="10" id="mtrabajor" name="motivo"  required onclick="document.querySelector('#mootro_cual').required = false;"/>10. Trabajo remunerado en destino  </td>
		   </tr>	
           <tr>
             <td><input type="radio" value="4" id="mturismo" name="motivo"  required onclick="document.querySelector('#mootro_cual').required = false;"/>4. Turismo Cultural</td>	
             <td> <input type="radio" value="11" id="mtrabajonr" name="motivo"  required onclick="document.querySelector('#mootro_cual').required = false;"/>11. Trabajo o negocios (no remunerado en destino)</td>
           </tr>
		   <tr>	 
			 <td><input type="radio" value="5" id="mturismo" name="motivo"  required onclick="document.querySelector('#mootro_cual').required = false;"/>5. Asistencia a eventos artísticos y/o deportivos destino</td>	
             <td><input type="radio" value="12" id="mparteveartdepo" name="motivo"  required onclick="document.querySelector('#mootro_cual').required = false;"/>12. Participación en eventos artísticos y/o deportivos</td>				
		   </tr>
		    <tr>	 
			 <td><input type="radio" value="6" id="mestudio" name="motivo"  required onclick="document.querySelector('#mootro_cual').required = false;"/>6. Estudio y/o formación</td>	
            
		   </tr>
		   
		   <tr><td><input type="radio" value="7" id="mtratamientosaludbell" name="motivo"  required onclick="document.querySelector('#mootro_cual').required = false;"/>7.Tratamiento de salud y belleza </td>
		   <td><input type="radio" value="13" id="mtransito" name="motivo"  required onclick="document.querySelector('#mootro_cual').required = false;"/>13. Tránsito</td>
			</tr>
			
		<tr>
		    <td><input type="radio" value="14" id="motro" name="motivo"  required onclick="document.querySelector('#mootro_cual').required = true;"/>14. Otro ¿Cuál? 	<td colspan="4">
			<textarea name="mootro_cual" id="mootro_cual"
                placeholder=""></textarea></td>
			</tr>	
		 </table> 
        
  
       
  
       
            <label>7.	¿Cómo organizó su viaje? 	
                <small>(puede seleccionar más de una opción)</small>
            </label>
		         <tr><td>Si selecciona 1, 2 o 3 Pase a la pregunta No. 10</td></tr>
            <label for="inp-1">
                <input type="checkbox"
                       name="organiza[]" id="organiza[]" value="1"  onclick="document.querySelector('#otro_organiza').required = false;">1. Paquete turístico organizado por una agencia de viajes en Colombia</input></label>
            <label for="inp-2">
                <input type="checkbox"
                       name="organiza[]" id="organiza[]" value="2"  onclick="document.querySelector('#otro_organiza').required = false;">2. Paquete turístico organizado por una agencia de viajes en el país de visita</input></label>
            <label for="inp-3">
                <input type="checkbox"
                       name="organiza[]" id="organiza[]" value="3"  onclick="document.querySelector('#otro_organiza').required = false;"> 3. Paquete turístico organizado por terceros que no sean agencias de viajes</label>
                    <tr><td>Si selecciona 4 o 5 Pase a la pregunta No. 9</td></tr>           
		   <label for="inp-4">
                <input type="checkbox"
                       name="organiza[]" id="organiza[]" value="4"  onclick="document.querySelector('#otro_organiza').required = false;">4. Viaje organizado por cuenta propia</input></label>
					   
					   <label for="inp-4">
                <input type="checkbox"
                       name="organiza[]"  id="organiza[]" value="5"  onclick="document.querySelector('#otro_organiza').required = true;">5. Otro    ¿Cuál? </input> <textarea name="otro_organiza" id="otro_organiza"
                placeholder=""></textarea></label>
      
       
  
            <label for="comment">
                8.	¿Qué tipo de servicios comprendió el paquete turístico? (puede seleccionar más de una opción)
            </label>
 
         
		           
            <label for="inp-1">
                <input type="checkbox"
                       name="servicio[]" value="1"  onclick="document.querySelector('#otro_transporte_interno').required = false;document.querySelector('#otro_servicio_transporte').required = false;">1. Alojamiento</input></label>
            <label for="inp-2">
                <input type="checkbox"
                       name="servicio[]" value="2" onclick="document.querySelector('#otro_transporte_interno').required = false;document.querySelector('#otro_servicio_transporte').required = false;">2. Transporte internacional </input></label>
            <label for="inp-3">
                <input type="checkbox"
                       name="servicio[]" value="3" onclick="document.querySelector('#otro_transporte_interno').required = false;document.querySelector('#otro_servicio_transporte').required = false;">3. Alimentos y bebidas (No incluidos en el alojamiento) </label>
                              
		   <label for="inp-4">
                <input type="checkbox"
                       name="servicio[]" value="4" onclick="document.querySelector('#otro_transporte_interno').required = false;document.querySelector('#otro_servicio_transporte').required = false;">4. Servicios culturales y de entretenimiento. </input></label>
			
           <label for="inp-5">
                <input type="checkbox"
                       name="servicio[]" value="5" onclick="document.querySelector('#otro_transporte_interno').required = false;document.querySelector('#otro_servicio_transporte').required = false;">5. Servicios deportivos y recreacionales. </input></label>
			<label for="inp-6">
                <input type="checkbox"
                       name="servicio[]" value="6" onclick="document.querySelector('#otro_transporte_interno').required = false;document.querySelector('#otro_servicio_transporte').required = false;">6. Tours en destino (con servicio de  guía). </input></label>
						
			<label for="inp-7">
                <input type="checkbox"
                       name="servicio[]" value="7" onclick="document.querySelector('#otro_transporte_interno').required = false;document.querySelector('#otro_servicio_transporte').required = false;">7. Transporte aéreo interno en el destino </input></label>
						
			<label for="inp-8">
                <input type="checkbox"
                       name="servicio[]" value="8" onclick="document.querySelector('#otro_transporte_interno').required = true;"> 8. Otro transporte interno ¿Cuál?  </input>
					   
					   <textarea name="otro_transporte_interno" id="otro_transporte_interno"
                placeholder=""></textarea>
					   
					   
					   </label>
					   
				       
            <label for="inp-8">
                <input type="checkbox"
                       name="servicio[]" value="9" onclick="document.querySelector('#otro_servicio_transporte').required = true;"> 9. Otro servicio. ¿Cuál?   </input>
					   <textarea name="otro_servicio_transporte" id="otro_servicio_transporte"
                placeholder=""></textarea></label>
			
               
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
			
			<tr>
			<td>a.Paquete turístico</td>
			<td><input type="radio" value="s" id="sipaquete" name="paquete" onclick="document.querySelector('#valor_pag_ustedpq').disabled  = false;document.querySelector('#valor_pag_ustedpq').required  = true;document.querySelector('#tipo_mone_ustedpq').disabled  = false;document.querySelector('#tipo_mone_ustedpq').required  = true;document.querySelector('#tipo_mone_nogruppq').disabled  = false;document.querySelector('#tipo_mone_nogruppq').required  = true;document.querySelector('#tipo_mone_sigruppq').disabled  = false;document.querySelector('#tipo_mone_sigruppq').required  = true;document.querySelector('#valor_ter_nogruppq').disabled  = false;document.querySelector('#valor_ter_nogruppq').required  = true;document.querySelector('#valor_ter_sigruppq').disabled  = false;document.querySelector('#valor_ter_sigruppq').required  = true;document.querySelector('#no_personas_paquetepq').disabled  = false;document.querySelector('#no_personas_paquetepq').required  = true;" />Si
			<input type="radio" value="n" id="nopaquete" name="paquete" onclick="document.querySelector('#valor_pag_ustedpq').disabled  = true;document.querySelector('#valor_pag_ustedpq').required  = false;document.querySelector('#tipo_mone_ustedpq').disabled  = true;document.querySelector('#tipo_mone_ustedpq').required  = false;document.querySelector('#tipo_mone_nogruppq').disabled  = true;document.querySelector('#tipo_mone_nogruppq').required  = false;document.querySelector('#tipo_mone_sigruppq').disabled  = true;document.querySelector('#tipo_mone_sigruppq').required  = false;document.querySelector('#valor_ter_nogruppq').disabled  = true;document.querySelector('#valor_ter_nogruppq').required  = false;document.querySelector('#valor_ter_sigruppq').disabled  = true;document.querySelector('#valor_ter_sigruppq').required  = false;document.querySelector('#no_personas_paquetepq').disabled  = true;document.querySelector('#no_personas_paquetepq').required  = false;"  />No 
			</td>
		    <td>Valor <input type="number"  id="valor_pag_ustedpq" name="valor_pag_ustedpq"  value=0  />Tipo de moneda  <input type="text"    id="tipo_mone_ustedpq"   name="tipo_mone_ustedpq"       placeholder="tipo moneda"  /></td>  
			<td>Valor <input type="number"  id="valor_ter_nogruppq" name="valor_ter_nogruppq"  value=0  /> Tipo de moneda <input type="text"    id="tipo_mone_nogruppq"   name="tipo_mone_nogruppq"       placeholder="tipo moneda"  /></td>
			<td>Valor <input type="number"  id="valor_ter_sigruppq" name="valor_ter_sigruppq"  value=0  /> Tipo de moneda <input type="text"    id="tipo_mone_sigruppq"   name="tipo_mone_sigruppq"       placeholder="tipo moneda"  /></td>  
			<td>  <input type="number"   id="no_personas_paquetepq" name="no_personas_paquete"  value=0 size="4" /></td>
			
			</tr>
			
				<tr>
			<td>b.Transporte Internacional</td>
			<td><input type="radio" value="s" id="sitransporte" name="transporte"  onclick="document.querySelector('#valor_pag_ustedt').disabled  = false;document.querySelector('#valor_pag_ustedt').required  = true;document.querySelector('#tipo_mone_ustedt').disabled  = false;document.querySelector('#tipo_mone_ustedt').required  = true;document.querySelector('#tipo_mone_nogrupt').disabled  = false;document.querySelector('#tipo_mone_nogrupt').required  = true;document.querySelector('#tipo_mone_sigrupt').disabled  = false;document.querySelector('#tipo_mone_sigrupt').required  = true;document.querySelector('#valor_ter_nogrupt').disabled  = false;document.querySelector('#valor_ter_nogrupt').required  = true;document.querySelector('#valor_ter_sigrupt').disabled  = false;document.querySelector('#valor_ter_sigrupt').required  = true;document.querySelector('#no_personas_transporte').disabled  = false;document.querySelector('#no_personas_transporte').required  = true;"/>Si
			<input type="radio" value="n" id="notransporte" name="transporte"  onclick="document.querySelector('#valor_pag_ustedt').disabled  = true;document.querySelector('#valor_pag_ustedt').required  = false;document.querySelector('#tipo_mone_ustedt').disabled  = true;document.querySelector('#tipo_mone_ustedt').required  = false;document.querySelector('#tipo_mone_nogrupt').disabled  = true;document.querySelector('#tipo_mone_nogrupt').required  = false;document.querySelector('#tipo_mone_sigrupt').disabled  = true;document.querySelector('#tipo_mone_sigrupt').required  = false;document.querySelector('#valor_ter_nogrupt').disabled  = true;document.querySelector('#valor_ter_nogrupt').required  = false;document.querySelector('#valor_ter_sigrupt').disabled  = true;document.querySelector('#valor_ter_sigrupt').required  = false;document.querySelector('#no_personas_transporte').disabled  = true;document.querySelector('#no_personas_transporte').required  = false;" />No 
			</td>
		    <td>Valor <input type="number"  id="valor_pag_ustedt" name="valor_pag_ustedt"  value=0  />Tipo de moneda  <input type="text"    id="tipo_mone_ustedt"   name="tipo_mone_ustedt"       placeholder="tipo moneda"  /></td>  
			<td>Valor <input type="number"  id="valor_ter_nogrupt" name="valor_ter_nogrupt"  value=0  /> Tipo de moneda <input type="text"    id="tipo_mone_nogrupt"   name="tipo_mone_nogrupt"       placeholder="tipo moneda"  /></td>
			<td>Valor <input type="number"  id="valor_ter_sigrupt" name="valor_ter_sigrupt"  value=0  /> Tipo de moneda <input type="text"    id="tipo_mone_sigrupt"   name="tipo_mone_sigrupt"       placeholder="tipo moneda"  /></td>  
			<td>  <input type="number"   id="no_personas_transporte" name="no_personas_transporte"  value=0 size="4" /></td>
			
			
			</tr>
			
			</table>
			
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
			<textarea name="pais_visita" id="pais_visita"
                placeholder=""></textarea>
			</td>
			<td>
			<input type="number"  id="noch_vi_prop" name="noch_vi_prop"  value=0  /># Noches
			</td>
			
			<td>
			<input type="number"  id="noch_hotaphot" name="noch_hotaphot"  value=0  /># Noches
			</td>
			
			<td>
			<input type="number"  id="noch_vi_famami" name="noch_vi_famami"  value=0  /># Noches
			</td>
			
			<td>
			<input type="number"  id="noch_vi_alqui" name="noch_vi_alqui"  value=0  /># Noches
			</td>
			
			<td>
			<input type="number"  id="noch_ot_tipvi" name="noch_ot_tipvi"  value=0  /># Noches
			</td>
			</tr>
			
			</table>
		
		 <table align="center" width="1050px;">
		 <tr>
		   <td >
  		   <button  class="login-form-bgbtn" type="submit" name="ingresar_encuesta" value="ingresar_encuesta" onclick="return validar();">Registrar</button>
		   </td>
		  
		   
		  
		  </tr> 
        </table>
           
        </div>
        	
    </div>    
      
 
       </form>
    
    

<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>