<?php

 include "conn.php";


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;
// var_dump($requestData);

//var_dump($_REQUEST);
//exit;



$columns = array( 
// datatable column index  => database column name
	0 => 'Id',
	1 => 'TipoActividad_Id',
	2 => 'NroResolucion',
    3 => 'Resumen', 
	4 => 'Fecha_inicio',
	5 => 'Fecha_final',
    6 => 'Objetivo'
 	);
// getting total number records without any search
$sql="SELECT A.Id ";
$sql.="FROM actividad as A ";

	
$query=mysqli_query($conn, $sql); // or die("ajax-unidad-ejecutora.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

 
if (!empty($requestData['search']['value']) ) {

// getting total number records without any search
$sql='';
$sql="SELECT A.Id,A.NroResolucion,A.Fecha_inicio,A.Fecha_final,A.Resumen,A.Objetivo, ";
$sql.="(Select B.Unidad as Unidad "; // busco la primer unidad ejecutora [6]
$sql.="from detalleactividadunidad ";
$sql.="inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 0,1), ";

$sql.="(Select B.Unidad as Unidad "; // busco la segunda unidad ejecutora [7]
$sql.="from detalleactividadunidad ";
$sql.="inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 1,1), ";

$sql.="(Select B.Unidad as Unidad "; // busco la tercera unidad ejecutora [8]
$sql.="from detalleactividadunidad ";
$sql.="inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 2,1), ";

$sql.="(Select B.Nombre "; //busco la primer organizacion [9]
$sql.="from detalleactividadorganizacion ";
$sql.="inner join organizacion as B on Organizacion_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 0,1),  ";

$sql.="(Select B.Nombre "; //busco la segunda organizacion [10]
$sql.="from detalleactividadorganizacion ";
$sql.="inner join organizacion as B on Organizacion_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 1,1), ";
$sql.="(Select B.Nombre "; //busco la tercer organizacion [11]
$sql.="from detalleactividadorganizacion ";
$sql.="inner join organizacion as B on Organizacion_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 2,1),";

$sql.="T.Nombre as Tipo "; //busco Tipo de Actividad

$sql.="FROM actividad as A ";
$sql.="INNER JOIN tipoactividad as T on TipoActividad_Id = T.Id ";
$sql.="WHERE (A.Resumen LIKE '%".$requestData['search']['value']."%' ) OR ";

$sql.="       (T.Nombre LIKE '%".$requestData['search']['value']."%' ) OR ";

$sql.="       (A.NroResolucion LIKE '%".$requestData['search']['value']."%' ) OR ";

$sql.="      ( (Select B.Unidad as Unidad "; // busco la primer unidad ejecutora [6]
$sql.="        from detalleactividadunidad ";
$sql.="        inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="        where A.Id = Actividad_Id  limit 0,1) LIKE '%".$requestData['search']['value']."%') OR ";

$sql.="      ( (Select B.Unidad as Unidad "; // busco la SEGUNDA unidad ejecutora [6]
$sql.="        from detalleactividadunidad ";
$sql.="        inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="        where A.Id = Actividad_Id  limit 1,1) LIKE '%".$requestData['search']['value']."%') OR ";

$sql.="      ( (Select B.Unidad as Unidad "; // busco la tercera unidad ejecutora [6]
$sql.="        from detalleactividadunidad ";
$sql.="        inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="        where A.Id = Actividad_Id  limit 2,1) LIKE '%".$requestData['search']['value']."%') OR ";

$sql.="      ((Select B.Nombre "; //busco la primer organizacion [9]
$sql.="        from detalleactividadorganizacion ";
$sql.="        inner join organizacion as B on Organizacion_Id = B.Id ";
$sql.="        where A.Id = Actividad_Id  limit 0,1) LIKE '%".$requestData['search']['value']."%') OR  ";

$sql.="      ((Select B.Nombre "; //busco la primer organizacion [9]
$sql.="        from detalleactividadorganizacion ";
$sql.="        inner join organizacion as B on Organizacion_Id = B.Id ";
$sql.="        where A.Id = Actividad_Id  limit 1,1) LIKE '%".$requestData['search']['value']."%') OR  ";

$sql.="      ((Select B.Nombre "; //busco la primer organizacion [9]
$sql.="        from detalleactividadorganizacion ";
$sql.="        inner join organizacion as B on Organizacion_Id = B.Id ";
$sql.="        where A.Id = Actividad_Id  limit 2,1) LIKE '%".$requestData['search']['value']."%')  ";

 // busca todas las ordenazas / resoluciones de un año
   if ( strtoupper(substr($requestData['search']['value'],0,2)) == 'FI' and 
        (substr($requestData['search']['value'],2,4) >= 1986 && substr($requestData['search']['value'],2,4) <= date("Y"))
	  )  
	{
			    $sql.=" or (year(A.Fecha_inicio)) = '". substr($requestData['search']['value'],2,4)."'";		   
	}
	else
		if ( strtoupper(substr($requestData['search']['value'],0,2)) == 'FF' and 
        (substr($requestData['search']['value'],2,4) >= 1986) // && substr($requestData['search']['value'],2,4) <= date("Y"))
	  )  
	{
			   // $sql.=" or (year(A.Fecha_final)) = '". substr($requestData['search']['value'],2,4)."'";		  
                $sql=" (year(A.Fecha_final)) = '". substr($requestData['search']['value'],2,4)."'";		  				
	}
	
	
	$query=mysqli_query($conn, $sql)  or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then
                                              // we have to modify total number filtered rows as per search
                                              // result without limit in the query 
	
$sql.=" ORDER BY Fecha_inicio DESC LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // busca nuevaente con los limites .... raro pero funciona

	
	$query=mysqli_query($conn, $sql)  or die("ajax-grid-data.php: get PO");
} 
	
else {
	// getting total number records without any search
$sql="SELECT A.Id,A.NroResolucion,A.Fecha_inicio,A.Fecha_final,A.Resumen,A.Objetivo, ";
$sql.="(Select B.Unidad as Unidad "; // busco la primer unidad ejecutora [6]
$sql.="from detalleactividadunidad ";
$sql.="inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 0,1), ";

$sql.="(Select B.Unidad as Unidad "; // busco la segunda unidad ejecutora [7]
$sql.="from detalleactividadunidad ";
$sql.="inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 1,1), ";

$sql.="(Select B.Unidad as Unidad "; // busco la tercera unidad ejecutora [8]
$sql.="from detalleactividadunidad ";
$sql.="inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 2,1), ";

$sql.="(Select B.Nombre "; //busco la primer organizacion [9]
$sql.="from detalleactividadorganizacion ";
$sql.="inner join organizacion as B on Organizacion_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 0,1),  ";

$sql.="(Select B.Nombre "; //busco la segunda organizacion [10]
$sql.="from detalleactividadorganizacion ";
$sql.="inner join organizacion as B on Organizacion_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 1,1), ";
$sql.="(Select B.Nombre "; //busco la tercer organizacion [11]
$sql.="from detalleactividadorganizacion ";
$sql.="inner join organizacion as B on Organizacion_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 2,1),";

$sql.="T.Nombre as Tipo "; //busco Tipo de Actividad

$sql.="FROM actividad as A ";
$sql.="INNER JOIN tipoactividad as T on TipoActividad_Id = T.Id ";
$sql.="ORDER BY Fecha_inicio DESC LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

	 


$query=mysqli_query($conn, $sql); // or die("ajax-unidad-ejecutora.php: get InventoryItems");
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

	
} // fin ELSE para mostrar 

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();
	
	$nestedData[] = $row["Id"];
	
	//armo columna de acciones (ahora segunda columna)
	$nestedData[] = '<div class="action-buttons">
						<a href="ver_detalle.php?id='.$row['Id'].'" class="action-btn view" title="Ver">
							<i class="fas fa-eye"></i>
						</a>
						<a href="editar.php?id='.$row['Id'].'" class="action-btn edit" title="Editar">
							<i class="fas fa-edit"></i>
						</a>
						<a href="index.php?action=delete&id='.$row['Id'].'" onclick="return confirm(\'¿Está seguro de que desea eliminar esta actividad?\')" class="action-btn delete" title="Eliminar">
							<i class="fas fa-trash"></i>
						</a>
					</div>';
	
	$fecha = strtotime($row["Fecha_inicio"]); 
	$fecha= date("d-m-Y", $fecha);
	$nestedData[] = $fecha;
	
	$fecha = strtotime($row["Fecha_final"]); 
	$fecha= date("d-m-Y", $fecha);
	$nestedData[] = $fecha;
	
	$nestedData[] = $row["Tipo"];             //.$requestData['start']." ,".$requestData['length']."   ";;
	$nestedData[] = $row["NroResolucion"];    //." , ".$totalFiltered." , ".$totalData;
	
  // Generar badges para unidades
  $unidades_leidas = '<div class="badge-container">';
  if ($row[6] == 'No especificada') {
      $unidades_leidas .= '<span class="badge bg-light text-dark">'.$row[6].'</span>';
  } else {
      $unidades_leidas .= '<span class="badge bg-primary">'.$row[6].'</span>';
  }
  
  if ($row[7] > '') {
      $unidades_leidas .= '<span class="badge bg-primary">'.$row[7].'</span>';
  }
  
  if ($row[8] > '') {
      $unidades_leidas .= '<span class="badge bg-primary">'.$row[8].'</span>';
  }
  $unidades_leidas .= '</div>';

	$nestedData[] = $unidades_leidas; // 1,2 3 ra. unidad ejecutora
 
  // Generar badges para organizaciones
  $organizaciones_leidas = '<div class="badge-container">';
  if ($row[9] > '') {
      $organizaciones_leidas .= '<span class="badge bg-success">'.$row[9].'</span>';
  }
  
  if ($row[10] > '') {
      $organizaciones_leidas .= '<span class="badge bg-success">'.$row[10].'</span>';
  }
  
  if ($row[11] > '') {
      $organizaciones_leidas .= '<span class="badge bg-success">'.$row[11].'</span>';
  }
  $organizaciones_leidas .= '</div>';
	
    $nestedData[] = $organizaciones_leidas; //1,2 y 3 ra. Organizacion solicitante
 
	$nestedData[] = '<span class="text-truncate-custom" title="'.$row["Resumen"].'">'.$row["Resumen"].'</span>';  //."//".$requestData['draw']; // $totalData."//".$totalFiltered."//";
    
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
