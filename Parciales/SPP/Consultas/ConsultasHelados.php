<?php

include_once './clase/Helado.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sabor = $_POST['sabor'];
    $tipo = $_POST['tipo'];

    $resultado = Helado::BuscarHelado($sabor, $tipo, './heladeria.json');

    echo $resultado;

}