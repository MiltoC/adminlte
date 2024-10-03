<?php
include "../connection/conexion.php";
include "../operation/crud.php";

$crud = new Crud();

$datos = array(

    "nombre" => isset($_POST['nombre']) ? $_POST['nombre'] : null,
    "email" => isset($_POST['email']) ? $_POST['email'] : null,
    "telefono" => isset($_POST['telefono']) ? $_POST['telefono'] : null,
    "direccion" => isset($_POST['direccion']) ? $_POST['direccion'] : null
);

foreach($datos as $campo => $valor){
    if(empty($valor)){
        die("El campo $campo es requerido");
    }
}

try{
    $respuesta = $crud->save($datos);

    if ($respuesta->isAcknowledged()){
        echo "Registro guardado correctamente";
        header("Location: ../views/form-clientes.php");
        exit();
    }
    else{
        die("Error al guardar el registro");
    }
}catch(Exception $e){
    echo "Error: " . $e->getMessage();
}

?>