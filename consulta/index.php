 <!-- el manejo simple de sesiones es tomado de 
https://www.sourcecodessite.com/create-login-crud-system-using-php-mysql/
-->
<?php
//include "conn.php";
//include 'session_dafexa.php';
//$username = $_SESSION['username'];
//$userID = $_SESSION['userID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <head>
		<?php include("head.php");?>
    </head>
    <body>
	 <!--
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="#" target="_blank">DAFEXA LUIS - Digesto Admisitrativo Facultad de Exactas</a>
                   
                   
                </div>
            </div>nuev
            /navbar-inner
        </div><br />
      -->
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
             if(isset($_GET['action']) == 'delete') {
				$id_delete = intval($_GET['id']);
				$query = mysqli_query($conn, "SELECT * FROM digesto WHERE id='$id_delete'");
				if(mysqli_num_rows($query) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($conn, "DELETE FROM digesto WHERE id='$id_delete'");
					if($delete){
					 // echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Luis, los datos han sido eliminados correctamente.</div>'; 
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
			}
			?>
                    <div class="panel panel-default">
                       <div class="panel-heading">
                        <h4 class="panel-title">DAFEXA - Módulo de Consulta</h4> 
						Cómo Buscar: <ul>
							<li> Por Ordenanza: Ingrese una letra <b>O</b> y el número, seguidamente una <b>/</b> y los dos últimos digitos del año (ej. O1/86)
							<li> Por Resolución: Ingrese una letra <b>R</b> y el número, seguidamente una <b>/</b> y los dos últimos digitos del año (ej. R21/22)
						    <li> Por Texto Completo: Ingrese una o más palabras del contenido buscado (ej. Instituto de Informática)
						    <li> Resumen de TODAS las ORDENANZAS emitidas en un año: Ingrese una letra <b>O</b>, seguidamente el año buscado (ej. O2021)
						    <li> Resumen de TODAS las RESOLUCIONES emitidas en un año: Ingrese una letra <b>R</b>, seguidamente el año buscado (ej. R2021)
						    
                        </div>
						
                      	
                                    <table id="lookup" class="table table-bordered table-hover">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	  
                                        <th>ID</th>
	                                    <th>Normativa</th>
                                        <th>Número</th>
                                        <th>Fecha</th>
									    <th>Extracto</th>
										<th>Estado</th>
										<th>Texto Completo</th>
										<th>Archivo</th>
										<th>8</th>
	                                    <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
									    <th>12</th>
										<th>13</th>
										<th>14</th>
										<th>15</th>
										<th>16</th>
	                                    <th>17</th>
                                        <th>18</th>
                                        <th>19</th>
										<th>Normativa Relacionada</th>
									    <th class="text-center"> Acciones </th> 
	  
                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
										<tfoot>
            <tr>
                <th>Id</th>
				<th>Objeto</th>
                <th>Número</th>
                <th>Año</th>
                <th>Extracto</th>
                <th>Estado</th>
				<th>Texto Completo</th>
                <th>Archivo</th>
				<th>nroyaño</th>
            </tr>
        </tfoot>
                                    </table>
                            
                                </div>
                            </div>
                            
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
              <center> <b class="copyright"><a href="#"> IdeI</a> &copy; <?php echo date("Y")?> ... </b></center>
            </div>
        </div>
		
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
		
      
	  <script>
        $(document).ready(function() {
		
	// Arranca Datable
	// Este link muestra como se busca por columna individual https://datatables.net/examples/api/multi_filter.html
				var dataTable = $('#lookup').DataTable( {
				    // la clausula dom:  permite cambiar de lugar los campos 
				    //https://datatables.net/release-datatables/examples/basic_init/dom.html	
                  dom: '<"top"f>rt<"bottom"ilp><"clear">',
		  	   "language":	{
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Qué Busca?:",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					},
					"oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
				},
                   
					"processing": true,
					"serverSide": true,
					
					
				// código agregado para ocultar columna de texto completo pero permite buscarla	
				// ejemplo tomado de https://datatables.net/reference/option/columnDefs
					"columnDefs": [ 
					   {
                     "targets": [0,6], // id
                     "visible": false
                        },
                        {
                         "targets": [7,8,9,10,11,12,13,14,15,16,17,18,19],
                          "visible": false
                        },
							 ],
					 									
					"ajax":{
						url :"ajax-grid-data.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">Luis Alberto, no hay datos sobre esto por acá</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
			</script>
			
		      
    </body>


