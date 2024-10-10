<?php
include "../connection/conexion.php";
include "../operation/crud.php";

// Obtener datos del formulario
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : null;

// Validar que ambos campos estén llenos
if(empty($usuario) || empty($contraseña)){
    die("El usuario y la contraseña son obligatorios.");
}

// Crear una instancia del CRUD
$crud = new Crud();

try {
    // Llamar a la función para verificar si el usuario existe y obtener los datos del usuario
    $usuarioValido = $crud->verificarUsuario($usuario, $contraseña);

    if ($usuarioValido) {
        // Usuario autenticado correctamente, revisar su rol
        $rol = $usuarioValido->rol;

        // Redirigir dependiendo del rol
        if ($rol === 'admin') {
            header("Location: ../views/inicio.php?info=success");
        } else if ($rol === 'user') {
            header("Location: ../views/inicio-usuarios.php?info=success");
        } else {
            // Si el rol no es válido, redirigir a una página de error o inicio
            header("Location: ../index.php?error=rol_no_valido");
        }
        exit();
    } else {
        // Usuario no registrado
        header("Location: ../index.php?error=usuario_no_registrado");
        exit();
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
