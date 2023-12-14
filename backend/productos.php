<?php

include '../class/autoload.php';

//echo "<pre>";
//print_r($_GET);
//echo "</pre>";
//die();

if (isset($_POST['accion']) && $_POST['accion'] === 'guardar') {
    
//    echo "<pre>";
//    print_r($_FILES);
//    echo "</pre>"; 
//    echo "el directorio actul es ".__DIR__;
    $folder = explode("\\", __DIR__);
    array_pop($folder);
//    echo "<pre>";
//    print_r($folder);
//    echo "</pre>";
    $folder = implode("\\", $folder) . "\\assets\\img\\productos\\";
//    echo $folder;
//    print_r(pathinfo($_FILES['imagenProducto']['name']));
//    echo pathinfo($_FILES['imagenProducto']['name']);
//    echo md5($_FILES['imagenProducto']['tmp_name']. date("Y-m-d H:i:s")).".".pathinfo($_FILES['imagenProducto']['name'], PATHINFO_EXTENSION);
    $nombre_archivo = md5($_FILES['imagenProducto']['tmp_name'] . date("Y-m-d H:i:s")) . "." . pathinfo($_FILES['imagenProducto']['name'], PATHINFO_EXTENSION);
//    die();
    if (!move_uploaded_file($_FILES['imagenProducto']['tmp_name'], $folder . $nombre_archivo)) {
        die("No se pudo subir el archivo. Intente mas tarde");
    }
//    die();
    
    $nombre = $_POST['nombreProducto'];
    $imagen = $nombre_archivo;
    $descripcion = $_POST['descripcionProducto'];
    $precio = $_POST['precioProducto'];
    $categoria = $_POST['categoriaProducto'];

    $producto = new productos($nombre, $imagen, $descripcion, $precio, $categoria);

    $producto->guardar();
  } else if(isset($_GET["accion"]) && $_GET["accion"] === 'agregar' ) {   
    $categorias = categorias::listar();
    include 'views/productos.html';
    die();
}

    $listadoProductos = productos::listar();
    
    include './views/lista_productos.html';

//$producto->modificar();
//$producto->eliminar();

die();
?>

<?php

include '../class/autoload.php';

if (isset($_POST['accion']) && $_POST['accion'] === 'guardar') {
//    echo "<pre>";
//    print_r($_FILES);
//    echo "</pre>"; 
//    echo "el directorio actul es ".__DIR__;
    $folder = explode("\\", __DIR__);
    array_pop($folder);
//    echo "<pre>";
//    print_r($folder);
//    echo "</pre>";
    $folder = implode("\\", $folder) . "\\assets\\img\\productos\\";
//    echo $folder;
//    print_r(pathinfo($_FILES['imagen']['name']));
//    echo pathinfo($_FILES['imagen']['name']);
//    echo md5($_FILES['imagen']['tmp_name']. date("Y-m-d H:i:s")).".".pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
    $nombre_archivo = md5($_FILES['imagen']['tmp_name'] . date("Y-m-d H:i:s")) . "." . pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
//    die();
    if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $folder . $nombre_archivo)) {
        die("No se pudo subir el archivo. Intente mas tarde");
    }
//    die();
    $miproducto = new Productos();
    $miproducto->nombre = $_POST['producto'];
    $miproducto->descripcion = $_POST['descripcion'];
    $miproducto->precio = $_POST['precio'];
    $miproducto->categoria = $_POST['categoria'];
    $miproducto->imagen = $nombre_archivo;
    $miproducto->guardar();
} else if (isset($_GET['categoria'])) {
    $categorias = Categorias::listar();
    include 'views/productos.html';
    die();
}

$lista_pro = Productos::listar();
include'views/lista_productos.html';
