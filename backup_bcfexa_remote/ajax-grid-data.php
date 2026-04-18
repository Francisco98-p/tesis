<?php
include "conn.php"; // Include database connection

// Fetch data from the 'actividad' table
$query = "SELECT * FROM actividad"; // Modify this query as needed
$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row; // Collect data
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>