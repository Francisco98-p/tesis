<?php 
include "conn.php";
//include 'session_dafexa.php';
/*$username = $_SESSION['username'];
$userID = $_SESSION['userID'];*/
 ?>
 
<!DOCTYPE html>

<html lang="en">
<head>
    <head>
	<style type="text/css">
	#tipo_organizacion {
	display:none;
    }
	#tipo_unidad {
	display:none;
    }
    </style>
	 <script>
         function valida_archivo() {
			 alert("OJO!, entroF");
	        valor = document.getElementById('archivo');
           if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
			   alert("OJO!, falta indicar cual es el PDF");
            return false;
		  }
      </script>
	
        <?php include("head.php");?>
    </head>
    <body>
<!--
       <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="http://obedalvarado.pw/" target="_blank">DAFEXA</a>
                   
                   
                </div>
            </div>
             

        </div><br />
-->
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
							
						if(isset($_POST['input'])){
				
				
				//averiguar porque da error de tinytext y varchar
				/*
				No puede asignar un valor DEFAULT a un TINYTEXT y no puede crear un índice sin prefijo en este último.

Internamente, se asignan objetos adicionales en la memoria para manejar columnas de TEXTO (incluido TINYTEXT) que pueden causar la fragmentación de la memoria en los conjuntos de registros grandes.

Tenga en cuenta que esto solo se refiere a la representación interna de la columna en los conjuntos de registros, no a cómo se almacenan en el disco.


Usando VARCHAR puede establecer la columna en NULL o NOT NULL y puede establecer el valor DEFAULT, pero no con TEXT. Use VARCHAR si necesita una o ambas características, NULL y DEFAULT.
				*/
				$NroConvenioMarco  = mysqli_real_escape_string($conn,(strip_tags($_POST['NroConvenioMarco'], ENT_QUOTES)));
				$NroResolucion	= mysqli_real_escape_string($conn,(strip_tags($_POST['NroResolucion'], ENT_QUOTES)));
				$organizacion 	= mysqli_real_escape_string($conn,(strip_tags($_POST['organizacion'], ENT_QUOTES)));
				$titulo=mysqli_real_escape_string($conn,(strip_tags($_POST['titulo'], ENT_QUOTES)));
				$fechai=mysqli_real_escape_string($conn,(strip_tags($_POST['fechai'], ENT_QUOTES)));
				$fechaf  = mysqli_real_escape_string($conn,(strip_tags($_POST['fechaf'], ENT_QUOTES)));
				$Objetivo=mysqli_real_escape_string($conn,(strip_tags($_POST['objetivo1'], ENT_QUOTES)));
				$PlazoRenovación=mysqli_real_escape_string($conn,(strip_tags($_POST['PlazoRenovación'], ENT_QUOTES)));
				$InversionActividad=mysqli_real_escape_string($conn,(strip_tags($_POST['InversionActividad'], ENT_QUOTES)));
				$moneda=mysqli_real_escape_string($conn,(strip_tags($_POST['moneda'], ENT_QUOTES)));
				$actividad=mysqli_real_escape_string($conn,(strip_tags($_POST['actividadd'], ENT_QUOTES)));
				$unidad=mysqli_real_escape_string($conn,(strip_tags($_POST['unidad'], ENT_QUOTES)));
		        $unidad1=mysqli_real_escape_string($conn,(strip_tags($_POST['unidad1'], ENT_QUOTES)));
				$organizacion1= mysqli_real_escape_string($conn,(strip_tags($_POST['organizacion1'], ENT_QUOTES)));

							/*
			else {
				
				
				if(){
		         $insert = mysqli_query($conn, "INSERT INTO detalleactividadunidad 
				(UnidadEjectura_Id,Actividad_NroResolucion
				)VALUES('$unidad','$NroResolucion')") 
			else {
								    $insert = mysqli_query($conn, "INSERT INTO actividad 
				(NroResolucion, NroConvenioMarco,Fecha_inicio,Fecha_final,PlazoRenovacion,Titulo,Objetivo,InversionActividad,MonedaInversion,,TipoActividad_ID) VALUES
				('$NroResolucion','$NroConvenioMarco','$fechai','$fechaf','$PlazoRenovación','$titulo','$Objetivo','$InversionActividad','$moneda','$actividad')")
			}*/
			
				 
				

				$insert = mysqli_query($conn, "INSERT INTO actividad 
				(NroResolucion, NroConvenioMarco,Fecha_inicio,Fecha_final,PlazoRenovacion,Titulo,Objetivo,InversionActividad,MonedaInversion,TipoActividad_ID) VALUES('$NroResolucion','$NroConvenioMarco','$fechai', 
				'$fechaf', '$PlazoRenovación','$titulo','$Objetivo','$InversionActividad','$moneda','$actividad')") 
				    
																	or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho Luis Olguin, los datos han sido agregados correctamente.</div>';
						    
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
						}
				
	
					$ultimo_i=  mysqli_query($conn,"SELECT MAX(Id) AS Id FROM actividad");
					$ultimo_id = mysqli_fetch_array($ultimo_i);
					$ultimo_id = (int)$ultimo_id;
							
				if($organizacion1>0){
				
							
		         mysqli_query($conn, "INSERT INTO organizacionactividad 
				(Organizacion_ID,Actividad_ID) VALUES('$organizacion','$ultimo_id')") ;
			
				
				 
				mysqli_query($conn, "INSERT INTO organizacionactividad 
				(Organizacion_ID,Actividad_ID) VALUES('$organizacion1','$ultimo_id')") ;
				
				
				    	
			}else{
				  	mysqli_query($conn, "INSERT INTO organizacionactividad 
				(Organizacion_ID,Actividad_ID) VALUES('$organizacion','$ultimo_id')");
				
				
				  
			}
			if($unidad1>0){
					
		       	mysqli_query($conn, "INSERT INTO detalleactividadunidad 
				(UnidadEjecutora_Id,Actividad_NroResolucion) VALUES('$unidad1','$ultimo_id')"); 
				
				
					
					
					
				mysqli_query($conn, "INSERT INTO detalleactividadunidad 
				(UnidadEjecutora_Id,Actividad_NroResolucion) VALUES('$unidad','$ultimo_id')")   ;	
				
										    header("Location: index.php");

				
			}else{
			  	mysqli_query($conn, "INSERT INTO detalleactividadunidad 
				(UnidadEjecutora_Id,Actividad_NroResolucion) VALUES('$unidad','$ultimo_id')");
				
						    header("Location: index.php");
						
				
				
			}
					
						}
			
			
			
		 
			?>
            
							<blockquote>
							<h3>Agregar Detalles de Convenio</h3>
							</blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid"  action="registro.php"  method="POST" >
									<!--	<div class="control-group">
											<label class="control-label" for="emisor">Emisor</label>
											<div class="controls">
		                								
                                                <input type="radio" class="form-check-input" name="emisor" value="Consejo Directivo" checked> Consejo Directivo
		                                       
										</div>
										</div>
										
                                      <div class="control-group">
											<label class="control-label" for="tipo_objeto">Normativa</label>
											<div class="controls">
																							
									<input type="radio" class="form-check-input" onchange='add();' id="tipo_objeto" name="tipo_objeto" value="Ordenanza" checked> Ordenanza
									<input type="radio" name="tipo_objeto" onchange='add();' value="Resolución"> Resolución<br>
          										
										</div>
										</div>-->
										
											    <div class="control-group">
												<label class="control-label" id="actividad" >Tipo de Actividad:</label>
												<div class="controls">
											<select class="form-control" name="actividadd" >
											<option value="">Seleccione:</option>
												<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM tipoactividad");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['ID'].'">'.$valores['Nombre'].'</option>';
													var_dump($valores['ID']);
												  }
												}
													?>
												</select>
												</div>
												</div>
												
										
										 <div class="control-group">
											<label class="control-label" >Número de Convenio</label>
											<div class="controls">
												<input   type="text" name="NroConvenioMarco" onchange='add();' id="NroConvenioMarco" 
												placeholder="ingrese SOLO el número" class="form-control span8 tip" required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" >Número de Resolución</label>
											<div class="controls">
												<input type="text" name="NroResolucion" onchange='add();' id="NroResolucion" placeholder="ingrese SOLO el número" class="form-control span8 tip" required>
											</div>
										</div>
										
										
										
										
										<div class="control-group">
											<label class="control-label" >Tipo de Organización:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											
											<label for="organizacion" id="organizacion" class="sr-only">Tipo de Organización:</label>
										
											<select class="form-control" name="organizacion">
											<option value="">Seleccione:</option>
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
												</div>
														</div>
											</div>
										<br/>
										
									  <div id="tipo_organizacion">
									  	<div class="control-group">
											<label class="control-label" >Tipo de Organización:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											
											<label for="organizacion" id="organizacion1" class="sr-only">Tipo de Organización:</label>
										
											<select class="form-control" name="organizacion1">
											<option value="">Seleccione:</option>
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
												</div>
														</div>
											</div>
									  
									  
									  
									  
									  
									  </div>
											<button type="button" name="addrow" id="mostrar_organizacion" class="btn btn-success pull-right">Agregar Nueva Organización
											</button>

											<br/><br/><br/>
											    <!-- Maneja el div para carga de opcionales
												https://tutobasico.com/activar-boton-o-enlace-con-jquery/
												-->
												<script>
												  $( "#mostrar_organizacion" ).click( function() {
												  $( "#tipo_organizacion" ).toggle();
												  
												  });
												</script>
					
											<div class="control-group">
											<label class="control-label" >Título</label>
											<div class="controls">
												<input name="titulo" id="titulo" class=" form-control span8 tip"   type="text" placeholder="titulo" required />
											</div>
										</div>
										
											<div class="control-group">
											<label class="control-label" >Tipo de Unidad Ejecutora:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											<label style="width:500px" for="UnidadEjectura" id="unidad" class="sr-only">Tipo de Unidad:</label>
											<select class="form-control" name="unidad">
											<option value="">Seleccione:</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM unidadejecutora");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Departamento'].'</option>';
													
												  }
												}
													?>
												</select>
												</div>
														</div>
											</div>
											
											<div id="tipo_unidad">
											
											<div class="control-group">
											<label class="control-label" >Tipo de Unidad Ejecutora:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											<label style="width:500px" for="UnidadEjectura" id="unidad" class="sr-only">Tipo de Unidad:</label>
											<select class="form-control" name="unidad1">
											<option value="">Seleccione:</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM unidadejecutora");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['Id'].'">'.$valores['Departamento'].'</option>';
													
												  }
												}
													?>
												</select>
												</div>
														</div>
											</div>
											</div>
											<button type="button" name="addrow" id="mostrar_unidad" class="btn btn-success pull-right">Agregar Nueva Unidad Ejecutora
											
											</button>
												<script>
												  $( "#mostrar_unidad" ).click( function() {
												  $( "#tipo_unidad" ).toggle();
												  });
												</script>
											
											

												<br/><br/><br/>
										<div class="control-group">
											<label class="control-label" >Fecha de Inicio</label>
											<div class="controls">
												<input name="fechai" id="fechai" onchange='add();' class="form-control span8 tip" type="date" placeholder="Ingrese SOLO el año"  required />
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" >Fecha de Final</label>
											<div class="controls">
												<input name="fechaf" id="fechaf" onchange='add();' class="form-control span8 tip" type="date" placeholder="Ingrese SOLO el año"  required />
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" >Objetivo</label>
											<div class="controls">
												<input name="objetivo1" id="objetivo1" class=" form-control span8 tip"   type="text" placeholder="objetivo" required />
											</div>
										</div>

										<!--<div class="control-group">
											<label class="control-label" for="extracto">Extracto</label>
											<div class="controls">
												<input name="extracto" id="extracto" class=" form-control span8 tip"   type="text" placeholder="Extracto que describe el objeto" required />
											</div>
										</div>-->
										 <div class="control-group">
											<label class="control-label" >Plazo de renovación</label>
											<div class="controls">
												<input   type="text" name="PlazoRenovación" onchange='add();' id="PlazoRenovación" placeholder="ingrese SOLO el número, referencia a meses" class="form-control span8 tip" required>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" >Tipo de Moneda:</label>
											<div class="controls">
										    <div class="form-group mx-sm-3 mb-2">
											<label for="MonedaInversion" id="moneda" class="sr-only">Tipo de Moneda:</label>
											<select class="form-control" name="moneda">
											<option value="">Seleccione:</option>
											<?php
											include "conn.php";
											$query = mysqli_query($conn,"SELECT * FROM moneda");
											var_dump (mysqli_num_rows($query));
												if(mysqli_num_rows($query) == 0){
													echo "no sale nada";
												}else{
												   while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['ID'].'">'.$valores['tipo'].'</option>';
													
												  }
												}
													?>
												</select>
												</div>
														</div>
											</div>
									  
									  <div class="control-group">
											<label class="control-label" >Inversión</label>
											<div class="controls">
												<input   type="text" name="InversionActividad" onchange='add();' id="InversionActividad" placeholder="ingrese SOLO el número" class="form-control span8 tip" required>
											</div>
										</div>
										
											
										
									
											<br>
											
									
										
									  
                                     <!--         <div class="control-group">
											<label class="control-label" for="estado_objeto">Estado del Convenio</label>
											<div class="controls">
											 <input type="radio" name="estado_objeto" value="Vigente" checked> Vigente
		                                     <input type="radio" name="estado_objeto" value="No vigente"> No Vigente<br>
       											
											</div>
										</div>
										´
							         <div class="control-group">
                                          <label class="control-label" for="texto_completo">Texto Completo </label>
                                        <div class="controls">
										<input type="textarea" name="texto_completo" id="texto_completo" class=" form-control span8 tip" placeholder="Copie el text completo del original" rows="3"></textarea>
                                        </div>
										</div>
										
										 <div class="control-group">
                                          <label class="control-label" for="archivo">Archivo PDF asociado</label>
                                        <div class="controls">
										<input type="text" name="archivo" id="archivo" class=" form-control span8 tip" placeholder="">
                                        </div>
											
									  <div class="control-group">	
										<label class="control-label" for="archivo">Archivo PDF </label>
									 <div class="controls">
										<input name="archivo" id="archivo" placeholder="Seleccione el PDF asociado" type="file" />
                                        </div>
										</div>
                            -->

 
  <!--<center> <button type="button" class="btn btn-success" id="mostrar_campos_adicionales">Mostrar/ocultar Campos Adicionales.</button> </center>-->

										
         </div> <!-- fin div muestra oculta-->
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="input"  id="input" class="btn btn-sm btn-primary">Registrar</button>
                                               <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
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
              <center> <b class="copyright"> DAFEXA - IdeI &copy; <?php echo date("Y")?> </b></center>
            </div>
        </div>

        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		
		
	
		<!-- Controla que no se omita el archivo PDF
		 https://es.stackoverflow.com/questions/375508/validar-input-con-javascript
		-->	
		<script>
		$(document).ready(function() {
         $('#form1').on('submit', function(event) {
            var $searchValue = $('#archivo').val();
            if ($searchValue === "") {
               event.preventDefault();
                  alert('ATENCIÓN: Falta nombre archivo PDF');
                           }
         });
      });
     </script>
	
<script type="text/javascript">
		
// Esta función arma el nombre del archivo asociado a la normativa (que ya está en el server).		
    function add()
    {  
			
			tipo = $('input[name="tipo_objeto"]:checked').val();
			tipo= tipo.substr(0,1);
			
			numero= document.getElementById("numero_objeto").value;
			if (numero < 10) {
                numero= '0'.concat(numero);
            }
			
			anio= document.getElementById("anio_objeto").value;
			anio= anio.substr(0,4);
			
			//archivo='deposito/'.concat(tipo).concat(anio).concat('/');
			
			archivo=tipo.concat(numero).concat('-',anio).concat('-CD-FCEFN_OCR.pdf');
			//alert(archivo);
			document.getElementById('archivo').value = archivo;
			// falta verificar que existe en el server ...
			// https://es.acervolima.com/como-verificar-que-el-archivo-mencionado-existe-o-no-usar-javascript-jquery/
			
	}
    
</script>


	
    </body>
