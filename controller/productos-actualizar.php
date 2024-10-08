<?php
require_once "../connection/conexion.php";
require_once "../operation/crud.php";

if (isset($_POST['id'])) {
    $crud = new Crud();
    $id = $_POST['id'];

    // Recoger los valores del formulario
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : null;
    $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : null;
    $precio = isset($_POST['precio']) ? trim($_POST['precio']) : null;
    $categoria = isset($_POST['categoria']) ? trim($_POST['categoria']) : null;
    $imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] : null;

    // Validar campos vacíos
    if (empty($nombre) || empty($descripcion) || empty($precio) || empty($categoria)) {
        die('Todos los campos son requeridos.');
    }

    // Validar que el nombre solo contenga letras y espacios
    if (!preg_match("/^[A-Za-z\s]+$/", $nombre)) {
        die('El nombre solo debe contener letras y espacios.');
    }

    // Obtener el producto actual para recuperar la imagen antigua
    $productoActual = $crud->fetchDataByIdProduct($id);  // Esta función debe obtener los datos actuales del producto
    $imagenAnterior = $productoActual['imagen'];    // Ruta de la imagen antigua

    // Preparar datos para actualizar
    $datos = [
        "producto" => $nombre,
        "descripcion" => $descripcion,
        "precio" => floatval($precio),
        "categoria" => $categoria,
    ];

    // Verificar si se ha subido una nueva imagen
    if ($imagen && $imagen['size'] > 0) {
        $uploadDir = '../img/';
        $uploadFile = $uploadDir . basename($imagen['name']);

        // Intentar mover la nueva imagen
        if (move_uploaded_file($imagen['tmp_name'], $uploadFile)) {
            $datos['imagen'] = $uploadFile;  // Incluir la ruta de la nueva imagen

            // Eliminar la imagen anterior del sistema de archivos
            if (file_exists($imagenAnterior)) {
                unlink($imagenAnterior);
            }
        } else {
            die('Error al subir la imagen.');
        }
    }

    // Intentar actualizar el registro en la base de datos
    try {
        $respuesta = $crud->updateProduct($id, $datos);

        if ($respuesta->getModifiedCount() > 0) {
            header("Location: ../views/form-productos.php?info=success-actualizar");
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
