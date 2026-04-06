<?php
include 'conn.php';
include 'session_bcfexa.php';

$username = $_SESSION['username'];
$userID = $_SESSION['userID'];

$message = "";
$message_type = "";

if (isset($_POST['change_password'])) {
    $current_pass = $_POST['current_password'];
    $new_pass = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];

    // Verificar contraseña actual
    $sql = "SELECT password FROM user_tbl WHERE userID = '$userID'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row['password'] === $current_pass) {
        if ($new_pass === $confirm_pass) {
            // Actualizar contraseña
            $update_sql = "UPDATE user_tbl SET password = '$new_pass' WHERE userID = '$userID'";
            if ($conn->query($update_sql)) {
                $message = "Contraseña actualizada exitosamente.";
                $message_type = "success";
            } else {
                $message = "Error al actualizar la contraseña: " . $conn->error;
                $message_type = "danger";
            }
        } else {
            $message = "La nueva contraseña y su confirmación no coinciden.";
            $message_type = "warning";
        }
    } else {
        $message = "La contraseña actual es incorrecta.";
        $message_type = "danger";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCFEXA - Cambiar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1a4b8c;
            --secondary-color: #2c6eb5;
            --accent-color: #4c9ae8;
            --light-color: #e9f2fb;
            --dark-color: #0d2b4e;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
        }
        
        .main-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .card-custom {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
        }
        
        .card-header-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 25px;
            text-align: center;
            border: none;
        }
        
        .card-body {
            padding: 40px;
            background: white;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .form-control {
            padding: 12px;
            border-radius: 8px;
            border: 2px solid #e1e8ed;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(76, 154, 232, 0.25);
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 700;
            width: 100%;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            filter: brightness(1.1);
        }
        
        .footer-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-color));
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-university me-2"></i>BCFEXA - Intranet
            </a>
        </div>
    </nav>

    <div class="main-container">
        <div class="card card-custom">
            <div class="card-header-custom">
                <h4><i class="fas fa-key me-2"></i>Cambiar Contraseña</h4>
                <p class="mb-0 opacity-75">Usuario: <?php echo $username; ?></p>
            </div>
            <div class="card-body">
                <?php if ($message): ?>
                    <div class="alert alert-<?php echo $message_type; ?> alert-dismissible fade show" role="alert">
                        <i class="fas <?php echo ($message_type == 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'); ?> me-2"></i>
                        <?php echo $message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form method="POST" action="cambiar_password.php">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Contraseña Actual</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-2 border-end-0"><i class="fas fa-lock text-muted"></i></span>
                            <input type="password" class="form-control border-start-0" id="current_password" name="current_password" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Nueva Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-2 border-end-0"><i class="fas fa-key text-muted"></i></span>
                            <input type="password" class="form-control border-start-0" id="new_password" name="new_password" required minlength="4">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="form-label">Confirmar Nueva Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-2 border-end-0"><i class="fas fa-shield-alt text-muted"></i></span>
                            <input type="password" class="form-control border-start-0" id="confirm_password" name="confirm_password" required>
                        </div>
                    </div>
                    <button type="submit" name="change_password" class="btn btn-primary btn-primary-custom">
                        <i class="fas fa-save me-2"></i>Guardar Cambios
                    </button>
                    <a href="index.php" class="back-link">
                        <i class="fas fa-arrow-left me-1"></i> Volver al Inicio
                    </a>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer-custom">
        <div class="container">
            <p class="mb-0"><b>BCFEXA - IdeI</b> &copy; <?php echo date("Y"); ?></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
