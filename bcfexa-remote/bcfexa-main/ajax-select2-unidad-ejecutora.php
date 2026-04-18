<?php
include "conn.php";

// Número de registros recuperados
$numberofrecords = 15;

if(!isset($_POST['searchTerm'])){
   // Obtener registros a través de la consulta SQL
   $query = mysqli_query($conn, "SELECT * FROM unidadejecutora ORDER BY Unidad LIMIT $numberofrecords");
   $lista_unidades = mysqli_fetch_all($query, MYSQLI_ASSOC);
}else{
   $search = mysqli_real_escape_string($conn, $_POST['searchTerm']); // Search text

   // Mostrar resultados
   $query = mysqli_query($conn, "SELECT * FROM unidadejecutora WHERE Unidad LIKE '%$search%' ORDER BY Unidad LIMIT $numberofrecords");
   $lista_unidades = mysqli_fetch_all($query, MYSQLI_ASSOC);
}

$response = array();

// Leer los datos de MySQL
foreach($lista_unidades as $unidad){
   $response[] = array(
      "id" => $unidad['Id'],
      "text" => $unidad['Unidad']
   );
}

echo json_encode($response);
exit();
?>