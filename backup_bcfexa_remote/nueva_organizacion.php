<?php
include "conn.php";
//include 'session_dafexa.php';
//$username = $_SESSION['username'];
//$userID = $_SESSION['userID'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BCFEXA - Alta de Organización</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<style>
		:root {
			--primary-color: #1a4b8c;
			--secondary-color: #2c6eb5;
			--accent-color: #4c9ae8;
			--light-color: #e9f2fb;
			--dark-color: #0d2b4e;
			--success-color: #28a745;
			--warning-color: #ffc107;
			--danger-color: #dc3545;
		}

		body {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			background-color: #f5f7fa;
			color: #333;
		}

		.header-custom {
			background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
			color: white;
			padding: 20px 0;
			border-radius: 10px 10px 0 0;
			margin-bottom: 20px;
		}

		.card-custom {
			border: none;
			border-radius: 10px;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
			margin-bottom: 20px;
		}

		.card-header-custom {
			background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
			color: white;
			border-radius: 10px 10px 0 0 !important;
			padding: 15px 20px;
			font-weight: 600;
		}

		.btn-primary-custom {
			background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
			border: none;
			border-radius: 6px;
			padding: 10px 20px;
			font-weight: 600;
			transition: all 0.3s;
		}

		.btn-primary-custom:hover {
			background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
			transform: translateY(-2px);
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
		}

		.duplicate-warning {
			background-color: #fff3cd;
			border: 1px solid #ffeaa7;
			color: #856404;
			padding: 10px;
			border-radius: 6px;
			margin-bottom: 15px;
			display: none;
		}

		.duplicate-warning .alert-icon {
			font-size: 1.2rem;
			margin-right: 10px;
		}

		.form-control:focus {
			border-color: var(--primary-color);
			box-shadow: 0 0 0 0.2rem rgba(26, 75, 140, 0.25);
		}

		.footer-custom {
			background: linear-gradient(135deg, var(--primary-color), var(--dark-color));
			color: white;
			padding: 20px 0;
			margin-top: 30px;
			border-radius: 0 0 10px 10px;
		}
	</style>
</head>

<body>
	<?php
	if (isset($_POST['input'])) {
		$nombre = mysqli_real_escape_string($conn, (strip_tags($_POST['nombre'], ENT_QUOTES)));

		// Verificar si ya existe una organización con ese nombre
		$check_query = mysqli_query($conn, "SELECT * FROM organizacion WHERE Nombre = '$nombre'");

		if (mysqli_num_rows($check_query) > 0) {
			$alert_type = 'warning';
			$alert_message = 'Advertencia: Ya existe una organización con este nombre. Por favor, verifique antes de continuar.';
		} else {
			$insert = mysqli_query($conn, "INSERT INTO organizacion(Id, Nombre) VALUES(NULL,'$nombre')");

			if ($insert) {
				$alert_type = 'success';
				$alert_message = '¡Éxito! La organización ha sido registrada correctamente.';
				// Redirigir después de éxito
				header("Location: alta_organizacion.php");
				exit();
			} else {
				$alert_type = 'danger';
				$alert_message = 'Error: No se pudo registrar la organización.';
			}
		}
	}
	?>

	<div class="container mt-4 mb-4">
		<div class="header-custom text-center">
			<h1><i class="fas fa-university me-2"></i>BCFEXA - Alta de Organización</h1>
			<p class="mb-0">Sistema de Gestión de Actividades Institucionales</p>
		</div>

		<div class="card-custom">
			<div class="card-header-custom d-flex justify-content-between align-items-center">
				<h3 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Nueva Organización</h3>
				<a href="alta_organizacion.php" class="btn btn-light btn-sm">
					<i class="fas fa-arrow-left me-1"></i>Volver al listado
				</a>
			</div>

			<div class="card-body">
				<?php if (isset($alert_type) && isset($alert_message)): ?>
					<div class="alert alert-<?php echo $alert_type; ?> alert-dismissible fade show" role="alert">
						<i
							class="fas fa-<?php echo $alert_type == 'warning' ? 'exclamation-triangle' : ($alert_type == 'success' ? 'check-circle' : 'exclamation-circle'); ?> me-2"></i>
						<?php echo $alert_message; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
					</div>
				<?php endif; ?>

				<form name="form1" id="form1" action="nueva_organizacion.php" method="POST">
					<div class="row">
						<div class="col-md-12">
							<div class="duplicate-warning" id="duplicate-warning">
								<i class="fas fa-exclamation-triangle alert-icon"></i>
								<strong>Advertencia:</strong> Ya existe una organización con este nombre. Por favor,
								verifique antes de continuar.
							</div>

							<div class="mb-3">
								<label for="nombre" class="form-label">
									<i class="fas fa-building me-2"></i>Nombre de la Organización
								</label>
								<input type="text" class="form-control" id="nombre" name="nombre"
									placeholder="Ej.: Cámara Minera de San Juan" required autocomplete="off">
								<div class="form-text">Ingrese el nombre completo de la organización que participa de la
									actividad.</div>
							</div>
						</div>
					</div>

					<div class="d-grid gap-2 d-md-flex justify-content-md-end">
						<a href="alta_organizacion.php" class="btn btn-secondary me-md-2">
							<i class="fas fa-times me-2"></i>Cancelar
						</a>
						<button type="submit" name="input" id="input" class="btn btn-primary-custom">
							<i class="fas fa-save me-2"></i>Registrar Organización
						</button>
					</div>
				</form>
			</div>
		</div>

		<div class="footer-custom text-center">
			<p class="mb-0">
				<b class="copyright">
					<a href="#" class="text-white text-decoration-none">IdeI</a> &copy; <?php echo date("Y"); ?> -
					Sistema BCFEXA
				</b>
			</p>
		</div>
	</div>

	<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script>
		$(document).ready(function () {
			// Inicializar Select2 para el campo de nombre (aunque es input, podríamos usarlo para búsqueda)
			$('#nombre').select2({
				placeholder: "Seleccione o escriba el nombre de la organización",
				allowClear: true,
				tags: true,
				createTag: function (params) {
					return {
						id: params.term,
						text: params.term,
						newOption: true
					}
				},
				templateResult: function (data) {
					var $result = $('<span></span>');
					$result.text(data.text);
					if (data.newOption) {
						$result.append(' <em>(nuevo)</em>');
					}
					return $result;
				}
			});

			// Validación en tiempo real para detectar duplicados
			$('#nombre').on('input', function () {
				var nombre = $(this).val().trim();
				var $warning = $('#duplicate-warning');

				if (nombre.length >= 3) {
					// Realizar consulta AJAX para verificar duplicados
					$.ajax({
						url: 'ajax-select2-organizacion.php',
						type: 'POST',
						data: { search: nombre },
						success: function (response) {
							var data = JSON.parse(response);
							var exists = false;

							// Buscar si el nombre exacto ya existe
							$.each(data.data, function (index, item) {
								if (item.text.toLowerCase() === nombre.toLowerCase()) {
									exists = true;
									return false; // Salir del bucle
								}
							});

							if (exists) {
								$warning.fadeIn();
							} else {
								$warning.fadeOut();
							}
						}
					});
				} else {
					$('#duplicate-warning').fadeOut();
				}
			});

			// Confirmación antes de salir del formulario (previene pérdida de datos)
			window.addEventListener('beforeunload', function (e) {
				var nombre = $('#nombre').val().trim();
				if (nombre !== '') {
					e.preventDefault();
					e.returnValue = '';
					return '';
				}
			});

			// Confirmación al hacer clic en cancelar
			$('a[href="alta_organizacion.php"]').on('click', function (e) {
				var nombre = $('#nombre').val().trim();
				if (nombre !== '') {
					e.preventDefault();
					if (confirm('¿Está seguro que desea abandonar el formulario? Los cambios no guardados se perderán.')) {
						window.location.href = $(this).attr('href');
					}
				}
			});
		});
	</script>
</body>

</html>