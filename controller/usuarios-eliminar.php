<?php
require_once "../connection/conexion.php";
require_once "../operation/crud.php";

if (isset($_POST['id'])) {
    $crud = new Crud();
    $id = $_POST['id'];

    try {
        $respuesta = $crud->deleteUser($id);

        if ($respuesta->getDeletedCount() > 0) {
            header("Location: ../views/form-usuarios.php");
            exit();
        } else {
            echo "Error al eliminar el registro.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID no proporcionado.";
}
?>