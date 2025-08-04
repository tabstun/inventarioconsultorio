<?php
require_once 'ProductoConsultorio.php';
require_once 'Descontable.php';

class EquipoMedico extends ProductoConsultorio implements Descontable {
    private $marca;

    public function __construct($id, $nombre, $precio, $cantidad, $marca) {
        parent::__construct($id, $nombre, $precio, $cantidad);
        $this->marca = $marca;
    }

    public function mostrarInfo() {
        return "EQUIPO MÉDICO: {$this->nombre}, Marca: {$this->marca}, Precio: {$this->precio}, Cantidad: {$this->cantidad}";
    }

    public function descontarStock($cantidad) {
        if ($cantidad <= $this->cantidad) {
            $this->cantidad -= $cantidad;
        }
    }
}
?>