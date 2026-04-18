<?php
require('mc_table.php');
include "conn.php";



//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//dummy data
// getting total number records without any search
$sql="SELECT A.Id,A.NroResolucion,A.Fecha_inicio,A.Fecha_final,A.Resumen,A.Objetivo, ";
$sql.="(Select B.Unidad as Unidad "; // busco la primer unidad ejecutora [6]
$sql.="from detalleactividadunidad ";
$sql.="inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 0,1) as U1, ";

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
$sql.="WHERE TipoActividad_Id = 15 ";
$sql.="ORDER BY Fecha_inicio DESC ";


$query=mysqli_query($conn, $sql); // or die("ajax-unidad-ejecutora.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$pdf = new PDF_MC_Table();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 9);


// Table with 20 rows and 4 columns
$pdf->SetWidths(array(20, 20, 30, 60,60));
$pdf->Row(array('F.Inicio','F.Final','Actividad','Unidad / Organización','Resumen'));

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	
	$fecha = strtotime($row["Fecha_inicio"]); 
	$fecha_I= date("d-m-Y", $fecha);
		
	$fecha = strtotime($row["Fecha_final"]); 
	$fecha_F= date("d-m-Y", $fecha);
		
	$actividad = $row["Tipo"];
	$resolucion = $row["NroResolucion"];
	$resumen=$row["Resumen"];
	
  $unidades_leidas= 'UNIDAD: '.$row[6];
  if ($row[7] >'') {
	$unidades_leidas.= '; '.$row[7];
   }
if ($row[8] >'') {
	$unidades_leidas.= ';'.$row[8];
}

$unidades_leidas.='. ORGANIZACIÓN: ';

	//$nestedData[] = $unidades_leidas; // 1,2 3 ra. unidad ejecutora
 
 $organizaciones_leidas= $row[9];
  if ($row[10] >'') {
	$organizaciones_leidas.= '; '.$row[10];
   }
if ($row[11] >'') {
	$organizaciones_leidas.= '; '.$row[11];
}
$unidades_leidas.=$organizaciones_leidas;
	




//$pdf = new PDF_MC_Table();
//$pdf->AddPage();
//$pdf->SetFont('Arial', '', 9);

// Table with 20 rows and 4 columns
//$pdf->SetWidths(array(20, 20, 30, 60,60));


$pdf->Row(array($fecha_I,$fecha_F,$actividad,$unidades_leidas,$resumen));
 
//$largo='Este es un texto largo para que se caiga la linea Este es un texto largo para que se caiga la linea Este es un texto largo para que se caiga la linea Este es un texto largo para que se caiga la linea Este es un texto largo para que se caiga la linea ';
}
$pdf->Output();
?>
