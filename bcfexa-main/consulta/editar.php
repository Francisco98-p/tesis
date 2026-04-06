<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
      <?php include("head.php");?>
	  <style type="text/css">
	#campos_adicionales {
	display:none;
    }
    </style>
	
    </head>
    <body>
       <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="http://obedalvarado.pw/" target="_blank">Sistemas Web</a>
                   
                   
                </div>
            </div>
            <!-- /navbar-inner -->
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
           $id = intval($_GET['id']);
			$sql = mysqli_query($conn, "SELECT * FROM digesto WHERE id='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
          
            <blockquote>
			
            Actualizar datos del Objeto
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Registro</label>
											<div class="controls">
												<input type="text" name="id" id="id" value="<?php echo $row['id']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="emisor">Emisor</label>
											<div class="controls">
		                					    <input type="radio" class="form-check-input" name="emisor" value="Consejo Directivo" 
													 <?php echo ($row['emisor']=='Consejo Directivo') ? 'checked':'' ?> > Consejo Directivo
		                                    </div>
										</div>
										
                                      <div class="control-group">
											<label class="control-label" for="tipo_objeto">Normativa</label>
											<div class="controls">
		                										
        <input type="radio" class="form-check-input" name="tipo_objeto" onchange='add();' value="Ordenanza" <?php echo ($row['tipo_objeto']=='Ordenanza')?'checked':'' ?> > Ordenanza
		<input type="radio" name="tipo_objeto" onchange='add();' value="Resolución" <?php echo ($row['tipo_objeto']=='Resolución')?'checked':'' ?> > Resolución<br>
          										
										</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="numero_objeto">Número de la Nomrativa</label>
											<div class="controls">
												<input type="text" name="numero_objeto" onchange='add();' id="numero_objeto" value="<?php echo $row['numero_objeto']; ?>"
												   placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="anio_objeto">Fecha de la Normativa</label>
											<div class="controls">
												<input name="anio_objeto" id="anio_objeto" onchange='add();' value="<?php echo $row['anio_objeto']; ?>"
												class="form-control span8 tip" type="date"  required />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="extracto">Extracto</label>
											<div class="controls">
												<input name="extracto" id="extracto" value="<?php echo $row['extracto']; ?>"
												class=" form-control span8 tip" type="text" placeholder="Extracto que describe la normativa" required />
											</div>
										</div>
									  
										<div class="control-group">
											<label class="control-label" for="estado_objeto">Estado de la normativa</label>
											<div class="controls">
		                										
        <input type="radio" class="form-check-input" name="estado_objeto" value="Vigente" <?php echo ($row['estado_objeto']=='Vigente')?'checked':'' ?> > Vigente
		<input type="radio" name="estado_objeto" value="No vigente" <?php echo ($row['estado_objeto']=='No vigente')?'checked':'' ?> > No vigente<br>
          								
                                         
											     											
											</div>
										</div>
										´           
							           <div class="control-group">
                                          <label class="control-label" for="texto_completo">Texto Completo </label>
                                        <div class="controls">
										<textarea name="texto_completo" id="texto_completo" "class=" form-control span8 tip" placeholder="Copie el texto completo del original"><?php echo trim($row['texto_completo']," "); ?> 
										</textarea>
                                        </div>
										</div>
										
										<div class="control-group">	
										<label class="control-label" for="archivo"> <font color="red"> Archivo PDF Almacenado </font> </label>
										<div class="controls">
										<!-- agrego un hidden para mantener el nombre del archivo leido, por si no lo cambia
									        	https://www.lawebdelprogramador.com/foros/PHP/1687935-CONSULTA-INPUT-FILE-PHP.html
										-->
										<input name="archivo_leido" id="archivo_leido" size="20" value="<?php echo $row['archivo']; ?>" readonly="readonly"
                                      	class=" form-control span8 tip" type="text" />
										</div>
										
										<div class="control-group">
                                          <label class="control-label" for="archivo">Archivo PDF asociado</label>
                                        <div class="controls">
										<input type="text" name="archivo" id="archivo" class=" form-control span8 tip" placeholder="" readonly>
                                        </div>

										<!--
										<div class="control-group">
										<label class="control-label" for="archivo"><font color="red"> NUEVO Archivo PDF (solo si cambia el anterior) </font> </label>
										<div class="controls">
										<input name="archivo" id="archivo" placeholder="Seleccione el PDF asociado" type="file" />
                                        </div>
										</div>
				                        -->
										
										</div>


 
 <center> <button type="button" class="btn btn-success" id="mostrar_campos_adicionales">Mostrar/ocultar Campos Adicionales.</button> </center>
<div id="campos_adicionales">
                                        <div class="control-group">
											<label class="control-label" for="expediente">Expediente</label>
											<div class="controls">
												<input name="expediente" id="expediente" value="<?php echo $row['expediente']; ?>" 
												class=" form-control span8 tip" type="text" placeholder="Ingrese el número de expediente(s) relacionados con el objeto" />
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Palabras Claves</label>
											<div class="controls">
												<input name="palabras_claves" id="palabras_claves" value="<?php echo $row['palabras_claves']; ?>"
												class=" form-control span8 tip" 
												type="text" placeholder="Ingrese una o más palabras claves (temas) que describan el contenido (separados por punto)"/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Modifica o Interpreta a:</label>
											<div class="controls">
												<input name="modifica_interpreta_a" id="modifica_interpreta_a"  value="<?php echo $row['modifica_interpreta_a']; ?>"
												class=" form-control span8 tip" 
												type="text" placeholder="Indique los números de los objetos que modifican o interpretan al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Modificada o Interpretada por:</label>
											<div class="controls">
												<input name="modificada_interpretada_por" id="modificada_interpretada_por" value="<?php echo $row['modificada_interpretada_por']; ?>"
												class=" form-control span8 tip" 
												type="text" placeholder="Indique los números de los objetos que modificaron o interpretaron al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="extracto">Deroga a:</label>
											<div class="controls">
												<input name="deroga_a" id="deroga_a" class=" form-control span8 tip" value="<?php echo $row['deroga_a']; ?>"
												type="text" placeholder="Indique los números de los objetos que fueron derogados por el que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Derogada por:</label>
											<div class="controls">
												<input name="derogada_por" id="derogada_por" class=" form-control span8 tip" value="<?php echo $row['derogada_por']; ?>"
												type="text" placeholder="Indique los números de los objetos que derogaron al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="extracto">Suspende a:</label>
											<div class="controls">
												<input name="suspende_a" id="suspende_a" class=" form-control span8 tip" value="<?php echo $row['suspende_a']; ?>"
												type="text" placeholder="Indique los números de los objetos que suspenden al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Suspendida por:</label>
											<div class="controls">
												<input name="suspendida_por" id="suspendida_por" value="<?php echo $row['suspendida_por']; ?>"
												class=" form-control span8 tip" 
												type="text" placeholder="Indique los números de los objetos que suspendieron al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="extracto">Ratifica a:</label>
											<div class="controls">
												<input name="ratifica_a" id="ratifica_a" class=" form-control span8 tip" value="<?php echo $row['ratifica_a']; ?>"
												type="text" placeholder="Indique los números de los objetos que ratifican al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Ratificada por:</label>
											<div class="controls">
												<input name="ratificada_por" id="ratificada_por" class=" form-control span8 tip" value="<?php echo $row['ratificada_por']; ?>"
												type="text" placeholder="Indique los números de los objetos que ratificaron al que está ingresando (separados por punto) "/>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="extracto">Relacionada con:</label>
											<div class="controls">
												<input name="relacionada_con" id="relacionada_con" class=" form-control span8 tip" value="<?php echo $row['relacionada_con']; ?>"
												type="text" placeholder="Indique los números de los objetos que se relacionan con el que está ingresando (separados por punto) "/>
											</div>
										</div>
										
</div> <!-- fin div muestra oculta-->
										
									
										<div class="control-group">
											<div class="controls">
												<input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
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
              <center> <b class="copyright"><a href="#"> DAFEXA IdeI</a> &copy; <?php echo date("Y")?> </b></center>
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
      
1    </body>
