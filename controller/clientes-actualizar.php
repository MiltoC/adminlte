<?php
require_once "../connection/conexion.php";
require_once "../operation/crud.php";

if (isset($_POST['id'])) {
    $crud = new Crud();
    $id = $_POST['id'];

    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $direccion = trim($_POST['direccion']);

    // Validar campos vacíos
    if (empty($nombre) || empty($email) || empty($telefono) || empty($direccion)) {
        die('Todos los campos son requeridos.');
    }

    // Validar que el nombre solo contenga letras
    if (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
        die('El nombre solo debe contener letras.');
    }

    // Validar formato de email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('El formato del correo electrónico es inválido.');
    }

    // Validar formato de teléfono (número de 10 dígitos)
    if (!preg_match("/^\d{8,10}$/", $telefono)) {
        die('El número de teléfono debe contener 10 dígitos.');
    }

    $datos = [
        "nombre" => $nombre,
        "email" => $email,
        "telefono" => $telefono,
        "direccion" => $direccion
    ];

    try {
        $respuesta = $crud->update($id, $datos);

        if ($respuesta->getModifiedCount() > 0) {
            header("Location: ../views/form-clientes.php?info=success-actualizar");
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