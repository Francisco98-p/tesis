<?php

 include "conn.php";


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;
// var_dump($requestData);




$columns = array( 
// datatable column index  => database column name
	0 => 'Id',
	1 => 'Nombre'
 	);

// getting total number records without any search
$sql="SELECT A.Id,A.Nombre,A.Titulo ";
$sql.=" FROM persona as A ";
$sql.=" ORDER BY Nombre ";

$query=mysqli_query($conn, $sql); // or die("ajax-unidad-ejecutora.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
 
if( !empty($requestData['search']['value']) ) {
       $sql="SELECT A.Id,A.Nombre,A.Titulo ";
       $sql.=" FROM persona as A ";
       $sql.=" WHERE (A.Nombre LIKE '%".$requestData['search']['value']."%' ) ";    // $requestData['search']['value'] contains search parameter
       $sql.=" ORDER BY Nombre ";
	
	$query=mysqli_query($conn, $sql)  or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search
  

} 


$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 


    $nestedData[] = $row["Id"];
	$nestedData[] = $row["Nombre"]. ' ('.$row["Titulo"].')';
	//armo última columna de acciones Editar Borrar Descargar
    $nestedData[] = '<td><center><a href="editar_persona.php?id='.$row['Id'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info">
                 	<i class="menu-icon icon-pencil"></i> </a>
					</center>
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
