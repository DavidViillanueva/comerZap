<!-- pagina que vera solo el usuario Administrador -->
<?php 
//prueba bd
//print_r($datos); 
?>

<head>
    <title><?php echo $titulo; ?></title>
</head>

<body>
    <div>
        <h1><?= esc($titulo); ?></h1>
    </div>
    <br>
    <div><!-- prueba mostrar tabla de servicios cargados en bd -->
        
        <p>
            <h4><p>Tabla Servicios Activos en BD</p></h4>
            <a href="<?php echo base_url(); ?>/servicio/nuevoServicio/" class="btn btn-info">Crear Servicio</a>
        </p>    
        <br>
        
        <table border = '1' align='center'>
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
            <?php foreach($datos as $datos_item){ ?>
                <tr>
                    <td><?php echo $datos_item['id_servicio']; ?></td>
                    <td><?php echo $datos_item['id_proveedor'] ?></td>
                    <td><?php echo $datos_item['id_categoria_servicio']; ?></td>
                    <td><?php echo $datos_item['matricula']; ?></td>
                    <td><?php echo $datos_item['nombre_fantacia'] ?></td>
                    <td><?php echo $datos_item['activo'] ?></td>
                    <td><a href="<?php echo base_url() . '/servicio/editarServicio/' .$datos_item['id_servicio']; ?>" class="btn btn-warning">Editar Servicio</a></td>
                    <td><a href="<?php echo base_url(); ?>/servicioadmin/eliminarServicio?id=<?php echo $datos_item['id_servicio']; ?>" class="btn btn-danger">Borrar Servicio</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <br>
    <br>
    <!---->
</body>