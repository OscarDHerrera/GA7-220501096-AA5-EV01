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
        if (agregarUsuario($usuario, $contraseña)) {
            echo "Registro satisfactorio";
        } else {
            echo "Error: El usuario ya existe";
        }
    } else {
        echo "Error: Todos los campos son obligatorios";
    }
}
?>
