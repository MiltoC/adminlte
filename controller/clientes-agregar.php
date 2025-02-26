<?php
include "../connection/conexion.php";
include "../operation/crud.php";

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;

// Validar que todos los campos estén llenos
if(empty($nombre) || empty($email) || empty($telefono) || empty($direccion)){
    die("Todos los campos son obligatorios.");
}

// Validar nombre (solo letras y espacios)
if(!preg_match("/^[A-Za-z\s]+$/", $nombre)){
    die("El nombre solo debe contener letras y espacios.");
}

// Validar formato de correo electrónico
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    die("Ingresa un correo electrónico válido.");
}

// Validar teléfono (9-10 dígitos)
if(!preg_match("/^\d{8,10}$/", $telefono)){
    die("El número de teléfono debe tener entre 9 y 10 dígitos.");
}

$crud = new Crud();

$datos = array(
    "nombre" => $nombre,
    "email" => $email,
    "telefono" => $telefono,
    "direccion" => $direccion
);

try{
    $respuesta = $crud->save($datos);

    if ($respuesta->isAcknowledged()){
        header("Location: ../views/form-clientes.php?info=success-agregar");
        exit();
    } else {
        die("Error al guardar el registro.");
    }
}catch(Exception $e){
    echo "Error: " . $e->getMessage();
}
?>
