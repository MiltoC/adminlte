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
        <div id="contenido2">
            <div class="card-1">
                <div class="card-header-1">
                    <h5 class="card-title-1">Agregar Nuevo Cliente</h5>
                    <p class="card-text-1">Ingresa los detalles del nuevo cliente.</p>
                </div>
                <div class="card-body-1">
                    <form id="product-form" action="../controller/productos-agregar.php" method="POST" enctype="multipart/form-data" onsubmit="return validarFormularioProductos()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre del Producto</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-z\s]+" required title="Solo se permiten letras y espacios" placeholder="Ingresa el nombre del producto">
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" required placeholder="Ingresa la descripción del producto"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" required placeholder="Ingresa el precio del producto">
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría</label>
                                <select class="form-control" id="categoria" name="categoria" required>
                                    <option value="">Seleccione una categoría</option>
                                    <?php
                                    // Incluir archivo de conexión y CRUD
                                    require_once "../connection/conexion.php";
                                    require_once "../operation/crud.php";
                                    
                                    // Crear una instancia del CRUD
                                    $crud = new Crud();
                                    
                                    // Obtener todas las categorías de la base de datos
                                    $categorias = $crud->fetchCategory();
                                    
                                    // Mostrar cada categoría en una opción del select
                                    foreach ($categorias as $categoria) {
                                        echo "<option value='{$categoria->nombre}'>{$categoria->nombre}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Imagen del Producto</label>
                                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                                    <br>
                                    <label for="imagen" class="custom-file-upload">Seleccionar imagen</label>
                                    <span id="file-name">No se ha seleccionado ninguna imagen</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="../views/form-productos.php" class="btn btn-danger-1">Cancelar</a>
                            <button type="submit" class="btn btn-dark">Guardar</button>
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

    document.getElementById('imagen').addEventListener('change', function() {
    const fileName = this.files[0] ? this.files[0].name : 'No se ha seleccionado ninguna imagen';
    document.getElementById('file-name').textContent = fileName;
    });
    </script>
</body>
</html>
