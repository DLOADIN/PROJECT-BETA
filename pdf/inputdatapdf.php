<?php
  require('../fpdf/fpdf.php');

  $pageWidth = 320; // Example: A4 width is 210mm
  $pdf = new FPDF('L', 'mm', array($pageWidth, 320)); // 'L' for landscape orientation
  // Custom page width (adjust as needed)
 
  $pdf->AddPage();
  $customHeaderNames = array(
    'id' => '#',
    'u_productname' => 'PRODUCT NAME',
    'u_currentprice' => 'CURRENT PRICE',
    'u_type' => 'TYPICAL RATING',
    // Add more as needed
);

$con=mysqli_connect('localhost','root','','competitorsystem');
$sql=mysqli_query($con,"SELECT * FROM inputdata");
$tableName = "Product Details";

// Set font
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, '' . $tableName);

if ($sql->num_rows > 0) {
  // Display table headers
  $pdf->Ln(10); // Add a new line with spacing
  $pdf->SetFont('Arial', 'B', 12);
while ($fieldInfo = $sql->fetch_field()) {
  $header[] = $fieldInfo->name;
  // Adjust the width of the cell based on the column name
  $customName = isset($customHeaderNames[$fieldInfo->name]) ? $customHeaderNames[$fieldInfo->name] : $fieldInfo->name;
  $cellWidth = ($fieldInfo->name == 'u_productname') ? 60 : 60;
  $pdf->Cell($cellWidth, 10, $customName, 1);
}
$pdf->Ln(); // Add extra spacing between headers and data

while ($row = $sql->fetch_assoc()) {
  foreach ($header as $col) {
      // Adjust the width of the cell based on the column name
      $cellWidth = ($col == 'u_productname') ? 60 : 60;
      $pdf->Cell($cellWidth, 10, $row[$col], 1);
  }
  $pdf->Ln(); // Move to the next line for the next row
}
  $pdf->Output();
}
?>