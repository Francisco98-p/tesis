<?php
include "conn.php";
//include 'session_dafexa.php';
//$username = $_SESSION['username'];
//$userID = $_SESSION['userID'];
?>

<!DOCTYPE html>

<html lang="en">

<head>

	<head>
		<style type="text/css">
			#campos_adicionales {
				display: none;
			}
		</style>
		<script>
			function valida_archivo() {
				alert("OJO!, entroF");
				valor = document.getElementById('archivo');
				if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
					alert("OJO!, falta indicar cual es el PDF");
					return false;
				}
		</script>

		<?php include("head.php"); ?>
	</head>

<body>

	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="content">
					<?php
					if (isset($_POST['input'])) {

						$nombre = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre'], ENT_QUOTES)));
						$direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($conn, (strip_tags($_POST['direccion'], ENT_QUOTES))) : '';
						$telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conn, (strip_tags($_POST['telefono'], ENT_QUOTES))) : '';
						$email = isset($_POST['email']) ? mysqli_real_escape_string($conn, (strip_tags($_POST['email'], ENT_QUOTES))) : '';

						// Verificar duplicados
						$check_query = "SELECT COUNT(*) as count FROM organizacion WHERE nombre = '$nombre'";
						$check_result = mysqli_query($conn, $check_query);
						$check_row = mysqli_fetch_assoc($check_result);

						if ($check_row['count'] > 0) {
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ya existe una organización con ese nombre.</div>';
						} else {
							$insert = mysqli_query($conn, "INSERT INTO organizacion(nombre, direccion, telefono, email) VALUES('$nombre', '$direccion', '$telefono', '$email')");
							if ($insert) {
								echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Organización agregada correctamente.</div>';
								header("Location: alta_organizacion.php");
							} else {
								echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error al agregar la organización.</div>';
							}
						}

					}
					?>

					<blockquote>
						<h3>BCFEXA - Agregar Organización</h3>
					</blockquote>
					<form name="form1" id="form1" class="form-horizontal row-fluid" action="nueva_organizacion.php"
						method="POST">

						<div class="control-group">
							<label class="control-label" for="extracto">Organización que participa de la
								Actividad</label>
							<div class="controls">
								<input name="nombre" id="nombre" class=" form-control span8 tip" type="text"
									placeholder="Ej.: Cámara Minera de San Juan" required />
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<button type="submit" name="input" id="input"
									class="btn btn-sm btn-primary">Registrar</button>
								<button type="button" class="btn btn-sm btn-danger"
									onclick="window.location.href='index.php'">Volver al Menú Principal</button>
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
			<center> <b class="copyright"> BCFEXA - IdeI &copy; <?php echo date("Y") ?> </b></center>
		</div>
	</div>

	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

	<!-- Maneja el div para carga de opcionales
		https://tutobasico.com/activar-boton-o-enlace-con-jquery/
		-->
	<script>
				$("#mostrar_campos_adicionales").click(function () {
					$("#campos_adicionales").toggle();
				});
	</script>

	<!-- Controla que no se omita el archivo PDF
		 https://es.stackoverflow.com/questions/375508/validar-input-con-javascript
		-->
	<script>
				$(document).ready(function () {
					$('#form1').on('submit', function (event) {
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
			function add() {

				tipo = $('input[name="tipo_objeto"]:checked').val();
				tipo = tipo.substr(0, 1);

				numero = document.getElementById("numero_objeto").value;
				if (numero < 10) {
					numero = '0'.concat(numero);
				}

				anio = document.getElementById("anio_objeto").value;
				anio = anio.substr(0, 4);

				//archivo='deposito/'.concat(tipo).concat(anio).concat('/');

				archivo = tipo.concat(numero).concat('-', anio).concat('-CD-FCEFN_OCR.pdf');
				//alert(archivo);
				document.getElementById('archivo').value = archivo;
				// falta verificar que existe en el server ...
				// https://es.acervolima.com/como-verificar-que-el-archivo-mencionado-existe-o-no-usar-javascript-jquery/

			}

	</script>



</body>