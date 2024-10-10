<?php
require_once "../connection/conexion.php";
require_once "../operation/crud.php";

if (isset($_GET['id'])) {
    $crud = new Crud();
    $id = $_GET['id'];

    $user = $crud->fetchDataByIdUser($id);

    if ($user) {
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
                        <h5 class="card-title-1">Editar Usuario</h5>
                        <p class="card-text-1">Actualice los datos del usuario.</p>
                    </div>
                    <div class="card-body-1">
                        <form id="edit-form" action="../controller/usuarios-actualizar.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $user->_id; ?>">

                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $user->usuario; ?>" placeholder="Ingrese su usuario" required pattern="[a-zA-Z0-9]+" title="Solo se permiten letras y números">
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email; ?>" placeholder="Ingrese su correo" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="contraseña" name="contraseña" value="<?php echo $user->contraseña; ?>" placeholder="Ingrese su contraseña" required minlength="6" title="La contraseña debe tener al menos 6 caracteres">
                            </div>

                            <div class="mb-3">
                                <label for="rol" class="form-label">Rol</label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option value="admin" <?php echo ($user->rol == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                    <option value="user" <?php echo ($user->rol == 'user') ? 'selected' : ''; ?>>User</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="../views/form-usuarios.php" class="btn btn-danger-1">
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
