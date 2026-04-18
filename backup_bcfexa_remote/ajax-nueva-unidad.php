<?php
header('Content-Type: application/json');
include "conn.php";

// Verificar que se recibió el nombre de la unidad (campo obligatorio)
if (!isset($_POST['unidad']) || empty(trim($_POST['unidad']))) {
    echo json_encode([
        'success' => false,
        'message' => 'El nombre de la unidad ejecutora es obligatorio'
    ]);
    exit;
}

// Sanitizar y escapar datos
$unidad = mysqli_real_escape_string($conn, trim($_POST['unidad']));

// Verificar si ya existe una unidad con el mismo nombre
$check_query = "SELECT Id FROM unidadejecutora WHERE Unidad = '$unidad' LIMIT 1";
$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    echo json_encode([
        'success' => false,
        'message' => 'Ya existe una unidad ejecutora con ese nombre'
    ]);
    exit;
}

// Insertar la nueva unidad ejecutora
$sql = "INSERT INTO unidadejecutora (Unidad) VALUES ('$unidad')";

// Ejecutar la consulta
if (mysqli_query($conn, $sql)) {
    $nuevo_id = mysqli_insert_id($conn);
    
    echo json_encode([
        'success' => true,
        'id' => $nuevo_id,
        'unidad' => $unidad,
        'message' => 'Unidad Ejecutora creada exitosamente'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Error al guardar: ' . mysqli_error($conn)
    ]);
}

mysqli_close($conn);
?>
