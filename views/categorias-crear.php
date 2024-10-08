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
    <link href="../css/styles.css" rel="stylesheet">
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
                    <form id="category-form" action="../controller/categorias-agregar.php" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de la categoria</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-z\s]+" required title="Solo se permiten letras y espacios" placeholder="Ingresa el nombre de la categoria">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required placeholder="Ingresa la descripción"></textarea>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="../views/form-categorias.php" class="btn btn-danger-1">
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
    <script src="/adminlte/js/validaciones.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true
        });
    });
    </script>
</body>
</html>
