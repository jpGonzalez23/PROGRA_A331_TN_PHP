<?php

include_once(".././Ejercicio25/clase/producto.php");

switch($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        if(isset($_POST['codigoDeBarra']) && isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['stock']) && isset($_POST['precio'])) {
            $codigoBarra = $_POST['codigoDeBarra'];
            $nombre = $_POST['nombre'];
            $tipo = $_POST['tipo'];
            $stock = $_POST['stock'];
            $precio = $_POST['precio'];

            $id = rand(1, 1000);

            $producto = new Producto($id, $codigoBarra, $nombre, $tipo, $stock, $precio);

            $resultado = $producto->AltaProducto("productos.json");

            echo $resultado;
        } else {
            echo "Error: Todo los campos son requeridos";
        }
        break;

    case 'GET':
        if(isset($_GET['codigoDeBarra']) && isset($_GET['nombre']) && isset($_GET['tipo']) && isset($_GET['stock']) && isset($_GET['precio'])) { 
            $producto->LeerProducto("productos.json");

            if(!empty($producto)) {
                foreach($producto as $p) {
                    echo "codigo de barra: " . $p["codigoBarra"] ." Nombre: ". $p["nombre"] . " tipo: " . $p["tipo"] ." stock: ". $p["stock"] . " precio: $" . $p['precio'];
                }
            }
        }
        break;

    default:
        echo "Error: Metodo de solicitud incorrecto";
}