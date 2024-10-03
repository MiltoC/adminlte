<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.min.css">
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: linear-gradient(306deg, rgba(54, 54, 54, 0.05) 0%, rgba(54, 54, 54, 0.05) 33.333%,rgba(85, 85, 85, 0.05) 33.333%, rgba(85, 85, 85, 0.05) 66.666%,rgba(255, 255, 255, 0.05) 66.666%, rgba(255, 255, 255, 0.05) 99.999%),linear-gradient(353deg, rgba(81, 81, 81, 0.05) 0%, rgba(81, 81, 81, 0.05) 33.333%,rgba(238, 238, 238, 0.05) 33.333%, rgba(238, 238, 238, 0.05) 66.666%,rgba(32, 32, 32, 0.05) 66.666%, rgba(32, 32, 32, 0.05) 99.999%),linear-gradient(140deg, rgba(192, 192, 192, 0.05) 0%, rgba(192, 192, 192, 0.05) 33.333%,rgba(109, 109, 109, 0.05) 33.333%, rgba(109, 109, 109, 0.05) 66.666%,rgba(30, 30, 30, 0.05) 66.666%, rgba(30, 30, 30, 0.05) 99.999%),linear-gradient(189deg, rgba(77, 77, 77, 0.05) 0%, rgba(77, 77, 77, 0.05) 33.333%,rgba(55, 55, 55, 0.05) 33.333%, rgba(55, 55, 55, 0.05) 66.666%,rgba(145, 145, 145, 0.05) 66.666%, rgba(145, 145, 145, 0.05) 99.999%),linear-gradient(90deg, rgb(9, 201, 186),rgb(18, 131, 221));
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
        <div class="card mt-4">
            <div class="card-body">
                <div class="container">
                    <h2 class="text-center mb-4">Crear empleado</h2>
                    <form id="employee-form" action="../controller/agregar.php" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese el apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="edad" class="form-label">Telefono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Ingrese la edad" required>
                        </div>
                        <div class="mb-3">
                            <label for="cargo" class="form-label">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese el cargo" required>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="../views/form-clientes.php" class="btn btn-danger">
                                Cancelar&nbsp&nbsp<i class="fas fa-times"></i>
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Guardar&nbsp&nbsp<i class="fas fa-save"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true
        });
    });

    function validarCampos() {
        const nombre = document.getElementById('nombre').value;
        const apellidos = document.getElementById('apellidos').value;
        const cargo = document.getElementById('cargo').value;
        const regex = /\d/; // Expresión regular para verificar números

        if (regex.test(nombre)) {
            Swal.fire('Error', 'El nombre no debe contener números', 'error');
            return false;
        }
        if (regex.test(apellidos)) {
            Swal.fire('Error', 'El apellido no debe contener números', 'error');
            return false;
        }
        if (regex.test(cargo)) {
            Swal.fire('Error', 'El cargo no debe contener números', 'error');
            return false;
        }
        return true;
    }

    document.getElementById('guardar-btn').addEventListener('click', function() {
        const nombre = document.getElementById('nombre').value.trim();
        const apellidos = document.getElementById('apellidos').value.trim();
        const edad = document.getElementById('edad').value.trim();
        const cargo = document.getElementById('cargo').value.trim();

        // Verificar que todos los campos tengan valores
        if (!nombre || !apellidos || !edad || !cargo) {
            Swal.fire({
                icon: 'error',
                title: 'Campos vacíos',
                text: 'Por favor, complete todos los campos antes de guardar.',
            });
        } else {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Los datos serán guardados",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, guardar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Guardado',
                        'El empleado ha sido guardado correctamente.',
                        'success'
                    ).then(() => {
                        // Enviar el formulario
                        document.getElementById('empleadoForm').submit();
                    });
                }
            });
        }
    });
    </script>
</body>
</html>
