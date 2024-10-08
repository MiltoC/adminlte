<?php
require_once "../connection/conexion.php";
require_once "../operation/crud.php";

if (isset($_POST['id'])) {
    $crud = new Crud();
    $id = $_POST['id'];

    // Recoger los valores del formulario
    $cliente = isset($_POST['cliente']) ? trim($_POST['cliente']) : null;
    $empleado = isset($_POST['empleado']) ? trim($_POST['empleado']) : null;
    $producto = isset($_POST['producto']) ? trim($_POST['producto']) : null;
    $cantidad = isset($_POST['cantidad']) ? trim($_POST['cantidad']) : null;

    // Validar campos vacíos
    if (empty($cliente) || empty($empleado) || empty($producto) || empty($cantidad)) {
        die('Todos los campos son requeridos.');
    }

    // Preparar datos para actualizar
    $datos = [
        "cliente" => $cliente,
        "empleado" => $empleado,
        "producto" => $producto,
        "cantidad" => $cantidad,
    ];

    // Intentar actualizar el registro en la base de datos
    try {
        $respuesta = $crud->updatePedido($id, $datos);

        if ($respuesta->getModifiedCount() > 0) {
            header("Location: ../views/form-pedidos.php?info=success-actualizar");
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
