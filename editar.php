<<<<<<< HEAD
<?php include "conn.php";
include 'session_bcfexa.php';
$username = $_SESSION['username'];
$userID = $_SESSION['userID'];
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("head_alta_persona.php");?>
	
	<!-- Select2 CSS -->
	<link href='./buscador/assets/select2v410/css/select2.min.css' rel='stylesheet' type='text/css'>
	
	<!-- jQuery (necesario para Select2) -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
	<!-- Select2 JS -->
	<script src='./buscador/assets/select2v410/js/select2.min.js'></script>

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

		.section-title {
			font-size: 18px;
			font-weight: 600;
			color: #333;
			margin: 0;
		}

		/* Estilos para formularios */
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

		.form-col-third {
			flex: 0 0 calc(33.333% - 13.333px);
			min-width: 200px;
		}

		.control-label {
			display: block;
			margin-bottom: 8px;
			font-weight: 600;
			color: #555;
			font-size: 14px;
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

		select.form-control {
			cursor: pointer;
			height: auto !important;
			min-height: 42px !important;
		}

		textarea.form-control {
			min-height: 100px;
			resize: vertical;
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
			transform: translateY(-2px);
			box-shadow: 0 5px 15px rgba(51, 122, 183, 0.3);
		}

		.btn-danger {
			background: linear-gradient(135deg, #d9534f 0%, #c9302c 100%);
			color: white;
		}

		.btn-danger:hover {
			background: linear-gradient(135deg, #c9302c 0%, #ac2925 100%);
			transform: translateY(-2px);
			box-shadow: 0 5px 15px rgba(217, 83, 79, 0.3);
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

		/* Botones de acción en footer */
		.form-actions {
			background: #f8f9fa;
			padding: 25px 30px;
			margin: 30px -30px -30px -30px;
			border-top: 1px solid #e1e8ed;
			text-align: center;
			border-radius: 0 0 var(--border-radius) var(--border-radius);
		}

		/* Footer */
		.footer {
			background: #f8f9fa;
			padding: 20px;
			text-align: center;
			border-top: 1px solid var(--border-color);
			margin-top: 30px;
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
			.form-col-half,
			.form-col-third {
				flex: 1 1 100%;
				min-width: auto;
			}
		}

		/* Navbar */
		.navbar {
			background: white;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

		.select2-results__option {
			padding: 12px 15px !important;
			font-size: 14px !important;
		}

		.select2-results__option--highlighted {
			background-color: var(--primary-color) !important;
		}

		.select2-search__field {
			border: 2px solid var(--border-color) !important;
			border-radius: var(--border-radius) !important;
			padding: 8px 12px !important;
			font-size: 14px !important;
		}

		.select2-search__field:focus {
			outline: none !important;
			border-color: var(--primary-color) !important;
		}

		/* Estilos para upload de archivos */
		.file-upload-area {
			border: 2px dashed var(--border-color);
			border-radius: var(--border-radius);
			padding: 30px;
			text-align: center;
			cursor: pointer;
			transition: all 0.3s ease;
			background-color: var(--light-gray);
		}

		.file-upload-area:hover {
			border-color: var(--primary-color);
			background-color: var(--light-color);
		}

		.file-upload-area.dragover {
			border-color: var(--success-color);
			background-color: #e8f5e9;
		}

		.file-upload-icon {
			font-size: 3rem;
			color: var(--primary-color);
			margin-bottom: 15px;
		}

		.file-info {
			margin-top: 15px;
			padding: 15px;
			border: 1px solid var(--border-color);
			border-radius: var(--border-radius);
			background-color: var(--light-gray);
		}

		.current-file-info .alert {
			margin-bottom: 0;
		}
	</style>

	<script type="text/javascript">
		function valida_envia(){
			// Validar Tipo de Actividad
			if (document.getElementById("actividad").value == 0 || document.getElementById("actividad").value == ''){
				alert("OJO!, no ha indicado el TIPO DE ACTIVIDAD")
				document.form1.actividad.focus()
				return 0;
			}
			
			// Validar Número de Resolución
			if (document.form1.nro_resolucion.value.trim() == ''){
				alert("OJO!, no ha indicado el NÚMERO DE RESOLUCIÓN")
				document.form1.nro_resolucion.focus()
				return 0;
			}
			
			// Validar Resumen
			if (document.form1.resumen.value.trim() == ''){
				alert("OJO!, no ha indicado el RESUMEN")
				document.form1.resumen.focus()
				return 0;
			}
			
		// Validar Organizaciones (no repetir)
		var o1= document.getElementById("organizacion1").value;		
		var o2= document.getElementById("organizacion2").value;		
		var o3= document.getElementById("organizacion3").value;
		
		// Solo validar si ambos valores no están vacíos
		if ((o1==o2 && o1!='' && o2!='') || (o1==o3 && o1!='' && o3!='') || (o2==o3 && o2!='' && o3!='')){
			alert("OJO!, NO puede REPETIR las ORGANIZACIONES")
			document.form1.organizacion1.focus()
			return 0;
		}			// Validar Unidades (no repetir)
			var u1= document.getElementById("unidad1").value;		
			var u2= document.getElementById("unidad2").value;		
			var u3= document.getElementById("unidad3").value;
			
		
		// Solo validar si ambos valores no están vacíos
		if ((u1==u2 && u1!='' && u2!='') || (u1==u3 && u1!='' && u3!='') || (u2==u3 && u2!='' && u3!='')){
			alert("OJO!, NO puede REPETIR las UNIDADES")
			document.form1.unidad1.focus()
			return 0;
		}			// Validar Fechas Inicio/Fin
			var f1= document.getElementById("fecha_inicio").value;	
			var f2= document.getElementById("fecha_fin").value;		
			
			if (f1>f2) {
				alert("OJO!, DEBE INDICAR UN RANGO DE FECHAS VÁLIDO")
				document.form1.fecha_inicio.focus()
				return 0;
			}
			
			// Validar Número entero Monto Organización
			var monto= document.getElementById("monto_inversion_organizacion").value;
			if (monto != '' && isNaN(monto)) {
				alert("OJO!, DEBE INGRESAR UN NÚMERO ENTERO")
				document.form1.monto_inversion_organizacion.focus()
				return 0;
			}
			
			// Validar Número entero Monto FCEFN
			var monto= document.getElementById("monto_inversion_unidad").value;
			if (monto != '' && isNaN(monto)) {
				alert("OJO!, DEBE INGRESAR UN NÚMERO ENTERO")
				document.form1.monto_inversion_unidad.focus()
				return 0;
			}

			// El formulario se envía
			alert("Está todo CONTROLADO, muchas gracias por utilizar BCFEXA!");
			document.form1.submit(); 
		}  
	</script>
</head>

<body>
	

	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="content">
					<?php
					$id = intval($_GET['id']);
					$sql = mysqli_query($conn, "SELECT * FROM actividad WHERE Id='$id'");
					if(mysqli_num_rows($sql) == 0){
						header("Location: index.php");
					}else{
						$row = mysqli_fetch_assoc($sql);
					}
					
					// Obtener datos de ubicación del archivo
					$ubicacion_original = '';
					$ubicacion_copia = '';
					$ubicacion_digital = '';
					
					if ($row['UbicacionArchivo_Id'] > 0) {
						$query_ubicacion = mysqli_query($conn, "SELECT * FROM ubicacionarchivo WHERE Id = " . $row['UbicacionArchivo_Id']);
						if (mysqli_num_rows($query_ubicacion) > 0) {
							$ubicacion = mysqli_fetch_assoc($query_ubicacion);
							$ubicacion_original = $ubicacion['UbicacionOriginal'];
							$ubicacion_copia = $ubicacion['UbicacionCopia'];
							$ubicacion_digital = $ubicacion['UbicacionDigital'];
							
							// Corrección automática: Si la ruta no termina en .pdf, agregarla
							if (!empty($ubicacion_digital) && !preg_match('/\.pdf$/i', $ubicacion_digital)) {
								// Verificar si existe el archivo con .pdf
								if (file_exists($ubicacion_digital . '.pdf')) {
									$ubicacion_digital = $ubicacion_digital . '.pdf';
									// Actualizar en la base de datos
									mysqli_query($conn, "UPDATE ubicacionarchivo SET UbicacionDigital='$ubicacion_digital' WHERE Id=" . $row['UbicacionArchivo_Id']);
								}
							}
							
							// Debug: Verificar qué contiene la variable
							// echo "DEBUG - Ubicación digital en BD: " . $ubicacion_digital . "<br>";
							// echo "DEBUG - Archivo existe: " . (file_exists($ubicacion_digital) ? 'SÍ' : 'NO') . "<br>";
						}
					}
					
					// Leer organizaciones
					$query_org1 = 'SELECT Organizacion_Id FROM detalleactividadorganizacion WHERE Actividad_Id='.$row['Id'].' LIMIT 0,1';
					$query = mysqli_query($conn,$query_org1);
					$organizacion1_leida = 0;
					if(mysqli_num_rows($query) > 0) {
						$valores = mysqli_fetch_array($query);
						$organizacion1_leida = $valores['Organizacion_Id'];
					}
					
					$query_org2 = 'SELECT Organizacion_Id FROM detalleactividadorganizacion WHERE Actividad_Id='.$row['Id'].' LIMIT 1,1';
					$query = mysqli_query($conn,$query_org2);
					$organizacion2_leida = 0;
					if(mysqli_num_rows($query) > 0) {
						$valores = mysqli_fetch_array($query);
						$organizacion2_leida = $valores['Organizacion_Id'];
					}
					
					$query_org3 = 'SELECT Organizacion_Id FROM detalleactividadorganizacion WHERE Actividad_Id='.$row['Id'].' LIMIT 2,1';
					$query = mysqli_query($conn,$query_org3);
					$organizacion3_leida = 0;
					if(mysqli_num_rows($query) > 0) {
						$valores = mysqli_fetch_array($query);
						$organizacion3_leida = $valores['Organizacion_Id'];
					}
					
					// Leer responsables de organizaciones
					$query_resp_org1 = 'SELECT Persona_Id FROM detallepersonaactividad WHERE Actividad_Id='.$row['Id'].' AND Org_o_Uni = 1 LIMIT 0,1';
					$query = mysqli_query($conn,$query_resp_org1);
					$responsable_org1_leida = 0;
					if(mysqli_num_rows($query) > 0) {
						$valores = mysqli_fetch_array($query);
						$responsable_org1_leida = $valores['Persona_Id'];
					}
					
					$query_resp_org2 = 'SELECT Persona_Id FROM detallepersonaactividad WHERE Actividad_Id='.$row['Id'].' AND Org_o_Uni = 1 LIMIT 1,1';
					$query = mysqli_query($conn,$query_resp_org2);
					$responsable_org2_leida = 0;
					if(mysqli_num_rows($query) > 0) {
						$valores = mysqli_fetch_array($query);
						$responsable_org2_leida = $valores['Persona_Id'];
					}
					
					$query_resp_org3 = 'SELECT Persona_Id FROM detallepersonaactividad WHERE Actividad_Id='.$row['Id'].' AND Org_o_Uni = 1 LIMIT 2,1';
					$query = mysqli_query($conn,$query_resp_org3);
					$responsable_org3_leida = 0;
					if(mysqli_num_rows($query) > 0) {
						$valores = mysqli_fetch_array($query);
						$responsable_org3_leida = $valores['Persona_Id'];
					}
					
					// Leer unidades ejecutoras
					$query_un1 = 'SELECT UnidadEjecutora_Id FROM detalleactividadunidad WHERE Actividad_Id='.$row['Id'].' LIMIT 0,1';
					$query = mysqli_query($conn,$query_un1);
					$unidad1_leida = 0;
					if(mysqli_num_rows($query) > 0) {
						$valores = mysqli_fetch_array($query);
						$unidad1_leida = $valores['UnidadEjecutora_Id'];
					}
					
					$query_un2 = 'SELECT UnidadEjecutora_Id FROM detalleactividadunidad WHERE Actividad_Id='.$row['Id'].' LIMIT 1,1';
					$query = mysqli_query($conn,$query_un2);
					$unidad2_leida = 0;
					if(mysqli_num_rows($query) > 0) {
						$valores = mysqli_fetch_array($query);
						$unidad2_leida = $valores['UnidadEjecutora_Id'];
					}
					
					$query_un3 = 'SELECT UnidadEjecutora_Id FROM detalleactividadunidad WHERE Actividad_Id='.$row['Id'].' LIMIT 2,1';
					$query = mysqli_query($conn,$query_un3);
					$unidad3_leida = 0;
					if(mysqli_num_rows($query) > 0) {
						$valores = mysqli_fetch_array($query);
						$unidad3_leida = $valores['UnidadEjecutora_Id'];
					}
					
					// Leer responsables de unidades
					$query_resp_un1 = 'SELECT Persona_Id FROM detallepersonaactividad WHERE Actividad_Id='.$row['Id'].' AND Org_o_Uni = 2 LIMIT 0,1';
					$query = mysqli_query($conn,$query_resp_un1);
					$responsable_unidad1_leida = 0;
					if(mysqli_num_rows($query) > 0) {
						$valores = mysqli_fetch_array($query);
						$responsable_unidad1_leida = $valores['Persona_Id'];
					}
					
					$query_resp_un2 = 'SELECT Persona_Id FROM detallepersonaactividad WHERE Actividad_Id='.$row['Id'].' AND Org_o_Uni = 2 LIMIT 1,1';
					$query = mysqli_query($conn,$query_resp_un2);
					$responsable_unidad2_leida = 0;
					if(mysqli_num_rows($query) > 0) {
						$valores = mysqli_fetch_array($query);
						$responsable_unidad2_leida = $valores['Persona_Id'];
					}
					
					$query_resp_un3 = 'SELECT Persona_Id FROM detallepersonaactividad WHERE Actividad_Id='.$row['Id'].' AND Org_o_Uni = 2 LIMIT 2,1';
					$query = mysqli_query($conn,$query_resp_un3);
					$responsable_unidad3_leida = 0;
					if(mysqli_num_rows($query) > 0) {
						$valores = mysqli_fetch_array($query);
						$responsable_unidad3_leida = $valores['Persona_Id'];
					}
					?>
					
					<blockquote>
						<h3>Actualizar datos de la Actividad</h3>
					</blockquote>
					
					<form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" enctype="multipart/form-data">
						
						<!-- Campo oculto para el ID -->
						<input type="hidden" name="id" id="id" value="<?php echo $row['Id']; ?>">
						
						<!-- Campos ocultos para valores leídos -->
						<input type="hidden" name="organizacion1_leida" value="<?php echo $organizacion1_leida; ?>">
						<input type="hidden" name="organizacion2_leida" value="<?php echo $organizacion2_leida; ?>">
						<input type="hidden" name="organizacion3_leida" value="<?php echo $organizacion3_leida; ?>">
						<input type="hidden" name="responsable_org1_leida" value="<?php echo $responsable_org1_leida; ?>">
						<input type="hidden" name="responsable_org2_leida" value="<?php echo $responsable_org2_leida; ?>">
						<input type="hidden" name="responsable_org3_leida" value="<?php echo $responsable_org3_leida; ?>">
						<input type="hidden" name="unidad1_leida" value="<?php echo $unidad1_leida; ?>">
						<input type="hidden" name="unidad2_leida" value="<?php echo $unidad2_leida; ?>">
						<input type="hidden" name="unidad3_leida" value="<?php echo $unidad3_leida; ?>">
						<input type="hidden" name="responsable_unidad1_leida" value="<?php echo $responsable_unidad1_leida; ?>">
						<input type="hidden" name="responsable_unidad2_leida" value="<?php echo $responsable_unidad2_leida; ?>">
						<input type="hidden" name="responsable_unidad3_leida" value="<?php echo $responsable_unidad3_leida; ?>">
						<input type="hidden" name="ubicacion_id" value="<?php echo $row['UbicacionArchivo_Id']; ?>">
						
						<!-- Sección 1: Información General -->
						<div class="section-card">
							<div class="section-header">
								<h4 class="section-title">Información General</h4>
							</div>
							
							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Tipo de Actividad <span style="color: red;">*</span></label>
									<select class="form-control" id="actividad" name="actividad" required>
										<option value="">Seleccione el tipo de actividad:</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM tipoactividad ORDER BY Nombre");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $row['TipoActividad_Id']) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Nombre'].'</option>';
											}
										}
										?>
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
									<input type="text" name="nro_convenio_marco" value="<?php echo $row['NroConvenioMarco']; ?>" 
										id="nro_convenio_marco" placeholder="Ingrese SOLO el número" class="form-control">
								</div>
								<div class="form-col">
									<label class="control-label">Número de Expediente</label>
									<input type="text" name="nro_expediente" value="<?php echo $row['NroExpediente']; ?>" 
										id="nro_expediente" placeholder="Ingrese el número que inicia el trámite" class="form-control">
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Resolución FCEFN <span style="color: red;">*</span></label>
									<input type="text" name="nro_resolucion" id="nro_resolucion" 
										value="<?php echo $row['NroResolucion']; ?>"
										placeholder="Ingrese según patrón Rxx/aa" class="form-control" required>
								</div>
								<div class="form-col">
									<label class="control-label">Resolución Asociada</label>
									<input type="text" name="nro_resolucion_asociada" id="nro_resolucion_asociada" 
										value="<?php echo $row['NroResolucion_Asociada']; ?>"
										placeholder="Resolución relacionada (opcional)" class="form-control">
								</div>
							</div>
						</div>
						
						<!-- Sección 3: Organizaciones Participantes -->
						<div class="section-card">
							<div class="section-header">
								<h4 class="section-title">Organizaciones Participantes</h4>
							</div>
							
							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Organización Principal <span style="color: red;">*</span></label>
									<select class="form-control" name="organizacion1" id="organizacion1" required>
										<option value="">Seleccione la organización:</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM organizacion ORDER BY Nombre");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $organizacion1_leida) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Nombre'].'</option>';
											}
										}
										?>
									</select>
								</div>
								<div class="form-col">
									<label class="control-label">Organización Secundaria</label>
									<select class="form-control" name="organizacion2" id="organizacion2">
										<option value="">Seleccione otra organización (opcional):</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM organizacion ORDER BY Nombre");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $organizacion2_leida && $organizacion2_leida > 0) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Nombre'].'</option>';
											}
										}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Organización Adicional</label>
									<select class="form-control" name="organizacion3" id="organizacion3">
										<option value="">Seleccione otra organización (opcional):</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM organizacion ORDER BY Nombre");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $organizacion3_leida && $organizacion3_leida > 0) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Nombre'].'</option>';
											}
										}
										?>
									</select>
								</div>
							</div>
							
							<div class="section-header" style="margin-top: 30px;">
								<h4 class="section-title">Responsables de las Organizaciones</h4>
							</div>
							
							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Responsable Principal <span style="color: red;">*</span></label>
									<select class="form-control" name="responsable_org1" id="responsable_org1" required>
										<option value="">Seleccione el RRHH:</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM persona ORDER BY Nombre");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $responsable_org1_leida) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Nombre'].'</option>';
											}
										}
										?>
									</select>
								</div>
								<div class="form-col">
									<label class="control-label">Responsable Secundario</label>
									<select class="form-control" name="responsable_org2" id="responsable_org2">
										<option value="">Seleccione otro RRHH (opcional):</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM persona ORDER BY Nombre");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $responsable_org2_leida && $responsable_org2_leida > 0) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Nombre'].'</option>';
											}
										}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Responsable Adicional</label>
									<select class="form-control" name="responsable_org3" id="responsable_org3">
										<option value="">Seleccione otro RRHH (opcional):</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM persona ORDER BY Nombre");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $responsable_org3_leida && $responsable_org3_leida > 0) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Nombre'].'</option>';
											}
										}
										?>
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
										placeholder="Ingrese un resumen detallado de la actividad" required rows="4"><?php echo $row['Resumen']; ?></textarea>
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Objetivo <span style="color: red;">*</span></label>
									<textarea name="objetivo" id="objetivo" class="form-control" 
										placeholder="Describa los objetivos de la actividad" rows="3" required><?php echo $row['Objetivo']; ?></textarea>
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
									<label class="control-label">Unidad Principal <span style="color: red;">*</span></label>
									<select class="form-control" id="unidad1" name="unidad1" required>
										<option value="">Seleccione la UNIDAD:</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM unidadejecutora ORDER BY Unidad");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $unidad1_leida) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Unidad'].'</option>';
											}
										}
										?>
									</select>
								</div>
								<div class="form-col">
									<label class="control-label">Unidad Secundaria</label>
									<select class="form-control" id="unidad2" name="unidad2">
										<option value="">Seleccione otra Unidad (opcional):</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM unidadejecutora ORDER BY Unidad");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $unidad2_leida && $unidad2_leida > 0) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Unidad'].'</option>';
											}
										}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Unidad Adicional</label>
									<select class="form-control" id="unidad3" name="unidad3">
										<option value="">Seleccione otra Unidad (opcional):</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM unidadejecutora ORDER BY Unidad");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $unidad3_leida && $unidad3_leida > 0) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Unidad'].'</option>';
											}
										}
										?>
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
										<?php
										$query = mysqli_query($conn,"SELECT * FROM persona ORDER BY Nombre");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $responsable_unidad1_leida) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Nombre'].'</option>';
											}
										}
										?>
									</select>
								</div>
								<div class="form-col">
									<label class="control-label">Responsable Secundario</label>
									<select class="form-control" id="responsable_unidad2" name="responsable_unidad2">
										<option value="">Seleccione otro responsable (opcional):</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM persona ORDER BY Nombre");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $responsable_unidad2_leida && $responsable_unidad2_leida > 0) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Nombre'].'</option>';
											}
										}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Responsable Adicional</label>
									<select class="form-control" id="responsable_unidad3" name="responsable_unidad3">
										<option value="">Seleccione otro responsable (opcional):</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM persona ORDER BY Nombre");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $responsable_unidad3_leida && $responsable_unidad3_leida > 0) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Nombre'].'</option>';
											}
										}
										?>
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
									<label class="control-label">Fecha de Inicio <span style="color: red;">*</span></label>
									<input name="fecha_inicio" id="fecha_inicio" class="form-control" type="date" 
										value="<?php echo $row['Fecha_inicio']; ?>" required />
								</div>
								<div class="form-col-half">
									<label class="control-label">Fecha de Fin <span style="color: red;">*</span></label>
									<input name="fecha_fin" id="fecha_fin" class="form-control" type="date" 
										value="<?php echo $row['Fecha_final']; ?>" required />
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-col-half">
									<label class="control-label">Plazo de Renovación (meses)</label>
									<input type="number" name="plazo_renovacion" id="plazo_renovacion" 
										value="<?php echo $row['PlazoRenovacion']; ?>"
										placeholder="Número de meses" class="form-control" min="1" max="60">
								</div>
								<div class="form-col-half">
									<label class="control-label">¿Se renueva automáticamente?</label>
									<select class="form-control" id="renovacion_automatica" name="renovacion_automatica">
										<option value="0" <?php echo ($row['RenovacionAutomatica'] == 0) ? 'selected' : ''; ?>>NO</option>
										<option value="1" <?php echo ($row['RenovacionAutomatica'] == 1) ? 'selected' : ''; ?>>SÍ</option>
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
										<option value="">Seleccione tipo de moneda</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM monedadeinversion");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $row['MonedaOrganizacion_Id']) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Nombre'].'</option>';
											}
										}
										?>
									</select>
								</div>
								<div class="form-col-half">
									<label class="control-label">Monto de Inversión</label>
									<input type="number" name="monto_inversion_organizacion" id="monto_inversion_organizacion" 
										value="<?php echo $row['InversionOrganizacion']; ?>"
										placeholder="Ingrese el monto" class="form-control" min="0" step="0.01">
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Nota Aclaratoria de la Inversión</label>
									<textarea name="nota_inversion_organizacion" id="nota_inversion_organizacion" 
										class="form-control" placeholder="Detalles adicionales sobre la inversión" rows="3"><?php echo $row['NotaInversionOrganizacion']; ?></textarea>
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
										<option value="">Seleccione tipo de moneda</option>
										<?php
										$query = mysqli_query($conn,"SELECT * FROM monedadeinversion");
										if(mysqli_num_rows($query) > 0){
											while ($valores = mysqli_fetch_array($query)) {
												$selected = ($valores['Id'] == $row['MonedaUnidad_Id']) ? 'selected' : '';
												echo '<option value="'.$valores['Id'].'" '.$selected.'>'.$valores['Nombre'].'</option>';
											}
										}
										?>
									</select>
								</div>
								<div class="form-col-half">
									<label class="control-label">Monto de Inversión</label>
									<input type="number" name="monto_inversion_unidad" id="monto_inversion_unidad" 
										value="<?php echo $row['InversionUnidad']; ?>"
										placeholder="Ingrese el monto" class="form-control" min="0" step="0.01">
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-col">
									<label class="control-label">Nota Aclaratoria de la Inversión</label>
									<textarea name="nota_inversion_unidad" id="nota_inversion_unidad" 
										class="form-control" placeholder="Detalles adicionales sobre la inversión" rows="3"><?php echo $row['NotaInversionUnidad']; ?></textarea>
								</div>
							</div>
						</div>
						
						<!-- Sección 9: Ubicación del Archivo -->
						<div class="section-card">
							<div class="section-header">
								<h4 class="section-title">📁 Ubicación del Archivo</h4>
							</div>
							
							<div class="form-row">
								<div class="form-col-half">
									<label class="control-label"><i class="fas fa-file me-1"></i>Ubicación del Original</label>
									<input type="text" name="ubicacion_original" id="ubicacion_original" 
										value="<?php echo $ubicacion_original; ?>"
										placeholder="Especifique la ubicación del archivo original" class="form-control">
								</div>
								
								<div class="form-col-half">
									<label class="control-label"><i class="fas fa-copy me-1"></i>Ubicación de la Copia</label>
									<input type="text" name="ubicacion_copia" id="ubicacion_copia" 
										value="<?php echo $ubicacion_copia; ?>"
										placeholder="Especifique la ubicación de la copia" class="form-control">
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-col-half">
									<label class="control-label"><i class="fas fa-file-pdf me-1"></i>Ubicación Digital (Archivo PDF)</label>
									
									<?php if (!empty($ubicacion_digital)): ?>
										<!-- Mostrar archivo actual -->
										<div class="current-file-info mb-3">
											<div class="alert alert-success" style="padding: 10px 15px; margin-bottom: 10px;">
												<div>
													<i class="fas fa-file-pdf" style="color: #dc3545; font-size: 1rem; margin-right: 8px;"></i>
													<strong style="font-size: 0.9rem;">Archivo actual:</strong>
												</div>
												<div style="font-size: 0.85rem; color: #555; margin-top: 5px; margin-left: 24px;">
													<?php echo basename($ubicacion_digital); ?>
													<?php 
													// Mostrar información de debug en pequeño
													if (!file_exists($ubicacion_digital)) {
														echo '<br><small style="color: #dc3545;">Ruta en BD: ' . htmlspecialchars($ubicacion_digital) . '</small>';
													}
													?>
												</div>
												<?php if (file_exists($ubicacion_digital)): ?>
													<div style="display: flex; gap: 8px; margin-top: 10px; max-width: 300px;">
														<a href="<?php echo $ubicacion_digital; ?>" target="_blank" class="btn btn-primary btn-sm" style="white-space: nowrap; flex: 1;">
															<i class="fas fa-eye"></i> Ver PDF
														</a>
														<a href="<?php echo $ubicacion_digital; ?>" download class="btn btn-sm" style="background-color: #28a745; color: white; white-space: nowrap; flex: 1;">
															<i class="fas fa-download"></i> Descargar
														</a>
													</div>
												<?php else: ?>
													<div style="margin-top: 8px;">
														<span class="badge" style="background-color: #dc3545; padding: 5px 10px; font-size: 0.75rem;">Archivo no encontrado</span>
													</div>
												<?php endif; ?>
											</div>
										</div>
									<?php else: ?>
										<div class="alert alert-warning" style="padding: 8px 12px; margin-bottom: 10px; font-size: 0.85rem;">
											<i class="fas fa-exclamation-triangle"></i> No hay un archivo PDF asociado actualmente.
										</div>
									<?php endif; ?>
									
									<!-- Área de subida de archivos -->
									<div class="file-upload-area" id="fileUploadArea">
										<div class="file-upload-icon">
											<i class="fas fa-file-pdf"></i>
										</div>
										<p class="mb-2"><strong>Arrastre y suelte un nuevo PDF aquí</strong></p>
										<p class="text-muted small mb-2">o haga clic para seleccionar un archivo</p>
										<input type="file" id="ubicacion_digital_file" name="ubicacion_digital" accept=".pdf" style="display: none;">
										<button type="button" class="btn btn-sm btn-primary" id="selectFileBtn">
											<i class="fas fa-folder-open me-1"></i>Seleccionar Nuevo Archivo
										</button>
									</div>
									
									<!-- Información del archivo seleccionado -->
									<div class="file-info" id="fileInfo" style="display: none;">
										<div class="d-flex justify-content-between align-items-center">
											<div>
												<i class="fas fa-file-pdf me-2 text-danger"></i>
												<span id="fileName">Nombre del archivo</span>
												<small class="text-muted d-block" id="fileSize">Tamaño del archivo</small>
											</div>
											<button type="button" class="btn btn-sm btn-outline-danger" id="removeFileBtn">
												<i class="fas fa-times"></i>
											</button>
										</div>
									</div>
									
									<div class="form-text small mt-2">
										<i class="fas fa-info-circle me-1"></i>Solo archivos PDF, máximo 10MB. Dejar vacío para mantener el archivo actual.
									</div>
								</div>
							</div>
						</div>
						
						<!-- Botones de Acción -->
						<div class="form-actions">
							<button type="button" name="update" id="update" onclick="valida_envia()" class="btn btn-primary">
								💾 Actualizar
							</button>
							<a href="index.php" class="btn btn-danger">
								✖ Cancelar
							</a>
						</div>
						
					</form>
					
				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="container">
			<center><b class="copyright">BCFEXA - IdeI &copy; <?php echo date("Y")?></b></center>
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

			// Función helper para pre-seleccionar valores en Select2 AJAX
			function setSelectedOption($select, id, text) {
				if (id && id > 0 && text) {
					var option = new Option(text, id, true, true);
					$select.append(option).trigger('change');
				}
			}

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
			// Pre-seleccionar tipo de actividad actual
			<?php if ($row['TipoActividad_Id'] > 0): ?>
				<?php 
					$query_tipo = mysqli_query($conn, "SELECT Nombre FROM tipoactividad WHERE Id = " . $row['TipoActividad_Id']);
					if ($tipo_data = mysqli_fetch_assoc($query_tipo)) {
						echo "setSelectedOption($('#actividad'), {$row['TipoActividad_Id']}, '{$tipo_data['Nombre']}');";
					}
				?>
			<?php endif; ?>

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
			// Pre-seleccionar organizaciones actuales
			<?php 
				if ($organizacion1_leida > 0) {
					$q = mysqli_query($conn, "SELECT Nombre FROM organizacion WHERE Id = $organizacion1_leida");
					if ($d = mysqli_fetch_assoc($q)) {
						echo "setSelectedOption($('#organizacion1'), $organizacion1_leida, '{$d['Nombre']}');";
					}
				}
				if ($organizacion2_leida > 0) {
					$q = mysqli_query($conn, "SELECT Nombre FROM organizacion WHERE Id = $organizacion2_leida");
					if ($d = mysqli_fetch_assoc($q)) {
						echo "setSelectedOption($('#organizacion2'), $organizacion2_leida, '{$d['Nombre']}');";
					}
				}
				if ($organizacion3_leida > 0) {
					$q = mysqli_query($conn, "SELECT Nombre FROM organizacion WHERE Id = $organizacion3_leida");
					if ($d = mysqli_fetch_assoc($q)) {
						echo "setSelectedOption($('#organizacion3'), $organizacion3_leida, '{$d['Nombre']}');";
					}
				}
			?>

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
			// Pre-seleccionar responsables de organizaciones
			<?php 
				if ($responsable_org1_leida > 0) {
					$q = mysqli_query($conn, "SELECT Nombre FROM persona WHERE Id = $responsable_org1_leida");
					if ($d = mysqli_fetch_assoc($q)) {
						echo "setSelectedOption($('#responsable_org1'), $responsable_org1_leida, '{$d['Nombre']}');";
					}
				}
				if ($responsable_org2_leida > 0) {
					$q = mysqli_query($conn, "SELECT Nombre FROM persona WHERE Id = $responsable_org2_leida");
					if ($d = mysqli_fetch_assoc($q)) {
						echo "setSelectedOption($('#responsable_org2'), $responsable_org2_leida, '{$d['Nombre']}');";
					}
				}
				if ($responsable_org3_leida > 0) {
					$q = mysqli_query($conn, "SELECT Nombre FROM persona WHERE Id = $responsable_org3_leida");
					if ($d = mysqli_fetch_assoc($q)) {
						echo "setSelectedOption($('#responsable_org3'), $responsable_org3_leida, '{$d['Nombre']}');";
					}
				}
			?>

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
			// Pre-seleccionar unidades actuales
			<?php 
				if ($unidad1_leida > 0) {
					$q = mysqli_query($conn, "SELECT Unidad FROM unidadejecutora WHERE Id = $unidad1_leida");
					if ($d = mysqli_fetch_assoc($q)) {
						echo "setSelectedOption($('#unidad1'), $unidad1_leida, '{$d['Unidad']}');";
					}
				}
				if ($unidad2_leida > 0) {
					$q = mysqli_query($conn, "SELECT Unidad FROM unidadejecutora WHERE Id = $unidad2_leida");
					if ($d = mysqli_fetch_assoc($q)) {
						echo "setSelectedOption($('#unidad2'), $unidad2_leida, '{$d['Unidad']}');";
					}
				}
				if ($unidad3_leida > 0) {
					$q = mysqli_query($conn, "SELECT Unidad FROM unidadejecutora WHERE Id = $unidad3_leida");
					if ($d = mysqli_fetch_assoc($q)) {
						echo "setSelectedOption($('#unidad3'), $unidad3_leida, '{$d['Unidad']}');";
					}
				}
			?>

			// Personas/RRHH - Unidad
			$("#responsable_unidad1, #responsable_unidad2, #responsable_unidad3").select2($.extend({}, select2Options, {
				placeholder: "Buscar persona...",
				containerCssClass: "persona-unidad-select",
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
			// Pre-seleccionar responsables de unidades
			<?php 
				if ($responsable_unidad1_leida > 0) {
					$q = mysqli_query($conn, "SELECT Nombre FROM persona WHERE Id = $responsable_unidad1_leida");
					if ($d = mysqli_fetch_assoc($q)) {
						echo "setSelectedOption($('#responsable_unidad1'), $responsable_unidad1_leida, '{$d['Nombre']}');";
					}
				}
				if ($responsable_unidad2_leida > 0) {
					$q = mysqli_query($conn, "SELECT Nombre FROM persona WHERE Id = $responsable_unidad2_leida");
					if ($d = mysqli_fetch_assoc($q)) {
						echo "setSelectedOption($('#responsable_unidad2'), $responsable_unidad2_leida, '{$d['Nombre']}');";
					}
				}
				if ($responsable_unidad3_leida > 0) {
					$q = mysqli_query($conn, "SELECT Nombre FROM persona WHERE Id = $responsable_unidad3_leida");
					if ($d = mysqli_fetch_assoc($q)) {
						echo "setSelectedOption($('#responsable_unidad3'), $responsable_unidad3_leida, '{$d['Nombre']}');";
					}
				}
			?>
		});

		// JavaScript para manejo de archivos PDF
		const fileInput = document.getElementById('ubicacion_digital_file');
		const fileUploadArea = document.getElementById('fileUploadArea');
		const selectFileBtn = document.getElementById('selectFileBtn');
		const fileInfo = document.getElementById('fileInfo');
		const fileName = document.getElementById('fileName');
		const fileSize = document.getElementById('fileSize');
		const removeFileBtn = document.getElementById('removeFileBtn');

		// Click en el botón para abrir selector de archivos
		selectFileBtn.addEventListener('click', () => {
			fileInput.click();
		});

		// Click en el área para abrir selector de archivos
		fileUploadArea.addEventListener('click', (e) => {
			if (e.target !== selectFileBtn) {
				fileInput.click();
			}
		});

		// Cuando se selecciona un archivo
		fileInput.addEventListener('change', handleFileSelect);

		// Drag and drop
		fileUploadArea.addEventListener('dragover', (e) => {
			e.preventDefault();
			fileUploadArea.classList.add('dragover');
		});

		fileUploadArea.addEventListener('dragleave', () => {
			fileUploadArea.classList.remove('dragover');
		});

		fileUploadArea.addEventListener('drop', (e) => {
			e.preventDefault();
			fileUploadArea.classList.remove('dragover');
			
			const files = e.dataTransfer.files;
			if (files.length > 0) {
				fileInput.files = files;
				handleFileSelect();
			}
		});

		// Función para manejar la selección de archivo
		function handleFileSelect() {
			const file = fileInput.files[0];
			
			if (file) {
				// Validar que sea PDF
				if (file.type !== 'application/pdf') {
					alert('Por favor, seleccione un archivo PDF válido.');
					fileInput.value = '';
					return;
				}
				
				// Validar tamaño (10MB máximo)
				const maxSize = 10 * 1024 * 1024; // 10MB en bytes
				if (file.size > maxSize) {
					alert('El archivo es demasiado grande. El tamaño máximo es 10MB.');
					fileInput.value = '';
					return;
				}
				
				// Mostrar información del archivo
				fileName.textContent = file.name;
				fileSize.textContent = formatFileSize(file.size);
				fileUploadArea.style.display = 'none';
				fileInfo.style.display = 'block';
			}
		}

		// Botón para remover archivo seleccionado
		removeFileBtn.addEventListener('click', () => {
			fileInput.value = '';
			fileUploadArea.style.display = 'block';
			fileInfo.style.display = 'none';
		});

		// Función helper para formatear tamaño de archivo
		function formatFileSize(bytes) {
			if (bytes === 0) return '0 Bytes';
			const k = 1024;
			const sizes = ['Bytes', 'KB', 'MB', 'GB'];
			const i = Math.floor(Math.log(bytes) / Math.log(k));
			return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
		}
	</script>

</body>
</html>
=======
﻿<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <?php include("head.php");?>
	  <style type="text/css">
	#campos_adicionales {
	display:none;
    }
    </style>
	  <!-- select2 css -->
        <link href='./buscador/assets/select2v410/css/select2.min.css' rel='stylesheet' type='text/css'>

        <!-- select2 script -->
        <script src='./buscador/assets/select2v410/js/select2.min.js'></script>
        <!-- Libreria español -->
        <script src="./buscador/assets/select2v410/js/i18n/es.js"></script>

    </head>
    <body>
     
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
                         					
										<form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST">
											
										
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


 
                                        <div class="control-group">
											<label class="control-label" for="expediente">Expediente</label>
											<div class="controls">
												<input name="expediente" id="expediente" value="<?php echo $row['expediente']; ?>" 
												class=" form-control span8 tip" type="text" placeholder="Ingrese el número de expediente(s) relacionados con el objeto" />
											</div>
										</div>
										
										<div class="control-group">
										  <?php
										  //separo las palabras claves leidas	
										  $valores_array = explode(',', $row['palabras_claves']); 
										   
										  ?>
											<label class="control-label" for="extracto">Palabras Claves </label>
													<select id="palabra_clave1" name="palabra_clave1" data-selected="<?php echo $valores_array[0]; ?>">
                                                    </select>
													<select id="palabra_clave2" name="palabra_clave2" data-selected="<?php echo $valores_array[1]; ?>">
                                                    </select>
												    <select id="palabra_clave3" name="palabra_clave3" data-selected="<?php echo $valores_array[2]; ?>">
                                                    </select>
													<select id="palabra_clave4" name="palabra_clave4" data-selected="<?php echo $valores_array[3]; ?>">
													</select>
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
												type="text" 
												placeholder="Ej: O1/88,R345/24,O9/99">
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


 <script>
        $(document).ready(function() {
  var palabraSeleccionada = $('#palabra_clave1,#palabra_clave2,#palabra_clave3,#palabra_clave4').data('selected');
  //alert(palabraSeleccionada);
            $("#palabra_clave1,#palabra_clave2,#palabra_clave3,#palabra_clave4").select2({
                ajax: {
                    url: "buscador/registro_palabras_claves.php",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
							
                            results: response
                        };
                    },
								
				   cache: true
					
				
					
                },
				//minimumInputLength: 0
					
 
	         
        });
			 // Establece el valor seleccionado
			 
    <?php if (isset($valores_array[0])): ?>
	var palabraClaveActual = <?php echo json_encode($valores_array[0]);?>;
	//alert(palabraClaveActual);
    if (palabraClaveActual) {
        var option = new Option(palabraClaveActual, palabraClaveActual, true, true);
        $('#palabra_clave1').append(option).trigger('change');
	 }
	 <?php endif; ?>
	 
	 <?php if (isset($valores_array[1])): ?>
	 var palabraClaveActual = <?php echo json_encode($valores_array[1]);?>;
	//alert(palabraClaveActual);
    if (palabraClaveActual) {
        var option = new Option(palabraClaveActual, palabraClaveActual, true, true);
        $('#palabra_clave2').append(option).trigger('change');
	 }
	<?php endif; ?>
	 
	<?php if (isset($valores_array[2])): ?>
	var palabraClaveActual = <?php echo json_encode($valores_array[2]);?>;
	if (palabraClaveActual) {
        var option = new Option(palabraClaveActual, palabraClaveActual, true, true);
        $('#palabra_clave3').append(option).trigger('change');
	 }
	 <?php endif; ?>
	 
	 <?php if (isset($valores_array[3])): ?>
	 var palabraClaveActual = <?php echo json_encode($valores_array[3]);?>;
	 if (palabraClaveActual) {
        var option = new Option(palabraClaveActual, palabraClaveActual, true, true);
        $('#palabra_clave4').append(option).trigger('change');
	 }
	 <?php endif; ?>
	  


		});
    </script>

<script>
// VLAIDADOR  de entrada de campos donde se almacena las relaciones con otros docuemntos GRACIAS DEEPSEEK Y CLAUDE!!
// Esperar a que todo el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    // Función de validación mejorada
    function validarYFormatear(inputValue, campoId) {
        const pattern = /\b(O|R)(0*)([1-9][0-9]{0,2})\/(.+)\b/;
        const items = inputValue.split(",").map(item => item.trim());
        const formattedItems = [];
        
        for (let item of items) {
            if (!item) continue;
            
            const matches = item.match(pattern);
            if (matches) {
                const letra = matches[1];
                const numero = matches[3]; // Ignoramos los ceros iniciales
                const numeroFormateado = numero.padStart(numero.length > 2 ? numero.length : 2, "0");
                const resto = matches[4];
                formattedItems.push(`${letra}${numeroFormateado}/${resto}`);
            } else {
                return { 
                    success: false, 
                    message: `Entrada inválida: "${item}". Formato: (O|R)(número)/(...)`
                };
            }
        }
        
        return {
            success: true,
            message: "Entrada válida",
            result: formattedItems.join(",")
        };
    }

    // Manejador de eventos robusto
    function manejarValidacion(event) {
        event.stopImmediatePropagation();
        event.preventDefault();
        
        const inputElement = event.target;
        const inputValue = inputElement.value.trim();
        
        // Limpiar estado previo
        inputElement.classList.remove('error');
        
        if (!inputValue) return true;
        
        const resultado = validarYFormatear(inputValue, inputElement.id);
        
        if (!resultado.success) {
            inputElement.classList.add('error');
            alert(resultado.message);
            setTimeout(() => {
                inputElement.focus();
                inputElement.select();
            }, 0);
            return false;
        } else {
            inputElement.value = resultado.result;
            return true;
        }
    }

    // Asignación de eventos segura
    const camposValidar = [
        'ratificada_por','relacionada_con','ratifica_a',
        'suspendida_por','suspende_a','derogada_por',
        'deroga_a','modificada_interpretada_por','modifica_interpreta_a'
    ];
    
    camposValidar.forEach(id => {
        const element = document.getElementById(id);
        if (element) {
            // Eliminar event listeners previos para evitar duplicados
            element.removeEventListener('blur', manejarValidacion);
            element.removeEventListener('input', manejarValidacion);
            
            // Agregar nuestros listeners
            element.addEventListener('blur', manejarValidacion, true); // Usar captura
            element.addEventListener('input', function() {
                this.classList.remove('error');
            });
        }
    });
});
</script>  

   </body>
>>>>>>> c75371212b3772fad208f167beaa9ae6c325fc52
