<?php
require_once "../connection/conexion.php";
require_once "../operation/crud.php";

if (isset($_POST['id'])) {
    $crud = new Crud();
    $id = $_POST['id'];

    try {
        // Buscar el producto por su ID
        $producto = $crud->fetchDataByIdProduct($id);

        if (!$producto) {
            die("Producto no encontrado.");
        }

        // Eliminar la imagen del servidor si existe
        if (isset($producto->imagen) && file_exists($producto->imagen)) {
            unlink($producto->imagen); // Eliminar el archivo de la imagen
        }

        // Eliminar el producto de la base de datos
        $respuesta = $crud->deleteProduct($id);

        if ($respuesta->getDeletedCount() > 0) {
            header("Location: ../views/form-productos.php");
            exit();
        } else {
            echo "Error al eliminar el producto.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID del producto no proporcionado.";
}
?>
