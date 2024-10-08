<?php
include "../connection/conexion.php";
include "../operation/crud.php";

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;

// Validar que todos los campos estén llenos
if(empty($nombre) || empty($descripcion)){
    die("Todos los campos son obligatorios.");
}

// Validar nombre (solo letras y espacios)
if(!preg_match("/^[A-Za-z\s]+$/", $nombre)){
    die("El nombre solo debe contener letras y espacios.");
}

$crud = new Crud();

$datos = array(
    "nombre" => $nombre,
    "descripcion" => $descripcion
);

try{
    $respuesta = $crud->saveCategory($datos);

    if ($respuesta->isAcknowledged()){
        header("Location: ../views/form-categorias.php?info=success-agregar");
        exit();
    } else {
        die("Error al guardar el registro.");
    }
}catch(Exception $e){
    echo "Error: " . $e->getMessage();
}
?>
