<?php
require_once 'Medicamento.php';
require_once 'MaterialCuracion.php';
require_once 'EquipoMedico.php';

$archivo = 'productos.json';

// Si no existe el archivo JSON, crearlo vacío
if (!file_exists($archivo)) {
    file_put_contents($archivo, json_encode([]));
}

// Leer productos del JSON
$productos = json_decode(file_get_contents($archivo), true);

echo "<h1>Inventario del Consultorio</h1>";
echo "<a href='agregar.php'>➕ Agregar producto</a><br><br>";

if (empty($productos)) {
    echo "No hay productos en inventario.";
} else {
    echo "<table border='1' cellpadding='5'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Descontar</th>
                <th>Agregar</th>
            </tr>";
    foreach ($productos as $index => $prod) {
        echo "<tr>
                <td>{$prod['id']}</td>
                <td>{$prod['nombre']}</td>
                <td>{$prod['tipo']}</td>
                <td>{$prod['precio']}</td>
                <td>{$prod['cantidad']}</td>
                <td>
                    <form method='POST' action='acciones.php'>
                        <input type='hidden' name='accion' value='descontar'>
                        <input type='hidden' name='id' value='{$prod['id']}'>
                        <input type='number' name='cantidad' min='1' max='{$prod['cantidad']}' placeholder='Cantidad'>
                        <button type='submit'>Descontar</button>
                    </form>
                </td>
                <td>
                    <form method='POST' action='acciones.php'>
                        <input type='hidden' name='accion' value='sumar'>
                        <input type='hidden' name='id' value='{$prod['id']}'>
                        <input type='number' name='cantidad' min='1' placeholder='Cantidad'>
                        <button type='submit'>Sumar</button>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
}
?>