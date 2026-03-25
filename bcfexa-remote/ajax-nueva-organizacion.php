<?php
header('Content-Type: application/json');
include "conn.php";

// Verificar que se recibió el nombre (campo obligatorio)
if (!isset($_POST['nombre']) || empty(trim($_POST['nombre']))) {
    echo json_encode([
        'success' => false,
        'message' => 'El nombre de la organización es obligatorio'
    ]);
    exit;
}

// Sanitizar y escapar datos
$nombre = mysqli_real_escape_string($conn, trim($_POST['nombre']));

// Campos adicionales (para futuro uso cuando se agreguen a la tabla)
$pais = isset($_POST['pais']) ? mysqli_real_escape_string($conn, trim($_POST['pais'])) : '';
$ciudad = isset($_POST['ciudad']) ? mysqli_real_escape_string($conn, trim($_POST['ciudad'])) : '';
$direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($conn, trim($_POST['direccion'])) : '';
$telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conn, trim($_POST['telefono'])) : '';
$email = isset($_POST['email']) ? mysqli_real_escape_string($conn, trim($_POST['email'])) : '';
$web = isset($_POST['web']) ? mysqli_real_escape_string($conn, trim($_POST['web'])) : '';

// Verificar si ya existe una organización con el mismo nombre
$check_query = "SELECT Id FROM organizacion WHERE Nombre = '$nombre' LIMIT 1";
$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    echo json_encode([
        'success' => false,
        'message' => 'Ya existe una organización con ese nombre'
    ]);
    exit;
}

// Por ahora solo insertamos el Nombre
// Cuando agregues más columnas a la tabla, descomenta y ajusta la siguiente sección:
/*
$campos = ['Nombre'];
$valores = ["'$nombre'"];

if (!empty($pais)) {
    $campos[] = 'Pais';
    $valores[] = "'$pais'";
}
if (!empty($ciudad)) {
    $campos[] = 'Ciudad';
    $valores[] = "'$ciudad'";
}
if (!empty($direccion)) {
    $campos[] = 'Direccion';
    $valores[] = "'$direccion'";
}
if (!empty($telefono)) {
    $campos[] = 'Telefono';
    $valores[] = "'$telefono'";
}
if (!empty($email)) {
    $campos[] = 'Email';
    $valores[] = "'$email'";
}
if (!empty($web)) {
    $campos[] = 'Web';
    $valores[] = "'$web'";
}

$sql = "INSERT INTO organizacion (" . implode(', ', $campos) . ") VALUES (" . implode(', ', $valores) . ")";
*/

// Inserción actual (solo Nombre)
$sql = "INSERT INTO organizacion (Nombre) VALUES ('$nombre')";

// Ejecutar la consulta
if (mysqli_query($conn, $sql)) {
    $nuevo_id = mysqli_insert_id($conn);
    
    echo json_encode([
        'success' => true,
        'id' => $nuevo_id,
        'nombre' => $nombre,
        'message' => 'Organización creada exitosamente'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Error al guardar: ' . mysqli_error($conn)
    ]);
}

mysqli_close($conn);
?>
