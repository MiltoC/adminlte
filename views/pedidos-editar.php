<?php
require_once "../connection/conexion.php";
require_once "../operation/crud.php";

if (isset($_GET['id'])) {
    $crud = new Crud();
    $id = $_GET['id'];

    $pedido = $crud->fetchDataByIdPedido($id);

    if ($pedido) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar pedido</title>
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
                            <h5 class="card-title-1">Editar Pedido</h5>
                            <p class="card-text-1">Actualice los detalles del pedido.</p>
                        </div>
                        <div class="card-body-1">
                            <form id="edit-form-pedidos" action="../controller/pedidos-actualizar.php" method="POST" onsubmit="return validarFormularioProductos()">
                                <input type="hidden" name="id" value="<?php echo $pedido->_id; ?>">
                                <div class="mb-3">
                                    <label for="cliente" class="form-label">Cliente</label>
                                    <select class="form-control" id="cliente" name="cliente" required>
                                        <option value="">Seleccione un cliente</option>
                                        <?php
                                            
                                        // Crear una instancia del CRUD
                                        $cruds = new Crud();
                                            
                                        // Obtener todas las categorías de la base de datos
                                        $clientes = $crud->fetchClient();
                                        foreach ($clientes as $cliente) {
                                            // Preseleccionar la categoría actual
                                            $selected = ($pedido->cliente == $cliente->nombre) ? 'selected' : '';
                                            echo "<option value='{$cliente->nombre}' {$selected}>{$cliente->nombre}</option>";
                                        }
                                         ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="empleado" class="form-label">Empleado</label>
                                    <select class="form-control" id="empleado" name="empleado" required>
                                        <option value="">Seleccione un empleado</option>
                                        <?php
                                            
                                        // Crear una instancia del CRUD
                                        $cruds = new Crud();
                                            
                                        // Obtener todas las categorías de la base de datos
                                        $empleados = $crud->fetchEmploye();
                                        foreach ($empleados as $empleado) {
                                            // Preseleccionar la categoría actual
                                            $selected = ($pedido->empleado == $empleado->nombre) ? 'selected' : '';
                                            echo "<option value='{$empleado->nombre}' {$selected}>{$empleado->nombre}</option>";
                                        }
                                         ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="producto" class="form-label">Producto</label>
                                    <select class="form-control" id="producto" name="producto" required>
                                        <option value="">Seleccione un producto</option>
                                        <?php
                                            
                                        // Crear una instancia del CRUD
                                        $cruds = new Crud();
                                            
                                        // Obtener todas las categorías de la base de datos
                                        $productos = $crud->fetchProducts();
                                        foreach ($productos as $producto) {
                                            // Preseleccionar la categoría actual
                                            $selected = ($pedido->producto == $producto->producto) ? 'selected' : '';
                                            echo "<option value='{$producto->producto}' {$selected}>{$producto->producto}</option>";
                                        }
                                         ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="cantidad" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" min="0" value="<?php echo $pedido->cantidad; ?>" required placeholder="Ingresa la cantidad">
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <a href="../views/form-pedidos.php" class="btn btn-danger-1">Cancelar</a>
                                    <button type="submit" class="btn btn-dark">Actualizar</button>
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

                document.getElementById('imagen').addEventListener('change', function() {
                    const fileName = this.files[0] ? this.files[0].name : 'No se ha seleccionado ninguna imagen';
                    document.getElementById('file-name').textContent = fileName;
                });
            </script>
        </body>
        </html>
        <?php
    } else {
        echo "Producto no encontrado.";
    }
} else {
    echo "ID no proporcionado.";
}
?>
