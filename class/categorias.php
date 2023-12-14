<?php

/**
 * @author Manuel Gonzalez
 */
class categorias {
    
    private $id;
    private $nombre;
    
    function __construct($nombre) {
        $this->nombre = $nombre;
    }
    
    function guardar(){
        $db = new database();
        
        $columnas = array("nombre");
        
        $valores = array($this->nombre);
        
        $db->insert("categorias", $columnas, $valores);
    }
    
    function modificar($valor, $id){
        $db = new database();
        
        $columnas = array("nombre");
        
        $valores = array($valor);
        
        $db->update("categorias", $columnas, $valores, $id);
    }
    
    function eliminar($id){
        $db = new database();
        
        $db->delete("categorias", $id);
    }
    
    static function listar(){
        $db = new database();
        
        return $db->select("categorias");
    }
    
    static function mostrar($id) {
        $db = new database();
        
        return $db->select("categorias","id=".$id);
    }
    
}