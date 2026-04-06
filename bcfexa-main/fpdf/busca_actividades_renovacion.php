<?php

require('mc_table.php');
include "conn.php";

//$unidad_buscada_leida= $_POST['unidad1'];
//
//$posicion=strpos($unidad_buscada_leida,"#");
//$unidad_nombre=substr($unidad_buscada_leida,0,$posicion);
//$unidad_buscada= substr($unidad_buscada_leida,$posicion+1);

//echo($unidad_buscada);
//echo('='.$unidad_nombre);


//exit;






//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//dummy data
// getting total number records without any search
$sql="SELECT DISTINCT T.Nombre, A.Fecha_inicio,A.Fecha_final,A.RenovacionAutomatica,A.Resumen,A.NroResolucion,";

$sql.="(Select B.Nombre "; //busco la primer organizacion [6]
$sql.="from detalleactividadorganizacion ";
$sql.="inner join organizacion as B on Organizacion_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 0,1),  ";

$sql.="(Select B.Nombre "; //busco la segunda organizacion [7]
$sql.="from detalleactividadorganizacion ";
$sql.="inner join organizacion as B on Organizacion_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 1,1), ";
$sql.="(Select B.Nombre "; //busco la tercer organizacion [8]
$sql.="from detalleactividadorganizacion ";
$sql.="inner join organizacion as B on Organizacion_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 2,1) ";
$sql.=", U.Unidad ";
$sql.="FROM `unidadejecutora` U ";
$sql.="INNER JOIN detalleactividadunidad D on U.Id = D.UnidadEjecutora_Id ";
$sql.="INNER JOIN actividad A on D.Actividad_Id = A.Id ";
$sql.="INNER JOIN tipoactividad T on T.Id= A.TipoActividad_Id  ";
$sql.="WHERE PlazoRenovacion > 0 and date_format(date_add(Fecha_final, interval PlazoRenovacion month),'%Y%m') <= date_format(now(),'%Y%m')";
//$sql.="WHERE U.Id = ". $unidad_buscada;
$sql.="  ORDER BY Fecha_inicio DESC ";



$query=mysqli_query($conn, $sql); // or die("ajax-unidad-ejecutora.php: get InventoryItems");

$totalData = mysqli_num_rows($query);

class PDF extends PDF_MC_Table {
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().' - Emitido el '.date("d/m/Y")),0,0,'C');
    }
}

$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
//$row=mysqli_fetch_array($query);
$fila="";
$pdf = new PDF();
$titulo = "Actividades que deben RENOVARSE"; //.utf8_decode($unidad_nombre); //row[8];
$pdf->setTitulo($titulo);

$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode("Reporte de actividades"), 0, 1, 'C');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 8, $titulo, 0, 1, 'C');
$pdf->Ln(4);
// Table with 20 rows and 4 columns
$pdf->SetWidths(array(20, 20, 30, 60, 60));

// Estilos para el encabezado
$pdf->EncabezadoTabla();

$pdf->SetFont('Arial', '', 9);

$data = array();
$fill = False;
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	
	$fecha = strtotime($row["Fecha_inicio"]); 
	$fecha_I= date("d-m-Y", $fecha);
		
	$fecha = strtotime($row["Fecha_final"]); 
	$fecha_F= date("d-m-Y", $fecha);
		
	$actividad = $row["Nombre"]."  (Resol. ".$row["NroResolucion"].") ";
	if ($row["RenovacionAutomatica"]=1) {
	$actividad.=" (Renov. Atomática) ";}
	//$resolucion = $row["NroResolucion"];
	$resumen=$row["Resumen"];
	
 	//$nestedData[] = $unidades_leidas; // 1,2 3 ra. unidad ejecutora
 
 $organizaciones_leidas= $row[6];
  if ($row[6] >'') {
	$organizaciones_leidas.= '; '.$row[7];
   }
if ($row[7] >'') {
	$organizaciones_leidas.= '; '.$row[8];
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
$pdf->Output("test.pdf", "I");
?>
