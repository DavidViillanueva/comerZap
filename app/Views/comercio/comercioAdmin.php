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
                    <a class="nav-link" href="<?php echo base_url(); ?>/comercio-admin">
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
                        <p>Comercios Activos en BD</p>
                    </h4>
                    <a href="<?php echo base_url();?>/comercio/crear" class="btn btn-info">Crear Comercio</a>
                    </p>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>Id Comercio</th>
                                <th>Id Proveedor</th>
                                <th>Id Domicilio</th>
                                <th>Id Categoria</th>
                                <th>Nombre Comercio</th>
                                <th>Delivery</th>
                                <th>Licencia Comercial</th>
                                <th>Pagina Web</th>
                                <th>Mail</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Borrar</th>
                                <th>Modificar</th>
                                </tr>
                            </thead>
                            <?php foreach ($datos as $datos_item) { ?>
                                <tbody>
                                    <tr>
                                        <td><?= $datos_item['id_comercio']; ?></td>
                                        <td><?= $datos_item['id_proveedor'] ?></td>
                                        <td><?= $datos_item['id_domicilio']; ?></td>
                                        <td><?= $datos_item['id_categoria']; ?></td>
                                        <td><?= $datos_item['nombre_comercio']; ?></td>
                                        <td><?= $datos_item['delivery']; ?></td>
                                        <td><?= $datos_item['licencia_comercial']; ?></td>
                                        <td><?= $datos_item['pagina_web']; ?></td>
                                        <td><?= $datos_item['mail']; ?></td>
                                        <td><?= $datos_item['descripcion']; ?></td>
                                        <td><?= $datos_item['activo']; ?></td>
                                        <td><a href="<?php echo base_url() . '/comercio/editar/'.$datos_item['id_comercio']; ?>" class="btn btn-warning">Editar Comercio</a></td>
                                        <td><a href="<?php echo base_url(); ?>/comercio/borrar?id=<?php echo $datos_item['id_comercio']; ?>" class="btn btn-danger">Borrar Comercio</a></td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                        <!-- Hay que agregar paginación-->
                        <?php echo $paginador->links(); ?>
                    </div>
                </div>
                <br>
                <br>
            </div>
        </main>
    </div>
</div>