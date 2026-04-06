<?php
include "conn.php";

// Número de registros recuperados
$numberofrecords = 15;

if(!isset($_POST['searchTerm'])){
   // Obtener registros a través de la consulta SQL
   $query = mysqli_query($conn, "SELECT * FROM persona ORDER BY Nombre LIMIT $numberofrecords");
   $lista_personas = mysqli_fetch_all($query, MYSQLI_ASSOC);
}else{
   $search = mysqli_real_escape_string($conn, $_POST['searchTerm']); // Search text

   // Mostrar resultados
   $query = mysqli_query($conn, "SELECT * FROM persona WHERE Nombre LIKE '%$search%' ORDER BY Nombre LIMIT $numberofrecords");
   $lista_personas = mysqli_fetch_all($query, MYSQLI_ASSOC);
}

$response = array();

// Leer los datos de MySQL
foreach($lista_personas as $persona){
   $response[] = array(
      "id" => $persona['Id'],
      "text" => $persona['Nombre']
   );
}

echo json_encode($response);
exit();
?>