<?php

require_once '../../../controladores/usuario.controlador.php';
require_once '../../../modelos/usuarios.modelo.php';

$fecha_actual = date("d-m-Y");
$fecha_anterior = date("d-m-Y",strtotime($fecha_actual."- 7 days")); 

$tabla = "usuarios";

$tipo = "C";

$fechaFinal = date("Y-m-d");
$fechaInicio = date("Y-m-d",strtotime($fecha_actual."- 7 days")); 


$resultado = ControladorUsuario::ctrNuevosUsuariosC($tabla, $fechaInicio, $fechaFinal, $tipo);


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
		
		<td style="background-color:white; font-size:18px; text-align:center">Reporte de Nuevos Usuarios</td>

		</tr>

		<tr>

		<td style="background-color:white; font-size:13px; text-align:center">De $fecha_anterior al $fecha_actual</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:#e9333b; color:white; width:60px; text-align:center">ID</td>
        <td style="border: 1px solid #666; background-color:#e9333b; color:white; width:230px;">Nombre</td>
		<td style="border: 1px solid #666; background-color:#e9333b; color:white; width:180px;">Email</td>
		<td style="border: 1px solid #666; background-color:#e9333b; color:white; width:80px;">Fecha</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');


foreach ($resultado as $key => $value) {

$bloque4 = <<<EOF

<table style="font-size:10px; padding:5px 10px;">
		
<tr>

<td style="width:60px; text-align:center; border: 1px solid #000;">$value[idusuario]</td>
<td style="width:230px; text-align:left; border: 1px solid #000;"><font style="text-transform: uppercase;">$value[nombre]</font></td>
<td style="width:180px; text-align:left; border: 1px solid #000;">$value[email]</td>
<td style="width:80px; text-align:left; border: 1px solid #000;">$value[fecha_registro]</td>

</tr>

</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

//SALIDA DEL ARCHIVO
$pdf->Output('informe-nuevo-usuarios.pdf', 'I');