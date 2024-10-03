<?php
require_once "../connection/conexion.php";
require_once "../operation/crud.php";

if (isset($_GET['id'])) {
    $crud = new Crud();
    $id = $_GET['id'];

    $cliente = $crud->fetchDataById($id);

    if ($cliente) {
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
            <style>
                body{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    background-image: linear-gradient(330deg, rgba(225, 225, 225, 0.05) 0%, rgba(225, 225, 225, 0.05) 33.333%,rgba(114, 114, 114, 0.05) 33.333%, rgba(114, 114, 114, 0.05) 66.666%,rgba(52, 52, 52, 0.05) 66.666%, rgba(52, 52, 52, 0.05) 99.999%),linear-gradient(66deg, rgba(181, 181, 181, 0.05) 0%, rgba(181, 181, 181, 0.05) 33.333%,rgba(27, 27, 27, 0.05) 33.333%, rgba(27, 27, 27, 0.05) 66.666%,rgba(251, 251, 251, 0.05) 66.666%, rgba(251, 251, 251, 0.05) 99.999%),linear-gradient(225deg, rgba(98, 98, 98, 0.05) 0%, rgba(98, 98, 98, 0.05) 33.333%,rgba(222, 222, 222, 0.05) 33.333%, rgba(222, 222, 222, 0.05) 66.666%,rgba(228, 228, 228, 0.05) 66.666%, rgba(228, 228, 228, 0.05) 99.999%),linear-gradient(90deg, rgb(28, 20, 63),rgb(40, 160, 253));
                }
                .card{
                    width: 100%;
                    max-width: 600px;
                    border-radius: 10px;
                }
                .card-body{
                    padding: 2rem;
                }
                .btn {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                }
                .btn i{
                    margin-right: 8px;
                }
                .form-control{
                    margin-bottom: 1rem;
                }
                .btn-container{
                    display: flex;
                    justify-content: center;
                    gap: 1rem;
                }
            </style>
        </head>
        <body>
            <div class="card">
                <div class="card-body">
                    <div class="container">
                    <h2 style="text-align: center;">Editar empleado</h2>
                        <form id="edit-form" action="../controller/actualizar.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $cliente->_id; ?>">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $cliente->nombre; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $cliente->email; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="edad" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $cliente->telefono; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="cargo" class="form-label">Direccion</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $cliente->direccion; ?>" required>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <a href="../index.php" class="btn btn-danger">
                                    Cancelar&nbsp&nbsp<i class="fas fa-times"></i>
                                </a>
                                <button type="submit" class="btn btn-primary" >Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.min.js"></script>
            <script>

            function validarSoloTexto(valor) {
                const regex = /^[a-zA-Z\s]+$/;
                return regex.test(valor);
            }

            document.getElementById('actualizar-btn').addEventListener('click', function() {
                // Validar que los campos no estén vacíos
                const nombre = document.getElementById('nombre').value.trim();
                const apellido = document.getElementById('apellido').value.trim();
                const edad = document.getElementById('edad').value.trim();
                const cargo = document.getElementById('cargo').value.trim();

                if (!nombre || !apellido || !edad || !cargo) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Todos los campos son obligatorios.',
                    });
                    return;
                }

                if (!validarSoloTexto(nombre) || !validarSoloTexto(apellido) || !validarSoloTexto(cargo)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Los campos de nombre, apellido y cargo no deben contener números.',
                    });
                    return;
                }

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Los cambios serán guardados",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, actualizar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Actualizado',
                            'El empleado ha sido actualizado correctamente.',
                            'success'
                        ).then(() => {
                            document.getElementById('edit-form').submit();
                        });
                    }
                });
            });
            </script>
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
