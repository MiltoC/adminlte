<?php
require_once "../connection/conexion.php";
require_once "../operation/crud.php";

if (isset($_GET['id'])) {
    $crud = new Crud();
    $id = $_GET['id'];

    $empleado = $crud->fetchDataByIdEmployee($id);

    if ($empleado) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar empleado</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.min.css">
            <link href="../css/styles.css" rel="stylesheet">
        </head>
        <body>
            <div id="contenedor-principal" style="background-image: url(/adminlte/img/fnd.jpg); background-size: cover; background-position: center">
                <div id="contenido">
                    <div class="card-1">
                    <div class="card-header-1">
                        <h5 class="card-title-1">Editar Cliente</h5>
                        <p class="card-text-1">Actualice los datos del cliente.</p>
                    </div>
                    <div class="card-body-1">
                        <form id="edit-form-empleados" action="../controller/empleados-actualizar.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $empleado->_id; ?>">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $empleado->nombre; ?>" required pattern="[a-zA-Z\s]+" title="Solo se permiten letras">
                            </div>

                            <div class="mb-3">
                                <label for="dui" class="form-label">DUI</label>
                                <input type="text" class="form-control" id="dui" name="dui"
                                    value="<?php echo $empleado->dui; ?>" 
                                    pattern="\d{8}-\d{1}" required 
                                    title="Debe ingresar un DUI válido en formato 00000000-0">
                            </div>

                            <div class="mb-3">
                                <label for="cargo" class="form-label">Cargo</label>
                                <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $empleado->cargo; ?>" required pattern="[a-zA-Z\s]+" title="Solo se permiten letras">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $empleado->email; ?>" required>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="../views/form-empleados.php" class="btn btn-danger-1">
                                    Cancelar&nbsp&nbsp<i class="fas fa-times"></i>
                                </a>
                                <button type="submit" class="btn btn-dark">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.min.js"></script>


                
            
        </body>
        </html>
        <?php
    } else {
        echo "Empleado no encontrado.";
    }
} else {
    echo "ID no proporcionado.";
}
?>
