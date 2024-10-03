<?php
require_once "../connection/conexion.php";
require_once "../operation/crud.php";

if (isset($_POST['id'])) {
    $crud = new Crud();
    $id = $_POST['id'];

    $datos = [
        "nombre" => $_POST['nombre'],
        "email" => $_POST['email'],
        "telefono" => $_POST['telefono'],
        "direccion" => $_POST['direccion']
    ];

    try {
        $respuesta = $crud->update($id, $datos);

        if ($respuesta->getModifiedCount() > 0) {
            header("Location: ../views/form-clientes.php");
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