<?php
include "../connection/conexion.php";
include "../operation/crud.php";

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$dui = isset($_POST['dui']) ? $_POST['dui'] : null;
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;

// Validar que todos los campos estén llenos
if(empty($nombre) || empty($dui) || empty($cargo) || empty($email)){
    die("Todos los campos son obligatorios.");
}

// Validar nombre (solo letras y espacios)
if(!preg_match("/^[A-Za-z\s]+$/", $nombre)){
    die("El nombre solo debe contener letras y espacios.");
}

// Validar cargi (solo letras y espacios)
if(!preg_match("/^[A-Za-z\s]+$/", $cargo)){
    die("El cargo solo debe contener letras y espacios.");
}

// Validar que el DUI cumpla con el formato salvadoreño (00000000-0)
if (!preg_match("/^\d{8}-\d{1}$/", $dui)) {
    die("Ingresa un DUI válido en el formato 00000000-0.");
}

// Validar formato de correo electrónico
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    die("Ingresa un correo electrónico válido.");
}

$crud = new Crud();

$datos = array(
    "nombre" => $nombre,
    "dui" => $dui,
    "cargo" => $cargo,
    "email" => $email
);

try{
    $respuesta = $crud->saveEmpleado($datos);

    if ($respuesta->isAcknowledged()){
        header("Location: ../views/form-empleados.php?info=success-agregar");
        exit();
    } else {
        die("Error al guardar el registro.");
    }
}catch(Exception $e){
    echo "Error: " . $e->getMessage();
}
?>
