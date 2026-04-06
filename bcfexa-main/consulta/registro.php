<?php 
include "conn.php";
include 'session_dafexa.php';
$username = $_SESSION['username'];
$userID = $_SESSION['userID'];
 ?>
 
<!DOCTYPE html>

<html lang="en">
<head>
    <head>
	<style type="text/css">
	#campos_adicionales {
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
				
				$tipo_objeto	= mysqli_real_escape_string($conn,(strip_tags($_POST['tipo_objeto'], ENT_QUOTES)));
				$numero_objeto  	= mysqli_real_escape_string($conn,(strip_tags($_POST['numero_objeto'], ENT_QUOTES)));
				$anio_objeto 		= mysqli_real_escape_string($conn,(strip_tags($_POST['anio_objeto'], ENT_QUOTES)));
				$extracto  = mysqli_real_escape_string($conn,(strip_tags($_POST['extracto'], ENT_QUOTES)));
				$estado_objeto=mysqli_real_escape_string($conn,(strip_tags($_POST['estado_objeto'], ENT_QUOTES)));
				$texto_completo  = mysqli_real_escape_string($conn,(strip_tags($_POST['texto_completo'], ENT_QUOTES)));
				$archivo=mysqli_real_escape_string($conn,(strip_tags($_POST['archivo'], ENT_QUOTES)));
				$expediente=mysqli_real_escape_string($conn,(strip_tags($_POST['expediente'], ENT_QUOTES)));
				$palabras_claves=mysqli_real_escape_string($conn,(strip_tags($_POST['palabras_claves'], ENT_QUOTES)));
				$modifica_interpreta_a=mysqli_real_escape_string($conn,(strip_tags($_POST['modifica_interpreta_a'], ENT_QUOTES)));
				$modificada_interpretada_por=mysqli_real_escape_string($conn,(strip_tags($_POST['modificada_interpretada_por'], ENT_QUOTES)));
				$deroga_a=mysqli_real_escape_string($conn,(strip_tags($_POST['deroga_a'], ENT_QUOTES)));
				$derogada_por=mysqli_real_escape_string($conn,(strip_tags($_POST['derogada_por'], ENT_QUOTES)));
				$suspende_a=mysqli_real_escape_string($conn,(strip_tags($_POST['suspende_a'], ENT_QUOTES)));
				$suspendida_por=mysqli_real_escape_string($conn,(strip_tags($_POST['suspendida_por'], ENT_QUOTES)));
				$ratifica_a=mysqli_real_escape_string($conn,(strip_tags($_POST['ratifica_a'], ENT_QUOTES)));
				$ratificada_por=mysqli_real_escape_string($conn,(strip_tags($_POST['ratificada_por'], ENT_QUOTES)));
				$relacionada_con=mysqli_real_escape_string($conn,(strip_tags($_POST['relacionada_con'], ENT_QUOTES)));
				$emisor=mysqli_real_escape_string($conn,(strip_tags($_POST['emisor'], ENT_QUOTES)));
									
				
		
				$insert = mysqli_query($conn, "INSERT INTO digesto(id, tipo_objeto, numero_objeto, anio_objeto, extracto, estado_objeto,texto_completo, archivo, expediente, palabras_claves, modifica_interpreta_a, modificada_interpretada_por, deroga_a, derogada_por, suspende_a, suspendida_por, ratifica_a, ratificada_por, relacionada_con, emisor
				)		VALUES(NULL,'$tipo_objeto', '$numero_objeto', '$anio_objeto', '$extracto',  '$estado_objeto', '$texto_completo', '$archivo', '$expediente', '$palabras_claves', '$modifica_interpreta_a', '$modificada_interpretada_por', '$deroga_a', '$derogada_por', '$suspende_a', '$suspendida_por', '$ratifica_a', '$ratificada_por', '$relacionada_con', '$emisor')") 
															
															or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho Luis Olguin, los datos han sido agregados correctamente.</div>';
						    header("Location: index.php");
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
						}
				
			}
			?>
            
            <blockquote>
            <h3>Agregar Normativa al Digesto de Exactas</h3>
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid"  action="registro.php"  method="POST" >
										<div class="control-group">
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
										</div>
										<div class="control-group">
											<label class="control-label" for="numero_objeto">Número de la Normativa</label>
											<div class="controls">
												<input type="text" name="numero_objeto" onchange='add();' id="numero_objeto" placeholder="ingrese SOLO el número" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="anio_objeto">Fecha de la Normativa</label>
											<div class="controls">
												<input name="anio_objeto" id="anio_objeto" onchange='add();' class="form-control span8 tip" type="date" placeholder="Ingrese SOLO el año"  required />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="extracto">Extracto</label>
											<div class="controls">
												<input name="extracto" id="extracto" class=" form-control span8 tip"   type="text" placeholder="Extracto que describe el objeto" required />
											</div>
										</div>
									  
                                            <div class="control-group">
											<label class="control-label" for="estado_objeto">Estado de la Normativa</label>
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
								<!--			
									  <div class="control-group">	
										<label class="control-label" for="archivo">Archivo PDF </label>
									 <div class="controls">
										<input name="archivo" id="archivo" placeholder="Seleccione el PDF asociado" type="file" />
                                        </div>
										</div>
                            -->

 
 <center> <button type="button" class="btn btn-success" id="mostrar_campos_adicionales">Mostrar/ocultar Campos Adicionales.</button> </center>
<div id="campos_adicionales">
                                        <div class="control-group">
											<label class="control-label" for="expediente">Expediente / Oficio</label>
											<div class="controls">
												<input name="expediente" id="expediente" class=" form-control span8 tip" type="text" placeholder="Ingrese el número de expediente(s) relacionados con el objeto" />
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Palabras Claves</label>
											<div class="controls">
												<input name="palabras_claves" id="palabras_claves" class=" form-control span8 tip" 
												type="text" placeholder="Ingrese una o más palabras claves (temas) que describan el contenido (separados por punto)"/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Modifica o Interpreta a:</label>
											<div class="controls">
												<input name="modifica_interpreta_a" id="modifica_interpreta_a" class=" form-control span8 tip" 
												type="text" placeholder="Indique los números de los objetos que modifican o interpretan al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Modificada o Interpretada por:</label>
											<div class="controls">
												<input name="modificada_interpretada_por" id="modificada_interpretada_por" class=" form-control span8 tip" 
												type="text" placeholder="Indique los números de los objetos que modificaron o interpretaron al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="extracto">Deroga a:</label>
											<div class="controls">
												<input name="deroga_a" id="deroga_a" class=" form-control span8 tip" 
												type="text" placeholder="Indique los números de los objetos que fueron derogados por el que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Derogada por:</label>
											<div class="controls">
												<input name="derogada_por" id="derogada_por" class=" form-control span8 tip" 
												type="text" placeholder="Indique los números de los objetos que derogaron al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="extracto">Suspende a:</label>
											<div class="controls">
												<input name="suspende_a" id="suspende_a" class=" form-control span8 tip" 
												type="text" placeholder="Indique los números de los objetos que suspenden al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Suspendida por:</label>
											<div class="controls">
												<input name="suspendida_por" id="suspendida_por" class=" form-control span8 tip" 
												type="text" placeholder="Indique los números de los objetos que suspendieron al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="extracto">Ratifica a:</label>
											<div class="controls">
												<input name="ratifica_a" id="ratifica_a" class=" form-control span8 tip" 
												type="text" placeholder="Indique los números de los objetos que ratifican al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Ratificada por:</label>
											<div class="controls">
												<input name="ratificada_por" id="ratificada_por" class=" form-control span8 tip" 
												type="text" placeholder="Indique los números de los objetos que ratificaron al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Relacionada con:</label>
											<div class="controls">
												<input name="relacionada_con" id="relacionada_con" class=" form-control span8 tip" 
												type="text" placeholder="Indique los números de los objetos que se relacionan con el que está ingresando (separados por punto) "/>
											</div>
										</div>
										
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
		
		<!-- Maneja el div para carga de opcionales
		https://tutobasico.com/activar-boton-o-enlace-con-jquery/
		-->
		<script>
          $( "#mostrar_campos_adicionales" ).click( function() {
          $( "#campos_adicionales" ).toggle();
          });
        </script>
	
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
