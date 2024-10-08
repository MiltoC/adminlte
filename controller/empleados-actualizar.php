<?php
require_once "../connection/conexion.php";
require_once "../operation/crud.php";

if (isset($_POST['id'])) {
    $crud = new Crud();
    $id = $_POST['id'];

    $nombre = trim($_POST['nombre']);
    $dui = trim($_POST['dui']);
    $cargo = trim($_POST['cargo']);
    $email = trim($_POST['email']);

    // Validar campos vacíos
    if (empty($nombre) || empty($dui) || empty($cargo) || empty($email)) {
        die('Todos los campos son requeridos.');
    }

    // Validar que el nombre solo contenga letras
    if (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
        die('El nombre solo debe contener letras.');
    }

    // Validar que el cargo solo contenga letras
    if (!preg_match("/^[a-zA-Z\s]+$/", $cargo)) {
        die('El nombre solo debe contener letras.');
    }

    // Validar formato de email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('El formato del correo electrónico es inválido.');
    }

    // Validar que el DUI cumpla con el formato salvadoreño (00000000-0)
    if (!preg_match("/^\d{8}-\d{1}$/", $dui)) {
        die("Ingresa un DUI válido en el formato 00000000-0.");
    }

    $datos = [
        "nombre" => $nombre,
        "dui" => $dui,
        "cargo" => $cargo,
        "email" => $email
    ];

    try {
        $respuesta = $crud->updateEmployee($id, $datos);

        if ($respuesta->getModifiedCount() > 0) {
            header("Location: ../views/form-empleados.php?info=success-actualizar");
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