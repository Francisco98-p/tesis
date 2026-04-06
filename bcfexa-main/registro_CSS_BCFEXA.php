<?php 
include "conn.php";
//include 'session_dafexa.php';
/*$username = $_SESSION['username'];
$userID = $_SESSION['userID'];

ATENCIÓN: PROBAR https://danisanchez.net/crear-un-select-con-buscador-integrado-gracias-a-select2/ para mejorar los SELECT

ATENCIÓN2: Con este ejemplo se puede mejorar el Alta en los SELECT ... probar

https://getbootstrap.esdocu.com/docs/5.1/utilities/background/ Colores de Fondo
*/
 ?>
 
<!DOCTYPE html>

<html lang="en">

 

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon"  href="img/descarga.ico"  >
    <style type="text/css">
	
        body {
            font-family: Arial, sans-serif;
            background-color: #001F3F; /* Color azul marino */
            color: white; /* Color de texto en contraste */
			
            
        }
		 h3 img {
            vertical-align: middle;
            margin-right: 10px; /* Ajusta el espacio a tu preferencia */
            width: 50px; /* Ajusta el ancho de la imagen */
            height: 50px; /* Ajusta la altura de la imagen */
        }
		
		#nro_convenio_marco {
        
		width: 950px;
		      		}
		#nro_expediente {
        
		width: 950px;
		      		}			
		#nro_resolucion {
        
		width: 950px;
		      		}		
					
		#resumen {
        width: 935px; 
		height: 30px;
        text-align: left;
		 margin-right: 200px
		      		}			
		#objetivo {
        width: 935px; 
		height: 30px;
        text-align: left;
		      		}			
		#fecha_inicio {
        width: 935px; 
		height: 30px;
        text-align: left;
		      		}				
		#fecha_fin {
        width: 935px; 
		height: 30px;
        text-align: left;
		      		}		
		#plazo_renovacion {
        width: 935px; 
		height: 30px;
        text-align: left;
		      		}		
		
		
		#moneda_organizacion {
        width: 935px; 
		height: 30px;
        text-align: left;
		      		}				
					
		#nota_inversion_organizacion {
        width: 935px; 
		height: 30px;
        text-align: left;
		      		}			
					
		#monto_inversion_organizacion{
        width: 935px; 
		height: 30px;
        text-align: left;
		      		}	

		#nota_inversion_unidad {
        width: 935px; 
		height: 30px;
        text-align: left;
		      		}		
			#monto_inversion_unidad {
        width: 935px; 
		height: 30px;
        text-align: left;
		      		}		
					
    </style>
</head>

</html>







	 <script>
         function valida_archivo() {
			 alert("OJO!, entroF");
	        valor = document.getElementById('archivo');
           if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
			   alert("OJO!, falta indicar cual es el PDF");
            return false;
		  }
      </script>
<script type="text/javascript">
   
function valida_envia(){
   	//valido el nombre https://desarrolloweb.com/articulos/1767.php
   	//valido el tipo de actividad
	alert(document.getElementById("organizacion1").value)
   	if (document.form1.actividad.value == 0){
      		alert("OJO!, no ha indicado el TIPO DE ACTIVIDAD")
		
      		document.form1.actividad.focus()
			return 0;
   	}
  	//valido el No de Resolución
 
	 if (document.form1.nro_resolucion.value.trim() == ''){
      		alert("OJO!, no ha indicado el NÚMERO DE RESOLUCIÓN")
      		document.form1.nro_resolucion.focus()
			return 0;
   	}
	
		//valido el Resumen
 
	 if (document.form1.resumen.value.trim() == ''){
      		alert("OJO!, no ha indicado el RESUMEN")
      		document.form1.resumen.focus()
			return 0;
   	}
	
		//valido Organizacion(es) 
		
		var o1= document.getElementById("organizacion1").value;		
		var o2= document.getElementById("organizacion2").value;		
		var o3= document.getElementById("organizacion3").value;
		
   	if (o1==0) {
      		alert("OJO!, DEBE seleccionar al menos la primer ORGANIZACIÓN")
      		document.form1.organizacion1.focus()
			return 0;
   	}
	
   
   	if ((o1==o2) || (o1==o3) || ((o2==o3) && (o2+o3>0))){
      		alert("OJO!, NO puede REPETIR las ORGANIZACIONES")
      		document.form1.organizacion1.focus()
			return 0;
   	}
	
	//valido Unidad(es) 
		var u1= document.getElementById("unidad1").value;		
		var u2= document.getElementById("unidad2").value;		
		var u3= document.getElementById("unidad3").value;
   	if ((u1==u2) || (u1==u3) || ((u2==u3) && (u2+u3>0))){
      		alert("OJO!, NO puede REPETIR las UNIDADES")
      		document.form1.unidad1.focus()
			return 0;
   	}
	
	//valido Fechas Incio/Fin 
		var f1= document.getElementById("fecha_inicio").value;	
//		
		var f2= document.getElementById("fecha_fin").value;		
	
	   	if (f1>f2) {
      		alert("OJO!, DEBE INDICAR UN RANGO DE FECHAS VÁLIDO")
      		document.form1.fecha_inicio.focus()
			return 0;
   	}
	
   	//el formulario se envia
     	alert("Está todo CONTROLADO, muchas gracias por utilizar BCFEXA!");
    	document.form1.submit(); 
}  
 
</script>

	
        <?php include("head.php");?>
    </head>
    <body style="background-color:#00577e;">

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
        <?php
							
						if(isset($_POST['input'])){
				var_dump($_POST);
				
				$actividad = mysqli_real_escape_string($conn,(strip_tags($_POST['actividad'], ENT_QUOTES)));
				$nro_convenio_marco  = mysqli_real_escape_string($conn,(strip_tags($_POST['nro_convenio_marco'], ENT_QUOTES)));
				$nro_resolucion	= mysqli_real_escape_string($conn,(strip_tags($_POST['nro_resolucion'], ENT_QUOTES)));
				$nro_expediente	= mysqli_real_escape_string($conn,(strip_tags($_POST['nro_expediente'], ENT_QUOTES)));
				
				$organizacion1 	= mysqli_real_escape_string($conn,(strip_tags($_POST['organizacion1'], ENT_QUOTES)));
				$organizacion2 	= mysqli_real_escape_string($conn,(strip_tags($_POST['organizacion2'], ENT_QUOTES)));
				$organizacion3 	= mysqli_real_escape_string($conn,(strip_tags($_POST['organizacion3'], ENT_QUOTES)));
				
				$responsable_org1  = mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_org1'], ENT_QUOTES)));
				$responsable_org2  = mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_org2'], ENT_QUOTES)));
				$responsable_org3  = mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_org3'], ENT_QUOTES)));
				
				$resumen=mysqli_real_escape_string($conn,(strip_tags($_POST['resumen'], ENT_QUOTES)));
				$objetivo=mysqli_real_escape_string($conn,(strip_tags($_POST['objetivo'], ENT_QUOTES)));
				
				$unidad1=mysqli_real_escape_string($conn,(strip_tags($_POST['unidad1'], ENT_QUOTES)));
				$unidad2=mysqli_real_escape_string($conn,(strip_tags($_POST['unidad2'], ENT_QUOTES)));
				$unidad3=mysqli_real_escape_string($conn,(strip_tags($_POST['unidad3'], ENT_QUOTES)));
				
				$responsable_unidad1=mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_unidad1'], ENT_QUOTES)));
				$responsable_unidad2=mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_unidad2'], ENT_QUOTES)));
				$responsable_unidad3=mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_unidad3'], ENT_QUOTES)));
				
				$fecha_inicio=mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_inicio'], ENT_QUOTES)));
				$fecha_fin  = mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_fin'], ENT_QUOTES)));
				
				$plazo_renovacion=mysqli_real_escape_string($conn,(strip_tags($_POST['plazo_renovacion'], ENT_QUOTES)));
				$renovacion_automatica=mysqli_real_escape_string($conn,(strip_tags($_POST['renovacion_automatica'], ENT_QUOTES)));
				
				$moneda_organizacion=mysqli_real_escape_string($conn,(strip_tags($_POST['moneda_organizacion'], ENT_QUOTES)));
				$monto_inversion_organizacion=mysqli_real_escape_string($conn,(strip_tags($_POST['monto_inversion_organizacion'], ENT_QUOTES)));
				$nota_inversion_organizacion=mysqli_real_escape_string($conn,(strip_tags($_POST['nota_inversion_organizacion'], ENT_QUOTES)));
				
				$moneda_unidad=mysqli_real_escape_string($conn,(strip_tags($_POST['moneda_unidad'], ENT_QUOTES)));
				$monto_inversion_unidad=mysqli_real_escape_string($conn,(strip_tags($_POST['monto_inversion_unidad'], ENT_QUOTES)));
				$nota_inversion_unidad=mysqli_real_escape_string($conn,(strip_tags($_POST['nota_inversion_unidad'], ENT_QUOTES)));
				
				
			 
				// Almaceno datos en tabla Actividad

				$insert = mysqli_query($conn, "INSERT INTO actividad (NroResolucion, NroExpediente,NroConvenioMarco,Fecha_inicio,Fecha_final,Resumen,Objetivo,TipoActividad_Id,PlazoRenovacion,
					   RenovacionAutomatica,MonedaOrganizacion_Id,InversionOrganizacion,NotaInversionOrganizacion,MonedaUnidad_Id,InversionUnidad,NotaInversionUnidad) 
				VALUES('$nro_resolucion','$nro_expediente','$nro_convenio_marco','$fecha_inicio','$fecha_fin','$resumen','$objetivo','$actividad','$plazo_renovacion',
			        	$renovacion_automatica,'$moneda_organizacion','$monto_inversion_organizacion','$nota_inversion_organizacion','$moneda_unidad','$monto_inversion_unidad','$nota_inversion_unidad')")
						or die(mysqli_error());
				    
												
						$ultimo_id = mysqli_insert_id($conn); 
                         // var_dump($ultimo_id);				
	
				// Detecto el número del último Id generado en tabla Actividad para actualizar tablas relacionadas
				//	$ultimo_i=  mysqli_query($conn,"SELECT MAX(Id) AS Id FROM actividad limit 1");
				//	$registro = mysqli_fetch_array($ultimo_i);
				//	while ($valores = mysqli_fetch_array($registro)) 
				//	{
				//		$ultimo_id=$valores['Id'];
				//		var_dump($ultimo_id);
				//	}
					
							
				
				// Actualizo tabla "detalleactividadorganizacion" 
				if($organizacion1 <> "")
				{
					mysqli_query($conn, "INSERT INTO detalleactividadorganizacion (Organizacion_Id,Actividad_Id) VALUES('$organizacion1','$ultimo_id')") ;
			   	}
			    
				if($organizacion2 <> "")
				{
					mysqli_query($conn, "INSERT INTO detalleactividadorganizacion (Organizacion_Id,Actividad_Id) VALUES('$organizacion2','$ultimo_id')") ;
			   	}
			    
				if($organizacion3 <> "")
				{
					mysqli_query($conn, "INSERT INTO detalleactividadorganizacion (Organizacion_Id,Actividad_Id) VALUES('$organizacion3','$ultimo_id')") ;
			   	}
			
			// Actualizo tabla "detalleactividadunidad" 
			if($unidad1<>"")
			 {
					
		       	mysqli_query($conn, "INSERT INTO detalleactividadunidad (UnidadEjecutora_Id,Actividad_Id) VALUES('$unidad1','$ultimo_id')"); 
				
			 }
				if($unidad2<>"")
			 {
					
		       	mysqli_query($conn, "INSERT INTO detalleactividadunidad (UnidadEjecutora_Id,Actividad_Id) VALUES('$unidad2','$ultimo_id')"); 
				
			 }	
				if($unidad3<>"")
			 {
					
		       	mysqli_query($conn, "INSERT INTO detalleactividadunidad (UnidadEjecutora_Id,Actividad_Id) VALUES('$unidad3','$ultimo_id')"); 
				
			 }	
			
            // Actualizo tabla "detallepersonactividad" 
			// El campo Org_o_Uni debe tener 1 si es $responsable_org1
			// El campo Org_o_Uni debe tener 2 si es $responsable_unidad1
			// El campos Rol_Id siempre almacena un 2 (al menos en esta primer versión)
			
			if($responsable_unidad1<>"")
			 {
					                             
		       	mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
				                                                   VALUES('$ultimo_id','$responsable_unidad1','2','2')"); 
				
			 }
			if($responsable_unidad2<>"")
			 {
					
		       	mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
				                                                   VALUES('$ultimo_id','$responsable_unidad2','2','2')"); 
				
			 }
			
            if($responsable_unidad3<>"")
			 {
					
		       	mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
			                                               VALUES('$ultimo_id','$responsable_unidad3','2','2')"); 
			
			 }
						
			
			if($responsable_org1<>"")
			 {
					
		       	mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
				                                                   VALUES('$ultimo_id','$responsable_org1','1','2')"); 
				
			 }
			if($responsable_org2<>"")
			 {
					
		       	mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
				                                                   VALUES('$ultimo_id','$responsable_org2','1','2')"); 
				
			 }
			
            if($responsable_org3<>"")
			 {
					
		       	mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
			                                               VALUES('$ultimo_id','$responsable_org3','1','2')"); 
			
			 }
			
			// Listo!, todo almacenado ahora vovemos a la página ppal	
			header("Location: bcfexa_registro1.php");

		} 
			?>
			
            
							<blockquote>
							<br>
							<h3 style="color: white;  font-size: 24px;" > 
							<img src="img/descarga1.png" alt="Descripción de la imagen">
							Agregar Detalles de Actividades  </h3> <br> 
							</blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid"  action="bcfexa_registro1.php"  method="POST" >
									
										
											    <div class="control-group">
												<label class="control-label" id="actividad" style="color: white;" >Tipo de Actividad:</label>
												<div class="controls">
											<select class="form-control" name="actividad" >
											<option value="">Seleccione:</option>
												<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM tipoactividad");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
													  }
												}
													?>
												</select>
												</div>
												</div>
												
																				
										 <div class="control-group">
											<label class="control-label" style="color: white;" >Convenio Marco</label>
											<div class="controls">
												<input   type="text" name="nro_convenio_marco" onchange='add();' id="nro_convenio_marco" 
												placeholder="ingrese SOLO el número" class="form-control span8 tip">
											</div>
										</div>
										
										 <div class="control-group">
											<label class="control-label" style="color: white;" >Número de Expediente</label>
											<div class="controls">
												<input   type="text" name="nro_expediente" id="nro_expediente" 
												placeholder="ingrese el número que inicia el trámite" class="form-control span8 tip">
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" style="color: white;" >Resolución FCEFN</label>
											<div class="controls">
												<input type="text" name="nro_resolucion" onchange='add();' id="nro_resolucion" placeholder="ingrese según patrón Rxx/aa" class="form-control span8 tip" required>
											</div>
										</div>
										
																
									
										<br/>
										
									  <div id="tipo_organizacion" ">
									  	<div class="control-group">
											<label class="control-label" style="color: white;">Organización:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											
											<label for="organizacion"  class="sr-only" style="color: white;">Tipo de Organización:</label>
										
											<select class="form-control" name="organizacion1" id="organizacion1" required style="width:400px;">
											<option value="">Seleccione la organización que figura en la resolución:</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM organizacion");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
												  }
												}
													?>
													
												</select>
												
												
												
										
										
											<select class="form-control" name="organizacion2" id="organizacion2"  style="width:400px;">
											<option value="">&nbsp;&nbsp;&nbsp;Seleccione otra organización (si la hubiere):</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM organizacion");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
												  }
												}
													?>
													
												</select>
												
													<select class="form-control" name="organizacion2" id="organizacion2"  style="width:400px;">
											<option value="">&nbsp;&nbsp;&nbsp;Seleccione otra organización (si la hubiere):</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM organizacion");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
												  }
												}
													?>
													
												</select>
												
												
												
											
										
											<select class="form-control" name="organizacion3" id="organizacion3"  style="width:400px;">
											<option value="">&nbsp;&nbsp;&nbsp;Seleccione otra organización (si la hubiere):</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM organizacion");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
												  }
												}
													?>
													
												</select>
												</div>
														</div>
											</div>
									     
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
											
											
												<div >
											<label class="control-label" style="color: white;">RRHH desiganado por la organización:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											
											
										
											<select class="form-control" name="responsable_org1" id="responsable_org1" required  style="width:400px">
											<option value="">Seleccione el RRHH que figura en la resolución:</option> 
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM persona");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
												  }
												}
													?>
													
												</select>
												
												
												
											
										
											<select class="form-control" name="responsable_org2" id="responsable_org2"  style="width:400px">
											<option value="">&nbsp;&nbsp;&nbsp;Seleccione otro RRHH (si lo hubiere):</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM persona");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
												  }
												}
													?>
													
												</select>
												
													<select class="form-control" name="responsable_org2" id="responsable_org2"  style="width:400px">
											<option value="">&nbsp;&nbsp;&nbsp;Seleccione otro RRHH (si lo hubiere):</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM persona");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
												  }
												}
													?>
													
												</select>
												
												
												
											
										
											<select class="form-control" name="responsable_org3" id="responsable_org3"  style="width:400px">
											<option value="">&nbsp;&nbsp;&nbsp;Seleccione otro RRHH (si lo hubiere)</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM persona");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
												  }
												}
													?>
													
												</select>
												</div>
														</div>
											</div>
											
											
											<br/>
					
										<div class="control-group">
										   <label class="control-label" style="color: white;">Resumen</label>
										   <div class="controls" style="margin-right: 200px;"> <!-- Agregar el margen a la derecha aquí -->
											  <input name="resumen" id="resumen" class="form-control span8 tip"  
											  type="text" placeholder="Resumen" required />
										   </div>
										</div>

										<div class="control-group">
											<label class="control-label" align="left" style="color: white;">Objetivo</label>
											<div class="controls">
												<input name="objetivo" id="objetivo" class=" form-control span8 tip"   type="text" placeholder="objetivo" />
											</div>
										</div>
											<div class="control-group">
											<label class="control-label" align="left" style="color: white;">Unidad Ejecutora:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											<label style="width:500px" for="UnidadEjectura" class="sr-only">Tipo de Unidad:</label>
											<select class="form-control" id="unidad1" name="unidad1">
											<!-- <option value="">Seleccione:</option> -->
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM unidadejecutora");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Unidad'].'</option>';
													
												  }
												}
													?>
												</select>
												
												<label style="width:500px" for="UnidadEjectura" class="sr-only">Tipo de Unidad:</label>
											<select class="form-control" id="unidad2" name="unidad2">
											<option value="">Seleccione:</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM unidadejecutora");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Unidad'].'</option>';
													
												  }
												}
													?>
												</select>
												
												<select class="form-control" id="unidad3" name="unidad3">
											<option value="">Seleccione:</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM unidadejecutora");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Unidad'].'</option>';
													
												  }
												}
													?>
												</select>
												</div>
														</div>
											</div>
											
																								<div class="control-group">
											<label class="control-label" align="left" style="color: white;" >Responsable designado por la Unidad:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											
											<label for="organizacion" id="responsable_unidad1" class="sr-only">Persona:</label>
										
											<select class="form-control" name="responsable_unidad1">
											<option value="">Seleccione:</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM persona");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
												  }
												}
													?>
													
												</select>
												
												
												
											<label for="organizacion" id="responsable_unidad2" class="sr-only" style="color: white;">Responsable de Org. :</label>
										
											<select class="form-control" name="responsable_unidad2">
											<option value="">Seleccione:</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM persona");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
												  }
												}
													?>
													
												</select>
												
												
												
											<label for="organizacion" id="responsable_unidad3" class="sr-only" style="color: white;">Responsable de Org. :</label>
										
											<select class="form-control" name="responsable_unidad3">
											<option value="">Seleccione:</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM persona");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
												  }
												}
													?>
													
												</select>
												</div>
														</div>
											</div>
											
											
																
												
											
											

												<br/>
										<div class="control-group">
											<label class="control-label"  align="left"style="color: white;" >Fecha de Inicio de la Actividad</label>
											<div class="controls">
												<input name="fecha_inicio" id="fecha_inicio"  class="form-control span8 tip" type="date" placeholder="Ingrese SOLO el año"  required />
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label"  align="left" style="color: white;">Fecha de Fin de la Actividad</label>
											<div class="controls">
												<input name="fecha_fin" id="fecha_fin" class="form-control span8 tip" type="date" placeholder="Ingrese SOLO el año"  required />
											</div>
										</div>
										
										

										
										 <div class="control-group">
											<label class="control-label" align="left" style="color: white;">Plazo de renovación (en meses)</label>
											<div class="controls">
												<input   type="text" name="plazo_renovacion" id="plazo_renovacion" 
												placeholder="ingrese SOLO el número, referencia a meses" class="form-control span8 tip" >
											</div>
										</div>
										
										 <div class="control-group">
												<label class="control-label" id="renovacion_automatica" align="left" style="color: white;">Se renueva automáticamente al vencer?:</label>
												<div class="controls">
											<select class="form-control" name="renovacion_automatica" >
											<option value="0">NO</option>
											<option value="1">SÍ</option>
											</select>
												</div>
												</div>
												
										
										<div class="control-group">
											<label class="control-label" align="left" style="color: white;">Tipo de Moneda Inversión Organización:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											<label for="MonedaInversion" id="moneda_organizacion" class="sr-only">Tipo de Moneda:</label>
											<select class="form-control" name="moneda_organizacion">
											<!-- <option value="">Seleccione:</option> -->
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM monedadeinversion");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
													
												  }
												}
													?>
												</select>
												</div>
														</div>
											</div>
									  
									  <div class="control-group">
											<label class="control-label" align="left" style="color: white;">Monto de la inversión aportada por la Organización</label>
											<div class="controls">
												<input   type="text" name="monto_inversion_organizacion" id="monto_inversion_organizacion" 
												placeholder="ingrese SOLO el número" class="form-control span8 tip">
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" style="color: white;">Nota Aclaratoria Inversión de la Organización</label>
											<div class="controls">
												<input name="nota_inversion_organizacion" id="nota_inversion_organizacion" class=" form-control span8 tip"   type="text" placeholder="objetivo" />
											</div>
										</div>
										
									
											<br>
											
									
										<div class="control-group">
											<label class="control-label" align="left" style="color: white;">Tipo de Moneda Inversión FCEFN:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											<label for="MonedaInversion" id="moneda_unidad" class="sr-only">Tipo de Moneda:</label>
											<select class="form-control" name="moneda_unidad" 
											style="width:150px;border:1px solid #04467E;background-color:#DDFFFF;color:#2D4167;font-size:12px" text="center"  onchange="this.style.width=200">
											<!-- <option value="">Seleccione:</option> -->
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM monedadeinversion");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Nombre'].'</option>';
													
												  }
												}
													?>
												</select>
												</div>
														</div>
											</div>
									  
									  <div class="control-group">
											<label class="control-label" align="left" style="color: white;" >Monto de la inversión aportada por la FCEFN</label>
											<div class="controls">
												<input   type="text" name="monto_inversion_unidad" id="monto_inversion_unidad" 
												placeholder="ingrese SOLO el número" class="form-control span8 tip">
											</div>
										</div>
										
											<div class="control-group">
											<label class="control-label" align="left" style="color: white;">Nota Aclaratoria Inversión de la FCEFN</label>
											<div class="controls">
												<input name="nota_inversion_unidad" id="nota_inversion_unidad" class=" form-control span8 tip"   type="text" placeholder="Nota aclaratoria" />
											</div>
										</div>
										
										
									
											<br>
										

										
      										<div class="control-group">
											<div class="controls">
												<input type="button" style="width: 100px; height: 50px; font-size: 16px;" style="text-align: center;" name="input" id="input" value="Registrar" onclick="valida_envia()" class="btn btn-sm btn-primary"/>
											<!--/.content	<button type="submit" name="input"  id="input" class="btn btn-sm btn-primary">Registrar</button> -->
                                               <a href="index.php" style="width: 100px; height: 50px; font-size: 16px;"  style="text-align: center;" class="btn btn-sm btn-danger" >Cancelar</a>
											</div>
										</div>
                                    
									</form>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        
        <!--/.wrapper--><br />
        <div class="footer span-12">
            <div class="container">
              <center> <b class="copyright"  style="color: black;"> DAFEXA - IdeI &copy; <?php echo date("Y")?> </b></center>
            </div>
        </div>

        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		
		

    </body> </html>