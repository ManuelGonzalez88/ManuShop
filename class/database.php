<?php
/**
 * @author Manuel Gonzalez
 */

class database {

    private $db;

    function __construct() {
        $conection ="mysql:dbname=miproyecto;host=127.0.0.1";
        $this->db = new PDO($conection, "root", "corderito22");
        if (!$this->db) {
            throw new Exception("No se ha podido realizar la conexión");
        }
    }

    function select($tabla, $filtro = null, $orden = null, $limit = null) {
        
        $sql = "SELECT * FROM " . $tabla;
        
        if ($filtro != null) {
            $sql .= " WHERE " . $filtro;
        }
        if ($orden != null) {
            $sql .= " ORDER BY " . $orden;
        }
        if ($limit != null) {
            $sql .= " limit ". $limit;
        }
        
        $resource = $this->db->prepare($sql);
        $resource->execute();
        
        if ($resource){
            return $resource->fetchAll(PDO::FETCH_ASSOC);
        } else {
            throw new Exception("No se pudo realizar la consulta de selección");
        }
        
    }
    
    function insert($tabla, $columnas, $valores){
        
        $sql = "INSERT INTO ".$tabla." (";
        
        for ($i = 0; $i < count($columnas);$i++){
            $sql .= $columnas[$i];
            if($i != (count($columnas)-1)){
                $sql .= ", ";
            }
        }
        
        $sql .= ") VALUES (";
        
        for ($i = 0; $i < count($columnas);$i++){
            $sql .= "?";
            if($i != (count($columnas)-1)){
                $sql .= ", ";
            }
        }
        
        $sql .= ");";
        
        $resource = $this->db->prepare($sql);
        $resource->execute($valores);
        
        if (!$resource){
            throw new Exception("No se pudo realizar el registro");
        }
        
    }
    
    function update($tabla, $columnas, $valores, $id) {
        
        $sql = "UPDATE ".$tabla." SET ";
        
        for ($i = 0; $i < count($columnas);$i++){
            $sql .= $columnas[$i]." = '".$valores[$i]."' ";
            if($i != (count($columnas)-1)){
                $sql .= ", ";
            }
        }
        
        $sql .= "WHERE id = ".$id.";";
        
        echo $sql."</br>";
        
        $resource = $this->db->prepare($sql);
        $resource->execute();
        
        if ($resource){
            echo "Se modificó correctamente";
        } else {
            throw new Exception("No se pudo realizar la modificación");
        }
        
    }
    
    function delete($tabla, $id){
        
        $sql = "DELETE FROM ".$tabla." WHERE id = '".$id."';";
        
        echo $sql."</br>";
        
        $resource = $this->db->prepare($sql);
        $resource->execute();
        
        if ($resource){
            echo "Se eliminó correctamente";
        } else {
            throw new Exception("No se pudo eliminar");
        }
    }
}