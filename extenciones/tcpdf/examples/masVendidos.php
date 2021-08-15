<?php

require_once '../../../controladores/ventas.controlador.php';
require_once '../../../modelos/ventas.modelo.php';


$tablaDB = "productos_mas_vendidos";

$resultado = ControladorVentas::ctrProductosMasVendidos($tablaDB);


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
		
		<td style="background-color:white; font-size:18px; text-align:center">Reporte de Productos más vendidos</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:#e9333b; color:white; width:100px; text-align:center">ID</td>
        <td style="border: 1px solid #666; background-color:#e9333b; color:white; width:330px;">Nombre</td>
		<td style="border: 1px solid #666; background-color:#e9333b; color:white; width:100px; text-align:center;">Volumen</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');


foreach ($resultado as $key => $value) {

$bloque4 = <<<EOF

<table style="font-size:10px; padding:5px 10px;">
		
<tr>

<td style="width:100px; text-align:center; border: 1px solid #000;">$value[idproducto]</td>
<td style="width:330px; border: 1px solid #000;">$value[nombre]</td>
<td style="width:100px; text-align:center; border: 1px solid #000;">$value[cantidad]</td>

</tr>

</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

//SALIDA DEL ARCHIVO
$pdf->Output('informe-nuevo-usuarios.pdf', 'I');