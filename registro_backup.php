<?php
include "conn.php";
include 'session_bcfexa.php';
$username = $_SESSION['username'];
$userID = $_SESSION['userID'];

/*
ATENCIÓN: PROBAR https://danisanchez.net/crear-un-select-con-buscador-integrado-gracias-a-select2/ para mejorar los SELECT

ATENCIÓN2: Con este ejemplo se puede mejorar el Alta en los SELECT ... probar

https://getbootstrap.esdocu.com/docs/5.1/utilities/background/ Colores de Fondo

https://www.colorhexa.com/color-names Paleta de Colores para los div

https://www.forosdelweb.com/f18/aceptar-solamente-numeros-formulario-php-1013404/ para controlar que solo se carguen numeros en montos
*/
?>

<!DOCTYPE html>

<html lang="en">

<head>

	<style type="text/css">
		/* Variables CSS para consistencia */
		:root {
			--primary-color: #337ab7;
			--primary-hover: #286090;
			--success-color: #5cb85c;
			--warning-color: #f0ad4e;
			--info-color: #5bc0de;
			--light-gray: #f8f9fa;
			--border-color: #e1e8ed;
			--shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
			--border-radius: 6px;
		}

		body {
			background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
			font-family: 'Open Sans', sans-serif;
			color: #333;
		}

		.container {
			background: white;
			border-radius: var(--border-radius);
			box-shadow: var(--shadow);
			margin: 20px auto;
			padding: 0;
			overflow: hidden;
		}

		.content {
			padding: 30px;
		}

		#campos_adicionales {
			display: none;
		}

		/* Estilos modernos para las secciones */
		.section-card {
			background: white;
			border-radius: var(--border-radius);
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
			margin-bottom: 25px;
			padding: 25px;
			border-left: 4px solid var(--primary-color);
			transition: all 0.3s ease;
		}

		.section-card:hover {
			box-shadow: 0 3px 15px rgba(0, 0, 0, 0.15);
			transform: translateY(-2px);
		}

		.section-header {
			display: flex;
			align-items: center;
			margin-bottom: 20px;
			padding-bottom: 15px;
			border-bottom: 2px solid #f0f0f0;
		}

		.section-icon {
			width: 40px;
			height: 40px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			margin-right: 15px;
			font-size: 18px;
		}

		.section-title {
			font-size: 18px;
			font-weight: 600;
			color: #333;
			margin: 0;
		}

		/* Colores específicos para cada sección */
		.div-1 {
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			color: white;
		}

		.div-1 .section-card {
			border-left-color: #667eea;
		}

		.div-1 .section-icon {
			background: #667eea;
			color: white;
		}

		.div-2 {
			background: linear-gradient(135deg, #96c93d 0%, #00b09b 100%);
			color: white;
		}

		.div-2 .section-card {
			border-left-color: #96c93d;
		}

		.div-2 .section-icon {
			background: #96c93d;
			color: white;
		}

		.div-3 {
			background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
			color: white;
		}

		.div-3 .section-card {
			border-left-color: #f093fb;
		}

		.div-3 .section-icon {
			background: #f093fb;
			color: white;
		}

		.div-4 {
			background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
			color: white;
		}

		.div-4 .section-card {
			border-left-color: #4facfe;
		}

		.div-4 .section-icon {
			background: #4facfe;
			color: white;
		}

		/* Estilos para formularios */
		.form-group {
			margin-bottom: 20px;
		}

		.control-label {
			
			margin-bottom: 8px;
			font-weight: 600;
			color: #555;
			font-size: 14px;
			width: 100% !important;
			text-align: left !important;
			padding-right: 15px;
		}

		.form-control {
			width: 100%;
			padding: 12px 15px;
			border: 2px solid var(--border-color);
			border-radius: var(--border-radius);
			font-size: 14px;
			transition: all 0.3s ease;
			background: white;
			box-sizing: border-box;
		}

		.form-control:focus {
			outline: none;
			border-color: var(--primary-color);
			box-shadow: 0 0 0 3px rgba(51, 122, 183, 0.1);
		}

		.form-control.span8 {
			width: 100%;
			max-width: 500px;
		}

		textarea.form-control {
			min-height: 100px;
			resize: vertical;
		}

		/* Estilos específicos para inputs de Información Documental */
		input {
			height: 38px !important;
			padding: 15px 20px;
			font-size: 16px;
			font-weight: 500;
		}

		/* Estilos para inputs con colores específicos */
		input[style*="background-color:#fff55b"] {
			background-color: #fff3cd !important;
			border-color: #f0ad4e;
		}

		input[style*="background-color:#DDFFFF"] {
			background-color: #e7f3ff !important;
			border-color: #5bc0de;
		}

		input[style*="background-color:#faebd7"] {
			background-color: #faebd7 !important;
			border-color: #4facfe;
		}

		/* Botones modernos */
		.btn {
			display: inline-block;
			padding: 12px 24px;
			font-size: 14px;
			font-weight: 600;
			text-align: center;
			border: none;
			border-radius: var(--border-radius);
			cursor: pointer;
			transition: all 0.3s ease;
			text-decoration: none;
			margin: 5px;
		}

		.btn-primary {
			background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-hover) 100%);
			color: white;
		}

		.btn-primary:hover {
			background: linear-gradient(135deg, var(--primary-hover) 0%, #1f4e6b 100%);
			
			box-shadow: 0 5px 15px rgba(51, 122, 183, 0.3);
		}

		.btn-danger {
			background: linear-gradient(135deg, #d9534f 0%, #c9302c 100%);
			color: white;
		}

		.btn-danger:hover {
			background: linear-gradient(135deg, #c9302c 0%, #ac2925 100%);
			
			box-shadow: 0 5px 15px rgba(217, 83, 79, 0.3);
		}

		.btn-sm {
			padding: 8px 16px;
			font-size: 12px;
		}

		/* Header del formulario */
		blockquote {
			background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-hover) 100%);
			color: white;
			padding: 25px 30px;
			margin: -30px -30px 30px -30px;
			border-left: none;
			border-radius: var(--border-radius) var(--border-radius) 0 0;
		}

		blockquote h3 {
			margin: 0;
			font-weight: 600;
			font-size: 24px;
			text-align: center;
		}

		/* Estilos para Select2 mejorados */
		.select2-container--default .select2-selection--single {
			background-color: white !important;
			border: 2px solid var(--border-color) !important;
			border-radius: var(--border-radius) !important;
			height: 42px !important;
			line-height: 42px !important;
			transition: all 0.3s ease !important;
		}

		.select2-container--default .select2-selection--single:hover {
			border-color: var(--primary-color) !important;
		}

		.select2-container--default.select2-container--focus .select2-selection--single {
			border-color: var(--primary-color) !important;
			box-shadow: 0 0 0 3px rgba(51, 122, 183, 0.1) !important;
		}

		.select2-container--default .select2-selection--single .select2-selection__rendered {
			color: #333 !important;
			line-height: 38px !important;
			padding-left: 15px !important;
		}

		.select2-container--default .select2-selection--single .select2-selection__arrow {
			height: 38px !important;
			right: 10px !important;
		}

		.select2-container {
			width: 100% !important;
			max-width: 400px !important;
		}

		/* Estilos específicos para selects de diferentes secciones */
		.select2-container.unidad-select .select2-selection--single {
			background-color: #f0f8ff !important;
			border-color: #4facfe !important;
		}

		.select2-container.persona-org-select .select2-selection--single {
			background-color: #f0fff0 !important;
			border-color: #96c93d !important;
		}

		.select2-container.persona-unidad-select .select2-selection--single {
			background-color: #f0f8ff !important;
			border-color: #4facfe !important;
		}

		/* Dropdown mejorado */
		.select2-dropdown {
			border: 2px solid var(--border-color) !important;
			border-radius: var(--border-radius) !important;
			box-shadow: var(--shadow) !important;
		}

		.select2-container--default .select2-results__option--highlighted[aria-selected] {
			background-color: var(--primary-color) !important;
		}

		/* Grid de campos */
		.form-row {
			display: flex;
			flex-wrap: wrap;
			gap: 20px;
			margin-bottom: 20px;
		}

		.form-col {
			flex: 1;
			min-width: 250px;
		}

		.form-col-half {
			flex: 0 0 calc(50% - 10px);
			min-width: 200px;
		}

		/* Footer con botones */
		.form-actions {
			background: #f8f9fa;
			padding: 25px 30px;
			margin: 30px -30px -30px -30px;
			border-top: 1px solid #e1e8ed;
			text-align: center;
			border-radius: 0 0 var(--border-radius) var(--border-radius);
		}

		/* Anular el padding-left de Bootstrap para form-horizontal .form-actions */
		.form-horizontal .form-actions {
			padding-left: 20px !important;
		}

		/* Responsive */
		@media (max-width: 768px) {
			.container {
				margin: 10px;
			}

			.content {
				padding: 20px;
			}

			.form-col,
			.form-col-half {
				flex: 1 1 100%;
				min-width: auto;
			}

			.select2-container {
				max-width: 100% !important;
			}
		}

		/* Animaciones sutiles */
		.section-card,
		.form-control,
		.btn {
			transition: all 0.3s ease;
		}

		@keyframes fadeInUp {
			from {
				opacity: 0;
				transform: translateY(30px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		.section-card {
			animation: fadeInUp 0.6s ease forwards;
		}

		.section-card:nth-child(2) {
			animation-delay: 0.1s;
		}

		.section-card:nth-child(3) {
			animation-delay: 0.2s;
		}

		.section-card:nth-child(4) {
			animation-delay: 0.3s;
		}

		.section-card:nth-child(5) {
			animation-delay: 0.4s;
		}
	</style>

	<script type="text/javascript">
		function valida_envia() {
			// Validar Tipo de Actividad (obligatorio)
			if (document.form1.actividad.value == '' || document.form1.actividad.value == 0) {
				alert("OJO!, no ha indicado el TIPO DE ACTIVIDAD")
				document.form1.actividad.focus()
				return false;
			}

			// Validar Número de Resolución (obligatorio)
			if (document.form1.nro_resolucion.value.trim() == '') {
				alert("OJO!, no ha indicado el NÚMERO DE RESOLUCIÓN")
				document.form1.nro_resolucion.focus()
				return false;
			}

			// Validar Organización Principal (obligatorio)
			var o1 = document.getElementById("organizacion1").value;
			var o2 = document.getElementById("organizacion2").value;
			var o3 = document.getElementById("organizacion3").value;

			if (o1 == '' || o1 == 0) {
				alert("OJO!, DEBE seleccionar la ORGANIZACIÓN PRINCIPAL")
				document.form1.organizacion1.focus()
				return false;
			}

			// Validar que no se repitan las organizaciones
			if ((o1 == o2 && o2 != '') || (o1 == o3 && o3 != '') || (o2 == o3 && o2 != '' && o3 != '')) {
				alert("OJO!, NO puede REPETIR las ORGANIZACIONES")
				document.form1.organizacion1.focus()
				return false;
			}

			// Validar Responsable Principal de Organización (obligatorio)
			if (document.form1.responsable_org1.value == '' || document.form1.responsable_org1.value == 0) {
				alert("OJO!, DEBE seleccionar el RESPONSABLE PRINCIPAL de la organización")
				document.form1.responsable_org1.focus()
				return false;
			}

			// Validar Resumen (obligatorio)
			if (document.form1.resumen.value.trim() == '') {
				alert("OJO!, no ha indicado el RESUMEN")
				document.form1.resumen.focus()
				return false;
			}

			// Validar Objetivo (obligatorio)
			if (document.form1.objetivo.value.trim() == '') {
				alert("OJO!, no ha indicado el OBJETIVO")
				document.form1.objetivo.focus()
				return false;
			}

			// Validar Unidad Principal (obligatorio)
			var u1 = document.getElementById("unidad1").value;
			var u2 = document.getElementById("unidad2").value;
			var u3 = document.getElementById("unidad3").value;

			if (u1 == '' || u1 == 0) {
				alert("OJO!, DEBE seleccionar la UNIDAD EJECUTORA PRINCIPAL")
				document.form1.unidad1.focus()
				return false;
			}

			// Validar que no se repitan las unidades
			if ((u1 == u2 && u2 != '') || (u1 == u3 && u3 != '') || (u2 == u3 && u2 != '' && u3 != '')) {
				alert("OJO!, NO puede REPETIR las UNIDADES EJECUTORAS")
				document.form1.unidad1.focus()
				return false;
			}

			// Validar Fechas de Inicio/Fin (obligatorias)
			var f1 = document.getElementById("fecha_inicio").value;
			var f2 = document.getElementById("fecha_fin").value;

			if (f1 == '' || f1 == null) {
				alert("OJO!, DEBE INDICAR la FECHA DE INICIO")
				document.form1.fecha_inicio.focus()
				return false;
			}

			if (f2 == '' || f2 == null) {
				alert("OJO!, DEBE INDICAR la FECHA DE FIN")
				document.form1.fecha_fin.focus()
				return false;
			}

			if (f1 > f2) {
				alert("OJO!, la FECHA DE INICIO no puede ser mayor a la FECHA DE FIN")
				document.form1.fecha_inicio.focus()
				return false;
			}

			// Validar Ubicaciones del Archivo (obligatorias)
			if (document.form1.ubicacion_original.value.trim() == '') {
				alert("OJO!, DEBE INDICAR la UBICACIÓN DEL ARCHIVO ORIGINAL")
				document.form1.ubicacion_original.focus()
				return false;
			}

			if (document.form1.ubicacion_copia.value.trim() == '') {
				alert("OJO!, DEBE INDICAR la UBICACIÓN DE LA COPIA")
				document.form1.ubicacion_copia.focus()
				return false;
			}

			if (document.form1.ubicacion_digital.value.trim() == '') {
				alert("OJO!, DEBE INDICAR la UBICACIÓN DIGITAL")
				document.form1.ubicacion_digital.focus()
				return false;
			}

			// Validar números en montos (si están llenos)
			var monto_org = document.getElementById("monto_inversion_organizacion").value;
			if (monto_org != '' && isNaN(monto_org)) {
				alert("OJO!, El MONTO DE INVERSIÓN DE LA ORGANIZACIÓN debe ser un número válido")
				document.form1.monto_inversion_organizacion.focus()
				return false;
			}

			var monto_unidad = document.getElementById("monto_inversion_unidad").value;
			if (monto_unidad != '' && isNaN(monto_unidad)) {
				alert("OJO!, El MONTO DE INVERSIÓN DE LA UNIDAD debe ser un número válido")
				document.form1.monto_inversion_unidad.focus()
				return false;
			}

			// Si todas las validaciones pasan
			alert("Está todo CONTROLADO, muchas gracias por utilizar BCFEXA!");
			document.form1.submit();
			return true;
		}
	</script>

	<?php include("head_alta_persona.php"); ?>

	<!-- Select2 CSS -->
	<link href='./buscador/assets/select2v410/css/select2.min.css' rel='stylesheet' type='text/css'>

	<!-- jQuery (necesario para Select2) - Versión local -->
	<script src="scripts/jquery-3.2.1.js"></script>

	<!-- Select2 JS -->
	<script src='./buscador/assets/select2v410/js/select2.min.js'></script>
	<!-- Librería español -->
	<script src="./buscador/assets/select2v410/js/i18n/es.js"></script>

</head>

<body>

	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="content">
					<?php
					// var_dump($_POST);	
					if (isset($_POST['actividad'])) {
						
						// Array para almacenar errores de validación
						$errores = array();
						
						// Validaciones del lado del servidor
						if (empty($_POST['actividad']) || $_POST['actividad'] == '0') {
							$errores[] = "Debe seleccionar un Tipo de Actividad.";
						}
						if (empty($_POST['nro_resolucion'])) {
							$errores[] = "Debe ingresar el Número de Resolución.";
						}
						if (empty($_POST['organizacion1']) || $_POST['organizacion1'] == '0') {
							$errores[] = "Debe seleccionar la Organización Principal.";
						}
						if (empty($_POST['responsable_org1']) || $_POST['responsable_org1'] == '0') {
							$errores[] = "Debe seleccionar el Responsable Principal de la Organización.";
						}
						if (empty($_POST['resumen'])) {
							$errores[] = "Debe ingresar el Resumen de la actividad.";
						}
						if (empty($_POST['objetivo'])) {
							$errores[] = "Debe ingresar el Objetivo de la actividad.";
						}
						if (empty($_POST['unidad1']) || $_POST['unidad1'] == '0') {
							$errores[] = "Debe seleccionar la Unidad Ejecutora Principal.";
						}
						if (empty($_POST['fecha_inicio'])) {
							$errores[] = "Debe ingresar la Fecha de Inicio.";
						}
						if (empty($_POST['fecha_fin'])) {
							$errores[] = "Debe ingresar la Fecha de Fin.";
						}
						if (!empty($_POST['fecha_inicio']) && !empty($_POST['fecha_fin']) && $_POST['fecha_inicio'] > $_POST['fecha_fin']) {
							$errores[] = "La Fecha de Inicio no puede ser mayor a la Fecha de Fin.";
						}
						if (empty($_POST['ubicacion_original'])) {
							$errores[] = "Debe ingresar la Ubicación del Archivo Original.";
						}
						if (empty($_POST['ubicacion_copia'])) {
							$errores[] = "Debe ingresar la Ubicación de la Copia.";
						}
						if (empty($_POST['ubicacion_digital'])) {
							$errores[] = "Debe ingresar la Ubicación Digital.";
						}
						
						// Si hay errores, mostrarlos
						if (!empty($errores)) {
							echo '<div class="alert alert-danger"><ul>';
							foreach ($errores as $error) {
								echo '<li>' . $error . '</li>';
							}
							echo '</ul></div>';
						} else {
							// Si no hay errores, proceder con la inserción


						$actividad = mysqli_real_escape_string($conn, (strip_tags($_POST['actividad'], ENT_QUOTES)));
						$nro_convenio_marco = mysqli_real_escape_string($conn, (strip_tags($_POST['nro_convenio_marco'], ENT_QUOTES)));
						$nro_resolucion = mysqli_real_escape_string($conn, (strip_tags($_POST['nro_resolucion'], ENT_QUOTES)));
						$nro_expediente = mysqli_real_escape_string($conn, (strip_tags($_POST['nro_expediente'], ENT_QUOTES)));

						$organizacion1 = mysqli_real_escape_string($conn, (strip_tags($_POST['organizacion1'], ENT_QUOTES)));
						$organizacion2 = mysqli_real_escape_string($conn, (strip_tags($_POST['organizacion2'], ENT_QUOTES)));
						$organizacion3 = mysqli_real_escape_string($conn, (strip_tags($_POST['organizacion3'], ENT_QUOTES)));

						$responsable_org1 = mysqli_real_escape_string($conn, (strip_tags($_POST['responsable_org1'], ENT_QUOTES)));
						$responsable_org2 = mysqli_real_escape_string($conn, (strip_tags($_POST['responsable_org2'], ENT_QUOTES)));
						$responsable_org3 = mysqli_real_escape_string($conn, (strip_tags($_POST['responsable_org3'], ENT_QUOTES)));

						$resumen = mysqli_real_escape_string($conn, (strip_tags($_POST['resumen'], ENT_QUOTES)));
						$objetivo = mysqli_real_escape_string($conn, (strip_tags($_POST['objetivo'], ENT_QUOTES)));

						$unidad1 = mysqli_real_escape_string($conn, (strip_tags($_POST['unidad1'], ENT_QUOTES)));
						$unidad2 = mysqli_real_escape_string($conn, (strip_tags($_POST['unidad2'], ENT_QUOTES)));
						$unidad3 = mysqli_real_escape_string($conn, (strip_tags($_POST['unidad3'], ENT_QUOTES)));

						$responsable_unidad1 = mysqli_real_escape_string($conn, (strip_tags($_POST['responsable_unidad1'], ENT_QUOTES)));
						$responsable_unidad2 = mysqli_real_escape_string($conn, (strip_tags($_POST['responsable_unidad2'], ENT_QUOTES)));
						$responsable_unidad3 = mysqli_real_escape_string($conn, (strip_tags($_POST['responsable_unidad3'], ENT_QUOTES)));

						$fecha_inicio = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_inicio'], ENT_QUOTES)));
						$fecha_fin = mysqli_real_escape_string($conn, (strip_tags($_POST['fecha_fin'], ENT_QUOTES)));

						$plazo_renovacion = mysqli_real_escape_string($conn, (strip_tags($_POST['plazo_renovacion'], ENT_QUOTES)));
						$renovacion_automatica = mysqli_real_escape_string($conn, (strip_tags($_POST['renovacion_automatica'], ENT_QUOTES)));

						$moneda_organizacion = mysqli_real_escape_string($conn, (strip_tags($_POST['moneda_organizacion'], ENT_QUOTES)));
						$monto_inversion_organizacion = mysqli_real_escape_string($conn, (strip_tags($_POST['monto_inversion_organizacion'], ENT_QUOTES)));
						$nota_inversion_organizacion = mysqli_real_escape_string($conn, (strip_tags($_POST['nota_inversion_organizacion'], ENT_QUOTES)));

						$moneda_unidad = mysqli_real_escape_string($conn, (strip_tags($_POST['moneda_unidad'], ENT_QUOTES)));
						$monto_inversion_unidad = mysqli_real_escape_string($conn, (strip_tags($_POST['monto_inversion_unidad'], ENT_QUOTES)));
						$nota_inversion_unidad = mysqli_real_escape_string($conn, (strip_tags($_POST['nota_inversion_unidad'], ENT_QUOTES)));

						// Manejar campos de moneda: si están vacíos, buscar o crear una moneda por defecto
						if (empty($moneda_organizacion) || $moneda_organizacion == '') {
							// Buscar si existe una moneda "Sin especificar" o similar
							$query_moneda_default = mysqli_query($conn, "SELECT Id FROM monedadeinversion WHERE Nombre LIKE '%sin especificar%' OR Nombre LIKE '%no aplica%' LIMIT 1");
							if (mysqli_num_rows($query_moneda_default) > 0) {
								$row = mysqli_fetch_array($query_moneda_default);
								$moneda_organizacion = $row['Id'];
							} else {
								// Si no existe, crear una entrada por defecto
								$insert_moneda_default = mysqli_query($conn, "INSERT INTO monedadeinversion (Nombre) VALUES ('Sin especificar')");
								$moneda_organizacion = mysqli_insert_id($conn);
							}
						}
						if (empty($moneda_unidad) || $moneda_unidad == '') {
							// Buscar si existe una moneda "Sin especificar" o similar
							$query_moneda_default = mysqli_query($conn, "SELECT Id FROM monedadeinversion WHERE Nombre LIKE '%sin especificar%' OR Nombre LIKE '%no aplica%' LIMIT 1");
							if (mysqli_num_rows($query_moneda_default) > 0) {
								$row = mysqli_fetch_array($query_moneda_default);
								$moneda_unidad = $row['Id'];
							} else {
								// Si no existe, usar la misma que se creó arriba o crear otra
								if (isset($insert_moneda_default)) {
									$moneda_unidad = $moneda_organizacion; // Usar la misma que se creó
								} else {
									$insert_moneda_default = mysqli_query($conn, "INSERT INTO monedadeinversion (Nombre) VALUES ('Sin especificar')");
									$moneda_unidad = mysqli_insert_id($conn);
								}
							}
						}
						
						// Manejar campos de monto: si están vacíos, asignar 0
						if (empty($monto_inversion_organizacion) || $monto_inversion_organizacion == '') {
							$monto_inversion_organizacion = 0;
						}
						if (empty($monto_inversion_unidad) || $monto_inversion_unidad == '') {
							$monto_inversion_unidad = 0;
						}

						$ubicacion_original = mysqli_real_escape_string($conn, (strip_tags($_POST['ubicacion_original'], ENT_QUOTES)));
						$ubicacion_copia = mysqli_real_escape_string($conn, (strip_tags($_POST['ubicacion_copia'], ENT_QUOTES)));
						$ubicacion_digital = mysqli_real_escape_string($conn, (strip_tags($_POST['ubicacion_digital'], ENT_QUOTES)));

						// Si los campos de ubicación están vacíos, asignar 'Sin especificar'
						if (empty($ubicacion_original)) $ubicacion_original = 'Sin especificar';
						if (empty($ubicacion_copia)) $ubicacion_copia = 'Sin especificar';
						if (empty($ubicacion_digital)) $ubicacion_digital = 'Sin especificar';



						// Almaceno datos en tabla Actividad
					
						// Primero insertar en tabla ubicacionarchivo
						$insert_ubicacion = mysqli_query($conn, "INSERT INTO ubicacionarchivo (UbicacionOriginal, UbicacionCopia, UbicacionDigital) 
												VALUES('$ubicacion_original', '$ubicacion_copia', '$ubicacion_digital')")
							or die(mysqli_error($conn));
						$ubicacion_id = mysqli_insert_id($conn);

						$insert = mysqli_query($conn, "INSERT INTO actividad (NroResolucion, NroExpediente,NroConvenioMarco,Fecha_inicio,Fecha_final,Resumen,Objetivo,TipoActividad_Id,PlazoRenovacion,
				   RenovacionAutomatica,UbicacionArchivo_Id,Informe_Id,MonedaOrganizacion_Id,InversionOrganizacion,NotaInversionOrganizacion,MonedaUnidad_Id,InversionUnidad,NotaInversionUnidad) 
			VALUES('$nro_resolucion','$nro_expediente','$nro_convenio_marco','$fecha_inicio','$fecha_fin','$resumen','$objetivo','$actividad','$plazo_renovacion',
		        	$renovacion_automatica,$ubicacion_id,1,'$moneda_organizacion','$monto_inversion_organizacion','$nota_inversion_organizacion','$moneda_unidad','$monto_inversion_unidad','$nota_inversion_unidad')")
							or die(mysqli_error($conn));
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
						if ($organizacion1 <> "") {
							mysqli_query($conn, "INSERT INTO detalleactividadorganizacion (Organizacion_Id,Actividad_Id) VALUES('$organizacion1','$ultimo_id')");
						}

						if ($organizacion2 <> "") {
							mysqli_query($conn, "INSERT INTO detalleactividadorganizacion (Organizacion_Id,Actividad_Id) VALUES('$organizacion2','$ultimo_id')");
						}

						if ($organizacion3 <> "") {
							mysqli_query($conn, "INSERT INTO detalleactividadorganizacion (Organizacion_Id,Actividad_Id) VALUES('$organizacion3','$ultimo_id')");
						}

						// Actualizo tabla "detalleactividadunidad" 
						if ($unidad1 <> "") {

							mysqli_query($conn, "INSERT INTO detalleactividadunidad (UnidadEjecutora_Id,Actividad_Id) VALUES('$unidad1','$ultimo_id')");
						}
						if ($unidad2 <> "") {

							mysqli_query($conn, "INSERT INTO detalleactividadunidad (UnidadEjecutora_Id,Actividad_Id) VALUES('$unidad2','$ultimo_id')");
						}
						if ($unidad3 <> "") {

							mysqli_query($conn, "INSERT INTO detalleactividadunidad (UnidadEjecutora_Id,Actividad_Id) VALUES('$unidad3','$ultimo_id')");
						}

						// Actualizo tabla "detallepersonactividad" 
						// El campo Org_o_Uni debe tener 1 si es $responsable_org1
						// El campo Org_o_Uni debe tener 2 si es $responsable_unidad1
						// El campos Rol_Id siempre almacena un 2 (al menos en esta primer versión)
					
						if ($responsable_unidad1 <> "") {

							mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
				                                                   VALUES('$ultimo_id','$responsable_unidad1','2','2')");
						}
						if ($responsable_unidad2 <> "") {

							mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
				                                                   VALUES('$ultimo_id','$responsable_unidad2','2','2')");
						}

						if ($responsable_unidad3 <> "") {

							mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
			                                               VALUES('$ultimo_id','$responsable_unidad3','2','2')");
						}


						if ($responsable_org1 <> "") {

							mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
				                                                   VALUES('$ultimo_id','$responsable_org1','1','2')");
						}
						if ($responsable_org2 <> "") {

							mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
				                                                   VALUES('$ultimo_id','$responsable_org2','1','2')");
						}

						if ($responsable_org3 <> "") {

							mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
			                                               VALUES('$ultimo_id','$responsable_org3','1','2')");
						}

						// Listo!, todo almacenado ahora vovemos a la página ppal	
						header("Location: index.php");
						} // Cierre del else (no hay errores)
					} // Cierre del if (isset($_POST['actividad']))
					?>

					<blockquote>
						<h3> Agregar Detalles de Actividades</h3>
					</blockquote>
					<form name="form1" id="form1" class="form-horizontal row-fluid d-flex justify-content-center" action="registro.php" method="POST">

						<!-- Sección 1: Tipo de Actividad -->
						<div class="section-card">
							<div class="section-header">

								<h4 class="section-title">Información General</h4>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Tipo de Actividad <span
											style="color: red;">*</span></label>
									<select class="form-control" id="actividad" name="actividad" required>
										<option value="">Seleccione el tipo de actividad:</option>
									</select>
								</div>
							</div>
						</div>
						<!-- Sección 2: Información Documental -->
						<div class="section-card">
							<div class="section-header">

								<h4 class="section-title">Información Documental</h4>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Convenio Marco</label>
									<input type="text" name="nro_convenio_marco" id="nro_convenio_marco"
										placeholder="Ingrese SOLO el número" class="form-control">
								</div>
								<div class="form-col">
									<label class="control-label">Número de Expediente</label>
									<input type="text" name="nro_expediente" id="nro_expediente"
										placeholder="Ingrese el número que inicia el trámite" class="form-control">
								</div>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Resolución FCEFN <span
											style="color: red;">*</span></label>
									<input type="text" name="nro_resolucion" id="nro_resolucion"
										placeholder="Ingrese según patrón Rxx/aa" class="form-control" required>
								</div>
							</div>
						</div>

						<!-- Sección 3: Organizaciones y Responsables -->
						<div class="section-card">
							<div class="section-header">

								<h4 class="section-title">Organizaciones Participantes</h4>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Organización Principal <span
											style="color: red;">*</span></label>
									<select class="form-control" name="organizacion1" id="organizacion1" required>
										<option value="">Seleccione la organización que figura en la resolución:
										</option>
									</select>
								</div>
								<div class="form-col">
									<label class="control-label">Organización Secundaria</label>
									<select class="form-control" name="organizacion2" id="organizacion2">
										<option value="">Seleccione otra organización (opcional):</option>
									</select>
								</div>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Organización Adicional</label>
									<select class="form-control" name="organizacion3" id="organizacion3">
										<option value="">Seleccione otra organización (opcional):</option>
									</select>
								</div>
							</div>

							<div class="section-header" style="margin-top: 30px;">

								<h4 class="section-title">Responsables de las Organizaciones</h4>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Responsable Principal <span
											style="color: red;">*</span></label>
									<select class="form-control" name="responsable_org1" id="responsable_org1" required>
										<option value="">Seleccione el RRHH que figura en la resolución:</option>
									</select>
								</div>
								<div class="form-col">
									<label class="control-label">Responsable Secundario</label>
									<select class="form-control" name="responsable_org2" id="responsable_org2">
										<option value="">Seleccione otro RRHH (opcional):</option>
									</select>
								</div>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Responsable Adicional</label>
									<select class="form-control" name="responsable_org3" id="responsable_org3">
										<option value="">Seleccione otro RRHH (opcional):</option>
									</select>
								</div>
							</div>
						</div>




						<!-- Sección 4: Descripción de la Actividad -->
						<div class="section-card">
							<div class="section-header">

								<h4 class="section-title">Descripción de la Actividad</h4>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Resumen <span style="color: red;">*</span></label>
									<textarea name="resumen" id="resumen" class="form-control"
										placeholder="Ingrese un resumen detallado de la actividad" required
										rows="4"></textarea>
								</div>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Objetivo <span
											style="color: red;">*</span></label>
									<textarea name="objetivo" id="objetivo" class="form-control"
										placeholder="Describa los objetivos de la actividad" rows="3" required></textarea>
								</div>
							</div>
						</div>
						<!-- Sección 5: Unidades Ejecutoras -->
						<div class="section-card">
							<div class="section-header">

								<h4 class="section-title">Unidades Ejecutoras</h4>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Unidad Principal <span
											style="color: red;">*</span></label>
									<select class="form-control" id="unidad1" name="unidad1" required>
										<option value="">Seleccione la UNIDAD que figura en la resolución:</option>
									</select>
								</div>
								<div class="form-col">
									<label class="control-label">Unidad Secundaria</label>
									<select class="form-control" id="unidad2" name="unidad2">
										<option value="">Seleccione otra Unidad (opcional):</option>
									</select>
								</div>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Unidad Adicional</label>
									<select class="form-control" id="unidad3" name="unidad3">
										<option value="">Seleccione otra Unidad (opcional):</option>
									</select>
								</div>
							</div>

							<div class="section-header" style="margin-top: 30px;">

								<h4 class="section-title">Responsables de las Unidades</h4>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Responsable Principal</label>
									<select class="form-control" id="responsable_unidad1" name="responsable_unidad1">
										<option value="">Seleccione el responsable:</option>
									</select>
								</div>
								<div class="form-col">
									<label class="control-label">Responsable Secundario</label>
									<select class="form-control" id="responsable_unidad2" name="responsable_unidad2">
										<option value="">Seleccione otro responsable (opcional):</option>
									</select>
								</div>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Responsable Adicional</label>
									<select class="form-control" id="responsable_unidad3" name="responsable_unidad3">
										<option value="">Seleccione otro responsable (opcional):</option>
									</select>
								</div>
							</div>
						</div>



						<!-- Sección 6: Fechas y Configuración Temporal -->
						<div class="section-card">
							<div class="section-header">

								<h4 class="section-title">Fechas y Configuración Temporal</h4>
							</div>

							<div class="form-row">
								<div class="form-col-half">
									<label class="control-label">Fecha de Inicio <span
											style="color: red;">*</span></label>
									<input name="fecha_inicio" id="fecha_inicio" class="form-control" type="date"
										required />
								</div>
								<div class="form-col-half">
									<label class="control-label">Fecha de Fin <span style="color: red;">*</span></label>
									<input name="fecha_fin" id="fecha_fin" class="form-control" type="date" required />
								</div>
							</div>

							<div class="form-row">
								<div class="form-col-half">
									<label class="control-label">Plazo de Renovación (meses)</label>
									<input type="number" name="plazo_renovacion" id="plazo_renovacion"
										placeholder="Número de meses" class="form-control" min="1" max="60">
								</div>
								<div class="form-col-half">
									<label class="control-label">¿Se renueva automáticamente?</label>
									<select class="form-control" id="renovacion_automatica"
										name="renovacion_automatica">
										<option value="0">NO</option>
										<option value="1">SÍ</option>
									</select>
								</div>
							</div>
						</div>
						<!-- Sección 7: Inversión de la Organización -->
						<div class="section-card">
							<div class="section-header">

								<h4 class="section-title">Inversión de la Organización</h4>
							</div>

							<div class="form-row">
								<div class="form-col-half">
									<label class="control-label">Tipo de Moneda</label>
									<select class="form-control" id="moneda_organizacion" name="moneda_organizacion">
										<?php
										include "conn.php";
										$query = mysqli_query($conn, "SELECT * FROM monedadeinversion");
										if (mysqli_num_rows($query) == 0) {
											echo '<option value="">No hay monedas disponibles</option>';
										} else {
											echo '<option value="">Seleccione tipo de moneda</option>';
											while ($valores = mysqli_fetch_array($query)) {
												echo '<option value="' . $valores['Id'] . '">' . $valores['Nombre'] . '</option>';
											}
										}
										?>
									</select>
								</div>
								<div class="form-col-half">
									<label class="control-label">Monto de Inversión</label>
									<input type="number" name="monto_inversion_organizacion"
										id="monto_inversion_organizacion" placeholder="Ingrese el monto"
										class="form-control" min="0" step="0.01">
								</div>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Nota Aclaratoria de la Inversión</label>
									<textarea name="nota_inversion_organizacion" id="nota_inversion_organizacion"
										class="form-control" placeholder="Detalles adicionales sobre la inversión"
										rows="3"></textarea>
								</div>
							</div>
						</div>

						<!-- Sección 8: Inversión FCEFN -->
						<div class="section-card">
							<div class="section-header">

								<h4 class="section-title">Inversión FCEFN</h4>
							</div>

							<div class="form-row">
								<div class="form-col-half">
									<label class="control-label">Tipo de Moneda</label>
									<select class="form-control" id="moneda_unidad" name="moneda_unidad">
										<?php
										include "conn.php";
										$query = mysqli_query($conn, "SELECT * FROM monedadeinversion");
										if (mysqli_num_rows($query) == 0) {
											echo '<option value="">No hay monedas disponibles</option>';
										} else {
											echo '<option value="">Seleccione tipo de moneda</option>';
											while ($valores = mysqli_fetch_array($query)) {
												echo '<option value="' . $valores['Id'] . '">' . $valores['Nombre'] . '</option>';
											}
										}
										?>
									</select>
								</div>
								<div class="form-col-half">
									<label class="control-label">Monto de Inversión</label>
									<input type="number" name="monto_inversion_unidad" id="monto_inversion_unidad"
										placeholder="Ingrese el monto" class="form-control" min="0" step="0.01">
								</div>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Nota Aclaratoria de la Inversión</label>
									<textarea name="nota_inversion_unidad" id="nota_inversion_unidad"
										class="form-control" placeholder="Detalles adicionales sobre la inversión"
										rows="3"></textarea>
								</div>
							</div>
						</div>

						<!-- Sección 9: Ubicación del Archivo -->
						<div class="section-card">
							<div class="section-header">

								<h4 class="section-title">Ubicación del Archivo</h4>
							</div>

							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Ubicación del Original <span
											style="color: red;">*</span></label>
									<input type="text" name="ubicacion_original" id="ubicacion_original"
										placeholder="Especifique la ubicación del archivo original" class="form-control" required>
								</div>
							</div>

							<div class="form-row">
								<div class="form-col-half">
									<label class="control-label">Ubicación de la Copia<span
											style="color: red;">*</span></label>
									<input type="text" name="ubicacion_copia" id="ubicacion_copia"
										placeholder="Especifique la ubicación de la copia" class="form-control" required>
								</div>
								<div class="form-col-half">
									<label class="control-label">Ubicación Digital<span
											style="color: red;">*</span></label>
									<input type="text" name="ubicacion_digital" id="ubicacion_digital"
										placeholder="Especifique la ubicación digital" class="form-control" required>
								</div>
							</div>
						</div>

						<!-- Botones de Acción -->
						<div class="form-actions">
							<button type="button" name="input" id="input" onclick="valida_envia()"
								class="btn btn-primary">
								 Registrar Actividad
							</button>
							<a href="index.php" class="btn btn-danger">
								 Cancelar
							</a>
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

		<!-- Script para inicializar Select2 en todos los selectores relevantes -->
		<script>
			$(document).ready(function () {
				// Configuración común para Select2
				var select2Options = {
					allowClear: true,
					language: "es",
					cache: true
				};

				// Tipo de Actividad
				$("#actividad").select2($.extend({}, select2Options, {
					placeholder: "Buscar tipo de actividad...",
					ajax: {
						url: "ajax-select2-tipo-actividad.php",
						type: "post",
						dataType: 'json',
						delay: 250,
						data: function (params) {
							return {
								searchTerm: params.term
							};
						},
						processResults: function (response) {
							return {
								results: response
							};
						}
					}
				}));

				// Organizaciones
				$("#organizacion1, #organizacion2, #organizacion3").select2($.extend({}, select2Options, {
					placeholder: "Buscar organización...",
					containerCssClass: "persona-org-select",
					ajax: {
						url: "ajax-select2-organizacion.php",
						type: "post",
						dataType: 'json',
						delay: 250,
						data: function (params) {
							return {
								searchTerm: params.term
							};
						},
						processResults: function (response) {
							return {
								results: response
							};
						}
					}
				}));

				// Personas/RRHH - Organización
				$("#responsable_org1, #responsable_org2, #responsable_org3").select2($.extend({}, select2Options, {
					placeholder: "Buscar persona...",
					containerCssClass: "persona-org-select",
					ajax: {
						url: "ajax-select2-persona.php",
						type: "post",
						dataType: 'json',
						delay: 250,
						data: function (params) {
							return {
								searchTerm: params.term
							};
						},
						processResults: function (response) {
							return {
								results: response
							};
						}
					}
				}));

				// Unidades Ejecutoras
				$("#unidad1, #unidad2, #unidad3").select2($.extend({}, select2Options, {
					placeholder: "Buscar unidad ejecutora...",
					containerCssClass: "unidad-select",
					ajax: {
						url: "ajax-select2-unidad-ejecutora.php",
						type: "post",
						dataType: 'json',
						delay: 250,
						data: function (params) {
							return {
								searchTerm: params.term
							};
						},
						processResults: function (response) {
							return {
								results: response
							};
						}
					}
				}));

				// Personas/RRHH - Unidad
				$("#responsable_unidad1, #responsable_unidad2, #responsable_unidad3").select2($.extend({}, select2Options, {
					placeholder: "Buscar persona...",
					containerCssClass: "persona-unidad-select",
					ajax: {
						url: "ajax-select2-unidad-ejecutora.php",
						type: "post",
						dataType: 'json',
						delay: 250,
						data: function (params) {
							return {
								searchTerm: params.term
							};
						},
						processResults: function (response) {
							return {
								results: response
							};
						}
					}
				}));

				// Animaciones y efectos sutiles
				$('.section-card').hover(
					function () {
						$(this).addClass('hover-effect');
					},
					function () {
						$(this).removeClass('hover-effect');
					}
				);

				// Validación visual en tiempo real
				$('input[required], select[required], textarea[required]').on('blur', function () {
					if ($(this).val() === '') {
						$(this).addClass('error-input');
					} else {
						$(this).removeClass('error-input');
					}
				});

				// Progress indicator
				var totalSections = $('.section-card').length;
				var completedSections = 0;

				function updateProgress() {
					completedSections = 0;
					$('.section-card').each(function () {
						var hasRequired = $(this).find('input[required], select[required], textarea[required]').length > 0;
						if (hasRequired) {
							var allFilled = true;
							$(this).find('input[required], select[required], textarea[required]').each(function () {
								if ($(this).val() === '') {
									allFilled = false;
									return false;
								}
							});
							if (allFilled) {
								completedSections++;
								$(this).addClass('section-completed');
							} else {
								$(this).removeClass('section-completed');
							}
						} else {
							completedSections++;
							$(this).addClass('section-completed');
						}
					});
				}

				$('input, select, textarea').on('change keyup', function () {
					updateProgress();
				});

				// Mostrar mensaje de bienvenida
				setTimeout(function () {
					if ($('.section-card:first-child').length) {
						$('.section-card:first-child').prepend('<div class="welcome-tip" style="background: #e7f3ff; border: 1px solid #5bc0de; padding: 10px; border-radius: 4px; margin-bottom: 15px; font-size: 12px; color: #31708f;"><i class="icon-info-sign"></i> Complete los campos marcados con <span style="color: red;">*</span> para poder registrar la actividad.</div>');

						setTimeout(function () {
							$('.welcome-tip').fadeOut();
						}, 10000);
					}
				}, 1000);
			});
		</script>

		<style>
			/* Estilos adicionales para efectos */
			.hover-effect {
				
				box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2) !important;
			}

			.error-input {
				border-color: #d9534f !important;
				box-shadow: 0 0 0 2px rgba(217, 83, 79, 0.2) !important;
			}

			.section-completed .section-icon {
				background: #5cb85c !important;
			}

			.section-completed .section-icon:after {
				content: "✓";
				position: absolute;
				color: white;
				font-weight: bold;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
			}

			.form-actions {
				position: sticky;
				bottom: 0;
				z-index: 100;
			}

			/* Estilos para mensajes de error */
			.alert-danger {
				background-color: #f2dede;
				border-color: #ebccd1;
				color: #a94442;
				padding: 15px;
				margin-bottom: 20px;
				border: 1px solid transparent;
				border-radius: 4px;
			}

			.alert-danger ul {
				margin: 0;
				padding-left: 20px;
			}

			.alert-danger li {
				margin-bottom: 5px;
			}

			/* Asterisco rojo para campos obligatorios */
			span[style*="color: red"] {
				font-weight: bold;
				font-size: 16px;
			}
		</style>



</body>

</html>