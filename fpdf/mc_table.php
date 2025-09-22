<?php
require('fpdf.php');

class PDF_MC_Table extends FPDF
{
	protected $widths;
	protected $aligns;
    private $titulo;

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
	
 function Header()
    {
        $titulo_informe= $this->titulo;
		// Select Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(2);
        // Framed title
        $this->Cell(210, 15, $this->titulo, 0, 0, 'L');
		
        // Line break
        $this->Ln(20);
    }
	
	function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Print centered page number
        $this->Cell(0, 10, 'Page '.$this->PageNo(), 0, 0, 'C');
    }
	function SetWidths($w)
	{
		// Set the array of column widths
		$this->widths = $w;
	}

	function SetAligns($a)
	{
		// Set the array of column alignments
		$this->aligns = $a;
	}

	function Row($data, $fill = false)
{
    $nb = 0;
    for ($i = 0; $i < count($data); $i++)
        $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
    $h = 5 * $nb;
    $this->CheckPageBreak($h);
    
    // Guarda la posición inicial
    $x = $this->GetX();
    $y = $this->GetY();

    // Dibuja el fondo completo si hay color de relleno
    if ($fill) {
        $this->Rect($x, $y, array_sum($this->widths), $h, 'F');
    }

    for ($i = 0; $i < count($data); $i++) {
        $w = $this->widths[$i];
        $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

        // Guarda la posición actual
        $x = $this->GetX();
        $y = $this->GetY();

        // Borde de la celda
        $this->Rect($x, $y, $w, $h);

        // Escribe el texto encima del fondo
        $this->MultiCell($w, 5, $data[$i], 0, $a);
        
        // Mueve a la siguiente celda
        $this->SetXY($x + $w, $y);
    }

    // Salta a la siguiente fila
    $this->Ln($h);
}



	function CheckPageBreak($h)
	{
		// If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger) {
			$this->AddPage($this->CurOrientation);
			$this->EncabezadoTabla();
			
		}
	}

	function NbLines($w, $txt)
	{
		// Compute the number of lines a MultiCell of width w will take
		if(!isset($this->CurrentFont))
			$this->Error('No font has been set');
		$cw = $this->CurrentFont['cw'];
		if($w==0)
			$w = $this->w-$this->rMargin-$this->x;
		$wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
		$s = str_replace("\r",'',(string)$txt);
		$nb = strlen($s);
		if($nb>0 && $s[$nb-1]=="\n")
			$nb--;
		$sep = -1;
		$i = 0;
		$j = 0;
		$l = 0;
		$nl = 1;
		while($i<$nb)
		{
			$c = $s[$i];
			if($c=="\n")
			{
				$i++;
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep = $i;
			$l += $cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i = $sep+1;
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}

	function EncabezadoTabla() {
		$this->SetFont('Arial', 'B', 10);
		$this->SetFillColor(48, 149, 112); // #73a839
		$this->SetTextColor(255); // blanco
		$this->SetDrawColor(180, 180, 180);
		$altura = 8;
		$this->Cell(20, $altura, 'F.Inicio', 1, 0, 'C', true);
		$this->Cell(20, $altura, 'F.Final', 1, 0, 'C', true);
		$this->Cell(30, $altura, 'Actividad', 1, 0, 'C', true);
		$this->Cell(60, $altura, utf8_decode('Unidad / Organización'), 1, 0, 'C', true);
		$this->Cell(60, $altura, 'Resumen', 1, 1, 'C', true);

		$this->SetFont('Arial', '', 9);
		$this->SetTextColor(0); // restaurar texto negro para el contenido
		$this->SetFillColor(230, 230, 230);
	}
}
?>
