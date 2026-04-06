<?php
// https://youtu.be/NlDuK0Dk0FM?si=kIC9IeLGb9gamYN8 Este es el primer video para consultas
// https://www.youtube.com/watch?v=utjJe90MeEw Ejemplo con WordWrap
// https://www.youtube.com/playlist?list=PLHCU7DCP4jhxnxV4Ub4YDqWiZ061t183c Tutorial Fpdf
// https://www.youtube.com/watch?v=ko-E1j94q6M Generar Graficos con Fpdf (investigar)


require('./fpdf.php');
//require('wordwrap.php');

class PDF extends FPDF
{

function WordWrap(&$text, $maxwidth)
{
	$text = trim($text);
	if ($text==='')
		return 0;
	$space = $this->GetStringWidth(' ');
	$lines = explode("\n", $text);
	$text = '';
	$count = 0;

	foreach ($lines as $line)
	{
		$words = preg_split('/ +/', $line);
		$width = 0;

		foreach ($words as $word)
		{
			$wordwidth = $this->GetStringWidth($word);
			if ($wordwidth > $maxwidth)
			{
				// Word is too long, we cut it
				for($i=0; $i<strlen($word); $i++)
				{
					$wordwidth = $this->GetStringWidth(substr($word, $i, 1));
					if($width + $wordwidth <= $maxwidth)
					{
						$width += $wordwidth;
						$text .= substr($word, $i, 1);
					}
					else
					{
						$width = $wordwidth;
						$text = rtrim($text)."\n".substr($word, $i, 1);
						$count++;
					}
				}
			}
			elseif($width + $wordwidth <= $maxwidth)
			{
				$width += $wordwidth + $space;
				$text .= $word.' ';
			}
			else
			{
				$width = $wordwidth + $space;
				$text = rtrim($text)."\n".$word.' ';
				$count++;
			}
		}
		$text = rtrim($text)."\n";
		$count++;
	}
	$text = rtrim($text);
	return $count;
}
   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('logo.png', 185, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('NOMBRE EMPRESA'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : "), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE HABITACIONES "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(18, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('NÚMERO'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('TIPO'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('PRECIO'), 1, 0, 'C', 1);
      $this->Cell(70, 10, utf8_decode('CARACTERÍSTICAS'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('ESTADO'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
$i = $i + 1;
/* TABLA */
$va='Esta línea es larga paradeterminar si se trabaja con WordWrap al generar el pff. Es importanteinfo';
$largo=$pdf->WordWrap($va,120);
//var_dump($va);
$pdf->Cell(18, 10, utf8_decode("N°"), 1, 0, 'C', 0);
$pdf->Cell(20, 10, utf8_decode("numero"), 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode("nombre"), 1, 0, 'C', 0);
$pdf->Cell(25, 10, utf8_decode("precio"), 1, 0, 'C', 0);
$pdf->MultiCell(70, 10, utf8_decode($va), 1, 'C');
//$pdf->Cell(70, 10,$pdf->WordWrap('este es el estring',120) , 1, 0, 'C', 0);
$pdf->Cell(25, 10, utf8_decode("total"), 1, 1, 'C', 0);


$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
