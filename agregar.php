<?php
echo "<h1>Agregar Producto</h1>";
?>
<form method="POST" action="acciones.php">
    <input type="hidden" name="accion" value="agregar">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Tipo:</label><br>
    <select name="tipo" required>
        <option value="Medicamento">Medicamento</option>
        <option value="Material de Curacion">Material de Curación</option>
        <option value="Equipo Medico">Equipo Médico</option>
    </select><br><br>

    <label>Precio:</label><br>
    <input type="number" name="precio" step="0.01" required><br><br>

    <label>Cantidad:</label><br>
    <input type="number" name="cantidad" required><br><br>

    <label>Detalle adicional (dosis, tipo, marca):</label><br>
    <input type="text" name="detalle"><br><br>

    <button type="submit">Agregar</button>
</form>

<a href="index.php">⬅️ Volver</a>
