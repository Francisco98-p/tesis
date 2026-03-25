<?php
include "conn.php";
//include 'session_bcfexa.php';
//$username = $_SESSION['username'];
//$userID = $_SESSION['userID'];

/*
2024 Probar los TABS para organizar la página https://fastbootstrap.com/components/tabs/
*/
?>

<!DOCTYPE html>

<html lang="en">

<head>



	<style type="text/css">
		#campos_adicionales {
			display: none;
		}

		.div-1 {
			background-color: #EBEBEB;
		}

		.div-2 {
			background-color: #ABBAEA;
		}

		.div-3 {
			background-color: #FBD603;
		}

		.div-4 {
			background-color: #fbceb1;
		}
	</style>
	
   
      
</head>

<body>

	<div class="div-2">
	<center>
					<blockquote>
					
						<h3>INFORME ACTIVIDADES POR UNIDAD EJECUTORA</h3>
					</blockquote>
					<form name="form1" id="form1" class="form-horizontal row-fluid" action="busca_por_unidadejecutora.php" target='_blank' method="POST">


						
								
										<div class="controls">		
										<div class="form-group mx-sm-3 mb-2">
											<label style="width:500px" for="UnidadEjectura" class="sr-only">Unidad Ejecutora:</label>
											<select class="form-control" id="unidad1" name="unidad1" style="width:400px;background-color:#faebd7">
												<option value="">Seleccione la UNIDAD a listar:</option>
												<?php
												include "conn.php";
												$query = mysqli_query($conn, "SELECT * FROM unidadejecutora ORDER BY Unidad");
												var_dump(mysqli_num_rows($query));
												if (mysqli_num_rows($query) == 0) {
													echo "no sale nada";
												} else {
													while ($valores = mysqli_fetch_array($query)) {
														echo '<option value="' . $valores['Unidad'].'#'.$valores['Id'] . '">' . $valores['Unidad'] . '</option>';
														
													}
												}
												?>
												
											</select>

									<div class="control-group">
										<div class="controls">
										 	<!--/.content	<input type="button" name="input" id="input" value="Ver Informe" class="btn btn-sm btn-primary" />-->
											<input type="submit" name="input1"  id="input2" onclick ="this.form.action = 'busca_por_unidadejecutora.php'" value="Generar Informe x Unidad"></button> 
											<!--<a href="busca_por_unidadejecutora.php" target="_blank_" class="btn btn-sm btn-danger">Cancelar</a> -->
										
										
										</div>
									</div>
									
										<div class="container">
		<div class="div-3">
					<blockquote>
						<h3>INFORME ACTIVIDADES POR ORGANIZACIÓN</h3>
					</blockquote>
					<form name="form2" id="form2" class="form-horizontal row-fluid" action="busca_por_organizacion.php" target='_blank' method="POST">


						
										<label for="organizacion" class="sr-only">Tipo de Organización:</label>

										<select class="form-control" name="organizacion1" id="organizacion1" required style="width:400px;background-color:#DDFFFF"">
										<!--	<option value="">Seleccione la organización que figura en la resolución:</option> -->
											<?php
											include "conn.php";
											$query = mysqli_query($conn, "SELECT * FROM organizacion ORDER BY Nombre");

											if (mysqli_num_rows($query) == 0) {
												echo "no sale nada";
											} else {
												while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="' . $valores['Nombre'].'#'.$valores['Id'] . '">' . $valores['Nombre'] . '</option>';
												}
											}
											?>
													
												</select>
												
										<div class="control-group">
										<div class="controls">
										 	<!--/.content	<input type="button" name="input" id="input" value="Ver Informe" class="btn btn-sm btn-primary" />-->
											
											<input type="submit" name="input2"  id="input2" onclick ="this.form.action = 'busca_por_organizacion.php'" value="Generar Informe x Organización"></> 
										<!--	<button type="submit" name="input"  id="input" class="btn btn-sm btn-primary">Registrar</button> 
											
											<a href="busca_por_unidadejecutora.php" target="_blank_" class="btn btn-sm btn-danger">Cancelar</a> -->
										
										
										</div>
									</div>

					</form>

						</div>			
						</div>

					</form>

					<!--/.content-->
				</div>
				<!--/.span9-->
			</div>
		</div>
		<!--/.container-->
		<div class="row">
        <div id="content" class="col-lg-12">
            <div class="content"><center><h1>BIENVENIDO OTOÑO 2024 A LA UNSJ!</H1></center></div>
            <div class="content2" style="display:none;">Hola, soy un nuevo div!</div>
        </div>
    </div>
				<div class="div-4">
				     <CENTER>
					<blockquote>
						<h3>INFORME ACTIVIDADES QUE DEBEN RENOVARSE</h3>
					</blockquote>
					<form name="form2" id="form2" class="form-horizontal row-fluid" action="busca_actividades_renovacion.php" target='_blank' method="POST">
											
											<input type="submit" name="input2"  id="input2" onclick ="this.form.action = 'busca_actividades_renovacion.php'" value="Generar Informe Actividades a Renovar"></> 
										<!--	<button type="submit" name="input"  id="input" class="btn btn-sm btn-primary">Registrar</button> 
											
											<a href="busca_por_unidadejecutora.php" target="_blank_" class="btn btn-sm btn-danger">Cancelar</a> -->
										
										
										</div>
									</div>

					</form>

						</div>			</div>

					</form>

					<!--/.content-->
				</div>
				<!--/.span9-->
			</div>
		</div>
		<div class="div-3">
		<center>
					<blockquote>
						<h3>ESTADÍSTICA DE ACTIVIDADES POR AÑO</h3>
					</blockquote>
					<form name="form2" id="form2" class="form-horizontal row-fluid" action="chart-pie.php" target='_blank' method="POST">


						
										<label for="organizacion" class="sr-only">Año a listar:</label>

										<select name="anio">
        <?php
        for($i=date('o'); $i>=1986; $i--){
            if ($i == date('o'))
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
</select>
										
												
										<div class="control-group">
										<div class="controls">
										 	<!--/.content	<input type="button" name="input" id="input" value="Ver Informe" class="btn btn-sm btn-primary" />-->
											
											<input type="submit" name="input2"  id="input2" onclick ="this.form.action = 'chart-pie.php'" value="Generar Estadistica de Actividades"></> 
										<!--	<button type="submit" name="input"  id="input" class="btn btn-sm btn-primary">Registrar</button> 
											
											<a href="busca_por_unidadejecutora.php" target="_blank_" class="btn btn-sm btn-danger">Cancelar</a> -->
										
										
										</div>
									</div>

					</form>

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
				<center> <b class="copyright"> BCFEXA - IdeI &copy; <?php echo date("Y") ?> </b></center>
			</div>
		</div>

		<script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		
		<script src="src/jquery-3.2.1.js"></script>
   
   <script src="https://cdn.jsdelivr.net/gh/jmacuna/blogger-showfall@master/snowfall.jquery.js"></script>
   <script>
   $(document).snowfall({
	   image:'https://pngimg.com/uploads/autumn_leaves/autumn_leaves_PNG3592.png',
	   minSize:10,
	   maxSize:100,
	   flakeCount:5,
	   minSpeed:2
   });
   
   </script>
   
   <script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },3000);
	
   
});
</script>



</body>

</html>