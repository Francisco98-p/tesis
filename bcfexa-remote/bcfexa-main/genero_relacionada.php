<?php
  
  function modificada_por() {
     $modificada_por=explode(",",$row["modificada_interpretada_por"]);
	 for($i = 0, $size = count($modificada_por); $i < $size; ++$i) {
    	  $modificada_por[$i]=trim($modificada_por[$i]);
		  if (strlen($modificada_por[$i]) > 0 ) { // chequeo que exista el string
			  
			  $posicion_barra = strpos($modificada_por[$i], "/"); 
			  $anio_leido= substr($modificada_por[$i],-2); // separo el año y le agrego 19 o 20
			  if ($anio_leido > 85 ) 
			   { $anio_leido='19'.$anio_leido;} 
		      else { $anio_leido='20'.$anio_leido;};
			  
			 $tipo_leido=strtoupper(substr($modificada_por[$i],0,1)); // separo si es ordenanza o resolucion
			  
	         $nombre_archivo= strtoupper(substr($modificada_por[$i],0,$posicion_barra));
			 $camino_archivo='deposito/'.$tipo_leido.$anio_leido.'/'.$nombre_archivo.'-'.$anio_leido.'-CD-FCEFN_OCR.pdf'; 
	         
			 $modificada_por[$i]="<b>Modificada por </b>".
		      "<a href=".$camino_archivo." target='_blank' class='btn btn-danger' role='button'>".$modificada_por[$i]."</a>";
		   }
	 }
  }
  
?>
	