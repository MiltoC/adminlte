<?php
require_once "../connection/conexion.php";
require_once "../operation/crud.php";

if (isset($_POST['id'])) {
    $crud = new Crud();
    $id = $_POST['id'];

    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : null;
    $rol = isset($_POST['rol']) ? $_POST['rol'] : null;

    // Validar que todos los campos estén llenos
    if(empty($usuario) || empty($email) || empty($contraseña)){
        die("Todos los campos son obligatorios.");
    }

    // Validar nombre (solo letras y espacios)
    if(!preg_match("/^[A-Za-z\s]+$/", $usuario)){
        die("El nombre solo debe contener letras y espacios.");
    }

    // Validar formato de correo electrónico
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die("Ingresa un correo electrónico válido.");
    }

    $datos = array(
        "usuario" => $usuario,
        "email" => $email,
        "contraseña" => $contraseña,
        "rol" => $rol
    );

    try {
        $respuesta = $crud->updateUser($id, $datos);

        if ($respuesta->getModifiedCount() > 0) {
            header("Location: ../views/form-usuarios.php?info=success-actualizar");
            exit();
        } else {
            echo "No se realizaron cambios.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID no proporcionado.";
}
?>