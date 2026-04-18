<?php

 include "conn.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;
var_dump($requestData);


$columns = array( 
// datatable column index  => database column name
	0 => 'id',
    1 => 'tipo_objeto', 
	2 => 'nro_objeto',
	3 => 'anio_objeto',
    4 => 'extracto',
    5 => 'estado',
    6 => 'texto_completo',
	7 => 'archivo'
);
echo '<script>alert("Welcome to Geeks for Geeks")</script>';
// getting total number records without any search
// if there is a search parameter
	$sql = "SELECT id, tipo_objeto, numero_objeto, anio_objeto, extracto, estado_objeto, texto_completo, archivo ";
	$sql.=" FROM digesto";
	$sql.=" WHERE tipo_objeto LIKE '%e%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR numero_objeto LIKE '%e%' ";
	$sql.=" OR anio_objeto LIKE '%e%' ";
    $sql.=" OR extracto LIKE '%e%' ";
    $sql.=" OR esvigente LIKE '%e%' ";
	$sql.=" OR texto_completo LIKE '%e%' ";
	
// $sql = "SELECT id, tipo_objeto, numero_objeto, anio_objeto, extracto, estado_objeto, texto_completo, archivo ";

// $sql.=" FROM digesto";
var_dump($sql);
var_dump($conn);
$query=mysqli_query($conn, $sql); // or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
var_dump($totalFiltered);
?>
