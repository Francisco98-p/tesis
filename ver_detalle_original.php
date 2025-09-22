<?php include "conn.php"; ?>
<!DOCTYPE html>
<!-- Para llenar un Selct con Mysql
https://www.baulphp.com/llenar-select-html-con-mysql-php-ejemplos/
 -->
<html lang="en">
<head>
    <head>
      <?php include("head_alta_persona.php");?>
	  <style type="text/css">
	/* deshabilito la posibilidad de select */
	/* https://www.tldevtech.com/disable-selection-when-set-html-select-tag-as-readonly/ */
		select[readonly]
    {
       pointer-events: none;
        }


    /* Colores de fondo en el formulario*/
	
	
	
    .div-1 {
        background-color: #EBEBEB;
    }
    
    .div-2 {
    	background-color: #ABBAEA;
    }
    
    .div-3 {
    	background-color: #FBD603;
    }
   /* Defino alto y ancho de la caja TextArea */
   /* https://desarrolloweb.com/articulos/css-campos-textarea-formulario.html */
   
     .estilotextarea
         {width:900px;height:80px;border: 1px dotted #000099;} 

    </style>
	
    </head>
	
<script type="text/javascript">
   
function valida_envia(){
   	//valido el nombre https://desarrolloweb.com/articulos/1767.php
   	//valido el tipo de actividad
	
   	if (document.getElementById("actividad").value == 0){
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
    <body>
       <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                
                   
                </div>
            </div>
            
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
           $id = intval($_GET['id']);
		   //var_dump($id);
			$sql = mysqli_query($conn, "SELECT * FROM actividad WHERE Id='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
				$Fecha_inicio=$row['Fecha_inicio'];
				//var_dump($Fecha_inicio);
				//var_dump($row);
				//exit;
			
			}
			?>
          
            <blockquote>
			
            Ver detalles de la Actividad
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >
											
										<div class="control-group">
											<label class="control-label" for="basicinput">Registro</label>
											<div class="controls">
												<input type="text" name="id" id="id" value="<?php echo $row['Id']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>
										
										
											    <div class="control-group">
												<label class="control-label" >Tipo de Actividad:</label>
												<div class="controls">
												<input type="text" name="id" id="id"  placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly"
		
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM tipoactividad ORDER BY Nombre");
											// var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													if ($valores['Id']==$row['TipoActividad_Id']) { ?> 
													value="<?php echo $valores['Nombre']; ?>" 
													 												 
													 <?php }
												    else {  
														}
													
													  }
												}
													
												?>
													
													
												</div>
												</div>
												
										
										
										 <div class="div-3">
											<label class="control-label" >Número Convenio Marco</label>
											<div class="controls">
												<input   type="text" readonly name="nro_convenio_marco" value="<?php echo $row['NroConvenioMarco']; ?>" id="nro_convenio_marco" 
												placeholder="" class="form-control span8 tip">
											</div>
										</div>
										
										 <div class="div-3">
											<label class="control-label" >Número de Expediente</label>
											<div class="controls">
												<input   type="text" readonly name="nro_expediente" value="<?php echo $row['NroExpediente']; ?>" id="nro_expediente" 
												placeholder="" class="form-control span8 tip">
											</div>
										</div>
										
										
										<div class="div-3">
											<label class="control-label" >Resolución FCEFN</label>
											<div class="controls">
												<input type="text" readonly name="nro_resolucion" onchange='add();' id="nro_resolucion" value="<?php echo $row['NroResolucion']; ?>"
												placeholder="" class="form-control span8 tip" required>
											</div>
										
										<br/>
										</div>
										
																
									
										
									  <div id="tipo_organizacion" class="div-1">
									  	<div class="control-group">
											<label class="control-label" >Organización:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											
											<label for="organizacion" class="sr-only">Tipo de Organización:</label>
										
											<input type="text" class="form-control" 
											name="organizacion1" id="organizacion1" 
											required  readonly tabindex="-1" style="width:400px;background-color:#DDFFFF"" 
											
										<?php
										
		//leo datos de la tabla detalleactividadorganizacion para extraer la PRIMER organizacion
									
								        	include "conn.php";
											$query_org='SELECT Organizacion_Id,Nombre FROM detalleactividadorganizacion 
											JOIN organizacion on (Organizacion_Id=Organizacion.Id) WHERE Actividad_Id='.$row[Id].' limit 0,1';
																				 $query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
													$organizacion1_leida="antes del while dio 0 la busqeuda=".mysqli_num_rows($query);
													
												} else
													$organizacion1_leida="antes del while";
												   while ($valores = mysqli_fetch_array($query)) {
													$organizacion1_leida= $valores['Organizacion_Id'];
													echo $organizacion1_leida;
												   }
																				
											$query = mysqli_query($conn,"SELECT  * FROM organizacion ORDER BY Nombre");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$organizacion1_leida) { 
									   ?> 
													
													 value="<?php echo $valores['Nombre'];?>" >
													
													 <?php }
												     else { 
													?>
														
														}
													
													  }
												}											
												   ?>
													
																									
										
											<input type="hidden" name="organizacion1_leida" id="organizacion1_leida" value="<?php echo $organizacion1_leida; ?>" >
											
										
										
									 		
										
											<select class="form-control"  name="organizacion2" id="organizacion2" style="width:400px;background-color:#DDFFFF" readonly tabindex="-1">
											<option value="0">&nbsp;&nbsp;&nbsp;Seleccione la 2da. organización (si la hubiere):</option>
										<?php
	                  //leo datos de la tabla detalleactividadorganizacion para extraer la SEGUNDA organizacion
									
								        	include "conn.php";
											$query_org='SELECT Organizacion_Id,Nombre FROM detalleactividadorganizacion 
											JOIN organizacion on (Organizacion_Id=Organizacion.Id) WHERE Actividad_Id='.$row[Id].' limit 1,1';
																				 $query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
													$organizacion2_leida="0";
													
												} else
													$organizacion2_leida="antes del while";
												   while ($valores = mysqli_fetch_array($query)) {
													$organizacion2_leida= $valores['Organizacion_Id'];
													echo $organizacion2_leida;
												   }
												 
												
											
										
											$query = mysqli_query($conn,"SELECT  * FROM organizacion ORDER BY Nombre");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}
												else{
												   while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$organizacion2_leida) { 
									   ?> 
													
													 <option value="<?php echo $valores['Id'];?>" selected>
													 <?php echo $valores['Nombre']; ?></option>
													 
													 <?php }
												     else { 
													?>
														<option value="<?php echo $valores['Id'];?>"><?php echo $valores['Nombre']?> </option>
														<?php 
														}
													
													  }
												}													
													?>
													
												</select>
												
											<input type="hidden" name="organizacion2_leida" id="organizacion2_leida" value="<?php echo $organizacion2_leida; ?>">
										
									 		
											<select class="form-control" readonly tabindex="-1" name="organizacion3" id="organizacion3" style="width:400px;background-color:#DDFFFF"">
											<option value="0">&nbsp;&nbsp;&nbsp;Seleccione la 3er. organización (si la hubiere):</option>
										<?php
	             //leo datos de la tabla detalleactividadorganizacion para extraer la TERCERA organizacion
									
								        	include "conn.php";
											$query_org='SELECT Organizacion_Id,Nombre FROM detalleactividadorganizacion 
											JOIN organizacion on (Organizacion_Id=Organizacion.Id) WHERE Actividad_Id='.$row[Id].' limit 2,1';
																				 $query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
													$organizacion3_leida="0";
													
												} else
													$organizacion3_leida="antes del while";
												   while ($valores = mysqli_fetch_array($query)) {
													$organizacion3_leida= $valores['Organizacion_Id'];
													echo $organizacion3_leida;
												   }
												 
												
											
										
											$query = mysqli_query($conn,"SELECT  * FROM organizacion ORDER BY Nombre");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$organizacion3_leida) { 
										?>  
													
													 <option value="<?php echo $valores['Id'];?>" selected>
													 <?php echo $valores['Nombre']; ?></option>
													 
													 <?php }
												     else { 
													?>
														<option value="<?php echo $valores['Id'];?>"><?php echo $valores['Nombre']?> </option>
														<?php 
														}
													
													  }
												}													
													?>
													
												</select>
												<input type="hidden" name="organizacion3_leida" id="organizacion3_leida" value="<?php echo $organizacion3_leida; ?>" >
											
												</div>
												</div>
												</div>
     <!--   <hr/> -->
		
    <!-- Grupo de Select para RRHH1 de la Organización -->	
                                      		
									  <div id="tipo_organizacion" class="">
									  	<div class="control-group">
											<label class="control-label" >RRHH desiganado por la organización:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											
																				
											<select class="form-control" name="responsable_org1" readonly tabindex="-1" id="responsable_org1" required style="width:400px;background-color:#DDFFFF"">
											
										<?php
		                                    //leo datos de la tabla detalleactividadpersona para extraer la PRIMER organizacion
									
								        	include "conn.php";
											$query_org='SELECT Persona_Id,Nombre FROM detallepersonaactividad
											JOIN persona on (Persona_Id=persona.Id) WHERE Actividad_Id='.$row[Id].' AND Org_o_Uni = 1 limit 0,1' ;
																				 $query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
													$responsable_org1_leida="0";
													
												} else
													$responsable_org1_leida="0";
												   while ($valores = mysqli_fetch_array($query)) {
													$responsable_org1_leida= $valores['Persona_Id'];
													echo $responsable_org1_leida;
												   }
												 
																					
										
											$query = mysqli_query($conn,"SELECT  * FROM persona ORDER BY Nombre");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$responsable_org1_leida) { 
									   ?>
													
													 <option value="<?php echo $valores['Id'];?>" selected>
													 <?php echo $valores['Nombre']; ?></option>
													 
													 <?php }
												     else { 
													?> 
														<option value="<?php echo $valores['Id'];?>"><?php echo $valores['Nombre']?> </option>
														<?php 
														}
													
													  }
												}											
												   ?>
													
												</select>
											    <input type="hidden" name="responsable_org1_leida" id="responsable_org1_leida" value="<?php echo $responsable_org1_leida; ?>" >

		
    <!-- Grupo de Select para RRHH2 de la Organización -->	
                                      									
									 
																				
											<select class="form-control" name="responsable_org2" readonly tabindex="-1" id="responsable_org2" style="width:400px;background-color:#DDFFFF"">
											<option value="">Seleccione el RRHH que figura en la resolución:</option>
										<?php
		                                    //leo datos de la tabla detalleactividadpersona para extraer la segunda organizacion
									
								        	include "conn.php";
											$query_org='SELECT Persona_Id,Nombre FROM detallepersonaactividad
											JOIN persona on (Persona_Id=persona.Id) WHERE Actividad_Id='.$row[Id].' AND Org_o_Uni = 1 limit 1,1' ;
																				 $query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
													$responsable_org2_leida="0";
													
												} else
													$responsable_org2_leida="antes del while";
												   while ($valores = mysqli_fetch_array($query)) {
													$responsable_org2_leida= $valores['Persona_Id'];
													echo $responsable_org2_leida;
												   }
												 
																					
										
											$query = mysqli_query($conn,"SELECT  * FROM persona ORDER BY Nombre");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$responsable_org2_leida) { 
									   ?>
													
													 <option value="<?php echo $valores['Id'];?>" selected>
													 <?php echo $valores['Nombre']; ?></option>
													 
													 <?php }
												     else { 
													?> 
														<option value="<?php echo $valores['Id'];?>"><?php echo $valores['Nombre']?> </option>
														<?php 
														}
													
													  }
												}											
												   ?>
													
												</select>
												
												<input type="hidden" name="responsable_org2_leida" id="responsable_org2_leida" value="<?php echo $responsable_org2_leida; ?>" >

	<!-- Grupo de Select para RRHH3 de la Organización -->	
                                        
									 																				
											<select class="form-control" name="responsable_org3" readonly tabindex="-1"  id="responsable_org3" style="width:400px;background-color:#DDFFFF"">
											<option value="">Seleccione el RRHH que figura en la resolución:</option>
										<?php
		                                    //leo datos de la tabla detalleactividadpersona para extraer la tercer organizacion
									
								        	include "conn.php";
											$query_org='SELECT Persona_Id,Nombre FROM detallepersonaactividad
											JOIN persona on (Persona_Id=persona.Id) WHERE Actividad_Id='.$row[Id].' AND Org_o_Uni = 1 limit 2,1' ;
																				 $query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
													$responsable_org3_leida="0";
													
												} else
													$responsable_org3_leida="antes del while";
												   while ($valores = mysqli_fetch_array($query)) {
													$responsable_org3_leida= $valores['Persona_Id'];
													echo $responsable_org3_leida;
												   }
												 
																					
										
											$query = mysqli_query($conn,"SELECT  * FROM persona ORDER BY Nombre");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$responsable_org3_leida) { 
									   ?>
													
													 <option value="<?php echo $valores['Id'];?>" selected>
													 <?php echo $valores['Nombre']; ?></option>
													 
													 <?php }
												     else { 
													?> 
														<option value="<?php echo $valores['Id'];?>"><?php echo $valores['Nombre'];?> </option>
														<?php 
														}
													
													  }
												}											
												   ?>
													
												</select>
												
											 <input type="hidden" name="responsable_org3_leida" id="responsable_org3_leida" value="<?php echo $responsable_org3_leida; ?>" >

											</div>
												</div>
												</div>
       <hr/>
</div>
										<div class="div-3">
											<label class="control-label" >Resumen </label>
										</div>										
										<div >
												<textarea class="estilotextarea" name="resumen" id="resumen" readonly ><?php echo $row['Resumen']; ?></textarea>
											</div>
										
										<div>
											<label class="control-label" >Objetivo</label>
											<div>
												<textarea readonly class="estilotextarea" name="objetivo" id="objetivo">
												<?php echo $row['Objetivo']; ?>
												</textarea>
											</div>
										</div>	   
			
			
<!-- Grupo de Select para Unidad(es) ejecutora -->						
					
									
										<br/>
										
									  <div id="tipo_organizacion" class="">
									  	<div class="control-group">
											<label class="control-label" >Unidad Ejecutora:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											
											
										
											<select class="form-control" name="unidad1" readonly tabindex="-1" id="unidad1" required style="width:400px;background-color:#DDFFFF"">
											<option value="">Seleccione la unidad ejecutora que figura en la resolución:</option>
										<?php
		//leo datos de la tabla detalleactividadunidad para extraer la PRIMER unidad
									
								        	include "conn.php";
											$query_org='SELECT UnidadEjecutora_Id,Unidad FROM detalleactividadunidad 
											JOIN unidadejecutora on (UnidadEjecutora_Id=unidadejecutora.Id) WHERE Actividad_Id='.$row[Id].' limit 0,1';
																				 $query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
													$unidad1_leida="0";
													
												} else
													$unidad1_leida="antes del while";
												   while ($valores = mysqli_fetch_array($query)) {
													$unidad1_leida= $valores['UnidadEjecutora_Id'];
													echo $unidad1_leida;
												   }
												 
												
											
										
											$query = mysqli_query($conn,"SELECT  * FROM unidadejecutora ORDER BY Unidad");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$unidad1_leida) { 
									   ?> 
													
													 <option value="<?php echo $valores['Id'];?>" selected>
													 <?php echo $valores['Unidad']; ?></option>
													 
													 <?php }
												     else { 
													?>
														<option value="<?php echo $valores['Id'];?>"><?php echo $valores['Unidad']?> </option>
														<?php 
														}
													
													  }
												}											
												   ?>
													
												</select>
												
												   <input type="hidden" name="unidad1_leida" id="unidad1_leida" value="<?php echo $unidad1_leida; ?>" >

			<!-- Grupo de Select para 2da. Unidad(es) ejecutora -->						
					
																										
									  
																				
											<select class="form-control" name="unidad2" id="unidad2" readonly tabindex="-1" required style="width:400px;background-color:#DDFFFF"">
											<option value="0">Seleccione la 2da. unidad ejecutora (si la hubiere) que figura en la resolución:</option>
										<?php
		//leo datos de la tabla detalleactividadunidad para extraer la SEGUNDA unidad
									
								        	include "conn.php";
											$query_org='SELECT UnidadEjecutora_Id,Unidad FROM detalleactividadunidad 
											JOIN unidadejecutora on (UnidadEjecutora_Id=unidadejecutora.Id) WHERE Actividad_Id='.$row[Id].' limit 1,1';
																				 $query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
													$unidad2_leida="0";
													
												} else
													$unidad2_leida="antes del while";
												   while ($valores = mysqli_fetch_array($query)) {
													$unidad2_leida= $valores['UnidadEjecutora_Id'];
													echo $unidad2_leida;
												   }
												 
												
											
										
											$query = mysqli_query($conn,"SELECT  * FROM unidadejecutora ORDER BY Unidad");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$unidad2_leida) { 
									   ?> 
													
													 <option value="<?php echo $valores['Id'];?>" selected>
													 <?php echo $valores['Unidad']; ?></option>
													 
													 <?php }
												     else { 
													?>
														<option value="<?php echo $valores['Id'];?>"><?php echo $valores['Unidad']?> </option>
														<?php 
														}
													
													  }
												}											
												   ?>
													
												</select>
												
												 <input type="hidden" name="unidad2_leida" id="unidad2_leida" value="<?php echo $unidad2_leida; ?>" >

			<!-- Grupo de Select para 3er. Unidad(es) ejecutora -->						
					
																										
									  
											
										
											<select class="form-control" name="unidad3" id="unidad3" readonly tabindex="-1" style="width:400px;background-color:#DDFFFF"">
											<option value="">Seleccione la unidad ejecutora que figura en la resolución:</option>
										<?php
		//leo datos de la tabla detalleactividadunidad para extraer la TERCER unidad
									
								        	include "conn.php";
											$query_org='SELECT UnidadEjecutora_Id,Unidad FROM detalleactividadunidad 
											JOIN unidadejecutora on (UnidadEjecutora_Id=unidadejecutora.Id) WHERE Actividad_Id='.$row[Id].' limit 2,1';
																				 $query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
													$unidad3_leida="0";
													
												} else
													$unidad3_leida="antes del while";
												   while ($valores = mysqli_fetch_array($query)) {
													$unidad3_leida= $valores['UnidadEjecutora_Id'];
													echo $unidad3_leida;
												   }
												 
												
											
										
											$query = mysqli_query($conn,"SELECT  * FROM unidadejecutora ORDER BY Unidad");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$unidad3_leida) { 
									   ?> 
													
													 <option value="<?php echo $valores['Id'];?>" selected>
													 <?php echo $valores['Unidad']; ?></option>
													 
													 <?php }
												     else { 
													?>
														<option value="<?php echo $valores['Id'];?>"><?php echo $valores['Unidad']?> </option>
														<?php 
														}
													
													  }
												}											
												   ?>
													
												</select>
												   <input type="hidden" name="unidad3_leida" id="unidad3_leida" value="<?php echo $unidad3_leida; ?>" >

												</div>
												</div>
												</div>
     <!--   <hr/> -->
		
    <!-- Grupo de Select para RRHH1 de la Unidad -->	
                                        <label for="organizacion" id="responsable_unidad1" class="sr-only">=====Tipo de Organización:</label>
											
									  <div id="tipo_organizacion" class="">
									  	<div class="div-2">
											<label class="control-label" >RRHH desiganado por la Unidad Ejecutora:</label>
											<div class="controls">
										    <div class="div-2">
											
																				
											<select class="form-control" name="responsable_unidad1" readonly tabindex="-1" id="responsable_unidad1" required style="width:400px;background-color:#DDFFFF"">
											<option value="">Seleccione el RRHH que figura en la resolución:</option>
										<?php
		                                    //leo datos de la tabla detalleactividadpersona para extraer la PRIMER organizacion
									
								        	include "conn.php";
											$query_org='SELECT Persona_Id,Nombre FROM detallepersonaactividad
											JOIN persona on (Persona_Id=persona.Id) WHERE Actividad_Id='.$row[Id].' AND Org_o_Uni = 2 limit 0,1' ;
																				 $query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
													$responsable_unidad1_leida="0";
													
												} else
													$responsable_unidad1_leida="antes del while";
												   while ($valores = mysqli_fetch_array($query)) {
													$responsable_unidad1_leida= $valores['Persona_Id'];
													echo $responsable_unidad1_leida;
												   }
												 
																					
										
											$query = mysqli_query($conn,"SELECT  * FROM persona ORDER BY Nombre");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$responsable_unidad1_leida) { 
									   ?>
													
													 <option value="<?php echo $valores['Id'];?>" selected>
													 <?php echo $valores['Nombre']; ?></option>
													 
													 <?php }
												     else { 
													?> 
														<option value="<?php echo $valores['Id'];?>"><?php echo $valores['Nombre'];?> </option>
														<?php 
														}
													
													  }
												}											
												   ?>
													
												</select>
		 <input type="hidden" name="responsable_unidad1_leida" id="responsable_unidad1_leida" value="<?php echo $responsable_unidad1_leida; ?>" >

		
    <!-- Grupo de Select para RRHH2 de la Organización -->	
                                        <label for="organizacion" id="responsable_unidad2" class="sr-only">=====Tipo de Organización:</label>
											
									 
																				
											<select class="form-control" name="responsable_unidad2" readonly tabindex="-1" id="responsable_unidad2" style="width:400px;background-color:#DDFFFF"">
											<option value="">Seleccione el RRHH que figura en la resolución:</option>
										<?php
		                                    //leo datos de la tabla detalleactividadpersona para extraer la PRIMER organizacion
									
								        	include "conn.php";
											$query_org='SELECT Persona_Id,Nombre FROM detallepersonaactividad
											JOIN persona on (Persona_Id=persona.Id) WHERE Actividad_Id='.$row[Id].' AND Org_o_Uni = 2 limit 1,1' ;
																				 $query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
													$responsable_unidad2_leida="0";
													
												} else
													$responsable_unidad2_leida="antes del while";
												   while ($valores = mysqli_fetch_array($query)) {
													$responsable_unidad2_leida= $valores['Persona_Id'];
													echo $responsable_unidad2_leida;
												   }
												 
																					
										
											$query = mysqli_query($conn,"SELECT  * FROM persona ORDER BY Nombre");
											
												if(mysqli_num_rows($query) == 0)
												{
													
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$responsable_unidad2_leida) { 
									   ?>
													
													 <option value="<?php echo $valores['Id'];?>" selected>
													 <?php echo $valores['Nombre']; ?></option>
													 
													 <?php }
												     else { 
													?> 
														<option value="<?php echo $valores['Id'];?>"><?php echo $valores['Nombre'];?> </option>
														<?php 
														}
													
													  }
												}											
												   ?>
													
												</select>
												 <input type="hidden" name="responsable_unidad2_leida" id="responsable_unidad2_leida" value="<?php echo $responsable_unidad2_leida; ?>" >

	<!-- Grupo de Select para RRHH3 de la Organización -->	
                                        <label for="organizacion" id="responsable_unidad3" class="sr-only">=====Tipo de Organización:</label>
											
									 
																	
											<select class="form-control" name="responsable_unidad3" readonly tabindex="-1" id="responsable_unidad3" style="width:400px;background-color:#DDFFFF"">
											<option value="">Seleccione el RRHH que figura en la resolución:</option>
											
										<?php
		                                    //leo datos de la tabla detalleactividadpersona para extraer la PRIMER organizacion
									
								        	include "conn.php";
											$query_org='SELECT Persona_Id,Nombre FROM detallepersonaactividad
											JOIN persona on (Persona_Id=persona.Id) WHERE Actividad_Id='.$row[Id].' AND Org_o_Uni = 2 limit 2,1' ;
																				 $query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
													$responsable_unidad3_leida="0";
													
												} else
													$responsable_unidad3_leida="antes del while";
												   while ($valores = mysqli_fetch_array($query)) {
													$responsable_unidad3_leida= $valores['Persona_Id'];
													echo $responsable_unidad3_leida;
												   }
												 
																					
										
											$query = mysqli_query($conn,"SELECT  * FROM persona ORDER BY Nombre");
											
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$responsable_unidad3_leida) { 
													
									   ?>
													
													 <option value="<?php echo $valores['Id'];?>" selected>
													 <?php echo $valores['Nombre']; ?></option>
													 
													 <?php }
												     else { 
													?> 
														<option value="<?php echo $valores['Id'];?>"><?php echo $valores['Nombre'];?> </option>
														<?php 
														}
													
													  }
												}											
												   ?>
													
												</select>
												 <input type="hidden" name="responsable_unidad3_leida" id="responsable_unidad3_leida" value="<?php echo $responsable_unidad3_leida; ?>" >

											</div>
												</div>
												</div>
       <hr/>
</div

						</div>

										<div class="control-group">
											<label class="control-label" >Fecha de Inicio de la Actividad</label>
											<div class="controls" style="width:200px;">
												<input name="fecha_inicio" readonly id="fecha_inicio"  class="form-control span8 tip" 
												value="<?php 
			
												echo $row['Fecha_inicio']; ?>"
												type="date" placeholder="Ingrese SOLO el año"  required />
											</div>
												</br>						
										
											<label class="control-label" >Fecha de Fin de la Actividad</label>
											<div class="controls" style="width:200px;">
												<input name="fecha_fin"  readonly id="fecha_fin" class="form-control span8 tip" 
												value="<?php echo $row['Fecha_final']; ?>"
												type="date" placeholder="Ingrese SOLO el año"  required />
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Plazo de Renovación (meses)</label>
											<div class="controls">
												<input type="text" readonly name="plazo_renovacion"  style="width:50px;background-color:#DDFFFF" id="plazo_renovacion" 
												value="<?php echo $row['PlazoRenovacion']; ?>" 
												placeholder="Tidak perlu di isi" class="form-control span8 tip">
											</div>
											<label class="control-label" for="basicinput">Renovación automática</label>
											
												<input type="text" readonly name="plazo_renovacion"  style="width:50px;background-color:#DDFFFF" id="plazo_renovacion" 
												value="<?php if ($row['RenovacionAutomatica']=='1'){echo "Sí";} else {echo "No";}; ?>" 
												placeholder="Tidak perlu di isi" class="form-control span8 tip">
											
											</div>
										</div>
											
										<div class="control-group">
											<label class="control-label" >Tipo de Moneda Inversión Organización:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											<label for="MonedaInversion" id="moneda_organizacion" class="sr-only">Tipo de Moneda:</label>
																			
											<select class="form-control" name="moneda_organizacion" readonly tabindex="-1" id="moneda_organizacion" style="width:400px;background-color:#DDFFFF"">
											<?php
		                                    $query_org='SELECT * FROM monedadeinversion' ;
											$query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
																									
												} else
													{
												     while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$row['MonedaOrganizacion_Id']) { 
									     ?>													
													 <option value="<?php echo $valores['Id']; ?>" selected>
													 <?php echo $valores['Nombre']; ?></option>
													 
													 <?php }
												     else { 
													?> 
														<option value="<?php echo $valores['Id'];?>"><?php echo $valores['Nombre'];?> </option>
														<?php 
														}
													
													  }
												}											
												   ?>
													
												</select>
											
											
												</div>
														</div>
											</div>
										
                                         <div class="control-group">
											<label class="control-label" >Monto de la inversión aportada por la Organización</label>
											<div class="controls">
												<input type="text" readonly name="monto_inversion_organizacion" id="monto_inversion_organizacion" 
												placeholder="ingrese SOLO el número" 
												value="<?php echo $row['InversionOrganizacion'];?>"
												class="form-control span8 tip">
											</div>
										 </div>
										
										<div class="control-group">
											<label class="control-label" >Nota Aclaratoria Inversión de la Organización</label>
											<div class="controls">
												<input name="nota_inversion_organizacion" readonly id="nota_inversion_organizacion" 
												value="<?php echo $row['NotaInversionOrganizacion'];?>"
												class=" form-control span8 tip"   type="text" placeholder="Nota aclaratoria sobre inversión de la Organización" />
											</div>
										</div>


																									
										<div class="control-group">
											<label class="control-label" >Tipo de Moneda Inversión FCEFN:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											<label for="MonedaUnidad" id="moneda_unidad" class="sr-only">Tipo de Moneda:</label>
																			
											<select class="form-control" name="moneda_unidad" readonly tabindex="-1"  id="moneda_unidad" style="width:400px;background-color:#DDFFFF"">
											<?php
		                                    $query_org='SELECT * FROM monedadeinversion' ;
											$query = mysqli_query($conn,$query_org);
											 if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
																									
												} else
													{
												     while ($valores = mysqli_fetch_array($query)) {
													 if ($valores['Id']==$row['MonedaUnidad_Id']) { 
									     ?>													
													 <option value="<?php echo $valores['Id']; ?>" selected>
													 <?php echo $valores['Nombre']; ?></option>
													 
													 <?php }
												     else { 
													?> 
														<option value="<?php echo $valores['Id'];?>"><?php echo $valores['Nombre'];?> </option>
														<?php 
														}
													
													  }
												}											
												   ?>
													
												</select>
											
											
												</div>
														</div>
											</div>
										
                                         <div class="control-group">
											<label class="control-label" >Monto de la inversión aportada por la FCEFN</label>
											<div class="controls">
												<input   type="text" readonly name="monto_inversion_unidad" id="monto_inversion_unidad" 
												placeholder="ingrese SOLO el número" 
												value="<?php echo $row['InversionUnidad'];?>"
												class="form-control span8 tip">
											</div>
										 </div>
										
										<div class="control-group">
											<label class="control-label" >Nota Aclaratoria Inversión de la FCEFN</label>
											<div class="controls">
												<input name="nota_inversion_unidad"  readonly id="nota_inversion_unidad" 
												value="<?php echo $row['NotaInversionUnidad'];?>"
												class=" form-control span8 tip"   type="text" placeholder="Nota aclaratoria sobre inversión de la Organización" />
											</div>
										</div>


										<div class="control-group">
											<div class="controls">
												<a href="index.php" class="btn btn-sm btn-danger">Volver al listado</a>
											</div>
										</div>
									</form>
                        
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        
        <!--/.wrapper--><br />
        <div class="footer span-12">
            <div class="container">
              <center> <b class="copyright"><a href="#"> BCFEXA IdeI</a> &copy; <?php echo date("Y")?> </b></center>
            </div>
        </div>
        
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
	<!-- Maneja el div para carga de opcionales
		https://tutobasico.com/activar-boton-o-enlace-con-jquery/
		-->
		<script>
          $( "#mostrar_campos_adicionales" ).click( function() {
          $( "#campos_adicionales" ).toggle();
          });
        </script>


      
</body>
