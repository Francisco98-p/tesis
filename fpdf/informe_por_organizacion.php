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

	<div class="container">
	
					<blockquote>
						<h3>INFORME ACTIVIDADES POR ORGANIZACIÓN</h3>
					</blockquote>
					<form name="form1" id="form1" class="form-horizontal row-fluid" action="busca_por_organizacion.php" target='_blank' method="POST">


						
										<label for="organizacion" class="sr-only">Tipo de Organización:</label>

										<select class="form-control" name="organizacion1" id="organizacion1" required style="width:400px;background-color:#DDFFFF"">
											<option value="">Seleccione la organización que figura en la resolución:</option>
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
											<button type="submit" name="input"  id="input" class="btn btn-sm btn-primary">Registrar</button> 
											<!--<a href="busca_por_unidadejecutora.php" target="_blank_" class="btn btn-sm btn-danger">Cancelar</a> -->
										
										
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
				<center> <b class="copyright"> DAFEXA - IdeI &copy; <?php echo date("Y") ?> </b></center>
			</div>
		</div>

		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>



</body>

</html>