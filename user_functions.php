<?php
define('USER_FILE', 'usuarios.json');

// Función para obtener todos los usuarios
function obtenerUsuarios() {
    if (file_exists(USER_FILE)) {
        $json = file_get_contents(USER_FILE);
        return json_decode($json, true);
    }
    return [];
}

// Función para guardar los usuarios
function guardarUsuarios($usuarios) {
    $json = json_encode($usuarios, JSON_PRETTY_PRINT);
    file_put_contents(USER_FILE, $json);
}

// Función para encontrar un usuario por nombre
function encontrarUsuario($usuario) {
    $usuarios = obtenerUsuarios();
    foreach ($usuarios as $u) {
        if ($u['usuario'] === $usuario) {
            return $u;
        }
    }
    return null;
}

// Función para agregar un nuevo usuario
function agregarUsuario($usuario, $contraseña) {
    $usuarios = obtenerUsuarios();
    if (encontrarUsuario($usuario)) {
        return false; // Usuario ya existe
    }
    $usuarios[] = ['usuario' => $usuario, 'contraseña' => password_hash($contraseña, PASSWORD_DEFAULT)];
    guardarUsuarios($usuarios);
    return true;
}

// Función para verificar la autenticación
function autenticarUsuario($usuario, $contraseña) {
    $usuarioEncontrado = encontrarUsuario($usuario);
    if ($usuarioEncontrado && password_verify($contraseña, $usuarioEncontrado['contraseña'])) {
        return true;
    }
    return false;
}
?>
