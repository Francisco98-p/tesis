<!-- el manejo simple de sesiones es tomado de 
https://www.sourcecodessite.com/create-login-crud-system-using-php-mysql/
-->
<?php
include "conn.php";
include 'session_bcfexa.php';
$username = $_SESSION['username'];
$userID = $_SESSION['userID'];

// borro registro
if(isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id_delete = intval($_GET['id']);
    $query = mysqli_query($conn, "SELECT * FROM actividad WHERE Id='$id_delete'");
    if(mysqli_num_rows($query) == 0){
        echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
    }else{
        $delete = mysqli_query($conn, "DELETE FROM actividad WHERE Id='$id_delete'");
        if($delete){
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> La actividad ha sido eliminada correctamente.</div>'; 
        }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar la actividad.</div>';
        }
    }
}

// Consultas para estadísticas
// Total de actividades
$query_total = mysqli_query($conn, "SELECT COUNT(*) as total FROM actividad");
$total_actividades = mysqli_fetch_assoc($query_total)['total'];

// Actividades de este mes
$query_mes = mysqli_query($conn, "SELECT COUNT(*) as total FROM actividad WHERE MONTH(Fecha_inicio) = MONTH(CURRENT_DATE()) AND YEAR(Fecha_inicio) = YEAR(CURRENT_DATE())");
$actividades_mes = mysqli_fetch_assoc($query_mes)['total'];

// Actividades completadas (donde Fecha_final < hoy)
$query_completadas = mysqli_query($conn, "SELECT COUNT(*) as total FROM actividad WHERE Fecha_final < CURDATE()");
$actividades_completadas = mysqli_fetch_assoc($query_completadas)['total'];

// Actividades en proceso (donde Fecha_inicio <= hoy AND Fecha_final >= hoy)
$query_proceso = mysqli_query($conn, "SELECT COUNT(*) as total FROM actividad WHERE Fecha_inicio <= CURDATE() AND Fecha_final >= CURDATE()");
$actividades_proceso = mysqli_fetch_assoc($query_proceso)['total'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCFEXA - Módulo de Intranet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            --gray-color: #6c757d;
            --light-gray: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
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
            display: flex;
            align-items: center;
        }
        
        .navbar-brand i {
            margin-right: 10px;
            font-size: 1.8rem;
        }
        
        .sidebar {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .main-content {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 20px;
        }
        
        .card-custom {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 20px;
        }
        
        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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
        
        /* Dropdown styles */
        .dropdown-menu-custom {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 10px;
        }
        
        .dropdown-item-custom {
            border-radius: 6px;
            padding: 8px 15px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .dropdown-item-custom:hover {
            background-color: var(--light-color);
            color: var(--primary-color);
        }
        
        .dropdown-item-custom i {
            width: 20px;
            margin-right: 8px;
        }

        .btn-info-custom {
            background-color: var(--accent-color);
            border: none;
            border-radius: 6px;
            color: white;
            padding: 8px 15px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-info-custom:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .btn-success-custom {
            background-color: var(--success-color);
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-success-custom:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .table-custom {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            font-size: 0.9rem;
        }
        
        .table-custom thead {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }
        
        .table-custom th {
            padding: 12px 8px;
            font-weight: 600;
            border: none;
            font-size: 0.85rem;
        }
        
        .table-custom td {
            padding: 10px 8px;
            border-bottom: 1px solid #e9ecef;
            vertical-align: middle;
            font-size: 0.85rem;
        }
        
        .table-custom tbody tr {
            transition: background-color 0.3s;
        }
        
        .table-custom tbody tr:hover {
            background-color: var(--light-color);
        }
        
        .table-custom tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        .table-custom tbody tr:nth-child(even):hover {
            background-color: var(--light-color);
        }
        
        .search-box {
            background-color: var(--light-color);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .search-box h5 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .footer-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-color));
            color: white;
            padding: 20px 0;
            margin-top: 30px;
        }
        
        .user-info {
            color: white;
            font-weight: 500;
            display: flex;
            align-items: center;
        }
        
        .user-info i {
            margin-right: 8px;
            font-size: 1.2rem;
        }
        
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        
        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            transition: all 0.3s;
        }
        
        .action-btn:hover {
            transform: scale(1.1);
        }
        
        .action-btn.view {
            background-color: var(--accent-color);
        }
        
        .action-btn.edit {
            background-color: var(--warning-color);
        }
        
        .action-btn.delete {
            background-color: var(--danger-color);
        }
        
        .action-btn.pdf {
            background-color: #dc3545;
        }
        
        .stats-card {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            color: white;
            margin-bottom: 20px;
        }
        
        .stats-card.primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        
        .stats-card.success {
            background: linear-gradient(135deg, var(--success-color), #20c997);
        }
        
        .stats-card.warning {
            background: linear-gradient(135deg, var(--warning-color), #fd7e14);
        }
        
        .stats-card.info {
            background: linear-gradient(135deg, var(--accent-color), #17a2b8);
        }
        
        .stats-card i {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        .stats-card .number {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stats-card .label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .badge-container {
            display: flex;
            flex-direction: column;
            gap: 4px;
            align-items: flex-start;
            max-width: 200px;
        }
        
        .badge-container .badge {
            font-size: 0.7rem;
            padding: 4px 6px;
            width: fit-content;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }
        
        .text-truncate-custom {
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: inline-block;
        }
        
        /* Anchos fijos para columnas específicas */
        .table-custom td:nth-child(7),
        .table-custom th:nth-child(7) {
            min-width: 180px;
        }
        
        .table-custom td:nth-child(8),
        .table-custom th:nth-child(8) {
            min-width: 220px;
        }
        
        .table-custom td:nth-child(9),
        .table-custom th:nth-child(9) {
            min-width: 200px;
        }
        
        @media (max-width: 768px) {
            .navbar-brand span {
                display: none;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-responsive {
                width: 100%;
                margin-bottom: 10px;
            }
        }
        
        @media (max-width: 600px) {
            body {
                transform: none;
                width: 100%;
                height: auto;
                position: static;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="#">
                <i class="fas fa-university"></i>
                <span>BCFEXA - Intranet</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle user-info text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>
                            <?php echo $username; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item dropdown-item-custom" href="cambiar_password.php">
                                    <i class="fas fa-key text-primary"></i> Cambiar Contraseña
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item dropdown-item-custom text-danger" href="logout_bcfexa.php">
                                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-4 px-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2">
                <div class="sidebar">
                    <h5 class="mb-3" style="color: var(--primary-color);">Acciones Rápidas</h5>
                    <div class="d-grid gap-2">
                        <a href="registro.php" class="btn btn-success-custom btn-responsive">
                            <i class="fas fa-plus-circle me-2"></i>Ingresar Nueva Actividad
                        </a>
                        <a href="alta_persona.php" class="btn btn-info-custom btn-responsive">
                            <i class="fas fa-user-plus me-2"></i>Alta Persona
                        </a>
                        <a href="alta_unidad_ejecutora.php" class="btn btn-info-custom btn-responsive">
                            <i class="fas fa-building me-2"></i>Alta Unidad Ejecutora
                        </a>
                        <a href="alta_organizacion.php" class="btn btn-info-custom btn-responsive">
                            <i class="fas fa-sitemap me-2"></i>Alta Organización
                        </a>
                        <a href="alta_tipo_actividad.php" class="btn btn-info-custom btn-responsive">
                            <i class="fas fa-tasks me-2"></i>Alta Tipo de Actividad
                        </a>
                        <a href="fpdf/bcfexa_informes2.php" class="btn btn-primary-custom btn-responsive">
                            <i class="fas fa-chart-bar me-2"></i>INFORMES
                        </a>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h5 class="mb-3" style="color: var(--primary-color);">Estadísticas</h5>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="stats-card primary">
                                <i class="fas fa-calendar-check"></i>
                                <div class="number"><?php echo $actividades_mes; ?></div>
                                <div class="label">Iniciadas este mes</div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="stats-card success">
                                <i class="fas fa-check-circle"></i>
                                <div class="number"><?php echo $actividades_completadas; ?></div>
                                <div class="label">Ya finalizadas</div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="stats-card warning">
                                <i class="fas fa-clock"></i>
                                <div class="number"><?php echo $actividades_proceso; ?></div>
                                <div class="label">Actualmente activas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-lg-10">
                <div class="main-content">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 style="color: var(--primary-color);">
                            <i class="fas fa-table me-2"></i>Registro de Actividades
                        </h3>
                    </div>
                    
                    <!-- Search Box -->
                    <div class="search-box">
                        <h5><i class="fas fa-search me-2"></i>Búsqueda Avanzada</h5>
                        <div class="mb-3">
                            <label class="form-label">Buscar por TEXTO COMPLETO:</label>
                            <div class="input-group">
                                <input type="text" class="form-control dataTables_filter_input" placeholder="Ingrese al menos 3 letras...">
                                <button class="btn btn-primary-custom" type="button" onclick="$('.dataTables_filter_input').trigger('keyup')">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Filtrar por FECHA DE INICIO:</label>
                                <div class="input-group">
                                    <span class="input-group-text">FI</span>
                                    <input type="text" class="form-control dataTables_filter_input" placeholder="Ej: FI2023">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Filtrar por FECHA DE FIN:</label>
                                <div class="input-group">
                                    <span class="input-group-text">FF</span>
                                    <input type="text" class="form-control dataTables_filter_input" placeholder="Ej: FF2025">
                                </div>
                            </div>
                        </div>
                        <div class="form-text">
                            <i class="fas fa-info-circle me-1"></i>Presione ENTER para buscar después de ingresar los criterios. Para búsqueda por texto completo, ingrese al menos 3 letras. Para filtrar por FECHA DE INICIO, ingrese <b>FI</b> seguido del año (ej. FI2022). Para filtrar por FECHA DE FIN, ingrese <b>FF</b> seguido del año (ej. FF2025).
                        </div>
                    </div>
                    
    <!-- Data Table -->
                    <div class="table-responsive">
                        <table id="lookup" class="table table-custom table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Acciones</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Tipo de Actividad</th>
                                    <th>Nro Resolución</th>
                                    <th>Unidad Ejecutora</th>
                                    <th>Organización Solicitante</th>
                                    <th>Resumen</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Acciones</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Tipo de Actividad</th>
                                    <th>Nro Resolución</th>
                                    <th>Unidad Ejecutora</th>
                                    <th>Organización Solicitante</th>
                                    <th>Resumen</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-custom">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">
                        <b class="copyright">
                            <a href="#" class="text-white">IdeI</a> &copy; <?php echo date("Y"); ?> ...
                        </b>
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">
                        <i class="fas fa-shield-alt me-1"></i>Sistema Seguro BCFEXA
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Inicializar DataTable con procesamiento server-side
            var dataTable = $('#lookup').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "processing": true,
                "serverSide": true,
                "columnDefs": [{
                    "targets": [0], // id
                    "visible": false
                }],
                "ajax": {
                    url: "ajax-grid-data.php", // json datasource
                    type: "post",  // method, by default get
                    error: function() {  // error handling
                        $(".lookup-error").html("");
                        $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="9">No hay datos disponibles</th></tr></tbody>');
                        $("#lookup_processing").css("display", "none");
                    }
                }
            });
            
            // Conectar los inputs de búsqueda personalizados con DataTable
            $('.dataTables_filter_input').on('keyup', function() {
                var searchValue = $(this).val();
                dataTable.search(searchValue).draw();
            });
            
            // Función para confirmar eliminación con SweetAlert2
            window.confirmDelete = function(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede deshacer y eliminará la actividad permanentemente.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="fas fa-trash-alt me-2"></i>Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true,
                    focusCancel: true,
                    background: '#ffffff',
                    customClass: {
                        popup: 'animated fadeInDown faster',
                        confirmButton: 'btn btn-danger-custom px-4',
                        cancelButton: 'btn btn-secondary px-4'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mostrar cargando antes de redireccionar
                        Swal.fire({
                            title: 'Eliminando...',
                            html: 'Por favor espere un momento.',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });
                        window.location.href = 'index.php?action=delete&id=' + id;
                    }
                });
            };
        });
    </script>
</body>
</html>