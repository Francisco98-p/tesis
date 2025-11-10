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
    <!-- Font Awesome local - removido para funcionar sin internet -->
    
    <!-- Select2 CSS -->
    <link href='../buscador/assets/select2v410/css/select2.min.css' rel='stylesheet' type='text/css'>
    
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
        
        @media screen and (max-width: 600px) {
            /* Estilos para dispositivos con un ancho máximo de 600px (generalmente dispositivos móviles) */
            body {
                transform: rotate(90deg);
                transform-origin: left top;
                width: 100vh;
                height: 100vw;
                overflow-x: hidden;
                position: fixed;
                top: 0;
                left: 0;
            }
        }

        /* Estilos para Select2 */
        .select2-container--default .select2-selection--single {
            background-color: white !important;
            border: 2px solid #ddd !important;
            border-radius: 4px !important;
            height: 42px !important;
            line-height: 42px !important;
            transition: all 0.3s ease !important;
        }

        .select2-container--default .select2-selection--single:hover {
            border-color: #337ab7 !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: #337ab7 !important;
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

        /* Dropdown mejorado */
        .select2-dropdown {
            border: 2px solid #ddd !important;
            border-radius: 4px !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #337ab7 !important;
        }
    </style>
</head>

<body>
    <p align="right" style="margin: 10px;"><a href="../index.php" class="btn btn-sm btn-primary">Volver al Inicio</a></p>	
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="content">
                    <!-- Panel principal -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">👤 BCFEXA - Módulo de Informes</h3>
                        </div>
                        
                        <div class="panel-body">
                           
                            <!-- Sección de Informe por Unidad Ejecutora -->
                            <div class="report-section">
                                <div class="report-header">
                                    <h4>INFORME DE ACTIVIDADES POR UNIDAD EJECUTORA</h4>
                             </div>
                                <form name="form1" id="form1" class="form-horizontal row-fluid" action="busca_por_unidadejecutora.php" target='_blank' method="POST">
                                    <div class="control-group">
                                        <label class="control-label" for="unidad1">Unidad Ejecutora:</label>
                                        <div class="controls" style="display: flex; flex-direction: column; align-items: flex-start;">
                                            <select class="form-control" id="unidad1" name="unidad1" style="width:400px; margin-bottom: 10px;" required>
                                                <option value="">Seleccione la UNIDAD a listar:</option>
                                            </select><br>
                                            <button type="submit" name="input1" id="input1" class="btn btn-sm btn-info">Ver informe 📄</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Sección de Informe por Organización -->
                            <div class="report-section">
                                <div class="report-header">
                                    <h4>INFORME DE ACTIVIDADES POR ORGANIZACIÓN</h4>
                                </div>
                                <form name="form2" id="form2" class="form-horizontal row-fluid" action="busca_por_organizacion.php" target='_blank' method="POST">
                                    <div class="control-group">
                                        <label class="control-label" for="organizacion1">Tipo de Organización:</label>
                                        <div class="controls" style="display: flex; flex-direction: column; align-items: flex-start;">
                                            <select class="form-control" name="organizacion1" id="organizacion1" style="width:400px; margin-bottom: 10px;" required>
                                                <option class="p-6" value="">Seleccione la organización:</option>
                                            </select><br>
                                            
                                                <button type="submit" name="input2" id="input2" class="btn btn-sm btn-info">Ver informe 📄</button>
                                           
                                       
                                        </div>
                                    </div>
                                   
                                </form>
                            </div>
                            
                            <!-- Sección de Actividades que deben renovarse -->
                            <div class="report-section">
                                <div class="report-header">
                                    <h4>🔄 INFORME DE ACTIVIDADES QUE DEBEN RENOVARSE</h4>
                                </div>
                                <form name="form3" id="form3" class="form-horizontal row-fluid" action="busca_actividades_renovacion.php" target='_blank' method="POST">
                                    <div class="control-group">
                                        <div class="controls" style="display: flex; flex-direction: column; align-items: flex-start;">
                                            <p style="margin-bottom: 10px;">Este informe muestra todas las actividades que necesitan ser renovadas próximamente.</p>
                                            <button type="submit" name="input3" id="input3" class="btn btn-sm btn-info">Ver informe 📄</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Sección de Estadística de Actividades por Año -->
                            <div class="report-section">
                                <div class="report-header">
                                    <h4> ESTADÍSTICA DE ACTIVIDADES POR AÑO</h4>
                                </div>
                                <form name="form4" id="form4" class="form-horizontal row-fluid" action="chart-pie.php" target='_blank' method="POST">
                                    <div class="control-group">
                                        <label class="control-label" for="anio">Seleccionar año a listar:</label>
                                        <div class="controls" style="display: flex; flex-direction: column; align-items: flex-start;">
                                            <select name="anio" id="anio" class="form-control" style="width: 400px; margin-bottom: 10px;">
                                                <?php
                                                for($i=date('o'); $i>=1986; $i--){
                                                    if ($i == date('o'))
                                                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                    else
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                }
                                                ?>
                                            </select>
                                            <button type="submit" name="input4" id="input4" class="btn btn-sm btn-info">Ver informe 📄</button>
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
    
    <!-- jQuery (necesario para Select2) - Versión local -->
    <script src="../scripts/jquery-3.2.1.js"></script>
    
    <!-- Select2 JS -->
    <script src='../buscador/assets/select2v410/js/select2.min.js'></script>
    <!-- Librería español -->
    <script src="../buscador/assets/select2v410/js/i18n/es.js"></script>
    
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Script para inicializar Select2 -->
    <script>
        $(document).ready(function () {
            // Configuración común para Select2
            var select2Options = {
                allowClear: true,
                language: "es",
                cache: true
            };

            // Unidades Ejecutoras
            $("#unidad1").select2($.extend({}, select2Options, {
                placeholder: "Buscar unidad ejecutora...",
                ajax: {
                    url: "../ajax-select2-unidad-ejecutora.php",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function (response) {
                        // Transformar la respuesta para que tenga el formato correcto
                        return {
                            results: response.map(function(item) {
                                return {
                                    id: item.text + '#' + item.id,
                                    text: item.text
                                };
                            })
                        };
                    }
                }
            }));

            // Organizaciones
            $("#organizacion1").select2($.extend({}, select2Options, {
                placeholder: "Buscar organización...",
                ajax: {
                    url: "../ajax-select2-organizacion.php",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function (response) {
                        // Transformar la respuesta para que tenga el formato correcto
                        return {
                            results: response.map(function(item) {
                                return {
                                    id: item.text + '#' + item.id,
                                    text: item.text
                                };
                            })
                        };
                    }
                }
            }));
        });
    </script>
   
</body>
</html>