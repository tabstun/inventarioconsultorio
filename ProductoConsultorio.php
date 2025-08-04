<?php

/**
 * Clase abstracta ProductoConsultorio
 * -----------------------------------
 * Esta clase define la estructura base para cualquier producto del inventario del consultorio (medicamentos, material de curación, equipo médico).
 * 
 * Conceptos clave:
 * - CLASE ABSTRACTA: no puede ser instanciada directamente.
 * - ATRIBUTOS COMUNES: todos los productos comparten ID, nombre, precio y cantidad.
 * - MÉTODO ABSTRACTO: mostrarInfo() debe implementarse en cada subclase.
 */
    // ===========================
    // ATRIBUTOS PROTEGIDOS
    // ===========================


abstract class ProductoConsultorio {
    protected $id;
    protected $nombre;
    protected $precio;
    protected $cantidad;



/**
 * @param int $id        Identificador único del producto
 * @param string $nombre Nombre del producto
 * @param float $precio  Precio unitario
 * @param int $cantidad  Cantidad disponible
 */


    public function __construct($id, $nombre, $precio, $cantidad) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }


    // ===========================
    // MÉTODO ABSTRACTO
    // ===========================
    /**
     * Método abstracto que cada subclase debe implementar.
     * Obligatorio para que cada tipo de producto muestre su información de forma personalizada.
     */

    abstract public function mostrarInfo();

     // ===========================
    // MÉTODO CONCRETO
    // ===========================
    /**
     * Calcula el valor total del inventario de este producto.
     * @return float Precio total del inventario de ese producto
     */

    public function calcularValorInventario() {
        return $this->precio * $this->cantidad;
    }
}
?>