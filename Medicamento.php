<?php
require_once 'ProductoConsultorio.php';
require_once 'Descontable.php';

class Medicamento extends ProductoConsultorio implements Descontable {
    private $dosis;

    public function __construct($id, $nombre, $precio, $cantidad, $dosis) {
        parent::__construct($id, $nombre, $precio, $cantidad);
        $this->dosis = $dosis;
    }

    public function mostrarInfo() {
        return "MEDICAMENTO: {$this->nombre}, Dosis: {$this->dosis}, Precio: {$this->precio}, Cantidad: {$this->cantidad}";
    }

    public function descontarStock($cantidad) {
        if ($cantidad <= $this->cantidad) {
            $this->cantidad -= $cantidad;
        }
    }
}
?>