<?php

require('mc_table.php');
include "conn.php";

$organizacion_buscada_leida= $_POST['organizacion1'];
//
$posicion=strpos($organizacion_buscada_leida,"#");
$organizacion_nombre=substr($organizacion_buscada_leida,0,$posicion);
$organizacion_buscada= substr($organizacion_buscada_leida,$posicion+1);

//echo($organizacion_buscada);
//echo('='.$organizacion_nombre);


//exit;






//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//dummy data
// getting total number records without any search
$sql="SELECT T.Nombre, A.Fecha_inicio,A.Fecha_final,A.Resumen,A.NroResolucion,";

$sql.="(Select B.Unidad "; //busco la primer unidad [5]
$sql.="from detalleactividadunidad ";
$sql.="inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 0,1),  ";

$sql.="(Select B.Unidad "; //busco la segunda unidad [6]
$sql.="from detalleactividadunidad ";
$sql.="inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 1,1),  ";

$sql.="(Select B.Unidad "; //busco la primer unidad [7]
$sql.="from detalleactividadunidad ";
$sql.="inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 2,1)  ";

$sql.="FROM `organizacion` U ";
$sql.="INNER JOIN detalleactividadorganizacion D on U.Id = D.Organizacion_Id ";
$sql.="INNER JOIN actividad A on D.Actividad_Id = A.Id ";
$sql.="INNER JOIN tipoactividad T on T.Id= A.TipoActividad_Id ";
$sql.="WHERE U.Id = ". $organizacion_buscada;
$sql.="  ORDER BY Fecha_inicio DESC ";



$query=mysqli_query($conn, $sql); // or die("ajax-unidad-ejecutora.php: get InventoryItems");

$totalData = mysqli_num_rows($query);



$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
//$row=mysqli_fetch_array($query);
$fila="";

class PDF extends PDF_MC_Table {
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().' - Emitido el '.date("d/m/Y")),0,0,'C');
    }
}
$pdf = new PDF();
$titulo = "Actividades con ".utf8_decode($organizacion_nombre); //row[8];
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
$data = array();
$fill = false;
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	
	$fecha = strtotime($row["Fecha_inicio"]); 
	$fecha_I= date("d-m-Y", $fecha);
		
	$fecha = strtotime($row["Fecha_final"]); 
	$fecha_F= date("d-m-Y", $fecha);
		
	$actividad = $row["Nombre"]."  (Resol. ".$row["NroResolucion"].")";
	//$resolucion = $row["NroResolucion"];
	$resumen=$row["Resumen"];
	
 	//$nestedData[] = $unidades_leidas; // 1,2 3 ra. unidad ejecutora
 
 $organizaciones_leidas= $row[5];
  if ($row[6] >'') {
	$organizaciones_leidas.= '; '.$row[6];
   }
	if ($row[7] >'') {
		$organizaciones_leidas.= '; '.$row[7];
	}


//$pdf = new PDF_MC_Table();
//$pdf->AddPage();
//$pdf->SetFont('Arial', '', 9);

// Table with 20 rows and 4 columns
//$pdf->SetWidths(array(20, 20, 30, 60,60));
$pdf->SetFillColor(230, 230, 230);

$pdf->Row(array($fecha_I,$fecha_F,utf8_decode($actividad),utf8_decode($organizaciones_leidas),utf8_decode($resumen)),$fill);
 $fill = !$fill;
//$largo='Este es un texto largo para que se caiga la linea Este es un texto largo para que se caiga la linea Este es un texto largo para que se caiga la linea Este es un texto largo para que se caiga la linea Este es un texto largo para que se caiga la linea ';
}
//$pdf->Output();
$pdf->Output("Dafexa_informe_x_organizacion.pdf", "I");
?>
