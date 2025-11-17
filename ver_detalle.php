<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCFEXA - Detalles de Actividad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            line-height: 1.6;
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
        
        .section-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-left: 4px solid var(--accent-color);
        }
        
        .section-title {
            color: var(--primary-color);
            border-bottom: 2px solid var(--light-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .info-group {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 6px;
            background-color: #f8f9fa;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        
        .info-value {
            font-size: 1rem;
            color: #333;
            padding: 8px 12px;
            background-color: white;
            border-radius: 4px;
            border: 1px solid #e9ecef;
        }
        
        .readonly-field {
            background-color: #f8f9fa !important;
            color: #6c757d !important;
            border: 1px solid #dee2e6 !important;
        }
        
        .badge-custom {
            background-color: var(--accent-color);
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            margin-right: 5px;
            margin-bottom: 5px;
            display: inline-block;
        }
        
        .text-area-custom {
            width: 100%;
            min-height: 100px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            padding: 12px;
            background-color: #f8f9fa;
            color: #6c757d;
            resize: vertical;
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
        
        .footer-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-color));
            color: white;
            padding: 20px 0;
            margin-top: 30px;
            border-radius: 0 0 10px 10px;
        }
        
        .select-custom {
            background-color: #f8f9fa;
            color: #6c757d;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 8px 12px;
            width: 100%;
        }
        
        .organization-section, .unit-section {
            background-color: #f0f8ff;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }
        
        .person-section {
            background-color: #fff3cd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }
        
        .btn-pdf {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-pdf:hover {
            background: linear-gradient(135deg, #c82333, #bd2130);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
            color: white;
        }
        
        .file-location-section {
            background-color: #f0f8ff;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
        }
        
        @media (max-width: 768px) {
            .section-card {
                padding: 15px;
            }
            
            .info-group {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <?php
    $id = intval($_GET['id']);
    $sql = mysqli_query($conn, "SELECT * FROM actividad WHERE Id='$id'");
    if(mysqli_num_rows($sql) == 0){
        header("Location: index.php");
    }else{
        $row = mysqli_fetch_assoc($sql);
        $Fecha_inicio = $row['Fecha_inicio'];
        
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
            }
        }
    }
    ?>
    
    <div class="container mt-4 mb-4">
        <div class="header-custom text-center">
            <h1><i class="fas fa-university me-2"></i>BCFEXA - Detalles de Actividad</h1>
            <p class="mb-0">Sistema de Gestión de Actividades Institucionales</p>
        </div>
        
        <div class="card-custom">
            <div class="card-header-custom d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><i class="fas fa-eye me-2"></i>Información de la Actividad</h3>
                <a href="index.php" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left me-1"></i>Volver al listado
                </a>
            </div>
            
            <div class="card-body">
                <!-- Información Básica -->
                <div class="section-card">
                    <h4 class="section-title"><i class="fas fa-info-circle me-2"></i>Información Básica</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="info-group">
                                <div class="info-label">Registro</div>
                                <div class="info-value"><?php echo $row['Id']; ?></div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="info-group">
                                <div class="info-label">Tipo de Actividad</div>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM tipoactividad WHERE Id='".$row['TipoActividad_Id']."'");
                                $tipo_actividad = mysqli_fetch_assoc($query);
                                ?>
                                <div class="info-value"><?php echo $tipo_actividad['Nombre']; ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-group">
                                <div class="info-label">Número Convenio Marco</div>
                                <div class="info-value"><?php echo $row['NroConvenioMarco']; ?></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-group">
                                <div class="info-label">Número de Expediente</div>
                                <div class="info-value"><?php echo $row['NroExpediente']; ?></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-group">
                                <div class="info-label">Resolución FCEFN</div>
                                <div class="info-value"><?php echo $row['NroResolucion']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Fechas -->
                <div class="section-card">
                    <h4 class="section-title"><i class="fas fa-calendar-alt me-2"></i>Fechas</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-group">
                                <div class="info-label">Fecha de Inicio</div>
                                <div class="info-value"><?php echo $row['Fecha_inicio']; ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-group">
                                <div class="info-label">Fecha de Fin</div>
                                <div class="info-value"><?php echo $row['Fecha_final']; ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-group">
                                <div class="info-label">Plazo de Renovación (meses)</div>
                                <div class="info-value"><?php echo $row['PlazoRenovacion']; ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-group">
                                <div class="info-label">Renovación Automática</div>
                                <div class="info-value"><?php echo ($row['RenovacionAutomatica'] == '1') ? 'Sí' : 'No'; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Descripción -->
                <div class="section-card">
                    <h4 class="section-title"><i class="fas fa-file-alt me-2"></i>Descripción</h4>
                    <div class="info-group">
                        <div class="info-label">Resumen</div>
                        <textarea class="text-area-custom" readonly><?php echo $row['Resumen']; ?></textarea>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Objetivo</div>
                        <textarea class="text-area-custom" readonly><?php echo $row['Objetivo']; ?></textarea>
                    </div>
                </div>
                
                <!-- Organizaciones -->
                <div class="section-card">
                    <h4 class="section-title"><i class="fas fa-sitemap me-2"></i>Organizaciones Participantes</h4>
                    <div class="organization-section">
                        <?php
                        $query_org = 'SELECT Organizacion_Id, Nombre FROM detalleactividadorganizacion 
                                     JOIN organizacion ON (Organizacion_Id = organizacion.Id) 
                                     WHERE Actividad_Id = '.$row['Id'];
                        $result_org = mysqli_query($conn, $query_org);
                        
                        if(mysqli_num_rows($result_org) > 0) {
                            while($org = mysqli_fetch_assoc($result_org)) {
                                echo '<span class="badge-custom">' . $org['Nombre'] . '</span>';
                            }
                        } else {
                            echo '<div class="text-muted">No se han especificado organizaciones</div>';
                        }
                        ?>
                    </div>
                    
                    <h5 class="mt-3 mb-2"><i class="fas fa-users me-2"></i>RRHH designado por las Organizaciones</h5>
                    <div class="person-section">
                        <?php
                        $query_personas_org = 'SELECT Persona_Id, Nombre FROM detallepersonaactividad
                                              JOIN persona ON (Persona_Id = persona.Id) 
                                              WHERE Actividad_Id = '.$row['Id'].' AND Org_o_Uni = 1';
                        $result_personas_org = mysqli_query($conn, $query_personas_org);
                        
                        if(mysqli_num_rows($result_personas_org) > 0) {
                            while($persona = mysqli_fetch_assoc($result_personas_org)) {
                                echo '<div class="mb-2"><i class="fas fa-user me-2"></i>' . $persona['Nombre'] . '</div>';
                            }
                        } else {
                            echo '<div class="text-muted">No se han especificado responsables de organizaciones</div>';
                        }
                        ?>
                    </div>
                </div>
                
                <!-- Unidades Ejecutoras -->
                <div class="section-card">
                    <h4 class="section-title"><i class="fas fa-building me-2"></i>Unidades Ejecutoras</h4>
                    <div class="unit-section">
                        <?php
                        $query_unidades = 'SELECT UnidadEjecutora_Id, Unidad FROM detalleactividadunidad 
                                          JOIN unidadejecutora ON (UnidadEjecutora_Id = unidadejecutora.Id) 
                                          WHERE Actividad_Id = '.$row['Id'];
                        $result_unidades = mysqli_query($conn, $query_unidades);
                        
                        if(mysqli_num_rows($result_unidades) > 0) {
                            while($unidad = mysqli_fetch_assoc($result_unidades)) {
                                echo '<span class="badge-custom">' . $unidad['Unidad'] . '</span>';
                            }
                        } else {
                            echo '<div class="text-muted">No se han especificado unidades ejecutoras</div>';
                        }
                        ?>
                    </div>
                    
                    <h5 class="mt-3 mb-2"><i class="fas fa-users me-2"></i>RRHH designado por las Unidades</h5>
                    <div class="person-section">
                        <?php
                        $query_personas_uni = 'SELECT Persona_Id, Nombre FROM detallepersonaactividad
                                              JOIN persona ON (Persona_Id = persona.Id) 
                                              WHERE Actividad_Id = '.$row['Id'].' AND Org_o_Uni = 2';
                        $result_personas_uni = mysqli_query($conn, $query_personas_uni);
                        
                        if(mysqli_num_rows($result_personas_uni) > 0) {
                            while($persona = mysqli_fetch_assoc($result_personas_uni)) {
                                echo '<div class="mb-2"><i class="fas fa-user me-2"></i>' . $persona['Nombre'] . '</div>';
                            }
                        } else {
                            echo '<div class="text-muted">No se han especificado responsables de unidades</div>';
                        }
                        ?>
                    </div>
                </div>
                
                <!-- Inversiones -->
                <div class="section-card">
                    <h4 class="section-title"><i class="fas fa-chart-line me-2"></i>Inversiones</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="organization-section">
                                <h5><i class="fas fa-hand-holding-usd me-2"></i>Inversión de la Organización</h5>
                                <div class="info-group">
                                    <div class="info-label">Monto</div>
                                    <div class="info-value"><?php echo $row['InversionOrganizacion']; ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Moneda</div>
                                    <?php
                                    $query_moneda_org = 'SELECT Nombre FROM monedadeinversion WHERE Id = '.$row['MonedaOrganizacion_Id'];
                                    $result_moneda_org = mysqli_query($conn, $query_moneda_org);
                                    $moneda_org = mysqli_fetch_assoc($result_moneda_org);
                                    ?>
                                    <div class="info-value"><?php echo $moneda_org['Nombre']; ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Nota Aclaratoria</div>
                                    <div class="info-value"><?php echo $row['NotaInversionOrganizacion']; ?></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="unit-section">
                                <h5><i class="fas fa-university me-2"></i>Inversión de la FCEFN</h5>
                                <div class="info-group">
                                    <div class="info-label">Monto</div>
                                    <div class="info-value"><?php echo $row['InversionUnidad']; ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Moneda</div>
                                    <?php
                                    $query_moneda_uni = 'SELECT Nombre FROM monedadeinversion WHERE Id = '.$row['MonedaUnidad_Id'];
                                    $result_moneda_uni = mysqli_query($conn, $query_moneda_uni);
                                    $moneda_uni = mysqli_fetch_assoc($result_moneda_uni);
                                    ?>
                                    <div class="info-value"><?php echo $moneda_uni['Nombre']; ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Nota Aclaratoria</div>
                                    <div class="info-value"><?php echo $row['NotaInversionUnidad']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Ubicaciones del Archivo -->
                <div class="section-card">
                    <h4 class="section-title"><i class="fas fa-folder-open me-2"></i>Ubicaciones del Archivo</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-group">
                                <div class="info-label"><i class="fas fa-file me-1"></i>Ubicación Original</div>
                                <div class="info-value">
                                    <?php echo !empty($ubicacion_original) ? $ubicacion_original : '<span class="text-muted">No especificada</span>'; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="info-group">
                                <div class="info-label"><i class="fas fa-copy me-1"></i>Ubicación de la Copia</div>
                                <div class="info-value">
                                    <?php echo !empty($ubicacion_copia) ? $ubicacion_copia : '<span class="text-muted">No especificada</span>'; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="info-group">
                                <div class="info-label"><i class="fas fa-file-pdf me-1"></i>Archivo Digital</div>
                                <div class="info-value">
                                    <?php 
                                    if (!empty($ubicacion_digital)) {
                                        // Verificar si el archivo existe
                                        $archivo_existe = file_exists($ubicacion_digital);
                                        
                                        if ($archivo_existe) {
                                            echo '<a href="' . $ubicacion_digital . '" target="_blank" class="btn btn-sm btn-pdf">
                                                    <i class="fas fa-file-pdf me-1"></i>Ver PDF
                                                  </a>';
                                            echo '<div class="text-muted mt-2" style="font-size: 0.85rem;"><i class="fas fa-check-circle text-success me-1"></i>' . basename($ubicacion_digital) . '</div>';
                                        } else {
                                            echo '<div class="text-warning"><i class="fas fa-exclamation-triangle me-1"></i>Archivo no encontrado</div>';
                                            echo '<div class="text-muted mt-1" style="font-size: 0.85rem;">' . $ubicacion_digital . '</div>';
                                        }
                                    } else {
                                        echo '<span class="text-muted">No especificada</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Botón de volver -->
                <div class="text-center mt-4">
                    <a href="index.php" class="btn btn-primary-custom">
                        <i class="fas fa-arrow-left me-2"></i>Volver al Listado
                    </a>
                </div>
            </div>
        </div>
        
        <div class="footer-custom text-center">
            <p class="mb-0">
                <b class="copyright">
                    <a href="#" class="text-white text-decoration-none">IdeI</a> &copy; <?php echo date("Y"); ?> - Sistema BCFEXA
                </b>
            </p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>