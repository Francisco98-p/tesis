<?php
require('pdf-sector.php');
include "conn.php";
$anio_leido = $_POST['anio'];

// Custom PDF class with enhanced styling
class EnhancedPDF extends PDF_SECTOR {
    private $accentColor = [31, 97, 141];  // Deep blue accent color
    private $backgroundColor = [240, 248, 255];  // Light blue background
    private $textColor = [0, 0, 0];  // Black text

    public function Header() {
        // Set background color
        $this->SetFillColor($this->backgroundColor[0], $this->backgroundColor[1], $this->backgroundColor[2]);
        $this->Rect(0, 0, 210, 297, 'F');

        // Reset text color
        $this->SetTextColor($this->textColor[0], $this->textColor[1], $this->textColor[2]);
    }

    public function Footer() {
        // Page footer
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor($this->accentColor[0], $this->accentColor[1], $this->accentColor[2]);
        $this->Cell(0, 10, utf8_decode("Página ".$this->PageNo().'/{nb}'), 0, 0, 'C');
    }

    public function CreateStyledTitle($titulo) {
        // Styled title with accent color and shadow effect
        $this->SetFont('Arial', 'B', 16);
        $this->SetTextColor($this->accentColor[0], $this->accentColor[1], $this->accentColor[2]);
        
        // Main title
        $this->SetXY(0, 10);
        $this->SetTextColor($this->accentColor[0], $this->accentColor[1], $this->accentColor[2]);
        $this->Cell(210, 10, utf8_decode($titulo), 0, 0, 'C');
    }

   public function CreatePieChartWithEnhancedLegend($pieX, $pieY, $r, $legendX, $legendY, $data, $dataSum) {
    // Gradient colors for slices
    $gradientColors = [
        [[31, 97, 141], [52, 152, 219]],    // Blue gradient
        [[39, 174, 96], [46, 204, 113]],    // Green gradient
        [[169, 50, 38], [231, 76, 60]],     // Red gradient
        [[142, 68, 173], [155, 89, 182]],   // Purple gradient
        [[211, 84, 0], [230, 126, 34]]      // Orange gradient
    ];

    // Draw the pie 
    $degUnit = 360 / $dataSum;
    $currentAngle = 0;

    foreach ($data as $index => $item) {
        // Use predefined gradient colors
        $startColor = $gradientColors[$index % count($gradientColors)][0];
        $endColor = $gradientColors[$index % count($gradientColors)][1];

        // Slice size
        $deg = $degUnit * $item['value'];
        
        // Create gradient effect
        for ($i = 0; $i < 10; $i++) {
            $gradientStep = $i / 10;
            $currentColor = [
                round($startColor[0] * (1 - $gradientStep) + $endColor[0] * $gradientStep),
                round($startColor[1] * (1 - $gradientStep) + $endColor[1] * $gradientStep),
                round($startColor[2] * (1 - $gradientStep) + $endColor[2] * $gradientStep)
            ];
            
            $this->SetFillColor($currentColor[0], $currentColor[1], $currentColor[2]);
            $this->SetDrawColor($currentColor[0], $currentColor[1], $currentColor[2]);
            $this->Sector($pieX, $pieY, $r - $i * 0.5, $currentAngle, $currentAngle + $deg);
        }

        $currentAngle += $deg;
    }

    // Draw the legend with enhanced styling
    $this->SetFont('Arial', 'B', 9);
    $currentLegendY = $pieY - $r; // Start legend at the top of the pie chart

    foreach ($data as $index => $item) {
        // Use predefined gradient colors
        $startColor = $gradientColors[$index % count($gradientColors)][0];
        $endColor = $gradientColors[$index % count($gradientColors)][1];

        // Draw gradient rectangle for legend
        $midColor = [
            round(($startColor[0] + $endColor[0]) / 2),
            round(($startColor[1] + $endColor[1]) / 2),
            round(($startColor[2] + $endColor[2]) / 2)
        ];
        
        $this->SetFillColor($midColor[0], $midColor[1], $midColor[2]);
        $this->SetDrawColor($midColor[0], $midColor[1], $midColor[2]);
        $this->Rect($legendX, $currentLegendY, 7, 7, 'F');
        
        $this->SetTextColor(50, 50, 50);
        $this->SetXY($legendX + 10, $currentLegendY);
        $percentage = round(($item['value'] / $dataSum) * 100, 1);
        $this->Cell(50, 5, utf8_decode("{$item['value']} {$item['Actividad']} - {$percentage}%"), 0, 0);

        $currentLegendY += 10;
    }
}
}
   


// Create PDF instance
$pdf = new EnhancedPDF('P', 'mm', 'A4');
$pdf->AliasNbPages(); // Enable total page count
$pdf->AddPage();

// Create styled title
$titulo = "Actividades Iniciadas en el año $anio_leido";
$pdf->CreateStyledTitle($titulo);

// SQL query to get activity counts
$sql = "SELECT tipoactividad.Nombre AS Actividad, COUNT(*) AS cantidad ";
$sql.= "FROM actividad ";
$sql.= "inner join tipoactividad on TipoActividad_Id=tipoactividad.Id ";
$sql.= "where YEAR(Fecha_inicio)= ".$anio_leido." ";
$sql.= "GROUP BY Actividad ";

$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    // Create data array
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            'value' => $row['cantidad'],
            'Actividad' => $row['Actividad']
        );
    }

    // Close database connection
    $conn->close();

    // Pie chart and legend properties
    $pieX = 90;
    $pieY = 90;
    $r = 40; // Increased radius
    $legendX = 150;
    $legendY = $pieY - $r; // Legend starts at the top of the pie chart

    // Get total data summary
    $dataSum = array_sum(array_column($data, 'value'));

    // Create pie chart with enhanced legend
    $pdf->CreatePieChartWithEnhancedLegend($pieX, $pieY, $r, $legendX, $legendY, $data, $dataSum);

    // Output PDF inline in the browser
    $pdf->Output("BCFEXA_Actividades_x_anio.pdf", "I");
}
else {
    echo "<h3>No hay Actividades cargadas en el año $anio_leido</h3>";
}

// Function for additional randomization if needed
function getRandomColor()
{
    return array(rand(0, 255), rand(0, 255), rand(0, 255));
}
?>