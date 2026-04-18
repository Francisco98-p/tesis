 <!-- el manejo simple de sesiones es tomado de 
https://www.sourcecodessite.com/create-login-crud-system-using-php-mysql/
-->
<?php
include "conn.php";
//include 'session_dafexa.php';
//$username = $_SESSION['username'];
//$userID = $_SESSION['userID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <head>
		<?php include("head_alta_persona.php");?>
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
				$query = mysqli_query($conn, "SELECT * FROM bcfexa.unidadejecutora WHERE id='$id_delete'");
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
                        <h3 class="panel-title"><i class="icon-user"></i> BCFEXA - Alta de Tipo de Actividad</h3> 
						 
                        </div>
						
                        <div class="panel-body">
							<div class="pull-right">
								<a href="nueva_tipoactividad.php" class="btn btn-sm btn-primary">Nuevos Tipo de Actividad</a>
							</div><br>
							<hr>
						<!--	https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_table_responsive -->
						<div style="overflow-x:auto;">
                                    <table id="lookup" class="table table-bordered table-hover">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	                                    <th>Id</th>
                                        <th>Tipo de Actividad</th>
	                                    <th class="text-center"> Acciones </th> 	
                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
								
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
					"sSearch":         "Buscar por TEXTO COMPLETO (puede indicar por ejemplo 1/86 para locaizar por número u otras formas de contenido en el texto de la norma:",
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
				//	"columnDefs": [ 
				//	   {
                //     "targets": [0,6], // id
                //     "visible": false
                //        },
                 //       {
                  //       "targets": [7,8,9,10,11,12,13,14,15,16,17,18,19],
                   //       "visible": false
                  //      },
				//			 ],
					 									
					"ajax":{
						url :"ajax-tipo-actividad.php", // json datasource
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


