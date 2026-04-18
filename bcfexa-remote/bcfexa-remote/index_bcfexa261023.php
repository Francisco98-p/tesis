 <!-- el manejo simple de sesiones es tomado de 
https://www.sourcecodessite.com/create-login-crud-system-using-php-mysql/
-->
<?php
include "conn.php";
include 'session_bcfexa.php';
$username = $_SESSION['username'];
$userID = $_SESSION['userID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <head>
		<?php include("head.php");?>
    </head>
    <body>
	        <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
	
 						
                            <?php
							// borro registro
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
                        <h3 class="panel-title"><i class="icon-user"></i> BCFEXA - Módulo de Intranet</h3> 
						 
                        </div>
						
                        <div class="panel-body">
							<div class="pull-right">
								<a href="alta_persona.php" class="btn btn-sm btn-info">Alta Persona</a>
								<a href="alta_unidad_ejecutora.php" class="btn btn-sm btn-info">Alta Unidad Ejecutora</a>
								<a href="alta_organizacion.php" class="btn btn-sm btn-info">Alta Organización</a>
								<a href="alta_tipo_actividad.php" class="btn btn-sm btn-info">Alta Tipo de Actividad</a>
								<a href="registro.php" class="btn btn-sm btn-primary">Ingresear Nueva Actividad</a>
							</div><br>
							<hr>
<!--	Buscar por columna https://blog.gloin.es/filtros-personalizados-en-datatables/ -->
<div class="row">
  <div class="col-xs-12">
    <label for="dateRangePicker">Fecha de alta</label>
    <input id="dateRangePicker" name="dateRangePicker" type="text" />
    <select id="userTypeFilter">
      <option value="TODOS">TODOS</option>
      <option value="ADMIN">ADMIN</option>
      <option value="USER">USER</option>
    </select>
  </div>
</div>

						<!--	https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_table_responsive -->
						<div style="overflow-x:auto;">
                                    <table id="lookup" class="table table-bordered table-hover">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	                                    <th>Id</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Tipo de Actividad</th>
                                        <th>Nro Resolución</th>
	                                    <th>Unidad Ejecutora</th>
										<th>Organización Solicitante</th>
                                        <th>Resumen</th>
									    <th>Acciones</th>
									<!--/Columnas a agregar, si hacen falta
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
									-->	
                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
										<tfoot>
            <tr>
                                        <th>Id</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Tipo de Actividad</th>
                                        <th>Nro Resolución</th>
	                                    <th>Unidad Ejecutora</th>
										<th>Organización Solicitante</th>
                                        <th>Resumen</th>
									    <th>Acciones</th>              
		    </tr>
        </tfoot>
								
                                    </table>
                            </div>
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
	  // variables para filtro por columna
	     var startDateFilter = "";
         var endDateFilter = "";
         var table;

const DATE_FORMAT = "DD-MM-YYYY";

        $(document).ready(function() {
		
	// Arranca Datable
	// Este link muestra como se busca por columna individual https://datatables.net/examples/api/multi_filter.html
				var dataTable = $('#lookup').DataTable( {
                
				
				 
		  	   "language":	{
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar por TEXTO COMPLETO (puede indicar por ejemplo /22 para actividades del año 2022; cualquier texto de las columnas (ej. STyT)",
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
			    	"pagingType": 'full_numbers',
					"paging": true,	
					 
				// código agregado para ocultar columna de texto completo pero permite buscarla	
				// ejemplo tomado de https://datatables.net/reference/option/columnDefs
				"columnDefs": [ 
								{
									"targets": [0], // id
									"visible": false
								} ,  
						 ],
						    
									 									
					"ajax":{
						//url :"ajax-organizacion1.php", // json datasource
						url :"ajax-grid-data.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">Noooo hay datos sobre esto por acá</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
				
			} );
			
	
    
			</script>
			
		      
    </body>


