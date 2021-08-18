<!-- pagina que vera solo el usuario Administrador -->
<?php
//prueba bd
//print_r($datos); 
?>

<head>
    <title><?php echo $titulo; ?></title>
</head>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="<?php echo base_url(); ?>/dashboard">
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                    </a>
                    <a class="nav-link" href="<?php echo base_url(); ?>/servicioAdmin">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Servicios
                    </a>
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Comercios
                    </a>
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Usuarios
                    </a>
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Auditoria
                    </a>

                </div>
            </div>
        </nav>
    </div>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <br>
                <div>
                    <!-- prueba mostrar tabla de servicios cargados en bd -->

                    <p>
                    <h4>
                        <p>Tabla Servicios Activos en BD</p>
                    </h4>
                    <a href="<?php echo base_url(); ?>/servicio/nuevoServicio/" class="btn btn-info">Crear Servicio</a>
                    </p>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Codigo Servicio</th>
                                    <th>Codigo Proveedor</th>
                                    <th>Codigo Categoria</th>
                                    <th>Matricula</th>
                                    <th>Nombre Servicio</th>
                                    <th>Estado</th>
                                    <th>Modificar</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>
                            <?php foreach ($datos as $datos_item) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $datos_item['id_servicio']; ?></td>
                                        <td><?php echo $datos_item['id_proveedor'] ?></td>
                                        <td><?php echo $datos_item['id_categoria_servicio']; ?></td>
                                        <td><?php echo $datos_item['matricula']; ?></td>
                                        <td><?php echo $datos_item['nombre_fantacia'] ?></td>
                                        <td><?php echo $datos_item['activo'] ?></td>
                                        <td><a href="<?php echo base_url() . '/servicio/editarServicio/' . $datos_item['id_servicio']; ?>" class="btn btn-warning">Editar Servicio</a></td>
                                        <td><a href="<?php echo base_url(); ?>/servicioadmin/eliminarServicio?id=<?php echo $datos_item['id_servicio']; ?>" class="btn btn-danger">Borrar Servicio</a></td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                        <!-- Hay que agregar paginación-->
                    </div>
                </div>
                <br>
                <br>
            </div>
        </main>
    </div>
</div>