<?php

require_once '../../../controladores/reportes.controlador.php';
require_once '../../../modelos/reportes.modelo.php';

$fecha_actual = date("d-m-Y");
$fecha_anterior = date("d-m-Y",strtotime($fecha_actual."- 7 days")); 

$tablaDB = "ventas_netas";

$fechaFinal = date("Y-m-d");
$fechaInicio = date("Y-m-d",strtotime($fecha_actual."- 7 days")); 

$resultado = ControladorReporte::ctrMostrarVentasporFecha($tablaDB, $fechaInicio, $fechaFinal);


//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:180px"><img src="images/1.png"></td>

			<td style="background-color:white; width:170px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					RTN: 1807 2021 986754

					<br>
					Dirección: Calle 106, Col. Papaya

				</div>

			</td>

			<td style="background-color:white; width:170px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono: 2446 - 8705
					
					<br>
					Email: info@allonlinehn.com

				</div>
				
			</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

$bloque3 = <<<EOF

	<table style="padding:5px 10px;">

		<tr>
		
		<td style="background-color:white; font-size:16px; text-align:center">Reporte de Ingresos Semanales</td>
        
        </tr>
        
        <tr>

        <td style="background-color:white; font-size:12px; text-align:center">DEL $fecha_anterior AL $fecha_actual</td>
		
        </tr>

	</table>


EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

$bloque2 = <<<EOF
    
    <table style="font-size:10px; padding:5px 10px;">
            
    <tr>

    <td style="width:130px; text-align:left; background-color:#e9333b; color:white; border: 1px solid #000;">Fecha</td>
    <td style="width:200px; text-align:left; background-color:#e9333b; color:white; border: 1px solid #000;">Ingreso Neto</td>
    <td style="width:200px; text-align:left; background-color:#e9333b; color:white; border: 1px solid #000;">Ingreso Total</td>
    
    </tr>
    
    </table>
    
    
EOF;
    
$pdf->writeHTML($bloque2, false, false, false, false, '');


foreach ($resultado as $key => $value) {

$bloque4 = <<<EOF
    
    <table style="font-size:10px; padding:5px 10px;">
            
    <tr>

    <td style="width:130px; text-align:left; border: 1px solid #000;">$value[fecha]</td>
    <td style="width:200px; text-align:left; border: 1px solid #000;">$value[subtotal] lps.</td>
    <td style="width:200px; text-align:left; border: 1px solid #000;">$value[total] lps.</td>
    
    </tr>
    
    </table>
    
    
EOF;
    
$pdf->writeHTML($bloque4, false, false, false, false, '');
    
}


//SALIDA DEL ARCHIVO
$pdf->Output('informe-ventas.pdf', 'I');