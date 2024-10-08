<?php
include "../connection/conexion.php";
include "../operation/crud.php";

date_default_timezone_set('America/Mexico_City');

$cliente = isset($_POST['cliente']) ? $_POST['cliente'] : null;
$empleado = isset($_POST['empleado']) ? $_POST['empleado'] : null;
$producto = isset($_POST['producto']) ? $_POST['producto'] : null;
$cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : null;

// Validar que todos los campos estén llenos
if(empty($cliente) || empty($empleado) || empty($producto) || empty($cantidad)){
    die("Todos los campos son obligatorios.");
}

$crud = new Crud();

$fecha_actual = date("Y-m-d H:i:s");

$datos = array(
    "cliente" => $cliente,
    "empleado" => $empleado,
    "producto" => $producto,
    "cantidad" => $cantidad,
    "fecha" => $fecha_actual
);

try{
    $respuesta = $crud->savePedido($datos);

    if ($respuesta->isAcknowledged()){
        header("Location: ../views/form-pedidos.php?info=success-agregar");
        exit();
    } else {
        die("Error al guardar el registro.");
    }
}catch(Exception $e){
    echo "Error: " . $e->getMessage();
}
?>
