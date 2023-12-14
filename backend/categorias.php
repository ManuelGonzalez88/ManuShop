<?php

include '../class/autoload.php';

//echo "<pre>";
//print_r($_GET);
//echo "</pre>"; 
//die();

if(isset($_POST['accion']) && $_POST['accion'] === 'guardar'){

    $nombre = $_POST['nombreCategoria'];

    $categoria = new categorias($nombre);
    
    $categoria->guardar();
} else if(isset($_GET["accion"]) && $_GET["accion"] === 'agregar' ) {
    include './views/categorias.html';
    die();
}

$listadoCategorias = categorias::listar();

include './views/lista_categorias.html';

    //$categoria->modificar("electrodomesticos", 4);

    //$categoria->eliminar(6);

