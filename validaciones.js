$('#formLogin').submit(function(e){
   e.preventDefault();
   var usuario = $.trim($("#usuario").val());    
   var password =$.trim($("#password").val());    
    
   if(usuario.length == "" || password == ""){
      Swal.fire({
          type:'warning',
          title:'Debe ingresar un usuario y/o password',
      });
      return false; 
    }else{
        $.ajax({
           url:"bd/login.php",
           type:"POST",
           datatype: "json",
           data: {usuario:usuario, password:password}, 
           success:function(data){               
               if(data == "null"){
                   Swal.fire({
                       type:'error',
                       title:'Usuario y/o password incorrecta',
                   });
               }else if(data == "usuario no existe"){
				   
				   
				   Swal.fire({
                       type:'warning',
                       title:'¡Usuario no existe debes registrarte',
                       confirmButtonColor:'#3085d6',
                       confirmButtonText:'Registrar'
                   }).then((result) => {
                       if(result.value){
                           
                          window.location.href = "vistas/pag_registro.php";
                       }
                   })
				   }else if(data == "usuario con encuesta"){
				   
				   
				   Swal.fire({
                       type:'warning',
                       title:'¡Usuario con encuesta diligenciada',
                       confirmButtonColor:'#3085d6',
                       confirmButtonText:'Gestionar'
                   }).then((result) => {
                       if(result.value){
                           
                          window.location.href = "dashboard/edit_delete.php";
                       }
                   })
				   }
				   else{
                   Swal.fire({
                       type:'success',
                       title:'¡Conexión exitosa!',
                       confirmButtonColor:'#3085d6',
                       confirmButtonText:'Ingresar'
                   }).then((result) => {
                       if(result.value){
                           
                           window.location.href = "dashboard/index.php";
                       }
                   })
                   
               }
           }    
        });
    }     
});

$('#formRegistro').submit(function(e){
   e.preventDefault();
   var usuario = $.trim($("#usuario").val());    
   var password =$.trim($("#password").val());    
    
   if(usuario.length == "" || password == ""){
      Swal.fire({
          type:'warning',
          title:'Debe ingresar un usuario y/o password',
      });
      return false; 
    }else{
        $.ajax({
           url:"../bd/registro.php",
           type:"POST",
           datatype: "json",
           data: {usuario:usuario, password:password}, 
           success:function(data){               
               if(data == "null"){
                   Swal.fire({
                       type:'error',
                       title:'Usuario ya existe',
                   });
               }else if(data == "usuario ya existe"){
				   
				   
				   Swal.fire({
                       type:'warning',
                       title:'¡Usuario no existe debes registrarte',
                       confirmButtonColor:'#3085d6',
                       confirmButtonText:'Registrar'
                   }).then((result) => {
                       if(result.value){
                           
                          window.location.href = "vistas/pag_registro.php";
                       }
                   })
				   }else{
                   Swal.fire({
                       type:'success',
                       title:'¡Registro de usuario exitoso!',
                       confirmButtonColor:'#3085d6',
                       confirmButtonText:'Ingresar'
                   }).then((result) => {
                       if(result.value){
                           
                           window.location.href = "../index.php";
                       }
                   })
                   
               }
           }    
        });
    }     
});






$('#form_encuesta').submit(function(e){
   e.preventDefault();
   var usuario = $.trim($("#usuario").val());    
   var password =$.trim($("#password").val());    
    
   if(usuario.length == "" || password == ""){
      Swal.fire({
          type:'warning',
          title:'Debe ingresar un usuario y/o password',
      });
      return false; 
    }else{
        $.ajax({
           url:"crud.php",
           type:"POST",
           datatype: "json",
           
           success:function(data){               
               if(data == "null"){
                   Swal.fire({
                       type:'error',
                       title:'No see pudo almacenar la encuesta',
                   });
               }else{
                   Swal.fire({
                       type:'success',
                       title:'¡Registro de encuesta exitoso!',
                       confirmButtonColor:'#3085d6',
                       confirmButtonText:'Aceptar'
                   }).then((result) => {
                       if(result.value){
                           
                           window.location.href = "../index.php";
                       }
                   })
                   
               }
           }    
        });
    }     
});



function validar()
{

var contorganiza=0;
for (i = 0, checks = document.form_encuesta['organiza[]']; i < checks.length; i++)
{
if(checks[i].checked){contorganiza++; }
}

if(contorganiza==0)
{
	alert('Por favor responda la pregunta 7');
	return false;
	}

	
var contservicio=0;	

for (i = 0, checks = document.form_encuesta['servicio[]']; i < checks.length; i++)
{
if(checks[i].checked){contservicio++; }
}

if(contservicio==0)
{
	alert('Por favor responda la pregunta 8');
	return false;
	}

	
	if(contorganiza>0 && contservicio>0){
		
		return true;
	}

}