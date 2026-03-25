<?php
include "conn.php";
if(isset($_POST['update'])){
	// var_dump($_POST);
				
				$tipo_objeto	= mysqli_real_escape_string($conn,(strip_tags($_POST['tipo_objeto'], ENT_QUOTES)));
				$numero_objeto  	= mysqli_real_escape_string($conn,(strip_tags($_POST['numero_objeto'], ENT_QUOTES)));
				$anio_objeto = mysqli_real_escape_string($conn,(strip_tags($_POST['anio_objeto'], ENT_QUOTES)));
				$extracto  = mysqli_real_escape_string($conn,(strip_tags($_POST['extracto'], ENT_QUOTES)));
				$estado_objeto=mysqli_real_escape_string($conn,(strip_tags($_POST['estado_objeto'], ENT_QUOTES)));
				$texto_completo  = mysqli_real_escape_string($conn,(strip_tags($_POST['texto_completo'], ENT_QUOTES)));
				$archivo=mysqli_real_escape_string($conn,(strip_tags($_POST['archivo'], ENT_QUOTES)));
                $archivo_leido=mysqli_real_escape_string($conn,(strip_tags($_POST['archivo_leido'], ENT_QUOTES)));
				$expediente=mysqli_real_escape_string($conn,(strip_tags($_POST['expediente'], ENT_QUOTES)));
				$palabras_claves=mysqli_real_escape_string($conn,(strip_tags($_POST['palabras_claves'], ENT_QUOTES)));
				$modifica_interpreta_a=mysqli_real_escape_string($conn,(strip_tags($_POST['modifica_interpreta_a'], ENT_QUOTES)));
				$modificada_interpretada_por=mysqli_real_escape_string($conn,(strip_tags($_POST['modificada_interpretada_por'], ENT_QUOTES)));
				$deroga_a=mysqli_real_escape_string($conn,(strip_tags($_POST['deroga_a'], ENT_QUOTES)));
				$derogada_por=mysqli_real_escape_string($conn,(strip_tags($_POST['derogada_por'], ENT_QUOTES)));
				$suspende_a=mysqli_real_escape_string($conn,(strip_tags($_POST['suspende_a'], ENT_QUOTES)));
				$suspendida_por=mysqli_real_escape_string($conn,(strip_tags($_POST['suspendida_por'], ENT_QUOTES)));
				$ratifica_a=mysqli_real_escape_string($conn,(strip_tags($_POST['ratifica_a'], ENT_QUOTES)));
				$ratificada_por=mysqli_real_escape_string($conn,(strip_tags($_POST['ratificada_por'], ENT_QUOTES)));
				$relacionada_con=mysqli_real_escape_string($conn,(strip_tags($_POST['relacionada_con'], ENT_QUOTES)));
				$emisor=mysqli_real_escape_string($conn,(strip_tags($_POST['emisor'], ENT_QUOTES)));
				$id	= intval($_POST['id']);	
                
				if($archivo ==''){  //valido que no cambió el archivo ya grabado
				$archivo=$archivo_leido;
			    }		
				
				$update = mysqli_query($conn, "UPDATE digesto SET tipo_objeto='$tipo_objeto',
				numero_objeto='$numero_objeto',
				anio_objeto='$anio_objeto',
				extracto='$extracto',
				estado_objeto='$estado_objeto',
				texto_completo='$texto_completo',
				archivo='$archivo',
				expediente='$expediente',
				palabras_claves='$palabras_claves',
				modifica_interpreta_a='$modifica_interpreta_a',
				modificada_interpretada_por='$modificada_interpretada_por',
				deroga_a='$deroga_a',
				derogada_por='$derogada_por',
				suspende_a='$suspende_a',
				suspendida_por='$suspendida_por',
				ratifica_a='$ratifica_a',
				ratificada_por='$ratificada_por',
				relacionada_con='$relacionada_con',
				emisor='$emisor' 
				WHERE id='$id'") or die(mysqli_error());
													
					if($update){
					echo "<script>	window.location = 'index.php' </script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			
			}
			
        
								
				
			
  ?>