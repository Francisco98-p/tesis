<?php

require('mc_table.php');
include "conn.php";

$unidad_buscada_leida = $_POST['unidad1'];

$posicion = strpos($unidad_buscada_leida, "#");
$unidad_nombre = substr($unidad_buscada_leida, 0, $posicion);
$unidad_buscada = substr($unidad_buscada_leida, $posicion + 1);

$sql = "SELECT T.Nombre, A.Fecha_inicio,A.Fecha_final,A.Resumen,A.NroResolucion,";
$sql .= "(Select B.Nombre from detalleactividadorganizacion inner join organizacion as B on Organizacion_Id = B.Id where A.Id = Actividad_Id  limit 0,1),  ";
$sql .= "(Select B.Nombre from detalleactividadorganizacion inner join organizacion as B on Organizacion_Id = B.Id where A.Id = Actividad_Id  limit 1,1), ";
$sql .= "(Select B.Nombre from detalleactividadorganizacion inner join organizacion as B on Organizacion_Id = B.Id where A.Id = Actividad_Id  limit 2,1) ";
$sql .= ", U.Unidad ";
$sql .= "FROM `unidadejecutora` U ";
$sql .= "INNER JOIN detalleactividadunidad D on U.Id = D.UnidadEjecutora_Id ";
$sql .= "INNER JOIN actividad A on D.Actividad_Id = A.Id ";
$sql .= "INNER JOIN tipoactividad T on T.Id= A.TipoActividad_Id ";
$sql .= "WHERE U.Id = " . $unidad_buscada;
$sql .= "  ORDER BY Fecha_inicio DESC ";

$query = mysqli_query($conn, $sql);
$totalData = mysqli_num_rows($query);

class PDF extends PDF_MC_Table {
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().' - Emitido el '.date("d/m/Y")),0,0,'C');
    }
}

$pdf = new PDF();

$titulo = "Actividades de " . utf8_decode($unidad_nombre);
$pdf->setTitulo($titulo);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode("Reporte de actividades"), 0, 1, 'C');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 8, $titulo, 0, 1, 'C');
$pdf->Ln(4);

$pdf->SetWidths(array(20, 20, 30, 60, 60));
$pdf->EncabezadoTabla();

$pdf->SetFont('Arial', '', 9);

$fill = false; // alternador
while($row = mysqli_fetch_array($query)) {
    $fecha_I = date("d-m-Y", strtotime($row["Fecha_inicio"]));
    $fecha_F = date("d-m-Y", strtotime($row["Fecha_final"]));
    $actividad = $row["Nombre"] . "  (Resol. " . $row["NroResolucion"] . ")";
    $resumen = $row["Resumen"];

    $organizaciones_leidas = $row[5];
    if ($row[6] > '') $organizaciones_leidas .= '; ' . $row[6];
    if ($row[7] > '') $organizaciones_leidas .= '; ' . $row[7];

    $pdf->SetFillColor(230, 230, 230); // gris claro
    $pdf->Row(array(
        $fecha_I,
        $fecha_F,
        utf8_decode($actividad),
        utf8_decode($organizaciones_leidas),
        utf8_decode($resumen)
    ), $fill);
    
    $fill = !$fill; // alternar
}


$pdf->Output("actividades.pdf", "I");
?>
