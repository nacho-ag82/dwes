<?php 

function confirmar(array $ar, string $mensaje){
    echo "<pre>$mensaje"; print_r($ar); echo "</pre>";
}

function compararProveedores($inventario_actual, $proveedor_a): array{
    // Comparar inventarios con proveedor A con la función array_column
    $productos_actual = array_column($inventario_actual, 'producto');
    $productos_proveedor_a = array_column($proveedor_a, 'producto');
    $diferencias_proveedor_a = array_diff($productos_actual, $productos_proveedor_a);
    return $diferencias_proveedor_a;

}



function contarPorCategoria(array $inventario_unido): array{
    $categorias = array_column($inventario_unido, 'categoria');
    $conteo_categorias = array_count_values($categorias);
    //echo "<pre>"; print_r(nl2br("Conteo de categorías \n"));print_r($conteo_categorias); echo "</pre>";

    // Extraer los precios
    $precios = array_column($inventario_unido , 'precio');

    // Ordenar los precios y aplicar ese orden al array de productos unidos
    sort($precios);
    $array_ordenado = array();
    foreach ($precios as $precio) {
        foreach ($inventario_unido as $elemento) {
            if ($elemento['precio'] == $precio) {
                $array_ordenado[] = $elemento;
                break;
            }
        }
    }

    return $array_ordenado;
}



// Eliminar productos duplicados
function eliminarProductosDuplicados(array $ar): array{    
    $resultadoProductosEliminados = [];
    foreach ($ar as $item) {
        $clave = $item['producto'] . '|' . $item['categoria']; // Crear una clave única por producto y categoría

        if (!isset($resultadoProductosEliminados[$clave])) {
            $resultadoProductosEliminados[$clave] = [
                'producto' => $item['producto'],
                'categoria' => $item['categoria'],
                'total_precio' => 0,
                'total_cantidad' => 0,
            ];
        }

        $resultadoProductosEliminados[$clave]['total_precio'] += $item['precio'] * $item['cantidad'];
        $resultadoProductosEliminados[$clave]['total_cantidad'] += $item['cantidad'];
    }
    foreach ($resultadoProductosEliminados as $clave => $datos) {
        $resultadoProductosEliminados[$clave]['precio_promedio'] = $datos['total_precio'] / $datos['total_cantidad'];
        unset($resultadoProductosEliminados[$clave]['total_precio']);

    }
    $resultadoProductosEliminados = array_values($resultadoProductosEliminados);
    return $resultadoProductosEliminados;
}



// Generar informe
function generarInforme(array $ar):array{
    $informe_inventario = [];
    foreach ($ar as $item) {
        $informe_inventario[$item['producto']] = [
            "precio" => $item['precio_promedio'],
            "cantidad" => $item['total_cantidad'],
            "categoria" => $item['categoria'],
        ];
    }
    return $informe_inventario;
}





?>