<?php
require_once "../connection/conexion.php";
require_once "../operation/crud.php";

if (isset($_POST['id'])) {
    $crud = new Crud();
    $id = $_POST['id'];

    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);

    // Validar campos vacíos
    if (empty($nombre) || empty($descripcion)) {
        die('Todos los campos son requeridos.');
    }

    // Validar que el nombre solo contenga letras
    if (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
        die('El nombre solo debe contener letras.');
    }

    $datos = [
        "nombre" => $nombre,
        "descripcion" => $descripcion
    ];

    try {
        $respuesta = $crud->updateCategory($id, $datos);

        if ($respuesta->getModifiedCount() > 0) {
            header("Location: ../views/form-categorias.php?info=success-actualizar");
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