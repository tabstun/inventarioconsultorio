<?php
require_once 'Medicamento.php';
require_once 'MaterialCuracion.php';
require_once 'EquipoMedico.php';

$archivo = 'productos.json';
$productos = json_decode(file_get_contents($archivo), true);

if ($_POST['accion'] == 'agregar') {
    $nuevo = [
        'id' => count($productos) + 1,
        'nombre' => $_POST['nombre'],
        'tipo' => $_POST['tipo'],
        'precio' => $_POST['precio'],
        'cantidad' => $_POST['cantidad'],
        'detalle' => $_POST['detalle']
    ];
    $productos[] = $nuevo;
    file_put_contents($archivo, json_encode($productos));
    header('Location: index.php');

} elseif ($_POST['accion'] == 'descontar') {
    foreach ($productos as &$prod) {
        if ($prod['id'] == $_POST['id']) {
            $prod['cantidad'] -= $_POST['cantidad'];
            if ($prod['cantidad'] < 0) { $prod['cantidad'] = 0; }
            break;
        }
    }
    file_put_contents($archivo, json_encode($productos));
    header('Location: index.php');

} elseif ($_POST['accion'] == 'sumar') {
    foreach ($productos as &$prod) {
        if ($prod['id'] == $_POST['id']) {
            $prod['cantidad'] += $_POST['cantidad'];
            break;
        }
    }
    file_put_contents($archivo, json_encode($productos));
    header('Location: index.php');
}
?>