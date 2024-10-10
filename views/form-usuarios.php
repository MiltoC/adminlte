<?php

require_once "../connection/conexion.php";
require_once "../operation/crud.php";
$crud = new crud();
$datos = $crud->fetchUser();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="../css/styles.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/adminlte/vendor/almasaeed2010/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/adminlte/vendor/almasaeed2010/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/adminlte/vendor/almasaeed2010/adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte/vendor/almasaeed2010/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/adminlte/vendor/almasaeed2010/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/adminlte/vendor/almasaeed2010/adminlte/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed">
<div class="wrapper">



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" id="menu-lateral">
    <!-- Brand Logo -->
    <a href="/adminlte/index.php" class="brand-link">
      <img src="/adminlte/img/Logo_CoffeeTown.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CoffeTown</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item mb-1">
                <a href="/adminlte/views/form-usuarios.php">
                  <button class="menu-btn" id="btn-clientes">
                  <i class="fa-solid fa-user-gear"></i> Usuarios
                  </button>
                </a>
          </li>
          <li class="nav-item mb-1">
                <a href="/adminlte/views/form-clientes.php">
                  <button class="menu-btn" id="btn-clientes">
                    <i class="fa-solid fa-user"></i> Clientes
                  </button>
                </a>
          </li>
          <li class="nav-item mb-1">
            <a href="/adminlte/views/form-empleados.php">
                <button class="menu-btn" id="btn-empleados">
                <i class="fa-solid fa-user-tie"></i> Empleados
                </button>
            </a>
          </li>
          <li class="nav-item mb-1">
                <a href="/adminlte/views/form-categorias.php">
                    <button class="menu-btn" id="btn-categorias">
                    <i class="fa-solid fa-table-list"></i> Categorias
                    </button>
                </a>
            </li>
            <li class="nav-item mb-1">
            <a href="/adminlte/views/form-productos.php">
              <button class="menu-btn" id="btn-productos">
                <i class="fa-solid fa-box"></i> Productos
              </button>
            </a>
          </li>
          <li class="nav-item">
            <a href="/adminlte/views/form-pedidos.php">
                <button class="menu-btn" id="btn-pedidos" >
                <i class="fa-solid fa-cart-shopping"></i> Pedidos
                </button>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper py-3" style="background-image: url(/adminlte/img/fnd.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      
        <div class="text-center card-1">
            <h1>Usuarios</h1>
        </div>
    <div class="card-1 mt-3">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3 card-title-1">
                <h2>Lista usuarios</h2>
            </div>
            <div class="table-container">
                <table id="dataTable" class="table table-sm table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Contraseña</th>
                            <th>Rol</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($datos as $dato){
                        ?>
                            <tr>
                                <td><?php echo $dato->usuario?></td>
                                <td><?php echo $dato->email?></td>
                                <td><?php echo $dato->contraseña?></td>
                                <td><?php echo $dato->rol?></td>
                                <td class="text-center">
                                    <form action="../views/usuarios-editar.php" method="get">
                                        <input type="hidden" name="id" value="<?php echo $dato->_id; ?>">
                                        <button type="submit" class="btn btn-warning btn-sm">
                                            Editar&nbsp&nbsp<i class="fas fa-edit"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form id="formEliminar_<?php echo $dato->_id; ?>" action="../controller/usuarios-eliminar.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $dato->_id; ?>">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacion('<?php echo $dato->_id; ?>')">
                                            Eliminar&nbsp&nbsp<i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="background-color: black">
    <strong><a href="/adminlte/index.php">Cerrar sesion</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.min.js"></script>

<script>
        // Obtener los parámetros de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const info = urlParams.get('info');

        // Mostrar la alerta correspondiente
        if (info === 'success-agregar') {
            Swal.fire({
                icon: 'info',
                title: 'Información',
                text: 'Resgistro creado correctamente.'
            });
        }

        if (info === 'success-actualizar') {
          Swal.fire({
            icon: 'info',
            title: 'Información',
            text: 'Resgistro actualizado correctamente.'
          });
        }
    </script>

<!-- ./wrapper -->
<!-- jQuery -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/adminlte/vendor/almasaeed2010/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/plugins/moment/moment.min.js"></script>
<script src="/adminlte/vendor/almasaeed2010/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/vendor/almasaeed2010/adminlte/dist/js/demo.js"></script>

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

    function confirmarEliminacion(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esta acción",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviar el formulario
                document.getElementById('formEliminar_' + id).submit();
            }
        });
    }
    
    </script>
</body>
</html>


