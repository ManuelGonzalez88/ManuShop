<?php
/*
 * @author Manuel Gonzalez
 */
class productos {
    
    private $id;
    private $nombre;
    private $imagen;
    private $descripcion;
    private $precio;
    private $categoria;
    
    function __construct($nombre, $imagen, $descripcion, $precio, $categoria) {
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->categoria = $categoria;
    }
    
    function guardar(){
        $db = new database();
        $columnas = array("nombre","imagen","descripcion","precio","categoria");
        $valores = array($this->nombre, $this->imagen , $this->descripcion, $this->precio, $this->categoria);
        $db->insert("productos", $columnas, $valores);
    }
    
    function modificar($columnas, $valores, $id){
        $db = new database();
        $db->update("productos", $columnas, $valores, $id);
    }
    
    function eliminar($id){
        $db = new database();
        $db->delete("productos", $id);
    }
    
    static function listar(){
        $db = new database();
        return $db->select("productos");
    }
}
