<?php
// http://www.fpdf.org/en/script/script3.php probar este modelo


require('./fpdf.php');
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
$sql.="where A.Id = Actividad_Id  limit 0,1), ";

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
$sql.="ORDER BY Fecha_inicio DESC ";


$query=mysqli_query($conn, $sql); // or die("ajax-unidad-ejecutora.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	
	$fecha = strtotime($row["Fecha_inicio"]); 
	$fecha_I= date("d-m-Y", $fecha);
		
	$fecha = strtotime($row["Fecha_final"]); 
	$fecha_F= date("d-m-Y", $fecha);
		
	$actividad = $row["Tipo"];
	$resolucion = $row["NroResolucion"];
	
  $unidades_leidas= '<ul><li>'.$row[6].'</li>';
  if ($row[7] >'') {
	$unidades_leidas.= '<li>'.$row[7].'</li>';
   }
if ($row[8] >'') {
	$unidades_leidas.= '<li>'.$row[8].'</li>';
}
$unidades_leidas.='</ul>';  

	//$nestedData[] = $unidades_leidas; // 1,2 3 ra. unidad ejecutora
 
 $organizaciones_leidas= '<ul><li>'.$row[9].'</li>';
  if ($row[10] >'') {
	$organizaciones_leidas.= '<li>'.$row[10].'</li>';
   }
if ($row[11] >'') {
	$organizaciones_leidas.= '<li>'.$row[11].'</li>';
}
$organizaciones_leidas.='</ul>';  	
	
    //$nestedData[] = $organizaciones_leidas; //1,2 y 3 ra. Organizacion solicitante
 //
	//$nestedData[] = $row["Resumen"]."//".$requestData['draw']; // $totalData."//".$totalFiltered."//";
    
   	//armo última columna de acciones Editar Borrar Descargar
   // $nestedData[] = '<td><center><a href="editar.php?id='.$row['Id'].'"  data-toggle="tooltip" title="Editar" class="btn btn-sm btn-info">
   //              	<i class="menu-icon icon-pencil"></i> </a> <br> 
	//				<a href="ver_detalle.php?id='.$row['Id'].'"  data-toggle="tooltip" title="Consultar" class="btn btn-sm btn-success">
    //             	<i class="menu-icon icon-search"></i> </a>
	//				</td>';
					 
				 
	//$data[] = $nestedData;
    
}



//data which possibly contains long text
$data2=array(
	array(
		"Inicio",
		"Fin",
		"Actividad",
		"Unidad FCEFN",
		"Organización",
		
	),
	array(
		$fecha_I,
		$fecha_F,
		$actividad,
		"Resolución de muchas lineas que se ocupa mas de un re",
		"Departamento de Informática; que raro es esto no? pero funciona Departamento de Biología y otros",
		
	),
	array(
		"12/12/23",
		"12/12/25",
		"Acta Complemetaria",
		"Resolución de muchas lineas esta es en este reglon la linea mas larga",
		"Departamento de Informática; Departamento de Biología,",
		
	),
	array(
		"12/12/23",
		"12/12/25",
		"Acta Complemetaria",
		"Ministerio de Salud de la Nacion yla rrepublica argentina vamos todavia",
		"Departamento de Informática; Departamento de Biología, pero ahora esta es la mas large de las linea",
		
	),
	
);

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

$pdf->SetFont('Arial','',9);
//define standard font size
$fontSize=9;


//multicell method
$pdf->Cell(150,5,utf8_decode("12345678901234567890123456789012345678901234567890123456789012345678901234567890"),0,1);
foreach($data2 as $item){
	$cellWidth=75;//wrapped cell width
	$cellHeight=5;//normal one-line cell height
	
//	$item[4]="Resolución nro 123 ".$item[4];
// determino el string más extenso entre las 3 columnas a wrappear
	$maximo_largo= max(strlen($item[3]),strlen($item[4]));
	
	if (strlen($item[4])> strlen($item[3])) {
	$item[3].=substr('                                                         ',1,(strlen($item[4]) - strlen($item[3])));
	}
	if (strlen($item[3]) > strlen($item[4])) {
	$item[4].=substr('                                                         ',1,(strlen($item[3]) - strlen($item[4])));
	}
// fin determino	

	//check whether the text is overflowing
	if($pdf->GetStringWidth($item[3]) < $cellWidth){
		//if not, then do nothing
		$line=1;
	}else{
		//if it is, then calculate the height needed for wrapped cell
		//by splitting the text to fit the cell width
		//then count how many lines are needed for the text to fit the cell
		
		$textLength=strlen($item[3]);	//total text length
		$errMargin=10;		//cell width error margin, just in case
		$startChar=0;		//character start position for each line
		$maxChar=0;			//maximum character in a line, to be incremented later
		$textArray=array();	//to hold the strings for each line
		$tmpString="";		//to hold the string for a line (temporary)
		
		while($startChar < $textLength){ //loop until end of text
			//loop until maximum character reached
			while( 
			$pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
			($startChar+$maxChar) < $textLength ) {
				$maxChar++;
				$tmpString=substr($item[3],$startChar,$maxChar);
			}
			//move startChar to next line
			$startChar=$startChar+$maxChar;
			//then add it into the array so we know how many line are needed
			array_push($textArray,$tmpString);
			
			//reset maxChar and tmpString
			$maxChar=0;
			$tmpString='';
			
		}
		//get number of line
		$line=count($textArray);
	}
	
	//check whether the text is overflowing
	if($pdf->GetStringWidth($item[4]) < $cellWidth){
		//if not, then do nothing
		$line=1;
	}else{
		//if it is, then calculate the height needed for wrapped cell
		//by splitting the text to fit the cell width
		//then count how many lines are needed for the text to fit the cell
		
		$textLength=strlen($item[4]);	//total text length
		$errMargin=10;		//cell width error margin, just in case
		$startChar=0;		//character start position for each line
		$maxChar=0;			//maximum character in a line, to be incremented later
		$textArray=array();	//to hold the strings for each line
		$tmpString="";		//to hold the string for a line (temporary)
		
		while($startChar < $textLength){ //loop until end of text
			//loop until maximum character reached
			while( 
			$pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
			($startChar+$maxChar) < $textLength ) {
				$maxChar++;
				$tmpString=substr($item[4],$startChar,$maxChar);
			}
			//move startChar to next line
			$startChar=$startChar+$maxChar;
			//then add it into the array so we know how many line are needed
			array_push($textArray,$tmpString);
			//reset maxChar and tmpString
			$maxChar=0;
			$tmpString='';
			
		}
		//get number of line
		      if ($line<count($textArray)) {$line=count($textArray);}
			}
			
	
	
	//write the cells
	$pdf->Cell(20,($line * $cellHeight),$item[0],1,0); //adapt height to number of lines
	$pdf->Cell(20,($line * $cellHeight),$item[1],1,0); //adapt height to number of lines
	
//	$pdf->Cell(30,($line * $cellHeight),substr($item[2],0,17),1,0); //adapt height to number of lines
		
	//use MultiCell instead of Cell
	//but first, because MultiCell is always treated as line ending, we need to 
	//manually set the xy position for the next cell to be next to it.
	//remember the x and y position before writing the multicell
	$xPos=$pdf->GetX();
	$yPos=$pdf->GetY();
	$pdf->MultiCell($cellWidth,$cellHeight,$item[3],1);
	
	//return the position for next cell next to the multicell
	//and offset the x with multicell width
	
    $pdf->SetXY($xPos + $cellWidth , $yPos);
	$pdf->MultiCell($cellWidth,$cellHeight,$item[4],1);
	
	//$pdf->Cell(10,($line * $cellHeight),$item[5],1,1); //adapt height to number of lines
	
	
	
	
	
	
	
	
	
	
	
	
	
}






































$pdf->Output();
?>
