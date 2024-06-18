<?php
// Incluir archivo de funciones de usuario
require 'user_functions.php';

// Verificar si los datos han sido enviados mediante POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Validar que no estén vacíos
    if (!empty($usuario) && !empty($contraseña)) {
        if (autenticarUsuario($usuario, $contraseña)) {
            echo "Autenticación satisfactoria";
        } else {
            echo "Error en la autenticación";
        }
    } else {
        echo "Error: Todos los campos son obligatorios";
    }
}
?>
