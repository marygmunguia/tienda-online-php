<?php

class ControladorReporte
{

    static public function ctrConsultarVenta()
    {
        $tablaDB = "ventas_por_fecha";

        $resultado = ModeloReportes::mdlConsultarVentas($tablaDB);

        return $resultado;
    }

    static public function ctrMostrarProductosMasVendidos()
    {

        $tablaDB = "mas_vendidos";

        $resultado = ModeloReportes::mdlMostrarProductosMasVendidos($tablaDB);

        return $resultado;
    }
    
    static public function ctrMostrarVentas()
    {

        $tablaDB = "ventas_netas";

        $resultado = ModeloReportes::mdlmostrarVentas($tablaDB);

        return $resultado;
    }

    static public function ctrMostrarVentasporFecha($tabla, $fechaInicio, $fechaFinal)
    {
        $resultado = ModeloReportes::mdlmostrarVentasporFecha($tabla, $fechaInicio, $fechaFinal);

        return $resultado;
    }

    static public function ctrMostrarIngresosPorCategorias()
    {

        $tablaDB = "ingresos_por_categoria";

        $resultado = ModeloReportes::mdlmostrarVentas($tablaDB);

        return $resultado;
    }
}
