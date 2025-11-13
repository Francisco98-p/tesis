<?php
include "conn.php";
//var_dump($_POST);
//echo "sale --->";

//exit;


if(isset($_POST)){
	echo "A C T U A L I Z A N D O !!!!";
				$actividad = mysqli_real_escape_string($conn,(strip_tags($_POST['actividad'], ENT_QUOTES)));
				$nro_convenio_marco  = mysqli_real_escape_string($conn,(strip_tags($_POST['nro_convenio_marco'], ENT_QUOTES)));
				$nro_resolucion	= mysqli_real_escape_string($conn,(strip_tags($_POST['nro_resolucion'], ENT_QUOTES)));
				$nro_expediente	= mysqli_real_escape_string($conn,(strip_tags($_POST['nro_expediente'], ENT_QUOTES)));
				
				$organizacion1 	= mysqli_real_escape_string($conn,(strip_tags($_POST['organizacion1'], ENT_QUOTES)));
				$organizacion2 	= mysqli_real_escape_string($conn,(strip_tags($_POST['organizacion2'], ENT_QUOTES)));
				$organizacion3 	= mysqli_real_escape_string($conn,(strip_tags($_POST['organizacion3'], ENT_QUOTES)));
				$organizacion1_leida = mysqli_real_escape_string($conn,(strip_tags($_POST['organizacion1_leida'], ENT_QUOTES)));
				$organizacion2_leida = mysqli_real_escape_string($conn,(strip_tags($_POST['organizacion2_leida'], ENT_QUOTES)));
				$organizacion3_leida = mysqli_real_escape_string($conn,(strip_tags($_POST['organizacion3_leida'], ENT_QUOTES)));
				
				$responsable_org1  = mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_org1'], ENT_QUOTES)));
				$responsable_org2  = mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_org2'], ENT_QUOTES)));
				$responsable_org3  = mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_org3'], ENT_QUOTES)));
				$responsable_org1_leida  = mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_org1_leida'], ENT_QUOTES)));
				$responsable_org2_leida  = mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_org2_leida'], ENT_QUOTES)));
				$responsable_org3_leida  = mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_org3_leida'], ENT_QUOTES)));
				
				$resumen=mysqli_real_escape_string($conn,(strip_tags($_POST['resumen'], ENT_QUOTES)));
				$objetivo=mysqli_real_escape_string($conn,(strip_tags($_POST['objetivo'], ENT_QUOTES)));
				
				$unidad1=mysqli_real_escape_string($conn,(strip_tags($_POST['unidad1'], ENT_QUOTES)));
				$unidad2=mysqli_real_escape_string($conn,(strip_tags($_POST['unidad2'], ENT_QUOTES)));
				$unidad3=mysqli_real_escape_string($conn,(strip_tags($_POST['unidad3'], ENT_QUOTES)));
				$unidad1_leida=mysqli_real_escape_string($conn,(strip_tags($_POST['unidad1_leida'], ENT_QUOTES)));
				$unidad2_leida=mysqli_real_escape_string($conn,(strip_tags($_POST['unidad2_leida'], ENT_QUOTES)));
				$unidad3_leida=mysqli_real_escape_string($conn,(strip_tags($_POST['unidad3_leida'], ENT_QUOTES)));
				
				$responsable_unidad1=mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_unidad1'], ENT_QUOTES)));
				$responsable_unidad2=mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_unidad2'], ENT_QUOTES)));
				$responsable_unidad3=mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_unidad3'], ENT_QUOTES)));
				$responsable_unidad1_leida=mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_unidad1_leida'], ENT_QUOTES)));
				$responsable_unidad2_leida=mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_unidad2_leida'], ENT_QUOTES)));
				$responsable_unidad3_leida=mysqli_real_escape_string($conn,(strip_tags($_POST['responsable_unidad3_leida'], ENT_QUOTES)));
				
				$fecha_inicio=mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_inicio'], ENT_QUOTES)));
				$fecha_fin  = mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_fin'], ENT_QUOTES)));
				
				$plazo_renovacion=mysqli_real_escape_string($conn,(strip_tags($_POST['plazo_renovacion'], ENT_QUOTES)));
				$renovacion_automatica=mysqli_real_escape_string($conn,(strip_tags($_POST['renovacion_automatica'], ENT_QUOTES)));
				
				$moneda_organizacion=mysqli_real_escape_string($conn,(strip_tags($_POST['moneda_organizacion'], ENT_QUOTES)));
				$monto_inversion_organizacion=mysqli_real_escape_string($conn,(strip_tags($_POST['monto_inversion_organizacion'], ENT_QUOTES)));
				$nota_inversion_organizacion=mysqli_real_escape_string($conn,(strip_tags($_POST['nota_inversion_organizacion'], ENT_QUOTES)));
				
				$moneda_unidad=mysqli_real_escape_string($conn,(strip_tags($_POST['moneda_unidad'], ENT_QUOTES)));
				$monto_inversion_unidad=mysqli_real_escape_string($conn,(strip_tags($_POST['monto_inversion_unidad'], ENT_QUOTES)));
				$nota_inversion_unidad=mysqli_real_escape_string($conn,(strip_tags($_POST['nota_inversion_unidad'], ENT_QUOTES)));
				
				// Nuevos campos: Ubicación del Archivo y Resolución Asociada
				$ubicacion_id = intval($_POST['ubicacion_id']);
				$ubicacion_original = mysqli_real_escape_string($conn,(strip_tags($_POST['ubicacion_original'], ENT_QUOTES)));
				$ubicacion_copia = mysqli_real_escape_string($conn,(strip_tags($_POST['ubicacion_copia'], ENT_QUOTES)));
				$ubicacion_digital = mysqli_real_escape_string($conn,(strip_tags($_POST['ubicacion_digital'], ENT_QUOTES)));
				$nro_resolucion_asociada = mysqli_real_escape_string($conn,(strip_tags($_POST['nro_resolucion_asociada'], ENT_QUOTES)));
				
				$id	= intval($_POST['id']);	
                
				// Actualizar o crear registro de ubicación del archivo
				if ($ubicacion_id > 0) {
					// Actualizar registro existente
					mysqli_query($conn, "UPDATE ubicacionarchivo SET 
						UbicacionOriginal='$ubicacion_original',
						UbicacionCopia='$ubicacion_copia',
						UbicacionDigital='$ubicacion_digital'
						WHERE Id='$ubicacion_id'") or die(mysqli_error($conn));
				} else {
					// Crear nuevo registro si no existe
					mysqli_query($conn, "INSERT INTO ubicacionarchivo (UbicacionOriginal, UbicacionCopia, UbicacionDigital) 
						VALUES('$ubicacion_original', '$ubicacion_copia', '$ubicacion_digital')") or die(mysqli_error($conn));
					$ubicacion_id = mysqli_insert_id($conn);
				}
										 
				// Almaceno datos en tabla Actividad

				$insert = mysqli_query($conn, "UPDATE actividad SET 
				NroResolucion='$nro_resolucion', 
				NroExpediente='$nro_expediente',
				NroConvenioMarco='$nro_convenio_marco',
				Fecha_inicio='$fecha_inicio',
				Fecha_final='$fecha_fin',
				Resumen='$resumen',
				Objetivo='$objetivo',
				TipoActividad_Id='$actividad',
				PlazoRenovacion='$plazo_renovacion',
				RenovacionAutomatica='$renovacion_automatica',
				MonedaOrganizacion_Id='$moneda_organizacion',
				InversionOrganizacion='$monto_inversion_organizacion',
				NotaInversionOrganizacion='$nota_inversion_organizacion',
				MonedaUnidad_Id='$moneda_unidad',
				InversionUnidad='$monto_inversion_unidad',
				NotaInversionUnidad='$nota_inversion_unidad',
				UbicacionArchivo_Id='$ubicacion_id',
				NroResolucion_Asociada='$nro_resolucion_asociada' 
				WHERE id='$id'") or die(mysqli_error());
				
		// Actualizo tabla "detalleactividadorganizacion" 
		//Organizacion1
			if($organizacion1_leida <>0) 
			   { //actualizo en registro porque cambió organizacion1
            	if($organizacion1 <> $organizacion1_leida) 
				 {
				
					 
					if ($organizacion1==0) { //borro el registro
						$insert = mysqli_query($conn, "DELETE FROM detalleactividadorganizacion  WHERE Organizacion_Id=$organizacion1_leida and Actividad_Id='$id'");
					} else {
					         $insert = mysqli_query($conn, "UPDATE detalleactividadorganizacion SET 
			                	Organizacion_Id='$organizacion1' WHERE Organizacion_Id=$organizacion1_leida and Actividad_Id='$id'") or die(mysqli_error());		  
						
			               }
				 }
				} else 
				if($organizacion1 > 0) {
					// creo una entrada para la organización
						mysqli_query($conn, "INSERT INTO detalleactividadorganizacion (Organizacion_Id,Actividad_Id) VALUES('$organizacion1','$id')") ;
			   	
				}
				
		// Organizacion2
               if($organizacion2_leida <>0) 
			   { //actualizo en registro porque cambió organizacion2
            	if($organizacion2 <> $organizacion2_leida) 
				 {
					if ($organizacion2==0) { //borro el registro
						$insert = mysqli_query($conn, "DELETE FROM detalleactividadorganizacion  WHERE Organizacion_Id=$organizacion2_leida and Actividad_Id='$id'");
					} else {
					         $insert = mysqli_query($conn, "UPDATE detalleactividadorganizacion SET 
			                	Organizacion_Id='$organizacion2' WHERE Organizacion_Id=$organizacion2_leida and Actividad_Id='$id'") or die(mysqli_error());		  
						
			               }
				 }
				} else 
				if($organizacion2 > 0) {
					// creo una entrada para la organización
						mysqli_query($conn, "INSERT INTO detalleactividadorganizacion (Organizacion_Id,Actividad_Id) VALUES('$organizacion2','$id')") ;
			   	
				}
						
				
		// Organizacion3
               if($organizacion3_leida <>0) 
			   { //actualizo en registro porque cambió organizacion1
            	if($organizacion3 <> $organizacion3_leida) 
				 {
					if ($organizacion3==0) { //borro el registro
						$insert = mysqli_query($conn, "DELETE FROM detalleactividadorganizacion  WHERE Organizacion_Id=$organizacion3_leida and Actividad_Id='$id'");
					} else {
					         $insert = mysqli_query($conn, "UPDATE detalleactividadorganizacion SET 
			                	Organizacion_Id='$organizacion3' WHERE Organizacion_Id=$organizacion3_leida and Actividad_Id='$id'") or die(mysqli_error());		  
						
			               }
				 }
				} else 
				if($organizacion3 > 0) {
					// creo una entrada para la organización
						mysqli_query($conn, "INSERT INTO detalleactividadorganizacion (Organizacion_Id,Actividad_Id) VALUES('$organizacion3','$id')") ;
			   	
				}
						
	// Actualizo tabla "detalleactividadunidad" 
		// Responsable Unidad1
			if($unidad1_leida <>0) 
			   { //actualizo en registro porque cambió unidad1
            	if($unidad1 <> $unidad1_leida) 
				 {
					if ($unidad1==0) { //borro el registro
						$insert = mysqli_query($conn, "DELETE FROM detalleactividadunidad  WHERE UnidadEjecutora_Id=$unidad1_leida and Actividad_Id='$id'");
					} else {
					         $insert = mysqli_query($conn, "UPDATE detalleactividadunidad SET 
			                	UnidadEjecutora_Id='$unidad1' WHERE UnidadEjecutora_Id=$unidad1_leida and Actividad_Id='$id'") or die(mysqli_error());		  
						
			               }
				 }
				} else 
				if($unidad1 > 0 && $unidad1 <> $unidad1_leida) {
					// creo una entrada para la unidad
						mysqli_query($conn, "INSERT INTO detalleactividadunidad (UnidadEjecutora_Id,Actividad_Id) VALUES('$unidad1','$id')") ;
			   	
				}
				
		// Unidad2
               if($unidad2_leida <>0) 
			   { //actualizo en registro porque cambió unidad2
            	if($unidad2 <> $unidad2_leida) 
				 {
					if ($unidad2==0) { //borro el registro
						$insert = mysqli_query($conn, "DELETE FROM detalleactividadunidad  WHERE UnidadEjecutora_Id=$unidad2_leida and Actividad_Id='$id'");
					} else {
					         $insert = mysqli_query($conn, "UPDATE detalleactividadunidad SET 
			                	UnidadEjecutora_Id='$unidad2' WHERE UnidadEjecutora_Id=$unidad2_leida and Actividad_Id='$id'") or die(mysqli_error());		  
						
			               }
				 }
				} else 
				if($unidad2 > 0 && $unidad2 <> $unidad2_leida) {
					// creo una entrada para la unidad
						mysqli_query($conn, "INSERT INTO detalleactividadunidad (UnidadEjecutora_Id,Actividad_Id) VALUES('$unidad2','$id')") ;
			   	
				}
						
				
		// Unidad3
               if($unidad3_leida <>0) 
			   { //actualizo en registro porque cambió unidad2
            	if($unidad3 <> $unidad3_leida) 
				 {
					if ($unidad3==0) { //borro el registro
						$insert = mysqli_query($conn, "DELETE FROM detalleactividadunidad  WHERE UnidadEjecutora_Id=$unidad3_leida and Actividad_Id='$id'");
					} else {
					         $insert = mysqli_query($conn, "UPDATE detalleactividadunidad SET 
			                	UnidadEjecutora_Id='$unidad3' WHERE UnidadEjecutora_Id=$unidad3_leida and Actividad_Id='$id'") or die(mysqli_error());		  
						
			               }
				 }
				} else 
				if($unidad3 > 0 && $unidad3 <> $unidad3_leida) {
					// creo una entrada para la unidad
						mysqli_query($conn, "INSERT INTO detalleactividadunidad (UnidadEjecutora_Id,Actividad_Id) VALUES('$unidad3','$id')") ;
			   	
				}
				
				
		 // Actualizo tabla "detallepersonactividad" 
			// El campo Org_o_Uni debe tener 1 si es $responsable_org1
			// El campo Org_o_Uni debe tener 2 si es $responsable_unidad1
			// El campos Rol_Id siempre almacena un 2 (al menos en esta primer versión)
			//   	mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
			//	                                                   VALUES('$ultimo_id','$responsable_unidad1','2','2')"); 
		//Responsable Unidad1
			if($responsable_unidad1_leida <>0) 
			   { //actualizo en registro porque cambió unidad1
            	if($responsable_unidad1 <> $responsable_unidad1_leida) 
				 {
					if ($responsable_unidad1==0) { //borro el registro
						$insert = mysqli_query($conn, "DELETE FROM detallepersonaactividad  WHERE Persona_Id=$responsable_unidad1_leida and Actividad_Id='$id'");
					} else {
					         $insert = mysqli_query($conn, "UPDATE detallepersonaactividad SET 
			                	Persona_Id='$responsable_unidad1' WHERE Persona_Id=$responsable_unidad1_leida and Actividad_Id='$id'") or die(mysqli_error());		  
						
			               }
				 }
				} else 
				if($responsable_unidad1 > 0) {
					// creo una entrada para la organización
					mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
			                             VALUES('$id','$responsable_unidad1','2','2')"); 
						
				}
				
			
		//Responsable Unidad2
			if($responsable_unidad2_leida <>0) 
			   { //actualizo en registro porque cambió unidad1
            	if($responsable_unidad2 <> $responsable_unidad2_leida) 
				 {
					if ($responsable_unidad2==0) { //borro el registro
						$insert = mysqli_query($conn, "DELETE FROM detallepersonaactividad  WHERE Persona_Id=$responsable_unidad2_leida and Actividad_Id='$id'");
					} else {
					         $insert = mysqli_query($conn, "UPDATE detallepersonaactividad SET 
			                	Persona_Id='$responsable_unidad2' WHERE Persona_Id=$responsable_unidad2_leida and Actividad_Id='$id'") or die(mysqli_error());		  
						
			               }
				 }
				} else 
				if($responsable_unidad2 > 0) {
					// creo una entrada para la organización
					mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
			                             VALUES('$id','$responsable_unidad2','2','2')"); 
						
				}
				
						
		//Responsable Unidad3
			if($responsable_unidad3_leida <>0) 
			   { //actualizo en registro porque cambió unidad1
            	if($responsable_unidad3 <> $responsable_unidad3_leida) 
				 {
					if ($responsable_unidad3==0) { //borro el registro
						$insert = mysqli_query($conn, "DELETE FROM detallepersonaactividad  WHERE Persona_Id=$responsable_unidad3_leida and Actividad_Id='$id'");
					} else {
					         $insert = mysqli_query($conn, "UPDATE detallepersonaactividad SET 
			                	Persona_Id='$responsable_unidad3' WHERE Persona_Id=$responsable_unidad3_leida and Actividad_Id='$id'") or die(mysqli_error());		  
						
			               }
				 }
				} 
				else 
				if($responsable_unidad3 > 0) {
					// creo una entrada para la unidad3
					mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
			                             VALUES('$id','$responsable_unidad3','2','2')"); 
						
				}
		
		//Responsable Organizacion1
			if($responsable_org1_leida <>0) 
			   { //actualizo en registro porque cambió org1
		   
            	if($responsable_org1 <> $responsable_org1_leida) 
				 {
					if ($responsable_org1==0) { //borro el registro
						$insert = mysqli_query($conn, "DELETE FROM detallepersonaactividad  WHERE Persona_Id=$responsable_org1_leida and Actividad_Id='$id'");
					} else {
					         $insert = mysqli_query($conn, "UPDATE detallepersonaactividad SET 
			                	Persona_Id='$responsable_org1' WHERE Persona_Id=$responsable_org1_leida and Actividad_Id='$id'");		  
						
			               }
				 }
				} else 
				if($responsable_org1 > 0) {
					// creo una entrada para la organización
					mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
			                             VALUES('$id','$responsable_org1','1','2')"); 
						
				}
				
			
		//Responsable Org2
			if($responsable_org2_leida <>0) 
			   { //actualizo en registro porque cambió org2
            	if($responsable_org2 <> $responsable_org2_leida) 
				 {
					if ($responsable_org2==0) { //borro el registro
						$insert = mysqli_query($conn, "DELETE FROM detallepersonaactividad  WHERE Persona_Id=$responsable_org2_leida and Actividad_Id='$id'");
					} else {
					         $insert = mysqli_query($conn, "UPDATE detallepersonaactividad SET 
			                	Persona_Id='$responsable_org2' WHERE Persona_Id=$responsable_org2_leida and Actividad_Id='$id'") or die(mysqli_error());		  
						
			               }
				 }
				} else 
				if($responsable_org2 > 0) {
					// creo una entrada para la organización
					mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
			                             VALUES('$id','$responsable_org2','1','2')"); 
						
				}
				
						
		//Responsable Org3
			if($responsable_org3_leida <>0) 
			   { //actualizo en registro porque cambió org3
            	if($responsable_org3 <> $responsable_org3_leida) 
				 {
					if ($responsable_org3==0) { //borro el registro
						$insert = mysqli_query($conn, "DELETE FROM detallepersonaactividad  WHERE Persona_Id=$responsable_org3_leida and Actividad_Id='$id'");
					} else {
					         $insert = mysqli_query($conn, "UPDATE detallepersonaactividad SET 
			                	Persona_Id='$responsable_org3' WHERE Persona_Id=$responsable_org3_leida and Actividad_Id='$id'") or die(mysqli_error());		  
						
			               }
				 }
				} else 
				if($responsable_org3 > 0) {
					// creo una entrada para la organización
					mysqli_query($conn, "INSERT INTO detallepersonaactividad (Actividad_Id,Persona_Id,Org_o_Uni,Rol_Id) 
			                             VALUES('$id','$responsable_org3','1','2')"); 
						
				}
				
				
				echo "<script>	window.location = 'index.php' </script>";
			           
			
			
						
								
}	//if(isset($_POST))
			
  ?>