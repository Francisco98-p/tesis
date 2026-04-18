<?php
include "conn.php";
//echo '<script language="javascript">alert($_POST);</script>';
if(isset($_POST['update'])){
	
			
				$nombre  = mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
				$id	= intval($_POST['id']);	
                
				$update = mysqli_query($conn, "UPDATE tipoactividad SET Nombre='$nombre' WHERE Id='$id'");

													
			if($update){
				echo "<script>	window.location = 'alta_tipo_actividad.php' </script>";
			           }else{
				         	echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
			                }
			
			}
			
        
		
			
				
			
  ?>