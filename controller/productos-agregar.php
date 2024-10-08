<?php
include "../connection/conexion.php";
include "../operation/crud.php";

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
$precio = isset($_POST['precio']) ? $_POST['precio'] : null;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
$imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] : null;

// Validar que todos los campos estén llenos
if(empty($nombre) || empty($descripcion) || empty($precio) || empty($categoria) || empty($imagen)){
    die("Todos los campos son obligatorios.");
}

// Validar que el nombre solo contenga letras y espacios
if(!preg_match("/^[A-Za-z\s]+$/", $nombre)){
    die("El nombre solo debe contener letras y espacios.");
}

// Procesar la imagen
$uploadDir = '../img/';
$uploadFile = $uploadDir . basename($_FILES['imagen']['name']);

if (move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadFile)) {
    // Guardar los datos en MongoDB
    $crud = new Crud();

    $datos = array(
        "producto" => $nombre,
        "descripcion" => $descripcion,
        "precio" => floatval($precio),
        "categoria" => $categoria,
        "imagen" => $uploadFile // Ruta de la imagen guardada
    );

    try {
        $respuesta = $crud->saveProduct($datos);
        
        if ($respuesta->isAcknowledged()) {
            header("Location: ../views/form-productos.php?info=success-agregar");
            exit();
        } else {
            die("Error al guardar el registro.");
        }
    } catch(Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    die("Error al subir la imagen.");
}
?>
