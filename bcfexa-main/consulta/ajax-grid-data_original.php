<?php

 include "conn.php";

/* Database connection end */

// para ver PANELES DE BUSQUEDA https://www.youtube.com/watch?v=8hTixp3-xXE


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


// separo en un array cada frase (espacio en blanco)
$texto_completo_query=explode(" ",$requestData['search']['value']);
$armo_query_texto=" OR (texto_completo ";
foreach ($texto_completo_query as $value) {
  $armo_query_texto=$armo_query_texto.' LIKE "%'. $value.'%" and texto_completo '; 
}
$armo_query_texto=substr($armo_query_texto, 0, -20).") "; 


$columns = array( 
// datatable column index  => database column name
	0 => 'id',
    1 => 'tipo_objeto', 
	2 => 'numero_objeto',
	3 => 'anio_objeto',
    4 => 'extracto',
    5 => 'estado_objeto',
    6 => 'texto_completo',
	7 => 'archivo',
	8 => 'expediente',
    9 => 'palabras_claves', 
	10 => 'modifica_interpteta_a',
	11 => 'modificada_interpretada_por',
    12 => 'deroga_a',
    13 => 'derogada_por',
    14 => 'suspende_a',
	15 => 'suspendida_por',
	17 => 'ratifica_a',
	18 => 'ratificada_por',
	19 => 'relacionada_con',
	20 => 'emisor',	
	21 => 'nro_anio'
	
);

// getting total number records without any search
$sql = "SELECT id, tipo_objeto, numero_objeto, anio_objeto, extracto, estado_objeto, texto_completo, archivo, ";
$sql .= "expediente, palabras_claves, modifica_interpreta_a, modificada_interpretada_por, deroga_a, derogada_por, suspende_a, suspendida_por, ratifica_a, ratificada_por, relacionada_con, emisor ";
$sql.=" FROM digesto ORDER BY tipo_objeto, right('0000' + CAST( numero_objeto as char),5) "; //ordena por tipo y numero

$query=mysqli_query($conn, $sql); // or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

 
if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT id, tipo_objeto, numero_objeto, anio_objeto, extracto, estado_objeto, texto_completo, archivo, ";
    $sql .= "expediente, palabras_claves, modifica_interpreta_a, modificada_interpretada_por, deroga_a, derogada_por, suspende_a, suspendida_por, ratifica_a, ratificada_por, relacionada_con, emisor ";
	$sql.=" FROM digesto";
	//$sql.=" WHERE numero_objeto LIKE '%Orde%' ";    // $requestData['search']['value'] contains search parameter

	$sql.=" WHERE tipo_objeto LIKE '%".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR numero_objeto LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR anio_objeto LIKE '%".$requestData['search']['value']."%' ";
    $sql.=" OR extracto LIKE '%".$requestData['search']['value']."%' ";
    $sql.=" OR estado_objeto LIKE '%".$requestData['search']['value']."%' ";
    $sql.=" OR texto_completo LIKE '%".$requestData['search']['value']."%' ";
    
	$sql.=$armo_query_texto; // acá se realiza la búsqueda a texto completo en la resolución 
    
	$sql.=" OR concat(numero_objeto,'/',substr(CAST(anio_objeto AS char),3,2)) = '".$requestData['search']['value']."'";
    $sql.=" OR concat('O',numero_objeto,'/',substr(CAST(anio_objeto AS char),3,2)) = '".$requestData['search']['value']."'";
    $sql.=" OR concat('R',numero_objeto,'/',substr(CAST(anio_objeto AS char),3,2)) = '".$requestData['search']['value']."'";

    $sql.=" OR concat('0',numero_objeto,'/',substr(CAST(anio_objeto AS char),3,2)) = '".$requestData['search']['value']."'";
    $sql.=" OR concat('R0',numero_objeto,'/',substr(CAST(anio_objeto AS char),3,2)) = '".$requestData['search']['value']."'";
    $sql.=" OR concat('O0',numero_objeto,'/',substr(CAST(anio_objeto AS char),3,2)) = '".$requestData['search']['value']."'";
   
  $sql.=" OR concat('0',numero_objeto,'/',substr(CAST(anio_objeto AS char),3,2)) = '".$requestData['search']['value']."'";
  $sql.=" OR concat('0',numero_objeto,'/',substr(CAST(anio_objeto AS char),3,2)) = '".$requestData['search']['value']."'";

	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search
                                              // result without limit in the query 

	// $requestData['order'][0]['column'] contains colmun index, 
	// $requestData['order'][0]['dir'] contains order such as asc/desc 
	// $requestData['start'] contains start row number ,
	// $requestData['length'] contains limit length.
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit
	
} else {	
        $sql = "SELECT id, tipo_objeto, numero_objeto, anio_objeto, extracto, estado_objeto, texto_completo, archivo, ";
        $sql .= "expediente, palabras_claves, modifica_interpreta_a, modificada_interpretada_por, deroga_a, derogada_por, suspende_a, suspendida_por, ratifica_a, ratificada_por, relacionada_con, emisor ";
		$sql.=" FROM digesto";
	    $sql.=" ORDER BY anio_objeto desc ,numero_objeto DESC LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	// $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
    // OJO: esta modificación garantiza que salga ordenado por fecha descendente pero elimina el ordenamiento de las columnas.... para analizar
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 



	$nestedData[] = $row["id"];
    $nestedData[] = $row["tipo_objeto"];
	$nestedData[] = $row["numero_objeto"];
	 $fecha = strtotime($row["anio_objeto"]); 
	 $fecha= date("d-m-Y", $fecha);
	$nestedData[] = $fecha;
    $nestedData[] = $row["extracto"];
	
    $nestedData[] = $row["estado_objeto"].$armo_query_texto;
	$nestedData[] = $row["texto_completo"];
	$nestedData[] = $row["archivo"];
	$nestedData[] = $row["expediente"];
    $nestedData[] = $row["palabras_claves"];
	$nestedData[] = $row["modifica_interpreta_a"];
	$nestedData[] = $row["modificada_interpretada_por"];
    $nestedData[] = $row["deroga_a"];
    $nestedData[] = $row["derogada_por"];
	$nestedData[] = $row["suspende_a"];
	$nestedData[] = $row["suspendida_por"];
	$nestedData[] = $row["ratifica_a"];
    $nestedData[] = $row["ratificada_por"];
	$nestedData[] = $row["relacionada_con"];
	$nestedData[] = $row["emisor"];
	// columna 20 muestra Nomativas relacionadas
	   $modifica_a=explode(",",$row["modifica_interpreta_a"]);
	  for($i = 0, $size = count($modifica_a); $i < $size; ++$i) {
    	   $modifica_a[$i]="<b>Modifica a </b>".$modifica_a[$i];
		   $salvadora= $modifica_a[$i];
		   switch ($salvadora) {
            case "<b>Modifica a </b>":
                unset($modifica_a[$i]);
                  break;
            }
	  } 
	   
       $modificada_por=explode(",",$row["modificada_interpretada_por"]);
	 for($i = 0, $size = count($modificada_por); $i < $size; ++$i) {
    	   $modificada_por[$i]="<b>Modificada por </b>".$modificada_por[$i];
		   $salvadora= $modificada_por[$i];
		    switch ($salvadora) {
            case "<b>Modificada por </b>":
                unset($modificada_por[$i]);
                  break;
            }
	  }
	$deroga_a=explode(",",$row["deroga_a"]);
	for($i = 0, $size = count($deroga_a); $i < $size; ++$i) {
    	   $deroga_a[$i]="<b>Deroga a </b>".$deroga_a[$i];
		   $salvadora= $deroga_a[$i];
		    switch ($salvadora) {
            case "<b>Deroga a </b>":
                unset($deroga_a[$i]);
                  break;
            }
	  }
	
	$derogada_por=explode(",",$row["derogada_por"]);
	for($i = 0, $size = count($derogada_por); $i < $size; ++$i) {
    	   $derogada_por[$i]="<b>Derogada por </b>".$derogada_por[$i];
		   $salvadora= $derogada_por[$i];
		    switch ($salvadora) {
            case "<b>Derogada por </b>":
                unset($derogada_por[$i]);
                  break;
            }
	  }
	
	$suspende_a=explode(",",$row["suspende_a"]);
	for($i = 0, $size = count($suspende_a); $i < $size; ++$i) {
    	   $suspende_a[$i]="<b>Suspende a </b>".$suspende_a[$i];
		   $salvadora= $suspende_a[$i];
		    switch ($salvadora) {
            case "<b>Suspende a </b>":
                unset($suspende_a[$i]);
                  break;
            }
	  }
	
	$suspendida_por=explode(",",$row["suspendida_por"]);
	for($i = 0, $size = count($suspendida_por); $i < $size; ++$i) {
    	   $suspendida_por[$i]="<b>Suspendida por </b>".$suspendida_por[$i];
		   $salvadora= $suspendida_por[$i];
		    switch ($salvadora) {
            case "<b>Suspendida por </b>":
                unset($suspendida_por[$i]);
                  break;
            }
	  }
	
	
	$ratifica_a=explode(",",$row["ratifica_a"]);
    for($i = 0, $size = count($ratifica_a); $i < $size; ++$i) {
    	   $ratifica_a[$i]="<b>Ratifica a </b>".$ratifica_a[$i];
		   $salvadora= $ratifica_a[$i];
		    switch ($salvadora) {
            case "<b>Ratifica a </b>":
                unset($ratifica_a[$i]);
                  break;
            }
	  }
	
	
	$ratificada_por=explode(",",$row["ratificada_por"]);
	 for($i = 0, $size = count($ratificada_por); $i < $size; ++$i) {
    	   $ratificada_por[$i]="<b>Ratificada por </b>".$ratificada_por[$i];
		   $salvadora= $ratificada_por[$i];
		    switch ($salvadora) {
            case "<b>Ratificada por </b>":
                unset($ratificada_por[$i]);
                  break;
            }
	  }
	
	$relacionada_con=explode(",",$row["relacionada_con"]);
	 for($i = 0, $size = count($relacionada_con); $i < $size; ++$i) {
    	   $relacionada_con[$i]="<b>Relacionada con </b>".$relacionada_con[$i];
		   $salvadora= $relacionada_con[$i];
		    switch ($salvadora) {
            case "<b>Relacionada con </b>":
                unset($relacionada_con[$i]);
                  break;
            }
	  }
	// uno todos los Array para desplegarlos en forma d elista en la columna
	$normas_relacionadas = array_merge($modifica_a,$modificada_por,$deroga_a, $derogada_por,$suspende_a,$suspendida_por,$ratifica_a,$ratificada_por,$relacionada_con);
	
	 $armo_salida_normas='<UL>';
	 foreach ($normas_relacionadas as $value) {
       if ($value) {$armo_salida_normas.='<LI>'.$value;} 
      }
     $armo_salida_normas=$armo_salida_normas.'</UL>'; 
     
	 $nestedData[] = $armo_salida_normas;
	 
	 $nombre_archivo = str_replace(" ", "%20", $row['archivo']); //permite que se descargue con espacios en blanco en el nombre
	 $camino_archivo='';
	 $camino_archivo='../deposito/'.substr($row["tipo_objeto"],0,1);
	 $camino_archivo=$camino_archivo.substr($row["anio_objeto"],0,4).'/'; 
	 
	 //determina el camino donde se encuentra el pdf en el servidor
			
	// armo última columna de acciones Editar Borrar Descargar
	$nestedData[] = '<td><center>
	                 	     <a href="'.$camino_archivo.$nombre_archivo.'" target="_blank" class="btn btn-danger" role="button">Descargar</a> </center>
					 </td>';
					 
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
