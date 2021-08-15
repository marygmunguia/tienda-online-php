<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/cliente.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuario.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/producto.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class imprimirFactura
{

public $codigo;

public function traerImpresionFactura()

{

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "idventa";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrConsultarVenta($itemVenta, $valorVenta);

$fecha = $respuestaVenta["fecha"];
$neto = number_format($respuestaVenta["subtotal"], 2);
$impuesto = number_format($respuestaVenta["isv"], 2);
$total = number_format($respuestaVenta["total"], 2);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemCliente = "idusuario";
$valorCliente = $respuestaVenta["idusuario"];

$respuestaCliente = ControladorUsuario::ctrMostrarUsuarios($itemCliente, $valorCliente);

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:150px"><img src="images/1.png"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
				<br>
				RTN: 1807 2021 986754

				<br>
				Dirección: Calle 106, Col. Papaya

				</div>

			</td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
				<br>
				Teléfono: 2446 - 8705
				
				<br>
				Email: info@allonlinehn.com
				
				</div>
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>FACTURA N.<br>$valorVenta</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="background-color:white; width:390px">

				Cliente: $respuestaCliente[nombre]

			</td>

			<td style="background-color:white; width:150px; text-align:right">
			
				Fecha: $fecha

			</td>

		</tr>

		<tr>
		
		<td style=" background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:#e9333b; color:white; width:60px; text-align:center">ID</td>
        <td style="border: 1px solid #666; background-color:#e9333b; color:white; width:200px; text-align:center">Producto</td>
		<td style="border: 1px solid #666; background-color:#e9333b; color:white; width:80px; text-align:center">Cantidad</td>
		<td style="border: 1px solid #666; background-color:#e9333b; color:white; width:100px; text-align:center">Valor Unit.</td>
		<td style="border: 1px solid #666; background-color:#e9333b; color:white; width:100px; text-align:center">Valor Total</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

$productos = ControladorVentas::ctrConsultarDetalleVentas($itemVenta, $valorVenta);

foreach ($productos as $key => $valor) {

$bloque4 = <<<EOF

<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
		<td style="border: 1px solid #666; color:#333; background-color:white; width:60px; text-align:center">
				$valor[idproducto]
			</td>
        
        <td style="border: 1px solid #666; color:#333; background-color:white; width:200px; text-align:center">
				$valor[nombre]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
				$valor[cantidad]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">Lps.
                $valor[precio]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">Lps.
                $valor[total]
			</td>


		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; background-color:white; width:340px;"></td>

			<td style="background-color:white; width:100px;"></td>

			<td style="color:#333; background-color:white; width:100px;"></td>

		</tr>
		
		<tr>
		
			<td style="color:#333; background-color:white; width:340px;"></td>

			<td style=" background-color:white; width:100px;">
				Subtotal:
			</td>

			<td style="color:#333; background-color:white; width:100px;">Lps. $neto</td>

		</tr>

		<tr>

			<td style="color:#333; background-color:white; width:340px;"></td>

			<td style="background-color:white; width:100px;">
				ISV:
			</td>
		
			<td style="color:#333; background-color:white; width:100px;">
				Lps. $impuesto
			</td>

		</tr>

		<tr>
		
			<td style="color:#333; background-color:white; width:340px;"></td>

			<td style="background-color:white; width:100px;">
				Total a pagar:
			</td>
			
			<td style="color:#333; background-color:white; width:100px;">
				Lps. $total
			</td>

		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');



        // ---------------------------------------------------------
        //SALIDA DEL ARCHIVO 

$pdf->Output('factura.pdf', 'I');

    }
}

$factura = new imprimirFactura();
$factura->codigo = $_GET["codigo"];
$factura->traerImpresionFactura();
