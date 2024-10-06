<?php
include "../connection/conexion.php";
include "../operation/crud.php";

$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : null;

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

$crud = new Crud();

$datos = array(
    "usuario" => $usuario,
    "email" => $email,
    "contraseña" => $contraseña
);

try{
    $respuesta = $crud->saveUser($datos);

    if ($respuesta->isAcknowledged()){
        header("Location: ../index.php");
        exit();
    } else {
        die("Error al guardar el registro.");
    }
}catch(Exception $e){
    echo "Error: " . $e->getMessage();
}
?>
