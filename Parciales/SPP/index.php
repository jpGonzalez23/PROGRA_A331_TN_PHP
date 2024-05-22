<?php
/*
 * Nombre: Gonzalez Juan Pablo
 * Div: A331-1 
 */

 include_once './clase/Helado.php';
 include_once './clase/Venta.php';

 switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        if(isset($_POST['sabor']) && isset($_POST['precio']) && isset($_POST['tipo']) && isset($_POST['vaso']) && isset($_POST['stock'])) {
            include './HeladeriaAlta.php';

            $resultado = $helado->AltaHeladeria('./Heladeria.json', $imagen);

            echo $resultado;
        }

        if(isset($_POST['mail']) && isset($_POST['sabor']) && isset($_POST['tipo']) && isset($_POST['cantidad'])) {
            include './AltaVenta.php';
        }
        
        break;
    
    case 'GET':
        if(isset($_GET['helado'])) {
            
            $helado = Helado::LeerHeladeria("Heladeria.json");
            
            if(!empty($helado)) {
                foreach($healdo as $h) {
                    echo "Sabor: " . $h['sabor'] . " Precio: $" . $h['precio'] . " Tipo: " . $h['tipo'] . " Vaso: " . $h['vaso'] . " Stock: " . $h['stock'];
                }
            }
        }
        break;

    default:
        echo "Metodo no permitido";
        break;
 }