<?php
include "conn.php";

// Número de registros recuperados
$numberofrecords = 10;

if(!isset($_POST['searchTerm'])){
   // Obtener registros a través de la consulta SQL
   $query = mysqli_query($conn, "SELECT * FROM tipoactividad ORDER BY Nombre LIMIT $numberofrecords");
   $lista_tipos = mysqli_fetch_all($query, MYSQLI_ASSOC);
}else{
   $search = mysqli_real_escape_string($conn, $_POST['searchTerm']); // Search text

   // Mostrar resultados
   $query = mysqli_query($conn, "SELECT * FROM tipoactividad WHERE Nombre LIKE '%$search%' ORDER BY Nombre LIMIT $numberofrecords");
   $lista_tipos = mysqli_fetch_all($query, MYSQLI_ASSOC);
}

$response = array();

// Leer los datos de MySQL
foreach($lista_tipos as $tipo){
   $response[] = array(
      "id" => $tipo['Id'],
      "text" => $tipo['Nombre']
   );
}

echo json_encode($response);
exit();
?>