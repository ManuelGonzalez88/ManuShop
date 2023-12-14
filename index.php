<?php

include './class/autoload.php';

$listaProductos = productos::listar();


//var_dump($listaProductos);
//
//echo "<pre>";
//print_r($listacategorias);
//echo "</pre>";

include './views/home.html';