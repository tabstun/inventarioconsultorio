<?php
require_once 'ProductoConsultorio.php';
require_once 'Descontable.php';

class MaterialCuracion extends ProductoConsultorio implements Descontable {
    private $tipoMaterial;

    public function __construct($id, $nombre, $precio, $cantidad, $tipoMaterial) {
        parent::__construct($id, $nombre, $precio, $cantidad);
        $this->tipoMaterial = $tipoMaterial;
    }

    public function mostrarInfo() {
        return "MATERIAL DE CURACIÓN: {$this->nombre}, Tipo: {$this->tipoMaterial}, Precio: {$this->precio}, Cantidad: {$this->cantidad}";
    }

    public function descontarStock($cantidad) {
        if ($cantidad <= $this->cantidad) {
            $this->cantidad -= $cantidad;
        }
    }
}
?>