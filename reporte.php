<?php
require('fpdf/fpdf.php');
include ('php/config.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
	$query="SELECT id, codigo_factura, cliente, ruc_cliente, fecha, telefono, direc_cliente FROM factura";
    	if ($result =$db->query($query)){
        	while($row=$result->fetch_assoc()){

        			$id = $row['id'];
        			$codigo_factura = $row['codigo_factura'];
        			$cliente = $row['cliente'];
        			$ruc_cliente = $row['ruc_cliente'];
        			$fecha = $row['fecha'];
        			$telefono = $row['telefono'];
        			$direc_cliente = $row['direc_cliente'];

        	}
        }


$pdf->Cell(110,10, 'FACTURA  #' .utf8_decode($codigo_factura));
$pdf->SetFont('Arial','B',35);
$pdf->Cell(1, 10,'FACTURA');

$pdf->Ln(2);
$pdf->SetFont('Arial','',11);
$pdf->SetTextColor(39,39,51);
$pdf->Cell(0.1,20,'Fecha: ' .$fecha);

$pdf->SetFont('Arial','B',16);
$pdf->Cell(105,60, utf8_decode($cliente));

$pdf->SetFont('Arial','B',11);
$pdf->Cell(30, 60,'Tel. del cliente: ');
$pdf->SetFont('Arial','',11);
$pdf->Cell(1, 60, $telefono);

$pdf->Ln(6);
$pdf->Cell(105,65, ' ');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(25, 65,'Direccion: ');
$pdf->SetFont('Arial','',11);
$pdf->Cell(1, 65, $direc_cliente);







$pdf->Ln(3);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60,110,'ITEM:');
$pdf->Cell(50, 110,'QUANTITY/HOURS.');
$pdf->Cell(40,110,'UNIT PRICE');
$pdf->Cell(-100,110,'TOTAL');
$pdf->line(10, 85, 180, 85);



$pdf->Ln(0.1);





$query2="SELECT nom_servicio, des_servicio, cantidad, precio_uni FROM detalle_factura";
    	if ($result =$db->query($query2)){
        	while($row=$result->fetch_assoc()){

        			$nom_servicio= $row['nom_servicio'];
        			$des_servicio = $row['des_servicio'];
        			$cantidad= $row['cantidad'];
        			$precio_uni = $row['precio_uni'];
        			$importe = $cantidad*$precio_uni;





        			$pdf->Ln(11);
        			$pdf->SetFont('Arial','B',11);
        			$pdf->Cell(60,130,$nom_servicio);
        			$pdf->SetFont('Arial','',11);
        			$pdf->Ln(0.1);
        			$pdf->Cell(75,130, ' ');
					$pdf->Cell(38, 130, $cantidad);
					$pdf->Cell(39,130, $precio_uni);
					$pdf->SetFont('Arial','B',11);
					$pdf->SetTextColor(255, 0, 0);
					$pdf->Cell(-100,130, $importe);
					$pdf->SetFont('Arial','',11);
					$pdf->SetTextColor(0, 0, 0);
					$pdf->Ln(11);

        			$pdf->Cell(65, 117, $des_servicio);
        			$pdf->SetDrawColor(205,205,205);
        			$pdf->line(10, 110, 180, 110);
        			$pdf->line(10, 132, 180, 132);
        			$pdf->line(10, 153, 180, 153);

        			
        	}
        }

$pdf->SetFont('Arial','B',11);
$pdf->Ln(0.1);
$pdf->Cell(123,160, ' ');
$pdf->Cell(75, 160, 'SUBTOTAL: 			$492');
$pdf->Ln(4);
$pdf->Cell(123,165, ' ');
$pdf->Cell(75, 165, 'IMPUESTOS: 			$79');
$pdf->Ln(1);
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(255, 0, 0);
$pdf->Cell(123,183, ' ');
$pdf->Cell(75, 183, 'TOTAL: 			$571');



$pdf->Image('./assets/img/favicon.png',0,210,210,100,'PNG');

$pdf->Output();
?>


