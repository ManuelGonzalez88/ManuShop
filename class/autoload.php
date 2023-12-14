<?php
/**
 * Description of autoload
 *
 * @author Manuel Gonzalez
 */
class Autocarga{

    static public function cargar_clase($clase) {
        $arrayClase = array();
        $base = __DIR__.DIRECTORY_SEPARATOR;
        $arrayClase['database'] = $base.'database.php';
        $arrayClase['categorias'] = $base.'categorias.php';
        $arrayClase['productos'] = $base.'productos.php';

        if (isset($arrayClase[$clase])) {
            if (file_exists($arrayClase[$clase])) {
                include $arrayClase[$clase];
            } else {
                throw new Exception("Archivo de clase no encontrada [{$arrayClase[$clase]}]");
            }
        }
    }

}
spl_autoload_register('Autocarga::cargar_clase');