<?php

include_once './clase/Venta.php';
include_once './clase/Helado.php';

$mail = $_POST['mail'];
$sabor = $_POST['sabor'];
$tipo = $_POST['tipo'];
$cantidad = $_POST['cantidad'];
$imagen = $_FILES['imagen'];

$helado = Helado::BuscarStockHelado($sabor, $tipo, 'Heladeria.json');

if($helado) {
    if($helado['_stock'] >= $cantidad) {
        if(Helado::ActualizarStock($sabor, $tipo, $cantidad, 'Heladeria.json')) {
            $ventas = new Venta($mail, $sabor, $tipo, $cantidad);
            if($ventas->RegistrarVenta('ventas.json')) {
                echo 'Venta registrada con exito';
            } else {
                echo 'No se pudo registrar la venta';
            }
        } else {
            echo 'No hay suficiente stock';
        }
    } else {
        echo 'No hay suficiente stock';
    }
} else {
    echo 'El helado no existe';
}

$rutaCarpeta = './ImagenesDeLaVenta/2024/';

$extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);

$nombreImagen = $sabor . ' - ' . $tipo . ' - ' . $mail . ' - ' . date('Ymd_His') . $extension;

if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCarpeta . $nombreImagen)) {
    echo "Imagen guardada con exito";
} else {
    echo "Error al guardar";
}