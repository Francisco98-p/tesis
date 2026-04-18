<?php
include 'conn.php';
session_start();

if (isset($_SESSION['userID'])) {

	header('location:index.php');
}

if (isset($_POST['log'])) {

	$user = $_POST['username'];
	$pass = $_POST['pass'];

	$sql = "SELECT * FROM user_tbl where username = '$user' and password = '$pass'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$_SESSION['userID'] = $row['userID'];
			$_SESSION['username'] = $row['username'];
		}
		?>

		<script>window.location = 'index.php';</script>
		<?php


	} else {
		$error_message = "Usuario o Password no válido";
	}
	$conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BCFEXA - Acceso al Sistema</title>

	<link type="text/css" href="css/bootstrap.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
		rel='stylesheet'>

	<style>
		body {
			background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
			font-family: 'Open Sans', sans-serif;
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			margin: 0;
			padding: 20px;
		}

		.login-container {
			background: white;
			border-radius: 8px;
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
			padding: 40px;
			width: 100%;
			max-width: 400px;
			border-top: 4px solid #337ab7;
		}

		.login-header {
			text-align: center;
			margin-bottom: 30px;
		}

		.login-header h2 {
			color: #333;
			font-weight: 600;
			margin-bottom: 10px;
			font-size: 28px;
		}

		.login-header p {
			color: #666;
			margin: 0;
			font-size: 14px;
		}

		.form-group {
			margin-bottom: 20px;
		}

		.form-group label {
			display: block;
			margin-bottom: 5px;
			color: #555;
			font-weight: 600;
			font-size: 14px;
		}

		.form-control {
			width: 100%;
			padding: 12px 15px;
			border: 2px solid #e1e8ed;
			border-radius: 5px;
			font-size: 14px;
			transition: border-color 0.3s ease;
			box-sizing: border-box;
		}

		.form-control:focus {
			outline: none;
			border-color: #337ab7;
			box-shadow: 0 0 0 3px rgba(51, 122, 183, 0.1);
		}

		.btn-login {
			width: 100%;
			padding: 12px;
			background: #337ab7;
			color: white;
			border: none;
			border-radius: 5px;
			font-size: 16px;
			font-weight: 600;
			cursor: pointer;
			transition: background-color 0.3s ease;
			margin-top: 10px;
		}

		.btn-login:hover {
			background: #286090;
		}

		.btn-login:active {
			transform: translateY(1px);
		}

		.alert-error {
			background-color: #f2dede;
			border: 1px solid #ebccd1;
			color: #a94442;
			padding: 10px 15px;
			border-radius: 4px;
			margin-bottom: 20px;
			text-align: center;
			font-size: 14px;
		}

		.footer-text {
			text-align: center;
			margin-top: 30px;
			color: #888;
			font-size: 12px;
		}

		.system-icon {
			display: inline-block;
			width: 60px;
			height: 60px;
			background: #337ab7;
			border-radius: 50%;
			margin-bottom: 20px;
			position: relative;
		}

		.system-icon:before {
			content: "📊";
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			font-size: 24px;
		}

		@media (max-width: 480px) {
			.login-container {
				padding: 30px 20px;
				margin: 10px;
			}

			.login-header h2 {
				font-size: 24px;
			}
		}
	</style>
</head>

<body>
	<div class="login-container">
		<div class="login-header">
			<h2>BCFEXA</h2>
			<p>Sistema de Gestión de Actividades</p>
		</div>

		<?php if (isset($error_message)): ?>
			<div class="alert-error">
				<i class="icon-warning-sign"></i> <?php echo $error_message; ?>
			</div>
		<?php endif; ?>

		<form action="login_bcfexa.php" method="POST">
			<div class="form-group">
				<label for="username">Usuario</label>
				<input type="text" id="username" name="username" class="form-control" placeholder="Ingrese su usuario"
					required autofocus>
			</div>

			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" id="password" name="pass" class="form-control"
					placeholder="Ingrese su contraseña" required>
			</div>

			<button type="submit" name="log" class="btn-login">
				<i class="icon-signin"></i> Iniciar Sesión
			</button>
		</form>

		<div class="footer-text">
			<b>BCFEXA - IdeI &copy; <?php echo date("Y"); ?></b>
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script>
		// Pequeña animación de entrada
		$(document).ready(function () {
			$('.login-container').css({
				'opacity': '0',
				'transform': 'translateY(20px)'
			}).animate({
				'opacity': '1'
			}, 500).css('transform', 'translateY(0)');
		});
	</script>
</body>

</html>