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
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        #campos_adicionales {
            display: none;
        }

        .panel {
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        
        .panel-default > .panel-heading {
            color: #333;
            background-color: #f5f5f5;
            border-color: #ddd;
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }
        
        .panel-body {
            padding: 15px;
        }
        
        .panel-title {
            margin-top: 0;
            margin-bottom: 0;
            font-size: 16px;
            color: inherit;
        }

        .report-section {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            padding-bottom: 0px;
            margin-bottom: 20px;
        }

        .report-header {
            background-color: #f5f5f5;
            border-bottom: 1px solid #ddd;
            padding: 10px 15px;
            margin: -15px -15px 15px;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }

        .footer {
            margin-top: 20px;
            padding: 10px 0;
            background-color: #f5f5f5;
            border-top: 1px solid #ddd;
            text-align: center;
        }
        
        @media screen and (max-width: 768px) {
            /* Diseño responsive para dispositivos móviles */
            .container {
                padding: 10px;
            }
            
            .report-section {
                margin-bottom: 15px;
                padding: 10px;
            }
            
            .controls {
                flex-direction: column !important;
                align-items: stretch !important;
            }
            
            .controls select {
                width: 100% !important;
                margin-bottom: 10px !important;
                margin-right: 0 !important;
            }
            
            .controls button {
                width: 100%;
            }
            
            .control-group[style*="flex"] {
                flex-direction: column !important;
                align-items: stretch !important;
            }
            
            .control-group[style*="flex"] label {
                margin-left: 0 !important;
                margin-bottom: 10px;
            }
            
            .control-group[style*="flex"] select {
                width: 100% !important;
                margin-bottom: 10px !important;
            }
        }
    </style>
</head>

<body>
    <p align="right" style="margin: 10px;"><a href="/index.php" class="btn btn-sm btn-primary">Volver al Inicio</a></p>	
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="content">
                    <!-- Panel principal -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon-user"></i> BCFEXA - Módulo de Informes</h3>
                        </div>
                        
                        <div class="panel-body">
                           
                            <!-- Sección de Informe por Unidad Ejecutora -->
                            <div class="report-section">
                                <div class="report-header">
                                    <h4><i class="icon-building"></i> INFORME DE ACTIVIDADES POR UNIDAD EJECUTORA</h4>
                             </div>
                                <form name="form1" id="form1" class="form-horizontal row-fluid" action="busca_por_unidadejecutora.php" target='_blank' method="POST">
                                    <div class="control-group">
                                        <label class="control-label" for="unidad1">Unidad Ejecutora:</label>
                                        <div class="controls" style="display: flex; align-items: center; justify-content: space-between;">
                                            <select class="form-control" id="unidad1" name="unidad1" style="width:400px; margin-right: 10px;" required>
                                                <option value="">Seleccione la UNIDAD a listar:</option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * FROM unidadejecutora ORDER BY Unidad");
                                                if (mysqli_num_rows($query) > 0) {
                                                    while ($valores = mysqli_fetch_array($query)) {
                                                        echo '<option value="' . $valores['Unidad'].'#'.$valores['Id'] . '">' . $valores['Unidad'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <button type="submit" name="input1" id="input1" class="btn btn-sm btn-info">Ver informe <i class="fa-regular fa-file-pdf" style="margin-left: 6px;"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Sección de Informe por Organización -->
                            <div class="report-section">
                                <div class="report-header">
                                    <h4><i class="icon-sitemap"></i> INFORME DE ACTIVIDADES POR ORGANIZACIÓN</h4>
                                </div>
                                <form name="form2" id="form2" class="form-horizontal row-fluid" action="busca_por_organizacion.php" target='_blank' method="POST">
                                    <div class="control-group">
                                        <label class="control-label" for="organizacion1">Tipo de Organización:</label>
                                        <div class="controls" style="display: flex; align-items: center;">
                                            <select class="form-control" name="organizacion1" id="organizacion1" style="width:400px; margin-right: 10px;" required>
                                                <option class="p-6" value="">Seleccione la organización:</option>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * FROM organizacion ORDER BY Nombre");
                                                if (mysqli_num_rows($query) > 0) {
                                                    while ($valores = mysqli_fetch_array($query)) {
                                                        echo '<option value="' . $valores['Nombre'].'#'.$valores['Id'] . '">' . $valores['Nombre'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            
                                                <button type="submit" name="input2" id="input2" class="btn btn-sm btn-info">Ver informe <i class="fa-regular fa-file-pdf" style="margin-left: 6px;"></i></button>
                                           
                                       
                                        </div>
                                    </div>
                                   
                                </form>
                            </div>
                            
                            <!-- Sección de Actividades que deben renovarse -->
                            <div class="report-section">
                                <div class="report-header">
                                    <h4><i class="icon-refresh"></i> INFORME DE ACTIVIDADES QUE DEBEN RENOVARSE</h4>
                                </div>
                                <form name="form3" id="form3" class="form-horizontal row-fluid" action="busca_actividades_renovacion.php" target='_blank' method="POST">
                                    <div class="control-group">
                                        <div class="controls" style="display: flex; align-items: center;">
                                            <p style="margin-right: 20px; margin-bottom: 0;">Este informe muestra todas las actividades que necesitan ser renovadas próximamente.</p>
                                            <button type="submit" name="input3" id="input3" class="btn btn-sm btn-info">Ver informe <i class="fa-regular fa-file-pdf" style="margin-left: 6px;"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Sección de Estadística de Actividades por Año -->
                            <div class="report-section">
                                <div class="report-header">
                                    <h4><i class="icon-bar-chart"></i> ESTADÍSTICA DE ACTIVIDADES POR AÑO</h4>
                                </div>
                                <form name="form4" id="form4" class="form-horizontal row-fluid" action="chart-pie.php" target='_blank' method="POST">
                                    <div class="control-group">
                                        <label class="control-label" for="anio">Seleccionar año a listar:</label>
                                        <div class="controls" style="display: flex; align-items: center;">
                                            <select name="anio" id="anio" class="form-control" style="width: 400px; margin-right: 10px;">
                                                <?php
                                                for($i=date('o'); $i>=1986; $i--){
                                                    if ($i == date('o'))
                                                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                    else
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                }
                                                ?>
                                            </select>
                                            <button type="submit" name="input4" id="input4" class="btn btn-sm btn-info">Ver informe <i class="fa-regular fa-file-pdf" style="margin-left: 6px;"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="footer span-12">
        <div class="container">
            <center><b class="copyright"> BCFEXA - IdeI &copy; <?php echo date("Y") ?> </b></center>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   
</body>
</html>