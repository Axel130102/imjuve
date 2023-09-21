<?php

// Verificar si la función hash() ya existe
if (!function_exists('hash')) {
    // Declarar la función hash()
    function hash($data, $algoritmo = 'sha256') {
        return hash($algoritmo, $data);
    }
}

?>