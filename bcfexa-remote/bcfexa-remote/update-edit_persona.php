<?php
include "conn.php";
//echo '<script language="javascript">alert($_POST);</script>';
if(isset($_POST['update'])){
	//var_dump($_POST);
	//exit;
			
				$nombre  = mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
				$titulo = mysqli_real_escape_string($conn,(strip_tags($_POST['titulo'], ENT_QUOTES)));
				$id	= intval($_POST['id']);	
                
				$update = mysqli_query($conn, "UPDATE persona SET Nombre='$nombre', Titulo='$titulo' WHERE Id='$id'");

													
			if($update){
				echo "<script>	window.location = 'alta_persona.php' </script>";
			           }else{
				         	echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
			                }
			
			}
			
        
		
			
				
			
  ?>