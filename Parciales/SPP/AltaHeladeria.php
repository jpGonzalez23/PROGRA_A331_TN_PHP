<?php

$sabor = $_POST['sabor'];
$precio = $_POST['precio'];
$tipo = $_POST['tipo'];
$vaso = $_POST['vaso'];
$stock = $_POST['stock'];
$imagen = $_FILES['imagen'];

$helado = new Helado($sabor, $precio, $tipo, $vaso, $stock);
