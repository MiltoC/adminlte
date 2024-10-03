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
    <link href="/adminlte/css/styles.css" rel="stylesheet">
</head>
<body>
    <div id="contenedor-principal" style="background-image: url(/adminlte/img/fnd.jpg); background-size: cover; background-position: center">
        <div id="contenido">
            <div class="card-1">
            <div class="card-header-1">
                <h5 class="card-title-1">Agregar Nuevo Cliente</h5>
                <p class="card-text-1">Ingresa los detalles del nuevo cliente.</p>
            </div>
            <div class="card-body-1">
                <form id="employee-form" action="../controller/clientes-agregar.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre completo del cliente">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa el correo electrónico">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Número de Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingresa el número de teléfono">
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <textarea class="form-control" id="direccion" name="direccion" rows="3" placeholder="Ingresa la dirección"></textarea>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="../views/form-clientes.php" class="btn btn-danger-1">
                            Cancelar&nbsp&nbsp<i class="fas fa-times"></i>
                        </a>
                        <button type="submit" class="btn btn-dark">
                            Guardar&nbsp&nbsp<i class="fas fa-save"></i>
                        </button>
                    </div>
                </form>
            </div>
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
